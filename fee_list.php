<?php
include_once("header.php");	
?>
<div class="col-sm-10">
	<h4 class="mb-3" style="color:#2cb674;">Processing Fee Management <a href="javascript:void(0);" class="btn btn-info pull-right" data-toggle="modal" data-target="#newForm"  style="background:#2cb674;">Add New <i class="fa fa-plus"></i></a></h4>

			<table class="table table-striped table-bordered" id="dataTables-Table" style="width:100%">
				<thead>
					<tr>
					  <th>Service</th>
					  <th>Country</th>
					  <th>Upfront Fee</th>
					  <th>P.Fee</th>
					  <th>1st Month Fee</th>
					  <th>2nd Month Fee</th>
					  <th>3rd Month Fee</th>
					  <th>M.P.Fee</th>
					  <th>1st Stage Fee</th>
					  <th>2nd Stage Fee</th>
					  <th>3rd Stage Fee</th>
					  <th>S.P.Fee</th>
					  <th style="text-align:right"></th>
					</tr>
				</thead>
				<tbody>
				<?php
				$i=1;
				$re=$obj->display("dm_fee","status=1"); 	
				while($res2=$re->fetch_array())
				{ 
				$s=$obj->display("dm_service","id=".$res2['service']); $s2=$s->fetch_array();
				$c=$obj->display("dm_country_proces","id=".$res2['country']); $c2=$c->fetch_array();
				?>  
				<tr id="item-<?=$res2['id']?>">
				 <td><?=$s2['name'];?></td>
				 <td><?=$c2['name'];?></td>
				 <td><?=$res2['upfront'];?></td>
				 <td><?=$res2['prof_fee'];?></td>
				 <td><?=$res2['firstMonth'];?></td>
				 <td><?=$res2['secondMonth'];?></td>
				 <td><?=$res2['thirdMonth'];?></td>
				 <td><?=$res2['prof_fee_month'];?></td>
				 <td><?=$res2['firstStage'];?></td>
				 <td><?=$res2['secondStage'];?></td>
				 <td><?=$res2['thirdStage'];?></td>
				 <td><?=$res2['prof_fee_stage'];?></td>

					 <td style="text-align:right" >
					 <a href="javascript:void(0);" data-toggle="modal" data-target="#editForm<?=$res2['id']?>" class="btnEditAction"><i class="fa fa-edit" title="EDIT"></i></a>
					 <a href="javascript:void(0);" id="<?=$res2['id'];?>" class="btnDeleteAction"><i class="fa fa-trash" title="DELETE"></i></a> 
				 </td>   
				</tr>
				
<div class="modal fade" id="editForm<?=$res2['id']?>" tabindex="-1" role="dialog" >
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Edit Processing Fee</h4>
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
		<label>Service</label>
			<select type="text" class="form-control" name="service" >
			<?php
				$reg=$obj->display("dm_service","status=1 order by name ASC"); 	
				while($reg2=$reg->fetch_array())
				{ 
				?>  
				<option value="<?php echo $reg2['id'];?>" <?php if($reg2['id']==$res2['service']) { echo 'selected="selected"';}?> ><?php echo $reg2['name'];?></option>
				<?php } ?>
			</select>
				<input type="hidden" name="oservice" value="<?php echo $res2['service'];?>" />
	</div>
	<div class="form-group col-6">
		<label>Country</label>
			<select type="text" class="form-control" name="country" >
			<?php
				$reg=$obj->display("dm_country_proces","status=1 order by name ASC"); 	
				while($reg2=$reg->fetch_array())
				{ 
				?>  
				<option value="<?php echo $reg2['id'];?>" <?php if($reg2['id']==$res2['country']) { echo 'selected="selected"';}?> ><?php echo $reg2['name'];?></option>
				<?php } ?>
			</select>
				<input type="hidden" name="ocountry" value="<?php echo $res2['country'];?>" />
	</div>
	
	<div class="form-group col-4">
		<b>Upfront Fee</b>
		
		<div class="row">
		<div class="form-group col-12"><input type="text" name="upfront" class="form-control" value="<?php echo $res2['upfront'];?>" /></div>
		<div class="form-group col-12"><input type="text" name="prof_fee" class="form-control" placeholder="Professional Fee" value="<?php echo $res2['prof_fee'];?>" /></div>
		</div>
	</div>
	<div class="form-group col-4">
		<b>Monthly Fee</b>
		<input type="text" name="firstMonth" class="form-control" placeholder="Fisrt Month Fee" value="<?php echo $res2['firstMonth'];?>" /><br /> 
		<input type="text" name="secondMonth" class="form-control" placeholder="Second Month Fee" value="<?php echo $res2['secondMonth'];?>"  /><br /> 
		<input type="text" name="thirdMonth" class="form-control" placeholder="Third Month Fee" value="<?php echo $res2['thirdMonth'];?>"  /><br /> 
		<input type="text" name="prof_fee_month" class="form-control" placeholder="Professional Fee" value="<?php echo $res2['prof_fee_month'];?>"   />
		
	</div>
	<div class="form-group col-4">
		<b>Stage Fee</b>
		<input type="text" name="firstStage" class="form-control" placeholder="Fisrt Stage Fee" value="<?php echo $res2['firstStage'];?>"  /><br /> 
		<input type="text" name="secondStage" class="form-control" placeholder="Second Stage Fee" value="<?php echo $res2['secondStage'];?>"  /><br /> 
		<input type="text" name="thirdStage" class="form-control" placeholder="Third Stage Fee" value="<?php echo $res2['thirdStage'];?>"  /><br /> 
		<input type="text" name="prof_fee_stage" class="form-control" placeholder="Professional Fee" value="<?php echo $res2['prof_fee_stage'];?>"   />
		
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
            service: { validators: { notEmpty: { message: 'The required field' }}},
            country: { validators: { notEmpty: { message: 'The required field' }}},
            upfront: { validators: { notEmpty: { message: 'The required field' }}},
            firstMonth: { validators: { notEmpty: { message: 'The required field' }}},
            secondMonth: { validators: { notEmpty: { message: 'The required field' }}},
            thirdMonth: { validators: { notEmpty: { message: 'The required field' }}},
            firstStage: { validators: { notEmpty: { message: 'The required field' }}},
            secondStage: { validators: { notEmpty: { message: 'The required field' }}},
            thirdStage: { validators: { notEmpty: { message: 'The required field' }}}
}
})
.on('success.form.fv', function(e) {
// Prevent form submission
e.preventDefault();
// Use Ajax to submit form data
$.ajax({
url: 'process/fee_process.php',
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Processing Fee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
							<div class="alert alert-success" id="success-alert" style="display:none">Data Saved Successfully.</div>
							<div class="alert alert-danger" id="danger-alert" style="display:none">Somthing error. Value not saved.</div>
                <form id="popForm" method="post" class="" action="">
				<input type="hidden" name="action" value="add" />
				<div class="row">
	<div class="form-group col-6">
		<label>Service</label>
			<select type="text" class="form-control" name="service" >
							<option value="">Select</option>
			<?php
				$reg=$obj->display("dm_service","status=1 order by name ASC"); 	
				while($reg2=$reg->fetch_array())
				{ 
				?>  
				<option value="<?php echo $reg2['id'];?>" ><?php echo $reg2['name'];?></option>
				<?php } ?>
			</select>
			
	</div>
	<div class="form-group col-6">
		<label>Country</label>
			<select type="text" class="form-control" name="country" >
							<option value="">Select</option>
			<?php
				$reg=$obj->display("dm_country_proces","status=1 order by name ASC"); 	
				while($reg2=$reg->fetch_array())
				{ 
				?>  
				<option value="<?php echo $reg2['id'];?>" ><?php echo $reg2['name'];?></option>
				<?php } ?>
			</select>
	</div>
	
	<div class="form-group col-4">
		<b>Upfront Fee</b>
		
		<div class="row">
		<div class="form-group col-12"><input type="text" name="upfront" class="form-control" placeholder="Retainer Fee" /></div>
		<div class="form-group col-12"><input type="text" name="prof_fee" class="form-control" placeholder="Professional Fee" /></div>
		</div>
		
	</div>
	<div class="col-4">
		<b>Monthly Fee</b>
		<div class="row">
		<div class="form-group col-12"><input type="text" name="firstMonth" class="form-control" placeholder="Fisrt Month Fee" /></div>
		<div class="form-group col-12"><input type="text" name="secondMonth" class="form-control" placeholder="Second Month Fee"  /></div>
		<div class="form-group col-12"><input type="text" name="thirdMonth" class="form-control" placeholder="Third Month Fee"  /></div>
		<div class="form-group col-12"><input type="text" name="prof_fee_month" class="form-control" placeholder="Professional Fee"  /></div>
		</div>
	</div>
	<div class="form-group col-4">
		<b>Stage Fee</b>
		<div class="row">
		<div class="form-group col-12"><input type="text" name="firstStage" class="form-control" placeholder="Fisrt Stage Fee"  /></div> 
		<div class="form-group col-12"><input type="text" name="secondStage" class="form-control" placeholder="Second Stage Fee"  /></div>
		<div class="form-group col-12"><input type="text" name="thirdStage" class="form-control" placeholder="Third Stage Fee"  /></div>
		<div class="form-group col-12"><input type="text" name="prof_fee_stage" class="form-control" placeholder="Professional Fee"  /></div>
		</div>
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
            service: { validators: { notEmpty: { message: 'The required field' }}},
            country: { validators: { notEmpty: { message: 'The required field' }}},
            upfront: { validators: { notEmpty: { message: 'The required field' }}},
            firstMonth: { validators: { notEmpty: { message: 'The required field' }}},
            secondMonth: { validators: { notEmpty: { message: 'The required field' }}},
            thirdMonth: { validators: { notEmpty: { message: 'The required field' }}},
            firstStage: { validators: { notEmpty: { message: 'The required field' }}},
            secondStage: { validators: { notEmpty: { message: 'The required field' }}},
            thirdStage: { validators: { notEmpty: { message: 'The required field' }}}
        }
    })
	.on('success.form.fv', function(e) {
           e.preventDefault();
            $.ajax({
                url: 'process/fee_process.php',
                type: 'POST',
				dataType: 'json',
                data: $('#popForm').serialize(),
                success: function(result) { 
					if(result.status=='success')
					{
					$('#success-alert').css('display','block');
					setTimeout(function(){ $('#success-alert').css('display','none');},2000);
					setTimeout(function(){ location.reload();},2000);
					}
					else
					{
					$('#danger-alert').html(result.msg);
					$('#danger-alert').css('display','block');
					setTimeout(function(){ $('#danger-alert').css('display','none');},3000);
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
						url: "<?php echo $base_url;?>/process/fee_process.php",
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