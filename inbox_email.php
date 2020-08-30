 <?php
 include_once('head.php');
 ?>
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Inbox</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  
                  <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Sr no</th>
      <th scope="col">date</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $result=$obj->display('dm_client_email','leadid='.$_SESSION['ID']);
    if($result->num_rows>0)
    {
      $i=1;
      while($row=$result->fetch_assoc())
      {?>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['email']; ?></td>
      <?php 
      $i++;
    }
    }
    ?>
  <!--   <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr> -->
  </tbody>
</table>

                </div>
              </div>
            </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php include_once('foot.php');