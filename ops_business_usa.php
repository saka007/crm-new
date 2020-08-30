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
				'leadId'  =>  $_POST['lead'], 'escAgre'  =>  $_POST['escAgre'], 'escAgreDate'  =>  $_POST['escAgreDate'], 'passCopy'  =>  $_POST['passCopy'], 'passCopyDate'  =>  $_POST['passCopyDate'], 'escAgreCopy'  =>  $_POST['escAgreCopy'], 'escAgreCopyDate'  =>  $_POST['escAgreCopyDate'], 'acouDets'  =>  $_POST['acouDets'], 'acouDetsDate'  =>  $_POST['acouDetsDate'], 'wireTrans'  =>  $_POST['wireTrans'], 'wireTransDate'  =>  $_POST['wireTransDate'], 'profFund'  =>  $_POST['profFund'], 'profFundDate'  =>  $_POST['profFundDate'], 'subAgre'  =>  $_POST['subAgre'], 'subAgreDate'  =>  $_POST['subAgreDate'], 'g28'  =>  $_POST['g28'], 'g28Date'  =>  $_POST['g28Date'], 'i526'  =>  $_POST['i526'], 'i526Date'  =>  $_POST['i526Date'], 'w8Ben'  =>  $_POST['w8Ben'], 'w8BenDate'  =>  $_POST['w8BenDate'], 'passPA'  =>  $_POST['passPA'], 'passSpouse'  =>  $_POST['passSpouse'], 'passDepnd'  =>  $_POST['passDepnd'], 'idPA'  =>  $_POST['idPA'], 'idSpouse'  =>  $_POST['idSpouse'], 'idDepnd'  =>  $_POST['idDepnd'], 'birthPA'  =>  $_POST['birthPA'], 'birthSpouse'  =>  $_POST['birthSpouse'], 'birthDepnd'  =>  $_POST['birthDepnd'], 'eduPA'  =>  $_POST['eduPA'], 'eduSpouse'  =>  $_POST['eduSpouse'], 'eduDepnd'  =>  $_POST['eduDepnd'], 'pbsPA'  =>  $_POST['pbsPA'], 'resmPA'  =>  $_POST['resmPA'], 'nDocPA'  =>  $_POST['nDocPA'], 'nDocSpouse'  =>  $_POST['nDocSpouse'], 'nDocDepnd'  =>  $_POST['nDocDepnd'], 'nwrPA'  =>  $_POST['nwrPA'], 'nwrSpouse'  =>  $_POST['nwrSpouse'], 'nwrDepnd'  =>  $_POST['nwrDepnd'], 'pifPA'  =>  $_POST['pifPA'], 'pifSpouse'  =>  $_POST['pifSpouse'], 'pifDepnd'  =>  $_POST['pifDepnd'], 'i526FeePA'  =>  $_POST['i526FeePA'], 'nvcFeePA'  =>  $_POST['nvcFeePA'], 'nvcFeeSpouse'  =>  $_POST['nvcFeeSpouse'], 'nvcFeeDepent'  =>  $_POST['nvcFeeDepent'], 'ds260PA'  =>  $_POST['lead'], 'ds260Spouse'  =>  $_POST['lead'], 'ds260Depent'  =>  $_POST['lead'], 'ds260Sts'  =>  $_POST['lead'], 'passCopyPA'  =>  $_POST['lead'], 'passCopySpouse'  =>  $_POST['passCopySpouse'], 'passCopyDepent'  =>  $_POST['passCopyDepent'], 'passCopySts'  =>  $_POST['passCopySts'], 'birthCertPA'  =>  $_POST['birthCertPA'], 'birthCertSpouse'  =>  $_POST['birthCertSpouse'], 'birthCertDepent'  =>  $_POST['birthCertDepent'], 'birthCertSts'  =>  $_POST['birthCertSts'], 'marCertPA'  =>  $_POST['marCertPA'], 'marCertSpouse'  =>  $_POST['marCertSpouse'], 'marCertDepent'  =>  $_POST['marCertDepent'], 'marCertSts'  =>  $_POST['marCertSts'], 'natIdPA'  =>  $_POST['natIdPA'], 'natIdSpouse'  =>  $_POST['natIdSpouse'], 'natIdDepent'  =>  $_POST['natIdDepent'], 'natIdSts'  =>  $_POST['natIdSts'], 'resProfPA'  =>  $_POST['resProfPA'], 'resProfSpouse'  =>  $_POST['resProfSpouse'], 'resProfDepent'  =>  $_POST['resProfDepent'], 'resProfSts'  =>  $_POST['resProfSts'], 'pasPhotoPA'  =>  $_POST['pasPhotoPA'], 'pasPhotoSpouse'  =>  $_POST['pasPhotoSpouse'], 'pasPhotoDepent'  =>  $_POST['pasPhotoDepent'], 'pasPhotoSts'  =>  $_POST['pasPhotoSts'], 'polCertPA'  =>  $_POST['polCertPA'], 'polCertSpouse'  =>  $_POST['polCertSpouse'], 'polCertDepent'  =>  $_POST['polCertDepent'], 'polCertSts'  =>  $_POST['polCertSts'], 'visaReqRecDate'  =>  $_POST['visaReqRecDate'], 'visaValdDate'  =>  $_POST['visaValdDate'], 'visaInfDate'  =>  $_POST['visaInfDate'], 'visaApptDate'  =>  $_POST['visaApptDate'], 'visaDocRecDate'  =>  $_POST['visaDocRecDate'], 'visaDocRewDate'  =>  $_POST['visaDocRewDate'], 'visaDocSubDate'  =>  $_POST['visaDocSubDate'], 'visaConSentDate'  =>  $_POST['visaConSentDate'], 'waHandDate'  =>  $_POST['waHandDate'], 'waDocRecDate'  =>  $_POST['waDocRecDate'], 'waDocRewDate'  =>  $_POST['waDocRewDate'], 'waDocSignDate'  =>  $_POST['waDocSignDate'], 'waAppFinDate'  =>  $_POST['waAppFinDate'], 'waAppSubDate'  =>  $_POST['waAppSubDate'], 'waFormRecDate'  =>  $_POST['waFormRecDate'], 'passPA'  =>  $_POST['passPA'], 'waDocSignDate'  =>  $_POST['waDocSignDate'], 'intwRecDate'  =>  $_POST['intwRecDate'], 'intSchDate'  =>  $_POST['intSchDate'], 'intInfmDate'  =>  $_POST['intInfmDate'], 'intFixdDate'  =>  $_POST['intFixdDate'], 'intBrfDate'  =>  $_POST['intBrfDate'], 'intDocDate'  =>  $_POST['intDocDate'], 'intDocRecDate'  =>  $_POST['intDocRecDate'], 'intPrep'  =>  $_POST['intPrep'], 'intResult'  =>  $_POST['intResult']
				);
			$opsId=$obj->insert('dm_ops_busines_usa',$data);
	}	
	else
	{
	$opsId=$_POST['opsId'];
			$data = array(
				'escAgre'  =>  $_POST['escAgre'], 'escAgreDate'  =>  $_POST['escAgreDate'], 'passCopy'  =>  $_POST['passCopy'], 'passCopyDate'  =>  $_POST['passCopyDate'], 'escAgreCopy'  =>  $_POST['escAgreCopy'], 'escAgreCopyDate'  =>  $_POST['escAgreCopyDate'], 'acouDets'  =>  $_POST['acouDets'], 'acouDetsDate'  =>  $_POST['acouDetsDate'], 'wireTrans'  =>  $_POST['wireTrans'], 'wireTransDate'  =>  $_POST['wireTransDate'], 'profFund'  =>  $_POST['profFund'], 'profFundDate'  =>  $_POST['profFundDate'], 'subAgre'  =>  $_POST['subAgre'], 'subAgreDate'  =>  $_POST['subAgreDate'], 'g28'  =>  $_POST['g28'], 'g28Date'  =>  $_POST['g28Date'], 'i526'  =>  $_POST['i526'], 'i526Date'  =>  $_POST['i526Date'], 'w8Ben'  =>  $_POST['w8Ben'], 'w8BenDate'  =>  $_POST['w8BenDate'], 'passPA'  =>  $_POST['passPA'], 'passSpouse'  =>  $_POST['passSpouse'], 'passDepnd'  =>  $_POST['passDepnd'], 'idPA'  =>  $_POST['idPA'], 'idSpouse'  =>  $_POST['idSpouse'], 'idDepnd'  =>  $_POST['idDepnd'], 'birthPA'  =>  $_POST['birthPA'], 'birthSpouse'  =>  $_POST['birthSpouse'], 'birthDepnd'  =>  $_POST['birthDepnd'], 'eduPA'  =>  $_POST['eduPA'], 'eduSpouse'  =>  $_POST['eduSpouse'], 'eduDepnd'  =>  $_POST['eduDepnd'], 'pbsPA'  =>  $_POST['pbsPA'], 'resmPA'  =>  $_POST['resmPA'], 'nDocPA'  =>  $_POST['nDocPA'], 'nDocSpouse'  =>  $_POST['nDocSpouse'], 'nDocDepnd'  =>  $_POST['nDocDepnd'], 'nwrPA'  =>  $_POST['nwrPA'], 'nwrSpouse'  =>  $_POST['nwrSpouse'], 'nwrDepnd'  =>  $_POST['nwrDepnd'], 'pifPA'  =>  $_POST['pifPA'], 'pifSpouse'  =>  $_POST['pifSpouse'], 'pifDepnd'  =>  $_POST['pifDepnd'], 'i526FeePA'  =>  $_POST['i526FeePA'], 'nvcFeePA'  =>  $_POST['nvcFeePA'], 'nvcFeeSpouse'  =>  $_POST['nvcFeeSpouse'], 'nvcFeeDepent'  =>  $_POST['nvcFeeDepent'], 'ds260PA'  =>  $_POST['lead'], 'ds260Spouse'  =>  $_POST['lead'], 'ds260Depent'  =>  $_POST['lead'], 'ds260Sts'  =>  $_POST['lead'], 'passCopyPA'  =>  $_POST['lead'], 'passCopySpouse'  =>  $_POST['passCopySpouse'], 'passCopyDepent'  =>  $_POST['passCopyDepent'], 'passCopySts'  =>  $_POST['passCopySts'], 'birthCertPA'  =>  $_POST['birthCertPA'], 'birthCertSpouse'  =>  $_POST['birthCertSpouse'], 'birthCertDepent'  =>  $_POST['birthCertDepent'], 'birthCertSts'  =>  $_POST['birthCertSts'], 'marCertPA'  =>  $_POST['marCertPA'], 'marCertSpouse'  =>  $_POST['marCertSpouse'], 'marCertDepent'  =>  $_POST['marCertDepent'], 'marCertSts'  =>  $_POST['marCertSts'], 'natIdPA'  =>  $_POST['natIdPA'], 'natIdSpouse'  =>  $_POST['natIdSpouse'], 'natIdDepent'  =>  $_POST['natIdDepent'], 'natIdSts'  =>  $_POST['natIdSts'], 'resProfPA'  =>  $_POST['resProfPA'], 'resProfSpouse'  =>  $_POST['resProfSpouse'], 'resProfDepent'  =>  $_POST['resProfDepent'], 'resProfSts'  =>  $_POST['resProfSts'], 'pasPhotoPA'  =>  $_POST['pasPhotoPA'], 'pasPhotoSpouse'  =>  $_POST['pasPhotoSpouse'], 'pasPhotoDepent'  =>  $_POST['pasPhotoDepent'], 'pasPhotoSts'  =>  $_POST['pasPhotoSts'], 'polCertPA'  =>  $_POST['polCertPA'], 'polCertSpouse'  =>  $_POST['polCertSpouse'], 'polCertDepent'  =>  $_POST['polCertDepent'], 'polCertSts'  =>  $_POST['polCertSts'], 'visaReqRecDate'  =>  $_POST['visaReqRecDate'], 'visaValdDate'  =>  $_POST['visaValdDate'], 'visaInfDate'  =>  $_POST['visaInfDate'], 'visaApptDate'  =>  $_POST['visaApptDate'], 'visaDocRecDate'  =>  $_POST['visaDocRecDate'], 'visaDocRewDate'  =>  $_POST['visaDocRewDate'], 'visaDocSubDate'  =>  $_POST['visaDocSubDate'], 'visaConSentDate'  =>  $_POST['visaConSentDate'], 'waHandDate'  =>  $_POST['waHandDate'], 'waDocRecDate'  =>  $_POST['waDocRecDate'], 'waDocRewDate'  =>  $_POST['waDocRewDate'], 'waDocSignDate'  =>  $_POST['waDocSignDate'], 'waAppFinDate'  =>  $_POST['waAppFinDate'], 'waAppSubDate'  =>  $_POST['waAppSubDate'], 'waFormRecDate'  =>  $_POST['waFormRecDate'], 'passPA'  =>  $_POST['passPA'], 'waDocSignDate'  =>  $_POST['waDocSignDate'], 'intwRecDate'  =>  $_POST['intwRecDate'], 'intSchDate'  =>  $_POST['intSchDate'], 'intInfmDate'  =>  $_POST['intInfmDate'], 'intFixdDate'  =>  $_POST['intFixdDate'], 'intBrfDate'  =>  $_POST['intBrfDate'], 'intDocDate'  =>  $_POST['intDocDate'], 'intDocRecDate'  =>  $_POST['intDocRecDate'], 'intPrep'  =>  $_POST['intPrep'], 'intResult'  =>  $_POST['intResult']
				);
			$obj->update('dm_ops_busines_usa',$data,'id='.$_POST['opsId']);
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
	
if($_POST['remark']!="")
{
	$data4 = array(
    			'lead'  =>  $_POST['lead'],
    			'date'  =>  date('Y-m-d'),
    			'remark'  =>  $_POST['remark']
				);
			$obj->insert('dm_lead_remark',$data4);
}
	header("location:ops_business_usa.php?lead=".$_POST['lead']);

}	
$ops=$obj->display('dm_ops_busines_usa','leadId='.$_GET['lead']);
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
			<h3 class="mb-3">Final Draft for USA Business</h3> 
				<form action="" method="post" enctype="multipart/form-data" class="opeForm" >
					<input type="hidden" name="lead" value="<?php echo $_GET['lead'];?>" />
					<input type="hidden" name="opsId" value="<?php echo $ops1['id'];?>" />
					
<ul class="nav nav-tabs">
  <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab1"><strong>Personal Details</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab2"><strong>I-526-Documentation</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab3"><strong>Application Processing Fee</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab4"><strong>NVC- Documentation</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab5"><strong>Visa Application</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab6"><strong>Requirements</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab7"><strong>Interview</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab8"><strong>Remark</strong></a></li>
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
  <div class="col-sm-12 form-group text-center"><h6>Account Opening</h6></div>
  <div class="col-sm-12 form-group">
  <table class="table">
	  <tr>
	  <th>Escrow Agreement from Client</th>
	  <td>
	  <select class="form-control" name="escAgre">
		<option value="">Select</option>
		<option value="Yes" <?php if($ops1['escAgre']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
		<option value="No" <?php if($ops1['escAgre']=="No") { echo 'selected="selected"';}?>>No</option>
	  </select>
	 </td>
	  <th>Received On</th>
	  <td><input type="text" class="form-control" id="escAgreDate" name="escAgreDate"  value="<?php echo $ops1['escAgreDate'];?>"></td>
	  </tr>
	  <tr>
	  <th>Passport Copy</th>
	  <td>
	  <select class="form-control" name="passCopy">
		<option value="">Select</option>
		<option value="Yes" <?php if($ops1['passCopy']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
		<option value="No" <?php if($ops1['passCopy']=="No") { echo 'selected="selected"';}?>>No</option>
	  </select>
	 </td>
	  <th>Received On</th>
	  <td><input type="text" class="form-control" id="passCopyDate" name="passCopyDate"  value="<?php echo $ops1['passCopyDate'];?>"></td>
	  </tr>
	  <tr>
	  <th>Escrow Agreement Countersigned Copy</th>
	  <td>
	  <select class="form-control" name="escAgreCopy">
		<option value="">Select</option>
		<option value="Yes" <?php if($ops1['escAgreCopy']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
		<option value="No" <?php if($ops1['escAgreCopy']=="No") { echo 'selected="selected"';}?>>No</option>
	  </select>
	 </td>
	  <th>Received On</th>
	  <td><input type="text" class="form-control" id="escAgreCopyDate" name="escAgreCopyDate"  value="<?php echo $ops1['escAgreCopyDate'];?>"></td>
	  </tr>
	  <tr>
	  <th>Account Details</th>
	  	  <td><input type="text" class="form-control" id="acouDets" name="acouDets"  value="<?php echo $ops1['acouDets'];?>"></td>

	  <th>Received On</th>
	  <td><input type="text" class="form-control" id="acouDetsDate" name="acouDetsDate"  value="<?php echo $ops1['acouDetsDate'];?>"></td>
	  </tr>
	  <tr>
	  <th>Wire Transfer Details</th>
	 <td>
	  <select class="form-control" name="wireTrans">
		<option value="">Select</option>
		<option value="Yes" <?php if($ops1['wireTrans']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
		<option value="No" <?php if($ops1['wireTrans']=="No") { echo 'selected="selected"';}?>>No</option>
	  </select>
	 </td>
	  <th>Received On</th>
	  <td><input type="text" class="form-control" id="wireTransDate" name="wireTransDate"  value="<?php echo $ops1['wireTransDate'];?>"></td>
	  </tr>
	  <tr>
	  <th>Proof of Funds Transfer</th>
	  <td>
	  <select class="form-control" name="profFund">
		<option value="">Select</option>
		<option value="Yes" <?php if($ops1['profFund']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
		<option value="No" <?php if($ops1['profFund']=="No") { echo 'selected="selected"';}?>>No</option>
	  </select>
	 </td>
	  <th>Received On</th>
	  <td><input type="text" class="form-control" id="profFundDate" name="profFundDate"  value="<?php echo $ops1['profFundDate'];?>"></td>
	  </tr>
	  <tr>
	  <th>Subscription Agreement</th>
	  <td>
	  <select class="form-control" name="subAgre">
		<option value="">Select</option>
		<option value="Yes" <?php if($ops1['subAgre']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
		<option value="No" <?php if($ops1['subAgre']=="No") { echo 'selected="selected"';}?>>No</option>
	  </select>
	 </td>
	  <th>Received On</th>
	  <td><input type="text" class="form-control" id="subAgreDate" name="subAgreDate"  value="<?php echo $ops1['subAgreDate'];?>"></td>
	  </tr>
	  <tr>
	  <th>G-28</th>
	 <td>
	  <select class="form-control" name="g28">
		<option value="">Select</option>
		<option value="Yes" <?php if($ops1['g28']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
		<option value="No" <?php if($ops1['g28']=="No") { echo 'selected="selected"';}?>>No</option>
	  </select>
	 </td>
	  <th>Received On</th>
	  <td><input type="text" class="form-control" id="g28Date" name="g28Date"  value="<?php echo $ops1['g28Date'];?>"></td>
	  </tr>
	  <tr>
	  <th>I-526 Petition</th>
	 <td>
	  <select class="form-control" name="i526">
		<option value="">Select</option>
		<option value="Yes" <?php if($ops1['i526']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
		<option value="No" <?php if($ops1['i526']=="No") { echo 'selected="selected"';}?>>No</option>
	  </select>
	 </td>
	  <th>Received On</th>
	  <td><input type="text" class="form-control" id="i526Date" name="i526Date"  value="<?php echo $ops1['i526Date'];?>"></td>
	  </tr>
	  <tr>
	  <th>W-8 BEN</th>
	  <td>
	  <select class="form-control" name="w8Ben">
		<option value="">Select</option>
		<option value="Yes" <?php if($ops1['w8Ben']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
		<option value="No" <?php if($ops1['w8Ben']=="No") { echo 'selected="selected"';}?>>No</option>
	  </select>
	 </td>
	  <th>Received On</th>
	  <td><input type="text" class="form-control" id="w8BenDate" name="w8BenDate"  value="<?php echo $ops1['w8BenDate'];?>"></td>
	  </tr>
  </table>
  </div>
  <div class="col-sm-12 form-group text-center"><h6>Civil Documents</h6></div>
  <div class="col-sm-12 form-group">
  <table class="table">
  <tr><th>&nbsp;</th><th style="text-align:center">PA</th><th style="text-align:center">Spouse</th><th style="text-align:center">Dependents</th></tr>
  <tr>
  <td>Resume</td>
  <td>
   <select class="form-control" name="resmPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['resmPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['resmPA']=="No") { echo 'selected="selected"';}?>>No</option>
  </select>
	</td>
	<td>
	</td>
	<td>
	
	</td>
	</tr>

<tr>
  <td>Passport (First to Current)</td>
 <td>
  <select class="form-control" name="passPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['passPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['passPA']=="No") { echo 'selected="selected"';}?>>No</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="passSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['passSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['passSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="passDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['passDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['passDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
	</select>
  </select>
  </td>
	</tr>
	
<tr>
  <td>National ID /Residence ID</td>
  <td>
  <select class="form-control" name="idPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['idPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['idPA']=="No") { echo 'selected="selected"';}?>>No</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="idSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['idSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['idSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="idDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['idDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['idDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
	</select>
  </select>
  </td>
	</tr>	

<tr>
  <td>Birth Certificate</td>
  <td>
  <select class="form-control" name="birthPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['birthPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['birthPA']=="No") { echo 'selected="selected"';}?>>No</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="birthSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['birthSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['birthSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="birthDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['birthDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['birthDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
	</select>
  </select>
  </td>
	</tr>
<tr>
  <td>Educational Douments</td>
 <td>
  <select class="form-control" name="eduPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['eduPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['eduPA']=="No") { echo 'selected="selected"';}?>>No</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="eduSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['eduSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['eduSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="eduDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['eduDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['eduDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
	</select>
  </select>
  </td>
	</tr>	
  </table>
  
  </div>


  <div class="col-sm-12 form-group text-center"><h6>Civil Documents</h6></div>
<div class="col-sm-12 form-group">
  <table class="table">
  <tr><th>&nbsp;</th><th style="text-align:center">PA</th><th style="text-align:center">Spouse</th><th style="text-align:center">Dependents</th></tr>
  <tr>
  <td>Bank Statements</td>
  <td>
  <select class="form-control" name="pbsPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['pbsPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['pbsPA']=="No") { echo 'selected="selected"';}?>>No</option>
  </select>
  </td>
  <td>
 
  </td>
  <td>
 
  </td>
	</tr>

<tr>
  <td>Narrative Document</td>
   <td>
  <select class="form-control" name="nDocPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['nDocPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['nDocPA']=="No") { echo 'selected="selected"';}?>>No</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="nDocSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['nDocSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['nDocpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="nDocDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['nDocDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['nDocDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
	</select>
  </select>
  </td>
	</tr>
	
<tr>
  <td>Net Worth Report</td>
    <td>
  <select class="form-control" name="nwrPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['nwrPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['nwrPA']=="No") { echo 'selected="selected"';}?>>No</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="nwrSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['nwrSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['nwrSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="nwrDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['nwrDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['nwrDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
	</select>
  </select>
  </td>
	</tr>	

<tr>
  <td>Proof of Accumulation of <br />Investment Funds</td>
    <td>
  <select class="form-control" name="pifPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['pifPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['pifPA']=="No") { echo 'selected="selected"';}?>>No</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="pifSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['pifSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['pifSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="pifDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['pifDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['pifDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
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
	<div class="col-sm-12 form-group">
  <table class="table">
  <tr><th>&nbsp;</th><th style="text-align:center">PA</th><th style="text-align:center">Spouse</th><th style="text-align:center">Dependents</th></tr>
  <tr>
  <td>I-526 Petition Fee</td>
  <td>
  <select class="form-control" name="i526FeePA">
		<option value="">Select</option>
    <option value="Yes" <?php if($ops1['i526FeePA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['i526FeePA']=="No") { echo 'selected="selected"';}?>>No</option>

		</select>
	</td>
	<td style="text-align:center">N/A	</td>
	<td style="text-align:center">N/A	</td>
	</tr>

<tr>
  <td>NVC Application Fee</td>
  <td>
  <select class="form-control" name="nvcFeePA">
		<option value="">Select</option>
    <option value="Yes" <?php if($ops1['nvcFeePA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['nvcFeePA']=="No") { echo 'selected="selected"';}?>>No</option>

		</select>
	</td>
	<td><select class="form-control" name="nvcFeeSpouse">
		<option value="">Select</option>
    <option value="Yes" <?php if($ops1['nvcFeeSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['nvcFeeSpouse']=="No") { echo 'selected="selected"';}?>>No</option>

		</select>
	</td>
	<td>
	<select class="form-control" name="nvcFeeDepent">
		<option value="">Select</option>
    <option value="Yes" <?php if($ops1['nvcFeeDepent']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['nvcFeeDepent']=="No") { echo 'selected="selected"';}?>>No</option>

		</select>
	</td>
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
  <?php } }?>

</div>
  
  
  
  <div class="tab-pane container" id="tab4">
  <div class="row" style="overflow:hidden">
  <div class="col-sm-12">
  <table class="table">
  <tr><th>&nbsp;</th><th style="text-align:center">PA</th><th style="text-align:center">Spouse</th><th style="text-align:center">Dependents</th><th>Status</th></tr>
  <tr>
  <td>Form DS-260</td>
  <td>
  <select class="form-control" name="ds260PA">
  	<option value="">Select</option>
    <option value="Yes" <?php if($ops1['ds260PA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['ds260PA']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['ds260PA']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="ds260Spouse">
  	<option value="">Select</option>
    <option value="Yes" <?php if($ops1['ds260Spouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['ds260Spouse']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['ds260Spouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
   <td>
  <select class="form-control" name="ds260Depent">
  	<option value="">Select</option>
    <option value="Yes" <?php if($ops1['ds260Depent']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['ds260Depent']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['ds260Depent']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
	<td><select class="form-control" name="ds260Sts"><option value="">Select</option>
	<option value="Incomplete" <?php if($ops1['ds260Sts']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
	<option value="Complete" <?php if($ops1['ds260Sts']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
	</select>
	</td>
	</tr>

<tr>
  <td>Passport Copy</td>
  <td>
  <select class="form-control" name="passCopyPA">
  	<option value="">Select</option>
    <option value="Yes" <?php if($ops1['passCopyPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['passCopyPA']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['passCopyPA']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="passCopySpouse">
  	<option value="">Select</option>
    <option value="Yes" <?php if($ops1['passCopySpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['passCopySpouse']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['passCopySpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
   <td>
  <select class="form-control" name="passCopyDepent">
  	<option value="">Select</option>
    <option value="Yes" <?php if($ops1['passCopyDepent']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['passCopyDepent']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['passCopyDepent']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
<td><select class="form-control" name="passCopySts"><option value="">Select</option>
	<option value="Incomplete" <?php if($ops1['passCopySts']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
	<option value="Complete" <?php if($ops1['passCopySts']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
	</select>
	</td>	</tr>

<tr>
  <td>Birth Certificate</td>
   <td>
  <select class="form-control" name="birthCertPA">
  	<option value="">Select</option>
    <option value="Yes" <?php if($ops1['birthCertPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['birthCertPA']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['birthCertPA']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="birthCertSpouse">
  	<option value="">Select</option>
    <option value="Yes" <?php if($ops1['birthCertSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['birthCertSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['birthCertSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
   <td>
  <select class="form-control" name="birthCertDepent">
  	<option value="">Select</option>
    <option value="Yes" <?php if($ops1['birthCertDepent']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['birthCertDepent']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['birthCertDepent']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
<td><select class="form-control" name="birthCertSts"><option value="">Select</option>
	<option value="Incomplete" <?php if($ops1['birthCertSts']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
	<option value="Complete" <?php if($ops1['birthCertSts']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
	</select>
	</td>	</tr>	

<tr>
  <td>Marriage Certificate</td>
  <td>
  <select class="form-control" name="marCertPA">
  	<option value="">Select</option>
    <option value="Yes" <?php if($ops1['marCertPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['marCertPA']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['marCertPA']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="marCertSpouse">
  	<option value="">Select</option>
    <option value="Yes" <?php if($ops1['marCertSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['marCertSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['marCertSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
   <td>
  <select class="form-control" name="marCertDepent">
  	<option value="">Select</option>
    <option value="Yes" <?php if($ops1['marCertDepent']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['marCertDepent']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['marCertDepent']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
<td><select class="form-control" name="marCertSts"><option value="">Select</option>
	<option value="Incomplete" <?php if($ops1['marCertSts']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
	<option value="Complete" <?php if($ops1['marCertSts']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
	</select>
	</td>	</tr>	
	
<tr>
  <td>National ID</td>
   <td>
  <select class="form-control" name="natIdPA">
  	<option value="">Select</option>
    <option value="Yes" <?php if($ops1['natIdPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['natIdPA']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['natIdPA']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="natIdSpouse">
  	<option value="">Select</option>
    <option value="Yes" <?php if($ops1['natIdSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['natIdSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['natIdSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
   <td>
  <select class="form-control" name="natIdDepent">
  	<option value="">Select</option>
    <option value="Yes" <?php if($ops1['natIdDepent']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['natIdDepent']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['natIdDepent']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
<td><select class="form-control" name="natIdSts"><option value="">Select</option>
	<option value="Incomplete" <?php if($ops1['natIdSts']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
	<option value="Complete" <?php if($ops1['natIdSts']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
	</select>
	</td>	</tr>	

<tr>
  <td>Residence Proof/ID</td>
   <td>
  <select class="form-control" name="resProfPA">
  	<option value="">Select</option>
    <option value="Yes" <?php if($ops1['resProfPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['resProfPA']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['resProfPA']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="resProfSpouse">
  	<option value="">Select</option>
    <option value="Yes" <?php if($ops1['resProfSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['resProfSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['resProfSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
   <td>
  <select class="form-control" name="resProfDepent">
  	<option value="">Select</option>
    <option value="Yes" <?php if($ops1['resProfDepent']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['resProfDepent']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['resProfDepent']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
<td><select class="form-control" name="resProfSts"><option value="">Select</option>
	<option value="Incomplete" <?php if($ops1['resProfSts']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
	<option value="Complete" <?php if($ops1['resProfSts']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
	</select>
	</td>	</tr>	
	
	
<tr>
  <td>Passport Photo</td>
   <td>
  <select class="form-control" name="pasPhotoPA">
  	<option value="">Select</option>
    <option value="Yes" <?php if($ops1['pasPhotoPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['pasPhotoPA']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['pasPhotoPA']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="pasPhotoSpouse">
  	<option value="">Select</option>
    <option value="Yes" <?php if($ops1['pasPhotoSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['pasPhotoSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['pasPhotoSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
   <td>
  <select class="form-control" name="pasPhotoDepent">
  	<option value="">Select</option>
    <option value="Yes" <?php if($ops1['pasPhotoDepent']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['pasPhotoDepent']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['pasPhotoDepent']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
<td><select class="form-control" name="pasPhotoSts"><option value="">Select</option>
	<option value="Incomplete" <?php if($ops1['pasPhotoSts']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
	<option value="Complete" <?php if($ops1['pasPhotoSts']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
	</select>
	</td>	</tr>	

<tr>
  <td>Police Clearance<br /> Certificate</td>
   <td>
  <select class="form-control" name="polCertPA">
  	<option value="">Select</option>
    <option value="Yes" <?php if($ops1['polCertPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['polCertPA']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['polCertPA']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="polCertSpouse">
  	<option value="">Select</option>
    <option value="Yes" <?php if($ops1['polCertSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['polCertSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['polCertSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
   <td>
  <select class="form-control" name="polCertDepent">
  	<option value="">Select</option>
    <option value="Yes" <?php if($ops1['polCertDepent']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['polCertDepent']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['polCertDepent']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
<td><select class="form-control" name="polCertSts"><option value="">Select</option>
	<option value="Incomplete" <?php if($ops1['polCertSts']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
	<option value="Complete" <?php if($ops1['polCertSts']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
	</select>
	</td>	</tr>	
			
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
  <?php }} ?>
  </div>
  
  
  <div class="tab-pane container" id="tab7">
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
		<option value="Approved" <?php if($ops1['intResult']=="Approved") { echo 'selected="selected"';}?>>Approved</option>
		<option value="Rejected" <?php if($ops1['intResult']=="Rejected") { echo 'selected="selected"';}?>>Rejected</option>
		</select>
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
		
		$('#escAgreDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#passCopyDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#escAgreCopyDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#acouDetsDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#wireTransDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#profFundDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#subAgreDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#g28Date').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#i526Date').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#w8BenDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 

		$('#intwRecDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#intSchDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#intInfmDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#intFixdDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#intBrfDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#intDocDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#intDocRecDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 

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