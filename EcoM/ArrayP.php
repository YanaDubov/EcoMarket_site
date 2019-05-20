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
            margin: 20px;
            font-size: 25px;
            display: inline;
        }

        h1{
            margin: 10px;
            color: red;
        }
        .butt{
            margin: 20px;
            width:150px;
            height: 50px;
        }
    </style>
</head>
<body>


<form action = "ArrayP.php" method="GET" class = "phpmethod">
    <a href="index.php?id=1"> К интернет магазину</a>

    <p class="iform">1 уровень:</p><br>
    <input type = "text" name = "n1"><br>

    <p class="iform">2 уровень:</p><br>
    <input type = "text" name = "n2"><br>

    <p class="iform">3 уровень:</p><br>
    <input type = "text" name = "n3"><br>

    <p class="iform">4 уровень:</p><br>
    <input type = "text" name = "n4"><br>

    <p class="iform">5 уровень:</p><br>
    <input type = "text" name = "n5"><br>

    <input  class="butt" type = "submit" value = "отправить">

</form>
<div>
    <?php

    //проверка на заполненность полей
    if (!empty($_GET['n1']) && !empty($_GET['n2']) && !empty($_GET['n3']) &&
        !empty($_GET['n4']) && !empty($_GET['n5'])){
        $arr5 = array( array(), array(), array(), array(), array());
        $col_arr = array("color: red", "color: blue", "color: green", "color: darkviolet", "color: gold");
        $flag = false;
        $k = 0;
        // обработка полученных полей
        foreach($_GET as $item){
            $temp = str_replace(" ", "", $item);
            //проверка на ввод
            for($i = 0; $i < strlen($temp); $i++){
                if (!(((($temp[$i] >= '0') && ($temp[$i] <= '9')) || ($temp[$i] == ",")))){
                    echo "<h1>incorrect data</h1>";
                    $flag = true;
                    break;
                }
            }
            if ($flag){
                break;
            }
            $j = 0;
            // получение из строки чисел
            while(strpos($temp, ',') !== false){
                $arr5[$k][$j] = (int) substr($temp, 0, strpos($temp, ','));
                $temp = substr($temp, strpos($temp, ',') + 1, strlen($temp) - strpos($temp, ',') - 1);
                $j++;
            }
            $arr5[$k][$j] = (int) $temp;
            $k++;
        }
        // подсчёт количества элементов в массиве
        $counter = 0;
        foreach($arr5 as $el)
            $counter  = $counter + count($el);
        if ($counter < 20){
            $flag = true;
            echo "<h1> amount of elements < 20 </h1>";
        }
        if (!$flag){
            //вывод элементов по уровням с цветами и сортировка
            for($i = 0; $i < 5; $i++){
                for($j = 0; $j < count($arr5[$i]); $j++){
                    $str = (string) $arr5[$i][$j];
                    echo "<p style = \"$col_arr[$i]\">$str</p>";
                }
                echo "<br>";
                echo "<br>";
                sort($arr5[$i]);
            }
            echo "<br>";
            echo "<br>";
            echo "<br>";
            //вывод элементов с разделением на чёт/нечет, но без нулей
            for($i = 0; $i < 5; $i++){
                for($j = 0; $j < count($arr5[$i]); $j++){
                    $str = (string) $arr5[$i][$j];
                    if($arr5[$i][$j] != 0){
                        if(($arr5[$i][$j] % 2 == 0))
                            echo "<p style = \"color: red\">$str</p>";
                        else
                            echo "<p style = \"color: darkviolet\">$str</p>";
                    }
                }
                echo "<br>";
                echo "<br>";
            }
        }
    }


    ?>
</div>
</body>
</html>