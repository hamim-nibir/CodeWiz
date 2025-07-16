<?php
session_start();
require_once "/xampp/htdocs/webb/partials/dbconnection.php";

// Check login
if (!isset($_SESSION['user_logged_in']) || !isset($_SESSION['uid'])) {
    echo "<script>alert('You must be logged in to submit.'); window.location.href = 'login.php';</script>";
    exit;
}

// Form data
$user_id = $_SESSION['uid'];
$problem_id = intval($_POST['problem_id']);
$language = $_POST['language'];
$code = '';
$language_ids = [
    'cpp' => 54,
    'java' => 62,
    'python' => 71
];

// Language validation
if (!isset($language_ids[$language])) {
    echo "<script>alert('Unsupported language.'); window.history.back();</script>";
    exit;
}

$language_id = $language_ids[$language];

// Handle mutual-exclusive input
$code_from_textarea = trim($_POST['code']);
$file_uploaded = isset($_FILES['code_file']) && $_FILES['code_file']['error'] === UPLOAD_ERR_OK;

if ($code_from_textarea && $file_uploaded) {
    echo "<script>alert('Submit either code OR file — not both.'); window.history.back();</script>";
    exit;
}

if (!$code_from_textarea && !$file_uploaded) {
    echo "<script>alert('No code submitted.'); window.history.back();</script>";
    exit;
}

// Use textarea or file content
if ($file_uploaded) {
    $file_name = $_FILES['code_file']['name'];
    $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    if (
        ($language === 'cpp' && $ext !== 'cpp') ||
        ($language === 'java' && $ext !== 'java') ||
        ($language === 'python' && $ext !== 'py')
    ) {
        echo "<script>alert('Invalid file extension for selected language.'); window.history.back();</script>";
        exit;
    }

    $code = file_get_contents($_FILES['code_file']['tmp_name']);
} else {
    $code = $code_from_textarea;
}

// --- Judge0 API Call ---
// Fetch sample input and output
$query = "SELECT sample_input, sample_output FROM problems WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $problem_id);
$stmt->execute();
$result = $stmt->get_result();
$problem = $result->fetch_assoc();

$sample_input = $problem['sample_input'];
$expected_output = $problem['sample_output'];

$api_url = "https://judge0-ce.p.rapidapi.com/submissions?base64_encoded=false&wait=true";
$headers = [
    "Content-Type: application/json",
    "X-RapidAPI-Key: affba2d0b6msh3684690b4fbc629p13766ejsn82612ac29a92",
    "X-RapidAPI-Host: judge0-ce.p.rapidapi.com"
];

$post_data = json_encode([
    "source_code" => $code,
    "language_id" => $language_id,
    "stdin" => $sample_input
]);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$response = curl_exec($ch);
curl_close($ch);

$api_result = json_decode($response, true);

// Get results
$status_id = $api_result['status']['id'] ?? 0;
$status_desc = $api_result['status']['description'] ?? 'Unknown';
$stdout = trim($api_result['stdout'] ?? '');
$stderr = trim($api_result['stderr'] ?? '');
$compile_output = trim($api_result['compile_output'] ?? '');
$verdict = 'Wrong Answer';

// ----------------- VERDICT LOGIC --------------------
function normalize_lines($text) {
    $lines = explode("\n", preg_replace("/\r\n|\r/", "\n", trim($text)));
    return array_map('rtrim', $lines); // remove trailing spaces
}

if ($status_id === 3) {
    // Compare line-by-line
    $actual_lines = normalize_lines($stdout);
    $expected_lines = normalize_lines($expected_output);

    $verdict = ($actual_lines === $expected_lines) ? "Accepted" : "Wrong Answer";
} elseif (!empty($compile_output)) {
    $verdict = "Compilation Error";
    $stdout = $compile_output;
} elseif (!empty($stderr)) {
    $verdict = $status_desc;
    $stdout = $stderr;
} else {
    $verdict = $status_desc ?: 'Unknown';
}

// ------------------ STORE SUBMISSION -----------------
$save = $conn->prepare("INSERT INTO submissions (user_id, problem_id, language, code, verdict, stdout, submitted_at) VALUES (?, ?, ?, ?, ?, ?, NOW())");
$save->bind_param("iissss", $user_id, $problem_id, $language, $code, $verdict, $stdout);
$save->execute();


// ------------------ SOLVE COUNT + USER STATS ---------------------
if ($verdict === "Accepted") {
    // Step 1: Check if it's first time solving this problem
    $checkSolved = $conn->prepare("
        SELECT COUNT(*) FROM submissions
        WHERE user_id = ? AND problem_id = ? AND verdict = 'Accepted'
    ");
    $checkSolved->bind_param("ii", $user_id, $problem_id);
    $checkSolved->execute();
    $checkSolved->bind_result($count);
    $checkSolved->fetch();
    $checkSolved->close();

    if ($count === 1) {
        // First time solving it
        $updateProblem = $conn->prepare("UPDATE problems SET solve_count = solve_count + 1 WHERE id = ?");
        $updateProblem->bind_param("i", $problem_id);
        $updateProblem->execute();

        $updateUserTotal = $conn->prepare("UPDATE user SET problems_solved = problems_solved + 1 WHERE uid = ?");
        $updateUserTotal->bind_param("i", $user_id);
        $updateUserTotal->execute();
    }

    // Step 2: Recalculate solves in last 30 days (after insert!)
    $date_30_days_ago = date('Y-m-d H:i:s', strtotime('-30 days'));

    $stmt = $conn->prepare("
        SELECT COUNT(DISTINCT problem_id)
        FROM submissions
        WHERE user_id = ?
        AND verdict = 'Accepted'
        AND submitted_at >= ?
    ");
    $stmt->bind_param("is", $user_id, $date_30_days_ago);
    $stmt->execute();
    $stmt->bind_result($last_month_solved);
    $stmt->fetch();
    $stmt->close();

    $updateLastMonth = $conn->prepare("UPDATE user SET problems_solved_last_month = ? WHERE uid = ?");
    $updateLastMonth->bind_param("ii", $last_month_solved, $user_id);
    $updateLastMonth->execute();

    // ------------------ CONTESTS PARTICIPATED ---------------------
$contestParticipationQuery = "
    SELECT COUNT(DISTINCT cp.contest_id) AS total_participated
    FROM submissions s
    JOIN contest_problems cp ON s.problem_id = cp.problem_id
    WHERE s.user_id = ?
";

$partStmt = $conn->prepare($contestParticipationQuery);
$partStmt->bind_param("i", $user_id);
$partStmt->execute();
$partStmt->bind_result($total_participated);
$partStmt->fetch();
$partStmt->close();

// Update in user table
$updateContestCount = $conn->prepare("
    UPDATE user SET contests_participated = ? WHERE uid = ?
");
$updateContestCount->bind_param("ii", $total_participated, $user_id);
$updateContestCount->execute();

}

// ------------------ Redirect ---------------------
echo "<script>alert('✅ Verdict: $verdict'); window.location.href = 'submissions.php?problem_id=$problem_id';</script>";
?>
