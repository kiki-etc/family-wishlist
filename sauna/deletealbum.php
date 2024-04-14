<?php
error_reporting(E_ALL);
include 'connection.php';

session_start(); 

if(isset($_GET['album_id'])) {
    $album_id = $_GET['album_id'];
    $user_id = $_SESSION['user_id']; 
    
    $stmt = $conn->prepare("SELECT added_by FROM albums WHERE album_id = ?");
    $stmt->bind_param("i", $album_id);
    $stmt->execute();
    $stmt->bind_result($added_by);
    $stmt->fetch();
    $stmt->close();

    if ($user_id == $added_by) {
        $stmt = $conn->prepare("DELETE FROM albums WHERE album_id = ?");
        $stmt->bind_param("i", $album_id);
        if ($stmt->execute()) {
            echo "<script>
            alert('Album successfully deleted');
            window.location.href='albums.php';
            </script>";
            $stmt->close();
            $conn->close();
            exit(); 
        } else {
            echo "<script>
            alert('Deletion unsuccessful');
            window.history.back(); // Redirect back to the previous page
            </script>";
            exit(); 
        }
    } else {
        echo "<script>
        alert('You do not have permission to delete this album');
        window.history.back(); // Redirect back to the previous page
        </script>";
        exit(); 
    }
} else {
    header('Location: albums.php');
    $stmt->close();
    $conn->close();
    exit();
}

