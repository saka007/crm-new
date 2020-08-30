<?php include_once("header.php");

?>


		<div class="col-sm-10">
		<div class="row"><div class="col-sm-6"><h4 class="mb-3" style="color:#2cb674;">View Lead</h4></div></div>
<form name="search" action="" method="post">
<div class="row">
	<div class="col-sm-3 form-group"><label >Search</label>	
		<input type="text" class="form-control" id="find" name="find" value="">
    </div>

<div class="col-sm-3 form-group"><label >&nbsp;</label><br /><input type="submit" class="btn btn-info" name="search" value="Search" >
	</form>
</div>
</div>
<hr />
<?php
$query="";
if($_POST)
{

$query.=" and paidYet=0";
if($_POST['find']!=""){ if (is_numeric($_POST['find'])){ $query .= " and mobile like '%".$_POST['find']."%'"; }else{$query .=" and email like '%".$_POST['find']."%'"; } }

?>

			<table class="table table-striped table-bordered" id="dataTables-Table_new" style="width:100%">

			  <thead>

			    <tr>

			      <th>No</th>

			      <th>Lead ID</th>
			      <th>Date</th>

			      <th>Name</th>
			      <th>Counselor</th>
			      <th>Country</th>

			      <th>Program</th>
			      <th>Source</th>
			      <th>Mode</th>
			      <th>Convert</th>
			      <th>Remark</th>

			    </tr>

			  </thead>

			  <tbody>

<?php 

		$result = $obj->display('dm_lead','1=1'.$query.' limit 0,4');
		// echo $query;
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
if($row['service_interest']!=""){							
$ser=$obj->display('dm_service','id='.$row["service_interest"]); 	$ser1=$ser->fetch_array();}
if($row['country_interest']!=""){
$ctr=$obj->display("dm_country_proces","id=".$row["country_interest"]); 	$ctr1=$ctr->fetch_array();}
$mak=$obj->display("dm_source","id=".$row["market_source"]); 	$mak1=$mak->fetch_array();
$em=$obj->display('dm_employee','id='.$row['Counsilor']); $em1=$em->fetch_array();

							
					    	?>

					    	<tr>

						    	<td><?php echo $i; ?></td>

						    	<td style="text-align: center;">

						    		<?php echo $ld.''.$row["id"];?>

						    	</td>
						    	<td><?php echo date('d/m/Y',strtotime($row["regdate"])); ?></td>

						    	<td><?php echo $row["fname"] . " " . $row["lname"]; ?></td>
								<td><?php echo $em1['name'];?></td>

						    	<td><?php echo $ctr1["name"]; ?></td>

						    	<td><?php echo $ser1["name"]; ?></td>
						    	<td><?php echo $mak1["name"]; ?></td>
						    	<td><?php echo $row["enquiry"]; ?></td>
						    	<td><?php echo $row["convet"]; ?></td>
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
						    </tr>
						

					    	<?php $i++;
					    }
					}
			  	?>
			  </tbody>
			</table>
                <?php } ?>
		</div>

		

                <?php include_once("footer.php"); ?>

   <script>
$(document).ready(function(){
	var table = $('#dataTables-Table_new').DataTable({
		responsive:true
	});
	
	
});

	

</script>
