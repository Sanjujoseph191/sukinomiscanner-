<?php
error_reporting(0);
set_time_limit(0);
ini_set('memory_limit', '5G');
date_default_timezone_set("Asia/Kolkata");

include_once("../common/includes/constants.php");
include_once("../common/includes/functions.php");
include_once("../common/includes/common.php");

header('Content-Type: application/json');
$headers['Authorization'] = $_SERVER['HTTP_AUTHORIZATION'];

$today = date('Y-m-d');
$now = date('Y-m-d H:i:s');


$json_content = file_get_contents('php://input');
$json = json_decode($json_content, true);

//print_r($conn) ; exit;

$content = array();
$message = array();

$inbin = $json['in_bin'];
$outbin = $json['out_bin'];
$userid = $json['user_id'];


if (!$inbin || !$outbin || !$userid) {
    $message = array('Code' => 401, 'Status' => 'Body Missing!');
    goto __REDIRECT;
}

if ($inbin === $outbin) $status = '0';
else $status = '1';

$sql = "INSERT INTO `scan_log`(`in_bin`, `out_bin`, `datetime`, `user_id`,`status`) 
VALUES ('$inbin','$outbin','$now','$userid','$status')";


$res = mysqli_query($conn, $sql);

if ($res) {
    $message = array('code' => 200, 'status' => 'Success');
    goto __REDIRECT;
} else {
    $message = array('code' => 404, 'status' => 'Failed');
    goto __REDIRECT;
}


__REDIRECT:

$respose = $message;
echo json_encode($respose);
exit;
