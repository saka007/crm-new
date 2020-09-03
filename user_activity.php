<?php
include_once("head.php");
?>
<!-- Use only where datatable is required -->
<!-- DataTables -->
<link rel="stylesheet" href="theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Activity</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">User Activity</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>




    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <form name="search" action="" method="post">
                        <div class="row">
                            <div class="col-sm-2 form-group">
                                <label>Start Date</label>
                                <div class="input-group date" id="sdate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="sdate" data-target="#sdate" value="<?php if ($_POST['sdate']) echo $_POST['sdate'];
                                                                                                                                            else  echo date('d-m-Y') ?>" />
                                    <div class="input-group-append" data-target="#sdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-2 form-group"><label>End Date</label>
                                <div class="input-group date" id="edate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="edate" data-target="#edate" value="<?php if ($_POST['edate']) echo $_POST['edate'];
                                                                                                                                            else  echo date('d-m-Y') ?>" />
                                    <div class="input-group-append" data-target="#edate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 form-group">
                                <label>&nbsp;</label><br />
                                <input type="submit" class="btn btn-primary" name="search" value="Search"></div>
                        </div>
                    </form>
                    <?php
                    $query = "";
                    if ($_POST) {
                        $query = " and created_at >= '" . date('Y-m-d', strtotime($_POST["sdate"])) . "' and created_at <='" . date('Y-m-d', strtotime($_POST["edate"])) . "'";
                    } ?>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">User Login/ Logoff activities</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="userActivity" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Login Started</th>
                                        <th>Log off</th>
                                        <th>Total Working Hours</th>
                                        <th>Break in Time</th>
                                        <th>Break out Time</th>
                                        <th>Total Break</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $res = $obj->display("employee_activity", "emp_id=" . $_SESSION['ID'] . " " . $query . " order by created_at DESC");
                                    while ($data = $res->fetch_array()) {
                                    ?>
                                        <tr>
                                            <td><?= $data['log_in_time']; ?></td>
                                            <td><?= $data['log_out_time']; ?></td>
                                            <td><?= $data['break_in_time']; ?></td>
                                            <td><?= $data['break_out_time']; ?></td>
                                            <td><?= $data['log_in_time']; ?></td>
                                            <td><?= date('d-m-Y', strtotime($res2['log_in_time'])); ?></td>
                                            <td><?= date('d-m-Y', strtotime($res2['break_in_time'])); ?></td>
                                        </tr>

                                    <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php include_once("foot.php");    ?>

<!-- Use when datatables is required on page -->
<!-- DataTables -->
<script src="theme/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
    $(function() {
        $("#userActivity").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
<script>
    //Date range picker
    $('#sdate').datetimepicker({
        format: 'DD-MM-YYYY',
        allowInputToggle: true,
        // defaultDate: moment()
    });
    $('#edate').datetimepicker({
        format: 'DD-MM-YYYY',
        allowInputToggle: true,
        // defaultDate: moment()
    });
</script>