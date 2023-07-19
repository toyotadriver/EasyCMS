<?php
if (isset($_POST['login']) && isset($_POST['password']))
{
    require_once 'db_login.php';
    try
    {
        $pdo = new PDO($db_attr, $db_user, $db_pass, $db_opts);
    }
    catch (PDOException $e)
    {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }


    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);

    $query = "SELECT * FROM users WHERE username='" . $login . "'";
    $result = $pdo->query($query);
    $result = $result->fetch();

    if (!empty($result))
    {
        $pwhash = $result['password'];
    
        if (password_verify($password, $pwhash))
        {
            $userid = $result['id'];

            session_set_cookie_params(['SameSite' => 'strict']);
            session_start();
            $_SESSION['username'] = $login;
            $_SESSION['id'] = $userid;
            $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
            $dc->notification('Авторизация прошла успешно', 1);
            echo "<br><a href='../index.php'>Вернуться на главную<a/>";
        }else{
            $dc->notification("Неправильный пароль", 2);
            echo "<br><a href='../index.php'>Вернуться на главную<a/>";
        }
        
    }else{
        $dc->notification('Такого пользователя не существует', 2);
        echo "<br><a href='../index.php'>Вернуться на главную<a/>";
    }
}
?>