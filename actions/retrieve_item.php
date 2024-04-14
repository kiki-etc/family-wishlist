<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// session_start();
include "../settings/connection.php";

function getWishlistItems($connection, $sortBy, $itemType) {
    // SQL query to retrieve Wishlist items with image file name and status name
    $sql = "SELECT l.*, i.file_name AS image_file_name, s.sname AS status_name
            FROM Wishlist_Items l
            INNER JOIN Image i ON l.image_id = i.image_id
            INNER JOIN Status s ON l.sid = s.sid
            WHERE 1=1";

    // Execute the SQL query
    $result = $connection->query($sql);

    // Check for errors
    if ($result === false) {
        echo "Error: " . $connection->error;
        return array();
    }

    // Retrieve the Wishlist items
    $WishlistItems = array();
    while ($row = $result->fetch_assoc()) {
        // Store each row in the Wishlist items array
        $WishlistItems[] = $row;
    }

    // Free result set
    $result->free();

    // Return the list of Wishlist items
    return $WishlistItems;
}


$sortBy = isset($_GET['sort-by']) ? $_GET['sort-by'] : '';

$itemType = isset($_GET['item_type']) ? $_GET['item_type'] : '';


// Retrieve found items with sorting, filtering, and pagination
$WishlistItems = getWishlistItems($conn, $sortBy, $itemType);

return json_encode($WishlistItems);