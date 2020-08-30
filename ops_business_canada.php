<?php 
include_once("header.php");	

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
				'leadId'  =>  $_POST['lead'], 'ecaReceDate'  =>  $_POST['ecaReceDate'], 'ecaPackage'  =>  $_POST['ecaPackage'], 'ecaDocStatus'  =>  $_POST['ecaDocStatus'], 'ecaAssmBody'  =>  $_POST['ecaAssmBody'], 'ecaApplyDate'  =>  $_POST['ecaApplyDate'], 'ecaPayMode'  =>  $_POST['ecaPayMode'], 'ecaTranSent'  =>  $_POST['ecaTranSent'], 'ecaTranStatus'  =>  $_POST['ecaTranStatus'], 'ecaStatus'  =>  $_POST['ecaStatus'], 'compDate'  =>  $_POST['compDate'], 'expVisit'  =>  $_POST['expVisit'], 'expAgent'  =>  $_POST['expAgent'], 'expCounty'  =>  $_POST['expCounty'], 'expSdate'  =>  $_POST['expSdate'], 'expEdate'  =>  $_POST['expEdate'], 'ndPA'  =>  $_POST['ndPA'], 'ndSpouse'  =>  $_POST['ndSpouse'], 'ndDepend'  =>  $_POST['ndDepend'], 'pgPA'  =>  $_POST['pgPA'], 'pgSpouse'  =>  $_POST['pgSpouse'], 'pgDepend'  =>  $_POST['pgDepend'], 'piPA'  =>  $_POST['piPA'], 'piSpouse'  =>  $_POST['piSpouse'], 'piDepend'  =>  $_POST['piDepend'], 'eiReceDate'  =>  $_POST['eiReceDate'], 'eiRewDate'  =>  $_POST['eiRewDate'], 'eiFinDate'  =>  $_POST['eiFinDate'], 'eiSentDate'  =>  $_POST['eiSentDate'], 'eiConfDate'  =>  $_POST['eiConfDate'], 'eiSubDate'  =>  $_POST['eiSubDate'], 'eiInvtDate'  =>  $_POST['eiInvtDate'], 'eiValdDate'  =>  $_POST['eiValdDate'], 'visaPaySts'  =>  $_POST['visaPaySts'], 'visaPayDate'  =>  $_POST['visaPayDate'], 'docGivDate'  =>  $_POST['docGivDate'], 'docRecDate'  =>  $_POST['docRecDate'], 'docStatus'  =>  $_POST['docStatus'], 'docRewDate'  =>  $_POST['docRewDate'], 'docFowDate'  =>  $_POST['docFowDate'], 'docFeeDate'  =>  $_POST['docFeeDate'], 'docRepDate'  =>  $_POST['docRepDate'], 'visaReqRecDate'  =>  $_POST['visaReqRecDate'], 'visaValdDate'  =>  $_POST['visaValdDate'], 'visaInfDate'  =>  $_POST['visaInfDate'], 'visaApptDate'  =>  $_POST['visaApptDate'], 'visaDocRecDate'  =>  $_POST['visaDocRecDate'], 'visaDocRewDate'  =>  $_POST['visaDocRewDate'], 'visaDocSubDate'  =>  $_POST['visaDocSubDate'], 'visaConSentDate'  =>  $_POST['visaConSentDate'], 'intwRecDate'  =>  $_POST['intwRecDate'], 'intSchDate'  =>  $_POST['intSchDate'], 'intInfmDate'  =>  $_POST['intInfmDate'], 'intFixdDate'  =>  $_POST['intFixdDate'], 'intBrfDate'  =>  $_POST['intBrfDate'], 'intDocDate'  =>  $_POST['intDocDate'], 'intDocRecDate'  =>  $_POST['intDocRecDate'], 'intPrep'  =>  $_POST['intPrep'], 'intResult'  =>  $_POST['intResult'], 'paReceDate'  =>  $_POST['paReceDate'], 'paAgreDate'  =>  $_POST['paAgreDate'], 'paSentDate'  =>  $_POST['paSentDate'], 'paConfDate'  =>  $_POST['paConfDate'], 'waRecDate'  =>  $_POST['waRecDate'], 'waInfDate'  =>  $_POST['waInfDate'], 'waFixDate'  =>  $_POST['waFixDate'], 'waHandDate'  =>  $_POST['waHandDate'], 'waDocRecDate'  =>  $_POST['waDocRecDate'], 'waDocRewDate'  =>  $_POST['waDocRewDate'], 'waDocSignDate'  =>  $_POST['waDocSignDate'], 'waAppFinDate'  =>  $_POST['waAppFinDate'], 'waAppSubDate'  =>  $_POST['waAppSubDate'], 'waAppSentDate'  =>  $_POST['waAppSentDate'], 'waFileRecDate'  =>  $_POST['waFileRecDate'], 'waReqRecDate'  =>  $_POST['waReqRecDate'], 'waMedRecDate'  =>  $_POST['waMedRecDate'], 'waMedSubDate'  =>  $_POST['waMedSubDate'], 'waPapRecDate'  =>  $_POST['waPapRecDate']
				);
			$opsId=$obj->insert('dm_ops_busines_canada',$data);
	}
	else
	{
	$opsId=$_POST['opsId'];
	$data = array(
				'ecaReceDate'  =>  $_POST['ecaReceDate'], 'ecaPackage'  =>  $_POST['ecaPackage'], 'ecaDocStatus'  =>  $_POST['ecaDocStatus'], 'ecaAssmBody'  =>  $_POST['ecaAssmBody'], 'ecaApplyDate'  =>  $_POST['ecaApplyDate'], 'ecaPayMode'  =>  $_POST['ecaPayMode'], 'ecaTranSent'  =>  $_POST['ecaTranSent'], 'ecaTranStatus'  =>  $_POST['ecaTranStatus'], 'ecaStatus'  =>  $_POST['ecaStatus'], 'compDate'  =>  $_POST['compDate'], 'expVisit'  =>  $_POST['expVisit'], 'expAgent'  =>  $_POST['expAgent'], 'expCounty'  =>  $_POST['expCounty'], 'expSdate'  =>  $_POST['expSdate'], 'expEdate'  =>  $_POST['expEdate'], 'ndPA'  =>  $_POST['ndPA'], 'ndSpouse'  =>  $_POST['ndSpouse'], 'ndDepend'  =>  $_POST['ndDepend'], 'pgPA'  =>  $_POST['pgPA'], 'pgSpouse'  =>  $_POST['pgSpouse'], 'pgDepend'  =>  $_POST['pgDepend'], 'piPA'  =>  $_POST['piPA'], 'piSpouse'  =>  $_POST['piSpouse'], 'piDepend'  =>  $_POST['piDepend'], 'eiReceDate'  =>  $_POST['eiReceDate'], 'eiRewDate'  =>  $_POST['eiRewDate'], 'eiFinDate'  =>  $_POST['eiFinDate'], 'eiSentDate'  =>  $_POST['eiSentDate'], 'eiConfDate'  =>  $_POST['eiConfDate'], 'eiSubDate'  =>  $_POST['eiSubDate'], 'eiInvtDate'  =>  $_POST['eiInvtDate'], 'eiValdDate'  =>  $_POST['eiValdDate'], 'visaPaySts'  =>  $_POST['visaPaySts'], 'visaPayDate'  =>  $_POST['visaPayDate'], 'docGivDate'  =>  $_POST['docGivDate'], 'docRecDate'  =>  $_POST['docRecDate'], 'docStatus'  =>  $_POST['docStatus'], 'docRewDate'  =>  $_POST['docRewDate'], 'docFowDate'  =>  $_POST['docFowDate'], 'docFeeDate'  =>  $_POST['docFeeDate'], 'docRepDate'  =>  $_POST['docRepDate'], 'visaReqRecDate'  =>  $_POST['visaReqRecDate'], 'visaValdDate'  =>  $_POST['visaValdDate'], 'visaInfDate'  =>  $_POST['visaInfDate'], 'visaApptDate'  =>  $_POST['visaApptDate'], 'visaDocRecDate'  =>  $_POST['visaDocRecDate'], 'visaDocRewDate'  =>  $_POST['visaDocRewDate'], 'visaDocSubDate'  =>  $_POST['visaDocSubDate'], 'visaConSentDate'  =>  $_POST['visaConSentDate'], 'intwRecDate'  =>  $_POST['intwRecDate'], 'intSchDate'  =>  $_POST['intSchDate'], 'intInfmDate'  =>  $_POST['intInfmDate'], 'intFixdDate'  =>  $_POST['intFixdDate'], 'intBrfDate'  =>  $_POST['intBrfDate'], 'intDocDate'  =>  $_POST['intDocDate'], 'intDocRecDate'  =>  $_POST['intDocRecDate'], 'intPrep'  =>  $_POST['intPrep'], 'intResult'  =>  $_POST['intResult'], 'paReceDate'  =>  $_POST['paReceDate'], 'paAgreDate'  =>  $_POST['paAgreDate'], 'paSentDate'  =>  $_POST['paSentDate'], 'paConfDate'  =>  $_POST['paConfDate'], 'waRecDate'  =>  $_POST['waRecDate'], 'waInfDate'  =>  $_POST['waInfDate'], 'waFixDate'  =>  $_POST['waFixDate'], 'waHandDate'  =>  $_POST['waHandDate'], 'waDocRecDate'  =>  $_POST['waDocRecDate'], 'waDocRewDate'  =>  $_POST['waDocRewDate'], 'waDocSignDate'  =>  $_POST['waDocSignDate'], 'waAppFinDate'  =>  $_POST['waAppFinDate'], 'waAppSubDate'  =>  $_POST['waAppSubDate'], 'waAppSentDate'  =>  $_POST['waAppSentDate'], 'waFileRecDate'  =>  $_POST['waFileRecDate'], 'waReqRecDate'  =>  $_POST['waReqRecDate'], 'waMedRecDate'  =>  $_POST['waMedRecDate'], 'waMedSubDate'  =>  $_POST['waMedSubDate'], 'waPapRecDate'  =>  $_POST['waPapRecDate']
				);
			$obj->update('dm_ops_busines_canada',$data,'id='.$_POST['opsId']);	
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
	if($_FILES['tab6File']['name']!="")
	{
		$filename=time().'_'.$_FILES['tab6File']['name'];
        move_uploaded_file($_FILES['tab6File']['tmp_name'], 'uploads/documents/' . $filename);
			$dataSheet2 = array(
	    			'opsId'   =>  $opsId,
	    			'leadId'  =>  $_POST['lead'],
	    			'tab'   =>  6,
	    			'file'   =>  $filename
	    			);
			$obj->insert('dm_ops_documents',$dataSheet2);
	}
	if($_FILES['tab7File']['name']!="")
	{
		$filename=time().'_'.$_FILES['tab7File']['name'];
        move_uploaded_file($_FILES['tab7File']['tmp_name'], 'uploads/documents/' . $filename);
			$dataSheet2 = array(
	    			'opsId'   =>  $opsId,
	    			'leadId'  =>  $_POST['lead'],
	    			'tab'   =>  7,
	    			'file'   =>  $filename
	    			);
			$obj->insert('dm_ops_documents',$dataSheet2);
	}
	if($_FILES['tab8File']['name']!="")
	{
		$filename=time().'_'.$_FILES['tab8File']['name'];
        move_uploaded_file($_FILES['tab8File']['tmp_name'], 'uploads/documents/' . $filename);
			$dataSheet2 = array(
	    			'opsId'   =>  $opsId,
	    			'leadId'  =>  $_POST['lead'],
	    			'tab'   =>  8,
	    			'file'   =>  $filename
	    			);
			$obj->insert('dm_ops_documents',$dataSheet2);
	}
	if($_FILES['tab9File']['name']!="")
	{
		$filename=time().'_'.$_FILES['tab9File']['name'];
        move_uploaded_file($_FILES['tab9File']['tmp_name'], 'uploads/documents/' . $filename);
			$dataSheet2 = array(
	    			'opsId'   =>  $opsId,
	    			'leadId'  =>  $_POST['lead'],
	    			'tab'   =>  9,
	    			'file'   =>  $filename
	    			);
			$obj->insert('dm_ops_documents',$dataSheet2);
	}
	if($_FILES['tab10File']['name']!="")
	{
		$filename=time().'_'.$_FILES['tab10File']['name'];
        move_uploaded_file($_FILES['tab10File']['tmp_name'], 'uploads/documents/' . $filename);
			$dataSheet2 = array(
	    			'opsId'   =>  $opsId,
	    			'leadId'  =>  $_POST['lead'],
	    			'tab'   =>  10,
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
header("location:ops_business_canada.php?lead=".$_POST['lead']);
}


$ops=$obj->display('dm_ops_busines_canada','leadId='.$_GET['lead']);
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
			<h3 class="mb-3">Final Draft for Canada Business</h3> 
				<form action="" method="post" enctype="multipart/form-data" class="opeForm" >
					<input type="hidden" name="lead" value="<?php echo $_GET['lead'];?>" />
					<input type="hidden" name="opsId" value="<?php echo $ops1['id'];?>" />
					
<ul class="nav nav-tabs">
  <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab1"><strong>Personal Details</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab2"><strong>ECA</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab3"><strong>Exploratory Visit</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab4"><strong>Documentation</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab5"><strong>Expression of Interest</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab6"><strong>Visa Processing Fee</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab7"><strong>Third Party Verification</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab8"><strong>Visa Application</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab9"><strong>Interview</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab10"><strong>Performance Agreement</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab11"><strong>Work Permit</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab12"><strong>Remark</strong></a></li>
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
  
	<div class="col-sm-4 form-group"><label>ECA Package received from client</label><input type="text" class="form-control" id="ecaReceDate" name="ecaReceDate" value="<?php echo $ops1['ecaReceDate'];?>" ></div>
	<div class="col-sm-4 form-group"><label>Source</label>
	<select class="form-control" name="ecaPackage">
		<option value="">Select</option>
		<option value="PA" <?php if($ops1['ecaPackage']=="PA") { echo 'selected="selected"';}?>>PA</option>
		<option value="Spouse" <?php if($ops1['ecaPackage']=="Spouse") { echo 'selected="selected"';}?>>Spouse</option>
		</select>
	</div>
	<div class="col-sm-4 form-group"><label>Documents status</label>
		<select class="form-control" name="ecaDocStatus">
		<option value="">Select</option>
		<option value="Complete" <?php if($ops1['ecaDocStatus']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
		<option value="Pending" <?php if($ops1['ecaDocStatus']=="Pending") { echo 'selected="selected"';}?>>Pending</option>
		<option value="Yet not submitted" <?php if($ops1['ecaDocStatus']=="Yet not submitted") { echo 'selected="selected"';}?>>Yet not submitted</option>
		</select>

	</div>
	<div class="col-sm-4 form-group"><label>Assessment Body</label>
	<select class="form-control" name="ecaAssmBody">
		<option value="">Select</option>
		<option value="WES" <?php if($ops1['ecaAssmBody']=="WES") { echo 'selected="selected"';}?>>WES</option>
		<option value="ICAS" <?php if($ops1['ecaAssmBody']=="ICAS") { echo 'selected="selected"';}?>>ICAS</option>
		<option value="IQAS" <?php if($ops1['ecaAssmBody']=="IQAS") { echo 'selected="selected"';}?>>IQAS</option>
		<option value="MCC" <?php if($ops1['ecaAssmBody']=="MCC") { echo 'selected="selected"';}?>>MCC</option>
		<option value="PECB" <?php if($ops1['ecaAssmBody']=="PECB") { echo 'selected="selected"';}?>>PECB</option>
		<option value="ICES" <?php if($ops1['ecaAssmBody']=="ICES") { echo 'selected="selected"';}?>>ICES</option>
		</select>
	</div>
	<div class="col-sm-4 form-group"><label>Date Applied</label><input type="text" class="form-control" id="ecaApplyDate" name="ecaApplyDate" value="<?php echo $ops1['ecaApplyDate'];?>" ></div>
	<div class="col-sm-4 form-group"><label>Payment Mode</label>
	<select class="form-control" name="ecaPayMode">
		<option value="">Select</option>
		<option value="Client Credit Card" <?php if($ops1['ecaPayMode']=="Client Credit Card") { echo 'selected="selected"';}?>>Client Credit Card</option>
		<option value="Company Credit Card" <?php if($ops1['ecaPayMode']=="Company Credit Card") { echo 'selected="selected"';}?>>Company Credit Card</option>
		</select>
	</div>

	<div class="col-sm-3 form-group"><label>Transcript sent</label>
	<select class="form-control" name="ecaTranSent">
		<option value="">Select</option>
		<option value="Client" <?php if($ops1['ecaTranSent']=="Client") { echo 'selected="selected"';}?>>Client</option>
		<option value="Company" <?php if($ops1['ecaTranSent']=="Company") { echo 'selected="selected"';}?>>Company</option>
		</select>
	</div>
	<div class="col-sm-3 form-group"><label>Transcript Status</label>
	<select class="form-control" name="ecaTranStatus">
		<option value="">Select</option>
		<option value="Accepted" <?php if($ops1['ecaTranStatus']=="Accepted") { echo 'selected="selected"';}?>>Accepted</option>
		<option value="Yet not submitted" <?php if($ops1['ecaTranStatus']=="Yet not submitted") { echo 'selected="selected"';}?>>Yet not submitted</option>
		<option value="Rejected" <?php if($ops1['ecaTranStatus']=="Rejected") { echo 'selected="selected"';}?>>Rejected</option>
		</select>
	</div>
  <div class="col-sm-3 form-group"><label >Status</label>
	<select class="form-control" name="ecaStatus">
		<option value="">Select</option>
		<option value="Pending" <?php if($ops1['ecaStatus']=="Pending") { echo 'selected="selected"';}?>>Pending</option>
		<option value="Completed" <?php if($ops1['ecaStatus']=="Completed") { echo 'selected="selected"';}?>>Completed</option>
		<option value="Insufficient" <?php if($ops1['ecaStatus']=="Insufficient") { echo 'selected="selected"';}?>>Insufficient</option>
		<option value="Registered" <?php if($ops1['ecaStatus']=="Registered") { echo 'selected="selected"';}?>>Registered</option>
		</select>
   </div>
  <div class="col-sm-3 form-group"><label >Date of Completion</label>
  <input type="text" class="form-control" id="compDate" name="compDate" value="<?php echo $ops1['compDate'];?>" >
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
	<div class="col-sm-4 form-group"><label >Exploratory Visit</label>
	  <select class="form-control" name="expVisit">
		<option value="">Select</option>
		<option value="Yes" <?php if($ops1['expVisit']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
		<option value="No" <?php if($ops1['expVisit']=="No") { echo 'selected="selected"';}?>>No</option>
		</select>
	
	</div>
	<div class="col-sm-4 form-group"><label>Agent Name</label>
	<input type="text" class="form-control"  name="expAgent" value="<?php echo $ops1['expAgent'];?>" >
	</div>
	<div class="col-sm-4 form-group"><label>Province/County</label>
	<input type="text" class="form-control"  name="expCounty" value="<?php echo $ops1['expCounty'];?>" >
	</div>
	<div class="col-sm-4 form-group"><label>Start Date</label>
	<input type="text" class="form-control" id="expSdate" name="expSdate" value="<?php echo $ops1['expSdate'];?>" >
	</div>
	<div class="col-sm-4 form-group"><label>End Date</label>
	<input type="text" class="form-control" id="expEdate" name="expEdate" value="<?php echo $ops1['expEdate'];?>" >
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
  <div class="col-sm-12">
  <table class="table">
  <tr><th>&nbsp;</th><th style="text-align:center">PA</th><th style="text-align:center">Spouse</th><th style="text-align:center">Dependents</th></tr>
  <tr>
  <td>Narrative Document-PA</td>
  <td>
  <select class="form-control" name="ndPA">
		<option value="">Select</option>
		<option value="Incomplete" <?php if($ops1['ndPA']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
		<option value="Complete" <?php if($ops1['ndPA']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
		<option value="NA" <?php if($ops1['ndPA']=="NA") { echo 'selected="selected"';}?>>NA</option>
		</select>
	</td>
	<td><select class="form-control" name="ndSpouse">
		<option value="">Select</option>
		<option value="Incomplete" <?php if($ops1['ndPA']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
		<option value="Complete" <?php if($ops1['ndPA']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
		<option value="NA" <?php if($ops1['ndPA']=="NA") { echo 'selected="selected"';}?>>NA</option>
		</select>
	</td>
	<td>
	<select class="form-control" name="ndDepend">
		<option value="">Select</option>
		<option value="Incomplete" <?php if($ops1['ndPA']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
		<option value="Complete" <?php if($ops1['ndPA']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
		<option value="NA" <?php if($ops1['ndPA']=="NA") { echo 'selected="selected"';}?>>NA</option>
		</select>
	</td>
	</tr>

<tr>
  <td>Proof of Gift</td>
  <td>
  <select class="form-control" name="pgPA">
		<option value="">Select</option>
		<option value="Incomplete" <?php if($ops1['ndPA']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
		<option value="Complete" <?php if($ops1['ndPA']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
		<option value="NA" <?php if($ops1['ndPA']=="NA") { echo 'selected="selected"';}?>>NA</option>
		</select>
	</td>
	<td><select class="form-control" name="pgSpouse">
		<option value="">Select</option>
		<option value="Incomplete" <?php if($ops1['ndPA']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
		<option value="Complete" <?php if($ops1['ndPA']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
		<option value="NA" <?php if($ops1['ndPA']=="NA") { echo 'selected="selected"';}?>>NA</option>
		</select>
	</td>
	<td>
	<select class="form-control" name="pgDepend">
		<option value="">Select</option>
		<option value="Incomplete" <?php if($ops1['ndPA']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
		<option value="Complete" <?php if($ops1['ndPA']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
		<option value="NA" <?php if($ops1['ndPA']=="NA") { echo 'selected="selected"';}?>>NA</option>
		</select>
	</td>
	</tr>
	
<tr>
  <td>Proof of Inheritance</td>
  <td>
  <select class="form-control" name="piPA">
		<option value="">Select</option>
		<option value="Incomplete" <?php if($ops1['ndPA']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
		<option value="Complete" <?php if($ops1['ndPA']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
		<option value="NA" <?php if($ops1['ndPA']=="NA") { echo 'selected="selected"';}?>>NA</option>
		</select>
	</td>
	<td><select class="form-control" name="piSpouse">
		<option value="">Select</option>
		<option value="Incomplete" <?php if($ops1['ndPA']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
		<option value="Complete" <?php if($ops1['ndPA']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
		<option value="NA" <?php if($ops1['ndPA']=="NA") { echo 'selected="selected"';}?>>NA</option>
		</select>
	</td>
	<td><select class="form-control" name="piDepend">
		<option value="">Select</option>
		<option value="Incomplete" <?php if($ops1['ndPA']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
		<option value="Complete" <?php if($ops1['ndPA']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
		<option value="NA" <?php if($ops1['ndPA']=="NA") { echo 'selected="selected"';}?>>NA</option>
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
  <?php }} ?>  
    
  </div>
  
  


  <div class="tab-pane container" id="tab5">
  
  <div class="row" style="overflow:hidden">
	  <div class="col-sm-3 form-group"><label>Documents Received On</label>
		  <input type="text" class="form-control" id="eiReceDate" name="eiReceDate" value="<?php echo $ops1['eiReceDate'];?>"  >
	   </div>
	  <div class="col-sm-3 form-group"><label>Documents Reviewed On</label>
	  	<input type="text" class="form-control" id="eiRewDate" name="eiRewDate" value="<?php echo $ops1['eiRewDate'];?>"  >
	  </div>
	  <div class="col-sm-3 form-group"><label>EOI Finalized On</label>
	 	 <input type="text" class="form-control" id="eiFinDate" name="eiFinDate" value="<?php echo $ops1['eiFinDate'];?>"  >
	  </div>
	  <div class="col-sm-3 form-group"><label>EOI sent to Client On </label>
	  	<input type="text" class="form-control" id="eiSentDate" name="eiSentDate" value="<?php echo $ops1['eiSentDate'];?>"  >
	  </div>
  </div>
  
 <div class="row" style="overflow:hidden">
 <div class="col-sm-3 form-group"><label>EOI Confirmation Received from the Client on</label>
  <input type="text" class="form-control" id="eiConfDate" name="eiConfDate" value="<?php echo $ops1['eiConfDate'];?>"  >
 </div>
 <div class="col-sm-3 form-group"><label>EOI Submitted On</label>
  <input type="text" class="form-control" id="eiSubDate" name="eiSubDate" value="<?php echo $ops1['eiSubDate'];?>"  >
  </div>
 <div class="col-sm-3 form-group"><label>Invitation Received on</label>
  <input type="text" class="form-control" id="eiInvtDate" name="eiInvtDate" value="<?php echo $ops1['eiInvtDate'];?>"  >
  </div>
 <div class="col-sm-3 form-group"><label>Invitation Validity</label>
  <input type="text" class="form-control" id="eiValdDate" name="eiValdDate" value="<?php echo $ops1['eiValdDate'];?>"  >
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
  <div class="col-sm-6 form-group"><label >Visa Processing Fee</label>
	  <select class="form-control" name="visaPaySts">
		<option value="">Select</option>
		<option value="Paid" <?php if($ops1['visaPaySts']=="Paid") { echo 'selected="selected"';}?>>Paid</option>
		<option value="Not Paid" <?php if($ops1['visaPaySts']=="Not Paid") { echo 'selected="selected"';}?>>Not Paid</option>
	</select>

   </div>
  <div class="col-sm-6 form-group"><label >Paid Date</label>
  <input type="text" class="form-control" id="visaPayDate" name="visaPayDate" value="<?php echo $ops1['visaPayDate'];?>" >
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
  <?php }} ?> 
  </div>
  
  
<div class="tab-pane container" id="tab7">
	<div class="row" style="overflow:hidden">
	<div class="col-sm-3 form-group"><label>Checklist Given On</label>
	  <input type="text" class="form-control" id="docGivDate" name="docGivDate" value="<?php echo $ops1['docGivDate'];?>" >
	</div>
	<div class="col-sm-3 form-group"><label>Documents Received On</label>
	<input type="text" class="form-control" id="docRecDate" name="docRecDate" value="<?php echo $ops1['docRecDate'];?>" >
	</div>
	<div class="col-sm-3 form-group"><label>Documents Status</label>
	<select class="form-control" name="docStatus">
		<option value="">Select</option>
		<option value="Complete" <?php if($ops1['docStatus']=="Complete") { echo 'selected="selected"';}?> >Complete </option>
		<option value="Incomplete" <?php if($ops1['docStatus']=="Incomplete") { echo 'selected="selected"';}?> >Incomplete</option>
	</select>
	</div>
	<div class="col-sm-3 form-group"><label>Documents Reviewed On </label>
	<input type="text" class="form-control" id="docRewDate" name="docRewDate" value="<?php echo $ops1['docRewDate'];?>" >
	</div>
	</div>

<div class="row" style="overflow:hidden">
<div class="col-sm-3 form-group"><label>Documents Forwarded On</label>
  <input type="text" class="form-control" id="docFowDate" name="docFowDate" value="<?php echo $ops1['docFowDate'];?>" >
</div>
<div class="col-sm-3 form-group"><label>Fee Paid On</label>
<input type="text" class="form-control" id="docFeeDate" name="docFeeDate" value="<?php echo $ops1['docFeeDate'];?>" >
</div>
<div class="col-sm-3 form-group"><label>Report Received on</label>
<input type="text" class="form-control" id="docRepDate" name="docRepDate" value="<?php echo $ops1['docRepDate'];?>" >
</div>
 <div class="col-sm-4 form-group"><label>Document File <?php if($ops1['tab6File']!="") { echo '<a href="uploads/documents/'.$ops1['tab6File'].'" target="_blank" style="float:right">View</a>'; }?></label>
 		 <input type="file" class="form-control" id="tab6File" name="tab6File" >
  	</div>
</div>

 <?php 
  if($ops->num_rows > 0)
   {
   $doc=$obj->display('dm_ops_documents','tab=6 and leadId='.$_GET['lead'].' and opsId='.$ops1['id']);
   while($doc1=$doc->fetch_array())
   {
   ?>
  <div class="row" style="overflow:hidden">
 	<div class="col-sm-6"><a href="uploads/documents/<?=$doc1['file'];?>" target="_blank"><?php echo $doc1['file'];?></a></div><div class="col-sm-3"><a href="ops_skill_canada.php?docId=<?php echo $doc1['id'];?>&lead=<?php echo $_GET['lead'];?>">Delete</a></div>
  </div>
  <?php }} ?>

</div>
  
  
  <div class="tab-pane container" id="tab8">
  
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
   <div class="col-sm-4 form-group"><label>Document File <?php if($ops1['tab7File']!="") { echo '<a href="uploads/documents/'.$ops1['tab7File'].'" target="_blank" style="float:right">View</a>'; }?></label>
 		 <input type="file" class="form-control" id="tab7File" name="tab7File" >
  	</div>
  </div> 
 
  <?php 
   if($ops->num_rows > 0)
   {
   $doc=$obj->display('dm_ops_documents','tab=7 and leadId='.$_GET['lead'].' and opsId='.$ops1['id']);
   while($doc1=$doc->fetch_array())
   {
   ?>
  <div class="row" style="overflow:hidden">
 	<div class="col-sm-6"><a href="uploads/documents/<?=$doc1['file'];?>" target="_blank"><?php echo $doc1['file'];?></a></div><div class="col-sm-3"><a href="ops_skill_canada.php?docId=<?php echo $doc1['id'];?>&lead=<?php echo $_GET['lead'];?>">Delete</a></div>
  </div>
  <?php }} ?>
 
  </div>
  
  
  <div class="tab-pane container" id="tab9">
 <div class="row" style="overflow:hidden">
  <div class="col-sm-4 form-group"><label>Interview Received On</label>
	  <input type="text" class="form-control" id="intRecDate" name="intwRecDate" value="<?php echo $ops1['intwRecDate'];?>" >
   </div>
  <div class="col-sm-4 form-group"><label>Interview Scheduled On</label>
  <input type="text" class="form-control" id="intSchDate" name="intSchDate" value="<?php echo $ops1['intSchDate'];?>" >
  </div>
  <div class="col-sm-4 form-group"><label>Client Informed On</label>
  <input type="text" class="form-control" id="intInfmDate" name="intInfmDate" value="<?php echo $ops1['intInfmDate'];?>" >
  </div>
  </div>
  
   <div class="row" style="overflow:hidden">
  <div class="col-sm-4 form-group"><label>Appointment Fixed On</label>
  <input type="text" class="form-control" id="intFixdDate" name="intFixdDate" value="<?php echo $ops1['intFixdDate'];?>" >
  </div>
  
 <div class="col-sm-4 form-group"><label>Interview Briefing Done On</label>
  <input type="text" class="form-control" id="intBrfDate" name="intBrfDate" value="<?php echo $ops1['intBrfDate'];?>" >
  </div>
 <div class="col-sm-4 form-group"><label>Interview Documents Checklist </label>
  <input type="text" class="form-control" id="intDocDate" name="intDocDate" value="<?php echo $ops1['intDocDate'];?>" >
  </div>
  </div>

   <div class="row" style="overflow:hidden">
  
 <div class="col-sm-4 form-group"><label>Interview Documents Received On</label>
  <input type="text" class="form-control" id="intDocRecDate" name="intDocRecDate" value="<?php echo $ops1['intDocRecDate'];?>" >
  </div>
 <div class="col-sm-4 form-group"><label>Interview Preparation</label>
    <select class="form-control" name="intPrep">
		<option value="">Select</option>
		<option value="Yes" <?php if($ops1['intPrep']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
		<option value="No" <?php if($ops1['intPrep']=="No") { echo 'selected="selected"';}?>>No</option>
		</select>
  </div>
 <div class="col-sm-4 form-group"><label>Interview Result</label>
    <select class="form-control" name="intResult">
		<option value="">Select</option>
		<option value="Approved" <?php if($ops1['intPrep']=="Approved") { echo 'selected="selected"';}?>>Approved</option>
		<option value="Rejected" <?php if($ops1['intPrep']=="Rejected") { echo 'selected="selected"';}?>>Rejected</option>
		</select>
  </div>
  
   <div class="col-sm-4 form-group"><label>Document File <?php if($ops1['tab8File']!="") { echo '<a href="uploads/documents/'.$ops1['tab8File'].'" target="_blank" style="float:right">View</a>'; }?></label>
 		 <input type="file" class="form-control" id="tab8File" name="tab8File" >
  	</div>
  </div>        

 <?php 
  if($ops->num_rows > 0)
   {
   $doc=$obj->display('dm_ops_documents','tab=8 and leadId='.$_GET['lead'].' and opsId='.$ops1['id']);
   while($doc1=$doc->fetch_array())
   {
   ?>
  <div class="row" style="overflow:hidden">
 	<div class="col-sm-6"><a href="uploads/documents/<?=$doc1['file'];?>" target="_blank"><?php echo $doc1['file'];?></a></div><div class="col-sm-3"><a href="ops_skill_canada.php?docId=<?php echo $doc1['id'];?>&lead=<?php echo $_GET['lead'];?>">Delete</a></div>
  </div>
  <?php }} ?>
  
  </div>


<div class="tab-pane container" id="tab10">

 <div class="row" style="overflow:hidden">
  <div class="col-sm-4 form-group"><label>Performane Agreement Received On</label>
	  <input type="text" class="form-control" id="paReceDate" name="paReceDate" value="<?php echo $ops1['paReceDate'];?>"  >
   </div>
  <div class="col-sm-4 form-group"><label>Performance Agreement Signed On</label>
  <input type="text" class="form-control" id="paSignDate" name="paAgreDate" value="<?php echo $ops1['paAgreDate'];?>"  >
  </div>
  <div class="col-sm-4 form-group"><label>Performane Agreement Sent on</label>
  <input type="text" class="form-control" id="paSentDate" name="paSentDate" value="<?php echo $ops1['paSentDate'];?>"  >
  </div>
  </div>
  
   <div class="row" style="overflow:hidden">
  <div class="col-sm-4 form-group"><label>Confirmation Sent to the client On</label>
  <input type="text" class="form-control" id="paConfDate" name="paConfDate" value="<?php echo $ops1['paConfDate'];?>"  >
  </div>
   <div class="col-sm-4 form-group"><label>Document File <?php if($ops1['tab9File']!="") { echo '<a href="uploads/documents/'.$ops1['tab9File'].'" target="_blank" style="float:right">View</a>'; }?></label>
 		 <input type="file" class="form-control" id="tab9File" name="tab9File" >
  	</div>
  </div>

 <?php 
  if($ops->num_rows > 0)
   {
   $doc=$obj->display('dm_ops_documents','tab=9 and leadId='.$_GET['lead'].' and opsId='.$ops1['id']);
   while($doc1=$doc->fetch_array())
   {
   ?>
  <div class="row" style="overflow:hidden">
 	<div class="col-sm-6"><a href="uploads/documents/<?=$doc1['file'];?>" target="_blank"><?php echo $doc1['file'];?></a></div><div class="col-sm-3"><a href="ops_skill_canada.php?docId=<?php echo $doc1['id'];?>&lead=<?php echo $_GET['lead'];?>">Delete</a></div>
  </div>
  <?php } }?>        
  </div>

<div class="tab-pane container" id="tab11">
	<div class="row" style="overflow:hidden">
		<div class="col-sm-3 form-group"><label>Letter of Support Received on</label>
		<input type="text" class="form-control" id="waRecDate" name="waRecDate" value="<?php echo $ops1['waRecDate'];?>" >
		</div>
		<div class="col-sm-3 form-group"><label>Client Informed On</label>
		<input type="text" class="form-control" id="waInfDate" name="waInfDate" value="<?php echo $ops1['waInfDate'];?>" >
		</div>
		<div class="col-sm-3 form-group"><label>Appointment Fixed On</label>
		<input type="text" class="form-control" id="waFixDate" name="waFixDate" value="<?php echo $ops1['waFixDate'];?>" >
		</div>
		<div class="col-sm-3 form-group"><label>Checklist Handed On</label>
		<input type="text" class="form-control" id="waHandDate" name="waHandDate" value="<?php echo $ops1['waHandDate'];?>" >
		</div>
	</div>
	<div class="row" style="overflow:hidden">
		<div class="col-sm-3 form-group"><label>Documents Received On</label>
		<input type="text" class="form-control" id="waDocRecDate" name="waDocRecDate" value="<?php echo $ops1['waDocRecDate'];?>" >
		</div>
		<div class="col-sm-3 form-group"><label>Documents Reviewed On</label>
		<input type="text" class="form-control" id="waDocRewDate" name="waDocRewDate" value="<?php echo $ops1['waDocRewDate'];?>" >
		</div>
		<div class="col-sm-3 form-group"><label>Forms Signed On</label>
		<input type="text" class="form-control" id="waDocSignDate" name="waDocSignDate" value="<?php echo $ops1['waDocSignDate'];?>" >
		</div>
		<div class="col-sm-3 form-group"><label>Application Finalized On</label>
		<input type="text" class="form-control" id="waAppFinDate" name="waAppFinDate" value="<?php echo $ops1['waAppFinDate'];?>" >
		</div>
	</div>
	<div class="row" style="overflow:hidden">
		<div class="col-sm-3 form-group"><label>Application Submitted On</label>
		<input type="text" class="form-control" id="waAppSubDate" name="waAppSubDate" value="<?php echo $ops1['waAppSubDate'];?>" >
		</div>
		<div class="col-sm-3 form-group"><label>Confirmation Sent On</label>
		<input type="text" class="form-control" id="waAppSentDate" name="waAppSentDate" value="<?php echo $ops1['waAppSentDate'];?>" >
		</div>
		<div class="col-sm-3 form-group"><label>File No. Received On</label>
		<input type="text" class="form-control" id="waFileRecDate" name="waFileRecDate" value="<?php echo $ops1['waFileRecDate'];?>" >
		</div>
		<div class="col-sm-3 form-group"><label>Requirement Received On</label>
		<input type="text" class="form-control" id="waReqRecDate" name="waReqRecDate" value="<?php echo $ops1['waReqRecDate'];?>" >
		</div>
	</div>
	<div class="row" style="overflow:hidden">
		<div class="col-sm-3 form-group"><label>Medicals Received On</label>
		<input type="text" class="form-control" id="waMedRecDate" name="waMedRecDate" value="<?php echo $ops1['waMedRecDate'];?>" >
		</div>
		<div class="col-sm-3 form-group"><label>Medicals Submitted On</label>
		<input type="text" class="form-control" id="waMedSubDate" name="waMedSubDate" value="<?php echo $ops1['waMedSubDate'];?>" >
		</div>
		<div class="col-sm-3 form-group"><label>Landing Papers Received On</label>
		<input type="text" class="form-control" id="waPapRecDate" name="waPapRecDate" value="<?php echo $ops1['waPapRecDate'];?>" >
		</div>
		
		 <div class="col-sm-4 form-group"><label>Document File <?php if($ops1['tab10File']!="") { echo '<a href="uploads/documents/'.$ops1['tab10File'].'" target="_blank" style="float:right">View</a>'; }?></label>
 		 <input type="file" class="form-control" id="tab10File" name="tab10File" >
  	</div>
	</div>
 <?php 
  if($ops->num_rows > 0)
   {
   $doc=$obj->display('dm_ops_documents','tab=10 and leadId='.$_GET['lead'].' and opsId='.$ops1['id']);
   while($doc1=$doc->fetch_array())
   {
   ?>
  <div class="row" style="overflow:hidden">
 	<div class="col-sm-6"><a href="uploads/documents/<?=$doc1['file'];?>" target="_blank"><?php echo $doc1['file'];?></a></div><div class="col-sm-3"><a href="ops_skill_canada.php?docId=<?php echo $doc1['id'];?>&lead=<?php echo $_GET['lead'];?>">Delete</a></div>
  </div>
  <?php }} ?>
</div>
<div class="tab-pane container" id="tab12">
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
		$('#ecaApplyDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#compDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#ecaReceDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#expSdate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#expEdate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#eiReceDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#eiRewDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#eiFinDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#eiSentDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#eiConfDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#eiSubDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#eiInvtDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#eiValdDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#visaPayDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#docGivDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#docRecDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#docRewDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#docFowDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#docFeeDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#docRepDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#visaReqRecDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#visaValdDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#visaInfDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#visaApptDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#visaDocRecDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#visaDocRewDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#visaDocSubDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#visaConSentDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#intRecDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#intSchDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#intInfmDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#intFixdDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#intBrfDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#intDocDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#intDocRecDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#paReceDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#paSignDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#paSentDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#paConfDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 

		$('#waRecDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#waInfDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#waFixDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#waHandDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#waDocRecDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#waDocRewDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#waDocSignDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#waAppFinDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#waAppSubDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#waAppSentDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#waFileRecDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#waReqRecDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#waMedRecDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#waMedSubDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#waPapRecDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 

		}); 
	</script>

<!-- <script type="text/javascript" src="js/table-drop-down.js"></script> -->