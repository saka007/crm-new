<?php include_once("head.php");
require './vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

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
	$toth1 = $toth->fetch_array();
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
	$totw1 = $totw->fetch_array();
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
if ($_SESSION['TYPE'] == "SA" || $_SESSION['TYPE'] == "RM") {
	$totcold = $obj->display3('select count(*) as count from dm_lead where lead_category!="Hot" and lead_category!="Warm" and lead_category!="Cold" ');
	$totcold1 = $totcold->fetch_array();
} else if ($_SESSION['TYPE'] == "BM") {
	// echo "sas";
	$totcold = $obj->display3('select count(*) as count from dm_lead where region=' . $_SESSION['REGION'] . ' and lead_category!="Hot" and lead_category!="Warm" and lead_category!="Cold" ');
	$totcold1 = $totcold->fetch_array();
} else {
	$totcold = $obj->display3('select count(*) as count from dm_lead where lead_category!="Hot" and lead_category!="Warm" and lead_category!="Cold" and counsilor=' . $_SESSION["ID"]);
	$totcold1 = $totcold->fetch_array();
}

// $data = array(
//    			'notf'  =>  1
// 			);
// 	$obj->update('dm_lead',$data,'assignTo='.$_SESSION['ID'].' and notf=0');
$duplicateRecord = [];
$skipRecord = [];
if (isset($_POST["import"])) {

	$allowedFileType = [
		'application/vnd.ms-excel',
		'text/xls',
		'text/xlsx',
		'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
	];

	if (in_array($_FILES["file"]["type"], $allowedFileType)) {

		$targetPath = 'uploads/' . $_FILES['file']['name'];
		move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

		$Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

		$spreadSheet = $Reader->load($targetPath);
		$excelSheet = $spreadSheet->getActiveSheet();
		$spreadSheetAry = $excelSheet->toArray();

		$sheetCount = count($spreadSheetAry);

		for ($i = 1; $i < $sheetCount; $i++) {

			$fname = isset($spreadSheetAry[$i][0]) ? $spreadSheetAry[$i][0] : '';
			$mname = isset($spreadSheetAry[$i][1]) ? $spreadSheetAry[$i][1] : '';
			$lname = isset($spreadSheetAry[$i][2]) ? $spreadSheetAry[$i][2] : '';
			$email = isset($spreadSheetAry[$i][3]) ? $spreadSheetAry[$i][3] : '';
			$mobile = isset($spreadSheetAry[$i][4]) ? $spreadSheetAry[$i][4] : '';
			$alternate_num = isset($spreadSheetAry[$i][5]) ? $spreadSheetAry[$i][5] : '';
			$nationality = isset($spreadSheetAry[$i][6]) ? $spreadSheetAry[$i][6] : '';
			$address = isset($spreadSheetAry[$i][7]) ? $spreadSheetAry[$i][7] : '';
			$dob = isset($spreadSheetAry[$i][8]) ? $spreadSheetAry[$i][8] : '';
			$gender = isset($spreadSheetAry[$i][9]) ? $spreadSheetAry[$i][9] : '';
			$country_interest = isset($spreadSheetAry[$i][10]) ? $spreadSheetAry[$i][10] : '';
			$service_interest = isset($spreadSheetAry[$i][11]) ? $spreadSheetAry[$i][11] : '';
			$relative = isset($spreadSheetAry[$i][12]) ? $spreadSheetAry[$i][12] : '';
			$market_source = isset($spreadSheetAry[$i][13]) ? $spreadSheetAry[$i][13] : '';
			$mstatus = isset($spreadSheetAry[$i][14]) ? $spreadSheetAry[$i][14] : '';
			$fnames = isset($spreadSheetAry[$i][15]) ? $spreadSheetAry[$i][15] : '';
			$emails = isset($spreadSheetAry[$i][16]) ? $spreadSheetAry[$i][16] : '';
			$phones = isset($spreadSheetAry[$i][17]) ? $spreadSheetAry[$i][17] : '';
			$mobiles = isset($spreadSheetAry[$i][18]) ? $spreadSheetAry[$i][18] : '';
			$sedu = isset($spreadSheetAry[$i][19]) ? $spreadSheetAry[$i][19] : '';
			$kids = isset($spreadSheetAry[$i][20]) ? $spreadSheetAry[$i][20] : '';
			$sexp = isset($spreadSheetAry[$i][21]) ? $spreadSheetAry[$i][21] : '';
			// $mdate = isset($spreadSheetAry[$i][21]) ? $spreadSheetAry[$i][21] : '';
			// $time = isset($spreadSheetAry[$i][22]) ? $spreadSheetAry[$i][22] : '';
			// $mtype = isset($spreadSheetAry[$i][23]) ? $spreadSheetAry[$i][23] : '';
			$lead_category = isset($spreadSheetAry[$i][22]) ? $spreadSheetAry[$i][22] : '';
			$enquiry = isset($spreadSheetAry[$i][23]) ? $spreadSheetAry[$i][23] : '';


			if ($email === '' || $mobile === '') {
				array_push($skipRecord, $i);
				$skip_error = "skip-error";
				$message_skip = "Record Skip";
				continue;
			}

			$ext = $obj->display('dm_lead', 'email="' . $email . '" or mobile="' . $mobile . '"');

			if ($ext->num_rows == 0) {
			
				if ($dob != "") {
					$dob = date('Y-m-d', strtotime($dob));
				}

				$data = array(
					'fname'  =>  $fname,
					'mname'  =>  $mname,
					'lname'  =>  $lname,
					'email'  =>  $email,
					'phone'  =>  $alternate_num,
					'mobile'  =>  $mobile,
					'nationality'  =>  $nationality,
					'address'  =>  $address,
					'dob'  =>  $dob,
					'gender'  =>  $gender,
					'country_interest'  =>  $country_interest,
					'service_interest'  =>  $service_interest,
					'relative' => $relative,
					'market_source'  =>  $market_source,
					'mstatus' => $mstatus,
					//spouse data
					'fnames' => $fnames,
					'emails' => $emails,
					'phones' => $phones,
					'mobiles' => $mobiles,
					'sedu' => $sedu,
					'kids' => $kids,
					'sexp' => $sexp,
					//end
					'lead_category' => $lead_category,
					'enquiry'  =>  $enquiry,
					'assignTo'  =>  $_SESSION["ID"],
					'Counsilor'  =>  $_SESSION["ID"],
					// 'appointment'  =>  $appointment, no entry on add new page
					'regdate'  =>  date('Y-m-d'),
					'last_updated' => date('d-m-Y h-i-sa'),
					// 'followup'  =>  date('Y-m-d', strtotime($_POST['followup'])), no entry on add new page
					// 'convet'  =>  $_POST['convet'], no entry on add new page
					// 'type'  =>  $_POST['type'],no entry on add new page
					'branch'  =>  $_SESSION["BRANCH"],
					'region'  =>  $_SESSION["REGION"]
				);
				$odr = $obj->insert('dm_lead', $data);

				if (!empty($odr)) {
					$type = "success";
					$message = "Excel Data Imported into the Database";
				} else {
					$type = "error";
					$message = "Problem in Importing Excel Data";
				}
			} else {
				array_push($duplicateRecord, $i);
				$duplicate_error = "duplicate-error";
				$message_dup = "Duplicate error";
			}
		}
	} else {
		$type = "error";
		$message = "Invalid File Type. Upload Excel File.";
	}
}
?>


<link rel="stylesheet" href="theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<style>
	#response {
		padding: 5px;
		margin-top: 0px;
		border-radius: 2px;
		display: none;
	}

	.success {
		background: #c7efd9;
		border: #bbe2cd 1px solid;
	}

	.duplicate-error,
	.skip-error,
	.error {
		background: #fbcfcf;
		border: #f3c6c7 1px solid;
	}

	div#response.display-block {
		display: block;
	}
</style>
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
					<div id="response" class="<?php if (!empty($type)) {
													echo $type . " display-block";
												} ?>"><?php if (!empty($message)) {
															echo $message;
														} ?></div>
					<div id="response" class="<?php if (!empty($duplicate_error)) {
													echo $duplicate_error . " display-block";
												} ?>"><?php if (!empty($duplicateRecord)) {
															// echo $message_dup;
															echo "Total Duplicate Entry Count " . count($duplicateRecord);
															echo "<br>Duplicate Entry Record Number ";
															foreach ($duplicateRecord as $key => $value) {
																echo $value + 1 . "&nbsp;&nbsp;";
															}
														} ?></div>
					<div id="response" class="<?php if (!empty($skip_error)) {
													echo $skip_error . " display-block";
												} ?>"><?php if (!empty($message_skip)) {
															// echo $message_skip;
															echo "Total Skipped Count " . count($skipRecord);
															echo "<br>Skipped Entry Record Number ";
															foreach ($skipRecord as $key => $value) {
																echo $value + 1 . "&nbsp;&nbsp;";
															}
														} ?></div>
				</div>
			</div>
		</div>
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<!-- /.card -->
					<div class="card">
						<div class="card-header">
							<div class="row">
								<div class="col-lg-2 col-6">
									<div class="small-box bg-info">
										<div class="inner">
											<h3><?= $totl1['count']; ?></h3>
											<p>Total Leads</p>
										</div>
									</div>
								</div>

								<div class="col-lg-2 col-6">
									<div class="small-box bg-info">
										<div class="inner">
											<h3><?= $cl1['count']; ?></h3>
											<p>New Leads</p>
										</div>
									</div>
								</div>

								<div class="col-lg-2 col-6">
									<div class="small-box bg-info">
										<div class="inner">
											<h3><?= $toth1['count']; ?></h3>
											<p>Hot Leads</p>
										</div>
									</div>
								</div>

								<div class="col-lg-2 col-6">
									<div class="small-box bg-info">
										<div class="inner">
											<h3><?= $totw1['count']; ?></h3>
											<p>Warm Leads</p>
										</div>
									</div>
								</div>

								<div class="col-lg-2 col-6">
									<div class="small-box bg-info">
										<div class="inner">
											<h3><?= $totc1['count']; ?></h3>
											<p>Cold Leads</p>
										</div>
									</div>
								</div>

								<div class="col-lg-2 col-6">
									<div class="small-box bg-info">
										<div class="inner">
											<h3><?= $totcold1['count']; ?></h3>
											<p>Other Leads</p>
										</div>
									</div>
								</div>

								<!-- <div class="col-md-2 col-xs-6 border-right">
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
									<h3 class="bold no-mtop"><?= $toth1['count']; ?></h3>
									<p style="color:#03A9F4" class="font-medium no-mbot">
										Hot Leads </p>
								</div>
								<div class="col-md-2 col-xs-6 border-right">
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
							<h3 class="bold no-mtop"><?= $totcold1['count']; ?></h3>
							<p style="color:#2d2d2d" class="font-medium no-mbot">
								Other Leads     </p>
							</div> -->

							</div>

							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<!-- <div class="row"><div class="col-sm-6"><h4 class="mb-3">View Lead</h4></div></div> -->
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

											<div class="col-sm-3 form-group"><label>Marketing Source</label>
												<select class="form-control" name="market_source">
													<option value="">Select</option>
													<?php $sou = $obj->display('dm_source', 'status=1 order by name');
													while ($sou1 = $sou->fetch_array()) {
													?>
														<option value="<?php echo $sou1['id']; ?>" <?php if ($sou1['id'] == $_POST['market_source']) {
																										echo 'selected="selected"';
																									} ?>><?php echo $sou1['name']; ?></option>
													<?php } ?>
												</select>
											</div>
											<div class="col-sm-3 form-group"><label>Type of lead</label>
												<select class="form-control" name="typeofl">
													<option value="">Select</option>
													<option value="Hot" <?php if ($_POST['typeofl'] == "Hot") {
																			echo 'selected="selected"';
																		} ?>>Hot</option>
													<option value="Cold" <?php if ($_POST['typeofl'] == "Cold") {
																				echo 'selected="selected"';
																			} ?>>Cold</option>
													<option value="Warm" <?php if ($_POST['typeofl'] == "Warm") {
																				echo 'selected="selected"';
																			} ?>>Warm</option>
													<option value="DNQ" <?php if ($_POST['typeofl'] == "DNQ") {
																			echo 'selected="selected"';
																		} ?>>DNQ</option>
													<option value="DNQ_AGE" <?php if ($_POST['typeofl'] == "DNQ_AGE") {
																				echo 'selected="selected"';
																			} ?>>DNQ AGE</option>
													<option value="DNQ_Qualification" <?php if ($_POST['typeofl'] == "DNQ_Qualification") {
																							echo 'selected="selected"';
																						} ?>>DNQ Qualification</option>
													<option value="no_response" <?php if ($_POST['typeofl'] == "no_response") {
																					echo 'selected="selected"';
																				} ?>>No Response</option>
													<option value="not_interested" <?php if ($_POST['typeofl'] == "not_interested") {
																						echo 'selected="selected"';
																					} ?>>Not Interested</option>
													<option value="call_back" <?php if ($_POST['typeofl'] == "call_back") {
																					echo 'selected="selected"';
																				} ?>>Call Back</option>
													<option value="invalid_number" <?php if ($_POST['typeofl'] == "invalid_number") {
																						echo 'selected="selected"';
																					} ?>>Invalid Number</option>
												</select>

											</div>
											<?php if ($_SESSION['TYPE'] == "SA" || $_SESSION['TYPE'] == "RM" || $_SESSION['TYPE'] == "BM") { ?>
												<div class="col-sm-3 form-group"><label>Counsultant</label>
													<select class="form-control" name="counsilor" id="counsilor">
														<option value="">Select</option>
														<?php
														if ($_POST['region'] != "") {
															$qry = " and region=" . $_POST['region'];
														}
														if ($_SESSION['TYPE'] == "BM") {
															$qry = " and region=" . $_SESSION['REGION'];
														}
														$emp = $obj->display('dm_employee', 'status=1 ' . $qry . ' order by name');
														while ($emp1 = $emp->fetch_array()) {
														?>
															<option value="<?php echo $emp1['id']; ?>" <?php if ($emp1['id'] == $_POST['counsilor']) { ?> selected="selected" <?php } ?>><?php echo $emp1['name']; ?></option>
														<?php }
														?>
													</select>
												</div>
											<?php } ?>


											<!-- <div class="col-sm-3 form-group"><label >Country Interested</label>
							<select class="form-control" name="country_interest" >
								<option value="">Select</option>
								
							<?php $cnt = $obj->display('dm_country_proces', 'status=1 order by name');
							while ($cnt1 = $cnt->fetch_array()) {
							?>
								<option value="<?php echo $cnt1['id']; ?>"  <?php if ($cnt1['id'] == $_POST['country_interest']) {
																				echo 'selected="selected"';
																			} ?>><?php echo $cnt1['name']; ?></option>
								<?php } ?>		
								</select>
								
								</div>

							<div class="col-sm-3 form-group"><label >Program Interested</label>
							<select class="form-control" name="service_interest" >
								<option value="">Select</option>
								<?php $ser = $obj->display('dm_service', 'status=1 order by name');
								while ($ser1 = $ser->fetch_array()) {
								?>
								<option value="<?php echo $ser1['id']; ?>"  <?php if ($ser1['id'] == $_POST['service_interest']) {
																				echo 'selected="selected"';
																			} ?>><?php echo $ser1['name']; ?></option>
								<?php } ?>
								
							</select>
							</div>
							<div class="col-sm-3 form-group"><label >Convert</label>
							<select class="form-control" name="convet" id="convet" >
								<option value="">Select</option>
								<option value="Prospect" <?php if ($_POST['convet'] == "DNQ") {
																echo 'selected="selected"';
															} ?>>DNQ</option>
								<option value="Not Interested" <?php if ($_POST['convet'] == "Not Interested") {
																	echo 'selected="selected"';
																} ?>>Not Interested</option>
								<option value="DNQ" <?php if ($_POST['convet'] == "Prospect") {
														echo 'selected="selected"';
													} ?>>Prospect</option>
								
								</select>
								
								</div>	 -->
											<div class="col-sm-3 form-group"><label>Search</label>
												<input type="text" class="form-control" id="find" name="find" value="" placeholder="email or mobile or name"></div>

											<div class="col-sm-3 form-group"><label>&nbsp;</label><br /><input type="submit" class="btn btn-info" name="search" value="Search">
									</form>
								</div>
							</div>
						</div>
						<!-- /.card-header -->
						<form action="" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
							<div class="col-sm-12">
								<input type="file" name="file" id="file" accept=".xls,.xlsx">
								<button type="submit" id="submit" name="import" class="btn btn-info">Import as Excel</button>
							</div>
						</form>
						<div class="card-body" style="width: 80%;">

							<?php
							if ($_SESSION['TYPE'] == "IC" || $_SESSION['TYPE'] == "AOM" || $_SESSION['TYPE'] == "SIC"  || $_SESSION['TYPE'] == "MC" || $_SESSION['TYPE'] == "BM" || $_SESSION['TYPE'] == "ABM" || $_SESSION['TYPE'] == "AM"  || $_SESSION['TYPE'] == "RM" || $_SESSION["TYPE"] == "FMP" || $_SESSION["TYPE"] == "DGM" || $_SESSION["TYPE"] == "CPO" || $_SESSION["TYPE"] == "SCPO" || $_SESSION["TYPE"] == "CPM" ||  $_SESSION["TYPE"] == "OM" || $_SESSION["TYPE"] == "PDC" || $_SESSION["TYPE"] == "MBI" || $_SESSION["TYPE"] == "PDC" || $_SESSION["TYPE"] == "OC" || $_SESSION["TYPE"] == "HR" ||  $_SESSION["TYPE"] == "TC" ||  $_SESSION["TYPE"] == "RMO" || $_SESSION["TYPE"] == "RMSM") {
								$query = " and assignTo=" . $_SESSION['ID'];
							}
							if ($_SESSION['TYPE'] == "SA" || $_SESSION['TYPE'] == "RM" || $_SESSION['TYPE'] == "BM") {
								// echo"sa";
								$query = "";
							}
							// if($_SESSION['TYPE']=="RT") { 
							// $query=" and branch=".$_SESSION['BRANCH'];
							// }
							if ($_SESSION['TYPE'] == "BM") {
								// echo "h";die;
								$query .= " and region=" . $_SESSION['REGION'];
								// print_r($query);die;
							}
							if ($_POST) {

								$query .= " and paidYet=0";
								if ($_POST['find'] == "" && (!isset($_POST["import"]))) {
									$query .= " and regdate between '" . date('Y-m-d', strtotime($_POST["sdate"])) . "' and '" . date('Y-m-d', strtotime($_POST["edate"])) . "'";
								}
								if ($_POST['market_source'] != "") {
									$query .= " and market_source='" . $_POST['market_source'] . "'";
								}
								if ($_POST['typeofl'] != "") {
									$query .= " and lead_category='" . $_POST['typeofl'] . "'";
								}
								if ($_POST['enquiry'] != "") {
									$query .= " and enquiry='" . $_POST['enquiry'] . "'";
								}
								if ($_POST['country_interest'] != "") {
									$query .= " and country_interest='" . $_POST['country_interest'] . "'";
								}
								if ($_POST['service_interest'] != "") {
									$query .= " and service_interest='" . $_POST['service_interest'] . "'";
								}
								if ($_POST['convet'] != "") {
									$query .= " and convet='" . $_POST['convet'] . "'";
								}
								if ($_POST['counsilor'] != "") {
									$query .= " and counsilor='" . $_POST['counsilor'] . "'";
								}
								if ($_POST['find'] != "") {
									if (is_numeric($_POST['find'])) {
										$query .= " and mobile like '%" . $_POST['find'] . "%'";
									} else {
										$query .= " and ( email like '%" . $_POST['find'] . "%' or fname like '%" . $_POST['find'] . "%')";
									}
								}
							} else {
								$query .= " and paidYet=0";
								// print_r($query);die;
							}
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
									if ($_POST) {
										$result = $obj->display('dm_lead', '1=1' . $query);
									} else {
										$result = $obj->display('dm_lead', '1=1 and notf=0' . $query);
									}
									// }
									if ($result->num_rows > 0) {

										$i = 1;

										while ($row = $result->fetch_assoc()) {

											// $result1 = $obj->display('dm_lead_assesment', ' leadId=' . $row["id"]);
											// $lead1   = $result1->fetch_array();

											// if ($row['type'] == "Student") {
											// 	$ld = "DMC";
											// }
											// if ($row['type'] == "Visit") {
											// 	$ld = "DMV";
											// }
											// if ($row['type'] == "work") {
											// 	$ld = "DMW";
											// }
											// if ($row['type'] == "Business") {
											// 	$ld = "DMB";
											// }
											// if ($row['type'] == "Skill") {
											// 	$ld = "DMS";
											// }

											if ($row['service_interest'] != "") {
												$ser = $obj->display('dm_service', 'id=' . $row["service_interest"]);
												if ($ser->num_rows > 0) {
													$ser1 = $ser->fetch_array();
												}
											}
											if ($row['country_interest'] != "") {
												$ctr = $obj->display("dm_country_proces", "id=" . $row["country_interest"]);
												if ($ctr->num_rows > 0) {
													$ctr1 = $ctr->fetch_array();
												}
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
																	} else {
																		echo "No Remarks";
																	}
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
																	<input type="text" class="form-control" id="time" name="time" value="" placeholder="Mention Time">
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
																	<a href="#" onclick="confirmation(event,<?php echo $row['id'];  ?>,<?php echo $row['Counsilor']; ?>,$('#datepicker<?php echo $row['id']; ?>').val(),$('#mtype<?php echo $row['id']; ?>').val(),<?php echo $row['region']; ?>,$('#time').val())" class="btn btn-primary">Book</a>
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
															$('#timepicker<?php echo $row['id']; ?>').timepicker({
																// format: 'DD-MM-YYYY',
																uiLibrary: 'bootstrap4',
																allowInputToggle: true,
																// defaultDate: moment()
															});
														});

														function confirmation(ev, l, c, d, t, r, time) {
															ev.preventDefault();
															if (!d) {
																Swal.fire('Please enter date');
																return false;
															}
															if (!t) {
																Swal.fire('Please enter type');
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
																			region: r,
																			time: time
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

		//  <?php if ($_SESSION['TYPE'] == "IC" || $_SESSION['TYPE'] == "SIC"  || $_SESSION['TYPE'] == "MC" || $_SESSION['TYPE'] == "BM" || $_SESSION['TYPE'] == "ABM" || $_SESSION['TYPE'] == "AM"  || $_SESSION['TYPE'] == "RM" || $_SESSION["TYPE"] == "FMP" || $_SESSION["TYPE"] == "DGM" || $_SESSION["TYPE"] == "CPO" || $_SESSION["TYPE"] == "SCPO" || $_SESSION["TYPE"] == "CPM" ||  $_SESSION["TYPE"] == "OM" || $_SESSION["TYPE"] == "PDC" || $_SESSION["TYPE"] == "MBI" || $_SESSION["TYPE"] == "PDC" || $_SESSION["TYPE"] == "OC" || $_SESSION["TYPE"] == "HR" ||  $_SESSION["TYPE"] == "TC" ||  $_SESSION["TYPE"] == "RMO" || $_SESSION["TYPE"] == "RMSM") { ?>
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