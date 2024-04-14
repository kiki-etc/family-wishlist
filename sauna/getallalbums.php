<?php
include 'connection.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$options = '';

$sql = "SELECT * FROM `albums`";

$result = $conn->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $options .= "<option value=\"" . $row['album_id'] . "\">" . $row['title'] . "</option>";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
