<?php
include_once("head.php");
?>
<!-- Use only where datatable is required -->
<!-- DataTables -->
<link rel="stylesheet" href="theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Employee Management</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
						<li class="breadcrumb-item active">Employee Management</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<!-- /.card -->
					<div class="card">
						<div class="card-header">
							<h4 class="mb-3" style="color:#2cb674;"> <a href="javascript:void(0);" class="btn btn-primary pull-right" data-toggle="modal" data-target="#newForm">Add New <i class="fa fa-plus"></i></a></h4>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<!-- <div class="col-sm-10"> -->



							<table class="table table-striped table-bordered display nowrap" id="mydataTable">

								<thead>

									<tr>

										<th>Name</th>

										<th>DOB</th>
										<th>Nationality</th>
										<th>DOJ</th>

										<th>Role</th>

										<th>Branch</th>

										<th>Department</th>

										<th>PPNo.</th>

										<th>Visa Exp.</th>

										<th>EID</th>

										<th>Username</th>

										<?php if ($_SESSION['TYPE'] == "SA") { ?>
											<th>Password</th>
										<?php } ?>

										<th style="text-align:right">Action</th>

									</tr>

								</thead>

								<tbody>

									<?php

									$i = 1;

									$re = $obj->display("dm_employee", "status=1 and id!=1 order by name ASC");

									while ($res2 = $re->fetch_array()) {


									?>

										<tr id="item-<?= $res2['id'] ?>">

											<td><?= $res2['name']; ?></td>

											<td><?= date('d-m-Y', strtotime($res2['doj'])); ?></td>
											<td><?= $res2['nationality']; ?></td>

											<td><?= date('d-m-Y', strtotime($res2['dob'])); ?></td>

											<td><?php $r = $obj->display("dm_role", "id=" . $res2['role']);
												$r2 = $r->fetch_array();
												echo $r2['name']; ?></td>
											<td><?php $b = $obj->display("dm_branch", "id=" . $res2['branch']);
												$b2 = $b->fetch_array();
												echo $b2['name']; ?></td>
											<td><?php $d = $obj->display("dm_department", "id=" . $res2['department']);
												$d2 = $d->fetch_array();
												echo $d2['name']; ?></td>

											<td><?= $res2['ppNo']; ?></td>

											<td><?= date('d-m-Y', strtotime($res2['visaExp'])); ?></td>

											<td><?= date('d-m-Y', strtotime($res2['EID'])); ?></td>

											<td><?= $res2['username']; ?></td>

											<?php if ($_SESSION['TYPE'] == "SA") { ?>
												<td><?= $res2['password']; ?></td>
											<?php } ?>

											<td>

												<a href="javascript:void(0);" data-toggle="modal" data-target="#editForm<?= $res2['id'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit" title="EDIT"></i>Edit</a>
												
												<a href="javascript:void(0);" id="<?= $res2['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash" title="DELETE"></i>Delete</a>
												

												<div class="modal fade" id="editForm<?= $res2['id'] ?>" tabindex="-1" role="dialog">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title">Edit Employee</h4>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
															</div>

															<div class="modal-body">
																<div class="alert alert-success" id="alert-success<?= $res2['id'] ?>" style="display:none">Data Saved Successfully.</div>
																<div class="alert alert-danger" id="alert-danger<?= $res2['id'] ?>" style="display:none">Somthing error. Value not saved.</div>

																<form id="popForm<?= $res2['id'] ?>" method="post" class="" action="" enctype="multipart/form-data">
																	<input type="hidden" name="id" value="<?= $res2['id'] ?>" />
																	<input type="hidden" name="action" value="edit" />

																	<div class="row">

																		<div class="form-group col-sm-4">
																			<label>Name</label>
																			<input type="text" class="form-control" name="name" value="<?= $res2['name'] ?>" />
																		</div>

																		<div class="form-group col-sm-4">
																			<label>Email</label>
																			<input type="text" class="form-control" name="email" value="<?= $res2['email'] ?>" />
																		</div>
																		<div class="form-group col-sm-4">
																			<label>Mobile</label>
																			<input type="text" class="form-control" name="mobile" value="<?= $res2['mobile'] ?>" />
																		</div>
																		<div class="form-group col-sm-8">
																			<label>Address</label>
																			<input type="text" class="form-control" name="address" value="<?= $res2['address'] ?>" />
																		</div>
																		<div class="form-group col-sm-4">
																			<label>Photo</label>
																			<input type="file" class="form-control" name="photo" />
																		</div>

																		<div class="form-group col-sm-4">
																			<label>Date of Joining</label>
																			<div class="input-group date" id="dob<?= $res2['id'] ?>" data-target-input="nearest">
																				<input type="text" class="form-control datetimepicker-input" name="dob<?= $res2['id'] ?>" data-target="#dob<?= $res2['id'] ?>" value="<?= date('d-m-Y', strtotime($res2['dob'])) ?>" />
																				<div class="input-group-append" data-target="#dob<?= $res2['id'] ?>" data-toggle="datetimepicker">
																					<div class="input-group-text"><i class="fa fa-calendar"></i></div>
																				</div>
																			</div>
																		</div>

																		<div class="form-group col-sm-4">
																			<label>Role</label>
																			<select type="text" class="form-control" name="role">
																				<?php
																				$reg = $obj->display("dm_role", "status=1 order by name ASC");
																				while ($reg2 = $reg->fetch_array()) {
																				?>
																					<option value="<?php echo $reg2['id']; ?>" <?php if ($reg2['id'] == $res2['role']) {
																																	echo 'selected="selected"';
																																} ?>><?php echo $reg2['name']; ?></option>
																				<?php } ?>
																			</select>
																		</div>

																		<div class="form-group col-sm-4">
																			<label>Branch</label>
																			<select type="text" class="form-control" name="branch">
																				<?php
																				$reg = $obj->display("dm_branch", "status=1 order by name ASC");
																				while ($reg2 = $reg->fetch_array()) {
																				?>
																					<option value="<?php echo $reg2['id']; ?>" <?php if ($reg2['id'] == $res2['branch']) {
																																	echo 'selected="selected"';
																																} ?>><?php echo $reg2['name']; ?></option>
																				<?php } ?>
																			</select>
																		</div>

																		<div class="form-group col-sm-4">
																			<label>Department</label>
																			<select type="text" class="form-control" name="department">
																				<?php
																				$reg = $obj->display("dm_department", "status=1 order by name ASC");
																				while ($reg2 = $reg->fetch_array()) {
																				?>
																					<option value="<?php echo $reg2['id']; ?>" <?php if ($reg2['id'] == $res2['department']) {
																																	echo 'selected="selected"';
																																} ?>><?php echo $reg2['name']; ?></option>
																				<?php } ?>
																			</select>
																		</div>

																		<div class="form-group col-sm-4">
																			<label>Passport No.</label>
																			<input type="text" class="form-control" name="ppNo" value="<?= $res2['ppNo'] ?>" />
																		</div>

																		<div class="form-group col-sm-4">
																			<label>Visa Exp.</label>
																			<input type="text" class="form-control" id="visaExp<?= $res2['id'] ?>" name="visaExp" value="<?= date('d-m-Y', strtotime($res2['visaExp'])) ?>" />
																		</div>

																		<div class="form-group col-sm-4">
																			<label>EID</label>
																			<input type="text" class="form-control" name="EID" value="<?= $res2['EID']; ?>" />
																		</div>

																		<div class="form-group col-sm-4">
																			<label>password</label>
																			<input type="text" class="form-control" name="password" value="" />
																		</div>

																		<div class="form-group col-sm-4">
																			<label>DOB</label>
																			<input type="text" class="form-control" id="doj<?= $res2['id'] ?>" name="doj" value="<?= date('d-m-Y', strtotime($res2['doj'])) ?>" />
																		</div>

																		<div class="form-group col-sm-4">
																			<label>Nationality</label>
																			<input type="text" class="form-control" name="nationality" value="<?= $res2['nationality']; ?>" />
																		</div>

																	</div>

																	<div class="row">

																		<div class="form-group col-12">

																			<button type="submit" class="btn btn-primary">SAVE</button>

																			<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

																		</div>

																	</div>

																</form>

															</div>

														</div>

													</div>

												</div>

												<script>
													$(document).ready(function() {
														$('#dob<?= $res2['id'] ?>').datetimepicker({
															format: 'DD-MM-YYYY',
															allowInputToggle: true,
														});
														$('#doj<?= $res2['id'] ?>').datetimepicker({
															format: 'DD-MM-YYYY',
															allowInputToggle: true,
														});
														$('#visaExp<?= $res2['id'] ?>').datetimepicker({
															format: 'DD-MM-YYYY',
															allowInputToggle: true,
														});


														$('#popForm<?= $res2['id'] ?>').validate({
															rules: {
																name: {
																	required: true,
																},
																
																dob: {
																	required: true,
																},
																role: {
																	required: true,
																},
																branch: {
																	required: true,
																},
																dob: {
																	required: true,
																},
															},
															messages: {
																name: "The name is required",
																dob: "Date of joining required",
																doj: "Date of birth required",
																role: "Role is required",
																branch: "Branch is required",
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
															submitHandler: function() {
																var formData = new FormData($('#popForm<?= $res2['id'] ?>')[0]);
																$.ajax({
																	url: 'process/employe_process.php',
																	type: 'POST',
																	enctype: 'multipart/form-data',
																	dataType: 'json',
																	data: formData,
																	processData: false,
																	contentType: false,
																	cache: false,
																	success: function(result) {
																		if (result.status == 'success') {
																			$('#alert-success<?= $res2['id'] ?>').css('display', 'block');
																			setTimeout(function() {
																				$('#alert-success<?= $res2['id']; ?>').css('display', 'none');
																			}, 2000);
																			setTimeout(function() {
																				location.reload();
																			}, 2000);
																		} else {
																			$('#alert-danger<?= $res2['id'] ?>').css('display', 'block');
																			setTimeout(function() {
																				$('#alert-danger<?= $res2['id']; ?>').css('display', 'none');
																			}, 3000);
																		}
																	}
																});
															}
														})
													});
												</script>
											</td>

										</tr>


									<?php $i++;
									} ?>

								</tbody>

							</table>

							<!-- /.table-responsive -->

							<!-- </div> -->

							<!-- /.col-lg-12 -->
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


<div class="modal" id="newForm">

	<div class="modal-dialog modal-lg">

		<div class="modal-content">

			<div class="modal-header">

				<h4 class="modal-title">New Employee</h4>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>

			</div>

			<div class="modal-body">

				<div class="alert alert-success" style="display:none">Data Saved Successfully.</div>

				<div class="alert alert-danger" style="display:none">Somthing error. Value not saved.</div>

				<form id="popForm" method="post" class="" action="" enctype="multipart/form-data">

					<input type="hidden" name="action" value="add" />

					<div class="row">

						<div class="form-group col-sm-4">
							<label>Name</label>
							<input type="text" class="form-control" name="name" />
						</div>
						<div class="form-group col-sm-4">
							<label>Email</label>
							<input type="text" class="form-control" name="email" />
						</div>
						<div class="form-group col-sm-4">
							<label>Mobile</label>
							<input type="text" class="form-control" name="mobile" />
						</div>
						<div class="form-group col-sm-8">
							<label>Address</label>
							<input type="text" class="form-control" name="address" />
						</div>
						<div class="form-group col-sm-4">
							<label>Photo</label>
							<input type="file" class="form-control" name="photo" />
						</div>
						<div class="form-group col-sm-4">
							<label>Date of Joining</label>
							<div class="input-group date" id="dob" data-target-input="nearest">
								<input type="text" class="form-control datetimepicker-input" name="dob" data-target="#dob" />
								<div class="input-group-append" data-target="#dob" data-toggle="datetimepicker">
									<div class="input-group-text"><i class="fa fa-calendar"></i></div>
								</div>
							</div>
						</div>
						<div class="form-group col-sm-4">
							<label>Role</label>
							<select type="text" class="form-control" name="role">
								<option value="">Select</option>
								<?php
								$reg = $obj->display("dm_role", "status=1 order by name ASC");
								while ($reg2 = $reg->fetch_array()) {
								?>
									<option value="<?php echo $reg2['id']; ?>"><?php echo $reg2['name']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group col-sm-4">
							<label>Branch</label>
							<select type="text" class="form-control" name="branch">
								<option value="">Select</option>
								<?php
								$reg = $obj->display("dm_branch", "status=1 order by name ASC");
								while ($reg2 = $reg->fetch_array()) {
								?>
									<option value="<?php echo $reg2['id']; ?>"><?php echo $reg2['name']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group col-sm-4">
							<label>Department</label>
							<select type="text" class="form-control" name="department">
								<option value="">Select</option>
								<?php
								$reg = $obj->display("dm_department", "status=1 order by name ASC");
								while ($reg2 = $reg->fetch_array()) {
								?>
									<option value="<?php echo $reg2['id']; ?>"><?php echo $reg2['name']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group col-sm-4">
							<label>Passport No.</label>
							<input type="text" class="form-control" name="ppNo" />
						</div>
						<div class="form-group col-sm-4">
							<label>Visa Expire</label>
							<div class="input-group date" id="visaExp" data-target-input="nearest">
								<input type="text" class="form-control datetimepicker-input" name="visaExp" data-target="#visaExp" />
								<div class="input-group-append" data-target="#visaExp" data-toggle="datetimepicker">
									<div class="input-group-text"><i class="fa fa-calendar"></i></div>
								</div>
							</div>
						</div>
						<div class="form-group col-sm-4">
							<label>EID</label>
							<input type="text" class="form-control" name="EID" id="EID" />
						</div>
						<div class="form-group col-sm-4">
							<label>Username</label>
							<input type="text" class="form-control" name="username" />
						</div>
						<div class="form-group col-sm-4">
							<label>Password</label>
							<input type="text" class="form-control" name="password" />
						</div>
						<div class="form-group col-sm-4">
							<label>DOB</label>
							<div class="input-group date" id="doj" data-target-input="nearest">
								<input type="text" class="form-control datetimepicker-input" name="doj" data-target="#doj" />
								<div class="input-group-append" data-target="#doj" data-toggle="datetimepicker">
									<div class="input-group-text"><i class="fa fa-calendar"></i></div>
								</div>
							</div>
						</div>

						<div class="form-group col-sm-4">
							<label>Nationality</label>
							<input type="text" class="form-control" name="nationality" />
						</div>


					</div>
					<div class="row">
						<div class="form-group col-12">
							<button type="submit" class="btn btn-primary">SAVE</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include_once("foot.php");	?>

<script src="theme/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
	$(document).ready(function() {
		$("#mydataTable").DataTable({
			// "responsive": false,
			// "autoWidth": true,
			// "scrollY": true,
			"scrollX": true,
			// dom: 'Bfprt',
			buttons: [{
				extend: 'excel',
				title: 'Employee Report',
				messageTop: 'Employee Data'
			}]

		});

		$('#dob').datetimepicker({
			format: 'DD-MM-YYYY',
			allowInputToggle: true,
			
		});
		$('#doj').datetimepicker({
			format: 'DD-MM-YYYY',
			allowInputToggle: true,
		});
		$('#visaExp').datetimepicker({
			format: 'DD-MM-YYYY',
			allowInputToggle: true,
		});
		$('#popForm').validate({
			rules: {
				name: {
					required: true,
				},
				email: {
					required: true,
					email: true,
				},
				doj: {
					required: true,
				},
				role: {
					required: true,
				},
				branch: {
					required: true,
				},
				username: {
					required: true,
				},
				password: {
					required: true,
					minlength: 5
				},
				dob: {
					required: true,
				},
			},
			messages: {
				name: "The name is required",
				email: {
					required: "Please enter a email address",
					email: "Please enter a vaild email address"
				},
				dob: "Date of joining required",
				doj: "Date of birth required",
				role: "Role is required",
				branch: "Branch is required",
				username: "Username is required",
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},

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
			submitHandler: function() {
				var formData = new FormData($('#popForm')[0]);
				$.ajax({
					url: 'process/employe_process.php',
					type: 'POST',
					enctype: 'multipart/form-data',
					dataType: 'json',
					data: formData,
					processData: false,
					contentType: false,
					cache: false,
					success: function(result) {
						if (result.status == 'success') {
							$('.alert-success').css('display', 'block');
							setTimeout(function() {
								$('.alert-success').css('display', 'none');
							}, 1000);
							setTimeout(function() {
								location.reload();
							}, 1000);
						} else {
							$('.alert-danger').css('display', 'block');
							setTimeout(function() {
								$('.alert-danger').css('display', 'none');
							}, 1000);
						}
					},
					error: function(error) {
						console.log(error);
					}
				});
			}
		})

		$('body').on('click', '.btnDeleteAction', function() {
			var tr = $(this).closest('tr');
			del_id = $(this).attr('id');
			if (confirm("Want to delete this?")) {
				$.ajax({
					url: "<?php echo $base_url; ?>/process/employe_process.php",
					type: "POST",
					cache: false,
					data: '&del_id=' + del_id + '&action=delete',
					success: function(result) {
						tr.fadeOut(1000, function() {
							$(this).remove();
						});
					}
				});
			}
		});
	});
</script>