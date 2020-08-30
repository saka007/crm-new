<?php 	
include_once("header.php");
if($_POST['save'] || $_POST['submit'])
{
	$filename=$_FILES['document']['name'];
	if($filename!="")
	{
	if ( 0 < $_FILES['document']['error'] ) 
	{
        echo 'Error: ' . $_FILES['document']['error'] . '<br>';
    }
    else 
	{
		$filename=time().'_'.$filename;
        move_uploaded_file($_FILES['document']['tmp_name'], 'uploads/file/' . $filename);
    }
		$data = array(
					'Type'  	   =>  $_POST['type'],
	    			'cob'    	   =>  $_POST['cob'], 
	    			'marStatus'    =>  $_POST['marStatus'],
	    			'haveChild'    =>  $_POST['haveChild'],
	    			'noOfChild'    =>  $_POST['noOfChild'],
	    			'spfname'        =>  $_POST['spfname'],
	    			'spmname'        =>  $_POST['spmname'],
	    			'splname'        =>  $_POST['spgname'],
	    			'spgender'       =>  $_POST['spgender'],
	    			'spdob'          =>  date('Y-m-d',strtotime($_POST['spdob'])),
	    			'spcob'    	   =>  $_POST['spcob'], 
	    			'spcitizenof'    =>  $_POST['spcitizenof'],
	    			'spaddress'      =>  $_POST['spaddress'],
	    			'spmobile'       =>  $_POST['spmobile'],
	    			'spphHome'       =>  $_POST['spphHome'],
	    			'spphOffice'     =>  $_POST['spphOffice'],
	    			'spemail'    	   =>  $_POST['spemail'],
	    			'relName'       =>  $_POST['relName'],
	    			'reRelation'   =>  $_POST['reRelation'],
	    			'reCountry'    =>  $_POST['reCountry'],
	    			'reAddress'    =>  $_POST['reAddress'],
	    			'reStatus'     =>  $_POST['reStatus'],
	    			'moveAsset'    =>  $_POST['moveAsset'],
	    			'inmoveAsset'	=>  $_POST['inmoveAsset'],
	    			'interestIn'   =>  $_POST['interestIn'],
	    			'ownership'    =>  $_POST['ownership'],
	    			'document' => $filename
					);

		$obj->update('dm_lead_assesment',$data,'id='.$_POST['id']);
    }
for($i=0;$i<count($_POST['edu_id']);$i++)
{

if($_POST['fromMonth'][$i]=="" && $_POST['fromYear'][$i]=="" && $_POST['toMonth'][$i]=="" && $_POST['toYear'][$i]=="" && $_POST['pSEduName'][$i]=="" && $_POST['pSEduCourse'][$i]=="" && $_POST['pSEduDegree'][$i]=="" && $_POST['pSEduType'][$i]=="") {
$obj->delete('dm_lead_assesment_edu','id='.$_POST['edu_id'][$i]);
}
else
{
		$dataEdu = array(
	    			'fromMonth'    =>  $_POST['fromMonth'][$i],
	    			'fromYear'     =>  $_POST['fromYear'][$i],
	    			'toMonth'      =>  $_POST['toMonth'][$i],
	    			'toYear'       =>  $_POST['toYear'][$i],
	    			'pSEduName'    =>  $_POST['pSEduName'][$i],
	    			'pSEduCourse'  =>  $_POST['pSEduCourse'][$i], 
	    			'pSEduDegree'  =>  $_POST['pSEduDegree'][$i], 
	    			'pSEduType'    =>  $_POST['pSEduType'][$i] 
	    			);
		$obj->update('dm_lead_assesment_edu',$dataEdu,'id='.$_POST['edu_id'][$i]);
}
}

for($i=0;$i<count($_POST['dsgn_id']);$i++)
{
if($_POST['fromEmpRecMonth'][$i]=="" && $_POST['fromEmpRecYear'][$i]=="" && $_POST['toEmpRecMonth'][$i]=="" && $_POST['toEmpRecYear'][$i]=="" && $_POST['empRecName'][$i]=="" && $_POST['empRecDesign'][$i]=="" && $_POST['empRecType'][$i]=="") {

$obj->delete('dm_lead_assesment_desgn','id='.$_POST['dsgn_id'][$i]);
}
else
{
		$dataDesgn = array(
	    			'fromEmpRecMonth'    =>  $_POST['fromEmpRecMonth'][$i],
	    			'fromEmpRecYear'     =>  $_POST['fromEmpRecYear'][$i],
	    			'toEmpRecMonth'      =>  $_POST['toEmpRecMonth'][$i],
	    			'toEmpRecYear'       =>  $_POST['toEmpRecYear'][$i],
	    			'empRecName'         =>  $_POST['empRecName'][$i],
	    			'empRecDesign'       =>  $_POST['empRecDesign'][$i], 
	    			'empRecType'         =>  $_POST['empRecType'][$i]
	    			);
		$odrDesgn = $obj->update('dm_lead_assesment_desgn',$dataDesgn,'id='.$_POST['dsgn_id'][$i]);
}
}

for($i=0;$i<count($_POST['nfromMonth']);$i++)
{
if($_POST['nfromMonth'][$i]!="")
{
		$dataEdu = array(
					'skillId'      =>  $_POST['id'],
					'leadId'  	   =>  $_POST['lead'],
	    			'fromMonth'    =>  $_POST['nfromMonth'][$i],
	    			'fromYear'     =>  $_POST['nfromYear'][$i],
	    			'toMonth'      =>  $_POST['ntoMonth'][$i],
	    			'toYear'       =>  $_POST['ntoYear'][$i],
	    			'pSEduName'    =>  $_POST['npSEduName'][$i],
	    			'pSEduCourse'  =>  $_POST['npSEduCourse'][$i], 
	    			'pSEduDegree'  =>  $_POST['npSEduDegree'][$i], 
	    			'pSEduType'    =>  $_POST['npSEduType'][$i] 
	    			);
		$odrEdu = $obj->insert('dm_lead_assesment_edu',$dataEdu);
}
}		

for($i=0;$i<count($_POST['nfromEmpRecMonth']);$i++)
{
if($_POST['nfromEmpRecMonth'][$i]!="")
{
		$dataDesgn = array(
					'skillId'            =>  $_POST['id'],
					'leadId'  			 =>  $_POST['lead'],
	    			'fromEmpRecMonth'    =>  $_POST['nfromEmpRecMonth'][$i],
	    			'fromEmpRecYear'     =>  $_POST['nfromEmpRecYear'][$i],
	    			'toEmpRecMonth'      =>  $_POST['ntoEmpRecMonth'][$i],
	    			'toEmpRecYear'       =>  $_POST['ntoEmpRecYear'][$i],
	    			'empRecName'         =>  $_POST['nempRecName'][$i],
	    			'empRecDesign'       =>  $_POST['nempRecDesign'][$i], 
	    			'empRecType'         =>  $_POST['nempRecType'][$i]
	    			);
		$odrDesgn = $obj->insert('dm_lead_assesment_desgn',$dataDesgn);
}

}
	if($_POST['save'])	{ 
				header("location:lead_assesment_view.php?skill=".$_POST['id']);
	}		
	if($_POST['submit'])	{ 
				header("location:assesment_checker.php?lead=".$_POST['lead']);
	}
}
		$monthArray[0] = "January";
		$monthArray[1] = "February";
		$monthArray[2] = "March";
		$monthArray[3] = "April";
		$monthArray[4] = "May";
		$monthArray[5] = "June";
		$monthArray[6] = "July";
		$monthArray[7] = "August";
		$monthArray[8] = "September";
		$monthArray[9] = "October";
		$monthArray[10] = "November";
		$monthArray[11] = "December";


	$skil=$obj->display('dm_lead_assesment','leadId='.$_GET['id']);
	$skil1=$skil->fetch_array();
	$upchecker=$skil1['assesment'];	

$lead=$obj->display('dm_lead','id='.$_GET['id']);
$lead1=$lead->fetch_array();

?>
<style>
.modal-body {
    position: relative;
    overflow-y: auto;
    max-height: 400px;
    padding: 15px;
}
</style>



			<div class="col-sm-10">

				<form name="form_edit" action="" method="post" enctype="multipart/form-data">

					<input type="hidden" name="id" value="<?php echo $skil1['Id'];?>" />

					<input type="hidden" name="lead" value="<?php echo $_GET['id'];?>" />
					<input type="hidden" name="type" value="<?php echo $lead1['type'];?>" />



					<div class="row">

						<div class="col-sm-6 form-group" style="text-align: left;">

							<h4 class="h4-color" style="text-transform:uppercase"><?php echo $lead1['type'];?> ASSESSMENT FORM EDIT</h4>

						</div>

						<div class="col-sm-6 form-group" style="text-align: right;">

							<h4 class="h4-color"></h4>

						</div>

					</div>



					<div class="row">

						<div class="col-sm-12 form-group">

							<label>Please answer all questions carefully in block letters. 

								(* Mandatory fields)</label>

						</div>

					</div>

					



				<div class="row">

					<div class="col-sm-4 form-group"><label >First Name*:</label><input type="text" class="form-control" id="fname" name="fname" value="<?php echo $lead1['fname'];?>" readonly="" ></div>

					<div class="col-sm-4 form-group"><label >Middle Name*:</label><input type="text" class="form-control" id="mname" name="mname" value="<?php echo $lead1['mname'];?>" readonly=""  ></div>

					<div class="col-sm-4 form-group"><label >Given Name*:</label><input type="text" class="form-control" id="gname" name="gname"  value="<?php echo $lead1['lname'];?>" readonly="" ></div>

					</div>



					<div class="row">

					<div class="col-sm-4 form-group"><label >Gender*:</label>

					<select class="form-control" name="gender" readonly="">

						<option value="Male" <?php if($lead1['gender']=="Male") { echo 'selected="selected"';}?>>Male</option>

						<option value="Female" <?php if($lead1['gender']=="Female") { echo 'selected="selected"';}?>>Female</option>

					</select>

					</div>

					<div class="col-sm-4 form-group"><label >Date of Birth*:</label>

						<input type="text" class="form-control" id="dob" name="dob" value="<?php echo date('d-m-Y',strtotime($lead1['dob']));?>" readonly=""></div>

					<div class="col-sm-4 form-group"><label >Nationality:</label>

						<select class="form-control" name="citizenof" required  readonly="">  

						<?php $con2=$obj->display('dm_countries','1=1 order by name');

						while($con11=$con2->fetch_array())

						{

						 if($con11['name']==$lead1['nationality']) {

						?>

						<option value="<?php echo $con11['name'];?>"><?php echo $con11['name'];?></option>

						<?php }} ?>

						</select>

					</div>

					</div>



					<div class="row">
					<div class="col-sm-8 form-group"><label >Address*:</label><input type="text" required class="form-control" id="address" name="address" value="<?php echo $lead1['address'];?>" readonly=""></div>
					<div class="col-sm-4 form-group"><label >Mobile:</label><input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $lead1['mobile'];?>" readonly=""></div>
					</div>

					<div class="row">
						<div class="col-sm-4 form-group"><label >Landline(Home)*:</label><input type="text" class="form-control" id="phHome" name="phHome" value="<?php echo $lead1['phone'];?>"  readonly=""></div>
						<div class="col-sm-4 form-group"><label >Email:</label><input type="text" class="form-control" id="email" name="email" value="<?php echo $lead1['email'];?>" readonly=""></div>
<div class="col-sm-4 form-group"><label >Country of Birth:</label>
						<select class="form-control" name="cob" required>
						<option value="">Select</option>
						<?php $con=$obj->display('dm_countries','1=1 order by name');
						while($con1=$con->fetch_array())
						{
						?>
						<option value="<?php echo $con1['name'];?>" <?php if($skil1['cob']==$con1['name']) { echo 'selected="selected"';}?>><?php echo $con1['name'];?></option>
						<?php } ?>
						</select>
					</div>
					</div>

					<div class="row">
						<div class="col-sm-4 form-group"><label >Marital Status*:</label>
							<select class="form-control" name="marStatus"  required id="marStatus">
								<option value="Never Married" <?php if($skil1['marStatus']=="Never Married") { echo 'selected="selected"';}?>>Never Married</option>
								<option value="Married" <?php if($skil1['marStatus']=="Married") { echo 'selected="selected"';}?>>Married</option>
								<option value="Engaged" <?php if($skil1['marStatus']=="Engaged") { echo 'selected="selected"';}?>>Engaged</option>
								<option value="Divorced" <?php if($skil1['marStatus']=="Divorced") { echo 'selected="selected"';}?>>Divorced</option> 
							</select>
						</div>
						<div class="col-sm-4 form-group"><label >Do you have children? *:</label>
							<select class="form-control" name="haveChild" required>
								<option value="YES" <?php if($skil1['haveChild']=="Yes") { echo 'selected="selected"';}?>>YES</option>
								<option value="NO" <?php if($skil1['haveChild']=="No") { echo 'selected="selected"';}?>>NO</option>
							</select>
						</div>
						<div class="col-sm-4 form-group"><label >No. of children:</label>
							<select class="form-control" name="noOfChild">
								<?php for($i=0;$i<=5;$i++){ ?>
										<option value="<?php echo $i; ?>" <?php if($skil1['noOfChild']==$i) { echo 'selected="selected"';}?>><?php echo $i; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>

<div id="spouse" style=" <?php if($skil1['marStatus']=="Married") { echo 'display:block';} else { echo 'display:none';} ?>">

<h4>Spouse Details</h4>

<div class="row">

				<div class="col-sm-4 form-group"><label>First Name*:</label><input type="text" class="form-control" id="fname" name="spfname" value="<?php echo $skil1['spfname'];?>"  ></div>
				<div class="col-sm-4 form-group"><label>Middle Name*:</label><input type="text" class="form-control" id="mname" name="spmname" value="<?php echo $skil1['spmname'];?>"  ></div>
				<div class="col-sm-4 form-group"><label>Given Name*:</label><input type="text" class="form-control" id="gname" name="spgname" value="<?php echo $skil1['splname'];?>"  ></div>
</div>

					<div class="row">

					<div class="col-sm-4 form-group"><label >Sex*:</label>
					<select class="form-control" name="spgender" >
						<option value="Male" <?php if($skil1['spgender']=="Male") { echo 'selected="selected"';}?>>Male</option>
						<option value="Female" <?php if($skil1['spgender']=="Female") { echo 'selected="selected"';}?>>Female</option>
					</select>
					</div>

					<div class="col-sm-4 form-group"><label >Date of Birth*:</label>
						<input type="text" class="form-control" id="dob" name="spdob" value="<?php echo date('d-m-Y',strtotime($skil1['spdob']));?>" >
					</div>
				
				<div class="col-sm-4 form-group"><label >Nationality:</label>
						<select class="form-control" name="spcitizenof" >  
						<?php $con2=$obj->display('dm_countries','1=1 order by name');
						while($con11=$con2->fetch_array())
						{
						?>
						<option value="<?php echo $con11['name'];?>" <?php if($skil1['spcitizenof']==$con11['name']) { echo 'selected="selected"';}?>><?php echo $con11['name'];?></option>
						<?php } ?>
						</select>
					</div>
					
					</div>

					<div class="row">
					
					<div class="col-sm-8 form-group"><label >Address*:</label><input type="text" class="form-control" id="address" name="spaddress"  value="<?php echo $skil1['spaddress'];?>"></div>
					<div class="col-sm-4 form-group"><label >Mobile:</label><input type="text" class="form-control" id="mobile" name="spmobile"  value="<?php echo $skil1['spmobile'];?>"></div>
					</div>


					<div class="row">

						<div class="col-sm-4 form-group"><label >Landline(Home)*:</label><input type="text"  class="form-control" id="phHome" name="spphHome"  value="<?php echo $skil1['spphHome'];?>"></div>

						
						<div class="col-sm-4 form-group"><label >Email:</label><input type="text" class="form-control" id="email" name="spemail" value="<?php echo $skil1['spemail'];?>" ></div>
						
						<div class="col-sm-4 form-group"><label >Country of Birth:</label>

						<select class="form-control" name="spcob" >

						<?php $con=$obj->display('dm_countries','1=1 order by name');

						while($con1=$con->fetch_array())

						{

						?>

						<option value="<?php echo $con1['name'];?>" <?php if($skil1['spcob']==$con1['name']) { echo 'selected="selected"';}?>><?php echo $con1['name'];?></option>

						<?php } ?>

						</select>

					</div>

					</div>



</div>



					<div class="row">

						<div class="col-sm-12 form-group"><label >

							Do you or your spouse have relative in Canada/Australia/NewZealand/USA/Denmark(Spouse,Fiancé,Partner,Parents,Brother, Sister, Grandparents, Grandchildren, Brother, Sister, Nephew, Uncle and Aunt)? If Yes, please give details:</label>

						</div>

						<div class="col-sm-12 form-group"><table class="table table-bordered table-custom-pre">

						  <thead>

						    <tr>

						      <th scope="col" class="align-top">Name</th>

						      <th scope="col" class="align-top thead-span">Blood Relationship </br><span>(Related to you as...)</span></th>

						      <th scope="col" class="align-top">Country</th>

						      <th scope="col" class="align-top thead-span">Address </br><span>(Specify Postal Code)</span></th>

						      <th scope="col" class="align-top thead-span">Status </br><span>(Citizen or Permanent Resident)</span></th>

						    </tr>

						  </thead>

						  <tbody>

						  	<tr>

						      <td><input type="text" class="form-control" id="relName" name="relName" rows="1" value="<?php echo $skil1['relName'];?>"></td>

						      <td><input type="text" class="form-control" id="reRelation" name="reRelation" rows="1" value="<?php echo $skil1['reRelation'];?>"></td>

						      <td><input type="text" class="form-control" id="reCountry" name="reCountry" rows="1" value="<?php echo $skil1['reCountry'];?>"></td>

						      <td><input type="text" class="form-control" id="reAddress" name="reAddress" rows="1" value="<?php echo $skil1['reAddress'];?>"></td>

						      <td><input type="text" class="form-control" id="reStatus" name="reStatus" rows="1" value="<?php echo $skil1['reStatus'];?>"></td>

						    </tr>

						  </tbody>

						</table></div> 

						

					</div>
					<?php if ($upchecker=='No' || is_null($upchecker) || $upchecker=='3' || $upchecker=="")
					{?>


					<div class="row">

						<div class="col-sm-12 form-group"><label >

							Provide details of your Post-Secondary Education (Academic,Professional,orTechnical)from Secondary Schoolon wards with dates, names and addresses of institutions attended, courses taken up and Degree/Diploma/Certificate received. Indicateall*:</label>

						</div>

						<div class="col-sm-12 form-group">

						  <table class="table table-bordered table-custom-pre" id="tbl">

						  <thead>

						    <tr>

						      <th scope="col" class="align-top" style="text-align: center;">From</th>

						      <th scope="col" class="align-top" style="text-align: center;">To</th>

						      <th scope="col" class="align-top thead-span">Name and Address of the Institutions<span>(school/College) </span>& University</th>

						      <th scope="col" class="align-top">Courses Taken </br><span>(Subjects)</span></th>

						      <th scope="col" class="align-top thead-span">Diploma / Degree / Certificate</th>

						      <th scope="col" class="align-top thead-span">Full / Part time / Correspondence</th>

						    </tr>

						  </thead>

						  <tbody id="eduBody_a">

						  <?php 

						  $j=1; 

						  $edu=$obj->display('dm_lead_assesment_edu','skillId='.$skil1['Id']);

						  while($edu1=$edu->fetch_array())

						  {

						  ?>

						  	<tr>

						  		<td class="select-yr-mnt">		

								<input type="hidden" name="edu_id[]" value="<?php echo $edu1['id'];?>"	 />		  		

									<select name="fromMonth[]" id="fromMonth<?php echo $j;?>" class="mnth" <?php if($j==1) {?> required <?php } ?> >

									    <option value="">Month</option>

									    <?php for($m = 0; $m <= 11; $m++) {?>													

										<option value="<?php echo $monthArray[$m]; ?>"  <?php if($edu1['fromMonth']==$monthArray[$m]) { echo 'selected="selected"';}?>><?php echo $monthArray[$m]; ?></option>

										<?php } ?>

									</select>



									<select name="fromYear[]" id="fromYear<?php echo $j;?>" class="yrr" <?php if($j==1) {?> required <?php } ?> >

									    <option value="">Year</option>

									    <?php $y = date("Y"); for($i=1900;$i<=$y;$i++){ ?>

													<option value="<?php echo $i; ?>" <?php if($edu1['fromYear']==$i) { echo 'selected="selected"';}?>><?php echo $i; ?></option>

												<?php } ?>

									</select>

								</td>

							    <td class="select-yr-mnt">

							      	<select name="toMonth[]" id="toMonth<?php echo $j;?>" class="mnth" <?php if($j==1) {?> required <?php } ?>>

									    <option value="">Month</option>

									    <?php for($m = 0; $m <= 11; $m++) { ?>

													<option value="<?php echo $monthArray[$m]; ?>"  <?php if($edu1['toMonth']==$monthArray[$m]) { echo 'selected="selected"';}?>><?php echo $monthArray[$m]; ?></option>

												<?php } ?>

									</select>



									<select name="toYear[]" id="toYear<?php echo $j;?>" class="yrr" <?php if($j==1) {?> required <?php } ?>>

									    <option value="">Year</option>

									    <?php $y = date("Y"); for($i=1900;$i<=$y;$i++){ ?>

													<option value="<?php echo $i; ?>" <?php if($edu1['toYear']==$i) { echo 'selected="selected"';}?>><?php echo $i; ?></option>

												<?php } ?>

									</select>

							    </td>

							    <td><input type="text" class="form-control" id="pSEduName<?php echo $j;?>" name="pSEduName[]" <?php if($j==1) {?> required <?php } ?> value="<?php echo $edu1['pSEduName'];?>" ></td>

							    <td><input type="text" class="form-control" id="pSEduCourse<?php echo $j;?>" name="pSEduCourse[]" <?php if($j==1) {?> required <?php } ?> value="<?php echo $edu1['pSEduCourse'];?>" ></td>

							    <td><input type="text" class="form-control" id="pSEduDegree<?php echo $j;?>" name="pSEduDegree[]" <?php if($j==1) {?> required <?php } ?> value="<?php echo $edu1['pSEduDegree'];?>" ></td>

							    <td><input type="text" class="form-control" id="pSEduType<?php echo $j;?>" name="pSEduType[]" <?php if($j==1) {?> required <?php } ?> value="<?php echo $edu1['pSEduType'];?>" >

	<?php if($edu->num_rows==$j) { echo '<button onclick="add_a_row()" type="button" class=""> Add New </button>';}?>							

								</td>

						    </tr>

						    

						    <?php $j++;} ?>

						    

						  </tbody>

						</table></div>

						

					</div>



					<div class="row">

						<div class="col-sm-12 form-group"><label >

							Please provide detailed employment record with dates, Names & Address of employers and designation held*:</label>

						</div>

						<div class="col-sm-12 form-group">

						  <table class="table table-bordered table-custom-pre" id="tbl">

						  <thead>

						    <tr>

						      <th scope="col" class="align-top" style="text-align: center;">From</th>

						      <th scope="col" class="align-top" style="text-align: center;">To</th>

						      <th scope="col" class="align-top thead-span">Name and Address of the Employers</th>

						      <th scope="col" class="align-top">Designation</th>

						      <th scope="col" class="align-top thead-span">Full/ Part time/ Correspondence</th>

						    </tr>

						  </thead>

						  <tbody id="eduBody_b">

						  <?php 

						  $k=1;

						  $dsgn=$obj->display('dm_lead_assesment_desgn','skillId='.$skil1['Id']);

						  while($dsgn1=$dsgn->fetch_array())

						  {

						  ?>

						  	<tr>

						  		<td class="select-yr-mnt">					  		

								<input type="hidden" name="dsgn_id[]" value="<?php echo $dsgn1['id'];?>"	 />		  		

									<select name="fromEmpRecMonth[]" id="fromEmpRecMonth<?php echo $k;?>" class="mnth"  <?php if($k==1) {?> required <?php } ?>>

									    <option value="">Month</option>

									    <?php 

									    	for($m = 0; $m <= 11; $m++) {

												?>

													<option value="<?php echo $monthArray[$m]; ?>"  <?php if($dsgn1['fromEmpRecMonth']==$monthArray[$m]) { echo 'selected="selected"';}?>><?php echo $monthArray[$m]; ?></option>

												<?php

											}

										?>

									</select>



									<select name="fromEmpRecYear[]" id="fromEmpRecYear<?php echo $k;?>" class="yrr" <?php if($k==1) {?> required <?php } ?> />

									    <option value="">Year</option>

									    <?php 

									    	$y = date("Y");

											for($i=1900;$i<=$y;$i++){

												?>

										<option value="<?php echo $i; ?>" <?php if($dsgn1['fromEmpRecYear']==$i) { echo 'selected="selected"';}?>><?php echo $i; ?></option>



												<?php

											}

										?>

									</select>

								</td>

							    <td class="select-yr-mnt">

							      	<select name="toEmpRecMonth[]" id="toEmpRecMonth<?php echo $k;?>" class="mnth" <?php if($k==1) {?> required <?php } ?>>

									    <option value="">Month</option>

									    <?php 

									    	for($m = 0; $m <= 11; $m++) {

												?>

												<option value="<?php echo $monthArray[$m]; ?>"  <?php if($dsgn1['toEmpRecMonth']==$monthArray[$m]) { echo 'selected="selected"';}?>><?php echo $monthArray[$m]; ?></option>

												<?php

											}

										?>

									</select>



									<select name="toEmpRecYear[]" id="toEmpRecYear<?php echo $k;?>" class="yrr"  <?php if($k==1) {?> required <?php } ?>>

									    <option value="">Year</option>

									    <?php 

									    	$y = date("Y");

											for($i=1900;$i<=$y;$i++){

												?>

										<option value="<?php echo $i; ?>" <?php if($dsgn1['toEmpRecYear']==$i) { echo 'selected="selected"';}?>><?php echo $i; ?></option>

												<?php

											}

										?>

									</select>

							    </td>

							    <td><input type="text" class="form-control" id="empRecName<?php echo $k;?>" name="empRecName[]" <?php if($k==1) {?> required <?php } ?> value="<?php echo $dsgn1['empRecName'];?>"></td>

							    <td><input type="text" class="form-control" id="empRecDesign<?php echo $k;?>" name="empRecDesign[]" <?php if($k==1) {?> required <?php } ?>  value="<?php echo $dsgn1['empRecDesign'];?>"></td>

							    <td><input type="text" class="form-control" id="empRecType<?php echo $k;?>" name="empRecType[]" <?php if($k==1) {?> required <?php } ?> value="<?php echo $dsgn1['empRecType'];?>" >

	<?php if($dsgn->num_rows==$k) { echo '<button onclick="add_b_row()" type="button" class=""> Add New </button>';}?>							

								

								</td>

						    </tr>

						    <?php $k++;}?>

						    

						  </tbody>

						</table></div>

						

					</div>
 <?php if($lead1['type']=="Business") {?>					

					<div class="row">

						<div class="col-sm-6 form-group"><label>Movable Assets</label>

						<input type="text" name="moveAsset" class="form-control" required value="<?php echo $skil1['moveAsset'];?>"/>

						</div>

						<div class="col-sm-6 form-group"><label>Inmovable Assets</label>

						<input type="text" name="inmoveAsset" class="form-control" required value="<?php echo $skil1['inmoveAsset'];?>"/>

						</div>

					</div>	

					<div class="row">

						<div class="col-sm-4 form-group"><label>Interested in?</label>

							<select class="form-control" name="interestIn" required>

								<option value="Looking for PR" <?php if($skil1['interestIn']=="Looking for PR") { echo 'selected="selected"';}?>>Looking for PR </option>

								<option value="Looking to Start Business" <?php if($skil1['interestIn']=="Looking to Start Business") { echo 'selected="selected"';}?>>Looking to Start Business </option>

								<option value="Looking to Get Citizenship" <?php if($skil1['interestIn']=="Looking to Get Citizenship") { echo 'selected="selected"';}?>>Looking to Get Citizenship  </option>

							</select>

						</div> 

						<div class="col-sm-4 form-group"><label>Ownership of Business (Percent Wise)?</label>

						<input type="text" name="ownership" class="form-control" required value="<?php echo $skil1['ownership'];?>"/>

						</div>

					</div> 
<?php }
} ?>
<div class="row">

<!-- Trigger the modal with a button -->
<button class="btn btn-success openobs">Get Observation Sheet</button>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Observation Sheet</h4>
</div>
<div class="modal-body">

</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

<!-- end of Modal -->
</div>
<br/>

<?php if ($upchecker=='Yes')
{
?>

                    <div class="row">
						<div class="col-sm-12 form-group">
							<label style="width:100%">Upload assesment form or CV.<?php if($skil1['document']!="") {?> <a href="uploads/file/<?=$skil1['document'];?>" target="_blank" style="float:right">View</a><?php }?></label>
							<input type="file" class="form-control" id="document" name="document" >
					    </div>
				    </div>
				<?php }?>

					<div class="row">	

						<div class="col-sm-12 form-group">
<?php 
if($lead1['paidYet']==0 && ($_SESSION['TYPE']=="RM" || $_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="FMP" || $_SESSION['TYPE']=="DGM" || $_SESSION['TYPE']=="RMSM" || $_SESSION["TYPE"]=="IC" || $_SESSION["TYPE"]=="SIC" || $_SESSION["TYPE"]=="MC")) {
?>	
<input type="submit" name="save" value="SAVE" class="btn btn-info">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 

<?php 
}
$aset = $obj->display('dm_lead_observation', 'leadId='.$_GET["id"]);
if($aset->num_rows==0) {
?>	
<input type="submit" name="submit" value="SUBMIT" class="btn btn-info" id="submit-btn-info" > 	
<?php } else { ?>
<a href="<?php echo 'lead_observation_sheet_edit.php?id='.$_GET["id"];?>" class="btn btn-info float-right">NEXT</a> 	
<?php } ?>		

</div>			

</div>

				</form>

			</div>

		

<?php 	include_once("footer.php");	?>

<script>

$(function(){

		$('#dob').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 

		$('#spdob').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 

		

	$('#marStatus').change(function(){

		var a = $(this).val();

		if(a=="Married"){ $('#spouse').show(); } else { $('#spouse').hide();}

	});

}); 

</script>

<script>

var x = <?php echo $j;?>;



function add_a_row(){



var row = $('<tr id="appndd_a_tr'+ x +'"><td class="select-yr-mnt"><select name="nfromMonth[]" id="month" class="mnth" required><option value="">Month</option><?php for($m = 0; $m <= 11; $m++) { ?><option value="<?php echo $monthArray[$m]; ?>"><?php echo $monthArray[$m]; ?></option><?php } ?></select><select name="nfromYear[]" id="year" class="yrr" required><option value="">Year</option><?php $y = date("Y"); for($i=1900;$i<=$y;$i++){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td><td class="select-yr-mnt"><select name="ntoMonth[]" id="month2" class="mnth" required><option value="">Month</option><?php for($m = 0; $m <= 11; $m++) { ?><option value="<?php echo $monthArray[$m]; ?>"><?php echo $monthArray[$m]; ?></option><?php } ?></select><select name="ntoYear[]" id="year2" class="yrr" required><option value="">Year</option><?php $y = date("Y"); for($i=1900;$i<=$y;$i++){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td><td><input type="text" required class="form-control" id="phHome" name="npSEduName[]" ></td><td><input type="text" required class="form-control" id="phHome" name="npSEduCourse[]" ></td><td><input type="text" required class="form-control" id="phHome" name="npSEduDegree[]"></td><td><input type="text" required class="form-control" id="phHome" name="npSEduType[]"><button type="button" onclick="remove_a_row('+ x +')" class="">Remove</button></td></tr>');



row.appendTo("#eduBody_a");



x++;

}

function remove_a_row(a){

		$('#appndd_a_tr'+a).remove();

}



var y = <?php echo $k;?>;



function add_b_row(){



var row = $('<tr id="appndd_b_tr'+ y +'"><td class="select-yr-mnt"><select name="nfromEmpRecMonth[]" id="month" class="mnth" required><option value="">Month</option><?php for($m = 0; $m <= 11; $m++) { ?><option value="<?php echo $monthArray[$m]; ?>"><?php echo $monthArray[$m]; ?></option><?php } ?></select><select name="nfromEmpRecYear[]" id="year" class="yrr" required><option value="">Year</option><?php $y = date("Y"); for($i=1900;$i<=$y;$i++){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td><td class="select-yr-mnt"><select name="ntoEmpRecMonth[]" id="month2" class="mnth" required><option value="">Month</option><?php for($m = 0; $m <= 11; $m++) { ?><option value="<?php echo $monthArray[$m]; ?>"><?php echo $monthArray[$m]; ?></option><?php } ?></select><select name="ntoEmpRecYear[]" id="year2" class="yrr" required><option value="">Year</option><?php $y = date("Y"); for($i=1900;$i<=$y;$i++){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td><td><input type="text" required class="form-control" id="empRecName" name="nempRecName[]" ></td><td><input type="text" required class="form-control" id="empRecDesign" name="nempRecDesign[]"></td><td><input type="text" required class="form-control" id="empRecType" name="nempRecType[]" ><button type="button" onclick="remove_b_row('+ y +')" class="">Remove</button></td></tr>');



row.appendTo("#eduBody_b");



y++;

}

function remove_b_row(b){

		$('#appndd_b_tr'+b).remove();

}

</script>
<script>
$('.openobs').on('click',function(){
    $('.modal-body').load('lead_obs_c.php?lead=<?php echo $_GET['lead'];?>',function(){
        $('#myModal').modal({show:true});
    });
});
</script>


