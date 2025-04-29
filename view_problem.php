<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "codewiz"; // 🔁 Change to your DB name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check DB connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch problem by ID from GET
$problem = null;
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM problems WHERE id = $id";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $problem = $result->fetch_assoc();
    } else {
        die("Problem not found.");
    }
} else {
    die("No problem ID specified.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>CodeWiz - Competitive Programming Hub</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="view_problem.css">
</head>
<body>

<?php include('navbar.php'); ?>

<!-- Main Section -->
<div class="main-container">
    <!-- Left Pane: Problem Description -->
    <div class="left-pane">
        <h2><?php echo htmlspecialchars($problem['title']); ?></h2>

        <div class="section">
            <div class="section-title">Description</div>
            <p><?php echo nl2br(htmlspecialchars($problem['description'])); ?></p>
        </div>

        <div class="section">
            <div class="section-title">Input Format</div>
            <p><?php echo nl2br(htmlspecialchars($problem['input_format'])); ?></p>
        </div>

        <div class="section">
            <div class="section-title">Output Format</div>
            <p><?php echo nl2br(htmlspecialchars($problem['output_format'])); ?></p>
        </div>

        <div class="section">
            <div class="section-title">Sample Input</div>
            <pre><?php echo htmlspecialchars($problem['sample_input']); ?></pre>
        </div>

        <div class="section">
            <div class="section-title">Sample Output</div>
            <pre><?php echo htmlspecialchars($problem['sample_output']); ?></pre>
        </div>
    </div>

    <!-- Right Pane -->
    <div class="right-pane">

        <!-- Side Navbar -->
        <div class="side-nav">
            <a href="#">Submissions</a>
            <a href="#">Editorial</a>
            <a href="#">Comments</a>
        </div>

        <!-- Submission Box -->
        <div class="submit-box">
            <form action="submit.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="problem_id" value="<?php echo $problem['id']; ?>">
                
                <label for="language">Choose Language:</label>
                <select name="language" id="language" required>
                    <option value="cpp">C++</option>
                    <option value="java">Java</option>
                    <option value="python">Python</option>
                </select>

                <label for="code">Write Your Code:</label>
                <textarea name="code" id="code" placeholder="Write your solution here..." required></textarea>

                <label for="code_file">Or Upload File:</label>
                <input type="file" name="code_file" id="code_file" accept=".cpp,.py,.java">

                <button type="submit">Submit</button>
            </form>
        </div>

        <!-- Tag Buttons -->
        <div class="tag-buttons">
            <?php
            $tags = explode(',', $problem['tags']);
            foreach ($tags as $tag) {
                echo '<span>' . htmlspecialchars(trim($tag)) . '</span>';
            }
            ?>
        </div>
    </div>
</div>
<?php include('mini_footer.php'); ?>

</body>
</html>

<?php $conn->close(); ?>
