<?php
include_once("header.php");	

?>
<script src="js/formvalidation.js"></script>

<div class="col-sm-10">

	<h4 class="mb-3" style="color:#2cb674;">Expense Management <a href="javascript:void(0);" class="btn btn-info pull-right" data-toggle="modal" data-target="#newForm"  style="background:#2cb674;">Add New <i class="fa fa-plus"></i></a></h4>



			<table class="table table-striped table-bordered" id="dataTables-Table" style="width:100%">

				<thead>

					<tr>


					  <th>Date</th>
					  <th>Particular</th>
					  <th>Amount</th>
					  <th>VAT</th>
					  <th>Added By</th>
					  <th>Remark</th>
					  <th style="text-align:right">Action</th>

					</tr>

				</thead>

				<tbody>
				<?php

				$i=1;

				$re=$obj->display("dm_expense","1=1 order by date DESC"); 	
				while($res2=$re->fetch_array())
				{ 
				?>  
				<tr id="item-<?=$res2['id']?>">
				 <td><?=date('d-m-Y',strtotime($res2['date']));?></td>
				 <td><?=$res2['particular'];?></td>
				 <td><?=$res2['amount'];?></td>
				 <td><?=$res2['vat'];?></td>
				 <td><?php $r=$obj->display("dm_employee","id=".$res2['addBy']); $r2=$r->fetch_array(); echo $r2['name'];?></td>
				 <td><?=$res2['remark'];?></td>
				 <td>

					 <a href="javascript:void(0);" data-toggle="modal" data-target="#editForm<?=$res2['id']?>" class="btnEditAction"><i class="fa fa-edit" title="EDIT"></i></a>

					 <a href="javascript:void(0);" id="<?=$res2['id'];?>" class="btnDeleteAction"><i class="fa fa-trash" title="DELETE"></i></a> 
					 
<div class="modal fade" id="editForm<?=$res2['id']?>" tabindex="-1" role="dialog" >
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Edit Expense</h4>
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
                        <label>particular</label>
                            <input type="text" class="form-control" name="particular" value="<?=$res2['particular']?>" />
                    </div>

		<div class="form-group col-sm-4">
		<label>Date</label>
		<input type="text" class="form-control" id="dob<?=$res2['id']?>" name="dob" value="<?=date('d-m-Y',strtotime($res2['date']))?>" />
		</div>

		
		<div class="form-group col-sm-4">
		<label>Amount</label>
		<input type="text" class="form-control" name="ppNo" value="<?=$res2['amount']?>" />
		</div>
                   <div class="form-group col-sm-4">
                       <label>VAT</label>
                           <input type="text" class="form-control" name="vat" value="<?=$res2['vat']?>" />
                   </div>
		
		<div class="form-group col-sm-12">
                       <label>Remark</label>
                           <textarea class="form-control" name="remark" id="remark" ><?=$res2['remark']?></textarea>
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
            particular: { validators: { notEmpty: { message: 'The name is required' }}},
            amount: { validators: { notEmpty: { message: 'Amount is required' }}},
            dob: { validators: { notEmpty: { message: 'Date is required' }}}
}
})
.on('success.form.fv', function(e) {
           $.ajax({
                url: 'process/expense_process.php',
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
				 </td>   

				</tr>
										

<?php $i++;} ?>

				</tbody>

			</table>

			<!-- /.table-responsive -->

</div>

                <!-- /.col-lg-12 -->

          

<div class="modal" id="newForm">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Expense</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
							<div class="alert alert-success" style="display:none">Data Saved Successfully.</div>
							<div class="alert alert-danger" style="display:none">Somthing error. Value not saved.</div>
                <form id="popForm" method="post" class="" action="">
				<input type="hidden" name="action" value="add" />
				<div class="row">
                    <div class="form-group col-sm-12">
                       <label>Particular</label>
                           <input type="text" class="form-control" name="particular" />
                   </div>
                   <div class="form-group col-sm-4">
                       <label>Date</label>
                           <input type="text" class="form-control" name="dob" id="dob" />
                   </div>
                   <div class="form-group col-sm-4">
                       <label>Amount</label>
                           <input type="text" class="form-control" name="amount" />
                   </div>
                   <div class="form-group col-sm-4">
                       <label>VAT</label>
                           <input type="text" class="form-control" name="vat" />
                   </div>
                   <div class="form-group col-sm-12">
                       <label>Remark</label>
                           <textarea class="form-control" name="remark" id="remark" ></textarea>
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
           particular: { validators: { notEmpty: { message: 'Name is required' }}},
            dob: { validators: { notEmpty: { message: 'Date is required' }}},
            amount: { validators: { notEmpty: { message: 'Amount is required' }}}
        }
    })
	.on('success.form.fv', function(e) {
           e.preventDefault();
            $.ajax({
                url: 'process/expense_process.php',
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
						url: "<?php echo $base_url;?>/process/expense_process.php",
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