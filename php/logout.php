<?php

setcookie(session_name(), '', time() -259000, '/');
$_SESSION = array();
session_destroy();
echo "<a href='../index.php'>Вернуться на главную<a/>";
?>