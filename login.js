document.addEventListener("DOMContentLoaded", function() {
    var emailInput = document.getElementById("Email");
    var passwordInput = document.getElementById("password");
    var emailError = document.getElementById("emailError");
    var passwordLatinError = document.getElementById("passwordLatinError");
    var passwordLengthError = document.getElementById("passwordLengthError");
    var submitButton = document.getElementById("submit");

    function isEmailValid(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    function isPasswordValid(password) {
        // Проверка на длину пароля и наличие как цифр, так и латинских букв
        return password.length >= 8 && /[a-zA-Z]/.test(password) && /[0-9]/.test(password);
    }

    function enableSubmitButton() {
        submitButton.disabled = !(isEmailValid(emailInput.value) && isPasswordValid(passwordInput.value));
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
            if (!/^[a-zA-Z]+$/.test(passwordInput.value) || !/^[0-9]+$/.test(passwordInput.value)) {
                passwordLatinError.style.display = "block";
            } else {
                passwordLatinError.style.display = "none";
            }
        }
        enableSubmitButton();
    }

    emailInput.addEventListener("input", emailEvent);
    passwordInput.addEventListener("input", passwordEvent);
});

document.querySelector("form").addEventListener("submit", function(event) {
    // Предотвращаем стандартное поведение отправки формы
    event.preventDefault();
    
    // Добавьте здесь логику для отправки данных формы на сервер
});
