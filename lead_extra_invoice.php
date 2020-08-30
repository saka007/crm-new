<?php include_once("header.php");	

//echo $_GET['payment'] . " ==> leadPayment" . $_GET['leadPayment'];

$lead=$obj->display('dm_lead','id='.$_GET['lead']);
$lead1=$lead->fetch_array();

$recpt=$obj->display('dm_3party_payment','id='.$_GET['receipt']);
$recpt1=$recpt->fetch_array();


?>
		<div class="col-sm-10">
			<div class="container">
<div class="row">					
<div class="col-sm-6 text-sm-left"><a href="#" onclick="javascript:printPage(print);" class="btn btn-info">Print Receipt</a></div>
</div>
			    <div class="line" id="line"  >

				<div class="row">
			        <div class="col-12">



			            <div class="text-center text-sm-center" style="text-align:center">
		                <img src="images/logo.png" alt="IMG" style="height:75px;">
			            </div>
						
			            <div class="text-right text-sm-right">
						<h5 style="padding:0 0 5px; margin:0;font-size:1rem; line-height:1"><label>Agreement No. : </label> <?php $gh=$obj->display('dm_lead_contract','leadId='.$_GET['lead']); $gh1=$gh->fetch_array(); echo $gh1['id'];?></h5>
			            <h5 style="padding:0 0 5px; margin:0;font-size:1rem; line-height:1"><label>Date : </label> <?php echo date('d-m-Y',strtotime($recpt1['date'])); ?></h5>
			            <h5 style="padding:0 0 5px; margin:0;font-size:1rem; line-height:1"><label>Receipt No : </label> #_<?php echo $recpt1['id']; ?></h5>
			            <h5 style="padding:0 0 5px; margin:0;font-size:1rem; line-height:1"><label>Tax Invoice : </label> TRN: 100434250500003</h5>
						</div>
			            <hr>
			            <div class="row" style="margin-bottom: 15px;">
			                <div class="col-12 col-md-6 col-lg-6 float-left">
			                    <div class="card  height">
			                        <div class="card-header">From </div>
			                        <div class="card-block" style="margin: 0 10px;">
			                            <strong><?php echo $lead1['fname'] . " " . $lead1['lname']; ?>:</strong><br>
			                            <?php echo $lead1['address'] ?><br>
			                            <?php $bran=$obj->display('dm_branch','id='.$_SESSION['BRANCH']); $bran1=$bran->fetch_array(); echo $bran1['name'] ?><br>
		                        	</div>
			                    </div>
								<p>Fee once paid is non-refundable.<br />The amount is paid for the payment due against service retain.<br />All payment is subject to realization.</p>
			                </div>
			                <div class="col-12 col-md-6 col-lg-6">
			                </div>
			            </div>
			        </div>
			    </div>
				
			    <div class="row">
			        <div class="col-md-12">


			            <div class="card " style="margin-top:20px;">
			                <div class="card-header">
			                    <h5 class="text-center"><strong>Payment Details</strong></h5>
			                </div>
			                <div class="card-block">
			                    <div class="table-responsive">
			                        <table class="table table-sm" style="width:100%;">
			                            <thead>
		                                <tr>
		                                    <td colspan="2"><strong>Particular</strong></td>
		                                    <td><strong>Tax</strong></td>
			                                <td style="text-align:center"><strong>Amount</strong></td>
			                            </tr>
			                            </thead>
			                            <tbody>

<?php 
$fg=$obj->display('dm_3party_payment_det','payId='.$_GET['receipt']);
while($fg1=$fg->fetch_array())
{
?>
<tr>
<td colspan="2"><?php echo $fg1['particular'];?></td>
<td> <?php echo $recpt1['Tax']; ?></td>
<td style="text-align:right"><?php echo $fg1['amount']; ?></td>
</tr>
<?php } ?>
<tr>
<td class="highrow">Mode of Payment</td>
<td class="highrow"><strong><?php echo $recpt1['payMethod'];?></strong></td>
<td class="highrow">Total Amount Payable</td>
<td class="highrow" style="text-align:right"><?php $tot=$recpt1['amount']+$recpt1['Tax']; echo $base = number_format((float)$tot, 2, '.', '');?></td>
</tr>
			                            </tbody>
			                        </table>
			                    </div>
			                </div>
			            </div>
				
						
			        </div>
			    </div>
			</div>
		</div>
		</div>
<?php 	include_once("footer.php");	?>
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

<script>
 function printPage(id) {
    var html="<html>";
    html+= document.getElementById('line').innerHTML;
    html+="</html>";
    var printWin = window.open('','','left=0,top=0,toolbar=0,scrollbars=0,status =0');
    printWin.document.write(html);
    printWin.document.close();
    printWin.focus();
    printWin.print();
    printWin.close();
}

</script>
