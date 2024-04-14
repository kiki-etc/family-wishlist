<?php
include_once 'connection.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forgot Password</title>
<link rel="stylesheet" href="userentry.css">
</head>
<body>

<div class="container">    
  <div class="right-section">
    <h1 class="title">Sauna: Forgot Passoword</h1>
    
    <form class = "form-box" action="forgotpasswordaction.php" method="post" id="forgotPasswordForm" onsubmit="return validateForgotPasswordForm()" >
    <div class = form-group>
      <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div>
        <label for="security_question1">Security Question 1: What is your favorite animal?</label>
        <input type="text" id="security_answer1" name="security_answer1" required>
      </div>
      <div>
        <label for="security_question2">Security Question 2:</label>
        <input type="text" id="security_answer2" name="security_answer2" required>
      </div>
      <div>
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required>
      </div>
      <div>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
      </div>
      <button type="submit" name ="button">Reset Password</button>
    </div>  
    </form>
    <div class="register-link">
                Remember your password?<a href="login.php">Login here</a>
    </div>

<script src="../js/forgotpassword.js"></script>
</body>
</html>
