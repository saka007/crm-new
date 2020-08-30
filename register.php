<?php   
include_once("include/config.php");

if($_POST['find']){
$cl=$obj->display('dm_lead',"email='".$_POST['emailf']."'");
$cl1=$cl->fetch_array();
if ($cl1['id']=="")
{
  header('Location: register.php?email=no');

}
else{
header('Location: register2.php');
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <!-- <meta http-equiv="X-UA-Compatible"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register</title>

  <!-- Custom fonts for this template-->
  <link href="theme/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="theme/css/sb-admin-2.css" rel="stylesheet">
  <style type="text/css">
  .bg-gradient-my {
    background-image:url("images/bg2.jpg");
  }

  .toplogo{

  }
</style>

</head>

<body class="bg-gradient-my">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <!-- <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1> -->
              </div>
              <form class="user" method="post" action="register2.php">
              <!-- <input type="hidden" name="lead" value="<?php echo $cl1['id']; ?>"> -->

                <div>
                <h1 class="h4 text-gray-900 mb-4">Please enter your email for us to locate your account</h1>
              </div>
              <?php if($_GET['email']=="no") { ?>
              <div>
                <h3 style="color:red;" class="h4 text-red-900 mb-4">Unable to find your email please check and try again</h3>
              </div>
              <?php } ?>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="emailf" name="emailf">
                </div>
              <input type="submit" name="find" value="Find Account" class="btn btn-primary btn-user btn-block">
                </input>


                <!-- <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                  </div>
                </div>
                <input type="submit" name="register" value="Register" class="btn btn-primary btn-user btn-block">
                </input> -->
                <!-- <hr>
                <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a> -->
              </form>
              <hr>
              <!-- <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div> -->
              <div class="text-center">
                <!-- <a class="small" href="login.php">Already have an account? Login!</a> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="theme/vendor/jquery/jquery.min.js"></script>
  <script src="theme/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="theme/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="theme/js/sb-admin-2.min.js"></script>
</body>

</html>