<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EcoMarket</title>
    <link rel="shortcut icon" type="image/x -icon" href="MainIcon.jpg">
    <link rel="stylesheet" href="style.css" >
    <link rel="stylesheet" href="KatStyle.css" >

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


    </div>


</div><!--content><-->
<footer>
    <div class="midfoot">
    </div>
</footer>


</body>
</html>