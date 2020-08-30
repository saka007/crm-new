<?php 	
include_once("header.php");	

if($_POST['submit']) {

$payType = $_POST['payType'];

$org=$obj->display('dm_fee','id='.$_POST['id']);
$org1=$org->fetch_array();

$payTotal=0;
$taxTotal=0;

if($payType=="Upfront")
{
	/*$data1 = array(
    			"lead" => $_POST['lead'],
    			"amount" => $org1['upfront'],
    			"taxAmt" => $org1['upfront']*0.05
				);
	$feed=$obj->insert('dm_lead_fee',$data1);*/

$payTotal=$org1['upfront'];
$taxTotal=$org1['upfront']*0.05;

}

if($payType=="Monthly")
{

	/*$data1 = array(
    			"lead" => $_POST['lead'],
    			"amount" => $org1['firstMonth'],
    			"taxAmt" => $org1['firstMonth']*0.05
				);
	$feed=$obj->insert('dm_lead_fee',$data1);

	$data2 = array(
    			"lead" => $_POST['lead'],
    			"amount" => $org1['secondMonth'],
    			"taxAmt" => $org1['secondMonth']*0.05
				);
	$obj->insert('dm_lead_fee',$data2);
	$data3 = array(
    			"lead" => $_POST['lead'],
    			"amount" => $org1['thirdMonth'],
    			"taxAmt" => $org1['thirdMonth']*0.05,
    			"profAmt" => $org1['prof_fee_month']
				);
	$obj->insert('dm_lead_fee',$data3);*/
$payTotal=$org1['firstMonth']+$org1['secondMonth']+$org1['thirdMonth']+$org1['prof_fee_month'];
$taxTotal=$payTotal*0.05;

}	

if($payType=="Stagewise")
{

	/*$data1 = array(
    			"lead" => $_POST['lead'],
    			"amount" => $org1['firstStage'],
    			"taxAmt" => $org1['firstStage']*0.05
				);
	$feed=$obj->insert('dm_lead_fee',$data1);

	$data2 = array(
    			"lead" => $_POST['lead'],
    			"amount" => $org1['secondStage'],
    			"taxAmt" => $org1['secondStage']*0.05
				);
	$obj->insert('dm_lead_fee',$data2);
	$data3 = array(
    			"lead" => $_POST['lead'],
    			"amount" => $org1['thirdStage'],
    			"taxAmt" => $org1['thirdStage']*0.05,
    			"profAmt" => $org1['prof_fee_stage']
				);
	$obj->insert('dm_lead_fee',$data3);*/


$payTotal=$org1['firstStage']+$org1['secondStage']+$org1['thirdStage']+$org1['prof_fee_stage'];
$taxTotal=$payTotal*0.05;

}	
$payBalance=$payTotal-$_POST['discount'];
	$data = array(
    			"payType" => $payType,
    			"payTotal" => $payTotal,
    			"discount" => $_POST['discount'],
    			"payBalance" => $payBalance,
				"feeAgreeDate" => date('Y-m-d')
				);
	$obj->update('dm_lead',$data,'id='.$_POST['lead']);


	header("location:lead_payment.php?lead=".$_POST['lead']);
	
}

$hg=$obj->display('dm_lead','id='.$_GET['lead']);
$hg1=$hg->fetch_array();

if($hg1['payType']=="")
{
$fee=$obj->display('dm_fee','service='.$hg1['service_interest'].' and country='.$hg1['country_interest']);
$fee1=$fee->fetch_array();
}
else
{
$fee=$obj->display('dm_lead_fee','lead='.$_GET['lead']);
$fee2=$obj->display('dm_lead_fee','lead='.$_GET['lead']);
$fee3=$obj->display('dm_lead_fee','lead='.$_GET['lead']);

}
?>
	
			<div class="col-sm-10">
			<form action="" method="post" name="paymentForm ">
			<input type="hidden" name="lead" value="<?php echo $_GET['lead'];?>" />
			<input type="hidden" name="id" value="<?php echo $fee1['id'];?>" />
				<div class="row">
					<div class="col-sm-6 form-group" style="text-align: left;">
						<h4 class="h4-color">LEAD PAYMENT</h4>
					</div>
					<div class="col-sm-6 form-group" style="text-align: right;">
						<h4 class="h4-color"></h4>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 col-sm-12 form-group">
						<h4 class="h4-color" style="text-align: center;">Select Payment Method </br> ---------</h4>
						<section>
						<div style=" <?php if($hg1['payType']=="Upfront" || $hg1['payType']=="") { echo 'display:block';} else {  echo 'display:none';}?>">
						  <input type="radio" id="control_01" name="payType" value="Upfront" <?php if($hg1['payType']=="Upfront") { echo 'checked="checked"';}?> >
						  <label for="control_01" class="radio-hover" id="control_01">
						    <!--<h5>CAN-EES - PA</h5>-->
						    <p>Upfront</p>
						  </label>
						</div>
						<div style=" <?php if($hg1['payType']=="Monthly" || $hg1['payType']=="") { echo 'display:block';} else {  echo 'display:none';}?>">
						  <input type="radio" id="control_02" name="payType" value="Monthly" <?php if($hg1['payType']=="Monthly") { echo 'checked="checked"';}?>>
						  <label for="control_02" class="radio-hover">
						    <!--<h5>CAN-EES - PA</h5>-->
						    <p>Monthly Installemnt</p>
						  </label>
						</div>
						<div style=" <?php if($hg1['payType']=="Stagewise" || $hg1['payType']=="") { echo 'display:block';} else {  echo 'display:none';}?>">
						  <input type="radio" id="control_03" name="payType" value="Stagewise" <?php if($hg1['payType']=="Stagewise") { echo 'checked="checked"';}?>>
						  <label for="control_03" class="radio-hover">
						    <!--<h5>CAN-EES - PA</h5>-->
						    <p>Stagewise Installemnt</p>
						  </label>
						</div>
						
						</section>

					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 col-sm-12 form-group">
					
						<div id="control-upfront" class="radio-control" style=" <?php if($hg1['payType']=="Upfront") { echo 'display:block';} else {  echo 'display:none';}?>">
							<h5 class="h4-color" style="text-align: center;">Upfront</h5>
							<div class="col-xs-8 col-sm-8" style="margin: 20px auto;">
								<table class="table">
								  <tbody>
								    <tr>
								      <th scope="row">Fee Amount</th>
								      <td><?php echo $fee1['upfront'];?></td>
								    </tr>
								  </tbody>
								</table>
								
								<table class="table">
								  <tbody>
								    <tr><th>&nbsp;</th><th>Retainer Amt</th><th>Professional Amt</th></tr>
								    <tr><th scope="row">Upfront</th><td><?php echo $fee1['upfront'];?></td><td><?php echo $fee1['prof_fee'];?></td></tr>
								  <?php 
								  $payTotal=$fee1['upfront']+$fee1['prof_fee'];
								  $taxTotal=$payTotal*0.05;
								  ?>
								  </tbody>
								</table>
								
							</div>
							
						</div>

						<div id="control-monthly" class="radio-control" style=" <?php if($hg1['payType']=="Monthly") { echo 'display:block';} else {  echo 'display:none';}?>">
							<h5 class="h4-color" style="text-align: center;">Monthly Installemnt</h5>
							<div class="col-xs-8 col-sm-8" style="margin: 20px auto;">
								<table class="table">
								  <tbody>
								    <tr><th>&nbsp;</th><th>Retainer Amt</th><th>Professional Amt</th></tr>
								    <tr><th scope="row">1st Month</th><td><?php echo $fee1['firstMonth'];?></td><td>&nbsp;</td></tr>
								    <tr><th scope="row">2nd Month</th><td><?php echo $fee1['secondMonth'];?></td><td>&nbsp;</td></tr>
								    <tr><th scope="row">3nd Month</th><td><?php echo $fee1['thirdMonth'];?></td><td><?php echo $fee1['prof_fee_month'];?></td></tr>
								  <?php 
								  $payTotal=$fee1['firstMonth']+$fee1['secondMonth']+$fee1['thirdMonth']+$fee1['prof_fee_month'];
								  $taxTotal=$payTotal*0.05;
								  ?>
								  </tbody>
								</table>
							</div>
							
							
						</div>

						<div id="control-stage" class="radio-control" style=" <?php if($hg1['payType']=="Stagewise") { echo 'display:block';} else {  echo 'display:none';}?>">
							<h5 class="h4-color" style="text-align: center;">Stagewise Installemnt</h5>
							<div class="col-xs-8 col-sm-8" style="margin: 20px auto;">
								<table class="table">
								  <tbody>
								    <tr><th>&nbsp;</th><th>Retainer Amt</th><th>Professional Amt</th></tr>
								    <tr><th scope="row">1st Month</th><td><?php echo $fee1['firstStage'];?></td><td>&nbsp;</td></tr>
								    <tr><th scope="row">2nd Month</th><td><?php echo $fee1['secondStage'];?></td><td>&nbsp;</td></tr>
								    <tr><th scope="row">3nd Month</th><td><?php echo $fee1['thirdStage'];?></td><td><?php echo $fee1['prof_fee_stage'];?></td></tr>
								  <?php 
								  $payTotal=$fee1['firstStage']+$fee1['secondStage']+$fee1['secondStage']+$fee1['prof_fee_stage'];
								  $taxTotal=$payTotal*0.05;
								  ?>
								  </tbody>
								</table>
							</div>
							
						</div>

						
					</div>
				</div>

				<div class="row" id="payment-submit" style="text-align: center; <?php if($hg1['payType']=="") { echo 'display:none';} else {  echo 'display:inline';}?>">	
				<div class="col-sm-4 form-group">
				<input type="number" name="discount" class="form-control" min="1" step="any" placeholder="Discount" />
				</div>
					<div class="col-sm-6 form-group">
					<input type="submit" name="submit" value="SUBMIT" class="btn btn-info" ></div> 	
				</div>		
			</form>
			
			
			
			</div>
		
<?php 	include_once("footer.php");	?>
<script>

$(document).ready(function()
  {
	$('input[type="radio"]').click(function(){
		//alert($(this).attr("value"));
		if ($(this).attr("value") == "Upfront") {
			$("#upfrontPaidAmt").prop('required',true); 
			$("#monthlyPaidAmt").prop('required',false); $("#stagePaidAmt").prop('required',false);
			$('#payment-submit').show();
	       $('#control-upfront').show();
	       $('#control-monthly').hide();
	       $('#control-stage').hide();
	    }
	    if ($(this).attr("value") == "Monthly") {
			$("#monthlyPaidAmt").prop('required',true); 
			$("#upfrontPaidAmt").prop('required',false); $("#stagePaidAmt").prop('required',false);
	    	$('#payment-submit').show();
	       $('#control-monthly').show();
	       $('#control-upfront').hide();
	       $('#control-stage').hide();
	    }
	    if ($(this).attr("value") == "Stagewise") {
			$("#stagePaidAmt").prop('required',true); 
			$("#monthlyPaidAmt").prop('required',false); $("#upfrontPaidAmt").prop('required',false);
	    	$('#payment-submit').show();
	       $('#control-stage').show();
	       $('#control-monthly').hide();
	       $('#control-upfront').hide();
	    }
	});
});
</script>

<style>
section {
  display: flex;
  flex-flow: row wrap;
}
section > div {
  flex: 1;
  padding: 0.5rem;
}
input[type="radio"] {
  display: none;
  &:not(:disabled) ~ label {
    cursor: pointer;
  }
  &:disabled ~ label {
    color: hsla(150, 5%, 75%, 1);
    border-color: hsla(150, 5%, 75%, 1);
    box-shadow: none;
    cursor: not-allowed;
  }
}
label {
  height: 100%;
  display: block;
  background: white;
  border: 2px solid hsla(150, 75%, 50%, 1);
  border-radius: 20px;
  padding: 1rem;
  margin-bottom: 1rem;
  //margin: 1rem;
  text-align: center;
  box-shadow: 0px 3px 10px -2px hsla(150, 5%, 65%, 0.5);
  position: relative;
}
input[type="radio"]:checked + label {
  background: hsla(150, 75%, 50%, 1);
  color: hsla(215, 0%, 100%, 1);
  box-shadow: 0px 0px 20px hsla(150, 100%, 50%, 0.75);
  &::after {
    color: hsla(215, 5%, 25%, 1);
    font-family: FontAwesome;
    border: 2px solid hsla(150, 75%, 45%, 1);
    content: "\f00c";
    font-size: 24px;
    position: absolute;
    top: -25px;
    left: 50%;
    transform: translateX(-50%);
    height: 50px;
    width: 50px;
    line-height: 50px;
    text-align: center;
    border-radius: 50%;
    background: white;
    box-shadow: 0px 2px 5px -2px hsla(0, 0%, 0%, 0.25);
  }
}
input[type="radio"]#control_05:checked + label {
  background: red;
  border-color: red;
}
p {
  font-weight: 900;
}


@media only screen and (max-width: 700px) {
  section {
    flex-direction: column;
  }
}

.radio-hover {
	cursor: pointer;
}

.radio-control {
	border: 1px solid #2cb674;border-radius: 10px;
	width: 100%; padding-bottom: 50px; padding-top:20px
}

.radio-control h6 {
	text-align: center;
}

.radio-control p {
	float: left;margin: 8px 50px;
}

.radio-control input {
	float: left;
}

.radio-control .para {
	margin: 8px 25px;
}

.table tr:last-child {
	border-bottom: 1px solid #dee2e6;
}
.table tr:first-child th, .table tr:first-child td {
	border-top: 0px solid #dee2e6;
}
</style>