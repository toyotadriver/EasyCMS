<?php
include_once 'php/debug_to_console.php';
class DBController
{
    public $pdo;
    function __construct()
    {
        $db_host = 'localhost';
        $db_database = 'db0';
        $db_user = 'root';
        $db_pass = 'mysql';
        $db_chrs = 'utf8mb4';
        $db_attr = "mysql:host=$db_host;dbname=$db_database;charset=$db_chrs";
        $db_opts =
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

        $this->pdo = new PDO($db_attr, $db_user, $db_pass, $db_opts);
    }
    public function selectone($table, $column, $var, $what)
    {
        // $query = "SELECT * FROM $table WHERE :ucolumn = :uvar";
        // debtoc('query = ' . $query);
        // $stmt = $this->pdo->prepare($query);
        // $stmt->execute(['uvar' => $var, 'ucolumn' => $column]);
        // debtoc("stmt type = " . gettype($stmt));
        $query = "SELECT * FROM $table WHERE $column = '" . $var . "'";
        
        $stmt = $this->pdo->query($query);
        $result = $stmt->fetch();
        // debtoc("result type = " . gettype($result));
        $item = $result[$what];
        // debtoc("item = " . $item);
        return $item;
    }
    public function select($table, $column, $var, $what = "*")
    {
        if (is_array($what))
        {
            $qwhat = implode('', $what);
        } else
        {
            $qwhat = $what;
        }
        $query = "SELECT $qwhat FROM $table WHERE $column = '" . $var . "'";
        // debtoc($query);
        $stmt = $this->pdo->query($query);
        $result = $stmt->fetch();
        // debtoc($result);
        return $result;
    }
    public function selectjoin($table1, $table2, $joincolumn1, $joincolumn2, $column, $var)
    {
        $joinquery = "SELECT * FROM $table1 JOIN $table2 ON $table1.$joincolumn1 = $table2.$joincolumn2 WHERE $table1.$column = :variable";
        $stmt = $this->pdo->prepare($joinquery);
        
        try{
            $stmt->execute(array('variable' => $var));
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
        $result = $stmt->fetch();
        
        return $result;
    }
    public function insert($table, $columns, $values)
    {
        //Не забудь, что ВАЛУЕС должны быть в кавычках каждое
        $columns_str = implode(', ', $columns);
        $values_str = "'" . implode("', '", $values) . "'";
        $query = "INSERT INTO $table($columns_str) VALUES($values_str)";
        debtoc($query);
        try{
            $this->pdo->query($query);
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    // public function insertjoin($table1, $table2, $joincolumn1, $joincolumn2, $columns1, $values1, $columns2, $values2)
    // {
    //     $columns1_str = implode(', ', $columns1);
    //     $columns2_str = implode(', ', $columns2);
    //     $values1_str = implode(', ', $values1);
    //     $values2_str = implode(', ', $values2);
    //     $tcolumns1 = [];
    //     $tcolumns2 = [];
    //     $t1pname = 'l';
    //     $t2pname = 'r';

    //     foreach($columns1 as $col)
    //     {
    //         $c = $t1pname . $col;
    //         array_push($tcolumns1, $c);
    //     }
    //     foreach($columns2 as $col)
    //     {
    //         $c = $t2pname . $col;
    //         Array_push($tcolumns2, $c);
    //     }
    //     $tc1 = implode(', ', $tcolumns1);
    //     $tc2 = implode(', ', $tcolumns2);

    //     $query = <<<_query
    //         INSERT INTO $table1($columns1_str $columns2_str)
    //         SELECT $tc1, $tc2
    //         FROM $table 
    //     _query;
    // }
    
    function __destruct()
    {
        $this->pdo = NULL;
    }
}

?>