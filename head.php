<?php
// if($_POST)
// {
//   echo $_POST['message'];die;
// }
include_once("include/config.php");
include_once("include/authenticate.php");
// echo $_SESSION['ID'];
$cl=$obj->display('dm_lead',"id=".$_SESSION['ID']);
$cl1=$cl->fetch_array();

$op=$obj->display('dm_ops_skill_canada',"leadId=".$_SESSION['ID']);
$op1=$op->fetch_array();
$requiredp_docs_client=14;
$requirede_docs_client=15;
// print_r($op1);
$c=$obj->display3('SELECT ((IF(copr IS null, 1,0))+(IF(vphoto IS null, 1,0))+(IF(final_visa_docfb is null, 1,0))+(IF (final_visa_docfull IS null, 1,0))+(IF (mcert_re is null, 1,0))+(IF (bcert IS null, 1,0))+(IF(niddoc IS null, 1,0))+(IF (marraige IS null, 1,0))+(IF (ielts is null,1,0))+(IF (passport IS null, 1,0))+(IF(passport_new is null, 1,0))+(IF(pcc is null, 1,0))+(IF(photo is null, 1,0))+(IF(resume is null, 1,0))) as SUM FROM dm_client_personal WHERE leadid='.$_SESSION["ID"]);
$c1=$c->fetch_array();
$ce=$obj->display3('SELECT ((IF(con_mark_sheet_m IS null, 1,0))+(IF(con_mark_sheet_b IS null, 1,0))+(IF(ind_mark_sheet_m is null, 1,0))+(IF (revised_eca_m IS null, 1,0))+(IF (intermediate is null, 1,0))+(IF (revised_eca_b IS null, 1,0))+(IF(revised_wes_eca_m IS null, 1,0))+(IF (conv_cert_m IS null, 1,0))+(IF (revised_wes_eca_b is null,1,0))+(IF (eca_m IS null, 1,0))+(IF(conv_cert_b is null, 1,0))+(IF(ind_mark_sheet_b is null, 1,0))+(IF(bach_seal_trans_unv is null, 1,0))+(IF(eca_b is null, 1,0))+(IF(ssc is null, 1,0))) as SUM FROM dm_client_edu WHERE leadid='.$_SESSION["ID"]);
$ce1=$ce->fetch_array();
$em=$obj->display('dm_employee',"id=".$cl1['assignTo']);
$em1=$em->fetch_array();
//spouse
$requiredp_docs_spouse=12;
$requirede_docs_spouse=15;

$cs=$obj->display3('SELECT ((IF(copr IS null, 1,0))+(IF(vphoto IS null, 1,0))+(IF(final_visa_docfb is null, 1,0))+(IF (final_visa_docfull IS null, 1,0))+(IF (bcert IS null, 1,0))+(IF(niddoc IS null, 1,0))+(IF (ielts is null,1,0))+(IF (passport IS null, 1,0))+(IF(passport_new is null, 1,0))+(IF(pcc is null, 1,0))+(IF(photo is null, 1,0))+(IF(resume is null, 1,0))) as SUM FROM dm_spouse_personal WHERE leadid='.$_SESSION["ID"]);
if($cs->num_rows){
  $cs1=$cs->fetch_array();
}

$ces=$obj->display3('SELECT ((IF(con_mark_sheet_m IS null, 1,0))+(IF(con_mark_sheet_b IS null, 1,0))+(IF(ind_mark_sheet_m is null, 1,0))+(IF (revised_eca_m IS null, 1,0))+(IF (intermediate is null, 1,0))+(IF (revised_eca_b IS null, 1,0))+(IF(revised_wes_eca_m IS null, 1,0))+(IF (conv_cert_m IS null, 1,0))+(IF (revised_wes_eca_b is null,1,0))+(IF (eca_m IS null, 1,0))+(IF(conv_cert_b is null, 1,0))+(IF(ind_mark_sheet_b is null, 1,0))+(IF(bach_seal_trans_unv is null, 1,0))+(IF(eca_b is null, 1,0))+(IF(ssc is null, 1,0))) as SUM FROM dm_spouse_edu WHERE leadid='.$_SESSION["ID"]);
if($ces->num_rows){
$ces1=$ces->fetch_array();
}
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

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap-datepicker.css">

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

  <link href="vendor/datatables/css/dataTables.bootstrap4.css" rel="stylesheet">

<link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="theme/package/dist/sweetalert2.all.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.js"></script>

<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">

</head>

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
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
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
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
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
      <img src="images/gm.jpg" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
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
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-book-open"></i>
          <span>Employee Report</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-envelope"></i>
          <span>Lead Category <span id="mmcount"></span></span></a>
      </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Lead Management
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
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

  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>