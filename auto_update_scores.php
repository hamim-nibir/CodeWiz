<?php
require_once "partials/dbconnection.php";
date_default_timezone_set('Asia/Dhaka');

$now = date("Y-m-d H:i:00");

// Step 1: Get contests that just ended within the last 1 minute
$sql = "
    SELECT contest_id
    FROM contests
    WHERE TIMESTAMPADD(MINUTE, duration, start_time) <= '$now'
    AND TIMESTAMPADD(MINUTE, duration, start_time) > TIMESTAMPADD(MINUTE, -1, '$now')
";

$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) === 0) {
    echo "❌ No contest ended at $now\n";
    exit;
}

while ($row = mysqli_fetch_assoc($result)) {
    $contest_id = $row['contest_id'];
    echo "⏰ Processing contest $contest_id...\n";

    // Step 2: Get users who registered for this contest
    $reg_users = mysqli_query($conn, "
        SELECT user_id FROM contest_registrations WHERE contest_id = $contest_id
    ");

    while ($user = mysqli_fetch_assoc($reg_users)) {
        $uid = $user['user_id'];

        // Step 3: Calculate total score by counting unique solved problems only once
        $score_query = "
            SELECT 
                SUM(
                    CASE p.difficulty
                        WHEN 'Easy' THEN 10
                        WHEN 'Medium' THEN 20
                        WHEN 'Hard' THEN 30
                        ELSE 0
                    END
                ) AS score
            FROM (
                SELECT DISTINCT s.problem_id
                FROM submissions s
                JOIN contest_problems cp ON s.problem_id = cp.problem_id
                WHERE cp.contest_id = $contest_id
                  AND s.user_id = $uid
                  AND s.verdict = 'Accepted'
            ) AS solved_problems
            JOIN problems p ON solved_problems.problem_id = p.id
        ";

        $score_result = mysqli_query($conn, $score_query);
        $score_row = mysqli_fetch_assoc($score_result);

        $earned = intval($score_row['score']);

        if ($earned > 0) {
            // Update user's global score
            $update_sql = "UPDATE user SET global_score = global_score + $earned WHERE uid = $uid";
            mysqli_query($conn, $update_sql);
            echo "✅ Updated user $uid with +$earned points.\n";
        } else {
            echo "➖ User $uid solved nothing.\n";
        }
    }
}
?>
