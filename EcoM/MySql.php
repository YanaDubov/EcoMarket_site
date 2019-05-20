<?php

Class Database{

    public function connect(){
        try {
            $connection = new PDO("mysql:host=localhost;dbname=site2", "root", "123123");
            $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $connection;
        }catch (PDOException $e){
            echo "Connection failed".$e->getMessage();
         }
    }
    public function createTable(){
        try {
            $connection = new PDO("mysql:host=localhost;dbname=site2", "root", "123123");
            $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $connection->query("CREATE TABLE IF NOT EXISTS `users` (
                `id` int(11) AUTO_INCREMENT PRIMARY KEY,
                `name` varchar(30) NOT NULL,
                `param` int(11) NOT NULL
                ) DEFAULT CHARSET=utf8;");
            return $connection;
        }catch (PDOException $e){
            echo "Connection failed".$e->getMessage();
        }

    }

}
$db = new Database();
$db = $db->createTable();
//$db->query("INSERT INTO users VALUES (1,'Сергей',32);");
//$db->query("DELETE FROM users WHERE `name`='Сергей'");
//$db->query("UPDATE users SET `param`= 33 WHERE `id`=1");
$db = null;