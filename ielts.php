<?php
include_once("head.php");

$ie = $obj->display('ielts','id=1');
if($ie->num_rows > 0){
$ie1= $ie->fetch_array();
}

// if($_POST)
// {
//   // print_r($_POST);die;
//   $p=$_POST['password'];
//   $rp=$_POST['rpassword'];
//   if($p!=$rp)
//   {
//     header("Location: profile.php?pass=no");
//   }
//   else
//   {

//   $data=array(
//     'fname'=>$_POST['fname'],
//     'lname'=>$_POST['lname'],
//     'email'=>$_POST['email'],
//     'password'=>$_POST['password']
//   );
//   // print_r($data);die;
//   $obj->update('dm_lead',$data,'id='.$cl1['id']);
//   header('Location: profile.php');
// }
// echo "no";die;
  
// }
?>
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Add Lead</h1>

          <div class="row">

            <div class="col-lg-12">
            
              <!-- document list -->
              <div class="card shadow mb-4">
              <div class="col-sm-10">
              </br>
              <?php if(isset($_GET['error'])) { echo '<div class="alert-danger alert">'.$_GET['error'].'</div>';}?> 
<form action="" method="post" id="leadForm">
<div class="row">
<div class="col-sm-6"><h4 class="mb-3" style="color:#2cb674;">Fill Lead Data</h4></div>
<div class="col-sm-6">
<div class="row"><label class="col-sm-4 text-right">Assign To</label><div class="col-sm-8">
<select align="right" class="form-control assign" required name="assign">
<option value="">Select</option>
<?php 
if($_SESSION["TYPE"]=="IC" || $_SESSION["TYPE"]=="SIC" || $_SESSION["TYPE"]=="MC" || $_SESSION["TYPE"]=="BM" || $_SESSION["TYPE"]=="ABM" || $_SESSION["TYPE"]=="RM" || $_SESSION["TYPE"]=="AM" || $_SESSION["TYPE"]=="CPO" || $_SESSION["TYPE"]=="SCPO" || $_SESSION["TYPE"]=="CPM" || $_SESSION["TYPE"]=="FMP" || $_SESSION["TYPE"]=="DGM" || $_SESSION["TYPE"]=="OM" || $_SESSION["TYPE"]=="PDC" || $_SESSION["TYPE"]=="MBI" || $_SESSION["TYPE"]=="HR" || $_SESSION["TYPE"]=="PDC" || $_SESSION["TYPE"]=="TC" || $_SESSION["TYPE"]=="OC" || $_SESSION["TYPE"]=="RMO" || $_SESSION["TYPE"]=="RMSM" || $_SESSION["TYPE"]=="AOM")
{
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
	<option value="<?php echo $emp1['id'];?>" <?php if($emp1['id']==$_SESSION['ID']) {?> selected="selected" <?php } ?>><?php echo $emp1['name'];?></option>
	<?php }
}
 ?>
</select>
</div></div>
</div></div>
<div class="row">
<div class="col-sm-4 form-group"><label >First Name</label><input type="text" class="form-control" id="fname" name="fname" required ></div>
<div class="col-sm-4 form-group"><label >Middle Name</label><input type="text" class="form-control" id="mname" name="mname"></div>
<div class="col-sm-4 form-group"><label >Family Name</label><input type="text" class="form-control" id="lname" name="lname" required ></div>
</div>
<div class="row">
<div class="col-sm-4 form-group"><label >Email</label><input type="text" class="form-control" id="email" name="email" required></div>
<div class="col-sm-4 form-group"><label >Landline(Home)</label><input type="text" class="form-control" id="phone" name="phone" ></div>
<div class="col-sm-4 form-group"><label >Cell No.</label><input type="text" class="form-control" id="mobile" name="mobile" maxlength="12" required></div>
</div>
<div class="row">
<div class="col-sm-4 form-group"><label >Nationality</label><select class="form-control" name="nationality"  >
	<option value="">Select</option>
	<?php $con=$obj->display('dm_countries','1=1 order by name');
	while($con1=$con->fetch_array())
	{
	?>
	<option value="<?php echo $con1['name'];?>"><?php echo $con1['name'];?></option>
	<?php } ?>
	
	
</select>
</div>
<div class="col-sm-8 form-group"><label >Address</label><input type="text" class="form-control" id="address" name="address"  ></div>

</div>
<div class="row">
<div class="col-sm-4 form-group"><label >DOB</label><input type="text" class="form-control" id="dob" name="dob"  ></div>
<div class="col-sm-4 form-group"><label>Gender</label>
	<select name="gender" class="form-control" >
		<option value="">Select</option>
		<option value="Male">Male</option>
		<option value="Female">Female</option>
		</select>
</div>
<div class="col-sm-4 form-group"><label >Country Interested</label>
<select class="form-control" name="country_interest">
	<option value="">Select</option>
<?php $cnt=$obj->display('dm_country_proces','status=1 order by name');
	while($cnt1=$cnt->fetch_array())
	{
	?>
	<option value="<?php echo $cnt1['id'];?>"><?php echo $cnt1['name'];?></option>
	<?php } ?>	
	</select>
	
	</div>



</div>
<div class="row">
<div class="col-sm-4 form-group"><label >Program Interested</label>
<select class="form-control" name="service_interest">
	<option value="">Select</option>
	<?php $ser=$obj->display('dm_service','status=1 order by name');
	while($ser1=$ser->fetch_array())
	{
	?>
	<option value="<?php echo $ser1['id'];?>"><?php echo $ser1['name'];?></option>
	<?php } ?>
</select>
</div>
<div class="col-sm-4 form-group"><label >Program Type</label>
<select class="form-control" name="type">
	<option value="">Select</option>
	<option value="Business">Business</option>
	<option value="Skill">Skill</option>
	<option value="Student">Student</option>
	<option value="Visit">Visit</option>
	<option value="Work">Work</option>
	
	</select>
	
	</div>
<div class="col-sm-4 form-group"><label >Marketing Source</label>
<select class="form-control" name="market_source" required>
	<option value="">Select</option>
	<?php $sou=$obj->display('dm_source','status=1 order by name');
	while($sou1=$sou->fetch_array())
	{
	?>
	<option value="<?php echo $sou1['id'];?>"><?php echo $sou1['name'];?></option>
	<?php } ?>
	
	</select>
	
	</div>

		
</div>
<div class="row">
<div class="col-sm-4 form-group"><label >Convert</label>
<select class="form-control" name="convet" id="convet">
	<option value="">Select</option>
	<option value="DNQ">DNQ</option>
	<option value="Not Interested">Not Interested</option>
	<option value="Prospect">Prospect</option>
	
	</select>
	
	</div>
<div class="col-sm-4 form-group"><label >Mode of Enquiry</label>
<select class="form-control" name="enquiry"  required>
	<option value="">Select</option>
	<?php $en=$obj->display('dm_enquiry','status=1 order by name');
	while($en1=$en->fetch_array())
	{
	?>
	<option value="<?php echo $en1['name'];?>"><?php echo $en1['name'];?></option>
	<?php } ?>
	
	</select>
	
	</div>	
	<div class="col-sm-4 form-group"><label >Follow Up</label><input type="text" class="form-control" id="folowup" name="followup"></div>
</div>
<div class="row">	


				
			<div class="col-sm-8 form-group"><label >Remark</label><textarea class="form-control" id="remark" name="remark" ></textarea></div>
			
<div class="col-sm-12 form-group">
<input type="submit" name="save" value="SAVE" class="btn btn-info">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<input type="submit" name="submit" value="SUBMIT" class="btn btn-info" style="display:none" id="submit-btn-info" > 	
</div>		
</div>
</form>
                
                </div>
               
                </div>
                </div>
              </div>

            </div>

          </div>


      <!-- End of Main Content -->
      <?php include_once('foot.php'); ?>