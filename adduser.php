<?php

include_once "common/base.php";

foreach ($_POST as $value){
    if (empty($value)) {
        header("location:reg.php");
        exit();
    }
}

$acc = $_POST["acc"];
$pw = $_POST["pw"];
$name = $_POST["name"];
$email = $_POST["email"];
$bir = $_POST["bir"];

// $sqlacc = "select count(`acc`) from `user` where `acc`='$acc' ";
// $user = $pdo->query($sqlacc)->fetchColumn();

$sqlacc = "select count(`acc`) from `user` where `acc`=:acc";
$statement = $pdo -> prepare($sqlacc);
$result = $statement->execute(["acc"=>$acc]);
if(!$result){
    echo "系統錯誤";
    echo '<a href="reg.php">回到註冊頁</a>';
    exit();
}
$user = $statement->fetchColumn();

if ($user == 1) {
    echo "帳號已有人使用，請重新輸入";
    echo '<a href="reg.php">回到註冊頁</a>';
    exit();
}

// $sql = "insert into `user` (`acc`,`pw`,`name`,`birthday`,`email`,`create_time`,`update_time`) values ('$acc','$pw','$name','$bir','$email','" . date("Y-m-d H:i:s") . "','" . date("Y-m-d H:i:s") . "')";

// $res = $pdo->exec($sql);

$sql = "insert into `user` (`acc`,`pw`,`name`,`birthday`,`email`,`create_time`,`update_time`) values (:acc,:pw,:name,:bir,:email,:create_time,:update_time)";

$statement = $pdo->prepare($sql);
$now = date("Y-m-d H:i:s");
$result = $statement -> execute(['acc'=>$acc,'pw'=>$pw,'name'=>$name,'bir'=>$bir,'email'=>$email,'create_time'=>$now,'update_time'=>$now]);

if ($result) {
    echo "註冊成功！請至<a href='index.html'>登入</a>頁登入";
} else {
    echo "新增失敗";
}





