<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CodeWiz | Leaderboard</title>
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
        .container {
            padding: 30px 40px;
            margin-top: 50px;
        }

        h1 {
            color: #4d6bdc;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .filter-bar {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 30px;
            align-items: center;
        }

        .filter-button {
            background-color: #c7e6cd;
            border: none;
            border-radius: 20px;
            padding: 8px 16px;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .tag {
            background-color: #e3f2e8;
            border-radius: 20px;
            padding: 6px 14px;
            font-size: 0.9rem;
        }

        .search-box {
            margin-left: auto;
            display: flex;
            align-items: center;
            background-color: #f3f3f3;
            border-radius: 20px;
            padding: 5px 12px;
        }

        .search-box input {
            border: none;
            background: transparent;
            outline: none;
            padding-left: 8px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
        }

        .card {
            background-color: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .card img {
            width: 100%;
            height: 160px;
            object-fit: cover;
        }

        .card-content {
            padding: 15px;
        }

        .card h2 {
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card p {
            margin: 4px 0;
            font-size: 0.85rem;
            color: #666;
        }

        .meta {
            font-size: 0.8rem;
            color: gray;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 15px;
            border-top: 1px solid #eee;
        }

        .reactions span {
            font-size: 1.2rem;
            margin-right: 10px;
            cursor: pointer;
        }

        .see-more {
            font-size: 0.85rem;
            color: gray;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="page-container">
        <?php include('/xampp/htdocs/webb/partials/navbar.php'); ?>

        <!-- main content -->
         <div class="container">
        <h1>News</h1>

        <div class="filter-bar">
            <button class="filter-button">Filter</button>
            <span class="tag">Recent</span>
            <span class="tag">Label</span>
            <span class="tag">Label</span>
            <span class="tag">Label</span>
            <div class="search-box">

                <input type="text" placeholder="Search text" />
            </div>
        </div>

        <div class="grid">
            <?php for ($i = 0; $i < 6; $i++): ?>
                <div class="card">
                    <img src="blog.jpg" alt="Blog image">
                    <div class="card-content">
                        <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h2>
                        <p>Admas Kanyagia</p>
                        <p class="meta">April 23, 2024 • 4 min read</p>
                    </div>
                    <div class="card-footer">
                        <div class="reactions">
                            <span> 👍</span><span>👎</span>
                        </div>
                        <a href="#" class="see-more">See More...</a>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>

        <?php include('/xampp/htdocs/webb/partials/mini_footer.php'); ?>

    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>