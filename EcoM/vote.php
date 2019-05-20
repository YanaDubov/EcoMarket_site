<?php
if (!empty($_POST['vote'])) {
    $vote = (int)$_POST['vote'];
    try {
        $conn = new PDO("mysql:host=localhost;dbname=site2", "root", "123123");
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $e){
        echo "Connection failed";
    }
    $result = $conn->query("SELECT count FROM votes WHERE value={$vote};");
    $count =  (int)$result->fetchAll()[0]['count']+1;
    echo $count;
    $conn->exec("UPDATE votes SET count={$count} WHERE value={$vote};");
    $conn = null;
    header("Location: NewsP.php");
}
?>
