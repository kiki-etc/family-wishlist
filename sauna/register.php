<?php
include 'connection.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration Page</title>
<link rel="stylesheet" href="userentry.css">
</head>
<body>

<div class="container">    
    <div class="right-section">
        <h1 class="title">Sauna: Sign Up Here</h1>
    
        <form class ="form-box" action="registeraction.php" method="post"  onsubmit="return validateForm()"  >
        <div class = form-group>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <span id="emailError" style="color: black;"></span>
            </div>
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required onblur="checkUsername()">
                <span id="usernameError" style="color: black;"></span>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <span id="passwordError" style="color: black;"></span>
            </div>
            <div>
                <label for="confirmpassword">Confirm Password:</label>
                <input type="password" id="confirmpassword" name="confirmpassword" required>
                <span id="confirmPasswordError" style="color: black;"></span>
            </div>
            <div>
                <label for="security_question1">Security Question 1: What is your favorite animal?</label>
                <input type="text" id="security_answer1" name="security_answer1" required>
            </div>
            <div>
                <label for="security_question2">Security Question 2: What is your favorite teacher's name?</label>
                <input type="text" id="security_answer2" name="security_answer2" required>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" name="button">Register</button>
        </div>
        </form>
        <div class = "register-link">
            Already have an account? <a href="index.html">Login here</a>
        </div>
    </div>

</div>
<script src="register.js"></script>
</body>
</html>