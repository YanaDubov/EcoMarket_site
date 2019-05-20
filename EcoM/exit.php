
<?php
require "session.php"
?>

<?php
unset($_SESSION['Name']);
unset($_SESSION['login']);
unset($_SESSION['password']);
unset($_SESSION['email']);

setcookie('Name', '', time() - 1);
setcookie('login', '', time() - 1);
setcookie('password', '', time() - 1);
setcookie('email', '', time() - 1);
header("Location: MainP.php");
?>
