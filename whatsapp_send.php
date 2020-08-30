<?php include_once('head.php'); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Whatsapp</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <!-- <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div> -->
                  <form method="post" action="whatsapp.php">
                    <h6 class="m-0 font-weight-bold text-primary">To your case processing officer :<?php echo $em1['name']; ?></h6>
                    <br/>
                    <textarea name="message" rows="5" cols="50" id="message"></textarea>
                    <br/>
                    <input class="btn btn-primary" type="submit" name="Send">

                </div>
              </div>
            </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      
      <!-- End of Main Content -->
<?php include_once('foot.php'); ?>