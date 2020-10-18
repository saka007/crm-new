<?php
include_once("head.php");

// $ie = $obj->display('ielts','id=1');
// if($ie->num_rows > 0){
// $ie1= $ie->fetch_array();
// }

if ($_POST['save'] || $_POST['submit']) {
	$ext = $obj->display('dm_lead', 'email="' . $_POST['email'] . '" or mobile="' . $_POST['mobile'] . '"');
	if ($ext->num_rows == 0) {
		$curr_id = $_SESSION["ID"];

		if($_POST['assign'] == "") {
			$_POST['assign'] = $curr_id;
		}
		
		$emp = $obj->display('dm_employee', 'id=' . $_POST['assign']);
		if ($emp->num_rows > 0) {
			$emp1 = $emp->fetch_array();
		}

		if ($_POST['dob'] != "") {
			$dob = date('Y-m-d', strtotime($_POST['dob']));
		}
		if ($_POST['appointment'] != "") {
			$appointment = date('Y-m-d', strtotime($_POST['appointment']));
		}

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
			'followup'  =>  date('Y-m-d', strtotime($_POST['followup'])),
			'enquiry'  =>  $_POST['enquiry'],
			'convet'  =>  $_POST['convet'],
			'regdate'  =>  date('Y-m-d'),
			'assignTo'  =>  $_POST['assign'],
			'type'  =>  $_POST['type'],
			'branch'  =>  $emp1['branch'],
			'region'  =>  $emp1['region'],
			'Counsilor'  =>  $_POST['assign'],
			'last_updated' => date('d-m-Y h-i-sa'),
			'lead_category' => $_POST['lead_category'],
			'relative' => $_POST['relative'],
			'mstatus' => $_POST['mstatus'],
			'fnames' => $_POST['fnames'],
			'emails' => $_POST['emails'],
			'phones' => $_POST['phones'],
			'mobiles' => $_POST['mobiles'],
			'sedu' => $_POST['sedu'],
			'kids' => $_POST['kids'],
			'sexp' => $_POST['sexp']
		);
		$odr = $obj->insert('dm_lead', $data);

		if ($_POST['mdate'] != "") {
			$data = array(
				'leadid' => $_POST['id'],
				'date' => date('Y-m-d', strtotime($_POST['mdate'])),
				'counsilorid' => $_POST['assign'],
				'booked' => 1,
				'type' => $_POST['mtype'],
				'time' => $_POST['time'],
				'region' => $emp1['region']
			);
			// print_r($data);die;
			// echo date('Y-m-d',strtotime($_REQUEST['date']));die;
			$obj->insert('appointments', $data);
		}


		if ($_POST['remark'] != "") {
			$data4 = array (
				'`lead`'  =>  $odr,
				'`date`'  =>  date('Y-m-d'),
				'`remark`'  =>  $_POST['remark'],
				'`emp`' => $_SESSION['LOG_USER']
			);
			$obj->insert('dm_lead_remark', $data4);
			$data5 =  array(
				'notf' => 1
			);
			$obj->update('dm_lead', $data5, 'id='.$odr);
		}

		if ($_POST['appoint'] != "") {
			$data = array(
				'leadid' => $odr,
				'date' => date('Y-m-d', strtotime($_POST['appoint'])),
				'counsilorid' => $_POST['assign'],
				'booked' => 1,
				'type' => $_POST['mtype'],
				'region' => $emp1['region']
			);
			// print_r($data);die;
			// echo date('Y-m-d',strtotime($_REQUEST['date']));die;
			$obj->insert('appointments', $data);
		}

		if ($_POST['save']) {
			header("location:lead_view.php?lead=" . $odr);
		}

		if ($_POST['submit']) {
			//header("location:lead_assesment_form.php?lead=" . $odr);

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
			header("location:lead_assesment_form.php?lead=".$odr."&type=Business");
		} 
		
		if($_POST['service_interest'] == 1 || $_POST['service_interest']==31 || $_POST['service_interest']==32 || $_POST['service_interest']==24 || $_POST['service_interest']==25 || $_POST['service_interest']==26 || $_POST['service_interest']==27 || $_POST['service_interest']==28 || $_POST['service_interest']==29) {
			header("location:lead_assesment_form.php?lead=".$odr."&type=Skill");
		}*/
		}
	} else {
		
		$dup = $ext->fetch_array();
		$assignee = $obj->display('dm_employee', 'id=' . $dup['assignTo']);
		if ($assignee->num_rows > 0) {
			$assignee1 = $assignee->fetch_array();
		}
		header("location:lead_management.php?error=Duplicate entry of email or phone for lead id <strong><i>".$dup['id']." </i></strong> and assigned to <strong><i>".$assignee1['name']."</i></strong><br><a href='/lead_view.php?lead=". $dup['id']."'>View Lead</a>");
	}
}
?>
<!-- Begin Page Content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">

			<!-- Page Heading -->
			<h1 class="h3 mb-4 text-gray-800">Add Lead</h1>

			<div class="row">

				<div class="col-lg-12">

					<!-- document list -->
					<div class="card shadow mb-4">
						<div class="col-sm-10">
							</br>
							<?php if (isset($_GET['error'])) {
								echo '<div class="alert-danger alert">' . $_GET['error'] . '</div>';
							} ?>
							<form action="" method="post" id="leadForm">
								<h4>Lead Required Data</h4>
								<div class="row">
									<div class="col-sm-4 form-group"><label>First Name</label><input type="text" class="form-control" id="fname" name="fname" required></div>
									<div class="col-sm-4 form-group"><label>Middle Name</label><input type="text" class="form-control" id="mname" name="mname"></div>
									<div class="col-sm-4 form-group"><label>Family Name</label><input type="text" class="form-control" id="lname" name="lname"></div>
								</div>
								<div class="row">
									<div class="col-sm-4 form-group"><label>Email</label><input type="text" class="form-control" id="email" name="email" required></div>
									<div class="col-sm-4 form-group"><label>Contact No</label><input type="text" class="form-control" id="mobile" name="mobile" required></div>
									<div class="col-sm-4 form-group"><label>Alternate No.</label><input type="text" class="form-control" id="phone" name="phone" maxlength="12"></div>
								</div>
								<div class="row">
									<div class="col-sm-4 form-group"><label>Nationality</label><select class="form-control" name="nationality">
											<option value="">Select</option>
											<?php $con = $obj->display('dm_countries', '1=1 order by name');
											while ($con1 = $con->fetch_array()) {
											?>
												<option value="<?php echo $con1['name']; ?>"><?php echo $con1['name']; ?></option>
											<?php } ?>


										</select>
									</div>
									<div class="col-sm-8 form-group"><label>Address</label><input type="text" class="form-control" id="address" name="address"></div>

								</div>
								<div class="row">
									<div class="col-sm-4 form-group">
										<label>DOB</label>
										<div class="input-group date" id="dob" data-target-input="nearest">
											<input type="text" class="form-control datetimepicker-input" name="dob" data-target="#dob" value="<?php if ($_POST['dob']) echo $_POST['dob'];
																																				else  echo date('d-m-Y') ?>" />
											<div class="input-group-append" data-target="#dob" data-toggle="datetimepicker">
												<div class="input-group-text"><i class="fa fa-calendar"></i></div>
											</div>
										</div>
									</div>
									<div class="col-sm-4 form-group"><label>Gender</label>
										<select name="gender" class="form-control">
											<option value="">Select</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
									</div>
									<div class="col-sm-4 form-group"><label>Country</label>
										<select class="form-control select2" name="country_interest">
											<option value="">Select</option>
											<?php $cnt = $obj->display('dm_country_proces', 'status=1 order by name');
											while ($cnt1 = $cnt->fetch_array()) {
											?>
												<option value="<?php echo $cnt1['id']; ?>"><?php echo $cnt1['name']; ?></option>
											<?php } ?>
										</select>

									</div>



								</div>
								<div class="row">

									<div class="col-sm-4 form-group"><label>Program Interested</label>
										<select class="form-control select2" name="service_interest">
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
											<option value="Uncle">Uncle</option>
											<option value="Aunty">Aunty</option>
											<option value="Sibling">Sibling</option>
											<option value="not_applicable">Not applicable</option>
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
										<select class="form-control" name="market_source" >
											<option value="">Select</option>
											<?php $sou = $obj->display('dm_source', 'status=1 order by name');
											while ($sou1 = $sou->fetch_array()) {
											?>
												<option value="<?php echo $sou1['id']; ?>"><?php echo $sou1['name']; ?></option>
											<?php } ?>

										</select>

									</div>

									<div class="col-sm-4 form-group"><label>Marital Status</label>
										<select class="form-control" name="mstatus" onchange="showDiv('hidden_div', this)">
											<option value="">Select</option>
											<option value="1">Yes</option>
											<option value="0">No</option>
										</select>

									</div>



								</div>


								<div id="hidden_div">
									<h4> Spouse data</h4>
									<div class="row">
										<div class="col-sm-4 form-group"><label>Spouse Name</label><input type="text" class="form-control" id="fnames" name="fnames"></div>
										<div class="col-sm-4 form-group"><label>Spouse Email</label><input type="text" class="form-control" id="emails" name="emails"></div>
										<div class="col-sm-4 form-group"><label>Spouse Contact No</label><input type="text" class="form-control" id="phones" name="phones"></div>
									</div>

									<div class="row">
										<div class="col-sm-4 form-group">
											<label>Spouse DOB</label>
											<div class="input-group date" id="mobiles" data-target-input="nearest">
												<input type="text" class="form-control datetimepicker-input" name="mobiles" data-target="#mobiles" value="<?php if ($_POST['mobiles']) echo $_POST['dob'];
																																							else  echo date('d-m-Y') ?>" />
												<div class="input-group-append" data-target="#mobiles" data-toggle="datetimepicker">
													<div class="input-group-text"><i class="fa fa-calendar"></i></div>
												</div>
											</div>
										</div>
										<!-- <div class="col-sm-4 form-group"><label >Spouse DOB</label><input type="text" class="form-control" id="mobiles" name="mobiles" maxlength="12"></div> -->
										<div class="col-sm-4 form-group"><label>Spouse Education</label><input type="text" class="form-control" id="sedu" name="sedu"></div>
										<div class="col-sm-4 form-group"><label>Total Kids</label><input type="text" class="form-control" id="kids" name="kids"></div>
									</div>
									<div class="row">
										<div class="col-sm-4 form-group"><label>Spouse Experience</label><input type="text" class="form-control" id="sexp" name="sexp"></div>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-6">
										<h4 class="mb-3">Book Meeting</h4>
									</div>

								</div>

								<div class="row">

								<div class="col-sm-4 form-group"><label>Meeting Date</label>
									<div class="input-group date" id="mdate" data-target-input="nearest">
										<input type="text" class="form-control datetimepicker-input" name="mdate" data-target="#mdate" />
										<div class="input-group-append" data-target="#mdate" data-toggle="datetimepicker">
											<div class="input-group-text"><i class="fa fa-calendar"></i></div>
										</div>
									</div>
								</div>

								<div class="col-sm-4 form-group"><label>Meeting Time</label>
								<input type="time" class="form-control" id="time" name="time" value="">
								</div>

								<div class="col-sm-4 form-group"><label>Meeting Type</label>
									<select class="form-control" id="mtype<?php echo $row['id']; ?>" name="mtype">
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
											<option value="Hot">Hot</option>
											<option value="Cold">Cold</option>
											<option value="Warm">Warm</option>
											<option value="DNQ">DNQ</option>
											<option value="DNQ_AGE">DNQ AGE</option>
											<option value="DNQ_Qualification">DNQ Qualification</option>
											<option value="no_response">No Response</option>
											<option value="not_interested">Not Interested</option>
											<option value="call_back">Call Back</option>
											<option value="invalid_number">Invalid Number</option>
										</select>
									</div>
									<div class="col-sm-4 form-group"><label>Contacted Through</label>
										<select class="form-control" name="enquiry">
											<option value="">Select</option>
											<?php $en = $obj->display('dm_enquiry', 'status=1 order by name');
											while ($en1 = $en->fetch_array()) {
											?>
												<option value="<?php echo $en1['name']; ?>"><?php echo $en1['name']; ?></option>
											<?php } ?>

										</select>

									</div>
									<!-- <div class="col-sm-4 form-group"><label >Follow Up</label><input type="text" class="form-control" id="folowup" name="followup"></div> -->
									<div class="col-sm-4 form-group"><label>Assign Lead </label>
										<select class="form-control" name="assign">
											<option value="">Select</option>
											<?php
											 if ($_SESSION["TYPE"] == "SA" || $_SESSION["TYPE"] == "RM") {
												$emp = $obj->display('dm_employee', 'role!=1 order by name');
												while ($emp1 = $emp->fetch_array()) {
												?>
													<option value="<?php echo $emp1['id']; ?>" ><?php echo $emp1['name']; ?></option>
											<?php }
											}

											else if ($_SESSION["TYPE"] == "BM") {
												$emp = $obj->display('dm_employee', 'region=' . $_SESSION["REGION"] .' order by name');
												while ($emp1 = $emp->fetch_array()) {
												?>
													<option value="<?php echo $emp1['id']; ?>" ><?php echo $emp1['name']; ?></option>
											<?php }
											}
											else {
												$emp = $obj->display('dm_employee', 'id=' . $_SESSION["ID"]);
												$emp1 = $emp->fetch_array();
											?>
												<option value="<?php echo $emp1['id']; ?>" <?php if ($emp1['id'] == $_SESSION['ID']) { ?> selected="selected" <?php } ?>><?php echo $emp1['name']; ?></option>
												<?php
											} 
											
											?>
										</select>
									</div>
								</div>

								<div class="row">



									<div class="col-sm-8 form-group"><label>Remark</label><textarea class="form-control" id="remark" name="remark"></textarea></div>



									<div class="col-sm-12 form-group">
										<input type="submit" name="save" value="SAVE" class="btn btn-info">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="submit" name="submit" value="SUBMIT" class="btn btn-info" style="display:none" id="submit-btn-info">
									</div>
								</div>
							</form>

						</div>

					</div>
				</div>
			</div>

		</div>

	</div>
</div>
</div>
<style type="text/css">
	#hidden_div {
		display: none;
	}
</style>
<?php include_once('foot.php'); ?>
<?php if ($_SESSION["TYPE"] == "SA" || $_SESSION["TYPE"] == "RM") { ?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#leadForm').validate({
			rules: {
				fname: {
					required: true,
				},
				// mname: {
				// 	required: true,
				// },
				email: {
					required: true,
					email: true,
				},
				mobile: {
					required: true,
				},
				// phone: {
				// 	required: true,
				// },
				// nationality: {
				// 	required: true,
				// },
				// gender: {
				// 	required: true,
				// },
				// country_interest: {
				// 	required: true,
				// },
				// service_interest: {
				// 	required: true,
				// },
				// relative: {
				// 	required: true,
				// },
				// market_source: {
				// 	required: true,
				// },
				// lead_category: {
				// 	required: true,
				// },
				// enquiry: {
				// 	required: true,
				// },
				// assign: {
				// 	required: true,
				// },

			},
			messages: {
				fname: "First name is required",
				// mname: "Middle name is required",
				email: "Email name is required",
				mobile: "Contact number is required",
				// phone: "Alternate number is required",
				// nationality: "Nationality is required",
				// gender: "Gender is required",
				// country_interest: "Country is required",
				// service_interest: "Service/Program is required",
				// relative: "Relative is required",
				// market_source: "Source is required",
				// lead_category: "Lead category is required",
				// enquiry: "Inquiry is required",
				//assign: "Assign is required",
			},
			errorElement: 'span',
			errorPlacement: function(error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function(element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			},
			success: function(label, element) {
				if ($(element).hasClass("is-invalid")) {
					$(element).addClass("is-valid");
				}
			},
			// submitHandler: function() {
			// 	var formData = new FormData($('#leadForm')[0]);
			// 	$.ajax({
			// 		//url: 'lead_management.php',
			// 		type: 'POST',
			// 		enctype: 'multipart/form-data',
			// 		dataType: 'json',
			// 		data: formData,
			// 		processData: false,
			// 		contentType: false,
			// 		cache: false,
			// 		success: function(result) {
			// 			if (result.status == 'success') {
			// 				$('.alert-success').css('display', 'block');
			// 				setTimeout(function() {
			// 					$('.alert-success').css('display', 'none');
			// 				}, 1000);
			// 				setTimeout(function() {
			// 					location.reload();
			// 				}, 1000);
			// 			} else {
			// 				$('.alert-danger').css('display', 'block');
			// 				setTimeout(function() {
			// 					$('.alert-danger').css('display', 'none');
			// 				}, 1000);
			// 			}
			// 		},
			// 		error: function(error) {
			// 			console.log(error);
			// 		}
			// 	});
			// }
		});

		$('#dob').datetimepicker({
			format: 'DD-MM-YYYY',
			allowInputToggle: true,
			// defaultDate: moment()
		});

		$('#mobiles').datetimepicker({
			format: 'DD-MM-YYYY',
			allowInputToggle: true,
			// defaultDate: moment()
		});

		$('#mdate').datetimepicker({
			format: 'DD-MM-YYYY',
			allowInputToggle: true,
			// defaultDate: moment()
		});

	});
</script>
<?php } else { ?>

	<script type="text/javascript">
	$(document).ready(function() {
		$('#leadForm').validate({
			rules: {
				fname: {
					required: true,
				},
				// mname: {
				// 	required: true,
				// },
				email: {
					required: true,
					email: true,
				},
				mobile: {
					required: true,
				},
				// phone: {
				// 	required: true,
				// },
				nationality: {
					required: true,
				},
				gender: {
					required: true,
				},
				country_interest: {
					required: true,
				},
				service_interest: {
					required: true,
				},
				relative: {
					required: true,
				},
				market_source: {
					required: true,
				},
				lead_category: {
					required: true,
				},
				enquiry: {
					required: true,
				},
				// assign: {
				// 	required: true,
				// },

			},
			messages: {
				fname: "First name is required",
				// mname: "Middle name is required",
				email: "Email name is required",
				mobile: "Contact number is required",
				phone: "Alternate number is required",
				nationality: "Nationality is required",
				gender: "Gender is required",
				country_interest: "Country is required",
				service_interest: "Service/Program is required",
				relative: "Relative is required",
				market_source: "Source is required",
				lead_category: "Lead category is required",
				enquiry: "Inquiry is required",
				//assign: "Assign is required",
			},
			errorElement: 'span',
			errorPlacement: function(error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function(element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			},
			success: function(label, element) {
				if ($(element).hasClass("is-invalid")) {
					$(element).addClass("is-valid");
				}
			},
			// submitHandler: function() {
			// 	var formData = new FormData($('#leadForm')[0]);
			// 	$.ajax({
			// 		//url: 'lead_management.php',
			// 		type: 'POST',
			// 		enctype: 'multipart/form-data',
			// 		dataType: 'json',
			// 		data: formData,
			// 		processData: false,
			// 		contentType: false,
			// 		cache: false,
			// 		success: function(result) {
			// 			if (result.status == 'success') {
			// 				$('.alert-success').css('display', 'block');
			// 				setTimeout(function() {
			// 					$('.alert-success').css('display', 'none');
			// 				}, 1000);
			// 				setTimeout(function() {
			// 					location.reload();
			// 				}, 1000);
			// 			} else {
			// 				$('.alert-danger').css('display', 'block');
			// 				setTimeout(function() {
			// 					$('.alert-danger').css('display', 'none');
			// 				}, 1000);
			// 			}
			// 		},
			// 		error: function(error) {
			// 			console.log(error);
			// 		}
			// 	});
			// }
		});

		$('#dob').datetimepicker({
			format: 'DD-MM-YYYY',
			allowInputToggle: true,
			// defaultDate: moment()
		});

		$('#mobiles').datetimepicker({
			format: 'DD-MM-YYYY',
			allowInputToggle: true,
			// defaultDate: moment()
		});

		$('#mdate').datetimepicker({
			format: 'DD-MM-YYYY',
			allowInputToggle: true,
			// defaultDate: moment()
		});

	});
</script>

<?php }?>
<script>
	function showDiv(divId, element) {
		document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';
	}
</script>

<!-- End of Main Content -->