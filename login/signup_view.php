<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Signup</title>
    <link rel="stylesheet" href="../css/login_style.css" />
</head>
<style>
.radio {
    height: 60px;
    width: 100%;
    padding: 10px 15px 0;
    font-size: 17px;
    margin-bottom: 1.3rem;
    border: 1px solid #ddd;
    border-radius: 6px;
    outline: none;
}


.radio-container {
    display: inline;
    align-items: center;
}



.radio-container input[type="radio"] {
    appearance: none;
    display: inline;
    -webkit-appearance: none;
    -moz-appearance: none;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    border: 2px solid #753900;
    outline: none;
    cursor: pointer;
    position: relative;
    margin-right: 10px;
    padding-bottom: 5px;
}

.radio-container input[type="radio"]:checked::before {
    content: '';
    width: 10px;
    height: 10px;
    background-color: #753900;
    border-radius: 50%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.radio-container label {
    color: gray;
    font-size: 16px;
}

.radio-container label:hover {
    cursor: pointer;
}
</style>
<body>
    <div class="container">
        <div class="login form">
            <header>Signup</header>
            <form action="../actions/signup_action.php" method="post">
                <?php
                if (isset($_GET['userror'])) { ?>
                    <p class="error" style="color:red"><?php echo $_GET['error'] ?></p>
                <?php } ?>
                <input type="text" name="fname" id="fname" pattern="[A-Za-z]{2,50}" placeholder="First Name">

                <input type="text" name="lname" id="lname" pattern="[A-Za-z]{2,50}" placeholder="Last Name">
                <label style="color:gray;">Gender </label>

                <div class="radio">
                    <div class="radio-container">
                        <input type="radio" name="gender" id="gender-male" value="male">
                        <label for="gender-male">Male</label>
                    </div>
                    <div class="radio-container">
                        <input type="radio" name="gender" id="gender-female" value="female">
                        <label for="gender-female">Female</label>
                    </div>
                    <div class="radio-container">
                        <input type="radio" name="gender" id="gender-other" value="other">
                        <label for="gender-other">Other</label>
                    </div>
                </div>
                <?php
                include "../settings/connection.php";

                $sql = "SELECT * FROM Role ORDER BY rid ASC";
                $result = mysqli_query($conn, $sql);

                if ($result->num_rows > 0) {
                    $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
                }
                ?>
                <label style="color:gray;">Role </label>
                <select name="user-role" id="user-role">
                    <?php
                    foreach ($options as $option) {
                        if ($option['rid'] != 1) {
                            echo " <option value='" . $option['rid'] . "'>" . $option['rname'] . "</option>";
                        }
                    }
                    ?>

                </select>

                <input type="text" name="phone_number" id="phone_number" pattern="^[+\d\s]+$" placeholder="Phone Number">

                <input type="email" name="register_email" id="register_email" placeholder="Email">

                <input type="password" name="register_password" id="register_password" placeholder="Password">

                <input type="password" name="register_password1" id="register_password1" placeholder="Confirm Password">

                <input type="submit" class="button" name="submit_button" id="submit_button">

            </form>
            <div class="signup">
                <span class="signup">Already have an account?
                    <label for="check" style="color:#1C402E;"><a href="../login/login_view.php">Login</a></label>
                </span>
            </div>
        </div>
    </div>
</body>

</html>