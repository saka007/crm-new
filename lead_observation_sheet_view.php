<?php 	include_once("header.php");	



if(isset($_GET['id']))

{

	$sheet=$obj->display('dm_lead_observation','id='.$_GET['id']);

	$sheet1=$sheet->fetch_array();

	

}



?>

	

			<div class="col-sm-10">

					<div class="row">

						<div class="col-sm-12 form-group" style="text-align: left;">

							<h4 class="h4-color">OBSERVATION SHEET VIEW <a href="lead_observation_sheet_edit.php?id=<?php echo $sheet1['leadId']; ?>" class="pull-right"><i class="fa fa-edit"></i></a></h4>

						</div>

						

					</div>



					<div class="row">

					<div class="col-sm-6 form-group">

							<label>Uploaded Sheet </label><br />

							<a href="uploads/file/<?php echo $sheet1['sheet'];?>" target="_blank"><?php echo $sheet1['sheet'];?></a>

					</div>

					</div>



					<div class="row">

					<div class="col-sm-6 form-group">

							<label>Emirates Id*</label><br /><?php echo $sheet1['emirateId'];?>

					</div>

					<div class="col-sm-6 form-group">

							<label>Id Document*</label><br />

							<a href="uploads/file/<?php echo $sheet1['document'];?>" target="_blank"><?php echo $sheet1['document'];?></a>

					</div>

					</div>

					<div class="row">

					<div class="col-sm-12 form-group">

							<label>Remark</label><br /><?php echo $sheet1['remark'];?>

							</div>

					</div>

					

			</div>

		

<?php 	include_once("footer.php");	?>

