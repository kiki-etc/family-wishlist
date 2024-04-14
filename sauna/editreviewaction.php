<?php
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $review_id = $_POST['review_id'];
    $rating = $_POST['rating'];
    $review_text = $_POST['review_text'];

    $sql = "UPDATE reviews SET rating = ?, review_text = ? WHERE review_id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("isi", $rating, $review_text, $review_id);
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
?>
