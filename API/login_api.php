<?php
error_reporting(0);
set_time_limit(0);
ini_set('memory_limit', '5G');
date_default_timezone_set("Asia/Kolkata");

include_once("../common/includes/constants.php");
include_once("../common/includes/functions.php");
include_once("../common/includes/common.php");

header('Content-Type: application/json');

// print_r($_SERVER); exit;

// $headers = getallheaders();

$headers['Authorization'] = $_SERVER['HTTP_AUTHORIZATION'];


$today = date('Y-m-d');
$now = date('Y-m-d H:i:s');


$json_content = file_get_contents('php://input');
$json = json_decode($json_content, true);

//print_r($conn) ; exit;

$content = array();
$message = array();

$username = $json['username'];
$password = $json['password'];


// echo "SELECT `user_id` FROM usermaster WHERE username = '$username' AND password = PASSWORD('$password') AND User_Del!=1";exit;

$sql = mysqli_query($conn, "SELECT `user_id` FROM usermaster WHERE username = '$username' AND password = PASSWORD('$password') AND User_Del!=1");
if (!mysqli_num_rows($sql)) {
    $message = array('Code' => 400, 'Status' => 'Invalid User or Password');
    goto __REDIRECT;
}

$row_user = mysqli_fetch_object($sql);


$user_id = $row_user->user_id;


$message = array('user_id' => $user_id, 'Code' => 200, 'Status' => 'Success');
goto __REDIRECT;





__REDIRECT:

$respose = $message;
echo json_encode($respose);
exit;
