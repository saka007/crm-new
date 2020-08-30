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
				'leadId'  =>  $_POST['lead'], 				
						'langTest'  =>  $_POST['langTest'], 
				'testStatus'  =>  $_POST['testStatus'], 	'expiryDate'  =>  $_POST['expiryDate'], 
				'testDate'  =>  $_POST['testDate'], 		'testScore'  =>  $_POST['testScore'], 
				'spLangTest'  =>  $_POST['spLangTest'], 	'anzCode'  =>  $_POST['anzCode'], 
				'chklistDate'  =>  $_POST['chklistDate'], 	'assmAuthority'  =>  $_POST['assmAuthority'], 
				'assmSubDate'  =>  $_POST['assmSubDate'], 	'assmStatus'  =>  $_POST['assmStatus'], 
				'spSkillAssm'  =>  $_POST['spSkillAssm'], 	'nomState'  =>  $_POST['nomState'], 
				'nomSubDate'  =>  $_POST['nomSubDate'], 	'nomExpDate'  =>  $_POST['nomExpDate'], 
				'itaDate'  =>  $_POST['itaDate'], 			'itaExpDate'  =>  $_POST['itaExpDate'], 
				'visaSubDate'  =>  $_POST['visaSubDate'], 	'medExam'  =>  $_POST['medExam'], 
				'policeClear'  =>  $_POST['policeClear'],	'visaStatus'  =>  $_POST['visaStatus'], 
				'landDate'  =>  $_POST['landDate'], 		'landService'  =>  $_POST['landService']
				);
			$opsId=$obj->insert('dm_ops_skill_australia',$data);
}
else
{
	$opsId=$_POST['opsId'];
	$data = array(
				'langTest'  =>  $_POST['langTest'], 
				'testStatus'  =>  $_POST['testStatus'], 	'expiryDate'  =>  $_POST['expiryDate'], 
				'testDate'  =>  $_POST['testDate'], 		'testScore'  =>  $_POST['testScore'], 
				'spLangTest'  =>  $_POST['spLangTest'], 	'anzCode'  =>  $_POST['anzCode'], 
				'chklistDate'  =>  $_POST['chklistDate'], 	'assmAuthority'  =>  $_POST['assmAuthority'], 
				'assmSubDate'  =>  $_POST['assmSubDate'], 	'assmStatus'  =>  $_POST['assmStatus'], 
				'spSkillAssm'  =>  $_POST['spSkillAssm'], 	'nomState'  =>  $_POST['nomState'], 
				'nomSubDate'  =>  $_POST['nomSubDate'], 	'nomExpDate'  =>  $_POST['nomExpDate'], 
				'itaDate'  =>  $_POST['itaDate'], 			'itaExpDate'  =>  $_POST['itaExpDate'], 
				'visaSubDate'  =>  $_POST['visaSubDate'], 	'medExam'  =>  $_POST['medExam'], 
				'policeClear'  =>  $_POST['policeClear'],	'visaStatus'  =>  $_POST['visaStatus'], 
				'landDate'  =>  $_POST['landDate'], 		'landService'  =>  $_POST['landService'],
				'reading' => $_POST['reading'],              'writing'  => $_POST['writing'],
				'listening' => $_POST['listening'],          'speaking'  => $_POST['speaking'],
				'langTests' => $_POST['langTests'],          'testStatuss' => $_POST['testStatuss'],
				'expiryDates' => $_POST['expiryDates'],      'testDates' => $_POST['testDates'],
				'testScores' => $_POST['testScores'],         'readings'  => $_POST['readings'],
				'writings'  => $_POST['writings'],           'listenings' => $_POST['listenings'],
				'speakings' => $_POST['speakings'],
				);
			$obj->update('dm_ops_skill_australia',$data,'id='.$_POST['opsId']);
}		

	if($_FILES['langFile']['name']!="")
	{
		$filename=time().'_'.$_FILES['langFile']['name'];
        move_uploaded_file($_FILES['langFile']['tmp_name'], 'uploads/documents/' . $filename);
			$dataSheet2 = array(
	    			'opsId'   =>  $opsId,
	    			'leadId'  =>  $_POST['lead'],
	    			'tab'   =>  1,
	    			'file'   =>  $filename
	    			);
			$obj->insert('dm_ops_documents',$dataSheet2);
	}
	
	if($_FILES['skilFile']['name']!="")
	{
		$filename=time().'_'.$_FILES['skilFile']['name'];
        move_uploaded_file($_FILES['skilFile']['tmp_name'], 'uploads/documents/' . $filename);
			$dataSheet2 = array(
	    			'opsId'   =>  $opsId,
	    			'leadId'  =>  $_POST['lead'],
	    			'tab'   =>  2,
	    			'file'   =>  $filename
	    			);
			$obj->insert('dm_ops_documents',$dataSheet2);
	}
	
	if($_FILES['eoiFile']['name']!="")
	{
		$filename=time().'_'.$_FILES['eoiFile']['name'];
        move_uploaded_file($_FILES['eoiFile']['tmp_name'], 'uploads/documents/' . $filename);
			$dataSheet2 = array(
	    			'opsId'   =>  $opsId,
	    			'leadId'  =>  $_POST['lead'],
	    			'tab'   =>  3,
	    			'file'   =>  $filename
	    			);
			$obj->insert('dm_ops_documents',$dataSheet2);
	}
	
		if($_FILES['nomFile']['name']!="")
	{
		$filename=time().'_'.$_FILES['nomFile']['name'];
        move_uploaded_file($_FILES['nomFile']['tmp_name'], 'uploads/documents/' . $filename);
			$dataSheet2 = array(
	    			'opsId'   =>  $opsId,
	    			'leadId'  =>  $_POST['lead'],
	    			'tab'   =>  4,
	    			'file'   =>  $filename
	    			);
			$obj->insert('dm_ops_documents',$dataSheet2);
	}
	
	if($_FILES['visaFile']['name']!="")
	{
		$filename=time().'_'.$_FILES['visaFile']['name'];
        move_uploaded_file($_FILES['visaFile']['tmp_name'], 'uploads/documents/' . $filename);
			$dataSheet2 = array(
	    			'opsId'   =>  $opsId,
	    			'leadId'  =>  $_POST['lead'],
	    			'tab'   =>  5,
	    			'file'   =>  $filename
	    			);
			$obj->insert('dm_ops_documents',$dataSheet2);
	}
	
	if($_FILES['landFile']['name']!="")
	{
		$filename=time().'_'.$_FILES['landFile']['name'];
        move_uploaded_file($_FILES['landFile']['tmp_name'], 'uploads/documents/' . $filename);
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
if($_POST['conversation']!="")
{
	$data5 = array(
    			'leadid'  =>  $_POST['lead'],
    			'date'  =>  date('Y-m-d'),
    			'conversation'  =>  $_POST['conversation'],
    			'type'  =>  $_POST['conversation_type']
				);
			$obj->insert('dm_ops_conversation',$data5);
}

if($_POST['eoiLodgDate']!=""){
	if($_FILES['eoiFile']['name']!="")
	{
	    $eoifilename=time().'_'.$_FILES['eoiFile']['name'];
		move_uploaded_file($_FILES['eoiFile']['tmp_name'], 'uploads/documents/'.$eoifilename);
	}
	$data_eoi= array(
		          'leadid' => $_POST['lead'],
                 'dol'  =>  $_POST['eoiLodgDate'],
				'doe'  =>  $_POST['eoiExpDate'], 	'points'  =>  $_POST['eoiPoint'], 
				'eoi_status'  =>  $_POST['eoiStatus'], 		'pof'  =>  $_POST['eoiFund'], 
				'state'  =>  $_POST['eoiState'],
				'file' => $eoifilename
	);

	$obj->insert('aus_eoi',$data_eoi);

}
header("location:ops_skill_australia.php?lead=".$_POST['lead']);

}

$ops=$obj->display('dm_ops_skill_australia','leadId='.$_GET['lead']);
$ops1=$ops->fetch_array();


$lead=$obj->display('dm_lead','id='.$_GET['lead']);
$lead1=$lead->fetch_array();

$eoi = $obj->display('aus_eoi','id='.$_GET['lead']);
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
			<h3 class="mb-3">Final Skill Draft for Australia</h3> 
				<form action="" method="post" enctype="multipart/form-data" class="opeForm" name="ops_skill_australia" >
					<input type="hidden" name="lead" value="<?php echo $_GET['lead'];?>" />
					<input type="hidden" name="opsId" value="<?php echo $ops1['id'];?>" />
					
<ul class="nav nav-tabs">
  <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab1"><strong>Personal Details</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab2"><strong>Language Proficiancy</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab10"><strong>Language Proficiancy(Spouse)</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab3"><strong>Skill Assessment</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab4"><strong>EOI</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab5"><strong>State Nomination</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab6"><strong>Visa Grant</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab7"><strong>Post Landing Service</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab8"><strong>Remark</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab9"><strong>Conversation</strong></a></li>
</ul>

<div class="tab-content p-3 mb-3">

<div class="tab-pane active container" id="tab1">
<div class="row">
<div class="col-sm-4 form-group"><label >First Name</label><input type="text" class="form-control" id="fname" name="fname" value="<?php echo $lead1['fname'];?>" readonly=""></div>
<div class="col-sm-4 form-group"><label >Middle Name</label><input type="text" class="form-control" id="mname" name="mname" value="<?php echo $lead1['mname'];?>" readonly=""></div>
<div class="col-sm-4 form-group"><label >Family Name</label><input type="text" class="form-control" id="lname" name="lname" value="<?php echo $lead1['lname'];?>" readonly=""></div>
</div>
<div class="row">
<div class="col-sm-4 form-group"><label>Email</label><input type="text" class="form-control" id="email" name="email" value="<?php echo $lead1['email'];?>" <?php if($_SESSION['ROLE']!=1) { echo 'readonly=""';} ?> ></div>
<div class="col-sm-4 form-group"><label>Landline</label><input type="text" class="form-control" id="phone" name="phone" value="<?php echo $lead1['phone'];?>"  readonly=""></div>
<div class="col-sm-4 form-group"><label>Cell No.</label><input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $lead1['mobile'];?>" <?php if($_SESSION['ROLE']!=1) { echo 'readonly=""';} ?>  ></div>
</div>
<div class="row">
<div class="col-sm-4 form-group"><label >Nationality</label><select class="form-control" name="nationality"  readonly="">
	<option value="">Select</option>
	<?php $con=$obj->display('dm_countries','1=1 order by name');
	while($con1=$con->fetch_array())
	{
	?>
	<option value="<?php echo $con1['name'];?>"  <?php if($con1['name']==$lead1['nationality']) { echo 'selected="selected"';}?>><?php echo $con1['name'];?></option>
	<?php } ?>
	
	
</select>
</div>
<div class="col-sm-8 form-group"><label >Address</label><input type="text" class="form-control" id="address" name="address" value="<?php echo $lead1['address'];?>"  readonly=""></div>

</div>
	
	
  	<div class="row" style="overflow:hidden">
<div class="col-sm-4 form-group"><label >DOB</label><input type="text" class="form-control" id="dob" name="dob" value="<?php echo $lead1['dob'];?>"  readonly=""></div>
<div class="col-sm-4 form-group"><label>Gender</label>
	<select name="gender" class="form-control"  readonly="">
		<option value="Male" <?php if($lead1['gender']=="Male") { echo 'selected="selected"';}?>>Male</option>
		<option value="Female" <?php if($lead1['gender']=="Female") { echo 'selected="selected"';}?>>Female</option>
		</select>
</div>

<div class="col-sm-4 form-group"><label >Country Interested</label>
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


<div class="col-sm-4 form-group"><label >Program Interested</label>
<select class="form-control" name="service_interest"  readonly="">
	<?php $ser=$obj->display('dm_service','status=1 order by name');
	while($ser1=$ser->fetch_array())
	{
	?>
	<option value="<?php echo $ser1['id'];?>"  <?php if($ser1['id']==$lead1['service_interest']) { echo 'selected="selected"';}?>><?php echo $ser1['name'];?></option>
	<?php } ?>
	
</select>
</div>

<div class="col-sm-4 form-group"><label >Lead Source</label>
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
			
	<div class="col-sm-4 form-group"><label >Case Processing Officer</label><input type="text" class="form-control" id="officer" name="officer" value="<?=$emp1['name'];?>"  readonly=""></div>
			
			
		
</div>
  	
  <div class="row" style="overflow:hidden">
	
  
<div class="col-sm-4 form-group"><label >Date of retaintion</label><input type="text" class="form-control" id="retnDate" name="retnDate" value="<?php echo date('d-m-Y',strtotime($lead1['agreeDate']));?>" readonly=""  ></div>
	<div class="col-sm-4 form-group"><label >Agreement No</label><input type="text" class="form-control" id="agreeNo" name="agreeNo"  value="<?php $gh=$obj->display('dm_lead_contract','leadId='.$_GET['lead']); $gh1=$gh->fetch_array(); echo $gh1['id'];?>" readonly=""></div>
	</div>
  
  </div>
  
  
  
  
  
  <div class="tab-pane container" id="tab2">
  <div class="row" style="overflow:hidden">
  <div class="col-sm-4 form-group"><label >Language Test</label>
	<select class="form-control" name="langTest">
		<option value="">Select</option>
		<option value="IELTS(AT)" <?php if($ops1['langTest']=="IELTS(AT)") { echo 'selected="selected"';}?>>IELTS(AT)</option>
		<option value="IELTS(GT)" <?php if($ops1['langTest']=="IELTS(GT)") { echo 'selected="selected"';}?>>IELTS(GT)</option>
		<option value="PTE" <?php if($ops1['langTest']=="PTE") { echo 'selected="selected"';}?>>PTE</option>
		<option value="TOEFL(iBT)" <?php if($ops1['langTest']=="TOEFL(iBT)") { echo 'selected="selected"';}?>>TOEFL(iBT)</option>
		<option value="OET" <?php if($ops1['langTest']=="OET") { echo 'selected="selected"';}?>>OET</option>
		<option value="CAE" <?php if($ops1['langTest']=="CAE") { echo 'selected="selected"';}?>>CAE</option>
		</select>
	</div>		
  <div class="col-sm-4 form-group"><label >Status</label>
	<select class="form-control" name="testStatus">
		<option value="">Select</option>
		<option value="Pending" <?php if($ops1['testStatus']=="Pending") { echo 'selected="selected"';}?>>Pending</option>
		<option value="Completed" <?php if($ops1['testStatus']=="Completed") { echo 'selected="selected"';}?>>Completed</option>
		<option value="Insufficient" <?php if($ops1['testStatus']=="Insufficient") { echo 'selected="selected"';}?>>Insufficient</option>
		<option value="Registered" <?php if($ops1['testStatus']=="Registered") { echo 'selected="selected"';}?>>Registered</option>
		</select>
	</div>		
	<div class="col-sm-4 form-group"><label>Expiry Date </label><input type="text" class="form-control" id="expiryDate" name="expiryDate" value="<?php echo $ops1['expiryDate'];?>" ></div>
  </div>
    <div class="row" style="overflow:hidden">
	<div class="col-sm-4 form-group"><label>Test Date </label><input type="text" class="form-control" id="testDate" name="testDate" value="<?php echo $ops1['testDate'];?>" ></div>
	<div class="col-sm-4 form-group"><label>Test Score </label><input type="text" class="form-control" id="testScore" name="testScore" value="<?php echo $ops1['testScore'];?>" ></div>
	 <div class="col-sm-4 form-group"><label>Spouse Language Test</label>
	<select class="form-control" name="spLangTest">
		<option value="">Select</option>
		<option value="IELTS(AT)" <?php if($ops1['spLangTest']=="IELTS(AT)") { echo 'selected="selected"';}?>>IELTS(AT)</option>
		<option value="IELTS(GT)" <?php if($ops1['spLangTest']=="IELTS(GT)") { echo 'selected="selected"';}?>>IELTS(GT)</option>
		<option value="PTE" <?php if($ops1['spLangTest']=="PTE") { echo 'selected="selected"';}?>>PTE</option>
		<option value="TOEFL(iBT)" <?php if($ops1['spLangTest']=="TOEFL(iBT)") { echo 'selected="selected"';}?>>TOEFL(iBT)</option>
		<option value="OET" <?php if($ops1['spLangTest']=="OET") { echo 'selected="selected"';}?>>OET</option>
		<option value="CAE" <?php if($ops1['spLangTest']=="CAE") { echo 'selected="selected"';}?>>CAE</option>
		<option value="Not applicable" <?php if($ops1['spLangTest']=="Not applicable") { echo 'selected="selected"';}?>>Not applicable</option>
	</select>
	</div>	

	<div class="row" style="overflow:hidden">
  <div class="col-sm-3 form-group"><label>Reading</label><input type="text" class="form-control" id="reading" name="reading" value="<?php echo $ops1['reading'];?>" ></div>
  <div class="col-sm-3 form-group"><label>Writing</label><input type="text" class="form-control" id="writing" name="writing" value="<?php echo $ops1['writing'];?>" ></div>
  <div class="col-sm-3 form-group"><label>Listening</label><input type="text" class="form-control" id="listening" name="listening" value="<?php echo $ops1['listening'];?>" ></div>
  <div class="col-sm-3 form-group"><label>Speaking</label><input type="text" class="form-control" id="speaking" name="speaking" value="<?php echo $ops1['speaking'];?>" ></div>
 </div>

	 <div class="col-sm-4 form-group"><label>Document File <?php if($ops1['langFile']!="") { echo '<a href="uploads/documents/'.$ops1['langFile'].'" target="_blank" style="float:right">View</a>'; }?></label>
 		 <input type="file" class="form-control" id="langFile" name="langFile" >
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

  <!-- tab10 -->

  <div class="tab-pane container" id="tab10">
  <div class="row" style="overflow:hidden">
  <div class="col-sm-4 form-group"><label >Language Test(Spouse)</label>
	<select class="form-control" name="langTests">
		<option value="">Select</option>
		<option value="IELTS(AT)" <?php if($ops1['langTests']=="IELTS(AT)") { echo 'selected="selected"';}?>>IELTS(AT)</option>
		<option value="IELTS(GT)" <?php if($ops1['langTests']=="IELTS(GT)") { echo 'selected="selected"';}?>>IELTS(GT)</option>
		<option value="PTE" <?php if($ops1['langTests']=="PTE") { echo 'selected="selected"';}?>>PTE</option>
		<option value="TOEFL(iBT)" <?php if($ops1['langTests']=="TOEFL(iBT)") { echo 'selected="selected"';}?>>TOEFL(iBT)</option>
		<option value="OET" <?php if($ops1['langTests']=="OET") { echo 'selected="selected"';}?>>OET</option>
		<option value="CAE" <?php if($ops1['langTests']=="CAE") { echo 'selected="selected"';}?>>CAE</option>
		</select>
	</div>		
  <div class="col-sm-4 form-group"><label >Status</label>
	<select class="form-control" name="testStatuss">
		<option value="">Select</option>
		<option value="Pending" <?php if($ops1['testStatuss']=="Pending") { echo 'selected="selected"';}?>>Pending</option>
		<option value="Completed" <?php if($ops1['testStatuss']=="Completed") { echo 'selected="selected"';}?>>Completed</option>
		<option value="Insufficient" <?php if($ops1['testStatuss']=="Insufficient") { echo 'selected="selected"';}?>>Insufficient</option>
		<option value="Registered" <?php if($ops1['testStatuss']=="Registered") { echo 'selected="selected"';}?>>Registered</option>
		</select>
	</div>		
	<div class="col-sm-4 form-group"><label>Expiry Date </label><input type="text" class="form-control" id="expiryDates" name="expiryDates" value="<?php echo $ops1['expiryDates'];?>" ></div>
  </div>
    <div class="row" style="overflow:hidden">
	<div class="col-sm-4 form-group"><label>Test Date </label><input type="text" class="form-control" id="testDates" name="testDates" value="<?php echo $ops1['testDates'];?>" ></div>
	<div class="col-sm-4 form-group"><label>Test Score </label><input type="text" class="form-control" id="testScores" name="testScores" value="<?php echo $ops1['testScores'];?>" ></div>

	<div class="row" style="overflow:hidden">
  <div class="col-sm-3 form-group"><label>Reading</label><input type="text" class="form-control" id="readings" name="readings" value="<?php echo $ops1['readings'];?>" ></div>
  <div class="col-sm-3 form-group"><label>Writing</label><input type="text" class="form-control" id="writings" name="writings" value="<?php echo $ops1['writings'];?>" ></div>
  <div class="col-sm-3 form-group"><label>Listening</label><input type="text" class="form-control" id="listenings" name="listenings" value="<?php echo $ops1['listenings'];?>" ></div>
  <div class="col-sm-3 form-group"><label>Speaking</label><input type="text" class="form-control" id="speakings" name="speakings" value="<?php echo $ops1['speakings'];?>" ></div>
 </div>

	 <div class="col-sm-4 form-group"><label>Document File <?php if($ops1['langFiles']!="") { echo '<a href="uploads/documents/'.$ops1['langFiles'].'" target="_blank" style="float:right">View</a>'; }?></label>
 		 <input type="file" class="form-control" id="langFiles" name="langFiles" >
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


  <!-- end -->
  
  
  <div class="tab-pane container" id="tab3">
  	<div class="row" style="overflow:hidden">
	<div class="col-sm-4 form-group"><label>ANZSCO Code </label><input type="text" class="form-control" id="anzCode" name="anzCode" value="<?php echo $ops1['anzCode'];?>" ></div>
	<div class="col-sm-4 form-group"><label>Check-list Issue Date </label><input type="text" class="form-control" id="chklistDate" name="chklistDate" value="<?php echo $ops1['chklistDate'];?>" ></div>
 	 <div class="col-sm-4 form-group"><label >Assessment Authority</label>
	<select class="form-control" name="assmAuthority">
		<option value="">Select</option>
		<option value="ACS" <?php if($ops1['assmAuthority']=="ACS") { echo 'selected="selected"';}?>>ACS</option>
		<option value="AIQS" <?php if($ops1['assmAuthority']=="AIQS") { echo 'selected="selected"';}?>>AIQS</option>
		<option value="AMSA" <?php if($ops1['assmAuthority']=="AMSA") { echo 'selected="selected"';}?>>AMSA</option>
		<option value="AACA" <?php if($ops1['assmAuthority']=="AACA") { echo 'selected="selected"';}?>>AACA</option>
		<option value="AITSL" <?php if($ops1['assmAuthority']=="AITSL") { echo 'selected="selected"';}?>>AITSL</option>
		<option value="CPA" <?php if($ops1['assmAuthority']=="CPA") { echo 'selected="selected"';}?>>CPA</option>
		<option value="IEA" <?php if($ops1['assmAuthority']=="IEA") { echo 'selected="selected"';}?>>IEA</option>
		<option value="TRA" <?php if($ops1['assmAuthority']=="TRA") { echo 'selected="selected"';}?>>TRA</option>
		<option value="VETASSESS" <?php if($ops1['assmAuthority']=="VETASSESS") { echo 'selected="selected"';}?>>VETASSESS</option>
		<option value="APC (Pharmacy)" <?php if($ops1['assmAuthority']=="APC (Pharmacy)") { echo 'selected="selected"';}?>>APC (Pharmacy)</option>
		<option value="MedBA (Medicine)" <?php if($ops1['assmAuthority']=="MedBA (Medicine)") { echo 'selected="selected"';}?>>MedBA (Medicine)</option>
		<option value="APC (Physiotherapist)" <?php if($ops1['assmAuthority']=="APC (Physiotherapist)") { echo 'selected="selected"';}?>>APC (Physiotherapist)</option>
		<option value="AIMS (Lab Scientist)" <?php if($ops1['assmAuthority']=="AIMS (Lab Scientist)") { echo 'selected="selected"';}?>>AIMS (Lab Scientist)</option>
		<option value="AHPRA (Nursing License)" <?php if($ops1['assmAuthority']=="AHPRA (Nursing License)") { echo 'selected="selected"';}?>>AHPRA (Nursing License)</option>
		<option value="ANMAC (Nurse S.A)" <?php if($ops1['assmAuthority']=="ANMAC (Nurse S.A)") { echo 'selected="selected"';}?>>ANMAC (Nurse S.A)</option>
		</select>
	</div>			
  	</div>
  	<div class="row" style="overflow:hidden">
	<div class="col-sm-4 form-group"><label>Assessment Submission Date </label><input type="text" class="form-control" id="assmSubDate" name="assmSubDate" value="<?php echo $ops1['assmSubDate'];?>" ></div>
 	 <div class="col-sm-4 form-group"><label >Assessment Status </label>
	<select class="form-control" name="assmStatus">
		<option value="">Select</option>
		<option value="Check-list Issued" <?php if($ops1['assmStatus']=="Check-list Issued") { echo 'selected="selected"';}?>>Check-list Issued</option>
		<option value="Documents Pending" <?php if($ops1['assmStatus']=="Documents Pending") { echo 'selected="selected"';}?>>Documents Pending</option>
		<option value="Submitted" <?php if($ops1['assmStatus']=="Submitted") { echo 'selected="selected"';}?>>Submitted</option>
		<option value="Positive" <?php if($ops1['assmStatus']=="Positive") { echo 'selected="selected"';}?>>Positive</option>
		<option value="Negative" <?php if($ops1['assmStatus']=="Negative") { echo 'selected="selected"';}?>>Negative</option>
		</select>
	</div>			
 	 <div class="col-sm-4 form-group"><label >Spouse Skill Assessment</label>
	<select class="form-control" name="spSkillAssm">
		<option value="">Select</option>
		<option value="Pending" <?php if($ops1['spSkillAssm']=="Pending") { echo 'selected="selected"';}?>>Pending</option>
		<option value="Completed" <?php if($ops1['spSkillAssm']=="Completed") { echo 'selected="selected"';}?>>Completed</option>
		<option value="Positive" <?php if($ops1['spSkillAssm']=="Positive") { echo 'selected="selected"';}?>>Positive</option>
		<option value="Negative" <?php if($ops1['spSkillAssm']=="Negative") { echo 'selected="selected"';}?>>Negative</option>
		<option value="Submitted" <?php if($ops1['spSkillAssm']=="Submitted") { echo 'selected="selected"';}?>>Submitted</option>
		<option value="Not applicable" <?php if($ops1['spSkillAssm']=="Not applicable") { echo 'selected="selected"';}?>>Not applicable</option>
		</select>
	</div>	
	 <div class="col-sm-4 form-group"><label>Document File <?php if($ops1['skilFile']!="") { echo '<a href="uploads/documents/'.$ops1['skilFile'].'" target="_blank" style="float:right">View</a>'; }?></label>
  		<input type="file" class="form-control" id="skilFile" name="skilFile" >
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
<?php if ($eoi->num_rows > 0) {
	while ($eoi1= $eoi->fetch_array()) {
	?>
	<div class="row" style="overflow:hidden">
					<div class="col-sm-4 form-group">
							<label>Date of Lodgement</label>
							<input type="text" data-id="<?=$pnp1['id']?>" data-column="pnp" class="form-control" id="eoiLodgDate" name="eoiLodgDate" value="<?php echo $ops1['eoiLodgDate'];?>"  >
					</div>
					<div class="col-sm-4 form-group">
							<label>Date of Expiry</label>
							<input type="text" class="form-control" id="eoiExpDate" name="eoiExpDate" value="<?php echo $ops1['eoiExpDate'];?>"   >
					</div>
					<div class="col-sm-4 form-group">
							<label>Points</label>
							<input type="text" class="form-control" id="eoiPoint" name="eoiPoint" value="<?php echo $ops1['eoiPoint'];?>"   >
					</div>
					<div class="col-sm-8">
					<div class="row">
					<div class="col-sm-6 form-group">
							<label>EOI Status</label>
							<select name="eoiStatus" id="eoiStatus" class="form-control">
							<option value="">Select</option>
							<option value="Inprogress" <?php if($ops1['eoiStatus']=="Inprogress") { echo 'selected="selected"';}?>>Inprogress</option>
							<option value="Completed" <?php if($ops1['eoiStatus']=="Completed") { echo 'selected="selected"';}?>>Approved</option>
							<option value="expired" <?php if($ops1['eoiStatus']=="expired") { echo 'selected="selected"';}?>>Expired</option>
							</select>
					</div>
					<div class="col-sm-6 form-group">
							<label>Proof of Funds</label>
							<input type="text" class="form-control" id="eoiFund" name="eoiFund" value="<?php echo $ops1['eoiFund'];?>"   >
					</div>

					
					</div>
					</div>
					<div class="col-sm-4">
						<label>Selected States </label>
						<select name="eoiState" id="eoiState" class="form-control">
						<option value="">Select</option>
						<option value="NEW SOUTH WALES">NEW SOUTH WALES</option>
						<option value="WESTERN AUSTRALIA">WESTERN AUSTRALIA</option>
						<option value="QUEENSLAND">QUEENSLAND</option>
						<option value="VICTORIA">VICTORIA</option>
						<option value="SOUTH AUSTRALIA">SOUTH AUSTRALIA</option>
						<option value="TASMANIA">TASMANIA</option>
						<option value="AUSTRALIAN CAPITAL TERRITORY">AUSTRALIAN CAPITAL TERRITORY</option>
						<option value="NORTHERN TERRITORY">NORTHERN TERRITORY</option>
						</select>
					</div>
					<div class="col-sm-4 form-group"><label>Document File <?php if($ops1['eoiFile']!="") { echo '<a href="uploads/documents/'.$ops1['eoiFile'].'" target="_blank" style="float:right">View</a>'; }?></label>
  						<input type="file" class="form-control" id="eoiFile" name="eoiFile" >
  					</div>
					  <!-- <input type="button" onclick=update() value="update"> -->
					
</div>

<?php } } ?>
  <div class="row" style="overflow:hidden">
					<div class="col-sm-4 form-group">
							<label>Date of Lodgement</label>
							<input type="text" class="form-control" id="eoiLodgDate" name="eoiLodgDate" value="<?php echo $ops1['eoiLodgDate'];?>"  >
					</div>
					<div class="col-sm-4 form-group">
							<label>Date of Expiry</label>
							<input type="text" class="form-control" id="eoiExpDate" name="eoiExpDate" value="<?php echo $ops1['eoiExpDate'];?>"   >
					</div>
					<div class="col-sm-4 form-group">
							<label>Points</label>
							<input type="text" class="form-control" id="eoiPoint" name="eoiPoint" value="<?php echo $ops1['eoiPoint'];?>"   >
					</div>
					<div class="col-sm-8">
					<div class="row">
					<div class="col-sm-6 form-group">
							<label>EOI Status</label>
							<select name="eoiStatus" id="eoiStatus" class="form-control">
							<option value="">Select</option>
							<option value="Inprogress" <?php if($ops1['eoiStatus']=="Inprogress") { echo 'selected="selected"';}?>>Inprogress</option>
							<option value="Completed" <?php if($ops1['eoiStatus']=="Completed") { echo 'selected="selected"';}?>>Approved</option>
							<option value="expired" <?php if($ops1['eoiStatus']=="expired") { echo 'selected="selected"';}?>>Expired</option>
							</select>
					</div>
					<div class="col-sm-6 form-group">
							<label>Proof of Funds</label>
							<input type="text" class="form-control" id="eoiFund" name="eoiFund" value="<?php echo $ops1['eoiFund'];?>"   >
					</div>

					
					</div>
					</div>
					<div class="col-sm-4">
						<label>Selected States </label>
						<select name="eoiState" id="eoiState" class="form-control">
						<option value="">Select</option>
						<option value="NEW SOUTH WALES">NEW SOUTH WALES</option>
						<option value="WESTERN AUSTRALIA">WESTERN AUSTRALIA</option>
						<option value="QUEENSLAND">QUEENSLAND</option>
						<option value="VICTORIA">VICTORIA</option>
						<option value="SOUTH AUSTRALIA">SOUTH AUSTRALIA</option>
						<option value="TASMANIA">TASMANIA</option>
						<option value="AUSTRALIAN CAPITAL TERRITORY">AUSTRALIAN CAPITAL TERRITORY</option>
						<option value="NORTHERN TERRITORY">NORTHERN TERRITORY</option>
						</select>
					</div>
					<div class="col-sm-4 form-group"><label>Document File <?php if($ops1['eoiFile']!="") { echo '<a href="uploads/documents/'.$ops1['eoiFile'].'" target="_blank" style="float:right">View</a>'; }?></label>
  						<input type="file" class="form-control" id="eoiFile" name="eoiFile" >
  					</div>
					  <!-- <input type="button" onclick=update() value="update"> -->
					
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
					
					<div class="col-sm-12 form-group">
							<label>Selected States </label>
						<input type="checkbox" name="nomState[]" /> NEW SOUTH WALES&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="nomState[]" /> WESTERN AUSTRALIA&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="nomState[]" /> QUEENSLAND&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="nomState[]" /> VICTORIA&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="nomState[]" /> SOUTH AUSTRALIA&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="nomState[]" /> TASMANIA&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="nomState[]" /> AUSTRALIAN CAPITAL TERRITORY&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="nomState[]" /> NORTHERN TERRITORY
					</div>
					<div class="col-sm-6 form-group">
							<label>Submission Date </label>
							<input type="text" class="form-control" id="nomSubDate" name="nomSubDate" value="<?php echo $ops1['nomSubDate'];?>"   >
					</div>
					<div class="col-sm-6 form-group">
							<label>Nomination Expiry Date </label>
							<input type="text" class="form-control" id="nomExpDate" name="nomExpDate" value="<?php echo $ops1['nomExpDate'];?>"   >
					</div>
					<div class="col-sm-4 form-group"><label>Document File <?php if($ops1['nomFile']!="") { echo '<a href="uploads/documents/'.$ops1['nomFile'].'" target="_blank" style="float:right">View</a>'; }?></label>
  						<input type="file" class="form-control" id="nomFile" name="nomFile" >
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
					<div class="col-sm-4 form-group">
							<label>Date of ITA</label>
							<input type="text" class="form-control" id="itaDate" name="itaDate" value="<?php echo $ops1['itaDate'];?>"   >
					</div>
					<div class="col-sm-4 form-group">
							<label>ITA Expiry</label>
							<input type="text" class="form-control" id="itaExpDate" name="itaExpDate" value="<?php echo $ops1['itaExpDate'];?>"   >
					</div>
					<div class="col-sm-4 form-group">
							<label>Date of Visa Submission</label>
							<input type="text" class="form-control" id="visaSubDate" name="visaSubDate" value="<?php echo $ops1['visaSubDate'];?>"   >
					</div>
					<div class="col-sm-4 form-group">
							<label>Medical Examination</label>
							<select name="medExam" id="medExam" class="form-control">
							<option value="">Select</option>
							<option value="Pending" <?php if($ops1['medExam']=="Pending") { echo 'selected="selected"';}?>>Received</option>
							<option value="Completed" <?php if($ops1['medExam']=="Completed") { echo 'selected="selected"';}?>>Pending</option>
							</select>
					</div>					
					<div class="col-sm-4 form-group">
							<label>Police Clearance</label>
							<select name="policeClear" id="policeClear" class="form-control">
							<option value="">Select</option>
							<option value="Pending" <?php if($ops1['policeClear']=="Pending") { echo 'selected="selected"';}?>>Received</option>
							<option value="Completed" <?php if($ops1['policeClear']=="Completed") { echo 'selected="selected"';}?>>Pending</option>
							</select>
					</div>					
					<div class="col-sm-4 form-group">
							<label>Visa Status</label>
							<select name="visaStatus" id="visaStatus" class="form-control">
							<option value="">Select</option>
							<option value="ITA Received" <?php if($ops1['visaStatus']=="ITA Received") { echo 'selected="selected"';}?>>ITA Received</option>
							<option value="Application Submitted" <?php if($ops1['visaStatus']=="Application Submitted") { echo 'selected="selected"';}?>>Application Submitted</option>
							<option value="Visa Approved" <?php if($ops1['visaStatus']=="Visa Approved") { echo 'selected="selected"';}?>>Visa Approved</option>
							
							<option value="Documents Pending" <?php if($ops1['visaStatus']=="Documents Pending") { echo 'selected="selected"';}?>>Documents Pending</option>
							<option value="DHA - Docs Request" <?php if($ops1['visaStatus']=="DHA - Docs Request") { echo 'selected="selected"';}?>>DHA - Docs Request</option>
							<option value="Refused" <?php if($ops1['visaStatus']=="Refused") { echo 'selected="selected"';}?>>Refused</option>
							<option value="Appeal the Decision" <?php if($ops1['visaStatus']=="Appeal the Decision") { echo 'selected="selected"';}?>>Appeal the Decision</option>
							</select>
					</div>	
					<div class="col-sm-4 form-group"><label>Document File <?php if($ops1['visaFile']!="") { echo '<a href="uploads/documents/'.$ops1['visaFile'].'" target="_blank" style="float:right">View</a>'; }?></label>
  						<input type="file" class="form-control" id="visaFile" name="visaFile" >
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
					<div class="col-sm-4 form-group">
							<label>Date of landing in Australia</label>
							<input type="text" class="form-control" id="landDate" name="landDate" value="<?php echo $ops1['landDate'];?>"   >
					</div>
					<div class="col-sm-8 form-group">
							<label>PLS SERVICES</label>
						<input type="checkbox" name="landService[]" /> PICK UP&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="landService[]" /> ACCOMODATION&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="landService[]" /> JOB ASSISTANCE&nbsp;&nbsp;&nbsp;
						<input type="checkbox" name="landService[]" /> OTHER SERVICES&nbsp;&nbsp;&nbsp;
					</div>
					<div class="col-sm-4 form-group"><label>Document File <?php if($ops1['landFile']!="") { echo '<a href="uploads/documents/'.$ops1['landFile'].'" target="_blank" style="float:right">View</a>'; }?></label>
  						<input type="file" class="form-control" id="landFile" name="landFile" >
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

  <!-- conversation tab -->

  <div class="tab-pane container" id="tab9">
  	<div class="row" style="overflow:hidden">
  		<div class="col-sm-12 form-group">
<?php 
				$conv=$obj->display('dm_ops_conversation','leadid='.$_GET["lead"]);
				 while($conv1=$conv->fetch_array()) 
				{if(trim($conv1['conversation'])!="")
						echo "<p><span>".$conv1['type'].'</span><br/>'.$conv1['conversation'].'<br/><span>'.time_elapsed_string($conv1['date'],1).'</span></p><br/>';
				}
?>
</div>
	</div>	
  <div class="row" style="overflow:hidden">
  	<div class="col-sm-3 form-group"><label>Type of Conversation</label>
	<select class="form-control" name="conversation_type">
		<option value="">Select</option>
		<option value="Walk-in">Walk-in</option>
		<option value="Inbound">Inbound</option>
		<option value="Outbound">Outbound</option>
	</select>
	</div>
	   <div class="col-sm-12 form-group"><label>Conversation</label><textarea type="text" class="form-control" id="conversation" name="conversation"></textarea></div>
	</div>

<!-- end of tab -->

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

	//    function update(){
	// 	   var eoi = $('#eoiLodgDate').val();
	// 	   var  eol = $('#eoiExpDate').val();
	// 	   var pts = $('#eoiPoint').val();
	// 	   var estat=$('#eoiStatus').val();
	// 	   var pof=$('#eoiFund').val();
	// 	   var state=$('#eoiState').val();
	// 	$.ajax({
	// 			url: "eoi.php",
	// 			type: "GET",
	// 			data:{eio:eoi,eol:eol,pts:pts,estat:estat,pof:pof,state:state},
	// 			cache: false,
	// 			dataType: 'json',
	// 			success:function(result){
	// 			// alert("Escalated");
	// 			}
	// 		});
	//    } 
		$(function(){
		$('#retnDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#expiryDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#testDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#expdocDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#chklistDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#assmSubDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#eoiLodgDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#eoiExpDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		
		$('#itaDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#itaExpDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#visaSubDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		
		$('#landDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		}); 
	</script>

<!-- <script type="text/javascript" src="js/table-drop-down.js"></script> -->