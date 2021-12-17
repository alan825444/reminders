<?php
session_start();

echo isset($_POST['refreshtype']);
$UserID = $_SESSION['UserID'];
//refreshmode1( $_SESSION['UserID'],"N",1);
/*if($_POST['mode'] == "1"){
    refreshmode1($_SESSION['UserID'],"N",1);
}*/
switch($_POST['mode']){
case "1":
    refreshmode1($_SESSION['UserID'],"N",1);
    break;
}

function refreshmode1($UserID,$fstate,$Page){
    include('lib/config.php');
    $rowsStart = ($Page-1)*10;
    $rowEnd = ($Page*10)-1;
    $stmt = $pdo -> prepare("SELECT fid, fEvent , fRemark FROM T_Notify WHERE fk_User = $UserID AND fstate = '$fstate' LIMIT $rowsStart, $rowEnd");
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
        $data[] = '<button  type="button" id="'.$row["fid"].'" class="btn btn-primary" >詳情</button>';
        $data[] = '<button type="button" id="'.$row["fid"].'" class="btn btn-info" >完成</button>';
        $data[] = '<button value="delete" type="button" id="'.$row["fid"].'" class="btn btn-danger del" >刪除</button>';
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
