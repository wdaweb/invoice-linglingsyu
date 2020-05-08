<?php 
include "common/base.php";

//函數清除字串前後空白 查表單過濾(injection)
$period = trim($_POST['period']);

$sql = "insert into `invoice` (`code`,`number`,`period`,`expend`,`year`) values('".$_POST['code']."','".$_POST['number']."','".$period."','".$_POST['pay']."','".$_POST['year']."')";

$res = $pdo->exec($sql);

if($res>=1){
    echo "新增成功";
    echo $sql;
}else{
    echo "新增失敗";
    echo $sql;
}

?>