<?php
include_once("head.php");
$profileSql = $obj->display('dm_employee', "id=" . $_SESSION['ID']);
if ($profileSql->num_rows) {
  $fetchProfile = $profileSql->fetch_array();
}
if ($_POST) {
  // print_r($_POST);die;
  $p = $_POST['password'];
  $rp = $_POST['rpassword'];
  if ($p != $rp) {
    header("Location: profile.php?pass=no");
  } else {
    $photo = "";
    if ($_FILES['photo']['name'] != "") {
      $photo = time() . $_FILES['photo']['name'];
      move_uploaded_file($_FILES["photo"]["tmp_name"], "./uploads/employee/" . $photo);
    }
    $data = array(
      'name' => $_POST['name'],
      'mobile' => $_POST['mobile'],
      'photo' => $photo,
      'email' => $_POST['email'],
      'password' => $_POST['password']
    );
    // print_r($data);die;
    $obj->update('dm_employee', $data, 'id=' . $fetchProfile['id']);
    header('Location: profile.php');
  }
}
?>
<!-- Begin Page Content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>My Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">My Profile</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="./uploads/employee/<?= $fetchProfile['photo'] ?>" alt="User profile picture">
              </div>

              <h3 class="profile-username text-center"><?= $fetchProfile['name'] ?></h3>

              <p class="text-muted text-center"><?= $fetchProfile['designation'] ?></p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-9">
          <div class="card">
            <div class="card-header card-primary card-outline">
              <h3 class="card-title">Personal Information
                <?php if ($_GET['pass'] == "no") { ?>
                  <span class="bg-danger">Password does not match</span>
                <?php } ?>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form class="user" method="post" action="" enctype="multipart/form-data">
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label>Name</label>
                    <input type="text" class="form-control form-control-user" id="name" name="name" value="<?= $fetchProfile['name'] ?>" required>
                  </div>
                  <div class="col-sm-6">
                    <label>Email</label>
                    <input type="email" class="form-control form-control-user" id="InputEmail" name="email" value="<?= $fetchProfile['email'] ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label>Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="photo">
                        <label class="custom-file-label">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label>Mobile Number</label>
                    <input type="text" class="form-control form-control-user" id="mobile" name="mobile" value="<?= $fetchProfile['mobile'] ?>">
                  </div>
                </div>
                <?php if ($_SESSION['TYPE'] == "SA" || $_SESSION['TYPE'] == "RM") { ?>
                <div class="form-group row">
                  <div class="form-group col-sm-8">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" value="<?= $fetchProfile['address'] ?>" />
                  </div>
                  <div class="form-group col-sm-4">
                    <label>Date of Joining</label>
                    <div class="input-group date" id="dob" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" name="dob" data-target="#dob" value="<?= date('d-m-Y', strtotime($fetchProfile['dob'])) ?>" />
                      <div class="input-group-append" data-target="#dob" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-sm-4">
                    <label>DOB</label>
                    <div class="input-group date" id="doj" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" name="doj" data-target="#doj" value="<?= date('d-m-Y', strtotime($fetchProfile['doj'])) ?>" />
                      <div class="input-group-append" data-target="#doj" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group col-sm-4">
                    <label>Nationality</label>
                    <input type="text" class="form-control" name="nationality" value="<?= $fetchProfile['nationality']; ?>" />
                  </div>
                  <div class="col-12">
                    <h4>
                      <i class="fas fa-users"></i> Management details
                    </h4>
                  </div>
                  <div class="form-group col-sm-4">
                    <label>Role</label>
                    <select type="text" class="form-control" name="role">
                      <?php
                      $reg = $obj->display("dm_role", "status=1 order by name ASC");
                      while ($reg2 = $reg->fetch_array()) {
                      ?>
                        <option value="<?php echo $reg2['id']; ?>" <?php if ($reg2['id'] == $fetchProfile['role']) {
                                                                      echo 'selected="selected"';
                                                                    } ?>><?php echo $reg2['name']; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group col-sm-4">
                    <label>Branch</label>
                    <select type="text" class="form-control" name="branch">
                      <?php
                      $reg = $obj->display("dm_branch", "status=1 order by name ASC");
                      while ($reg2 = $reg->fetch_array()) {
                      ?>
                        <option value="<?php echo $reg2['id']; ?>" <?php if ($reg2['id'] == $fetchProfile['branch']) {
                                                                      echo 'selected="selected"';
                                                                    } ?>><?php echo $reg2['name']; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group col-sm-4">
                    <label>Department</label>
                    <select type="text" class="form-control" name="department">
                      <?php
                      $reg = $obj->display("dm_department", "status=1 order by name ASC");
                      while ($reg2 = $reg->fetch_array()) {
                      ?>
                        <option value="<?php echo $reg2['id']; ?>" <?php if ($reg2['id'] == $fetchProfile['department']) {
                                                                      echo 'selected="selected"';
                                                                    } ?>><?php echo $reg2['name']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-sm-4">
                    <label>Designation</label>
                    <input type="text" class="form-control" name="designation" value="<?= $fetchProfile['designation'] ?>" />
                  </div>
                  <div class="form-group col-sm-4">
                    <label>Passport No.</label>
                    <input type="text" class="form-control" name="ppNo" value="<?= $fetchProfile['ppNo'] ?>" />
                  </div>

                  <div class="form-group col-sm-4">
                    <label>Visa Exp.</label>
                    <div class="input-group date" id="visaExp" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" name="visaExp" data-target="#visaExp" value="<?= date('d-m-Y', strtotime($fetchProfile['visaExp'])) ?>" />
                      <div class="input-group-append" data-target="#visaExp" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group col-sm-4">
                    <label>Emirates ID</label>
                    <input type="text" class="form-control" name="EID" value="<?= $fetchProfile['EID']; ?>" />
                  </div>
                </div>
                <?php } ?>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>Password</label>
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" value="<?= $fetchProfile['password'] ?>">
                  </div>
                  <div class="col-sm-6">
                    <label>Re-enter Password</label>
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" name="rpassword" value="<?= $fetchProfile['password'] ?>">
                  </div>
                </div>

            </div>
            <input type="submit" name="register" value="Update Profile" class="btn btn-primary btn-user btn-block">
            </input>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>


<!-- End of Main Content -->
<?php include_once('foot.php'); ?>
<script>
  $(document).ready(function() {
    bsCustomFileInput.init();
    $('#dob').datetimepicker({
      format: 'DD-MM-YYYY',
      allowInputToggle: true,

    });
    $('#doj').datetimepicker({
      format: 'DD-MM-YYYY',
      allowInputToggle: true,
    });
    $('#visaExp').datetimepicker({
			format: 'DD-MM-YYYY',
			allowInputToggle: true,
		});
  });
</script>