<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeWiz - Practice Problems</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f9fafb;
            color: #333;
        }
        
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 24px;
            background-color: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        
        .logo {
            font-size: 22px;
            font-weight: bold;
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
        
        .user-menu {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .avatar {
            width: 32px;
            height: 32px;
            background-color: #ff8c00;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-weight: bold;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 24px;
        }
        
        .page-title {
            font-size: 24px;
            margin-bottom: 24px;
        }
        
        .category-tabs {
            display: flex;
            gap: 16px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }
        
        .category-tab {
            padding: 8px 12px;
            color: #666;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.2s;
        }
        
        .category-tab:hover {
            background-color: #f0f0f0;
        }
        
        .welcome-box {
            background-color: white;
            border-radius: 8px;
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        
        .welcome-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 12px;
        }
        
        .welcome-text {
            color: #666;
            line-height: 1.5;
            margin-bottom: 16px;
        }
        
        .browse-paths {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            color: #666;
            cursor: pointer;
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }
        
        .section-title {
            font-size: 18px;
            color: #333;
        }
        
        .section-links {
            display: flex;
            gap: 16px;
        }
        
        .section-link {
            color: #4285f4;
            font-size: 14px;
            text-decoration: none;
        }
        
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 16px;
            margin-bottom: 32px;
        }
        
        .practice-card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
            height: 100%;
        }
        
        .practice-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            height: 80px;
            display: flex;
            align-items: center;
            padding: 16px;
        }
        
        .card-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-weight: bold;
            margin-right: 12px;
        }
        
        .card-c { background-color: #4285f4; }
        .card-python { background-color: #ffc107; }
        .card-java { background-color: #e57373; }
        .card-js { background-color: #ffc107; }
        .card-html { background-color: #ff7043; }
        .card-sql { background-color: #4285f4; }
        .card-php { background-color: #5c6bc0; }
        
        .card-title {
            font-weight: 600;
            color: white;
        }
        
        .card-body {
            padding: 16px;
        }
        
        .card-desc {
            font-size: 14px;
            color: #666;
            line-height: 1.4;
            margin-bottom: 16px;
            height: 80px;
        }
        
        .card-footer {
            padding: 12px 16px;
            border-top: 1px solid #eee;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .problem-count {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 14px;
            color: #666;
        }
        
        .level-indicator {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 14px;
            color: #666;
        }
        
        /* Specific card header backgrounds */
        .card-blue { background-color: #4285f4; }
        .card-yellow { background-color: #ffc107; }
        .card-red { background-color: #e57373; }
        .card-orange { background-color: #ff7043; }
        .card-indigo { background-color: #5c6bc0; }
        
        @media (max-width: 768px) {
            .cards-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }
            
            .category-tabs {
                overflow-x: auto;
                padding-bottom: 8px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">CodeWiz</div>
        <div class="nav-links">
            <a href="#">Home</a>
            <a href="#">Problem Set</a>
            <a href="#" class="active">Contests</a>
            <a href="#">Blogs</a>
            <a href="#">Dashboard</a>
        </div>
        <div class="user-menu">
            <div class="avatar">U</div>
        </div>
    </nav>
    
    <div class="container">
        <h1 class="page-title">Practice problem:</h1>
        
        <div class="category-tabs">
            <div class="category-tab">Programming Languages</div>
            <div class="category-tab">Beginner DSA</div>
            <div class="category-tab">Data Structures</div>
            <div class="category-tab">Algorithms</div>
            <div class="category-tab">Difficulty rating wise</div>
            <div class="category-tab">Star wise paths</div>
        </div>
        
        <div class="welcome-box">
            <h2 class="welcome-title">Welcome to Practice!</h2>
            <p class="welcome-text">Practice over 5000+ problems and challenges in coding languages like Python, Java, JavaScript, C++, SQL and HTML. Start with beginner friendly challenges and solve hard problems as you become better. Use these practice problems and challenges to prove your coding skills.</p>
            <div class="browse-paths">
                <span>🔍 Browse practice paths</span>
            </div>
        </div>
        
        <div class="section">
            <div class="section-header">
                <h2 class="section-title">Programming Languages</h2>
                <div class="section-links">
                    <a href="#" class="section-link">Recent Contest Problems →</a>
                    <a href="#" class="section-link">Old practice page →</a>
                </div>
            </div>
            
            <div class="cards-grid">
                <div class="practice-card">
                    <div class="card-header card-blue">
                        <div class="card-icon card-c">C</div>
                        <div class="card-title">Practice C++</div>
                    </div>
                    <div class="card-body">
                        <p class="card-desc">Solve C++ Practice problems online. Master your C++ coding practice on CodeChef. Answer MCQs, exercise your programming skills.</p>
                    </div>
                    <div class="card-footer">
                        <div class="problem-count">
                            <span>268 Problems</span>
                        </div>
                        <div class="level-indicator">
                            <span>Beginner level</span>
                        </div>
                    </div>
                </div>
                
                <div class="practice-card">
                    <div class="card-header card-yellow">
                        <div class="card-icon card-python">Py</div>
                        <div class="card-title">Practice Python</div>
                    </div>
                    <div class="card-body">
                        <p class="card-desc">Solve Python coding problems online. Master your Python on CodeChef. Write code for over 175 practice problems.</p>
                    </div>
                    <div class="card-footer">
                        <div class="problem-count">
                            <span>743 Problems</span>
                        </div>
                        <div class="level-indicator">
                            <span>Beginner level</span>
                        </div>
                    </div>
                </div>
                
                <div class="practice-card">
                    <div class="card-header card-red">
                        <div class="card-icon card-java">Ja</div>
                        <div class="card-title">Practice Java</div>
                    </div>
                    <div class="card-body">
                        <p class="card-desc">CodeChef's Java coding practice will give you optimal Java course on CodeChef. Solve over...</p>
                    </div>
                    <div class="card-footer">
                        <div class="problem-count">
                            <span>161 Problems</span>
                        </div>
                        <div class="level-indicator">
                            <span>Beginner level</span>
                        </div>
                    </div>
                </div>
                
                <div class="practice-card">
                    <div class="card-header card-blue">
                        <div class="card-icon card-c">C</div>
                        <div class="card-title">Practice C</div>
                    </div>
                    <div class="card-body">
                        <p class="card-desc">Improve your C programming skills with our set of coding practice problems. Solve these beginner...</p>
                    </div>
                    <div class="card-footer">
                        <div class="problem-count">
                            <span>223 Problems</span>
                        </div>
                        <div class="level-indicator">
                            <span>Beginner level</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="section">
            <div class="section-header">
                <h2 class="section-title">Beginner DSA</h2>
            </div>
            
            <div class="cards-grid">
                <div class="practice-card">
                    <div class="card-header card-blue">
                        <div class="card-title">Practice Strings</div>
                    </div>
                    <div class="card-body">
                        <p class="card-desc">Practice String operations in C++, Python, Java and ten other languages. Solve these questions...</p>
                    </div>
                    <div class="card-footer">
                        <div class="problem-count">
                            <span>27 Problems</span>
                        </div>
                        <div class="level-indicator">
                            <span>Beginner level</span>
                        </div>
                    </div>
                </div>
                
                <div class="practice-card">
                    <div class="card-header card-blue">
                        <div class="card-title">Practice Arrays</div>
                    </div>
                    <div class="card-body">
                        <p class="card-desc">Solve Array operation problems to start learning data structures and algorithms. This curated set of 24...</p>
                    </div>
                    <div class="card-footer">
                        <div class="problem-count">
                            <span>23 Problems</span>
                        </div>
                        <div class="level-indicator">
                            <span>Beginner level</span>
                        </div>
                    </div>
                </div>
                
                <div class="practice-card">
                    <div class="card-header card-blue">
                        <div class="card-title">Practice Basic Math</div>
                    </div>
                    <div class="card-body">
                        <p class="card-desc">Basic Math includes problems on topics like arithmetic, sequences, and counting, which are...</p>
                    </div>
                    <div class="card-footer">
                        <div class="problem-count">
                            <span>25 Problems</span>
                        </div>
                        <div class="level-indicator">
                            <span>Beginner level</span>
                        </div>
                    </div>
                </div>
                
                <div class="practice-card">
                    <div class="card-header card-blue">
                        <div class="card-title">Practice Sorting</div>
                    </div>
                    <div class="card-body">
                        <p class="card-desc">Practice problems which require you to use sorting algorithms to solve the sort of hard. These...</p>
                    </div>
                    <div class="card-footer">
                        <div class="problem-count">
                            <span>15 Problems</span>
                        </div>
                        <div class="level-indicator">
                            <span>Beginner level</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="section">
            <div class="cards-grid">
                <div class="practice-card">
                    <div class="card-header card-yellow">
                        <div class="card-title">Practice JavaScript</div>
                    </div>
                    <div class="card-body">
                        <p class="card-desc">Practice JavaScript online with our set of coding problems designed for beginners. Solve these JavaScript...</p>
                    </div>
                    <div class="card-footer">
                        <div class="problem-count">
                            <span>111 Problems</span>
                        </div>
                        <div class="level-indicator">
                            <span>Beginner level</span>
                        </div>
                    </div>
                </div>
                
                <div class="practice-card">
                    <div class="card-header card-orange">
                        <div class="card-title">Projects using HTML / CSS</div>
                    </div>
                    <div class="card-body">
                        <p class="card-desc">Practice HTML and CSS with our list of fun projects to build sites. Solve MCQ exercise...</p>
                    </div>
                    <div class="card-footer">
                        <div class="problem-count">
                            <span>114 Problems</span>
                        </div>
                        <div class="level-indicator">
                            <span>Beginner level</span>
                        </div>
                    </div>
                </div>
                
                <div class="practice-card">
                    <div class="card-header card-blue">
                        <div class="card-title">SQL Practice Queries</div>
                    </div>
                    <div class="card-body">
                        <p class="card-desc">Practice queries on Select, Where, Limit, Order By, Aggregate functions and Joins. Sub-queries and Over...</p>
                    </div>
                    <div class="card-footer">
                        <div class="problem-count">
                            <span>90 Problems</span>
                        </div>
                        <div class="level-indicator">
                            <span>Intermediate level</span>
                        </div>
                    </div>
                </div>
                
                <div class="practice-card">
                    <div class="card-header card-indigo">
                        <div class="card-title">Practice PHP</div>
                    </div>
                    <div class="card-body">
                        <p class="card-desc">Enhance your PHP skills with our hands-on practice portal. Master PHP syntax and functions...</p>
                    </div>
                    <div class="card-footer">
                        <div class="problem-count">
                            <span>139 Problems</span>
                        </div>
                        <div class="level-indicator">
                            <span>Beginner level</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>