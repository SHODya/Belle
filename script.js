// function changeImage() {
//     if (document.getElementById("heartVoid").src == "/images/HeartVoid.png"){
//         document.getElementById("heartVoid").src = "/images/HeartFill.png";
//     } else {
//         document.getElementById("heartVoid").src = "/images/HeartVoid.png";
//     }
// }
// const heart = document.getElementById("heartVoid");

// function changeImage(element) {
//     element.classList.add("clicked");
// }

function changeImage(element) {
    if (element.style.color == "red") {
        element.style.color = "grey"
    }
    else {
        element.style.color = "red"
    }
}

document.addEventListener("DOMContentLoaded", function() {
    var emailInput = document.getElementById("Email");
    var passwordInput = document.getElementById("password");
    var confirmPasswordInput = document.getElementById("confirm_password");
    var emailError = document.getElementById("emailError");
    var passwordLatinError = document.getElementById("passwordLatinError");
    var passwordLengthError = document.getElementById("passwordLengthError");
    var confirmPasswordError = document.getElementById("confirmPasswordError");
    var submitButton = document.getElementById("submit");

    function isEmailValid(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    function isPasswordValid(password) {
        // Проверка на длину пароля и наличие только латинских букв
        return password.length >= 8 && /^[a-zA-Z0-9]+$/.test(password);
    }

    function arePasswordsMatching() {
        return passwordInput.value === confirmPasswordInput.value;
    }

    function enableSubmitButton() {
        submitButton.disabled = !(isEmailValid(emailInput.value) && isPasswordValid(passwordInput.value) && arePasswordsMatching());
    }

    function emailEvent() {
        if (isEmailValid(emailInput.value)) {
            emailError.style.display = "none";
        } else {
            emailError.style.display = "block";
        }
        enableSubmitButton();
    }

    function passwordEvent() {
        if (isPasswordValid(passwordInput.value)) {
            passwordLatinError.style.display = "none";
            passwordLengthError.style.display = "none";
        } else {
            if (passwordInput.value.length < 8) {
                passwordLengthError.style.display = "block";
            } else {
                passwordLengthError.style.display = "none";
            }
            if (!/^[a-zA-Z]+$/.test(passwordInput.value)) {
                passwordLatinError.style.display = "block";
            } else {
                passwordLatinError.style.display = "none";
            }
        }
        enableSubmitButton();
    }

    function confirmPasswordEvent() {
        if (arePasswordsMatching()) {
            confirmPasswordError.style.display = "none";
        } else {
            confirmPasswordError.style.display = "block";
        }
        enableSubmitButton();
    }

    emailInput.addEventListener("input", emailEvent);
    passwordInput.addEventListener("input", passwordEvent);
    confirmPasswordInput.addEventListener("input", confirmPasswordEvent);
});
