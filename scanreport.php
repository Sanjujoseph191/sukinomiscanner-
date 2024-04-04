a<?php
    $mod = $_GET['mod'];
    $page = $_REQUEST['page'];
    ?>

<script type="text/javascript">
    function check() {
        document.manual_time_new.action = "index.php?act=scanreportview";
        document.manual_time_new.submit();
    }

    function check_excel() {
        document.manual_time_new.action = "scanreportexcel.php";
        document.manual_time_new.submit();
    }
</script>
<div class="content">
    <h2 class="mb-2 lh-sm">Scan Report</h2>
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Enter Details</h6>
            <form class="form-horizontal" action="#" method="post" name="manual_time_new" id="manual_time_new">
                <input id="v_id" name="v_id" type="hidden" />
                <input id="c_id" name="c_id" type="hidden" />

                <div class="row mb-3">
                    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">From Date:<font color="#FF0000" size=""></font></label>
                    <div class="col-sm-7">
                        <input type="date" name="fromdate" id="fromdate" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputUsername2" class="col-sm-2 col-form-label">To Date:<font color="#FF0000" size=""></font></label>
                    <div class="col-sm-7">
                        <input type="date" name="todate" id="todate" class="form-control">
                    </div>
                </div>

                <div style="display: flex; justify-content: center;">
                    <div class="col-md-12">
                        <br>
                        <input type="button" name="view" id="view" class="btn btn-primary" onclick="check();" value="View">
                        <input type="button" name="Excel" id="excel" class="btn btn-success" onclick="check_excel();" value="View">
                        <input type="reset" name="Submit2" class="btn btn-default" value="Clear" />
                    </div>
                </div>
            </form>


        </div>
    </div>
</div>

<script>


</script>