<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<title></title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">

	$(document).ready(function(){

		$("#myModal").modal('show');

	});

</script>

</head>

<body>

<div id="myModal" class="modal fade">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title">Don't Refresh the page or Close the popup with out select an option</h4>

            </div>

            <div class="modal-body">

				<p>Kindly ensure that the details updated are updated and correct</p>

				

          <p class="text-center">
		  <a href="lead_observation_sheet.php?lead=<?php echo $_GET['lead'];?>" class="btn btn-info m-3">Confirm</a> 
		  <a href="lead_assesment_edit.php?id=<?php echo $_GET['lead'];?>" class="btn btn-info m-3">Edit</a>    
		  </p>


            </div>

        </div>

    </div>

</div>

</body>

</html>                            