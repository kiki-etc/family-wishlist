<?php
include  'connection.php';

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmpassword'];
$securityAnswer1 = $_POST['security_answer1'];
$securityAnswer2 = $_POST['security_answer2'];


$check_query = "SELECT user_id FROM users WHERE email = ?";
$check_stmt = $conn->prepare($check_query);
$check_stmt->bind_param("s", $email);
$check_stmt->execute();
$check_stmt->store_result();

if ($check_stmt->num_rows > 0) {
    echo "<script>
    alert('Error: Email already exists. Please choose a different email address.');
    window.location.href='register.php'
    </script>";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>
    alert('Error: Invalid Email, please try again');
    window.location.href='register.php'
    </script>";
}

if ($password !== $confirmPassword) {
    echo "<script>
    alert('Error: Password mismatch');
    window.location.href='register.php'
    </script>"; 
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO users (email, username, password, security_answer1, security_answer2) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $email, $username, $hashedPassword, $securityAnswer1, $securityAnswer2);
$stmt->execute();


if ($stmt->affected_rows === 1) {
    header("Location: index.html?success=registration_success");
    $stmt->close();
    $conn->close();
    exit;
} else {
    header("Location: register.php?error=registration_failed");
    $stmt->close();
    $conn->close();
    exit;
}
