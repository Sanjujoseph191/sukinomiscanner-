<?php

include_once("common/includes/constants.php");
include_once("common/includes/mysqli_function.php");
include_once("common/includes/functions.php");
include_once("common/includes/common.php");
include_once("common/includes/admin_session.php");

$userid = $_REQUEST['User_Code'];



$sql1 = "UPDATE `usermaster` SET `User_Del`=1 WHERE `user_id`='{$userid}'";
$res1 = mysql_query($sql1);

if (!$res1) {
    $errmsg = "Error";
    goto __REDIRECT;
} else {
    $msg = "User Deleted Successfully";
    goto __REDIRECT;
}

__REDIRECT:

if ($errmsg) {
    header("location:index.php?act=user&errmsg=$errmsg");
    exit;
} else {
    header("location:index.php?act=user&msg=$msg");
    exit;
}
