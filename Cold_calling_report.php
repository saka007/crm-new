<?php include_once("header.php");

?>
<div class="col-sm-10">
	<h4 class="mb-3" style="color:#2cb674;">Cold Calling Data added today by each Counsilor</h4>
	<div id="alert_message"></div>
	<hr />
	<table class="table table-striped table-bordered" id="myTable" style="width:100%">

				<thead>

					<tr>
						<th>Sr no.</th>
						<th>Counselor</th>
						<th>Monster</th>
                        <th>Naukri</th>
						<th>Total Leads followed up</th>
						<th>Branch</th>
						</tr>
						</thead>
						<tbody>
							<?php
							$result = $obj->display2('dm_lead','Counsilor,region,count(*) as count','regdate=CURRENT_DATE group by region,Counsilor');
							// print_r($result);die;
							if($result->num_rows>0)
							{
								$i=1;
								while($row=$result->fetch_assoc())
								{
									$emp=$obj->display('dm_employee','id='.$row['Counsilor']);$em1=$emp->fetch_assoc();
                                    $bra=$obj->display('dm_region','id='.$row['region']);$bra1=$bra->fetch_assoc();
									$mo = $obj->display3("SELECT Counsilor,COUNT(*) as cold FROM dm_lead WHERE Counsilor=".$row['Counsilor']." and market_source IN (7,17) AND regdate=CURRENT_DATE GROUP BY region");
                                    if($mo->num_rows>0){
                                    $mo1 = $mo->fetch_array();
                                    }
                                    $na = $obj->display3("SELECT Counsilor,COUNT(*) as cold FROM dm_lead WHERE Counsilor=".$row['Counsilor']." and market_source IN (7,17) AND regdate=CURRENT_DATE GROUP BY region");
                                    if($na->num_rows>0){
                                    $na1 = $na->fetch_array();
									}
									$lu = $obj->display3("SELECT COUNT(*) as count FROM `dm_lead` WHERE Counsilor=".$row['Counsilor']." and str_to_date(last_updated,'%d-%m-%Y')=CURRENT_DATE");
									if($lu->num_rows>0){
									$lu1=$lu->fetch_array();
									}
									else{
										$lu1['count']=0;
									}
									?>
									<tr>
										<td><?=$i;?></td>
										<td><?=$em1['name'];?></td>
										<td><?=$mo1['cold'];?></td>
										<td><?=$na1['cold'];?></td>
										<td><?=$lu1['count'];?></td>
                                        <td><?=$bra1['name'];?></td>
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
            	title:'Lead Report',
            	messageTop:'Lead Added today'
            }]
								});
								});
						</script>			