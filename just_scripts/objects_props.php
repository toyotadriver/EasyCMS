<?php
//Неявное объявление свойств объекту (НЕ РЕКОМЕНДУЕТСЯ ЖЭС КАК)
$object = new User();
$object->name = 'Alice';
$object->id = random_int(0,255);

echo $object->name;
echo $object->id;
class User {};

////////////////////////////////////////
$testsubject = new Test();
echo '<br>' . $testsubject->show_info();
echo '<br>' . $testsubject::sex;
echo '<br>' . $testsubject::show_nationality();
class Test
{
    
    public $name = 'Paul Smith';
    public $age = '42';
    public $sus = '36';
    public const sex = 'yes';
    static $NATIONALITY = 'Serbian';
    public function show_info()
    {
        $sus = 404;
        // К константам мможно обращаться только как self::needed_const
        echo "Челика имя: $this->name, его возраст: $this->age";
    }
    static function show_nationality()
    {
        echo self::$NATIONALITY;
    }
    // public $time = time(); - говно будет, пушо нельзя использовать функцию в качестве свойства
    // public $score = $level * 2 - говно будет, пушо нельзя использовать выраение в качестве свойства
    // Если нужно что-то вычислить - надо использовать внутренние переменные, затем присваивать свойствам
};
?>