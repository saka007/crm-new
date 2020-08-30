<?php 	include_once("header.php");	

if($_POST['save2'] || $_POST['save'])
{
	if ( 0 < $_FILES['document1']['error'] ) 
	{
        echo 'Error: ' . $_FILES['document1']['error'] . '<br>';
    }
    else 
	{
		$filename=time().'_'.$_FILES['document1']['name'];
        move_uploaded_file($_FILES['document1']['tmp_name'], 'uploads/file/' . $filename);
    }
	
	if ( 0 < $_FILES['sheet']['error'] ) 
	{
        echo 'Error: ' . $_FILES['sheet']['error'] . '<br>';
    }
    else 
	{
		$filename2=time().'_'.$_FILES['sheet']['name'];
        move_uploaded_file($_FILES['sheet']['tmp_name'], 'uploads/file/' . $filename2);
    }

	$dataSheet = array(
					'leadId'  	 =>  $_POST['lead'],
	    			'sheet'   =>  $filename2,
	    			'emirateId'  =>  $_POST['emirateId'],
	    			'document'   =>  $filename,
	    			'remark'     =>  $_POST['remark']
	    			);
			$odr = $obj->insert('dm_lead_observation',$dataSheet);
	if($odr)
	{
			$data2 = array(
	    			'stepComplete'   =>  3
	    			);
			$obj->update('dm_lead',$data2,'id='.$_POST['lead']);
			 
		if($_POST['save'])	{ 
			header("location:lead_observation_sheet_view.php?id=".$odr);
		}					
		if($_POST['save2'])	{ 
		header("location:lead_payment_options.php?lead=".$_POST['lead']);
		}
	}
}

$ass=$obj->display('dm_lead_assesment','leadId='.$_GET['lead']);
$ass1=$ass->fetch_array();

$lead=$obj->display('dm_lead','id='.$_GET['lead']);
$lead1=$lead->fetch_array();

$rt=$obj->display('dm_observation_file','country="'.$lead1['country_interest'].'" and service="'.$lead1['service_interest'].'"');
$rt1=$rt->fetch_array();


?>

		
			<div class="col-sm-10">
				<form action="" method="post" enctype="multipart/form-data" id="popForm">
					<input type="hidden" name="lead" value="<?php echo $_GET['lead'];?>" />
					<div class="row">
						<div class="col-sm-6 form-group" style="text-align: left;">
							<h4 class="h4-color">UPLOAD OBSERVATION SHEET</h4>
						</div>
						<div class="col-sm-6 form-group" style="text-align: right;">
							<h4 class="h4-color"></h4>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12 form-group">
							<label>Please download the observation sheet and fill and upload it in down - <a href="uploads/documents/<?php echo $rt1['file'];?>">Download</a></label> 
						</div>
					</div>					
		
				<div class="row">
					<div class="col-sm-6 form-group">
							<label>Upload Sheet* <span>(pdf or jpg)</span></label>
							<input type="file" class="form-control" id="sheet" name="sheet"  >
					</div>
					</div>
					

					<div class="row">
					<div class="col-sm-6 form-group">
							<label>
								Identity Proof *</label>
							<input type="text" class="form-control" id="emirateId" name="emirateId" >
					</div>
					<div class="col-sm-6 form-group">
							<label>
								Id Document*</label>
							<input type="file" class="form-control" id="document" name="document1" >
					</div>
					</div>
					<div class="row">
					<div class="col-sm-12 form-group">
							<label>
								Remark</label>
							<textarea name="remark" class="form-control" id="remark"></textarea>
							</div>
					</div>
					<div class="row">	
						<div class="col-sm-12 form-group">
			<input type="submit" name="save" value="SAVE" id="save" class="btn btn-info">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="submit" name="save2" value="SUBMIT" id="save2" class="btn btn-info"> 	
			</div>			
					</div>
				</form>
			</div>
		
<?php 	include_once("footer.php");	?>
	<script src="js/formvalidation.js"></script>

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
            document1: { validators: { notEmpty: { message: 'The field is required' }}},
            sheet: { validators: { notEmpty: { message: 'The field is required' },
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