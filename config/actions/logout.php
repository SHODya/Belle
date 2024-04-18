<?php

require_once __DIR__ . '/../helpers.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    logout();
}

// Убедитесь, что при GET запросе также происходит выход из аккаунта
logout();

// Перенаправление после выхода из аккаунта должно быть на страницу входа, а не на кабинет
redirect('/SignIn.php');
