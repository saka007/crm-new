<?php
include_once("head.php");
if ($_SESSION['TYPE']=="SA"){
$tots= $obj->display3('SELECT COUNT(*) as count FROM `appointments`');
$tots1 = $tots->fetch_array();
}
else{
$tots= $obj->display3('SELECT COUNT(*) as count FROM `appointments` WHERE counsilorid='.$_SESSION['ID']);
$tots1 = $tots->fetch_array();
}
if ($_SESSION['TYPE']=="SA"){
  $mdone= $obj->display3('SELECT COUNT(*)  as count FROM `appointments` WHERE done=1');
$mdone1 = $mdone->fetch_array();
}
else{
$mdone= $obj->display3('SELECT COUNT(*)  as count FROM `appointments` WHERE counsilorid='.$_SESSION['ID'].' and done=1');
$mdone1 = $mdone->fetch_array();
}

if ($_SESSION['TYPE']=="SA"){
  $ndone= $obj->display3('SELECT COUNT(*)  as count FROM `appointments` WHERE done is NULL');
$ndone1 = $ndone->fetch_array();
}
else{
$ndone= $obj->display3('SELECT COUNT(*)  as count FROM `appointments` WHERE counsilorid='.$_SESSION['ID'].' and done is NULL');
$ndone1 = $ndone->fetch_array();
}

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
      <h3 class="bold no-mtop"><?=$tots1['count'];?></h3>
      <p style="color:#989898" class="font-medium no-mbot">
        Total Meetings Booked    </p>
          </div>
        <div class="col-md-2 col-xs-6 border-right">
      <h3 class="bold no-mtop"><?=$mdone1['count'];?></h3>
      <p style="color:#03A9F4" class="font-medium no-mbot">
        Meeting Done      </p>
    </div>
        <div class="col-md-2 col-xs-6 border-right">
      <h3 class="bold no-mtop"><?=$ndone1['count'];?></h3>
      <p style="color:#2d2d2d" class="font-medium no-mbot">
        Meetings Yet to Done     </p>
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

      <table class="table table-bordered table-striped" id="dataTables-Table_new" name="dataTables-Table_new" style="width:100%" > 
                                <thead>
                                    <tr>
                                        <th>Sr no.</th>
                                        <th>Client Name</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Mode of Meeting</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php
                                   if($_SESSION['TYPE']=="SA"){
                                    $meet = $obj->display3('SELECT *,a.type as mtype FROM `appointments` a INNER JOIN dm_lead l on a.leadid=l.id');
                                   }
                                   else{
                                   $meet = $obj->display3('SELECT *,a.type as mtype FROM `appointments` a INNER JOIN dm_lead l on a.leadid=l.id WHERE a.counsilorid='.$_SESSION['ID']);
                                   }
                                   if($meet->num_rows > 0) {
                                      $i=1;
                                   while($row = $meet->fetch_array())
                                   { ?>
                                   <tr>
                                      <td><?=$i;?></td>
                                      <td><?=$row['fname'].''.$row['lname'];?></td>
                                      <td><?=$row['date'];?></td>
                                      <td><?php if($row['done']==1) { echo "Done"; } else { echo "Not Done"; }?></td>
                                      <td><?=$row['mtype'];?></td>
                                    </tr>

                                   <?php $i++;}} ?>

                                   </tbody></table>

             </div>
          </div>

        </div>
     </div>
 </div>
<?php include_once("foot.php"); ?>
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