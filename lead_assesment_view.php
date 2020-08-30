<?php 	include_once("header.php");	

if(isset($_GET['skill']))

{

	$skil=$obj->display('dm_lead_assesment','id='.$_GET['skill']);
	$skil1=$skil->fetch_array();

	$lead=$obj->display('dm_lead','id='.$skil1['leadId']);
	$lead1=$lead->fetch_array();

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

?>

			

			<div class="col-sm-10">

					

					<div class="row">

						<div class="col-sm-12 form-group" style="text-align: left;">

							<h4 class="h4-color" style="text-transform:uppercase"><?php echo $skil1['Type'];?> ASSESSMENT FORM VIEW <a href="lead_assesment_edit.php?id=<?php echo $skil1['leadId'];?>" title="EDIT" class="btn btn-info float-right"><i class="fa fa-edit"></i></a></h4>

						</div>
						

					</div>



					

					<div class="row">

						<div class="col-sm-4 form-group"><label >First Name*:</label><br /><?php echo $lead1['fname'];?></div>

						<div class="col-sm-4 form-group"><label >Middle Name*:</label><br /><?php echo $lead1['mname'];?></div>

						<div class="col-sm-4 form-group"><label >Family Name*:</label><br /><?php echo $lead1['lname'];?></div>

					</div>



					<div class="row">

						<div class="col-sm-4 form-group"><label >Sex*:</label><br /><?php echo $lead1['gender'];?></div>

						<div class="col-sm-4 form-group"><label >Date of Birth*:</label><br /><?php echo $lead1['dob'];?></div>

						<div class="col-sm-4 form-group"><label >Citizen of:</label><br /><?php echo $lead1['nationality'];?></div>

					</div>



					<div class="row">


						<div class="col-sm-8 form-group"><label >Current mailing Address*:</label><br /><?php echo $lead1['address'];?></div>

						<div class="col-sm-4 form-group"><label >Mobile:</label><br /><?php echo $lead1['mobile'];?></div>

					</div>



					<div class="row">

						<div class="col-sm-4 form-group"><label >Landline(Home)*:</label><br /><?php echo $lead1['phone'];?></div>

						<div class="col-sm-4 form-group"><label >Email:</label><br /><?php echo $lead1['email'];?></div>
						<div class="col-sm-4 form-group"><label >Country of Birth:</label><br /><?php echo $skil1['cob'];?></div>

					</div>



					<div class="row">

						<div class="col-sm-4 form-group"><label >Marital Status*:</label><br /><?php echo $skil1['marStatus'];?></div>

						<div class="col-sm-4 form-group"><label >Do you have children? *:</label><br /><?php echo $skil1['haveChild'];?></div>

						<div class="col-sm-4 form-group"><label >No. of children:</label><br /><?php echo $skil1['noOfChild'];?></div>

					</div>

<?php if($skil1['marStatus']=="Married") {?> 

					<div class="row">

						<div class="col-sm-4 form-group"><label >First Name*:</label><br /><?php echo $skil1['spfname'];?></div>

						<div class="col-sm-4 form-group"><label >Middle Name*:</label><br /><?php echo $skil1['spmname'];?></div>

						<div class="col-sm-4 form-group"><label >Family Name*:</label><br /><?php echo $skil1['splname'];?></div>

					</div>



					<div class="row">

						<div class="col-sm-4 form-group"><label >Sex*:</label><br /><?php echo $skil1['spgender'];?></div>

						<div class="col-sm-4 form-group"><label >Date of Birth*:</label><br /><?php echo $skil1['spdob'];?></div>
						<div class="col-sm-4 form-group"><label >Citizen of:</label><br /><?php echo $skil1['spcitizenof'];?></div>


					</div>



					<div class="row">


						<div class="col-sm-8 form-group"><label >Current mailing Address*:</label><br /><?php echo $skil1['spaddress'];?></div>

						<div class="col-sm-4 form-group"><label >Mobile:</label><br /><?php echo $skil1['spmobile'];?></div>

					</div>



					<div class="row">

						<div class="col-sm-4 form-group"><label >Ph.(Home)*:</label><br /><?php echo $skil1['spphHome'];?></div>

						<div class="col-sm-4 form-group"><label >Email:</label><br /><?php echo $skil1['spemail'];?></div>
						<div class="col-sm-4 form-group"><label >Country of Birth:</label><br /><?php echo $skil1['spcob'];?></div>

					</div>

<?php }?>

					<div class="row">

						<div class="col-sm-12 form-group"><label >

							Do you or your spouse have relative in Canada/Australia/NewZealand/USA/Denmark(Spouse,Fiancé,Partner,Parents,Brother, Sister, Grandparents, Grandchildren, Brother, Sister, Nephew, Uncle and Aunt)? If Yes, please give details:</label>

						</div>

						<div class="col-sm-12 form-group"><table class="table table-bordered table-custom-pre">

						  <thead>

						    <tr>

						      <th scope="col" class="align-top">Name</th>

						      <th scope="col" class="align-top thead-span">Blood Relationship</th>

						      <th scope="col" class="align-top">Country</th>

						      <th scope="col" class="align-top thead-span">Address</th>

						      <th scope="col" class="align-top thead-span">Status</th>

						    </tr>

						  </thead>

						  <tbody>

						  	<tr>

						      <td><?php echo $skil1['relName'];?></td>

						      <td><?php echo $skil1['reRelation'];?></td>

						      <td><?php echo $skil1['reCountry'];?></td>

						      <td><?php echo $skil1['reAddress'];?></td>

						      <td><?php echo $skil1['reStatus'];?></td>

						    </tr>

						  </tbody>

						</table></div> 

						

					</div>



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

						      <th scope="col" class="align-top thead-span">Name and Address of the Institutions </br><span>(school/College) </span>& University</th>

						      <th scope="col" class="align-top">Courses Taken </br><span>(Subjects)</span></th>

						      <th scope="col" class="align-top thead-span">Diploma/Degree/ Certificate</th>

						      <th scope="col" class="align-top thead-span">Full/Part time/ Correspondence</th>

						    </tr>

						  </thead>

						  <tbody>

						  

						  <?php $edu=$obj->display('dm_lead_assesment_edu','skillId='.$_GET['skill']);

						  while($edu1=$edu->fetch_array())

						  {

						  ?>

						  	<tr>

						  		<td class="select-yr-mnt">	<?php echo $edu1['fromMonth'];?>/<?php echo $edu1['fromYear'];?></td>

							    <td class="select-yr-mnt"> <?php echo $edu1['toMonth'];?>/<?php echo $edu1['toYear'];?></td>

							    <td><?php echo $edu1['pSEduName'];?></td>

							    <td><?php echo $edu1['pSEduCourse'];?></td>

							    <td><?php echo $edu1['pSEduDegree'];?></td>

							    <td><?php echo $edu1['pSEduType'];?></td>

						    </tr>

						    <?php } ?>

						    

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

						  <tbody>

						  <?php $dsgn=$obj->display('dm_lead_assesment_desgn','skillId='.$_GET['skill']);

						  while($dsgn1=$dsgn->fetch_array())

						  {

						  ?>

						  

						  	<tr>

						  		<td class="select-yr-mnt">		<?php echo $dsgn1['fromEmpRecMonth'];?>/<?php echo $dsgn1['fromEmpRecYear'];?>			  		

									

								</td>

							    <td class="select-yr-mnt"><?php echo $dsgn1['toEmpRecMonth'];?>/<?php echo $dsgn1['toEmpRecYear'];?>

							      

							    </td>

							    <td><?php echo $dsgn1['empRecName'];?></td>

							    <td><?php echo $dsgn1['empRecDesign'];?></td>

							    <td><?php echo $dsgn1['empRecType'];?></td>

						    </tr>

						    <?php } ?>

						    

						  </tbody>

						</table></div>

						

					</div>



<?php if($skil1['Type']=="Business") {?>					

					<div class="row">

						<div class="col-sm-6 form-group"><label>Movable Assets</label><br /><?php echo $skil1['moveAsset'];?></div>

						<div class="col-sm-6 form-group"><label>Inmovable Assets</label><br /><?php echo $skil1['inmoveAsset'];?></div>

					</div>	

					<div class="row">

						<div class="col-sm-4 form-group"><label>Interested in?</label><br /><?php echo $skil1['interestIn'];?></div> 

						<div class="col-sm-4 form-group"><label>Ownership of Business (Percent Wise)?</label><br /><?php echo $skil1['ownership'];?></div>

					</div>

<?php } ?>					



					

			</div>

		

<?php 	include_once("footer.php");	?>





<!-- <script type="text/javascript" src="js/table-drop-down.js"></script> -->