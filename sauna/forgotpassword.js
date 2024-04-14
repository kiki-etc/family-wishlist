 
 function validateForgotPasswordForm() {
    var email = document.getElementById("email").value;
    var securityAnswer1 = document.getElementById("security_answer1").value;
    var securityAnswer2 = document.getElementById("security_answer2").value;
    var newPassword = document.getElementById("new_password").value;
    var confirmPassword = document.getElementById("confirm_password").value;

    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address");
        return false;
    }

    var passwordPattern = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/;
    if (!passwordPattern.test(newPassword)) {
        alert("Password must be at least 8 characters long and contain at least one number and one special character");
        return false;
    }

    if (newPassword !== confirmPassword) {
        alert("Passwords do not match");
        return false;
    }

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (!response.emailExists) {
                    alert("Email does not exist");
                    return false;
                }
                if (!response.securityQuestionsMatch) {
                    alert("Security questions are not answered correctly");
                    return false;
                }

                document.getElementById("forgotPasswordForm").submit();
            } else {
                console.error('Error checking email and security questions: ' + xhr.status);
            }
        }
    };
    xhr.open('POST', 'forgotpasswordaction.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('email=' + encodeURIComponent(email) + 
             '&security_answer1=' + encodeURIComponent(securityAnswer1) + 
             '&security_answer2=' + encodeURIComponent(securityAnswer2));

    return false; 
}