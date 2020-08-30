<?php include_once("header.php");	?>





		<div class="col-sm-10">

		<div class="row"><div class="col-sm-6"><h4 class="mb-3" style="color:#2cb674;">Expense Report</h4></div></div>

<form name="search" action="" method="post">

<div class="row">

<div class="col-sm-2 form-group">

<label >Start Date</label>

<input type="text" class="form-control" id="sdate" name="sdate" value="<?php if($_POST['sdate']) echo $_POST['sdate']; else  echo date('d-m-Y')?>" >

</div>

<div class="col-sm-2 form-group">

<label >End Date</label>

<input type="text" class="form-control" id="edate" name="edate" value="<?php if($_POST['edate']) echo $_POST['edate']; else echo date('d-m-Y')?>" >

</div>

<?php if($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RM" || $_SESSION['TYPE']=="RMSM" || $_SESSION['TYPE']=="DGM" || $_SESSION['TYPE']=="FMP") { ?>		

<div class="col-sm-3 form-group"><label>Region</label>

<select class="form-control" name="region" id="region" >

	<option value="">Select</option>

	<?php $sou=$obj->display('dm_region','status=1 order by name');

	while($sou1=$sou->fetch_array())

	{

	?>

	<option value="<?php echo $sou1['id'];?>"  <?php if($sou1['id']==$_POST['region']) { echo 'selected="selected"';}?>><?php echo $sou1['name'];?></option>

	<?php } ?>

	</select>

</div>



<div class="col-sm-3 form-group"><label>Branch</label>

<select class="form-control" name="branch" id="branch" >

	<option value="">Select</option>

	</select>

</div>

<?php } ?>





<div class="col-sm-2 form-group"><label >&nbsp;</label><br /><input type="submit" class="btn btn-info" name="search" value="Search" ></div>

</div>

</form>





<?php
if($_SESSION['TYPE']=="BM") { 
$query="branch=".$_SESSION['BRANCH'];
}
if($_SESSION['TYPE']=="RM" || $_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="FMP" || $_SESSION['TYPE']=="DGM" || $_SESSION['TYPE']=="RMSM") { 	
$query="1=1";
if($_POST['region']!="") { 
	$query.=" and region=".$_POST['region'];
}
if($_POST['branch']!="") { 
	$query.=" and branch=".$_POST['branch'];
}

}
if($_POST)

{

$query.=" and date between '".date('Y-m-d',strtotime($_POST["sdate"]))."' and '".date('Y-m-d',strtotime($_POST["edate"]))."'";



?>



		<div class="row">

		<div class="col-sm-12 text-center">

		<h4 class="mt-2" style="color:#2cb674;">Expense Report</h4>

		<p class="mb-3">Report From <?php echo date('d-m-Y',strtotime($_POST["sdate"]));?> To <?php echo date('d-m-Y',strtotime($_POST["edate"]));?></p>

		</div></div>



			<table class="table" id="dataTable" style="width:100%">
			  <thead>
			    <tr>

			      <th>No</th>
			      <th>Date</th>
			      <th>Particular</th>
			      <th>Amount</th>
			      <th>Added By</th>
			    </tr>

			  </thead>

			  <tbody>



					<?php 
					$result = $obj->display('dm_expense',$query);
			  		if ($result->num_rows > 0) {
					$i = 1;
				    while($row = $result->fetch_assoc()) {
						$em=$obj->display('dm_employee','id='.$row['addBy']); $em1=$em->fetch_array();
					   	?>
					    	<tr>
						    	<td><?php echo $i; ?></td>
						    	<td><?php echo date('d/m/Y',strtotime($row["date"])); ?></td>
								<td><?php echo $row['particular'];?></td>
								<td><?php echo $row['amount'];?></td>
								<td><?php echo $em1['name'];?></td>

						    </tr>
					    	<?php $i++;

					    }

					}

			  	?>

			  </tbody>

			</table>

<?php 

}

else

{

$query.="";

} ?>			

		</div>

<?php include_once("footer.php"); ?>



   <script>

$(function(){

$('#sdate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 

$('#edate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 

}); 

</script>

<script>

    $(document).ready(function() {

        $('#dataTable').DataTable({

            responsive: true,

			"lengthMenu": [[-1], ["All"]],

			dom: 'Brt',

			buttons: [ 

			{

                extend: 'excel',

                title: 'Expense Report',

				messageTop: 'Report from <?php echo date('d-m-Y',strtotime($_POST["sdate"]));?> to <?php echo date('d-m-Y',strtotime($_POST["edate"]));?>'

            },

			{

                extend: 'pdf',

                title: 'Expense Report',

				messageTop: 'Report from <?php echo date('d-m-Y',strtotime($_POST["sdate"]));?> to <?php echo date('d-m-Y',strtotime($_POST["edate"]));?>'

            },

			{

                extend: 'print',

                title: 'Expense Report',

				messageTop: 'Report from <?php echo date('d-m-Y',strtotime($_POST["sdate"]));?> to <?php echo date('d-m-Y',strtotime($_POST["edate"]));?>'

            }

		 ]

        });

    });

    </script>