<?php include_once("header.php");

if ($_POST) {

if($_POST['sch']!="") { $dob=date('Y-m-d',strtotime($_POST['sch']));} else { $dob=NULL;}

$filename1 = $_FILES['start']['name'];
     move_uploaded_file($_FILES['start']['tmp_name'], 'uploads/documents/' . $filename1);
$filename2 = $_FILES['end']['name'];
	 move_uploaded_file($_FILES['end']['tmp_name'], 'uploads/documents/' . $filename2);
$data = array(
    'date' => $dob,
    'start' =>$filename1,
    'end' => $filename2,
    'remarks'=>$_POST['remarks']
);
$obj->insert('ielts_report',$data);

echo "<script type='text/javascript'>Swal.fire(
    'Session added!',
    'Succesfully'
  )</script>";

}

?>

<style>
.row-actions {
  color: #ddd;
  font-size: 13px;
  left: -9999em;
  position: absolute;
padding: 2px 0 0;
}
.row-actions.visible, tr:hover .row-actions {
  position: static;
}

</style>
		<div class="col-sm-10">
<div class="row"><div class="col-sm-12"><h4 class="mb-3" style="color:#2cb674;">Add Session Data</h4></div></div>
<form action="" method="post" enctype="multipart/form-data">

<div class="row">
<div class="col-sm-4 form-group"><label>Date</label><input type="text" class="form-control" id="sch" name="sch"></div>
</div>

<div class="row">
<div class="col-sm-4 form-group"><label>Start</label><input type="file" class="form-control" id="start" name="start"></div>
<div class="col-sm-4 form-group"><label>End</label><input type="file" class="form-control" id="end" name="end"></div>
</div>

<div class="row">
<label>Remarks</label>
<textarea class="form-control" name="remarks"></textarea> 
</div>

<div class="col-sm-2 form-group"><label>&nbsp;</label><br /><input type="submit" class="btn btn-info" name="submit" value="submit" ></div>
</form>

</div>

<?php include_once("footer.php"); ?>

<script>
$(function(){
$('#sch').datepicker({    format: 'dd-mm-yyyy',	autoclose: true});
}); 
</script>