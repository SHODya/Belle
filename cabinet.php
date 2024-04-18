<?php
require_once __DIR__ . '/config/helpers.php';

checkAuth();

$user = currentUser();
?>

<!DOCTYPE html>
<html lang="ru" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="css/picoMin.css">
    <link rel="stylesheet" href="css/app.css">
</head>
<body>

<div class="card home">
    <img
        class="avatar"
        src="<?php echo $user['avatar'] ?>"
        alt="<?php echo $user['name'] ?>"
    >
    <h1>Привет, <?php echo $user['name'] ?>!</h1>
    <form action="config/actions/logout.php" method="post">
        <button role="button">Выйти из аккаунта</button>
    </form>
</div>

<?php include_once __DIR__ . '/components/scripts.php' ?>
</body>
</html>