<?php 	
include_once("header.php");
if($_POST['save'] || $_POST['submit'])
{
	if ( 0 < $_FILES['document']['error'] ) 
	{
        echo 'Error: ' . $_FILES['document']['error'] . '<br>';
    }
    else 
	{
		$filename=time().'_'.$_FILES['document']['name'];
        move_uploaded_file($_FILES['document']['tmp_name'], 'uploads/file/' . $filename);
    }
		$data = array(
					'leadId'  	   =>  $_GET['lead'],
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
	    			'relName'      =>  $_POST['relName'],
	    			'reRelation'   =>  $_POST['reRelation'],
	    			'reCountry'    =>  $_POST['reCountry'],
	    			'reAddress'    =>  $_POST['reAddress'],
	    			'reStatus'     =>  $_POST['reStatus'],
	    			'moveAsset'    =>  $_POST['moveAsset'],
	    			'inmoveAsset'	=>  $_POST['inmoveAsset'],
	    			'interestIn'   =>  $_POST['interestIn'], 
	    			'ownership'   =>  $_POST['ownership'],
	    			'assesment' => $_POST['assesment'],
	    			'document'=>$filename
					);

		$odr = $obj->insert('dm_lead_assesment',$data);//die;
if($odr)

{

			$data2 = array(

	    			'stepComplete'   =>  2

	    			);

			$obj->update('dm_lead',$data2,'id='.$_GET['lead']);

			

for($i=0;$i<count($_POST['fromMonth']);$i++)
{

if($_POST['fromMonth'][$i]!="")

{

		$dataEdu = array(
					'skillId'      =>  $odr,
					'leadId'  	   =>  $_GET['lead'],
	    			'fromMonth'    =>  $_POST['fromMonth'][$i],
	    			'fromYear'     =>  $_POST['fromYear'][$i],
	    			'toMonth'      =>  $_POST['toMonth'][$i],
	    			'toYear'       =>  $_POST['toYear'][$i],
	    			'pSEduName'    =>  $_POST['pSEduName'][$i],
	    			'pSEduCourse'  =>  $_POST['pSEduCourse'][$i], 
	    			'pSEduDegree'  =>  $_POST['pSEduDegree'][$i], 
	    			'pSEduType'    =>  $_POST['pSEduType'][$i] 
	    			);
		$odrEdu = $obj->insert('dm_lead_assesment_edu',$dataEdu);
}

}		

for($i=0;$i<count($_POST['fromEmpRecMonth']);$i++)

{

if($_POST['fromEmpRecMonth'][$i]!="")
{
		$dataDesgn = array(
					'skillId'            =>  $odr,
					'leadId'  			 =>  $_GET['lead'],
	    			'fromEmpRecMonth'    =>  $_POST['fromEmpRecMonth'][$i],
	    			'fromEmpRecYear'     =>  $_POST['fromEmpRecYear'][$i],
	    			'toEmpRecMonth'      =>  $_POST['toEmpRecMonth'][$i],
	    			'toEmpRecYear'       =>  $_POST['toEmpRecYear'][$i],
	    			'empRecName'         =>  $_POST['empRecName'][$i],
	    			'empRecDesign'       =>  $_POST['empRecDesign'][$i], 
	    			'empRecType'         =>  $_POST['empRecType'][$i]
	    			);
		$odrDesgn = $obj->insert('dm_lead_assesment_desgn',$dataDesgn);
}

}		

		if($_POST['save'])	{ 
			header("location:lead_assesment_view.php?skill=".$odr);
		}		

		if($_POST['submit'])	{ 
			header("location:assesment_checker.php?lead=".$_GET['lead']);
		}		

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


$lead=$obj->display('dm_lead','id='.$_GET['lead']);
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

				<form action="" method="post" enctype="multipart/form-data">

					<input type="hidden" name="type" value="<?php echo $lead1['type'];?>" />

					<div class="row">

						<div class="col-sm-6 form-group" style="text-align: left;">

							<h4 class="h4-color"><?php echo $lead1['type'];?> ASSESSMENT FORM</h4>

						</div>

						<div class="col-sm-6 form-group" style="text-align: right;">

							<h4 class="h4-color"></h4>

						</div>

					</div>



					<div class="row">

						<div class="col-sm-12 form-group">

							<label>Please answer all questions carefully in block letters. </br>

								(* Mandatory fields)</label>

						</div>

					</div>

					



					<div class="row">

					<div class="col-sm-4 form-group"><label >First Name*:</label><input type="text" class="form-control" id="fname" name="fname" required value="<?php echo $lead1['fname'];?>" readonly="" ></div>

					<div class="col-sm-4 form-group"><label >Middle Name*:</label><input type="text" class="form-control" id="mname" name="mname" value="<?php echo $lead1['mname'];?>" readonly=""  ></div>

					<div class="col-sm-4 form-group"><label >Given Name*:</label><input type="text" class="form-control" id="gname" name="gname"  value="<?php echo $lead1['lname'];?>" readonly="" ></div>

					</div>



					<div class="row">

					<div class="col-sm-4 form-group"><label >Gender*:</label>

					<select class="form-control" name="gender" required  readonly="">

						<option value="Male" <?php if($lead1['gender']=="Male") { echo 'selected="selected"';}?>>Male</option>

						<option value="Female" <?php if($lead1['gender']=="Female") { echo 'selected="selected"';}?>>Female</option>

					</select>

					</div>

					<div class="col-sm-4 form-group"><label >Date of Birth*:</label>

						<input type="text" class="form-control" id="dob" name="dob" required value="<?php echo date('d-m-Y',strtotime($lead1['dob']));?>" readonly=""></div>

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


						<div class="col-sm-4 form-group"><label >Email:</label><input type="text" required class="form-control" id="email" name="email" value="<?php echo $lead1['email'];?>" readonly=""></div>

<div class="col-sm-4 form-group"><label >Country of Birth:</label>

						<select class="form-control" name="cob" required>

						<option value="">Select</option>

						<?php $con=$obj->display('dm_countries','1=1 order by name');

						while($con1=$con->fetch_array())

						{

						?>

						<option value="<?php echo $con1['name'];?>"><?php echo $con1['name'];?></option>

						<?php } ?>

						</select>

					</div>

					</div>

					

					



					<div class="row">

						<div class="col-sm-4 form-group"><label >Marital Status*:</label>

							<select class="form-control" name="marStatus" required id="marStatus">

								<option value="">Select</option>

								<option value="Never Married">Never Married</option>

								<option value="Married">Married</option>

								<option value="Engaged">Engaged</option>

								<option value="Divorced">Divorced</option> 

							</select>

						</div>

						<div class="col-sm-4 form-group"><label >Do you have children? *:</label>

							<select class="form-control" name="haveChild" required>

								<option value="">Select</option>

								<option value="YES">YES</option>

								<option value="NO">NO</option>

							</select>

						</div>

						<div class="col-sm-4 form-group"><label >No. of children:</label>

							<select class="form-control" name="noOfChild">

								<?php 

									for($i=0;$i<=5;$i++){

										?>

											<option value="<?php echo $i; ?>"><?php echo $i; ?></option>

										<?php

									}

								?>

							</select>

						</div>

					</div>



<div id="spouse" style="display:none">

<h4>Spouse Details</h4>

<div class="row">

	<div class="col-sm-4 form-group"><label >First Name*:</label><input type="text" class="form-control" id="spfname" name="spfname"  /></div>

	<div class="col-sm-4 form-group"><label >Middle Name*:</label><input type="text" class="form-control" id="spmname" name="spmname"></div>

	<div class="col-sm-4 form-group"><label >Given Name*:</label><input type="text" class="form-control" id="spgname" name="spgname" /></div>

	</div>



	<div class="row">

	<div class="col-sm-4 form-group"><label >Sex*:</label>

	<select class="form-control" name="spgender" >

		<option value="">Select</option>

		<option value="Male">Male</option>

		<option value="Female">Female</option>

	</select>

	</div>

	<div class="col-sm-4 form-group"><label >Date of Birth*:</label>

		<input type="text" class="form-control" id="spdob" name="spdob" ></div>
<div class="col-sm-4 form-group"><label >Nationality:</label>

		<select class="form-control" name="spcitizenof" >  

		<option value="">Select</option>

		<?php $con=$obj->display('dm_countries','1=1 order by name');

		while($con1=$con->fetch_array())

		{

		?>

		<option value="<?php echo $con1['name'];?>"><?php echo $con1['name'];?></option>

		<?php } ?>

		</select>

	</div>

	

	</div>



	<div class="row">


	<div class="col-sm-8 form-group"><label >Current mailing Address*:</label><input type="text"  class="form-control" id="spaddress" name="spaddress"></div>

	<div class="col-sm-4 form-group"><label >Mobile:</label><input type="text" class="form-control" id="spmobile" name="spmobile"></div>

	</div>



	<div class="row">

		<div class="col-sm-4 form-group"><label >Landline(Home)*:</label><input type="text" class="form-control" id="spphHome" name="spphHome" ></div>

		<div class="col-sm-4 form-group"><label >Email:</label><input type="text" class="form-control" id="spemail" name="spemail"></div>

<div class="col-sm-4 form-group"><label >Country of Birth:</label>

		<select class="form-control" name="spcob">

		<option value="">Select</option>

		<?php $con=$obj->display('dm_countries','1=1 order by name');

		while($con1=$con->fetch_array())

		{

		?>

		<option value="<?php echo $con1['name'];?>"><?php echo $con1['name'];?></option>

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

						      <th scope="col" class="align-top thead-span">Address (Specify Postal Code)</span></th>

						      <th scope="col" class="align-top thead-span">Status (Citizen or Permanent Resident)</span></th>

						    </tr>

						  </thead>

						  <tbody>

						  	<tr>

						      <td><input type="text" class="form-control" id="relName" name="relName" rows="1"></td>

						      <td><input type="text" class="form-control" id="reRelation" name="reRelation" rows="1"></td>

						      <td><input type="text" class="form-control" id="reCountry" name="reCountry" rows="1"></td>

						      <td><input type="text" class="form-control" id="reAddress" name="reAddress" rows="1"></td>

						      <td><input type="text" class="form-control" id="reStatus" name="reStatus" rows="1"></td>

						    </tr>

						  </tbody>

						</table></div> 

						

					</div>
					<div class="row">

					<!-- Trigger the modal with a button -->
					<button class="btn btn-success openobs">Get Observation Sheet</button>

					<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Observation Sheet</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
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

					<div class="row">

						<div class="col-sm-12 form-group"><label >Do you want to upload Assesment</label>

							<select class="form-control" name="assesment" required id="gvalue">

								<option value="">Select</option>

								<option value="Yes">Yes</option>

								<option value="No">No</option>

							</select>

						</div>


					<div class="row">
						<div id="notupload" style="display:none">

						<div class="col-sm-12 form-group"><label >

							Provide details of your Post-Secondary Education (Academic,Professional,orTechnical)from Secondary Schoolon wards with dates, names and addresses of institutions attended, courses taken up and Degree/Diploma/Certificate received. Indicateall*:</label>

						</div>

						<div class="col-sm-12 form-group">

						  <table class="table table-bordered table-custom-pre" id="tbl">

						  <thead>

						    <tr>

						      <th scope="col" class="align-top" style="text-align: center;">From</th>

						      <th scope="col" class="align-top" style="text-align: center;">To</th>

						      <th scope="col" class="align-top thead-span">Name and Address of the Institutions </br><span>(school/College) </span>& University</th>

						      <th scope="col" class="align-top">Courses Taken </br><span>(Subjects)</span></th>

						      <th scope="col" class="align-top thead-span">Diploma/Degree/ Certificate</th>

						      <th scope="col" class="align-top thead-span">Full/Part time/ Correspondence</th>

						    </tr>

						  </thead>

						  <tbody id="eduBody_a">

						  	<tr>

						  		<td class="select-yr-mnt">					  		

									<select name="fromMonth[]" id="fromMonth1" class="mnth">

									    <option value="">Month</option>

									    <?php for($m = 0; $m <= 11; $m++) { ?>

											<option value="<?php echo $monthArray[$m]; ?>"><?php echo $monthArray[$m]; ?></option>

										<?php } ?>

									</select>



									<select name="fromYear[]" id="fromYear1" class="yrr">

									    <option value="">Year</option>

									    <?php $y = date("Y"); for($i=1900;$i<=$y;$i++){ ?>

											<option value="<?php echo $i; ?>">

												<?php echo $i; ?>

											</option>

										<?php } ?>

									</select>

								</td>

							    <td class="select-yr-mnt">

							      	<select name="toMonth[]" id="toMonth1" class="mnth">

									    <option value="">Month</option>

									     <?php for($m = 0; $m <= 11; $m++) { ?>

													<option value="<?php echo $monthArray[$m]; ?>"><?php echo $monthArray[$m]; ?></option>

										<?php } ?>

									</select>



									<select name="toYear[]" id="toYear1" class="yrr">

									    <option value="">Year</option>

									     <?php $y = date("Y"); for($i=1900;$i<=$y;$i++){ ?>

											<option value="<?php echo $i; ?>">

												<?php echo $i; ?>

											</option>

										<?php } ?>

									</select>

							    </td>

							    <td><input type="text" class="form-control" id="pSEduName1" name="pSEduName[]" ></td>

							    <td><input type="text" class="form-control" id="pSEduCourse1" name="pSEduCourse[]" ></td>

							    <td><input type="text" class="form-control" id="pSEduDegree1" name="pSEduDegree[]" ></td>

							    <td><input type="text" class="form-control" id="pSEduType1" name="pSEduType[]" ><button onclick="add_a_row()" type="button" class=""> Add New </button></td>

						    </tr>

						    

						    

						    

						  </tbody>

						</table></div>

						

					</div>



					<div class="row" id="emp" style="display:none">

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

						  	<tr>

						  		<td class="select-yr-mnt">					  		

									<select name="fromEmpRecMonth[]" id="fromEmpRecMonth1" class="mnth">

									    <option value="">Month</option>

									    <?php 

									    	for($m = 0; $m <= 11; $m++) {

												?>

													<option value="<?php echo $monthArray[$m]; ?>"><?php echo $monthArray[$m]; ?></option>

												<?php

											}

										?>

									</select>



									<select name="fromEmpRecYear[]" id="fromEmpRecYear1" class="yrr">

									    <option value="">Year</option>

									    <?php 

									    	$y = date("Y");

											for($i=1900;$i<=$y;$i++){

												?>

													<option value="<?php echo $i; ?>">

														<?php echo $i; ?>

													</option>

												<?php

											}

										?>

									</select>

								</td>

							    <td class="select-yr-mnt">

							      	<select name="toEmpRecMonth[]" id="toEmpRecMonth1" class="mnth">

									    <option value="">Month</option>

									    <?php 

									    	for($m = 0; $m <= 11; $m++) {

												?>

													<option value="<?php echo $monthArray[$m]; ?>"><?php echo $monthArray[$m]; ?></option>

												<?php

											}

										?>

									</select>



									<select name="toEmpRecYear[]" id="toEmpRecYear1" class="yrr">

									    <option value="">Year</option>

									    <?php 

									    	$y = date("Y");

											for($i=1900;$i<=$y;$i++){

												?>

													<option value="<?php echo $i; ?>">

														<?php echo $i; ?>

													</option>

												<?php

											}

										?>

									</select>

							    </td>

							    <td><input type="text" class="form-control" id="empRecName1" name="empRecName[]" ></td>

							    <td><input type="text" class="form-control" id="empRecDesign1" name="empRecDesign[]" ></td>

							    <td><input type="text" class="form-control" id="empRecType1" name="empRecType[]" ><button onclick="add_b_row()" type="button" class=""> Add New </button></td>

						    </tr>

						    

						    

						  </tbody>

						</table></div>

						

					</div>

<?php if($lead1['type']=="Business") {?>					

					<div class="row">

						<div class="col-sm-6 form-group"><label>Movable Assets</label>

						<input type="text" name="moveAsset" class="form-control" required/>

						</div>

						<div class="col-sm-6 form-group"><label>Inmovable Assets</label>

						<input type="text" name="inmoveAsset" class="form-control" required/>

						</div>

					</div>	

					<div class="row">

						<div class="col-sm-4 form-group"><label>Interested in?</label>

							<select class="form-control" name="interestIn" required>

								<option value="">Select</option>

								<option value="Looking for PR ">Looking for PR </option>

								<option value="Looking to Start Business ">Looking to Start Business </option>

								<option value="Looking to Get Citizenship ">Looking to Get Citizenship  </option>

							</select>

						</div> 

						<div class="col-sm-4 form-group"><label>Ownership of Business (Percent Wise)?</label>

						<input type="text" name="ownership" class="form-control" required/>

						</div>

					</div>
				</div>

<?php } ?>

                    <div class="row">
						<div class="col-sm-12 form-group" id="upload" style="display:none">
							<label style="width:100%">Upload assesment form or CV.<?php if($skil1['document']!="") {?> <a href="uploads/file/<?=$skil1['document'];?>" target="_blank" style="float:right">View</a><?php }?></label>
							<input type="file" class="form-control" id="document" name="document">
					    </div>

					<div class="row">	

						<div class="col-sm-12 form-group">

			<input type="submit" name="save" value="SAVE" class="btn btn-info">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 

			<input type="submit" name="submit" value="SUBMIT" class="btn btn-info"> 	

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

	$('#gvalue').change(function(){
		var u= $(this).val();
		if(u=="Yes"){ $('#upload').show();} else{ $('#upload').hide();}
		if(u=="No"){ $('#notupload').show();} else{$('#notupload').hide();}
		if(u=="No"){ $('#emp').show();} else{$('#emp').hide();}
	

	});

}); 

</script>

<script>

var x = 2;



function add_a_row(){



var row = $('<tr id="appndd_a_tr'+ x +'"><td class="select-yr-mnt"><select name="fromMonth[]" id="month" class="mnth" required><option value="">Month</option><?php for($m = 0; $m <= 11; $m++) { ?><option value="<?php echo $monthArray[$m]; ?>"><?php echo $monthArray[$m]; ?></option><?php } ?></select><select name="fromYear[]" id="year" class="yrr" required><option value="">Year</option><?php $y = date("Y"); for($i=1900;$i<=$y;$i++){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td><td class="select-yr-mnt"><select name="toMonth[]" id="month2" class="mnth" required><option value="">Month</option><?php for($m = 0; $m <= 11; $m++) { ?><option value="<?php echo $monthArray[$m]; ?>"><?php echo $monthArray[$m]; ?></option><?php } ?></select><select name="toYear[]" id="year2" class="yrr" required><option value="">Year</option><?php $y = date("Y"); for($i=1900;$i<=$y;$i++){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td><td><input type="text" required class="form-control" id="phHome" name="pSEduName[]" ></td><td><input type="text" required class="form-control" id="phHome" name="pSEduCourse[]" ></td><td><input type="text" required class="form-control" id="phHome" name="pSEduDegree[]" ></td><td><input type="text" required class="form-control" id="phHome" name="pSEduType[]" ><button type="button" onclick="remove_a_row('+ x +')" class="">Remove</button></td></tr>');



row.appendTo("#eduBody_a");



x++;

}

function remove_a_row(a){

		$('#appndd_a_tr'+a).remove();

}



var y = 2;



function add_b_row(){



var row = $('<tr id="appndd_b_tr'+ y +'"><td class="select-yr-mnt"><select name="fromEmpRecMonth[]" id="month" class="mnth" required><option value="">Month</option><?php for($m = 0; $m <= 11; $m++) { ?><option value="<?php echo $monthArray[$m]; ?>"><?php echo $monthArray[$m]; ?></option><?php } ?></select><select name="fromEmpRecYear[]" id="year" class="yrr" required><option value="">Year</option><?php $y = date("Y"); for($i=1900;$i<=$y;$i++){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td><td class="select-yr-mnt"><select name="toEmpRecMonth[]" id="month2" class="mnth" required><option value="">Month</option><?php for($m = 0; $m <= 11; $m++) { ?><option value="<?php echo $monthArray[$m]; ?>"><?php echo $monthArray[$m]; ?></option><?php } ?></select><select name="toEmpRecYear[]" id="year2" class="yrr" required><option value="">Year</option><?php $y = date("Y"); for($i=1900;$i<=$y;$i++){ ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></td><td><input type="text" required class="form-control" id="empRecName" name="empRecName[]" ></td><td><input type="text" required class="form-control" id="empRecDesign" name="empRecDesign[]"></td><td><input type="text" required class="form-control" id="empRecType" name="empRecType[]" ><button type="button" onclick="remove_b_row('+ y +')" class="">Remove</button></td></tr>');



row.appendTo("#eduBody_b");



y++;

}

function remove_b_row(b){

		$('#appndd_b_tr'+b).remove();


}	
</script>
<script>
$('.openobs').on('click',function(){
    $('.modal-body').load("lead_obs_a.php?lead=<?php echo $_GET['lead'];?>",function(){
        $('#myModal').modal({show:true});
    });
});
</script>
 	

