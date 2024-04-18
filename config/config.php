<?php

const DB_HOST = 'localhost';
const DB_NAME = 'Belle-db';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';

function getPDO(): PDO
{
    try {
        return new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

// Подключение к базе данных
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Проверка соединения
if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}