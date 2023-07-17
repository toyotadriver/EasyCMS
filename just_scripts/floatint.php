<?php

$str1 = "Съешь Еще этих МЯгких ФраНцуЗСких булочек";
//Короче PHP не особо работает с UTF 8, поэтому функцию надо писать самому:

function mb_ucfirst($streeng) {
    return mb_strtoupper(mb_substr($streeng, 0, 1 )) .  mb_substr($streeng, 1);
}

$str2 = mb_ucfirst(mb_strtolower($str1));
echo $str2;

// echo "<br>" . "<a href='test.html'>ВЕРНУТЬСЯ</a>";

?>