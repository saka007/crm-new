<?php

include_once("header.php");	

?>

<div class="col-sm-10">

	<h4 class="mb-3" style="color:#2cb674;">Upload Observation Sheet<a href="javascript:void(0);" class="btn btn-info pull-right" data-toggle="modal" data-target="#newForm"  style="background:#2cb674;">Add New <i class="fa fa-plus"></i></a></h4>



			<table class="table table-striped table-bordered" id="dataTables-Table" style="width:100%">

				<thead>

					<tr>

					  <th>Program</th>

					  <th>Country</th>

					  <th>File</th>

					  <th style="text-align:right">Action</th>

					</tr>

				</thead>

				<tbody>

				<?php

				$i=1;

				$re=$obj->display("dm_observation_file","status=1 order by id ASC"); 	

				while($res2=$re->fetch_array())

				{ 

				$con=$obj->display("dm_country_proces","id=".$res2['country']); $con1=$con->fetch_array();

				$pro=$obj->display("dm_service","id=".$res2['service']); $pro1=$pro->fetch_array();

				?>  

				<tr id="item-<?=$res2['id']?>">

				 <td><?=$pro1['name'];?></td>

				 <td><?=$con1['name'];?></td>

				 <td><a href="uploads/documents/<?=$res2['file'];?>" target="_blank"><?=$res2['file'];?></a></td>



					 <td style="text-align:right" >

					 <a href="javascript:void(0);" id="<?=$res2['id'];?>" class="btnDeleteAction"><i class="fa fa-trash" title="DELETE"></i></a> 

				 </td>   

				</tr>

											

<?php $i++;} ?>

				</tbody>

			</table>

			<!-- /.table-responsive -->

</div>

                <!-- /.col-lg-12 -->

          

<div class="modal" id="newForm">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title">New Observation Sheet</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>

            </div>

            <div class="modal-body">

							<div class="alert alert-success" style="display:none">Data Saved Successfully.</div>

							<div class="alert alert-danger" style="display:none">Somthing error. Value not saved.</div>

                <form id="popForm" method="post" class="" action="" enctype="multipart/form-data">

				<input type="hidden" name="action" value="add" />

				<div class="row">

                    <div class="form-group col-6">

                        <label>Country</label>

                            <select type="text" class="form-control" name="country" >

							<option value="">Select</option>

							<?php

								$reg=$obj->display("dm_country_proces","status=1 order by name ASC"); 	

								while($reg2=$reg->fetch_array())

								{ 

								?>  

								<option value="<?php echo $reg2['id'];?>"><?php echo $reg2['name'];?></option>

								<?php } ?>

							</select>

                    </div>

                    <div class="form-group col-6">

                        <label>Program</label>

                            <select type="text" class="form-control" name="program" >

							<option value="">Select</option>

							<?php

								$reg=$obj->display("dm_service","status=1 order by name ASC"); 	

								while($reg2=$reg->fetch_array())

								{ 

								?>  

								<option value="<?php echo $reg2['id'];?>"><?php echo $reg2['name'];?></option>

								<?php } ?>

							</select>

                    </div>

					

                    <div class="form-group col-12">

                        <label>Observation Sheet</label>

							<input type="file" name="avatar" id="avatar" class="form-control" /> 

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

<?php 	include_once("footer.php");	?>

	<script src="js/formvalidation.js"></script>



<script>



$(document).ready(function() {

    $('#popForm').formValidation({

        framework: 'bootstrap',

        excluded: ':disabled',

        icon: {

            valid: 'fa fa-ok',

            invalid: 'fa fa-remove',

            validating: 'fa fa-refresh'

        },

        fields: {
            country: { validators: { notEmpty: { message: 'Required field' }}},
            program: { validators: { notEmpty: { message: 'Required field' }}},
            avatar: { validators: { notEmpty: { message: 'Required field' },
                        file: {
                            extension: 'doc,docx,pdf',
                            type: 'application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf',
                            message: 'Only pdf,doc or docx file'
                        }}}
        }

    })

	.on('success.form.fv', function(e) {

           e.preventDefault();

			var form_data = new FormData(this);

            $.ajax({

                url: 'process/file_process.php',

                type: 'POST',

				dataType: 'json',

                data: form_data,

				cache: false,

       			contentType: false,

        		processData: false,

                success: function(result) { 

					if(result.status=='success')

					{

					$('.alert-success').css('display','block');

					setTimeout(function(){ $('.alert-success').css('display','none');},1000);

					setTimeout(function(){ location.reload();},1000);

					}

					else

					{

					$('.alert-danger').css('display','block');

					setTimeout(function(){ $('.alert-danger').css('display','none');},1000);

					}

               }

            });

        });



	$('body').on('click','.btnDeleteAction',function(){ 

				 var tr = $(this).closest('tr');

					del_id = $(this).attr('id');

		if(confirm("Want to delete this?"))

		{ 

					$.ajax({

						url: "<?php echo $base_url;?>/process/file_process.php",

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