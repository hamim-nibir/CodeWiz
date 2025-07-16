<?php
session_start();
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

require_once "partials/dbconnection.php";

$problem_id = isset($_GET['problem_id']) ? intval($_GET['problem_id']) : 0;
$user_id = $_SESSION['uid'];

$sql = "SELECT 
            s.submission_id, 
            s.submitted_at, 
            u.username AS submitted_by, 
            p.title AS problem_title, 
            s.verdict
        FROM submissions s
        JOIN user u ON s.user_id = u.uid
        JOIN problems p ON s.problem_id = p.id
        WHERE s.user_id = ? AND s.problem_id = ?
        ORDER BY s.submitted_at DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $problem_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Submissions - CodeWiz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            background: linear-gradient(to bottom, #f0f4f8, #d9e2ec);
            font-family: 'Poppins', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .page-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
    </style>
</head>

<body>

    <div class="page-container">
        <?php include "partials/navbar.php"; ?>

        <div class="container mt-5 pt-4">
            <a href="view_problem.php?id=<?php echo $problem_id; ?>" class="btn btn-primary mb-3">← Go to Problem</a>

            <h3 class="mb-3">Your Submissions</h3>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Submission ID</th>
                            <th>Submitted At</th>
                            <th>Submitted By</th>
                            <th>Problem Title</th>
                            <th>Verdict</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result && $result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['submission_id']; ?></td>
                                    <td><?php echo $row['submitted_at']; ?></td>
                                    <td><?php echo htmlspecialchars($row['submitted_by']); ?></td>
                                    <td><?php echo htmlspecialchars($row['problem_title']); ?></td>
                                    <td>
                                        <span class="badge <?php echo ($row['verdict'] === 'Accepted') ? 'bg-success' : 'bg-danger'; ?>">
                                            <?php echo htmlspecialchars($row['verdict']); ?>
                                        </span>
                                    </td>

                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">No submissions found for this problem.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php include "partials/mini_footer.php"; ?>
    </div>
</body>

</html>