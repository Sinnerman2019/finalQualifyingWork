<?php
require("db.php");

$title = $_POST["title"];

if ($_POST["type"] == 1) {
    $value = $_POST["value"];
    $qr = "INSERT INTO variables (title, value) VALUES (:title, :value)";
            $pr = array(
            "title" => $title,
            "value" => $value,
            );
            $rs = db::add($qr, $pr);
}
else
{
    $path = "htdocs/images/" . $_FILES["image"]["name"]; 
    move_uploaded_file($_FILES["image"]["tmp_name"], '../' . $path);
    $value = "images/" . $_FILES["image"]["name"];
    $qr = "INSERT INTO variables (title, value) VALUES (:title, :value)";
    $pr = array(
    "title" => $title,
    "value" => $value,
    );
    $rs = db::add($qr, $pr);

}

header('Location: control.php');
?>

