<?php
if (!isset($_SESSION['id']))
{

if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['email']))
{
include_once 'php/db_login.php';
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
    $password = password_hash($password, PASSWORD_DEFAULT);
    $email = htmlspecialchars($_POST['email']);
    $date_of_reg = date("Y-m-d H:i:s");

    $query = "SELECT * FROM users WHERE username='" . $login . "' OR email='" . $email . "'";
    $result = $pdo->query($query);
    $result = $result->fetch();


    if (!empty($result))
    {
        show_reg_form("Такой пользователь уже существует!");
    }
    else
    {
        $pdostmt = $pdo->prepare('INSERT INTO users(username, email, password, date_of_reg) VALUES(:username, :email, :password, :date_of_reg)');

        $pdostmt->bindParam(':username', $login, PDO::PARAM_STR);
        $pdostmt->bindParam(':email', $email, PDO::PARAM_STR);
        $pdostmt->bindParam(':password', $password, PDO::PARAM_STR);
        $pdostmt->bindParam(':date_of_reg', $date_of_reg, PDO::PARAM_STR);

        $pdostmt->execute([$login, $email, $password, $date_of_reg]);

        // $query = "INSERT INTO users(username, email, password, date_of_reg)
        // VALUES('$login', '$email', '$password', '$date_of_reg');";
        // $pdo->query($query);

        echo "<div class='article'><font style='color: green;'>Вы успешно зарегистрировались!<br>
        Войдите под свои логином и паролем.</font></div>";
    }
}
elseif (!empty($_POST)) {
    $msg = "Что-то введено неправильно";
    show_reg_form($msg);
}
else {show_reg_form();}
}
else 
{
    show_reg_form('Вы уже зарегистрированы!');
};


function show_reg_form($m = "")
{
    $err_msg = empty($m)? "<font style='color: red;'>$m</font>":"";
    $register_form_container = "
    <!-- <script>setTimeout(() -> {window.location.href = '/';}, 300)</script> -->
    <div>
        <h1>ЗАРЕГИСТРИРОВАТЬСЯ</h1>
        $err_msg
        <form class='registration-container' method='post'>
            <label for='login'><b>ЛОГИН</b></label>
            <input type='text' name='login' required autofocus><br>

            <label for='password'><b>ПАСВОРД</b></label>
            <input type='text' name='password' required><br>

            <label for='email'><b>ЕМАИЛ</b></label>
            <input type='text' name='email' required><br>

            <button class='btn_func' type='submit'>СУБМИТ</button>
        </form>
    </div>";
echo $register_form_container;
};
?>