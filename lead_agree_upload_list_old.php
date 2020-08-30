<?php include_once("header.php");	?>

<style type="text/css">
	.form-group{
		padding-left: 10px;
	}
</style>
		<div class="col-sm-10">
<div class="row"><div class="col-sm-12"><h4 class="mb-3" style="color:#2cb674;">Pending Leads for agreement upload</h4></div></div>

<form name="search" action="" method="post">
	<div class="row">
<div class="col-sm-2 form-group"><label>Region</label>
<select class="form-control" name="region" id="region" >
	<option value="">Select</option>
	<?php $sou=$obj->display3('Select branch  from old_data_2 group by branch order by branch');
	while($sou1=$sou->fetch_array())
		if(trim($sou1['branch'])!=""){
	{
	?>
	<option value="<?php echo $sou1['branch'];?>"  <?php if($sou1['branch']==$_POST['region']) { echo 'selected="selected"';}?>><?php echo ucfirst($sou1['branch']);?></option>
	<?php }} ?>
	</select>
</div>

<div class="col-sm-2 form-group"><label>&nbsp;</label><br /><input type="submit" class="btn btn-info" name="search" value="Search" ></div>
</div>
<br>
			<table class="table table-striped table-bordered" id="myTable" style="width:100%">
			  <thead>
			    <tr>
			      <th>No</th>
			      <th>Agreement No.</th>
			      <th>Sign Up Date</th>
			      <th>Name</th>
			      <th>Counselor</th>
			      <th>Upload<br /> Observation</th>
			      
			      <th>Upload<br /> Agreement</th>

			    </tr>

			  </thead>

			  <tbody>

<?php 
if($_SESSION['TYPE']=="IC" || $_SESSION['TYPE']=="SIC"  || $_SESSION['TYPE']=="MC" || $_SESSION['TYPE']=="BM" || $_SESSION['TYPE']=="ABM" || $_SESSION['TYPE']=="AM"  || $_SESSION['TYPE']=="RM" || $_SESSION["TYPE"]=="CPO" || $_SESSION["TYPE"]=="SCPO" || $_SESSION["TYPE"]=="CPM" || $_SESSION["TYPE"]=="FMP" || $_SESSION["TYPE"]=="DGM" || $_SESSION["TYPE"]=="OM" || $_SESSION["TYPE"]=="PDC" || $_SESSION["TYPE"]=="MBI" || $_SESSION["TYPE"]=="HR" || $_SESSION["TYPE"]=="PDC" || $_SESSION["TYPE"]=="TC" || $_SESSION["TYPE"]=="OC" || $_SESSION["TYPE"]=="RMO" || $_SESSION["TYPE"]=="RMSM") { 
$query=" and assignTo=".$_SESSION['ID'];
}

if($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RMO") { 
$query="";
}
if($_SESSION['TYPE']=="RT") { 
$query="";
}
if($_POST['region']!="") { 	$query.=" and branch='".$_POST['region']."'";}
					$result = $obj->display3('SELECT t1.*,if(t2.obs_sheet!="",1,0) obs,if(t2.agreement_sheet!="",1,0) agr FROM `old_data_2` t1 left JOIN dm_lead_observation_old t2 on t1.agreeno=t2.agreeNo WHERE (t2.agreeNo IS null OR t2.agreement_sheet IS null OR t2.obs_sheet ="" OR t2.agreement_sheet="" or t2.obs_sheet IS null) '.$query);
//select o2.*,if(oo.obs_sheet!="",1,0) obs,if(oo.agreement_sheet!="",1,0) agr from old_data_2 o2 left join dm_lead_observation_old oo on o2.agreeno= oo.agreeno and ( oo.obs_sheet="" or oo.agreement_sheet="")
			  		if ($result->num_rows > 0) {
			  			$i = 1;
					    while($row = $result->fetch_assoc()) {
							/*$ser=$obj->display('dm_lead','id='.$row["leadId"].$query); 	
							if($ser->num_rows > 0)
							{
							$ser1=$ser->fetch_array();
							$prog=$obj->display('dm_service','id='.$ser1["service_interest"]);
							$prog1=$prog->fetch_array();

							if($ser1['type']=="Student") {$ld="DMC";}
							if($ser1['type']=="Visit") {$ld="DMV";}
							if($ser1['type']=="work") {$ld="DMW";}
							if($ser1['type']=="Business") {$ld="DMB";}
							if($ser1['type']=="Skill") {$ld="DMS";}
$em=$obj->display('dm_employee','id='.$ser1['Counsilor']); $em1=$em->fetch_array();*/
							
					    	?>

					    	<tr>

						    	<td><?php echo $i; ?></td>

						    	<td style="text-align: center;">

						    		<a class="btn btn-light" href="#" title="<?php echo $row['mobile'];?>"><?php echo $row["agreeNo"];?></a>

						    	</td>
						    	<td><?php echo date('d/m/Y',strtotime($row["sign_up_date"])); ?></td>

						    	<td><?php echo $row["client_name"] ; ?></td>
						    	<td style="text-align: center;"><?php echo $row["counselor"];?></td>

								<td><button type="button" class="btn <?php echo ($row["obs"]==1?"btn-success":"btn-info");?>" data-toggle="modal" data-target="#upload_obs<?=$row['temp_id']?>">Upload Observation</button>

<!-- Modal -->
<div id="upload_obs<?=$row['temp_id']?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      	<h6 class="modal-title">Upload Observation File</h6>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
        <div class="col-sm-12 form-group">
							<label>Upload Contract* <span>(pdf or jpg)</span></label>
							<input type="file" class="form-control" id="obs_sheet<?=$row['temp_id']?>" name="obs_sheet<?=$row['temp_id']?>"  >
					</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="uploadFile('obs','<?=$row['temp_id']?>','<?=$row['agreeNo']?>')">Save</button>
      </div>
    </div>

  </div>
</div> </td>
<td><button type="button" class="btn <?php echo ($row["agr"]==1?"btn-success":"btn-info");?>" data-toggle="modal" data-target="#upload_agr<?=$row['temp_id']?>">Upload Agreement</button>

<!-- Modal -->
<div id="upload_agr<?=$row['temp_id']?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      	<h6 class="modal-title">Upload Agreement File</h6>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
        <div class="col-sm-12 form-group">
							<label>Upload Contract* <span>(pdf or jpg)</span></label>
							<input type="file" class="form-control" id="agr_sheet<?=$row['temp_id']?>" name="agr_sheet<?=$row['temp_id']?>"  >
					</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="uploadFile('agr','<?=$row['temp_id']?>','<?=$row['agreeNo']?>')">Save</button>
      </div>
    </div>

  </div>
</div> </td>
						    	


						    	

						    </tr>


							

					    	<?php $i++;
					    }
					}
					
			  	?>
			  </tbody>
			</table>
	
		</div>

<!--common payment model-->


		<script>
				$(document).ready(function(){
    $('#myTable').DataTable({
    	responsive:true,
    	dom:'Bflrt<"bottom"p>',
    	"paging":true,
  "pageLength": 15,
    	"lengthMenu": [[-1], ["All"]],
    	buttons: [ 
			{
                extend: 'excel',
				footer: true,
                title: 'Pending contract'
            }]
    });
});
function uploadFile(type,id,agreeno) {
	var file_data = $('#'+type+'_sheet'+id).prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    form_data.append('agreeno',agreeno);
    form_data.append('type',type)
    $.ajax({
        url: 'process/upload_file_process.php', // point to server-side PHP script 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(php_script_response){
            console.log(php_script_response); // display response from the PHP script, if any
            $('#upload_'+type+id).modal("hide");
            $("button[data-target='#upload_"+type+id+"']").removeClass("btn-info").addClass("btn-success");
        },error: function (jqXHR, exception) {
        
        var msg = 'Uncaught Error.\n' + jqXHR.responseText;
        
        console.log(msg);
    }
     });
}

		</script>

    		
		
<?php include_once("footer.php"); ?>


