<?php

include "../settings/connection.php";

// Function to fetch item details based on item ID
function getItemDetails($conn, $itemid) {
    
    $itemDetails = array();

    
    $itemid = mysqli_real_escape_string($conn, $itemid);

    // Query to fetch the details of the item based on itemid
    $sql = "SELECT l.*, i.file_name, s.sname
            FROM Wishlist_items l
            INNER JOIN Image i ON l.image_id = i.image_id
            INNER JOIN Status s ON l.sid = s.sid
            WHERE l.itemid = $itemid";
    $result = mysqli_query($conn, $sql);

   
    if($result && mysqli_num_rows($result) > 0) {
        // Fetch the details of the item
        $item = mysqli_fetch_assoc($result);

        // Assign the item details to the array
        $itemDetails['item_name'] = $item['item_name'];
        $itemDetails['file_name'] = $item['file_name'];
        $itemDetails['category'] = $item['category'];
        $itemDetails['description'] = $item['description'];
        $itemDetails['itemid'] = $item['itemid'];
        $itemDetails['image_id'] = $item['image_id'];
        $itemDetails['sid'] = $item['sid'];
        $itemDetails['rid'] = $item['rid'];
        $itemDetails['uid'] = $item['uid'];        
    }

    
    mysqli_close($conn);


    return $itemDetails;
}
