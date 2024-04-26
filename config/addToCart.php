<?php
session_start();

require_once __DIR__ . '\config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    exit('Unauthorized');
}

// Check if productId, price, name, quantity, image, and color are provided
if (!isset($_POST['productId'], $_POST['price'], $_POST['name'], $_POST['quantity'], $_POST['image'], $_POST['color'])) {
    http_response_code(400);
    exit('Bad request');
}

$productId = $_POST['productId'];
$price = $_POST['price'];
$name = $_POST['name'];
$quantity = intval($_POST['quantity']);
$userId = $_SESSION['user_id'];
$image = $_POST['image'];
$color = $_POST['color'];
$size = $_POST['size'];

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

    // Add product to cart in the database
    $stmt = $pdo->prepare("INSERT INTO `cart` (`name`, `product-image`, `user_id`, `product_id`, `quantity`, `price`, `color`, `size`, `created_at`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)");
    $stmt->execute([$name, $image, $userId, $productId, $quantity, $price, $color, $size]);

    if ($stmt->errorCode() !== '00000') {
        $errorInfo = $stmt->errorInfo();
        echo "Ошибка выполнения запроса: " . $errorInfo[2];
    }

    http_response_code(200);
    exit('Product added to cart');
} catch (PDOException $e) {
    http_response_code(500);
    exit('Database error: ' . $e->getMessage());
}
