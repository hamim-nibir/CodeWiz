<?php
session_start();
require_once "/xampp/htdocs/webb/partials/dbconnection.php";

if (!isset($_SESSION['user_logged_in']) || !isset($_SESSION['uid'])) {
    echo "<p class='text-danger'>You must be logged in to view problems.</p>";
    exit();
}

if (!isset($_GET['cid'])) {
    echo "<p class='text-danger'>Contest ID is missing.</p>";
    exit();
}

$cid = intval($_GET['cid']);

$stmt = $conn->prepare("
    SELECT p.id, p.title, p.tags, p.difficulty, p.solve_count 
    FROM contest_problems cp
    JOIN problems p ON cp.problem_id = p.id
    WHERE cp.contest_id = ?
");
$stmt->bind_param("i", $cid);
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="problem-table table-responsive">
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th style="width: 5%;">ID</th>
                <th style="width: 40%;">Title</th>
                <th>Tags</th>
                <th>Difficulty</th>
                <th style="width: 15%;">Solved</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td>
                            <a class="title-link" href="view_problem.php?id=<?php echo $row['id']; ?>">
                                <?php echo htmlspecialchars($row['title']); ?>
                            </a>
                        </td>
                        <td><?php echo htmlspecialchars($row['tags']); ?></td>
                        <td><?php echo htmlspecialchars($row['difficulty']); ?></td>
                        <td><?php echo $row['solve_count']; ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center text-muted">No problems available for this contest.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
