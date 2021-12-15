<?php
include("function.php");

$dsn = 'mysql:host=localhost;dbname=corp_reminders;charset=utf8';
$user = 'root';
$pwd = '28296320';

$res = DBconn($dsn,$user,$pwd);
if($res['status'] == 1){
    $pdo = $res['pdo'];
}else{
    die();
}
