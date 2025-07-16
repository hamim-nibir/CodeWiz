
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
        .site-footer {
    background-color: #2c3e50;
    color: #fff;
    padding: 40px 20px;
    font-family: 'Poppins', sans-serif;
    width: 100%;
    text-align: center;
    margin-top: auto;
    clear: both;
}

.footer-container {
    max-width: 1000px;
    margin: 0 auto;
}

.team-title {
    font-size: 26px;
    margin-bottom: 30px;
    font-weight: bold;
}

.team-cards {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 25px;
    margin-bottom: 30px;
}

.team-card {
    background-color: #34495e;
    padding: 20px;
    border-radius: 16px;
    width: 220px;
    text-align: center;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    transition: transform 0.3s ease;
}

.team-card:hover {
    transform: translateY(-5px);
}

.member-photo {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 12px;
    border: 3px solid #fff;
}

.team-card h3 {
    margin: 10px 0 6px;
    font-size: 18px;
    color: #fff;
}

.team-card .role {
    font-size: 14px;
    color: #bbb;
    margin-bottom: 4px;
}

.team-card .email {
    font-size: 13px;
    color: #aaa;
}

.footer-note {
    font-size: 13px;
    color: #ccc;
}

    </style>
</head>
<body>
<footer class="site-footer">
    <div class="footer-container">
        <h2 class="team-title">Team CodeWizards</h2>
        <div class="team-cards">

            <!-- Member Card 1 -->
            <div class="team-card">
                <img src="suhail.jpg" alt="Suhail" class="member-photo">
                <h3>Suhail Fahim</h3>
                <p class="role">Founder - CodeWiz</p>
                <p class="email">suhail@example.com</p>
            </div>
            <!-- Member Card 2 -->
            <div class="team-card">
                <img src="nibir.jpg" alt="Nibir" class="member-photo">
                <h3>Noor E Hamim Nibir</h3>
                <p class="role">Founder - CodeWiz</p>
                <p class="email">nhnibir.te@gmail.com</p>
            </div>

            <!-- Member Card 3 -->
            <div class="team-card">
                <img src="eyamin.jpg" alt="Yeamin" class="member-photo">
                <h3>Eyamin</h3>
                <p class="role">Founder - CodeWiz</p>
                <p class="email">eyamin@example.com</p>
            </div>

            <!-- Member Card 3 -->
            <div class="team-card">
                <img src="marzia.jpg" alt="Marzia" class="member-photo">
                <h3>Marzia</h3>
                <p class="role">Founder - CodeWiz</p>
                <p class="email">marzia@example.com</p>
            </div>
            

        </div>

        <p class="footer-note">© 2025 CodeWizards. All rights reserved.</p>
    </div>
</footer>
</body>
</html>