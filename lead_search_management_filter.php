<?php include_once("head.php");

if ($_SESSION['TYPE'] == "SA" || $_SESSION['TYPE'] == "RM") {
	$totl = $obj->display3('select count(*) as count from dm_lead');
	$totl1 = $totl->fetch_array();
} else if ($_SESSION['TYPE'] == "BM") {
	// echo "sas";
	$totl = $obj->display3('select count(*) as count from dm_lead WHERE region=' . $_SESSION["REGION"]);
	$totl1 = $totl->fetch_array();
} else {
	// echo "sas";
	$totl = $obj->display3('select count(*) as count from dm_lead WHERE counsilor=' . $_SESSION["ID"]);
	$totl1 = $totl->fetch_array();
}
if ($_SESSION['TYPE'] == "SA" || $_SESSION['TYPE'] == "RM") {
	$toth = $obj->display3('select count(*) as count from dm_lead where lead_category="Hot"');
	$toth1 = $toth->fetch_array();
} else if ($_SESSION['TYPE'] == "BM") {
	// echo "sas";
	$toth = $obj->display3('select count(*) as count from dm_lead WHERE lead_category="Hot" and region=' . $_SESSION["REGION"]);
	$toth1 = $totl->fetch_array();
} else {
	$toth = $obj->display3('select count(*) as count from dm_lead where lead_category="Hot" and counsilor=' . $_SESSION["ID"]);
	$toth1 = $toth->fetch_array();
}

if ($_SESSION['TYPE'] == "SA" || $_SESSION['TYPE'] == "RM") {
	$totw = $obj->display3('select count(*) as count from dm_lead where lead_category="Warm"');
	$totw1 = $totw->fetch_array();
} else if ($_SESSION['TYPE'] == "BM") {
	// echo "sas";
	$totw = $obj->display3('select count(*) as count from dm_lead WHERE lead_category="Warm" and region=' . $_SESSION["REGION"]);
	$totw1 = $totl->fetch_array();
} else {
	$totw = $obj->display3('select count(*) as count from dm_lead where lead_category="Warm" and counsilor=' . $_SESSION["ID"]);
	$totw1 = $totw->fetch_array();
}
if ($_SESSION['TYPE'] == "SA" || $_SESSION['TYPE'] == "RM") {
	$totc = $obj->display3('select count(*) as count from dm_lead where lead_category="Cold"');
	$totc1 = $totc->fetch_array();
} else if ($_SESSION['TYPE'] == "BM") {
	// echo "sas";
	$totc = $obj->display3('select count(*) as count from dm_lead WHERE lead_category="Cold" and region=' . $_SESSION["REGION"]);
	$totc1 = $totc->fetch_array();
} else {
	$totc = $obj->display3('select count(*) as count from dm_lead where lead_category="Cold" and counsilor=' . $_SESSION["ID"]);
	$totc1 = $totc->fetch_array();
}
if ($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RM"){
	$totcold=$obj->display3('select count(*) as count from dm_lead where lead_category!="Hot" and lead_category!="Warm" and lead_category!="Cold" ');
  $totcold1 = $totcold->fetch_array();
  }
  else if ($_SESSION['TYPE'] == "BM") {
	// echo "sas";
	$totcold=$obj->display3('select count(*) as count from dm_lead where region='.$_SESSION['REGION'].' and lead_category!="Hot" and lead_category!="Warm" and lead_category!="Cold" ');
  $totcold1 = $totcold->fetch_array();
}
  else{
  $totcold= $obj->display3('select count(*) as count from dm_lead where lead_category!="Hot" and lead_category!="Warm" and lead_category!="Cold" and counsilor='.$_SESSION["ID"]);
  $totcold1 = $totcold->fetch_array();
  }

// $data = array(
//    			'notf'  =>  1
// 			);
// 	$obj->update('dm_lead',$data,'assignTo='.$_SESSION['ID'].' and notf=0');

?>

<link rel="stylesheet" href="theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<!-- Begin Page Content -->
<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Lead Management</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
						<li class="breadcrumb-item active">Lead Management</li>
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
							<div class="row">
								<div class="col-md-2 col-xs-6 border-right">
									<h3 class="bold no-mtop"><?= $totl1['count']; ?></h3>
									<p style="color:#989898" class="font-medium no-mbot">
										Total Leads </p>
								</div>
								<div class="col-md-2 col-xs-6 border-right">
									<h3 class="bold no-mtop"><?= $cl1['count']; ?></h3>
									<p style="color:#989898" class="font-medium no-mbot">
										New Leads </p>
								</div>
								<div class="col-md-2 col-xs-6 border-right">
									<!-- <h3 class="bold no-mtop"><?= $toth1['count']; ?></h3> -->
									<h3 class="bold no-mtop"><?= $toth1['count']; ?></h3>
									<p style="color:#03A9F4" class="font-medium no-mbot">
										Hot Leads </p>
								</div>
								<div class="col-md-2 col-xs-6 border-right">
									<!-- <h3 class="bold no-mtop"><?= $toth1['count']; ?></h3> -->
									<h3 class="bold no-mtop"><?= $totw1['count']; ?></h3>
									<p style="color:#03A9F4" class="font-medium no-mbot">
										Warm Leads </p>
								</div>
								<div class="col-md-2 col-xs-6 border-right">
									<h3 class="bold no-mtop"><?= $totc1['count']; ?></h3>
									<p style="color:#2d2d2d" class="font-medium no-mbot">
										Cold Leads </p>
								</div>
								<div class="col-md-2 col-xs-6 border-right">
							<h3 class="bold no-mtop"><?=$totcold1['count'];?></h3>
							<p style="color:#2d2d2d" class="font-medium no-mbot">
								Other Leads     </p>
							</div>
							
							</div>

							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									
								</div>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body" style="width: 100%;">
							<?php
							if ($_SESSION['TYPE'] == "SA" || $_SESSION['TYPE'] == "RM") {
                                $query = "";
							}
							else if ($_SESSION['TYPE'] == "BM") {
                                 $query .= " and region=" . $_SESSION['REGION'];
							}
							else {
								$query = " and assignTo=" . $_SESSION['ID'];
							}
							// if ($_POST) {

							// 	$query .= " and paidYet=0";
							// 	if ($_POST['find'] == "") {
							// 		$query .= " and regdate between '" . date('Y-m-d', strtotime($_POST["sdate"])) . "' and '" . date('Y-m-d', strtotime($_POST["edate"])) . "'";
							// 	}
							// 	if ($_POST['market_source'] != "") {
							// 		$query .= " and market_source='" . $_POST['market_source'] . "'";
							// 	}
							// 	if ($_POST['typeofl'] != "") {
							// 		$query .= " and lead_category='" . $_POST['typeofl'] . "'";
							// 	}
							// 	if ($_POST['enquiry'] != "") {
							// 		$query .= " and enquiry='" . $_POST['enquiry'] . "'";
							// 	}
							// 	if ($_POST['country_interest'] != "") {
							// 		$query .= " and country_interest='" . $_POST['country_interest'] . "'";
							// 	}
							// 	if ($_POST['service_interest'] != "") {
							// 		$query .= " and service_interest='" . $_POST['service_interest'] . "'";
							// 	}
							// 	if ($_POST['convet'] != "") {
							// 		$query .= " and convet='" . $_POST['convet'] . "'";
							// 	}
							// 	if ($_POST['counsilor'] != "") {
							// 		$query .= " and counsilor='" . $_POST['counsilor'] . "'";
							// 	}
							// 	if ($_POST['find'] != "") {
							// 		if (is_numeric($_POST['find'])) {
							// 			$query .= " and mobile like '%" . $_POST['find'] . "%'";
							// 		} else {
							// 			$query .= " and ( email like '%" . $_POST['find'] . "%' or fname like '%" . $_POST['find'] . "%')";
							// 		}
							// 	}
							//} else {
								$query .= " and paidYet=0";
								// print_r($query);die;
							//}
							// print_r($_SESSION);
							?>

							<table data-last-order-identifier="tasks" class="table table-striped table-bordered" id="dataTables-Table_new">

								<thead>

									<tr>

										<th>No</th>

										<th>Lead ID</th>
										<th>Date</th>

										<th>Name</th>
										<th>Email</th>
										<th>Mobile</th>
										<th>Consultant</th>
										<th>Country</th>

										<!-- <th>Program</th> -->
										<th>Source</th>
										<th>Mode</th>
										<!-- <th>Convert</th> -->
										<th>Remark</th>
										<th>Appointment</th>
										<!-- <th>Pending to do</th> -->

									</tr>

								</thead>

								<tbody>

									<?php
									// if ($_SESSION['TYPE'] == "SA" || $_SESSION['TYPE'] == "RM" || $_SESSION['TYPE'] == "BM") {
									// 	if ($_POST) {
									// 		$result = $obj->display('dm_lead', '1=1' . $query . ' limit 0,10');
									// 		// echo $query;
									// 	} else {
									// 		$result = $obj->display('dm_lead', '1=1' . $query . ' order by regdate desc limit 0,100');
									// 	}
									// } else {
										// echo $query;
										// if ($_POST) {
										// 	$result = $obj->display('dm_lead', '1=1' . $query);
										// } else {
										// 	$result = $obj->display('dm_lead', '1=1 and notf=0' . $query);
                                        // }
                                        $result = $obj->display('dm_lead', '1=1 and notf=0' . $query);
									// }
									if ($result->num_rows > 0) {

										$i = 1;
										while ($row = $result->fetch_assoc()) {
											
											if ($row['service_interest'] != "") {
												$ser = $obj->display('dm_service', 'id=' . $row["service_interest"]);
												if ($ser->num_rows > 0) { $ser1 = $ser->fetch_array(); }
											}
											if ($row['country_interest'] != "") {
												$ctr = $obj->display("dm_country_proces", "id=" . $row["country_interest"]);
												if ($ctr->num_rows > 0) { $ctr1 = $ctr->fetch_array(); }
											}
											$mak = $obj->display("dm_source", "id=" . $row["market_source"]);
											if ($mak->num_rows > 0) {
											  $mak1 = $mak->fetch_array();
											}

											$em = $obj->display('dm_employee', 'id=' . $row['Counsilor']);
											if ($em->num_rows > 0) {
											 $em1 = $em->fetch_array();
											}

									?>

											<tr>

												<td><?php echo $i; ?></td>

												<td style="text-align: center;">

													<a class="btn btn-light" href="lead_edit.php?lead=<?php echo $row['id']; ?>" title="<?php echo $row['mobile']; ?>"><?php echo $ld . '' . $row["id"]; ?></a>

												</td>
												<td><?php echo date('d/m/Y', strtotime($row["regdate"])); ?></td>

												<td><?php echo $row["fname"] . " " . $row["lname"]; ?></td>

												<td><?php echo $row["email"]; ?></td>
												<td><?php echo $row["mobile"]; ?></td>
												<td><?php echo $em1['name']; ?></td>

												<td><?php echo $ctr1["name"]; ?></td>

												<!-- <td><?php echo $ser1["name"]; ?></td> -->
												<td><?php echo $mak1["name"]; ?></td>
												<td><?php echo $row["enquiry"]; ?></td>
												<!-- <td><?php echo $row["convet"]; ?></td> -->
												<td>

													<a href="#" data-toggle="modal" data-target="#modal<?php echo $row['id']; ?>" id="b<?php echo $row['id']; ?>">View</a>

													<div class="modal fade" id="modal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal1Label" aria-hidden="true">
														<div class="modal-dialog modal-left">
															<div class="modal-content">
																<div class="modal-header">
																	<h4 class="modal-title" id="modal1Label">LEAD-<?php echo $row['id']; ?> Remarks</h4>
																	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
																</div>
																<div class="modal-body">
																	<?php
																	$rem = $obj->display('dm_lead_remark', '`lead`=' . $row["id"]);
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
													</div>
													<script>
														$(function() {
															$("#b<?php echo $row['id']; ?>").hover(function() {
																$('#modal<?php echo $row['id']; ?>').modal({
																	show: true
																})
															});
														});
													</script>
												</td>
												<td>
													<!--  modal window -->

													<!-- Modal -->
													<div class="modal fade" id="m<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="m<?php echo $row['id']; ?>Label" aria-hidden="true">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="m<?php echo $row['id']; ?>Label">Book Appointment</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																	<div class="input-group date" data-target-input="nearest">
																		<input type="text" id="datepicker<?php echo $row['id']; ?>" class="form-control datetimepicker-input" name="date" data-target="#datepicker<?php echo $row['id']; ?>" />
																		<div class="input-group-append" data-target="#datepicker<?php echo $row['id']; ?>" data-toggle="datetimepicker">
																			<div class="input-group-text"><i class="fa fa-calendar"></i></div>
																		</div>
																	</div>
																	<!-- <input type="text" class="form-control datepicker" name="date" id="datepicker<?php echo $row['id']; ?>"> -->
																	<div class="col-sm-3 form-group"><label>Meeting Type</label>
																		<select class="form-control" id="mtype<?php echo $row['id']; ?>" name="mtype">
																			<option value="">Select</option>
																			<option value="zoom">Zoom</option>
																			<option value="in_office">In office</option>
																			<option value="walk_in">Walk In</option>
																		</select>
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																	<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
																	<!-- appointment.php?lead=<?php echo $row['id'];  ?>&counsilor=<?php echo $row['Counsilor']; ?>&date= -->
																	<a href="#" onclick="confirmation(event,<?php echo $row['id'];  ?>,<?php echo $row['Counsilor']; ?>,$('#datepicker<?php echo $row['id']; ?>').val(),$('#mtype<?php echo $row['id']; ?>').val(),<?php echo $row['region']; ?>)" class="btn btn-primary">Book</a>
																</div>
															</div>
														</div>
													</div>
													<!-- end of modal window -->
													<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#m<?php echo $row['id']; ?>">
														<i class="far fa-calendar-check"></i></button>
													<script>
														$(function() {
															// $('#datepicker<?php echo $row['id']; ?>').datepicker({    format: 'dd-mm-yyyy',	autoclose: true});
															$('#datepicker<?php echo $row['id']; ?>').datetimepicker({
																format: 'DD-MM-YYYY',
																allowInputToggle: true,
																// defaultDate: moment()
															});
														});

														function confirmation(ev, l, c, d, t, r) {
															ev.preventDefault();
															if (!d) {
																Swal.fire('Sohail/Vamshi MC date Daal');
																return false;
															}
															if (!t) {
																Swal.fire('Sohail/Vamshi MC type select kar');
																return false;
															}
															url = ev.currentTarget.getAttribute('href');
															// var d =$('datepicker<?php echo $row['id']; ?>').val();
															// console.log(d);
															Swal.fire({
																title: 'Are You sure You want to book an appointment on ' + d,
																type: 'warning',
																showCancelButton: true,
																confirmButtonColor: '#3085d6',
																cancelButtonColor: '#d33',
																confirmButtonText: 'Yes, Book it!',
																cancelButtonText: 'No, cancel!',
																confirmButtonClass: 'btn btn-success',
																cancelButtonClass: 'btn btn-danger',
																buttonsStyling: false
															}).then(function(result) {
																if (result.value) {
																	$.ajax({
																		url: 'appointment.php',
																		method: 'POST',
																		data: {
																			lead: l,
																			type: t,
																			date: d,
																			emp: c,
																			region: r
																		},
																		sucess: function(data) {
																			// $('#alert_message').html('<div class=alert alert-success">'+data+'</div>')
																		}
																	});
																	Swal.fire('Booked', 'You have booked the appointment');
																	//   window.location.href= url+d;
																} else {
																	Swal.fire('Cancelled');
																}
															});
														}
													</script>
												</td>

											</tr>


									<?php $i++;
										}
									}
									?>
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



<?php include_once("foot.php"); ?>
<script src="theme/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
	$(document).ready(function() {
		var table = $('#dataTables-Table_new').DataTable({
			//responsive:false,
			// "scrollY": 200,
			"scrollX": true,
		});

		//  <?php if ($_SESSION['TYPE'] == "IC" || $_SESSION['TYPE'] == "SIC"  || $_SESSION['TYPE'] == "MC" || $_SESSION['TYPE'] == "BM" || $_SESSION['TYPE'] == "ABM" || $_SESSION['TYPE'] == "AM"  || $_SESSION['TYPE'] == "RM") { ?>
		//     table.columns([4,5,6]).visible(false);
		//  <?php } ?>

	});
	$(function() {
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
		// $('#sdate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		// $('#edate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true});
	});


	// 	function confirmation(ev) {
	//       ev.preventDefault();
	//       url = ev.currentTarget.getAttribute('href');
	//       var d =$('.datepicker').val();
	//       Swal.fire({
	//       title: 'Are You sure You want to book an appointment on '+d,
	//       type: 'warning',
	//       showCancelButton: true,
	//       confirmButtonColor: '#3085d6',
	//       cancelButtonColor: '#d33',
	//       confirmButtonText: 'Yes, Book it!',
	//       cancelButtonText: 'No, cancel!',
	//       confirmButtonClass: 'btn btn-success',
	//       cancelButtonClass: 'btn btn-danger',
	//       buttonsStyling: false
	//     }).then(function (result) {
	//       if(result.value){
	//       Swal.fire('Booked','You have booked the appointment');
	//       window.location.href= url+d;
	//     }
	//     else{
	//       Swal.fire('Cancelled');
	//     }
	//     });
	// }	
</script>