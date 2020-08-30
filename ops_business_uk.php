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
				'leadId'  =>  $_POST['lead'], 'passPA'  =>  $_POST['passPA'], 'passSpouse'  =>  $_POST['passSpouse'], 'passDepnd'  =>  $_POST['passDepnd'], 'idPA'  =>  $_POST['idPA'], 'idSpouse'  =>  $_POST['idSpouse'], 'idDepnd'  =>  $_POST['idDepnd'], 'birthPA'  =>  $_POST['birthPA'], 'birthSpouse'  =>  $_POST['birthSpouse'], 'birthDepnd'  =>  $_POST['birthDepnd'], 'eduPA'  =>  $_POST['eduPA'], 'eduSpouse'  =>  $_POST['eduSpouse'], 'eduDepnd'  =>  $_POST['eduDepnd'], 'pbsPA'  =>  $_POST['pbsPA'], 'pbsSpouse'  =>  $_POST['pbsSpouse'], 'pbsDepnd'  =>  $_POST['pbsDepnd'], 'pbcPA'  =>  $_POST['pbcPA'], 'pbcSpouse'  =>  $_POST['pbcSpouse'], 'pbcDepnd'  =>  $_POST['pbcDepnd'], 'tplPA'  =>  $_POST['tplPA'], 'tplSpouse'  =>  $_POST['tplSpouse'], 'tplDepnd'  =>  $_POST['tplDepnd'], 'tpbPA'  =>  $_POST['tpbPA'], 'tpbSpouse'  =>  $_POST['tpbSpouse'], 'tpbDepnd'  =>  $_POST['tpbDepnd'], 'tpsPA'  =>  $_POST['tpsPA'], 'tpsSpouse'  =>  $_POST['tpsSpouse'], 'tpsDepnd'  =>  $_POST['tpsDepnd'], 'tpbsPA'  =>  $_POST['tpbsPA'], 'tpbsSpouse'  =>  $_POST['tpbsSpouse'], 'tpbsDepnd'  =>  $_POST['tpbsDepnd'], 'tpbcPA'  =>  $_POST['tpbcPA'], 'tpbcSpouse'  =>  $_POST['tpbcSpouse'], 'tpbcDepnd'  =>  $_POST['tpbcDepnd'], 'visaReqRecDate'  =>  $_POST['visaReqRecDate'], 'visaValdDate'  =>  $_POST['visaValdDate'], 'visaInfDate'  =>  $_POST['visaInfDate'], 'visaApptDate'  =>  $_POST['visaApptDate'], 'visaDocRecDate'  =>  $_POST['visaDocRecDate'], 'visaDocRewDate'  =>  $_POST['visaDocRewDate'], 'visaDocSubDate'  =>  $_POST['visaDocSubDate'], 'visaConSentDate'  =>  $_POST['visaConSentDate'], 'waHandDate'  =>  $_POST['waHandDate'], 'waDocRecDate'  =>  $_POST['waDocRecDate'], 'waDocRewDate'  =>  $_POST['waDocRewDate'], 'waDocSignDate'  =>  $_POST['waDocSignDate'], 'waAppFinDate'  =>  $_POST['waAppFinDate'], 'waAppSubDate'  =>  $_POST['waAppSubDate'], 'waFormRecDate'  =>  $_POST['waFormRecDate'], 'passPA'  =>  $_POST['passPA'], 'waDocSignDate'  =>  $_POST['waDocSignDate'], 'intwRecDate'  =>  $_POST['intwRecDate'], 'intSchDate'  =>  $_POST['intSchDate'], 'intInfmDate'  =>  $_POST['intInfmDate'], 'intFixdDate'  =>  $_POST['intFixdDate'], 'intBrfDate'  =>  $_POST['intBrfDate'], 'intDocDate'  =>  $_POST['intDocDate'], 'intDocRecDate'  =>  $_POST['intDocRecDate'], 'intPrep'  =>  $_POST['intPrep'], 'intResult'  =>  $_POST['intResult']
				);
			$opsId=$obj->insert('dm_ops_busines_uk',$data);
	}	
	else
	{
	$opsId=$_POST['opsId'];
		$data = array(
				'passPA'  =>  $_POST['passPA'], 'passSpouse'  =>  $_POST['passSpouse'], 'passDepnd'  =>  $_POST['passDepnd'], 'idPA'  =>  $_POST['idPA'], 'idSpouse'  =>  $_POST['idSpouse'], 'idDepnd'  =>  $_POST['idDepnd'], 'birthPA'  =>  $_POST['birthPA'], 'birthSpouse'  =>  $_POST['birthSpouse'], 'birthDepnd'  =>  $_POST['birthDepnd'], 'eduPA'  =>  $_POST['eduPA'], 'eduSpouse'  =>  $_POST['eduSpouse'], 'eduDepnd'  =>  $_POST['eduDepnd'], 'pbsPA'  =>  $_POST['pbsPA'], 'pbsSpouse'  =>  $_POST['pbsSpouse'], 'pbsDepnd'  =>  $_POST['pbsDepnd'], 'pbcPA'  =>  $_POST['pbcPA'], 'pbcSpouse'  =>  $_POST['pbcSpouse'], 'pbcDepnd'  =>  $_POST['pbcDepnd'], 'tplPA'  =>  $_POST['tplPA'], 'tplSpouse'  =>  $_POST['tplSpouse'], 'tplDepnd'  =>  $_POST['tplDepnd'], 'tpbPA'  =>  $_POST['tpbPA'], 'tpbSpouse'  =>  $_POST['tpbSpouse'], 'tpbDepnd'  =>  $_POST['tpbDepnd'], 'tpsPA'  =>  $_POST['tpsPA'], 'tpsSpouse'  =>  $_POST['tpsSpouse'], 'tpsDepnd'  =>  $_POST['tpsDepnd'], 'tpbsPA'  =>  $_POST['tpbsPA'], 'tpbsSpouse'  =>  $_POST['tpbsSpouse'], 'tpbsDepnd'  =>  $_POST['tpbsDepnd'], 'tpbcPA'  =>  $_POST['tpbcPA'], 'tpbcSpouse'  =>  $_POST['tpbcSpouse'], 'tpbcDepnd'  =>  $_POST['tpbcDepnd'], 'visaReqRecDate'  =>  $_POST['visaReqRecDate'], 'visaValdDate'  =>  $_POST['visaValdDate'], 'visaInfDate'  =>  $_POST['visaInfDate'], 'visaApptDate'  =>  $_POST['visaApptDate'], 'visaDocRecDate'  =>  $_POST['visaDocRecDate'], 'visaDocRewDate'  =>  $_POST['visaDocRewDate'], 'visaDocSubDate'  =>  $_POST['visaDocSubDate'], 'visaConSentDate'  =>  $_POST['visaConSentDate'], 'waHandDate'  =>  $_POST['waHandDate'], 'waDocRecDate'  =>  $_POST['waDocRecDate'], 'waDocRewDate'  =>  $_POST['waDocRewDate'], 'waDocSignDate'  =>  $_POST['waDocSignDate'], 'waAppFinDate'  =>  $_POST['waAppFinDate'], 'waAppSubDate'  =>  $_POST['waAppSubDate'], 'waFormRecDate'  =>  $_POST['waFormRecDate'], 'passPA'  =>  $_POST['passPA'], 'waDocSignDate'  =>  $_POST['waDocSignDate'], 'intwRecDate'  =>  $_POST['intwRecDate'], 'intSchDate'  =>  $_POST['intSchDate'], 'intInfmDate'  =>  $_POST['intInfmDate'], 'intFixdDate'  =>  $_POST['intFixdDate'], 'intBrfDate'  =>  $_POST['intBrfDate'], 'intDocDate'  =>  $_POST['intDocDate'], 'intDocRecDate'  =>  $_POST['intDocRecDate'], 'intPrep'  =>  $_POST['intPrep'], 'intResult'  =>  $_POST['intResult']
				);
			$obj->update('dm_ops_busines_uk',$data,'id='.$_POST['opsId']);
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
header("location:ops_business_uk.php?lead=".$_POST['lead']);

}	


$ops=$obj->display('dm_ops_busines_uk','leadId='.$_GET['lead']);
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
			<h3 class="mb-3">Final Draft for UK Business</h3> 
				<form action="" method="post" enctype="multipart/form-data" class="opeForm" >
					<input type="hidden" name="lead" value="<?php echo $_GET['lead'];?>" />
					<input type="hidden" name="opsId" value="<?php echo $ops1['id'];?>" />
					
<ul class="nav nav-tabs">
  <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab1"><strong>Personal Details</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab2"><strong>Documentation</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab3"><strong>Application Processing Fee</strong></a></li>
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
 
  <div class="col-sm-12 form-group text-center"><h6>Civil Documents</h6></div>
  <div class="col-sm-12 form-group">
  <table class="table">
  <tr><th>&nbsp;</th><th style="text-align:center">PA</th><th style="text-align:center">Spouse</th><th style="text-align:center">Dependents</th></tr>

<tr>
  <td>Passport (First to Current)</td>
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
	</tr>
	
<tr>
  <td>National ID /Residence ID</td>
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
	</tr>	

<tr>
  <td>Birth Certificate</td>
  <td>
  <select class="form-control" name="birthPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['birthPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['birthPA']=="No") { echo 'selected="selected"';}?>>No</option>
  <option value="NA" <?php if($ops1['birthPA']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </td>
  <td>
  <select class="form-control" name="birthSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['birthSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['birthSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  	<option value="NA" <?php if($ops1['birthSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="birthDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['birthDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['birthDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['birthDepnd']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
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
  <option value="NA" <?php if($ops1['eduPA']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </td>
  <td>
  <select class="form-control" name="eduSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['eduSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['eduSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  	<option value="NA" <?php if($ops1['eduSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="eduDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['eduDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['eduDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['eduDepnd']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </select>
  </td>
	</tr>	
  </table>
  
  </div>


  <div class="col-sm-12 form-group text-center"><h6>Proof of Funds (Own Funds)</h6></div>
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
	</tr>

<tr>
  <td>Bank Certificate</td>
  <td>
  <select class="form-control" name="pbcPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['pbcPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['pbcPA']=="No") { echo 'selected="selected"';}?>>No</option>
  <option value="NA" <?php if($ops1['pbcPA']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </td>
  <td>
  <select class="form-control" name="pbcSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['pbcSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['pbcSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  	<option value="NA" <?php if($ops1['pbcSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="pbcDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['pbcDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['pbcDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['pbcDepnd']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </select>
  </td>
	</tr>
</table>
</div>

<div class="col-sm-12 form-group text-center"><h6>Proof of Funds (Third Party)</h6></div>
<div class="col-sm-12 form-group">	
 <table class="table">
  <tr><th>&nbsp;</th><th style="text-align:center">PA</th><th style="text-align:center">Spouse</th><th style="text-align:center">Dependents</th></tr><tr>
  <td>Letter from Third Party</td>
 <td>
  <select class="form-control" name="tplPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['tplPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['tplPA']=="No") { echo 'selected="selected"';}?>>No</option>
  <option value="NA" <?php if($ops1['tplPA']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </td>
  <td>
  <select class="form-control" name="tplSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['tplSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['tplSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  	<option value="NA" <?php if($ops1['tplSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="tplDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['tplDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['tplDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['tplDepnd']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </select>
  </td>
	</tr>	

<tr>
  <td>Letter from the Bank</td>
  <td>
  <select class="form-control" name="tpbPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['tpbPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['tpbPA']=="No") { echo 'selected="selected"';}?>>No</option>
  <option value="NA" <?php if($ops1['tpbPA']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </td>
  <td>
  <select class="form-control" name="tpbSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['tpbSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['tpbSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  	<option value="NA" <?php if($ops1['tpbSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="tpbDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['tpbDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['tpbDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['tpbDepnd']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </select>
  </td>
	</tr>

<tr>
  <td>Letter from the Solicitor</td>
  <td>
  <select class="form-control" name="tpsPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['tpsPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['tpsPA']=="No") { echo 'selected="selected"';}?>>No</option>
  <option value="NA" <?php if($ops1['tpsPA']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </td>
  <td>
  <select class="form-control" name="tpsSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['tpsSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['tpsSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  	<option value="NA" <?php if($ops1['tpsSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="tpsDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['tpsDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['tpsDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['tpsDepnd']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </select>
  </td>
	</tr>

<tr>
  <td>Bank Statements</td>
  <td>
  <select class="form-control" name="tpbsPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['tpbsPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['tpbsPA']=="No") { echo 'selected="selected"';}?>>No</option>
  <option value="NA" <?php if($ops1['tpbsPA']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </td>
  <td>
  <select class="form-control" name="tpbsSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['tpbsSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['tpbsSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  	<option value="NA" <?php if($ops1['tpbsSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="tpbsDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['tpbsDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['tpbsDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['tpbsDepnd']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </select>
  </td>
	</tr>
<tr>
  <td>Bank Certificate</td>
 <td>
  <select class="form-control" name="tpbcPA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['tpbcPA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['tpbcPA']=="No") { echo 'selected="selected"';}?>>No</option>
  <option value="NA" <?php if($ops1['tpbcPA']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
  </td>
  <td>
  <select class="form-control" name="tpbcSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['tpbcSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['tpbcSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  	<option value="NA" <?php if($ops1['tpbcSpouse']=="NA") { echo 'selected="selected"';}?>>NA</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="tpbcDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['tpbcDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['tpbcDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
 	<option value="NA" <?php if($ops1['tpbcDepnd']=="NA") { echo 'selected="selected"';}?>>NA</option></select>
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
  <td>Health Surcharge</td>
  <td>
  <select class="form-control" name="heathFeePA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['heathFee']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['heathFee']=="No") { echo 'selected="selected"';}?>>No</option>
  </select>
  </td>
	<td style="text-align:center">N/A	</td>
	<td style="text-align:center">N/A	</td>
	</tr>

<tr>
  <td>Application Fee</td>
 <td>
  <select class="form-control" name="appFeePA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['appFeePA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['appFeePA']=="No") { echo 'selected="selected"';}?>>No</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="appFeeSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['appFeeSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['appFeeSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="appFeeDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['appFeeDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['appFeeDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
  </select>
  </td>
	</tr>
	
<tr>
  <td>Biometric and Photo Fee</td>
  <td>
  <select class="form-control" name="bioFeePA">
  <option value="">Select</option>
  <option value="Yes" <?php if($ops1['bioFeePA']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  <option value="No" <?php if($ops1['bioFeePA']=="No") { echo 'selected="selected"';}?>>No</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="bioFeeSpouse">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['bioFeeSpouse']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['bioFeeSpouse']=="No") { echo 'selected="selected"';}?>>No</option>
  </select>
  </td>
  <td>
  <select class="form-control" name="bioFeeDepnd">
  <option value="">Select</option>
    <option value="Yes" <?php if($ops1['bioFeeDepnd']=="Yes") { echo 'selected="selected"';}?>>Yes</option>
  	<option value="No" <?php if($ops1['bioFeeDepnd']=="No") { echo 'selected="selected"';}?>>No</option>
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