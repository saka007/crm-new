<?php include_once("header.php");	?>





		<div class="col-sm-10">

		<div class="row"><div class="col-sm-6"><h4 class="mb-3" style="color:#2cb674;">Canceled Receipt Report</h4></div></div>

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

<?php if($_SESSION['TYPE']=="SA" ||  $_SESSION['TYPE']=="RMSM" || $_SESSION['TYPE']=="DGM" || $_SESSION['TYPE']=="FMP" || $_SESSION['TYPE']=="FO") { ?>		

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
$query="1=1";
if($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="FMP" || $_SESSION['TYPE']=="DGM" || $_SESSION['TYPE']=="RMSM" || $_SESSION['TYPE']=="FO") { 	
if($_POST['region']!="") { 
	$query.=" and T2.region=".$_POST['region'];
}
if($_POST['branch']!="") { 
	$query.=" and T2.branch=".$_POST['branch'];
}
}
if($_SESSION['TYPE']=="AC") { 	
$query.=" and T2.branch=".$_SESSION['BRANCH'];
}
if($_POST)

{

$query.=" and T1.date between '".date('Y-m-d',strtotime($_POST["sdate"]))."' and '".date('Y-m-d',strtotime($_POST["edate"]))."' and T1.status=0 order by date DESC";



?>



		<div class="row">

		<div class="col-sm-12 text-center">

		<h4 class="mt-2" style="color:#2cb674;">Canceled Receipt Report</h4>

		<p class="mb-3">Report From <?php echo date('d-m-Y',strtotime($_POST["sdate"]));?> To <?php echo date('d-m-Y',strtotime($_POST["edate"]));?></p>

		</div></div>

			<table class="table" id="dataTable" style="width:100%">
			  <thead>
			    <tr>
			      <th>No</th>

			      <th>Receipt No.</th>
			      <th>Lead ID</th>
			      <th>Date</th>
			      <th>Amount</th>
			      <th>Category</th>			     
			      <th>Remark</th>			     
			      <th>Action</th>

			    </tr>
			  </thead>
			  <tbody>



<?php 

					$result = $obj->display3('select T2.id as id,T2.assignTo as at,T2.service_interest as service_interest, T2.mobile as mobile, T2.type as type, T1.amount as amount, T1.payCategory as payCategory, T1.id as id2,T1.date as date,T1.remark as remark from dm_pay_history as T1 INNER JOIN dm_lead as T2 ON T1.leadId=T2.id where '.$query);


			  		if ($result->num_rows > 0) {

			  			$i = 1;

					    while($row = $result->fetch_assoc()) {

					    	$result1 = $obj->display('dm_lead_assesment', ' leadId='.$row["id"]);

					    	$lead1   = $result1->fetch_array();

							if($row['type']=="Student") {$ld="DMC";}
							if($row['type']=="Visit") {$ld="DMV";}
							if($row['type']=="work") {$ld="DMW";}
							if($row['type']=="Business") {$ld="DMB";}
							if($row['type']=="Skill") {$ld="DMS";}
					    	?>
					    	<tr>

						    	<td><?php echo $i; ?></td>
								<td><?php echo $row['id2'];?></td>
						    	<td style="text-align: center;"><a class="btn btn-light" href="#" title="<?php echo $row['mobile'];?>"><?php echo $ld.''.$row["id"];?></a></td>
								<td><?php echo date('d-m-Y',strtotime($row['date']));?></td>
								<td><?php echo $row['amount'];?></td>
								<td><?php echo $row['payCategory'];?></td>
								<td><?php echo $row['remark'];?></td>
								<td>
					 				<a href="lead_payment_invoice.php?lead=<?=$row['id'];?>&receipt=<?=$row['id2']?>" target="_blank" class="btnDeleteAction"><i class="fa fa-print" title="PRINT"></i></a> 
								</td>
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

                title: 'Canceled Receipt Report',

				messageTop: 'Report from <?php echo date('d-m-Y',strtotime($_POST["sdate"]));?> to <?php echo date('d-m-Y',strtotime($_POST["edate"]));?>'

            },

			{

                extend: 'pdf',

                title: 'Canceled Receipt Report',

				messageTop: 'Report from <?php echo date('d-m-Y',strtotime($_POST["sdate"]));?> to <?php echo date('d-m-Y',strtotime($_POST["edate"]));?>'

            },

			{

                extend: 'print',

                title: 'Canceled Receipt Report',

				messageTop: 'Report from <?php echo date('d-m-Y',strtotime($_POST["sdate"]));?> to <?php echo date('d-m-Y',strtotime($_POST["edate"]));?>'

            }

		 ]

        });

    });

    </script>