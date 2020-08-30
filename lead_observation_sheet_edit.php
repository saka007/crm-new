<?php 	include_once("header.php");	

	if($_POST['submit'] || $_POST['save'])
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
			$dataSheet2 = array(
	    			'document'   =>  $filename
	    			);
			$obj->update('dm_lead_observation',$dataSheet2,'id='.$_POST['id']);
	}


	$filename2=$_FILES['sheet']['name'];
	if($filename2!="")
	{
	if ( 0 < $_FILES['sheet']['error'] ) 
	{
        echo 'Error: ' . $_FILES['sheet']['error'] . '<br>';
    }
    else 
	{
		$filename2=time().'_'.$filename2;
        move_uploaded_file($_FILES['sheet']['tmp_name'], 'uploads/file/' . $filename2);
    }
			$dataSheet3 = array(
	    			'sheet'   =>  $filename2
	    			);
			$obj->update('dm_lead_observation',$dataSheet3,'id='.$_POST['id']);
	}

			$dataSheet = array(
	    			'emirateId'  =>  $_POST['emirateId'],
	    			'remark'     =>  $_POST['remark']
	    			);
			$obj->update('dm_lead_observation',$dataSheet,'id='.$_POST['id']);

			
		if($_POST['save'])	{ 
			header("location:lead_observation_sheet_view.php?id=".$_POST['id']);
		}					
		if($_POST['submit'])	{ 
			$res = $obj->display('dm_lead','id='.$_POST['lead']); $res1=$res->fetch_array();
			if($res1['payType']=="") {
				header("location:lead_payment_options.php?lead=".$_POST['lead']);
			} else {
				header("location:lead_payment.php?lead=".$_POST['lead']);
			}
		}

	}

	$sheet=$obj->display('dm_lead_observation','leadId='.$_GET['id']);
	$sheet1=$sheet->fetch_array();

$lead=$obj->display('dm_lead','id='.$_GET['id']);
$lead1=$lead->fetch_array();
?>

		
			<div class="col-sm-10">
				<form action="" method="post" enctype="multipart/form-data" id="popForm">
					<input type="hidden" name="id" value="<?php echo $sheet1['id'];?>" />
					<input type="hidden" name="lead" value="<?php echo $_GET['id']; ?>" />
					<div class="row">
						<div class="col-sm-6 form-group" style="text-align: left;">
							<h4 class="h4-color">OBSERVATION SHEET EDIT </h4>
						</div>
						<div class="col-sm-6 form-group" style="text-align: right;">
							<h4 class="h4-color"></h4>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12 form-group">
							<label>Please answer all questions carefully in block letters. (* Mandatory fields)</label>
						</div>
					</div>
					
					<div class="row">
					<div class="col-sm-6 form-group">
							<label style="width:100%">Change Upload Sheet* <span>(pdf or jpg)</span> <?php if($sheet1['sheet']!="") {?> <a href="uploads/file/<?=$sheet1['sheet'];?>" target="_blank" style="float:right">View</a><?php }?></label>
							<input type="file" class="form-control" id="sheet" name="sheet"  >
					</div>
					</div>			
					

					<div class="row">
					<div class="col-sm-6 form-group">
							<label>
								Emirates Id*</label>
							<input type="text" class="form-control" id="emirateId" name="emirateId" value="<?php echo $sheet1['emirateId'];?>">
					</div>
					<div class="col-sm-6 form-group">
							<label style="width:100%">Change Id Document* <?php if($sheet1['document']!="") {?> <a href="uploads/file/<?=$sheet1['document'];?>" target="_blank" style="float:right">View</a><?php }?></label>
							<input type="file" class="form-control" id="document" name="document" >
					</div>
					</div>
					<div class="row">
					<div class="col-sm-12 form-group">
							<label>
								Remark</label>
							<textarea name="remark" class="form-control" id="remark"> <?php echo $sheet1['remark'];?></textarea>
							</div>
					</div>
					<div class="row">	
						<div class="col-sm-12 form-group">
<?php
if($lead1['paidYet']!=0 && ($_SESSION['ROLE']==8 || $_SESSION['ROLE']==14)) {

?>						
			<input type="submit" name="save" value="SAVE" class="btn btn-info">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<?php } ?>			
			<input type="submit" name="submit" value="SUBMIT" class="btn btn-info"> 	
			</div>			
					</div>
				</form>
			</div>
		
<?php 	include_once("footer.php");	?>
<script>
$(function(){

    $('#popForm').formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: 'fa fa-ok',
            invalid: 'fa fa-remove',
            validating: 'fa fa-refresh'
        },
        fields: {
            emirateId: { validators: { notEmpty: { message: 'The field is required' }}},
            sheet: { validators: { 
                        file: {
                            extension: 'pdf,jpg,jpeg',
                            type: 'application/pdf,image/jpeg',
                            message: 'Only pdf or jpg file'
                        }}}
        }
    })
	.on('success.form.fv', function(e) {
	 	$('#popForm').formValidation('defaultSubmit');
	 });

}); 
</script>

<!-- <script type="text/javascript" src="js/table-drop-down.js"></script> -->