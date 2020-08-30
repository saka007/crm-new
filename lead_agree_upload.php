<?php include_once("header.php");
$lead=$obj->display('dm_lead','id='.$_GET['lead']);
$lead1=$lead->fetch_array();
$r=$lead1['region'];
$s=$lead1['service_interest'];
// print_r($_FILES);die;
if($_POST)
{
	if($_POST['garys']=="Yes")
	{
	$gr=$obj->display('dm_gary_contract','leadId='.$_POST['lead']);
if($s==26 || $s==27 || $s==28 || $s==29 || $s==66 || $s==67 || $s==68 || $s==69 || $s==70 || $s==71 || $s==73 || $s==74 || $s==93 || $s==94 || $s==95 || $s==96 || $s==100 || $s==103 || $s==107 || $s==108 || $s==109 || $s==113 || $s==114 || $s==115){
	if($gr->num_rows== 0)
	{
		$data=array(
			'leadid' => $_POST['lead'],
			'contract' => '',
			'contract_signed' =>''
		);
		$obj->insert('dm_gary_contract',$data);
	}

}
}	
	// echo 'hi';die;
	if($lead1['type']!="Skill")
	{
		$data=array('assignTo' => "16" );
	    $obj->update('dm_lead',$data,'id='.$_GET['lead']);
	}
	else{
	if($r=="3" || $r=="4"||$r=="5")
	{
		if($lead1['country_interest']=="1")
		{
			$data=array('assignTo' => "12" );
			$obj->update('dm_lead',$data,'id='.$_GET['lead']);
		}
		elseif ($lead1['country_interest']=="2" && $r=="3") {
			$data=array('assignTo' => "93" );
			$obj->update('dm_lead',$data,'id='.$_GET['lead']);
		}
		elseif ($lead1['country_interest']=="2" && $r=="4") {
			$data=array('assignTo' => "71" );
			$obj->update('dm_lead',$data,'id='.$_GET['lead']);
		}
		elseif ($lead1['country_interest']=="2" && $r=="5") {
			$data=array('assignTo' => "5" );
			$obj->update('dm_lead',$data,'id='.$_GET['lead']);
		}
	}
	elseif ($r=="7") {
		$data=array('assignTo' => "24" );
	    $obj->update('dm_lead',$data,'id='.$_GET['lead']);
	}
	elseif ($r=="8" && $lead1['country_interest']=="1") {
		$data=array('assignTo' => "24" );
	    $obj->update('dm_lead',$data,'id='.$_GET['lead']);
	}
	elseif ($r=="8" && $lead1['country_interest']=="2") {
		$data=array('assignTo' => "58" );
	    $obj->update('dm_lead',$data,'id='.$_GET['lead']);
	}
    }

if($_FILES['sheet']['name']!="")
{
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
	    			'contract'   =>  $filename2
	    			);
			$obj->update('dm_lead_contract',$dataSheet,'leadId='.$_POST['lead']);

if($_POST['garys']!="")
			{
				$data = array('garys' =>$_POST['garys']);
				$obj->update('dm_lead_contract',$data,'leadId='.$_POST['lead']);
			}
			
	header("location:lead_agree_upload_list.php");

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
					<div class="col-sm-6 form-group">
							<label>Gary's</label>
							<select name="garys" class="form-control">
								<option value="Yes">Yes</option>
								<option value="No">No</option>
							</select>
					</div>
				</div>
					
					<div class="col-sm-12 form-group">
					<input type="submit" name="submit" value="UPLOAD" class="btn btn-info" >
					</div> 	
					
				</div>
				</form>
	
		</div>

    		
		
<?php include_once("footer.php"); ?>


