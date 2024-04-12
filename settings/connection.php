<?php

$SERVER = "sql201.infinityfree.com";
$USERNAME = "if0_36348885";
$PSSWRD = "WebTech2024";
$DATABASE = "if0_36348885_Wishlist";

$conn = new mysqli($SERVER, $USERNAME, $PSSWRD, $DATABASE);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "";