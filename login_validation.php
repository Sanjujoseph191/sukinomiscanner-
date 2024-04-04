<?php


include("common/includes/admin_session.php");
include("common/includes/mysqli_function.php");
include("common/includes/constants.php");
include("common/includes/functions.php");
include("common/includes/common.php");
include("common/includes/allstripslashes.php");


$commonobj          = new common();
$adminobj                = new admin();

$username                = trim($_POST['login_email']);
$password                = trim($_POST['login_password']);
$rememberme                = trim($_POST['remember']);
$act                     = $_POST['act'];
$page                      = $_POST['page'];

//assign all mandatory fields to a string separated by '~*'
$validatestring = $username . "~*" . $password;

//check all mandatory fields
if ($commonobj->nullvalidation($validatestring)) {
    //redirect the user to the sign in page along with message
    $login_null_msg        = urlencode($login_null_msg);
    header("location:index.php?msg=$login_null_msg&act=$act");
    exit;
}

//check for valid login
if (!$adminobj->ifvalidlogin($username, $password, $conn)) {
    //redirect to sign up page with message
    $login_invalid_msg        = urlencode($login_invalid_msg);
    header("location:login.php?msg=Invalid user name or password!!");
    exit;
} else {

    //update admin session


    session_start();
    $_SESSION['SESS_STU_ADMINID'] = $adminobj->user_id;
    $_SESSION['LIC_TYPE'] = 3;
    $_SESSION['timeout'] = time();



    if ($rememberme) {
        setcookie("user", "$username", time() + (3600 * 3600));
        setcookie("pwd", "$password", time() + (3600 * 3600));
    } else { //echo "cccc";
        setcookie("user", "", time() - 3600 * 3600);
        setcookie("pwd", "", time() - 3600 * 3600);
    }


    //if from any page 
    if (!empty($act)) {
        //redirect back to that page  
        header("location:index.php?act=$act");
        exit;
    }


    //redirect the user to the welcomepage
    header("location:index.php?act=dashbord");
    exit;
}
