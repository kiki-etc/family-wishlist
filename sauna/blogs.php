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
<title>Sauna: Blogs</title>
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
    transition: color 0.3s ease; 
}

nav a:hover {
    color: #e0fffc;
}

#main {
    display: flex;
    flex-direction: column; 
    align-items: center;
    margin-top: 20px;
}

.row {
    display: flex;
    justify-content: center; 
    gap: 40px;
}

.column {
    flex: 1;
    max-width: 450px; 
    padding: 3px;
    margin-bottom: 10px;
    border-radius: 10px; 
    background-color: #e90000ff;
}

.card {
    border-radius: 10px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    transition: 0.3s;
    background-color: #000000;
}

.card:hover {
    opacity: 0.7;
}

.card img {
    border-radius: 10px 10px 0 0;
    width: 100%;
}

.container {
    padding: 2px 16px;
}


.column a {
    text-decoration: none;
    color: inherit;
    display: block;
    width: 100%;
    height: 100%;
}
</style>
</head>
<body>

<header>
    <h1>Sauna: Where Music Meets Community!</h1>
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

<div class="row">
    <div class="column">
        <a href="https://saunagh.blogspot.com/2023/07/sweetness-by-sarz-obongjayar.html">
            <div class="card">
                <img src="sweetness.png" alt="Sweetness" style="width:100%" class="hover-opacity">
                <div class="container">
                    <p><b>Sweetness by Obongjayar</b></p>
                    <p>Sarz has been pivotal in developing the new wave of African music. His psychedelic production has pioneered the Alté sound and has served as a template for many other artists to build on. Sarz is so instrumental to the music game today that it's almost easy to consider him a new-age producer and forget that he has been in the game for the better part of a decade. Read our review of Sweetness here.</p>
                </div>
            </div>
        </a>
    </div>
    <div class="column">
        <a href="https://saunagh.blogspot.com/2023/06/99-phaces-so-we-made-tape.html">
            <div class="card">
                <img src="swmat.png" alt="So We Made A Tape" style="width:100%" class="hover-opacity">
                <div class="container">
                    <p><b>S.W.M.A.T by 99 PHACES</b></p>
                    <p>A breath of fresh air. That’s the most fitting one-sentence description I could find for this introduction to the five-member Ghanaian music collective.  Comprising producers Insvne Auggie and Mel, artists Freddie Gambini, Cozy Pols and Moffy, and with a new sound and amazing talent, I'm confident that 99 PHACES could be the next big thing. </p>
                </div>
            </div>
        </a>
    </div>
    <div class="column">
        <a href="https://saunagh.blogspot.com/2022/08/bittersweet-by-herman-uede.html">
            <div class="card">
                <img src="bittersweet.png" alt="Bittersweet" style="width:100%" class="hover-opacity">
                <div class="container">
                    <p><b>Bittersweet by Herman $uede</b></p>
                    <p>Herman Suede (born Jason Bortei-Doku) is an amazing storyteller and lyricist who displays these qualities through beautiful melodies over solid production. Afro-fusion is a delicate language, and this young prodigy speaks it ever so fluently. He is a budding artist with a lot to offer, and he does so perfectly with this sophomore extended playlist. Read our review here. </p>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row">
    <div class="column">
        <a href="https://saunagh.blogspot.com/2022/07/mirage-by-mannywellz.html">
            <div class="card">
                <img src="mirage.png" alt="Mirage" style="width:100%" class="hover-opacity">
                <div class="container">
                    <p><b>Mirage by Mannywellz</b></p>
                    <p>If 'Outside' Burna Boy and Masego had a child, his name would be Mannywellz. His Afro-take to R&B/Soul music is otherworldly, on par with the likes of Tems and Wurld. Mannywellz's ability to layer soul-touching lyrics onto a nu jazz-infused beat has gained him significant recognition over the years. A true student of the art, he has mastered the ability to cut across many genres with his silky bars and versatile voice.</p>
                </div>
            </div>
        </a>
    </div>
    <div class="column">
            <a href="https://saunagh.blogspot.com/2023/06/fountain-baby-by-amaarae.html">
            <div class="card">
                <img src="fountainbaby.png" alt="Fountain Baby" style="width:100% height: height: 300px" class="hover-opacity">
                <div class="container">
                    <p><b>Fountain Baby by Amaarae</b></p>
                    <p>Fountain Baby is a sonic masterpiece. Our femme fatale displays her versatility on this album, giving us something that transcends genres, all without a single feature. Amaarae is credited as a producer on this album and is known for having the best production in all her music, but Fountain Baby is in a league of its own. The 14-song, 40-minute album is an artistic showcase, and in short review post, I will do my best to gather my thoughts into words.</p>
                </div>
            </div>
        </a>
    </div>
    <div class="column">
        <a href="https://saunagh.blogspot.com/2023/06/summer-breeze-by-tay-iwar.html">
            <div class="card">
                <img src="summerbreeze.png" alt="Summer Breeze" style="width:100%" class="hover-opacity">
                <div class="container">
                    <p><b>Summer Breeze by Tay Twar</b></p>
                    <p>Alté is one of the most unique and underrated sounds of Africa. If you are familiar with it, consider yourself lucky. If you aren’t, let me introduce you to one of the best Alté artists, Austin Iwar Jr, known as Tay Iwar. He has been in the industry for almost a decade. He is an amazing artist, producer, and songwriter. He kinda reminds me of IDK, albeit an African version. Tay is a jack of many trades when it comes to music. His music is deeply rooted in several genres, including RnB, Afrobeats, and Afro-Fusion.</p>
                </div>
            </div>
        </a>
    </div>
</div>

</div>

</body>
</html>
