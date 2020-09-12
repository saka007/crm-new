<?php include_once("head.php");
?>

<style>
	.modal-header,
	.modal-footer {
		background-color: #f4f6f9;
	}

	.modal-content .row {
		padding: 0 24px;
	}

	.modal-content .row .customButtonCss {
		padding: 10px 55px;
		margin: 5px 0;
		border-radius: 25px;
	}

	.excelButton .buttons-html5 {
		color: #fff;
		background-color: #007bff;
		border-color: #007bff;
		box-shadow: none;
		position: absolute;
		margin-top: -62px;
		padding: 3px;
		border: 1px solid transparent;
		padding: .375rem .75rem;
	}
</style>
<!-- DataTables -->
<link rel="stylesheet" href="theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Client Data</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
						<li class="breadcrumb-item active">Client Data</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>


	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">

					<form action="" method="post">
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

							<div class="col-sm-2 form-group">

								<label>End Date</label>
								<div class="input-group date" id="edate" data-target-input="nearest">
									<input type="text" class="form-control datetimepicker-input" name="edate" data-target="#edate" value="<?php if ($_POST['edate']) echo $_POST['edate'];
																																			else  echo date('d-m-Y') ?>" />
									<div class="input-group-append" data-target="#edate" data-toggle="datetimepicker">
										<div class="input-group-text"><i class="fa fa-calendar"></i></div>
									</div>
								</div>

							</div>

							<div class="col-sm-2 form-group"><label>Agreement Number</label>
								<input class="form-control" name="agree" id="agree">
							</div>

							<div class="col-sm-2 form-group"><label>Region</label>
								<select class="form-control" name="region" id="region">
									<option value="">Select</option>
									<?php $sou = $obj->display('dm_region', 'status=1 ' . $region . ' order by name');
									while ($sou1 = $sou->fetch_array()) {
									?>
										<option value="<?php echo $sou1['id']; ?>" <?php if ($sou1['id'] == $_POST['region']) {
																						echo 'selected="selected"';
																					} ?>><?php echo $sou1['name']; ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="col-sm-2 form-group"><label>&nbsp;</label><br /><input type="submit" class="btn btn-primary" name="search" value="Search"></div>
						</div>
					</form>

					<div class="card">
						<div class="card-header">
							<h3 style="margin-bottom: 20px;" class="card-title"></h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table class="table table-striped table-bordered" id="operationManagement" style="width:100%">

								<thead>

									<tr>
										<th>Lead ID</th>
										<th>Agreement<br />No</th>
										<th>Gary's</th>
										<th>Name</th>

										<th>To</th>

										<th>Pay Mode</th>

										<th>Counselor</th>
										<th>Related Data</th>
									</tr>

								</thead>

								<tbody>

									<?php

									if ($_POST['agree'] != "") {
										if (is_numeric($_POST['agree'])) {
											$ag = $obj->display('dm_lead_contract', ' id=' . $_POST['agree']);
											if ($ag->num_rows > 0) {
												$ag1 = $ag->fetch_array();
											}
											$query = " and id='" . $ag1['leadId'] . "'";
										} else {
											$query = "(fname like '%" . $_POST['agree'] . "%' or lname like '%" . $_POST['agree'] . "%')";
										}
									} else {
										$query = "1=1";
										$query .= " and feeagreedate between '" . date('Y-m-d', strtotime($_POST["sdate"])) . "' and '" . date('Y-m-d', strtotime($_POST["edate"])) . "'";
									}
									if ($_SESSION['TYPE'] == "CPO" || $_SESSION['TYPE'] == "PDC" || $_SESSION['TYPE'] == "MBI" || $_SESSION['TYPE'] == "SCPO" || $_SESSION['TYPE'] == "AOM" || $_SESSION['TYPE'] == "CPM" || $_SESSION['TYPE'] == "OC") {
										$query .= " and assignTo=" . $_SESSION['ID'];
									}
									if ($_SESSION['TYPE'] == "IC" || $_SESSION['TYPE'] == "SIC"  || $_SESSION['TYPE'] == "MC" || $_SESSION['TYPE'] == "BM" || $_SESSION['TYPE'] == "ABM" || $_SESSION['TYPE'] == "AM"  || $_SESSION['TYPE'] == "RM" || $_SESSION["TYPE"] == "RMSM" || $_SESSION["TYPE"] == "HR" || $_SESSION["TYPE"] == "TC") {
										$query .= " and Counsilor=" . $_SESSION['ID'];
									}

									if ($_SESSION['TYPE'] == "SA"  || $_SESSION["TYPE"] == "RMO") {
										$query .= "";
									}
									if ($_SESSION['TYPE'] == "RT") {
										$query .= " and branch=" . $_SESSION['BRANCH'];
									}
									if ($_POST['counsilor'] != "") {
										$query .= " and assignTo=" . $_POST['counsilor'];
									}
									if ($_POST['region'] != "") {
										$query .= " and region=" . $_POST['region'];
									}
									if ($_POST['case'] != "") {
										$query .= " and type='" . $_POST['case'] . "'";
									}
									$query .= " and stepComplete=3 and paidYet!=0";

									// echo "select ".$value." from ".$table." where ".$condition;die;
									// echo $query; die;

									$result = $obj->display('dm_lead', (is_numeric($_POST['agree']) ? '1=1' : '') . $query . ' order by id desc');

									if ($result->num_rows > 0) {

										$i = 1;

										while ($row = $result->fetch_assoc()) {

											$result1 = $obj->display('dm_lead_assesment', ' leadId=' . $row["id"]);
											$lead1   = $result1->fetch_array();

											if ($row['type'] == "Student") {
												$ld = "DMC";
											}
											if ($row['type'] == "Visit") {
												$ld = "DMV";
											}
											if ($row['type'] == "work") {
												$ld = "DMW";
											}
											if ($row['type'] == "Business") {
												$ld = "DMB";
											}
											if ($row['type'] == "Skill") {
												$ld = "DMS";
											}

											$ser = $obj->display('dm_service', 'id=' . $row["service_interest"]);
											$ser1 = $ser->fetch_array();
											$ctr = $obj->display("dm_country_proces", "id=" . $row["country_interest"]);
											$ctr1 = $ctr->fetch_array();
											$agre = $obj->display('dm_lead_contract', ' leadId=' . $row["id"]);
											$agre1 = $agre->fetch_array();

											if ($_POST) {
												// print_r($row);
									?>

												<tr <?php //if ($row['escalation']) {
													// echo 'style="background-color: #e59e2d;"';
													//} 
													?>>

													<td style="text-align: center;">
														<?php echo $ld . '' . $row["id"]; ?>
													</td>
													<td style="text-align:center"><?php $cont = $obj->display('dm_lead_contract', 'leadId=' . $row['id']);
																					$cont1 = $cont->fetch_array();
																					echo $cont1['id']; ?></td>
													<td style="text-align:center"><?php echo $cont1['garys']; ?></td>
													<td><?php echo $row["fname"] . " " . $row["lname"]; ?>
														<div class="row-actions"><span class="edit"><a href="mailto:<?php echo $row["email"]; ?>"><?php echo $row["email"]; ?></a></span></div>
													</td>

													<td><?php echo $ctr1["name"]; ?></td>

													<td><?php echo $row["payType"]; ?></td>
													<td><?php $con = $obj->display('dm_employee', 'id=' . $row["Counsilor"]);
														$con1 = $con->fetch_array();
														echo $con1["name"]; ?></td>
													<td><a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target=".bd-example<?php echo $i; ?>"><i class="fas fa-folder">
															</i>View</a></td>
												</tr>
												<div class="modal fade bd-example-modal-lg bd-example<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<div style="text-align: center;">
																	<h4><?php echo $ld . '' . $row["id"] . ' details'; ?></h4>
																</div>
																<button type="button" class="close" data-dismiss="modal">&times;</button>
															</div>
															<div class="modal-body">
																<div class="row">
																	<a href="lead_edit.php?lead=<?php echo $row['id']; ?>" class="btn btn-block bg-gradient-primary customButtonCss">
																		Details</a>
																	<?php if ($row['stepComplete'] == 3 && $row['payBalance'] == 0) {
																	} else { ?>
																		<a href="<?php echo ('lead_payment.php?lead=' . $row["id"]); ?>" class="btn btn-block bg-gradient-primary customButtonCss">
																			Payment
																		</a>
																	<?php } ?>
																	<a class="btn btn-block bg-gradient-primary customButtonCss <?php if ($agre1['contract'] == "") {
																																	echo 'disabled';
																																} ?>" href="<?php if ($agre1['contract'] != "") {
																																																	?>uploads/file/<?php echo $agre1['contract'];
																																																	} else {
																																																		echo "#";
																																																	} ?>" target="_blank">Agreement
																	</a>
																	<a class="btn btn-block bg-gradient-primary customButtonCss" href="lead_receipts.php?lead=<?php echo $row['id']; ?>">
																		Receipts
																	</a>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>
									<?php $i++;
											}
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
<!-- Use when datatables is required on page -->
<!-- DataTables -->
<script src="theme/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<?php
include_once("foot.php"); ?>

<script>
	$(function() {
		$("#operationManagement").DataTable({
			"responsive": true,
			"autoWidth": false,
			"dom": '<"excelButton "B><"row"<"col-md-6"l><"col-md-6"f>>rt<"row"<"col-md-6"i><"col-md-6"p>>',
			buttons: [{
				extend: 'excel',
				title: 'Client Data'
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