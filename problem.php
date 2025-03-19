<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CodeWiz - Problems</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background: linear-gradient(to bottom, #f0f4f8, #d9e2ec);
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            padding: 10px 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar-nav .nav-item .nav-link {
            font-size: 18px;
            color: #2c3e50 !important;
            padding: 8px 15px;
            border-radius: 20px;
        }

        .navbar-nav .nav-item .nav-link.active {
            background-color: #4a90e2;
            color: white !important;
        }

        .container {
            margin: 80px auto;
        }

        .problem-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
        }

        .submission-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-submit {
            background-color: #4a90e2;
            color: white;
            padding: 10px;
            border-radius: 5px;
            border: none;
            width: 100%;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #3b78c2;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <a class="navbar-brand" href="index.php">CodeWiz</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="problems.php">Problems</a>
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

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <!-- Problem Section -->
            <div class="col-md-7">
                <div class="problem-box">
                    <h3>Problem: Watermelon</h3>
                    <p><strong>Difficulty:</strong> Easy</p>
                    <p>
                    One hot summer day Pete and his friend Billy decided to buy a watermelon. They chose the biggest and the ripest one, in their opinion. After that the watermelon was weighed, and the scales showed w kilos. They rushed home, dying of thirst, and decided to divide the berry, however they faced a hard problem.
                    Pete and Billy are great fans of even numbers, that's why they want to divide the watermelon in such a way that each of the two parts weighs even number of kilos, at the same time it is not obligatory that the parts are equal. The boys are extremely tired and want to start their meal as soon as possible, that's why you should help them and find out, if they can divide the watermelon in the way they want. For sure, each of them should get a part of positive weight.
                    </p>
                    <h5>Input</h5>
                    <p>A single integer **w** (1 ≤ w ≤ 100), the weight of the watermelon.</p>
                    <h5>Output</h5>
                    <p>Print "YES" if you can divide the watermelon into two even parts, otherwise print "NO".</p>

                    <h5>Example</h5>
                    <pre><strong>Input:</strong> 8
<strong>Output:</strong> YES</pre>

                    <pre><strong>Input:</strong> 3
<strong>Output:</strong> NO</pre>
                </div>
            </div>

            <!-- Submission Box -->
            <div class="col-md-5">
                <div class="submission-box">
                    <h4>Submit Your Solution</h4>
                    <form action="submit_solution.php" method="POST" enctype="multipart/form-data">
                        <!-- Language Selection -->
                        <div class="form-group">
                            <label for="language">Choose Language:</label>
                            <select class="form-control" id="language" name="language">
                                <option value="cpp">C++</option>
                                <option value="java">Java</option>
                                <option value="python">Python</option>
                                <option value="c">C</option>
                                <option value="javascript">JavaScript</option>
                            </select>
                        </div>

                        <!-- Code Upload -->
                        <div class="form-group">
                            <label for="source_code">Upload Source Code:</label>
                            <input type="file" class="form-control-file" id="source_code" name="source_code" required>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn-submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
