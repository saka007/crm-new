<?php 
include_once("header.php");	

if($_POST['particular'])
{
	if($_POST['particular']=="Re-Launching Application")
	{
		$tax=$_POST['amount']*0.05;
	}
	else{
		$tax=0;
	}
		$data = array(
					'agreeNo'  	   =>  $_GET['agreement'],
					'payMethod'  	   =>  $_POST['payMethod'],
	    			'date'    =>  date('Y-m-d'),
	    			'amount' => $_POST['amount'],
                    'Tax' => $tax,
                    'particular' => $_POST['particular']
					);
		$odr = $obj->insert('dm_3party_payment_old',$data);


	header("location:lead_extra_invoice_old.php?agreement=".$_GET['agreement'].'&receipt='.$odr);


}

if(isset($_GET['receipt'])!="" && isset($_GET['agreement'])!="")
{

	$obj->delete('dm_3party_payment','id='.$_GET['receipt']);

header("location:lead_extra_payment_old.php?lead=".$_GET['agreement']);

}

?>
		<div class="col-sm-10">

			<form action="" method="post" name="paymentForm " enctype="multipart/form-data">
			<input type="hidden" name="lead" value="<?php echo $_GET['agreement'];?>" />
		
				
				<div class="row">
					<div class="col-sm-12 form-group" style="text-align: center;">
						<h4 class="h4-color">LEAD THIRD PARTY PAYMENT</h4>
					</div>
					
				</div>

				

				<div class="col-sm-12">
					<table class="table table-bordered table-custom-pre" id="tbl">

						  <thead>

						    <tr>
						      <th scope="col" class="align-top" style="text-align: center;">Particular</th>
						      <th scope="col" class="align-top" style="text-align: center;">Amount</th>
						    </tr>

						  </thead>

						  <tbody id="eduBody_a">

						  	<tr>

							    <td><select class="form-control" id="particular" name="particular" >
								<option value="Re-Launching Application">Re-Launching Application</option>
								<option value="Government Fees">Government Fees</option>
								<option value="IELTS">IELTS</option>
								</select></td>
							    <td><input type="text" required class="form-control" id="amount1" name="amount" >
							    	<!-- <button onclick="add_a_row()" type="button" class=""> Add New </button></td> -->

						    </tr>

						  </tbody>

						</table>
				
							<table class="table">
							<tr>
								<td>Payment Mode</td>
								<td><select class="form-control" id="payMethod" name="payMethod" >
								<option value="Cash">Cash</option>
								<option value="Debit/Credit Card">Debit/Credit Card</option>
								<option value="Cheque">Cheque</option>
								<option value="DD">DD</option>
								<option value="Net Banking">Net Banking</option>
								<option value="Website">Website</option>
								</select></td>
							</tr>	
							
							</table>
							
							</div>

					<div class="col-sm-12 form-group">
					<input type="submit" name="submit" value="SUBMIT" class="btn btn-info" >
					</div> 	
			</form>
			
<hr />
<h4 class="text-center mb-3">LEAD - <?php echo $_GET['lead'];?> RECEIPT OF THIRD PARTY PAYMENT </h4>
<table class="table table-striped table-bordered" id="dataTables-Table" style="width:100%">
			  <thead>

			    <tr>
			      <th>No</th>
			      <th>Receipt No.</th>
			      <th>Date</th>
			      <th>Amount</th>
			      <th>Action</th>
			    </tr>

			  </thead>
			  <tbody>
			  <?php 
			  			$i = 1;
			  $rece=$obj->display('dm_3party_payment_old','agreeNo="'.$_GET['agreement'].'"');
			  while($rece1=$rece->fetch_array())
			  {
			  ?>
			  <tr>
						    	<td><?php echo $i; ?></td>
								<td><?php echo $rece1['id'];?></td>
								<td><?php echo date('d-m-Y',strtotime($rece1['date']));?></td>
								<td><?php echo $rece1['amount'];?></td>
								<td>
					 <a href="lead_extra_payment.php?agreement=<?=$_GET['agreement'];?>&receipt=<?=$rece1['id']?>" class="btnDeleteAction"><i class="fa fa-trash" title="CANCEL BILL"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					 <a href="lead_extra_invoice_old.php?agreement=<?=$_GET['agreement'];?>&receipt=<?=$rece1['id']?>" target="_blank" class="btnDeleteAction"><i class="fa fa-print" title="PRINT"></i></a> 
								
								</td>
			  </tr>
			  
			  <?php $i++;} ?>
			  </tbody>

			</table>			
			
			</div>
<?php 	include_once("footer.php");	?>
<script>

var x = 2;



function add_a_row(){

var row = $('<tr id="appndd_a_tr'+ x +'"><td><input type="text" required class="form-control" id="particular1" name="particular[]" ></td><td><input type="text" required class="form-control" id="amount1" name="amount[]" ><button type="button" onclick="remove_a_row('+ x +')" class="">Remove</button></td></tr>');



row.appendTo("#eduBody_a");



x++;

}

function remove_a_row(a){

		$('#appndd_a_tr'+a).remove();

}

</script>

<style>
.height {
    min-height: 150px;
}
.icon {
    font-size: 47px;
    color: #5CB85C;
}
.iconbig {
    font-size: 77px;
    color: #5CB85C;
}
.table > tbody > tr > .emptyrow {
    border-top: none;
}
.table > thead > tr > .emptyrow {
    border-bottom: none;
}
.table > tbody > tr > .highrow {
   border-top: 3px solid;
}
</style>

