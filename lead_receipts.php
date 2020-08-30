<?php include_once("header.php");	

?>
	<script src="js/formvalidation.js"></script>


		<div class="col-sm-10">
<div class="row"><div class="col-sm-12"><h4 class="mb-3" style="color:#2cb674;">Payment Receipt</h4></div></div>

			<table class="table table-striped table-bordered" id="dataTables-Table" style="width:100%">
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
			  $rece=$obj->display('dm_pay_history','leadId='.$_GET['lead'].' and status=1');
			  while($rece1=$rece->fetch_array())
			  {
			  ?>
			  <tr>
						    	<td><?php echo $i; ?></td>
								<td><?php echo $rece1['id'];?></td>
								<td><?php echo date('d-m-Y',strtotime($rece1['date']));?></td>
								<td><?php echo $rece1['amount'];?></td>
								<td><?php echo $rece1['payCategory'];?></td>
								<td>
<?php 
if($_SESSION["TYPE"]=="SA")
{
?>
					<a href="javascript:void(0);" data-toggle="modal" data-target="#editForm<?=$rece1['id']?>" class="btnDeleteAction"><i class="fa fa-trash" title="CANCEL BILL"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php } ?>					
					 <a href="lead_payment_invoice.php?lead=<?=$_GET['lead'];?>&receipt=<?=$rece1['id']?>" target="_blank" class="btnDeleteAction"><i class="fa fa-print" title="PRINT"></i></a> 
								
								</td>
			  </tr>

<div class="modal fade" id="editForm<?=$rece1['id']?>" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Receipt</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
							<div class="alert alert-success" id="alert-success<?=$rece1['id']?>" style="display:none">Data Saved Successfully.</div>
							<div class="alert alert-danger" id="alert-danger<?=$rece1['id']?>" style="display:none">Somthing error. Value not saved.</div>
                <form id="popForm<?=$rece1['id']?>" method="post" class="" action="">
				<input type="hidden" name="receipt" value="<?=$rece1['id']?>" />
				<input type="hidden" name="lead" value="<?=$_GET['lead']?>" />
				<input type="hidden" name="action" value="delete" />
				<div class="row">
                    <div class="form-group col-12">
                        <label>Remark</label>
                            <textarea type="text" class="form-control" name="remark" /></textarea>
                    </div>
				</div>
				<div class="row">
                       <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary" >DELETE</button>
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
    $('#popForm<?=$rece1['id']?>').formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: 'fa fa-ok',
            invalid: 'fa fa-remove',
            validating: 'fa fa-refresh'
        },
        fields: {}
    })
	.on('success.form.fv', function(e) {
            // Prevent form submission
            e.preventDefault();
            // Use Ajax to submit form data
            $.ajax({
                url: 'process/receipt_process.php',
                type: 'POST',
				dataType: 'json',
                data: $('#popForm<?=$rece1['id']?>').serialize(),
                success: function(result) { 
					if(result.status=='success')
					{
					$('#alert-success<?=$rece1['id']?>').css('display','block');
					setTimeout(function(){ $('#alert-success<?=$rece1['id'];?>').css('display','none');},2000);
					setTimeout(function(){ location.reload();},2000);
					}
					else
					{
					$('#alert-danger<?=$rece1['id']?>').css('display','block');
					setTimeout(function(){ $('#alert-danger<?=$rece1['id'];?>').css('display','none');},3000);
					}
               }
            });
        });
});

</script>			

			  
			  <?php $i++;} ?>
			  </tbody>

			</table>
	
		</div>
<?php include_once("footer.php"); ?>

