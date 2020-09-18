<?php
include_once("head.php");
?>
<style>
    .excelButton .buttons-html5 {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
        box-shadow: none;
        position: absolute;
        margin-top: -61px;
        padding: 3px;
        border: 1px solid transparent;
        padding: .375rem .75rem;
    }
</style>
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
                            <?php if ($_SESSION['ID'] == '1' || $_SESSION['ID'] == '2') { ?>
                                <div class="col-sm-3 form-group"><label>Select Employee</label>
                                    <select class="form-control select2" name="employee" id="employee" style="width: 100%;">
                                        <option value="">Select</option>
                                        <?php $sou = $obj->display('dm_employee', 'status=1 order by name');
                                        while ($sou1 = $sou->fetch_array()) {
                                        ?>
                                            <option value="<?php echo $sou1['id']; ?>" <?php if ($sou1['id'] == $_POST['employee']) {
                                                                                            echo 'selected="selected"';
                                                                                        } ?>><?php echo $sou1['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-2 form-group"><label>Region</label>
                                    <select class="form-control" name="region" id="region">
                                        <option value="">Select</option>
                                        <?php $sou = $obj->display('dm_region', 'status=1 order by name');
                                        while ($sou1 = $sou->fetch_array()) {
                                        ?>
                                            <option value="<?php echo $sou1['id']; ?>" <?php if ($sou1['id'] == $_POST['region']) {
                                                                                            echo 'selected="selected"';
                                                                                        } ?>><?php echo $sou1['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            <?php } ?>
                            <?php if ($_SESSION['ID'] == '3') { ?>
                                <div class="col-sm-3 form-group"><label>Select Employee</label>
                                    <select class="form-control select2" name="employee" id="employee" style="width: 100%;">
                                        <option value="">Select</option>
                                        <?php $sou = $obj->display('dm_employee', 'status=1 and region = "' . $_SESSION['region'] . '" order by name');
                                        while ($sou1 = $sou->fetch_array()) {
                                        ?>
                                            <option value="<?php echo $sou1['id']; ?>" <?php if ($sou1['id'] == $_POST['employee']) {
                                                                                            echo 'selected="selected"';
                                                                                        } ?>><?php echo $sou1['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            <?php } ?>
                            <div class="col-sm-3 form-group">
                                <label>&nbsp;</label><br />
                                <input type="submit" class="btn btn-primary" name="search" value="Search"></div>
                        </div>
                    </form>
                    <?php
                    if ($_POST['region']) {
                        $query .= " and region=" . $_POST['region'] . "";
                    }

                    if ($_POST) {
                        $query .= " and created_at >= '" . date('Y-m-d', strtotime($_POST["sdate"])) . "' and created_at <='" . date('Y-m-d', strtotime($_POST["edate"])) . "'";
                    } else {
                        $query = " and created_at = '" . date('Y-m-d') . "'";
                    }

                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h3 style="margin-bottom: 20px;" class="card-title"></h3>
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
                                        <th>Total Break Hours</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $res = $obj->display("employee_activity", "emp_id=" . ($_POST['employee'] ? $_POST['employee'] : $_SESSION['ID']) . " " . $query . " order by created_at DESC");
                                    // $res = $obj->display("employee_activity", "emp_id=" . $_SESSION['ID'] . " " . $query . " order by created_at DESC", true);
                                    while ($data = $res->fetch_array()) {
                                        if (($data['log_out_time'] == 0)) {
                                            $workHourDiff = 'Missed';
                                        } else {
                                            if (isset($data['log_out_time']) && isset($data['log_in_time'])) {
                                                $workHourDiff = round((strtotime($data['log_out_time']) - strtotime($data['log_in_time'])) / 3600, 1);
                                            } else {
                                                $workHourDiff = 'Missed';
                                            }
                                        }


                                        if (!empty($data['break_out_time'])) {
                                            if (isset($data['break_out_time']) && isset($data['break_in_time'])) {
                                                $time1 = strtotime($data['break_in_time']);
                                                $time2 = strtotime($data['break_out_time']);
                                                $breakDiff = round(abs($time2 - $time1) / 3600, 2);
                                            }
                                        } else {
                                            $breakDiff = 'Missed';
                                        }


                                    ?>
                                        <tr>
                                            <td><?= $data['log_in_time']; ?></td>
                                            <td><?= $data['log_out_time'] == 0 ? '' : $data['log_out_time']; ?></td>
                                            <td><?= $workHourDiff; ?></td>
                                            <td><?= $data['break_in_time']; ?></td>
                                            <td><?= $data['break_out_time']; ?></td>
                                            <td><?= $breakDiff; ?></td>
                                            <!-- <td><?= '' ?></td> -->
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

<!-- Use when datatables is required on page -->
<!-- DataTables -->
<script src="theme/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js "></script>
<?php include_once("foot.php");  ?>
<script>
    $(function() {
        $("#userActivity").DataTable({
            "responsive": true,
            "autoWidth": false,
            "dom": '<"excelButton "B><"row"<"col-md-6"l><"col-md-6"f>>rt<"row"<"col-md-6"i><"col-md-6"p>>',
            buttons: [{
                extend: 'excel',
                title: 'User activity Data'
            }, ]
        });
    });
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