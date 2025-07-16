<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "codewiz";
$dbport = 3306;

$conn = new mysqli($servername, $username, $password, $dbname, $dbport);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>