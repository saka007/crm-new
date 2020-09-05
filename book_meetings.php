<?php
include_once("head.php");
?>

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
      <h3 class="bold no-mtop">12</h3>
      <p style="color:#989898" class="font-medium no-mbot">
        Not Started      </p>
      <p class="font-medium-xs no-mbot text-muted">
        Tasks assigned to me: 5      </p>
    </div>
        <div class="col-md-2 col-xs-6 border-right">
      <h3 class="bold no-mtop">10</h3>
      <p style="color:#03A9F4" class="font-medium no-mbot">
        In Progress      </p>
      <p class="font-medium-xs no-mbot text-muted">
        Tasks assigned to me: 1      </p>
    </div>
        <div class="col-md-2 col-xs-6 border-right">
      <h3 class="bold no-mtop">12</h3>
      <p style="color:#2d2d2d" class="font-medium no-mbot">
        Testing      </p>
      <p class="font-medium-xs no-mbot text-muted">
        Tasks assigned to me: 4      </p>
    </div>
        <div class="col-md-2 col-xs-6 border-right">
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
    </div>
      </div>

      <table id="userActivity" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr no.</th>
                                        <th>Client Name</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Mode of Meeting</th>
                                        <th></th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                   <tr><td></td></tr>

             </div>
          </div>

        </div>
     </div>
 </div>
<?php include_once("foot.php"); ?>