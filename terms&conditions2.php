<?php 	

include_once("include/config.php");

// echo 'User IP - '.$_SERVER['REMOTE_ADDR'];
// var_dump($cl1);
    $cl=$obj->display('dm_lead',"email='".$_POST['emailf']."'");
    $cl1=$cl->fetch_array();
if($_POST['emailf']){
  
  if (strtolower($cl1['email'])==strtolower($_POST['emailf']))
  {
    $cl=$obj->display('dm_lead',"email='".$_POST['emailf']."'");
    $cl1=$cl->fetch_array();
    session_start();
  $_SESSION['lead']=$cl1['id'];
  
  }
  else{
// header('Location: terms&conditions2.php?lead='.$cl1['id']);
header('Location: terms&conditions.php?msg=2');
  }
  }

if($_POST['email'])
{
  
  $data=array(
    // 'fname'=>$_POST['fname'],
    // 'lname'=>$_POST['lname'],
    // 'email'=>$_POST['email'],
    // 'password'=>$_POST['password']
    'i_p' =>$_SERVER['REMOTE_ADDR']
  );
  // print_r($data);die;
  $obj->update('dm_lead',$data,'id='.$_SESSION['lead']);
  header('Location: thank-you.php');
// echo "no";die;
  
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

	<title>Terms&conditions</title>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->	

	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

<!--===============================================================================================-->

	<!-- <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.css"> -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<!--===============================================================================================-->

	<link href="https://fonts.googleapis.com/css?family=Marck+Script" rel="stylesheet">

<!--===============================================================================================-->	

<!--===============================================================================================-->

<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="css/main.css">

<!--===============================================================================================-->
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

<body>

		<div class="container">

		<div class="row">

		<div class="col-12">

				<div class="logo text-center mt-5 mb-5" data-tilt>

					<img src="images/logo.jpg" alt="IMG">

				</div>

			</div>

		</div>	

		<div class="row">

		<div class="offset-sm-3 col-sm-6 col-12 mb-5">

		
        <form class="user" method="post" action="">

<div class="form-group row">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <input readonly type="text" class="form-control" id="fname" name="fname" value="<?=$cl1['fname']?>">
  </div>
  <div class="col-sm-6">
    <input readonly type="text" class="form-control" id="lname" name="lname" value="<?=$cl1['lname']?>">
  </div>
</div>
<div class="form-group">
  <input readonly type="email" class="form-control form-control-user" id="email" name="email" value="<?=$cl1['email']?>">
</div>
<div class="form-group">


<input type="checkbox" id="tc" name="tc" value="1" required>
 <Label>I Agree DM's&nbsp;&nbsp;&nbsp;&nbsp;</Label></span><button class="small opentc">Terms & conditions</button>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Terms & Conditions</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">

</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

<!-- end of Modal -->
</div>

<?php if ($cl1['country_interest']==2){ ?>

<div class="form-group">


<input type="checkbox" id="tc" name="tc" value="1" required>
<Label>I Agree to Lawyer's&nbsp;&nbsp;&nbsp;&nbsp;</Label></span><button class="small openltc">Terms & conditions</button>

<!-- Modal -->
<div class="modal fade" id="myModal2" role="dialog">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Terms & Conditions</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body2">

</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<?php } ?>
<!-- end of Modal -->
</div>
<!-- <div class="form-group row">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <input type="password" class="form-control form-control-user" id="password" name="password" value="<?=$cl1['password']?>">
  </div>
  <div class="col-sm-6">
    <input type="password" class="form-control form-control-user" id="rpassword" name="rpassword" value="<?=$cl1['password']?>">
  </div>
  <?php if($_GET['pass']=="no"){ ?>
  <div class="text-center">
<h4 class="h4 text-red-900 mb-4" style="color:red">Password does not match</h4>
</div>
<?php } ?>
</div> -->
<input type="submit" name="register" value="By Clicking here you accept above Terms & conditions" class="btn btn-primary btn-user btn-block">
</input>
<!-- <hr>
<a href="index.html" class="btn btn-google btn-user btn-block">
  <i class="fab fa-google fa-fw"></i> Register with Google
</a>
<a href="index.html" class="btn btn-facebook btn-user btn-block">
  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
</a> -->
</form>

			</div>

		</div>

		<!-- <div class="row">

		<div class="col-12">

		<p class="caption">Every contact we have with a customer influences whether or not they 'll come back. <br>

		We have to be great every time or we 'll lose them. - Kevil Stirtz</p>

		</div>

		</div> -->





	</div>

	

	



	

<!--===============================================================================================-->	

	

<!--===============================================================================================-->
<!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	

    

<!--===============================================================================================-->

	<!-- <script src="js/main.js"></script> -->

    <script>
$('.opentc').on('click',function(){
    $('.modal-body').load('t&c.php?lead=<?php echo $_GET['lead'];?>',function(){
        $('#myModal').modal({show:true});
    });
});

$('.openltc').on('click',function(){
    $('.modal-body2').load('lawyer_t&c.php?lead=<?php echo $_GET['lead'];?>',function(){
        $('#myModal2').modal({show:true});
    });
});
</script>



</body>

</html>