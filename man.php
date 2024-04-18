<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link href="css/style.css" rel="stylesheet" />
    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/adf5d34ddb.js" crossorigin="anonymous"></script>

    <title>Belle</title>
</head>

<body>
    <wraper class="wraper">
        <nav class="navbar align-self-center shadow">
            <div class="container">
                <div class="menu">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="man.php" class="nav-link navbar-item-text">Мужчинам</a>
                        </li>
                        <li class="nav-item">
                            <a href="woman.php" class="nav-link navbar-item-text">Женщинам</a>
                        </li>
                    </ul>
                </div>
                <nav class="navbar-brand">
                    <a href="index.php"><img src="images/BelleLogo.png" /></a>
                </nav>
                <div class="menu">
                    <nav class="nav-item btn">
                        <a href="favorite.php"><img class="nav-img" src="images/Heart.png" /></a>
                        <a href="cart.php"><img class="nav-img" src="images/Bag.png" /></a>
                        <a href="SignIn.php"><img class="nav-img" src="images/Profile.png" /></a>
                    </nav>
                </div>
            </div>
        </nav>

        <main>
            <div class="header-link-line">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="/index.php" class="nav-link gray">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link gray">></a>
                    </li>
                    <li class="nav-item">
                        <a href="man.php" class="nav-link gray">Мужчинам</a>
                    </li>
                </ul>
            </div>
            <h1 class="margin-left-11pr">Мужская одежда</h1>
            <hr class="custom-line" />
            <div class="inl-block wrap">
                <div class="cabinet-left-menu">
                    <ul class="cabinet-ul">
                        <li class="margin-bottom-12 black fontSize-18">
                            <a class="nav-link" href="#new">
                                Новинки
                            </a>
                        </li>
                        <li class="margin-bottom-12 black fontSize-18">
                            <a class="nav-link" href="#categories">
                                Категории
                            </a>
                        </li>
                        <li class="margin-bottom-12 black fontSize-18">
                            <a class="nav-link" href="#popular">
                                Популярное
                            </a>
                        </li>
                    </ul>
                </div>


                <div id="new" class="popular">
                    <div class="links-line">
                        <h3>Новинки</h3>
                    </div>
                    <div class="popular-blocks">
                        <div class="popular-block">
                            <a href="index.html"><img src="images/Popular2.jpg" class="popular-img"></a>
                            <button id="heartVoid1" class="item-fav1 fav-btn"><i class="fa-solid fa-heart"
                                    onclick="changeImage(this)"></i></button>
                            <a href="" class="Inter nav-link margin-12">Футболка-поло</a>
                            <a href="" class="BlueCurve nav-link margin-12">5990 тг</a>

                        </div>
                        <div class="popular-block">
                            <a href="index.html"><img src="images/manNew1.jpg" class="popular-img"></a>
                            <button id="heartVoid2" class="item-fav2 fav-btn"><i class="fa-solid fa-heart"
                                    onclick="changeImage(this)"></i></button>
                            <a href="product.php" class="Inter nav-link margin-12">Вязанный джакет на молнии</a>
                            <a href="product.php" class="BlueCurve nav-link margin-12">19990 тг</a>
                        </div>
                        <div class="popular-block">
                            <a href="index.html"><img src="images/manNew2.jpg" class="popular-img"></a>
                            <button id="heartVoid3" class="item-fav3 fav-btn"><i class="fa-solid fa-heart"
                                    onclick="changeImage(this)"></i></button>
                            <a href="" class="Inter nav-link margin-12">Утепленные джинсы</a>
                            <a href="" class="BlueCurve nav-link margin-12">17990 тг</a>
                        </div>
                    </div>
                </div>

                <div id="categories" class="five-img-block margin-left-11pr">
                    <div class="inl-block">
                        <div class="three-img">
                            <img class="" src="images/manShirts.jpg" alt="">
                            <p class="">Куртки</p>
                        </div>
                        <div class="three-img">
                            <img class="" src="images/manJeans.jpg" alt="">
                            <p class="">Брюки</p>
                        </div>
                        <div class="three-img">
                            <img class="" src="images/manJamper.jpg" alt="">
                            <p class="">Джемперы</p>
                        </div>
                    </div>

                    <div class="inl-block">
                        <div class="two-img">
                            <img class="" src="images/manAccessories.jpg" alt="">
                            <p class="">Аксессуары</p>
                        </div>
                        <div class="two-img">
                            <img class="" src="images/manBagBackpacks.jpg" alt="">
                            <p class="">Сумки и рюкзаки</p>
                        </div>
                    </div>

                </div>

                <div id="popular" class="popular margin-left-19pr">
                    <div class="links-line">
                        <a href="index.html" class="nav-link fontSize-24">Популярное</a>
                    </div>
                    <div class="popular-blocks">
                        <div class="popular-block">
                            <a href="index.html"><img src="images/manPopular1.jpg" class="popular-img"></a>
                            <button id="heartVoid1" class="item-fav1 fav-btn"><i class="fa-solid fa-heart"
                                    onclick="changeImage(this)"></i></button>
                            <a href="" class="Inter nav-link margin-12">Базовые брюки-чиносы</a>
                            <a href="" class="BlueCurve nav-link margin-12">6990 тг</a>

                        </div>
                        <div class="popular-block">
                            <a href="index.html"><img src="images/manPopular2.jpg" class="popular-img"></a>
                            <button id="heartVoid2" class="item-fav2 fav-btn"><i class="fa-solid fa-heart"
                                    onclick="changeImage(this)"></i></button>
                            <a href="" class="Inter nav-link margin-12">Брюки-чиносы</a>
                            <a href="" class="BlueCurve nav-link margin-12">6990 тг</a>
                        </div>
                        <div class="popular-block">
                            <a href="index.html"><img src="images/manPopular3.jpg" class="popular-img"></a>
                            <button id="heartVoid3" class="item-fav3 fav-btn"><i class="fa-solid fa-heart"
                                    onclick="changeImage(this)"></i></button>
                            <a href="" class="Inter nav-link margin-12">Куртка из искусственной кожи</a>
                            <a href="" class="BlueCurve nav-link margin-12">9990 тг</a>
                        </div>
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
    </wraper>
</body>

</html>