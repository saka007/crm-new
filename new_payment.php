<?php
include_once("head.php");

$lead=$obj->display('dm_lead','id='.$_GET['lead']);
if($lead->num_rows > 0) {
$lead1=$lead->fetch_array();
}

$paidyetac=$lead1['paidYet']+$_POST['payAmt'];

if ($_POST){

$data = array(
	"payTotal" => $_POST['payTotal'],
	"discount" => $_POST['disc'],
	"paidYet" => $paidyetac,
	"payBalance" => $_POST['totBalance'],
	"demandAmt" => $_POST['nextPayAmt'],
	"demdRemark" => $_POST['demdRemark'],
	'feeAgreeDate' => date('Y-m-d'),
	'agreeDate' => date('Y-m-d'),
	'payType' => $_POST['payCategory'],
	"status" => 'Active',
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

?>

    <!-- Begin Page Content -->
    <div class="content-wrapper">
    <section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Lead Payment Management</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
						<li class="breadcrumb-item active">Lead Payment Management</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<!-- /.card -->
					<div class="card card-primary">
						<div class="card-header">
                           <h4 class="mb-3">PAYMENT DETAILS</h4>
						</div>
						<!-- /.card-header -->
						<div class="card-body">

              <form action="" method="post" name="paymentForm " enctype="multipart/form-data">
			<input type="hidden" name="lead" value="<?php echo $_GET['lead'];?>" />
		<input type="hidden" id="address" name="address" value="<?php echo $lead1['address'];?>" />
		
				
				

				<div class="col-sm-12">
							<table class="table">
							<tr>
								<td>Fee Category</td>
								<td><select name="payCategory" class="form-control" <?php if($lead1['payType']!="") { echo "readonly"; } ?>>
								<option value="Full" <?php if($lead1['payType']=="Full") { echo "selected"; } ?>>Full</option>
								<option value="Part" <?php if($lead1['payType']=="Part") { echo "selected"; } ?>>Part</option>
                                <option value="Stage-wise" <?php if($lead1['payType']=="Stage-wise") { echo "selected"; } ?>>Stage-wise</option>
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
								<td><input type="text" class="form-control" id="payTotal" name="payTotal" <?php if($lead1['payTotal']!=0) { echo "value=".$lead1['payTotal'].' readonly';} ?>></td>

								<td>Discount</td>
								<td><input type="text" class="form-control" id="disc" name="disc" <?php if($lead1['payTotal']!=0) { echo "value=".$lead1['discount'].' readonly';} ?>></td>
							
								<td>Payment Balance</td>
								<td><input type="text" class="form-control" id="payBalance" name="payBalance" <?php if($lead1['payTotal']!=0) { echo "value=".$lead1['payBalance'].' readonly';} ?>></td>
							</tr>
							</table>
							</td>	
							</tr>
							<!-- <tr><td>Select VAT for which country</td>
							<td>
								<select class="form-control" id="Vatvalue" name="Vatvalue" disabled="">
								<option value="0" <?php if ($r =="7"){echo " selected";}?>>QATAR</option>
								<option value="5" <?php if ($r !="6" && $r != "7"){echo " selected";}?>>UAE</option>
								<option value="18" <?php if ($r =="6"){echo " selected";}?>>INDIA</option>
								<option value="0" <?php if ($r =="8"){echo " selected";}?>>OMAN</option>
							</select>
							</td></tr> -->
							
							<tr>
								<td>Pay Amount</td>
								<td><input type="text" class="form-control" id="payAmt" name="payAmt" min="0" max="<?=$lead1['payBalance'];?>" required></td>
							
								<td>VAT</td>
								<td><input type="text" class="form-control" id="taxAmt" name="taxAmt"  required></td>
							</tr>	
							<tr>
								<td>Total Pay Amount</td>
								<td><input type="text" class="form-control" id="totPayAmt" name="totPayAmt"  required></td>
								<td>Balance Amount</td>
								<td><input type="text" class="form-control" id="totBalance" name="totBalance"  required></td>
							</tr>	
							</table>
							<table id="nextTr" class="table">
							<tr>
								<td>Next Pay Amount</td>
								<td><input type="text" class="form-control" id="nextPayAmt" name="nextPayAmt" min="0" max="" ></td>
							
								<td>Next Pay Date</td>
								<td><div class="input-group date" id="nextPayDate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="nextPayDate" data-target="#nextPayDate" />
                                    <div class="input-group-append" data-target="#nextPayDate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
								</td>
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
      <!-- End of Main Content -->
	  <?php include_once('foot.php'); ?>
	  
	  <script>
   	// var region=<?php echo $r;?>;
$(function(){
	$('#nextPayDate').datetimepicker({
        format: 'DD-MM-YYYY',
        allowInputToggle: true,
        // defaultDate: moment()
    });
$('#nextTr').hide(); 
// $('#nextPayDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true});

$('#disc').blur(function(){
	var bal = $('#payTotal').val()-$('#disc').val();
	$('#payBalance').val(bal);
});

$('#payAmt').blur(function(){
var amt= $(this).val();
var bal= $('#payBalance').val();
var vat= 5;
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