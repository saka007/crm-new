<?php 	
include_once("include/config.php");	
include_once("include/authenticate.php");	

$m1 = $obj->display3("select count(id) mcount  from dm_messages where  reciever='O".$_SESSION['ID']."' and is_read=0");
if ($m1->num_rows > 0) {
	$m = $m1->fetch_array();
	$mcount=$m["mcount"];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/btn-bg.jpg"/>
<!--===============================================================================================-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap-datepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link href="theme/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<!--===============================================================================================-->
	<link href="https://fonts.googleapis.com/css?family=Marck+Script" rel="stylesheet">
<!--===============================================================================================-->	
    <link href="vendor/datatables/css/dataTables.bootstrap4.css" rel="stylesheet">

<link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="theme/package/dist/sweetalert2.all.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.js"></script>

<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
<!--===============================================================================================-->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="css/msg.css" rel="stylesheet" >
	<link rel="stylesheet" type="text/css" href="css/dropzone.css">
<!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.1.0.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
</head>
<body>
		<div class="container-fluid">
		<div class="row mt-2 mb-5">
		<div class="col-7">
				<div class="logo" data-tilt>
					<a href="dashboard.php"><img src="images/logo.png" alt="IMG"></a>
				</div>
			</div>

		<div class="col-5">
		<div class="row">
			<div class="col-sm-3">
				<div class="date">
				<span><?php echo date('d');?></span><?php echo date('M');?>
				</div>
			</div>
			<div class="col-sm-9">
				<div class="dash-navi">
				<div class="row">
					<div class="col-3 pr-0"><div class="pro-img"><img src="uploads/employee/<?php echo $_SESSION['PHOTO'];?>"></div></div>
					<div class="col-9"><div class="pro-name">
						<h3><?php echo $_SESSION['LOG_USER']; ?></h3> 
						<h4><?php $rol=$obj->display('dm_role','id='.$_SESSION['ROLE']); $rol1=$rol->fetch_array(); echo $rol1["name"]?></h4>
						<a href="change_password.php">Change Password</a> <a href="logout.php" style="float:right">Logout</a>
					</div>
					</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		</div>	
		<div class="row">
		<div class="col-sm-2 pr-0">
			<?php 	include_once("include/menu.php");	?>
		</div>				