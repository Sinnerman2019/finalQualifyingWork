<?php 

session_start();

$loginAdmin = "admin";
$passwordAdmin = "nikita";
if ($_SESSION["login"] !== $loginAdmin || $_SESSION["user_code"] !== $passwordAdmin) {
	header('Location: index.php');
}
else{
    
}
    require("db.php");
    $qr = "SELECT * FROM `variables`";
    $rs = db::getAll($qr);
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
  <a href="controlUsers.php">Пользователи</a>
  <table border="1">
   <tr>
           <td><h5>ID</h5></td>
           <td><h5>TITLE</h5></td>
           <td><h5>VALUE</h5></td>
       </tr>
    <?php foreach($rs as $row => $cells): ?>
        <tr>
            <?php foreach($cells as $cell): ?>
                <td><?=$cell?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    </table>
    <form action="add.php" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="var-title" class="form-label">Название статьи</label>
    <input name="title" type="text" class="form-control" id="var-title">
  </div>
  <div class="mb-3">
    <label for="data-type" class="form-label">Тип</label>
    <select id="data-type" class="form-select" name="type"> 
    <option value="1">Текст</option>
    <option value="2">Изображение</option>
</select>
  </div>
  <div class="mb-3">
    <label for="text" class="form-label">Содержимое</label>
    <input name="value" type="text" class="form-control" id="text">
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Изображение</label>
    <input name="image" type="file" class="form-control" id="image">
  </div>
  <button type="submit" class="btn btn-primary">Добавить</button>
</form>
</body>
</html>
