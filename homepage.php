<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeWiz - Level Up Your Competitive Programming Skills</title>
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
            padding: 8px 20px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 600;
            text-align: center;
            transition: all 0.3s ease;
        }
        
        .btn-login {
            color: #333;
        }
        
        .btn-signup {
            background-color: #f9b934;
            color: #fff;
        }
        
        /* Hero Section */
        .hero {
            background-color: #eaf0fb;
            padding: 60px 0;
            min-height: calc(100vh - 80px);
            display: flex;
            align-items: center;
        }
        
        .hero-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .hero-text {
            flex: 1;
            padding-right: 30px;
        }
        
        .hero-title {
            font-size: 40px;
            font-weight: bold;
            color: #000;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .hero-subtitle {
            font-size: 36px;
            font-weight: bold;
            color: #8e44ad;
            margin-bottom: 30px;
            line-height: 1.2;
        }
        
        .hero-buttons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .btn-primary {
            background-color: #5b7bcd;
            color: white;
            padding: 12px 24px;
            font-size: 16px;
        }
        
        .btn-secondary {
            background-color: #556ee6;
            color: white;
            padding: 12px 24px;
            font-size: 16px;
        }
        
        .hero-image {
            flex: 1;
            display: flex;
            justify-content: center;
        }
        
        .programming-illustration {
            width: 100%;
            max-width: 550px;
            height: auto;
        }
        
        /* Programming Icon Styles */
        .code-icon {
            background-color: #7848d5;
            color: white;
            padding: 5px 10px;
            border-radius: 6px;
            font-weight: bold;
            position: absolute;
        }
        
        .js-icon {
            top: 250px;
            left: 520px;
        }
        
        .html-icon {
            bottom: 80px;
            left: 530px;
        }
        
        .java-icon {
            top: 260px;
            right: 340px;
        }
        
        .cpp-icon {
            bottom: 100px;
            right: 350px;
        }
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .hero-content {
                flex-direction: column;
                text-align: center;
            }
            
            .hero-text {
                padding-right: 0;
                margin-bottom: 40px;
            }
            
            .hero-buttons {
                justify-content: center;
            }
            
            .hero-title, .hero-subtitle {
                text-align: center;
            }
            
            .code-icon {
                display: none;
            }
        }
        
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }
            
            .hero {
                padding: 40px 0;
            }
            
            .hero-subtitle {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <a href="#" class="logo">CodeWiz</a>
                <ul class="nav-menu">
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="#">Problem Set</a></li>
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

    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">CodeWiz</h1>
                    <h2 class="hero-subtitle">Level Up Your Competitive Programming Skill</h2>
                    <div class="hero-buttons">
                        <a href="#" class="btn btn-primary">Topic-wise Practice Problem</a>
                        <a href="#" class="btn btn-secondary">Set Contest</a>
                    </div>
                </div>
                <div class="hero-image">
                    <div style="position: relative;">
                        <svg width="500" height="400" viewBox="0 0 500 400" xmlns="http://www.w3.org/2000/svg">
                            <!-- Computer Monitor Base -->
                            <rect x="220" y="350" width="60" height="10" rx="2" fill="#333" />
                            <rect x="240" y="340" width="20" height="10" rx="1" fill="#555" />
                            
                            <!-- Computer Monitor -->
                            <rect x="100" y="120" width="300" height="220" rx="10" fill="#ff3d81" />
                            <rect x="110" y="130" width="280" height="190" rx="5" fill="#f6f1ff" />
                            
                            <!-- Monitor Content -->
                            <rect x="130" y="150" width="80" height="10" rx="2" fill="#ddd" />
                            <rect x="130" y="170" width="120" height="10" rx="2" fill="#ddd" />
                            <rect x="130" y="190" width="100" height="10" rx="2" fill="#ddd" />
                            <rect x="130" y="210" width="90" height="10" rx="2" fill="#ddd" />
                            
                            <rect x="250" y="150" width="120" height="90" rx="3" fill="#7848d5" />
                            <rect x="260" y="160" width="100" height="70" rx="2" fill="#f6f1ff" />
                            <rect x="270" y="170" width="80" height="5" rx="1" fill="#ddd" />
                            <rect x="270" y="180" width="60" height="5" rx="1" fill="#ddd" />
                            <rect x="270" y="190" width="70" height="5" rx="1" fill="#ddd" />
                            
                            <rect x="250" y="250" width="120" height="50" rx="3" fill="#7848d5" />
                            <rect x="260" y="260" width="100" height="30" rx="2" fill="#f6f1ff" />
                            
                            <!-- Gears -->
                            <circle cx="420" cy="170" r="20" fill="#1a2056" />
                            <circle cx="420" cy="170" r="10" fill="#ffc233" />
                            <circle cx="750" cy="280" r="15" fill="#1a2056" />
                            <circle cx="400" cy="280" r="10" fill="#1a2056" />
                            
                            <!-- HTML Icon -->
                            <rect x="500" y="360" width="60" height="30" rx="5" fill="#7848d5" />
                            <text x="510" y="380" fill="white" font-weight="bold" font-size="12">HTML</text>
                            
                            <!-- JS Icon -->
                            <rect x="540" y="230" width="40" height="30" rx="5" fill="#7848d5" />
                            <text x="550" y="250" fill="white" font-weight="bold" font-size="12">JS</text>
                            
                            <!-- JAVA Icon -->
                            <rect x="800" y="260" width="60" height="30" rx="5" fill="#7848d5" />
                            <text x="810" y="280" fill="white" font-weight="bold" font-size="12">JAVA</text>
                            
                            <!-- C++ Icon -->
                            <rect x="730" y="350" width="50" height="30" rx="5" fill="#7848d5" />
                            <text x="740" y="370" fill="white" font-weight="bold" font-size="12">C++</text>
                            
                            <!-- Code Icon -->
                            <rect x="700" y="150" width="50" height="30" rx="5" fill="#7848d5" />
                            <text x="710" y="170" fill="white" font-weight="bold" font-size="16">&lt;/&gt;</text>
                            
                            <!-- Cloud -->
                            <ellipse cx="150" cy="130" rx="40" ry="30" fill="#c4a9f7" />
                            <ellipse cx="170" cy="110" rx="30" ry="20" fill="#c4a9f7" />
                            
                            <!-- Charts -->
                            <rect x="580" y="280" width="30" height="40" rx="2" fill="#ffc233" />
                            <rect x="620" y="260" width="30" height="60" rx="2" fill="#ff3d81" />
                            <rect x="660" y="290" width="30" height="30" rx="2" fill="#7848d5" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional sections would go here -->

</body>
</html>