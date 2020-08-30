<?php include_once("header.php");
// $req_url1 = 'https://api.exchangerate-api.com/v4/latest/INR';
// 					$req_url2 = 'https://api.exchangerate-api.com/v4/latest/AED';
//                     $response_json1 = file_get_contents($req_url1);
//                     $response_object1 = json_decode($response_json1);
//                     $response_json2 = file_get_contents($req_url2);
//                     $response_object2 = json_decode($response_json2);
//                     $usd=$response_object1->rates->USD;
//                     $aed=$response_object2->rates->USD;
?>

<div class="col-sm-10">
		<div class="row"><div class="col-sm-6"><h4 class="mb-3" style="color:#2cb674;">Total Sales Report</h4></div></div>
<form name="search" action="" method="post">

<div class="row">

<div class="col-sm-2 form-group">

<label >Start Date</label>

<input type="text" class="form-control" id="sdate" name="sdate" value="<?php if($_POST['sdate']) echo $_POST['sdate']; else  echo date('d-m-Y')?>" >

</div>

<div class="col-sm-2 form-group">

<label >End Date</label>

<input type="text" class="form-control" id="edate" name="edate" value="<?php if($_POST['edate']) echo $_POST['edate']; else echo date('d-m-Y')?>" >

</div>

<?php $region="";
 if ($_SESSION['ID']=="25")
{
	$region =' and id in (3,4,7)';
}
if($_SESSION['ID']=='6')
{
	$region=' and id in (5,6,8)';
}
 if($_SESSION['TYPE']=="SA" ||  $_SESSION['TYPE']=="RMSM" || $_SESSION['TYPE']=="DGM" || $_SESSION['TYPE']=="FMP" || $_SESSION['TYPE']=="FO" || $_SESSION['TYPE']=="BM") { 
if($_SESSION['TYPE']!="BM") {
?>		

<div class="col-sm-2 form-group"><label>Region</label>
<select class="form-control" name="region" id="region" >
	<option value="">Select</option>
	<?php $sou=$obj->display('dm_region','status=1 '.$region.' order by name');
	while($sou1=$sou->fetch_array())
	{
	?>
	<option value="<?php echo $sou1['id'];?>"  <?php if($sou1['id']==$_POST['region']) { echo 'selected="selected"';}?>><?php echo $sou1['name'];?></option>
	<?php } ?>
	</select>
</div>
<?php if($_SESSION['ID']!='6' && $_SESSION['ID']!='25'){?>
<div class="col-sm-2 form-group"><label>UAE Or Overseas</label>
<select class="form-control" name="gcc" id="region" >
	<option value="">Select</option>
	<option value="1">Dxb AUH & DOH</option>
	<option value="2">SHJ OMN & PUN</option>
	</select>
	</div>
<?php }?>
<div class="col-sm-2 form-group"><label>Branch</label>
<select class="form-control" name="branch" id="branch" >
	<option value="">Select</option>
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
<div class="col-sm-2 form-group"><label >Mode of Enquiry</label>
<select class="form-control" name="enquiry">
	<option value="">Select</option>
	<option value="Call" <?php if($_POST['enquiry']=="Call") { echo 'selected="selected"';}?>>Call</option>
	<option value="Email" <?php if($_POST['enquiry']=="Email") { echo 'selected="selected"';}?>>Email</option>
	<option value="Walkin" <?php if($_POST['enquiry']=="Walkin") { echo 'selected="selected"';}?>>Walkin</option>
	
	</select>
	
	</div>			

<div class="col-sm-2 form-group"><label >Country Interested</label>
<select class="form-control" name="country_interest" >
	<option value="">Select</option>
	
<?php $cnt=$obj->display('dm_country_proces','status=1 order by name');
	while($cnt1=$cnt->fetch_array())
	{
	?>
	<option value="<?php echo $cnt1['id'];?>"  <?php if($cnt1['id']==$_POST['country_interest']) { echo 'selected="selected"';}?>><?php echo $cnt1['name'];?></option>
	<?php } ?>		
	</select>
	
	</div> 
<div class="col-sm-3 form-group"><label >Program Interested</label>
<select class="form-control" name="service_interest" >
	<option value="">Select</option>
	<?php $ser=$obj->display('dm_service','status=1 order by name');
	while($ser1=$ser->fetch_array())
	{
	?>
	<option value="<?php echo $ser1['id'];?>"  <?php if($ser1['id']==$_POST['service_interest']) { echo 'selected="selected"';}?>><?php echo $ser1['name'];?></option>
	<?php } ?>
	
</select>
</div>
<div class="col-sm-2 form-group"><label >Convert</label>
<select class="form-control" name="convet" id="convet" >
	<option value="">Select</option>
	<option value="DNQ" <?php if($_POST['convet']=="DNQ") { echo 'selected="selected"';}?>>DNQ</option>
	<option value="Not Interested" <?php if($_POST['convet']=="Not Interested") { echo 'selected="selected"';}?>>Not Interested</option>
	<option value="Prospect" <?php if($_POST['convet']=="Prospect") { echo 'selected="selected"';}?>>Prospect</option>
	
	</select>
	
	</div>


<div class="col-sm-2 form-group"><label >Program Type</label>
<select class="form-control" name="type">
	<option value="">Select</option>
	<option value="Business" <?php if($_POST['type']=="Business") { echo 'selected="selected"';}?>>Business</option>
	<option value="Skill" <?php if($_POST['type']=="Skill") { echo 'selected="selected"';}?>>Skill</option>
	<option value="Student" <?php if($_POST['type']=="Student") { echo 'selected="selected"';}?>>Student</option>
	<option value="Visit" <?php if($_POST['type']=="Visit") { echo 'selected="selected"';}?>>Visit</option>
	<option value="Work" <?php if($_POST['type']=="Work") { echo 'selected="selected"';}?>>Work</option>
	
	</select>
</div>

<div class="col-sm-3 form-group"><label>Counselor</label>
<select class="form-control" name="counsilor" id="counsilor" >
	<option value="">Select</option>
<?php 
if($_POST['region']!="") { $qry=" and region=".$_POST['region'];}
$emp=$obj->display('dm_employee','status=1 and (role=4 || role=10 || role=31 || role=3 || role=2 || role=7 || role=20 || role=8 || role=14 || role=24 || role=26 || role=27 || role=5 || role=11 || role=13 || role=15 || role=18 || role=23 || role=25 || role=28 || role=29 || role=33)order by name'.$qry);
while($emp1=$emp->fetch_array())
{
?>
	<option value="<?php echo $emp1['id'];?>" <?php if($emp1['id']==$_POST['counsilor']) {?> selected="selected" <?php } ?>><?php echo $emp1['name'];?></option>
	<?php }
 ?>
</select>
</div>

<?php } ?>

<div class="col-sm-3 form-group"><label>Jan Sales</label>
<select class="form-control" name="jan" id="jan" >
	<option value="">Select</option>
	<option value="1">With Jan sales</option>
</select>
</div>




<div class="col-sm-2 form-group"><label>&nbsp;</label><br /><input type="submit" class="btn btn-info" name="search" value="Search" ></div>

</div>

</form>


<?php
$query="1=1";
if($_SESSION['TYPE']=="SA" ||  $_SESSION['TYPE']=="FMP" || $_SESSION['TYPE']=="DGM" || $_SESSION['TYPE']=="RMSM" || $_SESSION['TYPE']=="FO" || $_SESSION['TYPE']=="BM") { 	
if($_POST['region']!="" && $_POST['gcc']!="1" && $_POST['gcc']!="2") { 	$query.=" and T2.region=".$_POST['region'];}
if($_POST['gcc']=="1") { 	$query.=" and T2.region in (3,4,7)";}
if($_POST['gcc']=="2") { 	$query.=" and T2.region in (5,6,8)";}
if($_SESSION['ID']=="25") { 	$query.=" and T2.region in (3,4,7)";}
if($_SESSION['ID']=="6") { 	$query.=" and T2.region in (5,6,8)";}
if($_POST['branch']!="") { 	$query.=" and T2.branch=".$_POST['branch'];}
if($_POST['type']!="") { 	$query.=" and T2.type='".$_POST['type']."'";}
if($_POST['service_interest']!="") { 	$query.=" and T2.service_interest=".$_POST['service_interest'];}
if($_POST['counsilor']!="") { 	$query.=" and T2.Counsilor=".$_POST['counsilor'];}
if($_POST['market_source']!="") { $query.=" and T2.market_source='".$_POST['market_source']."'";}
if($_POST['enquiry']!="") { $query.=" and T2.enquiry='".$_POST['enquiry']."'";}
if($_POST['country_interest']!="") { $query.=" and T2.country_interest='".$_POST['country_interest']."'";}
if($_POST['convet']!="") { $query.=" and T2.convet='".$_POST['convet']."'";}
}
if($_SESSION['TYPE']=="AC" || $_SESSION['TYPE']=="BM") { 	
$query.=" and T2.branch=".$_SESSION['BRANCH'];
}
if($_POST)
{
$query.=" and T1.date between '".date('Y-m-d',strtotime($_POST["sdate"]))."' and '".date('Y-m-d',strtotime($_POST["edate"]))."' and T1.status=1  order by date DESC";

?>

		<div class="row">
		<div class="col-sm-12 text-center">
		<h4 class="mt-2" style="color:#2cb674;">Total Sales Report</h4>
		<p class="mb-3">Report From <?php echo date('d-m-Y',strtotime($_POST["sdate"]));?> To <?php echo date('d-m-Y',strtotime($_POST["edate"]));?></p>
		</div></div>

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
			      <th>Retainer</th>
			      <th>Professional</th>
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
$si=$obj->display('dm_service','id='.$row['service_interest']); $si1=$si->fetch_array();
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
						    	<td><?php if($row['payCategory']=="Retainer") { echo $row['amount']; $retTot=$retTot+$row['amount'];} ?></td>
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
			  <tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th>Total</th><th><?=number_format($retTot);?></th><th><?=number_format($proTot);?></th><th><?=number_format($taxTot);?></th><th><?=number_format($allTot);?></th><th><?=number_format($conv,2).'AED';?></th></tr>
			  </tfoot>
			</table>
<?php 
}
else
{
$query.="";
} ?>			
		</div>
<?php include_once("footer.php"); ?>

   <script>
$(function(){
$('#sdate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
$('#edate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
}); 
</script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            responsive: true,
            <?php if($_SESSION['TYPE']=="SA" ||  $_SESSION['TYPE']=="RMSM" || $_SESSION['TYPE']=="DGM" || $_SESSION['TYPE']=="FMP" || $_SESSION['TYPE']=="FO" || $_SESSION['TYPE']=="AC")
			      { ?>
			"lengthMenu": [[-1], ["All"]],
			dom: 'Brft',
			buttons: [ 
			{
                extend: 'excel',
				footer: true,
                title: 'Total Sales Report',
				messageTop: 'Report from <?php echo date('d-m-Y',strtotime($_POST["sdate"]));?> to <?php echo date('d-m-Y',strtotime($_POST["edate"]));?>'
            },
			{
                extend: 'pdf',
				footer: true,
                title: 'Total Sales Report',
				messageTop: 'Report from <?php echo date('d-m-Y',strtotime($_POST["sdate"]));?> to <?php echo date('d-m-Y',strtotime($_POST["edate"]));?>'
            },
			{
                extend: 'print',
				footer: true,
                title: 'Total Sales Report',
				messageTop: 'Report from <?php echo date('d-m-Y',strtotime($_POST["sdate"]));?> to <?php echo date('d-m-Y',strtotime($_POST["edate"]));?>'
            }
		 ]
		 <?php } ?>
        });
    });
    </script>