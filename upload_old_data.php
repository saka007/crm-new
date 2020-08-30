<?php include_once("header.php");	
if($_POST['Import'])
{
$filename=$_FILES["file"]["tmp_name"];
//$filename = "C2ImportCalEventSample.csv";
   
       $file = fopen($filename, "r");
		$count = 0;                                         // add this line
		while (($emapData = fgetcsv($file, 1000, ",")) !== FALSE)
		{
		$count++;                                      // add this line

   		 if($count>1){           
			  	$data = array(
					"col_0" => $emapData[0],
					"col_1" => $emapData[1],
					"col_2" => $emapData[2],
					"col_3" => $emapData[3],
					"col_4" => $emapData[4],
					"col_5" => $emapData[5],
					"col_6" => $emapData[6],
					"col_7" => $emapData[7],
					"col_8" => $emapData[8],
					"col_9" => $emapData[9],
					"col_10" => $emapData[10],
					"col_11" => $emapData[11],
					"col_12" => $emapData[12],
					"col_13" => $emapData[13],
					"col_14" => $emapData[14],
					"col_15" => $emapData[15],
					"col_16" => $emapData[16],
					"col_17" => $emapData[17],
					"col_18" => $emapData[18],
					"col_19" => $emapData[19],
					"col_20" => $emapData[20],
					"col_21" => $emapData[21],
					"col_22" => $emapData[22],
					"col_23" => $emapData[23],
					"col_24" => $emapData[24]
				);
				$obj->insert('dm_old_data',$data);
		}
		}
        fclose($file);
?>
<script>
alert("CSV File has been successfully Imported");
window.location.href="upload_old_data.php";
</script>
<?php
    
    
	   
}

?>


		<div class="col-sm-10">
		<div class="row"><div class="col-sm-6"><h4 class="mb-3" style="color:#2cb674;">Upload Old Data</h4></div></div>
		
		<form enctype="multipart/form-data" method="post" role="form" id="popForm">
   <div class="row">
<div class="col-sm-6 form-group">
        <label for="exampleInputFile">File Upload</label>
        <input type="file" name="file" id="file" size="150" class="form-control">
        <p class="help-block">Only CSV File Import.</p>
    </div>
	
<div class="col-sm-3 form-group"><label >&nbsp;</label><br /><input type="submit" class="btn btn-info" name="Import" value="Upload" ></div>
</div>
</form>
		

<hr />

		</div>
<?php include_once("footer.php"); ?>

<script src="js/formvalidation.js"></script>
<script>
$(document).ready(function() {
    $('#popForm').formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: 'fa fa-ok',
            invalid: 'fa fa-remove',
            validating: 'fa fa-refresh'
        },
        fields: {
            file: { validators: { notEmpty: { message: 'Select a file' }}}
        }
    })
	.on('success.form.fv', function(e) {
		e.preventDefault();
		$('#popForm').formValidation('defaultSubmit');
	});
});
</script>			