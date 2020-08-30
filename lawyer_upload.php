<?php include_once("header.php");
$lead=$obj->display('dm_lead','id='.$_GET['lead']);
$lead1=$lead->fetch_array();
$r=$lead1['region'];
// print_r($_FILES);die;
if($_POST)
{	
if($_FILES['sheet']['name']!="")
{
if ( 0 < $_FILES['sheet']['error'] ) 
	{
        echo 'Error: ' . $_FILES['sheet']['error'] . '<br>';
    }
    else 
	{
		$filename2=time().'_'.$_FILES['sheet']['name'];
        move_uploaded_file($_FILES['sheet']['tmp_name'], 'uploads/Gary/' . $filename2);
    }

			$dataSheet = array(
	    			'contract_signed'   =>  $filename2
	    			);
			$obj->update('dm_gary_contract',$dataSheet,'leadid='.$_POST['lead']);

			
	header("location:lawyer_contract_list.php");

}
}
?>


		<div class="col-sm-10">

			<form action="" method="post" name="paymentForm " enctype="multipart/form-data">
			<input type="hidden" name="lead" value="<?php echo $_GET['lead'];?>" />

		
				<div class="row">
					<div class="col-sm-12 form-group" style="text-align: center;">
						<h4 class="h4-color">UPLOAD AGREEMENT</h4>
					</div>
					<div class="col-sm-6 form-group">
							<label>Upload Contract* <span>(pdf or jpg)</span></label>
							<input type="file" class="form-control" id="sheet" name="sheet"  >
					</div>
				</div>
					
					<div class="col-sm-12 form-group">
					<input type="submit" name="submit" value="UPLOAD" class="btn btn-info" >
					</div> 	
					
				</div>
				</form>
	
		</div>

    		
		
<?php include_once("footer.php"); ?>


