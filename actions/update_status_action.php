<?php
include "../settings/connection.php";

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the itemid and the new status from the form
    $itemid = $_POST['itemid'];
    $new_status = $_POST['status'];

    // Update the status of the item in the Wishlist_Items table
    $sql = "UPDATE Wishlist_Items SET sid = ? WHERE itemid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $new_status, $itemid);
    
    // Execute the query and check if it was successful
    if ($stmt->execute()) {
        // Redirect to the all wishlist items page
        header("Location: ../admin/all_wishlist_items.php");
    } else {
        // Handle the error (you can log it and display an error message to the user)
        echo "Failed to update status. Please try again.";
    }
    
    // Close the statement
    $stmt->close();
}
