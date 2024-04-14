<?php include "../settings/core.php"?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Lost Items</title>
    <link rel="stylesheet" href="../css/items_display.css">

</head>
<style>
/* Styling for the outer container */
.items {
    display: flex; /* Use flex layout */
    flex-wrap: wrap; /* Allow items to wrap to the next line */
    gap: 20px; /* Space between grid items */
    padding: 20px; /* Padding inside the container */
}

/* Styling for each item card */
.item-card {
    flex: 0 0 30%; /* Set width of each card to 30% of the container */
    aspect-ratio: 4 / 5; /* Maintain an aspect ratio of 4:5 */
    border: 1px solid #ccc; /* Light border around each card */
    border-radius: 8px; /* Rounded corners */
    padding: 15px; /* Padding inside the card */
    background-color: #f9f9f9; /* Light background color */
    transition: transform 0.2s, box-shadow 0.2s; /* Transition for hover effects */
}

/* Hover effect for item cards */
.item-card:hover {
    transform: translateY(-5px); /* Move card up slightly on hover */
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); /* Add shadow on hover */
}

/* Styling for images inside the item card */
.item-image {
    width: 95%; /* Full width of the card */
    height: auto;
    /* object-fit: cover; Ensure the image covers the available space */
    border-bottom: 1px solid #753900; /* Separate image from text */
    padding-bottom: 5px; /* Space below the image */
    margin-bottom: 5px; /* Space below the image */
}

/* Styling for item text */
.item-name,
.item-description,
.item-category,
.item-status {
    margin: 5px 0; /* Margin around text */
}

/* Styling for item name */
.item-name {
    font-weight: bold;
    font-size: 1.2em;
}

/* Styling for other text */
.item-description,
.item-category,
.item-status {
    font-size: 1em;
    color: #000;
}
</style>
<body>
    <div class="sidebar">
        <div class="sidebar_logo">
            <a href="../view/user_dash.php">
                <img id="logo" src="../images/logo.png"> </a>
        </div>
        <div class="menu_top">
            <a href="../view/user_dash.php"><i class="fa-solid fa-house"></i>Dashboard</a>
            <a href="../view/items.php"> <i class="fa-solid fa-magnifying-glass"></i> Search Wishlist Items</a>
            <a href="../view/wishlist_item_adding.php"><i class="fa-solid fa-align-justify"></i>Add Wishlist Item</a>
            <a href="#" style="margin-top: 30px;">
                ---------------------
            </a>
            <a href="../view/user_profile.php"><i class="fa-solid fa-user"></i> Profile</a>
            <a href="../login/logout_view.php" style="margin-right: 100px;"> <i
                    class="fas fa-sign-out-alt"></i>Logout</a>
        </div>
    </div>
    <div class="content">
        <header class="header">
            <h1>All Wishlist Items</h1>
        </header>
        <form action="../actions/wishlist_item_search.php" method="GET">
            <div class="search_wrap">
                <div class="search">
                    <input class="search_bar" type="search" name="keyword" placeholder="Search">
                    <button type="submit" class="search-btn">Go</button>
                </div>
            </div>
        </form>

        <div class="filter_form">
            <form id="filterForm">
                <label for="item_type">Item Type:</label>
                <select name="item_type" id="item_type">
                    <option value="Electronics">Electronics</option>
                    <option value="Toiletries">Toiletries</option>
                    <option value="Clothing">Clothing</option>
                    <option value="Groceries">Groceries</option>
                    <option value="Others">Others</option>
                </select>

                <label for="sort-by">Sort By:</label>
                <select name="sort-by">
                    <option value="name_asc">Name (A-Z)</option>
                    <option value="name_desc">Name (Z-A)</option>
                </select>

                <button type="button" id="apply-filters">Apply Filters & Sort</button>
            </form>

        </div>

        
        <div class="items">
            <div class="lost">
            <?php
            // Include retrieve_item.php file to fetch the Wishlist items
            include "../actions/retrieve_item.php";

            // Check if there are Wishlist items to display
            if (!empty($WishlistItems)) {
                // Loop through the Wishlist items array
                foreach ($WishlistItems as $item) {
                    // Create a card for each Wishlist item
                    echo '<div class="item-card">';

                    // Display the item image
                    // The image source is based on the file path stored in the database, which includes the file name
                    echo '<img src="../uploads/' . basename($item['image_file_name']) . '" alt="' . $item['item_name'] . '" class="item-image">';

                    // Display the item name
                    echo '<h3 class="item-name">' . htmlspecialchars($item['item_name']) . '</h3>';

                    // Display the item description
                    echo '<p class="item-description">' . nl2br(htmlspecialchars($item['description'])) . '</p>';

                    // Display the item category
                    echo '<p class="item-category">Category: ' . htmlspecialchars($item['category']) . '</p>';

                    // Display the item status
                    echo '<p class="item-status">Status: ' . htmlspecialchars($item['status_name']) . '</p>';

                    // Add more item properties as needed

                    echo '</div>'; // Close the item card
                }
            } else {
                // Display a message if no items are found
                echo '<p>No Wishlist items found.</p>';
            }
            ?>
            </div>
        </div>
        <div class="pages">
            <button id="prev-btn">Previous</button>
            <button id="next-btn">Next</button>
        </div>

    </div>
    <script src="https://kit.fontawesome.com/88061bebc5.js" crossorigin="anonymous"></script>
    <script src="../js/item_lost.js"></script>
    <script src="../js/item_page.js"></script>
</body>

</html>