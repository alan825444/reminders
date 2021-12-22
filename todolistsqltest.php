<?php
include('./lib/config.php');

for($i=1;$i<=50;$i++){
    $stmt = $pdo->prepare("INSERT INTO `T_Notify`(`fEvent`, `fRemark`, `fAlertCheck`, `fAlertdate`, `fAlerttime`, `fstate`, `fk_User`) VALUES ( '事件$i','備註$i','0','','','N',2)");
    $stmt->execute();
}