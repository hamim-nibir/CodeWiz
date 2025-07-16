<?php
session_start();
require_once "/xampp/htdocs/webb/partials/dbconnection.php";

if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

$uid = $_SESSION['uid'];
$success = "";

// Fetch current user data
$stmt = $conn->prepare("SELECT full_name, email, contact_number, region_flag FROM user WHERE uid = ?");
$stmt->bind_param("i", $uid);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $contact_number = $_POST['contact_number'];
    $region_flag = $_POST['region_flag'];

    $update = $conn->prepare("UPDATE user SET full_name = ?, contact_number = ?, region_flag = ? WHERE uid = ?");
    $update->bind_param("sssi", $full_name, $contact_number, $region_flag, $uid);
    $update->execute();

    $success = "Profile updated successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php include("partials/navbar.php"); ?>

<div class="container mt-5 pt-4">
    <h3>Edit Profile</h3>
    <?php if ($success): ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="full_name" class="form-control" value="<?php echo htmlspecialchars($user['full_name']); ?>">
        </div>

        <div class="form-group">
            <label>Email Address</label>
            <input type="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" readonly disabled>
            <small class="form-text text-muted">Email cannot be changed.</small>
        </div>

        <div class="form-group">
            <label>Contact Number</label>
            <input type="text" name="contact_number" class="form-control" value="<?php echo htmlspecialchars($user['contact_number']); ?>">
        </div>

        <div class="form-group">
            <label for="region_flag">Region / Country</label>
            <input 
                type="text" 
                id="regionSearch" 
                class="form-control" 
                placeholder="Start typing country..." 
                value="<?php echo htmlspecialchars($user['region_flag'], ENT_QUOTES); ?>" 
                autocomplete="off" 
                required>
            
            <!-- ✅ Hidden field to submit the selected region flag -->
            <input type="hidden" name="region_flag" id="regionFlagValue" value="<?php echo htmlspecialchars($user['region_flag'], ENT_QUOTES); ?>">

            <div id="countryList" class="list-group mt-1"></div>
        </div>

        <button type="submit" class="btn btn-success">Update Profile</button><br>
        <a href="change_password.php" class="btn btn-outline-secondary mt-3">Change Password</a>
    </form>
</div>

<script>
const countries = [
  { name: "Bangladesh", code: "bd" },
  { name: "India", code: "in" },
  { name: "United States", code: "us" },
  { name: "Canada", code: "ca" },
  { name: "United Kingdom", code: "gb" },
  { name: "Germany", code: "de" },
  { name: "France", code: "fr" },
  { name: "Japan", code: "jp" },
  { name: "China", code: "cn" },
  { name: "Saudi Arabia", code: "sa" }
];

const searchInput = document.getElementById('regionSearch');
const suggestionBox = document.getElementById('countryList');
const flagValue = document.getElementById('regionFlagValue');

searchInput.addEventListener('input', function () {
  const query = this.value.toLowerCase();
  suggestionBox.innerHTML = '';

  if (query.length === 0) return;

  countries.filter(country => country.name.toLowerCase().includes(query)).forEach(country => {
    const item = document.createElement('a');
    item.href = "#";
    item.className = "list-group-item list-group-item-action";
    item.innerHTML = `<img src="https://flagcdn.com/24x18/${country.code}.png" style="margin-right:8px;"> ${country.name}`;
    item.addEventListener('click', function () {
      searchInput.value = country.name;
      flagValue.value = country.code; // Store only country code in DB
      suggestionBox.innerHTML = '';
    });
    suggestionBox.appendChild(item);
  });
});
</script>


</body>
</html>
