<?php
include_once("include/config.php");

// if($_GET['pass']==up){
//   echo "<script type='text/javascript'>Swal.fire(
//     'Password Updated!',
//     'Succesfully'
//   )</script>";
// }


if (isset($_POST['uname']) && isset($_POST['passwrd'])) {

  $uid = strtolower($_POST["uname"]);

  $pwd = $_POST["passwrd"];

  $sql = $obj->display('dm_employee', "username='" . $uid . "' and password='" . $pwd . "' and status=1");

  $data = $sql->fetch_array();

  // print_r($data);die; 

  // if($uid!=$data["email"] || $pwd!=$data["password"])    

  // {     

  // $invalid=true;      

  // //header('Location: login.php?msg=2');    

  // }   

  // else    

  // {     

  // // $rol=$obj->display('dm_role','id='.$data["role"]); $rol1=$rol->fetch_array();



  // $_SESSION["ADMIN_USERC"]="Activated";     

  // $_SESSION["LOG_USERC"]=$data["name"];      

  // // $_SESSION["BRANCH"]=$data["branch"];      

  // // $_SESSION["REGION"]=$data["region"];      

  // // $_SESSION["ROLE"]=$data["role"];      

  // $_SESSION["ID"]=$data["id"];      
  // // $_SESSION["PHOTO"]=$data["photo"];      

  // // $_SESSION["TYPE"]=$rol1["type"];      
  // $_SESSION["COUNTRY_INTEREST"]=$data["country_interest"];

  // $_SESSION["AUS_TYPE"]=$data["aus_type"];

  // header('Location: cdashboard.php');    

  // } 

  // }

  if ($uid != strtolower($data["username"]) || $pwd != $data["password"]) {

    $invalid = true;

    //header('Location: login.php?msg=2');		

  } else {

    $rol = $obj->display('dm_role', 'id=' . $data["role"]);
    $rol1 = $rol->fetch_array();



    $_SESSION["ADMIN_USER"] = "Active";

    $_SESSION["LOG_USER"] = $data["name"];

    $_SESSION["BRANCH"] = $data["branch"];

    $_SESSION["REGION"] = $data["region"];

    $_SESSION["ROLE"] = $data["role"];

    $_SESSION["ID"] = $data["id"];
    $_SESSION["PHOTO"] = $data["photo"];

    $_SESSION["TYPE"] = $rol1["type"];

    header('Location: dashboard.php');
  }
}

?>
<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Log In</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="theme/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="theme/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css">
    .bg-gradient-my {
      /* background-image: url("images/bg2.jpg"); */
    }
  </style>

</head>

<body class="hold-transition login-page bg-gradient-my">
  <div class="login-box">
    <div class="login-logo">
      <img src="images/gm.jpg">
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form method="post" class="user" action="">
          <div class="input-group mb-3">
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="uname" aria-describedby="emailHelp" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="passwrd" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" class="custom-control-input" id="customCheck">
                <label for="customCheck">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <input type="submit" name="submit" class="btn btn-primary btn-block" value="Login">
            </div>
            <!-- /.col -->
          </div>
          <!-- <a href="index.php" class="btn btn-primary btn-user btn-block">
                      Login
                    </a> -->

          <!-- <hr>
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a> -->
        </form>
        <br />
        <p class="mb-1">
          <a href="register.php">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="register.php" class="text-center">Register a new membership</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>


  <script src="theme/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="theme/dist/js/adminlte.min.js"></script>

</body>

</html>