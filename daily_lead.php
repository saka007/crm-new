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

			<div class="row">
				<div class="col-lg-12">
					<div id="alert_message"></div>
					<hr />
					<table class="table table-striped table-bordered" id="myTable" style="width:100%">

						<thead>

							<tr>
								<th>Sr no.</th>
								<th>Counselor</th>
								<th>No. of lead added</th>
								<?php $src = $obj->display('dm_source', '1=1');
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
							$result = $obj->display2('dm_lead', 'assignTo,region,count(*) as count', 'regdate=CURRENT_DATE group by region,assignTo');
							// print_r($result);die;
							if ($result->num_rows > 0) {
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
										<?php $src = $obj->display('dm_source', '1=1');
								if ($src->num_rows > 0) {
									while ($src1 = $src->fetch_array) {
										$count= $obj->display3('SELECT COUNT(*) as count FROM `dm_lead` where market_source='.$src1['id'].' and counsilor='.$row['counsilor']);
										if ($src->num_rows > 0) {
										$count1= $count->fetch_array();
										}
										echo "<th>" . $count1['count'] . "</th>";
									}
								}
								?>
										<td><?= $bra['name']; ?></td>
									</tr>
							<?php
									$i++;
								}
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include_once('foot.php'); ?>
<script src="theme/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
	$(document).ready(function() {
		$('#myTable').DataTable({
			responsive: true,
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