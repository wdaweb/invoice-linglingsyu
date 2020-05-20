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
            <h1>中獎號碼列表</h1>
            <a href="index.php">回首頁</a>
            <a href="winning_numbers.php">輸入中獎號碼</a>
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
    $arr = ["1"=>"9-10","2"=>"11-12","3"=>"11-12","4"=>"1-2","5"=>"1-2","6"=>"3-4",
            "7"=>"3-4","8"=>"5-6","9"=>"5-6","10"=>"7-8","11"=>"7-8","12"=>"9-10"];
    if(isset($_GET["year"])){
        $year = $_GET["year"];
    }else{
        $year = date("Y")-1911;
    }
    if(isset($_GET["period"])){
        $period = $_GET["period"];
    }else{
        $period = $arr[date('n')];
    }
    include("common/base.php");
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
                <div class="item num_item">與頭獎中獎號碼末7 位相同</div>
                <div class="item num_item">與頭獎中獎號碼末6 位相同</div>
                <div class="item num_item">與頭獎中獎號碼末5 位相同</div>
                <div class="item num_item">與頭獎中獎號碼末4 位相同</div>
                <div class="item num_item">與頭獎中獎號碼末3 位相同</div>
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
    <h1>對獎</h1>
    <form action="?" method="post">
        <label for="numlast3">請輸入發票末三碼</label>
        <input type="text" name="numlast3" id="numlast3">
        <input type="submit" value="對獎">
    </form>
<?php 
        if(!isset($_POST["numlast3"]) && !isset($_POST["number5"])){
            exit();
        }elseif(isset($_POST["numlast3"])){
            if(empty($_POST["numlast3"])){
                echo "請輸入發票後三碼";
                exit();
                }
            $lastthree = [substr($first_prize1, 5, 3),substr($first_prize2, 5, 3),substr($first_prize3, 5, 3),$addprize,substr($special, 5, 3),substr($top, 5, 3)];
            $numlast3 = $_POST["numlast3"];
            if (in_array($numlast3, $lastthree)) {
                echo '<form action="?" method="post">';
                echo '<label>請繼續輸入發票前五碼：<input type="text" name="number5"></label>';
                echo '<label><input type="text" name="number3" value="'.$numlast3.'" readonly></label>';
                echo '<input type="submit" value="送出">';
                echo '</form>';
                exit();
            }
            echo "發票後三碼".$numlast3."沒有中獎";
        }else{
            $number5 = $_POST["number5"];
            $number3 = $_POST["number3"];
            $number = $number5.$number3;
            $second =[substr($first_prize1, 1, 7),substr($first_prize2, 1, 7),substr($first_prize3, 1, 7) ];
            $third = [substr($first_prize1, 2, 6),substr($first_prize2, 2, 6),substr($first_prize3, 2, 6) ];
            $fourth = [substr($first_prize1, 3, 5),substr($first_prize2, 3, 5),substr($first_prize3, 3, 5)];
            $fifth = [substr($first_prize1, 4, 4),substr($first_prize2, 4, 4),substr($first_prize3, 4, 4)];
            $sixth = [substr($first_prize1, 5, 3),substr($first_prize2, 5, 3),substr($first_prize3, 5, 3),$addprize];
            if($number==$special){
                echo "發票號碼".$number."中了特別獎，獎金1000萬元";
                exit();
            }elseif($number==$top){
                echo "發票號碼".$number."中了特獎，獎金200萬元";
                exit();
            }elseif($number==$first_prize1 || $number==$first_prize2 || $number==$first_prize3){
                echo "發票號碼".$number."中了頭獎，獎金20萬元";
                exit();
            }elseif(in_array(substr($number,1,7),$second)){
                echo "發票號碼".$number."中了二獎，獎金4萬元";
                exit();
            }elseif(in_array(substr($number,2,6),$third)){
                echo "發票號碼".$number."中了三獎，獎金1萬元";
                exit();
            }elseif(in_array(substr($number,3,5),$fourth)){
                echo "發票號碼".$number."中了四獎，獎金4千元";
                exit();
            }elseif(in_array(substr($number,4,4),$fifth)){
                echo "發票號碼".$number."中了五獎，獎金1千元";
                exit();
            }elseif(in_array($number3,$sixth)){
                echo "發票號碼".$number."中了六獎，獎金2百元";
            }else{
                echo "您沒有中獎";
            }
        }
        
?>


</body>

</html>