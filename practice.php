<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeWiz - Coding Contests and Skill Tests</title>
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
        
        /*.logo span {
            color: #f76107;
        }*/
        
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
        
        .user-profile {
            background-color: #f76107;
            color: white;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        
        /* Feature Cards */
        .feature-cards {
            display: flex;
            gap: 15px;
            margin: 20px 0;
            overflow-x: auto;
            padding: 10px 0;
        }
        
        .feature-card {
            background-color: #d3e0f3;
            border-radius: 8px;
            padding: 15px;
            min-width: 240px;
            position: relative;
        }
        
        .card-blue {
            background-color: #d3e0f3;
        }
        
        .card-dark-blue {
            background-color: #1e2a5a;
            color: white;
        }
        
        .card-purple {
            background-color: #d3d3e9;
        }
        
        .feature-title {
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .feature-subtitle {
            font-size: 12px;
            opacity: 0.8;
        }
        
        .feature-card-image {
            position: absolute;
            right: 10px;
            bottom: 0;
            width: 60px;
            height: 80px;
        }
        
        /* Section Styles */
        section {
            margin: 30px 0;
        }
        
        .section-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .section-title {
            font-size: 20px;
            font-weight: bold;
            margin-right: 10px;
        }
        
        .badge {
            background-color: #f76107;
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 12px;
        }
        
        .info-icon {
            color: #999;
            margin-left: 5px;
            cursor: pointer;
        }
        
        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #eaeffa;
            border-radius: 8px;
            overflow: hidden;
        }
        
        th {
            background-color: #c7d1e9;
            padding: 10px;
            text-align: left;
            font-weight: 500;
        }
        
        td {
            padding: 10px;
            border-bottom: 1px solid #dde5f4;
        }
        
        tr:last-child td {
            border-bottom: none;
        }
        
        .btn {
            display: inline-block;
            padding: 5px 15px;
            background-color: #e0e5f2;
            color: #333;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            text-align: center;
        }
        
        .btn-primary {
            background-color: #3f83f8;
            color: white;
        }
        
        .arrow-icon {
            color: #3f83f8;
        }
        
        /* Footer */
        footer {
            background-color: #1e2a5a;
            color: white;
            padding: 20px 0;
            margin-top: 40px;
        }
        
        .footer-content {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        
        .footer-column {
            flex: 1;
            min-width: 200px;
            margin-bottom: 20px;
        }
        
        .footer-column h3 {
            margin-bottom: 15px;
            font-size: 16px;
            color: #a3aed0;
        }
        
        .footer-column ul {
            list-style: none;
        }
        
        .footer-column ul li {
            margin-bottom: 5px;
        }
        
        .footer-column ul li a {
            color: white;
            text-decoration: none;
            font-size: 14px;
        }
        
        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
            margin-top: 20px;
        }
        
        .social-icons {
            display: flex;
            gap: 10px;
        }
        
        .social-icon {
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(255,255,255,0.1);
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <a href="#" class="logo">Code<span>Wiz</span></a>
                <ul class="nav-menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Problem Set</a></li>
                    <li><a href="#" class="active">Contests</a></li>
                    <li><a href="#">Blogs</a></li>
                    <li><a href="#">Dashboard</a></li>
                </ul>
                <div class="user-profile">C</div>
            </nav>
        </div>
    </header>

    <main class="container">
        <!-- Feature Cards -->
        <div class="feature-cards">
            <div class="feature-card card-blue">
                <div class="feature-content">
                    <div class="feature-title">Conduct code update</div>
                    <div class="feature-subtitle">contest</div>
                    <div style="margin-top: 10px;">
                        <div style="display: flex; align-items: center;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM16.3 16.3L11 13V7H12.5V12.2L17 15L16.3 16.3Z" fill="#333"/>
                            </svg>
                            <span style="font-size: 12px; margin-left: 5px;">Sundays at 8:00pm CEST</span>
                        </div>
                        <div style="display: flex; align-items: center; margin-top: 5px;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 12C14.2 12 16 10.2 16 8C16 5.8 14.2 4 12 4C9.8 4 8 5.8 8 8C8 10.2 9.8 12 12 12ZM12 14C9.3 14 4 15.3 4 18V20H20V18C20 15.3 14.7 14 12 14Z" fill="#333"/>
                            </svg>
                            <span style="font-size: 12px; margin-left: 5px;">2 hours</span>
                        </div>
                    </div>
                </div>
                <img src="/api/placeholder/80/100" alt="Code Update" class="feature-card-image">
            </div>
            <div class="feature-card card-dark-blue">
                <div class="feature-content">
                    <div class="feature-title">Master Data Structure and Algorithms</div>
                    <div class="feature-subtitle">Online contests</div>
                </div>
                <img src="/api/placeholder/80/100" alt="Data Structures" class="feature-card-image">
            </div>
            <div class="feature-card card-purple">
                <div class="feature-content">
                    <div class="feature-title">Topic-wise Dynamic Programming</div>
                </div>
            </div>
        </div>

        <!-- Upcoming Contests -->
        <section>
            <div class="section-header">
                <h2 class="section-title">Upcoming Contests</h2>
                <span class="info-icon">ⓘ</span>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Starts</th>
                        <th>Duration</th>
                        <th>Starts in</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>START79N</td>
                        <td>Starters77</td>
                        <td>12 mar 2025 wed 20:00</td>
                        <td>2 hrs</td>
                        <td>9 Days 3 hrs</td>
                    </tr>
                    <tr>
                        <td>START77N</td>
                        <td>Starters78</td>
                        <td>19 mar 2025 wed 20:00</td>
                        <td>2 hrs</td>
                        <td>9 Days 3 hrs</td>
                    </tr>
                    <tr>
                        <td>START79N</td>
                        <td>Starters79</td>
                        <td>26 mar 2025 wed 20:00</td>
                        <td>2 hrs</td>
                        <td>16 Days 3 hrs</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Top Skill Tests -->
        <section>
            <div class="section-header">
                <h2 class="section-title">Top Skill Tests</h2>
                <span class="badge">NEW</span>
            </div>
            <p style="font-size: 14px; margin-bottom: 15px;">Test your knowledge in Python, C, C++ and Java concepts. With these help you review your industry readiness in the domains you are exploring.</p>
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
                        <td>Python Online Test & Quiz</td>
                        <td>1 hrs 30 min</td>
                        <td>30</td>
                        <td>29396</td>
                        <td class="arrow-icon">→</td>
                    </tr>
                    <tr>
                        <td>Java Online Test & Quiz</td>
                        <td>1 hrs 30 min</td>
                        <td>30</td>
                        <td>33857</td>
                        <td class="arrow-icon">→</td>
                    </tr>
                    <tr>
                        <td>C language online test</td>
                        <td>1 hrs 30 min</td>
                        <td>30</td>
                        <td>33857</td>
                        <td class="arrow-icon">→</td>
                    </tr>
                    <tr>
                        <td>C++ Online Test & Quiz</td>
                        <td>1 hrs 30 min</td>
                        <td>30</td>
                        <td>26175</td>
                        <td class="arrow-icon">→</td>
                    </tr>
                    <tr>
                        <td>SQL Online Test & Quiz</td>
                        <td>1 hrs</td>
                        <td>20</td>
                        <td>9373</td>
                        <td class="arrow-icon">→</td>
                    </tr>
                    <tr>
                        <td>Data Structure and Algorithm in C++ Tests</td>
                        <td>2 hrs</td>
                        <td>30</td>
                        <td>5330</td>
                        <td class="arrow-icon">→</td>
                    </tr>
                </tbody>
            </table>
            <div style="text-align: center; margin-top: 15px;">
                <a href="#" class="btn">View all skill tests</a>
            </div>
        </section>

        <!-- Past Contests -->
        <section>
            <div class="section-header">
                <h2 class="section-title">Past Contests</h2>
            </div>
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
                    <tr>
                        <td>START176</td>
                        <td>Starters 176 (Rated till 5 stars)</td>
                        <td>05 Mar 2025 Wed 20:00</td>
                        <td>2 hrs</td>
                        <td>38100</td>
                    </tr>
                    <tr>
                        <td>START175</td>
                        <td>Starters 175 (Rated upto 2700)</td>
                        <td>26 Feb 2025 Wed 20:00</td>
                        <td>2 hrs</td>
                        <td>39223</td>
                    </tr>
                    <tr>
                        <td>START174</td>
                        <td>Starters 173 (Rated upto < 2700)</td>
                        <td>19 Feb 2025 Wed 20:00</td>
                        <td>2 hrs 15 Min</td>
                        <td>42103</td>
                    </tr>
                    <tr>
                        <td>START173</td>
                        <td>Starters 172 (Rated till 5 stars)</td>
                        <td>12 Feb 2025 Wed 20:00</td>
                        <td>2 hrs 30 Min</td>
                        <td>47857</td>
                    </tr>
                    <tr>
                        <td>START172</td>
                        <td>Starters 171 (Rated till 5 stars)</td>
                        <td>05 Feb 2025 Wed 20:00</td>
                        <td>2 hrs</td>
                        <td>48399</td>
                    </tr>
                    <tr>
                        <td>START171</td>
                        <td>Starters 170 (Rated till 6 star)</td>
                        <td>29 Jan 2025 Wed 20:00</td>
                        <td>2 hrs</td>
                        <td>46273</td>
                    </tr>
                    <tr>
                        <td>START170</td>
                        <td>Starters 169 (Rated till 5 stars)</td>
                        <td>22 Jan 2025 Wed 20:00</td>
                        <td>2 hrs</td>
                        <td>44692</td>
                    </tr>
                    <tr>
                        <td>START169</td>
                        <td>Starters 168 (Rated till 5 stars)</td>
                        <td>15 Jan 2025 Wed 20:00</td>
                        <td>2 hrs</td>
                        <td>33247</td>
                    </tr>
                    <tr>
                        <td>START168</td>
                        <td>Starters 167 (Rated till 5 stars)</td>
                        <td>08 Jan 2025 Wed 22:00</td>
                        <td>2 hrs</td>
                        <td>36548</td>
                    </tr>
                    <tr>
                        <td>START167</td>
                        <td>Starters 166 (Rated till 5 stars)</td>
                        <td>01 Jan 2025 Wed 20:00</td>
                        <td>2 hrs</td>
                        <td>43369</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>Learning Courses</h3>
                    <ul>
                        <li><a href="#">Learn Python</a></li>
                        <li><a href="#">Learn JavaScript</a></li>
                        <li><a href="#">Learn C++</a></li>
                        <li><a href="#">Learn C</a></li>
                        <li><a href="#">Learn Java</a></li>
                        <li><a href="#">More learning courses</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Practice Paths</h3>
                    <ul>
                        <li><a href="#">Practice Python</a></li>
                        <li><a href="#">Practice JavaScript</a></li>
                        <li><a href="#">Practice C++</a></li>
                        <li><a href="#">Practice C</a></li>
                        <li><a href="#">Practice Java</a></li>
                        <li><a href="#">More practice paths</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Online Compilers</h3>
                    <ul>
                        <li><a href="#">Python online compiler</a></li>
                        <li><a href="#">C online compiler</a></li>
                        <li><a href="#">C++ online compiler</a></li>
                        <li><a href="#">Java online compiler</a></li>
                        <li><a href="#">JavaScript online compiler</a></li>
                        <li><a href="#">More compilers</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Miscellaneous</h3>
                    <ul>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">CodeChef For College</a></li>
                        <li><a href="#">Coding Olympiad</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <div>www.codewiz.com</div>
                <div>
                    <div style="display: flex; align-items: center;">
                        <span style="margin-right: 10px;">Follow Us:</span>
                        <div class="social-icons">
                            <a href="#" class="social-icon">Y</a>
                            <a href="#" class="social-icon">F</a>
                            <a href="#" class="social-icon">T</a>
                            <a href="#" class="social-icon">I</a>
                            <a href="#" class="social-icon">D</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>