<?php include_once("head.php");

// echo $_GET['payment'] . " ==> leadPayment" . $_GET['leadPayment'];

$lead = $obj->display('dm_lead', 'id=' . $_GET['lead']);
if ($lead->num_rows) {
	$lead1 = $lead->fetch_array();
}
$r = $lead1['region'];
$region_sql = $obj->display('dm_region', 'status=' . $r);
if ($region_sql->num_rows) {
	$region = $region_sql->fetch_array();
}
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
							<div class="invoice p-3">
								<div class="line">
									<div class="row">
										<div class="col-12">

											<table style="width:100%">
												<tr>
													<td style="text-align:left;">
														<h5><img src="images/gm.jpg" alt="IMG" style="height: 90px;width: 160px;"></h5>
													</td>
												</tr>
												<tr>
													<td style="text-align:center;">
														<h4>RECEIPT</h4>
													</td>
												</tr>
											</table>

											<table style="width:100%">
												<tr>
													<td style="text-align:right;">
														<b>Date : </b><?php echo date('d-m-Y', strtotime($recpt1['date'])); ?><br>
														<b>Receipt No : :</b> <?php echo str_pad($recpt1['id'], 4, 0, STR_PAD_LEFT); ?><br>
														<b>Agreement No. :</b> <?php $gh = $obj->display('dm_lead_contract', 'leadId=' . $_GET['lead']);
																				if ($gh->num_rows) $gh1 = $gh->fetch_array();
																				echo $gh1['id']; ?><br>
														<?php
														// if ($r != '6' && $r != '7' && $r != '8') {
														// 	echo '<b>TRN : </b>  1234567890</br>';
														// } elseif ($r == '6') {
														// 	echo '<b>GSTIN : </b>  1234657890</br>';
														// }
														?>
														<!-- <b>Address :</b> <?php //echo $bran1['address']; 
																				?> -->
													</td>
												</tr>
											</table>
											<table style="width:100%">
												<tr>
													<td style="text-align:left;">
														From:
														<address>
															<strong><?php echo $lead1['fname'] . " " . $lead1['lname']; ?>:</strong><br>
															<?php echo $lead1['address'] ?><br><br>
															<?php echo $bran1['name'] . "," . $region['name']; ?><br>
															Received with thanks on account of Giant Document Clearing Services, Dubai.<br>
															The amount is paid for the payment due against service retain.<br>
															All payment is subject to realization.
														</address>
													</td>
												</tr>
											</table>
											</br>
										</div>
									</div>

									<div class="row">
										<div class="col-12 table-responsive">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>Service</th>
														<th>Fees</th>
														<th>Amount Paid</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<th style="width:330px">Canada Processing Documentation </th>
														<td></td>
														<td>

														</td>
													</tr>
													<tr>
														<th>Mode of Payment</th>
														<td></td>
														<th>Total Paid: </th>
														</td>
													</tr>
													<tr>
														<th>Due Payment</th>
														<td></td>
														<td>

														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="row">
										<!-- accepted payments column -->
										<div class="col-6">
											<p>Received by:</p><br><br>

											<p>
												Giant Document Clearing Services, Dubai
											</p>
										</div>
										<!-- /.col -->
										<!-- <d -->
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
	<section class="content">
		<div class="row">
			<div class="col-12">
				<footer class="sticky-footer bg-white ">
					<div class="container my-auto">
						<div class="copyright text-center my-auto">
							<table style="width:100%">
								<tr>
									<td style="text-align:left;">
										Giant Document Clearing Services
									</td>
									<td style="top: 30px;text-align:left;position: relative;">
										<address>
											<span style="color: orange;"><i class="fas fa-map-marker-alt"></i></span> Office 2340,Boulevard Plaza,Tower 2,<br>
											Burj Khalifa Community, Downtown, <br>
											PO Box 124342, Dubai UAE
										</address>
									</td>
									<td style="top: 30px;text-align:left;position: relative;">
										<address>
										<span style="color: orange;"><i class="fas fa-phone-alt"></i></span> +971507334350<br>
										<span style="color: orange;"><i class="fas fa-blender-phone"></i></span> +97144096876 <br>
										<span style="color: orange;"><i class="fas fa-envelope"></i></span> info@giantmigration.com
										</address>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</footer>
			</div>
		</div>
	</section>
</div>
<?php include_once("foot.php");
?>
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