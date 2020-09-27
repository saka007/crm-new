<?php include_once("head.php");
// $req_url1 = 'https://api.exchangerate-api.com/v4/latest/INR';
// 					$req_url2 = 'https://api.exchangerate-api.com/v4/latest/AED';
//                     $response_json1 = file_get_contents($req_url1);
//                     $response_object1 = json_decode($response_json1);
//                     $response_json2 = file_get_contents($req_url2);
//                     $response_object2 = json_decode($response_json2);
//                     $usd=$response_object1->rates->USD;
//                     $aed=$response_object2->rates->USD;
?>

<link rel="stylesheet" href="theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

<!-- Use only where datatable is required -->
<!-- DataTables -->
<link rel="stylesheet" href="theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

    <!-- Begin Page Content -->
    <div class="content-wrapper">
    <section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Sales Report</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
						<li class="breadcrumb-item active">Sales Report</li>
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
					<div class="card">
					<div class="card-header">
					<form name="search" action="" method="post">

						<div class="row">

						<div class="col-sm-2 form-group">

						<label >Start Date</label>

						<div class="input-group date" id="sdate" data-target-input="nearest">
															<input type="text" class="form-control datetimepicker-input" name="sdate" data-target="#sdate" value="<?php if ($_POST['sdate']) echo $_POST['sdate'];
																																									else  echo date('d-m-Y') ?>" />
															<div class="input-group-append" data-target="#sdate" data-toggle="datetimepicker">
																<div class="input-group-text"><i class="fa fa-calendar"></i></div>
															</div>
														</div>
						</div>

						<div class="col-sm-2 form-group">

						<label >End Date</label>

						<div class="input-group date" id="edate" data-target-input="nearest">
															<input type="text" class="form-control datetimepicker-input" name="edate" data-target="#edate" value="<?php if ($_POST['edate']) echo $_POST['edate'];
																																									else  echo date('d-m-Y') ?>" />
															<div class="input-group-append" data-target="#edate" data-toggle="datetimepicker">
																<div class="input-group-text"><i class="fa fa-calendar"></i></div>
															</div>
														</div>

						</div>

						<?php 

						if($_SESSION['TYPE']=="SA" ||  $_SESSION['TYPE']=="RM") { 
						?>		 

						<div class="col-sm-2 form-group"><label>Region</label>
						<select class="form-control" name="region" id="region" >
							<option value="">Select</option>
							<?php $sou=$obj->display('dm_region','status=1 order by name');
							while($sou1=$sou->fetch_array())
							{
							?>
							<option value="<?php echo $sou1['id'];?>"  <?php if($sou1['id']==$_POST['region']) { echo 'selected="selected"';}?>><?php echo $sou1['name'];?></option>
							<?php } ?>
							</select>
						</div> 
						 <?php } ?> 

						<div class="col-sm-3 form-group"><label >Marketing Source</label>
						<select class="form-control" name="market_source" >
							<option value="">Select</option>
							<?php $sou=$obj->display('dm_source','status=1 order by name');
							while($sou1=$sou->fetch_array())
							{
							?>
							<option value="<?php echo $sou1['id'];?>"  <?php if($sou1['id']==$_POST['market_source']) { echo 'selected="selected"';}?>><?php echo $sou1['name'];?></option>
							<?php } ?>
							</select>
						</div>

						<!-- <div class="col-sm-2 form-group"><label >Country Interested</label>
						<select class="form-control" name="country_interest" >
							<option value="">Select</option>
							
						<?php $cnt=$obj->display('dm_country_proces','status=1 order by name');
							while($cnt1=$cnt->fetch_array())
							{
							?>
							<option value="<?php echo $cnt1['id'];?>"  <?php if($cnt1['id']==$_POST['country_interest']) { echo 'selected="selected"';}?>><?php echo $cnt1['name'];?></option>
							<?php } ?>		
							</select>
							
							</div>  -->
						<!-- <div class="col-sm-3 form-group"><label >Program Interested</label>
						<select class="form-control" name="service_interest" >
							<option value="">Select</option>
							<?php $ser=$obj->display('dm_service','status=1 order by name');
							while($ser1=$ser->fetch_array())
							{
							?>
							<option value="<?php echo $ser1['id'];?>"  <?php if($ser1['id']==$_POST['service_interest']) { echo 'selected="selected"';}?>><?php echo $ser1['name'];?></option>
							<?php } ?>
							
						</select>
						</div> -->

						 <div class="col-sm-3 form-group"><label>Counselor</label>
						<select class="form-control" name="counsilor" id="counsilor" >
							<option value="">Select</option>
						<?php 
						if($_SESSION['TYPE']=="BM") { $qry=" and region=".$_SESSION['REGION'];}
						$emp=$obj->display('dm_employee','status=1 '.$qry);
						while($emp1=$emp->fetch_array())
						{
						?>
							<option value="<?php echo $emp1['id'];?>" <?php if($emp1['id']==$_POST['counsilor']) {?> selected="selected" <?php } ?>><?php echo $emp1['name'];?></option>
							<?php }
						?>
						</select>
						</div>

         				<div class="col-sm-2 form-group"><label>&nbsp;</label><br /><input type="submit" class="btn btn-info" name="search" value="Search" ></div>
						</div>

						</form>
					</div>

		<!-- <div class="row"><div class="col-sm-6"><h4 class="mb-3" style="color:#2cb674;">Total Sales Report</h4></div></div> -->



<?php
$query="1=1";
if($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="BM" || $_SESSION['TYPE']=="RM") { 	
if($_POST['region']!="") { 	$query.=" and T2.region=".$_POST['region'];}
// if($_POST['gcc']=="1") { 	$query.=" and T2.region in (3,4,7)";}
// if($_POST['gcc']=="2") { 	$query.=" and T2.region in (5,6,8)";}
// if($_SESSION['ID']=="25") { 	$query.=" and T2.region in (3,4,7)";}
// if($_SESSION['ID']=="6") { 	$query.=" and T2.region in (5,6,8)";}
// if($_POST['branch']!="") { 	$query.=" and T2.branch=".$_POST['branch'];}
if($_POST['type']!="") { 	$query.=" and T2.type='".$_POST['type']."'";}
if($_POST['service_interest']!="") { 	$query.=" and T2.service_interest=".$_POST['service_interest'];}
if($_POST['counsilor']!="") { 	$query.=" and T2.Counsilor=".$_POST['counsilor'];}
if($_POST['market_source']!="") { $query.=" and T2.market_source='".$_POST['market_source']."'";}
if($_POST['enquiry']!="") { $query.=" and T2.enquiry='".$_POST['enquiry']."'";}
if($_POST['country_interest']!="") { $query.=" and T2.country_interest='".$_POST['country_interest']."'";}
if($_POST['convet']!="") { $query.=" and T2.convet='".$_POST['convet']."'";}
}
if($_SESSION['TYPE']=="BM") { 	
$query.=" and T2.region=".$_SESSION['REGION'];
}
if($_POST)
{
$query.=" and T1.date between '".date('Y-m-d',strtotime($_POST["sdate"]))."' and '".date('Y-m-d',strtotime($_POST["edate"]))."' and T1.status=1  order by date DESC";

?>

    <div class="card-body">
		<h4 class="mt-2">Total Sales Report</h4>
		<p class="mb-3">Report From <?php echo date('d-m-Y',strtotime($_POST["sdate"]));?> To <?php echo date('d-m-Y',strtotime($_POST["edate"]));?></p>
		  <table class="table table-striped table-bordered" id="dataTable" style="width:100%">

			  <thead>

			    <tr>

			      <th>No</th>
			      <th>Lead ID</th>
			      <th>Date</th>
			      <th>Receipt No.</th>
			      <th>Agreement No.</th>
			      <th>Service Interested</th>
			      <th>Marketing Source</th>
			      <th>Name of Client</th>
			      <th>Counselor</th>
			      <th>Fee Paid</th>
			      <!-- <th>Professional</th> -->
			      <th>Tax</th>
			      <th>Total</th>
			      <th>Mode of Payment</th>
			     
			    </tr>

			  </thead>

			  <tbody>

<?php 

					$result = $obj->display3('select T2.id as id,T2.region as region,T2.Counsilor as at,T2.market_source as source,T2.fname as fname,T2.lname as lname,T2.service_interest as service_interest, T1.date as date,T2.mobile as mobile,T1.amount as amount, T1.tax as tax, T1.payCategory as payCategory, T1.id as id2,T1.payMethod as payMethod from dm_pay_history as T1 INNER JOIN dm_lead as T2 ON T1.leadId=T2.id where '.$query);

			  		if ($result->num_rows > 0) {

			  			$i = 1;

					    while($row = $result->fetch_assoc()) {
					    
							if($row['type']=="Student") {$ld="DMC";}
							if($row['type']=="Visit") {$ld="DMV";}
							if($row['type']=="work") {$ld="DMW";}
							if($row['type']=="Business") {$ld="DMB";}
							if($row['type']=="Skill") {$ld="DMS";}

$em=$obj->display('dm_employee','id='.$row['at']); $em1=$em->fetch_array();
$gh=$obj->display('dm_lead_contract','leadId='.$row['id']); $gh1=$gh->fetch_array(); 
$si=$obj->display('dm_service','id='.$row['service_interest']); if ($si->num_rows > 0) { $si1=$si->fetch_array();}
$sr=$obj->display('dm_source','id='.$row['source']);$sr1=$sr->fetch_array();
					    	?>

					    	<tr>

						    	<td><?php echo $i; ?></td>
						    	<td style="text-align: center;"><a class="btn btn-light" href="#" title="<?php echo $row['mobile'];?>"><?php echo $ld.''.$row["id"];?></a></td>
						    	<td><?php echo date('d/m/Y',strtotime($row["date"])); ?></td>

								<td><a href="lead_payment_invoice.php?lead=<?=$row["id"]?>&receipt=<?=$row["id2"]?>" target="_blank"><?php echo str_pad($row['id2'], 4, 0, STR_PAD_LEFT);?></a></td>
								<td><?php echo $gh1['id'];?></td>
								<td><?php echo $si1['name'];?></td>
								<td><?php echo $sr1['name'];?></td>
								<td><?php echo $row['fname']." ".$row['lname']; ?></td>
								<td><?php echo $em1['name'];?></td>
						    	
						    	<td><?php if($row['payCategory']!="Retainer") { echo $row['amount']; $proTot=$proTot+$row['amount'];} ?></td>
						    	<td><?php echo $row['tax']; ?></td>

						    	<td><?php echo $total=$row["amount"]+$row["tax"]; ?></td>
						    	<td><?php echo $row['payMethod']; ?></td>
						    	
						    </tr>
						
					    	<?php $i++;
					   							$taxTot=$taxTot+$row['tax'];
					   							$allTot=$allTot+$total;
					   							$ftot=$row['amount'];
					   							if($row['region']==6){
					   							$conv=$conv+($ftot/'19');
					   						}
					   						elseif ($row['region']==8) {
					   							$conv=$conv+($ftot/'0.105');
					   						}
					   						elseif ($row['region']==7) {
					   							$conv=$conv+($ftot/'0.99');
					   						}
					   						else
					   						{
					   							$conv=$conv+$ftot;
					   						}
						 }
					}
					if ($_POST['region']==3 && $_POST['jan']=="1")
					{
						$conv=$conv+'774273.83';
					}
					elseif ($_POST['region']==4 && $_POST['jan']=="1")
					{
						$conv=$conv+'280926.19';
					}
					elseif ($_POST['region']==5 && $_POST['jan']=="1")
					{
						$conv=$conv+'161262';
					}
					elseif ($_POST['region']==6 && $_POST['jan']=="1")
					{
						$conv=$conv+'23491';
					}
					elseif($_POST['region']=="" && $_POST['jan']=="1")
					   						{
					   							$conv=$conv+'1239954.06';
					   						}
    //                 $ftot=($retTot+$proTot);
				// 	if($_POST['region']==6)
				// 	{
				// 	$conv=$ftot/'69';
				// }
				// elseif ($_POST['region']==7)
				// {

				// 	$conv=$ftot/'3.64';
				// }
				// elseif ($_POST['region']==8)
				// {
				// 	$conv=$ftot/'0.38';
				// }
				// else
				// {
				// 	$conv=$ftot/'3.67';
				// }
			  	?>
			  </tbody>
			  <tfoot>
			  <tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th>Total</th><th><?=number_format($retTot);?></th><th><?=number_format($proTot);?></th><th><?=number_format($taxTot);?></th><th><?=number_format($allTot);?></th><th><?=number_format($conv,2).'AED';?></th></tr>
			  </tfoot>
			</table>
<?php 
}
else
{
$query.="";
} ?>			

							<!-- /.col-lg-12 -->
							</div>
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
<?php include_once("foot.php"); ?>

<script src="theme/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

   <script>
$(function(){
// $('#sdate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
// $('#edate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true});
$('#sdate').datetimepicker({
        format: 'DD-MM-YYYY',
        allowInputToggle: true,
        // defaultDate: moment()
    });
	$('#edate').datetimepicker({
        format: 'DD-MM-YYYY',
        allowInputToggle: true,
        // defaultDate: moment()
    }); 
}); 
</script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
			 //responsive: true,
			"scrollX": true,
        });
    });
    </script>