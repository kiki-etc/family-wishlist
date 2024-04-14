
function validateForm() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmpassword").value;
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var passwordPattern = /^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9]).{8,}$/;

    var valid = true;

    if (!emailPattern.test(email)) {
        document.getElementById("emailError").innerText = "Invalid email address";
        valid = false;
    } else {
        document.getElementById("emailError").innerText = "";
    }

    if (!passwordPattern.test(password)) {
        document.getElementById("passwordError").innerText = "Password must be at least 8 characters long and include a number and a special character";
        valid = false;
    } else {
        document.getElementById("passwordError").innerText = "";
    }

    if (password !== confirmPassword) {
        document.getElementById("confirmPasswordError").innerText = "Passwords do not match";
        valid = false;
    } else {
        document.getElementById("confirmPasswordError").innerText = "";
    }

    return valid;
}
  
function checkUsername() {
    var username = document.getElementById("username").value;
    var usernameError = document.getElementById("usernameError");

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.exists) {
                    usernameError.innerText = "Username already exists";
                } else {
                    usernameError.innerText = "";
                }
            } else {
                console.error('Error checking username: ' + xhr.status);
            }
        }
    };
    xhr.open('GET', 'checkusername.php?username=' + encodeURIComponent(username), true);
    xhr.send();
}