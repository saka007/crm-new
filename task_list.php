<?php
include_once("header.php");	
?>
<div class="col-sm-10">
	<h4 class="mb-3" style="color:#2cb674;">Task Management <a href="javascript:void(0);" class="btn btn-info pull-right" data-toggle="modal" data-target="#newForm"  style="background:#2cb674;">Add New <i class="fa fa-plus"></i></a></h4>
			<table class="table table-striped table-bordered" id="dataTables-Table" style="width:100%">
				<thead>
					<tr>
					  <th>Task</th>
					  <th>Date</th>
					  <th>Assign To</th>
					  <th>Status</th>
					  <th style="text-align:right">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$i=1;
				$re=$obj->display("dm_task","asignBy=".$_SESSION['ID']); 	
				while($res2=$re->fetch_array())
				{ 
				$r=$obj->display("dm_employee","id=".$res2['asignTo']); $r2=$r->fetch_array();
				?>  
				<tr id="item-<?=$res2['id']?>">
				 <td><?=$res2['task'];?></td>
				 <td><?=date('d-m-Y',strtotime($res2['dob']));?></td>
				 <td><?=$r2['name'];?></td>
				 <td><?php if($res2['status']==1) { echo "DONE";}?></td>
				 <td style="text-align:right" >
				 <?php if(strtotime($res2['dob']) >= strtotime(date('Y-m-d'))) {?>
					 <a href="javascript:void(0);" data-toggle="modal" data-target="#editForm<?=$res2['id']?>" class="btnEditAction"><i class="fa fa-edit" title="EDIT"></i></a>
					 <a href="javascript:void(0);" id="<?=$res2['id'];?>" class="btnDeleteAction"><i class="fa fa-trash" title="DELETE"></i></a> 
					 <?php } ?>
				 </td>   
				</tr>

<div class="modal fade" id="editForm<?=$res2['id']?>" tabindex="-1" role="dialog" >
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Edit Task</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
</div>

<div class="modal-body">
			<div class="alert alert-success" id="alert-success<?=$res2['id']?>" style="display:none">Data Saved Successfully.</div>
			<div class="alert alert-danger" id="alert-danger<?=$res2['id']?>" style="display:none">Somthing error. Value not saved.</div>
<form id="popForm<?=$res2['id']?>" method="post" class="" action="" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?=$res2['id']?>" />
<input type="hidden" name="action" value="edit" />
	<div class="row">
		<div class="form-group col-sm-12">
			<label>Task</label>
			<input type="text" class="form-control" name="task" value="<?=$res2['task']?>" />
		</div>
		<div class="form-group col-sm-6">
			<label>Date</label>
			<input type="text" class="form-control" name="dob" id="dob<?=$res2['id']?>" value="<?=date('d-m-Y',strtotime($res2['dob']))?>" />
		</div>
		<div class="form-group col-sm-6">
			<label>Assign To</label>
			<select type="text" class="form-control" name="asignTo" >
			<?php
			$reg=$obj->display("dm_employee","status=1 and id!=1 and id!=".$_SESSION['ID']." order by name ASC"); 	
			while($reg2=$reg->fetch_array())
			{ 
			?>  
			<option value="<?php echo $reg2['id'];?>" <?php if($reg2['id']==$res2['role']) { echo 'selected="selected"';}?> ><?php echo $reg2['name'];?></option>
			<?php } ?>
			</select>
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

$('#popForm<?=$res2['id']?>').formValidation({
framework: 'bootstrap',
excluded: ':disabled',
icon: {
valid: 'fa fa-ok',
invalid: 'fa fa-remove',
validating: 'fa fa-refresh'
},
fields: {
          task: { validators: { notEmpty: { message: 'Task is required' }}},
            dob: { validators: { notEmpty: { message: 'Date is required' }}},
            asignTo: { validators: { notEmpty: { message: 'Assign is required' }}}
}
})
.on('success.form.fv', function(e) {
 var formData = new FormData($('#popForm<?=$res2['id']?>')[0]);
           $.ajax({
               url: 'process/task_process.php',
                type: 'POST',
				enctype: 'multipart/form-data',
				dataType: 'json',
               data: formData,
			   processData: false,
            	contentType: false,
           		 cache: false,
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
    <div class="modal-dialog modal-lg" >
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
                    <div class="form-group col-sm-12">
                       <label>Task</label>
                            <input type="text" class="form-control" name="task" />
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Date</label>
                            <input type="text" class="form-control" name="dob" id="dob" />
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Assign to</label>
                            <select type="text" class="form-control" name="asignTo" >
							<option value="">Select</option>
							<?php
								$reg=$obj->display("dm_employee","status=1 and id!=1 and id!=".$_SESSION['ID']." order by name ASC"); 	
								while($reg2=$reg->fetch_array())
								{ 
							?>  
								<option value="<?php echo $reg2['id'];?>"><?php echo $reg2['name'];?></option>
								<?php } ?>
						</select>
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
	$('#dob').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
	$('#popForm').formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: 'fa fa-ok',
            invalid: 'fa fa-remove',
            validating: 'fa fa-refresh'
        },
        fields: {
           task: { validators: { notEmpty: { message: 'Task is required' }}},
            dob: { validators: { notEmpty: { message: 'Date is required' }}},
            asignTo: { validators: { notEmpty: { message: 'Assign is required' }}}
        }
    })
	.on('success.form.fv', function(e) {
           e.preventDefault();
		   var formData = new FormData($('#popForm')[0]);
            $.ajax({
                url: 'process/task_process.php',
                type: 'POST',
				enctype: 'multipart/form-data',
				dataType: 'json',
               data: formData,
			   processData: false,
            	contentType: false,
           		 cache: false,
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
						url: "<?php echo $base_url;?>/process/task_process.php",
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