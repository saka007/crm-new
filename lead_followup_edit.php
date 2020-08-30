<?php 	include_once("header.php");	
if($_POST['submit'])
{
	$data = array(
    			'followup'  =>  date('Y-m-d',strtotime($_POST['followup']))
				);
			$obj->update('dm_lead',$data,'id='.$_POST['id']);

if($_POST['remark']!="")
{
	$data4 = array(
    			'lead'  =>  $_POST['id'],
    			'date'  =>  date('Y-m-d'),
    			'remark'  =>  $_POST['remark'],
				);
			$obj->insert('dm_lead_remark',$data4);
}



	

header("location:lead_followup.php");

}

$lead=$obj->display('dm_lead','id='.$_GET['lead']);

$lead1=$lead->fetch_array();

?>

			

<div class="col-sm-10">

<form action="" method="post" id="leadForm">

<input type="hidden" name="id" value="<?php echo $_GET['lead'];?>" />

<div class="row"><div class="col-sm-12"><h4 class="mb-3" style="color:#2cb674;">Edit Followup<a href="lead_followup.php" class="float-right" style="font-size:20px;" title="BACK"><i class="fa fa-arrow-left"></i></a></h4></div>

</div>



<div class="row">



<div class="col-sm-4 form-group"><label >Follow Up</label><input type="text" class="form-control" id="folowup" name="followup" value="<?php echo date('d-m-Y',strtotime($lead1['followup']));?>"></div>

			

</div>

<div class="row">

						

			<div class="col-sm-12 form-group"><label >Remark</label><textarea class="form-control" id="remark" name="remark" ></textarea></div>

			

<div class="col-sm-12 form-group">



<input type="submit" name="submit" value="SUBMIT" class="btn btn-info" id="submit-btn-info" > 	

</div>		

</div>

</form>







</div>

		

<?php 	include_once("footer.php");	?>



   <script>

$(function(){

$('#folowup').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 

}); 

</script>