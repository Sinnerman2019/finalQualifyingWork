<?php
    global $pdo;

    $host = "localhost";
    $db = "boulan";
    $user = "root";
    $password = "";

    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
?>