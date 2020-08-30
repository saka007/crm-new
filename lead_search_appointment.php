<?php include_once("header.php");	?>


		<div class="col-sm-10">
		<div class="row"><div class="col-sm-6"><h4 class="mb-3" style="color:#2cb674;">Search Appointment</h4></div></div>
<form name="search" action="" method="post">
<div class="row">
<div class="col-sm-2 form-group">
<label >Start Date</label><input type="text" class="form-control" id="sdate" name="sdate" value="<?php if($_POST['sdate']) echo $_POST['sdate']; else  echo date('d-m-Y')?>" ></div>
<div class="col-sm-2 form-group"><label >End Date</label>
<input type="text" class="form-control" id="edate" name="edate" value="<?php if($_POST['edate']) echo $_POST['edate']; else echo date('d-m-Y')?>" ></div>

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
<div class="col-sm-3 form-group"><label >Mode of Enquiry</label>
<select class="form-control" name="enquiry">
	<option value="">Select</option>
	<option value="Call" <?php if($_POST['enquiry']=="Call") { echo 'selected="selected"';}?>>Call</option>
	<option value="Email" <?php if($_POST['enquiry']=="Email") { echo 'selected="selected"';}?>>Email</option>
	<option value="Walkin" <?php if($_POST['enquiry']=="Walkin") { echo 'selected="selected"';}?>>Walkin</option>
	
	</select>
	
	</div>			

<div class="col-sm-3 form-group"><label >Country Interested</label>
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
<div class="col-sm-3 form-group"><label >Convert</label>
<select class="form-control" name="convet" id="convet" >
	<option value="">Select</option>
	<option value="DNQ" <?php if($_POST['convet']=="DNQ") { echo 'selected="selected"';}?>>DNQ</option>
	<option value="Not Interested" <?php if($_POST['convet']=="Not Interested") { echo 'selected="selected"';}?>>Not Interested</option>
	<option value="Prospect" <?php if($_POST['convet']=="Prospect") { echo 'selected="selected"';}?>>Prospect</option>
	
	</select>
	
	</div>		

<div class="col-sm-3 form-group"><label >&nbsp;</label><br /><input type="submit" class="btn btn-info" name="search" value="Search" ></div>
</div>
</form>
<hr />
<?php
if($_SESSION['TYPE']=="IC" || $_SESSION['TYPE']=="SIC"  || $_SESSION['TYPE']=="MC" || $_SESSION['TYPE']=="BM" || $_SESSION['TYPE']=="ABM" || $_SESSION['TYPE']=="AM"  || $_SESSION['TYPE']=="RM" || $_SESSION["TYPE"]=="CPO" || $_SESSION["TYPE"]=="SCPO" || $_SESSION["TYPE"]=="CPM" || $_SESSION["TYPE"]=="FMP" || $_SESSION["TYPE"]=="DGM" || $_SESSION["TYPE"]=="OM" || $_SESSION["TYPE"]=="PDC" || $_SESSION["TYPE"]=="MBI" || $_SESSION["TYPE"]=="HR" || $_SESSION["TYPE"]=="PDC" || $_SESSION["TYPE"]=="TC" || $_SESSION["TYPE"]=="OC" || $_SESSION["TYPE"]=="RMO" || $_SESSION["TYPE"]=="RMSM") { 
$query=" and assignTo=".$_SESSION['ID'];
}

if($_SESSION['TYPE']=="SA") { 
$query="";
}
if($_SESSION['TYPE']=="RT") { 
$query=" and branch=".$_SESSION['BRANCH'];
}
if($_POST)
{
$query.=" and appointment between '".date('Y-m-d',strtotime($_POST["sdate"]))."' and '".date('Y-m-d',strtotime($_POST["edate"]))."'";
if($_POST['market_source']!="") { $query.=" and market_source='".$_POST['market_source']."'";}
if($_POST['enquiry']!="") { $query.=" and enquiry='".$_POST['enquiry']."'";}
if($_POST['country_interest']!="") { $query.=" and country_interest='".$_POST['country_interest']."'";}
if($_POST['service_interest']!="") { $query.=" and service_interest='".$_POST['service_interest']."'";}
if($_POST['convet']!="") { $query.=" and convet='".$_POST['convet']."'";}
?>

			<table class="table table-striped table-bordered" id="dataTables-Table" style="width:100%">

			  <thead>

			    <tr>

			      <th>No</th>

			      <th>Lead ID</th>
			      <th>Appointment Date</th>
			      <th>Name</th>
			      <th>Country</th>
			      <th>Program</th>
			      <th>Mode</th>
			      <th>Pending to do</th>
			    </tr>
			  </thead>
			  <tbody>
<?php 
					$result = $obj->display('dm_lead','1=1'.$query);
			  		if ($result->num_rows > 0) {
			  			$i = 1;
					    while($row = $result->fetch_assoc()) {
					    	$result1 = $obj->display('dm_lead_assesment', ' leadId='.$row["id"]);
				    	$lead1   = $result1->fetch_array();
							if($row['type']=="Student") {$ld="DMC";}
							if($row['type']=="Visit") {$ld="DMV";}
							if($row['type']=="work") {$ld="DMW";}
							if($row['type']=="Business") {$ld="DMB";}
							if($row['type']=="Skill") {$ld="DMS";}
							
$ser=$obj->display('dm_service','id='.$row["service_interest"]); 	$ser1=$ser->fetch_array();
$ctr=$obj->display("dm_country_proces","id=".$row["country_interest"]); 	$ctr1=$ctr->fetch_array();
$mak=$obj->display("dm_source","id=".$row["market_source"]); 	$mak1=$mak->fetch_array();
							
					    	?>

				    	<tr>
						    	<td><?php echo $i; ?></td>
						    	<td style="text-align: center;">
						    		<a class="btn btn-light" href="lead_edit.php?lead=<?php echo $row['id'];?>" title="<?php echo $row['mobile'];?>"><?php echo $ld.''.$row["id"];?></a>
						    	</td>
					    	<td><?php echo date('d/m/Y',strtotime($row["appointment"])); ?></td>
						    	<td><?php echo $row["fname"] . " " . $row["lname"]; ?></td>
						    	<td><?php echo $ctr1["name"]; ?></td>
						    	<td><?php echo $ser1["name"]; ?></td>
					    	<td><?php echo $row["enquiry"]; ?></td>
						    	<td> 
						    	<?php
					    		if($row['stepComplete']==4) { ?>
					    			<a href="#"><?php echo "Completed"; ?></a>
					    		<?php
					    		} 
					    		if($row['stepComplete']==3) { ?>
						    			<a href="<?php echo ('lead_payment.php?lead='.$row["id"]); ?>"><?php echo "Payment"; ?></a>
						    		<?php
						    		} 

						    		if($row['stepComplete']==2) { ?>
						    			<a href="<?php echo ('lead_observation_sheet.php?lead='.$row["id"]); ?>"><?php echo "Observation Sheet"; ?></a>
						    		<?php
						    		} 
									if($row['stepComplete']==1) { ?>

						    			<a href="<?php 

							    			if($row['service_interest'] == 2) {

								    			echo 'lead_business_assesment_form.php?lead='.$row["id"];

								    		} 
							    			if($row['service_interest'] == 1) {

								    			echo 'lead_skill_assesment_form.php?lead='.$row["id"];

								    		}?>"><?php echo "Assessment Form"; ?></a>

						    		<?php }

						    	?>

						    	</td>
						    </tr>
					    	<?php $i++;
					    }
					}
			  	?>
			  </tbody>
			</table>
<?php } ?>	
		</div>
<?php include_once("footer.php"); ?>

   <script>
$(function(){
$('#sdate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
$('#edate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
}); 
</script>
