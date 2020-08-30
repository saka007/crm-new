<?php include_once("header.php");

if($_POST){
  $data = array(
    'timing' => $_POST['sch'],
    'link' => $_POST['link'],
    'password' => $_POST['pass']
  );

  $obj->update('ielts',$data,'id=1');

  echo "<script type='text/javascript'>Swal.fire(
    'Session Updated!',
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
<div class="row"><div class="col-sm-12"><h4 class="mb-3" style="color:#2cb674;">IELTS Schedule</h4></div></div>
<form action="" method="post" enctype="multipart/form-data">

<div class="row">
<div class="col-sm-4 form-group"><label>Date & Timing</label><input type="text" class="form-control" id="sch" name="sch"></div>
</div>

<div class="row">
<div class="col-sm-4 form-group"><label>Link</label><input type="text" class="form-control" id="link" name="link"></div>
</div>

<div class="row">
<div class="col-sm-4 form-group"><label>password</label><input type="text" class="form-control" id="pass" name="pass"></div>
</div>

<div class="col-sm-2 form-group"><label>&nbsp;</label><br /><input type="submit" class="btn btn-info" name="submit" value="submit" ></div>
</form>

</div>

<?php include_once("footer.php"); ?>

