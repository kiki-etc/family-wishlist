<?php
// include your database connection
include "../settings/connection.php";

// retrieve the 5 most recent lost items from the database
$sql = "SELECT * FROM Wishlist_Items ORDER BY item_name DESC LIMIT 5";
$result = mysqli_query($conn, $sql);

// initialize message content
$message = "Recent Wishist Items:\n";

// loop through the results and add each item to the message
while ($row = mysqli_fetch_assoc($result)) {
    $item_name = $row['item_name'];
    $description = $row['description'];

    // encode special characters using rawurlencode
    $item_name = rawurlencode($item_name);
    $description = rawurlencode($description);

    $item_name = str_replace('%20', ' ', $item_name);
    $description = str_replace('%20', ' ', $description);
    $message .= "Item: $item_name\nDescription: $description\n\n";
}

// Define the recipient email address
$to = "dsampah@ashesi.edu.gh";

// Define the subject of the email
$subject = "Recent Wishlist Items";

// Encode the message content for the mailto link
$encoded_message = rawurlencode($message);

// Create the mailto link with the recipient, subject, and encoded message
$mailto_link = "mailto:$to?subject=$subject&body=$encoded_message";
