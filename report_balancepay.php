<?php 
include_once("header.php");	
?>





		<div class="col-sm-10">

		<div class="row"><div class="col-sm-6"><h4 class="mb-3" style="color:#2cb674;">Balance Payment Report</h4></div></div>

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

<?php if($_SESSION['TYPE']=="SA" ||  $_SESSION['TYPE']=="RMSM" || $_SESSION['TYPE']=="DGM" || $_SESSION['TYPE']=="FMP" || $_SESSION['TYPE']=="FO") { 
if($_SESSION['TYPE']!="BM") {
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

<div class="col-sm-3 form-group"><label>Counsilor</label>
<select class="form-control" name="counsilor" id="counsilor" >
	<option value="">Select</option>
<?php 
if($_POST['region']!="") { $qry=" and region=".$_POST['region'];}
$emp=$obj->display('dm_employee','status=1 and (role=4 || role=10 || role=31 || role=3 || role=2 || role=7 || role=20 || role=8 || role=14 || role=24 || role=26 || role=27 || role=5 || role=11 || role=13 || role=15 || role=18 || role=23 || role=25 || role=28 || role=29)order by name'.$qry);
while($emp1=$emp->fetch_array())
{
?>
	<option value="<?php echo $emp1['id'];?>" <?php if($emp1['id']==$_POST['counsilor']) {?> selected="selected" <?php } ?>><?php echo $emp1['name'];?></option>
	<?php }
 ?>
</select>
</div>

<?php } ?>





<div class="col-sm-2 form-group"><label>&nbsp;</label><br /><input type="submit" class="btn btn-info" name="search" value="Search" ></div>

</div>

</form>


<?php
$query="1=1";
if($_SESSION['TYPE']=="SA" ||  $_SESSION['TYPE']=="FMP" || $_SESSION['TYPE']=="DGM" || $_SESSION['TYPE']=="RMSM" || $_SESSION['TYPE']=="FO" || $_SESSION['TYPE']=="BM") { 	
if($_POST['region']!="") { 	$query.=" and region=".$_POST['region'];}
if($_POST['branch']!="") { 	$query.=" and branch=".$_POST['branch'];}
if($_POST['type']!="") { 	$query.=" and T2.type='".$_POST['type']."'";}
if($_POST['service_interest']!="") { 	$query.=" and service_interest=".$_POST['service_interest'];}
if($_POST['counsilor']!="") { 	$query.=" and Counsilor=".$_POST['counsilor'];}
if($_POST['market_source']!="") { $query.=" and market_source='".$_POST['market_source']."'";}
if($_POST['enquiry']!="") { $query.=" and enquiry='".$_POST['enquiry']."'";}
if($_POST['country_interest']!="") { $query.=" and country_interest='".$_POST['country_interest']."'";}
if($_POST['convet']!="") { $query.=" and convet='".$_POST['convet']."'";}
}
if($_SESSION['TYPE']=="AC" || $_SESSION['TYPE']=="BM") { 	
$query.=" and branch=".$_SESSION['BRANCH'];
}
if($_POST)

{

$query.=" and paidYet!=0 and payBalance!=0 and dueDate between '".date('Y-m-d',strtotime($_POST["sdate"]))."' and '".date('Y-m-d',strtotime($_POST["edate"]))."'";

?>
		<div class="row">

		<div class="col-sm-12 text-center">

		<h4 class="mt-2" style="color:#2cb674;">Balance Payment Report</h4>

		<p class="mb-3">Report From <?php echo date('d-m-Y',strtotime($_POST["sdate"]));?> To <?php echo date('d-m-Y',strtotime($_POST["edate"]));?></p>

		</div></div>
			<table class="table" id="dataTable" style="width:100%">
			  <thead>

			    <tr>

			      <th>No</th>

			      <th>Lead ID</th>
			      <th>Agreement No.</th>
			      <th>Counselor</th>
			      <th>Reg.Date</th>
			      <th>Name</th>
			      <th>Country</th>
			      <th>Balance Amt</th>    
			      <th>Due Date</th>
			      <th>Remark</th>

			    </tr>
							  </thead>
			  <tbody>

<?php 

					$result = $obj->display('dm_lead',$query);

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

$em=$obj->display('dm_employee','id='.$row['Counsilor']); $em1=$em->fetch_array();
$gh=$obj->display('dm_lead_contract','leadId='.$row['id']); $gh1=$gh->fetch_array(); 						

					    	?>
					    	<tr>
						    	<td><?php echo $i; ?></td>
						    	<td style="text-align: center;"><a class="btn btn-light" href="#" title="<?php echo $row['mobile'];?>"><?php echo $ld.''.$row["id"];?></a></td>
								<td><?php echo $gh1['id'];?></td>
								<td><?php echo $em1['name'];?></td>
						    	<td><?php echo date('d/m/Y',strtotime($row["feeAgreeDate"])); ?></td>
								<td><?php echo $row["fname"] . " " . $row["lname"]; ?></td>
						    	<td><?php echo $ctr1["name"]; ?></td>
						    	<td><?php echo $row["payBalance"]; ?></td>
						    	<td><?php echo date('d/m/Y',strtotime($row["dueDate"])); ?></td>
						    	<td><?php echo $row["demdRemark"]; ?></td>
						    </tr>		

					    	<?php $i++;
							
							$payBalance=$payBalance+$row["payBalance"];

					    }

					}

			  	?>

			  </tbody>
			  <tfoot>
			  <tr><th></th><th></th><th></th><th></th><th></th><th></th><th>Total</th><th><?=$payBalance;?></th></tr>
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

			"lengthMenu": [[-1], ["All"]],

			dom: 'Brt',

			buttons: [ 

			{

                extend: 'excel',
				footer: true,
                title: 'Balance Payment Report',
				messageTop: 'Report from <?php echo date('d-m-Y',strtotime($_POST["sdate"]));?> to <?php echo date('d-m-Y',strtotime($_POST["edate"]));?>'

            },

			{

                extend: 'pdf',
				footer: true,
                title: 'Balance Payment Report',
				messageTop: 'Report from <?php echo date('d-m-Y',strtotime($_POST["sdate"]));?> to <?php echo date('d-m-Y',strtotime($_POST["edate"]));?>'

            },

			{

                extend: 'print',
				footer: true,
                title: 'Balance Payment Report',
				messageTop: 'Report from <?php echo date('d-m-Y',strtotime($_POST["sdate"]));?> to <?php echo date('d-m-Y',strtotime($_POST["edate"]));?>'

            }

		 ]

        });

    });

    </script>