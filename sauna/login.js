function validateLoginForm() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var passwordPattern = /^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9]).{8,}$/;
  




    if (!emailPattern.test(email)) {
        document.getElementById("emailError").innerText = "Invalid email address";
        return false;
    } else {
        document.getElementById("emailError").innerText = "";
    }

    if (!passwordPattern.test(password)) {
        document.getElementById("passwordError").innerText = "Invalid Password";
        return false;
    } else {
        document.getElementById("passwordError").innerText = "";
    }


    return true;
}
