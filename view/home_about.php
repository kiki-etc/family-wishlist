<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Homepage</title>
    <link rel="stylesheet" href="../css/home_about.css">
</head>
<body>

<header>
    <h1>Family Wishlist Manager</h1>
    <nav>
        <ul>
            <li><a href="#">Home/About</a></li>
            <li><a href="https://gh.linkedin.com/in/nyameye-akumia">Contact</a></li>
            <li class="searchbar">
                <svg viewBox="0 0 24 24" aria-hidden="true" class="icon">
                    <g>
                        <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
                    </g>
                </svg>
                <input class="input" type="search" placeholder="Search">
            </li>
        </ul>
    </nav>
</header>

<section id="description">
    <h2>Project Description</h2>
    <p>Nyameye Akumia is developing a data powered website to help individuals in a family solve the problem of efficiently organizing items in their wishlist for the household. The current database uses a specific group of family members with a predetermined admin. (See below for email and password of the admin). This includes parents, children and any other inhabitants of the household. These users will actively engage with the platform to add items and search for items.</p>
    <p>The administrator (usually the head of the household) will also be in charge of managing and updating the database to help other students, faculty, and staff easily find and get back their lost items within the university.</p>
    <p>Administrator Email: kiki.etc@icloud.com</p>
    <p>Administrator Password: WebTech2024</p>
    <p></p>
</section>
<div id="middle">
    <button class="button2" onclick="window.location.href = '../login/signup_view.php';">Register</button>
    <button class="button2" onclick="window.location.href = '../login/login_view.php';">Login</button>
</div>
<section id="team">
    <div class="member">
        <img src="../images/kiki.png" alt="Member 2" style="padding-right: 15px;">
        <h3>Nyameye Akumia</h3>
        <p id="bio">Nyameye Akumia is a Computer Science major with a background in engineering and the arts. He is very passionate about utilizing his creativity to enhance his productivity, synthesizing his interdisciplinary skills to innovate.</p>
    </div>
</section>

<footer>
    <p>&copy; 2024 Family Wishlist Manager. All rights reserved.</p>
</footer>

</body>
</html>