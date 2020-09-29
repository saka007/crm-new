<?php include_once("head.php");

?>
<!-- Use only where datatable is required -->
<!-- DataTables -->
<link rel="stylesheet" href="theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

    <!-- Begin Page Content -->
    <div class="content-wrapper">
    <section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Meetings Report</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
						<li class="breadcrumb-item active">Meetings Report</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	
    <section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<!-- /.card -->
					<div class="card">
					   <div class="card-header">
						 <h4 class="mb-3">Meeting Report (Counselor Wise)</h4>
					    </div>
					   
						<div class="card-body">
				
				<form name="search" action="" method="post">

				<div class="row">

				<div class="col-sm-2 form-group">

				<label >Start Date</label>
					<div class="input-group date" id="sdate" data-target-input="nearest">
						<input type="text" class="form-control datetimepicker-input" name="sdate" data-target="#sdate" value="<?php if ($_POST['sdate']) echo $_POST['sdate'];
																																else  echo date('d-m-Y') ?>" />
						<div class="input-group-append" data-target="#sdate" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="fa fa-calendar"></i></div>
						</div>
					</div>
				</div>
				<div class="col-sm-2 form-group">
				<label >End Date</label>
						<div class="input-group date" id="edate" data-target-input="nearest">
						<input type="text" class="form-control datetimepicker-input" name="edate" data-target="#edate" value="<?php if ($_POST['edate']) echo $_POST['edate'];
																																else  echo date('d-m-Y') ?>" />
						<div class="input-group-append" data-target="#edate" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="fa fa-calendar"></i></div>
						</div>
					</div>

				</div>
				<?php if($_SESSION['TYPE']=="SA"){ ?>
				<div class="col-sm-2 form-group"><label>Region</label>
				<select class="form-control" name="region" id="region" >
					<option value="">Select</option>
					<?php $sou=$obj->display('dm_region','status=1 order by name');
					while($sou1=$sou->fetch_array())
					{
					?>
					<option value="<?php echo $sou1['id'];?>"  <?php if($sou1['id']==$_POST['region']) { echo 'selected="selected"';}?>><?php echo $sou1['name'];?></option>
					<?php } ?>
					</select>
				</div>
				<?php } ?>

				<div class="col-sm-2 form-group"><label>&nbsp;</label><br /><input type="submit" class="btn btn-info" name="search" value="Search" ></div>

				</div>

				</form>

<?php if($_POST) { 
	$query= ' and 1=1';
	if($_POST['region']!="") { 	$query =" and region=".$_POST['region'];}
	?>

	<div id="alert_message"></div>
	<hr />
	<table class="table table-striped table-bordered" id="myTable" style="width:100%">

				<thead>

					<tr>
						<th>Sr no.</th>
						<th>Counselor</th>
						<th>Type</th>
						<th>No. of Appointments Booked</th>
						<th>No. of Appointments Done</th>
						</tr>
						</thead>
						<tbody>
							<?php
							if ($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RM") {
							$result = $obj->display3('SELECT type,counsilorid,SUM(case WHEN booked=1 then 1 else 0 END) as booked,SUM(CASE WHEN done IS NOT NULL THEN 1 ELSE 0 END) as done FROM `appointments` WHERE date BETWEEN "'.date('Y-m-d',strtotime($_POST["sdate"])).'" AND "'.date('Y-m-d',strtotime($_POST["edate"])).'"'.$query.' GROUP BY counsilorid,type');
							}
							else {
							$result = $obj->display3('SELECT type,counsilorid,SUM(case WHEN booked=1 then 1 else 0 END) as booked,SUM(CASE WHEN done IS NOT NULL THEN 1 ELSE 0 END) as done FROM `appointments` WHERE date BETWEEN "'.date('Y-m-d',strtotime($_POST["sdate"])).'" AND "'.date('Y-m-d',strtotime($_POST["edate"])).'" and region='.$_SESSION['REGION'].' GROUP BY counsilorid,type');
							}
							// print_r($result);die;
							if($result->num_rows>0)
							{
								$i=1;
								while($row=$result->fetch_assoc())
								{
									$emp=$obj->display('dm_employee','id='.$row['counsilorid']);$em1=$emp->fetch_assoc();
									// $bra=$obj->display('dm_region','id='.$row['region']);$bra1=$bra->fetch_assoc();
									?>
									<tr>
										<td><?=$i;?></td>
										<td><?=$em1['name'];?></td>
										<td><?=$row['type'];?></td>
										<td><?=$row['booked'];?></td>
										<td><?=$row['done'];?></td>
									</tr>
									<?php
									$i++;
								}
							}
							?>
						</tbody>	
						</table>
						<?php } ?>
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
						
					
			
<?php include_once('foot.php');?>
<script src="theme/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
$(function(){
// $('#sdate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
// $('#edate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true});
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
}); 
</script>
 
<script>
	$(document).ready(function(){
		$('#myTable').DataTable({
			responsive:true,
			//dom:'Bfprt',
			// buttons: [
			// 	{
			// 		extend:'excel',
			// 		footer:true,
			// 		title:'Lead Report',
			// 		messageTop:'Lead Added today'
			// 	}]
		});
		});
</script>			