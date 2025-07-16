<?php
session_start();
if (!isset($_SESSION['user_logged_in']) || !isset($_SESSION['uid'])) {
    echo "not_logged_in";
    exit;
}

require_once "/xampp/htdocs/webb/partials/dbconnection.php";

$uid = $_SESSION['uid'];
$contest_id = intval($_POST['contest_id'] ?? 0);

if ($contest_id > 0) {
    $check = $conn->prepare("SELECT * FROM contest_registrations WHERE contest_id = ? AND user_id = ?");
    $check->bind_param("ii", $contest_id, $uid);
    $check->execute();
    $res = $check->get_result();

    if ($res->num_rows > 0) {
        echo "already_registered";
    } else {
        $stmt = $conn->prepare("INSERT INTO contest_registrations (contest_id, user_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $contest_id, $uid);
        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "fail";
        }
    }
} else {
    echo "invalid";
}
?>
