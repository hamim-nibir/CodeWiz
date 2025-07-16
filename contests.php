<?php
date_default_timezone_set("Asia/Dhaka");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CodeWiz | Contests</title>
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

        /* Main Content */
        .main-content {
            padding: 30px 0;
            margin-top: 50px;
        }

        /* Featured Cards */
        .featured-cards {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 20px;
            margin-bottom: 40px;
        }

        .card {
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
            color: white;
            min-height: 140px;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .card.running-contest {
            background: linear-gradient(135deg, #3c9884 0%, #5ba3d4 100%);
        }


        .card.data-structure {
            background: linear-gradient(135deg, #5dceb6 0%, #17aa9d 100%);
        }


        .card.language-skills {
            background: linear-gradient(135deg, #4cb780 0%, #5edd9b 100%);
        }

        .card.upsolve {
            background: linear-gradient(135deg, #4ab59a 0%, #30b07b 100%);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .card-title {
            font-size: 18px;
            font-weight: 700;
            color: white;
            line-height: 1.3;
        }

        .card-title1 {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-size: 18px;
            display: inline-flex;
            align-items: center;
            margin-top: 4px;
        }

        .card-subtitle {
            font-size: 15px;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 10px;
            line-height: 2.2;
            gap: 10px;
        }

        .card-content {
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.9;
        }

        .card-meta {
            margin-top: 15px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .card-meta span {
            background: rgba(255, 255, 255, 0.2);
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 12px;
        }

        .card-link {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-top: 10px;
        }

        .card-link:hover {
            color: white;
            transform: scale(1.2);
        }

        /* Section Headers */
        .section-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 24px;
            font-weight: 700;
            color: rgb(0, 0, 0);
        }

        .info-icon {
            width: 20px;
            height: 20px;
            background: #bdb8b8;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgb(0, 0, 0);
            font-size: 15px;
        }

        /* Tables */
        .table-container {
            background: #eaeffa;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        table {
            background-color: #eaeffa;
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #c7d1e9;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: #374151;
            border-bottom: 2px solid #9eb5e2;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #b1bfdb;
        }

        tr:hover td {
            background-color: #ffffff;
        }

        .code-cell {
            font-family: 'Courier New', monospace;
            font-weight: 600;
            color: #393943;
        }

        .participants {
            color: #5050f1;
            font-weight: 500;
        }

        .action-btn {
            background: linear-gradient(45deg, #9a9ae9, #b5e4f7);
            color: rgb(0, 0, 0);
            border: none;
            padding: 5px 16px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 15px;
            transition: transform 0.3s ease;
        }

        .action-btn:hover {
            transform: scale(1.2);
        }

        .view-all-btn {
            background: linear-gradient(45deg, #9fdfea, #82e6ff);
            color: rgb(0, 0, 0);
            border: none;
            padding: 12px 24px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 500;
            margin: 20px auto;
            display: block;
            transition: transform 0.3s ease;
        }

        .view-all-btn:hover {
            transform: scale(1.05);
        }

        /* Skill Tests Description */
        .skill-tests-desc {
            color: rgba(0, 0, 0, 0.9);
            margin-bottom: 20px;
            line-height: 1.6;
        }

        /* Status badges */
        .status-badge {
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 500;
        }

        .status-new {
            background: #dc2626;
            color: #fef2f2;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .featured-cards {
                grid-template-columns: 1fr !important;
            }

            table {
                font-size: 14px;
            }

            th,
            td {
                padding: 10px;
            }
        }
    </style>
</head>

<body>

    <div class="page-container">
        <?php include('/xampp/htdocs/webb/partials/navbar.php'); ?>
        <!-- main content -->
        <div class="main-content">
            <div class="container">
                <!-- Featured Cards -->
                <div class="featured-cards">
                    <?php
                    require_once "/xampp/htdocs/webb/partials/dbconnection.php";

                    // Set your local timezone (e.g., Bangladesh Time)
                    date_default_timezone_set("Asia/Dhaka");

                    // Get current datetime in format like 2025-07-01 10:10:00
                    $current_time = date('Y-m-d H:i:s');

                    // SQL to find running contest
                    $sql = "SELECT * FROM contests 
        WHERE start_time <= ? 
        AND DATE_ADD(start_time, INTERVAL duration MINUTE) >= ? 
        LIMIT 1";

                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ss", $current_time, $current_time);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $running = $result->fetch_assoc();
                    ?>

                    <div class="card running-contest">
                        <?php
                        $isRegistered = false;

                        if ($running) {
                            if (isset($_SESSION['uid'])) {
                                $uid = $_SESSION['uid'];
                                $contestId = $running['contest_id'];

                                $checkSql = "SELECT * FROM contest_registrations WHERE user_id = ? AND contest_id = ?";
                                $checkStmt = $conn->prepare($checkSql);
                                $checkStmt->bind_param("ii", $uid, $contestId);
                                $checkStmt->execute();
                                $checkResult = $checkStmt->get_result();

                                if ($checkResult->num_rows > 0) {
                                    $isRegistered = true;
                                }
                            }
                        }
                        ?>

                        <?php if ($running): ?>
                            <div class="card-title">
                                <?php if (isset($_SESSION['uid'])): ?>
                                    <?php if ($isRegistered): ?>
                                        <a href="participate.php?cid=<?= $running['contest_id'] ?>" class="card-title1">
                                            <?= htmlspecialchars($running['title']) ?>
                                        </a>
                                    <?php else: ?>
                                        <a href="#" class="card-title1" onclick="alert('❌ You must register before the contest starts.'); return false;">
                                            <?= htmlspecialchars($running['title']) ?>
                                        </a>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <a href="login.php" class="card-title1">
                                        <?= htmlspecialchars($running['title']) ?> (Login Required)
                                    </a>
                                <?php endif; ?>
                            </div>

                            <div class="card-meta">
                                <span><?= date('d M Y', strtotime($running['start_time'])) ?></span>
                                <span>
                                    <?= date('h:i A', strtotime($running['start_time'])) ?> to
                                    <?= date('h:i A', strtotime("+{$running['duration']} minutes", strtotime($running['start_time']))) ?>
                                </span>
                                <span id="contest-timer">Loading...</span>
                                <script>
                                    const endTime = new Date("<?= date('Y-m-d H:i:s', strtotime($running['start_time'] . " +{$running['duration']} minutes")) ?>").getTime();

                                    function updateContestTimer() {
                                        const now = new Date().getTime();
                                        const distance = endTime - now;

                                        if (distance <= 0) {
                                            document.getElementById("contest-timer").innerText = "Contest ended";
                                            clearInterval(timerInterval);
                                            return;
                                        }

                                        const h = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                        const m = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                        const s = Math.floor((distance % (1000 * 60)) / 1000);

                                        document.getElementById("contest-timer").innerText = `${h}h ${m}m ${s}s remaining`;
                                    }

                                    updateContestTimer();
                                    const timerInterval = setInterval(updateContestTimer, 1000);
                                </script>
                            </div>

                            <div class="mt-3">
                                <?php if (!isset($_SESSION['uid'])): ?>
                                    <a href="login.php" class="btn btn-warning">Login to Enter</a>
                                <?php elseif ($isRegistered): ?>
                                    <a href="participate.php?cid=<?= $running['contest_id'] ?>" class="btn btn-light">Enter</a>
                                <?php else: ?>
                                    <button class="btn btn-secondary" disabled>Not Registered</button>
                                <?php endif; ?>
                            </div>
                        <?php else: ?>
                            <div class="card-title">
                                <span class="card-title1">No contest is running</span>
                            </div>
                            <div class="card-subtitle">Check upcoming contests below</div>
                        <?php endif; ?>
                    </div>



                    <div class="card data-structure">
                        <div class="card-title">Master Data Structure and Algorithms</div>
                        <div class="card-content">
                            <a href="#" class="card-link">Start Roadmap ></a>
                        </div>
                    </div>

                    <div class="card language-skills">
                        <div class="card-title">
                            <a href="#" class="card-title1">Language Skills</a>
                        </div>
                        <div class="card-subtitle">Current practice</div>
                    </div>

                    <div class="card upsolve">
                        <div class="card-title">
                            <a href="#" class="card-title1">Upsolve</a>
                        </div>
                        <div class="card-subtitle">Recent problem solve</div>

                    </div>

                </div>



                <!-- Upcoming Contests -->
                <?php
                require_once "/xampp/htdocs/webb/partials/dbconnection.php";

                $now = date('Y-m-d H:i:s');
                $sql = "SELECT * FROM contests WHERE start_time > ? ORDER BY start_time ASC LIMIT 3";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $now);
                $stmt->execute();
                $result = $stmt->get_result();
                ?>

                <div class="section-header">
                    <h2 class="section-title">Upcoming Contests</h2>
                    <div class="info-icon">i</div>
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Starts</th>
                                <th>Duration</th>
                                <th>Starts In</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()):
                                $start_time = new DateTime($row['start_time']);
                                $start_timestamp = $start_time->getTimestamp(); // in seconds
                                $duration = (int)$row['duration'];
                                $hours = floor($duration / 60);
                                $mins = $duration % 60;
                                $duration_str = ($hours ? $hours . 'h ' : '') . ($mins ? $mins . 'm' : '');
                            ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['title']) ?></td>
                                    <td><?= $start_time->format('Y-m-d H:i') ?></td>
                                    <td><?= $duration_str ?></td>
                                    <td>
                                        <span class="countdown-timer" data-start="<?= $start_timestamp ?>"></span>
                                    </td>
                                    <td>
                                        <button class="register-btn btn btn-success btn-sm"
                                            data-contest-id="<?= $row['contest_id'] ?>">
                                            Register
                                        </button>
                                        <div class="register-message text-success small mt-1"></div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Set Contest Button -->
                <div class="text-center mt-5">
                    <button class="btn btn-primary" onclick="openSetterPopup()">Set Contest</button>
                </div>

                <!-- Setter ID Modal -->
                <div class="modal fade" id="setterModal" tabindex="-1" role="dialog" aria-labelledby="setterModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form id="setterForm" onsubmit="return checkSetterId(event)">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Enter Setter ID</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" id="setterId" class="form-control" placeholder="Enter Setter ID" required>
                                </div>
                                <div class="modal-footer">
                                    <!-- ✅ Close button added -->
                                    <button type="button" class="btn btn-secondary" onclick="closeSetterModal()">Close</button>

                                    <button type="submit" class="btn btn-success">Set Contest</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Top Skill Tests -->
                <div class="section-header">
                    <h2 class="section-title">Top Skill Tests</h2>
                    <div class="status-badge status-new">New</div>
                </div>

                <div class="skill-tests-desc">
                    Test your knowledge in Python, C, C++, and Java and DSA concepts. Skill tests help you check your industry readiness in the courses you are learning.
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Duration</th>
                                <th>Questions</th>
                                <th>Participants</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Python online Test & Quiz</td>
                                <td>1 hrs 30 min</td>
                                <td>30</td>
                                <td class="participants">35198</td>
                                <td><button class="action-btn">→</button></td>
                            </tr>
                            <tr>
                                <td>Java Online Test & Quiz</td>
                                <td>1 hrs 30 min</td>
                                <td>30</td>
                                <td class="participants">23657</td>
                                <td><button class="action-btn">→</button></td>
                            </tr>
                            <tr>
                                <td>C language online test</td>
                                <td>1 hrs 30 min</td>
                                <td>30</td>
                                <td class="participants">33967</td>
                                <td><button class="action-btn">→</button></td>
                            </tr>
                            <tr>
                                <td>C++ Online Test & Quiz</td>
                                <td>1 hrs 30 min</td>
                                <td>30</td>
                                <td class="participants">26715</td>
                                <td><button class="action-btn">→</button></td>
                            </tr>
                            <tr>
                                <td>SQL Online Test & Quiz</td>
                                <td>1 hrs</td>
                                <td>20</td>
                                <td class="participants">9973</td>
                                <td><button class="action-btn">→</button></td>
                            </tr>
                            <tr>
                                <td>Data Structure and algorithms in C++ Tests</td>
                                <td>2 hrs</td>
                                <td>25</td>
                                <td class="participants">5980</td>
                                <td><button class="action-btn"> → </button></td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="view-all-btn">View all skill tests</button>
                </div>

                <!-- Past Contests -->
                <?php
                $now = date('Y-m-d H:i:s');
                $pastSql = "SELECT * FROM contests WHERE DATE_ADD(start_time, INTERVAL duration MINUTE) < ? ORDER BY start_time DESC LIMIT 7";
                $pastStmt = $conn->prepare($pastSql);
                $pastStmt->bind_param("s", $now);
                $pastStmt->execute();
                $pastResult = $pastStmt->get_result();
                ?>

                <div class="section-header">
                    <h2 class="section-title">Past Contests</h2>
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Start</th>
                                <th>Duration</th>
                                <th>Participants</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $pastResult->fetch_assoc()):
                                $start = new DateTime($row['start_time']);
                                $duration = (int)$row['duration'];
                                $h = floor($duration / 60);
                                $m = $duration % 60;
                                $durationStr = ($h ? "{$h}h " : "") . "{$m}m";
                            ?>
                                <tr>
                                    <td class="code-cell">CONTEST<?php echo $row['contest_id']; ?></td>
                                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                                    <td><?php echo $start->format('d M Y D H:i'); ?></td>
                                    <td><?php echo $durationStr; ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary practice-btn" data-cid="<?php echo $row['contest_id']; ?>">
                                            Practice
                                        </button>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <?php include('/xampp/htdocs/webb/partials/mini_footer.php'); ?>

    </div>
    <!-- Scripts (order matters!) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function openSetterPopup() {
            $('#setterModal').modal('show');
        }

        function checkSetterId(event) {
            event.preventDefault();
            const setterId = document.getElementById("setterId").value.trim();
            if (setterId === "1234") {
                $('#setterModal').modal('hide');
                window.location.href = "create_contest.php";
            } else {
                alert("❌ Invalid setter ID");
            }
        }

        function closeSetterModal() {
            $('#setterModal').modal('hide');
        }

        //timer + reg
        // COUNTDOWN TIMER
        function updateCountdowns() {
            const now = Math.floor(Date.now() / 1000);
            document.querySelectorAll('.countdown-timer').forEach(el => {
                const start = parseInt(el.dataset.start);
                let diff = start - now;

                if (diff <= 0) {
                    el.textContent = 'Started';
                    return;
                }

                const d = Math.floor(diff / (60 * 60 * 24));
                diff %= (60 * 60 * 24);
                const h = Math.floor(diff / (60 * 60));
                diff %= (60 * 60);
                const m = Math.floor(diff / 60);
                const s = diff % 60;

                el.textContent =
                    (d > 0 ? d + 'd ' : '') +
                    (h > 0 ? h + 'h ' : '') +
                    (m > 0 ? m + 'm ' : '') +
                    s + 's';
            });
        }
        updateCountdowns();
        setInterval(updateCountdowns, 1000);

        // REGISTER BUTTON AJAX
        document.querySelectorAll('.register-btn').forEach(button => {
            button.addEventListener('click', function() {
                const contestId = this.dataset.contestId;

                fetch('register_contest.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: 'contest_id=' + contestId
                    })
                    .then(res => res.text())
                    .then(msg => {
                        if (msg === "success") {
                            alert("✅ Registered successfully!");
                        } else if (msg === "already_registered") {
                            alert("⚠️ You are already registered.");
                        } else if (msg === "not_logged_in") {
                            alert("❌ You must be logged in to register.");
                            window.location.href = "login.php";
                        } else {
                            alert("❌ Registration failed. Please try again.");
                        }
                    })
                    .catch(() => {
                        alert("❌ Error connecting to server.");
                    });
            });
        });

        //past contests
        document.querySelectorAll('.practice-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const cid = this.dataset.cid;

                // Send a request to check if logged in
                fetch('check_login_status.php')
                    .then(res => res.text())
                    .then(loggedIn => {
                        if (loggedIn === 'true') {
                            window.location.href = `participate.php?cid=${cid}&practice=1`;
                        } else {
                            alert("❌ You must be logged in to practice.");
                            window.location.href = "login.php";
                        }
                    });
            });
        });
    </script>
</body>

</html>