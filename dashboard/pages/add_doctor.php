<?php
session_start();
$ses = $_SESSION['user'];
if ($_SESSION['user']) {
    // Enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
?>
<?php include("header.php"); ?>

<script>
function calc() {
    var fee = document.getElementById('fee').value;
    var hopshare = document.getElementById('hospitalshare').value / 100;
    hamount = fee * hopshare;
    htotal = fee - hamount;
    document.getElementById('hamo').value = hamount;
}

function calc1() {
    var fee = document.getElementById('fee').value;
    var doctshare = document.getElementById('doctorshare').value / 100;
    damount = fee * doctshare;
    document.getElementById('doctoramount').value = damount;
}

function calc2(form) {
    hamount = document.getElementById('hamo').value;
    damount = document.getElementById('doctoramount').value;
    tt = parseFloat(hamount) + parseFloat(damount);
    document.getElementById('total').value = tt;
}
</script>

<!-- end sidebar menu -->
<!-- start page content -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class="pull-left">
                    <div class="page-title">Add Doctor</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i></li>
                    <li><a class="parent-item" href="doctor.php">Doctors</a>&nbsp;<i class="fa fa-angle-right"></i></li>
                    <li class="active">Add Doctor</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>Doctor Details</header>
                        <button id="panel-button3" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
                            <i class="material-icons">more_vert</i>
                        </button>
                    </div>

                    <form name="form" method="post" action="../modal/insert.php">
                        <div class="card-body" id="bar-parent2">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Doctor Name</label>
                                        <input type="text" class="form-control" name="dname" required="required" id="dname">
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control" required="required">
                                            <option value="">Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <input type="hidden" class="form-control" name="desc" id="desc">
                                    <div class="form-group">
                                        <label>Department Name</label>
                                        <input id="prd" list="city1" name="dept" class="form-control" required>
                                        <datalist id="city1">
                                            <?php  
                                            $sql = "SELECT DISTINCT doctdeptname FROM doctdept";
                                            $r = mysqli_query($link, $sql) or die(mysql_error());
                                            while ($row = mysqli_fetch_array($r)) {
                                                echo "<option value=\"$row[doctdeptname]\"/>";
                                            }
                                            ?>
                                        </datalist>
                                    </div>
                                    <input type="hidden" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="pnum" id="pnum">
                                    <div class="form-group">
                                        <label>Validity Days</label>
                                        <input type="text" class="form-control" required="required" name="valdity" id="valdity" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                    </div>
                                    <div class="form-group">
                                        <label>IP Fee</label>
                                        <input type="text" class="form-control" required="required" name="ip_fee" id="ip_fee" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onfocus="calc1()">
                                    </div>
                                    <div class="form-group">
                                        <label>Insurance Fee</label>
                                        <input type="text" class="form-control" required="required" name="ins_fee" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="ins_fee">
                                    </div>
                                    <input type="hidden" class="form-control" name="wdays" id="wdays">
                                    <input type="hidden" class="form-control" name="etime" id="etime">
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Specialization</label>
                                        <input type="text" class="form-control" name="spec" required="required" id="spec">
                                    </div>
                                    <div class="form-group">
                                        <label>Qualification</label>
                                        <input type="text" class="form-control" required="required" name="dsi" id="dsi">
                                    </div>
                                    <input type="hidden" class="form-control" name="ddt" id="ddt">
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input type="text" class="form-control" name="mnum" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="mnum">
                                    </div>
                                    <input type="hidden" class="form-control" name="doct_type" value="No" id="doct_type">
                                    <div class="form-group">
                                        <label>Visiting Count</label>
                                        <input type="text" class="form-control" required="required" name="visit_count" id="visit_count" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                    </div>
                                    <div class="form-group">
                                        <label>Op Fee</label>
                                        <input type="text" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="op_fee" id="op_fee" onfocus="calc()">
                                    </div>
                                    <input type="hidden" class="form-control" name="stime" id="stime">
                                    <input type="hidden" class="form-control" name="etime" id="etime">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" name="addr" id="addr"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12"><strong>Multiple Departments:</strong></div>
                                <?php  
                                $sql = "SELECT DISTINCT doctdeptname FROM doctdept";
                                $r = mysqli_query($link, $sql) or die(mysql_error());
                                while ($row = mysqli_fetch_array($r)) {
                                    $dept = $row['doctdeptname'];
                                    echo "<div class=\"col-md-3\"><input type=\"checkbox\" name=\"check_dept[]\" value=\"$dept\">$dept</div>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="offset-md-3 col-md-9">
                                    <input type="submit" class="btn btn-info" value="Submit" name="add_doct">
                                    <button type="button" class="btn btn-default" onclick="javascript:location.href='doctor.php'">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include("footer.php"); ?>
<?php
} else {
    session_destroy();
    session_unset();
    header('Location:../../index.php');
}
?>
