<?php   
include_once("include/config.php");
// print_r($_POST);
  $cl=$obj->display('dm_lead',"email='".$_POST['emailf']."'");
  $cl1=$cl->fetch_array();
  if($_POST['emailf']){
    session_start();
  $_SESSION['lead'] = $cl1['id'];
  // echo $_COOKIE['lead']."as";
  }
  
  if ($cl1['id']=="")
  {
    header('Location: register.php?email=no');
  }
  // $cl=$obj->display('dm_lead',"email='".$_POST['emailf']."'");
  // $cl1=$cl->fetch_array();
// $cl=$obj->display('dm_lead',"id=".$_POST['lead']);
// $cl1=$cl->fetch_array();
// echo 'User IP - '.$_SERVER['REMOTE_ADDR'];

if($_POST['password'])
{
  $data=array(
    'fname'=>$_POST['fname'],
    'lname'=>$_POST['lname'],
    'email'=>$_POST['email'],
    'password'=>$_POST['password']
    // 'i_p' =>$_SERVER['REMOTE_ADDR']
  );
  // print_r($data);die;
  $obj->update('dm_lead',$data,'id='.$_SESSION['lead']);

  header('Location: login.php');

// echo "no";die;
  
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <!-- <meta http-equiv="X-UA-Compatible"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
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

  body {
  padding-right: 0px !important
}

.modal-open {
  overflow-y: auto;
}
 
/* .modal-body {
    position: relative;
    overflow-y: auto;
    max-height: 400px;
    padding: 15px;
} */
</style>

</head>

<body class="bg-gradient-my">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="post" action="">
              <!-- <input type="hidden" name="lead" value="<?=$cl1['id'] ?>"> -->

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="fname" name="fname" value="<?=$cl1['fname']?>">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="lname" name="lname" value="<?=$cl1['lname']?>">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email" name="email" value="<?=$cl1['email']?>">
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password" name="password" value="">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="rpassword" name="rpassword" value="">
                  </div>
                  <div id="malert" class="text-center" style="display: none;">
                <h4 class="h4 text-red-900 mb-4" style="color:red">Password does not match</h4>
              </div>
                </div>
                <input type="submit" name="register" value="submit" class="btn btn-primary btn-user btn-block">
                </input>
                <!-- <hr>
                <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a> -->
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>

                <!-- <a class="small" href="login.php">Already have an account? Login!</a>

              
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

  <script>
$('#rpassword').on('keyup',function(){
  var pass=$('#password').val();
  var rpass=$('#rpassword').val();
  console.log(rpass,pass);
  // console.log(pass);
  if (pass!=rpass){
  $("#malert").css("display","");
  }
  else{
    $("#malert").css("display","none");
  }
});

</script>
</body>
</html>