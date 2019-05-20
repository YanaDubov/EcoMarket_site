<?php

// несколько получателей
$to  = 'dubov159@gmail.com';

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
?>