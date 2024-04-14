
<?php
error_reporting(E_ALL);
include 'connection.php';

session_start(); 

if(isset($_GET['review_id'])) {
    $review_id = $_GET['review_id'];
   
    $stmt = $conn->prepare("DELETE FROM reviews WHERE review_id = ?");
    $stmt->bind_param("i", $review_id);

    if ($stmt->execute()) {
        echo "<script>
        alert('review successfully deleted');
        window.location.href='reviews.php';
        </script>";
        $stmt->close();
        $conn->close();
        exit(); 
    } else {
        echo "<script>
        alert('Deletion unsuccessful');
        window.history.back(); 
        </script>";
        exit(); 
    }
} else {
    header('Location: reviews.php');
    $stmt->close();
    $conn->close();
    exit();
}
