<?php include_once("header.php");
?>

<div class="col-sm-10">
		<div class="row"><div class="col-sm-6"><h4 class="mb-3" style="color:#2cb674;">Total Garys Contract Report</h4></div></div>
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



<?php if($_POST)
{ ?>
<div class="row">
		<div class="col-sm-12 text-center">
		<h4 class="mt-2" style="color:#2cb674;">Total Contract Report</h4>
		<p class="mb-3">Report From <?php echo date('d-m-Y',strtotime($_POST["sdate"]));?> To <?php echo date('d-m-Y',strtotime($_POST["edate"]));?></p>
		</div></div>
		<?php
$query=" t1.feeAgreeDate between '".date('Y-m-d',strtotime($_POST["sdate"]))."' and '".date('Y-m-d',strtotime($_POST["edate"]))."' and paidyet!='0' and garys !='No' and t1.service_interest in (26,27,28,29,66,67,68,69,70,71,73,74,93,94,95,96,100,103,107,108,109,113,114,115)";
if($_POST['region']!="") { 	$query.=" and region=".$_POST['region'];}
if($_SESSION["TYPE"]=="RT")
{
	$query.=" and t1.branch=".$_SESSION['BRANCH'];
}
// echo $query;die;
?>

			<table class="table table-striped table-bordered" id="mydataTable" style="width:100%">

			  <thead>

			    <tr>
			    	<th>sr no</th>
			    	<th>Lead ID</th>
			    	<th>Agreement no</th>
			    	<th>Garys</th>
			    	<th>First Name</th>
			    	<th>Last Name</th>
			    	<th>Source</th>
			    	<th>Paid Yet</th>
			    	<th>Date</th>
			    	<th>Service interest</th>
			    	<th>Counselor</th>
			    	<th>Payment Type</th>
			    	<th>Region</th>
			    </tr></thead>
			    <tbody>
			    	<?php
			    	$result=$obj->display3('select t1.id as leadid,t2.id as contract_no,t2.garys as garys,t1.service_interest as program,t1.market_source as market_source,t1.region as region,t1.country_interest as country,t1.Counsilor as counselor,t1.payType as type,t1.fname as fname,t1.lname as lname,t1.paidYet as paidyet,t1.feeAgreeDate as date from dm_lead as t1 INNER join dm_lead_contract as t2 on t1.id=t2.leadId where'.$query);
			    	// print_r($result);die;
			    	if($result->num_rows>0){
			    		$i=1;
			    		while($row=$result->fetch_assoc())
			    		{
			    			$em=$obj->display('dm_employee','id='.$row['counselor']); $em1=$em->fetch_array();
			    			$si=$obj->display('dm_service','id='.$row['program']); $si1=$si->fetch_array();
			    			$re=$obj->display('dm_region','id='.$row['region']); $re1=$re->fetch_array();
			    			$sr=$obj->display('dm_source','id='.$row['market_source']); $sr1=$sr->fetch_array();
			    			?>
			    			<tr>
			    				<td><?php echo $i;?></td>
			    				<td><?php echo $row['leadid'];?></td>
			    				<td><?php echo $row['contract_no'];?></td>
			    				<td><?php echo $row['garys'];?></td>
			    				<td><?php echo $row['fname'];?></td>
			    				<td><?php echo $row['lname'];?></td>
			    				<td><?php echo $sr1['name'];?></td>
			    				<td><?php echo $row['paidyet'];?></td>
			    				<td><?php echo $row['date'];?></td>
			    				<td><?php echo $si1['name'];?></td>
			    				<td><?php echo $em1['name'];?></td>
			    				<td><?php echo $row['type'];?></td>
			    				<td><?php echo $re1['name'];?></td>
			    			</tr>
			    	<?php $i++;	}
			    	}
			    }
			    	?> 
			    </tbody>
			    <tfoot><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tfoot>
			</table>
		</div>
		<?php include_once("footer.php");?>
		<script>
$(function(){
$('#sdate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
$('#edate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
}); 
</script>
<script>
    $(document).ready(function(){
        $('#mydataTable').DataTable({
            responsive: true,
            dom:'Bfprt',
            buttons: [
            {
            	extend:'excel',
            	title:'Contracts Report',
            	messageTop:'Contracts Created from <?php echo date('d-m-Y',strtotime($_POST["sdate"]));?> to <?php echo date('d-m-Y',strtotime($_POST["edate"]));?>'
            }]
        });
    });
</script>