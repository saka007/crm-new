<?php include_once("header.php");
?>

<div class="col-sm-10">
		<div class="row"><div class="col-sm-6"><h4 class="mb-3" style="color:#2cb674;">Australia Application Report</h4></div></div>
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

<!-- ECA  FILTER   -->

<!-- <div class="col-sm-2 form-group"><label>ECA</label>
<select class="form-control" name="eca" id="eca">
	<option value="">Select</option>
	<option value="Pending">Pending</option>
    <option value="Completed">Completed</option>
    <option value="Insufficient">Insufficient</option>
    <option value="Registered">Registered</option>
	</select>
</div> -->

<!-- end -->

<!--Spouse ECA  FILTER   -->

<!-- <div class="col-sm-2 form-group"><label>Spouse ECA</label>
<select class="form-control" name="ecas" id="ecas">
	<option value="">Select</option>
	<option value="Pending">Pending</option>
    <option value="Completed">Completed</option>
    <option value="Insufficient">Insufficient</option>
    <option value="Registered">Registered</option>
	</select>
</div> -->

<!-- end -->

<!--IELTS FILTER   -->

<div class="col-sm-2 form-group"><label>IELTS</label>
<select class="form-control" name="ielts" id="ielts">
	<option value="">Select</option>
	<option value="Pending">Pending</option>
    <option value="Completed">Completed</option>
    <option value="Insufficient">Insufficient</option>
    <option value="Registered">Registered</option>
	</select>
</div>

<!-- end -->

<!--Spouse IELTS FILTER   -->

<!-- <div class="col-sm-2 form-group"><label>IELTS Spouse</label>
<select class="form-control" name="ieltss" id="ieltss">
	<option value="">Select</option>
	<option value="Pending">Pending</option>
    <option value="Completed">Completed</option>
    <option value="Insufficient">Insufficient</option>
    <option value="Registered">Registered</option>
	</select>
</div> -->

<!-- end -->

<!--Skill Assesment   -->

<div class="col-sm-2 form-group"><label>Skill assmt Status</label>
<select class="form-control" name="sa" id="sa">
	<option value="">Select</option>
    <option value="Check-list Issued">Check-list Issued</option>
    <option value="Documents Pending">Documents Pending</option>
    <option value="Submitted">Submitted</option>
    <option value="Positive">Positive</option>
    <option value="Negative">Negative</option>
	</select>
</div>

<!-- end -->

<!--Spouse Skill Assesment   -->

<div class="col-sm-2 form-group"><label>Spouse Skill assmt Status</label>
<select class="form-control" name="ssa" id="ssa">
	<option value="">Select</option>
    <option value="Pending">Pending</option>
    <option value="Completed">Completed</option>
    <option value="Positive">Positive</option>
    <option value="Negative">Negative</option>
    <option value="Submitted">Submitted</option>
	</select>
</div>

<!-- end -->

<!-- EOI   -->

<div class="col-sm-2 form-group"><label>EOI</label>
<select class="form-control" name="eoi" id="eoi">
	<option value="">Select</option>
    <option value="Pending">Pending</option>
    <option value="APPROVED">APPROVED</option>
    <option value="Rejected">Rejected</option>
	</select>
</div>

<!-- end -->

<!-- ITA    -->

<div class="col-sm-2 form-group"><label>ITA</label>
<select class="form-control" name="ita" id="ita">
	<option value="">Select</option>
    <option value="IN PROGRESS">IN PROGRESS</option>
    <option value="APPROVED">APPROVED</option>
    <option value="Rejected">Rejected</option>
    <option value="DECLINED">DECLINED</option>
	</select>
</div>

<!-- end -->

<!-- Visa  Status  -->

<div class="col-sm-2 form-group"><label>Visa Status</label>
<select class="form-control" name="vs" id="vs">
	<option value="">Select</option>
    <option value="ITA Received">ITA Received</option>
    <option value="Application Submitted">Application Submitted</option>
    <option value="Visa Approved">Visa Approved</option>
    <option value="Documents Pending">Documents Pending</option>
    <option value="DHA - Docs Request">DHA - Docs Request</option>
    <option value="Refused">Refused</option>
    <option value="Appeal the Decision">Appeal the Decision</option>
	</select>
</div>

<!-- end -->

<div class="col-sm-2 form-group"><label>&nbsp;</label><br /><input type="submit" class="btn btn-info" name="search" value="Search" ></div>

</div>

</form>



<?php if($_POST)
{ ?>
<div class="row">
		<div class="col-sm-12 text-center">
		<h4 class="mt-2" style="color:#2cb674;">Australia Client Application Report</h4>
		<p class="mb-3">Report From <?php echo date('d-m-Y',strtotime($_POST["sdate"]));?> To <?php echo date('d-m-Y',strtotime($_POST["edate"]));?></p>
		</div></div>
		<?php
$query=" t1.feeAgreeDate between '".date('Y-m-d',strtotime($_POST["sdate"]))."' and '".date('Y-m-d',strtotime($_POST["edate"]))."' and paidyet!='0'";
if($_POST['region']!="") { 	$query.=" and t1.region=".$_POST['region'];}

// if($_POST['eca']!="") { 	$query.=" and ecaStatus='".$_POST['eca']."'";}

// if($_POST['ecas']!="") { 	$query.=" and specaStatus='".$_POST['ecas']."'";}

if($_POST['ielts']!="") { 	$query.=" and testStatus='".$_POST['ielts']."'";}

// if($_POST['ieltss']!="") { 	$query.=" and statusS='".$_POST['ieltss']."'";}

if($_POST['sa']!="") { 	$query.=" and assmStatus='".$_POST['sa']."'";}

if($_POST['ssa']!="") { 	$query.=" and spSkillAssm='".$_POST['ssa']."'";}

// if($_POST['ita']!="") { 	$query.=" and itaSts='".$_POST['ita']."'";}

if($_POST['eoi']!="") { 	$query.=" and eoiStatus='".$_POST['eoi']."'";}

if($_POST['vs']!="") { 	$query.=" and visaStatus='".$_POST['vs']."'";}
// echo $query;die;
?>

			<table class="table table-striped table-bordered" id="mydataTable" style="width:100%">

			  <thead>

			    <tr>
			    	<th>sr no</th>
			    	<th>Lead ID</th>
			    	<th>Agreement no</th>
			    	<th>IELTS Status</th>
			    	<th>Skill Assmt</th>
			    	<th>Sp Skill Assmt</th>
			    	<th>EOI</th>
			    	<th>Visa Status</th>
			    	<th>Case Proccesing Officer</th>
			    	<th>Region</th>
			    </tr></thead>
			    <tbody>
			    	<?php
			    	$result=$obj->display3('select t1.id as leadid,t1.region as region,t1.assignTo as caseof,t2.* from dm_lead as t1 INNER join dm_ops_skill_australia as t2 on t1.id=t2.leadId where'.$query);
			    	// print_r($result);die;
			    	if($result->num_rows>0){
			    		$i=1;
			    		while($row=$result->fetch_assoc())
			    		{
			    			$em=$obj->display('dm_employee','id='.$row['caseof']); $em1=$em->fetch_array();
                            $re=$obj->display('dm_region','id='.$row['region']); $re1=$re->fetch_array();
                            $ag=$obj->display('dm_lead_contract','leadId='.$row['leadid']); $ag1=$ag->fetch_array();
			    			?>
			    			<tr>
			    				<td><?php echo $i;?></td>
			    				<td><?php echo $row['leadid'];?></td>
			    				<td><?php echo $ag1['id'];?></td>
			    				<td><?php echo $row['testStatus'];?></td>
			    				<td><?php echo $sr1['assmStatus'];?></td>
			    				<td><?php echo $row['spSkillAssm'];?></td>
			    				<td><?php echo $row['eoiStatus'];?></td>
			    				<td><?php echo $row['visaStatus'];?></td>
			    				<td><?php echo $em1['name'];?></td>
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