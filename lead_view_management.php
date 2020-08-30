<?php include_once("header.php");	?>


		<div class="col-sm-10">
<div class="row"><div class="col-sm-12"><h4 class="mb-3" style="color:#2cb674;">Lead List</h4></div></div>
			<table class="table table-striped table-bordered" id="dataTables-Table" style="width:100%">

			  <thead>

			    <tr>

			      <th>No</th>

			      <th>Lead ID</th>
			      <th>Date</th>

			      <th>Name</th>

			      <th>Country</th>

			      <th>Service</th>
			      <th>Source</th>
			      <th>Mode</th>
			      <th>Convert</th>
			      <th>Follow Up</th>
			      <th>Remark</th>

			      <th>Pending to do</th>

			    </tr>

			  </thead>

			  <tbody>

<?php 
if($_SESSION['TYPE']=="IC" || $_SESSION['TYPE']=="SIC") { 
$query=" and assignTo=".$_SESSION['ID'];
}
if($_SESSION['TYPE']=="BM") { 
$query=" and branch=".$_SESSION['BRANCH'];
}
if($_SESSION['TYPE']=="RM") { 
$query=" and region=".$_SESSION['REGION'];
}
if($_SESSION['TYPE']=="SA") { 
$query="";
}

					$result = $obj->display('dm_lead','paidYet=0 '.$query.' order by id DESC');

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
							
$ser=$obj->display('dm_service','id='.$row["service_interest"]); 	$ser1=$ser->fetch_array();
$ctr=$obj->display("dm_country_proces","id=".$row["country_interest"]); 	$ctr1=$ctr->fetch_array();
$mak=$obj->display("dm_source","id=".$row["market_source"]); 	$mak1=$mak->fetch_array();
							
					    	?>

					    	<tr>

						    	<td><?php echo $i; ?></td>

						    	<td style="text-align: center;">

						    		<a class="btn btn-light" href="lead_edit.php?lead=<?php echo $row['id'];?>" title="<?php echo $row['mobile'];?>"><?php echo $ld.''.$row["id"];?></a>

						    	</td>
						    	<td><?php echo date('d/m/Y',strtotime($row["regdate"])); ?></td>

						    	<td><?php echo $row["fname"] . " " . $row["lname"]; ?></td>

						    	<td><?php echo $ctr1["name"]; ?></td>

						    	<td><?php echo $ser1["name"]; ?></td>
						    	<td><?php echo $mak1["name"]; ?></td>
						    	<td><?php echo $row["enquiry"]; ?></td>
						    	<td><?php echo $row["convet"]; ?></td>
						    	<td><?php echo date('d/m/Y',strtotime($row["followup"])); ?></td>
<td>

<a href="#" data-toggle="modal" data-target="#modal<?php echo $row['id'];?>" id="b<?php echo $row['id'];?>">View</a>	

<div class="modal fade" id="modal<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="modal1Label" aria-hidden="true">
        <div class="modal-dialog modal-left">
            <div class="modal-content">
                <div class="modal-header">
                     <h4 class="modal-title" id="modal1Label">LEAD-<?php echo $row['id'];?> Remarks</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
				<?php 
				$rem=$obj->display('dm_lead_remark','lead='.$row["id"]); while($rem1=$rem->fetch_array()) 
				{
						echo $rem1['remark'].'-'.date('d/m/Y',strtotime($rem1['date'])).'<br>';
				}
				?>
				</div>
                
            </div>
        </div>
    </div>
<script>
$(function(){
$("#b<?php echo $row['id'];?>").hover(function () {
    $('#modal<?php echo $row['id'];?>').modal({
        show: true
    })
});
}); 
</script>
							
								</td>

						    	<td> 

						    	<?php
						    		if($row['stepComplete']==4) { ?>
						    			<a href="#"><?php echo "Completed"; ?></a>
						    		<?php
						    		} 
						    		if($row['stepComplete']==3 && $row['payType']=="") { ?>
						    			<a href="<?php echo ('lead_payment_options.php?lead='.$row["id"]); ?>"><?php echo "Payment"; ?></a>
						    		<?php
						    		} else { ?>
						    			<a href="<?php echo ('lead_payment.php?lead='.$row["id"]); ?>"><?php echo "Payment"; ?></a>
									<?php }

						    		if($row['stepComplete']==2) { ?>
						    			<a href="<?php echo ('lead_observation_sheet.php?lead='.$row["id"]); ?>"><?php echo "Observation Sheet"; ?></a>
						    		<?php
						    		} 
									if($row['stepComplete']==1) { ?>

						    			<a href="<?php 

							    			if($row['service_interest'] == 2) {

								    			echo 'lead_assesment_form.php?lead='.$row["id"];

								    		} 
							    			if($row['service_interest'] == 1) {

								    			echo 'lead_assesment_form.php?lead='.$row["id"];

								    		}?>"><?php echo "Assessment Form"; ?></a>

						    		<?php }

						    	?>

						    	</td>

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
$(function(){
$('#sdate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
$('#edate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 

}); 
</script>
