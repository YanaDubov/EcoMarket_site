<?php
require "session.php"
?>
<!DOCTYPE html>
<lang="en">
<head>
    <meta charset="UTF-8">
    <title>EcoMarket</title>
    <link rel="shortcut icon" type="" href="MainIcon.jpg">
    <link rel="stylesheet" href="style.css" >
    <link rel="stylesheet" href="NewsStyle.css">
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
                        <?php
                        if(isset($_SESSION['Name'])){
                            $name = $_SESSION['Name'];
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

<div class="hewscont">
    <div class="midcol">

        <div class="calendar">
            <table >
                <tr>
                    <td > Monday</td>
                    <td> Tuesday</td>
                    <td> Wednesday</td>
                    <td> Thursday</td>
                    <td> Friday</td>
                    <td style="color: green ; "> Saturday</td>
                    <td style="color: green; "> Sunday</td>
                </tr>
                <?php
                include "CalSql.php";
                for ($i = 0; $i < count($week); $i++) {
                    for ($j = 0; $j < 7; $j++) {
                        if (!empty($week[$i][$j])) {
                            $style = color_date(date("Y")."-".date("m")."-".date('d',mktime(0, 0, 0, date('m'), $week[$i][$j] , date('Y'))),$week[$i][$j]);
                            echo $style;
                        } else echo "<td>&nbsp;</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </table>
        </div>

        <div class="askform">
            <div class="ask">
                <p class="askp">Разделяете ли вы мусор?</p>
                <form action="vote.php" method="post">
                    <?php
                        require_once ("MySql.php");
                        $db = new Database();
                        $db = $db->connect();
                        $result = $db->query("SELECT * FROM votes ORDER BY value;");
                        $db = null;
                    while ($answer = $result->fetch()) {
                        ?>

                        <label>
                            <input type="radio" name="vote" value="<?php echo $answer["value"] ?>">
                            <?php echo $answer["answer"] ?> (<?php echo $answer["count"] ?>)
                        </label><br>

                        <?php
                    }
                    ?>

                    <input class="respbut" type=submit value="Ответить"><br>
                </form>
            </div>
        </div>

    </div>
</div>

<footer>
    <div class="midfoot">
    </div>
</footer>


</body>
</html>
