<?php
session_start();
require_once "/xampp/htdocs/webb/partials/dbconnection.php";

// Fetch problems for selection
$existing_problems = $conn->query("SELECT id, title FROM problems");

// Save form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['contest_title'];
    $duration = intval($_POST['duration']);
    $start_time = $_POST['start_time'];

    $insert_contest = $conn->prepare("INSERT INTO contests (title, duration, start_time) VALUES (?, ?, ?)");
    $insert_contest->bind_param("sis", $title, $duration, $start_time);
    $insert_contest->execute();
    $contest_id = $conn->insert_id;

    // Save selected existing problems
    if (!empty($_POST['existing_problems'])) {
        foreach ($_POST['existing_problems'] as $pid) {
            $stmt = $conn->prepare("INSERT INTO contest_problems (contest_id, problem_id) VALUES (?, ?)");
            $stmt->bind_param("ii", $contest_id, $pid);
            $stmt->execute();
        }
    }

    // Save custom problems
    if (!empty($_POST['custom_title'])) {
        for ($i = 0; $i < count($_POST['custom_title']); $i++) {
            $ptitle = $_POST['custom_title'][$i];
            $desc = $_POST['custom_description'][$i];
            $input = $_POST['custom_input'][$i];
            $output = $_POST['custom_output'][$i];
            $sample_in = $_POST['custom_sample_input'][$i];
            $sample_out = $_POST['custom_sample_output'][$i];
            $tags = $_POST['custom_tags'][$i];
            $difficulty = $_POST['custom_difficulty'][$i];

            $stmt = $conn->prepare("INSERT INTO problems (title, description, input_format, output_format, sample_input, sample_output, tags, difficulty) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $ptitle, $desc, $input, $output, $sample_in, $sample_out, $tags, $difficulty);
            $stmt->execute();
            $new_pid = $conn->insert_id;

            $link = $conn->prepare("INSERT INTO contest_problems (contest_id, problem_id) VALUES (?, ?)");
            $link->bind_param("ii", $contest_id, $new_pid);
            $link->execute();
        }
    }

    echo "<script>alert('✅ Contest created successfully!'); window.location.href='contests.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Contest</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
  <style>
    .container { margin-top: 100px; }
    .card { margin-bottom: 20px; position: relative; }
    textarea { resize: vertical; }
    .remove-btn {
        position: absolute;
        top: 10px;
        right: 10px;
    }
  </style>
</head>
<body>
<?php include('partials/navbar.php'); ?>

<div class="container">
  <h3>Create a New Contest</h3>
  <form method="post">
    <div class="form-group">
      <label>Contest Title</label>
      <input type="text" name="contest_title" class="form-control" required>
    </div>

    <div class="form-group">
      <label>Duration (minutes)</label>
      <input type="number" name="duration" class="form-control" required>
    </div>

    <div class="form-group">
      <label>Start Time</label>
      <input type="datetime-local" name="start_time" class="form-control" required>
    </div>

    <hr>
    <h5>Select Existing Problems</h5>
    <div class="mb-3">
      <?php while ($row = $existing_problems->fetch_assoc()): ?>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="existing_problems[]" value="<?= $row['id'] ?>" id="prob_<?= $row['id'] ?>">
          <label class="form-check-label" for="prob_<?= $row['id'] ?>"><?= htmlspecialchars($row['title']) ?></label>
        </div>
      <?php endwhile; ?>
    </div>

    <hr>
    <h5>Add Custom Problems</h5>
    <div id="custom-problems"></div>
    <button type="button" class="btn btn-secondary mb-3" onclick="addCustomProblem()">+ Add Custom Problem</button>

    <br>
    <button type="submit" class="btn btn-success">Create Contest</button>
  </form>
</div>

<script>
function addCustomProblem() {
    const container = document.getElementById("custom-problems");
    const index = container.children.length;

    const card = document.createElement('div');
    card.className = 'card p-3';
    card.innerHTML = `
      <button type="button" class="btn btn-danger btn-sm remove-btn" onclick="this.parentElement.remove()">Remove</button>
      <h6>Custom Problem #${index + 1}</h6>
      <div class="form-group">
        <input type="text" name="custom_title[]" class="form-control" placeholder="Title" required>
      </div>
      <div class="form-group">
        <textarea name="custom_description[]" class="form-control" placeholder="Description" required></textarea>
      </div>
      <div class="form-group">
        <textarea name="custom_input[]" class="form-control" placeholder="Input Format" required></textarea>
      </div>
      <div class="form-group">
        <textarea name="custom_output[]" class="form-control" placeholder="Output Format" required></textarea>
      </div>
      <div class="form-group">
        <textarea name="custom_sample_input[]" class="form-control" placeholder="Sample Input" required></textarea>
      </div>
      <div class="form-group">
        <textarea name="custom_sample_output[]" class="form-control" placeholder="Sample Output" required></textarea>
      </div>
      <div class="form-group">
        <textarea name="custom_tags[]" class="form-control" placeholder="Tags" required></textarea>
      </div>
      <div class="form-group">
        <textarea name="custom_difficulty[]" class="form-control" placeholder="Difficulty" required></textarea>
      </div>
    `;
    container.appendChild(card);
}
</script>
</body>
</html>
