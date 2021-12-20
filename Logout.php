<?php
session_start();
if(isset($_POST['Logout'])){
    if($_POST['Logout'] == 1){
        unset($_SESSION['UserID']);
        unset($_SESSION['UserName']);
        exit("success");
    }
}
else{
    echo "nothing";
}