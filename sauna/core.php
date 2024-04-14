<?php

include 'connection.php';

session_start();

function check_session() {
  
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        die();
    }
}

