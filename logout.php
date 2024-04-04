<?php 
include("common/includes/constants.php");
include("common/includes/mysqli_function.php");
include("common/includes/functions.php");
include("common/includes/common.php");
include("common/includes/admin_session.php");
include("common/includes/allstripslashes.php");
include("common/includes/english_admin.php");
include_once("common/includes/Charts.php");
include 'common/conf/init.php';
include_once("common/includes/license_functions.php");

$_SESSION = array();
header("location: login.php?msg=Logout success");