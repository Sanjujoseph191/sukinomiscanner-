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


$sql = "SELECT *,out_log.status as ostat FROM out_log
INNER JOIN customer_master ON out_log.c_id=customer_master.id
INNER JOIN vehicle_master ON out_log.v_id=vehicle_master.id
INNER JOIN usermaster ON out_log.user_id=usermaster.user_id
 WHERE  customer_master.del='0'  AND vehicle_master.del='0'   ";

if ($stat != '') {
    $sql .= " and vehicle_master.status = '1'";
}

if ($fromdate != '') {
    $sql .= " and date(out_log.datetime)>= '$fromdate'";
}

if ($todate != '') {
    $sql .= " and date(out_log.datetime)>= '$todate'";
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
    <h2 class="mb-2 lh-sm">Out Report</h2>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">

                <table class="table">
                    <thead>
                        <tr>
                            <th>SI.No</th>
                            <th>Vehicle No</th>
                            <th>Battery</th>
                            <th>Customer Name</th>
                            <th>Customer Mob</th>
                            <th>To Date</th>
                            <th>Out Datetime</th>
                            <th>Out Done By</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $num = $start + 1;
                        if ($count > 0) {
                            while ($row = mysqli_fetch_object($ret)) {
                                if ($row->ostat == '0') {
                                    $status = "NOT IN";
                                } else {
                                    $status = "IN";
                                }
                        ?>
                                <tr>
                                    <td align="left">
                                        <?= $num ?>
                                    </td>

                                    <td align="left">

                                        <?= $row->v_no ?>
                                    </td>

                                    <td align="left">
                                        <?= $row->bat_tag ?>
                                    </td>

                                    <td align="left">
                                        <?= $row->cus_name ?>
                                    </td>

                                    <td align="left">
                                        <?= $row->cus_mob ?>
                                    </td>
                                    <td align="left">
                                        <?= date('d-M-Y', strtotime($row->to_date)) ?>
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
                                <a href="index.php&act=outreportview?page=<?= ($page - 1) ?><?= $condition ?>"><img src="images/back.png" alt="Back" title="Back" height="25" width="40" /></a><?php } ?>
                        </td>



                        <td width="69%" align="center">
                            <font color="#006699">Showing <?php if ($count == 0) { ?> <?= ($start) ?> <?php } else { ?>

                                    <?= ($start + 1) ?> <?php } ?>



                                to

                                <?= ((($start + $perpage) > $count) ? $count : ($start + $perpage)) ?> of <?= ($count) ?>
                        </td>

                        <td width="15%" align="center"><?php if (($start + $perpage) < $count) { ?>

                                <a href="index.php&act=outreportview?page=<?= ($page + 1) ?><?= $condition ?>"><img src="images/next.png" alt="Next" title="Next" height="25" width="40" /></a><?php } ?>
                        </td>

                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>