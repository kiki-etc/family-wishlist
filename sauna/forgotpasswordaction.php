<?php

$email = $_POST['email'];
$securityAnswer1 = $_POST['security_answer1'];
$securityAnswer2 = $_POST['security_answer2'];
$newPassword = $_POST['new_password'];
$confirmPassword = $_POST['confirm_password'];

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    $response = array("emailExists" => false);
    echo json_encode($response);
    exit;
}

$row = $result->fetch_assoc();
$expectedAnswer1 = $row['security_answer1'];
$expectedAnswer2 = $row['security_answer2'];

if ($securityAnswer1 !== $expectedAnswer1 || $securityAnswer2 !== $expectedAnswer2) {
    $response = array("emailExists" => true, "securityQuestionsMatch" => false);
    echo json_encode($response);
    exit;
}

$stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
$stmt->bind_param("ss", $newPassword, $email);
$stmt->execute();

$stmt->close();

$conn->close();

$response = array("emailExists" => true, "securityQuestionsMatch" => true);
echo json_encode($response);
