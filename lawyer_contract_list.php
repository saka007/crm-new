<?php include_once("header.php");	?>


		<div class="col-sm-10">
<div class="row"><div class="col-sm-12"><h4 class="mb-3" style="color:#2cb674;">Pending Agreement's to be Signed and uploaded</h4></div></div>
			<table class="table table-striped table-bordered" id="myTable" style="width:100%">
			  <thead>
			    <tr>
			      <th>No</th>
			      <th>Date</th>

			      <th>Name</th>

			      <th>Agreement No.</th>
			      <th>Counselor</th>
			      <th>ID</th>
			      <th>Branch</th>
			      <th>Download Agreement</th>
			      
			      <th>Upload Signed<br /> Agreement</th>

			    </tr>

			  </thead>

			  <tbody>

<?php

if($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RMO") { 
$query="";
}
if($_SESSION['TYPE']=="RT") { 
$query=" and branch=".$_SESSION['BRANCH'];
}

					$result = $obj->display('dm_gary_contract','contract_signed="" and contract !=""');

			  		if ($result->num_rows > 0) {
			  			$i = 1;
					    while($row = $result->fetch_assoc()) {
							$ser=$obj->display('dm_lead','id='.$row["leadid"].$query);
							$ser1=$ser->fetch_array();
							$ag=$obj->display('dm_lead_contract','leadId='.$row["leadid"]);
							$ag1=$ag->fetch_array();
							$re=$obj->display('dm_region','id='.$ser1['region']);
							$re1=$re->fetch_array();
							$ei=$obj->display('dm_lead_observation','leadId='.$ser1['id']);
							$ei1=$ei->fetch_array();
							$em=$obj->display('dm_employee','id='.$ser1['Counsilor']); $em1=$em->fetch_array();
							
					    	?>

					    	<tr>

						    	<td><?php echo $i; ?></td>

						    	<td><?php echo date('d/m/Y',strtotime($ser1["feeAgreeDate"])); ?></td>

						    	<td><?php echo $ser1["fname"] . " " . $ser1["lname"]; ?></td>
						    	<td style="text-align: center;"><?php echo $ag1["id"];?></td>
						    	<td><?php echo $em1["name"];?></td>
						    	<td><a href="uploads/file/<?php echo $ei1['document']; ?>" target="_blank"><?php echo $ei1['document']; ?></a></td>
						    	<td><?php echo $re1["name"];?></td>
						    	<td><a href="uploads/Gary/<?php echo $row['contract']; ?>" target="_blank"><?php echo $row['contract']; ?></a></td>
<td><a href="lawyer_upload.php?lead=<?php echo $row["leadid"];?>"  class="btn btn-danger">Upload</a></td>

						    	

						    </tr>


							

					    	<?php $i++;
					    }
					}
			  	?>
			  </tbody>
			</table>
	
		</div>
		<script>
				$(document).ready(function(){
    $('#myTable').DataTable({
    	responsive:true,
   //  	dom:'Bflrtp',
   //  	"lengthMenu": [[-1], ["All"]],
   //  	buttons: [ 
			// {
   //              extend: 'excel',
			// 	footer: true,
   //              title: 'Pending contract of gary'
   //          }]
    });
});
		</script>

    		
		
<?php include_once("footer.php"); ?>


