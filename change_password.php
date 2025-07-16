<?php
session_start();
require_once "/xampp/htdocs/webb/partials/dbconnection.php";

if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

$uid = $_SESSION['uid'];
$success = $error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old_pass = $_POST['old_password'];
    $new_pass = $_POST['new_password'];
    $confirm_pass = $_POST['confirm_password'];

    // Fetch current hashed password
    $stmt = $conn->prepare("SELECT password FROM user WHERE uid = ?");
    $stmt->bind_param("i", $uid);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Validate old password
    if (!password_verify($old_pass, $user['password'])) {
        $error = "❌ Old password is incorrect.";
    } elseif (strlen($new_pass) < 8) {
        $error = "❌ Password must be at least 8 characters.";
    } elseif ($new_pass !== $confirm_pass) {
        $error = "❌ New password and confirm password do not match.";
    } else {
        $hashed = password_hash($new_pass, PASSWORD_DEFAULT);
        $update = $conn->prepare("UPDATE user SET password = ? WHERE uid = ?");
        $update->bind_param("si", $hashed, $uid);
        $update->execute();
        $success = "✅ Password changed successfully!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php include("partials/navbar.php"); ?>
<div class="container mt-5 pt-4">
    <h3>Change Password</h3>
    <?php if ($error): ?><div class="alert alert-danger"><?php echo $error; ?></div><?php endif; ?>
    <?php if ($success): ?><div class="alert alert-success"><?php echo $success; ?></div><?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label>Old Password</label>
            <input type="password" name="old_password" class="form-control" required>
        </div>
        <div class="form-group">
            <label>New Password</label>
            <input type="password" name="new_password" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Confirm New Password</label>
            <input type="password" name="confirm_password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary" style="background-color: #009970;">Change Password</button>
        <a href="edit_profile.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
