<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>中獎號碼列表</title>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
        }

        .title {
            margin-right: 50px;
            text-align: center;
        }

        .num_item {
            text-align: left;
        }

        .edit {
            margin: 0 50px;
        }

        .bonus {
            margin-left: 50px;
        }

        div {
            margin: 20px 0;
        }
    </style>
</head>

<body>

    <h1>中獎號碼列表</h1>

    <form action="?" method="GET">
        <div class="year">
            請輸入查詢年月份
            <select name="year" id="year">
                <?php
                $year = date("Y") - 1911;
                $ny = $year + 1;
                echo "<option value='$year' selected>" . $year . "</option>";
                echo "<option value='$ny'>" . $ny . "</option>";
                ?>
            </select>
            <select name="period" id="period">
                <option value='1-2'>01-02月</option>
                <option value='3-4'>03-04月</option>
                <option value='5-6'>05-06月</option>
                <option value='7-8'>07-08月</option>
                <option value='9-10'>09-10月</option>
                <option value='11-12'>11-12月</option>
            </select>
            <input type="submit" value="送出">
        </div>
    </form>
    <?php
    if (isset($_GET['status'])) {
        $status = $_GET['status'];
        switch ($status) {
            case 1:
                echo "更新成功";
                break;
            case 0:
                echo "更新失敗";
                break;
            case 2:
                echo "您還沒有更動數字唷！";
                break;
        }
    }
    if (isset($_GET["year"]) && isset($_GET["period"])) {
        include("common/base.php");
        $year = $_GET["year"];
        $period = $_GET["period"];
        $sql = "select * from `winning numbers` where `year`='$year' && `period`='$period'";
        $row = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    ?>
        <div class="container">
            <div class="title">
                <div class="item title_item">特別獎</div>
                <div class="item title_item">特獎</div>
                <div class="item title_item">頭獎</div>
                <div class="item title_item">二獎</div>
                <div class="item title_item">三獎</div>
                <div class="item title_item">四獎</div>
                <div class="item title_item">五獎</div>
                <div class="item title_item">六獎</div>
                <div class="item title_item">增開六獎</div>
            </div>
            <?php
            $special = $row[0]["special"];
            $top = $row[0]["top"];
            $first_prize1 = $row[0]["first_prize1"];
            $first_prize2 = $row[0]["first_prize2"];
            $first_prize3 = $row[0]["first_prize3"];
            $addprize = $row[0]["addprize"];
            ?>
            <div class="number">
                <div class="item num_item"><?= $special ?></div>
                <div class="item num_item"><?= $top ?></div>
                <div class="item num_item"><?= $first_prize1 . " , " .  $first_prize2 . " , " . $first_prize3 ?> </div>
                <div class="item num_item"><?= substr($first_prize1, 1, 7) . " , " . substr($first_prize2, 1, 7) . " , " . substr($first_prize3, 1, 7) ?></div>
                <div class="item num_item"><?= substr($first_prize1, 2, 6) . " , " . substr($first_prize2, 2, 6) . " , " . substr($first_prize3, 2, 6) ?></div>
                <div class="item num_item"><?= substr($first_prize1, 3, 5) . " , " . substr($first_prize2, 3, 5) . " , " . substr($first_prize3, 3, 5) ?></div>
                <div class="item num_item"><?= substr($first_prize1, 4, 4) . " , " . substr($first_prize2, 4, 4) . " , " . substr($first_prize3, 4, 4) ?></div>
                <div class="item num_item"><?= substr($first_prize1, 5, 3) . " , " . substr($first_prize2, 5, 3) . " , " . substr($first_prize3, 5, 3) ?></div>
                <div class="item num_item"><?= $addprize ?></div>
            </div>
            <div class="bonus">
                <div class="item bonus_item">獎金1000萬元</div>
                <div class="item bonus_item">獎金200萬元</div>
                <div class="item bonus_item">獎金20萬元</div>
                <div class="item bonus_item">獎金4萬元</div>
                <div class="item bonus_item">獎金1萬元</div>
                <div class="item bonus_item">獎金4千元</div>
                <div class="item bonus_item">獎金1千元</div>
                <div class="item bonus_item">獎金2百元</div>
                <div class="item bonus_item">獎金2百元</div>
            </div>
            <div class="edit">
                <div class="item"><a href="winning_numbers_edit.php?year=<?= $year ?>&period=<?= $period ?>"> 編輯</a></div>
            </div>
        </div>
    <?php
    }

    ?>
</body>

</html>