<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '/xampp/htdocs/webb/partials/dbconnection.php';

// Pagination variables
$rowsPerPage = 10;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) $page = 1;

// Build filter conditions
$filters = [];

// Difficulty filter
if (!empty($_GET['difficulty'])) {
    $difficulty = $conn->real_escape_string($_GET['difficulty']);
    $filters[] = "difficulty = '$difficulty'";
}

// Tag filter
if (!empty($_GET['tag'])) {
    $tag = $conn->real_escape_string($_GET['tag']);
    $filters[] = "FIND_IN_SET('$tag', tags)";
}

// Combine filters for WHERE clause
$whereClause = "";
if (!empty($filters)) {
    $whereClause = " WHERE " . implode(" AND ", $filters);
}

// Get total rows count for pagination
$countQuery = "SELECT COUNT(*) as total FROM problems" . $whereClause;
$countResult = $conn->query($countQuery);
$totalRows = 0;
if ($countResult) {
    $row = $countResult->fetch_assoc();
    $totalRows = $row['total'];
}

$totalPages = ceil($totalRows / $rowsPerPage);

// Calculate offset
$offset = ($page - 1) * $rowsPerPage;

// Fetch problems with limit and offset
$query = "SELECT * FROM problems" . $whereClause . " ORDER BY id ASC LIMIT $offset, $rowsPerPage";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CodeWiz | Problemset</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Your existing CSS here */
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

        .container {
            width: 90%;
            margin: auto;
            margin-top: 110px;
        }

        .search-filter {
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
        }

        .search-filter input[type="text"] {
            padding: 8px 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
            width: 250px;
        }

        .search-filter button {
            padding: 8px 16px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            background-color: #009970;
            color: white;
            cursor: pointer;
        }

        .search-filter button:hover {
            background-color: #009970;
        }

        .tag-buttons {
            margin: 10px 0;
            text-align: center;
        }

        .tag-buttons a {
            display: inline-block;
            margin: 5px;
            padding: 6px 14px;
            border-radius: 20px;
            background-color: #e0e0e0;
            text-decoration: none;
            color: #333;
            font-size: 14px;
        }

        .tag-buttons a:hover {
            text-decoration: none;
            background-color: #009970;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 14px 18px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        th {
            background-color: #009970;
            color: white;
        }

        a.title-link {
            color: #2c3e50;
            text-decoration: none;
            font-weight: bold;
        }

        a.title-link:hover {
            text-decoration: none;
            color: #009970;
        }

        .scroll-cards {
            display: flex;
            overflow-x: auto;
            gap: 10px;
            padding: 10px 0;
            scrollbar-width: none;
        }

        .scroll-cards::-webkit-scrollbar {
            display: none;
        }

        .topic-card {
            min-width: 140px;
            padding: 12px;
            background-color: #ffffff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
            font-weight: 500;
            white-space: nowrap;
            cursor: pointer;
            transition: 0.3s;
        }

        .topic-card:hover {
            background-color: #009970;
            color: white;
        }

        .scroll-tags {
            display: flex;
            overflow-x: auto;
            gap: 10px;
            padding: 10px 0;
            scrollbar-width: none;
        }

        .scroll-tags::-webkit-scrollbar {
            display: none;
        }

        .tag-button {
            background-color: #e0e0e0;
            padding: 8px 16px;
            border-radius: 20px;
            text-decoration: none;
            color: #333;
            white-space: nowrap;
            transition: background 0.3s ease;
        }

        .tag-button:hover {
            background-color: #009970;
            color: white;
        }

        /* Pagination styles */
        .pagination {
            display: flex;
            justify-content: center;
            margin: 20px 0;
            list-style-type: none;
            padding: 0;
            gap: 6px;
        }

        .pagination li {
            border: 1px solid #009970;
            border-radius: 6px;
            padding: 6px 12px;
            cursor: pointer;
            user-select: none;
            color: #009970;
            font-weight: 600;
        }

        .pagination li.active,
        .pagination li:hover {
            background-color: #009970;
            color: white;
        }

        .pagination li.disabled {
            opacity: 0.5;
            cursor: default;
        }
    </style>
</head>

<body>
    <div class="page-container">
        <?php include('/xampp/htdocs/webb/partials/navbar.php'); ?>

        <div class="container mt-5 pt-4">
            <!-- Search box in top-right corner -->
            <div class="d-flex justify-content-end mb-3">
                <form class="form-inline" method="get">
                    <input class="form-control mr-2" type="text" name="difficulty" placeholder="Search difficulty"
                        value="<?php echo isset($_GET['difficulty']) ? htmlspecialchars($_GET['difficulty']) : ''; ?>">
                    <?php if (!empty($_GET['tag'])): ?>
                        <input type="hidden" name="tag" value="<?php echo htmlspecialchars($_GET['tag']); ?>">
                    <?php endif; ?>
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
            </div>

            <!-- Scrollable tag buttons -->
            <div class="scroll-tags mb-4">
                <?php
                $tags = ['math', 'greedy', 'dp', 'implementation', 'binary search', 'brute force', 'sorting'];
                // Show all link - clear filters
                echo "<a href='problemset.php' class='tag-button'>All</a>";
                foreach ($tags as $tagItem) {
                    $activeClass = (isset($_GET['tag']) && $_GET['tag'] === $tagItem) ? 'style="background-color:#009970;color:white;"' : '';
                    echo "<a href='?tag=$tagItem' class='tag-button' $activeClass>" . ucfirst($tagItem) . "</a>";
                }
                ?>
            </div>

            <!-- Problem Table -->
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Tags</th>
                        <th>Difficulty</th>
                        <th>People solved</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result && $result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><a class="title-link"
                                        href="view_problem.php?id=<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['title']); ?></a>
                                </td>
                                <td><?php echo htmlspecialchars($row['tags']); ?></td>
                                <td><?php echo htmlspecialchars($row['difficulty']); ?></td>
                                <td><?php echo $row['solve_count']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">No problems found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <!-- Pagination -->
            <?php if ($totalPages > 1): ?>
                <ul class="pagination">
                    <!-- Previous page -->
                    <li class="<?php if ($page <= 1) echo 'disabled'; ?>">
                        <?php if ($page > 1): ?>
                            <a href="?<?php 
                                // preserve other GET parameters except page
                                $params = $_GET;
                                $params['page'] = $page - 1;
                                echo http_build_query($params);
                            ?>" style="color:inherit; text-decoration:none;">&laquo; Prev</a>
                        <?php else: ?>
                            &laquo; Prev
                        <?php endif; ?>
                    </li>

                    <!-- Page numbers -->
                    <?php
                    // Show up to 7 pages in pagination for compactness
                    $startPage = max(1, $page - 3);
                    $endPage = min($totalPages, $page + 3);

                    for ($i = $startPage; $i <= $endPage; $i++):
                    ?>
                        <li class="<?php echo ($i === $page) ? 'active' : ''; ?>">
                            <?php if ($i === $page): ?>
                                <?php echo $i; ?>
                            <?php else: ?>
                                <a href="?<?php 
                                    $params = $_GET;
                                    $params['page'] = $i;
                                    echo http_build_query($params);
                                ?>" style="color:inherit; text-decoration:none;"><?php echo $i; ?></a>
                            <?php endif; ?>
                        </li>
                    <?php endfor; ?>

                    <!-- Next page -->
                    <li class="<?php if ($page >= $totalPages) echo 'disabled'; ?>">
                        <?php if ($page < $totalPages): ?>
                            <a href="?<?php 
                                $params = $_GET;
                                $params['page'] = $page + 1;
                                echo http_build_query($params);
                            ?>" style="color:inherit; text-decoration:none;">Next &raquo;</a>
                        <?php else: ?>
                            Next &raquo;
                        <?php endif; ?>
                    </li>
                </ul>
            <?php endif; ?>
        </div>

        <?php include('/xampp/htdocs/webb/partials/mini_footer.php') ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php $conn->close(); ?>
