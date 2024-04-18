<?php
session_start();

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/helpers.php';

checkAuth();

// Retrieve cart items from the database for the current user
$pdo = getPDO();
$stmt = $pdo->prepare("SELECT * FROM cart WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <title>Cart</title>
</head>

<body>
    <!-- Your cart page content here -->
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Cart</h1>
                <ul>
                    <?php foreach ($cartItems as $item): ?>
                        <li>Product ID: <?php echo $item['product_id']; ?> Price: <?php echo $item['price']; ?> - Quantity: <?php echo $item['quantity']; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
