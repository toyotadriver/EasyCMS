<html>
<head>
    <link href='../styles/main.css' rel='stylesheet'>
    <style>
        h1 {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            text-align: center;
            margin-top: 50px;
            color: rgb(200, 200, 200);
        }
    </style>
</head>
<body>

<?php
require_once 'db_login.php';
include_once 'debug_to_console.php';

try
{
    $logpdo = new PDO($attr, $user, $pass, $opts);
    debtoc('Подключились к базе');
}
catch (PDOException $e)
{
    throw new PDOException($e->getMessage(), (int)$e->getCode());
    debtoc('Подлючение не произошло');
}

$username = htmlspecialchars($_POST['login']);
$password = htmlspecialchars($_POST['password']);

$query = "SELECT * FROM users WHERE username='" . $username . "' AND password='" . $password . "'";
$result = $logpdo->query($query);

$fresult = $result->fetch();


if (empty($fresult))
{
    $message = 'Ошибка в логине или в пароле или в обоих';
}
else
{
    $message = "Привет, $username!";

}

$loggedin = <<<_LIN
<h1>$message</h1>
_LIN;
echo $loggedin;
?>

</body>
</html>