<?php
session_start();
include('lib/config.php');

$UserID = $_SESSION['UserID'];

$stmt = $pdo -> prepare("SELECT fEvent , fRemark FROM T_Notify WHERE fk_User = $UserID AND fstate = 'N'");
$stmt->execute();
var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));