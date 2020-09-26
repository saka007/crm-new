<?php include_once("head.php");

if ($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RM"){
  $toth= $obj->display3('select count(*) as count from dm_lead where lead_category="Hot"');
  if ($toth->num_rows) { $toth1 = $toth->fetch_array(); }

  $tot_sale= $obj->display3('select SUM(paidYet) as total_sale from dm_lead');
  if ($tot_sale->num_rows) {  $tot_sale1 = $tot_sale->fetch_array(); }
}
else if ($_SESSION['TYPE']=="BM"){
  $toth= $obj->display3('select count(*) as count from dm_lead where lead_category="Hot" and region='.$_SESSION["REGION"]);
  if ($toth->num_rows) { $toth1 = $toth->fetch_array(); }
  
    $tot_sale= $obj->display3('select SUM(paidYet) as total_sale from dm_lead where region='.$_SESSION["REGION"]);
    if ($tot_sale->num_rows) {  $tot_sale1 = $tot_sale->fetch_array(); }
  }
else{
$toth= $obj->display3('select count(*) as count from dm_lead where lead_category="Hot" and counsilor='.$_SESSION["ID"]);
if ($toth->num_rows) { $toth1 = $toth->fetch_array(); }

  $tot_sale= $obj->display3('select SUM(paidYet) as total_sale from dm_lead where counsilor='.$_SESSION["ID"]);
  if ($tot_sale->num_rows) {  $tot_sale1 = $tot_sale->fetch_array(); }
}


$ie = $obj->display('ielts', 'id=1');
if ($ie->num_rows) {
	$ie1 = $ie->fetch_array();
}
if (isset($_GET['task'])) {
	$data1 = array(
		"status" => 1
	);
	$obj->update('dm_task', $data1, 'id=' . $_GET['task']);

	header("location:dashboard.php");
}
?>
 <!-- fullCalendar -->
 <link rel="stylesheet" href="https://phppot.com/demo/php-calendar-event-management-using-fullcalendar-javascript-library/fullcalendar/fullcalendar.min.css">
<style>
span.fc-title {
    color: #ffffff;
    font-size: 15px;
    margin-left: 5px;
    line-height: 20px;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-poll"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Leads</span>
                <span class="info-box-number"><?=$cl1total['count'];?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">New Leads</span>
                <span class="info-box-number"><?=$cl1['count'];?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span> 
               <div class="info-box-content">
                <span class="info-box-text">Total Clients</span>
                <span class="info-box-number"><?=$cln1['count'];?></span>
              </div>
              
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number"><?=$tot_sale1['total_sale'];?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Meeting Calender</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                  <div id="calendar"></div>
                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
  
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- MAP & BOX PANE -->
            
            <!-- /.card -->
            <div class="row">
              <div class="col-md-12">
                <div class="card-body p-0">
                   <!-- THE CALENDAR -->
                  <div id="calendar"></div>
                </div>
              </div>
            </div>
              <!-- /.col -->

              <!-- TABLE: LATEST ORDERS -->
    
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>


<!-- <div class="col-sm-12">
	<div class="row">
		<div class="col-sm-6">
			<div class="widget-box">
				<div class="widget-title">
					<h5>TODAY'S APPOINTMENTS</h5>
				</div>
				<div class="widget-content nopadding fix_hgt">
					<ul class="recent-posts">
						<?php $task = $obj->display('appointments', 'counsilorid=' . $_SESSION['ID'] . ' and date="' . date('Y-m-d') . '"');
						if ($task->num_rows) {
							while ($task1 = $task->fetch_array()) {
								$led = $obj->display('dm_lead', 'id=' . $task1['leadid']);
								$led1 = $led->fetch_array();
								if ($led1['service_interest'] == 2) {
									$ld = "DMB";
								}
								if ($led1['service_interest'] == 1) {
									$ld = "DMS";
								}
						?>
								<li>
									<div class="article-post">
										<div class="row">
											<div class="col-8"><a href="lead_edit.php?lead=<?php echo $task1["leadid"]; ?>"><?php echo $ld . '' . $task1["leadid"]; ?></a></div>
											<div class="col-4"><?php echo date('d-m-Y'); ?></div>
										</div>
									</div>
								</li>
							<?php }
						} else { ?>
							<li>
								<div class="article-post">
									<div class="row">
										<div class="col-8">NO DATA FOUND</div>
									</div>
								</div>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="widget-box">
				<div class="widget-title">
					<h5>TO DO'S</h5>
				</div>
				<div class="widget-content nopadding fix_hgt">
					<ul class="recent-posts">
						<?php $task = $obj->display('dm_task', 'asignTo=' . $_SESSION['ID'] . ' and dob="' . date('Y-m-d') . '"');
						if ($task->num_rows) {
							while ($task1 = $task->fetch_array()) {
								$emp = $obj->display('dm_employee', 'id=' . $task1['asignBy']);
								$emp1 = $emp->fetch_array();
						?>
								<li>
									<div class="article-post">
										<div class="row">
											<div class="col-10"><?php echo $emp1['name'] . ' says ' . $task1['task']; ?></div>
											<div class="col-2"><?php if ($task1['status'] == 0) { ?>
													<a href="dashboard.php?task=<?= $task1['id']; ?>">Status</a>
												<?php } else {
																	echo "<h6>Done</h6>";
																} ?></div>
										</div>
									</div>
								</li>
							<?php }
						} else { ?>
							<li>
								<div class="article-post">
									<div class="row">
										<div class="col-8">NO DATA FOUND</div>
									</div>
								</div>
							</li>
						<?php } ?>

					</ul>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="col-sm-12">
	<div class="row">
		<div class="col-sm-6">
			<div class="widget-box">
				<div class="widget-title">
					<h5>BALANCE COLLECTION FOR TODAY</h5>
				</div>
				<div class="widget-content nopadding fix_hgt">
					<ul class="recent-posts">
						<?php
						if ($_SESSION['TYPE'] == "RM" || $_SESSION['TYPE'] == "SA" || $_SESSION['TYPE'] == "FMP" || $_SESSION['TYPE'] == "DGM" || $_SESSION['TYPE'] == "RMSM" || $_SESSION['TYPE'] == "FO") {
							$bal = $obj->display('dm_lead', 'payBalance!=0 and dueDate="' . date('Y-m-d') . '"');
						} else if ($_SESSION['TYPE'] == "AM" || $_SESSION['TYPE'] == "ABM" || $_SESSION['TYPE'] == "BM" || $_SESSION['TYPE'] == "IC" || $_SESSION['TYPE'] == "MC" || $_SESSION['TYPE'] == "SIC") {
							$bal = $obj->display('dm_lead', 'payBalance!=0 and Counsilor="' . $_SESSION['ID'] . '" and dueDate="' . date('Y-m-d') . '"');
						}
						if ($bal->num_rows) {
							while ($bal1 = $bal->fetch_array()) {
						?>
								<li>
									<div class="article-post">
										<div class="row">
											<div class="col-8"><?= $bal1['fname']; ?></div>
											<div class="col-4">AED <?= $bal1['payBalance']; ?></div>
										</div>
									</div>
								</li>
							<?php }
						} else { ?>
							<li>
								<div class="article-post">
									<div class="row">
										<div class="col-8">NO DATA FOUND</div>
									</div>
								</div>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="widget-box">
				<div class="widget-title">
					<h5>FOLLOW-UP FOR THE DAY</h5>
				</div>
				<div class="widget-content nopadding fix_hgt">
					<ul class="recent-posts">
						<?php $task = $obj->display('dm_lead', 'assignTo=' . $_SESSION['ID'] . ' and followup="' . date('Y-m-d') . '"');
						if ($task->num_rows) {
							while ($task1 = $task->fetch_array()) {
								if ($task1['service_interest'] == 2) {
									$ld = "DMB";
								}
								if ($task1['service_interest'] == 1) {
									$ld = "DMS";
								}
						?>
								<li>
									<div class="article-post">
										<div class="row">
											<div class="col-8"><a href="lead_edit.php?lead=<?php echo $task1["id"]; ?>"><?php echo $ld . '' . $task1["id"]; ?></a></div>
											<div class="col-4"><?php echo date('d-m-Y'); ?></div>
										</div>
									</div>
								</li>
							<?php }
						} else { ?>
							<li>
								<div class="article-post">
									<div class="row">
										<div class="col-8">NO DATA FOUND</div>
									</div>
								</div>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div> -->


<!-- <div class="col-sm-12">
	<h5>IELTS Schedule</h5>
	<br />
	<Label>NEXT IELTS SESSION IS ON : <?php echo $ie1['timing']; ?> </Label><br />
	<?php if ($_SESSION['TYPE'] == "SA") { ?>
		<label>link for Session</label>: <a href="<?php echo $ie1['link']; ?>" target="_blank"><?php echo $ie1['link']; ?></a>
	<?php } ?>

</div> -->


  <!-- Page level plugins -->
  <!-- <script src="theme/vendor/chart.js/Chart.min.js"></script>
  <script src="theme/js/demo/chart-area-demo.js"></script>
  <script src="theme/js/demo/chart-pie-demo.js"></script>  -->
<?php include_once("foot.php"); ?>
<!-- ChartJS -->
<script src="theme/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="theme/plugins/sparklines/sparkline.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <script src="theme/dist/js/pages/dashboard2.js"></script>
<!--<script src="theme/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="theme/dist/js/demo.js"></script> -->
<!-- fullCalendar 2.2.5 -->
<script src='http://fullcalendar.io/js/fullcalendar-2.2.5/fullcalendar.min.js'></script>

<!-- <script src="theme/plugins/fullcalendar-daygrid/main.min.js"></script> -->
<!-- <script src="../plugins/fullcalendar-timegrid/main.min.js"></script> -->
<!-- <script src="theme/plugins/fullcalendar-interaction/main.min.js"></script>
<script src="theme/plugins/fullcalendar-bootstrap/main.min.js"></script> -->
<!-- Page specific script -->
<script>

$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
        editable: false,
        events: "fetch-event.php",
        displayEventTime: false,
        eventRender: function (event, element, view) {
            event.allDay = false;
            // if (event.allDay === 'true') {
            //     event.allDay = true;
            // } else {
            //     event.allDay = false;
            // }
        },
       // selectable: true,
        //selectHelper: true,
        // select: function (start, end, allDay) {
        //     var title = prompt('Event Title:');

        //     if (title) {
        //         var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
        //         var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

        //         displayMessage("Added Successfully");
        //         calendar.fullCalendar('renderEvent',
        //                 {
        //                     title: title,
        //                     start: start,
        //                     end: end,
        //                     allDay: allDay
        //                 },
        //         true
        //                 );
        //     }
        //     calendar.fullCalendar('unselect');
        // },

        editable: true,
        // eventDrop: function (event, delta) {
        //             var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
        //             var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
        //             displayMessage("Updated Successfully");
        //         },
        eventClick: function (event) {
            var deleteMsg = confirm("Do you want to go to lead management page?");
            if (deleteMsg) {
                 window.location.href = "lead_view.php?lead="+event.title;
                // $('#calendar').fullCalendar('removeEvents', event.id);
                // displayMessage("Deleted Successfully");

            }
        }

    });
});

function displayMessage(message) {
	    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
}
</script>