<?php
include 'connection.php';


session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $release_year = $_POST['release_year'];
    
   
    $added_by = $_SESSION['user_id'];
    
    $album_cover = file_get_contents($_FILES["album_cover"]["tmp_name"]);

    $stmt = $conn->prepare("INSERT INTO albums (title, artist, release_year, album_cover, added_by) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssibi", $title, $artist, $release_year, $album_cover, $added_by);
    
    if ($stmt->execute()) {
        header("Location: albums.php");
        echo "The file ". htmlspecialchars( basename( $_FILES["album_cover"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $stmt->close();
    $conn->close();
}

