<?php
// Проверяем, установлена ли сессия авторизации
session_start();
if (!isset($_SESSION['user_id'])) {
    // Если сессия не установлена, перенаправляем на страницу входа
    header("Location: SignIn.php");
    exit();
}

// Если сессия установлена, получаем информацию о пользователе
require_once 'config/connect.php';

$user_id = $_SESSION['user_id'];
$sql = "SELECT name, email FROM Users WHERE id = ?";
if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($name, $email);
    $stmt->fetch();
    $stmt->close();
} else {
    echo "Ошибка при подготовке запроса: " . $mysqli->error;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link href="style.scss" rel="stylesheet">
    <script src="script.js" defer></script>
</head>

<body>

    <h1>Добро пожаловать в ваш личный кабинет, <?php echo $name; ?>!</h1>
    <p>Имя: <?php echo $name; ?></p>
    <p>Email: <?php echo $email; ?></p>

    <!-- Добавьте другие элементы интерфейса и функциональность здесь -->

    <p><a href="logout.php">Выйти из аккаунта</a></p>
</body>

</html>
