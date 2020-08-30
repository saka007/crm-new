<?php include_once("header.php");	?>


		<div class="col-sm-10">
<div class="row"><div class="col-sm-12"><h4 class="mb-3" style="color:#2cb674;">Pending Leads for agreement upload (For Gary's)</h4></div></div>

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

<div class="col-sm-2 form-group"><label>&nbsp;</label><br /><input type="submit" class="btn btn-info" name="search" value="Search" ></div>

</div>

</form>
			<table class="table table-striped table-bordered" id="myTable" style="width:100%">
			  <thead>
			    <tr>
			      <th>No</th>

			      <th>Lead ID</th>
			      <th>Date</th>

			      <th>Name</th>

			      <th>Agreement No.</th>
			      <th>ID</th>
			      <th>Counselor</th>
			      
			      <th>Upload<br /> Agreement</th>

			    </tr>

			  </thead>

			  <tbody>

<?php 
if($_SESSION['TYPE']=="IC" || $_SESSION['TYPE']=="SIC"  || $_SESSION['TYPE']=="MC" || $_SESSION['TYPE']=="BM" || $_SESSION['TYPE']=="ABM" || $_SESSION['TYPE']=="AM"  || $_SESSION['TYPE']=="RM" || $_SESSION["TYPE"]=="CPO" || $_SESSION["TYPE"]=="SCPO" || $_SESSION["TYPE"]=="CPM" || $_SESSION["TYPE"]=="FMP" || $_SESSION["TYPE"]=="DGM" || $_SESSION["TYPE"]=="OM" || $_SESSION["TYPE"]=="PDC" || $_SESSION["TYPE"]=="MBI" || $_SESSION["TYPE"]=="HR" || $_SESSION["TYPE"]=="PDC" || $_SESSION["TYPE"]=="TC" || $_SESSION["TYPE"]=="OC" || $_SESSION["TYPE"]=="RMO" || $_SESSION["TYPE"]=="RMSM") { 
$query=" and assignTo=".$_SESSION['ID'];
}

if($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RMO") { 
$query="";
}
if($_SESSION['TYPE']=="RT") { 
$query=" and branch=".$_SESSION['BRANCH'];
}
if ($_POST['sdate']){$query .=" and feeAgreeDate between '".date('Y-m-d',strtotime($_POST["sdate"]))."' and '".date('Y-m-d',strtotime($_POST["edate"]))."'";}
if($_POST['region']!="") { 	$query.=" and region=".$_POST['region'];}
// echo $query;

					$result = $obj->display('dm_gary_contract','contract=""');

			  		if ($result->num_rows > 0) {
			  			$i = 1;
					    while($row = $result->fetch_assoc()) {
							$ser=$obj->display('dm_lead','id='.$row["leadid"].$query);
							$ag=$obj->display('dm_lead_contract','leadId='.$row["leadid"]);
							$ag1=$ag->fetch_array();


							if($ser->num_rows > 0)
							{
							$ser1=$ser->fetch_array();
							$ei=$obj->display('dm_lead_observation','leadId='.$ser1['id']);
							$ei1=$ei->fetch_array();


							if($ser1['type']=="Student") {$ld="DMC";}
							if($ser1['type']=="Visit") {$ld="DMV";}
							if($ser1['type']=="work") {$ld="DMW";}
							if($ser1['type']=="Business") {$ld="DMB";}
							if($ser1['type']=="Skill") {$ld="DMS";}
$em=$obj->display('dm_employee','id='.$ser1['Counsilor']); $em1=$em->fetch_array();
							
					    	?>

					    	<tr>

						    	<td><?php echo $i; ?></td>

						    	<td style="text-align: center;">

						    		<a class="btn btn-light" href="#" title="<?php echo $row['mobile'];?>"><?php echo $ld.''.$row["leadid"];?></a>

						    	</td>
						    	<td><?php echo date('d/m/Y',strtotime($ser1["feeAgreeDate"])); ?></td>

						    	<td><?php echo $ser1["fname"] . " " . $ser1["lname"]; ?></td>
						    	<td style="text-align: center;"><?php echo $ag1["id"];?></td>
						    	<td><a href="uploads/file/<?php echo $ei1['document']; ?>" target="_blank"><?php echo $ei1['document']; ?></a></td>
																<td><?php echo $em1['name'];?></td>

						    	
<td><a href="lead_gary_upload.php?lead=<?php echo $row["leadid"];?>"  class="btn btn-danger">Upload</a></td>

						    	

						    </tr>


							

					    	<?php $i++;
					    }
					}
					}
			  	?>
			  </tbody>
			</table>
	
		</div>
		<script>
$(function(){
$('#sdate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
$('#edate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
}); 
</script>
		<script>
				$(document).ready(function(){
    $('#myTable').DataTable({
    	responsive:true,
    	dom:'Bflrtp',
    	"lengthMenu": [[-1], ["All"]],
    	buttons: [ 
			{
                extend: 'excel',
				footer: true,
                title: 'Pending contract of gary'
            }]
    });
});
		</script>

    		
		
<?php include_once("footer.php"); ?>


