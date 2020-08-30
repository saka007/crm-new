<?php include_once("header.php");

?>
<div class="col-sm-10">
	<h4 class="mb-3" style="color:#2cb674;">Old CRM DATA FOR SHARJAH </h4>
	<div id="alert_message"></div>
	<hr />
	<table class="table table-striped table-bordered" id="myTable" style="width:100%">

				<thead>

					<tr>

<th>Sr No.</th><th>AG NO.</th><th>Sign-Up Date</th><th>CLIENT NAME</th><th>MOBILE</th><th>EMAIL</th><th>Country</th><th>Branch</th><th>Total Package</th><th>Paid Amount</th><th>	Pending Amount</th><th>Counselor</th><th>CPO 1</th><th>CPO 2</th><th>Eca Status</th><th>Spouse ECA</th><th>IELTS status</th><th>EE status</th><th>NOC</th><th>CRS</th><th>	Status last updated</th><th>PNP submitted</th><th>Decision</th><th>Remarks</th><th>Flag</th>	
					  

					</tr>

				</thead>
				 <tbody>
				 <?php 

					$result = $obj->display('old_data_shj');

			  		if ($result->num_rows > 0) {

			  			$i = 1;

					    while($row = $result->fetch_assoc()) {

					    	?>
					    	<tr>
					    		<td><?php echo $i; ?></td>
					    	    <td><?php echo $row['Agno']; ?></td>
					    	    <td><?php echo $row['SignupDate']; ?></td>
					    	    <td><?php echo $row['ClientName']; ?></td>
					    	    <td><?php echo $row['Mobile']; ?></td>
					    	    <td><?php echo $row['Email']; ?></td>
					    	    <td><?php echo $row['Country']; ?></td>
					    	    <td><?php echo $row['Branch']; ?></td>
					    	    <td><?php echo $row['TotalPackage']; ?></td>
					    	    <td><?php echo $row['PaidAmount']; ?></td>
					    	    <td><?php echo $row['PendingAmount']; ?></td>
					    	    <td><?php echo $row['Counselor']; ?></td>
					    	    <td><?php echo $row['CPO1']; ?></td>
					    	    <td><?php echo $row['CPO2']; ?></td>
					    	    <td contenteditable class="update" data-id="<?php echo $row['Agno'] ?>" data-column="<?php echo 'EcaStatus'; ?>"><?php echo $row['EcaStatus']; ?></td>
					    	    <td contenteditable class="update" data-id="<?php echo $row['Agno'] ?>" data-column="<?php echo 'SpouseEca'; ?>"><?php echo $row['SpouseEca']; ?></td>
					    	    <td contenteditable class="update" data-id="<?php echo $row['Agno'] ?>" data-column="<?php echo 'IETSstatus'; ?>"><?php echo $row['IETSstatus']; ?></td>
					    	    <td contenteditable class="update" data-id="<?php echo $row['Agno'] ?>" data-column="<?php echo 'EEstatus'; ?>"><?php echo $row['EEstatus']; ?></td>
					    	    <td contenteditable class="update" data-id="<?php echo $row['Agno'] ?>" data-column="<?php echo 'Noc'; ?>"><?php echo $row['Noc']; ?></td>
					    	    <td contenteditable class="update" data-id="<?php echo $row['Agno'] ?>" data-column="<?php echo 'CRS'; ?>"><?php echo $row['CRS']; ?></td>
					    	    <td contenteditable class="update" data-id="<?php echo $row['Agno'] ?>" data-column="<?php echo 'StatusLastUpdated'; ?>"><?php echo $row['StatusLastUpdated']; ?></td>
					    	    <td contenteditable class="update" data-id="<?php echo $row['Agno'] ?>" data-column="<?php echo 'PnpSubmitted'; ?>"><?php echo $row['PnpSubmitted']; ?></td>
					    	    <td contenteditable class="update" data-id="<?php echo $row['Agno'] ?>" data-column="<?php echo 'Decision'; ?>"><?php echo $row['Decision']; ?></td>
					    	    <td contenteditable class="update" data-id="<?php echo $row['Agno'] ?>" data-column="<?php echo 'Remarks'; ?>"><?php echo $row['Remarks']; ?></td>
					    	    <td><?php echo $row['flag']; ?></td>
					    	    </tr>
						

					    	<?php $i++;
					    }
					}
			  	?>
			  	</tbody>
			</table>
		</div>
	<?php include_once("footer.php"); ?>
   <script>
   	$(document).ready(function(){
    $('#myTable').DataTable({
    	responsive:true
    });

    $(document).on('blur','.update',function(){
	var id=$(this).data("id");
	var column_name=$(this).data("column");
	var value =$(this).text();
	$.ajax({
		url:'update_olddata.php',
		method:'POST',
		data:{id:id,column_name:column_name,value:value},
		sucess:function(data)
		{
			$('#alert_message').html('<div class=alert alert-success">'+data+'</div>')
			$('#myTable').DataTable().destroy();
			fetch_data();
		}
	})
});
});
// $(document).ready(function(){
// 	fetch_data();
// 	function fetch_data()
// 	{
// 		var dataTable = $('#myTable').DataTable({
// 			"responsive":true,
// 			"processing":true,
// 			"serverSide":true,
// 			"order":[],
// 			"paging":false,
// 			"search":{
// 				// "regex":true,
// 				// "smart":false,
// 				"caseInsensitive":false
// 			},
// 			"ajax":{
// 				url:"fetch.php",
// 				type:"POST"
// 			}
// 		});
// 	}

// $(document).on('blur','.update',function(){
// 	var id=$(this).data("id");
// 	var column_name=$(this).data("column");
// 	var value =$(this).text();
// 	$.ajax({
// 		url:'update.php',
// 		method:'POST',
// 		data:{id:id,column_name:column_name,value:value},
// 		sucess:function(data)
// 		{
// 			$('#alert_message').html('<div class=alert alert-success">'+data+'</div>')
// 			$('#myTable').DataTable().destroy();
// 			fetch_data();
// 		}
// 	})
// });
// });
$(function(){
$('#sdate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
$('#edate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
}); 
</script>