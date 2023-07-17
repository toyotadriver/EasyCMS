<?php
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

?>