<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯中獎號碼</title>
</head>

<body>
    <h1>編輯中獎號碼</h1>
    <?php
    include("common/base.php");
        $year = $_GET["year"];
        $period = $_GET["period"];
        $sql = "select * from `winning numbers` where `year`='$year' && `period`='$period'";
        $row = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        $id = $row['id'];
        $year = $row['year'];
        $period = $row['period'];
        $special = $row['special'];
        $top = $row['top'];
        $first_prize1 = $row['first_prize1'];
        $first_prize2 = $row['first_prize2'];
        $first_prize3 = $row['first_prize3'];
        $addprize = $row['addprize'];
    ?>
<form action="winning_numbers_update.php" method="GET">
<div class="year">
                年月份
                <select name="year" id="year">
                    <?php
                    $ny = $year + 1;
                    echo "<option value='$year' selected>" . $year . "</option>";
                    echo "<option value='$ny'>" . $ny . "</option>";
                    ?>
                </select>
                <select name="period" id="period">
                <option value='<?= $period ?>'><?= $period ?>月</option>
                    <option value='1-2'>01-02月</option>
                    <option value='3-4'>03-04月</option>
                    <option value='5-6'>05-06月</option>
                    <option value='7-8'>07-08月</option>
                    <option value='9-10'>09-10月</option>
                    <option value='11-12'>11-12月</option>
                </select>
            </div>
    <div class="item">
        <div class="numer">
            <label for="special">特別獎
                <input type="text" name="special" id="special" value="<?= $special ?>">
            </label></div>
        <div class="bonus">
            同期統一發票收執聯8位數號碼與特別獎號碼相同者獎金1,000萬元
        </div>
    </div>
    <div class="item">
        <div class="numer">
            <label for="top">特獎
                <input type="text" name="top" id="top" value="<?= $top ?>">
            </label>
        </div>
        <div class="bonus">
            同期統一發票收執聯8位數號碼與特獎號碼相同者獎金200萬元
        </div>
    </div>
    <div class="item">
        <div class="numer">
            <label for="first_prize1">頭獎
                <input type="text" name="first_prize1" id="first_prize1" value="<?= $first_prize1 ?>">
                <input type="text" name="first_prize2" id="first_prize2" value="<?= $first_prize2 ?>">
                <input type="text" name="first_prize3" id="first_prize3" value="<?= $first_prize3 ?>">
            </label></div>
        <div class="bonus">
            同期統一發票收執聯8位數號碼與頭獎號碼相同者獎金20萬元
        </div>
    </div>
    <div class="item">
        <div class="numer">二獎</div>
        <div class="bonus">
            同期統一發票收執聯末7位數號碼與頭獎中獎號碼末7 位相同者各得獎金4萬元
        </div>
    </div>
    <div class="item">
        <div class="numer">三獎</div>
        <div class="bonus">
            同期統一發票收執聯末6 位數號碼與頭獎中獎號碼末6 位相同者各得獎金1萬元
        </div>
    </div>
    <div class="item">
        <div class="numer">四獎</div>
        <div class="bonus">
            同期統一發票收執聯末5 位數號碼與頭獎中獎號碼末5 位相同者各得獎金4千元
        </div>
    </div>
    <div class="item">
        <div class="numer">五獎</div>
        <div class="bonus">
            同期統一發票收執聯末4 位數號碼與頭獎中獎號碼末4 位相同者各得獎金1千元
        </div>
    </div>
    <div class="item">
        <div class="numer">六獎</div>
        <div class="bonus">
            同期統一發票收執聯末3 位數號碼與 頭獎中獎號碼末3 位相同者各得獎金2百元
        </div>
    </div>
    <div class="item">
        <div class="numer">
            <label for="addprize">增開六獎
                <input type="text" name="addprize" id="addprize"  value="<?= $addprize ?>">
            </label></div>
    </div>
    <div class="item">
        <input type="submit" value="送出">
        <input type="reset" value="重填">
    </div>
    </div>
</form>



</body>

</html>