<?php include_once("header.php");

?>
<div class="col-sm-10">
	<h4 class="mb-3" style="color:#2cb674;">Report of Number of Files</h4>
	<div id="alert_message"></div>
	<hr />
	<table class="table table-striped table-bordered" id="myTable" style="width:100%">

				<thead>

					<tr>
						<th>Sr no.</th>
						<th>Case Processing officer</th>
						<th>number of files</th>
						</tr>
						</thead>
						<tbody>
							<?php
							$result = $obj->display2('dm_lead','assignTo,count(*) as count','paidYet!=0 group by assignTo');
							// print_r($result);die;
							if($result->num_rows>0)
							{
								$i=1;
								while($row=$result->fetch_assoc())
								{
									$emp=$obj->display('dm_employee','id='.$row['assignTo']);$em1=$emp->fetch_assoc();
									?>
									<tr>
										<td><?=$i;?></td>
										<td><?=$em1['name'];?></td>
										<td><?=$row['count'];?></td>
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
							$(document).ready(function(){
								$('#myTable').DataTable({
									responsive:true
								});
								});
						</script>			