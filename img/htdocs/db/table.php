<?php
    include("database.php");
    global $pdo;

    $table = @$_POST["table"];

    $sql = "SELECT * FROM $table";
    $query = $pdo->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<table border="1">
    <?php foreach($result as $row => $cells): ?>
        <tr>
            <?php foreach($cells as $cell): ?>
                <td><?=$cell?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>