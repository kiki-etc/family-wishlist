<?php
include 'connection.php';

// Start session
session_start();

// Check if email and password are set in the POST request
if(isset($_POST['email']) && isset($_POST['password'])) {
    // Retrieve email and password from the POST request
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL statement to retrieve user with the provided email
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            // Save user ID in session variable
            $_SESSION['user_id'] = $row['user_id'];
            echo '<script>alert("Welcome to Sauna."); window.location.href = "home.php";</script>';
            exit;
        } else {
            echo '<script>alert("Invalid email or password. Please try again."); window.location.href = "index.html";</script>';
            exit;
        }
    } else {
        $stmt->close();
        $conn->close();
        echo '<script>alert("Invalid email or password. Please try again."); window.location.href = "index.html";</script>';
        exit;
    }


} else {
    echo '<script>alert("Invalid request. Please try again."); window.location.href = "index.html";</script>';
    exit;
}
