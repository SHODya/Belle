<?php
session_start();

require_once __DIR__ . '/config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    exit('Unauthorized');
}

// Check if totalQuantity, userId, totalPrice, productList, and deliveryPoint are provided
if (!isset($_POST['totalQuantity'], $_POST['userId'], $_POST['totalPrice'], $_POST['productList'], $_POST['deliveryPoint'])) {
    http_response_code(400);
    exit('Bad request');
}

$totalQuantity = $_POST['totalQuantity'];
$userId = $_POST['userId'];
$totalPrice = $_POST['totalPrice'];
$productList = $_POST['productList'];
$deliveryPoint = $_POST['deliveryPoint'];


try {
    // Check if the user exists
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT id FROM users WHERE id = ?");
    $stmt->execute([$userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        http_response_code(404);
        exit('User not found');
    }

    $stmt = $pdo->prepare("INSERT INTO `orders` (`quantity`, `price`, `delivery_point`, `user_id`, `product_list`, `created_at`) VALUES (?, ?, ?, ?, ?, CURRENT_TIMESTAMP)");
    $stmt->execute([$totalQuantity, $totalPrice, $deliveryPoint, $userId, $productList]);

    if ($stmt->errorCode() !== '00000') {
        $errorInfo = $stmt->errorInfo();
        echo "Ошибка выполнения запроса: " . $errorInfo[2];
    }

    http_response_code(200);
    exit('Order placed successfully');

} catch (PDOException $e) {
    http_response_code(500);
    exit('Database error: ' . $e->getMessage());
}