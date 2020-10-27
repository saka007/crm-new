<?php
include_once("head.php");
if ($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RM"){
$tots= $obj->display3('SELECT COUNT(*) as count FROM `appointments`');
if ($tots->num_rows > 0){
$tots1 = $tots->fetch_array();
}
}
else if ($_SESSION['TYPE']=="BM") {
$tots= $obj->display3('SELECT COUNT(*) as count FROM `appointments` WHERE region='.$_SESSION['REGION']);
if ($tots->num_rows > 0){
$tots1 = $tots->fetch_array();
}}
else  {
  $tots= $obj->display3('SELECT COUNT(*) as count FROM `appointments` WHERE counsilorid='.$_SESSION['ID']);
  if ($tots->num_rows > 0){
  $tots1 = $tots->fetch_array();
  }}
  if ($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RM"){
    $toto= $obj->display3('SELECT COUNT(*) as count FROM `appointments` where type="in_office"');
    if ($toto->num_rows > 0){
    $toto1 = $toto->fetch_array();
    }}
    else if ($_SESSION['TYPE']=="BM") {
    $toto= $obj->display3('SELECT COUNT(*) as count FROM `appointments` WHERE type="in_office" and region='.$_SESSION['REGION']);
    if ($toto->num_rows > 0){
    $toto1 = $toto->fetch_array();
    }}
    else  {
      $toto= $obj->display3('SELECT COUNT(*) as count FROM `appointments` WHERE type="in_office" and counsilorid='.$_SESSION['ID']);
      if ($toto->num_rows > 0){
      $toto1 = $toto->fetch_array();
      }}
      if ($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RM"){
        $totz= $obj->display3('SELECT COUNT(*) as count FROM `appointments` where type="zoom"');
        if ($totz->num_rows > 0){
        $totz1 = $totz->fetch_array();
        }}
        else if ($_SESSION['TYPE']=="BM") {
        $totz= $obj->display3('SELECT COUNT(*) as count FROM `appointments` WHERE type="zoom" and region='.$_SESSION['REGION']);
        if ($totz->num_rows > 0){
        $totz1 = $totz->fetch_array();
        }}
        else  {
          $totz= $obj->display3('SELECT COUNT(*) as count FROM `appointments` WHERE type="zoom" and counsilorid='.$_SESSION['ID']);
          if ($totz->num_rows > 0){
          $totz1 = $totz->fetch_array();
          }}
if ($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RM"){
  $mdone= $obj->display3('SELECT COUNT(*)  as count FROM `appointments` WHERE done=1');
  if ($mdone->num_rows > 0){
  $mdone1 = $mdone->fetch_array();
}}
else if ($_SESSION['TYPE']=="BM"){
  $mdone= $obj->display3('SELECT COUNT(*)  as count FROM `appointments` WHERE region='.$_SESSION['REGION'].' and done=1');
  if ($mdone->num_rows > 0){
  $mdone1 = $mdone->fetch_array();
}}
else {
$mdone= $obj->display3('SELECT COUNT(*)  as count FROM `appointments` WHERE counsilorid='.$_SESSION['ID'].' and done=1');
if ($mdone->num_rows > 0){
$mdone1 = $mdone->fetch_array();
}}

if ($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RM"){
  $mdoneo= $obj->display3('SELECT COUNT(*)  as count FROM `appointments` WHERE type="in_office" and done=1');
  if ($mdoneo->num_rows > 0){
  $mdoneo1 = $mdoneo->fetch_array();
}}
else if ($_SESSION['TYPE']=="BM"){
  $mdoneo= $obj->display3('SELECT COUNT(*)  as count FROM `appointments` WHERE type="in_office" and region='.$_SESSION['REGION'].' and done=1');
  if ($mdoneo->num_rows > 0){
  $mdoneo1 = $mdoneo->fetch_array();
}}
else {
$mdoneo= $obj->display3('SELECT COUNT(*)  as count FROM `appointments` WHERE type="in_office" and counsilorid='.$_SESSION['ID'].' and done=1');
if ($mdoneo->num_rows > 0){
$mdoneo1 = $mdoneo->fetch_array();
}}

if ($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RM"){
  $mdonez = $obj->display3('SELECT COUNT(*)  as count FROM `appointments` WHERE type="zoom" and done=1');
  if ($mdonez->num_rows > 0){
  $mdonez1 = $mdonez->fetch_array();
}}
else if ($_SESSION['TYPE']=="BM"){
  $mdonez= $obj->display3('SELECT COUNT(*)  as count FROM `appointments` WHERE type="zoom" and region='.$_SESSION['REGION'].' and done=1');
  if ($mdonez->num_rows > 0){
  $mdonez1 = $mdonez->fetch_array();
}}
else {
$mdonez= $obj->display3('SELECT COUNT(*)  as count FROM `appointments` WHERE type="zoom" and counsilorid='.$_SESSION['ID'].' and done=1');
if ($mdonez->num_rows > 0){
$mdonez1 = $mdonez->fetch_array();
}}
if ($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RM"){
  $ndoneo= $obj->display3('SELECT COUNT(*)  as count FROM `appointments` WHERE type="in_office" and done is NULL');
  if ($ndoneo->num_rows > 0){
  $ndoneo1 = $ndoneo->fetch_array();
}}
else if ($_SESSION['TYPE']=="BM"){
  $ndoneo= $obj->display3('SELECT COUNT(*)  as count FROM `appointments` WHERE type="in_office" and region='.$_SESSION['REGION'].' and done is NULL');
  if ($ndoneo->num_rows > 0){
  $ndoneo1 = $ndoneo->fetch_array();
}}
else {
$ndoneo= $obj->display3('SELECT COUNT(*)  as count FROM `appointments` WHERE type="in_office" and counsilorid='.$_SESSION['ID'].' and done is NULL');
if ($ndoneo->num_rows > 0){
$ndoneo1 = $ndoneo->fetch_array();
}}
if ($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RM"){
  $ndonez= $obj->display3('SELECT COUNT(*)  as count FROM `appointments` WHERE type="zoom" and done is NULL');
  if ($ndonez->num_rows > 0){
  $ndonez1 = $ndonez->fetch_array();
}}
else if ($_SESSION['TYPE']=="BM"){
  $ndonez= $obj->display3('SELECT COUNT(*)  as count FROM `appointments` WHERE type="zoom" and region='.$_SESSION['REGION'].' and done is NULL');
  if ($ndonez->num_rows > 0){
  $ndonez1 = $ndonez->fetch_array();
}}
else {
$ndonez= $obj->display3('SELECT COUNT(*)  as count FROM `appointments` WHERE type="zoom" and counsilorid='.$_SESSION['ID'].' and done is NULL');
if ($ndonez->num_rows > 0){
$ndonez1 = $ndonez->fetch_array();
}}

if ($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RM"){
  $ndone= $obj->display3('SELECT COUNT(*)  as count FROM `appointments` WHERE done is NULL');
  if ($ndone->num_rows > 0){
  $ndone1 = $ndone->fetch_array();
}}
else if ($_SESSION['TYPE']=="BM"){
  $ndone= $obj->display3('SELECT COUNT(*)  as count FROM `appointments` WHERE region='.$_SESSION['REGION'].' and done is NULL');
  if ($ndone->num_rows > 0){
  $ndone1 = $ndone->fetch_array();
}}
else {
$ndone= $obj->display3('SELECT COUNT(*)  as count FROM `appointments` WHERE counsilorid='.$_SESSION['ID'].' and done is NULL');
if ($ndone->num_rows > 0){
$ndone1 = $ndone->fetch_array();
}}

if ($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RM"){
  $totwk= $obj->display3('SELECT COUNT(*) as count FROM `appointments` where type="walk_in"');
  if ($totwk->num_rows > 0){
  $totwk1 = $totwk->fetch_array();
  }}
  else if ($_SESSION['TYPE']=="BM") {
  $totwk= $obj->display3('SELECT COUNT(*) as count FROM `appointments` WHERE type="walk_in" and region='.$_SESSION['REGION']);
  if ($totwk->num_rows > 0){
  $totwk1 = $totwk->fetch_array();
  }}
  else  {
    $totwk= $obj->display3('SELECT COUNT(*) as count FROM `appointments` WHERE type="walk_in" and counsilorid='.$_SESSION['ID']);
    if ($totwk->num_rows > 0){
    $totwk1 = $totwk->fetch_array();
    }}

?>
<link rel="stylesheet" href="theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
 <!-- Begin Page Content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Meetings</h1>

          <div class="row">
             <div class="col-lg-12">

             <!-- <a href="#" onclick="new_task(); return false;" class="btn btn-info pull-left new">Book Meeting</a> -->
             <br/>
             <hr/>

             <div class="row">
      <div class="col-md-2 col-xs-6 border-right">
      <h3 class="bold no-mtop"><?php echo $tots1['count'];?> (<?=$totz1['count'];?>/<?=$toto1['count'];?>)</h3>
      <p style="color:#989898" class="font-medium no-mbot">
        Total Meetings Booked (Zoom/Office)    </p>
          </div>
        <div class="col-md-2 col-xs-6 border-right">
      <h3 class="bold no-mtop"><?=$mdone1['count'];?> (<?=$mdonez1['count'];?>/<?=$mdoneo1['count'];?>)</h3>
      <p style="color:#03A9F4" class="font-medium no-mbot">
        Meeting Done (Zoom/Office)  </p>
    </div>
        <div class="col-md-2 col-xs-6 border-right">
      <h3 class="bold no-mtop"><?=$ndone1['count'];?> (<?=$ndonez1['count'];?>/<?=$ndoneo1['count'];?>)</h3>
      <p style="color:#2d2d2d" class="font-medium no-mbot">
        Meetings Yet to Done (Zoom/Office) </p>
    </div>
    <div class="col-md-2 col-xs-6 border-right">
      <h3 class="bold no-mtop"><?=$totwk1['count'];?></h3>
      <p style="color:#2d2d2d" class="font-medium no-mbot">
        Walk-in </p>
    </div>
        <!-- <div class="col-md-2 col-xs-6 border-right">
      <h3 class="bold no-mtop">11</h3>
      <p style="color:#adca65" class="font-medium no-mbot">
        Awaiting Feedback      </p>
      <p class="font-medium-xs no-mbot text-muted">
        Tasks assigned to me: 4      </p>
    </div>
        <div class="col-md-2 col-xs-6 border-right">
      <h3 class="bold no-mtop">18</h3>
      <p style="color:#84c529" class="font-medium no-mbot">
        Complete      </p>
      <p class="font-medium-xs no-mbot text-muted">
        Tasks assigned to me: 7      </p>
    </div> -->
      </div>

      <hr/>

      <form name="search" action="" method="post">
										<div class="row">
											<div class="col-sm-2 form-group">
												<label>Start Date</label>
												<div class="input-group date" id="sdate" data-target-input="nearest">
													<input type="text" class="form-control datetimepicker-input" name="sdate" data-target="#sdate" value="<?php if ($_POST['sdate']) echo $_POST['sdate'];
																																							else  echo date('d-m-Y') ?>" />
													<div class="input-group-append" data-target="#sdate" data-toggle="datetimepicker">
														<div class="input-group-text"><i class="fa fa-calendar"></i></div>
													</div>
												</div>

											</div>
											<div class="col-sm-2 form-group"><label>End Date</label>
												<div class="input-group date" id="edate" data-target-input="nearest">
													<input type="text" class="form-control datetimepicker-input" name="edate" data-target="#edate" value="<?php if ($_POST['edate']) echo $_POST['edate'];
																																							else  echo date('d-m-Y') ?>" />
													<div class="input-group-append" data-target="#edate" data-toggle="datetimepicker">
														<div class="input-group-text"><i class="fa fa-calendar"></i></div>
													</div>
												</div>
											</div>
											<div class="col-sm-2 form-group"><label>&nbsp;</label><br /><input type="submit" class="btn btn-info" name="search" value="Search" ></div>
										</div>
			</form>
<?php if($_POST) { ?>
      <table class="table table-bordered table-striped" id="dataTables-Table_new" name="dataTables-Table_new" style="width:100%" > 
                                <thead>
                                    <tr>
                                        <th>Sr no.</th>
                                        <th>Client Name</th>
                                        <th>Counsultant</th>
                                        <th>Date</th>
                                        <th>time</th>
                                        <th>Status</th>
                                        <?php if($_SESSION['TYPE']=='RM' || $_SESSION['TYPE']=='SA' || $_SESSION['TYPE']=='BM' || $_SESSION['TYPE']=='IC'){ ?>
		      	<th>Click if Appointment Done</th>
		      	<th>Click if Appointment Not Done</th>
		      <?php } ?>
                                        <th>Mode of Meeting</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php
                                   if($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RM"){
                                    $meet = $obj->display3("SELECT *,a.type as mtype,a.id as apid FROM `appointments` a INNER JOIN dm_lead l on a.leadid=l.id where a.date between '".date('Y-m-d',strtotime($_POST["sdate"]))."' and '".date('Y-m-d',strtotime($_POST["edate"]))."'");
                                   }
                                   else{
                                   $meet = $obj->display3("SELECT *,a.type as mtype,a.id as apid FROM `appointments` a INNER JOIN dm_lead l on a.leadid=l.id where a.date between '".date('Y-m-d',strtotime($_POST["sdate"]))."' and '".date('Y-m-d',strtotime($_POST["edate"]))."' and a.counsilorid=".$_SESSION['ID']);
                                   }
                                   if($meet->num_rows > 0) {
                                      $i=1;
                                   while($row = $meet->fetch_array())
                                   { 
                                    //  print_r($row);
                                    $emp = $obj->display('dm_employee', 'id=' .$row['counsilorid']);
                                    $em1 = $emp->fetch_assoc();
                                     ?>
                                   <tr>
                                      <td><?=$i;?></td>
                                      <td><?=$row['fname'].''.$row['lname'];?></td>
                                      <td><?=$em1['name'];?></td>
                                      <td><?=$row['date'];?></td>
                                      <td><?=$row['time'];?></td>
                                      <td><?php if($row['done']==1) { echo "Done"; } else { echo "Not Done"; }?></td>
                                      <?php if($_SESSION['TYPE']=='RM' || $_SESSION['TYPE']=='SA' || $_SESSION['TYPE']=='BM' || $_SESSION['TYPE']=='IC'){ ?>
                                      <td><?php if($row['done']==NULL && $row['not_done']==NULL) { ?><a href="appointment.php?l=<?php echo $row['apid'];  ?>" onclick="confirmation(event)" class="btn btn-primary">Done</a><?php } ?></td>
                                      <td><?php if($row['done']==NULL && $row['not_done']==NULL) { ?><a href="appointment.php?ld=<?php echo $row['apid'];  ?>" onclick="confirmation(event)" class="btn btn-primary">Done</a><?php } ?></td>
						    <?php } ?>
                                      <td><?=$row['mtype'];?></td>
                                    </tr>

                                   <?php $i++;}} ?>

                                   </tbody></table>
                                   <?php } ?>

             </div>
          </div>

        </div>
     </div>
 </div>
<?php include_once("foot.php"); ?>

<script>
$(function(){
// $('#sdate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
// $('#edate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true});
$('#sdate').datetimepicker({
        format: 'DD-MM-YYYY',
        allowInputToggle: true,
        // defaultDate: moment()
    });
	$('#edate').datetimepicker({
        format: 'DD-MM-YYYY',
        allowInputToggle: true,
        // defaultDate: moment()
    }); 
}); 
</script>
<script src="theme/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
$(document).ready(function(){
	var table = $('#dataTables-Table_new').DataTable({
		responsive:false,
		// "scrollY": 200,
        "scrollX": true
	});

});

</script>

<script>

function confirmation(ev) {
      ev.preventDefault();
      // var d = $('#datepicker').val();
      url = ev.currentTarget.getAttribute('href');
      Swal.fire({
      title: 'Are You sure.',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No',
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger',
      buttonsStyling: false
    }).then(function (result) {
      if(result.value){
      Swal.fire('Done','Updated.');
      window.location.href= url;
    }
    else{
      Swal.fire('Cancelled');
    }
    });
}

</script>