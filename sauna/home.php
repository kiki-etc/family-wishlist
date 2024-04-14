<?php
include 'connection.php';
include 'core.php';
check_session();
function countalbums() {
    global $conn;
    $sql = "SELECT COUNT(*) AS albumcount FROM albums";
    $result = $conn->query($sql);
    if ($result) {
        
        $row = $result->fetch_assoc();
        $album_count = $row['albumcount'];
        echo "<div class='home-box'>";
        echo "<h3>Total Albums</h3>";
        echo "<h2>$album_count</h2>";
        echo "</div>";
        $result->free();
    } else {
        echo "Error: " . $conn->error;
    }
}
function countlistens() {
    global $conn;
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0; 
    $sql = "SELECT COUNT(*) AS listens FROM reviews WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result) {
        $row = $result->fetch_assoc();
        $count = $row['listens'];
        echo "<div class='home-box'>";
        echo "<h3>Your Reviews</h3>";
        echo "<h2>$count</h3>";
        echo "</div>";
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}

function countevents() {
    global $conn;
    $sql = "SELECT COUNT(*) AS event_count FROM events";
    $result = $conn->query($sql);
    if ($result) {
        $row = $result->fetch_assoc();
        $event_count = $row['event_count'];
        echo "<div class='home-box'>";
        echo "<h3>All Events</h3>";
        echo "<h2>$event_count</h2>";
        echo "</div>";
        $result->free();
    } else {
        echo "Error: " . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sauna: Home</title>
<style>


* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif, sans-serif;
    background-color: #000000; /* Change body background color to black */
    color:  #e0fffc; /* Change body text color to white */
}

header {
    height: 30%;
    background-color: #000000; 
    padding: 30px;
    text-align: center;
}

header div {
    margin: 0;
    font-size: 36px;
    font-weight: bold;
    color:  #e0fffc;
}

nav {
    background-color: #e90000ff;
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
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    margin-top: 20px;
}


.home-box {
    background-color: #000000; 
    border: 3px solid  #e90000ff;
    border-radius: 10px;
    padding: 20px;
    margin: 10px 10px;
    text-align: center;
    width: calc(33% - 20px);
    max-width: calc(33% - 20px);
}

.home-box h3 {
    margin-bottom: 20px;
    font-size: 32px;
    font-weight: bold;
    color:  #e0fffc; 
}

.home-box h2 {
    margin: 0;
    font-size: 48px;
    font-weight: normal;
    color:   #e0fffc;
}

/* Custom styles */
.about-section {
  text-align: center;
  padding: 32px;
}

.about-content {
  max-width: 100%;
  margin: 0 auto;
}

.about-info {
  display: flex;
  align-items: center;
  justify-content: center;
}

.about-image {
  border-radius: 10px;
  width: 100%; 
  margin-right: 40px; 
}

.about-text {
  color: #e0fffc;
  text-align: center;
}

.about-text h3 {
  font-size: 40px;
  margin-bottom: 20px; 
  
}

.about-text h4 {
  font-size: 20px;
  font-weight: bold;
  margin-bottom: 10px; /* Increase spacing between h4 and paragraphs */
}

.about-text h6 {
  font-size: 15px;
  font-style: italic;
  margin-bottom: 10px; /* Increase spacing between h6 and paragraphs */
}

.about-text p {
  font-size: 18px;
  line-height: 1.6;
  margin-bottom: 20px; /* Increase spacing between paragraphs */
}

</style>
</head>
<body>


<header>
    <div>Sauna: Where Music Meets Community! </div>
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
    <?php 
        countalbums();
        countlistens();
        countevents();
    ?>


    <hr id="about">

    <div class="about-section">
    <div class="about-content">
        <div class="about-info">
        <img src="logo.jpeg" alt="Sauna logo" class="about-image" width="400" height="400">
        <div class="about-text">
            <h3>Sauna</h3>
            <h4>Pass the Aux!</h4>
            <h6>Where music meets Community</h6>
            <p>Welcome to Sauna, a music-focused community created by four university students passionate about African Music. Discover the vibrant sounds of the continent through insightful music reviews, artist spotlights, and curated playlists. Join our community as we celebrate the richness of music, sharing diverse genres and hidden gems.</p>
            <p>Here, you can be an active member of our community by uploading albums you would recommend, adding and viewing ratings and reviews, and keeping up with community-focused events and spaces. Enjoy!</p>
        </div>
        </div>
    </div>
    </div>
    <hr>

</div>

</body>
</html>
