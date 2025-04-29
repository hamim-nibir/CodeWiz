<?php

require_once 'dbconnection.php';

// fetching problems from problems table
$query = "SELECT * FROM problems";
$filters = [];

// Difficulty search
if (!empty($_GET['difficulty'])) {
    $difficulty = $conn->real_escape_string($_GET['difficulty']);
    $filters[] = "difficulty = '$difficulty'";
}

// Tag filter
if (!empty($_GET['tag'])) {
    $tag = $conn->real_escape_string($_GET['tag']);
    $filters[] = "FIND_IN_SET('$tag', tags)";
}

// Combine filters
if (!empty($filters)) {
    $query .= " WHERE " . implode(" AND ", $filters);
}

$query .= " ORDER BY id ASC";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Problemset</title>
    <link rel="stylesheet" href="problemset.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="page-container">
        <?php include('navbar.php'); ?>
        <div class="container">

            <!-- Search & Filter -->
            <form class="search-filter" method="get">
                <input type="text" name="difficulty" placeholder="Search by difficulty (e.g. Easy)" value="<?php echo isset($_GET['difficulty']) ? htmlspecialchars($_GET['difficulty']) : ''; ?>">
                <button type="submit">Search</button>
            </form>

            <!-- Tag Filter Buttons -->
            <div class="tag-buttons">
                <a href="problemset.php?tag=math">Math</a>
                <a href="problemset.php?tag=greedy">Greedy</a>
                <a href="problemset.php?tag=dp">DP</a>
                <a href="problemset.php?tag=implementation">Implementation</a>
                <!-- Add more tags as needed -->
            </div>

            <!-- Problemls list Table -->
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Tags</th>
                        <th>Difficulty</th>
                        <th>Solve Count</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result && $result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><a class="title-link" href="view_problem.php?id=<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['title']); ?></a></td>
                                <td><?php echo htmlspecialchars($row['tags']); ?></td>
                                <td><?php echo htmlspecialchars($row['difficulty']); ?></td>
                                <td><?php echo $row['solve_count']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">No problems found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>


        </div>
    </div>



</body>

</html>

<?php $conn->close(); ?>