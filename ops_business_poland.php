<?php 	include_once("header.php");	 

if(isset($_POST['opsId']))
{
	$data = array(
    			"email" => $_POST['email'],
    			"mobile" => $_POST['mobile']
				);
	$obj->update('dm_lead',$data,'id='.$_POST['lead']);

	if($_POST['opsId']=="")
	{
			$data = array(
				'leadId'  =>  $_POST['lead'], 'tvApplyDate'  =>  $_POST['tvApplyDate'], 'tvResltDate'  =>  $_POST['tvResltDate'], 'tvApprDate'  =>  $_POST['tvApprDate'], 'tvStatus'  =>  $_POST['tvStatus'], 'poVisitDate'  =>  $_POST['poVisitDate'], 'poRtrnDate'  =>  $_POST['poRtrnDate'], 'poStatus'  =>  $_POST['poStatus'], 'crRegDate'  =>  $_POST['crRegDate'], 'crStatus'  =>  $_POST['crStatus'], 'baOpenDate'  =>  $_POST['baOpenDate'], 'baStatus'  =>  $_POST['baStatus'], 'fundTranDate'  =>  $_POST['fundTranDate'], 'fundStatus'  =>  $_POST['fundStatus'], 'afPA'  =>  $_POST['afPA'], 'afSpouse'  =>  $_POST['afSpouse'], 'afDepend'  =>  $_POST['afDepend'], 'visaReqRecDate'  =>  $_POST['visaReqRecDate'], 'visaValdDate'  =>  $_POST['visaValdDate'], 'visaInfDate'  =>  $_POST['visaInfDate'], 'visaApptDate'  =>  $_POST['visaApptDate'], 'visaDocRecDate'  =>  $_POST['visaDocRecDate'], 'visaDocRewDate'  =>  $_POST['visaDocRewDate'], 'visaDocSubDate'  =>  $_POST['visaDocSubDate'], 'visaConSentDate'  =>  $_POST['visaConSentDate'], 'waHandDate'  =>  $_POST['waHandDate'], 'waDocRecDate'  =>  $_POST['waDocRecDate'], 'waDocRewDate'  =>  $_POST['waDocRewDate'], 'waDocSignDate'  =>  $_POST['waDocSignDate'], 'waAppFinDate'  =>  $_POST['waAppFinDate'], 'waAppSubDate'  =>  $_POST['waAppSubDate'], 'waFormRecDate'  =>  $_POST['waFormRecDate'], 'passPA'  =>  $_POST['passPA'], 'waDocSignDate'  =>  $_POST['waDocSignDate'], 'passDepnd'  =>  $_POST['passDepnd'], 'passStatus'  =>  $_POST['passStatus'], 'rvPA'  =>  $_POST['rvPA'], 'rvSpouse'  =>  $_POST['rvSpouse'], 'rvDepnd'  =>  $_POST['rvDepnd'], 'rvStatus'  =>  $_POST['rvStatus'], 'idPA'  =>  $_POST['idPA'], 'idSpouse'  =>  $_POST['idSpouse'], 'idDepnd'  =>  $_POST['idDepnd'], 'idStatus'  =>  $_POST['idStatus'], 'bioPA'  =>  $_POST['bioPA'], 'bioSpouse'  =>  $_POST['bioSpouse'], 'bioDepnd'  =>  $_POST['bioDepnd'], 'bioStatus'  =>  $_POST['bioStatus'], 'schePA'  =>  $_POST['schePA'], 'scheSpouse'  =>  $_POST['scheSpouse'], 'scheDepnd'  =>  $_POST['scheDepnd'], 'scheStatus'  =>  $_POST['scheStatus'], 'insurPA'  =>  $_POST['insurPA'], 'insurSpouse'  =>  $_POST['insurSpouse'], 'insurDepnd'  =>  $_POST['insurDepnd'], 'insurStatus'  =>  $_POST['insurStatus'], 'nocPA'  =>  $_POST['nocPA'], 'nocSpouse'  =>  $_POST['nocSpouse'], 'nocDepnd'  =>  $_POST['nocDepnd'], 'nocStatus'  =>  $_POST['nocStatus'], 'itinPA'  =>  $_POST['itinPA'], 'itinSpouse'  =>  $_POST['itinSpouse'], 'itinDepnd'  =>  $_POST['itinDepnd'], 'itinStatus'  =>  $_POST['itinStatus'], 'purPA'  =>  $_POST['purPA'], 'purSpouse'  =>  $_POST['purSpouse'], 'purDepnd'  =>  $_POST['purDepnd'], 'purStatus'  =>  $_POST['purStatus'], 'pbsPA'  =>  $_POST['pbsPA'], 'pbsSpouse'  =>  $_POST['pbsSpouse'], 'pbsDepnd'  =>  $_POST['pbsDepnd'], 'pbsStatus'  =>  $_POST['pbsStatus'], 'bbsPA'  =>  $_POST['bbsPA'], 'bbsSpouse'  =>  $_POST['bbsSpouse'], 'bbsDepnd'  =>  $_POST['bbsDepnd'], 'bbsStatus'  =>  $_POST['bbsStatus'], 'licePA'  =>  $_POST['licePA'], 'liceSpouse'  =>  $_POST['liceSpouse'], 'liceDepnd'  =>  $_POST['liceDepnd'], 'liceStatus'  =>  $_POST['liceStatus'], 'estaPA'  =>  $_POST['estaPA'], 'estaSpouse'  =>  $_POST['estaSpouse'], 'estaDepnd'  =>  $_POST['estaDepnd'], 'estaStatus'  =>  $_POST['estaStatus'], 'partPA'  =>  $_POST['partPA'], 'partSpouse'  =>  $_POST['partSpouse'], 'partDepnd'  =>  $_POST['partDepnd'], 'partStatus'  =>  $_POST['partStatus'], 'nocOtherPA'  =>  $_POST['nocOtherPA'], 'nocOtherSpouse'  =>  $_POST['nocOtherSpouse'], 'nocOtherDepnd'  =>  $_POST['nocOtherDepnd'], 'nocOtherStatus'  =>  $_POST['nocOtherStatus']
				);
			$opsId=$obj->insert('dm_ops_busines_poland',$data);
	}	
	else
	{
	$opsId=$_POST['opsId'];
		$data = array(
				'tvApplyDate'  =>  $_POST['tvApplyDate'], 'tvResltDate'  =>  $_POST['tvResltDate'], 'tvApprDate'  =>  $_POST['tvApprDate'], 'tvStatus'  =>  $_POST['tvStatus'], 'poVisitDate'  =>  $_POST['poVisitDate'], 'poRtrnDate'  =>  $_POST['poRtrnDate'], 'poStatus'  =>  $_POST['poStatus'], 'crRegDate'  =>  $_POST['crRegDate'], 'crStatus'  =>  $_POST['crStatus'], 'baOpenDate'  =>  $_POST['baOpenDate'], 'baStatus'  =>  $_POST['baStatus'], 'fundTranDate'  =>  $_POST['fundTranDate'], 'fundStatus'  =>  $_POST['fundStatus'], 'afPA'  =>  $_POST['afPA'], 'afSpouse'  =>  $_POST['afSpouse'], 'afDepend'  =>  $_POST['afDepend'], 'visaReqRecDate'  =>  $_POST['visaReqRecDate'], 'visaValdDate'  =>  $_POST['visaValdDate'], 'visaInfDate'  =>  $_POST['visaInfDate'], 'visaApptDate'  =>  $_POST['visaApptDate'], 'visaDocRecDate'  =>  $_POST['visaDocRecDate'], 'visaDocRewDate'  =>  $_POST['visaDocRewDate'], 'visaDocSubDate'  =>  $_POST['visaDocSubDate'], 'visaConSentDate'  =>  $_POST['visaConSentDate'], 'waHandDate'  =>  $_POST['waHandDate'], 'waDocRecDate'  =>  $_POST['waDocRecDate'], 'waDocRewDate'  =>  $_POST['waDocRewDate'], 'waDocSignDate'  =>  $_POST['waDocSignDate'], 'waAppFinDate'  =>  $_POST['waAppFinDate'], 'waAppSubDate'  =>  $_POST['waAppSubDate'], 'waFormRecDate'  =>  $_POST['waFormRecDate'], 'passPA'  =>  $_POST['passPA'], 'waDocSignDate'  =>  $_POST['waDocSignDate'], 'passDepnd'  =>  $_POST['passDepnd'], 'passStatus'  =>  $_POST['passStatus'], 'rvPA'  =>  $_POST['rvPA'], 'rvSpouse'  =>  $_POST['rvSpouse'], 'rvDepnd'  =>  $_POST['rvDepnd'], 'rvStatus'  =>  $_POST['rvStatus'], 'idPA'  =>  $_POST['idPA'], 'idSpouse'  =>  $_POST['idSpouse'], 'idDepnd'  =>  $_POST['idDepnd'], 'idStatus'  =>  $_POST['idStatus'], 'bioPA'  =>  $_POST['bioPA'], 'bioSpouse'  =>  $_POST['bioSpouse'], 'bioDepnd'  =>  $_POST['bioDepnd'], 'bioStatus'  =>  $_POST['bioStatus'], 'schePA'  =>  $_POST['schePA'], 'scheSpouse'  =>  $_POST['scheSpouse'], 'scheDepnd'  =>  $_POST['scheDepnd'], 'scheStatus'  =>  $_POST['scheStatus'], 'insurPA'  =>  $_POST['insurPA'], 'insurSpouse'  =>  $_POST['insurSpouse'], 'insurDepnd'  =>  $_POST['insurDepnd'], 'insurStatus'  =>  $_POST['insurStatus'], 'nocPA'  =>  $_POST['nocPA'], 'nocSpouse'  =>  $_POST['nocSpouse'], 'nocDepnd'  =>  $_POST['nocDepnd'], 'nocStatus'  =>  $_POST['nocStatus'], 'itinPA'  =>  $_POST['itinPA'], 'itinSpouse'  =>  $_POST['itinSpouse'], 'itinDepnd'  =>  $_POST['itinDepnd'], 'itinStatus'  =>  $_POST['itinStatus'], 'purPA'  =>  $_POST['purPA'], 'purSpouse'  =>  $_POST['purSpouse'], 'purDepnd'  =>  $_POST['purDepnd'], 'purStatus'  =>  $_POST['purStatus'], 'pbsPA'  =>  $_POST['pbsPA'], 'pbsSpouse'  =>  $_POST['pbsSpouse'], 'pbsDepnd'  =>  $_POST['pbsDepnd'], 'pbsStatus'  =>  $_POST['pbsStatus'], 'bbsPA'  =>  $_POST['bbsPA'], 'bbsSpouse'  =>  $_POST['bbsSpouse'], 'bbsDepnd'  =>  $_POST['bbsDepnd'], 'bbsStatus'  =>  $_POST['bbsStatus'], 'licePA'  =>  $_POST['licePA'], 'liceSpouse'  =>  $_POST['liceSpouse'], 'liceDepnd'  =>  $_POST['liceDepnd'], 'liceStatus'  =>  $_POST['liceStatus'], 'estaPA'  =>  $_POST['estaPA'], 'estaSpouse'  =>  $_POST['estaSpouse'], 'estaDepnd'  =>  $_POST['estaDepnd'], 'estaStatus'  =>  $_POST['estaStatus'], 'partPA'  =>  $_POST['partPA'], 'partSpouse'  =>  $_POST['partSpouse'], 'partDepnd'  =>  $_POST['partDepnd'], 'partStatus'  =>  $_POST['partStatus'], 'nocOtherPA'  =>  $_POST['nocOtherPA'], 'nocOtherSpouse'  =>  $_POST['nocOtherSpouse'], 'nocOtherDepnd'  =>  $_POST['nocOtherDepnd'], 'nocOtherStatus'  =>  $_POST['nocOtherStatus']
				);
			$obj->update('dm_ops_busines_poland',$data,'id='.$_POST['opsId']);	
	}

	if($_FILES['tab1File']['name']!="")
	{
		$filename=time().'_'.$_FILES['tab1File']['name'];
        move_uploaded_file($_FILES['tab1File']['tmp_name'], 'uploads/documents/' . $filename);
			$dataSheet2 = array(
	    			'opsId'   =>  $opsId,
	    			'leadId'  =>  $_POST['lead'],
	    			'tab'   =>  1,
	    			'file'   =>  $filename
	    			);
			$obj->insert('dm_ops_documents',$dataSheet2);
	}
	if($_FILES['tab2File']['name']!="")
	{
		$filename=time().'_'.$_FILES['tab2File']['name'];
        move_uploaded_file($_FILES['tab2File']['tmp_name'], 'uploads/documents/' . $filename);
			$dataSheet2 = array(
	    			'opsId'   =>  $opsId,
	    			'leadId'  =>  $_POST['lead'],
	    			'tab'   =>  2,
	    			'file'   =>  $filename
	    			);
			$obj->insert('dm_ops_documents',$dataSheet2);
	}
	if($_FILES['tab3File']['name']!="")
	{
		$filename=time().'_'.$_FILES['tab3File']['name'];
        move_uploaded_file($_FILES['tab3File']['tmp_name'], 'uploads/documents/' . $filename);
			$dataSheet2 = array(
	    			'opsId'   =>  $opsId,
	    			'leadId'  =>  $_POST['lead'],
	    			'tab'   =>  3,
	    			'file'   =>  $filename
	    			);
			$obj->insert('dm_ops_documents',$dataSheet2);
	}
	if($_FILES['tab4File']['name']!="")
	{
		$filename=time().'_'.$_FILES['tab4File']['name'];
        move_uploaded_file($_FILES['tab4File']['tmp_name'], 'uploads/documents/' . $filename);
			$dataSheet2 = array(
	    			'opsId'   =>  $opsId,
	    			'leadId'  =>  $_POST['lead'],
	    			'tab'   =>  4,
	    			'file'   =>  $filename
	    			);
			$obj->insert('dm_ops_documents',$dataSheet2);
	}
	if($_FILES['tab5File']['name']!="")
	{
		$filename=time().'_'.$_FILES['tab5File']['name'];
        move_uploaded_file($_FILES['tab5File']['tmp_name'], 'uploads/documents/' . $filename);
			$dataSheet2 = array(
	    			'opsId'   =>  $opsId,
	    			'leadId'  =>  $_POST['lead'],
	    			'tab'   =>  5,
	    			'file'   =>  $filename
	    			);
			$obj->insert('dm_ops_documents',$dataSheet2);
	}

if($_POST['remark']!="")
{
	$data4 = array(
    			'lead'  =>  $_POST['lead'],
    			'date'  =>  date('Y-m-d'),
    			'remark'  =>  $_POST['remark']
				);
			$obj->insert('dm_lead_remark',$data4);
}			
header("location:ops_business_poland.php?lead=".$_POST['lead']);
}


$ops=$obj->display('dm_ops_busines_poland','leadId='.$_GET['lead']);
$ops1=$ops->fetch_array();


$lead=$obj->display('dm_lead','id='.$_GET['lead']);
$lead1=$lead->fetch_array();
?>
<style>
.opeForm label { 
display:block;
}
.opeForm label a{ 
float:right; 
color:#CC0000
}
</style>
		
<div class="col-sm-10">
			<h3 class="mb-3">Final Draft for Poland Business</h3> 
				<form action="" method="post" enctype="multipart/form-data" class="opeForm" >
					<input type="hidden" name="lead" value="<?php echo $_GET['lead'];?>" />
					<input type="hidden" name="opsId" value="<?php echo $ops1['id'];?>" />
					
<ul class="nav nav-tabs">
  <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab1"><strong>Personal Details</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab2"><strong>Documentation</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab3"><strong>Process</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab4"><strong>Application Processing Fee</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab5"><strong>Visa Application</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab6"><strong>Requirements</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab7"><strong>Remark</strong></a></li>
</ul>

<div class="tab-content p-3 mb-3">

<div class="tab-pane active container" id="tab1">
<div class="row">
<div class="col-sm-4 form-group"><label>First Name</label><input type="text" class="form-control" id="fname" name="fname" value="<?php echo $lead1['fname'];?>" readonly=""></div>
<div class="col-sm-4 form-group"><label>Middle Name</label><input type="text" class="form-control" id="mname" name="mname" value="<?php echo $lead1['mname'];?>" readonly=""></div>
<div class="col-sm-4 form-group"><label>Family Name</label><input type="text" class="form-control" id="lname" name="lname" value="<?php echo $lead1['lname'];?>" readonly=""></div>
</div>
<div class="row">
<div class="col-sm-4 form-group"><label>Email</label><input type="text" class="form-control" id="email" name="email" value="<?php echo $lead1['email'];?>" <?php if($_SESSION['ROLE']!=1) { echo 'readonly=""';} ?> ></div>
<div class="col-sm-4 form-group"><label>Landline</label><input type="text" class="form-control" id="phone" name="phone" value="<?php echo $lead1['phone'];?>"  readonly=""></div>
<div class="col-sm-4 form-group"><label>Cell No.</label><input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $lead1['mobile'];?>" <?php if($_SESSION['ROLE']!=1) { echo 'readonly=""';} ?>  ></div>
</div>
<div class="row">
<div class="col-sm-4 form-group"><label>Nationality</label><select class="form-control" name="nationality"  readonly="">
	<option value="">Select</option>
	<?php $con=$obj->display('dm_countries','1=1 order by name');
	while($con1=$con->fetch_array())
	{
	?>
	<option value="<?php echo $con1['name'];?>"  <?php if($con1['name']==$lead1['nationality']) { echo 'selected="selected"';}?>><?php echo $con1['name'];?></option>
	<?php } ?>
	
	
</select>
</div>
<div class="col-sm-8 form-group"><label>Address</label><input type="text" class="form-control" id="address" name="address" value="<?php echo $lead1['address'];?>"  readonly=""></div>

</div>
	
	
  	<div class="row" style="overflow:hidden">
<div class="col-sm-4 form-group"><label>DOB</label><input type="text" class="form-control" id="dob" name="dob" value="<?php echo date('d-m-Y',strtotime($lead1['dob']));?>"  readonly=""></div>
<div class="col-sm-4 form-group"><label>Gender</label>
	<select name="gender" class="form-control"  readonly="">
		<option value="Male" <?php if($lead1['gender']=="Male") { echo 'selected="selected"';}?>>Male</option>
		<option value="Female" <?php if($lead1['gender']=="Female") { echo 'selected="selected"';}?>>Female</option>
		</select>
</div>

<div class="col-sm-4 form-group"><label>Country Interested</label>
<select class="form-control" name="country_interest"  readonly="">
	
<?php $cnt=$obj->display('dm_country_proces','status=1 order by name');
	while($cnt1=$cnt->fetch_array())
	{
	?>
	<option value="<?php echo $cnt1['id'];?>"  <?php if($cnt1['id']==$lead1['country_interest']) { echo 'selected="selected"';}?>><?php echo $cnt1['name'];?></option>
	<?php } ?>		
	</select>
	
	</div>
			
</div>

<div class="row">


<div class="col-sm-4 form-group"><label>Program Interested</label>
<select class="form-control" name="service_interest"  readonly="">
	<?php $ser=$obj->display('dm_service','status=1 order by name');
	while($ser1=$ser->fetch_array())
	{
	?>
	<option value="<?php echo $ser1['id'];?>"  <?php if($ser1['id']==$lead1['service_interest']) { echo 'selected="selected"';}?>><?php echo $ser1['name'];?></option>
	<?php } ?>
	
</select>
</div>

<div class="col-sm-4 form-group"><label>Lead Source</label>
<select class="form-control" name="market_source"  readonly="">
	<?php $sou=$obj->display('dm_source','status=1 order by name');
	while($sou1=$sou->fetch_array())
	{
	?>
	<option value="<?php echo $sou1['id'];?>"  <?php if($sou1['id']==$lead1['market_source']) { echo 'selected="selected"';}?>><?php echo $sou1['name'];?></option>
	<?php } ?>
	
	</select>
	
	</div>
<?php
$emp=$obj->display('dm_employee','id='.$lead1['assignTo']);
$emp1=$emp->fetch_array();
?>	
			
	<div class="col-sm-4 form-group"><label>Case Processing Officer</label><input type="text" class="form-control" id="officer" name="officer" value="<?=$emp1['name'];?>"  readonly=""></div>
			
			
		
</div>
  	
  <div class="row" style="overflow:hidden">
	
  
	<div class="col-sm-4 form-group"><label >Date of retaintion</label><input type="text" class="form-control" id="retnDate" name="retnDate" value="<?php echo date('d-m-Y',strtotime($lead1['agreeDate']));?>" readonly=""  ></div>
	<div class="col-sm-4 form-group"><label >Agreement No</label><input type="text" class="form-control" id="agreeNo" name="agreeNo"  value="<?php $gh=$obj->display('dm_lead_contract','leadId='.$_GET['lead']); $gh1=$gh->fetch_array(); echo $gh1['id'];?>" readonly=""></div>
	</div>
  
  </div>
  
  
  <div class="tab-pane container" id="tab2">
  <div class="row" style="overflow:hidden">
  <div class="col-sm-12">
  <table class="table">
  <tr><th>&nbsp;</th><th style="text-align:center">PA</th><th style="text-align:center">Spouse</th><th style="text-align:center">Dependents</th><th>Status</th></tr>
  <tr>
  <td>Passport</td>
  <td>
  <select class="form-control" name="passPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['passPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['passPA']=="No") { echo 'selected="selected"';}?>>No</option>
  <option value="NA" <?php if($ops1['passPA']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </td>
  <td>
  <select class="form-control" name="passSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['passSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['passSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  	<option value="NA" <?php if($ops1['passSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="passDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['passDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['passDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['passDepnd']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </select>
  </td>
	<td>
	<select class="form-control" name="passStatus"><option value="">Select</option>
	<option value="Incomplete" <?php if($ops1['passStatus']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
	<option value="Complete" <?php if($ops1['passStatus']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
	</select>
	</td>
	</tr>

<tr>
  <td>UAE Residence Visa</td>
  <td>
  <select class="form-control" name="rvPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['rvPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['rvPA']=="No") { echo 'selected="selected"';}?>>No</option>
  <option value="NA" <?php if($ops1['rvPA']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </td>
  <td>
  <select class="form-control" name="rvSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['rvSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['rvSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  	<option value="NA" <?php if($ops1['rvSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="rvDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['rvDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['rvDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['rvDepnd']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </select>
  </td>
	<td>
	<select class="form-control" name="rvStatus"><option value="">Select</option>
	<option value="Incomplete" <?php if($ops1['rvStatus']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
	<option value="Complete" <?php if($ops1['rvStatus']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
	</select>
	</td>
	</tr>

<tr>
  <td>National ID/Emirates ID</td>
 <td>
  <select class="form-control" name="idPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['idPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['idPA']=="No") { echo 'selected="selected"';}?>>No</option>
  <option value="NA" <?php if($ops1['idPA']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </td>
  <td>
  <select class="form-control" name="idSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['idSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['idSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  	<option value="NA" <?php if($ops1['idSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="idDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['idDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['idDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['idDepnd']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </select>
  </td>
	<td>
	<select class="form-control" name="idStatus"><option value="">Select</option>
	<option value="Incomplete" <?php if($ops1['idStatus']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
	<option value="Complete" <?php if($ops1['idStatus']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
	</select>
	</td>
	</tr>	

<tr>
  <td>Biometric Size Recent Photos</td>
  <td>
  <select class="form-control" name="bioPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['bioPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['bioPA']=="No") { echo 'selected="selected"';}?>>No</option>
  <option value="NA" <?php if($ops1['bioPA']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </td>
  <td>
  <select class="form-control" name="bioSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['bioSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['bioSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  	<option value="NA" <?php if($ops1['bioSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="bioDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['bioDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['bioDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['bioDepnd']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </select>
  </td>
	<td>
	<select class="form-control" name="bioStatus"><option value="">Select</option>
	<option value="Incomplete" <?php if($ops1['bioStatus']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
	<option value="Complete" <?php if($ops1['bioStatus']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
	</select>
	</td>
	</tr>	
	
<tr>
  <td>Previous Schenegen Visa</td>
 <td>
  <select class="form-control" name="schePA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['schePA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['schePA']=="No") { echo 'selected="selected"';}?>>No</option>
  <option value="NA" <?php if($ops1['schePA']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </td>
  <td>
  <select class="form-control" name="scheSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['scheSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['scheSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  	<option value="NA" <?php if($ops1['scheSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="scheDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['scheDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['scheDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['scheDepnd']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </select>
  </td>
	<td>
	<select class="form-control" name="scheStatus"><option value="">Select</option>
	<option value="Incomplete" <?php if($ops1['scheStatus']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
	<option value="Complete" <?php if($ops1['scheStatus']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
	</select>
	</td>
	</tr>	

<tr>
  <td>Overseas Medical Insurance</td>
  <td>
  <select class="form-control" name="insurPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['insurPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['insurPA']=="No") { echo 'selected="selected"';}?>>No</option>
  <option value="NA" <?php if($ops1['insurPA']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </td>
  <td>
  <select class="form-control" name="insurSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['insurSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['insurSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  	<option value="NA" <?php if($ops1['insurSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="insurDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['insurDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['insurDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['insurDepnd']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </select>
  </td>
	<td>
	<select class="form-control" name="insurStatus"><option value="">Select</option>
	<option value="Incomplete" <?php if($ops1['insurStatus']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
	<option value="Complete" <?php if($ops1['insurStatus']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
	</select>
	</td>
	</tr>	
	
	
<tr>
  <td>NOC from the current employer</td>
  <td>
  <select class="form-control" name="nocPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['nocPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['nocPA']=="No") { echo 'selected="selected"';}?>>No</option>
  <option value="NA" <?php if($ops1['nocPA']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </td>
  <td>
  <select class="form-control" name="nocSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['nocSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['nocSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  	<option value="NA" <?php if($ops1['nocSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="nocDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['nocDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['nocDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['nocDepnd']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </select>
  </td>
	<td>
	<select class="form-control" name="nocStatus"><option value="">Select</option>
	<option value="Incomplete" <?php if($ops1['nocStatus']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
	<option value="Complete" <?php if($ops1['nocStatus']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
	</select>
	</td>
	</tr>	

<tr>
  <td>Itinerary</td>
  <td>
  <select class="form-control" name="itinPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['itinPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['itinPA']=="No") { echo 'selected="selected"';}?>>No</option>
  <option value="NA" <?php if($ops1['itinPA']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </td>
  <td>
  <select class="form-control" name="itinSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['itinSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['itinSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  	<option value="NA" <?php if($ops1['itinSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="itinDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['itinDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['itinDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['itinDepnd']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </select>
  </td>
	<td>
	<select class="form-control" name="itinStatus"><option value="">Select</option>
	<option value="Incomplete" <?php if($ops1['itinStatus']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
	<option value="Complete" <?php if($ops1['itinStatus']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
	</select>
	</td>
	</tr>	

<tr>
  <td>Statement of Purpose</td>
  <td>
  <select class="form-control" name="purPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['purPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['purPA']=="No") { echo 'selected="selected"';}?>>No</option>
  <option value="NA" <?php if($ops1['purPA']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </td>
  <td>
  <select class="form-control" name="purSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['purSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['purSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  	<option value="NA" <?php if($ops1['purSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="purDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['purDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['purDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['purDepnd']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </select>
  </td>
	<td>
	<select class="form-control" name="purStatus"><option value="">Select</option>
	<option value="Incomplete" <?php if($ops1['purStatus']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
	<option value="Complete" <?php if($ops1['purStatus']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
	</select>
	</td>
	</tr>
	
<tr>
  <td>Personal Bank Statement</td>
  <td>
  <select class="form-control" name="pbsPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['pbsPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['pbsPA']=="No") { echo 'selected="selected"';}?>>No</option>
  <option value="NA" <?php if($ops1['pbsPA']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </td>
  <td>
  <select class="form-control" name="pbsSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['pbsSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['pbsSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  	<option value="NA" <?php if($ops1['pbsSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="pbsDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['pbsDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['pbsDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['pbsDepnd']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </select>
  </td>
	<td>
	<select class="form-control" name="pbsStatus"><option value="">Select</option>
	<option value="Incomplete" <?php if($ops1['pbsStatus']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
	<option value="Complete" <?php if($ops1['pbsStatus']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
	</select>
	</td>
	</tr>
	
<tr>
  <td>Business Bank Statement</td>
  <td>
  <select class="form-control" name="bbsPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['bbsPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['bbsPA']=="No") { echo 'selected="selected"';}?>>No</option>
  <option value="NA" <?php if($ops1['bbsPA']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </td>
  <td>
  <select class="form-control" name="bbsSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['bbsSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['bbsSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  	<option value="NA" <?php if($ops1['bbsSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="bbsDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['bbsDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['bbsDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['bbsDepnd']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </select>
  </td>
	<td>
	<select class="form-control" name="bbsStatus"><option value="">Select</option>
	<option value="Incomplete" <?php if($ops1['bbsStatus']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
	<option value="Complete" <?php if($ops1['bbsStatus']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
	</select>
	</td>
	</tr>
	
<tr>
  <td>Copy of Trade License</td>
 <td>
  <select class="form-control" name="licePA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['licePA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['licePA']=="No") { echo 'selected="selected"';}?>>No</option>
  <option value="NA" <?php if($ops1['licePA']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </td>
  <td>
  <select class="form-control" name="liceSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['liceSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['liceSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  	<option value="NA" <?php if($ops1['liceSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="liceDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['liceDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['liceDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['liceDepnd']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </select>
  </td>
	<td>
	<select class="form-control" name="liceStatus"><option value="">Select</option>
	<option value="Incomplete" <?php if($ops1['liceStatus']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
	<option value="Complete" <?php if($ops1['liceStatus']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
	</select>
	</td>
	</tr>
	
<tr>
  <td>Copy of Company<br /> Establishment Card</td>
  <td>
  <select class="form-control" name="estaPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['estaPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['estaPA']=="No") { echo 'selected="selected"';}?>>No</option>
  <option value="NA" <?php if($ops1['estaPA']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </td>
  <td>
  <select class="form-control" name="estaSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['estaSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['estaSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  	<option value="NA" <?php if($ops1['estaSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="estaDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['estaDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['estaDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['estaDepnd']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </select>
  </td>
	<td>
	<select class="form-control" name="estaStatus"><option value="">Select</option>
	<option value="Incomplete" <?php if($ops1['estaStatus']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
	<option value="Complete" <?php if($ops1['estaStatus']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
	</select>
	</td>
	</tr>
	
<tr>
  <td>Copy of Partnership Certificate</td>
 <td>
  <select class="form-control" name="partPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['partPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['partPA']=="No") { echo 'selected="selected"';}?>>No</option>
  <option value="NA" <?php if($ops1['partPA']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </td>
  <td>
  <select class="form-control" name="partSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['partSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['partSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  	<option value="NA" <?php if($ops1['partSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="partDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['partDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['partDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['partDepnd']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </select>
  </td>
	<td>
	<select class="form-control" name="partStatus"><option value="">Select</option>
	<option value="Incomplete" <?php if($ops1['partStatus']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
	<option value="Complete" <?php if($ops1['partStatus']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
	</select>
	</td>
	</tr>
	
<tr>
  <td>NOC from other <br />partner/investor/shareholder<br /> of the company</td>
 <td>
  <select class="form-control" name="nocOtherPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['nocOtherPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['nocOtherPA']=="No") { echo 'selected="selected"';}?>>No</option>
  <option value="NA" <?php if($ops1['nocOtherPA']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </td>
  <td>
  <select class="form-control" name="nocOtherSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['nocOtherSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['nocOtherSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  	<option value="NA" <?php if($ops1['nocOtherSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="nocOtherDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['nocOtherDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['nocOtherDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['nocOtherDepnd']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </select>
  </td>
	<td>
	<select class="form-control" name="nocOtherStatus"><option value="">Select</option>
	<option value="Incomplete" <?php if($ops1['nocOtherStatus']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
	<option value="Complete" <?php if($ops1['nocOtherStatus']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
	</select>
	</td>
	</tr>									
  </table>
  </div>
   <div class="col-sm-4 form-group"><label>Document File <?php if($ops1['tab1File']!="") { echo '<a href="uploads/documents/'.$ops1['tab1File'].'" target="_blank" style="float:right">View</a>'; }?></label>
 		 <input type="file" class="form-control" id="tab1File" name="tab1File" >
  	</div>
  </div>
    
 <?php 
  if($ops->num_rows > 0)
   {
   $doc=$obj->display('dm_ops_documents','tab=1 and leadId='.$_GET['lead'].' and opsId='.$ops1['id']);
   while($doc1=$doc->fetch_array())
   {
   ?>
  <div class="row" style="overflow:hidden">
 	<div class="col-sm-6"><a href="uploads/documents/<?=$doc1['file'];?>" target="_blank"><?php echo $doc1['file'];?></a></div><div class="col-sm-3"><a href="ops_skill_canada.php?docId=<?php echo $doc1['id'];?>&lead=<?php echo $_GET['lead'];?>">Delete</a></div>
  </div>
  <?php }} ?>    
  </div>
  
  
  <div class="tab-pane container" id="tab3">
   <div class="row" style="overflow:hidden">
  <div class="col-sm-12">
  <table class="table">
  <tr>
  <td>Tourist Visa</td>
  <td>Applied On <br /><input type="text" class="form-control" id="tvApplyDate" name="tvApplyDate" value="<?php echo $ops1['tvApplyDate'];?>" ></td>
  <td>Result Received On <br /><input type="text" class="form-control" id="tvResltDate" name="tvResltDate" value="<?php echo $ops1['tvResltDate'];?>" ></td>
  <td>Approved/Disapproved On<br /><input type="text" class="form-control" id="tvApprDate" name="tvApprDate" value="<?php echo $ops1['tvApprDate'];?>" ></td>
  <td>Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
  <select class="form-control" name="tvStatus"><option value="">Select</option><option value="">Incomplete</option><option value="">Complete</option></select>
  </td>
</tr>

<tr>
  <td>Visit to Poland</td>
  <td>Visited On <br /><input type="text" class="form-control" id="poVisitDate" name="poVisitDate" value="<?php echo $ops1['poVisitDate'];?>" ></td>
  <td>Returned On <br /><input type="text" class="form-control" id="poRtrnDate" name="poRtrnDate" value="<?php echo $ops1['poRtrnDate'];?>" ></td>
  <td></td>
  <td><select class="form-control" name="poStatus">
  <option value="">Select</option>
  <option value="Incomplete" <?php if($ops1['poStatus']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
  <option value="Complete" <?php if($ops1['poStatus']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
  </select></td>
	</tr>
<tr>
  <td>Company Registration</td>
 <td>Registered On <br /><input type="text" class="form-control" id="crRegDate" name="crRegDate" value="<?php echo $ops1['crRegDate'];?>" ></td>
  <td></td>
  <td></td>
	<td><select class="form-control" name="crStatus"><option value="">Select</option>
  <option value="Incomplete" <?php if($ops1['crStatus']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
  <option value="Complete" <?php if($ops1['crStatus']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
	</select></td>
	</tr>

	

<tr>
  <td>Bank Account</td>
 <td>Opened On<br /><input type="text" class="form-control" id="baOpenDate" name="baOpenDate" value="<?php echo $ops1['baOpenDate'];?>" ></td>
  <td></td>
  <td></td>
	<td><select class="form-control" name="baStatus"><option value="">Select</option>  
	<option value="Incomplete" <?php if($ops1['baStatus']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
  <option value="Complete" <?php if($ops1['baStatus']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
</select></td>
	</tr>

<tr>
  <td>Funds Transfer</td>
 <td>Transferred On<br /><input type="text" class="form-control" id="fundTranDate" name="fundTranDate" value="<?php echo $ops1['fundTranDate'];?>" ></td>
  <td></td>
  <td></td>
	<td><select class="form-control" name="fundStatus"><option value="">Select</option>  
	<option value="Incomplete" <?php if($ops1['fundStatus']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
  <option value="Complete" <?php if($ops1['fundStatus']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
</select></td>
	</tr>
		

	</table>
	</div>
	
	 <div class="col-sm-4 form-group"><label>Document File <?php if($ops1['tab2File']!="") { echo '<a href="uploads/documents/'.$ops1['tab2File'].'" target="_blank" style="float:right">View</a>'; }?></label>
 		 <input type="file" class="form-control" id="tab2File" name="tab2File" >
  	</div>
	</div>  
 
  <?php 
   if($ops->num_rows > 0)
   {
   $doc=$obj->display('dm_ops_documents','tab=2 and leadId='.$_GET['lead'].' and opsId='.$ops1['id']);
   while($doc1=$doc->fetch_array())
   {
   ?>
  <div class="row" style="overflow:hidden">
 	<div class="col-sm-6"><a href="uploads/documents/<?=$doc1['file'];?>" target="_blank"><?php echo $doc1['file'];?></a></div><div class="col-sm-3"><a href="ops_skill_canada.php?docId=<?php echo $doc1['id'];?>&lead=<?php echo $_GET['lead'];?>">Delete</a></div>
  </div>
  <?php }} ?> 	
  </div>
  
<div class="tab-pane container" id="tab4">

	<div class="row" style="overflow:hidden">
	<div class="col-sm-12 form-group">
  <table class="table">
  <tr><th>&nbsp;</th><th style="text-align:center">PA</th><th style="text-align:center">Spouse</th><th style="text-align:center">Dependents</th></tr>
  

<tr>
  <td>Application Fee</td>
  <td>
  <select class="form-control" name="afPA">
		<option value="">Select</option>
		<option value="Yes" <?php if($ops1['afPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
		<option value="No" <?php if($ops1['afPA']=="No") { echo 'selected="selected"';}?>>No</option>
		</select>
	</td>
	<td><select class="form-control" name="afSpouse">
		<option value="">Select</option>
		<option value="Yes" <?php if($ops1['afSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
		<option value="No" <?php if($ops1['afSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
		</select>
	</td>
	<td>
	<select class="form-control" name="afDepend">
		<option value="">Select</option>
		<option value="Yes" <?php if($ops1['afDepend']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
		<option value="No" <?php if($ops1['afDepend']=="No") { echo 'selected="selected"';}?>>No</option>
		</select>
	</td>
	</tr>
	
	


	
  </table>
  
  </div>
  
   <div class="col-sm-4 form-group"><label>Document File <?php if($ops1['tab3File']!="") { echo '<a href="uploads/documents/'.$ops1['tab3File'].'" target="_blank" style="float:right">View</a>'; }?></label>
 		 <input type="file" class="form-control" id="tab3File" name="tab3File" >
  	</div>
	
	</div>

 <?php 
  if($ops->num_rows > 0)
   {
   $doc=$obj->display('dm_ops_documents','tab=3 and leadId='.$_GET['lead'].' and opsId='.$ops1['id']);
   while($doc1=$doc->fetch_array())
   {
   ?>
  <div class="row" style="overflow:hidden">
 	<div class="col-sm-6"><a href="uploads/documents/<?=$doc1['file'];?>" target="_blank"><?php echo $doc1['file'];?></a></div><div class="col-sm-3"><a href="ops_skill_canada.php?docId=<?php echo $doc1['id'];?>&lead=<?php echo $_GET['lead'];?>">Delete</a></div>
  </div>
  <?php } }?>

</div>
  
  


  <div class="tab-pane container" id="tab5">
	<div class="row" style="overflow:hidden">
		<div class="col-sm-3 form-group"><label>Doc.Checklist Given On</label>
		<input type="text" class="form-control" id="waHandDate" name="waHandDate" value="<?php echo $ops1['waHandDate'];?>" >
		</div>

		<div class="col-sm-3 form-group"><label>Documents Received On</label>
		<input type="text" class="form-control" id="waDocRecDate" name="waDocRecDate" value="<?php echo $ops1['waDocRecDate'];?>" >
		</div>
		<div class="col-sm-3 form-group"><label>Documents Reviewed On</label>
		<input type="text" class="form-control" id="waDocRewDate" name="waDocRewDate" value="<?php echo $ops1['waDocRewDate'];?>" >
		</div>
		<div class="col-sm-3 form-group"><label>Forms Received On</label>
		<input type="text" class="form-control" id="waFormRecDate" name="waFormRecDate" value="<?php echo $ops1['waFormRecDate'];?>" >
		</div>

	</div>
	<div class="row" style="overflow:hidden">
		<div class="col-sm-3 form-group"><label>Forms Signed On</label>
		<input type="text" class="form-control" id="waDocSignDate" name="waDocSignDate" value="<?php echo $ops1['waDocSignDate'];?>" >
		</div>
		<div class="col-sm-3 form-group"><label>Application Finalized On</label>
		<input type="text" class="form-control" id="waAppFinDate" name="waAppFinDate" value="<?php echo $ops1['waAppFinDate'];?>" >
		</div>
		<div class="col-sm-3 form-group"><label>Application Submitted On</label>
		<input type="text" class="form-control" id="waAppSubDate" name="waAppSubDate" value="<?php echo $ops1['waAppSubDate'];?>" >
		</div>
		
		 <div class="col-sm-4 form-group"><label>Document File <?php if($ops1['tab4File']!="") { echo '<a href="uploads/documents/'.$ops1['tab4File'].'" target="_blank" style="float:right">View</a>'; }?></label>
 		 <input type="file" class="form-control" id="tab4File" name="tab4File" >
  	</div>
	</div>
	 <?php 
	  if($ops->num_rows > 0)
   {
   $doc=$obj->display('dm_ops_documents','tab=4 and leadId='.$_GET['lead'].' and opsId='.$ops1['id']);
   while($doc1=$doc->fetch_array())
   {
   ?>
  <div class="row" style="overflow:hidden">
 	<div class="col-sm-6"><a href="uploads/documents/<?=$doc1['file'];?>" target="_blank"><?php echo $doc1['file'];?></a></div><div class="col-sm-3"><a href="ops_skill_canada.php?docId=<?php echo $doc1['id'];?>&lead=<?php echo $_GET['lead'];?>">Delete</a></div>
  </div>
  <?php }} ?>

</div>

  <div class="tab-pane container" id="tab6">
  
    <div class="row" style="overflow:hidden">
  <div class="col-sm-3 form-group"><label>Requirement Received On</label>
	  <input type="text" class="form-control" id="visaReqRecDate" name="visaReqRecDate" value="<?php echo $ops1['visaReqRecDate'];?>" >
   </div>
  <div class="col-sm-3 form-group"><label>Valid Till</label>
  <input type="text" class="form-control" id="visaValdDate" name="visaValdDate" value="<?php echo $ops1['visaValdDate'];?>" >
  </div>
  <div class="col-sm-3 form-group"><label>Client Informed On</label>
  <input type="text" class="form-control" id="visaInfDate" name="visaInfDate" value="<?php echo $ops1['visaInfDate'];?>" >
  </div>
  <div class="col-sm-3 form-group"><label>Appointment Fixed On </label>
  <input type="text" class="form-control" id="visaApptDate" name="visaApptDate" value="<?php echo $ops1['visaApptDate'];?>" >
  </div>
  </div>
  
   <div class="row" style="overflow:hidden">
 <div class="col-sm-3 form-group"><label>Documents Received On</label>
  <input type="text" class="form-control" id="visaDocRecDate" name="visaDocRecDate" value="<?php echo $ops1['visaDocRecDate'];?>" >
  </div>
 <div class="col-sm-3 form-group"><label>Documents Reviewed On</label>
  <input type="text" class="form-control" id="visaDocRewDate" name="visaDocRewDate" value="<?php echo $ops1['visaDocRewDate'];?>" >
  </div>
 <div class="col-sm-3 form-group"><label>Documents Submitted On</label>
  <input type="text" class="form-control" id="visaDocSubDate" name="visaDocSubDate" value="<?php echo $ops1['visaDocSubDate'];?>" >
  </div>
 <div class="col-sm-3 form-group"><label>Confirmation Sent On</label>
  <input type="text" class="form-control" id="visaConSentDate" name="visaConSentDate" value="<?php echo $ops1['visaConSentDate'];?>" >
  </div>
   <div class="col-sm-4 form-group"><label>Document File <?php if($ops1['tab5File']!="") { echo '<a href="uploads/documents/'.$ops1['tab5File'].'" target="_blank" style="float:right">View</a>'; }?></label>
 		 <input type="file" class="form-control" id="tab5File" name="tab5File" >
  	</div>
  
  </div> 
 
 <?php 
  if($ops->num_rows > 0)
   {
   $doc=$obj->display('dm_ops_documents','tab=5 and leadId='.$_GET['lead'].' and opsId='.$ops1['id']);
   while($doc1=$doc->fetch_array())
   {
   ?>
  <div class="row" style="overflow:hidden">
 	<div class="col-sm-6"><a href="uploads/documents/<?=$doc1['file'];?>" target="_blank"><?php echo $doc1['file'];?></a></div><div class="col-sm-3"><a href="ops_skill_canada.php?docId=<?php echo $doc1['id'];?>&lead=<?php echo $_GET['lead'];?>">Delete</a></div>
  </div>
  <?php } }?> 
  </div>
  
  
<div class="tab-pane container" id="tab7">
       <div class="row" style="overflow:hidden">
<div class="col-sm-12 form-group">
<?php 
				$rem=$obj->display('dm_lead_remark','lead='.$_GET["lead"]); while($rem1=$rem->fetch_array()) 
				{
						echo "<p>".$rem1['remark'].'-'.date('d/m/Y',strtotime($rem1['date'])).'<p>';
				}
?>
</div>
	   <div class="col-sm-12 form-group"><label>Remark</label><textarea type="text" class="form-control" id="remark" name="remark"></textarea></div>
	   </div>

  </div>

</div>
		<div class="row">	
						<div class="col-sm-12 form-group">
			<input type="submit" name="submit" value="SUBMIT" class="btn btn-info"> 	
			</div>			
					</div>
				</form>
			</div>
		
<?php 	include_once("footer.php");	?>
   	<script>
		$(function(){
		$('#retnDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 

		$('#tvApplyDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#tvResltDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#tvApprDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#poVisitDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#poRtrnDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#crRegDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#baOpenDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#fundTranDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 

		$('#visaReqRecDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#visaValdDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#visaInfDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#visaApptDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#visaDocRecDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#visaDocRewDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#visaDocSubDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#visaConSentDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 

			
		$('#waHandDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#waDocRecDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#waDocRewDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#waDocSignDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#waAppFinDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#waAppSubDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#waFormRecDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		}); 
	</script>

<!-- <script type="text/javascript" src="js/table-drop-down.js"></script> -->