<?php
    include "../settings/connection.php";

    // Handle the POST request to delete the item
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        // Prepare the DELETE query
        $query = "DELETE FROM Wishlist_Items WHERE itemid = $id";
        
        // Execute the query
        $result = mysqli_query($GLOBALS['conn'], $query);
        
        // Check the result of the query
        if ($result) {
            // If successful, redirect to the list of all wishlist items
            header("Location: ../admin/all_wishlist_items.php");
            exit();
        } else {
            // If there was an error, display an error message
            echo "Error: " . $conn->error;
        }
    } else {
        // If the POST request does not contain the required 'id' parameter
        echo "No item ID specified for deletion.";
    }