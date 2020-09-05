<?php
include_once("head.php");

?>

 <!-- Begin Page Content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Generate Invoice</h1>

          <div class="row">
             <div class="col-lg-12">
		<!-- <div class="row"><div class="col-sm-6"><h4 class="mb-3" style="color:#2cb674;">View Lead</h4></div></div> -->
              </br>
              <form action="" method="post" name="paymentForm " enctype="multipart/form-data">
			<input type="hidden" name="lead" value="<?php echo $_GET['lead'];?>" />
		<input type="hidden" id="address" name="address" value="<?php echo $lead1['address'];?>" />
		
				
				<div class="row">
					<div class="col-sm-12 form-group" style="text-align: center;">
						<h4 class="h4-color">PAYMENT DETAILS</h4>
					</div>
					
				</div>
 
				

				<div class="col-sm-12">
							<table class="table">
							<tr>
								<td>Fee Category</td>
								<td><select name="payCategory" class="form-control">
								<option value="Retainer">Full</option>
								<option value="Professional">Part</option>
                                <option value="Professional">Stage-wise</option>
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
								<td><input type="text" class="form-control" id="payTotal" name="payTotal"></td>

								<td>Discount</td>
								<td><input type="text" class="form-control" id="disc" name="disc"></td>
							
								<td>Payment Balance</td>
								<td><input type="text" class="form-control" id="payBalance" name="payBalance"></td>
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
                </div>
                </div>
              </div>

            </div>

          </div>


      <!-- End of Main Content -->
	  <?php include_once('foot.php'); ?>
	  
	  <script>
   	// var region=<?php echo $r;?>;
$(function(){
$('#nextTr').hide(); 
$('#nextPayDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true});

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