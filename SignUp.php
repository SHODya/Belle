<?php
require_once 'config/connect.php';
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Проверка наличия данных
	if (isset($_POST['name']) && isset($_POST['Email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
		// Получение данных из формы
		$name = $_POST['name'];
		$email = $_POST['Email'];
		$password = $_POST['password'];
		$confirm_password = $_POST['confirm_password'];

		// Проверка совпадения паролей
		if ($password !== $confirm_password) {
			echo "Введенные пароли не совпадают!";
		} else {
			// Хеширование пароля перед сохранением
			$hashed_password = password_hash($password, PASSWORD_DEFAULT);

			// SQL-запрос для вставки данных в таблицу Users
			$sql = "INSERT INTO Users (name, email, password) VALUES (?, ?, ?)";
			if ($stmt = $mysqli->prepare($sql)) {
				// Привязка параметров
				$stmt->bind_param("sss", $name, $email, $hashed_password);

				// Попытка выполнения запроса
				if ($stmt->execute()) {
					echo "Пользователь успешно зарегистрирован!";
					header("Location: SignIn.php");
				} else {
					echo "Ошибка при выполнении запроса: " . $stmt->error;
				}

				// Закрытие запроса
				$stmt->close();
			} else {
				echo "Ошибка при подготовке запроса: " . $mysqli->error;
			}
		}
	} else {
		echo "Пожалуйста, заполните все поля формы!";
	}
}
?>


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
			<label for="Name" class="floatLabel">Имя</label>
			<input id="name" name="name" type="text">
		</p>
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