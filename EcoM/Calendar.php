<?php

ob_start();
?>
<!DOCTYPE html>
<html>
<head >
    <meta charset="utf-8">
    <style>
        body{
            font: 25px/20px "Courier New", sans-serif;
        }
        .phpmethod{
            margin: 20px;
        }
        input[type="text"]{
            width: 600px;
            height: 20px;
            font: 25px/20px "Courier New", sans-serif;
        }
        p.iform{
            margin: 20px;
            font-size: 25px;
            display: block;
        }
        p{
            font-size: 25px;
            display: inline;
        }
        h1{
            margin: 5px;
            color: red;
        }
        .butt{
            margin: 20px;
            width:150px;
            height: 50px;
        }
        table{
            border-collapse: collapse;
            width: 950px;
            margin: 0 auto;
        }
        .nav{
            width: 100%;
            align-items: center;
            justify-content: center;
            display: inline-flex;
            padding-bottom: 10px;
            padding-top: 20px;
        }
        .nav div{
            margin: 0 20px 0 20px;
        }
        a{
            text-decoration: none;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .form{
            width: 900px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="form">
<form action = "Calendar.php" method="GET" class = "phpmethod">
    <a href="index.php?id=1"> К интернет магазину</a>

    <p class="iform">Курс</p>
    <input type = "text" name = "class"><br>

    <p class="iform">Год</p>
    <input type = "text" name = "year"><br>

    <p class="iform">Месяц</p>
    <input type = "text" name = "month"><br>

    <input  class="butt" type = "submit" value = "отправить">

</form>
</div>
<div>
<?php
function in_range($number, $min, $max, $inclusive = FALSE)
{
    if (is_numeric($number) && is_numeric($min) && is_numeric($max))
    {
        return $inclusive
            ? ($number >= $min && $number <= $max)
            : ($number > $min && $number < $max) ;
    }

    return FALSE;
}
function get_week_number($year, $month){
    if ($month >= 9){
        $datetime1 = date_create(''.$year.'-09-01');
    }
    else{
        $datetime1 = date_create(''.($year-1).'-09-01');
    }
    $datetime2 = date_create(''.$year.'-'.$month.'-01');
    $day_week = date('w',$datetime1->getTimestamp());
    if ($day_week == 0) $day_week = 7;
    $interval = date_diff($datetime1, $datetime2);
    return (ceil(($interval->days + $day_week)/7))%4;

}
function prev_month($month, $year, $class){
    if($month == 1) {
        echo "Calendar.php?class=" . $class . "&year=" . ($year - 1) . "&month=12";
    }
    else {
        echo "Calendar.php?class=" . $class . "&year=" . $year . "&month=" . ($month - 1);
    }
}

function next_month($month, $year, $class){
    if($month == 12) {
        echo "Calendar.php?class=" . $class . "&year=" . ($year + 1) . "&month=1";
    }
    else {
        echo "Calendar.php?class=" . $class . "&year=" . $year . "&month=" . ($month + 1);
    }
}
function color_date($class, $year, $month, $day){
    $data = date_create($year.'-'.$month.'-'.$day);
    switch ($class){
        case 1 or 2:{
            if ((($data >= date_create($year.'-01-01'))&& ($data <= date_create($year.'-01-25'))) ||
                (($data >=date_create($year.'-06-11'))&& ($data <= date_create($year.'-07-02')))){
               return "color:red; font-weight: bold";
            }
            if ((($data >= date_create($year.'-01-26')) && ($data <= date_create($year.'-02-08'))) ||
                (($data >=date_create($year.'-07-03'))&& ($data <= date_create($year.'-08-31')))){
                return "color:green; font-weight: bold";
            }
            break;
        }

        case 3:{
            if ((($data >= date_create($year.'-12-22'))&& ($data <= date_create($year.'-01-11'))) ||
                (($data >=date_create($year.'-05-19'))&& ($data <= date_create($year.'-07-06')))){

                return "color:red; font-weight: bold";
            }
            if ((($data >= date_create($year.'-01-12'))&& ($data <= date_create($year.'-01-25'))) ||
                (($data >=date_create($year.'-07-03'))&& ($data <= date_create($year.'-08-31')))){

                return "color:green; font-weight: bold";
            }
            break;
        }
        case 4:{
            if (($data >= date_create($year.'-01-05'))&& ($data <= date_create($year.'-02-01'))){
                return "color:red;font-weight: bold";
            }
            if (($data >= date_create($year.'-02-02'))&& ($data <= date_create($year.'-03-22'))){
                return "color:green;font-weight: bold";

            }
            break;

        }
        default: return"";

    }

}

if (!empty($_GET['class']) && !empty($_GET['year']) && !empty($_GET['month'])) {

    if((in_range($_GET['class'],1,4,TRUE)) && (in_range($_GET['month'],1,12,TRUE))
        && (in_range($_GET['year'],1970,2037))) {
        $class = $_GET['class'];
        $year = $_GET['year'];
        $month = $_GET['month'];

        // Вычисляем число дней в нужном месяце
        $dayofmonth = date('t', mktime(0, 0, 0, $month, 1, $year));

        //Цвета 4 недель
        $col_arr = array("background-color: #efe5d4",
            "background-color: #bed3c3",
            "background-color: #ecc8bd",
            "background-color: #bbcacc");
        $color = get_week_number($year, $month);
echo"<div >";
       echo "<div style=\"$col_arr[1];\">Первая неделя</div>"."<br>";
       echo "<div style=\"$col_arr[2];\">Вторая неделя</div>"."<br>";
       echo "<div style=\"$col_arr[3];\">Третья неделя</div>"."<br>";
       echo "<div style=\"$col_arr[0];\">Четвертая неделя</div>"."<br>";
echo"<div>";
        // Счётчик для дней месяца
        $day_count = 1;

        // Первая неделя
        $num = 0;
        for ($i = 0; $i < 7; $i++) {
            // Вычисляем номер дня недели для числа
            $dayofweek = date('w', mktime(0, 0, 0, $month, $day_count, $year));
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
//  Последующие недели месяца
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

//  Выводим содержимое массива $week в виде календаря
// Выводим таблицу
?>
    <div class="nav">
        <div>
           <a href="<?php prev_month($month, $year, $class)?>"><<<</a>
        </div>
        <div>
            <?php
            echo date("F",mktime(0,0,0,$month,1,$year)) ." " .$year;

            ?>
        </div>
        <div>
            <a href="<?php next_month($month, $year, $class)?>">>>></a>
        </div>
    </div>
    <div>
        <table >
        <tr>
            <td > Monday</td>
            <td> Tuesday</td>
            <td> Wednesday</td>
            <td> Thursday</td>
            <td> Friday</td>
            <td style="color: red; "> Saturday</td>
            <td style="color: red; "> Sunday</td>
        </tr>
        <?php
        for ($i = 0; $i < count($week); $i++) {
            $colori = ($color + $i) %4;
            echo "<tr style=\"$col_arr[$colori]; \">";
            for ($j = 0; $j < 7; $j++) {
                if (!empty($week[$i][$j])) {
                    $style = color_date($class,$year,$month,$week[$i][$j]);
                    // Если имеем дело с субботой и воскресенья  подсвечиваем их
                      echo "<td><span style=\"$style; \"> " . $week[$i][$j] . "</span></td>";
                } else echo "<td>&nbsp;</td>";
            }
            echo "</tr>";
        }
        echo "</table></div>";
    }
}
?>
</div>
</body>
</html>
<?php
file_put_contents('text.html', ob_get_contents());
?>