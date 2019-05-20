<?php
    function color_date($date,$day){
        require_once ("MySql.php");
        $db = new Database();
        $db = $db->connect();
        try {
            $result = $db->query("SELECT * FROM news WHERE date='$date'");
            $db = null;
            if ($result->rowCount() > 0) {
                return "<td><span style=\"color:red \"><a href='HolidayNews.php?date=$date'> " .$day. "</a></span></td>";
            }else{
                return "<td><span style=\"color:red \"> " .$day. "</span></td>";
            }
        }catch (PDOException $e){

        }

    }
    date_default_timezone_set('Europe/Minsk');

    $day_count = 1;
    $num = 0;
    $dayofmonth = date('t');
   // echo $dayofmonth;
    for ($i = 0; $i < 7; $i++) {
        // Вычисляем номер дня недели для числа
        $dayofweek = date('w',mktime(0, 0, 0, date('m'), $i, date('Y')));
        // Приводим к числа к формату 1 - понедельник, ..., 6 - суббота
        $dayofweek = $dayofweek - 1;
        if ($dayofweek == -1) $dayofweek = 6;
        if ($dayofweek == $i) {
            // Если дни недели совпадают,заполняем массив $week числами месяца
            $week[$num][$i] = $day_count;
            $day_count++;
        } else {
            $week[$num][$i] = "";
        }
    }
    while (true) {
        $num++;
        for ($i = 0; $i < 7; $i++) {
            $week[$num][$i] = $day_count;
            $day_count++;
            // Если достигли конца месяца - выходим из цикла
            if ($day_count > $dayofmonth) break;
        }
        // Если достигли конца месяца - выходим из цикла
        if ($day_count > $dayofmonth) break;
    }

?>


