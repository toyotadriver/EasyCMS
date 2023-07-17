<?php
//Задать ссылки на переменные, чтобы функция обращалась по ссылкам (хз)

$a1 = "WILLIAM";
$a2 = "henry";
$a3 = "gaTES";


echo $a1 . " " . $a2 . " " . $a3 . "<br>";
fix_names($a1, $a2, $a3);
echo $a1 . " " . $a2 . " " . $a3 . '<br>';

function fix_names(&$n1, &$n2, &$n3){
    $n1 = ucfirst(strtolower($n1));
    $n2 = ucfirst(strtolower($n2));
    $n3 = ucfirst(strtolower($n3));
};
//Создание глобально переменной в нутри функции

$b1 = 'CAETHRIN';
$b2 = 'zeta';
$b3 = 'jonES';
echo $b1 . ' ' . $b2 . ' ' . $b3 . ' ' . '<br>';
fix_names2();
echo $b1 . ' ' . $b2 . ' ' . $b3;

function fix_names2(){
    global $b1; $b1 = ucfirst(strtolower($b1));
    global $b2; $b2 = ucfirst(strtolower($b2));
    global $b3; $b3 = ucfirst(strtolower($b3));
};

// echo "<br>" . "<a href='test.html'>ВЕРНУТЬСЯ</a>";
?>
