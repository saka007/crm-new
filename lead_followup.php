<?php include_once("header.php");	?>
		<div class="col-sm-10">
<h4 style="color:#2cb674;" class="mb-3">Follow Up</h4>

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
<div class="col-sm-2 form-group"><label>&nbsp;</label><br /><input type="submit" class="btn btn-info" name="search" value="Search" ></div>
</form>
</div>

<?php if($_POST) { ?>
			<table class="table table-striped table-bordered" id="dataTables-Table" style="width:100%">
			  <thead>
			    <tr>
			      <th>SL.No</th>
			      <th>Lead ID</th>
			      <th>Name</th>
			      <th>Country</th>
		      	<th>Follow Up</th>
			      <th>Remark</th>
				  <th>status</th>
			      <th>Action</th>
				  
			    </tr>
			  </thead>
		  <tbody>
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

$query.=" and followup between '".date('Y-m-d',strtotime($_POST["sdate"]))."' and '".date('Y-m-d',strtotime($_POST["edate"]))."'";
					$result = $obj->display('dm_lead','followupstat=0'.$query);
			  		if ($result->num_rows > 0) {
			  			$i = 1;
					    while($row = $result->fetch_assoc()) {
					    	// $result1 = $obj->display('dm_lead_assesment', ' leadId='.$row["id"]);
					    	// $lead1   = $result1->fetch_array();

							if($row['type']=="Student") {$ld="DMC";}
							if($row['type']=="Visit") {$ld="DMV";}
							if($row['type']=="work") {$ld="DMW";}
							if($row['type']=="Business") {$ld="DMB";}
							if($row['type']=="Skill") {$ld="DMS";}
if($row['service_interest']!=""){
$ser=$obj->display('dm_service','id='.$row["service_interest"]); 	$ser1=$ser->fetch_array();}
if($row['country_interest']!=""){
$ctr=$obj->display("dm_country_proces","id=".$row["country_interest"]); 	$ctr1=$ctr->fetch_array();}
else{
    $ctr1["name"]="";
}
					    	?>
					    	<tr>
						    	<td><?php echo $i; ?></td>
						    	<td style="text-align: center;">
						    		<?php echo '<a class="btn btn-light" data-toggle="modal" data-target=".bd-example'.$i.'">'.$ld.''.$row["id"]. "</a>"; ?>
						    	</td>
						    	<td><?php echo $row["fname"] . " " . $row["lname"]; ?></td>
						    	<td><?php echo $ctr1["name"]; ?></td>
						    	<td><?php echo $row["followup"]; ?></td>
						    	<td><?php $rem=$obj->display('dm_lead_remark','lead='.$row["id"]);if($rem->num_rows==0){ $rem1['remark']="";}  while($rem1=$rem->fetch_array()) {
								echo $rem1['remark'].'-'.date('d/m/Y',strtotime($rem1['date'])).'<br>';
																}
								?></td>
								<td>
								<select name="followupstatus"  onchange="changestatus(this.value, <?php echo $row['id'];?>)"> 
								<option value="" >Select</option>
								<option value="0" <?php if($row['followupstat']==0) echo 'selected="selected"' ?>>Open</option>
								<option value="1" <?php if($row['followupstat']==1) echo 'selected="selected"' ?>>Closed</option>
								</select>
								</td>
								<td><a href="lead_followup_edit.php?lead=<?php echo $row['id'];?>" title="EDIT"><i class="fa fa-edit"></i></a></td>
								
							</tr>
							

						<div class="modal fade bd-example-modal-lg bd-example<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							  <div class="modal-dialog modal-lg">
							    <div class="modal-content">
							      	<div class="modal-header">
							      		<h4 class="mb-3" style="color:#2cb674;"><?php echo $ld.''.$row["id"]. ' details'; ?></h4>
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
										if($lead1['service_interest']!=""){
										$ser=$obj->display('dm_service','id='.$lead1["service_interest"]); 	$ser1=$ser->fetch_array();}
										if($lead1['country_interest']!=""){
										$ctr=$obj->display("dm_country_proces","id=".$lead1["country_interest"]); 	$ctr1=$ctr->fetch_array();}
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
				<?php } ?>
		</div>



<?php include_once("footer.php"); ?>

<script>

$(function(){

$('#sdate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 

$('#edate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 

}); 

</script>

<script>
function changestatus(stat,lead){
if(stat!="")
{
	$.ajax({
				url: "<?php echo $base_url;?>/process/fstatprocess.php",
				type: "POST",
				cache: false,
				dataType: 'json',
				data:'&asign='+stat+'&lead='+lead,
				success:function(result){
					Swal.fire(
					'Follow up Status Updated!',
					'Succesfully'
					);
				// location.reload();
				// return resolve()
				}
			});
}
$("#dataTables-Table").load(window.location.href + " #dataTables-Table");
}
</script>