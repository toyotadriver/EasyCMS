<?php
//СОЗДАЕМ ОБДЖЕКТ
$obj = new User;
$obj->name = 'Joe';
$obj->password = 'bypass';
$obj->role = 'admin';

$obj1 = $obj; //Присвоили ссылку, но не сам объект
$obj1->name = 'JoE';

$obj2 = clone $obj; //А вот теперь клонирвали, и это уже дрйго
$obj2->name = 'Steve';

print_r($obj); echo '<br>';
print_r($obj1); echo '<br>';
print_r($obj2); echo '<br>';

$obj->save_user();
echo "<br>Имя чела $obj->name :" . $obj->name;
echo "<br>Роль чела $obj->name :" . $obj->get_role();
echo "<br>Пароль чела: " . $obj->password;

$methodu = 'password';
echo "<br>Пароль чела $obj2->name : " . $obj2->$methodu;
class User {
    public $name, $password, $role;

    function __construct(){
        //Сюда помещаются инструкции конструктора
        echo 'Объект создали';
    }

    function get_role(){
        return $this->role;
    }

    function __destruct(){
        
        echo 'Все, объект удалили';
    }
    
    
    function save_user(){
        echo "Сюда помещается код, сохраняющий пользователя<br>";
    }
}