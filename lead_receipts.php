<?php include_once("head.php");

?>
<style>
	.modal-header,
	.modal-footer {
		background-color: #f4f6f9;
	}
</style>
<!-- <script src="js/formvalidation.js"></script> -->
<!-- DataTables -->
<link rel="stylesheet" href="theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Payment Receipt</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
						<li class="breadcrumb-item active">Payment Receipt</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>


	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Payment Receipt</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">

							<table class="table table-striped table-bordered" id="reciept-dataTables" style="width:100%">
								<thead>

									<tr>
										<th>No</th>
										<th>Receipt No.</th>
										<th>Date</th>
										<th>Amount</th>
										<th>Category</th>
										<th>Action</th>
									</tr>

								</thead>
								<tbody>
									<?php
									$i = 1;
									$rece = $obj->display('dm_pay_history', 'leadId=' . $_GET['lead'] . ' and status=1');
									while ($rece1 = $rece->fetch_array()) {
									?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $rece1['id']; ?></td>
											<td><?php echo date('d-m-Y', strtotime($rece1['date'])); ?></td>
											<td><?php echo $rece1['amount']; ?></td>
											<td><?php echo $rece1['payCategory']; ?></td>
											<td>
												<?php
												if ($_SESSION["TYPE"] == "SA") {
												?>
													<a href="javascript:void(0);" data-toggle="modal" data-target="#editForm<?= $rece1['id'] ?>" class="btnDeleteAction btn btn-danger btn-sm"><i class="fa fa-trash" title="CANCEL BILL"></i>Delete</a>
												<?php } ?>
												<a href="lead_payment_invoice.php?lead=<?= $_GET['lead']; ?>&receipt=<?= $rece1['id'] ?>" target="_blank" class="btnDeleteAction btn btn-default"><i class="fa fa-print" title="PRINT">Print</i></a>

											</td>
										</tr>

										<div class="modal fade" id="editForm<?= $rece1['id'] ?>" tabindex="-1" role="dialog">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">Delete Receipt</h4>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
													</div>
													<div class="modal-body">
														<div class="alert alert-success" id="alert-success<?= $rece1['id'] ?>" style="display:none">Data Saved Successfully.</div>
														<div class="alert alert-danger" id="alert-danger<?= $rece1['id'] ?>" style="display:none">Somthing error. Value not saved.</div>
														<form id="popForm<?= $rece1['id'] ?>" method="post" class="" action="">
															<input type="hidden" name="receipt" value="<?= $rece1['id'] ?>" />
															<input type="hidden" name="lead" value="<?= $_GET['lead'] ?>" />
															<input type="hidden" name="action" value="delete" />
															<div class="row">
																<div class="form-group col-12">
																	<label>Remark</label>
																	<textarea type="text" class="form-control" name="remark" /></textarea>
																</div>
															</div>
													</div>
													<div class="modal-footer">
														<div class="form-group col-12">
															<button type="submit" class="btn btn-primary">DELETE</button>
															<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
														</div>
													</div>
													</form>
												</div>
											</div>
										</div>

										<script>
											$(document).ready(function() {
												$('#popForm<?= $rece1['id'] ?>').validate({
													rules: {},
													messages: {},
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
													submitHandler: function() {
														// Use Ajax to submit form data
														$.ajax({
															url: 'process/receipt_process.php',
															type: 'POST',
															dataType: 'json',
															data: $('#popForm<?= $rece1['id'] ?>').serialize(),
															success: function(result) {
																if (result.status == 'success') {
																	$('#alert-success<?= $rece1['id'] ?>').css('display', 'block');
																	setTimeout(function() {
																		$('#alert-success<?= $rece1['id']; ?>').css('display', 'none');
																	}, 1000);
																	setTimeout(function() {
																		location.reload();
																	}, 1000);
																} else {
																	$('#alert-danger<?= $rece1['id'] ?>').css('display', 'block');
																	setTimeout(function() {
																		$('#alert-danger<?= $rece1['id']; ?>').css('display', 'none');
																	}, 3000);
																}
															}
														})
													}
												});
											});
										</script>


									<?php $i++;
									} ?>
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
<?php include_once("foot.php"); ?>
<script>
	$(function() {
		$("#reciept-dataTables").DataTable({
			"responsive": true,
			"autoWidth": false,
		});
	});
</script>