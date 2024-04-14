<?php
$servername = "fdb1034.awardspace.net";
$username = "4471370_wishlist";
$password = "WebTech2024!"; 
$database = "4471370_wishlist"; 


$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


