<?php
$sdbc = new DBController;
if (isset($_POST['product_name']) && isset($_POST['product_id']) && isset($_POST['product_description'])) {
    $pid = htmlspecialchars($_POST['product_id']);
    $search = $sdbc->select('products', 'prod_id', $pid);
    if (!$search) {
        $pname = htmlspecialchars($_POST['product_name']);
        
        $pdescr = htmlspecialchars($_POST['product_description']);
        $pcost = htmlspecialchars($_POST['product_cost']);

        $uploaddir = 'products_imgs/';
        $file = $_FILES['product_image']['name'];
        $uploadfile = $uploaddir . basename($file);
        debtoc($uploadfile);

        if (move_uploaded_file($_FILES['product_image']['tmp_name'], $uploadfile)) {
            $sdbc->insert('products', ['prod_id', 'product_name', 'cost', 'image'], [$pid, $pname, $pcost, $file]);
            $sdbc->insert('products_descriptions', ['id', 'description'], [$pid, $pdescr]);
            $dc->notification(1, 'Товар успешно добавлен');
        } else {
            $dc->notification(2, 'Что-то пошло не так');
        }
    }
}
$form = <<<_adding_form
    <span style='font-size: 30px; text-align: center;'>Добавление товара</span><br><br>
    <form enctype='multipart/form-data' id="form_add_product" action="" method="post">
        Название  товара
        <input type="text" name="product_name" cols="30"><br>
        Идентификатор товара
        <input type="text" name="product_id" cols="10"><br>
        Описание товара
        <textarea name="product_description"></textarea><br>
        Цена товара
        <input type='text' name='product_cost' cols='4'><br>
        Картинка товара
        <input type='hidden' name='MAX_FILE_SIZE' value='1000000'/>
        <input type="file" class='pbtusual' name="product_image" value='Вставьте картинку (До 1Мб)'><br>
        <button class='pbtusual inputpbt' type="submit">Добавить товар</button>
    </form>
_adding_form;
echo $form;
?>