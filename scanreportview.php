<script type="text/javascript">
    var toastMixin = Swal.mixin({
        toast: true,
        icon: 'success',
        title: 'General Title',
        animation: false,
        position: 'top-right',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });


    function alertmsg(msg, status) {
        toastMixin.fire({
            animation: true,
            title: msg,
            icon: status
        });
    }

    function deleteconfirm(page, name, usercode)

    {

        if (confirm("Are you sure you want to delete this " + name + "?\nIf 'OK' all the information associated with this " + name + " will be removed from the system."))

            window.location = page + "?User_Code=" + usercode + "&name=" + name;

    }
</script>
<?php
$perpage = 10;
$page = $_REQUEST['page'];
$page = ($page >= 1) ? $page : 1;
$start = ($page - 1) * $perpage;

if (empty($_GET['search'])) {
    $searchVal = '';
} else {
    $searchVal = trim($_REQUEST['search']);
}


if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    echo "<script> alertmsg('$msg','success'); </script>";
}

if (isset($_GET['errmsg'])) {
    $errmsg = $_GET['errmsg'];
    echo "<script> alertmsg('$errmsg','error'); </script>";
}

$fromdate = $_REQUEST['fromdate'];
if ($fromdate != "")
    $condition .= "&fromdate=$fromdate";

$todate = $_REQUEST['todate'];
if ($todate != "")
    $condition .= "&todate=$todate";

$stat = $_REQUEST['stat'];
if ($stat != "")
    $condition .= "&stat=$stat";


$sql = "SELECT * FROM scan_log
INNER JOIN usermaster ON scan_log.user_id=usermaster.user_id
 WHERE  usermaster.User_Del='0'   ";


if ($fromdate != '') {
    $sql .= " and date(scan_log.datetime)>= '$fromdate'";
}

if ($todate != '') {
    $sql .= " and date(scan_log.datetime)>= '$todate'";
}
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);

if ($start > $count) {
    $page = 1;
    $start = 0;
}
$sql .= "  LIMIT $start,$perpage ";
$ret = mysqli_query($conn, $sql);


?>
<!-- Content Header (Page header) -->

<div class="content">
    <h2 class="mb-2 lh-sm">Scan Report View</h2>

    <div class="card">
        <div class="card-header">
            <!-- <h3 class="card-title">Report Details</h3> -->
            <h6 align='right'><a href="index.php?act=scanreport"><img src="images/back.png" width="40px;"></a></h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table">
                    <thead>
                        <tr>
                            <th>SI.No</th>
                            <th>IN Bin</th>
                            <th>OUT Bin</th>
                            <th>Scan Datetime</th>
                            <th>Scanned By</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $num = $start + 1;
                        if ($count > 0) {
                            while ($row = mysqli_fetch_object($ret)) {
                                if ($row->status == '0') {
                                    $status = "Match";
                                } else {
                                    $status = "No Match";
                                }
                        ?>
                                <tr>
                                    <td align="left">
                                        <?= $num ?>
                                    </td>

                                    <td align="left">

                                        <?= $row->in_bin ?>
                                    </td>

                                    <td align="left">
                                        <?= $row->out_bin ?>
                                    </td>

                                    <td align="left">
                                        <?= date('d-M-Y H:i:s', strtotime($row->datetime)) ?>
                                    </td>

                                    <td align="left">
                                        <?= $row->username ?>
                                    </td>

                                    <td align="left">
                                        <?= $status ?>
                                    </td>



                                </tr>
                        <?php

                                $num++;
                            }
                        } else {
                            echo "<tr><td colspan='9' align='center'><font color='red'><b>No Records found!</b></font></td></tr>";
                        }

                        ?>
                    </tbody>
                </table>
                <table width="100%" border="0">
                    <tr>
                        <td width="16%" height="24" align="center"><?php if ($page > 1) { ?>
                                <a href="index.php&act=scanreportview?page=<?= ($page - 1) ?><?= $condition ?>"><img src="images/back.png" alt="Back" title="Back" height="25" width="40" /></a><?php } ?>
                        </td>



                        <td width="69%" align="center">
                            <font color="#006699">Showing <?php if ($count == 0) { ?> <?= ($start) ?> <?php } else { ?>

                                    <?= ($start + 1) ?> <?php } ?>



                                to

                                <?= ((($start + $perpage) > $count) ? $count : ($start + $perpage)) ?> of <?= ($count) ?>
                        </td>

                        <td width="15%" align="center"><?php if (($start + $perpage) < $count) { ?>

                                <a href="index.php&act=scanreportview?page=<?= ($page + 1) ?><?= $condition ?>"><img src="images/next.png" alt="Next" title="Next" height="25" width="40" /></a><?php } ?>
                        </td>

                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>