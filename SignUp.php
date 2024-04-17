<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Регистрация</title>
	<link href="style.scss" rel="stylesheet">
	<script src="script.js" defer></script>
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
								<a href="SignIn.php" class="nav-link navbar-item-text fontSize-24 gray">Войти</a>
							</li>
							<li class="nav-item">
								<p class="navbar-item-text fontSize-20">\</p>
							</li>
							<li class="nav-item">
								<p class="nav-link navbar-item-text fontSize-24">Регистрация</p>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<p>
			<label for="Email" class="floatLabel">Почта</label>
			<input id="Email" name="Email" type="email">
			<span id="emailError" class="error">Некорректный email адрес</span>
		</p>
		<p>
			<label for="password" class="floatLabel">Пароль</label>
			<input id="password" name="password" type="password">
			<span id="passwordLatinError" class="error mrgnbtm-4">Введите пароль латинскими буквами либо цифрами</span>
			<span id="passwordLengthError" class="error">Введите пароль длиннее 8 символов</span>
		</p>
		<p>
			<label for="confirm_password" class="floatLabel">Подтвердите пароль</label>
			<input id="confirm_password" name="confirm_password" type="password">
			<span id="confirmPasswordError" class="error">Ваши пароли не совпадают</span>
		</p>
		<p>
			<input type="submit" value="Создать аккаунт" id="submit" disabled>
		</p>
	</form>
</body>

</html>