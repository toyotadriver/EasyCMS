<?php //code.php
    define("ROOT_LOCATION", "C:\Program Files\Ampps\www");
    
    $number = 12345 * 67890;
    $b = rand(1,0);
    echo substr($number, 3, 3);

    //Использование особых переменных
    echo "<br>Это строка " . __LINE__ . " в файле" . __FILE__;

    //Использование print
    $b ? print "TRUE": print "FALSE";

    echo "<br>";

    //Вывод даты в формате особом
    function longdate($timestamp) {
        $temp = date("l F jS Y", $timestamp);
        return "Дата: $temp";
    };
    echo longdate(time() - 17 * 24 * 60 * 60);

    //Исползование СТАТИЧНОЙ переменной в функции
    function statictest() {
        static $count = 0;
        echo '<br>' . $count;
        $count++;
    };
    statictest();
    statictest();

    $came_from = htmlentities($_SERVER['HTTP_REFERRER']);
    echo '<br>' . $came_from;

?>