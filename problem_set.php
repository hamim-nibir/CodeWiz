<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeWiz - Problem Set</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f8fa;
        }
        
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 24px;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        
        .logo {
            font-size: 22px;
            font-weight: bold;
        }

        .logo span {
            color: #f76107;
        }
        
        .nav-links {
            display: flex;
            align-items: center;
            gap: 24px;
        }
        
        .nav-links a {
            text-decoration: none;
            color: #333;
            padding: 8px 12px;
        }
        
        .nav-links a.active {
            color: #ff3e3e;
            font-weight: 500;
        }
        
        .login-btn {
            background: none;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            font-weight: 500;
        }
        
        .signup-btn {
            background-color: #ffc107;
            color: #333;
            border: none;
            border-radius: 4px;
            padding: 8px 16px;
            cursor: pointer;
            font-weight: 500;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 24px;
        }
        
        .page-title {
            font-size: 24px;
            margin-bottom: 24px;
            color: #333;
        }
        
        .filter-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 16px;
        }
        
        .difficulty-filter {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .difficulty-filter span {
            color: #333;
            font-weight: 500;
        }
        
        .difficulty-slider {
            display: flex;
            gap: 8px;
        }
        
        .difficulty-min, .difficulty-max {
            width: 80px;
            height: 32px;
            background-color: #f0f0f0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        .filter-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 8px 16px;
            cursor: pointer;
        }
        
        .search-box {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .search-input {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 240px;
        }
        
        .search-btn {
            background: none;
            border: none;
            cursor: pointer;
        }
        
        .problems-table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }
        
        .problems-table th {
            background-color: #f9f9f9;
            padding: 12px 16px;
            text-align: left;
            color: #333;
            font-weight: 500;
        }
        
        .problems-table td {
            padding: 12px 16px;
            border-top: 1px solid #eee;
        }
        
        .problems-table tr:nth-child(even) {
            background-color: #e5f7f2;
        }
        
        .tag {
            display: inline-block;
            background-color: #e9ecef;
            padding: 4px 8px;
            border-radius: 4px;
            margin-right: 4px;
            font-size: 12px;
            color: #555;
        }
        
        .solved-yes {
            color: green;
            font-weight: 500;
        }
        
        .solved-no {
            color: #ff3e3e;
            font-weight: 500;
        }
        
        .empty-row {
            height: 48px;
            background-color: #f5f8fa !important;
        }
        
        @media (max-width: 768px) {
            .filter-section {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .search-box {
                width: 100%;
            }
            
            .search-input {
                width: 100%;
            }
            
            .problems-table {
                font-size: 14px;
            }
            
            .problems-table th, .problems-table td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">CodeWiz</div>
        <div class="nav-links">
            <a href="#">Home</a>
            <a href="#" class="active">Problem Set</a>
            <a href="#">Contests</a>
            <a href="#">Blogs</a>
            <a href="#">Dashboard</a>
            <button class="login-btn">LOGIN</button>
            <button class="signup-btn">SIGN UP</button>
        </div>
    </nav>
    
    <div class="container">
        <h1 class="page-title">Problems</h1>
        
        <div class="filter-section">
            <div class="difficulty-filter">
                <span>Difficulty :</span>
                <div class="difficulty-slider">
                    <div class="difficulty-min"></div>
                    <div class="difficulty-max"></div>
                    <button class="filter-btn">Filter</button>
                </div>
            </div>
            
            <div class="search-box">
                <input type="text" placeholder="Search text" class="search-input">
                <button class="search-btn">🔍</button>
            </div>
        </div>
        
        <table class="problems-table">
            <thead>
                <tr>
                    <th>Problem ID</th>
                    <th>Title</th>
                    <th>Tags</th>
                    <th>Difficulty</th>
                    <th>Solved</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1A</td>
                    <td>Watermelon</td>
                    <td>
                        <span class="tag">Basic</span>
                        <span class="tag">Math</span>
                    </td>
                    <td>800</td>
                    <td class="solved-yes">Yes</td>
                </tr>
                <tr>
                    <td>1B</td>
                    <td>Farmer John's Card Game</td>
                    <td>
                        <span class="tag">Greedy</span>
                        <span class="tag">Sortings</span>
                    </td>
                    <td>1000</td>
                    <td class="solved-no">No</td>
                </tr>
                <tr>
                    <td>2A</td>
                    <td>Kavin and Arithmetic</td>
                    <td>
                        <span class="tag">Brute Force</span>
                    </td>
                    <td>800</td>
                    <td class="solved-yes">Yes</td>
                </tr>
                <tr>
                    <td>2B</td>
                    <td>Game of Mathlets</td>
                    <td>
                        <span class="tag">Greedy</span>
                        <span class="tag">Sortings</span>
                        <span class="tag">Games</span>
                    </td>
                    <td>900</td>
                    <td class="solved-yes">Yes</td>
                </tr>
                <tr>
                    <td>2C</td>
                    <td>Minimal Coprime</td>
                    <td>
                        <span class="tag">Math</span>
                        <span class="tag">Number Theory</span>
                    </td>
                    <td>1000</td>
                    <td class="solved-no">No</td>
                </tr>
                <tr class="empty-row">
                    <td colspan="5"></td>
                </tr>
                <tr class="empty-row">
                    <td colspan="5"></td>
                </tr>
                <tr class="empty-row">
                    <td colspan="5"></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>