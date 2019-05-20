<?php
require "session.php";
?>
<!DOCTYPE html>
<lang="en">
<head>
    <meta charset="UTF-8">
    <title>EcoMarket</title>
    <link rel="shortcut icon" type="" href="MainIcon.jpg">
    <link rel="stylesheet" href="style.css" >
    <link rel="stylesheet" href="MainStyle.css">
</head>

<body>
<header>
    <div class="headlogo">
        <img src="MainLogo.png" alt="Логотип сайта" title="Логотип сайта">

        <div class="Name">
        <?php
        if(isset($_SESSION['Name'])){
            ?>
            Пользователь:
            <?php
            echo $_SESSION['Name'];
        }else{
            if (isset($_COOKIE['Name'])) {
                ?>
                Пользователь:
                <?php
                echo $_COOKIE['Name'];
            }
        }
        ?>
        </div>
        <div class="headTitle"><h1>Магазин экологических товаров</h1></div>
    </div>
    <div class="mid">
        <div class="headlo">
            <div class="topmenu">
                <aside>

                    <a href="index.php?id=1">Главная</a>
                    <a href="index.php?id=2">Новости</a>
                    <a href="index.php?id=3">Каталог</a>
                    <a href="index.php?id=4">Контакты</a>
                    <a href="index.php?id=5">О нас</a>
                    <?php
                    if((isset($_SESSION['Name']))||(isset($_COOKIE['Name']))){
                        ?>
                        <a href="index.php?id=6">Выход</a>
                        <?php
                    }else{
                        ?>
                        <a href="index.php?id=7">Регистрация</a>
                        <a href="index.php?id=8">Вход</a>
                        <?php
                    }
                    ?>


                </aside>
            </div>
        </div>
    </div>
</header><div class="divider">
</div>
<div class="content" >
    <div class="midcol">

        <div class="littleabout">
            <p class="about">
                Первый в Беларуси магазин без упаковки, где можно купить косметику, моющие средства на разлив и товары,
                которые сокращают мусор вокруг.Мы убеждены, что потреблять нужно бережно. Именно поэтому предлагаем Вам покупки в новом (хорошо забытом старом) формате - в многоразовую или свою тару - без лишних хлопот, с исключительным комфортом.
                Мы знаем, что это работает. Попробуйте!
            </p>
        </div>

        <div class="mainpic">
            <div class="midpictext">
                <div class="texton">
                    <p class="textonpic">Более 70% бытовых отходов в мире не перерабатывается!</p>
                    <p class="lasttext">Останови это с нами. Вся продукция нашего магазина безопасна для окружающей среды.</p>
                </div>
            </div>
        </div>

        <div class="popular">
            <p>
                Самые популярные товары:
            </p>

        </div>
        <div id="slider">
            <input type="radio" name="slider" id="slide1" checked="">
            <input type="radio" name="slider" id="slide2">
            <input type="radio" name="slider" id="slide3">
            <input type="radio" name="slider" id="slide4">

            <div id="slides">
                <div id="overflow">
                    <div class="inner">
                        <div class="page">
                            <img src="fordish.jpg" />
                        </div>
                        <div class="page">
                            <img src="333.jpg" />
                        </div>
                        <div class="page">
                            <img src="bags.jpg" />
                        </div>
                        <div class="page">
                            <img src="avoska.jpg" />
                        </div>
                    </div> <!--inner-->
                </div> <!--overflow-->
            </div> <!--slides-->

            <div id="controls">
                <label for="slide1"></label>
                <label for="slide2"></label>
                <label for="slide3"></label>
                <label for="slide4"></label>
            </div>

            <div id="active">
                <label for="slide1"></label>
                <label for="slide2"></label>
                <label for="slide3"></label>
                <label for="slide4"></label>
            </div>
        </div>
        <div class="linktocat">
            <a href="#" class="tocatalog">Перейти в каталог</a>

        </div>
    </div>
</div><!--content><-->


<footer>

</footer>


</body>
</html>