<?php
$mod = $_GET['mod'];
$page = $_REQUEST['page'];
$msg = $_GET['msg'];
$errmsg = $_GET['errmsg'];

$ucode = $_REQUEST['ucode'];
$sql = "select * from `permission` where `user_id`='$ucode'";
$ret = mysqli_query($conn, $sql);
$row = mysqli_fetch_object($ret);


?>

<script type="text/javascript">
    // var toastMixin = Swal.mixin({
    //     toast: true,
    //     icon: 'success',
    //     title: 'General Title',
    //     animation: false,
    //     position: 'top-right',
    //     showConfirmButton: false,
    //     timer: 3000,
    //     timerProgressBar: true,
    //     didOpen: (toast) => {
    //         toast.addEventListener('mouseenter', Swal.stopTimer)
    //         toast.addEventListener('mouseleave', Swal.resumeTimer)
    //     }
    // });


    // function alertmsg(msg, status) {
    //     toastMixin.fire({
    //         animation: true,
    //         title: msg,
    //         icon: status
    //     });
    // }

    function resetform() {
        window.location.href = 'permission';
    }

    function saveform() {


        if (checkEmpty('userid', 'pid_userid')) {
            document.getElementById('userid').focus();
            return false;
        } else {
            document.getElementById('manual_time_new').submit();
        }
    }

    function toggle(source) {
        $('#location').click(function(event) {
            if (this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                });
            }
        });
    }
 function toggle(source) {
        $('#location').click(function(event) {
            if (this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                });
            }
        });
    }

    function goglecheck(that) {
        var chk = document.getElementsByClassName(that.id);
        if (that.checked == true) {
            for (x in chk) {
                if (chk[x].id == undefined) {

                    continue;
                }
                document.getElementById(chk[x].id).checked = true;
            }
        }
        if (that.checked == false) {
            for (x in chk) {
                if (chk[x].id == undefined) {
                    continue;
                }
                document.getElementById(chk[x].id).checked = false;
            }
        }

    }

    function goglecheckload(that) {
        var chk = document.getElementsByClassName(that);
        var flag = 1;
        for (x in chk) {
            if (chk[x].id == undefined) {

                continue;
            }
            if (document.getElementById(chk[x].id).checked == false) {
                flag = 0;
            }
        }

        if (flag == 1) {
            document.getElementById(that).checked = true;
        }

    }

    function loaddata() {
        goglecheckload('master');
        goglecheckload('scanner');
        goglecheckload('report');
        goglecheckload('utility');
    }

    $(document).ready(function() {
        loaddata();
    });
</script>
<style>
    .checkboxstyle {
        width: 15px;
        height: 15px;
    }
</style>


<?php

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    echo "<script> alertmsg('$msg','success'); </script>";
}

if (isset($_GET['errmsg'])) {
    $errmsg = $_GET['errmsg'];
    echo "<script> alertmsg('$errmsg','error'); </script>";
}
?>

<div class="content">
    <h2 class="mb-2 lh-sm">Permission</h2>
    <div class="mt-4">
        <form class="form-horizontal" action="permission_validate.php" method="post" name="manual_time_new" id="manual_time_new">
            <div class="card">
                <div class="card-header">
                    <div class="col-sm-6">
                        <div class="card-body">
                            <div class="row">
                                <label for="Scrap Value" class="col-sm-3 control-label">User Name<font color="#FF0000" size="">*</font> </label>
                                <div class="col-sm-9">
                                    <select class="form-select" data-choices="data-choices" data-options='{"removeItemButton":true,"placeholder":true}' name="userid" id="userid" onchange="window.location.href='permission&ucode='+(this.value) ">
                                        <option value="">--select--</option>
                                        <?php
                                        $usertype = 0;
                                        $sql = "SELECT permission.*,usermaster.username,usermaster.user_type FROM `permission` 
                                                                            INNER JOIN usermaster ON usermaster.user_id=permission.user_id
                                                                            WHERE usermaster.User_Del=0  ";

                                        $res = mysqli_query($conn, $sql);
                                        while ($data = mysqli_fetch_object($res)) {
                                            $usertype = $data->user_type;
                                        ?>
                                            <option value="<?php echo $data->user_id ?>" <?php if ($row->user_id == $data->user_id) {
                                                                                                echo "selected='selected'";
                                                                                            } ?>><?php echo $data->username ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                    <p id='pid_userid' style="display: none;"></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row"><!-- first row-MASTER-->
                    <!--first div-->
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-header" style="background-color: #870ca6; color: white;">
                                <h3 class="card-title">MASTER</h3>
                                <div align="right">Select All&nbsp;&nbsp;<input type="checkbox" id="master" onclick="goglecheck(this)"></div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td style="width: 90%">User Master</td>
                                            <td><input class="checkboxstyle master" type="checkbox" name="m1" id="m1" value="1" <?php if ($row->m1 == 1) {
                                                                                                                                    echo "checked";
                                                                                                                                } ?>></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 90%">Vehicle Master</td>
                                            <td><input class="checkboxstyle master" type="checkbox" name="m2" id="m2" value="1" <?php if ($row->m2 == 1) {
                                                                                                                                    echo "checked";
                                                                                                                                } ?>></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 90%">Customer Master</td>
                                            <td><input class="checkboxstyle master" type="checkbox" name="m3" id="m3" value="1" <?php if ($row->m3 == 1) {
                                                                                                                                    echo "checked";
                                                                                                                                } ?>></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" style="background-color: #870ca6; color: white;">
                                <h3 class="card-title">UTILITY</h3>
                                <div align="right">Select All&nbsp;&nbsp;<input type="checkbox" id="utility" onclick="goglecheck(this)"></div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr style="<?php if ($ucode == 1) { ?> display: none;<?php } ?>">
                                            <td style="width: 90%;">User Permission</td>
                                            <td>
                                                <input class="checkboxstyle utility" type="checkbox" name="p1" id="p1" value="1" <?php if ($row->p1 == 1) {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?>>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--second div-TRANSACTION-->
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-header" style="background-color: #870ca6; color: white;">
                                <h3 class="card-title">Scanner</h3>
                                <div align="right">Select All &nbsp;&nbsp;<input type="checkbox" id="scanner" onclick="goglecheck(this)"></div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td style="width: 90%">OUT</td>
                                            <td><input class="checkboxstyle scanner" type="checkbox" name="s1" id="s1" value="1" <?php if ($row->s1 == 1) {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?>></td>
                                        </tr>

                                        <tr>
                                            <td style="width: 90%">IN</td>
                                            <td><input class="checkboxstyle scanner" type="checkbox" name="s2" id="s2" value="1" <?php if ($row->s2 == 1) {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?>></td>
                                        </tr>



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--third div-->
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-header" style="background-color: #870ca6; color: white;">
                                <h3 class="card-title">REPORTS</h3>
                                <div align="right">Select All&nbsp;&nbsp;<input type="checkbox" id="report" onclick="goglecheck(this)"></div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <tbody>

                                        <tr>
                                            <td style="width: 90%">OUT Report</td>
                                            <td><input class="checkboxstyle report" type="checkbox" name="r1" id="r1" value="1" <?php if ($row->r1 == 1) {
                                                                                                                                    echo "checked";
                                                                                                                                } ?>></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 90%">IN Report</td>
                                            <td><input class="checkboxstyle report" type="checkbox" name="r2" id="r2" value="1" <?php if ($row->r2 == 1) {
                                                                                                                                    echo "checked";
                                                                                                                                } ?>></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--  -->
                    </div>
                </div><!-- first row-->
                <div class="col-sm-4">
                    <div class="row">
                        <!--<div class="card">-->
                        <div class="card-body">
                            <input type="button" value="Save" class="btn btn-primary" onclick="saveform();">
                            <input type="reset" value="Cancel" class="btn btn-default" onclick="resetform();">
                        </div>
                        <!--</div>-->
                    </div>
                </div>
        </form>
    </div>
</div>
