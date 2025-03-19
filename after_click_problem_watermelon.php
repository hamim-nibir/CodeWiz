<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeWiz - 1A. Watermelon Problem</title>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        
        
        /* Header & Navigation */
        header {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 10px 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-weight: bold;
            font-size: 24px;
            color: #333;
            text-decoration: none;
        }

        .logo span {
            color: #f76107;
        }
        
        .nav-menu {
            display: flex;
            list-style: none;
        }
        
        .nav-menu li a {
            padding: 10px 15px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }
        
        .nav-menu li a.active {
            color: #f76107;
        }
        
        .auth-buttons {
            display: flex;
            gap: 10px;
        }
        
        .btn {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
            text-align: center;
        }
        
        .btn-login {
            color: #333;
        }
        
        .btn-signup {
            background-color: #f9b934;
            color: #fff;
        }
        
        /* Subnav */
        .subnav {
            background-color: #eaf0fb;
            padding: 10px 0;
            border-bottom: 1px solid #d1deef;
        }
        
        .subnav-menu {
            display: flex;
            list-style: none;
        }
        
        .subnav-menu li a {
            padding: 5px 15px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }
        
        /* Problem Content */
        .problem-container {
            display: flex;
            background-color: #eaf0fb;
            border-radius: 0;
            overflow: hidden;
            min-height: calc(100vh - 130px);
        }
        
        .problem-content {
            flex: 7;
            padding: 20px 30px;
        }
        
        .submission-panel {
            flex: 3;
            padding: 20px;
            background-color: #f5f7fa;
            border-left: 1px solid #d1deef;
        }
        
        .problem-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .problem-description {
            margin-bottom: 20px;
            line-height: 1.7;
        }
        
        .section-title {
            font-weight: bold;
            margin: 20px 0 10px;
        }
        
        .example-table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        
        .example-table th, .example-table td {
            border: 1px solid #ccc;
            padding: 10px;
        }
        
        .example-table th {
            background-color: #eee;
            text-align: left;
        }
        
        .notes {
            margin-top: 15px;
            padding: 15px;
            background-color: #f7f7f7;
            border-radius: 4px;
        }
        
        /* Submission Panel */
        .submission-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }
        
        .form-select, .form-file {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        .btn-submit {
            background-color: #28a745;
            color: white;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }
        
        .btn-submit:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <a href="#" class="logo">CodeWiz</a>
                <ul class="nav-menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#" class="active">Problem Set</a></li>
                    <li><a href="#">Contests</a></li>
                    <li><a href="#">Blogs</a></li>
                    <li><a href="#">Dashboard</a></li>
                </ul>
                <div class="auth-buttons">
                    <a href="#" class="btn btn-login">LOGIN</a>
                    <a href="#" class="btn btn-signup">SIGN UP</a>
                </div>
            </nav>
        </div>
    </header>

    <div class="subnav">
        <div class="container">
            <ul class="subnav-menu">
                <li><a href="#">Problems</a></li>
                <li><a href="#">Submissions</a></li>
                <li><a href="#">Editorial</a></li>
            </ul>
        </div>
    </div>

    <div class="problem-container">
        <div class="problem-content">
            <h1 class="problem-title">1A. Watermelon</h1>
            
            <div class="problem-description">
                <p>One hot summer day Pete and his friend Billy decided to buy a watermelon. They chose the biggest and the ripest one, in their opinion. After that the watermelon was weighed, and the scales showed w kilos. They rushed home, dying of thirst, and decided to divide the berry, however they faced a hard problem.</p>
                <p>Pete and Billy are great fans of even numbers, so they want to divide the watermelon in such a way that each of the two parts weighs even number of kilos, at the same time it is not obligatory that the parts are equal. The boys are extremely tired and want to start their meal as soon as possible, that's why you should help them and find out, if they can divide the watermelon in the way they want. For sure, each of them should get a part of positive weight.</p>
            </div>
            
            <div class="problem-input">
                <h3 class="section-title">Input</h3>
                <p>The first (and the only) input line contains integer number w (1 ≤ w ≤ 100) — the weight of the watermelon bought by the boys.</p>
            </div>
            
            <div class="problem-output">
                <h3 class="section-title">Output</h3>
                <p>Print YES, if the boys can divide the watermelon into two parts, each of them weighing even number of kilos; and NO in the opposite case.</p>
            </div>
            
            <div class="problem-examples">
                <h3 class="section-title">Examples</h3>
                <table class="example-table">
                    <tr>
                        <th>Input</th>
                    </tr>
                    <tr>
                        <td>8</td>
                    </tr>
                    <tr>
                        <th>Output</th>
                    </tr>
                    <tr>
                        <td>Yes</td>
                    </tr>
                </table>
            </div>
            
            <div class="notes">
                <h3 class="section-title">Notes</h3>
                <p>For example, the boys can divide the watermelon into two parts of 2 and 6 kilos respectively (another variant — two parts of 4 and 4 kilos).</p>
            </div>
        </div>
        
        <div class="submission-panel">
            <h2 class="submission-title">Submission</h2>
            
            <div class="form-group">
                <label for="language">Language</label>
                <select id="language" class="form-select">
                    <option selected>Choose Language</option>
                    <option>C++</option>
                    <option>Java</option>
                    <option>Python</option>
                    <option>JavaScript</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="source-code">Source Code</label>
                <input type="file" id="source-code" class="form-file" value="No file Chosen">
            </div>
             
            <button class="btn-submit">Submit</button>
            
            <div style="height: 200px;"></div> <!-- Placeholder for additional content -->
        </div>
    </div>
</body>
</html>