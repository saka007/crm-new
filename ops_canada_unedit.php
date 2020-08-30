<?php 	include_once("header.php");	 

if(isset($_POST['opsId']))
    {
	$data = array(
    			"email" => $_POST['email'],
    			"mobile" => $_POST['mobile']
				);
	$obj->update('dm_lead',$data,'id='.$_POST['lead']);

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
if($_POST['status_c']!="")
{
	$filename = $_FILES['status_f']['name'];
	 move_uploaded_file($_FILES['status_f']['tmp_name'], 'uploads/status/' . $filename);
			$dataSheet = array(
	    			'leadid'  =>  $_POST['lead'],
	    			'date'  =>  date('Y-m-d'),
	    			'file'   =>  $filename,
	    			'status' => $_POST['status_c']
	    			);
			$obj->insert('client_status',$dataSheet);
}

	if($_POST['pnpLaun']!="")
	{
		$datapnp=array(
			'opsid'=>$opsId,
			'leadid'=>$_POST['lead'],
			'pnp'=>$_POST['pnpLaun'],
			'subdate'=>$_POST['pnpSubDate'],
			'expdate'=>$_POST['pnpExpDate'],
			'status'=>$_POST['pnpStatus']
		);
		$odrpnp=$obj->insert('dm_pnp',$datapnp);
	}

	if($_POST['copr_a']!="")
	{
		$data=array(
			'copr_a'=> $_POST['copr_a']);
		$obj->update('dm_client_personal',$data,'leadid='.$_GET['lead']);
	}

	if($_POST['vphoto_a']!="")
	{
		$data=array(
			'vphoto_a'=> $_POST['vphoto_a']);
		$obj->update('dm_client_personal',$data,'leadid='.$_GET['lead']);
	}

	if($_POST['final_visa_docfb_a']!="")
	{
		$data=array(
			'final_visa_docfb_a'=> $_POST['final_visa_docfb_a']);
		$obj->update('dm_client_personal',$data,'leadid='.$_GET['lead']);
	}

	if($_POST['final_visa_docfull_a']!="")
	{
		$data=array(
			'final_visa_docfull_a'=> $_POST['final_visa_docfull_a']);
		$obj->update('dm_client_personal',$data,'leadid='.$_GET['lead']);
	}

	if($_POST['mcert_re_a']!="")
	{
		$data=array(
			'mcert_re_a'=> $_POST['mcert_re_a']);
		$obj->update('dm_client_personal',$data,'leadid='.$_GET['lead']);
	}

	if($_POST['bcert_a']!="")
	{
		$data=array(
			'bcert_a'=> $_POST['bcert_a']);
		$obj->update('dm_client_personal',$data,'leadid='.$_GET['lead']);
	}

	if($_POST['niddoc_a']!="")
	{
		$data=array(
			'niddoc_a'=> $_POST['niddoc_a']);
		$obj->update('dm_client_personal',$data,'leadid='.$_GET['lead']);
	}

	if($_POST['marraige_a']!="")
	{
		$data=array(
			'marraige_a'=> $_POST['marraige_a']);
		$obj->update('dm_client_personal',$data,'leadid='.$_GET['lead']);
	}

	if($_POST['ielts_a']!="")
	{
		$data=array(
			'ielts_a'=> $_POST['ielts_a']);
		$obj->update('dm_client_personal',$data,'leadid='.$_GET['lead']);
	}

	if($_POST['passport_a']!="")
	{
		$data=array(
			'passport_a'=> $_POST['passport_a']);
		$obj->update('dm_client_personal',$data,'leadid='.$_GET['lead']);
	}

	if($_POST['passport_new_a']!="")
	{
		$data=array(
			'passport_new_a'=> $_POST['passport_new_a']);
		$obj->update('dm_client_personal',$data,'leadid='.$_GET['lead']);
	}

	if($_POST['pcc_a']!="")
	{
		$data=array(
			'pcc_a'=> $_POST['pcc_a']);
		$obj->update('dm_client_personal',$data,'leadid='.$_GET['lead']);
	}

	if($_POST['photo_a']!="")
	{
		$data=array(
			'photo_a'=> $_POST['photo_a']);
		$obj->update('dm_client_personal',$data,'leadid='.$_GET['lead']);
	}

	if($_POST['resume_a']!="")
	{
		$data=array(
			'resume_a'=> $_POST['resume_a']);
		$obj->update('dm_client_personal',$data,'leadid='.$_GET['lead']);
	}


	
header("location:ops_skill_canada.php?lead=".$_POST['lead']);

}


if(isset($_GET['docId']))
{
$d=$obj->display('dm_ops_documents','id='.$_GET['docId']);
$d1=$d->fetch_array();

unlink('uploads/documents/'.$d1['file']);

	$obj->delete('dm_ops_documents','id='.$_GET['docId']);

	header("location:ops_skill_canada.php?lead=".$_GET['lead']);

}



$ops=$obj->display('dm_ops_skill_canada','leadId='.$_GET['lead']);
$ops1=$ops->fetch_array();


$lead=$obj->display('dm_lead','id='.$_GET['lead']);
$lead1=$lead->fetch_array();
$pnp=$obj->display('dm_pnp','opsid='.$ops1['id']);


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
			<h3 class="mb-3">Final Skill Draft for Canada</h3> 
				<form action="" method="post" enctype="multipart/form-data" class="opeForm" >
					<input type="hidden" name="lead" value="<?php echo $_GET['lead'];?>" />
					<input type="hidden" name="opsId" value="<?php echo $ops1['id'];?>" />
					<?php print_r($opsId);?>
					
<ul class="nav nav-tabs">
  <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab1"><strong>Personal Details</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab2"><strong>ECA</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab3"><strong>Spouse ECA</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab4"><strong>Language<br /> Proficiancy</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab12"><strong>Language<br /> Proficiancy<br />(Spouse)</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab5"><strong>Express Entry</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab6"><strong>PnP</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab7"><strong>ITA</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab8"><strong>Visa Grant</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab9"><strong>Post Landing<br /> Service</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab10"><strong>Remark</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab11"><strong>Conversation</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab13"><strong>Document review</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab14"><strong>Status Update</strong></a></li>
</ul>

<div class="tab-content p-3 mb-3">

<div class="tab-pane active container" id="tab1">
<div class="row">
<div class="col-sm-4 form-group"><label>First Name</label><input type="text" class="form-control" id="fname" name="fname" value="<?php echo $lead1['fname'];?>" readonly=""></div>
<div class="col-sm-4 form-group"><label>Middle Name</label><input type="text" class="form-control" id="mname" name="mname" value="<?php echo $lead1['mname'];?>" readonly=""></div>
<div class="col-sm-4 form-group"><label>Family Name</label><input type="text" class="form-control" id="lname" name="lname" value="<?php echo $lead1['lname'];?>" readonly=""></div>
</div>
<div class="row">
<div class="col-sm-4 form-group"><label>Email</label><input type="text" readonly="" class="form-control" id="email" name="email" value="<?php echo $lead1['email'];?>" <?php if($_SESSION['ROLE']!=1) { echo 'readonly=""';} ?> ></div>
<div class="col-sm-4 form-group"><label>Landline</label><input type="text" class="form-control" id="phone" name="phone" value="<?php echo $lead1['phone'];?>"  readonly=""></div>
<div class="col-sm-4 form-group"><label>Cell No.</label><input type="text" readonly="" class="form-control" id="mobile" name="mobile" value="<?php echo $lead1['mobile'];?>" <?php if($_SESSION['ROLE']!=1) { echo 'readonly=""';} ?>  ></div>
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
$emp=$obj->display('dm_employee','id='.$lead1['Counsilor']);
$emp1=$emp->fetch_array();
?>	
			
	<div class="col-sm-4 form-group"><label>Counselor</label><input type="text" class="form-control" id="officer" name="officer" value="<?=$emp1['name'];?>"  readonly=""></div>
			
			
		
</div>
  	
  <div class="row" style="overflow:hidden">
	
  
	<div class="col-sm-4 form-group"><label >Date of retaintion</label><input type="text" class="form-control" id="retnDate" name="retnDate" value="<?php echo date('d-m-Y',strtotime($lead1['agreeDate']));?>" readonly=""  ></div>
	<div class="col-sm-4 form-group"><label >Agreement No</label><input type="text" class="form-control" id="agreeNo" name="agreeNo"  value="<?php $gh=$obj->display('dm_lead_contract','leadId='.$_GET['lead']); $gh1=$gh->fetch_array(); echo $gh1['id'];?>" readonly="">
	</div>

 <?php
$emp=$obj->display('dm_employee','id='.$lead1['assignTo']);
$emp1=$emp->fetch_array();
?>	
			
	<div class="col-sm-4 form-group"><label>Case Processing Officer</label><input type="text" class="form-control" id="officer" name="officer" value="<?=$emp1['name'];?>"  readonly=""></div> 

	</div>
 

  </div>
 
 <!--TAB2--> 
  
  <div class="tab-pane container" id="tab2">
  <div class="row" style="overflow:hidden">
  
	<div class="col-sm-4 form-group"><label>ECA Package received from client</label><input type="text" readonly="" class="form-control" id="ecaReceDate" name="ecaReceDate" value="<?php echo $ops1['ecaReceDate'];?>" ></div>
	<div class="col-sm-4 form-group"><label>Source</label>
	<select class="form-control" name="ecaPackage" readonly="">
		<option value="">Select</option>
		<option value="PA" <?php if($ops1['ecaPackage']=="PA") { echo 'selected="selected"';}?>>PA</option>
		<option value="Spouse" <?php if($ops1['ecaPackage']=="Spouse") { echo 'selected="selected"';}?>>Spouse</option>
		</select>
	</div>
	<div class="col-sm-4 form-group"><label>Documents status</label>
		<select class="form-control" name="ecaDocStatus" readonly="">
		<option value="">Select</option>
		<option value="Complete" <?php if($ops1['ecaDocStatus']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
		<option value="Pending" <?php if($ops1['ecaDocStatus']=="Pending") { echo 'selected="selected"';}?>>Pending</option>
		<option value="Yet not submitted" <?php if($ops1['ecaDocStatus']=="Yet not submitted") { echo 'selected="selected"';}?>>Yet not submitted</option>
		</select>

	</div>
	<div class="col-sm-4 form-group"><label>Assessment Body</label>
	<select class="form-control" name="ecaAssmBody" readonly="">
		<option value="">Select</option>
		<option value="WES" <?php if($ops1['ecaAssmBody']=="WES") { echo 'selected="selected"';}?>>WES</option>
		<option value="ICAS" <?php if($ops1['ecaAssmBody']=="ICAS") { echo 'selected="selected"';}?>>ICAS</option>
		<option value="IQAS" <?php if($ops1['ecaAssmBody']=="IQAS") { echo 'selected="selected"';}?>>IQAS</option>
		<option value="MCC" <?php if($ops1['ecaAssmBody']=="MCC") { echo 'selected="selected"';}?>>MCC</option>
		<option value="PECB" <?php if($ops1['ecaAssmBody']=="PECB") { echo 'selected="selected"';}?>>PECB</option>
		<option value="ICES" <?php if($ops1['ecaAssmBody']=="ICES") { echo 'selected="selected"';}?>>ICES</option>
		</select>
	</div>
	<div class="col-sm-4 form-group"><label>Date Applied</label><input type="text" readonly="" class="form-control" id="ecaApplyDate" name="ecaApplyDate" value="<?php echo $ops1['ecaApplyDate'];?>" ></div>
	<div class="col-sm-4 form-group"><label>Payment Mode</label>
	<select class="form-control" name="ecaPayMode" readonly="">
		<option value="">Select</option>
		<option value="Client Credit Card" <?php if($ops1['ecaPayMode']=="Client Credit Card") { echo 'selected="selected"';}?>>Client Credit Card</option>
		<option value="Company Credit Card" <?php if($ops1['ecaPayMode']=="Company Credit Card") { echo 'selected="selected"';}?>>Company Credit Card</option>
		</select>
	</div>

	<div class="col-sm-3 form-group"><label>Transcript sent</label>
	<select class="form-control" name="ecaTranSent" readonly="">
		<option value="">Select</option>
		<option value="Client" <?php if($ops1['ecaTranSent']=="Client") { echo 'selected="selected"';}?>>Client</option>
		<option value="Company" <?php if($ops1['ecaTranSent']=="Company") { echo 'selected="selected"';}?>>Company</option>
		</select>
	</div>
	<div class="col-sm-3 form-group"><label>Transcript Status</label>
	<select class="form-control" name="ecaTranStatus" readonly="">
		<option value="">Select</option>
		<option value="Accepted" <?php if($ops1['ecaTranStatus']=="Accepted") { echo 'selected="selected"';}?>>Accepted</option>
		<option value="Yet not submitted" <?php if($ops1['ecaTranStatus']=="Yet not submitted") { echo 'selected="selected"';}?>>Yet not submitted</option>
		<option value="Rejected" <?php if($ops1['ecaTranStatus']=="Rejected") { echo 'selected="selected"';}?>>Rejected</option>
		<option value="In process" <?php if($ops1['ecaTranStatus']=="In process") { echo 'selected="selected"';}?>>In process</option>
		<option value="Verification" <?php if($ops1['ecaTranStatus']=="Verification") { echo 'selected="selected"';}?>>Verification</option>
		</select>
	</div>
  <div class="col-sm-3 form-group"><label>Status</label>
	<select class="form-control" name="ecaStatus" readonly="">
		<option value="">Select</option>
		<option value="Pending" <?php if($ops1['ecaStatus']=="Pending") { echo 'selected="selected"';}?>>Pending</option>
		<option value="Completed" <?php if($ops1['ecaStatus']=="Completed") { echo 'selected="selected"';}?>>Completed</option>
		<option value="Insufficient" <?php if($ops1['ecaStatus']=="Insufficient") { echo 'selected="selected"';}?>>Insufficient</option>
		<option value="Registered" <?php if($ops1['ecaStatus']=="Registered") { echo 'selected="selected"';}?>>Registered</option>
		</select>
   </div>
  <div class="col-sm-3 form-group"><label>Date of Completion</label>
  <input type="text" class="form-control" id="compDate" readonly="" name="compDate" value="<?php echo $ops1['compDate'];?>" >
  </div></div>

<div class="row">
	<div class="col-sm-3 form-group"><label>Add Qualification</label>
	<select class="form-control" name="add_qualification" readonly="">
		<option value="">Select</option>
		<option value="High School" <?php if($ops1['qualification']=="High School") { echo 'selected="selected"';}?>>High School</option>
		<option value="Diploma" <?php if($ops1['qualification']=="Diploma") { echo 'selected="selected"';}?>>Diploma</option>
		<option value="Bachelors"<?php if($ops1['qualification']=="Bachelors") { echo 'selected="selected"';}?>>Bachelors</option>
		<option value="Masters" <?php if($ops1['qualification']=="Masters") { echo 'selected="selected"';}?>>Master's</option>
		<option value="PhD" <?php if($ops1['qualification']=="PhD") { echo 'selected="selected"';}?>>PhD</option>
	</select></div>
	<div class="col-sm-3 form-group"><label>Specialization</label>
		<input type="text" class="form-control" id="specialization" readonly="" name="Specialization" value="<?php echo $ops1['specialization'];?>">
	</div>
	<div class="col-sm-3 form-group"><label>University</label>
		<input type="text" class="form-control" id="university" name="University" readonly="" value="<?php echo $ops1['university'];?>">
	</div>
	<div class="col-sm-3 form-group"><label>Rating</label>
		<select class="form-control" name="rating" readonly="">
			<option value="+ve" <?php if($ops1['rating']=="+ve") { echo 'selected="selected"';}?>>+ve</option>
			<option value="-ve" <?php if($ops1['rating']=="-ve") { echo 'selected="selected"';}?>>-ve</option>
		</select></div>
	</div>

	
  <div class="col-sm-4 form-group"><label>Document File </label>
  <!-- <input type="file" class="form-control" id="ecaFile" name="ecaFile" readonly=""> -->
  </div>
   <?php 
   if($ops->num_rows > 0)
   {
   $doc=$obj->display('dm_ops_documents','tab=1 and leadId='.$_GET['lead'].' and opsId='.$ops1['id']);
   while($doc1=$doc->fetch_array())
   {
   ?>
  <div class="row" style="overflow:hidden">
 	<div class="col-sm-6"><a href="uploads/documents/<?=$doc1['file'];?>" target="_blank"><?php echo $doc1['file'];?></a></div>
	<div class="col-sm-3"><a href="ops_skill_canada.php?docId=<?php echo $doc1['id'];?>&lead=<?php echo $_GET['lead'];?>">Delete</a></div>
  </div>
  <?php } }?>
  	
  </div>
  
  
  

 <!--TAB3--> 

  <div class="tab-pane container" id="tab3">
  
  <div class="row" style="overflow:hidden">
  <div class="col-sm-4 form-group"><label >Spouse Qualification</label>
	  <input type="text" class="form-control" id="spQualify" readonly="" name="spQualify" value="<?php echo $ops1['spQualify'];?>" >
   </div>
  
	<div class="col-sm-4 form-group"><label>ECA Package received from client</label><input type="text" readonly="" class="form-control" id="specaReceDate" name="specaReceDate" value="<?php echo $ops1['specaReceDate'];?>" ></div>
	<div class="col-sm-4 form-group"><label>Source</label>
	<select class="form-control" readonly="" name="specaPackage">
		<option value="">Select</option>
		<option value="PA" <?php if($ops1['specaPackage']=="PA") { echo 'selected="selected"';}?>>PA</option>
		<option value="Spouse" <?php if($ops1['specaPackage']=="Spouse") { echo 'selected="selected"';}?>>Spouse</option>
		</select>
	</div>
	<div class="col-sm-4 form-group"><label>Documents status</label>
		<select class="form-control" readonly="" name="specaDocStatus">
		<option value="">Select</option>
		<option value="Complete" <?php if($ops1['specaDocStatus']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
		<option value="Pending" <?php if($ops1['specaDocStatus']=="Pending") { echo 'selected="selected"';}?>>Pending</option>
		<option value="Yet not submitted" <?php if($ops1['specaDocStatus']=="Yet not submitted") { echo 'selected="selected"';}?>>Yet not submitted</option>
		</select>

	</div>
	<div class="col-sm-4 form-group"><label>Assessment Body</label>
	<select class="form-control" readonly="" name="specaAssmBody">
		<option value="">Select</option>
		<option value="WES" <?php if($ops1['specaAssmBody']=="WES") { echo 'selected="selected"';}?>>WES</option>
		<option value="ICAS" <?php if($ops1['specaAssmBody']=="ICAS") { echo 'selected="selected"';}?>>ICAS</option>
		<option value="IQAS" <?php if($ops1['specaAssmBody']=="IQAS") { echo 'selected="selected"';}?>>IQAS</option>
		<option value="MCC" <?php if($ops1['specaAssmBody']=="MCC") { echo 'selected="selected"';}?>>MCC</option>
		<option value="PECB" <?php if($ops1['specaAssmBody']=="PECB") { echo 'selected="selected"';}?>>PECB</option>
		<option value="ICES" <?php if($ops1['specaAssmBody']=="ICES") { echo 'selected="selected"';}?>>ICES</option>
		</select>
	</div>
	<div class="col-sm-4 form-group"><label>Date Applied</label><input type="text" readonly="" class="form-control" id="specaApplyDate" name="specaApplyDate" value="<?php echo $ops1['specaApplyDate'];?>" ></div>
	<div class="col-sm-4 form-group"><label>Payment Mode</label>
	<select class="form-control" readonly="" name="specaPayMode">
		<option value="">Select</option>
		<option value="Client Credit Card" <?php if($ops1['specaPayMode']=="Client Credit Card") { echo 'selected="selected"';}?>>Client Credit Card</option>
		<option value="Company Credit Card" <?php if($ops1['specaPayMode']=="Company Credit Card") { echo 'selected="selected"';}?>>Company Credit Card</option>
		</select>
	</div>

	<div class="col-sm-3 form-group"><label>Transcript sent</label>
	<select class="form-control" readonly="" name="specaTranSent">
		<option value="">Select</option>
		<option value="Client" <?php if($ops1['specaTranSent']=="Client") { echo 'selected="selected"';}?>>Client</option>
		<option value="Company" <?php if($ops1['specaTranSent']=="Company") { echo 'selected="selected"';}?>>Company</option>
		</select>
	</div>
	<div class="col-sm-3 form-group"><label>Transcript Status</label>
	<select class="form-control" name="specaTranStatus" readonly="">
		<option value="">Select</option>
		<option value="Accepted" <?php if($ops1['specaTranStatus']=="Accepted") { echo 'selected="selected"';}?>>Accepted</option>
		<option value="Yet not submitted" <?php if($ops1['specaTranStatus']=="Yet not submitted") { echo 'selected="selected"';}?>>Yet not submitted</option>
		<option value="Rejected" <?php if($ops1['specaTranStatus']=="Rejected") { echo 'selected="selected"';}?>>Rejected</option>
		</select>
	</div>
  <div class="col-sm-3 form-group"><label >Status</label>
	<select class="form-control" name="specaStatus" readonly="">
		<option value="">Select</option>
		<option value="Pending" <?php if($ops1['specaStatus']=="Pending") { echo 'selected="selected"';}?>>Pending</option>
		<option value="Completed" <?php if($ops1['specaStatus']=="Completed") { echo 'selected="selected"';}?>>Completed</option>
		<option value="Insufficient" <?php if($ops1['specaStatus']=="Insufficient") { echo 'selected="selected"';}?>>Insufficient</option>
		<option value="Registered" <?php if($ops1['specaStatus']=="Registered") { echo 'selected="selected"';}?>>Registered</option>
		</select>

   </div>
  <div class="col-sm-3 form-group"><label >Date of Completion</label>
  <input type="text" class="form-control" id="spcompDate" readonly="" name="spcompDate" value="<?php echo $ops1['spcompDate'];?>" >
  </div>
	
 <div class="col-sm-3 form-group"><label>Document File <?php if($ops1['spEcaFile']!="") {?> <a href="uploads/documents/<?=$ops1['spEcaFile'];?>" target="_blank" style="float:right">View</a><?php }?></label>
  <!-- <input type="file" class="form-control" id="spEcaFile" name="spEcaFile" readonly="" > -->
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
 	<div class="col-sm-6"><a href="uploads/documents/<?=$doc1['file'];?>" target="_blank"><?php echo $doc1['file'];?></a></div>
	<div class="col-sm-3"><a href="ops_skill_canada.php?docId=<?php echo $doc1['id'];?>&lead=<?php echo $_GET['lead'];?>">Delete</a></div>
  </div>
  <?php } }?>
  	
  </div>
  
   <!--TAB4--> 

  
  <div class="tab-pane container" id="tab4">
  <div class="row" style="overflow:hidden">
  <div class="col-sm-4 form-group"><label >Language Test</label>
	<select class="form-control" name="langTest" readonly="">
		<option value="">Select</option>
		<option value="IELTS(AT)" <?php if($ops1['langTest']=="IELTS(AT)") { echo 'selected="selected"';}?>>IELTS(AT)</option>
		<option value="IELTS(GT)" <?php if($ops1['langTest']=="IELTS(GT)") { echo 'selected="selected"';}?>>IELTS(GT)</option>
		<option value="PTE" <?php if($ops1['langTest']=="PTE") { echo 'selected="selected"';}?>>PTE</option>
		<option value="TOEFL(iBT)" <?php if($ops1['langTest']=="TOEFL(iBT)") { echo 'selected="selected"';}?>>TOEFL(iBT)</option>
		<option value="OET" <?php if($ops1['langTest']=="OET") { echo 'selected="selected"';}?>>OET</option>
		<option value="CAE" <?php if($ops1['langTest']=="CAE") { echo 'selected="selected"';}?>>CAE</option>
		<option value="CELPIP" <?php if($ops1['langTest']=="CELPIP") { echo 'selected="selected"';}?>>CELPIP</option>
		</select>
	</div>		
  <div class="col-sm-4 form-group"><label >Status</label>
	<select class="form-control" name="testStatus" readonly="">
		<option value="">Select</option>
		<option value="Pending" <?php if($ops1['testStatus']=="Pending") { echo 'selected="selected"';}?>>Pending</option>
		<option value="Completed" <?php if($ops1['testStatus']=="Completed") { echo 'selected="selected"';}?>>Completed</option>
		<option value="Insufficient" <?php if($ops1['testStatus']=="Insufficient") { echo 'selected="selected"';}?>>Insufficient</option>
		<option value="Registered" <?php if($ops1['testStatus']=="Registered") { echo 'selected="selected"';}?>>Registered</option>
		</select>
	</div>		
	<div class="col-sm-4 form-group"><label>Expiry Date </label><input type="text" readonly="" class="form-control" id="expiryDate" name="expiryDate" value="<?php echo $ops1['expiryDate'];?>" ></div>
  </div>


  <div class="row" style="overflow:hidden">
  <div class="col-sm-3 form-group"><label>Reading</label><input type="text" readonly="" class="form-control" id="reading" name="reading" value="<?php echo $ops1['reading'];?>" ></div>
  <div class="col-sm-3 form-group"><label>Writing</label><input type="text" readonly="" class="form-control" id="writing" name="writing" value="<?php echo $ops1['writing'];?>" ></div>
  <div class="col-sm-3 form-group"><label>Listening</label><input type="text" readonly="" class="form-control" id="listening" name="listening" value="<?php echo $ops1['listening'];?>" ></div>
  <div class="col-sm-3 form-group"><label>Speaking</label><input type="text" readonly="" class="form-control" id="speaking" name="speaking" value="<?php echo $ops1['speaking'];?>" ></div>
 </div>

    <div class="row" style="overflow:hidden">
	<div class="col-sm-4 form-group"><label>Test Date </label><input type="text" readonly="" class="form-control" id="testDate" name="testDate" value="<?php echo $ops1['testDate'];?>" ></div>
	<div class="col-sm-4 form-group"><label>Test Score </label><input type="text" readonly="" class="form-control" id="testScore" name="testScore" value="<?php echo $ops1['testScore'];?>" ></div>
	<div class="col-sm-4 form-group"><label>Meeting Requirement</label>
	<select class="form-control" name="mreq" readonly="">
		<option value="">Select</option>
		<option value="YES" <?php if($ops1['meetingreq']=="YES") { echo 'selected="selected"';}?>>YES</option>
		<option value="NO" <?php if($ops1['meeting']=="NO") { echo 'selected="selected"';}?>>NO</option>
	</select>
    </div>	
	<div class="col-sm-3 form-group"><label>Document File <?php if($ops1['langFile']!="") {?> <a href="uploads/documents/<?=$ops1['langFile'];?>" target="_blank" style="float:right">View</a><?php }?></label>
  <!-- <input type="file" class="form-control" id="langFile" name="langFile" > -->
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
 	<div class="col-sm-6"><a href="uploads/documents/<?=$doc1['file'];?>" target="_blank"><?php echo $doc1['file'];?></a></div>
	<div class="col-sm-3"><a href="ops_skill_canada.php?docId=<?php echo $doc1['id'];?>&lead=<?php echo $_GET['lead'];?>">Delete</a></div>
  </div>
  <?php }} ?>
	
	
  </div>


<!--TAB12-->

<div class="tab-pane container" id="tab12">
  <div class="row" style="overflow:hidden">
  <div class="col-sm-4 form-group"><label >Language Test (spouse)</label>
	<select class="form-control" name="langTestS" readonly="">
		<option value="">Select</option>
		<option value="IELTS(AT)" <?php if($ops1['spLangTest']=="IELTS(AT)") { echo 'selected="selected"';}?>>IELTS(AT)</option>
		<option value="IELTS(GT)" <?php if($ops1['spLangTest']=="IELTS(GT)") { echo 'selected="selected"';}?>>IELTS(GT)</option>
		<option value="PTE" <?php if($ops1['spLangTest']=="PTE") { echo 'selected="selected"';}?>>PTE</option>
		<option value="TOEFL(iBT)" <?php if($ops1['spLangTest']=="TOEFL(iBT)") { echo 'selected="selected"';}?>>TOEFL(iBT)</option>
		<option value="OET" <?php if($ops1['spLangTest']=="OET") { echo 'selected="selected"';}?>>OET</option>
		<option value="CAE" <?php if($ops1['spLangTest']=="CAE") { echo 'selected="selected"';}?>>CAE</option>
		<option value="CELPIP" <?php if($ops1['spLangTest']=="CELPIP") { echo 'selected="selected"';}?>>CELPIP</option>
		</select>
	</div>		
  <div class="col-sm-4 form-group"><label >Status</label>
	<select class="form-control" name="testStatusS" readonly="">
		<option value="">Select</option>
		<option value="Pending" <?php if($ops1['statusS']=="Pending") { echo 'selected="selected"';}?>>Pending</option>
		<option value="Completed" <?php if($ops1['statusS']=="Completed") { echo 'selected="selected"';}?>>Completed</option>
		<option value="Insufficient" <?php if($ops1['statusS']=="Insufficient") { echo 'selected="selected"';}?>>Insufficient</option>
		<option value="Registered" <?php if($ops1['statusS']=="Registered") { echo 'selected="selected"';}?>>Registered</option>
		</select>
	</div>		
	<div class="col-sm-4 form-group"><label>Expiry Date </label><input type="text" readonly="" class="form-control" id="expiryDateS" name="expiryDateS" value="<?php echo $ops1['expirydateS'];?>"></div>
  </div>


  <div class="row" style="overflow:hidden">
  <div class="col-sm-3 form-group"><label>Reading</label><input type="text" class="form-control" readonly="" id="reading" name="readingS" value="<?php echo $ops1['readingS'];?>" ></div>
  <div class="col-sm-3 form-group"><label>Writing</label><input type="text" class="form-control" readonly="" id="writing" name="writingS" value="<?php echo $ops1['writingS'];?>" ></div>
  <div class="col-sm-3 form-group"><label>Listening</label><input type="text" class="form-control" readonly="" id="listening" name="listeningS" value="<?php echo $ops1['listeningS'];?>" ></div>
  <div class="col-sm-3 form-group"><label>Speaking</label><input type="text" class="form-control" readonly="" id="speaking" name="speakingS" value="<?php echo $ops1['speakingS'];?>" ></div>
 </div>

    <div class="row" style="overflow:hidden">
	<div class="col-sm-4 form-group"><label>Test Date </label><input type="text" readonly="" class="form-control" id="testDateS" name="testDateS" value="<?php echo $ops1['testdateS'];?>" ></div>
	<div class="col-sm-4 form-group"><label>Test Score </label><input type="text" readonly="" class="form-control" id="testScore" name="testScoreS" value="<?php echo $ops1['testscoreS'];?>" ></div>
	<div class="col-sm-4 form-group"><label>Meeting Requirement</label>
	<select class="form-control" name="mreqS" readonly="">
		<option value="">Select</option>
		<option value="YES" <?php if($ops1['meetingreqS']=="YES") { echo 'selected="selected"';}?>>YES</option>
		<option value="NO" <?php if($ops1['meetingreqS']=="NO") { echo 'selected="selected"';}?>>NO</option>
	</select>
    </div>	
	<div class="col-sm-3 form-group"><label>Document File <?php if($ops1['langFileS']!="") {?> <a href="uploads/documents/<?=$ops1['langFileS'];?>" target="_blank" style="float:right">View</a><?php }?></label>
  <!-- <input type="file" class="form-control" id="langFile" readonly="" name="langFileS" > -->
  </div>		
	</div>
	
	 <?php 
   if($ops->num_rows > 0)
   {
   $doc=$obj->display('dm_ops_documents','tab=12 and leadId='.$_GET['lead'].' and opsId='.$ops1['id']);
   while($doc1=$doc->fetch_array())
   {
   ?>
  <div class="row" style="overflow:hidden">
 	<div class="col-sm-6"><a href="uploads/documents/<?=$doc1['file'];?>" target="_blank"><?php echo $doc1['file'];?></a></div>
	<div class="col-sm-3"><a href="ops_skill_canada.php?docId=<?php echo $doc1['id'];?>&lead=<?php echo $_GET['lead'];?>">Delete</a></div>
  </div>
  <?php }} ?>
	
	
  </div>



 <!--TAB5--> 


  <div class="tab-pane container" id="tab5">
  
  <div class="row" style="overflow:hidden">
  <div class="col-sm-4 form-group"><label>Documents Received </label>
	  <input type="text" readonly="" class="form-control" id="eeDocReceDate" name="eeDocReceDate" value="<?php echo $ops1['eeDocReceDate'];?>" >
  </div>
  <div class="col-sm-4 form-group"><label>Document Status</label>
	   <select class="form-control" readonly="" name="eeDocSts" id="eeDocSts">
		<option value="">Select</option>
		<option value="Complete" <?php if($ops1['eeDocSts']=="Complete") { echo 'selected="selected"';}?>>Complete</option>
		<option value="Incomplete" <?php if($ops1['eeDocSts']=="Incomplete") { echo 'selected="selected"';}?>>Incomplete</option>
	</select>
  </div>
  <div class="col-sm-4 form-group"><label>Point Claimed in FSWP</label>
	  <input type="text" class="form-control" readonly="" id="eePoint" name="eePoint" value="<?php echo $ops1['eePoint'];?>" >
   </div>
  <div class="col-sm-4 form-group"><label>NOC confirmed by client</label>
  <input type="text" class="form-control" id="eeNoc" readonly="" name="eeNoc" value="<?php echo $ops1['eeNoc'];?>" >
  </div>
  <div class="col-sm-4 form-group"><label>Profile launched</label>
  <input type="text" class="form-control" id="eeProfLauDate" readonly="" name="eeProfLauDate" value="<?php echo $ops1['eeProfLauDate'];?>" >
  </div>
  <div class="col-sm-4 form-group"><label >Profile Expiry </label>
  <input type="text" class="form-control" id="eeProfExpDate" readonly="" name="eeProfExpDate" value="<?php echo $ops1['eeProfExpDate'];?>" >
  </div>
  <div class="col-sm-4 form-group"><label >CRS scores</label>
  <input type="text" readonly="" class="form-control" id="eeScore" name="eeScore" value="<?php echo $ops1['eeScore'];?>" >
  </div>
	<div class="col-sm-3 form-group"><label>Document File <?php if($ops1['eeFile']!="") {?> <a href="uploads/documents/<?=$ops1['eeFile'];?>" target="_blank" style="float:right">View</a><?php }?></label>
  <!-- <input type="file" class="form-control" id="eeFile" name="eeFile" > -->
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
  
   <!--tab6--> 

  <div class="tab-pane container" id="tab6">
  	<input type="hidden" name="pnpid" value="<?php echo $pnp1['id'];?>"	 />
  	<?php
  	if($pnp->num_rows>0)
  	{
  		$p=1;
  	while($pnp1=$pnp->fetch_array())
  	{
  		$p++;
  		?>
  		<div class="row" style="overflow:hidden" id="pnpbodyD">
  <div class="col-sm-3 form-group"><label >PNP launched</label>
	  <select readonly="" class="update" data-id="<?=$pnp1['id']?>" data-column="pnp" name="pnpLaunD<?=$p?>">
		<option value="">Select</option>
		<option value="PEI" <?php if($pnp1['pnp']=="PEI") { echo 'selected="selected"';}?>>PEI</option>
		<option value="Nova Soctia" <?php if($pnp1['pnp']=="Nova Soctia") { echo 'selected="selected"';}?>>Nova Soctia</option>
		<option value="New Brwunscwick" <?php if($pnp1['pnp']=="New Brwunscwick") { echo 'selected="selected"';}?>>New Brwunscwick</option>
		<option value="Saskatchewan" <?php if($pnp1['pnp']=="Saskatchewan") { echo 'selected="selected"';}?>>Saskatchewan</option>
		<option value="Quebec" <?php if($pnp1['pnp']=="Quebec") { echo 'selected="selected"';}?>>Quebec</option>
		<option value="Modern" <?php if($pnp1['pnp']=="Modern") { echo 'selected="selected"';}?>>Modern</option>
		<option value="Manitoba" <?php if($pnp1['pnp']=="Manitoba") { echo 'selected="selected"';}?>>Manitoba</option>
		<option value="Ontario" <?php if($pnp1['pnp']=="Ontario") { echo 'selected="selected"';}?>>Ontario</option>
		<option value="British Columbia" <?php if($pnp1['pnp']=="British Columbia") { echo 'selected="selected"';}?>>British Columbia</option>
		<option value="Alberta" <?php if($pnp1['pnp']=="Alberta") { echo 'selected="selected"';}?>>Alberta</option>
		<option value="Yukon" <?php if($pnp1['pnp']=="Yukon") { echo 'selected="selected"';}?>>Yukon</option>
		<option value="Newfoundland & Labrador" <?php if($pnp1['pnp']=="Newfoundland & Labrador") { echo 'selected="selected"';}?>>Newfoundland & Labrador </option>
	</select>

   </div>
  <div class="col-sm-3 form-group"><label >Submission Date</label>
  <input type="text" readonly="" class="update" data-id="<?=$pnp1['id']?>" data-column="subdate" name="pnpSubDateD<?=$p?>" value="<?php echo $pnp1['subdate'];?>" >
  </div>
  <div class="col-sm-3 form-group"><label >Expiry Date</label>
  <input type="text" readonly="" class="update" data-id="<?=$pnp1['id']?>" data-column="expdate" name="pnpExpDateD<?=$p?>" value="<?php echo $pnp1['expdate'];?>" >
  </div>
  <div class="col-sm-3 form-group"><label >STATUS</label>
	  <select class="update" readonly="" data-id="<?=$pnp1['id']?>" data-column="status" name="pnpStatusD<?=$p?>" id="pnpStatus">
		<option value="">Select</option>
		<option value="IN PROGRESS" <?php if($pnp1['status']=="IN PROGRESS") { echo 'selected="selected"';}?>>IN PROGRESS</option>
		<option value="APPROVED" <?php if($pnp1['status']=="APPROVED") { echo 'selected="selected"';}?>>APPROVED</option>
		<option value="REJECTED" <?php if($pnp1['status']=="REJECTED") { echo 'selected="selected"';}?>>REJECTED</option>
	</select>
	<!-- <button onclick="add_a_row()" type="button" class=""> Add New </button> -->
   </div>
   </div><?php }}?>

  <div class="row" style="overflow:hidden" id="pnpbody">
  <div class="col-sm-3 form-group"><label >PNP launched</label>
	  <select class="form-control" readonly="" name="pnpLaun">
		<option value="">Select</option>
		<option value="PEI" <?php if($pnp1['pnp']=="PEI") { echo 'selected="selected"';}?>>PEI</option>
		<option value="Nova Soctia" <?php if($pnp1['pnp']=="Nova Soctia") { echo 'selected="selected"';}?>>Nova Soctia</option>
		<option value="New Brwunscwick" <?php if($pnp1['pnp']=="New Brwunscwick") { echo 'selected="selected"';}?>>New Brwunscwick</option>
		<option value="Saskatchewan" <?php if($pnp1['pnp']=="Saskatchewan") { echo 'selected="selected"';}?>>Saskatchewan</option>
		<option value="Quebec" <?php if($pnp1['pnp']=="Quebec") { echo 'selected="selected"';}?>>Quebec</option>
		<option value="Modern" <?php if($pnp1['pnp']=="Modern") { echo 'selected="selected"';}?>>Modern</option>
		<option value="Manitoba" <?php if($pnp1['pnp']=="Manitoba") { echo 'selected="selected"';}?>>Manitoba</option>
		<option value="Ontario" <?php if($pnp1['pnp']=="Ontario") { echo 'selected="selected"';}?>>Ontario</option>
		<option value="British Columbia" <?php if($pnp1['pnp']=="British Columbia") { echo 'selected="selected"';}?>>British Columbia</option>
		<option value="Alberta" <?php if($pnp1['pnp']=="Alberta") { echo 'selected="selected"';}?>>Alberta</option>
		<option value="Yukon" <?php if($pnp1['pnp']=="Yukon") { echo 'selected="selected"';}?>>Yukon</option>
		<option value="Newfoundland & Labrador" <?php if($pnp1['pnp']=="Newfoundland & Labrador") { echo 'selected="selected"';}?>>Newfoundland & Labrador </option>
	</select>

   </div>
  <div class="col-sm-3 form-group"><label >Submission Date</label>
  <input type="text" class="form-control" readonly="" id="pnpSubDate" name="pnpSubDate" value="<?php echo $pnp1['subdate'];?>" >
  </div>
  <div class="col-sm-3 form-group"><label >Expiry Date</label>
  <input type="text" class="form-control" readonly=""  id="pnpExpDate" name="pnpExpDate" value="<?php echo $pnp1['expdate'];?>" >
  </div>
  <div class="col-sm-3 form-group"><label >STATUS</label>
	  <select class="form-control" name="pnpStatus" readonly="" id="pnpStatus">
		<option value="">Select</option>
		<option value="IN PROGRESS" <?php if($pnp1['status']=="IN PROGRESS") { echo 'selected="selected"';}?>>IN PROGRESS</option>
		<option value="APPROVED" <?php if($pnp1['status']=="APPROVED") { echo 'selected="selected"';}?>>APPROVED</option>
		<option value="REJECTED" <?php if($pnp1['status']=="REJECTED") { echo 'selected="selected"';}?>>REJECTED</option>
	</select>
	<!-- <button onclick="add_a_row()" type="button" class=""> Add New </button> -->
   </div>
   </div> 
	<div class="col-sm-3 form-group"><label>Document File <?php if($ops1['pnpFile']!="") {?> <a href="uploads/documents/<?=$ops1['pnpFile'];?>" target="_blank" style="float:right">View</a><?php }?></label>
  <!-- <input type="file" class="form-control" id="pnpFile" name="pnpFile" > -->
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
  
   <!--TAB7--> 


  <div class="tab-pane container" id="tab7">
    <div class="row" style="overflow:hidden">
	
	  <div class="col-sm-4 form-group"><label>ITA RECEIVED DATE</label>
 		 <input type="text" readonly="" class="form-control" id="itaReceDate" name="itaReceDate" value="<?php echo $ops1['itaReceDate'];?>" >
	  </div>
	
	  <div class="col-sm-4 form-group"><label>LAST DATE OF SUBMISSION</label>
 		 <input type="text" readonly="" class="form-control" id="itaSubLastDate" name="itaSubLastDate" value="<?php echo $ops1['itaSubLastDate'];?>" >
	  </div>

	  <div class="col-sm-4 form-group"><label>DOCUMENTS RECEIVED FROM CLIENT</label>
 		 <input type="text" readonly="" class="form-control" id="itaDocReceDate" name="itaDocReceDate" value="<?php echo $ops1['itaDocReceDate'];?>" >
	  </div>
  <div class="col-sm-4 form-group"><label >DOCUMENTS STATUS</label>
	  <select class="form-control" readonly="" name="itaDocSts">
		<option value="">Select</option>
		<option value="In Completed" <?php if($ops1['itaDocSts']=="In Completed") { echo 'selected="selected"';}?>>In Completed</option>
		<option value="Completed" <?php if($ops1['itaDocSts']=="Completed") { echo 'selected="selected"';}?>>Completed</option>
	</select>

   </div>  
	  <div class="col-sm-4 form-group"><label>ITA SUBMISSION DATE</label>
 		 <input type="text" class="form-control" readonly="" id="itaSubDate" name="itaSubDate" value="<?php echo $ops1['itaSubDate'];?>" >
	  </div>
  <div class="col-sm-4 form-group"><label >ITA STATUS</label>
	  <select class="form-control" name="itaSts" readonly="">
		<option value="">Select</option>
		<option value="IN PROGRESS" <?php if($ops1['itaSts']=="IN PROGRESS") { echo 'selected="selected"';}?>>IN PROGRESS</option>
		<option value="APPROVED" <?php if($ops1['itaSts']=="APPROVED") { echo 'selected="selected"';}?>>APPROVED</option>
		<option value="REJECTED" <?php if($ops1['itaSts']=="REJECTED") { echo 'selected="selected"';}?>>REJECTED</option>
		<option value="DECLINED" <?php if($ops1['itaSts']=="DECLINED") { echo 'selected="selected"';}?>>DECLINED</option>
	</select>

   </div>  

	  <div class="col-sm-4 form-group"><label>ADDITIONAL REQUIREMENT SENT TO CLIENT</label>
 		 <input type="text" class="form-control" readonly="" id="itaAddiReqDate" name="itaAddiReqDate" value="<?php echo $ops1['itaAddiReqDate'];?>" >
	  </div>

	<div class="col-sm-3 form-group"><label>Document File <?php if($ops1['itaFile']!="") {?> <a href="uploads/documents/<?=$ops1['itaFile'];?>" target="_blank" style="float:right">View</a><?php }?>
	</label>
  <!-- <input type="file" class="form-control" id="itaFile" name="itaFile"> -->
  </div>
  <div class="col-sm-12 form-group">
							<?php
							echo "<p>".$ops1['comments'].'-'.date('d/m/Y').'<p>';
							?>
</div>
	<div class="col-sm-12 form-group"><label>Comments</label><textarea type="text" readonly="" class="form-control" id="comments" name="comments"></textarea></div>	
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
  
   <!--TAB8--> 

  
  <div class="tab-pane container" id="tab8">
     <div class="row" style="overflow:hidden">
	  <div class="col-sm-4 form-group"><label>REQUEST LETTER RECEIVED </label>
 		 <input type="text" class="form-control" id="visaReqDate" name="visaReqDate" readonly="" value="<?php echo $ops1['visaReqDate'];?>" >
	  </div>
	  	  <div class="col-sm-4 form-group"><label>PASSPORT SENT TO EMBASSY</label>
 		 <input type="text" class="form-control" id="passSentDate" name="passSentDate" readonly="" value="<?php echo $ops1['passSentDate'];?>" >
	  </div>
	  	  <div class="col-sm-4 form-group"><label>PASSPORT RECEIVED FROM EMBASSY</label>
 		 <input type="text" class="form-control" id="passReceDate" name="passReceDate" readonly="" value="<?php echo $ops1['passReceDate'];?>" >
	  </div>	
	  <div class="col-sm-3 form-group"><label>Document File <?php if($ops1['visaFile']!="") {?> <a href="uploads/documents/<?=$ops1['visaFile'];?>" target="_blank" style="float:right">View</a><?php }?></label>
  <!-- <input type="file" class="form-control" id="visaFile" name="visaFile" > -->
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
  
     <!--TAB9--> 

  <div class="tab-pane container" id="tab9">
       <div class="row" style="overflow:hidden">
	  	  <div class="col-sm-3 form-group"><label>DATE OF LANDING IN CANADA</label>
 		 <input type="text" class="form-control" id="landDate" name="landDate" readonly="" value="<?php echo $ops1['landDate'];?>" >
		  </div>
 	  	  <div class="col-sm-9 form-group"><label>PLS SERVICES</label> 
		  <input type="checkbox" readonly="" name="landService[]" /> PICK UP &nbsp;&nbsp;&nbsp;
		  <input type="checkbox" readonly="" name="landService[]" /> ACCOMODATION &nbsp;&nbsp;&nbsp;
		  <input type="checkbox" readonly="" name="landService[]"/> JOB ASSISTANCE &nbsp;&nbsp;&nbsp;
		  <input type="checkbox" readonly="" name="landService[]"/> OTHER SERVICES
		  
		  </div>
		  
		   <div class="col-sm-3 form-group"><label>Document File <?php if($ops1['landFile']!="") {?> <a href="uploads/documents/<?=$ops1['landFile'];?>" target="_blank" style="float:right">View</a><?php }?></label>
  			<!-- <input type="file" class="form-control" id="landFile" name="landFile" > -->
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
  <?php } }?>

  </div>

   <!--TAB10--> 


  <div class="tab-pane container" id="tab10">
       <div class="row" style="overflow:hidden">
<div class="col-sm-12 form-group">
<?php 
				$rem=$obj->display('dm_lead_remark','lead='.$_GET["lead"]); while($rem1=$rem->fetch_array()) 
				{
						echo "<p>".$rem1['remark'].'-'.date('d/m/Y',strtotime($rem1['date'])).'<p>';
				}
?>
</div>
	   <div class="col-sm-12 form-group"><label>Remark</label><textarea type="text" readonly="" class="form-control" id="remark" name="remark"></textarea></div>
	   </div>

  </div>


   <!--TAB11-->


  <div class="tab-pane container" id="tab11">
  	<div class="row" style="overflow:hidden">
  		<div class="col-sm-3 form-group"><label>Type of Conversation</label>
	<select class="form-control" name="conversation_type">
		<option value="">Select</option>
		<option value="Walk-in">Walk-in</option>
		<option value="Inbound">Inbound</option>
		<option value="Outbound">Outbound</option>
	</select>
	</div>
	</div>	
  <div class="row" style="overflow:hidden">
  	<div class="col-sm-12 form-group">
<?php 
				$conv=$obj->display('dm_ops_conversation','leadid='.$_GET["lead"]);
				 while($conv1=$conv->fetch_array()) 
				{
						echo "<p>".$conv1['type'].'-'.$conv1['conversation'].'-'.$conv1['date'].'<p>';
				}
?>
</div>
	   <div class="col-sm-12 form-group"><label>Conversation</label><textarea type="text" class="form-control" id="conversation" name="conversation"></textarea></div>
	</div>
    </div>

     <!--TAB13--> 

    <div class="tab-pane container" id="tab13">
    	<?php 
    	$up=$op=$obj->display('dm_client_personal',"leadid=".$_GET['lead']);
        $up1=$up->fetch_array();
        ?>
        <?php if($up1['copr']!="")
        { 
        ?>
    	<div class="row">
                  <a href="uploads/clientdocs/<?php echo $up1['copr']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">COPR-<?php echo $up1['copr']; ?></span>
                  </a>
                  <div class="col-sm-3 form-group">
                  <select class="form-control" name="copr_a">
		<option value="">Select</option>
		<option value="1" <?php if($up1['copr_a']=="1"){echo "selected";} ?>>Approved</option>
		<option value="0" <?php if($up1['copr_a']=="0"){echo "selected";} ?>>rejected</option>
	</select>
                 </div></div>
                 <?php } ?>

                 <?php if($up1['vphoto']!="")
        { 
        ?>
                 <div class="row">
                  <a href="uploads/clientdocs/<?php echo $up1['vphoto']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Visa photo-<?php echo $up1['vphoto']; ?></span>
                  </a>
                  <div class="col-sm-3 form-group">
                  <select class="form-control" name="vphoto_a">
		<option value="">Select</option>
		<option value="1" <?php if($up1['vphoto_a']=="1"){echo "selected";} ?>>Approved</option>
		<option value="0" <?php if($up1['vphoto_a']=="0"){echo "selected";} ?>>rejected</option>
	</select>
                 </div></div>

<?php } ?>

<?php if($up1['final_visa_docfb']!="")
        { 
        ?>
                 <div class="row">
                  <a href="uploads/clientdocs/<?php echo $up1['final_visa_docfb']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Final Visa Document FB-<?php echo $up1['final_visa_docfb']; ?></span>
                  </a>
                  <div class="col-sm-3 form-group">
                  <select class="form-control" name="final_visa_docfb_a">
		<option value="">Select</option>
		<option value="1" <?php if($up1['final_visa_docfb_a']=="1"){echo "selected";} ?>>Approved</option>
		<option value="0" <?php if($up1['final_visa_docfb_a']=="0"){echo "selected";} ?>>rejected</option>
	</select>
                 </div></div>

<?php } ?>

<?php if($up1['final_visa_docfull']!="")
        { 
        ?>
                 <div class="row">
                  <a href="uploads/clientdocs/<?php echo $up1['final_visa_docfull']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Final Visa Document Full-<?php echo $up1['final_visa_docfull']; ?></span>
                  </a>
                  <div class="col-sm-3 form-group">
                  <select class="form-control" name="final_visa_docfull_a">
		<option value="">Select</option>
		<option value="1" <?php if($up1['final_visa_docfull_a']=="1"){echo "selected";} ?>>Approved</option>
		<option value="0" <?php if($up1['final_visa_docfull_a']=="0"){echo "selected";} ?>>rejected</option>
	</select>
                 </div></div>

<?php } ?>

<?php if($up1['mcert_re']!="")
        { 
        ?>
                 <div class="row">
                  <a href="uploads/clientdocs/<?php echo $up1['mcert_re']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Marraige certificafe rescanned-<?php echo $up1['mcert_re']; ?></span>
                  </a>
                  <div class="col-sm-3 form-group">
                  <select class="form-control" name="mcert_re_a">
		<option value="">Select</option>
		<option value="1" <?php if($up1['mcert_re_a']=="1"){echo "selected";} ?>>Approved</option>
		<option value="0" <?php if($up1['mcert_re_a']=="0"){echo "selected";} ?>>rejected</option>
	</select>
                 </div></div>

<?php } ?>

<?php if($up1['bcert']!="")
        { 
        ?>
                 <div class="row">
                  <a href="uploads/clientdocs/<?php echo $up1['bcert']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Birth Certificate-<?php echo $up1['bcert']; ?></span>
                  </a>
                  <div class="col-sm-3 form-group">
                  <select class="form-control" name="bcert_a">
		<option value="">Select</option>
		<option value="1" <?php if($up1['bcert_a']=="1"){echo "selected";} ?>>Approved</option>
		<option value="0" <?php if($up1['bcert_a']=="0"){echo "selected";} ?>>rejected</option>
	</select>
                 </div></div>

<?php } ?>

<?php if($up1['niddoc']!="")
        { 
        ?>
                 <div class="row">
                  <a href="uploads/clientdocs/<?php echo $up1['niddoc']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">National ID-<?php echo $up1['niddoc']; ?></span>
                  </a>
                  <div class="col-sm-3 form-group">
                  <select class="form-control" name="niddoc_a">
		<option value="">Select</option>
		<option value="1" <?php if($up1['niddoc_a']=="1"){echo "selected";} ?>>Approved</option>
		<option value="0" <?php if($up1['niddoc_a']=="0"){echo "selected";} ?>>rejected</option>
	</select>
                 </div></div>

<?php } ?>

<?php if($up1['marraige']!="")
        { 
        ?>
                 <div class="row">
                  <a href="uploads/clientdocs/<?php echo $up1['marraige']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Marraige Certificate-<?php echo $up1['marraige']; ?></span>
                  </a>
                  <div class="col-sm-3 form-group">
                  <select class="form-control" name="marraige_a">
		<option value="">Select</option>
		<option value="1" <?php if($up1['marraige_a']=="1"){echo "selected";} ?>>Approved</option>
		<option value="0" <?php if($up1['marraige_a']=="0"){echo "selected";} ?>>rejected</option>
	</select>
                 </div></div>

<?php } ?>

<?php if($up1['ielts']!="")
        { 
        ?>
                 <div class="row">
                  <a href="uploads/clientdocs/<?php echo $up1['ielts']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">IELTS-<?php echo $up1['ielts']; ?></span>
                  </a>
                  <div class="col-sm-3 form-group">
                  <select class="form-control" name="ielts_a">
		<option value="">Select</option>
		<option value="1" <?php if($up1['ielts_a']=="1"){echo "selected";} ?>>Approved</option>
		<option value="0" <?php if($up1['ielts_a']=="0"){echo "selected";} ?>>rejected</option>
	</select>
                 </div></div>

<?php } ?>

<?php if($up1['passport']!="")
        { 
        ?>
                 <div class="row">
                  <a href="uploads/clientdocs/<?php echo $up1['ielts']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Passport-<?php echo $up1['passport']; ?></span>
                  </a>
                  <div class="col-sm-3 form-group">
                  <select class="form-control" name="passport_a">
		<option value="">Select</option>
		<option value="1" <?php if($up1['passport_a']=="1"){echo "selected";} ?>>Approved</option>
		<option value="0" <?php if($up1['passport_a']=="0"){echo "selected";} ?>>rejected</option>
	</select>
                 </div></div>

<?php } ?>

<?php if($up1['pcc']!="")
        { 
        ?>
                 <div class="row">
                  <a href="uploads/clientdocs/<?php echo $up1['pcc']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">PCC-<?php echo $up1['pcc']; ?></span>
                  </a>
                  <div class="col-sm-3 form-group">
                  <select class="form-control" name="pcc_a">
		<option value="">Select</option>
		<option value="1" <?php if($up1['pcc_a']=="1"){echo "selected";} ?>>Approved</option>
		<option value="0" <?php if($up1['pcc_a']=="0"){echo "selected";} ?>>rejected</option>
	</select>
                 </div></div>

<?php } ?>

<?php if($up1['photo']!="")
        { 
        ?>
                 <div class="row">
                  <a href="uploads/clientdocs/<?php echo $up1['photo']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Photo-<?php echo $up1['photo']; ?></span>
                  </a>
                  <div class="col-sm-3 form-group">
                  <select class="form-control" name="photo_a">
		<option value="">Select</option>
		<option value="1" <?php if($up1['photo_a']=="1"){echo "selected";} ?>>Approved</option>
		<option value="0" <?php if($up1['photo_a']=="0"){echo "selected";} ?>>rejected</option>
	</select>
                 </div></div>

<?php } ?>

<?php if($up1['resume']!="")
        { 
        ?>
                 <div class="row">
                  <a href="uploads/clientdocs/<?php echo $up1['resume']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Photo-<?php echo $up1['resume']; ?></span>
                  </a>
                  <div class="col-sm-3 form-group">
                  <select class="form-control" name="resume_a">
		<option value="">Select</option>
		<option value="1" <?php if($up1['resume_a']=="1"){echo "selected";} ?>>Approved</option>
		<option value="0" <?php if($up1['resume_a']=="0"){echo "selected";} ?>>rejected</option>
	</select>
                 </div></div>

<?php } ?>
</div>

<!--TAB14--> 
<div class="tab-pane container" id="tab14">

	<textarea type="text" class="form-control" name="status_c" rows="5" cols="50" id="status_c"></textarea>
	<br>
	<input type="file" name="status_f">

	</div>




</div>
<?php 
if($_SESSION['ROLE']!=4 && $_SESSION['ROLE']!=10) {
?>	
<div class="row">	
	<div class="col-sm-12 form-group">
		<input type="submit" name="submit" value="SUBMIT" class="btn btn-info"> 	
	</div>			
</div>
<?php } ?>
				</form>
			</div>
		
<?php 	include_once("footer.php");	?>
   	<script>
		$(function(){
		$('#retnDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#ecaApplyDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#compDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#ecaReceDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#specaApplyDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#spcompDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#specaReceDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#compDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#landDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#visaReqDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#passSentDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#passReceDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#itaReceDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#itaSubLastDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#itaDocReceDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#itaSubDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#itaAddiReqDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$("#pnpSubDate").datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#pnpExpDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#expiryDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true});
		$('#expiryDateS').datepicker({    format: 'dd-mm-yyyy',	autoclose: true});
		$('#testDateS').datepicker({    format: 'dd-mm-yyyy',	autoclose: true});
		$('#testDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#eeDocReceDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#eeProfLauDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#eeProfExpDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		}); 
		
// 		$(document).ready(function(){

// 	 $(document).on('blur','.update',function(){
//  	var id=$(this).data("id");
//  	var column_name=$(this).data("column");
//  	var value =$(this).val();
//  	$.ajax({
//  		url:'update.php',
//  		method:'POST',
//  		data:{id:id,column_name:column_name,value:value},
//  		sucess:function(data)
//  		{
//  			$('#alert_message').html('<div class=alert alert-success">'+data+'</div>')
//  		}
//  	})
//  });
//  });
	</script>
