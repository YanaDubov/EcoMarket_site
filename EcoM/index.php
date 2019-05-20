<?php
require "session.php"
?>
<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');
if(isset($_GET['id'])) {
    $page = $_GET['id'];
}
switch ($page){
    case 1:
       $page = "MainP.php";
        break;
    case 2:
        $page = "NewsP.php";
        break;

    case 3:
        $page = "KatalogP.php";
        break;
    case 4:
        $page = "ContactP.php";
        break;
    case 5:
        $page = "AboutP.php";
        break;
    case 6:
        $page = "exit.php";
        break;
    case 7:
        $page = "register.php";
        break;
    case 8:
        $page = "sign.php";
        break;
}
include($page);
//header("Location: $page");
?>

