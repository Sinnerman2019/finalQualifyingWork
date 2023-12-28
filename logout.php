<?php

session_start();
unset($_SESSION["login"]);
unset($_SESSION["user_code"]);
setcookie('user', $value['login'], time() - 3600, "/");
header('Location: index.php');
?>