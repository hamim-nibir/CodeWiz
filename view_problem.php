<?php
require_once '/xampp/htdocs/webb/partials/dbconnection.php';

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

<?php
session_start();
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
    <style>
.page-container {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}
.main-container {
    display: flex;
     margin-top: 100px;
    padding: 0 5%;
    gap: 30px;
}

.left-pane {
    width: 75%;
    background-color: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.left-pane h2 {
    color: #2c3e50;
    margin-bottom: 20px;
}

.section-title {
    font-weight: bold;
    margin-top: 25px;
    margin-bottom: 5px;
    color: #34495e;
}

pre {
    background-color: #f6f8fa;
    padding: 15px;
    border-radius: 8px;
    overflow-x: auto;
}

.right-pane {
    width: 25%;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.side-nav {
    background-color: #f0f0f0;
    padding: 10px;
    border-radius: 10px;
}

.side-nav a {
    display: block;
    padding: 10px;
    color: #2c3e50;
    text-decoration: none;
    border-radius: 6px;
}

.side-nav a:hover {
    background-color: #4a90e2;
    color: white;
}

.submit-box {
    background-color: #ffffff;
    padding: 15px;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.05);
}

.submit-box select,
.submit-box textarea,
.submit-box input[type="file"],
.submit-box button {
    width: 100%;
    margin-bottom: 10px;
}

.submit-box textarea {
    height: 150px;
    resize: vertical;
    padding: 10px;
}

.submit-box button {
    background-color: #009970;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
}

.submit-box button:hover {
    background-color: #3b78c2;
}

.tag-buttons {
    background-color: #ecf0f1;
    padding: 10px;
    border-radius: 10px;
}

.tag-buttons span {
    display: inline-block;
    background-color: #dfe6e9;
    padding: 5px 10px;
    margin: 5px 3px;
    border-radius: 20px;
    font-size: 13px;
    color: #2c3e50;
}
    </style>
</head>
<body>
<div class="page-container">
<?php include('/xampp/htdocs/webb/partials/navbar.php'); ?>
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
            <a href="submissions.php?problem_id=<?php echo $problem['id']; ?>">Submissions</a>
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
                <textarea name="code" id="code" placeholder="Write your solution here..."></textarea>

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
<?php include('/xampp/htdocs/webb/partials/mini_footer.php'); ?>
</div>
<!-- loading diaglogue -->
 <!-- Loading Modal -->
<div class="modal fade" id="loadingModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center p-4">
      <div class="spinner-border text-success" role="status"></div>
      <h5 class="mt-3">Processing your submission...</h5>
    </div>
  </div>
</div>

<script>
document.querySelector("form").addEventListener("submit", function () {
    const code = document.getElementById("code").value.trim();
    const file = document.getElementById("code_file").files[0];

    if ((code && file) || (!code && !file)) {
        return; // already handled by your earlier validation
    }

    // Show loading modal
    const loadingModal = new bootstrap.Modal(document.getElementById('loadingModal'));
    loadingModal.show();
});
</script>


</body>
</html>

<?php $conn->close(); ?>
