<?php
// if($_POST)
// {
//   echo $_POST['message'];die;
// }
include_once("include/config.php");
include_once("include/authenticate.php");
// echo $_SESSION['ID'];
if($_SESSION['TYPE']=="SA"){
  $cl = $obj->display3('select count(*) as count from dm_lead where notf=0');
}
else{
  $cl = $obj->display3('select count(*) as count from dm_lead where notf=0 and counsilor='.$_SESSION['ID']);
}
if($cl->num_rows >0 ){
$cl1 = $cl->fetch_array();
}

if($_SESSION['TYPE']=="SA"){
  $cln = $obj->display3('select count(*) as count from dm_lead where paidYet!=0');
}
else{
  $cln = $obj->display3('select count(*) as count from dm_lead where notf=0 and paidYet!=0 and counsilor='.$_SESSION['ID']);
}
if($cln->num_rows >0 ){
$cln1 = $cln->fetch_array();
}
// echo $cl1['count'];

// $op = $obj->display('dm_ops_skill_canada', "leadId=" . $_SESSION['ID']);
// $op1 = $op->fetch_array();
// $requiredp_docs_client = 14;
// $requirede_docs_client = 15;
// print_r($op1);
// $c = $obj->display3('SELECT ((IF(copr IS null, 1,0))+(IF(vphoto IS null, 1,0))+(IF(final_visa_docfb is null, 1,0))+(IF (final_visa_docfull IS null, 1,0))+(IF (mcert_re is null, 1,0))+(IF (bcert IS null, 1,0))+(IF(niddoc IS null, 1,0))+(IF (marraige IS null, 1,0))+(IF (ielts is null,1,0))+(IF (passport IS null, 1,0))+(IF(passport_new is null, 1,0))+(IF(pcc is null, 1,0))+(IF(photo is null, 1,0))+(IF(resume is null, 1,0))) as SUM FROM dm_client_personal WHERE leadid=' . $_SESSION["ID"]);
// $c1 = $c->fetch_array();
// $ce = $obj->display3('SELECT ((IF(con_mark_sheet_m IS null, 1,0))+(IF(con_mark_sheet_b IS null, 1,0))+(IF(ind_mark_sheet_m is null, 1,0))+(IF (revised_eca_m IS null, 1,0))+(IF (intermediate is null, 1,0))+(IF (revised_eca_b IS null, 1,0))+(IF(revised_wes_eca_m IS null, 1,0))+(IF (conv_cert_m IS null, 1,0))+(IF (revised_wes_eca_b is null,1,0))+(IF (eca_m IS null, 1,0))+(IF(conv_cert_b is null, 1,0))+(IF(ind_mark_sheet_b is null, 1,0))+(IF(bach_seal_trans_unv is null, 1,0))+(IF(eca_b is null, 1,0))+(IF(ssc is null, 1,0))) as SUM FROM dm_client_edu WHERE leadid=' . $_SESSION["ID"]);
// $ce1 = $ce->fetch_array();
// $em = $obj->display('dm_employee', "id=" . $cl1['assignTo']);
// $em1 = $em->fetch_array();
//spouse
// $requiredp_docs_spouse = 12;
// $requirede_docs_spouse = 15;

// $cs = $obj->display3('SELECT ((IF(copr IS null, 1,0))+(IF(vphoto IS null, 1,0))+(IF(final_visa_docfb is null, 1,0))+(IF (final_visa_docfull IS null, 1,0))+(IF (bcert IS null, 1,0))+(IF(niddoc IS null, 1,0))+(IF (ielts is null,1,0))+(IF (passport IS null, 1,0))+(IF(passport_new is null, 1,0))+(IF(pcc is null, 1,0))+(IF(photo is null, 1,0))+(IF(resume is null, 1,0))) as SUM FROM dm_spouse_personal WHERE leadid=' . $_SESSION["ID"]);
// if ($cs->num_rows) {
//   $cs1 = $cs->fetch_array();
// }

// $ces = $obj->display3('SELECT ((IF(con_mark_sheet_m IS null, 1,0))+(IF(con_mark_sheet_b IS null, 1,0))+(IF(ind_mark_sheet_m is null, 1,0))+(IF (revised_eca_m IS null, 1,0))+(IF (intermediate is null, 1,0))+(IF (revised_eca_b IS null, 1,0))+(IF(revised_wes_eca_m IS null, 1,0))+(IF (conv_cert_m IS null, 1,0))+(IF (revised_wes_eca_b is null,1,0))+(IF (eca_m IS null, 1,0))+(IF(conv_cert_b is null, 1,0))+(IF(ind_mark_sheet_b is null, 1,0))+(IF(bach_seal_trans_unv is null, 1,0))+(IF(eca_b is null, 1,0))+(IF(ssc is null, 1,0))) as SUM FROM dm_spouse_edu WHERE leadid=' . $_SESSION["ID"]);
// if ($ces->num_rows) {
//   $ces1 = $ces->fetch_array();
// }

$today = date('Y-m-d');
$employee_activity_sql = $obj->display('employee_activity', "emp_id=" . $_SESSION['ID'] . " and log_in_time like '%$today%'");
$employee_activity_sql1 = $obj->display('employee_activity', "emp_id=" . $_SESSION['ID'] . " and log_out_time like '%$today%'");
$loginEntryRecorded = $employee_activity_sql->num_rows;
$logoutEntryRecorded = $employee_activity_sql1->num_rows;
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Client - Dashboard</title>

  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
  <!-- <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap-datepicker.css"> -->

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="theme/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="theme/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="theme/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="theme/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="theme/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="theme/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="theme/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- <link href="vendor/datatables/css/dataTables.bootstrap4.css" rel="stylesheet"> -->
  <script src="theme/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="theme/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet"> -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <!-- <script src="theme/package/dist/sweetalert2.all.js"></script> -->
  <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.js"></script> -->

  <!-- <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet"> -->
  <!-- daterangepicker -->
<script src="theme/plugins/moment/moment.min.js"></script>
<script src="theme/plugins/daterangepicker/daterangepicker.js"></script>

</head>
<style>
  .disable {
    pointer-events: none;
    opacity: 0.6;
  }

  .btn-success,
  .btn-danger {
    margin: 5px
  }

  #disabled-button-wrapper {
    display: inline-block;
  }

  #disabled-button-wrapper .btn[disabled] {
    pointer-events: none;
  }
</style>

<body id="page-top">

  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="dashboard.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>



      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <?php
          if ($loginEntryRecorded) {
            $user_activity = $employee_activity_sql->fetch_array();
          } ?>
        <li class="nav-item" id="timer" style="margin: 5px 5px;">
          <?php echo ($user_activity['break_out_time']) ? $user_activity['break_out_time'] : ''; ?>
        </li>
        <?php
        if ($user_activity['break_in_time'] && !$user_activity['break_out_time']) {
        ?>
          <script>
            var myVar = setInterval(myTimer, 1000);

            function myTimer() {
              var d = new Date();
              document.getElementById("timer").innerHTML = d.toLocaleTimeString();
            }
          </script>
        <?php } else { ?>
          <script>
            var myVar;
          </script>
        <?php } ?>
        <li class="nav-item" id="disabled-button-wrapper" <?php if ($loginEntryRecorded < 1) { ?> data-title="Enabled after Login hour activity is started" <?php } ?>>
          <button id="timerBtn" class="btn btn-primary" type="button" onclick="breakTimerToggle(myVar)" <?php if ($loginEntryRecorded < 1 || $user_activity['break_out_time'] || $logoutEntryRecorded) {
                                                                                                        ?> disabled <?php } ?>>
            <?php echo ($user_activity['break_out_time'] || $user_activity['break_in_time']) ? 'Stop Timer' : 'Start Timer'; ?></button>
        </li>

        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="theme/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="theme/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-power-off"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="logout.php" class="dropdown-item">
              logout
            </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="dashboard.php" class="brand-link">
        <img src="images/gm.jpg" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">GIANT MIGRATION</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="theme/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Admin</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item active">
              <a class="nav-link" href="dashboard.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
            </li>
            <!-- <li class="nav-item active">
              <a class="nav-link" href="#">
                <i class="fas fa-fw fa-book-open"></i>
                <span>Employee Report</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">
                <i class="fas fa-fw fa-envelope"></i>
                <span>Lead Category <span id="mmcount"></span></span></a>
            </li> -->

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Admin Setup
                  <i class="fas fa-angle-left right"></i>
                  <!-- <span class="badge badge-info right">6</span> -->
                </p>
              </a>
              <ul class="nav nav-treeview">
                <!-- <li class="nav-item">
                  <a href="lead_management.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New Lead</p>
                  </a>
                </li> -->
                <li class="nav-item">
              <a class="nav-link" href="region_list.php">
                <i class="fas fa-globe"></i>
                <span>Region Management</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="branch_list.php">
                <i class="fas fa-globe"></i>
                <span>Branch Management</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="department_list.php">
                <i class="fas fa-globe"></i>
                <span>Department Management</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="service_list.php">
                <i class="fas fa-globe"></i>
                <span>Service Management</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="country_list.php">
                <i class="fas fa-globe"></i>
                <span>Country Management</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="enquiry_list.php">
                <i class="fas fa-globe"></i>
                <span>Lead Inquiry Management</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="source_list.php">
                <i class="fas fa-globe"></i>
                <span>Lead Source Management</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="contract_file_list.php">
                <i class="fas fa-globe"></i>
                <span>Manage Agreements</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="role_list.php">
                <i class="fas fa-user"></i>
                <span>Access Hierarchy Management</span></a>
            </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Lead Management
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right"><?=$cl1['count'];?></span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="lead_management.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add New Lead</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="lead_search_management.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Leads</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="book_meetings.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Meetings</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Client Management
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right"><?=$cln1['count'];?></span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="operation_management.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Client Data</p>
                  </a>
                </li>
                 <li class="nav-item">
                  <a href="lead_agree_upload_list.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Agreement Upload</p>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a href="book_meetings.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Meetings</p>
                  </a>
                </li>  -->
              </ul>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="employe_list.php">
                <i class="fas fa-fw fa-users"></i>
                <span>Employee Management</span></a>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Leave request
                  <i class="fas fa-angle-left right"></i>
                  <!-- <span class="badge badge-info right  "><?=$cln1['count'];?></span> -->
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="leave_list.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Leaves</p>
                  </a>
                </li>
                 <!-- <li class="nav-item">
                  <a href="lead_search_management.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p></p>
                  </a>
                </li> -->
                <!-- <li class="nav-item">
                  <a href="book_meetings.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Meetings</p>
                  </a>
                </li>  -->
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Report
                  <i class="fas fa-angle-left right"></i>
                  <!-- <span class="badge badge-info right"><?=$cln1['count'];?></span> -->
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="report_sales.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sales Report</p>
                  </a>
                </li>
                 <!-- <li class="nav-item">
                  <a href="lead_search_management.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p></p>
                  </a>
                </li> -->
                <!-- <li class="nav-item">
                  <a href="book_meetings.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Meetings</p>
                  </a>
                </li>  -->
              </ul>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="user_activity.php">
                <i class="fas fa-fw fa-book-open"></i>
                <span>User Activity</span></a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Extra Features
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a onclick="userActivity('login')" id="loginStart" href="javascript:void(0)" class="<?php echo ($loginEntryRecorded > 0)
                                                                                                        ? 'nav-link disable' : 'nav-link'; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Login Hour Start</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a onclick="userActivity('logout')" id="loginEnd" href="javascript:void(0)" class="<?php echo ($loginEntryRecorded > 0 && $logoutEntryRecorded < 1)
                                                                                                        ? 'nav-link' : 'nav-link disable'; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Loggedoff</p>
                  </a>
                </li>
              </ul>
            </li>

            

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <script>
      $(function() {
        $('#disabled-button-wrapper').tooltip();
      });
      var intervalId;
      var isDisabled = false;
      let break_in_time = '';
      let break_out_time = '';
      let timer = document.getElementById("timer");
      let btn = document.getElementById("timerBtn");
      let log_in_time = false;
      let log_out_time = false;


      function userActivity(action) {
        Swal.fire({
          title: 'Do you want to ' + action,
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes',
          cancelButtonText: 'No, cancel!',
          confirmButtonClass: 'btn btn-success',
          cancelButtonClass: 'btn btn-danger',
          buttonsStyling: false
        }).then(function(result) {
          // alert(result.value);
          if (result.value) {
            if (action === 'login') {
              log_in_time = true;
            } else {
              // alert(btn.disabled);
              if (btn.disabled == false) {
                Swal.fire('Cancelled', 'Your Break timer is running please stop and then log off');
                return false;
              }
              log_in_time = false;
              log_out_time = true;
            }
            callUserActivityAjax();
          } else {
            Swal.fire('Cancelled');
          }
        });
      }


      function breakTimerToggle(afterReload) {
        if (isDisabled) {
          alert('This Button was disabled. No action is perform')
          return false;
        }
        if (confirm("You want to " + btn.innerHTML.trim())) {
          if (btn.innerHTML.trim() == "Start Timer") {
            btn.innerHTML = "Stop Timer";
          } else {
            btn.disabled = true;
            isDisabled = true;
          }

          if (afterReload) {
            intervalId = afterReload;
          }

          if (!intervalId) {
            intervalId = setInterval(timerStart, 1000);
            break_in_time = new Date().toLocaleTimeString();
          } else {
            clearInterval(intervalId);
            intervalId = null;
            break_out_time = document.getElementById("timer").innerHTML;
          }

          callBreakTimerAjax();

        }
      }

      function callBreakTimerAjax() {
        jQuery.ajax({
          url: "<?php echo $base_url; ?>/process/break_time.php",
          type: "POST",
          cache: false,
          dataType: 'json',
          data: '&break_in_time=' + break_in_time + '&break_out_time=' + break_out_time,
          success: function(result) {
            console.log(result);
          },
          error: function(result) {
            console.log(result);
          }
        });
      }

      function callUserActivityAjax() {
        jQuery.ajax({
          url: "<?php echo $base_url; ?>/process/login_activity.php",
          type: "POST",
          cache: false,
          dataType: 'json',
          data: '&log_in_time=' + log_in_time + '&log_out_time=' + log_out_time,
          success: function(result) {
            if (result.status === 'success') {
              if (log_in_time) {
                document.getElementById('loginStart').classList.add('disable');
                document.getElementById('loginEnd').classList.remove('disable');
                btn.disabled = false;
                $('#disabled-button-wrapper').tooltip('disable');
                Swal.fire('Success', 'Logged in Hours');
              } else {
                document.getElementById('loginEnd').classList.add('disable');
                Swal.fire('Success', 'Logged off');
                if (!btn.disabled) {
                  btn.disabled = true;
                  isDisabled = true;
                }
              }

            }
          },
          error: function(result) {
            Swal.fire(result);
          }
        });
      }

      function timerStart() {
        var d = new Date();
        timer.innerHTML = d.toLocaleTimeString();
      }
    </script>