<?php 	include_once("header.php");

if($_POST['save'] || $_POST['submit'])
{
$emp=$obj->display('dm_employee','id='.$_POST['assign']); $emp1=$emp->fetch_array();
if($_POST['service_interest'])
{
	$data2 = array(
    			'service_interest'  =>  $_POST['service_interest']
				);
		$obj->update('dm_lead',$data2,'id='.$_POST['id']);
}

if($_POST['dob']!="") { $dob=date('Y-m-d',strtotime($_POST['dob']));} else { $dob=NULL;}
if($_POST['appointment']!="") { $appointment=date('Y-m-d',strtotime($_POST['appointment']));} else { $appointment=NULL;}
	$data = array(
    			'fname'  =>  $_POST['fname'],
    			'mname'  =>  $_POST['mname'],
    			'lname'  =>  $_POST['lname'],
    			'email'  =>  $_POST['email'],
    			'phone'  =>  $_POST['phone'],
    			'mobile'  =>  $_POST['mobile'],
    			'nationality'  =>  $_POST['nationality'],
    			'address'  =>  $_POST['address'],
    			'dob'  =>  $dob,
    			'appointment'  =>  $appointment,
    			'gender'  =>  $_POST['gender'],
    			'followup'  =>  date('Y-m-d',strtotime($_POST['followup'])),
    			'country_interest'  =>  $_POST['country_interest'],
    			'market_source'  =>  $_POST['market_source'],
    			'enquiry'  =>  $_POST['enquiry'],
    			'convet'  =>  $_POST['convet'],
    			'type'  =>  $_POST['type'],
				'last_updated' => date('d-m-Y h-i-sa')
				);
			$obj->update('dm_lead',$data,'id='.$_POST['id']);

			if ($_SESSION['TYPE']=="SA"){
				$data5 = array(
					'Counsilor' => $_POST['assign'],
					'assignTo' => $_POST['assign']
				);
				$obj->update('dm_lead',$data5,'id='.$_POST['id']);
			}

if($_POST['remark']!="")
{
	$data = array(
    			'notf'  =>  1
				);
	$obj->update('dm_lead',$data,'id='.$_POST['id']);
	$data4 = array(
    			'lead'  =>  $_POST['id'],
    			'date'  =>  date('Y-m-d'),
				'remark'  =>  $_POST['remark'],
				'emp' => $_SESSION['ID']
				);
			$obj->insert('dm_lead_remark',$data4);
}

if($_POST['appoint']!=""){
	$data = array(
		'leadid' => $_POST['id'],
		'date' => date('Y-m-d',strtotime($_POST['appoint'])),
		'counsilorid' => $_POST['assign'],
		'booked' => 1,
		'region' => $emp1['region']
		 );
	// print_r($data);die;
	// echo date('Y-m-d',strtotime($_REQUEST['date']));die;
	$obj->insert('appointments',$data);
}

if($_POST['save'])	{ 
	header("location:lead_view.php?lead=".$_POST['id']);
}
if($_POST['submit']) {
		/*if($_POST['service_interest'] == 5) {
			header("location:lead_assesment_form.php?lead=".$odr."&type=Student");
		} 
		if($_POST['service_interest'] == 4 || $_POST['service_interest']==21 || $_POST['service_interest']==23 || $_POST['service_interest']==22 || $_POST['service_interest']==19 || $_POST['service_interest']==6 || $_POST['service_interest']==7 || $_POST['service_interest']==33 || $_POST['service_interest']==3) {
			header("location:lead_assesment_form.php?lead=".$odr."&type=Visit");
		} 
		if($_POST['service_interest'] == 3) {
			header("location:lead_assesment_form.php?lead=".$odr."&type=Work");
		} 
		if($_POST['service_interest'] == 2) {
			header("location:lead_assesment_form.php?lead=".$_POST['id']."&type=Business");
		} 
		if($_POST['service_interest'] == 1 || $_POST['service_interest']==31 || $_POST['service_interest']==32 || $_POST['service_interest']==24 || $_POST['service_interest']==25 || $_POST['service_interest']==26 || $_POST['service_interest']==27 || $_POST['service_interest']==28 || $_POST['service_interest']==29) {
			header("location:lead_assesment_form.php?lead=".$_POST['id']."&type=Skill");
		}*/
		
$aset = $obj->display('dm_lead_assesment', 'leadId='.$_POST["id"]);
if($aset->num_rows==0) {
			header("location:lead_assesment_form.php?lead=".$_POST["id"]);
}
else
{
			header("location:lead_assesment_edit.php?id=".$_POST["id"]);
}

}
}
$lead=$obj->display('dm_lead','id='.$_GET['lead']);
$lead1=$lead->fetch_array();
$reg=$obj->display('dm_region','id='.$lead1['region']);
$reg1= $reg->fetch_array();
?>
			
<div class="col-sm-10">
<form action="" method="post" id="leadForm">
<input type="hidden" name="id" value="<?php echo $_GET['lead'];?>" />
<div class="row">
<div class="col-sm-12"><h4 class="mb-3" style="color:#2cb674;">Edit Lead <a href="lead_view_management.php" class="float-right" style="font-size:20px;" title="BACK"><i class="fa fa-arrow-left"></i></a></h4></div>

<?php if($lead1['stepComplete']!=3 && $lead1['paidYet']==0) {?>
<div class="col-sm-12">
<div class="row"><label class="col-sm-8 text-right">Assign To</label><div class="col-sm-4">
<select class="form-control assign" required name="assign">
<?php 
if($_SESSION["TYPE"]=="IC" || $_SESSION["TYPE"]=="SIC" || $_SESSION["TYPE"]=="MC" || $_SESSION["TYPE"]=="BM" || $_SESSION["TYPE"]=="ABM" || $_SESSION["TYPE"]=="RM" || $_SESSION["TYPE"]=="AM" || $_SESSION["TYPE"]=="CPO" || $_SESSION["TYPE"]=="SCPO" || $_SESSION["TYPE"]=="CPM" || $_SESSION["TYPE"]=="FMP" || $_SESSION["TYPE"]=="DGM" || $_SESSION["TYPE"]=="OM" || $_SESSION["TYPE"]=="PDC" || $_SESSION["TYPE"]=="MBI" || $_SESSION["TYPE"]=="HR" || $_SESSION["TYPE"]=="PDC" || $_SESSION["TYPE"]=="TC" || $_SESSION["TYPE"]=="OC" || $_SESSION["TYPE"]=="RMO" || $_SESSION["TYPE"]=="RMSM" || $_SESSION["TYPE"]=="AOM"){
$emp=$obj->display('dm_employee','id='.$_SESSION["ID"]);
$emp1=$emp->fetch_array();
?>
	<option value="<?php echo $emp1['id'];?>" <?php if($emp1['id']==$_SESSION['ID']) {?> selected="selected" <?php } ?>><?php echo $emp1['name'];?></option>
<?php
}
else if($_SESSION["TYPE"]=="SA" || $_SESSION["TYPE"]=="RT")
{
$emp=$obj->display('dm_employee','role=4 || role=10 || role=31 || role=3 || role=2 || role=7 || role=20 || role=8 || role=14 || role=24 || role=26 || role=27 || role=5 || role=11 || role=13 || role=15 || role=18 || role=23 || role=25 || role=28 || role=29 order by name');
while($emp1=$emp->fetch_array())
{
?>
	<option value="<?php echo $emp1['id'];?>" <?php if($emp1['id']==$lead1['assignTo']) {?> selected="selected" <?php } ?>><?php echo $emp1['name'];?></option>
	<?php }
}
 ?>
</select>
</div>
</div>
</div>
<?php } else { ?>
<div class="col-sm-12">
<div class="row"><label class="col-sm-8 text-right">Assign To</label><div class="col-sm-4">
<input type="hidden" name="assign" value="<?=$lead1['assignTo'];?>" />
<input type="text" readonly="" value="<?php $ff=$obj->display('dm_employee','id='.$lead1['assignTo']); $ff1=$ff->fetch_array(); echo $ff1['name'];?>" />
</div>
</div>
</div>
<?php } ?>
</div>

<div class="row">
<div class="col-sm-4 form-group"><label >First Name</label><input type="text" class="form-control" id="fname" name="fname" value="<?php echo $lead1['fname'];?>" required></div>
<div class="col-sm-4 form-group"><label >Middle Name</label><input type="text" class="form-control" id="mname" name="mname" value="<?php echo $lead1['mname'];?>"></div>
<div class="col-sm-4 form-group"><label >Family Name</label><input type="text" class="form-control" id="lname" name="lname" value="<?php echo $lead1['lname'];?>" required></div>
</div>
<div class="row">
<div class="col-sm-4 form-group"><label >Email</label><input type="text" class="form-control" id="email" name="email" value="<?php echo $lead1['email'];?>" required></div>
<div class="col-sm-4 form-group"><label >Landline</label><input type="text" class="form-control" id="phone" name="phone" value="<?php echo $lead1['phone'];?>"></div>
<div class="col-sm-4 form-group"><label >Cell No.</label><input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $lead1['mobile'];?>" required></div>
</div>
<div class="row">
<div class="col-sm-4 form-group"><label >Nationality</label><select class="form-control" name="nationality">
	<option value="">Select</option>
	<?php $con=$obj->display('dm_countries','1=1 order by name');
	while($con1=$con->fetch_array())
	{
	?>
	<option value="<?php echo $con1['name'];?>"  <?php if($con1['name']==$lead1['nationality']) { echo 'selected="selected"';}?>><?php echo $con1['name'];?></option>
	<?php } ?>
	
	
</select>
</div>
<div class="col-sm-8 form-group"><label >Address</label><input type="text" class="form-control" id="address" name="address" value="<?php echo $lead1['address'];?>"></div>

</div>
<div class="row">
<div class="col-sm-4 form-group"><label >DOB</label><input type="text" class="form-control" id="dob" name="dob" value="<?php if($lead1['dob']=="") { echo "";} else { echo date('d-m-Y',strtotime($lead1['dob'])); } ?>"></div>
<div class="col-sm-4 form-group"><label>Gender</label>
	<select name="gender" class="form-control">
		<option value="Male" <?php if($lead1['gender']=="Male") { echo 'selected="selected"';}?>>Male</option>
		<option value="Female" <?php if($lead1['gender']=="Female") { echo 'selected="selected"';}?>>Female</option>
		</select>
</div>

<div class="col-sm-4 form-group"><label >Country Interested</label>
<select class="form-control" name="country_interest">
	
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

<?php 
if($lead1['stepComplete']!=3 || $lead1['paidYet']==0 ) {
?>	
<div class="col-sm-4 form-group"><label >Program Interested</label>
<select class="form-control" name="service_interest">
	<?php $ser=$obj->display('dm_service','status=1 order by name');
	while($ser1=$ser->fetch_array())
	{
	?>
	<option value="<?php echo $ser1['id'];?>"  <?php if($ser1['id']==$lead1['service_interest']) { echo 'selected="selected"';}?>><?php echo $ser1['name'];?></option>
	<?php } ?>
	
</select>
</div>

<div class="col-sm-4 form-group"><label >Program Type</label>
<select class="form-control" name="type">
	<option value="Business" <?php if($lead1['type']=="Business") { echo 'selected="selected"';}?>>Business</option>
	<option value="Skill" <?php if($lead1['type']=="Skill") { echo 'selected="selected"';}?>>Skill</option>
	<option value="Student" <?php if($lead1['type']=="Student") { echo 'selected="selected"';}?>>Student</option>
	<option value="Visit" <?php if($lead1['type']=="Visit") { echo 'selected="selected"';}?>>Visit</option>
	<option value="Work" <?php if($lead1['type']=="Work") { echo 'selected="selected"';}?>>Work</option>
	
	</select>
</div>
<?php } ?>

<div class="col-sm-4 form-group"><label >Marketing Source</label>
<select class="form-control" name="market_source" required>
	<?php $sou=$obj->display('dm_source','status=1 order by name');
	while($sou1=$sou->fetch_array())
	{
	?>
	<option value="<?php echo $sou1['id'];?>"  <?php if($sou1['id']==$lead1['market_source']) { echo 'selected="selected"';}?>><?php echo $sou1['name'];?></option>
	<?php } ?>
	
	</select>
	
	</div>
<div class="col-sm-4 form-group"><label >Convert</label>
<select class="form-control" name="convet" id="convet" required>
	<option value="DNQ" <?php if($lead1['convet']=="DNQ") { echo 'selected="selected"';}?>>DNQ</option>
	<option value="Not Interested" <?php if($lead1['convet']=="Not Interested") { echo 'selected="selected"';}?>>Not Interested</option>
	<option value="Prospect" <?php if($lead1['convet']=="Prospect") { echo 'selected="selected"';}?>>Prospect</option>
	<option value="not_ansawered" <?php if($lead1['convet']=="Prospect") { echo 'selected="selected"';}?>>Not Answered</option>
	
	</select>
	
	</div>		
	
<div class="col-sm-4 form-group"><label >Mode of Enquiry</label>
<select class="form-control" name="enquiry">
	<?php $en=$obj->display('dm_enquiry','status=1 order by name');
	while($en1=$en->fetch_array())
	{
	?>
	<option value="<?php echo $en1['name'];?>" <?php if($lead1['enquiry']==$en1['name']) { echo 'selected="selected"';}?>><?php echo $en1['name'];?></option>
	<?php } ?>	
	</select>
	
	</div>
	

<div class="col-sm-4 form-group"><label >Follow Up</label><input type="text" class="form-control" id="folowup" name="followup" value="<?php echo date('d-m-Y',strtotime($lead1['followup']));?>"></div>

<div class="col-sm-4 form-group"><label >Appointment</label><input type="text" class="form-control" id="appoint" name="appoint"></div>

<div class="col-sm-4 form-group"><label >Lead location</label><input readonly type="text" class="form-control" id="regi" name="regi" value="<?php echo $reg1['name'];?>"></div>
		
<div class="col-sm-12 form-group"><label >Remark</label><textarea class="form-control" id="remark" name="remark" >
	<?php echo $lead1['remark'];?>
</textarea></div>
			
			
<div class="col-sm-12 form-group">
<?php 
if($lead1['paidYet']!=0 && ($_SESSION['TYPE']=="RM" || $_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="FMP" || $_SESSION['TYPE']=="DGM" || $_SESSION['TYPE']=="RMSM" || $_SESSION['ROLE']==8 || $_SESSION['ROLE']==14 )) {
?>	
<input type="submit" name="save" value="SAVE" class="btn btn-info">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<?php 
}
if($lead1['paidYet']==0 && ($_SESSION['TYPE']=="RM" || $_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="FMP" || $_SESSION['TYPE']=="DGM" || $_SESSION['TYPE']=="RMSM" || $_SESSION["TYPE"]=="IC" || $_SESSION["TYPE"]=="SIC" || $_SESSION["TYPE"]=="MC" || $_SESSION["TYPE"]=="ABM" || $_SESSION["TYPE"]=="BM" || $_SESSION["TYPE"]=="AM" || $_SESSION["TYPE"]=="CPO" || $_SESSION["TYPE"]=="SCPO" || $_SESSION["TYPE"]=="CPM" || $_SESSION["TYPE"]=="OM" || $_SESSION["TYPE"]=="PDC" || $_SESSION["TYPE"]=="MBI" || $_SESSION["TYPE"]=="HR" || $_SESSION["TYPE"]=="PDC" || $_SESSION["TYPE"]=="TC" || $_SESSION["TYPE"]=="OC" || $_SESSION["TYPE"]=="RMO")) {
?>	
<input type="submit" name="save" value="SAVE" class="btn btn-info">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<?php 
}
$aset = $obj->display('dm_lead_assesment', 'leadId='.$_GET["lead"]);
if($aset->num_rows==0) { 
?>	
<input type="submit" name="submit" value="SUBMIT" class="btn btn-info" <?php if($lead1['convet']!="Prospect") { echo 'style="display:none"';} ?> id="submit-btn-info" > 	
<?php } else { ?>
<a href="<?php 	echo 'lead_assesment_edit.php?id='.$_GET["lead"];?>" class="btn btn-info float-right">NEXT</a> 	
<?php } ?>		
</div>		
</div>
</form>



</div>
		
<?php 	include_once("footer.php");	?>

   <script>
$(function() {
        $('#email').on('keypress', function(e) {
            if (e.which == 32){
                alert('Space not allowed');
                return false;
            }
		});
		$('#mobile').on('keypress', function(e) {
            if (e.which >31 && (e.which <48 || e.which > 57) ){
                alert('Only number Allowed');
                return false;
            }
		});
});

$(function(){
$('#dob').datepicker({    format: 'dd-mm-yyyy',	autoclose: true});
$('#appoint').datepicker({    format: 'dd-mm-yyyy',	autoclose: true});
$('#appointment').datepicker({    format: 'dd-mm-yyyy',	autoclose: true});
$('#folowup').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
$('#convet').change(function(){
var t=$(this).val();  if(t=="Prospect") { $('#submit-btn-info').show();} else { $('#submit-btn-info').hide();}
});
}); 
</script>