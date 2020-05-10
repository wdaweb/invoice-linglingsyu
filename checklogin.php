<?php

include_once "common/base.php";

if(empty($_POST["acc"])){
    echo "請輸入帳號";
    exit();
}
if(empty($_POST["pw"])){
    echo "請輸入密碼";
    exit();
}
 
$acc = $_POST["acc"];
$pw = $_POST["pw"];
// $sql = "select count(*) from `user` where `acc` ='$acc'  && `pw` = '$pw'  ";
// $res = $pdo->query($sql)->fetchColumn();
// $statement = $pdo->query($sql);
// $res = $statement->fetchColumn();
$sql = "select * from `user` where `acc` = :acc  && `pw` = :pw";
$statement = $pdo->prepare($sql);
$result = $statement->execute(['acc'=>$acc,'pw'=>$pw]);
if(!$result){
    echo "登入失敗";
    exit();
}
$res = $statement->fetchALL(PDO::FETCH_ASSOC);
if (count($res) == 1) {
    $_SESSION["id"] = $res[0]["id"] ;
    header("location:main.php");
} else {
    echo "帳號密碼錯誤，請重新輸入";
    echo '<a href="index.php">回首頁</a>';
}

