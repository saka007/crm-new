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
                    <h1>Country Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Country Management</li>
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
                             <table class="table table-striped table-bordered display nowrap" id="mydataTable">
                                <thead>
									<tr>
									  <th>Country Name</th>
									  <th style="text-align:right">Action</th>
									</tr>
                                </thead>
                                <tbody>
								<?php
								$i=1;
								$re=$obj->display("dm_country_proces","status=1 order by name ASC"); 	
								while($res2=$re->fetch_array())
								{ 
								?>  
								<tr id="item-<?=$res2['id']?>">
								 <td><?=$res2['name'];?></td>
	
                                 <td>
								  <p style="text-align:right">
									 <a href="javascript:void(0);" data-toggle="modal" data-target="#editForm<?=$res2['id']?>" class="btnEditAction"><i class="fa fa-edit" title="EDIT"></i></a>
									<a href="javascript:void(0);" id="<?=$res2['id'];?>" class="btnDeleteAction"><i class="fa fa-trash" title="DELETE"></i></a> 
								  </p>
								
<div class="modal fade" id="editForm<?=$res2['id']?>" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Country</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>

            <div class="modal-body">
							<div class="alert alert-success" id="alert-success<?=$res2['id']?>" style="display:none">Data Saved Successfully.</div>
							<div class="alert alert-danger" id="alert-danger<?=$res2['id']?>" style="display:none">Somthing error. Value not saved.</div>
                <form id="popForm<?=$res2['id']?>" method="post" class="" action="">
				<input type="hidden" name="id" value="<?=$res2['id']?>" />
				<input type="hidden" name="action" value="edit" />
				<div class="row">
                    <div class="form-group col-12">
                        <label>Country Name</label>
                            <input type="text" class="form-control" name="name" value="<?=$res2['name'];?>" />
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
						$('#popForm<?=$res2['id']?>').validate({
								rules: {
									name: {
										required: true,
									},
								},
								messages: {
									name: "Country name is required",
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
                                    url: 'process/country_process.php',
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Service</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
							<div class="alert alert-success" style="display:none">Data Saved Successfully.</div>
							<div class="alert alert-danger" style="display:none">Somthing error. Value not saved.</div>
                <form id="popForm" method="post" class="" action="">
				<input type="hidden" name="action" value="add" />
				<div class="row">
                    <div class="form-group col-12">
                        <label>Service Name</label>
                            <input type="text" class="form-control" name="name" />
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
<?php include_once("foot.php");	?>

<script src="theme/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {

	$("#mydataTable").DataTable({
			 "responsive": true,
			 "autoWidth": true,
			// "scrollY": true,
			//"scrollX": true,
			// dom: 'Bfprt',
			buttons: [{
				extend: 'excel',
				title: 'Source Report',
				messageTop: 'Source Data'
			}]

        });

    $('#popForm').validate({
			rules: {
				name: {
					required: true,
				},

			},
			messages: {
				name: "Country name is required",
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
					url: 'process/country_process.php',
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
						url: "<?php echo $base_url;?>/process/country_process.php",
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