<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
require_once "/xampp/htdocs/webb/partials/dbconnection.php";

if (!isset($_SESSION['uid'])) {
    header("Location: login.php");
    exit();
}

$loggedInUid = $_SESSION['uid'];
$viewUid = isset($_GET['uid']) ? intval($_GET['uid']) : $loggedInUid;

// Fetch the user profile being viewed
$sql = "SELECT * FROM user WHERE uid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $viewUid);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "User not found.";
    exit;
}

// Populate profile info
$username = $user['username'];
$email = $user['email'];
$full_name = $user['full_name'];
$contact_no = $user['contact_number'];
$firstInitial = strtoupper($username[0]);
$regionFlag = $user['region_flag'];

// Determine if current user is viewing their own profile
$isOwnProfile = ($loggedInUid === $viewUid);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CodeWiz | User Dashboard</title>
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

        /* Main Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 24px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            margin-top: 50px;
        }

        /* Card Styles */
        .card {
            background-color: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        /* Profile Card */
        .profile-card {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .profile-avatar {
            width: 80px;
            height: 80px;
            background-color: #333;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        .profile-info h3 {
            font-size: 18px;
            margin-bottom: 8px;
            color: #333;
        }

        /* Personal Information */
        .personal-info h3 {
            margin-bottom: 16px;
            font-size: 18px;
            color: #333;
        }

        .profile-info h3 span img {
            vertical-align: middle;
            margin-left: 5px;
            border-radius: 3px;
        }


        .info-item {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
            color: #666;
        }

        .info-icon {
            width: 16px;
            height: 16px;
            background-color: #ccc;
            border-radius: 50%;
        }

        /* Programming Section */
        .programming-section h3 {
            margin-bottom: 16px;
            font-size: 18px;
            color: #333;
        }

        .programming-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .programming-item:last-child {
            border-bottom: none;
        }

        .programming-label {
            color: #333;
            font-weight: 500;
        }

        .programming-value {
            color: #666;
            font-weight: bold;
        }

        /* Skill Tests */
        .skill-tests {
            text-align: center;
        }

        .skill-tests h3 {
            margin-bottom: 20px;
            font-size: 18px;
            color: #333;
        }

        .skill-icon {
            width: 60px;
            height: 60px;
            background-color: #e0e0e0;
            border-radius: 8px;
            margin: 0 auto 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: #999;
        }

        .no-tests {
            color: #666;
            margin-bottom: 16px;
        }

        .skill-description {
            color: #666;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .view-tests-btn {
            background-color: transparent;
            border: 1px solid #ddd;
            padding: 8px 16px;
            border-radius: 6px;
            color: #666;
            cursor: pointer;
            font-size: 14px;
        }

        /* Badges */
        .badges h3 {
            margin-bottom: 20px;
            font-size: 18px;
            color: #333;
        }

        .badge-item {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 16px;
            padding: 12px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }

        .badge-icon {
            width: 40px;
            height: 40px;
            background-color: #a8d8ea;
            border-radius: 50%;
        }

        .badge-info h4 {
            font-size: 14px;
            color: #333;
            margin-bottom: 4px;
        }

        .badge-description {
            font-size: 12px;
            color: #666;
        }

        .view-badges-btn {
            background-color: transparent;
            border: 1px solid #ddd;
            padding: 8px 16px;
            border-radius: 6px;
            color: #666;
            cursor: pointer;
            font-size: 14px;
            width: 100%;
            margin-top: 16px;
        }

        /* Full Width Sections */
        .full-width {
            grid-column: 1 / -1;
        }

        /* Rank Chart */
        .rank-chart h3 {
            margin-bottom: 20px;
            font-size: 18px;
            color: #333;
        }

        .chart-container {
            height: 200px;
            background-color: #f9f9f9;
            border-radius: 8px;
            position: relative;
            overflow: hidden;
        }

        .chart-y-axis {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 50px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px 0;
            font-size: 12px;
            color: #666;
        }

        .chart-area {
            margin-left: 50px;
            height: 100%;
            background: linear-gradient(to right, #f0f0f0 0%, #f0f0f0 100%);
            position: relative;
        }

        /* Improved Heatmap Styles */
        .heatmap h3 {
            margin-bottom: 20px;
            font-size: 18px;
            color: #333;
        }

        .heatmap-container {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #e9ecef;
        }

        .heatmap-header {
            display: flex;
            align-items: center;
            margin-bottom: 16px;
        }

        .heatmap-months {
            display: grid;
            grid-template-columns: 50px repeat(53, 1fr);
            gap: 1px;
            margin-bottom: 8px;
            font-size: 12px;
            color: #666;
        }

        .heatmap-months .month-label {
            grid-column: span 4;
            text-align: left;
            font-weight: 500;
        }

        .heatmap-grid-wrapper {
            display: grid;
            grid-template-columns: 50px 1fr;
            gap: 8px;
            margin-bottom: 20px;
        }

        .heatmap-days {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            height: 105px;
        }

        .heatmap-day {
            font-size: 11px;
            color: #666;
            text-align: right;
            padding-right: 8px;
            line-height: 1;
        }

        .heatmap-grid {
            display: grid;
            grid-template-columns: repeat(53, 1fr);
            grid-template-rows: repeat(7, 1fr);
            gap: 2px;
            height: 105px;
        }

        .heatmap-cell {
            background-color: #ebedf0;
            border-radius: 2px;
            width: 100%;
            height: 100%;
            transition: all 0.2s ease;
            cursor: pointer;
            position: relative;
        }

        .heatmap-cell:hover {
            border: 1px solid #666;
            transform: scale(1.1);
            z-index: 10;
        }

        /* Activity levels */
        .heatmap-cell.level-0 {
            background-color: #ebedf0;
        }

        .heatmap-cell.level-1 {
            background-color: #9be9a8;
        }

        .heatmap-cell.level-2 {
            background-color: #40c463;
        }

        .heatmap-cell.level-3 {
            background-color: #30a14e;
        }

        .heatmap-cell.level-4 {
            background-color: #216e39;
        }

        .heatmap-legend {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 8px;
            margin-bottom: 20px;
            font-size: 12px;
            color: #666;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .legend-squares {
            display: flex;
            gap: 2px;
        }

        .legend-square {
            width: 10px;
            height: 10px;
            border-radius: 1px;
        }

        .heatmap-stats {
            display: flex;
            justify-content: space-around;
            text-align: center;
            border-top: 1px solid #e9ecef;
            padding-top: 20px;
        }

        .stat-item h4 {
            font-size: 24px;
            color: #333;
            margin-bottom: 4px;
            font-weight: bold;
        }

        .stat-label {
            font-size: 12px;
            color: #666;
        }

        /* Tooltip */
        .heatmap-tooltip {
            position: absolute;
            background-color: #000;
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 12px;
            pointer-events: none;
            z-index: 1000;
            white-space: nowrap;
            opacity: 0;
            transition: opacity 0.2s ease;
        }

        .heatmap-tooltip.show {
            opacity: 1;
        }

        img.flag-icon {
            vertical-align: middle;
            border-radius: 2px;
            margin-left: 6px;
        }


        /* Responsive */
        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
                padding: 16px;
            }

            .header {
                padding: 12px 16px;
            }

            .nav {
                display: none;
            }

            .heatmap-grid {
                grid-template-columns: repeat(26, 1fr);
            }

            .heatmap-months {
                grid-template-columns: 50px repeat(26, 1fr);
            }
        }
    </style>
</head>

<body>

    <div class="page-container">
        <?php include('/xampp/htdocs/webb/partials/navbar.php'); ?>
        <!-- Main Container -->
        <div class="container">
            <?php

            $uid = $_SESSION['uid'];

            // Fetch user's info
            $userQuery = "SELECT * FROM user WHERE uid = $uid";
            $userResult = mysqli_query($conn, $userQuery);
            $user = mysqli_fetch_assoc($userResult);

            // Get global score
            $global_score = $user['global_score'];
            $username = $user['username'];
            $flag = $user['region_flag'];

            // Calculate user's rank
            $rankQuery = "
    SELECT COUNT(*) + 1 AS rank
    FROM user
    WHERE global_score > $global_score
";
            $rankResult = mysqli_query($conn, $rankQuery);
            $rankRow = mysqli_fetch_assoc($rankResult);
            $rank = $rankRow['rank'];
            ?>
            <!-- Profile Card -->
            <div class="card profile-card">
                <div class="profile-avatar"><?php echo $firstInitial; ?></div>
                <div class="profile-info">
                    <h3>
                        <?php echo htmlspecialchars($username); ?>
                        <?php if (!empty($regionFlag)): ?>
                            <img src="https://flagcdn.com/24x18/<?php echo strtolower($regionFlag); ?>.png" alt="flag" class="ml-2" width="24" height="18">
                        <?php endif; ?>
                    </h3>
                    <div class="stat">
                        🌐 Global Score: <strong><?php echo $global_score; ?></strong>
                    </div>
                    <div class="stat">
                        🏅 Rank: <strong>#<?php echo $rank; ?></strong>
                    </div>
                    <?php if ($isOwnProfile): ?>
                        <a href="edit_profile.php" class="btn btn-sm btn-outline-primary mt-2">Edit Profile</a>
                    <?php endif; ?>

                </div>


            </div>

            <!-- Skill Tests -->
            <div class="card skill-tests">
                <h3>Skill Tests</h3>
                <div class="skill-icon">--</div>
                <div class="no-tests">No test taken</div>
                <div class="skill-description">
                    Build a strong profile by<br>
                    <span style="color: #4caf50;">giving skill tests</span>
                </div>
                <button class="view-tests-btn">View skill tests</button>
            </div>

            <!-- Personal Information -->
            <div class="card personal-info">
                <h3>Personal Information</h3>
                <div class="info-item">
                    <div class="info-icon"></div>
                    <span><?php echo htmlspecialchars($full_name); ?></span>
                </div>
                <div class="info-item">
                    <div class="info-icon"></div>
                    <span><?php echo htmlspecialchars($email); ?></span>
                </div>
                <div class="info-item">
                    <div class="info-icon"></div>
                    <span><?php echo htmlspecialchars($contact_no); ?></span>
                </div>
                <div class="info-item">
                    <div class="info-icon"></div>
                    <span>Location</span>
                </div>
            </div>

            <!-- Badges -->
            <div class="card badges">
                <h3>Badges</h3>
                <div class="badge-item">
                    <div class="badge-icon"></div>
                    <div class="badge-info">
                        <h4>Code Enthusiast - No Badge</h4>
                        <div class="badge-description">Earn a badge if you can code a simple program</div>
                    </div>
                </div>
                <div class="badge-item">
                    <div class="badge-icon"></div>
                    <div class="badge-info">
                        <h4>Problem Solver</h4>
                        <div class="badge-description">Solve 10 problems to earn this badge</div>
                    </div>
                </div>
                <button class="view-badges-btn">View More Badges</button>
            </div>

            <!-- Programming Section -->
            <div class="card programming-section">
                <h3>Start Learning Basic Programming</h3>
                <div class="programming-item">
                    <span class="programming-label">Completed</span>
                    <span class="programming-value">0</span>
                </div>
                <div class="programming-item">
                    <span class="programming-label">Coding Problems</span>
                    <span class="programming-value">0</span>
                </div>
                <div class="programming-item">
                    <span class="programming-label">Complicated</span>
                    <span class="programming-value">0</span>
                </div>
            </div>

            <!-- Rank Chart -->
            <div class="card full-width rank-chart">
                <h3>Rank based on activity</h3>
                <div class="chart-container">
                    <div class="chart-y-axis">
                        <div>1700</div>
                        <div>1300</div>
                        <div>1100</div>
                    </div>
                    <div class="chart-area"></div>
                </div>
            </div>

            <!-- Submissions Heatmap -->
            <div class="card full-width heatmap">
                <h3>Submissions Heat Map</h3>
                <div class="heatmap-container">
                    <div class="heatmap-months" id="heatmap-months">
                        <div></div> <!-- Empty cell for days column -->
                    </div>

                    <div class="heatmap-grid-wrapper">
                        <div class="heatmap-days">
                            <div class="heatmap-day">Sun</div>
                            <div class="heatmap-day">Mon</div>
                            <div class="heatmap-day">Tue</div>
                            <div class="heatmap-day">Wed</div>
                            <div class="heatmap-day">Thu</div>
                            <div class="heatmap-day">Fri</div>
                            <div class="heatmap-day">Sat</div>
                        </div>
                        <div class="heatmap-grid" id="heatmap-grid">
                            <!-- Cells will be generated by JavaScript -->
                        </div>
                    </div>

                    <div class="heatmap-legend">
                        <span>Less</span>
                        <div class="legend-squares">
                            <div class="legend-square level-0"></div>
                            <div class="legend-square level-1"></div>
                            <div class="legend-square level-2"></div>
                            <div class="legend-square level-3"></div>
                            <div class="legend-square level-4"></div>
                        </div>
                        <span>More</span>
                    </div>

                    <div class="heatmap-stats">
                        <div class="stat-item">
                            <h4><?php echo $user['problems_solved']; ?></h4>
                            <div class="stat-label">Total Problem Solved</div>
                        </div>

                        <div class="stat-item">
                            <h4><?php echo $user['contests_participated']; ?></h4>
                            <div class="stat-label">Total Participated Contests</div>
                        </div>

                        <div class="stat-item">
                            <h4><?php echo $user['problems_solved_last_month']; ?></h4>
                            <div class="stat-label">Problems Solved Last Month</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Tooltip for heatmap -->
        <div class="heatmap-tooltip" id="heatmap-tooltip"></div>

        <script>
            // Generate heatmap
            function generateHeatmap() {
                const grid = document.getElementById('heatmap-grid');
                const monthsContainer = document.getElementById('heatmap-months');
                const tooltip = document.getElementById('heatmap-tooltip');

                if (!grid || !monthsContainer) return;

                // Clear existing content
                grid.innerHTML = '';
                monthsContainer.innerHTML = '<div></div>'; // Empty cell for days column

                // Generate month labels
                const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                const today = new Date();
                const oneYearAgo = new Date(today.getFullYear() - 1, today.getMonth(), today.getDate());

                // Add month labels
                let currentMonth = oneYearAgo.getMonth();
                for (let week = 0; week < 53; week++) {
                    if (week % 4 === 0) {
                        const monthSpan = document.createElement('div');
                        monthSpan.className = 'month-label';
                        monthSpan.textContent = months[currentMonth % 12];
                        monthSpan.style.gridColumn = `${week + 2} / span 4`;
                        monthsContainer.appendChild(monthSpan);
                        currentMonth++;
                    }
                }

                // Generate cells (53 weeks × 7 days)
                for (let week = 0; week < 53; week++) {
                    for (let day = 0; day < 7; day++) {
                        const cell = document.createElement('div');
                        cell.className = 'heatmap-cell';

                        // Calculate the date for this cell
                        const cellDate = new Date(oneYearAgo);
                        cellDate.setDate(cellDate.getDate() + (week * 7) + day);

                        // Skip if date is in the future
                        if (cellDate > today) {
                            cell.style.opacity = '0.3';
                            cell.classList.add('level-0');
                        } else {
                            // Random activity level for demo (0-4)
                            const activityLevel = Math.floor(Math.random() * 5);
                            cell.classList.add(`level-${activityLevel}`);

                            // Store date and activity data
                            cell.dataset.date = cellDate.toISOString().split('T')[0];
                            cell.dataset.activity = activityLevel;
                        }

                        // Add hover effect
                        cell.addEventListener('mouseenter', (e) => {
                            const rect = e.target.getBoundingClientRect();
                            const date = new Date(e.target.dataset.date);
                            const activity = e.target.dataset.activity || 0;

                            tooltip.innerHTML = `
                            <strong>${activity} submissions</strong><br>
                            ${date.toLocaleDateString('en-US', { 
                                weekday: 'long', 
                                year: 'numeric', 
                                month: 'long', 
                                day: 'numeric' 
                            })}
                        `;

                            tooltip.style.left = `${rect.left + rect.width/2}px`;
                            tooltip.style.top = `${rect.top - tooltip.offsetHeight - 10}px`;
                            tooltip.classList.add('show');
                        });

                        cell.addEventListener('mouseleave', () => {
                            tooltip.classList.remove('show');
                        });

                        grid.appendChild(cell);
                    }
                }
            }

            // Initialize heatmap when page loads
            document.addEventListener('DOMContentLoaded', generateHeatmap);
        </script>

        <?php include('/xampp/htdocs/webb/partials/mini_footer.php'); ?>

    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>