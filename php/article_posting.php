<?php
require_once 'db_login.php';
// include_once '../debug_to_conosle.php';

try
{
    $article_post_pdo = new PDO($db_attr, $db_user, $db_pass, $db_opts);
    // debtoc('Подключились к базе для поста');
}
catch (PDOException $e)
{
    throw new PDOException($e->getMessage(), (int)$e->getCode());
    // debtoc('Подключиться и запостить не получилось');
}



if (isset($_POST))
{
    $article_text = htmlspecialchars($_POST['article_text']);
    // $article_image = htmlspecialchars($_POST['article_image']);
    $article_title = htmlspecialchars($_POST['article_title']);
}
else 
{
    echo 'Запроса нет';
}

$username = '1';
$article_date = date("Y-m-d H:i:s");

$query = <<<_post_query
    INSERT INTO posts(user_posted, title, text, date)
    VALUES('$username',' $article_title', '$article_text', '$article_date');
_post_query;

$article_post_pdo->query($query);

header('Location: ../index.php');
?>