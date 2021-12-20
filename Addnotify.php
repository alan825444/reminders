<?php

session_start();

$Userid = $_SESSION['UserID'];


if(isset($_POST['Ntevent']) && isset($_POST['Ntremark']) & isset($_POST['NtDate']) && isset($_POST['NtTime']))
{
    if($_POST['Ntevent'] != ""){
        include('lib/config.php');
        $Ntevent = $_POST['Ntevent'];
        $Ntremark= $_POST['Ntremark'];
        $Ntcheck = $_POST['Checked'];
        $NtDate = $_POST['NtDate'];
        $NtTime = $_POST['NtTime'];
        $Ntbuilddate = date("Y-m-d");
        $stmt = $pdo->prepare("INSERT INTO T_Notify (fEvent, fRemark, fAlertCheck, fAlertdate, fAlerttime, fbuilddate, fk_user) 
        VALUES(:fEvent,:fRemark, :fAlertCheck, :fAlertdate, :fAlerttime, :fbuilddate, :fk_user )");
        $stmt->bindParam(':fEvent',$Ntevent);
        $stmt->bindParam(':fRemark',$Ntremark);
        $stmt->bindParam(':fAlertCheck',$Ntcheck);
        $stmt->bindParam(':fAlertdate',$NtDate);
        $stmt->bindParam(':fAlerttime',$NtTime);
        $stmt->bindParam(':fbuilddate',$Ntbuilddate);
        $stmt->bindParam(':fk_user',$_SESSION['UserID']);
        $stmt->execute();
        if($stmt->rowcount()>0){
            exit ("successful");
        }
        else{
            exit("fail");
        }
    }
    else{
        exit("no");
    }
}


