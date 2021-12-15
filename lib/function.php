<?php


function dbconn($dsn,$user,$pwd){
    $returnArray = array();

    try{
        $pdo = new PDO($dsn,$user,$pwd);
        $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $returnArray['status'] = 1;
        $returnArray['pdo'] = $pdo;
        //return $pdo;
    }catch(PDOException $e){
        $returnArray['status'] = 0;
        $returnArray['errorMsg'] = '資料庫連接失敗'.$e->getMessage();
        //die('資料庫連接失敗'.$e->getMessage());
    }

    return $returnArray;
}
