<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>統一發票管理系統 - 首頁</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
    <?php include "include/header.php"; ?>
    <form action="save_invoice.php" method="POST">
        
        <label for="year">民國</label>
        <input type="text" name="year" id="year">

        <label for="period">期別</label>
        <select name="period" id="period">
            <option value="1">01-02月</option>
            <option value="2">03-04月</option>
            <option value="3">05-06月</option>
            <option value="4">07-08月</option>
            <option value="5">09-10月</option>
            <option value="6">11-12月</option>
        </select>

        <label for="code">字軌</label>
        <input type="text" name="code" id="code">

        <label for="number">號碼</label>
        <input type="text" name="number" id="number">

        <label for="pay">金額</label>
        <input type="text" name="pay" id="pay">

        <input type="submit" value="save">


    </form>

</body>

</html>