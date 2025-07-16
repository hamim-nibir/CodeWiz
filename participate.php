<?php
session_start();
require_once "/xampp/htdocs/webb/partials/dbconnection.php";

if (!isset($_SESSION['user_logged_in']) || !isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['cid'])) {
    die("Invalid contest ID.");
}

$contest_id = intval($_GET['cid']);

// Fetch contest info
$stmt = $conn->prepare("SELECT * FROM contests WHERE contest_id = ?");
$stmt->bind_param("i", $contest_id);
$stmt->execute();
$contest = $stmt->get_result()->fetch_assoc();

if (!$contest) {
    die("Contest not found.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CodeWiz | Participate</title>
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
            height: 100%;
        }

        .page-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .main-container {
            display: flex;
            flex-direction: row-reverse;
            margin-top: 100px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            padding: 0 20px;
            gap: 30px;
        }

        .sidebar {
            width: 250px;
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
            height: fit-content;
            margin-top: 60px;
        }

        .sidebar h5 {
            margin-bottom: 15px;
            font-size: 18px;
        }

        .tab-btn {
            display: block;
            margin-bottom: 10px;
            text-decoration: none;
            color: #2c3e50;
            font-weight: 500;
            padding: 6px 12px;
            border-radius: 6px;
            transition: background 0.2s ease;
        }

        .tab-btn:hover,
        .tab-btn.active {
            background-color: #009970;
            color: #fff;
        }

        .content {
            flex: 1;
        }

        h4 {
            font-weight: 600;
            color: #2c3e50;
        }

        #tab-content {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="page-container">
        <?php include('/xampp/htdocs/webb/partials/navbar.php'); ?>

        <div class="main-container">
            <!-- Sidebar -->
            <div class="sidebar">
                <h5>Contest Menu</h5>
                <a href="#" class="tab-btn active" data-tab="problems">📄 Problems</a>
                <a href="#" class="tab-btn" data-tab="standings">🏆 Standings</a>
                <a href="#" class="tab-btn" data-tab="announcements">📢 Announcements</a>
                <a href="contests.php">← Back to Contests</a>

                <div class="mt-4 p-2 bg-light text-center rounded">
                    <strong>⏳ Time Left</strong>
                    <div id="countdown" style="font-weight: bold; font-size: 16px; margin-top: 5px;">Loading...</div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="content">
                <h4><?php echo htmlspecialchars($contest['title']); ?></h4>
                <p>
                    <strong>Start:</strong> <?php echo date('d M Y h:i A', strtotime($contest['start_time'])); ?> |
                    <strong>Duration:</strong> <?php echo $contest['duration']; ?> mins
                </p>

                <div id="tab-content" class="mt-4">
                    Loading...
                </div>
            </div>
        </div>

        <?php include('/xampp/htdocs/webb/partials/mini_footer.php'); ?>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        const cid = <?= json_encode($contest_id) ?>;

        function loadTab(tab) {
            $("#tab-content").html("Loading...");
            $.get(`load_${tab}.php?cid=${cid}`, function(data) {
                $("#tab-content").html(data);
            });
        }

        // Handle sidebar tab clicks
        $(".tab-btn").click(function(e) {
            e.preventDefault();
            const tab = $(this).data("tab");
            loadTab(tab);
            $(".tab-btn").removeClass("active");
            $(this).addClass("active");
        });

        // Load default tab
        loadTab("problems");

        // Countdown timer
        const endTime = new Date("<?= date('Y-m-d H:i:s', strtotime($contest['start_time'] . " +{$contest['duration']} minutes")) ?>").getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const distance = endTime - now;

            if (distance <= 0) {
                document.getElementById("countdown").innerText = "Contest Ended";
                clearInterval(timerInterval);
                return;
            }

            const h = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const m = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const s = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("countdown").innerText = `${h}h ${m}m ${s}s`;
        }

        updateCountdown();
        const timerInterval = setInterval(updateCountdown, 1000);
    </script>
</body>

</html>
