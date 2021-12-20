<?php
session_start();
include('lib/config.php');
include('lib/TodolistClass.php');
$UserID = $_SESSION['UserID'];

//refreshmode1( $_SESSION['UserID'],"N",1);
/*if($_POST['mode'] == "1"){
    refreshmode1($_SESSION['UserID'],"N",1);
}*/
extract($_POST);
if(isset($_POST['mode'])){
    switch($_POST['mode']){
        case "1":
            refreshmode1($_SESSION['UserID'],"N",1);
            break;
        case "2":
            $bool =  Delete($_POST["DeleteID"]);
            if($bool){
                refreshmode1($_SESSION['UserID'],"N",1);
            }
            break;
        case "3":
            DetailData($_POST["DetailID"]);
            break;
        }
}

if(isset($_POST['Upmode'])){
    switch($_POST['Upmode']){
        case "1":

            break;
    }
}
    


function Delete($ID){
    
    global $pdo;
    $stmt = $pdo -> prepare("DELETE FROM T_Notify WHERE fid = $ID");
    $stmt ->execute();

    if($stmt->rowCount()){
        return true;
    }
}

function refreshmode1($UserID,$fstate,$Page){
    //include('lib/config.php');
    global $pdo;
    $rowsStart = ($Page-1)*10;
    $rowEnd = ($Page*10)-1;
    $stmt = $pdo -> prepare("SELECT * FROM T_Notify WHERE fk_User = $UserID AND fstate = '$fstate' ORDER BY fbuilddate LIMIT $rowsStart, $rowEnd");
    $stmt->execute();

    $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $filtered_rwos = $stmt->rowCount();
    $count = 1;
    $finaldata = array();
    $Page_count = $filtered_rwos/10 +1;

    foreach($rs as $row){
        $data = array();
        $data[] = $count;
        $data[] = $row['fEvent'];
        $data[] = $row['fRemark'];
        $data[] = '<button value="detail" type="button" id="'.$row["fid"].'" class="btn btn-primary" data-toggle="modal" data-target="#NotifyDetail"">修改</button>';
        $data[] = '<button type="button" id="'.$row["fid"].'" class="btn btn-info" >完成</button>';
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
        "rows" => $filtered_rwos
    );

    echo json_encode($output,JSON_UNESCAPED_UNICODE) ;
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

function Revise($ID){
    global $pdo;
    $stmt = $pdo->prepare("UPDATE T_Notify SET fEvent=[value-2], fRemark=[value-3], fAlertCheck=[value-4],`fAlertdate`=[value-5],`fAlerttime`=[value-6] WHERE fid = $ID");
    $stmt -> execute();
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
