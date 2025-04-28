<?php
// 1. Connect to the database
$servername = "localhost"; // or your server name
$username = "root";        // your database username
$password = "";            // your database password
$dbname = "codewiz"; // your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Fetch problems
$sql = "SELECT id, title, difficulty, tags FROM problems ORDER BY id ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Problemset</title>
    <link rel="stylesheet" href="style.css"> <!-- Reusing your style.css -->
    <style>
        /* Extra styling for the problem list */
        .problem-table {
            width: 90%;
            margin: 50px auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .problem-table th, .problem-table td {
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }
        .problem-table th {
            background-color: #4a90e2;
            color: #fff;
        }
        .problem-title {
            color: #2c3e50;
            text-decoration: none;
            font-weight: bold;
        }
        .problem-title:hover {
            color: #4a90e2;
        }
    </style>
</head>
<body>

        
<h2 style="margin-top: 20px;">Problemset</h2>

<table class="problem-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Difficulty</th>
            <th>Tags</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td>
                        <a class="problem-title" href="view_problem.php?id=<?php echo $row['id']; ?>">
                            <?php echo htmlspecialchars($row['title']); ?>
                        </a>
                    </td>
                    <td><?php echo htmlspecialchars($row['difficulty']); ?></td>
                    <td><?php echo htmlspecialchars($row['tags']); ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No problems found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php $conn->close(); ?>

</body>
</html>
