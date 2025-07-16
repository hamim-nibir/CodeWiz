color code:
#009970

affba2d0b6msh3684690b4fbc629p13766ejsn82612ac29a92



checking commit

// Save submission
$sql = "INSERT INTO submissions (user_id, problem_id, submitted_at, verdict, language, code, stdout)
        VALUES (?, ?, NOW(), ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iissss", $user_id, $problem_id, $verdict, $language, $code, $stdout);
$stmt->execute();


//color theme
#ede8f5
#adbbda
#3d52a0
#7091e6
#8697c4
