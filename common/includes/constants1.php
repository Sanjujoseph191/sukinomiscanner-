<?php

//$expiry_date = strtotime("6-July-2030");
$expiry_date = strtotime("13-August-2023");
$today = strtotime("now");
$datediff = $expiry_date - $today;
$days_left = floor($datediff / (60 * 60 * 24));

if ($days_left < 0) { // expired
    echo '<div style="position:fixed;left:0;top:0;width:100%;height:100%;">
                <div style="margin-top:165px"></div>
                <h3 style="text-align:center;color:red;" draggable="true"><img src="dist/img/sign_error.png"/> SOFTWARE EXPIRED!</h3>
                <p style="text-align:center;font-size:1.3em;">This software has been temporarily suspened due to non payment.</p>
                <p style="text-align:center;font-size:1.3em;"><a href="logout.php" title="Logout"><b>Logout</b></p>
                <style>#content_wrapper{display:none; } #footer{ position: fixed;bottom:0;}</style>
                </div>';
    $permission_list = array();
    //exit();
    exit;
}
