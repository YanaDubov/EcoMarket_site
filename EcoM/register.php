<?php
require "session.php";
require_once ("MySql.php");
$db = new Database();
$db = $db->connect();
$data = $_POST;
$errors = array();
if(isset($data['enter'])){

    if($data['password1'] != $data['password2']) {
        $errors[] = 'Пароли не совпадают';
    }else {
        $login = $data['login'];
        $password = md5($data['password1']);
        $email = $data['email'];
        $name = $data['name'];
        $sql = "INSERT INTO `users`(`login`, `password`, `email`, `name`) VALUES (?,?,?,?)";
        $stmt= $db->prepare($sql);
        $stmt->execute([$login, $password, $email, $name]);
        if($data['othercomp'] == "on"){
            setcookie('Name',$name,time()+3600);
            setcookie('login',$login,time()+3600);
            setcookie('password',$password,time()+3600);
            setcookie('email',$email,time()+3600);
        }else {
            $_SESSION['Name'] = $name;
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $password;
            $_SESSION['email'] = $email;
        }

        $to  = $email;
        // тема письма
        $subject = 'Welcome to our ecology shop!';

        // текст письма
        $message = '
        <html>
        <head>
          <title>EcoMarket</title>
        </head>
        <body>
          <p>Welcome to our ecology shop!</p>
          <p>We hope that you will find everything you need. Delivery is free for you this week! </p>
          <p>Have a nice day,EcoMarket</p>
        </body>
        </html>
        ';

        // Для отправки HTML-письма должен быть установлен заголовок Content-type
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Отправляем
        mail($to, $subject, $message, $headers);
        echo $to;

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
    <link rel="stylesheet" href="form.css">
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
        <form method="POST" action="register.php">
            <br><input type="text" name="name" placeholder="Имя" maxlength="10" pattern="[А-я]{3,10}" title="Имя может содержать только русские буквы, длиной от 3 до 10 символов" required>
            <br><input type="text" name="login" placeholder="Логин" maxlength="10" pattern="[A-z0-9]{3,10}" title="Логин может содержать только латинские буквы и цифры, длиной от 3 до 10 символов" required>
            <br><input type="email" name="email" placeholder="E-Mail" required>
            <br><input type="password" name="password1" placeholder="Пароль" maxlength="15" pattern="[A-z0-9]{5,15}" title="Пароль может содержать только латинские буквы и цифры, длиной от 3 до 10 символов" required>
            <br><input type="password" name="password2" placeholder="Введите пароль еще раз" maxlength="15" pattern="[A-z0-9]{5,15}" title="Пароль может содержать только латинские буквы и цифры, длиной от 3 до 10 символов" required>
            <br><a>Чужой компьютер</a><input type="checkbox" name="othercomp" >
            <br><input class="button" type="submit" name="enter" value="Регистрация">
        </form>

    </div>
</div><!--content><-->
<footer>
    <div class="midfoot">
    </div>
</footer>


</body>
</html>
