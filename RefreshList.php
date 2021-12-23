<?php
session_start();
include('lib/config.php');
$UserID = $_SESSION['UserID'];

//refreshmode1( $_SESSION['UserID'],"N",1);
/*if($_POST['mode'] == "1"){
    refreshmode1($_SESSION['UserID'],"N",1);
}*/
extract($_POST);
if(isset($_POST['mode'])){
    switch($_POST['mode']){
        case "1":
            refreshmode1($_SESSION['UserID'],$_POST['state'],$_POST['pagenumber'],$_POST['Page_Event_Num']);
            break;
        case "2":
            Delete($_POST["DeleteID"]);
            break;
        case "3":
            DetailData($_POST["DetailID"]);
            break;
        }
}

if(isset($_POST['Upmode'])){
    switch($_POST['Upmode']){
        case "1":
            Revise($_POST['CHId'],$_POST['CHEvent'],$_POST['CHRemark'],$_POST['CHChcked'],$_POST['CHDate'],$_POST['CHTime']);
            break;
        case "2":
            StateChange($_POST['EventID'],$_POST['Eventstate']);
            break;
    }
}

function StateChange($ID,$State){
    global $pdo;
    $stmt = $pdo -> prepare("UPDATE T_Notify SET fstate = '$State' WHERE fid = $ID");
    $stmt -> execute();
    if($stmt->rowCount()>0){
        echo 'success';
    }
    else{
        echo 'fail';
    }
}

function Delete($ID){
    
    global $pdo;
    $stmt = $pdo -> prepare("DELETE FROM T_Notify WHERE fid = $ID");
    $stmt ->execute();

    if($stmt->rowCount()){
        echo "success";
    }
}

function refreshmode1($UserID,$fstate,$Page,$Page_Event_Num){
    //include('lib/config.php');
    global $pdo;

    $rowsStart = ($Page-1)*$Page_Event_Num;
    $stmt = $pdo -> prepare("SELECT * FROM T_Notify WHERE fk_User = $UserID AND fstate = '$fstate' ORDER BY fbuilddate LIMIT $rowsStart, $Page_Event_Num");
    $stmt->execute();
    $filtered_rwos = DataCount($UserID,$fstate);
    $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $count = $Page*$Page_Event_Num -($Page_Event_Num-1);
    $finaldata = array();
    $Page_count = $filtered_rwos/$Page_Event_Num;
    if($filtered_rwos%$Page_Event_Num != 0)
    {
        $Page_count= $filtered_rwos/$Page_Event_Num +1;
    }
    

    foreach($rs as $row){
        $data = array();
        $data[] = $count;
        $data[] = $row['fEvent'];
        $data[] = nl2br($row['fRemark']);
        $data[] = '<button value="detail" type="button" id="'.$row["fid"].'" class="btn btn-primary" data-toggle="modal" data-target="#NotifyDetail"">修改</button>';
        $data[] = '<button value="complete" type="button" id="'.$row["fid"].'" class="btn btn-info" >完成</button>';
        $data[] = '<button value="delete" type="button" id="'.$row["fid"].'" class="btn btn-danger del" >刪除</button>';
        $data[] = $row['fAlertCheck'];
        $data[] = $row['fAlertdate'];
        $data[] = $row['fAlerttime'];
        $finaldata[] = $data;
        $count++;
    }
    
    $output = array(
        "data" => $finaldata,
        "pages" => $Page_count,
        "rows" => $filtered_rwos,
    );

    echo json_encode($output,JSON_UNESCAPED_UNICODE) ;
}

function DataCount($UserID,$fstate){
    global $pdo;
    $stmt = $pdo -> prepare("SELECT * FROM T_Notify WHERE fk_User = $UserID AND fstate = '$fstate'");
    $stmt->execute();
    $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return count($rs);
}

function DetailData($ID){
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM T_Notify WHERE fid = $ID");
    $stmt -> execute();
    $finaldata = array();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
       
    $output = array(
        "data" => $result
    );
    echo json_encode($result,JSON_UNESCAPED_UNICODE);
}

function Revise($ID,$Event,$Remark,$Check,$Date,$Time){
    global $pdo;
    $stmt = $pdo->prepare("UPDATE T_Notify SET fEvent = ?, fRemark = ?, fAlertCheck = ?, fAlertdate = ?, fAlerttime = ?  WHERE fid = $ID");
    $stmt -> execute(array($Event,$Remark,$Check,$Date,$Time));
    if($stmt->rowCount() > 0){
        echo "success";
    }
    else{
        echo "false";
    }

}










/*$stmt = $pdo -> prepare("SELECT fid, fEvent , fRemark FROM T_Notify WHERE fk_User = $UserID AND fstate = 'N'");
$stmt->execute();
$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
$filtered_rwos = $stmt->rowCount();

$Page_count = $filtered/10 +1;

$finaldata = array();
$count = 1;
foreach($rs as $row){
    $data = array();
    global $count;
    $data[] = $count;
    $data[] = $row['fEvent'];
    $data[] = $row['fRemark'];
    $data[] = '<button type="button" id="'.$row["fid"].'" class="btn btn-primary" >詳情</button>';
    $data[] = '<button type="button" id="'.$row["fid"].'" class="btn btn-info" >完成</button>';
    $data[] = '<button type="button" id="'.$row["fid"].'" class="btn btn-danger" >刪除</button>';
    $finaldata[] = $data;
    $count++;
}

$output = array(
    "data" => $finaldata,
    "pages" => $Page_count,
    "rows" => $filtered_rwos
);

echo json_encode($output,JSON_UNESCAPED_UNICODE) ;*/
