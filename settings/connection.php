<?php

$SERVER = "localhost";
$USERNAME = "root";
$PSSWRD = "";
$DATABASE = "Wishlist";

$conn = new mysqli($SERVER, $USERNAME, $PSSWRD, $DATABASE);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "";