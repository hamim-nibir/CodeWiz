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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(to bottom, #f0f4f8, #d9e2ec);
            font-family: 'Poppins', sans-serif;
            color: #333;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            padding: 10px 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            color: #2c3e50 !important;
            display: flex;
            align-items: center;
        }

        .navbar-nav .nav-item .nav-link {
            font-size: 18px;
            color: #2c3e50 !important;
            transition: 0.3s ease-in-out;
            padding: 8px 15px;
            border-radius: 20px;
        }

        .navbar-nav .nav-item .nav-link:hover {
            background-color: rgba(44, 62, 80, 0.1);
        }

        .hero {
            text-align: center;
            animation: fadeIn 1.5s ease-out;
            margin-top: 80px;
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
            background-color: #4a90e2;
            color: #fff;
            font-size: 18px;
            padding: 12px 25px;
            border-radius: 30px;
            text-decoration: none;
            transition: 0.3s ease-in-out;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .call-to-action:hover {
            background-color: #3b78c2;
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

        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes float {
            0% { transform: translateY(100vh); opacity: 0; }
            50% { opacity: 1; }
            100% { transform: translateY(-10vh); opacity: 0; }
        }

        .logo-container {
            width: 180px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .codewiz-text {
            font-size: 28px;
            fill: #2c3e50;
            font-weight: bold;
            text-anchor: middle;
        }

        .underline {
            stroke: #4a90e2;
            stroke-width: 3;
            stroke-dasharray: 100;
            stroke-dashoffset: 200;
            animation: draw 2s infinite linear;
        }

        @keyframes draw {
            0% { stroke-dashoffset: 200; }
            100% { stroke-dashoffset: 0; }
        }

    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <a class="navbar-brand">
            <div class="logo-container">
                <svg width="180" height="60" viewBox="0 0 180 60" xmlns="http://www.w3.org/2000/svg">
                    <text x="90" y="40" class="codewiz-text">CodeWiz</text>
                    <line x1="40" y1="45" x2="140" y2="45" class="underline" stroke-linecap="round"/>
                </svg>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="problem.php">Problems</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contests.php">Contests</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="leaderboard.php">Leaderboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signin.php">Sign In</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="hero">
        <h2>Master Competitive Programming</h2>
        <p>Sharpen your coding skills and compete with the best minds.</p>
        <a href="register.php" class="call-to-action">Join CodeWiz</a>
    </div>

    <!-- Floating Elements -->
    <div class="floating-elements">
        <div class="element" style="left: 10%; animation-delay: 0s;">{ }</div>
        <div class="element" style="left: 30%; animation-delay: 2s;">( )</div>
        <div class="element" style="left: 50%; animation-delay: 4s;">[ ]</div>
        <div class="element" style="left: 70%; animation-delay: 1s;">∑</div>
        <div class="element" style="left: 90%; animation-delay: 3s;">λ</div>
    </div>

</body>
</html>
