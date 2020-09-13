<?php
include_once("head.php");

if ($_POST['save'] || $_POST['submit']) {
	$emp = $obj->display('dm_employee', 'id=' . $_POST['assign']);
	$emp1 = $emp->fetch_array();
	if ($_POST['service_interest']) {
		$data2 = array(
			'service_interest'  =>  $_POST['service_interest']
		);
		$obj->update('dm_lead', $data2, 'id=' . $_POST['id']);
	}

	if ($_POST['dob'] != "") {
		$dob = date('Y-m-d', strtotime($_POST['dob']));
	} else {
		$dob = NULL;
	}
	// if ($_POST['appointment'] != "") {
	// 	$appointment = date('Y-m-d', strtotime($_POST['appointment']));
	// } else {
	// 	$appointment = NULL;
	// }
	$data = array(
		'fname'  =>  $_POST['fname'],
    			'mname'  =>  $_POST['mname'],
    			'lname'  =>  $_POST['lname'],
    			'email'  =>  $_POST['email'],
    			'phone'  =>  $_POST['phone'],
    			'mobile'  =>  $_POST['mobile'],
    			'nationality'  =>  $_POST['nationality'],
    			'address'  =>  $_POST['address'],
    			'dob'  =>  $dob,
    			'gender'  =>  $_POST['gender'],
    			'country_interest'  =>  $_POST['country_interest'],
    			'service_interest'  =>  $_POST['service_interest'],
    			'market_source'  =>  $_POST['market_source'],
    			'appointment'  =>  $appointment,
    			'followup'  =>  date('Y-m-d',strtotime($_POST['followup'])),
    			'enquiry'  =>  $_POST['enquiry'],
    			'convet'  =>  $_POST['convet'],
    			'regdate'  =>  date('Y-m-d'),
    			'assignTo'  =>  $_POST['assign'],
    			'type'  =>  $_POST['type'],
    			'branch'  =>  $emp1['branch'],
    			'region'  =>  $emp1['region'],
    			'Counsilor'  =>  $_POST['assign'],
				'last_updated' => date('d-m-Y h-i-sa'),
				'lead_category' =>$_POST['lead_category'],
				'relative' => $_POST['relative'],
				'mstatus' => $_POST['mstatus'],
				'fnames' => $_POST['fnames'],
				'emails'=> $_POST['emails'],
				'phones'=> $_POST['phones'],
				'mobiles'=> $_POST['mobiles'],
				'sedu'=> $_POST['sedu'],
				'kids'=> $_POST['kids'],
				'sexp' => $_POST['sexp']
	);
	$obj->update('dm_lead', $data, 'id=' . $_POST['id']);

	if ($_SESSION['TYPE'] == "SA") {
		$data5 = array(
			'Counsilor' => $_POST['assign'],
			'assignTo' => $_POST['assign']
		);
		$obj->update('dm_lead', $data5, 'id=' . $_POST['id']);
	}

	if ($_POST['remark'] != "") {
		$data = array(
			'notf'  =>  1
		);
		$obj->update('dm_lead', $data, 'id=' . $_POST['id']);
		$data4 = array(
			'lead'  =>  $_POST['id'],
			'date'  =>  date('Y-m-d'),
			'remark'  =>  $_POST['remark'],
			'emp' => $_SESSION['ID']
		);
		$obj->insert('dm_lead_remark', $data4);
	}

	if ($_POST['appoint'] != "") {
		$data = array(
			'leadid' => $_POST['id'],
			'date' => date('Y-m-d', strtotime($_POST['appoint'])),
			'counsilorid' => $_POST['assign'],
			'booked' => 1,
			'type' =>$_POST['mtype'],
			'region' => $emp1['region']
		);
		// print_r($data);die;
		// echo date('Y-m-d',strtotime($_REQUEST['date']));die;
		$obj->insert('appointments', $data);
	}

	if ($_POST['save']) {
		header("location:lead_view.php?lead=" . $_POST['id']);
	}
	if ($_POST['submit']) {
		/*if($_POST['service_interest'] == 5) {
			header("location:lead_assesment_form.php?lead=".$odr."&type=Student");
		} 
		if($_POST['service_interest'] == 4 || $_POST['service_interest']==21 || $_POST['service_interest']==23 || $_POST['service_interest']==22 || $_POST['service_interest']==19 || $_POST['service_interest']==6 || $_POST['service_interest']==7 || $_POST['service_interest']==33 || $_POST['service_interest']==3) {
			header("location:lead_assesment_form.php?lead=".$odr."&type=Visit");
		} 
		if($_POST['service_interest'] == 3) {
			header("location:lead_assesment_form.php?lead=".$odr."&type=Work");
		} 
		if($_POST['service_interest'] == 2) {
			header("location:lead_assesment_form.php?lead=".$_POST['id']."&type=Business");
		} 
		if($_POST['service_interest'] == 1 || $_POST['service_interest']==31 || $_POST['service_interest']==32 || $_POST['service_interest']==24 || $_POST['service_interest']==25 || $_POST['service_interest']==26 || $_POST['service_interest']==27 || $_POST['service_interest']==28 || $_POST['service_interest']==29) {
			header("location:lead_assesment_form.php?lead=".$_POST['id']."&type=Skill");
		}*/

		// $aset = $obj->display('dm_lead_assesment', 'leadId=' . $_POST["id"]);
		// if ($aset->num_rows == 0) {
			header("location:new_payment.php?lead=" . $_POST["id"]);
		// } else {
			// header("location:lead_assesment_edit.php?id=" . $_POST["id"]);
		// }
	}
}
$lead = $obj->display('dm_lead', 'id=' . $_GET['lead']);
$lead1 = $lead->fetch_array();
$reg = $obj->display('dm_region', 'id=' . $lead1['region']);
$reg1 = $reg->fetch_array();
?>
<!-- Begin Page Content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Edit Lead</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
						<li class="breadcrumb-item active">Edit Lead</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>



	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<?php if (isset($_GET['error'])) {
							echo '<div class="alert-danger alert">' . $_GET['error'] . '</div>';
						} ?>
						<form action="" method="post" id="leadForm">
							<input type="hidden" name="id" value="<?php echo $_GET['lead']; ?>" />
							<h4>Lead Required Data</h4>
							<div class="row">
								<div class="col-sm-4 form-group"><label>First Name</label><input type="text" class="form-control" id="fname" name="fname" value="<?php echo $lead1['fname']; ?>" required></div>
								<div class="col-sm-4 form-group"><label>Middle Name</label><input type="text" class="form-control" id="mname" name="mname" value="<?php echo $lead1['mname']; ?>"></div>
								<div class="col-sm-4 form-group"><label>Family Name</label><input type="text" class="form-control" id="lname" name="lname" value="<?php echo $lead1['lname']; ?>" required></div>
							</div>
							<div class="row">
								<div class="col-sm-4 form-group"><label>Email</label><input type="text" class="form-control" id="email" name="email" value="<?php echo $lead1['email']; ?>" required></div>
								<div class="col-sm-4 form-group"><label>Contact No</label><input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $lead1['mobile']; ?>"  required></div>
								<div class="col-sm-4 form-group"><label>Alternate No.</label><input type="text" class="form-control" id="phone" name="phone" maxlength="12" value="<?php echo $lead1['phone']; ?>"></div>
							</div>
							<div class="row">
								<div class="col-sm-4 form-group"><label>Nationality</label><select class="form-control" name="nationality">
										<option value="">Select</option>
										<?php $con = $obj->display('dm_countries', '1=1 order by name');
										while ($con1 = $con->fetch_array()) {
										?>
											<option value="<?php echo $con1['name']; ?>" <?php if ($con1['name'] == $lead1['nationality']) {
																								echo 'selected="selected"';
																							} ?>><?php echo $con1['name']; ?></option>
										<?php } ?>


									</select>
								</div>
								<div class="col-sm-8 form-group"><label>Address</label><input type="text" class="form-control" id="address" name="address" value="<?php echo $lead1['address']; ?>"></div>

							</div>
							<div class="row">
								<div class="col-sm-4 form-group"><label>DOB</label><div class="input-group date" id="dob" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="dob" data-target="#dob" value="<?php echo $lead1['dob'];?>" />
                                    <div class="input-group-append" data-target="#dob" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div></div>
								<div class="col-sm-4 form-group"><label>Gender</label>
									<select name="gender" class="form-control">
										<option value="Male" <?php if ($lead1['gender'] == "Male") {
																	echo 'selected="selected"';
																} ?>>Male</option>
										<option value="Female" <?php if ($lead1['gender'] == "Female") {
																	echo 'selected="selected"';
																} ?>>Female</option>
									</select>
								</div>
								<div class="col-sm-4 form-group"><label>Country</label>
									<select class="form-control" name="country_interest">
										<option value="">Select</option>
										<?php $cnt = $obj->display('dm_country_proces', 'status=1 order by name');
										while ($cnt1 = $cnt->fetch_array()) {
										?>
											<option value="<?php echo $cnt1['id']; ?>" <?php if ($cnt1['id'] == $lead1['country_interest']) {
																							echo 'selected="selected"';
																						} ?>><?php echo $cnt1['name']; ?></option>
										<?php } ?>
									</select>

								</div>



							</div>
							<div class="row">

								<div class="col-sm-4 form-group"><label >Program Interested</label>
<select class="form-control" name="service_interest">
	<option value="">Select</option>
	<?php $ser = $obj->display('dm_service', 'status=1 order by name');
	 while ($ser1 = $ser->fetch_array()) {
	?>
	<option value="<?php echo $ser1['id']; ?>"><?php echo $ser1['name']; ?></option>
	<?php } ?>
</select>
</div>

								<div class="col-sm-4 form-group"><label>Relative</label>
									<select class="form-control" name="relative">
										<option value="">Select</option>
										<option value="Uncle" <?php if ($lead1['relative']=="Uncle") {
																							echo 'selected="selected"';
																						} ?>>Uncle</option>
										<option value="Aunty" <?php if ($lead1['relative']=="Aunty") {
																							echo 'selected="selected"';
																						} ?>>Aunty</option>
										<option value="Sibling" <?php if ($lead1['relative']=="Sibling") {
																							echo 'selected="selected"';
																						} ?>>Sibling</option>
										<option value="not_applicable" <?php if ($lead1['relative']=="not_applicable") {
																							echo 'selected="selected"';
																						} ?>>Not applicable</option>
									</select>
								</div>

								<!-- <div class="col-sm-4 form-group"><label >Program Type</label>
<select class="form-control" name="type">
	<option value="">Select</option>
	<option value="Business">Business</option>
	<option value="Skill">Skill</option>
	<option value="Student">Student</option>
	<option value="Visit">Visit</option>
	<option value="Work">Work</option>
	
	</select>
	
	</div> -->

								<div class="col-sm-4 form-group"><label>Source</label>
									<select class="form-control" name="market_source" required>
										<option value="">Select</option>
										<?php $sou = $obj->display('dm_source', 'status=1 order by name');
										while ($sou1 = $sou->fetch_array()) {
										?>
											<option value="<?php echo $sou1['id']; ?>" <?php if ($sou1['id'] == $lead1['market_source']) {
																							echo 'selected="selected"';
																						} ?>><?php echo $sou1['name']; ?></option>
										<?php } ?>

									</select>

								</div>

								<div class="col-sm-4 form-group"><label>Marital Status</label>
									<select class="form-control" name="mstatus" onchange="showDiv('hidden_div', this)">
										<option value="">Select</option>
										<option value="1" <?php if ($lead1['mstatus']=="1") {
																							echo 'selected="selected"';
																						} ?>>Yes</option>
										<option value="0" <?php if ($lead1['mstatus']=="0") {
																							echo 'selected="selected"';
																						} ?>>No</option>
									</select>

								</div>



							</div>


							<div id="hidden_div">
								<h4> Spouse data</h4>
								<div class="row">
									<div class="col-sm-4 form-group"><label>Spouse Name</label><input type="text" class="form-control" id="fnames" name="fnames" value="<?php echo $lead1['fnames']; ?>"></div>
									<div class="col-sm-4 form-group"><label>Spouse Email</label><input type="text" class="form-control" id="emails" name="emails" value="<?php echo $lead1['emails']; ?>"></div>
									<div class="col-sm-4 form-group"><label>Spouse Contact No</label><input type="text" class="form-control" id="phones" name="phones" value="<?php echo $lead1['phones']; ?>"></div>
								</div>

								<div class="row">
									<div class="col-sm-4 form-group"><label>Spouse DOB</label><input type="text" class="form-control" id="mobiles" name="mobiles" maxlength="12" value="<?php echo $lead1['mobiles']; ?>"></div>
									<div class="col-sm-4 form-group"><label>Spouse Education</label><input type="text" class="form-control" id="sedu" name="sedu" value="<?php echo $lead1['sedu']; ?>"></div>
									<div class="col-sm-4 form-group"><label>Total Kids</label><input type="text" class="form-control" id="kids" name="kids" value="<?php echo $lead1['kids']; ?>"></div>
								</div>
								<div class="row">
									<div class="col-sm-4 form-group"><label>Spouse Experience</label><input type="text" class="form-control" id="sexp" name="sexp" value="<?php echo $lead1['sexp']; ?>"></div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									<h4 class="mb-3">Book Meeting</h4>
								</div>

							</div>

<div class="row">

<div class="col-sm-4 form-group"><label >Meeting Date</label>
<div class="input-group date" id="mdate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="mdate" data-target="#mdate"  />
                                    <div class="input-group-append" data-target="#mdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
</div>

<div class="col-sm-4 form-group"><label >Meeting Type</label>
		  <select class="form-control" id="mtype<?php echo $row['id'];?>" name="mtype" >
	<option value="">Select</option>
	<option value="zoom">Zoom</option>
	<option value="in_office">In office</option>
	<option value="walk_in">Walk In</option>
	</select>
      </div>
</div>

							<div class="row">
								<div class="col-sm-6">
									<h4 class="mb-3">Lead Source and Assignments</h4>
								</div>

							</div>

							<div class="row">
								<div class="col-sm-4 form-group"><label>Lead Status</label>
									<select class="form-control" name="lead_category" id="lead_category">
										<option value="">Select</option>
										<option value="Hot" <?php if ($lead1['lead_category']=="Hot") {
																							echo 'selected="selected"';
																						} ?>>Hot</option>
										<option value="Cold" <?php if ($lead1['lead_category']=="Cold") {
																							echo 'selected="selected"';
																						} ?>>Cold</option>
										<option value="Warm" <?php if ($lead1['lead_category']=="Warm") {
																							echo 'selected="selected"';
																						} ?>>Warm</option>
										<option value="DNQ" <?php if ($lead1['lead_category']=="DNQ") {
																							echo 'selected="selected"';
																						} ?>>DNQ</option>
									</select>

								</div>
								<div class="col-sm-4 form-group"><label>Lead Enquiry Source</label>
									<select class="form-control" name="enquiry" required>
										<option value="">Select</option>
										<?php $en = $obj->display('dm_enquiry', 'status=1 order by name');
										while ($en1 = $en->fetch_array()) {
										?>
											<option value="<?php echo $en1['name']; ?>" <?php if ($lead1['enquiry'] == $en1['name']) {
																							echo 'selected="selected"';
																						} ?>><?php echo $en1['name']; ?></option>
										<?php } ?>

									</select>

								</div>
								<!-- <div class="col-sm-4 form-group"><label >Follow Up</label><input type="text" class="form-control" id="folowup" name="followup"></div> -->
								<div class="col-sm-4 form-group"><label>Assign Lead </label>
									<select class="form-control" required name="assign">
										<option value="">Select</option>
										<!-- <option value="Suhail" selected>Suhail</option> -->
										<?php
										if($_SESSION["TYPE"]=="IC" || $_SESSION["TYPE"]=="SIC" || $_SESSION["TYPE"]=="MC" || $_SESSION["TYPE"]=="BM" || $_SESSION["TYPE"]=="ABM" || $_SESSION["TYPE"]=="RM" || $_SESSION["TYPE"]=="AM" || $_SESSION["TYPE"]=="CPO" || $_SESSION["TYPE"]=="SCPO" || $_SESSION["TYPE"]=="CPM" || $_SESSION["TYPE"]=="FMP" || $_SESSION["TYPE"]=="DGM" || $_SESSION["TYPE"]=="OM" || $_SESSION["TYPE"]=="PDC" || $_SESSION["TYPE"]=="MBI" || $_SESSION["TYPE"]=="HR" || $_SESSION["TYPE"]=="PDC" || $_SESSION["TYPE"]=="TC" || $_SESSION["TYPE"]=="OC" || $_SESSION["TYPE"]=="RMO" || $_SESSION["TYPE"]=="RMSM" || $_SESSION["TYPE"]=="AOM")
{
$emp=$obj->display('dm_employee','id='.$_SESSION["ID"]);
$emp1=$emp->fetch_array();
?>
	<option value="<?php echo $emp1['id'];?>" <?php if($emp1['id']==$_SESSION['ID']) {?> selected="selected" <?php } ?>><?php echo $emp1['name'];?></option>
<?php
}
else if($_SESSION["TYPE"]=="SA" || $_SESSION["TYPE"]=="RT")
{
$emp=$obj->display('dm_employee','role=4 || role=10 || role=31 || role=3 || role=2 || role=7 || role=20 || role=8 || role=14 || role=24 || role=26 || role=27 || role=5 || role=11 || role=13 || role=15 || role=18 || role=23 || role=25 || role=28 || role=29 order by name');
while($emp1=$emp->fetch_array())
{
?>
	<option value="<?php echo $emp1['id'];?>" <?php if($emp1['id']==$_SESSION['ID']) {?> selected="selected" <?php } ?>><?php echo $emp1['name'];?></option>
	<?php }
}

										?>
									</select>
								</div>
							</div>

							<div class="row">



								<div class="col-sm-8 form-group"><label>Remark</label><textarea class="form-control" id="remark" name="remark" value="<?php echo $lead1['remark']; ?>"></textarea></div>



								<div class="col-sm-12 form-group">
									<input type="submit" name="save" value="SAVE" class="btn btn-info">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="submit" name="submit" value="Go to Payment" class="btn btn-info" id="submit-btn-info">
								</div>
							</div>
						</form>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>

		</div>
	</section>
	<!-- /.content -->
</div>
<?php if ($lead1['mstatus']!=1) { ?>
<style type="text/css">
	#hidden_div {
		display: none;
	}
</style>
<?php } ?>
<?php include_once('foot.php'); ?>

<script type="text/javascript">
	function showDiv(divId, element) {
		document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';
	}
	$('#dob').datetimepicker({
        format: 'DD-MM-YYYY',
        allowInputToggle: true,
        // defaultDate: moment()
    });
	$('#mdate').datetimepicker({
        format: 'DD-MM-YYYY',
        allowInputToggle: true,
        // defaultDate: moment()
    });
</script>

<!-- End of Main Content -->
