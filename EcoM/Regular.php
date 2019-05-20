<!DOCTYPE html>
<html>
<head >
    <meta charset="utf-8">


    <style>
        body{
            font: 25px/20px "Courier New", sans-serif;
        }


        input[type="text"]{
            width: 600px;
            height: 40px;
            font: 25px/20px "Helvetica", sans-serif;
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
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            font-size: 20px;
        }
        textarea{
            margin-top: 10px;
            margin-left: 10px;
            width: 500px;
            height: 100px;
            background: none repeat scroll 0 0 rgba(0, 0, 0, 0.07);
            border-color:  #FFFFFF #FFFFFF ;
            border-image: none;
            border-radius: 6px 6px 6px 6px;
            border-style: none solid solid none;
            border-width: medium 1px 1px medium;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.12) inset;
            color: #555555;
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            font-size: 1em;
            line-height: 1.4em;
            transition: background-color 0.2s ease 0s;
        }
    </style>
</head>
<body>

<form method="post" action="Regular.php">
    <a href="index.php?id=1"> К интернет магазину</a>
    <p class="iform">Text</p>

    <textarea id="contact_list" name="contact_list"></textarea><br>
    <input class="butt" type="submit" name="submit" value="Send" id="submit"/>

</form>
<div>
<?php
if(isset($_POST['contact_list'])) {
    $token = htmlspecialchars($_POST['contact_list']);
    //\s matches any whitespace character (equal to [\r\n\t\f\v ])
    $words = preg_split("/[\s,]+/", $token);

    foreach ($words as $item){
        $done = true;
        if(preg_match("/^[0-9]*[.,][0-9]+$/", $item)){
            $done = false;
            echo  "<td><span style=\"color: red; \"> ". round($item,1) . "</span></td>";
        }
        if (preg_match("/^[0-9]+$/", $item)) {
            $done = false;
            echo "<td><span style=\"color: blue; \"> " . $item . "</span></td>";
        }
        mb_internal_encoding('UTF-8');
        mb_regex_encoding('UTF-8');
        if ((preg_match("/^[A-Z][a-z]+$/", $item)) || (preg_match("/^[А-Я]{1}[а-я]+/u", $item))) {
            $done = false;
            echo "<td><span style=\"color: green; \"> " . $item . "</span></td>";
        }
        if ($done){
            echo "<td><span> " . $item . "</span></td>";

        }

    }
}
?>
</div>
</body>
</html>
