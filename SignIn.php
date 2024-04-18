<?php

require_once __DIR__ . '/config/helpers.php';

checkGuest();

?>

<!DOCTYPE html>
<html lang="ru" data-theme="light">

<!DOCTYPE html>
<html lang="ru" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title>Вход в аккаунт</title>
    <link rel="stylesheet" href="css/picoMin.css">
    <link rel="stylesheet" href="css/app.css">
</head>
<body>

<form class="card" action="config/actions/login.php" method="post" enctype="multipart/form-data">
	<div class="form-group">
	<h1 class="form-g-element">Вход</h1>
	<h1 class="form-g-element">\</h1>
	<a href="SignUp.php"><h1 class="form-g-element gray">Регистрация</h1></a>
	</div>
                </div>
            </nav>
        </div>
        <p>
            <label for="Email" class="floatLabel">Почта</label>
            <input type="text" id="email" name="email" placeholder="ivan@areaweb.su" value="<?php echo old('email') ?>"
                <?php echo validationErrorAttr('email'); ?>>
            <?php if (hasValidationError('email')): ?>
                <small><?php echo validationErrorMessage('email'); ?></small>
            <?php endif; ?>
        </p>
        <p>
            <label for="password" class="floatLabel">Пароль</label>
            <input type="password" id="password" name="password" placeholder="******">
        </p>

        <p>
            <input type="submit" value="Войти в аккаунт" id="submit">
        </p>
    </form>

    <!-- <script src="login.js" defer></script> -->
    <?php include_once __DIR__ . '/components/scripts.php' ?>
</body>

</html>