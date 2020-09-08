<?php include_once("head.php");

// echo $_GET['payment'] . " ==> leadPayment" . $_GET['leadPayment'];

$lead = $obj->display('dm_lead', 'id=' . $_GET['lead']);
if ($lead->num_rows) {
	$lead1 = $lead->fetch_array();
}
$r = $lead1['region'];
// $m=$lead1['market_source'];

$recpt = $obj->display('dm_pay_history', 'id=' . $_GET['receipt']);
if ($recpt->num_rows) {
	$recpt1 = $recpt->fetch_array();
}
$bran = $obj->display('dm_branch', 'id=' . $lead1['branch']);
if ($bran->num_rows) {
	$bran1 = $bran->fetch_array();
}
?>


<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-2">
					<h1>Invoice</h1>
				</div>
				<div class="col-sm-3">
					<a href="http://localhost:8080/mydmconsultant/mail.php" class="btn btn-info">Send Welcome Mail</a>
				</div>
				<div class="col-sm-2">
					<a href="#" onclick="javascript:printPage(print);" style="margin-left: -90px;" class="btn btn-info">Print Receipt</a>
				</div>
				<div class="col-sm-5">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
						<li class="breadcrumb-item active">Invoice</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">



					<!-- Main content -->
					<div class="invoice p-3 mb-3">
						<div class="line" id="line">
							<div class="row">
								<div class="col-12">

									<table style="width:100%">
										<tr>
											<td style="text-align:center;">
												<h5><img src="images/gm.jpg" alt="IMG" style="height:75px;"><?php echo $bran1['name']; ?></h5>
											</td>
										</tr>
										<tr>
											<td style="text-align:center;">
												<h4>TAX INVOICE</h4>
											</td>
										</tr>
									</table>

									<table style="width:100%">
										<tr>
											<td style="text-align:left;">
												From
												<address>
													<strong><?php echo $lead1['fname'] . " " . $lead1['lname']; ?>:</strong><br>
													<?php echo $lead1['address'] ?><br>
												</address>
											</td>
											<td style="text-align:right;">
												<b>Date : </b><?php echo date('d-m-Y', strtotime($recpt1['date'])); ?><br>
												<b>Receipt No : :</b> <?php echo str_pad($recpt1['id'], 4, 0, STR_PAD_LEFT); ?><br>
												<b>Agreement No. :</b> <?php $gh = $obj->display('dm_lead_contract', 'leadId=' . $_GET['lead']);
																		if ($gh->num_rows) $gh1 = $gh->fetch_array();
																		echo $gh1['id']; ?><br>
												<?php
												if ($r != '6' && $r != '7' && $r != '8') {
													echo '<b>TRN : </b>  100434250500003</br>';
												} elseif ($r == '6') {
													echo '<b>GSTIN : </b>  27AAGCD8611D1ZU</br>';
												}
												?>
												<b>Address :</b> <?php echo $bran1['address']; ?>
											</td>
										</tr>
									</table>
									<hr>
								</div>
							</div>





							<div class="row">
								<div class="col-md-6">
									<div class="card " style="border:1px solid rgba(0, 0, 0, 0.125)">
										<div class="card-header" style="border-bottom:1px solid rgba(0, 0, 0, 0.125); text-align:center">
											<h5 style="font-size:1.25rem; font-weight:bold; padding:7px; margin:0;">Package Details</h5>
										</div>
										<div class="card-block">
											<div class="table-responsive">
												<table class="table table-striped" style="width:100%;" cellpadding="0" cellspacing="0">
													<thead>
														<tr>
															<th style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;">Fees Category</th>
															<th style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;text-align: right;">Amount</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;">Total Package</td>
															<td style="text-align:right;border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;"><?php echo $lead1['payTotal']; ?></td>
														</tr>
														<?php if ($lead1['discount'] != 0) { ?>
															<tr>
																<td style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;">Discount</td>
																<td style="text-align:right;border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;"><?php echo $lead1['discount']; ?></td>
															</tr>
														<?php } ?>
														<tr>
															<td style="border-top: 3px solid #222;padding: 0.3rem;">Amount to Pay</td>
															<td style="text-align:right; border-top: 3px solid #222;padding: 0.3rem;"><?php $bal = $lead1['payTotal'] - $lead1['discount'];
																																		echo number_format((float)$bal, 2, '.', '') ?></td>
														</tr>
														<?php
														// if (($lead1['region']==3 && strpos(strtolower($lead1['address']), 'dubai') === false) || ($lead1['region']==5 && strpos(strtolower($lead1['address']), 'sharjah') === false) || ($lead1['region']==4 && strpos(strtolower($lead1['address']), 'abu dhabi') === false))
														if ($lead1['novat'] == 1) { ?>
															<tr>
																<td colspan="3" style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;"> <strong>NOTE:</strong> Export of Services. (Article 31) </td>
															</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="card " style="border:1px solid rgba(0, 0, 0, 0.125)">
										<div class="card-header" style="border-bottom:1px solid rgba(0, 0, 0, 0.125); text-align:center">
											<h5 style="font-size:1.25rem; font-weight:bold; padding:7px; margin:0;"><strong>Payment Details</strong></h5>
										</div>
										<div class="card-block">
											<div class="table-responsive">
												<table class="table table-striped" style="width:100%;" cellpadding="0" cellspacing="0">
													<thead style="border-bottom:1px solid rgba(0, 0, 0, 0.125);">
														<tr>
															<th style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;">Fees Category</th>
															<th style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;text-align: right;">Amount</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td colspan="2" style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;">Fees Payable</td>
															<td style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;text-align:center"><?php echo $recpt1['payCategory']; ?></td>
															<td style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;text-align:right"><?php echo $recpt1['amount']; ?></td>
														</tr>
														<tr>
															<td colspan="2" style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;"><?php
																																					if ($r == "6") {
																																						echo "GST";
																																					} else {
																																						echo "VAT";
																																					}
																																					?>
															</td>
															<td style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;text-align:center">
																<?php
																// if (($lead1['region']==3 && strpos(strtolower($lead1['address']), 'dubai') === false) || ($lead1['region']==5 && strpos(strtolower($lead1['address']), 'sharjah') === false) || ($lead1['region']==4 && strpos(strtolower($lead1['address']), 'abu dhabi') === false)) {
																// 	echo "0%";
																// }
																if ($lead1['novat'] == 1) {
																	echo "0%";
																} else {

																	if ($r == "6") {
																		echo "18%";
																	} elseif ($r == "7") {
																		echo "0%";
																	} elseif ($r == "8") {
																		echo "0%";
																	} else {
																		echo "5%";
																	}
																}
																?>
															</td>
															<td style="border-bottom:1px solid rgba(0, 0, 0, 0.125);padding: 0.3rem;text-align:right"><?php echo $recpt1['tax']; ?></td>
														</tr>
														<tr>
															<td style="border-top: 3px solid #222;padding: 0.3rem;">Total Amount Payable</td>
															<td style="border-top: 3px solid #222;padding: 0.3rem;">Mode of Payment</td>
															<td style="border-top: 3px solid #222;padding: 0.3rem;"><?php echo $recpt1['payMethod']; ?></td>
															<td style="border-top: 3px solid #222;padding: 0.3rem;text-align:right"><?php $tot = $recpt1['amount'] + $recpt1['tax'];
																																	echo $base = number_format((float)$tot, 2, '.', ''); ?></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<?php if ($lead1['demandAmt'] > 0) { ?>
									<div class="col-md-12">
										<div class="card " style="margin-top:20px;  border:1px solid rgba(0, 0, 0, 0.125)">
											<div class="card-header" style="border-bottom:1px solid rgba(0, 0, 0, 0.125); text-align:center">
												<h5 style="font-size:1.25rem; font-weight:bold; padding:7px; margin:0;"><strong>Balance Payment</strong></h5>
											</div>
											<div class="card-block">
												<div class="table-responsive">



													<table class="table table-striped">
														<thead>
															<tr>
																<th>Next Pay Amount</th>
																<th>Next Pay Date</th>
																<th>Remark</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td><?= $lead1['demandAmt']; ?></td>
																<td><?= date('d/m/Y', strtotime($lead1['dueDate'])); ?></td>
																<td><?= $lead1['demdRemark']; ?></td>
															</tr>
														</tbody>

													</table>


												</div>


											</div>

										</div>
									<?php } ?>
									<table class="table table-sm" style="width:100%;  border:1px solid rgba(0, 0, 0, 0.125)" cellpadding="0" cellspacing="0">
										<tr>
											<td style="padding:0.3rem;">
											<!-- <p style="margin:0; padding:0"><strong>Terms & Conditions :</strong> Fee once paid is non-refundable.<br />The amount is paid for the payment due against service retain.<br />All payment is subject to realization.</p> -->
												<p style="margin:0; padding:0"><strong>Terms & Conditions :</strong> Fee once paid is non-refundable.The amount is paid for the payment due against service retain.All payment is subject to realization.</p>
											</td>
											<!-- <td style="text-align:right;padding:0.3rem;"><strong>This is a computerized invoice <br />hence no physical signature required.</strong></td> -->
										</tr>
										<tr></tr>
									</table>
									</div>
							</div>
						</div>
						<!-- </div> -->
						<!-- </div> -->
					</div>
				</div>
			</div>
	</section>
</div>
<?php include_once("foot.php");	?>
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

	.table>tbody>tr>.emptyrow {
		border-top: none;
	}

	.table>thead>tr>.emptyrow {
		border-bottom: none;
	}

	.table>tbody>tr>.highrow {
		border-top: 3px solid;
	}
</style>

<script>
	function printPage(id) {
		var html = "<html>";
		html += document.getElementById('line').innerHTML;
		html += "</html>";
		var printWin = window.open('', '', 'left=0,top=0,toolbar=0,scrollbars=0,status =0');
		printWin.document.write(html);
		printWin.document.close();
		printWin.focus();
		printWin.print();
		printWin.close();
	}
</script>