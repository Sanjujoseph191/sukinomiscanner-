<?php
error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);
include("common/includes/constants.php");
$dbhost = 'localhost:3321';
$dbname = 'd_scan';
$dbuser = 'root';
$dbpassword = '';
function mysql_query($result)
{

	$conn = mysqli_connect('localhost:3321', 'root', '', 'd_scan');

	return mysqli_query($conn, $result);
}

function mysql_fetch_object($result)
{

	return mysqli_fetch_object($result);
}
function mysql_fetch_row($result)
{
	return mysqli_fetch_row($result);
}
function mysql_num_rows($result)
{
	return mysqli_num_rows($result);
}
function mysql_fetch_array($result)
{
	return mysqli_fetch_array($result);
}
function mysql_fetch_assoc($result)
{
	return mysqli_fetch_assoc($result);
}
