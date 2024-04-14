<?php

include 'connection.php';
include 'core.php';

check_session();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sauna: Events</title>
<link rel="stylesheet" href="views.css">
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif, sans-serif;
    background-color: #000000;
    color:  #e0fffc;
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
    transition: color 0.3s ease; 
}

nav a:hover {
    color: #ffffff; 
}

#main {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    margin-top: 20px;
}

.event {
    width: 97%; 
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 10px;
    background-color: #000000;
    color: #e0fffc;
    border: 2px solid #e90000ff; 
}

.event h2 {
    font-size: 20px;
    margin-bottom: 5px;
}

.event p {
    font-size: 16px;
    margin-bottom: 5px;
}
</style>
</head>
<body>

<header>
    <h1>Sauna: Where Music Meets Community! </h1>
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

<div class="event">
    <h2>Melodic Harmony Festival</h2>
    <p>Date: June 1, 2024</p>
    <p>Description: Experience the enchanting melodies of various music genres coming together in perfect harmony at our Melodic Harmony Festival. Get ready for a day filled with soulful tunes, rhythmic beats, and unforgettable performances! Dive into a world of musical bliss as talented artists from around the globe showcase their unique styles and create a symphony of sound that will resonate in your heart long after the festival ends.</p>
</div>

<div class="event">
    <h2>Rhythm & Groove Night</h2>
    <p>Date: August 15, 2024</p>
    <p>Description: Join us for a night of non-stop rhythm and grooves at our electrifying Rhythm & Groove Night event. Dance to the pulsating beats of live bands and DJs, and immerse yourself in the vibrant energy of the music scene! Whether you're a seasoned dancer or just looking to let loose and have fun, this event promises an unforgettable experience filled with infectious rhythms, funky basslines, and irresistible melodies that will keep you moving all night long.</p>
</div>

<div class="event">
    <h2>Jazz Fusion Showcase</h2>
    <p>Date: March 30, 2025</p>
    <p>Description: Indulge your senses in the smooth sounds of jazz fusion at our Jazz Fusion Showcase. Explore the eclectic blend of jazz, funk, and other musical elements as talented musicians take the stage to captivate your ears and hearts! From mesmerizing solos to intricate improvisations, this event promises to take you on a musical journey like no other. Sit back, relax, and let the music transport you to a world of pure sonic delight.</p>
</div>


</div>

</body>
</html>