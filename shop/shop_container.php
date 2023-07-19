<?php
require_once 'php/db_login.php';
include_once 'php/debug_to_console.php'; //debtoc('msg')
try
{
    $pdo = new PDO($db_attr, $db_user, $db_pass, $db_opts);
    debtoc('Подключились к базе');
}
catch(PDOException $e)
{
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

$query = "SELECT * FROM products";
$result = $pdo->query($query);

$product_pointer = 0;
$products_per_page = 15;

echo "<div id='shop_container'>";
if (isset($_SESSION['id']) && isset($user) && $user->role == 1)
{
    echo <<<_add_product
    <div class='product_add_cont' onclick="location.href='index.php?shop&add'"><span style='font-size: 30px; margin-left: 100px; margin-top: 100px;'>+</span>
    Добавить товар</div>
    _add_product;
}
while ($row = $result->fetch())
{
    $id = $row['id'];
    $prod_id = $row['prod_id'];
    $img = htmlspecialchars($row['image']);
    $name = htmlspecialchars($row['product_name']);
    $cost = htmlspecialchars($row['cost']);

    $editpencil = $dc->onauth("<span class='p_edit'>&#9998</span>");
    echo <<<_PRODUCT
        <div class='product' onclick="location.href='index.php?shop&product=$prod_id'">
            
            <div class='prod_wrap'>
                $editpencil
                <img src='products_imgs/$img'><br>
                <b>$name</b><br>
                <small>$cost$</small>
            </div>
        </div>
    _PRODUCT;
}

echo '</div>';
?>