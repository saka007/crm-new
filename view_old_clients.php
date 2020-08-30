<?php include_once("header.php");

?>

<style>
.row-actions {
  color: #ddd;
  font-size: 13px;
  left: -9999em;
  position: absolute;
padding: 2px 0 0;
}
.row-actions.visible, tr:hover .row-actions {
  position: static;
}

</style>
		<div class="col-sm-10">
<div class="row"><div class="col-sm-12"><h4 class="mb-3" style="color:#2cb674;">Client List</h4></div></div>
<form action="" method="post">
<div class="row"><div class="col-sm-2 form-group"><label>Agreement Number</label>
<input class="form-control" name="agree" id="agree">
</div>
<div class="col-sm-2 form-group"><label>&nbsp;</label><br /><input type="submit" class="btn btn-info" name="search" value="Search" ></div></div></form>
<br>

			<table class="table table-striped table-bordered" id="dataTables-Table" style="width:100%">

			  <thead>

			    <tr>

			      <th>No</th>

			      <th>Agreement<br />No</th>
			      <th>Name</th>

			      <th>To</th>


			      <th>Counselor</th>

			      <th>Status</th>
			      

			    </tr>

			  </thead>

			  <tbody>

<?php  
/*if ($_POST){
if($_POST['agree']!="")
{
    $agr = $obj->display('dm_lead_contract','id='.$_POST['agree']);
    $agr1 = $agr->fetch_array();
    // print_r($agr1);
	$query.= " and id=".$agr1['leadId'];
}

// echo "select ".$value." from ".$table." where ".$condition;die;
// echo $query; die;

					$result = $obj->display('dm_lead','stepComplete=3 and paidYet!=0'.$query.' order by id desc');

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
$agre= $obj->display('dm_lead_contract', ' leadId='.$row["id"]); $agre1 = $agre->fetch_array();
						
					    	*/
$i = 1;
if(isset($_POST['agree'])){
$result = $obj->display3("Select o.*, p.*,o.agreeno agreement_number from old_data_2 o left join dm_old_payment p on o.agreeNo=p.agreeNo where o.agreeNo like '%".$_POST['agree']."%' ");
if ($result->num_rows > 0) {
	 while($row = $result->fetch_assoc()) {

	 	?>

					    	<tr style="<?php if($row["status"]=="Refund" || $row["status"]=="Closed"){
									echo "background-color: #f7b5b5";
								}
								else if($row["status"]=="Inactive"){
									echo "background-color : #ffda6c";
								}?>">

						    	<td><?php echo $i; ?></td>

						    	<td style="text-align: center;">

						    		<?php echo '<a class="btn btn-light" data-toggle="modal" data-target=".bd-example'.$i.'">'.$row["agreement_number"].' </a>'; ?>
<div class="row-actions">

<span class="edit"> <a href="ops_skill_canada_old.php?agreement=<?php echo $row['agreement_number'];?>" title="EDIT">OPS</a> | <a href="" data-toggle="modal" data-target="#payment_model<?=$row['temp_id']?>">Payment</a> | <a href="extra_payment_old.php?agreement=<?php echo $row['agreement_number'];?>" >Extra</a>

</div>
</td>
<td><?php echo $row["client_name"]; ?>
	<div class="row-actions">
		<?php $emails=explode(";", $row["email"]);
		foreach ($emails as $email) {
			echo '<span class="edit">
		<a href="mailto:'.$email.'">'.$email.'</a></span>';
		}?>
		</div>							
								</td>

						    	<td><?php echo $row["country"]; ?></td>

						    	<td><?php echo $row["counselor"]; ?></td>

						    	<td>
							<select class="form-control" id="status<?=$row['temp_id']?>" name="status"  >
								<option value="Open" <?php if ($row['status'] =="Open"){echo " selected";}?>>Open</option>
								<option value="Closed" <?php if ($row['status'] =="Closed"){echo " selected";}?>>Closed</option>
								<option value="Refund" <?php if ($row['status'] =="Refund"){echo " selected";}?>>Refund</option>
								<option value="Inactive" <?php if ($row['status'] =="Inactive"){echo " selected";}?>>Inactive</option>
							</select>
						</td>
</tr>
<div id="payment_model<?=$row['temp_id']?>" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      	<h6 class="modal-title">Configure Payment </h6>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div><form action="" method="post" name="paymentForm " enctype="multipart/form-data">
      <div class="modal-body">
 			<input type="hidden" name="agreeNo" id="agreeno<?=$row['temp_id']?>" value="<?php echo $row['agreement_number'];?>" />
					<div class="form-row">
						<div class="col-sm-4 form-group">
							Fee Category
							<select name="payCategory" class="form-control" id="payCategory<?=$row['temp_id']?>">
								<option value="Retainer" <?php if ($row['payCategory'] =="Retainer"){echo " selected";}?>>Retainer</option>
								<option value="Professional" <?php if ($row['payCategory'] =="Professional"){echo " selected";}?>>Professional</option>
							</select>
						</div>
						<div class="col-sm-4 form-group">	
							Payment Mode
							<select class="form-control" id="payMethod<?=$row['temp_id']?>" name="payMethod" >
								<option value="Cash" <?php if ($row['payMethod'] =="Cash"){echo " selected";}?>>Cash</option>
								<option value="Cheque" <?php if ($row['payMethod'] =="Cheque"){echo " selected";}?>>Cheque</option>
								<option value="DD" <?php if ($row['payMethod'] =="DD"){echo " selected";}?>>DD</option>
								<option value="Net Banking" <?php if ($row['payMethod'] =="Net Banking"){echo " selected";}?>>Net Banking</option>
								<option value="Debit / Credit Card" <?php if ($row['payMethod'] =="Debit / Credit Card"){echo " selected";}?>>Debit / Credit Card </option>
								<option value="Website" <?php if ($row['payMethod'] =="Website"){echo " selected";}?>>Website</option>
							</select>
						</div>
						<div class="col-sm-4 form-group">
							Payment Total
							<input type="text" class="form-control" id="payTotal<?=$row['temp_id']?>" name="payTotal" value="<?php echo $row['payTotal'];?>">
						</div>
					</div>
					<div class="form-row">
						<div class="col-sm-4 form-group">
							Discount
							<input type="text" class="form-control" id="discount<?=$row['temp_id']?>" name="discount" value="<?php echo $row['discount'];?>"   >
						</div>
						<div class="col-sm-4 form-group">
							Payment Balance
							<input type="text" class="form-control" id="payBalance<?=$row['temp_id']?>" name="payBalance" value="<?php echo $row['payBalance'];?>" readonly="" >
						</div>
						<div class="col-sm-4 form-group">Select VAT for which country
							<select class="form-control" id="Vatvalue<?=$row['temp_id']?>" name="Vatvalue" disabled="">
								<option value="5" <?php if (strtolower($row['branch']) =="dubai" || strtolower($row['branch']) =="abu dhabi" || strtolower($row['branch']) =="sharjah"){echo " selected";}?>>UAE</option>
								<option value="0" <?php if (strtolower($row['branch']) =="qatar"){echo " selected";}?>>QATAR</option>
								
								<option value="18" <?php if (strtolower($row['branch'])=="pune" || strtolower($row['branch']) =="bangalore" ){echo " selected";}?>>INDIA</option>
								<option value="0" <?php if (strtolower($row['branch']) =="oman"){echo " selected";}?>>OMAN</option>
								<!-- <option value="0" <?php if ($m =="23" || $m == "24" || $m == "25" || $m == "26"){echo " selected";}?>>Saudi</option> -->
							</select>
						</div>
					</div>
					<div class="form-row">
						<div class="col-sm-4 form-group">Pay Amount
							<input type="text" class="form-control" id="payAmt<?=$row['temp_id']?>" name="payAmt" min="0" max="<?=$row['payBalance'];?>" required value="<?php echo $row['payAmt'];?>">
						</div>
						<div class="col-sm-4 form-group">VAT
							<input type="text" class="form-control" id="taxAmt<?=$row['temp_id']?>" name="taxAmt"  readonly="" required value="<?php echo $row['taxAmt'];?>">
						</div>
						<div class="col-sm-4 form-group">Total Pay Amount
							<input type="text" class="form-control" id="totPayAmt<?=$row['temp_id']?>" name="totPayAmt"  readonly="" required value="<?php echo $row['totPayAmt'];?>">
						</div>
					</div>
					<div class="form-row">
						<div class="col-sm-4 form-group" id="totBalancediv<?=$row['temp_id']?>" <?php echo ($row['totBalance']>0?"":"style='display:none'");?>>
							Balance Amount
							<input type="text" class="form-control" id="totBalance<?=$row['temp_id']?>" name="totBalance"  readonly="" required value="<?php echo $row['totBalance'];?>">
						</div>
						<div class="col-sm-4 form-group " id="nextPayAmtdiv<?=$row['temp_id']?>" <?php echo ((float)$row['payTotal']-(float)$row['discount']-(float)$row['payAmt']>0?"":"style='display:none'");?>>Next Pay Amount
							<input type="text" class="form-control" id="nextPayAmt<?=$row['temp_id']?>" name="nextPayAmt" min="0" max="" value="<?php echo $row['nextPayAmt'];?>" >
						</div>
						<div class="col-sm-4 form-group " id="nextPayDatediv<?=$row['temp_id']?>" <?php echo ((float)$row['payTotal']-(float)$row['discount']-(float)$row['payAmt']>0?"":"style='display:none'");?>>Next Pay Date
							<input type="text" class="form-control nextPayDate" id="nextPayDate<?=$row['temp_id']?>" name="nextPayDate" value="<?php echo $row['nextPayDate'];?>">
						</div>
					</div>
					<div class="form-row">
						<div class="col-sm-12 form-group " id="demdRemarkdiv<?=$row['temp_id']?>" <?php echo ((float)$row['payTotal']-(float)$row['discount']-(float)$row['payAmt']>0?"":"style='display:none'");?>>
						Remark<textarea type="text" class="form-control" id="demdRemark<?=$row['temp_id']?>" name="demdRemark" ><?php echo $row['demdRemark'];?></textarea>
						</div>
					</div>
			</div>
		</form>
      <div class="modal-footer">
        <button  onclick="submitPayment('<?=$row['temp_id']?>')" class="btn btn-info" >Submit</button>
      </div>
  
    </div>

  </div>
</div>
					    	<?php $i++;
					    }
					}
				}
			  	?>
			  </tbody>
			</table>
	
		</div>
                <?php  include_once("footer.php"); ?>

<script>
function changeAssign(asign,lead){
if(asign!="")
{
	$.ajax({
				url: "<?php echo $base_url;?>/process/assign_process.php",
				type: "POST",
				cache: false,
				dataType: 'json',
				data:'&asign='+asign+'&lead='+lead,
				success:function(result){
				alert("Assigned to officer");
				}
			});
}
}

function changeStatus(asign,lead){
if(asign!="")
{	$.ajax({
				url: "<?php echo $base_url;?>/process/status_process.php",
				type: "POST",
				cache: false,
				dataType: 'json',
				data:'&asign='+asign+'&lead='+lead,
				success:function(result){
				alert("Status Changed");
				location.reload();
				}
			});
}
}



$('.nextPayDate').each(function( index ) {
	$(this).datepicker({    format: 'dd-mm-yyyy',	autoclose: true,"setDate" : Date($(this).val())});
});
$('input[id^=payAmt').blur(function(){

	id=$(this).attr("id").slice($(this).attr("id").lastIndexOf('payAmt') + 6);
var amt= $(this).val();
var bal= $('#payBalance'+id).val();
var vat= $('#Vatvalue'+id).val();
bal=parseFloat(bal)-parseFloat(amt);
var tax = parseFloat(amt)*0.01*parseFloat(vat);
var tot = parseFloat(amt)+parseFloat(tax);
if(bal > 0) { 

	$("#nextPayAmt"+id).prop('required',true); 
	$("#nextPayDate"+id).prop('required',true); 
	$('#nextPayAmt'+id).attr("max",bal);
	$("#nextPayAmtdiv"+id).css('display',""); 
	$("#nextPayDatediv"+id).css('display',""); 
	$('#demdRemarkdiv'+id).css('display',"");
	$("#totBalancediv"+id).css('display',"");  
}
else
{

	$("#nextPayAmt"+id).prop('required',false); 
	$("#nextPayDate"+id).prop('required',false); 
	$('#nextPayAmt'+id).attr("max",bal);
	$("#nextPayAmtdiv"+id).css('display',"none"); 
	$("#nextPayDatediv"+id).css('display',"none"); 
	$('#demdRemarkdiv'+id).css('display',"none"); 
	$("#totBalancediv"+id).css('display',"none");  
}
$('#taxAmt'+id).val(tax);
$('#totPayAmt'+id).val(tot);
$('#totBalance'+id).val(bal);
});

$('input[id^=payBalance').change(function(){

	id=$(this).attr("id").slice($(this).attr("id").lastIndexOf('payBalance') + 10);
var amt= $("#payAmt"+id).val();
var bal= $(this).val();
var vat= $('#Vatvalue'+id).val();
bal=parseFloat(bal)-parseFloat(amt);
var tax = parseFloat(amt)*0.01*parseFloat(vat);
var tot = parseFloat(amt)+parseFloat(tax);
if(bal > 0) { 
	$("#nextPayAmt"+id).prop('required',true); 
	$("#nextPayDate"+id).prop('required',true); 
	$('#nextPayAmt'+id).attr("max",bal);
	$("#nextPayAmtdiv"+id).css('display',""); 
	$("#nextPayDatediv"+id).css('display',""); 
	$('#demdRemarkdiv'+id).css('display',""); 
	$("#totBalancediv"+id).css('display',"");
}
else
{
	$("#nextPayAmt"+id).prop('required',false); 
	$("#nextPayDate"+id).prop('required',false); 
	$('#nextPayAmt'+id).attr("max",bal);
	$("#nextPayAmtdiv"+id).css('display',"none"); 
	$("#nextPayDatediv"+id).css('display',"none"); 
	$('#demdRemarkdiv'+id).css('display',"none"); 
	$("#totBalancediv"+id).css('display',"");
}
$('#taxAmt'+id).val(tax);
$('#totPayAmt'+id).val(tot);
$('#totBalance'+id).val(bal);
});

$('input[id^=payTotal').blur(function () {
	id=$(this).attr("id").slice($(this).attr("id").lastIndexOf("payTotal") + 8);
	total=$("#payTotal"+id).val();
	discount=$("#discount"+id).val();
	bal=parseFloat(total)-parseFloat(discount);
	$('#payBalance'+id).val(bal);
	$("#payBalance"+id).trigger("change");

});
$('input[id^=discount').blur(function () {
	id=$(this).attr("id").slice($(this).attr("id").lastIndexOf("discount") + 8);
	total=$("#payTotal"+id).val();
	discount=$("#discount"+id).val();
	bal=parseFloat(total)-parseFloat(discount);
	$('#payBalance'+id).val(bal);
	$("#payBalance"+id).trigger("change");
});

function submitPayment(id) {
var data={};
	data.agreeNo=$("#agreeno"+id).val();
	data.payTotal=$("#payTotal"+id).val();
	data.discount=$("#discount"+id).val();
	data.payBalance=$('#payBalance'+id).val();

	data.payAmt=$('#payAmt'+id).val();
	data.taxAmt=$('#taxAmt'+id).val();
	data.totPayAmt=$('#totPayAmt'+id).val();

	data.totBalance=$('#totBalance'+id).val();
	data.nextPayAmt=$("#nextPayAmt"+id).val(); 
	data.nextPayDate=$("#nextPayDate"+id).val(); 

	data.demdRemark=$('#demdRemark'+id).val();
	data.payCategory=$('#payCategory'+id).val();
	data.payMethod=$('#payMethod'+id).val();
$.ajax({
		url: "process/payment_process.php",
		type: "POST",
		//dataType: 'json',
		data:data,
		success:function(result){
			console.log(result);
			$('#payment_model'+id).modal("hide");
		},error: function (jqXHR, exception) {
        
        var msg = 'Uncaught Error.\n' + jqXHR.responseText;
        
        console.log(msg);
    }
	});

}

$('[id^="status"]').change(function(){ 
		var a=$(this);
        id=a.attr("id").slice(a.attr("id").lastIndexOf("status") + 6);
        var data={};
			data.id=id;
			data.status=a.val();
			$.ajax({
		url: "process/old_status_process.php",
		type: "POST",
		dataType: 'json',
		data:data,
		success:function(result){
			console.log(result);
			if(data.status=="Refund" || data.status=="Close"){
				a.closest("tr").css("background-color","#f7b5b5");
			}
			else if(data.status=="Inactive"){
				a.closest("tr").css("background-color","#ffda6c");
			}else{
				a.closest("tr").css("background-color","#ffffff");
			}
		},error: function (jqXHR, exception) {
        
        var msg = 'Uncaught Error.\n' + jqXHR.responseText;
        
        console.log(msg);
    }
	});
    });
</script>
