<?php 	

include_once("include/config.php");

// var_dump($_POST);

if($_POST){
    $cl=$obj->display('dm_lead',"email='".$_POST['emailf']."'");
    $cl1=$cl->fetch_array();
    if (strtolower($cl1['email'])==strtolower($_POST['emailf']))
    {
	//   header('Location: terms&conditions.php?msg=2');
	  header('Location: terms&conditions2.php?lead='.$cl1['id']);
    
    }
    else{
	// header('Location: terms&conditions2.php?lead='.$cl1['id']);
	header('Location: terms&conditions.php?msg=2');
    }
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

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.css">

<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<!--===============================================================================================-->

	<link href="https://fonts.googleapis.com/css?family=Marck+Script" rel="stylesheet">

<!--===============================================================================================-->	

<!--===============================================================================================-->

<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="css/main.css">

<!--===============================================================================================-->

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

		
                <form class="user" method="post" action="terms&conditions2.php">


                <div>
                <h1 class="h4 text-gray-900 mb-4">Please enter your email for us to locate your account</h1>
              </div>
              <?php if($_GET['email']=="no") { ?>
              <div>
                <h3 style="color:red;" class="h4 text-red-900 mb-4">Unable to find your email please check and try again</h3>
              </div>
              <?php } ?>
              <div class="row">
                <div class="form-group col-sm-8">

                  <input type="email" class="form-control" placeholder="ENTER YOUR Email ID" id="emailf" name="emailf" required>
                
                </div>

                <div class="col-sm-2">

					<input type="submit" name="find" class="sub_btn" value="">

					</div>
                    <span class="text-danger" id="error"><?php if(isset($_GET['msg'])==2) { echo "Email Not Found ,Please try Again!"; } ?></span>
              <!-- <input type="submit" name="find" value="Find Account" class="btn btn-primary btn-user btn-block">
                </input> -->

                </div>

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

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

<!--===============================================================================================-->

	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!--===============================================================================================-->

	<script src="js/main.js"></script>



</body>

</html>