<?php 	include_once("header.php");	

if(isset($_GET['lead']))

{

$lead=$obj->display('dm_lead','id='.$_GET['lead']);

$lead1=$lead->fetch_array();

$sou=$obj->display('dm_source','id='.$lead1['market_source']);$sou1=$sou->fetch_array();
if($row['service_interest']!=""){
$ser=$obj->display('dm_service','id='.$lead1["service_interest"]); 	$ser1=$ser->fetch_array();
}
if($row['country_interest']!=""){
$ctr=$obj->display("dm_country_proces","id=".$lead1["country_interest"]); 	$ctr1=$ctr->fetch_array();
}


}

?>

			<div class="col-sm-10">

			<div class="row"><div class="col-sm-12"><h4 class="mb-3" style="color:#2cb674;">View Lead <a href="lead_edit.php?lead=<?php echo $_GET['lead'];?>" title="EDIT" class="btn btn-info float-right"><i class="fa fa-edit"></i></a></h4></div>

			<div class="col-sm-12">

			<div class="row"><label class="col-sm-4 text-right">Assign To</label><div class="col-sm-8"><?php $ff=$obj->display('dm_employee','id='.$lead1['assignTo']); $ff1=$ff->fetch_array(); echo $ff1['name'];?></div></div>

			</div></div>

			<div class="row">

			<div class="col-sm-4 form-group"><label >First Name</label><br /><?php echo $lead1['fname'];?></div>

			<div class="col-sm-4 form-group"><label >Middle Name</label><br /><?php echo $lead1['mname'];?></div>

			<div class="col-sm-4 form-group"><label >Family Name</label><br /><?php echo $lead1['lname'];?></div>

			</div>

			<div class="row">

			<div class="col-sm-4 form-group"><label >Email</label><br /><?php echo $lead1['email'];?></div>

			<div class="col-sm-4 form-group"><label >Landline</label><br /><?php echo $lead1['phone'];?></div>

			<div class="col-sm-4 form-group"><label >Cell No.</label><br /><?php echo $lead1['mobile'];?></div>

			</div>

			<div class="row">

			<div class="col-sm-4 form-group"><label >Nationality</label><br /><?php echo $lead1['nationality'];?>

			</div>

			<div class="col-sm-4 form-group"><label >Address</label><br /><?php echo $lead1['address'];?></div>

			<div class="col-sm-4 form-group"><label >DOB</label><br /><?php echo $lead1['dob'];?></div>

			</div>

			<div class="row">

			<div class="col-sm-4 form-group"><label >Country Interested</label><br /><?php echo $ctr1['name'];?></div>

			<div class="col-sm-4 form-group"><label >Service Interested</label><br /><?php echo $ser1['name'];?></div>

			<div class="col-sm-4 form-group"><label >Marketing Source</label><br /><?php echo $sou1['name'];?></div>

			</div>

			<div class="row">

			<div class="col-sm-4 form-group"><label >Appointment</label><br /><?php echo $lead1['appointment'];?></div>

			<div class="col-sm-4 form-group"><label >Follow Up</label><br /><?php echo $lead1['followup'];?></div>

			<div class="col-sm-4 form-group"><label >Mode of Enquiry</label><br /><?php echo $lead1['enquiry'];?></div>			

			</div>

			<div class="row">

						<div class="col-sm-4 form-group"><label >Gender</label><br /><?php echo $lead1['gender'];?></div>			
						<div class="col-sm-4 form-group"><label >Convert</label><br /><?php echo $lead1['convet'];?></div>		
			</div>				
			<div class="row">
						<div class="col-sm-12 form-group"><label >Remark</label><br /><?php echo $lead1['remark'];?></div>
			</div>

			

			</div>

		

<?php 	include_once("footer.php");	?>

   <script>

$(function(){

$('#dob').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 

$('#appointment').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 

$('#folowup').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 

}); 

</script>