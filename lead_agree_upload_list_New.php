<?php include_once("header.php");	?>


		<div class="col-sm-10">
<div class="row"><div class="col-sm-12"><h4 class="mb-3" style="color:#2cb674;">Pending Leads for agreement upload</h4></div></div>

<form name="search" action="" method="post">
	<div class="row">
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

			<table class="table table-striped table-bordered" id="dataTables-Table" style="width:100%">
			  <thead>
			    <tr>
			      <th>No</th>

			      <th>Lead ID</th>
			      <th>Date</th>

			      <th>Name</th>

			      <th>Agreement No.</th>
			      <th>Counselor</th>
				  <th>Online Accepted</th>
			      <th>Save<br /> Agreement</th>
			      
			      <th>Upload<br /> Agreement</th>

			    </tr>

			  </thead>

			  <tbody>

<?php 
if($_SESSION['TYPE']=="IC" || $_SESSION['TYPE']=="SIC"  || $_SESSION['TYPE']=="MC" || $_SESSION['TYPE']=="BM" || $_SESSION['TYPE']=="ABM" || $_SESSION['TYPE']=="AM"  || $_SESSION['TYPE']=="RM" || $_SESSION["TYPE"]=="CPO" || $_SESSION["TYPE"]=="SCPO" || $_SESSION["TYPE"]=="CPM" || $_SESSION["TYPE"]=="FMP" || $_SESSION["TYPE"]=="DGM" || $_SESSION["TYPE"]=="OM" || $_SESSION["TYPE"]=="PDC" || $_SESSION["TYPE"]=="MBI" || $_SESSION["TYPE"]=="HR" || $_SESSION["TYPE"]=="PDC" || $_SESSION["TYPE"]=="TC" || $_SESSION["TYPE"]=="OC" || $_SESSION["TYPE"]=="RMO" || $_SESSION["TYPE"]=="RMSM") { 
$query=" and Counsilor=".$_SESSION['ID'];
}

if($_SESSION['TYPE']=="SA") { 
$query="";
}
if($_SESSION['TYPE']=="RT") { 
$query=" and branch=".$_SESSION['BRANCH'];
}

if($_POST['region']!="") { 	$query.=" and region=".$_POST['region'];}

					// $result = $obj->display('dm_lead_contract','contract=""');

					$result = $obj->display3('SELECT t2.*,t1.id as ag,t1.leadId as leadId,t1.contract as contract FROM `dm_lead_contract` t1 INNER JOIN dm_lead t2 on t1.leadid=t2.id WHERE t1.contract=""');

			  		if ($result->num_rows > 0) {
			  			$i = 1;
					    while($row = $result->fetch_assoc()) {
							$ser=$obj->display('dm_lead','id='.$row["leadId"].$query); 	
							if($ser->num_rows > 0)
							{
							$ser1=$ser->fetch_array();

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

						    		<a class="btn btn-light" href="#" title="<?php echo $row['mobile'];?>"><?php echo $ld.''.$row["leadId"];?></a>

						    	</td>
						    	<td><?php echo date('d/m/Y',strtotime($ser1["regdate"])); ?></td>

						    	<td><?php echo $ser1["fname"] . " " . $ser1["lname"]; ?></td>
						    	<td style="text-align: center;"><?php echo $row["ag"];?></td>
																<td><?php echo $em1['name'];?></td>
																<td><?php echo ($row['i_p']==""?'No':'Yes');?></td>

							<td align="center"><?php if ($row['i_p']==""){echo "Waiting for agreement to be accepted";} else { ?><a href="lead_agreement.php?lead=<?php echo $row["leadId"];?>" target="_blank" class="btn btn-info">Save</a><?php } ?></td>

						    	
<td><a href="lead_agree_upload.php?lead=<?php echo $row["leadId"];?>"  class="btn btn-danger">Upload</a></td>

						    	

						    </tr>


							

					    	<?php $i++;
					    }
					}
					}
			  	?>
			  </tbody>
			</table>
	
		</div>

    		
		
<?php include_once("footer.php"); ?>


