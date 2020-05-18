<?php 
include "common/base.php";

//函數清除字串前後空白 查表單過濾(injection)
$period = trim($_POST['period']);
$code = strtoupper($_POST['code']);
$user_id= $_SESSION['id'];
$sql = "insert into `invoice` (`user_id`,`year`,`period`,`date`,`code`,`num`,`spend`,`create_time`,`update_time`,`note`) values('$user_id','$_POST['year']','$_POST['period']')";

$res = $pdo->exec($sql);

if($res>=1){
    echo "新增成功";
    echo "<a href='list.php'>發票列表</a>";
    echo "<a href='index.php'>繼續輸入</a>";
}else{
    echo "新增失敗";
    echo $sql;
}



?>