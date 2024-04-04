<?php

include_once("common/includes/constants.php");
include_once("common/includes/functions.php");
include_once("common/includes/common.php");
include("common/includes/admin_session.php");

$branchid = $_SESSION['SESS_LOGIN_BRANCH'];
$usertype = $_SESSION['SESS_STU_ADMINTYPE'];
$user_id = $_SESSION['SESS_STU_ADMINID'];

$ack = $_GET['ack'];


if ($ack == "getdata") {

    $sql = "SELECT 
    COUNT(vehicle_master.id) AS count,
    COUNT(IF(vehicle_master.status = 1, vehicle_master.id, NULL)) AS out_count

  FROM 
    `vehicle_master`
    WHERE del=0 ";
    $res = mysqli_query($conn, $sql);
    $data = mysqli_fetch_object($res);

    $datas  = array(
        'totcount' => $data->count,
        'outcount' => $data->out_count
    );
    echo json_encode($datas);
    exit;
}
