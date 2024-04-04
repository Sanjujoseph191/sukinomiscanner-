<?php

include_once("common/includes/constants.php");
include_once("common/includes/functions.php");
include_once("common/includes/common.php");
include_once("common/includes/english_admin.php");
include("common/includes/admin_session.php");

$user_id = $_SESSION['SESS_STU_ADMINID'];
$ack = $_GET['ack'];
$print_date = date('Y-m-d H:i:s');


if ($ack == "getvehicledata") {

    $custmob = trim($_GET['custmob']);

    $sql = mysqli_query($conn, "SELECT vehicle_master.id as v_id,vehicle_master.v_no,customer_master.id as c_id FROM out_log
    INNER JOIN customer_master ON out_log.c_id=customer_master.id
    INNER JOIN vehicle_master ON out_log.v_id=vehicle_master.id
     WHERE customer_master.cus_mob= '{$custmob}' AND vehicle_master.status='1' AND out_log.status='0' AND customer_master.del='0' ");
    $count = mysqli_num_rows($sql);
    $data = mysqli_fetch_object($sql);

    $datas  = array(
        'count' => $count,
        'v_name' => $data->v_no,
        'v_id' => $data->v_id,
        'c_id' => $data->c_id
    );
    echo json_encode($datas);
    exit;
}

if ($ack == "checkvehicledata") {

    $v_id = trim($_GET['v_id']);
    $battery = trim($_GET['battery']);

    $sql = mysqli_query($conn, "SELECT vehicle_master.id  FROM vehicle_master 
     WHERE vehicle_master.id= '{$v_id}' AND vehicle_master.bat_tag='$battery' AND vehicle_master.del='0' ");
    $count = mysqli_num_rows($sql);
    if ($count == 0) {
        echo 0;
    } else {
        echo 1;
    }
    exit;
}


if ($ack == "getbatterydata") {

    $vehicle = trim($_GET['vehicle']);
    $battery = trim($_GET['battery']);

    $sql = mysqli_query($conn, "SELECT vehicle_master.id  FROM vehicle_master 
     WHERE vehicle_master.id= '{$vehicle}' AND vehicle_master.bat_tag='$battery' AND vehicle_master.del='0' ");
    $count = mysqli_num_rows($sql);
    if ($count == 0) {
        echo 0;
    } else {
        echo 1;
    }
    exit;
}
