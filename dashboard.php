<?php include_once("head.php");

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

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
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
                <span class="info-box-number">
                  10,000
                </span>
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
                <span class="info-box-number">5,000</span>
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
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">760</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Employee</span>
                <span class="info-box-number">2,000</span>
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
                <h5 class="card-title">Monthly Recap Report</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                    </p>

                    <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                      <!-- Sales Chart Canvas -->
                      <canvas id="salesChart" height="180" style="height: 180px; display: block; width: 680px;" width="680" class="chartjs-render-monitor"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Goal Completion</strong>
                    </p>

                    <div class="progress-group">
                      Total Sales
                      <span class="float-right"><b>160</b>/200</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: 80%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Total Leads
                      <span class="float-right"><b>310</b>/400</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: 75%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Total Meetings</span>
                      <span class="float-right"><b>480</b>/800</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 60%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Total Payments
                      <span class="float-right"><b>250</b>/500</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: 50%"></div>
                      </div>
                    </div>
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
              <div class="col-md-6">
                <!-- DIRECT CHAT -->
               <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i></button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
                <!--/.direct-chat -->
              </div>
              <!-- /.col -->

              <div class="col-md-6">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Latest Members</h3>

                    <div class="card-tools">
                      <span class="badge badge-danger">8 New Members</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                      <li>
                        <img src="theme/dist/img/user1-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Alexander Pierce</a>
                        <span class="users-list-date">Today</span>
                      </li>
                      <li>
                        <img src="theme/dist/img/user8-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Norman</a>
                        <span class="users-list-date">Yesterday</span>
                      </li>
                      <li>
                        <img src="theme/dist/img/user7-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Jane</a>
                        <span class="users-list-date">12 Jan</span>
                      </li>
                      <li>
                        <img src="theme/dist/img/user6-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">John</a>
                        <span class="users-list-date">12 Jan</span>
                      </li>
                      <li>
                        <img src="theme/dist/img/user2-160x160.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Alexander</a>
                        <span class="users-list-date">13 Jan</span>
                      </li>
                      <li>
                        <img src="theme/dist/img/user5-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Sarah</a>
                        <span class="users-list-date">14 Jan</span>
                      </li>
                      <li>
                        <img src="theme/dist/img/user4-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Nora</a>
                        <span class="users-list-date">15 Jan</span>
                      </li>
                      <li>
                        <img src="theme/dist/img/user3-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Nadia</a>
                        <span class="users-list-date">15 Jan</span>
                      </li>
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="javascript::">View All Users</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- TABLE: LATEST ORDERS -->
    
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Inventory</span>
                <span class="info-box-number">5,200</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="far fa-heart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Mentions</span>
                <span class="info-box-number">92,050</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Downloads</span>
                <span class="info-box-number">114,381</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="far fa-comment"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Direct Messages</span>
                <span class="info-box-number">163,921</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <!-- /.card -->

          </div>
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
<?php include_once("foot.php");

?>