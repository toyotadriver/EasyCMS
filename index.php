<?php
include_once 'php/debug_to_console.php';
if ($_GET) {
    debtoc($_GET);
    $get = array_keys($_GET);
    switch ($get[0]) {
        case 'shop':
            $subdir = isset($get[1])? $get[1]:'';
            if ($subdir != '') {
                debtoc('subdir = ' . $subdir);
                switch ($subdir) {
                    case 'product':
                        $current_container = 'shop/shop_product.php';
                        break;
                    case 'add':
                        $current_container = 'shop/shop_add_product.php';
                        break;
                }
            } else {
                $current_container = 'shop/shop_container.php';
            };
            echo '<style>';
            $current_style = 'styles/shop_styles.css';
            echo '</style>';
            break;
        case 'register':
            $current_container = 'php/register.php';
            break;
        case 'login':
            if (isset($_POST['login']) && isset($_POST['password'])){
                $current_container = 'php/login.php';
            }else{
                $current_container = 'main_container.php';
                $current_script = 'js/article_add_form.js';
            }
            break;
        case 'logout':
            $current_container = 'php/logout.php';
            break;
        case 'page':
            $current_container = 'main_container.php';
            $current_script = 'js/article_add_form.js';
            break;
    }
} else {
    $current_container = 'main_container.php';
    $current_script = 'js/article_add_form.js';
}
include_once 'controllers/db_controller.php';
include_once 'php/user.php';
include_once 'controllers/main_controller.php';
include_once 'head.php';
if (isset($current_script)) {
    echo "<script src='$current_script'></script>";
}
echo '<style>';
include_once $current_style;
echo '</style>';
include_once 'header.php';
include_once $current_container;
include_once 'footer.php';
?>