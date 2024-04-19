<?php
require_once __DIR__ . '\config\helpers.php';

$id = 12; // Пример: ID товара, который вы хотите отобразить
$sql = "SELECT name, price, id FROM Products WHERE id = $id";
$result = $mysqli->query($sql);

// Проверка наличия результатов
if ($result->num_rows > 0) {
    // Отображение данных на странице
    while ($row = $result->fetch_assoc()) {
        $name = $row["name"];
        $price = $row["price"];
        $id = $row["id"];
    }
} else {
    echo "Товар не найден";
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link href="css/style.css" rel="stylesheet">
    <script src="script.js"></script>
    <script src="cart.js"></script>
    <script src="https://kit.fontawesome.com/adf5d34ddb.js" crossorigin="anonymous"></script>
    <title>Belle</title>
</head>

<body>
    <wraper class="wraper">
        <nav class="navbar align-self-center shadow">
            <div class="container">
                <div class="menu ">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="man.php" class="nav-link navbar-item-text ">Мужчинам</a>
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
                        <a href="cart.php" class="Cart"><img class="nav-img" src="images/Bag.png"></a>
                        <a href="SignIn.php"><img class="nav-img" src="images/Profile.png"></a>
                    </nav>
                </div>
            </div>
        </nav>

        <div class="header-link-line">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="/index.php" class="nav-link gray">Главная</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link gray">></a>
                </li>
                <li class="nav-item">
                    <a href="/woman.php" class="nav-link gray">Женщинам</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link gray">></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link gray">Джемперы и кардиганы</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link gray">></a>
                </li>
                <li class="nav-item">
                    <a href="product.html" class="nav-link gray">Джемпер-анорак</a>
                </li>
            </ul>
        </div>

        <div class="product-main">
            <div class="image-block">
                <div class="image-half">
                    <img src="images/Product-bigImg1.jpg">
                </div>
                <div class="four-image">
                    <img class="padding-6" src="images/product-smallImg1.jpg" alt="">
                    <img class="" src="images/product-smallImg2.jpg" alt="">
                    <img class="padding-6" src="images/product-smallImg3.jpg" alt="">
                    <img class="" src="images/product-smallImg4.jpg" alt="">
                </div>
            </div>
            <div class="func-block">
                <div class="product-info">
                    <div class="inl-block">
                        <p class="margin-right-100"><?php echo $name; ?></p>
                        <p class="gray"><?php echo $id; ?></p>
                    </div>

                    <p class=""><?php echo $price; ?> тг</p>
                    <p class="">Размер</p>
                    <div class="product-buttons margin-bottom-20">
                        <button class="white-btn padding-12">XS</button>
                        <button class="white-btn padding-12">S</button>
                        <button class="white-btn padding-12">M</button>
                        <button class="white-btn padding-12">L</button>
                    </div>
                    <div class="product-buttons margin-bottom-20 ">
                        <button class="add-to-cart-btn" data-product-id="<?php echo $id; ?>"
                            data-price="<?php echo $price; ?>"
                            data-user-id="<?php echo currentUser()['id']; ?>">Добавить в корзину</button>

                        <button class="clear-btn margin-12"><img src="images/HeartVoid.png" alt=""
                                class="small-custom2"></button>
                    </div>
                    <div class="inl-block">
                        <img class="small-custom margin-right-10" src="images/Warning.png" alt="">
                        <p class="margin-padding-0"> Доставка курьером: не доступна</p>
                    </div>

                    <br>
                    <div class="product-description">
                        <p class="">
                            ОПИСАНИЕ
                        </p>
                        <p class="">
                            Джемпер-анорак
                        </p>
                        <p class="">
                            - Мягкий трикотаж fleece terry <br>
                            - Воротник-стойка на молнии <br>
                            - Длинный рукав <br>
                            - Принт в тон <br>
                            - Резинка по низу <br>
                            - Свободный силуэт <br> <br>
                            - Размер модели на фото: S <br>
                            - Рост модели на фото: 173 см <br>
                            - Параметры модели на фото: <br>
                            - грудь: 78 <br>
                            - талия: 60 <br>
                            - бёдра: 87 <br> <br>
                            Размер этого товара меньше обычного <br>
                            Страна производства: Китай <br> <br>
                            Состав <br>
                            - 65% Полиэстер, 35% Хлопок
                        </p>
                    </div>
                </div>
            </div>
        </div>

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


    </wraper>
</body>

</html>