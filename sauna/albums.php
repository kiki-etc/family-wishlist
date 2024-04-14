<?php

include 'connection.php';
include 'core.php';
check_session();
function displayAlbums() {
    global $conn;
    $query = "SELECT album_id, title, artist, release_year, added_by
              FROM albums";
    $result = $conn->query($query);
    
    if ($result) {
        $albums = $result->fetch_all(MYSQLI_ASSOC);
        
        foreach ($albums as $album) {
            echo "<tr>";
            echo "<td>{$album['title']}</td>"; 
            echo "<td>{$album['artist']}</td>";
            echo "<td>{$album['release_year']}</td>";
            echo "<td>";
            echo "<a href='deletealbum.php?album_id={$album['album_id']}'><button class='add-inventory-btn delete-album-btn'>Delete</button></a>";
            echo "</td>";
            echo "</tr>";
          
        }
    } else {
        echo "Error executing query: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sauna: Albums</title>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif, sans-serif;
    background-color: #000000; /* Change body background color to black */
    color:  #e0fffc;  /* Change body text color to white */
}

header {
    height: auto;/* Adjusted height */
    background-color: #000000; 
    padding: 20px 30px;
    text-align: center;
}

header div {
    margin: 0;
    font-size: 36px;
    font-weight: bold;
    color:  #e0fffc;
}

nav {
    background-color:#e90000ff;
    padding: 10px 0;
    text-align: center;
}


nav a {
    color: #333;
    text-decoration: none;
    padding: 0 20px;
    transition: color 0.3s ease; /* Add transition for smooth color change */
}

nav a:hover {
    color: #ffffff; /* Change hover color to white */
}

#main {
    display: flex;
    flex-direction: column; /* Align items vertically */
    align-items: center;
    margin-top: 20px;
}

table {
    width: 100%;
    max-width: 1400px;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #e90000ff; /* Changed border color to orange */
}

th, td {
    padding: 10px;
    text-align: left;
}

.add-inventory-btn {
    background-color:  #e90000ff; /* Changed button background color to orange */
    color: #000000; /* Changed button text color to black */
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
}

#album-modal {
    display: none;
}

.add-inventory-btn:hover {
    background-color: #ffffff; /* Button background color on hover */
    color: #e90000ff; /* Button text color on hover */
}


</style>
</head>
<body>


<header>
    <div>Sauna: Where Music Meets Community! </div>
    <button onclick="openAddalbumModal()" id="open-add-modal-btn" class="add-inventory-btn" >
        Add Album
    </button>
</header>
<nav>
    <a href="home.php">Home</a>
    <a href="reviews.php">Reviews</a>
    <a href="albums.php">Albums</a>
    <a href="blogs.php">Blogs</a>
    <a href="events.php">Events</a>
    <a href="logout.php">Logout</a>
</nav>
<div id="main">
<h3>All Albums</h3>
<table>
    <thead>
        <tr>
        <th>Title</th>
        <th>Artist</th>
        <th>Release Date</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody id="product-list">
        <?php displayAlbums(); ?>
    </tbody>
</table>

</div>
<div class="modal" id="album-modal">
    <form action="addalbumaction.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="artist">Artist:</label>
            <input type="text" id="artist" name="artist" required>
        </div>
        <div>
            <label for="release_year">Release Year:</label>
            <input type="number" id="release_year" name="release_year">
        </div>
        <div>
            <label for="album_cover">Album Cover:</label>
            <input type="file" id="album_cover" name="album_cover">
        </div>
        <button type="submit">Add Album</button>
    </form>
</div>

<script>
    function openAddalbumModal() {
    var modal = document.getElementById('album-modal');
    
    modal.style.display = 'block';}

    window.addEventListener('message', function(event) {
        if (event.data.action === 'open-album-modal') {
            openAddalbumModal();
        }
    });
</script>


</body>
</html>
