<?php
include 'connection.php';
include 'core.php';
include 'addreview.php';
include 'editmodal.php';
check_session();

function displayAlbumReviews() {
    global $conn;
    $query = "SELECT reviews.rating, reviews.review_text, users.username, albums.title, albums.album_cover 
              FROM reviews 
              INNER JOIN users ON reviews.user_id = users.user_id 
              INNER JOIN albums ON reviews.album_id = albums.album_id";
    $result = $conn->query($query);
    
    if ($result) {
        $reviews = $result->fetch_all(MYSQLI_ASSOC);
        
        foreach ($reviews as $review) {
            echo '<div class="review">';
            echo '<img src="' . $review['album_cover'] . '" alt="' . $review['title'] . '" class="album-cover">';
            echo '<div class="review-details">';
            echo '<h2>' . $review['title'] . '</h2>';
            echo '<p>Rating: ' . $review['rating'] . '/5</p>';
            echo '<p>Review: ' . $review['review_text'] . '</p>';
            echo '<p>Reviewed by: ' . $review['username'] . '</p>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "Error executing query: " . $conn->error;
    }
}

function displayyourReviews() {
    global $conn;
    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $query = "SELECT reviews.rating, reviews.review_id, reviews.review_text, users.username, albums.title, albums.album_cover 
                  FROM reviews 
                  INNER JOIN users ON reviews.user_id = users.user_id 
                  INNER JOIN albums ON reviews.album_id = albums.album_id
                  WHERE reviews.user_id = '$user_id'";
        $result = $conn->query($query);
        
        if ($result) {
            $reviews = $result->fetch_all(MYSQLI_ASSOC);
            
            foreach ($reviews as $review) {
                echo '<div class="review">';
                echo '<img src="' . $review['album_cover'] . '" alt="' . $review['title'] . '" class="album-cover">';
                echo '<div class="review-details">';
                echo '<h2>' . $review['title'] . '</h2>';
                echo '<p>Rating: ' . $review['rating'] . '/5</p>';
                echo '<p>Review: ' . $review['review_text'] . '</p>';
                echo '<p>Reviewed by: ' . $review['username'] . '</p>';
                echo "<a href='#' onclick='openEditModal(\"{$review['review_id']}\", \"{$review['rating']}\", \"{$review['review_text']}\")'><button class='edit-review-btn'>Edit</button></a>";
                echo "<a href='deletereview.php?review_id={$review['review_id']}'><button class='delete-review-btn'>Delete</button></a>";
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "Error executing query: " . $conn->error;
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sauna: Reviews</title>
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

.review {
    background-color: #000000; 
    border: 3px solid #e90000ff; /* Changed border color to orange */
    border-radius: 10px;
    padding: 20px;
    margin: 10px 0;
    width: 80%;
    max-width: 800px;
    display: flex;
    align-items: center;
}

.album-cover {
    border-radius: 10px;
    width: 120px; /* Adjusted width */
    margin-right: 20px; /* Increased margin between image and details */
}

.review-details {
    color:  #e0fffc; 
}

.review-details h2 {
    font-size: 20px; /* Adjusted font size */
    margin-bottom: 10px; /* Increased spacing between h2 and paragraphs */
}

.review-details p {
    font-size: 16px; /* Adjusted font size */
    margin-bottom: 5px; /* Increased spacing between paragraphs */
}

.edit-review-btn,
.delete-review-btn {
    background-color:  #e90000ff; /* Changed button background color to orange */
    color: #000000; /* Changed button text color to black */
    border: none;
    padding: 5px 10px;
    margin-right: 10px; /* Increased margin between buttons */
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
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

#review-modal,
#edit-modal {
    display: none;
}

.edit-review-btn:hover,
.delete-review-btn:hover,
.add-inventory-btn:hover {
    background-color: #ffffff; /* Button background color on hover */
    color: #e90000ff; /* Button text color on hover */
}
</style>
</head>
<body>


<header>
    <div>Sauna: Where Music Meets Community! </div>
    <button onclick="openAddreviewModal()" id="open-add-modal-btn" class="add-inventory-btn" >
        Add Review
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
<h3>All reviews</h3>
<?php
displayAlbumReviews();
?>
<h3>Your reviews</h3>
<?php
displayyourReviews();
?>
</div>

<script>

    function openAddreviewModal() {
    document.getElementById('review-modal').style.display = 'block';
    }

</script>



</body>
</html>
