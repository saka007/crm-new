<?php 
include_once("header.php");
$lead=$obj->display('dm_lead','id='.$_GET['lead']);
$lead1=$lead->fetch_array();
$r=$lead1['region'];
$s=$lead1['service_interest'];
// $m=$lead1['market_source'];

if($_POST['payAmt'])
{

$p=$obj->display('dm_lead','id='.$_POST['lead']); $p1=$p->fetch_array();

$paidYet = $p1['paidYet']+$_POST['payAmt'];
$payBalance = $p1['payBalance']-$_POST['payAmt'];
if($p1['paidYet']==0)
{
	$data = array(
    			"agreeDate" => date('Y-m-d'),
				"status" => 'Active'
				);
	$obj->update('dm_lead',$data,'id='.$_POST['lead']);
}
/*if($payBalance==0)
{
	$data3 = array(
    			"stepComplete" => 4
				);
	$obj->update('dm_lead',$data3,'id='.$_POST['lead']);
}*/
	$data = array(
    			"paidYet" => $paidYet,
    			"payBalance" => $payBalance,
    			"demandAmt" => $_POST['nextPayAmt'],
    			"demdRemark" => $_POST['demdRemark'],
    			"dueDate" => date('Y-m-d',strtotime($_POST['nextPayDate']))
				);
	$obj->update('dm_lead',$data,'id='.$_POST['lead']);


	$data2 = array(
    			"leadId" =>  $_POST['lead'],
    			"amount" => $_POST['payAmt'],
    			"tax" => $_POST['taxAmt'],
    			"payMethod" => $_POST['payMethod'],
    			"payCategory" => $_POST['payCategory'],
    			"date" => date('Y-m-d')
				);
	$recipt=$obj->insert('dm_pay_history',$data2);

$gh=$obj->display('dm_lead_contract','leadId='.$_POST['lead']);
if($gh->num_rows == 0)
{
			$dataSheet = array(
					'leadId'  	 =>  $_POST['lead'],
	    			'contract'   =>  ''
	    			);
			$obj->insert('dm_lead_contract',$dataSheet);
}

	header("location:lead_payment_invoice.php?lead=".$_POST['lead'].'&receipt='.$recipt);


}

$lead=$obj->display('dm_lead','id='.$_GET['lead']);
$lead1=$lead->fetch_array();

$cont=$obj->display('dm_contract_file','country='.$lead1['country_interest'].' and service='.$lead1['service_interest']);
$cont1=$cont->fetch_array();


?>
		<div class="col-sm-10">

			<form action="" method="post" name="paymentForm " enctype="multipart/form-data">
			<input type="hidden" name="lead" value="<?php echo $_GET['lead'];?>" />
		<input type="hidden" id="address" name="address" value="<?php echo $lead1['address'];?>" />
		
				
				<div class="row">
					<div class="col-sm-12 form-group" style="text-align: center;">
						<h4 class="h4-color">LEAD PAYMENT</h4>
					</div>
					
				</div>
 
				

				<div class="col-sm-12">
							<table class="table">
							<tr>
								<td>Fee Category</td>
								<td><select name="payCategory" class="form-control">
								<option value="Retainer">Retainer</option>
								<option value="Professional">Professional</option>
								</select></td>
								
								<td>Payment Mode</td>
								<td><select class="form-control" id="payMethod" name="payMethod" >
								<option value="Cash">Cash</option>
								<option value="Cheque">Cheque</option>
								<option value="DD">DD</option>
								<option value="Net Banking">Net Banking</option>
								<option value="Debit / Credit Card">Debit / Credit Card </option>
								<option value="Website">Website</option>
								</select></td>
							</tr>	
							<tr>
							<td colspan="4" style="padding:0; border:none">
							<table><tr>
								<td>Payment Total</td>
								<td><input type="text" class="form-control" id="payTotal" name="payTotal" value="<?php echo $lead1['payTotal'];?>" readonly=""  ></td>

								<td>Discount</td>
								<td><input type="text" class="form-control" id="payTotal" name="payTotal" value="<?php echo $lead1['discount'];?>" readonly="" ></td>
							
								<td>Payment Balance</td>
								<td><input type="text" class="form-control" id="payBalance" name="payBalance" value="<?php echo $lead1['payBalance'];?>" readonly=""  ></td>
							</tr>
							</table>
							</td>	
							</tr>
							<tr><td>Select VAT for which country</td>
							<td>
								<select class="form-control" id="Vatvalue" name="Vatvalue" disabled="">
								<option value="0" <?php if ($r =="7"){echo " selected";}?>>QATAR</option>
								<option value="5" <?php if ($r !="6" && $r != "7"){echo " selected";}?>>UAE</option>
								<option value="18" <?php if ($r =="6"){echo " selected";}?>>INDIA</option>
								<option value="0" <?php if ($r =="8"){echo " selected";}?>>OMAN</option>
								<!-- <option value="0" <?php if ($m =="23" || $m == "24" || $m == "25" || $m == "26"){echo " selected";}?>>Saudi</option> -->
							</select>
							</td></tr>
							
							<tr>
								<td>Pay Amount</td>
								<td><input type="text" class="form-control" id="payAmt" name="payAmt" min="0" max="<?=$lead1['payBalance'];?>" required></td>
							
								<td>VAT</td>
								<td><input type="text" class="form-control" id="taxAmt" name="taxAmt"  readonly="" required></td>
							</tr>	
							<tr>
								<td>Total Pay Amount</td>
								<td><input type="text" class="form-control" id="totPayAmt" name="totPayAmt"  readonly="" required></td>
								<td>Balance Amount</td>
								<td><input type="text" class="form-control" id="totBalance" name="totBalance"  readonly="" required></td>
							</tr>	
							</table>
							<table id="nextTr" class="table">
							<tr>
								<td>Next Pay Amount</td>
								<td><input type="text" class="form-control" id="nextPayAmt" name="nextPayAmt" min="0" max="" ></td>
							
								<td>Next Pay Date</td>
								<td><input type="text" class="form-control" id="nextPayDate" name="nextPayDate" ></td>
							</tr>	
							<tr>
								<td>Remark</td>
								<td colspan="3"><textarea type="text" class="form-control" id="demdRemark" name="demdRemark" ></textarea></td>

							</tr>
							</table>
							</div>

					<div class="col-sm-12 form-group">
					<input type="submit" name="submit" value="SUBMIT" class="btn btn-info" >
					</div> 	
			</form>
			
			
			
			</div>
<?php 	include_once("footer.php");	?>
   <script>
   	var region=<?php echo $r;?>;
$(function(){
$('#nextTr').hide(); 
$('#nextPayDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
$('#payAmt').blur(function(){
var amt= $(this).val();
var bal= $('#payBalance').val();
var vat= $('#Vatvalue').val();
bal=parseFloat(bal)-parseFloat(amt);

var tax = parseFloat(amt)*0.01*parseFloat(vat);
// var tax;

// if (vat=1)
// {
// 	tax=0;
// }
// else
// {
// 	tax = parseFloat(amt)*0.01*parseFloat(vat);
// }
var tot = parseFloat(amt)+parseFloat(tax);

if(bal > 0) { 
	$('#nextTr').show(); 
	$("#nextPayAmt").prop('required',true); 
	$("#nextPayDate").prop('required',true); 
	$('#nextPayAmt').attr("max",bal);
}
else
{
	$('#nextTr').hide(); 
	$("#nextPayAmt").prop('required',false); 
	$("#nextPayDate").prop('required',false); 
	$('#nextPayAmt').attr("max",bal);
}
<?php if ($p1['novat']==0){ ?>
$('#taxAmt').val(tax);
<?php } 
if ($p1['novat']==1){
?>
$('#taxAmt').val(0);
<?php } ?>
// console.log($("#address").val());
// $('#taxAmt').val((region==3&&(!($("#address").val().toLowerCase().includes("dubai")) && !($("#address").val().toLowerCase().includes("dxb")) && !($("#address").val().toLowerCase().includes("uae")))) ||  (region==5&&(!($("#address").val().toLowerCase().includes("sharjah")) && !($("#address").val().toLowerCase().includes("shj")) && !($("#address").val().toLowerCase().includes("uae")) &&
// !$("#address").val().toLowerCase().includes("dubai"))) ||  (region==4&&(!$("#address").val().toLowerCase().includes("abu dhabi") && !$("#address").val().toLowerCase().includes("dubai") && !$("#address").val().toLowerCase().includes("AUH") && !$("#address").val().toLowerCase().includes("uae"))) ?0:tax);
$('#totPayAmt').val(tot);
$('#totBalance').val(bal);

});
}); 
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

