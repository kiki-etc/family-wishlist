<?php include "../settings/core.php"?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Lost Items</title>
    <link rel="stylesheet" href="../css/items_display.css">

</head>

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
                    include "../actions/retrieve_item.php";
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