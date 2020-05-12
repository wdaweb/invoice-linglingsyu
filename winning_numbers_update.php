<?php 
    include("common/base.php");
    $year = $_GET['year'];
    $period = $_GET['period'];
    $special = $_GET['special'];
    $top = $_GET['top'];
    $first_prize1 = $_GET['first_prize1'];
    $first_prize2 = $_GET['first_prize2'];
    $first_prize3 = $_GET['first_prize3'];
    $addprize = $_GET['addprize'];
    $sql = "update `winning numbers` set `year`= '$year',`period`='$period',`special`='$special',`top`='$top',`first_prize1`='$first_prize1',`first_prize2`='$first_prize2',`first_prize3`='$first_prize3',`addprize`='$addprize'";
    $update = $pdo->exec($sql);
    if ($update >= 1){
        $status = 1 ; 
        header("location:winning_numbers_list.php?status=$status");
    }elseif(empty($update)){
        $status = 2 ; 
        header("location:winning_numbers_list.php?status=$status");
    }
    else{
        $status = 0 ; 
        header("location:winning_numbers_list.php?status=$status");
    };
?>