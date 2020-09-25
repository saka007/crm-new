<?php include_once("head.php");

if (isset($_GET['lead'])) {

	$lead = $obj->display('dm_lead', 'id=' . $_GET['lead']);

	$lead1 = $lead->fetch_array();

	$sou = $obj->display('dm_source', 'id=' . $lead1['market_source']);
	if ($sou->num_rows) {
	 $sou1 = $sou->fetch_array();
	}
	if ($lead1['service_interest'] != "") {
		$ser = $obj->display('dm_service', 'id=' . $lead1["service_interest"]);
		if ($ser->num_rows) {
			$ser1 = $ser->fetch_array();
		}
		
	}
	if ($lead1['country_interest'] != "") {
		$ctr = $obj->display("dm_country_proces", "id=" . $lead1["country_interest"]);
		if ($ctr->num_rows) {
			$ctr1 = $ctr->fetch_array();
		}
	}
}

?>


<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-2">
					<h1>View Lead</h1>
				</div>
				<div class="col-sm-4">
					<a class="btn btn-primary" href="lead_edit.php?lead=<?php echo $_GET['lead']; ?>">
						<i class="fas fa-pencil-alt">
						</i>
						Edit
					</a>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
						<li class="breadcrumb-item active">View Lead</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Assign To: &nbsp;&nbsp;</h3>
						<h3 class="card-title"><?php $ff = $obj->display('dm_employee', 'id=' . $lead1['assignTo']);
												$ff1 = $ff->fetch_array();
												echo $ff1['name']; ?></h3>
					</div>
					<div class="card-body">
						<div class="row">

							<div class="col-sm-4 form-group"><label>First Name</label><br /><?php echo $lead1['fname']; ?></div>

							<div class="col-sm-4 form-group"><label>Middle Name</label><br /><?php echo $lead1['mname']; ?></div>

							<div class="col-sm-4 form-group"><label>Family Name</label><br /><?php echo $lead1['lname']; ?></div>

						</div>

						<div class="row">

							<div class="col-sm-4 form-group"><label>Email</label><br /><?php echo $lead1['email']; ?></div>

							<div class="col-sm-4 form-group"><label>Landline</label><br /><?php echo $lead1['phone']; ?></div>

							<div class="col-sm-4 form-group"><label>Cell No.</label><br /><?php echo $lead1['mobile']; ?></div>

						</div>

						<div class="row">

							<div class="col-sm-4 form-group"><label>Nationality</label><br /><?php echo $lead1['nationality']; ?>

							</div>

							<div class="col-sm-4 form-group"><label>Address</label><br /><?php echo $lead1['address']; ?></div>

							<div class="col-sm-4 form-group"><label>DOB</label><br /><?php echo $lead1['dob']; ?></div>

						</div>

						<div class="row">

							<div class="col-sm-4 form-group"><label>Country Interested</label><br /><?php echo $ctr1['name']; ?></div>

							<div class="col-sm-4 form-group"><label>Service Interested</label><br /><?php echo $ser1['name']; ?></div>

							<div class="col-sm-4 form-group"><label>Marketing Source</label><br /><?php echo $sou1['name']; ?></div>

						</div>

						<div class="row">

							<div class="col-sm-4 form-group"><label>Appointment</label><br /><?php echo $lead1['appointment']; ?></div>

							<div class="col-sm-4 form-group"><label>Follow Up</label><br /><?php echo $lead1['followup']; ?></div>

							<div class="col-sm-4 form-group"><label>Mode of Enquiry</label><br /><?php echo $lead1['enquiry']; ?></div>

						</div>

						<h4> Spouse data</h4>
						<br/>

						<div class="row">

							<div class="col-sm-4 form-group"><label>Spouse Name</label><br /><?php echo $lead1['fnames']; ?></div>

							<div class="col-sm-4 form-group"><label>Spouse Email</label><br /><?php echo $lead1['emails']; ?></div>

							<div class="col-sm-4 form-group"><label>Spouse Contact No</label><br /><?php echo $lead1['phones']; ?></div>

						</div>

						<div class="row">

							<div class="col-sm-4 form-group"><label>Gender</label><br /><?php echo $lead1['gender']; ?></div>
							<div class="col-sm-4 form-group"><label>Convert</label><br /><?php echo $lead1['convet']; ?></div>
						</div>
						<div class="row">
							<div class="col-sm-12 form-group"><label>Remark</label><br />
							<?php
							 $rem = $obj->display('dm_lead_remark', '`lead`=' . $_GET['lead']);
							 if ($rem->num_rows > 0) {
								 while ($rem1 = $rem->fetch_array()) {
									 echo $rem1['remark'] . ' added By ' . $rem1['emp'] . '  -' . date('d/m/Y', strtotime($rem1['date'])) . '<br>';
								 }
							 }
							 else { echo "No Remarks";}
							 ?>
							 </div>
						</div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>

		</div>
	</section>
	<!-- /.content -->
</div>

<?php include_once("foot.php");	?>

<script>
	$(function() {

		$('#dob').datepicker({
			format: 'dd-mm-yyyy',
			autoclose: true
		});

		$('#appointment').datepicker({
			format: 'dd-mm-yyyy',
			autoclose: true
		});

		$('#folowup').datepicker({
			format: 'dd-mm-yyyy',
			autoclose: true
		});

	});
</script>