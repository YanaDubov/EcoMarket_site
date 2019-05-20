<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EcoMarket</title>
    <link rel="shortcut icon" type="image/x -icon" href="MainIcon.jpg">
    <link rel="stylesheet" href="style.css" >
    <link rel="stylesheet" href="ContStyle.css" >
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
</header>

<div class="divider">
</div>

<div class="content" >
    <div class="midcol">
        <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2350.091725036322!2d27.592345451102364!3d53.91234593976815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dbcfaf1d38974b%3A0x3d097c7a85e0db13!2z0JHQk9Cj0JjQoCwg0JrQvtGA0L_Rg9GBIOKEliA0!5e0!3m2!1sru!2sby!4v1551631002984" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="info">
            <p>Тел:  +375 (29) 341 11 08<br>
                Наши двери открыты для Вас:<br>
                Пн - сб: 10.00 - 19.00<br>
                Вск: 11.00 - 18.00<br>
                Менеджер магазина - Ирина</p>
        </div>
    </div>


</div><!--content><-->
<footer>
    <div class="midfoot">
    </div>
</footer>


</body>
</html>