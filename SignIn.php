<?php

session_start();

require_once 'config/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверка наличия данных
    if (isset($_POST['Email']) && isset($_POST['password'])) {
        // Получение данных из формы
        $email = $_POST['Email'];
        $password = $_POST['password'];

        // Подготовка SQL-запроса для выборки пользователя по электронной почте
        $sql = "SELECT id, email, password FROM Users WHERE email = :email";
        if ($stmt = $mysqli->prepare($sql)) {
            // Привязка параметров
            $stmt->bind_param("s", $email);

            // Выполнение запроса
            if ($stmt->execute()) {
                // Получение результата запроса
                $result = $stmt->get_result();
                
                // Проверка наличия пользователя с такой электронной почтой
                if ($result->num_rows == 1) {
                    // Получение данных пользователя
                    $row = $result->fetch_assoc();
                    $hashed_password = $row['password'];
                    
                    // Проверка пароля
                    if (password_verify($password, $hashed_password)) {
                        // Установка сессии для авторизации
                        $_SESSION['user_id'] = $row['id'];
                        header("location: cabinet.php"); // Перенаправление на защищенную страницу
                    } else {
                        echo "Неправильный пароль!";
                    }
                } else {
                    echo "Пользователь с такой почтой не найден!";
                }
            } else {
                echo "Ошибка при выполнении запроса: " . $stmt->error;
            }

            // Закрытие запроса
            $stmt->close();
        } else {
            echo "Ошибка при подготовке запроса: " . $mysqli->error;
        }
    } else {
        echo "Пожалуйста, заполните все поля формы!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link href="style.scss" rel="stylesheet">

</head>

<body>


    <form action="#" method="post">
        <div class="LogReg">
            <nav class="navbar">

                <div class="jc-c margin-12">
                    <a href="index.php"><img src="images/BelleLogo.png"></a>
                </div>

                <div class="container jc-c">
                    <div class="menu margin-36">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <p class="nav-link navbar-item-text fontSize-24">Войти</p>
                            </li>
                            <li class="nav-item">
                                <p class="navbar-item-text fontSize-20">\</p>
                            </li>
                            <li class="nav-item">
                                <a href="SignUp.php" class="nav-link navbar-item-text fontSize-24 gray">Регистрация</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <p>
            <label for="Email" class="floatLabel">Почта</label>
            <input id="Email" name="Email" type="email" placeholder="JohnSmith@mail.ru">
            <span id="emailError" class="error">Некорректный email адрес</span>
        </p>
        <p>
            <label for="password" class="floatLabel">Пароль</label>
            <input id="password" name="password" type="password" placeholder="JohnKrutoyParol">
            <span id="passwordLatinError" class="error mrgnbtm-4">Введите пароль латинскими буквами либо цифрами</span>
            <span id="passwordLengthError" class="error">Введите пароль длиннее 8 символов</span>
        </p>

        <p>
            <input type="submit" value="Войти в аккаунт" id="submit" disabled>
        </p>
    </form>

	<script src="login.js" defer></script>
</body>

</html>
