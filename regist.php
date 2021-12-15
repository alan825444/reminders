<?php


extract($_POST);
if(isset($_POST['Username']) && isset($_POST['Useremail']) && isset($_POST['Userpwd']))
{
    //有沒有辦法把資料庫連接寫成一個方法，需要使用的時候直接調用呢?
    /*$dsn = 'mysql:host=localhost;dbname=corp_reminders;charset=utf8';
    try{
        $pdo = new PDO($dsn,'root','28296320');
        $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        die('資料庫連接失敗'.$e->getMessage());
    }*/
    include("lib/config.php");
    
    $Username = $_POST['Username'];
    $Useremail = $_POST['Useremail'];
    $Userpwd = $_POST['Userpwd'];
    $stmt = $pdo->prepare('INSERT INTO T_User(fEmail,fPwd,fUsername) VALUES (:Useremail,:Userpwd,:Username);');
    $stmt->bindParam(':Useremail',$Useremail);
    $stmt->bindParam(':Userpwd',$Userpwd);
    $stmt->bindParam(':Username',$Username);
    $stmt->execute();

    if($stmt->rowCount()>0){
        exit("success");
    }
    else{
        exit("false");
    }

}
?>