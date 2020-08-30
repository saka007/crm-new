<?php
include_once("header.php");	
?>
<div class="col-sm-10">
	<h4 class="mb-3" style="color:#2cb674;">Leave Management <a href="javascript:void(0);" class="btn btn-info pull-right" data-toggle="modal" data-target="#newForm"  style="background:#2cb674;">Add New <i class="fa fa-plus"></i></a></h4>
			<table class="table table-striped table-bordered" id="dataTables-Table" style="width:100%">
				<thead>
					<tr>
					  <th>From Date</th>
					  <th>To Date</th>
					  <th>Type</th>
					  <th>Approve</th>
					  <th>Apply Date</th>
					  <th>Remark</th>
					  <th>File</th>
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
				 <td><a href="uploads/hr_docs/<?=$res2['file'];?>" target="_blank"><?=$res2['file'];?></a></td>
				 <td style="text-align:right" >
				 <?php if(strtotime($res2['fromDate']) >= strtotime(date('Y-m-d'))) {?>
					 <a href="javascript:void(0);" data-toggle="modal" data-target="#editForm<?=$res2['id']?>" class="btnEditAction"><i class="fa fa-edit" title="EDIT"></i></a>
					 <a href="javascript:void(0);" id="<?=$res2['id'];?>" class="btnDeleteAction"><i class="fa fa-trash" title="DELETE"></i></a> 
					 <?php } ?>
				 </td>   
				</tr>

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
                            <input type="text" class="form-control" name="fromDate" id="fromDate" value="<?=date('d-m-Y',strtotime($res2['fromDate']));?>" />
                    </div>
                    <div class="form-group col-sm-3">
                        <label>Leave To</label>
                            <input type="text" class="form-control" name="toDate" id="toDate" value="<?=date('d-m-Y',strtotime($res2['toDate']));?>" />
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

$('#popForm<?=$res2['id']?>').formValidation({
framework: 'bootstrap',
excluded: ':disabled',
icon: {
valid: 'fa fa-ok',
invalid: 'fa fa-remove',
validating: 'fa fa-refresh'
},
fields: {
          Leave: { validators: { notEmpty: { message: 'Leave is required' }}},
            dob: { validators: { notEmpty: { message: 'Date is required' }}},
            asignTo: { validators: { notEmpty: { message: 'Assign is required' }}}
}
})
.on('success.form.fv', function(e) {
 var formData = new FormData($('#popForm<?=$res2['id']?>')[0]);
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
                            <input type="text" class="form-control" name="fromDate" id="fromDate2" />
                    </div>
                    <div class="form-group col-sm-3">
                        <label>Leave To</label>
                            <input type="text" class="form-control" name="toDate" id="toDate2" />
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
                    <div class="form-group col-sm-3">
                        <label>Approve By</label>
                            <input type="text" class="form-control" name="approvBy"  />
                    </div>
                    <div class="form-group col-sm-4">
                        <label>Document to be Uploaded:</label>
                            <input type="file" class="form-control" name="file"  />
                    </div>

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

<?php 	include_once("footer.php");	?>

	<script src="js/formvalidation.js"></script>
<script>
$(document).ready(function() {
	$('#fromDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
	$('#toDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true});
	$('#fromDate2').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
	$('#toDate2').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
	$('#popForm').formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: 'fa fa-ok',
            invalid: 'fa fa-remove',
            validating: 'fa fa-refresh'
        },
        fields: {
           fromDate: { validators: { notEmpty: { message: 'From Date is required' }}},
            toDate: { validators: { notEmpty: { message: 'To Date is required' }}},
            fromDate2: { validators: { notEmpty: { message: 'From Date is required' }}},
            toDate2: { validators: { notEmpty: { message: 'To Date is required' }}},
            type: { validators: { notEmpty: { message: 'Leave Type is required' }}},
            approvBy: { validators: { notEmpty: { message: 'Approve By is required' }}}
        }
    })
	.on('success.form.fv', function(e) {
           e.preventDefault();
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