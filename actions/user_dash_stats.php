<?php
session_start();

include "../settings/connection.php";

ini_set('display_errors', 1);
error_reporting(E_ALL);

function fetchUserStatistics($connection, $user_id) {
    $statistics = array();

    //fetch count of lost items for the user
    $query_wishlist_items = "SELECT COUNT(*) AS wishlist_items_count FROM Wishlist_Items WHERE uid = $user_id";
    $result_wishlist_items = mysqli_query($connection, $query_wishlist_items);
    $row_wishlist_items = mysqli_fetch_assoc($result_wishlist_items);
    $statistics['Wishlist_Items'] = $row_wishlist_items['wishlist_items_count'];

    return $statistics;
}

// Check if user_id is set in the session
if (isset($_SESSION['user_id'])) {
   
    $user_id = $_SESSION['user_id'];

    $statistics = fetchUserStatistics($conn, $user_id);

    echo json_encode($statistics);
} else {

    echo json_encode(['error' => 'User not logged in']);
}

mysqli_close($conn);