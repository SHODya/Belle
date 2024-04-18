<?php

require_once 'config/connect.php';

?>

<?php

// Запрос к базе данных для получения всех продуктов
$query = "SELECT * FROM `Popular`";
$popular_result = mysqli_query($mysqli, $query);
$popular = mysqli_fetch_all($popular_result);


// Функция для отображения изображения из базы данных
function displayImage($imageId, $connect)
{
    // Запрос к базе данных для получения изображения по его идентификатору
    $imgquery = "SELECT image_blob FROM Popular WHERE id = $imageId";
    $result = mysqli_query($connect, $imgquery);

    // Проверка наличия изображения
    if ($result && mysqli_num_rows($result) > 0) {
        // Установка заголовка Content-Type
        header("Content-type: image/jpeg");

        // Чтение и вывод данных BLOB-изображения
        $row = mysqli_fetch_assoc($result);
        echo $row['image_blob'];
    } else {
        // Вывод заглушки изображения или сообщения об ошибке
        echo "Изображение не найдено";
    }
}
?>

<?php
$query = "SELECT * FROM `Site-Images` ORDER BY id";
$images_result = mysqli_query($mysqli, $query);
$images = mysqli_fetch_all($images_result);

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
    <link href="css/style.css" rel="stylesheet">
    <script src="script.js"></script>
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
                        <a href="cart.php"><img class="nav-img" src="images/Bag.png"></a>
                        <a href="SignIn.php"><img class="nav-img" src="images/Profile.png"></a>
                    </nav>
                </div>
            </div>
        </nav>


        <main class="main">
            <div class="main-Img">
                <a href="#"><img src="images/mainImg.png" class="full-img"></a>
            </div>
            <div class="Content-Blocks">
                <div class="Content-Block">
                    <a href="">
                        <img src="images/img4.jpg" class="size1-img">
                        <a href="index.html" class="Left-Black-p link-custom">Твой новый топ</a>
                        <a href="product.php" class="Left-Black-p-buy link-custom">Купить</a>
                    </a>
                </div>
                <div class="Content-Block">
                    <a href="">
                        <img src="images/img3.jpg" class="size1-img">
                        <a href="index.html" class="Right-White-p link-custom">Летняя коллекция</a>
                        <a href="index.html" class="Right-White-p-buy link-custom">Купить</a>
                    </a>
                </div>

            </div>
        </main>


        <?php

        // Отображение надписи "Популярное" и изображений
        echo '<div class="popular">';
        echo '<div class="alItems-c">';
        echo '<a href="index.html" class="nav-link">Популярное</a>';
        echo '<a href="index.html"><img src="images/Arrow-right.png" class="link-line"></a>';
        echo '</div>';
        echo '<div class="popular-blocks">'; // Начало контейнера для блоков
        foreach ($popular as $index => $popproduct) {
            $heartId = 'heartVoid' . ($index + 1); // Динамический идентификатор для кнопки сердца
            ?>
            <div class="popular-block">
                <a href="index.html"><img src="data:image/jpeg;base64,<?= base64_encode($popproduct[4]) ?>"
                        class="popular-img"></a>
                <button id="<?= $heartId ?>" class="item-fav<?= $index + 1 ?> fav-btn"><i class="fa-solid fa-heart"
                        onclick="changeImage(this)"></i></button>
                <a href="" class="Inter nav-link margin-12"><?= $popproduct[1] ?></a>
                <a href="" class="BlueCurve nav-link margin-12"><?= $popproduct[2] ?>тг</a>
            </div>
            <?php
        }
        echo '</div>'; // Закрытие контейнера для блоков
        echo '</div>'; // Закрытие контейнера для "Популярное"
        
        ?>


        <!-- <div class="popular">
                <div class="links-line">
                    <a href="index.html" class="nav-link">Популярное</a>
                    <a href="index.html"><img src="images/Arrow-right.png" class="link-line"></a>
                </div>
                <div class="popular-blocks">
                    <div class="popular-block">
                        <a href="index.html"><img src="images/Popular1.jpg" class="popular-img"></a>
                        <button id="heartVoid1" class="item-fav1 fav-btn"><i class="fa-solid fa-heart" onclick="changeImage(this)"></i></button>
                        <a href="" class="Inter nav-link margin-12">Юбка-шорты</a>
                        <a href="" class="BlueCurve nav-link margin-12">16990 тг</a>

                    </div>
                    <div class="popular-block">
                        <a href="index.html"><img src="images/Popular2.jpg" class="popular-img"></a>
                        <button id="heartVoid2" class="item-fav2 fav-btn"><i class="fa-solid fa-heart" onclick="changeImage(this)"></i></button>
                        <a href="" class="Inter nav-link margin-12">Футболка-поло</a>
                        <a href="" class="BlueCurve nav-link margin-12">5990 тг</a>
                    </div>
                    <div class="popular-block">
                        <a href="index.html"><img src="images/Popular3.jpg" class="popular-img"></a>
                        <button id="heartVoid3" class="item-fav3 fav-btn"><i class="fa-solid fa-heart" onclick="changeImage(this)"></i></button>
                        <a href="" class="Inter nav-link margin-12">Широкие джинсы для девочек</a>
                        <a href="" class="BlueCurve nav-link margin-12">9990 тг</a>
                    </div>
                </div>
            </div> -->
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


    </wraper>


</body>

</html>