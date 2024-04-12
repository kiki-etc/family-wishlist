<?php
// Include your database connection
include "../settings/connection.php";

// Retrieve the 5 items from the database
$sql = "SELECT * FROM Wishlist_items DESC LIMIT 5";
$result = mysqli_query($conn, $sql);

// Initialize message content
$message = "Recent Wishlist Items:\n";

// loop through the results and add each item to the message
while ($row = mysqli_fetch_assoc($result)) {
    $item_name = $row['item_name'];
    $description = $row['description'];

    // Encode special characters
    $item_name = urlencode($item_name);
    $description = urlencode($description);

    $message .= "Item: $item_name\nDescription: $description\n\n";
}

// Define the recipient email address
$to = "recipient@example.com";

// Define the subject of the email
$subject = "Recent Wishlist Items";

// Encode the message content for the mailto link
$encoded_message = urlencode($message);

// Create the mailto link with the recipient, subject, and encoded message
$mailto_link = "mailto:$to?subject=$subject&body=$encoded_message";
?>

<!-- Create a link to trigger the email -->
<a href="<?php echo $mailto_link; ?>">Send Email</a>
