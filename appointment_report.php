<?php include_once("header.php");

?>
<div class="col-sm-10">
	<h4 class="mb-3" style="color:#2cb674;">Appointment report</h4>
	<div class="col-sm-10">
		<!-- <div class="row"><div class="col-sm-6"><h4 class="mb-3" style="color:#2cb674;">Total Signed Contracts</h4></div></div> -->
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
<?php if($_SESSION['TYPE']=="SA"){ ?>
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

<div class="col-sm-2 form-group"><label>&nbsp;</label><br /><input type="submit" class="btn btn-info" name="search" value="Search" ></div>

</div>

</form>

<?php if($_POST){ 
	$query= ' and 1=1';
	if($_POST['region']!="") { 	$query =" and region=".$_POST['region'];}
	?>

	<div id="alert_message"></div>
	<hr />
	<table class="table table-striped table-bordered" id="myTable" style="width:100%">

				<thead>

					<tr>
						<th>Sr no.</th>
						<th>Counselor</th>
						<th>No. of Appointments Booked</th>
						<th>No. of Appointments Done</th>
						</tr>
						</thead>
						<tbody>
							<?php
							if ($_SESSION['TYPE']=="SA"){
							$result = $obj->display3('SELECT counsilorid,SUM(case WHEN booked=1 then 1 else 0 END) as booked,SUM(CASE WHEN done IS NOT NULL THEN 1 ELSE 0 END) as done FROM `appointments` WHERE date BETWEEN "'.date('Y-m-d',strtotime($_POST["sdate"])).'" AND "'.date('Y-m-d',strtotime($_POST["edate"])).'"'.$query.' GROUP BY counsilorid');
							}
							else{
							$result = $obj->display3('SELECT counsilorid,SUM(case WHEN booked=1 then 1 else 0 END) as booked,SUM(CASE WHEN done IS NOT NULL THEN 1 ELSE 0 END) as done FROM `appointments` WHERE date BETWEEN "'.date('Y-m-d',strtotime($_POST["sdate"])).'" AND "'.date('Y-m-d',strtotime($_POST["edate"])).'" and region='.$_SESSION['REGION'].' GROUP BY counsilorid');
							}
							// print_r($result);die;
							if($result->num_rows>0)
							{
								$i=1;
								while($row=$result->fetch_assoc())
								{
									$emp=$obj->display('dm_employee','id='.$row['counsilorid']);$em1=$emp->fetch_assoc();
									// $bra=$obj->display('dm_region','id='.$row['region']);$bra1=$bra->fetch_assoc();
									?>
									<tr>
										<td><?=$i;?></td>
										<td><?=$em1['name'];?></td>
										<td><?=$row['booked'];?></td>
										<td><?=$row['done'];?></td>
									</tr>
									<?php
									$i++;
								}
							}
							?>
						</tbody>	
						</table>
						</div>
					<?php } ?>
						<?php include_once('footer.php');?>
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
									dom:'Bfprt',
									buttons: [
            {
            	extend:'excel',
            	footer:true,
            	title:'Lead Report',
            	messageTop:'Lead Added today'
            }]
								});
								});
						</script>			