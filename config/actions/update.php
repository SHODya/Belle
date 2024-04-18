<?php

require_once __DIR__ . '/../helpers.php';

checkAuth(); // Проверяем, авторизован ли пользователь

$pdo = getPDO();

// Получаем ID пользователя из сессии
$user_id = $_SESSION['user_id'] ?? null;

// Проверяем, переданы ли все необходимые данные
if (!isset($_POST['name'], $_POST['email'], $_POST['phone'])) {
    // Если какие-то данные отсутствуют, перенаправляем пользователя обратно на страницу
    setMessage('error', 'Все поля обязательны для заполнения');
    redirect('/../../cabinet.php');
}

// Получаем текущие значения из базы данных
$stmt = $pdo->prepare("SELECT name, email, phone FROM users WHERE id = :user_id");
$stmt->execute(['user_id' => $user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Получаем данные из формы
$name = $_POST['name'] ?: $user['name']; // Если имя не передано, берем предыдущее значение из базы данных
$email = $_POST['email'] ?: $user['email']; // Если email не передан, берем предыдущее значение из базы данных
$phone = $_POST['phone'] ?: $user['phone']; // Если телефон не передан, берем предыдущее значение из базы данных

// Обновляем данные в базе данных
$stmt = $pdo->prepare("UPDATE users SET name = :name, email = :email, phone = :phone WHERE id = :user_id");
$stmt->execute([
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'user_id' => $user_id
]);

// Перенаправляем пользователя на страницу профиля
redirect('/../../cabinet.php');
