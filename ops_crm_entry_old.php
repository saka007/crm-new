<?php include_once("header.php");

?>
<div class="col-sm-10">
	<h4 class="mb-3" style="color:#2cb674;">Report of for Operations CRM Entry</h4>
	<div id="alert_message"></div>
	<hr />
	<h4 class="mb-3" style="color:#2cb674;">For Canada</h4>
	<table class="table table-striped table-bordered" id="myTable" style="width:100%">

				<thead>

					<tr>
						<th>Sr no.</th>
						<th>Total Cases</th>
						<th>Number of entries done</th>
                        <th>Region</th>
						</tr>
						</thead>
						<tbody>
							<?php
							$result = $obj->display2('old_data_2','branch,count(*) as count','1=1 group by branch');
							// print_r($result);die;
							if($result->num_rows>0)
							{
								$i=1;
								while($row=$result->fetch_assoc())
								{
                                    // $rg=$obj->display('dm_region','id='.$row['region']);$rg1=$rg->fetch_array();
                                    $emp=$obj->display3('SELECT count(*) as count FROM `dm_ops_skill_canada_old` op INNER JOIN old_data_2 l ON op.agreeNo=l.agreeNo where l.region='.$row["region"]);$em1=$emp->fetch_assoc();
									?>
									<tr>
										<td><?=$i;?></td>
										<td><?=$row['count'];?></td>
										<td><?=$em1['count'];?></td>
                                        <td><?=$row['branch'];?></td>
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
                                    responsive:true,
                                    dom:'Bfprt',
									buttons: [
                                                {
                                                    extend:'excel',
                                                    footer:true,
                                                    title:'Entry Report'
                                                }]
								});
								});
						</script>			