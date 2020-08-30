<?php include_once("header.php");	

// echo $_GET['payment'] . " ==> leadPayment" . $_GET['leadPayment'];

$lead=$obj->display('dm_lead','id='.$_GET['lead']);
$lead1=$lead->fetch_array();
$r=$lead1['region'];
// $m=$lead1['market_source'];

$recpt=$obj->display('dm_pay_history','id='.$_GET['receipt']);
$recpt1=$recpt->fetch_array();

$bran=$obj->display('dm_branch','id='.$lead1['branch']);
$bran1=$bran->fetch_array();
?>
		<div class="col-sm-10">
			<div class="container">
<div class="row">
<div><a href="http://localhost:8080/mydmconsultant/mail.php" class="btn btn-info">Send Welcome Mail</a></div>					
<div><a href="#" onclick="javascript:printPage(print);" class="btn btn-info">Print Receipt</a></div>
</div>
			    <div class="line" id="line">

				<div class="row">
			        <div class="col-12">

			            <table style="width:100%">
						<tr><td><img src="images/logo.png" alt="IMG" style="height:75px;"></td>
						<td style="text-align:left;"><h5><?php echo $bran1['name'];?></h5>
							 <br />
						<h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TAX INVOICE</h4>
						</td>
						</tr>
			            </table>
						
			            <div class="text-right text-sm-right" style="text-align:right">
			            <h5 style="padding:0 0 5px; margin:0;font-size:1rem; line-height:1"><label>Date : </label> <?php echo date('d-m-Y',strtotime($recpt1['date'])); ?></h5>
			            <h5 style="padding:0 0 5px; margin:0;font-size:1rem; line-height:1"><label>Receipt No : </label> <?php echo str_pad($recpt1['id'], 4, 0, STR_PAD_LEFT); ?></h5>
			            <h5 style="padding:0 0 5px; margin:0;font-size:1rem; line-height:1"><label>Agreement No. : </label> <?php $gh=$obj->display('dm_lead_contract','leadId='.$_GET['lead']); $gh1=$gh->fetch_array(); echo $gh1['id'];?></h5>
			            <?php
			            if ($r !='6' && $r !='7' && $r !='8')
			            {
			            echo '<h5 style="padding:0 0 5px; margin:0;font-size:1rem; line-height:1"><label>TRN : </label>  100434250500003</h5>';
			            }
			            elseif ($r == '6') {
			            	echo '<h5 style="padding:0 0 5px; margin:0;font-size:1rem; line-height:1"><label>GSTIN : </label>  27AAGCD8611D1ZU</h5>';
			            }
			            ?>
			            <h5 style="padding:0 0 5px; margin:0;font-size:1rem; line-height:1"><label>Address : </label><?php echo $bran1['address'];?>
			        </h5>
						</div>
			            <hr>
			            <div class="row" style="margin-bottom: 15px;">
			                <div class="col-12 col-md-6 col-lg-6 float-left">
			                    <div class="card  height" style="border:1px solid rgba(0, 0, 0, 0.125)">
			                        <div class="card-header"  style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.75rem 1.25rem;">From </div>
			                        <div class="card-block" style="margin: 0 10px;">
			                            <strong><?php echo $lead1['fname'] . " " . $lead1['lname']; ?>:</strong><br>
			                            <?php echo $lead1['address'] ?><br>
		                        	</div>
			                    </div>
								
			                </div>
			                <div class="col-12 col-md-6 col-lg-6">
			                </div>
			            </div>
			        </div>
			    </div>
				
			    <div class="row">
			        <div class="col-md-12">
<div class="card " style="border:1px solid rgba(0, 0, 0, 0.125)">
			                <div class="card-header" style="border-bottom:1px solid rgba(0, 0, 0, 0.125); text-align:center">
			                    <h5 style="font-size:1.25rem; font-weight:bold; padding:7px; margin:0;">Package Details</h5>
			                </div>
			                <div class="card-block">
			                    <div class="table-responsive">
<table class="table table-sm" style="width:100%;" cellpadding="0" cellspacing="0">
<thead>
<tr>
	<td style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;"><strong>Fees Category</strong></td>
	<td style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;">&nbsp;</td>
	<td style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;text-align:center"><strong>Amount</strong></td>
</tr>
</thead>
<tbody>
<tr>
	<td style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;">Total Package</td>
	<td style="text-align:center;border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;">-</td>
	<td style="text-align:right;border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;"><?php echo $lead1['payTotal'];?></td>
</tr>
<?php if($lead1['discount']!=0){ ?>
<tr>
	<td style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;">Discount</td>
	<td style="text-align:center;border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;">-</td>
	<td style="text-align:right;border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;"><?php echo $lead1['discount']; ?></td>
</tr>
<?php } ?>
<tr>
	<td style="border-top: 3px solid #222;padding: 0.3rem;">Amount to Pay</td>
	<td style="text-align:center; border-top: 3px solid #222;padding: 0.3rem;">-</td>
	<td style="text-align:right; border-top: 3px solid #222;padding: 0.3rem;"><?php $bal=$lead1['payTotal']-$lead1['discount']; echo number_format((float)$bal, 2, '.', '')?></td>
</tr>
<?php 
// if (($lead1['region']==3 && strpos(strtolower($lead1['address']), 'dubai') === false) || ($lead1['region']==5 && strpos(strtolower($lead1['address']), 'sharjah') === false) || ($lead1['region']==4 && strpos(strtolower($lead1['address']), 'abu dhabi') === false))
if($lead1['novat']==1)
 {?>
<tr>
	<td colspan="3" style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;"> <strong>NOTE:</strong> Export of Services. (Article 31) </td>
</tr>
<?php }?>
</tbody>
</table>
			                    </div>
			                </div>
			            </div>

			            <div class="card " style="margin-top:20px; border:1px solid rgba(0, 0, 0, 0.125)">
			                <div class="card-header" style="border-bottom:1px solid rgba(0, 0, 0, 0.125); text-align:center">
			                    <h5 style="font-size:1.25rem; font-weight:bold; padding:7px; margin:0;"><strong>Payment Details</strong></h5>
			                </div>
			                <div class="card-block">
			                    <div class="table-responsive">
<table class="table table-sm" style="width:100%;" cellpadding="0" cellspacing="0">
<thead style="border-bottom:1px solid rgba(0, 0, 0, 0.125);">
<tr>
	<td colspan="2" style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;"><strong>Fees Category</strong></td><td>&nbsp;</td>
	<td style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;text-align:center"><strong>Amount</strong></td>
</tr>
</thead>
<tbody>
<tr>
	<td colspan="2" style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;">Fees Payable</td>
	<td style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;text-align:center"><?php echo $recpt1['payCategory'];?></td>
	<td style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;text-align:right"><?php echo $recpt1['amount']; ?></td>
</tr>
<tr>
	<td colspan="2" style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;"><?php
	if ($r == "6")
		{
			echo "GST";
		}
		else
		{
			echo "VAT";

		}
		?>
		</td>
	<td style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;text-align:center">
		<?php
		// if (($lead1['region']==3 && strpos(strtolower($lead1['address']), 'dubai') === false) || ($lead1['region']==5 && strpos(strtolower($lead1['address']), 'sharjah') === false) || ($lead1['region']==4 && strpos(strtolower($lead1['address']), 'abu dhabi') === false)) {
		// 	echo "0%";
		// }
		if($lead1['novat']==1){
			echo "0%";
		}
		else{

		if ($r =="6")
		{
			echo "18%";
		}
		elseif ($r =="7") 
		{
				echo "0%";
			}
		elseif ($r =="8") 
		{
				echo "0%";
			}	
		else
		{
			echo "5%";
		}
	}
		?>
	</td>
	<td style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;text-align:right"><?php echo $recpt1['tax'];?></td>
</tr>
<tr>
	<td style="border-top: 3px solid #222;padding: 0.3rem;">Total Amount Payable</td>
	<td style="border-top: 3px solid #222;padding: 0.3rem;">Mode of Payment</td>
	<td style="border-top: 3px solid #222;padding: 0.3rem;"><?php echo $recpt1['payMethod'];?></td>
	<td style="border-top: 3px solid #222;padding: 0.3rem;text-align:right"><?php $tot=$recpt1['amount']+$recpt1['tax']; echo $base = number_format((float)$tot, 2, '.', '');?></td>
</tr>
</tbody>
</table>
			                    </div>
			                </div>
			            </div>
<?php if($lead1['demandAmt'] > 0) {?>

						<div class="card " style="margin-top:20px;  border:1px solid rgba(0, 0, 0, 0.125)">
			                <div class="card-header" style="border-bottom:1px solid rgba(0, 0, 0, 0.125); text-align:center">
			                    <h5 style="font-size:1.25rem; font-weight:bold; padding:7px; margin:0;"><strong>Balance Payment</strong></h5>
			                </div>
			                <div class="card-block">
			                    <div class="table-responsive">
			                        <table class="table table-sm" style="width:100%;" cellpadding="0" cellspacing="0">
			                            <thead>
		                                <tr>
			                              
			                                <td style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;text-align:center"><strong>Next Pay Amount</strong></td>
			                                <td style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;text-align:center"><strong>Next Pay Date</strong></td>
			                                <td style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;text-align:center"><strong>Remark</strong></td>
			                            </tr>
			                            </thead>
			                            <tbody>
										
										<tr>
									
										<td style="padding: 0.3rem;text-align:center"><?=$lead1['demandAmt'];?></td>
										<td style="padding: 0.3rem;text-align:center"><?=date('d/m/Y',strtotime($lead1['dueDate']));?></td>
										<td style="padding: 0.3rem;text-align:center"><?=$lead1['demdRemark'];?></td>
										</tr>


			                            </tbody>
			                        </table>
									
									
			                    </div>
								
								
			                </div>
									
			            </div>
<?php } ?>	
 <table class="table table-sm" style="width:100%;  border:1px solid rgba(0, 0, 0, 0.125)" cellpadding="0" cellspacing="0">	
 <tr><td style="padding:0.3rem;">				
<p style="margin:0; padding:0"><strong>Terms & Conditions :</strong> Fee once paid is non-refundable.<br />The amount is paid for the payment due against service retain.<br />All payment is subject to realization.</p>
</td>
<td style="text-align:right;padding:0.3rem;"><strong>This is a computerized invoice <br />hence no physical signature required.</strong></td></tr>
<tr></tr>	
</table>					
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
