<?php
include("common/includes/constants.php");
include("common/includes/mysqli_function.php");
include("common/includes/functions.php");
include("common/includes/common.php");
include("common/includes/admin_session.php");
include("common/includes/allstripslashes.php");
include("common/includes/english_admin.php");
// require("common/includes/expiry.php");

date_default_timezone_set("Asia/Kolkata");

$msg = $_GET['msg'];
$sesver = $_SESSION['SESS_STU_ADMINID']; //echo $sesver;  
$lictype = $_SESSION['LIC_TYPE'];
$sql = "select * from `usermaster` where `user_id`='$sesver'";
$ret = mysql_query($sql);
$row = mysql_fetch_object($ret);
$userid = $row->user_id; //echo $scode."<br>"; 
$_SESSION['SESS_USER_TYPE'] = $row->user_type;
$usertype = $row->user_type; //echo $rcode."<br>";  
$admin_username = $row->username; //echo $ecode."<br>";
//exit();
//if session expired
if (empty($_SESSION['SESS_STU_ADMINID'])) {
    //show login page     
    header("Location:login.php?act=$act");
    exit;
}

if (empty($_SESSION['SESS_STU_ADMINID'])) {
    //show login page     
    header("Location:login.php?act=$act");
    exit;
} else {
    session_start();

    $inactive = 1200 * 3;
    if (isset($_SESSION['timeout'])) {
        $session_life = time() - $_SESSION['timeout'];
        if ($session_life > $inactive) {
            session_destroy();
            header("Location: login.php?msg=Your session expired!!&act=$act");
        } else {
            $_SESSION['timeout'] = time();

            $sql = "SELECT * FROM `configuration` WHERE 1=1";
            $res = mysql_query($sql);
            $data = mysql_fetch_object($res);
?>



            <!DOCTYPE html>
            <html data-navigation-type="default" data-navbar-horizontal-shape="default" lang="en-US" dir="ltr">
            <meta http-equiv="content-type" content="text/html;charset=utf-8" />

            <head>
                <?php include('index_head.php'); ?>
                <script src="formvalidate.js"></script>
                <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
                <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

            </head>

            <body>
                <main class="main" id="top">
                    <nav class="navbar navbar-vertical navbar-expand-lg">
                        <script>
                            var navbarStyle = window.config.config.phoenixNavbarStyle;
                            if (navbarStyle && navbarStyle !== 'transparent') {
                                document.querySelector('body').classList.add(`navbar-${navbarStyle}`);
                            }
                        </script>
                        <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
                            <!-- scrollbar removed-->
                            <div class="navbar-vertical-content">
                                <ul class="navbar-nav flex-column" id="navbarVerticalNav">


                                    <li class="nav-item">
                                        <div class="nav-item-wrapper"><a class="nav-link <?php if ($act == "user" or $act == "adduser") { ?>active<?php } ?>" href=" index.php?act=user" role="button" data-bs-toggle="" aria-expanded="false">
                                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="book"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">User Master</span></span></div>
                                            </a></div>
                                    </li>



                                    <li class="nav-item">
                                        <div class="nav-item-wrapper"><a class="nav-link <?php if ($act == "scanreport" or $act == "scanreportview") { ?>active<?php } ?>" href="index.php?act=scanreport" role="button" data-bs-toggle="" aria-expanded="false">
                                                <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="book"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Report</span></span></div>
                                            </a></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="navbar-vertical-footer"><button class="btn navbar-vertical-toggle border-0 fw-semibold w-100 white-space-nowrap d-flex align-items-center"><span class="uil uil-left-arrow-to-left fs-8"></span><span class="uil uil-arrow-from-right fs-8"></span><span class="navbar-vertical-footer-text ms-2">Collapsed View</span></button></div>
                    </nav>
                    <nav class="navbar navbar-top fixed-top navbar-expand" id="navbarDefault">
                        <div class="collapse navbar-collapse justify-content-between">
                            <div class="navbar-logo">
                                <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
                                <a class="navbar-brand me-1 me-sm-3" href="index.php?act=dashbord">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center"><img src="dist/assets/img/icons/logo.png" alt="phoenix" width="27" />
                                            <p class="logo-text ms-2 d-none d-sm-block">phoenix</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <ul class="navbar-nav navbar-nav-icons flex-row">



                                <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                                        <div class="avatar avatar-l ">
                                            <img class="rounded-circle " src="dist/img/face.png" alt="" />
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border" aria-labelledby="navbarDropdownUser">
                                        <div class="card position-relative border-0">
                                            <div class="card-body p-0">
                                                <div class="text-center pt-4 pb-3">
                                                    <div class="avatar avatar-xl ">
                                                        <img class="rounded-circle " src="dist/img/face.png" alt="" />
                                                    </div>
                                                    <h6 class="mt-2 text-body-emphasis"><?= $admin_username  ?></h6>
                                                </div>
                                            </div>

                                            <div class="card-footer p-0 border-top border-translucent">
                                                <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="logout.php"> <span class="me-2" data-feather="log-out"> </span>Sign out</a></div>
                                                <div class="my-2 text-center fw-bold fs-10 text-body-quaternary"><a class="text-body-quaternary me-1" href="#!"></a>&bull;<a class="text-body-quaternary mx-1" href="#!"></a>&bull;<a class="text-body-quaternary ms-1" href="#!"></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    <script>
                        var navbarTopStyle = window.config.config.phoenixNavbarTopStyle;
                        var navbarTop = document.querySelector('.navbar-top');
                        if (navbarTopStyle === 'darker') {
                            navbarTop.setAttribute('data-navbar-appearance', 'darker');
                        }

                        var navbarVerticalStyle = window.config.config.phoenixNavbarVerticalStyle;
                        var navbarVertical = document.querySelector('.navbar-vertical');
                        if (navbarVerticalStyle === 'darker') {
                            navbarVertical.setAttribute('data-navbar-appearance', 'darker');
                        }
                    </script>

                    <?php

                    switch ($act) {

                            //master
                        case "user":
                            include("user.php");
                            break;

                        case "adduser":
                            include("user_add.php");
                            break;

                            //report

                        case "scanreport":
                            include("scanreport.php");
                            break;

                        case "scanreportview":
                            include("scanreportview.php");
                            break;
                            //permission



                            // case "dashbord":
                            //     include("welcome.php");
                            //     break;
                    }
                    ?>
                    <div class="content">


                        <footer class="footer position-absolute">
                            <div class="row g-0 justify-content-between align-items-center h-100">
                                <div class="col-12 col-sm-auto text-center">
                                    <p class="mb-0 mt-2 mt-sm-0 text-body">Thank you for creating with AlgoNxtGen<span class="d-none d-sm-inline-block"></span><span class="d-none d-sm-inline-block mx-1">|</span><br class="d-sm-none" />2024 &copy;</p>
                                </div>
                                <div class="col-12 col-sm-auto text-center">
                                    <p class="mb-0 text-body-tertiary text-opacity-85">v1.15.0</p>
                                </div>
                            </div>
                        </footer>
                    </div>

                </main>
                < <script src="dist/vendors/popper/popper.min.js">
                    </script>
                    <script src="dist/vendors/bootstrap/bootstrap.min.js"></script>
                    <script src="dist/vendors/anchorjs/anchor.min.js"></script>
                    <script src="dist/vendors/is/is.min.js"></script>
                    <script src="dist/vendors/fontawesome/all.min.js"></script>
                    <script src="dist/vendors/lodash/lodash.min.js"></script>
                    <script src="dist/polyfill.io/v3/polyfill.min58be.js?features=window.scroll"></script>
                    <script src="dist/vendors/list.js/list.min.js"></script>
                    <script src="dist/vendors/feather-icons/feather.min.js"></script>
                    <script src="dist/vendors/dayjs/dayjs.min.js"></script>
                    <script src="dist/assets/js/phoenix.js"></script>
                    <script src="dist/vendors/echarts/echarts.min.js"></script>
                    <script src="dist/vendors/leaflet/leaflet.js"></script>
                    <script src="dist/vendors/leaflet.markercluster/leaflet.markercluster.js"></script>
                    <script src="dist/vendors/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js"></script>
                    <script src="dist/assets/js/ecommerce-dashboard.js"></script>

            </body>

            <!-- Mirrored from www.nobleui.com/html/template/demo1/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Oct 2023 06:34:39 GMT -->

            </html>

<?php
        }
    }
}
?>