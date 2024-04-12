<!-- user_dash.php -->
<?php  
include "../settings/core.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="../css/dash_style.css">
</head>

<body>
    <div class="sidebar">
        <div class="sidebar_logo">
            <a href="../view/user_dash.php">
                <img id="logo" src="../images/logo.png"> </a>
        </div>
        <div class="menu_top">
            <a href="../view/user_dash.php"><i class="fa-solid fa-house"></i>Dashboard</a>
            <a href="../view/item_lost.php"> <i class="fa-solid fa-magnifying-glass"></i> Search Lost Items</a>
            <a href="../view/item_found.php"><i class="fa-solid fa-check"></i> Search Found Items</a>
            <a href="../view/founditem_reporting_page.php"><i class="fa-solid fa-align-justify"></i> Report Found Item</a>
            <a href="../view/lostitem_reporting_page.php"><i class="fa-solid fa-align-justify"></i> Report Lost Item</a>
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
            <h1>Dashboard</h1>
        </header>

        <section class="stats">
            <div class="box">
                <i class="fa-solid fa-check"></i>
                <h3 id="found-items-count"></h3>
                <p>Found Items</p>
            </div>
            <div class="box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <h3 id="lost-items-count">
                </h3>
                <p>Lost Items</p>
            </div>
            <div class="box">
                <i class="fa-solid fa-right-left"></i>
                <h3 id="claimed-items-count">
                </h3>
                <p>Claimed Items</p>
            </div>
        </section>
        <section class="recent-activities">
            <h2>Recent Activities</h2>
            <table>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Date</th>
                        <th>Activity</th>
                    </tr>
                </thead>
                <tbody>
                <tbody id="activity-table-body">
                    <?php include "../actions/user_dash_activities.php"; ?>
                </tbody>
            </table>
            <div class="pagination">
                <button id="prev-btn" onclick="loadPreviousPage()">Previous</button>
                <button id="next-btn" onclick="loadNextPage()">Next</button>
            </div>
        </section>
    </div>

    <script src="https://kit.fontawesome.com/88061bebc5.js" crossorigin="anonymous"></script>
    <script src="../js/user_dash_script.js"></script>
    <script>
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "../actions/user_dash_stats.php", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log("Yes")
                var statistics = JSON.parse(xhr.responseText);
                console.log("Statistics:", statistics);

                document.getElementById("found-items-count").textContent = statistics.found_items;
                document.getElementById("lost-items-count").textContent = statistics.lost_items;
                document.getElementById("claimed-items-count").textContent = statistics.claimed_items;
            }
        };
        xhr.send();

        var currentPage = 1;

        function loadNextPage() {
            currentPage++;
            loadData(currentPage);
        }

        function loadPreviousPage() {
            if (currentPage > 1) {
                currentPage--;
                loadData(currentPage);
            }
        }

        function loadData(page) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "../actions/user_dash_activities.php?page=" + page, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var tableBody = document.getElementById("activity-table-body");
                    tableBody.innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>
</body>

</html>