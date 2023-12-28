<?php
    include("database.php");
    global $pdo;

    $sql = "SHOW TABLES";
    $query = $pdo->prepare($sql);
    $query->execute();
?>

<form action="table.php" method="post">
    <select name="table">
        <option disabled selected>Выберите таблицу</option>
        <?php foreach($query as $table): ?>
            <option><?=$table[0]?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Отправить</button>
</form>