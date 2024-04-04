<?php

include_once("common/includes/constants.php");
include_once("common/includes/constants.php");
include_once("common/includes/mysqli_function.php");
include_once("common/includes/functions.php");
include_once("common/includes/common.php");
include_once("common/includes/admin_session.php");
include_once("common/includes/english_admin.php");
require('phpexcel/PHPExcel.php');
require('phpexcel/PHPExcel/IOFactory.php');

$page = $_REQUEST['page'];
$mod = $_REQUEST['mod'];



$edit = $_REQUEST['userid'];
$main_username = $_REQUEST['main_username'];
$username = $_REQUEST['username'];
$password = addslashes($_REQUEST['password']);
$cpassword = addslashes($_REQUEST['cpassword']);
$designation = $_REQUEST['designation'];

$file = $_FILES['uploaded']['tmp_name'];
$ext = pathinfo($_FILES['uploaded']['name'], PATHINFO_EXTENSION);

if ($file) {


    $move = "exceluploads/";
    $filename = date("d_m_y_H_i_s_") . $_SESSION['SESS_STU_ADMINID'] . $_FILES['uploaded']['name'];
    $move = $move . $filename;

    if ($ext == 'xlsx' || $ext == 'xls') {

        $obj = PHPExcel_IOFactory::load($file);
        $ob = PHPExcel_IOFactory::load($file);


        foreach ($obj->getWorksheetIterator() as $sheet) {


            $getHighestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            $sheetData = $sheet->rangeToArray(
                'A2:' . $highestColumn . $getHighestRow,
                NULL,
                TRUE,
                FALSE
            );

            //echo count($sheetData);
            //$ms= array();


            $cusarray = array();

            // echo $getHighestRow;exit;

            for ($p = 2; $p <= $getHighestRow; $p++) {

                $username = trim(addslashes($sheet->getCellByColumnAndRow(1, $p)->getvalue()));
                $loginusername = trim(addslashes($sheet->getCellByColumnAndRow(2, $p)->getvalue()));
                $password = trim(addslashes($sheet->getCellByColumnAndRow(3, $p)->getvalue()));
                $role = trim(addslashes($sheet->getCellByColumnAndRow(4, $p)->getvalue()));


                if ($username == '') {
                    $errmsg = "Insertion Failed.Username cannot be Null! On line-" . $p;
                    header("location:user?&errmsg=$errmsg&page=$page");
                    exit;
                }

                if ($loginusername == '') {
                    $errmsg = "Insertion Failed.Login Username cannot be Null! On line-" . $p;
                    header("location:user?&errmsg=$errmsg&page=$page");
                    exit;
                }

                if ($password == '') {
                    $errmsg = "Insertion Failed.Login Password cannot be Null! On line-" . $p;
                    header("location:user?&errmsg=$errmsg&page=$page");
                    exit;
                }

                if ($role == '') {
                    $errmsg = "Insertion Failed.Role type cannot be Null! On line-" . $p;
                    header("location:user?&errmsg=$errmsg&page=$page");
                    exit;
                }





                $sql = "SELECT * FROM `usermaster` WHERE `username`='{$loginusername}'   AND `User_Del`=0";
                $ret = mysql_query($sql);
                if (mysql_num_rows($ret)) {
                    $errmsg = "User already exist! On line-" . $p;
                    header("location:user?&errmsg=$errmsg&page=$page");
                    exit;
                }
            }

            for ($p = 2; $p <= $getHighestRow; $p++) {


                $username = trim(addslashes($sheet->getCellByColumnAndRow(1, $p)->getvalue()));
                $loginusername = trim(addslashes($sheet->getCellByColumnAndRow(2, $p)->getvalue()));
                $password = trim(addslashes($sheet->getCellByColumnAndRow(3, $p)->getvalue()));
                $role = trim(addslashes($sheet->getCellByColumnAndRow(4, $p)->getvalue()));

                $get_role = mysqli_query($conn, "SELECT * FROM role_master WHERE `role`='$role'");
                $datarole = mysqli_fetch_object($get_role);
                $roleid = $datarole->id;

                $sql1 = "INSERT INTO `usermaster`(`main_username`,`username`,`password`,`user_type`) 
                  VALUES ('{$username}','{$loginusername}',PASSWORD('{$password}'),'{$roleid}')";

                $res1 = mysql_query($sql1);
            }
        }

        $msg = "Uploaded Success!!";
        move_uploaded_file($_FILES['uploaded']['tmp_name'], $move);
        header("location:user?&msg=$msg&page=$page");
        exit;
    } else {
        $errmsg = "Invalid Excel Format use .xlsx or .xls ";
        goto __REDIRECT;
    }
}







if (!$username || !$main_username /*|| !$locationid || !$permissiontype*/) {

    $errmsg = "Please Fill All The Mandatory Fields";
    goto __REDIRECT;
}
// dd('tst');
if (!$edit && $password == '') {
    header("location: index.php?act=" . $act . "&error_msg=Fill all mandatory fields and try again");
    exit();
}
if ($edit && isset($_POST['check']) == true && $password == '') {
    header("location: index.php?act=" . $act . "&error_msg=Fill all mandatory fields and try again");
    exit();
}

if ($password == $cpassword) {
    $user_password = $password;
} else {
    header("location: index.php?act=" . $act . "&mod=add&error_msg=Password Mismatch");
    exit();
}



if ($edit) {
    $sql = "SELECT * FROM `usermaster` WHERE `user_id`!='{$edit}'  AND `username`='{$main_username}' AND User_Del=0";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res)) {
        $errmsg = "User already exist";
        goto __REDIRECT;
    }

    // echo $sql;
    // exit;


    $sql2 = "UPDATE `usermaster`
                     SET `main_username` = '{$main_username}',
                     `username`='{$username}',
                     `user_type`='{$designation}' ";



    if (isset($_REQUEST['check']) == true)
        $sql2 .= ",password=PASSWORD('" . $password . "') ";



    $sql2 .=   " WHERE `user_id`='{$edit}'";
    // echo $sql2;
    //            exit; 



    $res2 = mysqli_query($conn, $sql2);
    if (!$res2) {
        $errmsg = "Unable To Modify";
        goto __REDIRECT;
    }
    $msg = "User Modified Successfully";
    goto __REDIRECT;
} else {

    if ($mod == 'edit') {
        $errmsg = "Error";
        goto __REDIRECT;
    }

    $sql = "SELECT * FROM `usermaster` WHERE `main_username`='{$main_username}' AND `User_Del`=0";

    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res)) {
        $errmsg = "User Already Exist";
        goto __REDIRECT;
    }



    $sql2 = "INSERT INTO `usermaster`(`main_username`,`username`,`password`,`user_type`) 
                  VALUES ('{$main_username}','{$username}',PASSWORD('{$cpassword}'),'{$designation}')";


    $res2 = mysqli_query($conn, $sql2);
    $id = mysqli_insert_id($conn);
    $sql3 = "INSERT INTO permission (user_id) VALUES('$id')";
    mysqli_query($conn, $sql3);


    if (!$res2) {
        $errmsg = "Unable To Create User";
        goto __REDIRECT;
    }

    $msg = "User Added Successfully";
    goto __REDIRECT;
}


__REDIRECT:

if ($errmsg) {
    header("location:user?&errmsg=$errmsg&page=$page");
    exit;
} else {
    header("location:user?&msg=$msg&page=$page");
    exit;
}
