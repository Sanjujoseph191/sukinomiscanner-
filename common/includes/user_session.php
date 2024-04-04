<?php

session_start();
header("Cache-control: private");
//for admin session
session_register("SESS_STU_USERID");

//$_SESSION['SESS_STU_USERID'] = 1;
ini_set('session.cookie_path', '/RICHLOOK');
