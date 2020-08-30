<?php include_once("header.php");	
?>


		<div class="col-sm-10">
		<div class="row"><div class="col-sm-6"><h4 class="mb-3" style="color:#2cb674;">View Prospects</h4></div></div>
<hr />
		<table class="table table-striped table-bordered" id="dataTables-Table_new" style="width:100%">

			  <thead>

			    <tr>

			      <th>No</th>

			      <th>Lead ID/Ag-No</th>
			      <th>Date</th>

			      <th>Name</th>
				  <th>NOC</th>
				  <th>Status</th>
			      <th>CV</th>
			      <th>Approval</th>

			    </tr>

			  </thead>

			  <tbody>

<?php 
if ($_SESSION['TYPE']=="SA")
{
		$result = $obj->display('gary_prospectss','1=1');
			
}
else{
	$result = $obj->display('gary_prospectss','1=1 and terence=1');
}

			  		if ($result->num_rows > 0) {

			  			$i = 1;

					    while($row = $result->fetch_assoc()) {
    if($row['old_new']=="new"){
        $ctr=$obj->display("dm_lead_contract","id=".$row["ag_no"]); 	$ctr1=$ctr->fetch_array();
        $ld=$obj->display("dm_lead","id=".$ctr1["leadId"]);  $ld1=$ld->fetch_array();
        $name=$ld1['fname'] . " " . $ld1["lname"];
	}
	else if ($row['old_new']=="old"){
		$ctr=$obj->display("old_data_2","agreeNo=".$row["ag_no"]); 	$ctr1=$ctr->fetch_array();
		$name=$ctr1['client_name'];
	}
	else if($row['old_new']=="lead"){
        $ld=$obj->display("dm_lead","id=".$row["ag_no"]);  $ld1=$ld->fetch_array();
        $name=$ld1['fname'] . " " . $ld1["lname"];
	}
		$em=$obj->display('dm_employee','id='.$row['counselorid']); $em1=$em->fetch_array();
		$docs=$obj->display("gary_work_docs","ag_no=".$row["ag_no"]); 	$docs1=$docs->fetch_array();
		// print_r($docs1);

							
					    	?>

					    	<tr>

						    	<td><?php echo $i; ?></td>

						    	<td style="text-align: center;">

						    		<a class="btn btn-light" href="edit_prospects.php?id=<?php echo $row['ag_no'];?>"><?php echo $row['ag_no'];?></a>

						    	</td>
						    	<td><?php echo date('d/m/Y',strtotime($row["date"])); ?></td>

						    	<td><?php echo $name; ?></td>
								<td><?php echo $row['noc']; ?></td>
								<td><?php echo ($row['old_new']=="lead"?"Lead":"Client") ?></td>

								<td><a href="uploads/Gary_CV/"<?php echo $docs1['docs'];?>><?php echo $docs1['docs'];?></a></td>
						    	<td><?php echo ($row['terence']==1?"YES":"NO") ?></td>
								
			  
		

		

<?php } } ?> 
</tbody>
			</table>
</div>
<?php include_once("footer.php"); ?>

   <script>
$(document).ready(function(){
	var table = $('#dataTables-Table_new').DataTable({
		responsive:true,
	});	
});
$(function(){
$('#sdate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
$('#edate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true});
}); 
</script>