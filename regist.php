<?php
include("lib/config.php");

extract($_POST);
if(isset($_POST['Username']) && isset($_POST['Useremail']) && isset($_POST['Userpwd']))
{
    
    $Username = $_POST['Username'];
    $Useremail = $_POST['Useremail'];
    $Userpwd = $_POST['Userpwd'];
    $stmt = $pdo->prepare("SELECT * FROM T_User WHERE fEmail = '$Useremail'");
    $stmt->execute();
    $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(count($rs) == 0)
    {
        register($Username,$Useremail,$Userpwd);
    }
    else{
        exit("RepeatEmail");
    }

    

}


function register($Username,$Useremail,$Userpwd){
    global $pdo;
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