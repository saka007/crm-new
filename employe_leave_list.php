<?php
include_once("header.php");	
?>
<div class="col-sm-10">
	<h4 class="mb-3" style="color:#2cb674;">Employee Leave List </h4>

<form name="search" action="" method="post">
<div class="row">
<div class="col-sm-2 form-group">
<label >Start Date</label>
<input type="text" class="form-control" id="sdate" name="sdate" value="<?php if($_POST['sdate']) echo $_POST['sdate']; else  echo date('d-m-Y')?>"></div>
<div class="col-sm-2 form-group"><label >End Date</label>
<input type="text" class="form-control" id="edate" name="edate" value="<?php if($_POST['edate']) echo $_POST['edate']; else echo date('d-m-Y')?>"></div>

<div class="col-sm-3 form-group"><label >&nbsp;</label><br /><input type="submit" class="btn btn-info" name="search" value="Search" ></div>
</div>
</form>	
<?php
$query="";
if($_POST)
{
$query=" and fromDate >= '".date('Y-m-d',strtotime($_POST["sdate"]))."' and toDate <='".date('Y-m-d',strtotime($_POST["edate"]))."'";
}
?>	
			<table class="table table-striped table-bordered" id="dataTables-Table" style="width:100%">
				<thead>
					<tr>
					  <th>Employee</th>
					  <th>From Date</th>
					  <th>To Date</th>
					  <th>Type</th>
					  <th>Approve By</th>
					  <th>Apply Date</th>
					  <th>Remark</th>
					  <th>Files</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$i=1;
				$re=$obj->display("dm_leave_history","status=1 ".$query." order by fromDate DESC"); 	
				while($res2=$re->fetch_array())
				{
				$cust=$obj->display('dm_employee','id='.$res2['custId']);$cust1=$cust->fetch_array(); 
				?>  
				<tr id="item-<?=$res2['id']?>">
				 <td><?=$cust1['name'];?></td>
				 <td><?=date('d-m-Y',strtotime($res2['fromDate']));?></td>
				 <td><?=date('d-m-Y',strtotime($res2['toDate']));?></td>
				 <td><?=$res2['type'];?></td>
				 <td><?=$res2['approvBy'];?></td>
				 <td><?=date('d-m-Y',strtotime($res2['applyDate']));?></td>
				 <td><?=$res2['remark'];?></td>
				 <td><a href="uploads/hr_docs/<?=$res2['file'];?>" target="_blank"><?=$res2['file'];?></a></td>
				    
				</tr>
											
<?php $i++;} ?>

				</tbody>

			</table>

			<!-- /.table-responsive -->

</div>
                <!-- /.col-lg-12 -->
       


<?php 	include_once("footer.php");	?>

   <script>
$(function(){
$('#sdate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
$('#edate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
}); 
</script>