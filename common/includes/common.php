<?php


$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
error_reporting(0);

$alpha_arr                = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");

//global $recordcountperpage;
global $recordcountperpage;
$recordcountperpage        =        10;

define("tbl_usermaster", "usermaster");
define("fld_admin_id", "admin_id");
define("fld_admin_username", "admin_username");
define("fld_admin_pwd", "admin_pwd");
define("fld_admin_del", "User_Del");
