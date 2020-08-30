<?php include_once("header.php");

?>
<div class="col-sm-10">
	<h4 class="mb-3" style="color:#2cb674;">Moksh Report</h4>

	<div id="alert_message"></div>
	<hr />
	<table class="table table-striped table-bordered" id="myTable" style="width:100%">

				<thead>

					<tr>
						<th>Sr no.</th>
						<th>Counselor</th>
						<th>No. of Appointments Booked</th>
						<th>No. of Appointments Done</th>
                        <th>total sales</th>
                        <th>Total leads</th>
						</tr>
						</thead>
						<tbody>
							<?php
							if(isset($_GET['r'])){
								$query = "and region=".$_GET['r'];
								}
								if($_SESSION['TYPE']=="BM"){
									$query = "and region=".$_SESSION['REGION'];
								}
							$result = $obj->display3("SELECT COUNT(*) as total_leads,Counsilor FROM dm_lead WHERE regdate BETWEEN '2019-5-06' AND '2019-6-05' GROUP BY Counsilor");
							// print_r($result);die;
							if($result->num_rows>0)
							{
								$i=1;
								while($row=$result->fetch_assoc())
								{
									$emp=$obj->display('dm_employee','id='.$row['Counsilor']);$em1=$emp->fetch_assoc();
                                    // $bra=$obj->display('dm_region','id='.$row['region']);$bra1=$bra->fetch_assoc();
                                    $sl = $obj->display3("SELECT Counsilor,SUM(paidYet) as total FROM dm_lead WHERE feeAgreeDate BETWEEN '2019-5-06' AND '2019-6-05' and Counsilor=".$row['Counsilor']."  GROUP BY Counsilor");
                                    $sl1=$sl->fetch_array();
                                    $ap= $obj->display3("SELECT counsilorid,SUM(CASE booked WHEN 1 THEN 1 ELSE 0 END) as booked,SUM(CASE done WHEN 1 THEN 1 ELSE 0 END) as done FROM `appointments` as t3 WHERE date BETWEEN '2019-11-06' AND '2019-12-05' and counsilorid=".$row['Counsilor']." GROUP BY counsilorid");
                                    $ap1 = $ap->fetch_array();
									?>
									<tr>
										<td><?=$i;?></td>
										<td><?=$em1['name'];?></td>
										<td><?=$ap1['booked'];?></td>
										<td><?=$ap1['done'];?></td>
                                        <td><?=$sl1['total'];?></td>
                                        <td><?=$row['total_leads'];?></td>
									</tr>
									<?php
									$i++;
								}
							}
							?>
						</tbody>	
						</table>
						</div>
						<?php include_once('footer.php');?>
						<script>
$(function(){
$('#sdate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
$('#edate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
}); 
</script>
						<script>
							$(document).ready(function(){
								$('#myTable').DataTable({
									responsive:true,
									dom:'Bfprt',
									buttons: [
            {
            	extend:'excel',
            	footer:true,
            	title:'Lead Report',
            	messageTop:'Lead Added today'
            }]
								});
								});
						</script>			