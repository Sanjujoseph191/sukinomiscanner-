<?php
$mod = $_GET['mod'];
$page = $_REQUEST['page'];
?>

<script type="text/javascript">
    function passwordEntry() {
        changepassword = document.getElementById("check").checked;

        if (changepassword == true) {
            document.getElementById("password").disabled = false;
            document.getElementById("cpassword").disabled = false;
            document.getElementById("password").focus();
        } else {
            document.getElementById("password").value = '';
            document.getElementById("cpassword").value == ''
            document.getElementById("password").disabled = true;
            document.getElementById("cpassword").disabled = true;
        }
    }

    function check1() {


        if (checkEmpty('username', 'pid_username')) {
            document.getElementById('username').focus();
            return false;
        } else if (checkEmpty('main_username', 'pid_main_username')) {
            document.getElementById('main_username').focus();
            return false;
        } else if (!document.getElementById("check") || document.getElementById("check").checked) {

            if (checkEmpty('password', 'pid_password')) {
                document.getElementById('password').focus();
                return false;
            } else if (checkEmpty('cpassword', 'pid_cpassword')) {
                document.getElementById('cpassword').focus();
                return false;
            } else if (password.value != cpassword.value) {

                document.getElementById('pid_password').style.display = "";
                document.getElementById('pid_password').style.color = "red";
                document.getElementById('pid_password').innerHTML = "Password mismatch";
                document.getElementById('password').focus();
                document.getElementById('password').value = "";
                document.getElementById('cpassword').value = "";
                return false;
            } else if (checkEmpty('designation', 'pid_designation')) {
                document.getElementById('designation').focus();
                return false;
            }
            document.getElementById('manual_time_new').submit();
        } else {
            document.getElementById('manual_time_new').submit();
        }
    }
</script>


<div class="content">
    <h2 class="mb-2 lh-sm">User Master <?php if ($mod == 'add') {
                                            echo "Add";
                                        } else {
                                            echo "Edit";
                                        } ?></h2>
    <div class="card">
        <div class="card-body">

            <?php
            $userid = $_REQUEST['userid'];
            $sql = "SELECT * FROM usermaster WHERE user_id='{$userid}'";
            $res = mysqli_query($conn, $sql);
            $data = mysqli_fetch_object($res);
            $main_username = $data->main_username;
            $username = $data->username;
            $password = $data->password;
            $usertype = $data->user_type;


            ?>


            <h6 class="card-title">Enter Details</h6>
            <form class="form-horizontal" action="user_validate.php" method="post" name="manual_time_new" id="manual_time_new">
                <input name="mod" id="mod" value="<?= $mod ?>" type="hidden" />
                <input name="page" value="<?= $page ?>" type="hidden" />
                <input name="userid" value="<?= $userid ?>" type="hidden" />
                <div class="row mb-3">
                    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">User Name:<font color="#FF0000" size="">*</font></label>
                    <div class="col-sm-7">
                        <input type="text" name="main_username" id="main_username" class="form-control" placeholder="User Name" value="<?php echo $main_username; ?>">
                        <p id='pid_main_username' style="display: none;"></p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">User Id:<font color="#FF0000" size="">*</font></label>
                    <div class="col-sm-7">
                        <input type="text" name="username" id="username" class="form-control" placeholder="User Name" value="<?php echo $username; ?>">
                        <p id='pid_username' style="display: none;"></p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Password:<font color="#FF0000" size="">*</font></label>
                    <div class="col-sm-7">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="" autofocus="autofocus" <?php if ($mod == "edit") {
                                                                                                                                                            echo 'disabled="disabled"';
                                                                                                                                                        } ?>>
                        <?php if ($mod == "edit") { ?>
                            <input name="check" id="check" type="checkbox" onclick="passwordEntry()" tabindex="-1" /> Change password</label>
                        <?php } ?>
                        <p id='pid_password' style="display: none;"></p>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Confirm Password:<font color="#FF0000" size="">*</font></label>
                    <div class="col-sm-7">
                        <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="confirm password" value="" autofocus="autofocus" <?php if ($mod == "edit") {
                                                                                                                                                                        echo 'disabled="disabled"';
                                                                                                                                                                    } ?>>
                        </label>
                        <p id='pid_cpassword' style="display: none;"></p>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">User Type:<font color="#FF0000" size="">*</font></label>
                    <div class="col-sm-7">
                        <select name="designation" id="designation" class="form-control select2">
                            <option value="">--select--</option>
                            <option value="0" <?php if ($usertype == '0') { ?>selected="selected" <?php } ?>>Standard user</option>
                            <option value="1" <?php if ($usertype == '1') { ?>selected="selected" <?php } ?>>Administrator</option>
                        </select>
                        <p id='pid_designation' style="display: none;"></p>

                    </div>
                </div>
                <div style="display: flex; justify-content: center;">
                    <div class="col-md-12">
                        <br>
                        <input type="button" name="Submit" class="btn btn-primary" onclick="check1();" value="<?php echo ($mod == "add") ? "Add" : "Update"; ?>">
                        <input type="reset" name="Submit2" class="btn btn-default" value="Clear" />
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });
</script>