<?php 	include_once("header.php");	

if(isset($_POST['opsId']))
{
	
	$data = array(
    			"email" => $_POST['email'],
    			"mobile" => $_POST['mobile']
				);
	$obj->update('dm_lead',$data,'id='.$_POST['lead']);
if ($_POST['opsId']=="")
{
$data = array(
	'leadId' => $_POST['lead'],
	'docSubDate' => $_POST['docSubDate'],
	'university' => $_POST['Qualification'],
	'remark1' => $_POST['Remark1'],
	'docReceDate' => $_POST['docReceDate'],
	'appSub' => $_POST['appSub'],
	'appStatus' => $_POST['appStatus'],
	'remark2' => $_POST['Remark2'],
	'descountry' => $_POST['descountry']
     );
$opsId=$obj->insert('dm_ops_visit_visa',$data);
}
else
{
	$opsId=$_POST['opsId'];
	$data = array(
	'docSubDate' => $_POST['docSubDate'],
	'university' => $_POST['Qualification'],
	'docReceDate' => $_POST['docReceDate'],
	'appSub' => $_POST['appSub'],
	'appStatus' => $_POST['appStatus'],
	'descountry' => $_POST['descountry']
);
$obj->update('dm_ops_visit_visa',$data,'id='.$opsId);
}
if($_POST['Remark1']!="")
{
	$data2=array(
		'remark1'=> $_POST['Remark1']);
	$obj->update('dm_ops_visit_visa',$data2,'id='.$opsId);
}
if($_POST['Remark2']!="")
{
	$data3=array(
		'remark2'=> $_POST['Remark2']);
	$obj->update('dm_ops_visit_visa',$data3,'id='.$opsId);
}


if($_FILES['visitFile']['name']!="")
	{
		$filename=time().'_'.$_FILES['visitFile']['name'];
        move_uploaded_file($_FILES['visitFile']['tmp_name'], 'uploads/documents/' . $filename);
			$dataSheet2 = array(
	    			'opsId'   =>  $opsId,
	    			'leadId'  =>  $_POST['lead'],
	    			'tab'   =>  2,
	    			'file'   =>  $filename
	    			);
			$obj->insert('dm_ops_documents',$dataSheet2);
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

	header("location:visit_visa_ops.php?lead=".$_POST['lead']);
}



if(isset($_GET['docId']))
{
$d=$obj->display('dm_ops_documents','id='.$_GET['docId']);
$d1=$d->fetch_array();

unlink('uploads/documents/'.$d1['file']);

	$obj->delete('dm_ops_documents','id='.$_GET['docId']);

	header("location:visit_visa_ops.php?lead=".$_GET['lead']);

}
$ops=$obj->display('dm_ops_visit_visa','leadId='.$_GET['lead']);
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
			<h3 class="mb-3">Final Draft for Visit Visa</h3> 
				<form action="" method="post" enctype="multipart/form-data" class="opeForm" >
					<input type="hidden" name="lead" value="<?php echo $_GET['lead'];?>" />
					<input type="hidden" name="opsId" value="<?php echo $ops1['id'];?>" />
					
					
<ul class="nav nav-tabs">
  <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab1"><strong>Personal Details</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab2"><strong>Documentation</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab3"><strong>Application Status</strong></a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab4"><strong>Conversation</strong></a></li>
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
$emp=$obj->display('dm_employee','id='.$lead1['Counsilor']);
$emp1=$emp->fetch_array();
?>	
			
	<div class="col-sm-4 form-group"><label>Counsilor</label><input type="text" class="form-control" id="officer" name="officer" value="<?=$emp1['name'];?>"  readonly=""></div>
			
			
		
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
  
  <!-- tab 2 -->
  
  <div class="tab-pane container" id="tab2">
  <div class="row" style="overflow:hidden">
  
	<div class="col-sm-4 form-group"><label>DOCUMENTS CHECKLIST SENT</label><input type="text" class="form-control" id="date1" name="docSubDate" value="<?php echo($ops1['docSubDate'])?>"></div>
	<div class="col-sm-4 form-group"><label>DESTINATION/ COUNTRY</label><input type="text" class="form-control" id="" name="descountry" value="<?php echo($ops1['descountry'])?>">
	</div>
	<div class="col-sm-4 form-group"><label>UNIVERSITY/COLLEGE NAME</label><input type="text" class="form-control" id="" name="Qualification" value="<?php echo($ops1['university'])?>"></div>
	<div class="col-sm-12 form-group">
							<?php
							echo "<p>".$ops1['remark1'].'-'.date('d/m/Y').'<p>';
							?>
</div>
	<div class="col-sm-12 form-group"><label>Remark</label>
		<textarea class="form-control" id="Remark" name="Remark1"></textarea>
</div>
<div class="col-sm-3 form-group"><label>Document File </label>
  <input type="file" class="form-control" id="ecaFile" name="visitFile" >
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
	<div class="col-sm-3"><a href="visit_visa_ops.php?docId=<?php echo $doc1['id'];?>&lead=<?php echo $_GET['lead'];?>">Delete</a></div>
  </div>
  <?php } }?>
  </div>
  
  
<!--   tab3 -->
 
  <div class="tab-pane container" id="tab3">
  
  <div class="row" style="overflow:hidden">
  <div class="col-sm-12 form-group">
						  <table class="table table-bordered table-custom-pre" id="tbl">
						  <thead>
						    <tr>
						      <th scope="col" class="align-top" style="text-align: center;">Date of Documents Received</th>
						      <th scope="col" class="align-top" style="text-align: center;">Application submission</th>
						      <th scope="col" class="align-top">Application Status </th>
						    </tr>
						  </thead>
						  <tbody id="eduBody_b">
						  	<tr>
							    <td>
							    	<!--<input type="text" required class="form-control" id="empRecName1" name="empRecName[]" >-->
							    		<input type="text" class="form-control" id="date2" name="docReceDate" value="<?php echo($ops1['docReceDate'])?>">
							    	</td>
							    <td><select class="form-control" name="appSub">
		<option value="">Select</option>
		<option value="Yes" <?php if ($ops1['appSub']=="Yes"){echo 'selected="selected"';}?>>Yes</option>
		<option value="No" <?php if ($ops1['appSub']=="No"){echo 'selected="selected"';}?>>No</option>
	</select></td>
							    <td>
								<select class="form-control" name="appStatus">
		<option value="">Select</option>
		<option value="In Process" <?php if ($ops1['appStatus']=="In Process"){echo 'selected="selected"';}?>>In Process</option>
		<option value="Approved" <?php if ($ops1['appStatus']=="Approved"){echo 'selected="selected"';}?>>Approved</option>
		<option value="Rejected" <?php if ($ops1['appStatus']=="Rejected"){echo 'selected="selected"';}?> >Rejected</option>
	</select><!-- <button onclick="add_b_row()" type="button" class=""> Add New </button> --></td>
						    </tr>
						    
						    
						  </tbody>
						</table></div>
						<div class="col-sm-12 form-group">
							<?php
							echo "<p>".$ops1['remark2'].'-'.date('d/m/Y').'<p>';
							?>
</div>
	<div class="col-sm-12 form-group"><label>Remark</label><textarea type="text" class="form-control" id="Expiry" name="Remark2"></textarea></div>
	
  </div>
  	
  </div>

  <!-- tab 4 -->

   <div class="tab-pane container" id="tab4">
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
		$('#date1').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#date2').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		$('#date3').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
		}); 
	</script>

<script>

var y = 2;

function add_b_row(){

var row = $('<tr id="appndd_b_tr'+ y +'"><td><input type="text" required class="form-control" id="empRecName1" name="empRecName[]" ></td><td><select class="form-control" name="spgender[]" required><option value="">Select</option><option value="Yes">Yes</option><option value="No">No</option></select></td><td><select class="form-control" name="spgender[]" required><option value="">Select</option><option value="In Process">In Process</option><option value="Approved">Approved</option><option value="Rejected">Rejected</option></select><button type="button" onclick="remove_b_row('+ y +')" class="">Remove</button></td></tr>');

row.appendTo("#eduBody_b");

y++;
}
function remove_b_row(b){
		$('#appndd_b_tr'+b).remove();
}
</script>

