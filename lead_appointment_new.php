<?php include_once("header.php");	?>
		<div class="col-sm-10">
<h4 style="color:#2cb674;" class="mb-3">Appointment</h4>
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

<div class="col-sm-2 form-group"><label>&nbsp;</label><br /><input type="submit" class="btn btn-info" name="search" value="Search" ></div>

</div>

</form>
			<table class="table table-striped table-bordered" id="dataTables-Table" style="width:100%">
			  <thead>
			    <tr>
			      <th>SL.No</th>
			      <th>Lead ID</th>
			      <th>Name</th>
			      <th>Country</th>
			      <th>Counsellor</th>
		      	<th>Appointment Date</th>
		      	<?php if($_SESSION['TYPE']=='RT' || $_SESSION['TYPE']=='SA'){ ?>
		      	<th>Click if Appointment Done</th>
		      	<th>Click if Appointment Not Done</th>
		      <?php } ?>
			      <th>Remark</th>
			    </tr>
			  </thead>
		  <tbody>
<?php 
if($_SESSION['TYPE']=="IC" || $_SESSION['TYPE']=="SIC"  || $_SESSION['TYPE']=="MC" || $_SESSION['TYPE']=="BM" || $_SESSION['TYPE']=="ABM" || $_SESSION['TYPE']=="AM"  || $_SESSION['TYPE']=="RM" || $_SESSION["TYPE"]=="CPO" || $_SESSION["TYPE"]=="SCPO" || $_SESSION["TYPE"]=="CPM" || $_SESSION["TYPE"]=="FMP" || $_SESSION["TYPE"]=="DGM" || $_SESSION["TYPE"]=="OM" || $_SESSION["TYPE"]=="PDC" || $_SESSION["TYPE"]=="MBI" || $_SESSION["TYPE"]=="HR" || $_SESSION["TYPE"]=="PDC" || $_SESSION["TYPE"]=="TC" || $_SESSION["TYPE"]=="OC" || $_SESSION["TYPE"]=="RMO" || $_SESSION["TYPE"]=="RMSM") { 
$query=" and assignTo=".$_SESSION['ID'];
}

if($_SESSION['TYPE']=="SA") { 
$query="";
}
if($_SESSION['TYPE']=="RT") { 
$query=" and t2.region=".$_SESSION['REGION'];
}
if($_POST['sdate']!=""){
	$query.=" and t2.date between '".date('Y-m-d',strtotime($_POST["sdate"]))."' and '".date('Y-m-d',strtotime($_POST["edate"]))."'";
}
					$result = $obj->display3('select t1.id as id,t1.fname as fname,t1.lname as lname,t1.mobile as mobile,t1.country_interest as country_interest,t1.service_interest as service_interest,t1.counsilor as counsilor,t2.date as date,t2.id as apid from dm_lead as t1 inner join appointments as t2 on t1.id=t2.leadid where t2.done is NULL and t2.not_done is NULL '.$query);
			  		if ($result->num_rows > 0) {
			  			$i = 1;
					    while($row = $result->fetch_assoc()) {
					    	// $result1 = $obj->display('appointments', ' leadid='.$row["id"]);
					    	// $r1   = $result1->fetch_array();

							if($row['type']=="Student") {$ld="DMC";}
							if($row['type']=="Visit") {$ld="DMV";}
							if($row['type']=="work") {$ld="DMW";}
							if($row['type']=="Business") {$ld="DMB";}
							if($row['type']=="Skill") {$ld="DMS";}
if($row['service_interest']!=""){
$ser=$obj->display('dm_service','id='.$row["service_interest"]); 	$ser1=$ser->fetch_array();}
if($row['country_interest']!=""){
$ctr=$obj->display("dm_country_proces","id=".$row["country_interest"]); 	$ctr1=$ctr->fetch_array();}
$em=$obj->display("dm_employee","id=".$row["counsilor"]); 	$em1=$em->fetch_array();

	// print_r($row);die;				    	
	?>
					    	<tr>
						    	<td><?php echo $i; ?></td>
						    	<td style="text-align: center;">
						    		<?php echo '<a class="btn btn-light" title="'.$row['mobile'].'" data-toggle="modal" data-target=".bd-example'.$i.'">'.$ld.''.$row["id"]. "</a>"; ?>
						    	</td>
						    	<td><?php echo $row["fname"] . " " . $row["lname"]; ?></td>
						    	<td><?php echo $ctr1["name"]; ?></td>
						    	<td><?php echo $em1["name"]; ?></td>
						    	<td><?php echo $row["date"]; ?></td>
						    	<?php if($_SESSION['TYPE']=='RT' || $_SESSION['TYPE']=='SA'){ ?>
						    	<td><a href="appointment.php?l=<?php echo $row['apid'];  ?>" onclick="confirmation(event)" class="btn btn-primary">Done</a></td>
						    	<td><a href="appointment.php?ld=<?php echo $row['apid'];  ?>" onclick="confirmation(event)" class="btn btn-primary">Done</a></td>
						    <?php } ?>
						    	<td><?php $rem=$obj->display('dm_lead_remark','lead='.$row["id"]); while($rem1=$rem->fetch_array()) {
								echo $rem1['remark'].'-'.date('d/m/Y',strtotime($rem1['date'])).'<br>';
																}
								?></td>
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
<script>

function confirmation(ev) {
      ev.preventDefault();
      // var d = $('#datepicker').val();
      url = ev.currentTarget.getAttribute('href');
      Swal.fire({
      title: 'Are You sure.',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No',
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger',
      buttonsStyling: false
    }).then(function (result) {
      if(result.value){
      Swal.fire('Done','Updated.');
      window.location.href= url;
    }
    else{
      Swal.fire('Cancelled');
    }
    });
}

</script>