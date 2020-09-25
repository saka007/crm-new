<?php include_once("head.php");

?>
<link rel="stylesheet" href="theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<!-- Begin Page Content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">

			<!-- Page Heading -->
			<h1 class="h3 mb-4 text-gray-800">Lead Audit Report</h1>

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
											<div class="col-sm-2 form-group"><label>&nbsp;</label><br /><input type="submit" class="btn btn-info" name="search" value="Search" ></div>
										</div>
			</form>

			<div class="row">
				<div class="col-lg-12">
					<div id="alert_message"></div>
					<hr />
					<?php
					if ($_SESSION['TYPE'] == "BM") {
						// echo "h";die;
						$query = " and region=" . $_SESSION['REGION'];
						// print_r($query);die;
					}
					// $src2 = $obj->display('dm_source', '1=1');
					// 			if ($src2->num_rows > 0) {
					// 				while ($src3 = $src2->fetch_array()) {
					// 					// echo "hi";
					// 					$count= $obj->display3('SELECT COUNT(*) as count FROM `dm_lead` where market_source='.$src3['id'].' and counsilor='.$row['counsilor']);
					// 					if ($count->num_rows > 0) {
					// 					$count1= $count->fetch_array();
					// 					}
					// 				}
					// 			}
					if ($_POST) {
								?>
					<table class="table table-striped table-bordered" id="myTable" style="width:100%">

						<thead>

							<tr>
								<th>Sr no.</th>
								<th>Counselor</th>
								<th>No. of lead added</th>
								<?php
								 $src = $obj->display('dm_source', '1=1');
								if ($src->num_rows > 0) {
									while ($src1 = $src->fetch_array()) {
										echo "<th>" . $src1['name'] . "</th>";
									}
								}
								?>
								<th>Branch</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$result = $obj->display2('dm_lead', "assignTo,counsilor,region,count(*) as count", "regdate between '".date('Y-m-d',strtotime($_POST["sdate"]))."' and '".date('Y-m-d',strtotime($_POST["edate"]))."'".$query."  group by region,assignTo");
							// print_r($result);die;
							if ($result->num_rows > 0) {
								// echo "hi";die;
								$i = 1;
								while ($row = $result->fetch_assoc()) {
									$emp = $obj->display('dm_employee', 'id=' . $row['assignTo']);
									$em1 = $emp->fetch_assoc();
									$bra = $obj->display('dm_region', 'id=' . $row['region']);
									$bra1 = $bra->fetch_assoc();
							?>
									<tr>
										<td><?= $i; ?></td>
										<td><?= $em1['name']; ?></td>
										<td><?= $row['count']; ?></td>
										<?php 
										$src2 = $obj->display('dm_source', '1=1');
								if ($src2->num_rows > 0) {
									while ($src3 = $src2->fetch_array()) {
										$count= $obj->display3('SELECT COUNT(*) as count FROM `dm_lead` where market_source='.$src3['id'].' and counsilor='.$row['counsilor']);
										if ($count->num_rows > 0) {
										$count1= $count->fetch_array();
										}
										echo "<td>" . $count1['count'] . "</td>";
									}
								}
								?>
										<td><?= $bra1['name']; ?></td>
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
			</div>
		</div>
	</div>
</div>
<?php include_once('foot.php'); ?>
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
<script src="theme/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
	$(document).ready(function() {
		$('#myTable').DataTable({
			responsive: true,
			"scrollX": true,
			dom: 'Bfprt',
			buttons: [{
				extend: 'excel',
				footer: true,
				title: 'Lead Report',
				messageTop: 'Lead Added today'
			}]
		});
	});
</script>