<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>統一發票管理系統 - 發票清單</title>
    <?php include "include/link.php"; ?>
</head>

<body>
    <?php include_once "common/base.php";
    $sql = "select * from `invoice`";
    $rows = $pdo->query($sql)->fetchAll();
    ?>

    <table>
        <tr>
            <td>編號</td>
            <td>標記</td>
            <td>號碼</td>
            <td>花費</td>
        </tr>
    <?php 
        foreach($rows as $value){
            ?>
        <tr>
            <td><?=$rows['id']?></td>
            <td><?=$rows['number']?></td>
            <td><?=$rows['number']?></td>
            <td><?=$rows['spend']?></td>
        </tr>
<?php
        }
   
?>

    </table>
</body>

</html>