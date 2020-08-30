<?php
include_once("head.php");

if($_POST)
{
  // print_r($_POST);die;
  $p=$_POST['password'];
  $rp=$_POST['rpassword'];
  if($p!=$rp)
  {
    header("Location: profile.php?pass=no");
  }
  else
  {

  $data=array(
    'fname'=>$_POST['fname'],
    'lname'=>$_POST['lname'],
    'email'=>$_POST['email'],
    'password'=>$_POST['password']
  );
  // print_r($data);die;
  $obj->update('dm_lead',$data,'id='.$cl1['id']);
  header('Location: profile.php');
}
// echo "no";die;
  
}
?>
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">My Profile</h1>

          <div class="row">

            <div class="col-lg-10">

              <!-- document list -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Personal Information</h6>
                </div>
                <div class="card-body">
              <form class="user" method="post" action="">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>First Name</label>
                    <input type="text" class="form-control form-control-user" id="FirstName" name="fname" value="<?=$cl1['fname']?>">
                  </div>
                  <div class="col-sm-6">
                    <label>Last Name</label>
                    <input type="text" class="form-control form-control-user" id="LastName" name="lname" value="<?=$cl1['lname']?>">
                  </div>
                </div>
                <label>Email</label>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="InputEmail" name="email" value="<?=$cl1['email']?>">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>Password</label>
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" value="<?=$cl1['password']?>">
                  </div>
                  <div class="col-sm-6">
                    <label>Re-enter Password</label>
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" name="rpassword" value="<?=$cl1['password']?>">
                  </div>
                </div>
                <?php if($_GET['pass']=="no"){ ?>
                  <div class="text-center">
                <h4 class="h4 text-red-900 mb-4" style="color:red">Password does not match</h4>
              </div>
            <?php } ?>
                </div>
                <input type="submit" name="register" value="Change Password" class="btn btn-primary btn-user btn-block">
                </input>
                </form>
                </div>

              </div>

            </div>

          </div>


      <!-- End of Main Content -->
      <?php include_once('foot.php'); ?>