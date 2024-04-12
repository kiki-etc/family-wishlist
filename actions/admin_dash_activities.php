<?php
include "../settings/connection.php";

// Get the current page from the URL parameter, default to 1 if not set
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset based on the current page with 10 activities
$limit = 10;
$offset = ($current_page - 1) * $limit;

$query_activities = "
   SELECT CONCAT(u.fname, ' ', u.lname) AS person_name, 
       'Added an item to the wishlist' AS activity
FROM Wishlist_Items ci
JOIN User u ON ci.uid = u.uid
ORDER BY item_name ASC
LIMIT $limit OFFSET $offset;
";

$result = mysqli_query($conn, $query_activities);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td><p>" . $row['person_name'] . "</p></td>";
        echo "<td>" . $row['activity'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No recent activities found.</td></tr>";
}

mysqli_close($conn);
