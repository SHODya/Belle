<?php
session_start();

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/helpers.php';

checkAuth();

// Retrieve cart items from the database for the current user
$pdo = getPDO();
$stmt = $pdo->prepare("SELECT * FROM favorite WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$favoriteItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
$user = currentUser();

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script src="script.js"></script>
    <script src="cart.js"></script>
    <script src="https://kit.fontawesome.com/adf5d34ddb.js" crossorigin="anonymous"></script>
    <title>Belle</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <wraper class="wraper">
        <nav class="navbar align-self-center shadow">
            <div class="container">
                <div class="menu ">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="man.php" class="nav-link navbar-item-text BlueCurve">Мужчинам</a>
                        </li>
                        <li class="nav-item">
                            <a href="woman.php" class="nav-link navbar-item-text ">Женщинам</a>
                        </li>
                    </ul>
                </div>
                <nav class="navbar-brand">
                    <a href="index.php"><img src="images/BelleLogo.png"></a>

                </nav>
                <div class="menu">
                    <nav class="nav-item btn">
                        <a href="favorite.php"><img class="nav-img" src="images/Heart.png"></a>
                        <a href="cart.php"><img class="nav-img" src="images/Bag.png"></a>
                        <a href="SignIn.php"><img class="nav-img" src="images/Profile.png"></a>
                    </nav>
                </div>
            </div>
        </nav>
        <div class="header-link-line">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link gray">Главная</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link gray">></a>
                </li>
                <li class="nav-item">
                    <a href="cabinet.php" class="nav-link gray">Аккаунт</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link gray">></a>
                </li>
                <li class="nav-item">
                    <a href="cart.php" class="nav-link gray">Корзина</a>
                </li>
            </ul>
        </div>

        <main class="cabinet-main margin-left-11pr">
            <div class="cabinet-left-menu">
                <ul class="cabinet-ul">
                    <li class="cabinet-li"><a class="nav-link" href="cabinet.php">Профиль</a></li>
                    <li class="cabinet-li li-active"><a class="nav-link" href="favorite.php">Избранное</a></li>
                    <li class="cabinet-li"><a class="nav-link" href="cart.php">Корзина</a></li>
                    <li class="cabinet-li"><a class="nav-link" href="orders.php">Заказы</a></li>
                </ul>
            </div>

            <div class="margin-bottom-20">

                <div id="new" class="popular margin-bottom-20">
                    <div class="links-line">
                        <h3>Избранное</h3>
                    </div>

                    <div class="popular-blocks margin-bottom-150">
                        <?php foreach ($favoriteItems as $index => $item): ?>
                            <div class="favorite-block">
                                <div class="fav-image-container">
                                    <a href="index.html"><img src="<?php echo $item['product_image']; ?>"
                                            class="popular-img"></a>
                                    <button id="heartVoid<?php echo $index + 1; ?>" class="cab-fav-btn"
                                        onclick="changeImage(this)">
                                        <i class="fa-solid fa-heart fav-wh"></i>
                                    </button>
                                </div>
                                <div>
                                    <a href="" class="Inter nav-link margin-12"><?php echo $item['product_name']; ?></a>
                                    <a href="" class="BlueCurve nav-link margin-12"><?php echo $item['price']; ?> тг</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>


            </div>



            </div>


        </main>

        <bottom>
            <div class="bottomInfo">
                <div class="bottomInfos">
                    <div class="margin-12">
                        <a href="" class="infoHeader Inter nav-link">Покупателю</a>
                        <a href="" class="infoItem Inter nav-link">Акции</a>
                        <a href="" class="infoItem Inter nav-link">Доставка</a>
                        <a href="" class="infoItem Inter nav-link">Оплата</a>
                        <a href="" class="infoItem Inter nav-link">Обмен и возврат</a>
                        <a href="" class="infoItem Inter nav-link">Забрать в магазине</a>
                        <a href="" class="infoItem Inter nav-link">Размеры</a>
                        <a href="" class="infoItem Inter nav-link">FAQ</a>
                        <a href="" class="infoItem Inter nav-link">Уход за одеждой</a>
                    </div>
                    <div class="margin-12">
                        <a href="" class="infoHeader Inter nav-link">Клубная программа</a>
                        <a href="" class="infoItem Inter nav-link">Частые вопросы</a>
                        <a href="" class="infoItem Inter nav-link">Правила участия</a>
                        <a href="" class="infoItem Inter nav-link">Стать участником</a>
                        <a href="" class="infoItem Inter nav-link">Виды карт</a>
                    </div>
                    <div class="margin-12">
                        <a href="" class="infoHeader Inter nav-link">О компании</a>
                        <a href="" class="infoItem Inter nav-link">Новости</a>
                        <a href="" class="infoItem Inter nav-link">Адреса магазинов</a>
                        <a href="" class="infoItem Inter nav-link">Публичная оферта</a>
                        <a href="" class="infoItem Inter nav-link">Пользовательское соглашение</a>
                    </div>
                    <div class="margin-12">
                        <img src="images/BelleWhite.png" class="infoItem">
                        <p class="infoItem Inter">Belle - это комфортный интернет-шопинг и 31 розничный магазин. 14 лет
                            мы выпускаем одежду <br> в стиле сasual для любых ситуаций, времени года и погоды, помогая
                            покупателям создать<br> свой собственный, неповторимый образ.</p>
                    </div>
                </div>
            </div>

        </bottom>
        <script src="quantity.js"></script>

    </wraper>
</body>