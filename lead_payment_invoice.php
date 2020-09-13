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
				<!-- <div class="col-sm-3">
					<a href="http://localhost:8080/mydmconsultant/mail.php" class="btn btn-info">Send Welcome Mail</a>
				</div> -->
				<div class="col-sm-2">
					<a href="#" onclick="javascript:printPage(print);" style="margin-left: -90px;" class="btn btn-primary">Print Receipt</a>
				</div>
				<div class="col-sm-8">
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
					<div class="wrapper">
						<!-- Main content -->
						<section class="invoice">
							<div class="invoice p-3 mb-3">
								<div class="line">
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
										<div class="col-12 table-responsive">
											<div class="card">
												<div class="card-header">
													<h3 class="card-title" style="margin-left: -10px;">Box Details</h3>
												</div>
												<table class="table table-striped">
													<thead>
														<tr>
															<th>Fees Category</th>
															<th>Amount</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>Total Box</td>
															<td><?php echo $lead1['payTotal']; ?></td>
														</tr>
														<?php if ($lead1['discount'] != 0) { ?>
															<tr>
																<td>Discount</td>
																<td><?php echo $lead1['discount']; ?></td>
															</tr>
														<?php } ?>
														<tr>
															<th>Amount to Pay</th>
															<th><?php $bal = $lead1['payTotal'] - $lead1['discount'];
																echo number_format((float)$bal, 2, '.', '') ?></th>
														</tr>
														<?php
														if ($lead1['novat'] == 1) { ?>
															<tr>
																<td> <strong>NOTE:</strong> Export of Services. (Article 31) </td>
															</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<?php if ($lead1['demandAmt'] > 0) { ?>
										<div class="row">
											<div class="col-12 table-responsive">
												<div class="card">
													<div class="card-header">
														<h3 class="card-title" style="margin-left: -10px;">Remaining Payment</h3>
													</div>
													<table class="table table-striped">
														<thead>
															<tr>
																<td>Next Pay Amount</td>
																<td style="text-align: center;"><?= $lead1['demandAmt']; ?></td>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>Next Pay Date</td>
																<td style="text-align: center;"><?= date('d/m/Y', strtotime($lead1['dueDate'])); ?></td>
															</tr>
															<tr>
																<td>Remark</td>
																<td style="text-align: center;"><?= $lead1['demdRemark']; ?></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									<?php } ?>
									<div class="row">
										<!-- accepted payments column -->
										<div class="col-6">
											<p class="lead">Payment Methods:</p>
											<?php if (strpos($recpt1['payMethod'], 'Card') !== false) { ?>
												<img src="theme/dist/img/credit/visa.png" alt="Visa">
												<img src="theme/dist/img/credit/mastercard.png" alt="Mastercard">
											<?php } else {
												echo $recpt1['payMethod'];
											} ?>

											<p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
												<strong>Terms & Conditions</strong> : Fee once paid is non-refundable.
												The amount is paid for the payment due against service retain.
												All payment is subject to realization.
											</p>

											<strong>This is a computerized invoice hence no physical signature required.</strong>
										</div>
										<!-- /.col -->
										<div class="col-6">
											<p class="lead">Payment Details</p>

											<div class="table-responsive">
												<table class="table">
													<tr>
														<th style="width:50%">Fees Payable (<?php echo $recpt1['payCategory']; ?>):</th>
														<td><?php echo $recpt1['amount']; ?></td>
													</tr>
													<tr>
														<th><?php
															if ($r == "6") {
																echo "GST";
															} else {
																echo "VAT";
															}
															?> (<?php if ($lead1['novat'] == 1) {
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
																?>) :</th>
														<td><?php echo $recpt1['tax']; ?></td>
													</tr>
													<tr>
														<th>Mode of Payment :</th>
														<td><?php echo $recpt1['payMethod']; ?></td>
													</tr>
													<tr>
														<th>Total Amount Payable:</th>
														<td><?php $tot = $recpt1['amount'] + $recpt1['tax'];
															echo $base = number_format((float)$tot, 2, '.', ''); ?></td>
													</tr>
												</table>
											</div>
										</div>
										<!-- /.col -->
									</div>
								</div>
								<!-- </div> -->
								<!-- </div> -->
							</div>
						</section>
					</div>
				</div>
			</div>
	</section>
</div>
<?php include_once("foot.php");    ?>
<style>
</style>
<script>
	function printPage(id) {
		window.print()
		// var html = "<html>";
		// html += document.getElementById('line').innerHTML;
		// html += "</html>";
		// var printWin = window.open('', '', 'left=0,top=0,toolbar=0,scrollbars=0,status =0');
		// printWin.document.write(html);
		// printWin.document.close();
		// printWin.focus();
		// printWin.print();
		// printWin.close();
	}
</script>