<?php include_once("header.php");	?>


<div class="col-sm-10">


			<table class="table table-striped table-bordered" id="dataTables-Table" style="width:100%">

			  <thead>

			    <tr>

			      <th>No</th>

			      <th>Lead ID</th>
			      <th>Date</th>

			      <th>Name</th>

			      <th>Country</th>

			      <th>Service</th>

			      <th>&nbsp;</th>

			    </tr>

			  </thead>

			  <tbody>

<?php 
if($_SESSION['TYPE']=="IC" || $_SESSION['TYPE']=="SIC") { 
$query=" and assignTo=".$_SESSION['ID'];
}
if($_SESSION['TYPE']=="BM") { 
$query=" and branch=".$_SESSION['BRANCH'];
}
if($_SESSION['TYPE']=="RM") { 
$query=" and region=".$_SESSION['REGION'];
}
if($_SESSION['TYPE']=="SA") { 
$query="";
}
if($_POST)
{
$query=" and regdate between '".date('Y-m-d',strtotime($_POST["sdate"]))."' and '".date('Y-m-d',strtotime($_POST["edate"]))."'";
}
					$result = $obj->display('dm_lead','1=1'.$query);

			  		if ($result->num_rows > 0) {

			  			$i = 1;

					    while($row = $result->fetch_assoc()) {

					    	$result1 = $obj->display('dm_lead_assesment', ' leadId='.$row["id"]);
					    	$lead1   = $result1->fetch_array();
							if($row['service_interest']==2) {$ld="DNB";}
							if($row['service_interest']==1) {$ld="DNS";}
							
$ser=$obj->display('dm_service','id='.$row["service_interest"]); 	$ser1=$ser->fetch_array();
$ctr=$obj->display("dm_country_proces","id=".$row["country_interest"]); 	$ctr1=$ctr->fetch_array();
$mak=$obj->display("dm_source","id=".$row["market_source"]); 	$mak1=$mak->fetch_array();
							
					    	?>

					    	<tr>

						    	<td><?php echo $i; ?></td>

						    	<td style="text-align: center;">

						    		<a class="btn btn-light"  title="<?php echo $row['mobile'];?>"><?php echo $ld.''.$row["id"];?></a>

						    	</td>
						    	<td><?php echo date('d/m/Y',strtotime($row["regdate"])); ?></td>

						    	<td><?php echo $row["fname"] . " " . $row["lname"]; ?></td>

						    	<td><?php echo $ctr1["name"]; ?></td>

						    	<td><?php echo $ser1["name"]; ?></td>
						    	
						    	<td> <a href="lead_custome_fee.php?lead=<?php echo $row["id"];?>" class="btn btn-danger">Customize Fee</a></td>

						    </tr>


							

					    	<?php $i++;
					    }
					}
			  	?>
			  </tbody>
			</table>
	
		</div>
<?php include_once("footer.php"); ?>

