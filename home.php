<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CodeWiz | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
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

        .hero {
            text-align: center;
            animation: fadeIn 1.5s ease-out;
            margin-top: 200px;
            margin-bottom: 120px;
        }

        .hero h2 {
            font-size: 42px;
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .hero p {
            font-size: 20px;
            color: #555;
            font-weight: 300;
            margin-bottom: 25px;
        }

        .call-to-action {
            display: inline-block;
            background-color: #009970;
            color: #fff;
            font-size: 18px;
            padding: 12px 25px;
            border-radius: 30px;
            text-decoration: none;
            transition: 0.3s ease-in-out;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .call-to-action:hover {
            text-decoration: none;
            background-color: #009970;
            transform: translateY(-3px);
        }

        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .element {
            position: absolute;
            font-size: 18px;
            color: rgba(44, 62, 80, 0.3);
            animation: float 8s infinite ease-in-out;
        }
    </style>
</head>

<body>

    <div class="page-container">
        <?php include('/xampp/htdocs/webb/partials/navbar.php'); ?>
        <div class="hero">
            <h2>Master Competitive Programming</h2>
            <p>Sharpen your coding skills and compete with the best minds.</p>
            <?php if (isset($_SESSION['uid'])): ?>
                <a href="problemset.php" class="call-to-action">Explore!</a>
            <?php else: ?>
                <a href="login.php" class="call-to-action">Join CodeWiz</a>
            <?php endif; ?>
        </div>

        <!-- Floating Elements -->
        <div class="floating-elements">
            <div class="element" style="left: 10%; animation-delay: 0s;">{ }</div>
            <div class="element" style="left: 30%; animation-delay: 2s;">( )</div>
            <div class="element" style="left: 50%; animation-delay: 4s;">[ ]</div>
            <div class="element" style="left: 70%; animation-delay: 1s;">∑</div>
            <div class="element" style="left: 90%; animation-delay: 3s;">λ</div>
        </div>

        <?php include('/xampp/htdocs/webb/partials/footer.php'); ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
