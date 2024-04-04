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
error_reporting(1);

$msg = $_GET['msg'];
$act = $_REQUEST['act'];

$sql = "SELECT * FROM configuration";
$res = mysql_query($sql);
// echo mysql_num_rows($res);
$data = mysql_fetch_object($res);


?>
<!DOCTYPE html>
<html data-navigation-type="default" data-navbar-horizontal-shape="default" lang="en-US" dir="ltr">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Phoenix</title>
  <link rel="apple-touch-icon" sizes="180x180" href="dist/assets/img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="dist/assets/img/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="dist/assets/img/favicons/favicon-16x16.png">
  <link rel="shortcut icon" type="image/x-icon" href="dist/assets/img/favicons/favicon.ico">
  <link rel="manifest" href="dist/assets/img/favicons/manifest.json">
  <meta name="msapplication-TileImage" content="dist/assets/img/favicons/mstile-150x150.png">
  <meta name="theme-color" content="#ffffff">
  <script src="dist/vendors/simplebar/simplebar.min.js"></script>
  <script src="dist/assets/js/config.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
  <link href="dist/vendors/simplebar/simplebar.min.css" rel="stylesheet">
  <link rel="stylesheet" href="dist/unicons.iconscout.com/release/v4.0.8/css/line.css">
  <link href="dist/assets/css/theme-rtl.min.css" type="text/css" rel="stylesheet" id="style-rtl">
  <link href="dist/assets/css/theme.min.css" type="text/css" rel="stylesheet" id="style-default">
  <link href="dist/assets/css/user-rtl.min.css" type="text/css" rel="stylesheet" id="user-style-rtl">
  <link href="dist/assets/css/user.min.css" type="text/css" rel="stylesheet" id="user-style-default">
  <script>
    var phoenixIsRTL = window.config.config.phoenixIsRTL;
    if (phoenixIsRTL) {
      var linkDefault = document.getElementById('style-default');
      var userLinkDefault = document.getElementById('user-style-default');
      linkDefault.setAttribute('disabled', true);
      userLinkDefault.setAttribute('disabled', true);
      document.querySelector('html').setAttribute('dir', 'rtl');
    } else {
      var linkRTL = document.getElementById('style-rtl');
      var userLinkRTL = document.getElementById('user-style-rtl');
      linkRTL.setAttribute('disabled', true);
      userLinkRTL.setAttribute('disabled', true);
    }
  </script>
</head>

<body>
  <main class="main" id="top">
    <div class="container-fluid bg-body-tertiary dark__bg-gray-1200">
      <div class="bg-holder bg-auth-card-overlay" style="background-image:url(dist/assets/img/bg/37.png);"></div>
      <!--/.bg-holder-->
      <form method="post" action="login_validation.php" autocomplete="off" class="forms-sample">
        <div class="row flex-center position-relative min-vh-100 g-0 py-5">
          <div class="col-11 col-sm-10 col-xl-8">
            <div class="card border border-translucent auth-card">
              <div class="card-body pe-md-0">
                <div class="col-auto bg-body-highlight dark__bg-gray-1100 rounded-3 position-relative overflow-hidden auth-title-box">
                  <div class="bg-holder" style="background-image:url(dist/assets/img/bg/38.png);"></div>
                  <!--/.bg-holder-->
                </div>
                <div class="col mx-auto">
                  <div class="auth-form-box">
                    <div class="text-center mb-7"><a class="d-flex flex-center text-decoration-none mb-4" href="dist/index-2.html">
                        <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block"><img src="dist/assets/img/icons/logo.png" alt="phoenix" width="58" /></div>
                      </a>

                    </div>
                    <div class="position-relative">
                      <hr class="bg-body-secondary mt-5 mb-4" />

                    </div>
                    <div class="mb-3 text-start"><label class="form-label" for="email">Username</label>
                      <div class="form-icon-container"><input class="form-control form-icon-input" id="username" name="login_email" value="<?php echo $_COOKIE["user"]; ?>" type="text" placeholder="Username" /><span class="fas fa-user text-body fs-9 form-icon"></span></div>
                    </div>
                    <div class="mb-3 text-start"><label class="form-label" for="password">Password</label>
                      <div class="form-icon-container"><input class="form-control form-icon-input" name="login_password" id="password" type="password" value="<?php echo $_COOKIE["pwd"]; ?>" placeholder="Password" /><span class="fas fa-key text-body fs-9 form-icon"></span></div>
                    </div>
                    <div class="row flex-between-center mb-7">
                      <div class="col-auto">
                        <div class="form-check mb-0"><input class="form-check-input" id="remember" name="remember" type="checkbox" <?php if (!empty($_COOKIE["user"])) {
                                                                                                                                      echo "checked";
                                                                                                                                    } ?> /><label class="form-check-label mb-0" for="basic-checkbox">Remember me</label></div>
                      </div>
                      <!-- <div class="col-auto"><a class="fs-9 fw-semibold" href="forgot-password.html">Forgot Password?</a></div> -->
                    </div><button class="btn btn-primary w-100 mb-3">Sign In</button>

                    <?php if ($msg) echo '<b style="color:red;font-size:14px">' . $msg . '</b>' ?>
                    <div class="text-center"><a class="fs-9 fw-bold" href="#"></a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>

  </main>

  <script src="dist/vendors/popper/popper.min.js"></script>
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

</body>




</html>