<?php //code4.php

//Лол с ТРУЕ и ФОЛСЕ
echo 'a: [' . TRUE . ']<br>';
echo 'b: [' . FALSE . ']<br>';
echo 'c: [' . (5 == 6) . ']<br>';
echo 'd: [' . (1 == 0) . ']<br>';

//Сколько дней до нового года
$day_number = date('z');
$days_to_new_year = 366 - $day_number;
if ($days_to_new_year < 30) {
    echo 'Скоро новый год!';
}
else {
    echo "До нового года еще $days_to_new_year дней";
}

//SWITCH
echo '<br>';
$page = 'Home';
switch ($page) {
    case 'Home':
        echo 'Вы выбрали Home';
        break;
    case 'Links':
        echo 'Вы выбрали Links';
        break;
    default:
        echo 'Вы не выбрали ничего';
        break;
//break 2 если надо прекратить 2 уровня, офигеть
};
// echo "<br>" . "<a href='test.html'>ВЕРНУТЬСЯ</a>";
?>