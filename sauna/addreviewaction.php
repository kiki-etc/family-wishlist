<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit(); 
}
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $album_id = $_POST['album_id'];
    $user_id = $_SESSION['user_id']; 
    $rating = $_POST['rating'];
    $review_text = $_POST['review_text'];

    $sql = "INSERT INTO reviews (album_id, user_id, rating, review_text, review_date)
            VALUES (?, ?, ?, ?, CURRENT_DATE)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("iiis", $album_id, $user_id, $rating, $review_text);
        if ($stmt->execute()) {
            header("Location: reviews.php");
            exit(); 
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Form submission error.";
}
