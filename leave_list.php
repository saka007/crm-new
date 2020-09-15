<?php
include_once("head.php");	
?>
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
					<h1>Leave Management</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
						<li class="breadcrumb-item active">Leave Management</li>
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
                        <h4 class="mb-3" style="float:right;"> <a href="javascript:void(0);" class="btn btn-primary pull-right" data-toggle="modal" data-target="#newForm">Add New <i class="fa fa-plus"></i></a></h4>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
						<table class="table table-striped table-bordered" id="dataTables-Table" style="width:100%">
				<thead>
					<tr>
					  <th>From Date</th>
					  <th>To Date</th>
					  <th>Type</th>
					  <th>Approve</th>
					  <th>Apply Date</th>
					  <th>Remark</th>
					  <!-- <th>File</th> -->
					  <th style="text-align:right">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$i=1;
				$re=$obj->display("dm_leave_history","custId=".$_SESSION['ID']); 	
				while($res2=$re->fetch_array())
				{ 
				?>  
				<tr id="item-<?=$res2['id']?>">
				 <td><?=date('d-m-Y',strtotime($res2['fromDate']));?></td>
				 <td><?=date('d-m-Y',strtotime($res2['toDate']));?></td>
				 <td><?=$res2['type'];?></td>
				 <td><?=$res2['approvBy'];?></td>
				 <td><?=date('d-m-Y',strtotime($res2['applyDate']));?></td>
				 <td><?=$res2['remark'];?></td>
				 <!-- <td><a href="uploads/hr_docs/<?=$res2['file'];?>" target="_blank"><?=$res2['file'];?></a></td> -->
				 <td>
				 <?php if(strtotime($res2['fromDate']) >= strtotime(date('Y-m-d'))) { ?>
					<p style="text-align:right">
					  <a href="javascript:void(0);" data-toggle="modal" data-target="#editForm<?=$res2['id']?>" class="btnEditAction"><i class="fa fa-edit" title="EDIT"></i></a>
					   <a href="javascript:void(0);" id="<?=$res2['id'];?>" class="btnDeleteAction"><i class="fa fa-trash" title="DELETE"></i></a> 
					 </p>
					 <?php } ?>
				 
		<div class="modal fade" id="editForm<?=$res2['id']?>" tabindex="-1" role="dialog" >
		<div class="modal-dialog modal-lg">
		<div class="modal-content">
		<div class="modal-header">
		<h4 class="modal-title">Edit Leave</h4>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
		</div>

			<div class="modal-body">
			<div class="alert alert-success" id="alert-success<?=$res2['id']?>" style="display:none">Data Saved Successfully.</div>
			<div class="alert alert-danger" id="alert-danger<?=$res2['id']?>" style="display:none">Somthing error. Value not saved.</div>
			<form id="popForm<?=$res2['id']?>" method="post" class="" action="" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?=$res2['id']?>" />
			<input type="hidden" name="action" value="edit2" />
				<div class="row">
                    <div class="form-group col-sm-3">
                        <label>Leave From</label>
						<div class="input-group date" id="fromDate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="fromDate" data-target="#fromDate" value="<?php if ($_POST['fromDate']) echo $_POST['fromDate'];
                                                                                                                                            else  echo date('d-m-Y') ?>" />
                                    <div class="input-group-append" data-target="#fromDate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <label>Leave To</label>
						<div class="input-group date" id="toDate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="toDate" data-target="#toDate" value="<?php if ($_POST['toDate']) echo $_POST['toDate'];
                                                                                                                                            else  echo date('d-m-Y') ?>" />
                                    <div class="input-group-append" data-target="#toDate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <label>Leave Type</label>
                            <select type="text" class="form-control" name="type" >
							<option value="">Select</option>
							<?php
								$reg=$obj->display("dm_leave_type","status=1 order by name ASC"); 	
								while($reg2=$reg->fetch_array())
								{ 
							?>  
								<option value="<?php echo $reg2['name'];?>" <?php if($reg2['name']==$res2['type']) { echo 'selected="selected"'; }?> ><?php echo $reg2['name'];?></option>
								<?php } ?>
						</select>
                    </div>
                    <div class="form-group col-sm-3">
                        <label>Approve By</label>
                            <input type="text" class="form-control" name="approvBy" value="<?=$res2['approvBy'];?>"  />
                    </div>

                    <div class="form-group col-sm-4">
                        <label>Document to be Uploaded:</label>
                            <input type="file" class="form-control" name="file"  />
                    </div>

                    <div class="form-group col-sm-12">
                        <label>Remark</label>
                            <textarea class="form-control" name="remark"><?=$res2['remark'];?></textarea>
                    </div>
                   
					</div>
					<div class="row">
						<div class="form-group col-12">
								<button type="submit" class="btn btn-primary" >SAVE</button>
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
						$('#dob<?=$res2['id']?>').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 

                            $('#popForm<?=$res2['id']?>').validate({
								rules: {
									fromDate: {
										required: true,
									},
									toDate: {
										required: true,
									},
									fromDate2: {
										required: true,
									},
									toDate2: {
										required: true,
									},
									type: {
										required: true,
									},
									approvBy: {
										required: true,
									},

								},
								messages: {
									fromDate: "From Date is required",
									toDate: "To Date is required",
									fromDate2: "From Date is required",
									toDate2: "To Date is required",
									type: "Leave Type is required",
									approvBy: "Approve By is required",
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
                                    url: 'process/leave_process.php',
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
                                    },
                                    error: function(error) {
                                        console.log(error);
                                    }
                                });
                            }
                        });
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
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Leave</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
							<div class="alert alert-success" style="display:none">Data Saved Successfully.</div>
							<div class="alert alert-danger" style="display:none">Somthing error. Value not saved.</div>
                <form id="popForm" method="post" class="" action="" enctype="multipart/form-data">
				<input type="hidden" name="action" value="add2" />
				<div class="row">
                    <div class="form-group col-sm-3">
                        <label>Leave From</label>
						<div class="input-group date" id="fromDate2" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="fromDate" data-target="#fromDate2" value="<?php if ($_POST['fromDate']) echo $_POST['fromDate'];
                                                                                                                                            else  echo date('d-m-Y') ?>" />
                                    <div class="input-group-append" data-target="#fromDate2" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <label>Leave To</label>
						<div class="input-group date" id="toDate2" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="toDate" data-target="#toDate2" value="<?php if ($_POST['toDate2']) echo $_POST['toDate2'];
                                                                                                                                            else  echo date('d-m-Y') ?>" />
                                    <div class="input-group-append" data-target="#toDate2" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <label>Leave Type</label>
                            <select type="text" class="form-control" name="type" >
							<option value="">Select</option>
							<?php
								$reg=$obj->display("dm_leave_type","status=1 order by name ASC"); 	
								while($reg2=$reg->fetch_array())
								{ 
							?>  
								<option value="<?php echo $reg2['name'];?>"><?php echo $reg2['name'];?></option>
								<?php } ?>
						</select>
                    </div>
                    <!-- <div class="form-group col-sm-3">
                        <label>Approve By</label>
                            <input type="text" class="form-control" name="approvBy"  />
                    </div> -->
                    <!-- <div class="form-group col-sm-4">
                        <label>Document to be Uploaded:</label>
                            <input type="file" class="form-control" name="file"  />
                    </div> -->

                    <div class="form-group col-sm-12">
                        <label>Remark</label>
                            <textarea class="form-control" name="remark"></textarea>
                    </div>
                   
					</div>
				<div class="row">
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary" >SAVE</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
               </div>
			    </form>
           </div>
        </div>
    </div>
</div>

<?php 	include_once("foot.php");	?>

<script src="theme/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
  $(document).ready(function(){
	var table = $('#dataTables-Table').DataTable({
		responsive:false,
		// "scrollY": 200,
        "scrollX": true
	});
});
$(document).ready(function() {
	$('#fromDate').datetimepicker({
        format: 'DD-MM-YYYY',
        allowInputToggle: true,
        // defaultDate: moment()
    });
	$('#fromDate2').datetimepicker({
        format: 'DD-MM-YYYY',
        allowInputToggle: true,
        // defaultDate: moment()
    });
	$('#toDate').datetimepicker({
        format: 'DD-MM-YYYY',
        allowInputToggle: true,
        // defaultDate: moment()
    });
	$('#toDate2').datetimepicker({
        format: 'DD-MM-YYYY',
        allowInputToggle: true,
        // defaultDate: moment()
    });
	// $('#fromDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
	// $('#toDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true});
	// $('#fromDate2').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
	// $('#toDate2').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		
		$('#popForm').validate({
			rules: {
				fromDate: {
					required: true,
				},
				toDate: {
					required: true,
				},
				fromDate2: {
					required: true,
				},
				toDate2: {
					required: true,
				},
				type: {
					required: true,
				},
				approvBy: {
					required: true,
				},

			},
			messages: {
				fromDate: "From Date is required",
				toDate: "To Date is required",
				fromDate2: "From Date is required",
				toDate2: "To Date is required",
				type: "Leave Type is required",
				approvBy: "Approve By is required",
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
					url: 'process/leave_process.php',
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
	});

	$('body').on('click','.btnDeleteAction',function(){ 
				 var tr = $(this).closest('tr');
					del_id = $(this).attr('id');
		if(confirm("Want to delete this?"))
		{ 
					$.ajax({
						url: "<?php echo $base_url;?>/process/leave_process.php",
						type: "POST",
						cache: false,
						data:'&del_id='+del_id+'&action=delete',
					success:function(result){
							tr.fadeOut(1000, function(){
								$(this).remove();
							});
						}
					});
		}
	});
});
</script>			