<?php include_once("header.php");	?>

<div class="col-sm-10">
		<div class="row"><div class="col-sm-6"><h4 class="mb-3" style="color:#2cb674;">PNP Pending Client Report</h4></div></div>
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
<?php if($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RM" || $_SESSION['TYPE']=="RMSM" || $_SESSION['TYPE']=="DGM" || $_SESSION['TYPE']=="FMP") { ?>		
<div class="col-sm-3 form-group"><label>Region</label>
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

<div class="col-sm-3 form-group"><label>Branch</label>
<select class="form-control" name="branch" id="branch" >
	<option value="">Select</option>
	</select>
</div>

<div class="col-sm-3 form-group"><label>Counsilor</label>
<select class="form-control" name="counsilor" id="counsilor" >
	<option value="">Select</option>
<?php 
if($_POST['region']!="") { $qry=" and region=".$_POST['region'];}
$emp=$obj->display('dm_employee','status=1 and (role=4 || role=10 || role=31 || role=3 || role=2 || role=7 || role=20 || role=8 || role=14 || role=24 || role=26 || role=27 || role=5 || role=11 || role=13
|| role=15 || role=18 || role=23 || role=25 || role=28 || role=29)order by name'.$qry);
while($emp1=$emp->fetch_array())
{
?>
	<option value="<?php echo $emp1['id'];?>" <?php if($emp1['id']==$_POST['counsilor']) {?> selected="selected" <?php } ?>><?php echo $emp1['name'];?></option>
	<?php }
 ?>
</select>
</div>
<?php } ?>


<div class="col-sm-2 form-group"><label >&nbsp;</label><br /><input type="submit" class="btn btn-info" name="search" value="Search" ></div>
</div>
</form>


<?php
if($_SESSION['TYPE']=="CPO" || $_SESSION['TYPE']=="SCPO") { 
$query="T2.assignTo=".$_SESSION['ID'];
}
if($_SESSION['TYPE']=="IC" || $_SESSION['TYPE']=="SIC"  || $_SESSION['TYPE']=="MC") { 
$query="T2.Counsilor=".$_SESSION['ID'];
}
if($_SESSION['TYPE']=="BM") { 
$query="T2.branch=".$_SESSION['BRANCH'];
}
if($_SESSION['TYPE']=="RM" || $_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="FMP" || $_SESSION['TYPE']=="DGM" || $_SESSION['TYPE']=="RMSM") { 	
$query="1=1";
if($_POST['region']!="") { 
	$query.=" and T2.region=".$_POST['region'];
}
if($_POST['branch']!="") { 
	$query.=" and T2.branch=".$_POST['branch'];
}
if($_POST['counsilor']!="") { 
	$query.=" and T2.assignTo=".$_POST['counsilor'];
}
}
if($_POST)
{
$query.=" and T2.regdate between '".date('Y-m-d',strtotime($_POST["sdate"]))."' and '".date('Y-m-d',strtotime($_POST["edate"]))."' and T1.pnpLaun='' ";

?>

		<div class="row">
		<div class="col-sm-12 text-center">
		<h4 class="mt-2" style="color:#2cb674;">PNP Pending Client Report</h4>
		<p class="mb-3">Report From <?php echo date('d-m-Y',strtotime($_POST["sdate"]));?> To <?php echo date('d-m-Y',strtotime($_POST["edate"]));?></p>
		</div></div>

			<table class="table" id="dataTable" style="width:100%">

			  <thead>

			    <tr>

			      <th>No</th>
			      <th>Lead ID</th>
			      <th>Counselor</th>
			      <th>Date</th>
			      <th>Name</th>
			      <th>Mobile</th>
			      <th>To</th>
			      <th>Status</th>
			     
			    </tr>

			  </thead>

			  <tbody>

<?php 

					$result = $obj->display3('select T2.id as id,T2.service_interest as service_interest, T2.regdate as date,T2.mobile as mobile,T2.fname as name,T2.country_interest as country_interest,T2.status as status,T2.assignTo as aT from dm_ops_skill_canada as T1 INNER JOIN dm_lead as T2 ON T1.leadId=T2.id where '.$query);

			  		if ($result->num_rows > 0) {

			  			$i = 1;

					    while($row = $result->fetch_assoc()) {
					    
							if($row['type']=="Student") {$ld="DMC";}
							if($row['type']=="Visit") {$ld="DMV";}
							if($row['type']=="work") {$ld="DMW";}
							if($row['type']=="Business") {$ld="DMB";}
							if($row['type']=="Skill") {$ld="DMS";}

							
$ctr=$obj->display("dm_country_proces","id=".$row["country_interest"]); 	$ctr1=$ctr->fetch_array();
$em=$obj->display('dm_employee','id='.$row['aT']); $em1=$em->fetch_array();

					    	?>

					    	<tr>

						    	<td><?php echo $i; ?></td>

						    	<td style="text-align: center;">

						    		<a class="btn btn-light" href="#" title="<?php echo $row['mobile'];?>"><?php echo $ld.''.$row["id"];?></a>

						    	</td>
								<td><?php echo $em1['name'];?></td>
						    	<td><?php echo date('d/m/Y',strtotime($row["date"])); ?></td>

								<td><?php echo $row["name"]; ?>
								<td><?php echo $row["mobile"]; ?>
								<td><?php echo $ctr1["name"]; ?>
								<td><?php echo $row["status"]; ?>


						    </tr>
						

					    	<?php $i++;
					    }
					}
			  	?>
			  </tbody>
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
                title: 'PNP Pending Client Report',
				messageTop: 'Report from <?php echo date('d-m-Y',strtotime($_POST["sdate"]));?> to <?php echo date('d-m-Y',strtotime($_POST["edate"]));?>'
            },
			{
                extend: 'pdf',
                title: 'PNP Pending Client Report',
				messageTop: 'Report from <?php echo date('d-m-Y',strtotime($_POST["sdate"]));?> to <?php echo date('d-m-Y',strtotime($_POST["edate"]));?>'
            },
			{
                extend: 'print',
                title: 'PNP Pending Client Report',
				messageTop: 'Report from <?php echo date('d-m-Y',strtotime($_POST["sdate"]));?> to <?php echo date('d-m-Y',strtotime($_POST["edate"]));?>'
            }
		 ]
        });
    });
    </script>