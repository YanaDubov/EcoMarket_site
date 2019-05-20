<?php
require "session.php"
?>
<?php
require_once ("MySql.php");
$db = new Database();
$db = $db->connect();
$data = $_POST;
$errors = array();
if(isset($data['enter'])){
    $login = $data['login'];
    $stmt = $db->prepare("SELECT * FROM users WHERE login=?");
    $stmt->execute([$login]);
    $user = $stmt->fetch();
    if (md5($data['password']) === $user['password']){
        if($data['othercomp'] == "on"){
            setcookie('Name',$user['name'],time()+3600);
            setcookie('login',$user['login'],time()+3600);
            setcookie('password',$user['password'],time()+3600);
            setcookie('email',$user['email'],time()+3600);
        }else {
            $_SESSION['Name'] = $user['name'];
            $_SESSION['login'] = $user['login'];
            $_SESSION['password'] = $user['password'];
            $_SESSION['email'] = $user['email'];
        }
        header("Location: MainP.php");

    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EcoMarket</title>
    <link rel="shortcut icon" type="image/x -icon" href="MainIcon.jpg">
    <link rel="stylesheet" href="style.css" >
    <link rel="stylesheet" href="AboutStyle.css" >
    <link rel="stylesheet" href="form.css" >
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
        <form method="POST" action="sign.php">
            <br><input type="text" name="login" placeholder="Логин" maxlength="10" pattern="[A-z0-9]{3,10}" title="Логин может содержать только латинские буквы и цифры, длиной от 3 до 10 символов" required>
            <br><input type="password" name="password" placeholder="Пароль" maxlength="15" pattern="[A-z0-9]{5,15}" title="Пароль может содержать только латинские буквы и цифры, длиной от 3 до 10 символов" required>
            <br><a>Чужой компьютер</a><input type="checkbox" name="othercomp">
            <br><input class="button" type="submit" name="enter" value="Вход">
        </form>

    </div>


</div><!--content><-->
<footer>
    <div class="midfoot">
    </div>
</footer>


</body>
</html>
<?php
if(isset($_POST["enter"])){
    echo "ok";
}

?>