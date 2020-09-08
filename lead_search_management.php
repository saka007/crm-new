<?php include_once("head.php");	

	// $data = array(
 //    			'notf'  =>  1
	// 			);
	// 	$obj->update('dm_lead',$data,'assignTo='.$_SESSION['ID'].' and notf=0');

?>

<link rel="stylesheet" href="theme/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="theme/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

 <!-- Begin Page Content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Manage Leads</h1>

          <div class="row">
             <div class="col-lg-12">
		<div class="row"><div class="col-sm-6"><h4 class="mb-3" style="color:#2cb674;">View Lead</h4></div></div>
<form name="search" action="" method="post">
<div class="row">
<div class="col-sm-2 form-group">
                                <label>Start Date</label>
                                <div class="input-group date" id="sdate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="sdate" data-target="#sdate" value="<?php if ($_POST['sdate']) echo $_POST['sdate'];
                                                                                                                                            else  echo date('d-m-Y') ?>" />
                                    <div class="input-group-append" data-target="#sdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>

                            </div>
							<div class="col-sm-2 form-group"><label>End Date</label>
                                <div class="input-group date" id="edate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="edate" data-target="#edate" value="<?php if ($_POST['edate']) echo $_POST['edate'];
                                                                                                                                            else  echo date('d-m-Y') ?>" />
                                    <div class="input-group-append" data-target="#edate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>

<!-- <div class="col-sm-3 form-group"><label >Marketing Source</label>
<select class="form-control" name="market_source" >
	<option value="">Select</option>
	<?php $sou=$obj->display('dm_source','status=1 order by name');
	while($sou1=$sou->fetch_array())
	{
	?>
	<option value="<?php echo $sou1['id'];?>"  <?php if($sou1['id']==$_POST['market_source']) { echo 'selected="selected"';}?>><?php echo $sou1['name'];?></option>
	<?php } ?>
	</select>
</div> -->
<!-- <div class="col-sm-3 form-group"><label >Mode of Enquiry</label>
<select class="form-control" name="enquiry">
	<option value="">Select</option>
	<option value="Call" <?php if($_POST['enquiry']=="Call") { echo 'selected="selected"';}?>>Call</option>
	<option value="Email" <?php if($_POST['enquiry']=="Email") { echo 'selected="selected"';}?>>Email</option>
	<option value="Walkin" <?php if($_POST['enquiry']=="Walkin") { echo 'selected="selected"';}?>>Walkin</option>
	
	</select>
	
	</div>			 -->

<!-- <div class="col-sm-3 form-group"><label >Country Interested</label>
<select class="form-control" name="country_interest" >
	<option value="">Select</option>
	
<?php $cnt=$obj->display('dm_country_proces','status=1 order by name');
	while($cnt1=$cnt->fetch_array())
	{
	?>
	<option value="<?php echo $cnt1['id'];?>"  <?php if($cnt1['id']==$_POST['country_interest']) { echo 'selected="selected"';}?>><?php echo $cnt1['name'];?></option>
	<?php } ?>		
	</select>
	
	</div>

<div class="col-sm-3 form-group"><label >Program Interested</label>
<select class="form-control" name="service_interest" >
	<option value="">Select</option>
	<?php $ser=$obj->display('dm_service','status=1 order by name');
	while($ser1=$ser->fetch_array())
	{
	?>
	<option value="<?php echo $ser1['id'];?>"  <?php if($ser1['id']==$_POST['service_interest']) { echo 'selected="selected"';}?>><?php echo $ser1['name'];?></option>
	<?php } ?>
	
</select>
</div>
<div class="col-sm-3 form-group"><label >Convert</label>
<select class="form-control" name="convet" id="convet" >
	<option value="">Select</option>
	<option value="Prospect" <?php if($_POST['convet']=="DNQ") { echo 'selected="selected"';}?>>DNQ</option>
	<option value="Not Interested" <?php if($_POST['convet']=="Not Interested") { echo 'selected="selected"';}?>>Not Interested</option>
	<option value="DNQ" <?php if($_POST['convet']=="Prospect") { echo 'selected="selected"';}?>>Prospect</option>
	
	</select>
	
	</div>	 -->
	<div class="col-sm-3 form-group"><label >Search</label>	
		<input type="text" class="form-control" id="find" name="find" value=""></div>

<div class="col-sm-3 form-group"><label >&nbsp;</label><br /><input type="submit" class="btn btn-info" name="search" value="Search" >
	</form>
</div>
</div>
<hr />
<?php
if($_SESSION['TYPE']=="IC" || $_SESSION['TYPE']=="AOM" || $_SESSION['TYPE']=="SIC"  || $_SESSION['TYPE']=="MC" || $_SESSION['TYPE']=="BM" || $_SESSION['TYPE']=="ABM" || $_SESSION['TYPE']=="AM"  || $_SESSION['TYPE']=="RM" || $_SESSION["TYPE"]=="FMP" || $_SESSION["TYPE"]=="DGM" || $_SESSION["TYPE"]=="CPO" || $_SESSION["TYPE"]=="SCPO" || $_SESSION["TYPE"]=="CPM" ||  $_SESSION["TYPE"]=="OM" || $_SESSION["TYPE"]=="PDC" || $_SESSION["TYPE"]=="MBI" || $_SESSION["TYPE"]=="PDC" || $_SESSION["TYPE"]=="OC" || $_SESSION["TYPE"]=="HR" ||  $_SESSION["TYPE"]=="TC" ||  $_SESSION["TYPE"]=="RMO" || $_SESSION["TYPE"]=="RMSM") { 
$query=" and assignTo=".$_SESSION['ID'];
}
if($_SESSION['TYPE']=="SA") { 

$query="";
}
if($_SESSION['TYPE']=="RT") { 
$query=" and branch=".$_SESSION['BRANCH'];
}
if($_POST)
{

$query.=" and paidYet=0";
if($_POST['find']==""){
$query .= " and regdate between '".date('Y-m-d',strtotime($_POST["sdate"]))."' and '".date('Y-m-d',strtotime($_POST["edate"]))."'";}
if($_POST['market_source']!="") { $query.=" and market_source='".$_POST['market_source']."'";}
if($_POST['enquiry']!="") { $query.=" and enquiry='".$_POST['enquiry']."'";}
if($_POST['country_interest']!="") { $query.=" and country_interest='".$_POST['country_interest']."'";}
if($_POST['service_interest']!="") { $query.=" and service_interest='".$_POST['service_interest']."'";}
if($_POST['convet']!="") { $query.=" and convet='".$_POST['convet']."'";}
if($_POST['find']!=""){ if (is_numeric($_POST['find'])){ $query .= " and mobile like '%".$_POST['find']."%'"; }else{$query .=" and email like '%".$_POST['find']."%'"; } }
}
else
{
$query.=" and paidYet=0";
}
?>

			<table data-last-order-identifier="tasks" class="table table-striped table-bordered" id="dataTables-Table_new" style="width:100%">

			  <thead>

			    <tr>

			      <th>No</th>

			      <th>Lead ID</th>
			      <th>Date</th>

			      <th>Name</th>
			      <th>Email</th>
			      <th>Mobile</th>
			      <th>Consultant</th>
			      <th>Country</th>

			      <!-- <th>Program</th> -->
			      <th>Source</th>
			      <th>Mode</th>
			      <!-- <th>Convert</th> -->
			      <th>Remark</th>
			      <th>Appointment</th>
				  <!-- <th>Pending to do</th> -->

			    </tr>

			  </thead>

			  <tbody>

<?php 
if ($_SESSION['TYPE']=="SA")
{
	if($_POST){
		$result = $obj->display('dm_lead','1=1'.$query.' limit 0,10');
		// echo $query;
	}
	else{
					$result = $obj->display('dm_lead','1=1  order by regdate desc limit 0,100');
				}
				}
				else
				{
					// echo $query;
					if($_POST)
					{
				$result = $obj->display('dm_lead','1=1'.$query);	
			}
			else{
				$result = $obj->display('dm_lead','1=1 and notf=0'.$query);
			}
}
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

						    		<a class="btn btn-light" href="lead_edit.php?lead=<?php echo $row['id'];?>" title="<?php echo $row['mobile'];?>"><?php echo $ld.''.$row["id"];?></a>

						    	</td>
						    	<td><?php echo date('d/m/Y',strtotime($row["regdate"])); ?></td>

						    	<td><?php echo $row["fname"] . " " . $row["lname"]; ?></td>

								<td><?php echo $row["email"]; ?></td>
						    	<td><?php echo $row["mobile"]; ?></td>
								<td><?php echo $em1['name'];?></td>

						    	<td><?php echo $ctr1["name"]; ?></td>

						    	<!-- <td><?php echo $ser1["name"]; ?></td> -->
						    	<td><?php echo $mak1["name"]; ?></td>
						    	<td><?php echo $row["enquiry"]; ?></td>
						    	<!-- <td><?php echo $row["convet"]; ?></td> -->
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
								<td> <!--  modal window -->

   <!-- Modal -->
<div class="modal fade" id="m<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="m<?php echo $row['id'];?>Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="m<?php echo $row['id'];?>Label">Book Appointment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <div class="input-group date" id="datepicker<?php echo $row['id'];?>" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="date" data-target="#datepicker<?php echo $row['id'];?>" />
                                    <div class="input-group-append" data-target="#datepicker<?php echo $row['id'];?>" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
      	<!-- <input type="text" class="form-control datepicker" name="date" id="datepicker<?php echo $row['id'];?>"> -->
		  <div class="col-sm-3 form-group"><label >Meeting Type</label>
		  <select class="form-control" id="mtype<?php echo $row['id'];?>" name="mtype" >
	<option value="">Select</option>
	<option value="zoom">Zoom</option>
	<option value="in_office">In office</option>
	</select>
      </div>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
		<!-- appointment.php?lead=<?php echo $row['id'];  ?>&counsilor=<?php echo $row['Counsilor']; ?>&date= -->
	    <a href="#" onclick="confirmation(event,<?php echo $row['id'];  ?>,<?php echo $row['Counsilor']; ?>,$('#datepicker<?php echo $row['id'];?>').val(),$('#mtype<?php echo $row['id'];?>').val())" class="btn btn-primary">Book</a>
      </div>
    </div>
  </div>
</div>
<!-- end of modal window -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#m<?php echo $row['id'];?>">
<i class="far fa-calendar-check"></i>
								</button>
								<script>
			
									$(function(){
// $('#datepicker<?php echo $row['id'];?>').datepicker({    format: 'dd-mm-yyyy',	autoclose: true});
$('#datepicker<?php echo $row['id'];?>').datetimepicker({
        format: 'DD-MM-YYYY',
        allowInputToggle: true,
        // defaultDate: moment()
    });
});
									function confirmation(ev,l,c,d,t) {
      ev.preventDefault();
      url = ev.currentTarget.getAttribute('href');
      // var d =$('datepicker<?php echo $row['id'];?>').val();
      // console.log(d);
      Swal.fire({
      title: 'Are You sure You want to book an appointment on '+d,
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Book it!',
      cancelButtonText: 'No, cancel!',
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger',
      buttonsStyling: false
    }).then(function (result) {
      if(result.value){
		$.ajax({
 		url:'appointment.php',
 		method:'POST',
 		data:{lead:l,type:t,date:d,emp:c},
 		sucess:function(data)
 		{
 			// $('#alert_message').html('<div class=alert alert-success">'+data+'</div>')
 		}
 	});
      Swal.fire('Booked','You have booked the appointment');
    //   window.location.href= url+d;
    }
    else{
      Swal.fire('Cancelled');
    }
    });
}
								</script>
								</td>
						    	<!-- <td> 

						    	<?php
						    		if($row['stepComplete']==4) { ?>
						    			<a href="#"><?php echo "Completed"; ?></a>
						    		<?php
						    		} 
						    		if($row['stepComplete']==3 ) { 
									if($row['payType']=="") { 
									?>
						    			<a href="<?php echo 'lead_payment_options.php?lead='.$row["id"]; ?>"><?php echo "Payment"; ?></a>
									<?php
									} 
									else {
									?>
						    			<a href="<?php echo 'lead_payment.php?lead='.$row["id"]; ?>"><?php echo "Payment"; ?></a>
						    		<?php
						    		}} 

						    		if($row['stepComplete']==2) { ?>
						    			<a href="<?php echo 'lead_observation_sheet.php?lead='.$row["id"]; ?>"><?php echo "Observation Sheet"; ?></a>
						    		<?php
						    		} 
									if($row['stepComplete']==1) { ?>

						    			<a href="<?php echo 'lead_assesment_form.php?lead='.$row["id"]; ?>"><?php echo "Assessment Form"; ?></a>

						    		<?php }

						    	?>

								</td> -->
								

						    </tr>
						

					    	<?php $i++;
					    }
					}
			  	?>
			  </tbody>
			</table>
		</div>
		</div>
		</div>
		</div>
		</div>

		

<?php include_once("foot.php"); ?>
<script src="theme/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="theme/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

   <script>
$(document).ready(function(){
	var table = $('#dataTables-Table_new').DataTable({
		responsive:false,
		// "scrollY": 200,
        "scrollX": true
	});

	 <?php if($_SESSION['TYPE']=="IC" || $_SESSION['TYPE']=="SIC"  || $_SESSION['TYPE']=="MC" || $_SESSION['TYPE']=="BM" || $_SESSION['TYPE']=="ABM" || $_SESSION['TYPE']=="AM"  || $_SESSION['TYPE']=="RM" || $_SESSION["TYPE"]=="FMP" || $_SESSION["TYPE"]=="DGM" || $_SESSION["TYPE"]=="CPO" || $_SESSION["TYPE"]=="SCPO" || $_SESSION["TYPE"]=="CPM" ||  $_SESSION["TYPE"]=="OM" || $_SESSION["TYPE"]=="PDC" || $_SESSION["TYPE"]=="MBI" || $_SESSION["TYPE"]=="PDC" || $_SESSION["TYPE"]=="OC" || $_SESSION["TYPE"]=="HR" ||  $_SESSION["TYPE"]=="TC" ||  $_SESSION["TYPE"]=="RMO" || $_SESSION["TYPE"]=="RMSM") { ?>
	    table.columns([4,5,6]).visible(false);
	 <?php } ?>
	
});
$(function(){
// $('#sdate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
// $('#edate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true});
}); 


// 	function confirmation(ev) {
//       ev.preventDefault();
//       url = ev.currentTarget.getAttribute('href');
//       var d =$('.datepicker').val();
//       Swal.fire({
//       title: 'Are You sure You want to book an appointment on '+d,
//       type: 'warning',
//       showCancelButton: true,
//       confirmButtonColor: '#3085d6',
//       cancelButtonColor: '#d33',
//       confirmButtonText: 'Yes, Book it!',
//       cancelButtonText: 'No, cancel!',
//       confirmButtonClass: 'btn btn-success',
//       cancelButtonClass: 'btn btn-danger',
//       buttonsStyling: false
//     }).then(function (result) {
//       if(result.value){
//       Swal.fire('Booked','You have booked the appointment');
//       window.location.href= url+d;
//     }
//     else{
//       Swal.fire('Cancelled');
//     }
//     });
// }	

</script>

