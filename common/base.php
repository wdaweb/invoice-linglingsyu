<?php

$dsn = "mysql:host=localhost;charser=utf8;dbname=invoice";
$pdo = new PDO($dsn, 'root', "");
date_default_timezone_set("Asia/Taipei");
session_start();


/** 尋找單筆資料
 * $table : 資料表名稱
 * $arg: 只能是id 或其他條件(要放在陣列內)
 * select * from `$table` where `id`="1"
 * select * from `$table` where ["year"=>"109" , "period"=>"1-2"]
 * -> select * from `$table` where `year`="109" && `period`="1-2"
 */

//  $data = ["year"=>"109" , "period"=>"1-2"];
//  $ans = find('invoice',$data);
//  print_r($ans);
function find($table, $arg)
{
    global $pdo;
    $sql = "select * from `$table`";
    if (is_array($arg)) {
        $arr = [];
        foreach ($arg as $key => $value) {
            $arr[] = sprintf("`%s`='%s'", $key, $value);
        }
        $sql = $sql . " where " . implode(" && ", $arr);
    } else {
        $sql = $sql . " where `id`='$arg'";
    }
    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}

/** 尋找多筆資料
 * 
 * 
 * 
 */
function findall()
{
}


function delete()
{
}


/**
 * 新增資料
 * 
 * $table:資料表名稱
 * $arg:陣列資料
 * insert into `invoice`(`user_id`, `year`, `period`, `date`, `code`, `num`, `spend`, `create_time`, `update_time`, `note`) VALUES ('value','value',.....)
 * 
 */

function adddata($table, $arg)
{
    global $pdo;
    $key = array_keys($arg);
    $sql = "insert into `$table` " . " (`" . implode("`,`", $key) . "`)" . " values (' " . implode("','", $arg) . "')";
    $res =  $pdo->exec($sql);
}

/**
 * 更新資料
 * 
 * $table:資料表名稱
 * $arg: 條件(id)
 * update `invoice` set `year` = '109',`period` = '3-4',`date`='2020-03-31',`code`='DD',`num` = '12345678',`spend`='30000',`update_time`='$time',`note`='test2' where `user_id`='1' && `id`=''
 * 
 */
$data = ["period" => "3-4", "code" => "DD"];
update('invoice',$data);
function update($table, $arg){
    global $pdo;
    if (is_array($arg)) {
        $arr = [];
        foreach ($arg as $key => $value) {
            $arr[] = sprintf("`%s`='%s'", $key, $value);
        }
        $sql = "update `$table` set " . implode(",", $arr) . " where `user_id`= '1' && `id` = '$arg' ";
    }
}
