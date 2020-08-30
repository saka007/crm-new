<?php include_once("header.php");	

?>

<style>
.row-actions {
  color: #ddd;
  font-size: 13px;
  left: -9999em;
  position: absolute;
padding: 2px 0 0;
}
.row-actions.visible, tr:hover .row-actions {
  position: static;
}

</style>

		<div class="col-sm-10">
<div class="row"><div class="col-sm-12"><h4 class="mb-3" style="color:#2cb674;">Assigned Client List</h4></div></div>

			<table class="table table-striped table-bordered" id="dataTables-Table" style="width:100%">

			  <thead>

			    <tr>

			      <th>No</th>

			      <th>Lead ID</th>
			      <th>Agreement<br />No</th>

			      <th>Name</th>

			      <th>To</th>

			      <th>Pay Mode</th>

			      <th>Counselor</th>
<?php  if($_SESSION['ROLE']==1 || $_SESSION['ROLE']==8 || $_SESSION['ROLE']==14) { ?>

			      <th>Status</th>
<?php }?>

				 <?php if($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RMO") { echo '<th>Assign</th>'; }?> 
			      

			    </tr>

			  </thead>

			  <tbody>

<?php  
if($_SESSION['ROLE']==5 || $_SESSION['ROLE']==8 || $_SESSION['ROLE']==11 || $_SESSION['ROLE']==13 || $_SESSION['ROLE']==14 || $_SESSION['ROLE']==18 || $_SESSION['ROLE']==24 || $_SESSION['ROLE']==25 ) { 
$query=" and assignTo=".$_SESSION['ID'];
}
if($_SESSION['TYPE']=="IC" || $_SESSION['TYPE']=="SIC"  || $_SESSION['TYPE']=="MC" || $_SESSION['TYPE']=="BM" || $_SESSION['TYPE']=="ABM" || $_SESSION['TYPE']=="AM"  || $_SESSION['TYPE']=="RM" || $_SESSION['TYPE']=="FMP" || $_SESSION['TYPE']=="DGM") { 
$query=" and Counsilor=".$_SESSION['ID'];
}

if($_SESSION['TYPE']=="SA" ) { 
$query="";
}
if($_SESSION['TYPE']=="RT") { 
$query=" and branch=".$_SESSION['BRANCH'];
}

					$result = $obj->display('dm_lead','stepComplete=3 and paidYet!=0 and assignTo!=Counsilor'.$query);

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
$agre= $obj->display('dm_lead_contract', ' leadId='.$row["id"]); $agre1 = $agre->fetch_array();	
						
					    	?>

					    	<tr>

						    	<td><?php echo $i; ?></td>

						    	<td style="text-align: center;">

						    		<?php echo '<a class="btn btn-light" data-toggle="modal" data-target=".bd-example'.$i.'">'.$ld.''.$row["id"]. "</a>"; ?>
<div class="row-actions">
<span class="edit"><a title="Edit this item" href="lead_edit.php?lead=<?php echo $row['id'];?>">Details</a>|</span>
<?php if($_SESSION['ROLE']==1 || $_SESSION['ROLE']==5 || $_SESSION['ROLE']==8 || $_SESSION['ROLE']==11 || $_SESSION['ROLE']==13 || $_SESSION['ROLE']==14 || $_SESSION['ROLE']==18 || $_SESSION['ROLE']==24 || $_SESSION['ROLE']==25 ) { ?>
<span class="edit"><?php if($row['stepComplete']==4) {  } else { ?> <a href="<?php echo ('lead_payment.php?lead='.$row["id"]); ?>"><?php echo "Payment"; ?></a>|<?php } ?> </span>
<?php } ?>
<span class="edit"> 
<?php 
$led=$obj->display('dm_lead','id='.$row['id']);
$led1=$led->fetch_array();

if($led1['type']=='Visit') {  echo '<a href="visit_visa_ops.php?lead='.$row['id'].'" title="EDIT">OPS</a>';}
if($led1['type']=='Student') { echo '<a href="student_visa_ops.php?lead='.$row['id'].'" title="EDIT">OPS</a>';}

if($led1['type']=="Skill")
{
if($led1['country_interest']==1) { echo '<a href="ops_skill_australia.php?lead='.$row['id'].'" title="EDIT" >OPS</a>';}
if($led1['country_interest']==2) { echo '<a href="ops_skill_canada.php?lead='.$row['id'].'" title="EDIT" >OPS</a>';}
}

if($led1['type']=="Business")
{
if($led1['country_interest']==2) { echo '<a href="ops_business_canada.php?lead='.$row['id'].'" title="EDIT" >OPS</a>';}
if($led1['country_interest']==3) { echo '<a href="ops_business_uk.php?lead='.$row['id'].'" title="EDIT" >OPS</a>';}
if($led1['country_interest']==4) { echo '<a href="ops_business_usa.php?lead='.$row['id'].'" title="EDIT" >OPS</a>';}
if($led1['country_interest']==5) { echo '<a href="ops_business_poland.php?lead='.$row['id'].'" title="EDIT" >OPS</a>';}
}

?>|</span>
<span class="edit">
<a title="View Agreement" href="<?php if($agre1['contract']!="") { ?>uploads/file/<?php echo $agre1['contract']; } else { echo "#";}?>" target="_blank">Agreement</a>  
</span>
<span class="edit"><a title="View all payed bills" href="lead_receipts.php?lead=<?php echo $row['id'];?>">Receipts</a>|</span>
<span class="edit"><a title="Third party payments" href="lead_extra_payment.php?lead=<?php echo $row['id'];?>">Extra</a>|</span>

</div>
</td>
<td style="text-align:center"><?php $cont=$obj->display('dm_lead_contract','leadId='.$row['id']); $cont1=$cont->fetch_array(); echo $cont1['id'];?></td>
<td><?php echo $row["fname"] . " " . $row["lname"]; ?>
	<div class="row-actions"><span class="edit"><a href="mailto:<?php echo $row["email"]; ?>"><?php echo $row["email"]; ?></a></span></div>							
								</td>

						    	<td><?php echo $ctr1["name"]; ?></td>

						    	<td><?php echo $row["payType"]; ?></td>
						    	<td><?php $con=$obj->display('dm_employee','id='.$row["Counsilor"]); $con1=$con->fetch_array(); echo $con1["name"]; ?></td>
<?php if($_SESSION['ROLE']==1 || $_SESSION['ROLE']==8 || $_SESSION['ROLE']==14) { 
if(($_SESSION['ROLE']==8 && $row['status']=="Active") || ($_SESSION['ROLE']==14 && $row['status']=="Active") || $_SESSION['ROLE']==1) {
?>
<td>
<select name="statusTo" style="font-size:14px"  id="statusTo" onchange="changeStatus(this.value, <?php echo $row['id'];?>)">
<option value="">Select</option>
<option value="Active" <?php if($row['status']=='Active') { echo 'selected="selected"';}?> >Active</option>
<option value="On Hold" <?php if($row['status']=='On Hold') { echo 'selected="selected"';}?> >On Hold</option>
<option value="Freeze" <?php if($row['status']=='Freeze') { echo 'selected="selected"';}?> >Freeze</option>
<option value="Negative" <?php if($row['status']=='Negative') { echo 'selected="selected"';}?> >Negative</option>
<option value="Rejected" <?php if($row['status']=='Rejected') { echo 'selected="selected"';}?> >Rejected</option>
<option value="Visa Ganted" <?php if($row['status']=='Visa Ganted') { echo 'selected="selected"';}?> >Visa Granted</option>

</select>								
								</td>
<?php } else { ?> 
<td>
<select name="statusTo" style="font-size:14px"  id="statusTo" onchange="changeStatus(this.value, <?php echo $row['id'];?>)">
<option value="<?php echo $row['status'];?>" ><?php echo $row['status'];?></option>
</select>								
								</td>
<?php }}?>
								
<?php if($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RMO") { ?>
<td>
<select name="assignTo" style="font-size:14px"  id="assignTo" onchange="changeAssign(this.value, <?php echo $row['id'];?>)">
<option value="">Select</option>
<?php $emp=$obj->display('dm_employee','(role=5 or role=8 or role=11 or role=13 or role=14 or role=18 or role=24 or role=25) and status=1'); while($emp1=$emp->fetch_array()) { ?>

<option value="<?php echo $emp1['id'];?>" <?php if($row['assignTo']==$emp1['id']) { echo 'selected="selected"';}?> ><?php echo $emp1['name'];?></option>

<?php }?>

</select>
</td>

<?php } ?>
</tr>

							<div class="modal fade bd-example-modal-lg bd-example<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							  <div class="modal-dialog modal-lg">
							    <div class="modal-content">
							      	<div class="modal-header">
							      		<h4 class="mb-3" style="color:#2cb674;"><?php echo $lead1 ? $lead1["skill_id"] . ' details' : '--'; ?></h4>
							      		<!-- <h4 class="modal-title">Modal Header</h4> -->
							          <button type="button" class="close" data-dismiss="modal">&times;</button>							          
							        </div>
							        <div class="modal-body">
							          <?php 
							          //echo $row["id"];
										if(isset($row['id']))
										{
										$lead=$obj->display('dm_lead','id='.$row['id']);
										$lead1=$lead->fetch_array();
										//var_dump($lead1);
										$sou=$obj->display('dm_source','id='.$lead1['market_source']);$sou1=$sou->fetch_array();
										$ser=$obj->display('dm_service','id='.$lead1["service_interest"]); 	$ser1=$ser->fetch_array();
										$ctr=$obj->display("dm_country_proces","id=".$lead1["country_interest"]); 	$ctr1=$ctr->fetch_array();

										
										}
										include("lead_view_include.php");
										?>
							        </div>
							        <div class="modal-footer">
							          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							        </div>
							    </div>
							  </div>
							</div>

					    	<?php $i++;
					    }
					}
			  	?>
			  </tbody>
			</table>
	
		</div>
<?php include_once("footer.php"); ?>

<script>
function changeAssign(asign,lead){
if(asign!="")
{
	$.ajax({
				url: "<?php echo $base_url;?>/process/assign_process.php",
				type: "POST",
				cache: false,
				dataType: 'json',
				data:'&asign='+asign+'&lead='+lead,
				success:function(result){
				alert("Assigned to officer");
				}
			});
}
}

function changeStatus(asign,lead){
	$.ajax({
				url: "<?php echo $base_url;?>/process/status_process.php",
				type: "POST",
				cache: false,
				dataType: 'json',
				data:'&asign='+asign+'&lead='+lead,
				success:function(result){
				alert("Status Changed");
				location.reload();
				}
			});
}
</script>
