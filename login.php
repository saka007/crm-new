<?php
include_once("include/config.php");

// if($_GET['pass']==up){
//   echo "<script type='text/javascript'>Swal.fire(
//     'Password Updated!',
//     'Succesfully'
//   )</script>";
// }


if(isset($_POST['uname']) && isset($_POST['passwrd']))  

{   

$uid=$_POST["uname"];    

$pwd=$_POST["passwrd"];        

$sql=$obj->display('dm_lead',"email='".$uid."' and password='".$pwd."' and status='Active'");   

$data=$sql->fetch_array();

// print_r($data);die; 

if($uid!=$data["email"] || $pwd!=$data["password"])    

{     

$invalid=true;      

//header('Location: login.php?msg=2');    

}   

else    

{     

// $rol=$obj->display('dm_role','id='.$data["role"]); $rol1=$rol->fetch_array();



$_SESSION["ADMIN_USERC"]="Activated";     

$_SESSION["LOG_USERC"]=$data["name"];      

// $_SESSION["BRANCH"]=$data["branch"];      

// $_SESSION["REGION"]=$data["region"];      

// $_SESSION["ROLE"]=$data["role"];      

$_SESSION["ID"]=$data["id"];      
// $_SESSION["PHOTO"]=$data["photo"];      

// $_SESSION["TYPE"]=$rol1["type"];      
$_SESSION["COUNTRY_INTEREST"]=$data["country_interest"];

$_SESSION["AUS_TYPE"]=$data["aus_type"];

header('Location: cdashboard.php');    

} 

}

?>
<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Log In</title>

        <link href="theme/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="theme/css/sb-admin-2.css" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
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

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5" style="background-color: rgb(255,255,255,0.8)!important;">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="toplogo" align="center" style="padding-top: 1rem"><img src="images/logo.png"> </div>
                <div class="" style="padding: 1rem 3rem 1rem 3rem">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
                  </div>
                  <form method="post" class="user" action="">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="uname" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="passwrd" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <!-- <a href="index.php" class="btn btn-primary btn-user btn-block">
                      Login
                    </a> -->
                    <input type="submit" name="submit" style="background-color:#2bb673" class="btn btn-success btn-user btn-block" value="Login">
                    <!-- <hr>
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a> -->
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="register.php">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div>
                </div>
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
