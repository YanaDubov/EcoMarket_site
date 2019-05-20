<!DOCTYPE html>
<lang="en">
<head>
    <meta charset="UTF-8">
    <title>EcoMarket</title>
    <link rel="shortcut icon" type="" href="MainIcon.jpg">
    <link rel="stylesheet" href="style.css" >
    <link rel="stylesheet" href="HolidayStyle.css">
</head>

<body>
<header>
    <div class="headlogo">
        <img src="MainLogo.png" alt="Логотип сайта" title="Логотип сайта">
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

                </aside>
            </div>
        </div>
    </div>
</header><div class="divider">
</div>

<div class="hewscont">
    <div class="midcol">


        <?php

        error_reporting(E_ALL);
        ini_set('display_errors', 'on');
        if(isset($_GET['date'])) {
            $date = $_GET['date'];
            require_once ("MySql.php");
            $db = new Database();
            $db = $db->connect();
            try {
                $result = $db->query("SELECT * FROM news WHERE date='$date'");
                $db = null;
                if ($result->rowCount() > 0) {
                    $result = $result->fetch(PDO::FETCH_ASSOC);
                   // print_r($result);
                    ?>
                    <div class="headerTitle">
                        <h1>
                            <?php
                            echo htmlspecialchars( $result['title']);
                            ?>
                        </h1>
                    </div>
                    <div class="img">
                        <img src="images/<?php echo $result['image']?>">
                    </div>
                    <div class="article">
                        <p><?php echo $result['article']?></p>
                    </div>
                <?php
                }else{
                    echo file_get_contents();
                }
            }catch (PDOException $e){

            }

        }
        ?>
    </div>
</div>

<footer>
    <div class="midfoot">
    </div>
</footer>


</body>
</html>