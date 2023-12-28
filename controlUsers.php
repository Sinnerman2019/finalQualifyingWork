<?php 

session_start();

$loginAdmin = "admin";
$passwordAdmin = "nikita";
if ($_SESSION["login"] !== $loginAdmin || $_SESSION["user_code"] !== $passwordAdmin) {
	header('Location: index.php');
}
else{
    
}

    //Индексный файл должен находиться в корневом каталоге сервера (public_html),
    //который требуется указать в конфигурации виртуальных хостов по образцу: путь/familiya.mpt.ru/public_html
    //После необходимо подключить класс, необходимый для работы с базой данных:
    require("db.php");
    //Далее потребуется описать SQL-запрос на добавление информации в базу данных по знакомому синтаксису:
    $qr = "SELECT * FROM `users`";
    //Объявление маркеров для запроса на примере команды INSERT:
    //Объявление переменной результата, который, согласно описанному ранее классу, вернём ID вставленной в базу данных строки
    $rs = db::getAll($qr);
    //Вывод полученного значения на экран:
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>LOGOUT</title>
	 <!-- add bootstrap css file -->

      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/main.css">
      

</head>
<body>
  <a href="logout.php">Выйти</a>
  <a href="control.php">Контент</a>
  <table border="1">
   <tr>
            <td><h5>ID</h5></td>
           <td><h5>LOGIN</h5></td>
           <td><h5>USER_CODE</h5></td>
           <td><h5>TIME</h5></td>
           <td><h5>IP</h5></td>
       </tr>
    <?php foreach($rs as $row => $cells): ?>
        <tr>
            <?php foreach($cells as $cell): ?>
                <td><?=$cell?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    </table>

</body>
</html>
