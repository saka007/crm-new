<?php

include_once("header.php");	

?>

<div class="col-sm-10">

	<h4 class="mb-3" style="color:#2cb674;">Branch Management <a href="javascript:void(0);" class="btn btn-info pull-right" data-toggle="modal" data-target="#newForm"  style="background:#2cb674;">Add New <i class="fa fa-plus"></i></a></h4>



			<table class="table table-striped table-bordered" id="dataTables-Table" style="width:100%">

				<thead>

					<tr>

					  <th>Branch Name</th>

					  <th>Region</th>

					  <th>Address</th>

					  <th>Email</th>

					  <th>Phone</th>

					  <th style="text-align:right">Action</th>

					</tr>

				</thead>

				<tbody>

				<?php

				$i=1;

				$re=$obj->display("dm_branch","status=1 order by name ASC"); 	

				while($res2=$re->fetch_array())

				{ 

				$r=$obj->display("dm_region","id=".$res2['region']); $r2=$r->fetch_array();

				?>  

				<tr id="item-<?=$res2['id']?>">

				 <td><?=$res2['name'];?></td>

				 <td><?=$r2['name'];?></td>

				 <td><?=$res2['address'];?></td>

				 <td><?=$res2['email'];?></td>

				 <td><?=$res2['mobile'];?></td>



					 <td style="text-align:right" >

					 <a href="javascript:void(0);" data-toggle="modal" data-target="#editForm<?=$res2['id']?>" class="btnEditAction"><i class="fa fa-edit" title="EDIT"></i></a>

					 <a href="javascript:void(0);" id="<?=$res2['id'];?>" class="btnDeleteAction"><i class="fa fa-trash" title="DELETE"></i></a> 

				 </td>   

				</tr>

				

<div class="modal fade" id="editForm<?=$res2['id']?>" tabindex="-1" role="dialog" >

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-header">

<h4 class="modal-title">Edit Branch</h4>

<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>

</div>



<div class="modal-body">

			<div class="alert alert-success" id="alert-success<?=$res2['id']?>" style="display:none">Data Saved Successfully.</div>

			<div class="alert alert-danger" id="alert-danger<?=$res2['id']?>" style="display:none">Somthing error. Value not saved.</div>

<form id="popForm<?=$res2['id']?>" method="post" class="" action="">

<input type="hidden" name="id" value="<?=$res2['id']?>" />

<input type="hidden" name="action" value="edit" />

<div class="row">

	<div class="form-group col-6">

		<label>Name</label>

			<input type="text" class="form-control" name="name" value="<?=$res2['name']?>" />

	</div>

	<div class="form-group col-6">

		<label>Region</label>

			<select type="text" class="form-control" name="region" >

			<?php

				$reg=$obj->display("dm_region","status=1 order by name ASC"); 	

				while($reg2=$reg->fetch_array())

				{ 

				?>  

				<option value="<?php echo $reg2['id'];?>" <?php if($reg2['id']==$res2['region']) { echo 'selected="selected"';}?> ><?php echo $reg2['name'];?></option>

				<?php } ?>

			</select>

	</div>

	

	<div class="form-group col-12">

		<label>Address</label>

			<textarea class="form-control" name="address"><?=$res2['address']?></textarea>

	</div>

	<div class="form-group col-6">

		<label>Email</label>

			<input type="email" class="form-control" name="email" value="<?=$res2['email']?>" />

	</div>

	<div class="form-group col-6">

		<label>Phone No.</label>

			<input type="text" class="form-control" name="mobile" value="<?=$res2['mobile']?>" />

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

$('#popForm<?=$res2['id']?>').formValidation({

framework: 'bootstrap',

excluded: ':disabled',

icon: {

valid: 'fa fa-ok',

invalid: 'fa fa-remove',

validating: 'fa fa-refresh'

},

fields: {

            name: { validators: { notEmpty: { message: 'The name is required' }}},

            region: { validators: { notEmpty: { message: 'The name is required' }}},

            address: { validators: { notEmpty: { message: 'The name is required' }}},

            mobile: { validators: { notEmpty: { message: 'The name is required' }}},

            email: { validators: { notEmpty: { message: 'The name is required' }}}

}

})

.on('success.form.fv', function(e) {

// Prevent form submission

e.preventDefault();

// Use Ajax to submit form data

$.ajax({

url: 'process/branch_process.php',

type: 'POST',

dataType: 'json',

data: $('#popForm<?=$res2['id']?>').serialize(),

success: function(result) { 

	if(result.status=='success')

	{

	$('#alert-success<?=$res2['id']?>').css('display','block');

	setTimeout(function(){ $('#alert-success<?=$res2['id'];?>').css('display','none');},2000);

	setTimeout(function(){ location.reload();},2000);

	}

	else

	{

	$('#alert-danger<?=$res2['id']?>').css('display','block');

	setTimeout(function(){ $('#alert-danger<?=$res2['id'];?>').css('display','none');},3000);

	}

}

});

});



});



</script>											

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

                <h4 class="modal-title">New Branch</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>

            </div>

            <div class="modal-body">

							<div class="alert alert-success" style="display:none">Data Saved Successfully.</div>

							<div class="alert alert-danger" style="display:none">Somthing error. Value not saved.</div>

                <form id="popForm" method="post" class="" action="">

				<input type="hidden" name="action" value="add" />

				<div class="row">

                    <div class="form-group col-6">

                        <label>Name</label>

                            <input type="text" class="form-control" name="name" />

                    </div>

                    <div class="form-group col-6">

                        <label>Region</label>

                            <select type="text" class="form-control" name="region" >

							<option value="">Select</option>

							<?php

								$reg=$obj->display("dm_region","status=1 order by name ASC"); 	

								while($reg2=$reg->fetch_array())

								{ 

								?>  

								<option value="<?php echo $reg2['id'];?>"><?php echo $reg2['name'];?></option>

								<?php } ?>

							</select>

                    </div>

					

                    <div class="form-group col-12">

                        <label>Address</label>

                            <textarea class="form-control" name="address"></textarea>

                    </div>

                    <div class="form-group col-6">

                        <label>Email</label>

                            <input type="email" class="form-control" name="email" />

                    </div>

                    <div class="form-group col-6">

                        <label>Phone No.</label>

                            <input type="text" class="form-control" name="mobile" />

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

            name: { validators: { notEmpty: { message: 'The name is required' }}},

            region: { validators: { notEmpty: { message: 'The name is required' }}},

            address: { validators: { notEmpty: { message: 'The name is required' }}},

            mobile: { validators: { notEmpty: { message: 'The name is required' }}},

            email: { validators: { notEmpty: { message: 'The name is required' }}}

        }

    })

	.on('success.form.fv', function(e) {

           e.preventDefault();
            $.ajax({
                url: 'process/branch_process.php',
                type: 'POST',
				dataType: 'json',
                data: $('#popForm').serialize(),
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

						url: "<?php echo $base_url;?>/process/branch_process.php",

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