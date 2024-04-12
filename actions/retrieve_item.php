<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// session_start();
include "../settings/connection.php";

function getLostItems($connection, $limit, $offset, $sortBy, $itemType) {
    $sql = "SELECT l.*, i.file_name, s.sname
    FROM Wishlist_Items l 
    INNER JOIN image i ON l.image_id = i.image_id
    INNER JOIN Status s ON l.sid = s.sid WHERE 1=1";

    
    if (!empty($itemType)) {
        $sql .= " AND category = '$itemType'";
    }

    switch ($sortBy) {
        case 'name_desc':
            $sql .= " ORDER BY item_name DESC";
            break;
        default:
            $sql .= " ORDER BY item_name ASC";
            break;
    }


    $sql .= " LIMIT $limit OFFSET $offset";


    $result = $connection->query($sql);

    if ($result === false) {
        echo "Error: " . $connection->error;
        return array();
    }


    $WishlistItems = array();
    while ($row = $result->fetch_assoc()) {
        $WishlistItems[] = $row;
    }

    $result->free();

    return $WishlistItems;
}


$sortBy = isset($_GET['sort-by']) ? $_GET['sort-by'] : '';

$itemType = isset($_GET['item_type']) ? $_GET['item_type'] : '';

// Define limit and offset for pagination
$limit = 10; // Change this to the number of items you want to display per page
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $limit;

// Retrieve found items with sorting, filtering, and pagination
$lostItems = getLostItems($conn, $limit, $offset, $sortBy, $itemType);

// Encode the found items as JSON and echo the result
echo json_encode($WishlistItems);