<?php
session_start();


extract($_POST);
if(isset($_POST['Loginmail']) && isset($_POST['Loginpwd'])){
    include('lib/config.php');

    $Loginmail = $_POST['Loginmail'];
    $Loginpwd = $_POST['Loginpwd'];
    $stmt = $pdo->prepare("SELECT * FROM T_User WHERE fEmail = '$Loginmail' AND fPwd = '$Loginpwd'");
    $stmt->execute();

    if($stmt->rowCount() == 1){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['UserID'] =  $row['fid'];
        $_SESSION['UserName'] = $row['fUsername'];
        exit("success");
    }
    else{
        exit("fail");
    };
    
}
?>