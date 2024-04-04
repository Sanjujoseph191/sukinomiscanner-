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


$sql = "SELECT usermaster.* FROM usermaster 
		where 1=1  and User_Del=0  ";
if ($searchVal != '') {
    $sql .= " and username like '%$searchVal%'";
}


// echo $sql;
// exit;
$ret = mysqli_query($conn, $sql);
$count = mysqli_num_rows($ret);

if ($start > $count) {
    $page = 1;
    $start = 0;
}

$sql = "SELECT usermaster.* FROM usermaster 
		where 1=1  and User_Del=0  ";

if ($searchVal != '') {
    $sql .= " and main_username like '%$searchVal%'";
}

$sql .= "  LIMIT $start,$perpage ";

$ret = mysqli_query($conn, $sql);


?>
<!-- Content Header (Page header) -->

<div class="content">
    <h2 class="mb-2 lh-sm">User Master</h2>


    <div class="d-flex align-items-right flex-wrap text-nowrap">
        <a href="index.php?act=adduser&mod=add" type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
            <i class="btn-icon-prepend" data-feather="plus"></i>
            Add New User
        </a>
    </div>

    <br>
    <div class="card">
        <div class="card-body">

            <td><input type="text" name="search" id="search" class="form-control" style="height: 30px;width: 150px;" placeholder="search user" value="<?php echo $search; ?>"></td>

            <div class="table-responsive">

                <table class="table">
                    <thead>
                        <tr>
                            <th>SI.No</th>
                            <th>User Name</th>
                            <th>Login User Name</th>
                            <th>User Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $num = $start + 1;

                        if ($count > 0) {
                            while ($row = mysqli_fetch_object($ret)) {

                                $fld_id = $row->user_id;

                        ?>
                                <tr>
                                    <td align="left">
                                        <?= $num ?>

                                    </td>

                                    <td align="left">

                                        <?= $row->main_username ?>
                                    </td>

                                    <td align="left">
                                        <?= $row->username ?>
                                    </td>

                                    <td align="left">
                                        <?php if ($row->user_type == '1') echo "Administrator";
                                        else
                                            echo "Standard user"; ?>
                                    </td>





                                    <div class="btn-group title-quick-actions">
                                        <td width="150px"><a href="index.php?act=adduser&mod=edit&amp;userid=<?= $fld_id ?>"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit text-primary">
                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                </svg></a>
                                            <div class='btn-group'><button data-toggle='tooltip' title='Delete' type='submit' class='btn btn-sm btn-default act-view' onclick="javascript:deleteconfirm('user_delete.php','user','<?= $fld_id . $condition ?>')"><i data-feather="delete"></i></button></div>
                                        </td>
                                    </div>
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
                                <a href="index.php?act=user&page=<?= ($page - 1) ?>&search=<?= $search ?><?= $condition ?>"><img src="images/back.png" alt="Back" title="Back" height="25" width="40" /></a><?php } ?>
                        </td>



                        <td width="69%" align="center">
                            <font color="#006699">Showing <?php if ($count == 0) { ?> <?= ($start) ?> <?php } else { ?>

                                    <?= ($start + 1) ?> <?php } ?>



                                to

                                <?= ((($start + $perpage) > $count) ? $count : ($start + $perpage)) ?> of <?= ($count) ?>
                        </td>

                        <td width="15%" align="center"><?php if (($start + $perpage) < $count) { ?>

                                <a href="index.php?act=user&page=<?= ($page + 1) ?>&search=<?= $search ?><?= $condition ?>"><img src="images/next.png" alt="Next" title="Next" height="25" width="40" /></a><?php } ?>
                        </td>

                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("search").addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            window.location.href = 'index.php?act=user&search=' + document.getElementById("search").value
        }
    });
</script>