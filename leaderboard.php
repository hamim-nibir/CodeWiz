<?php
session_start();
require_once "/xampp/htdocs/webb/partials/dbconnection.php";

// Pagination
$limit = 10;
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$offset = ($page - 1) * $limit;

// Total user count
$total_result = $conn->query("SELECT COUNT(*) AS total FROM user");
$total_rows = $total_result->fetch_assoc()['total'];
$total_pages = ceil($total_rows / $limit);

// Fetch paginated users
$sql = "SELECT * FROM user ORDER BY global_score DESC LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

// 🔁 Build uid => rank map for all users
$rank_map = [];
$rank_sql = "SELECT uid FROM user ORDER BY global_score DESC";
$rank_res = $conn->query($rank_sql);
$rank_counter = 1;
while ($r = $rank_res->fetch_assoc()) {
    $rank_map[$r['uid']] = $rank_counter++;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CodeWiz | Global Leaderboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: #f0f4f8;
            font-family: 'Poppins', sans-serif;
        }

        .page-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
            margin-top: 100px;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 14px 18px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        th {
            background-color: #009970;
            color: white;
        }

        tr:hover {
            background-color: #f0f0f0;
        }

        .highlight {
            background-color: #d4edda !important;
        }

        a.username-link {
            color: #2c3e50;
            font-weight: bold;
            text-decoration: none;
        }

        a.username-link:hover {
            color: #009970;
        }

        /* NEW Pagination styles */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination a, .pagination span {
            margin: 0 4px;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
            color: #009970;
            border: 1px solid #009970;
            cursor: pointer;
        }
        .pagination a:hover {
            background-color: #009970;
            color: white;
        }
        .pagination .active {
            background-color: #009970;
            color: white;
            pointer-events: none;
            cursor: default;
            border: 1px solid #009970;
        }
        .pagination .disabled {
            color: #ccc;
            border-color: #ccc;
            pointer-events: none;
            cursor: default;
        }
    </style>
</head>
<body>

<?php include("/xampp/htdocs/webb/partials/navbar.php"); ?>

<div class="page-container">
    <div class="container">
        <h2>🌍 Global Leaderboard</h2>

        <table>
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Username</th>
                    <th>Global Score</th>
                </tr>
            </thead>
            <tbody>
    <?php
    $current_uid = $_SESSION['uid'] ?? null;

    // 🏅 Medal mapping
    function getMedal($rank) {
        return match($rank) {
            1 => "🥇",
            2 => "🥈",
            3 => "🥉",
            default => $rank
        };
    }

    // ✅ Show current user row at the top (if logged in)
    if ($current_uid && isset($rank_map[$current_uid])) {
        $current_user_sql = "SELECT uid, username, global_score FROM user WHERE uid = $current_uid";
        $current_user_res = $conn->query($current_user_sql);
        if ($current_user_res && $current_user_res->num_rows === 1) {
            $u = $current_user_res->fetch_assoc();
            $actual_rank = $rank_map[$u['uid']];
            ?>
            <tr class="highlight">
                <td><?php echo getMedal($actual_rank); ?></td>
                <td>
                    <a class="username-link" href="dashboard.php?uid=<?php echo $u['uid']; ?>">
                        <?php echo htmlspecialchars($u['username']); ?>
                    </a>
                </td>
                <td><?php echo $u['global_score']; ?></td>
            </tr>
            <?php
        }
    }

    // ✅ Show paginated users (excluding current user)
    if ($result->num_rows > 0):
        while ($row = $result->fetch_assoc()):
            if ($current_uid && $row['uid'] == $current_uid) continue;
            $rank = $rank_map[$row['uid']] ?? '?';
    ?>
        <tr>
            <td><?php echo getMedal($rank); ?></td>
            <td>
                <a class="username-link" href="dashboard.php?uid=<?php echo $row['uid']; ?>">
                    <?php echo htmlspecialchars($row['username']); ?>
                </a>
            </td>
            <td><?php echo $row['global_score']; ?></td>
        </tr>
    <?php endwhile; else: ?>
        <tr><td colspan="3" class="text-center">No users found.</td></tr>
    <?php endif; ?>
</tbody>

        </table>

        <!-- NEW Pagination -->
        <?php if ($total_pages > 1): ?>
            <nav class="pagination" aria-label="Page navigation">
                <?php
                // Previous button
                if ($page > 1) {
                    echo '<a href="?page=' . ($page - 1) . '">&laquo; Prev</a>';
                } else {
                    echo '<span class="disabled">&laquo; Prev</span>';
                }

                // Show max 7 page numbers with current page centered if possible
                $start = max(1, $page - 3);
                $end = min($total_pages, $page + 3);

                if ($start > 1) {
                    echo '<a href="?page=1">1</a>';
                    if ($start > 2) echo '<span>...</span>';
                }

                for ($i = $start; $i <= $end; $i++) {
                    if ($i == $page) {
                        echo '<span class="active">' . $i . '</span>';
                    } else {
                        echo '<a href="?page=' . $i . '">' . $i . '</a>';
                    }
                }

                if ($end < $total_pages) {
                    if ($end < $total_pages - 1) echo '<span>...</span>';
                    echo '<a href="?page=' . $total_pages . '">' . $total_pages . '</a>';
                }

                // Next button
                if ($page < $total_pages) {
                    echo '<a href="?page=' . ($page + 1) . '">Next &raquo;</a>';
                } else {
                    echo '<span class="disabled">Next &raquo;</span>';
                }
                ?>
            </nav>
        <?php endif; ?>

    </div>

    <?php include("/xampp/htdocs/webb/partials/mini_footer.php"); ?>
</div>

</body>
</html>
