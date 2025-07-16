<?php
  if (isset($_POST["submit"])) {
    session_start();
    $userName = $_POST["username"];
    $Email = $_POST["email"];
    $Password = $_POST["password"];
    $Retype_password = $_POST["retype_password"];
    $passwordHash = password_hash($Password, PASSWORD_DEFAULT);

    require_once "/xampp/htdocs/webb/partials/dbconnection.php";


    // Check for duplicate username or email
    $sql = "SELECT * FROM user WHERE username = ? OR email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
      echo "<script>alert('Failed to prepare query');</script>";
      exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $userName, $Email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
      echo "<script>alert('Username or Email already exists');</script>";
    } else if (strlen($Password) < 8) {
      echo "<script>alert('Password must be at least 8 characters');</script>";
    } else if ($Password != $Retype_password) {
      echo "<script>alert('Password and Retype password must be the same');</script>";
    } else {
      // Insert new user into the appropriate table
      $sql = "INSERT INTO user (username, email, password) VALUES (?, ?, ?)";
      $stmt = mysqli_prepare($conn, $sql);
      if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $userName, $Email, $passwordHash);
        mysqli_stmt_execute($stmt);
        echo "<script>alert('Registration Successful!');</script>";
        header("Location: home.php");
      } else {
        echo "<script>alert('Something went wrong during registration');</script>";
      }
    }
  }

  // login
  if (isset($_POST['btn_login'])) {
    session_start();
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    require_once "/xampp/htdocs/webb/partials/dbconnection.php";

    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $Email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($Password, $user['password'])) {
      $_SESSION['user_logged_in'] = true;
      $_SESSION['uid'] = $user['uid'];
      $_SESSION['username'] = $user['username'];
      echo "<script>alert('Logged in successfully!');</script>";
      header("Location: home.php");
      exit();
    } else {
      echo "<script>alert('Invalid email or password');</script>";
    }
  }

  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/login.css">
  <title>CodeWiz | Login</title>
  <!--Tab Icon-->
  <link rel="shortcut icon" href="" type="image/svg+xml">
  <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html, body {
    background: linear-gradient(to bottom, #f0f4f8, #d9e2ec);
    font-family: 'Poppins', sans-serif;
    color: #333;
    margin: 0;
    padding: 0;
    height: 100%;
}
.container {
    margin: 50px auto 40px;
    background-color: #fff;
    border-radius: 30px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
    position: relative;
    overflow: hidden;
    width: 400px;
    height: 450px;
    margin-top: 100px;
}

.container p {
    font-size: 14px;
    line-height: 20px;
    letter-spacing: 0.3px;
    margin: 20px 0;
}

.container span {
    font-size: 12px;
}

.container a {
    color: #333;
    font-size: 13px;
    text-decoration: none;
    margin: 15px 0 10px;
}

.container button {
    background-color: #009970;
    color: #fff;
    font-size: 12px;
    padding: 10px 45px;
    border: 1px solid transparent;
    border-radius: 8px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    margin-top: 10px;
    cursor: pointer;
}

.container button.hidden {
    background-color: transparent;
    border-color: #fff;
}

.container form {
    background-color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 40px;
    height: 100%;
}

.container input {
    background-color: #eee;
    border: none;
    margin: 8px 0;
    padding: 10px 15px;
    font-size: 13px;
    border-radius: 8px;
    width: 100%;
    outline: none;
}

.form-container {
    position: absolute;
    top: 0;
    height: 100%;
    transition: all 0.6s ease-in-out;
}

.sign-in {
    left: 0;
    width: 50%;
    z-index: 2;
}

.container.active .sign-in {
    transform: translateX(100%);
}

.sign-up {
    left: 0;
    width: 50%;
    opacity: 0;
    z-index: 1;
}

.container.active .sign-up {
    transform: translateX(100%);
    opacity: 1;
    z-index: 5;
    animation: move 0.6s;
}

@keyframes move {
    0%, 49.99% {
        opacity: 0;
        z-index: 1;
    }
    50%, 100% {
        opacity: 1;
        z-index: 5;
    }
}

.social-icons {
    margin: 20px 0;
}

.social-icons a {
    border: 1px solid #ccc;
    border-radius: 20%;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin: 0 3px;
    width: 40px;
    height: 40px;
}

.toggle-container {
    position: absolute;
    top: 0;
    left: 50%;
    width: 50%;
    height: 100%;
    overflow: hidden;
    transition: all 0.6s ease-in-out;
    border-radius: 150px 0 0 100px;
    z-index: 1000;
}

.container.active .toggle-container {
    transform: translateX(-100%);
    border-radius: 0 150px 100px 0;
}

.toggle {
    background-color: #009970;
    height: 100%;
    /* background: linear-gradient(to right, #5c6bc0,#009970); */
    background: #009970;
    color: #fff;
    position: relative;
    left: -100%;
    height: 100%;
    width: 200%;
    transform: translateX(0);
    transition: all 0.6s ease-in-out;
}

.container.active .toggle {
    transform: translateX(50%);
}

.toggle-panel {
    position: absolute;
    width: 50%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 30px;
    text-align: center;
    top: 0;
    transform: translateX(0);
    transition: all 0.6s ease-in-out;
}

.toggle-left {
    transform: translateX(-200%);
}

.container.active .toggle-left {
    transform: translateX(0);
}

.toggle-right {
    right: 0;
    transform: translateX(0);
}

.container.active .toggle-right {
    transform: translateX(200%);
}
  </style>
</head>

<body>
  
  <?php include('/xampp/htdocs/webb/partials/navbar.php')?>

  <!-- Login Page -->

  <div class="container" id="container">
    <div class="form-container sign-up">
      <form action="login.php" method="post">
        <h1>Create Account</h1>
        <input type="text" class="form-control" name="username" placeholder="Username" required>
        <input type="email" class="form-control" name="email" placeholder="Email" required>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        <input type="password" class="form-control" name="retype_password" placeholder="Retype Password" required>

        <button type="submit" name="submit">Register</button>
      </form>
    </div>
    <div class="form-container sign-in">
      <form action="login.php" method="post">
        <h1>Login</h1>
        <input type="email" class="form-control" name="email" placeholder="Email" required>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        <a href="/reset_password.php">Forgot Password?</a>
        <button type="btn_login" name="btn_login">Login</button>
      </form>
    </div>
    <div class="toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-left">
          <h1>Welcome!</h1>
          <p>Already have an account? Sign in.</p>
          <button class="hidden" id="login">Sign In</button>
        </div>
        <div class="toggle-panel toggle-right">
          <h1>Welcome!</h1>
          <p>Don't have an account? Sign up and master your coding skills.</p>
          <button class="hidden" id="register">Sign Up</button>
        </div>
      </div>
    </div>
  </div>

  <!--custom JS-->
  <script src="login.js"></script>

  <!--Bootstrap JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>