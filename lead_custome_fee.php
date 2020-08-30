<?php 	include_once("header.php");	
//echo $_GET['leadPayment'] . " ==> leadPayment";

$hg=$obj->display('dm_lead','id='.$_GET['lead']);
$hg1=$hg->fetch_array();
$fee=$obj->display('dm_fee','service='.$hg1['service_interest'].' and country='.$hg1['country_interest']);
$fee1=$fee->fetch_array();

if($_POST['submit']) {

	$payType = $_POST['payType'];

$df=$obj->display('dm_lead_fee','lead='.$_POST['lead'].' and paidAmt!=0');
if($df->num_rows == 0)
{	
$obj->delete('dm_lead_fee','lead='.$_POST['lead']);

	$data = array(
    			"payType" => $payType
				);
	$obj->update('dm_lead',$data,'id='.$_POST['lead']);
	
if($payType=="Upfront")
{
	$data1 = array(
    			"lead" => $_POST['lead'],
    			"amount" => $_POST['upfrontAmt'],
    			"taxAmt" => $_POST['upfrontAmt']*0.05,
    			"payDate" => date('Y-m-d',strtotime($_POST['upfrontDate'])),
    			"profAmt" => $_POST['profAmt']
				);
	$obj->insert('dm_lead_fee',$data1);

}	
if($payType=="Monthly")
{
	$data1 = array(
    			"lead" => $_POST['lead'],
    			"amount" => $_POST['firstMonthAmt'],
    			"taxAmt" => $_POST['firstMonthAmt']*0.05,
    			"payDate" =>  date('Y-m-d',strtotime($_POST['firstMonthDate']))
				);
	$obj->insert('dm_lead_fee',$data1);
	$data2 = array(
    			"lead" => $_POST['lead'],
    			"amount" => $_POST['secondMonthAmt'],
    			"taxAmt" => $_POST['secondMonthAmt']*0.05,
    			"payDate" =>  date('Y-m-d',strtotime($_POST['secondMonthDate']))
				);
	$obj->insert('dm_lead_fee',$data2);
	$data3 = array(
    			"lead" => $_POST['lead'],
    			"amount" => $_POST['thirdMonthAmt'],
    			"taxAmt" => $_POST['thirdMonthAmt']*0.05,
    			"payDate" =>  date('Y-m-d',strtotime($_POST['thirdMonthDate'])),
    			"profAmt" => $_POST['profMonthAmt']
				);
	$obj->insert('dm_lead_fee',$data3);
}	
if($payType=="Stagewise")
{
	$data1 = array(
    			"lead" => $_POST['lead'],
    			"amount" => $_POST['firstStageAmt'],
    			"taxAmt" => $_POST['firstStageAmt']*0.05,
    			"payDate" =>  date('Y-m-d',strtotime($_POST['firstStageDate']))
				);
	$obj->insert('dm_lead_fee',$data1);
	$data2 = array(
    			"lead" => $_POST['lead'],
    			"amount" => $_POST['secondStageAmt'],
    			"taxAmt" => $_POST['secondStageAmt']*0.05,
    			"payDate" =>  date('Y-m-d',strtotime($_POST['secondStageDate']))
				);
	$obj->insert('dm_lead_fee',$data2);
	$data3 = array(
    			"lead" => $_POST['lead'],
    			"amount" => $_POST['thirdStageAmt'],
    			"taxAmt" => $_POST['thirdStageAmt']*0.05,
    			"payDate" =>  date('Y-m-d',strtotime($_POST['thirdStageDate'])),
    			"profAmt" => $_POST['profStageAmt']
				);
	$obj->insert('dm_lead_fee',$data3);
}	

	header("location:lead_custome_fee.php?lead=".$_POST['lead']."&sucess=Fee amounts updated");

}
else
{
	header("location:lead_custome_fee.php?lead=".$_POST['lead']."&error=Cannot change values");

}

	
}



?>

	
			
			<div class="col-sm-10">
			<form action="" method="post" name="paymentForm ">
			<input type="hidden" name="lead" value="<?php echo $_GET['lead'];?>" />
			<input type="hidden" name="fee" value="<?php echo $fee1['id'];?>" />
				<div class="row">
					<div class="col-sm-6 form-group" style="text-align: left;">
						<h4 class="h4-color">CUSTOMIZE LEAD PAYMENT</h4>
					</div>
					<div class="col-sm-6 form-group" style="text-align: right;">
						<h4 class="h4-color"></h4>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 col-sm-12 form-group">
						<h4 class="h4-color" style="text-align: center;">Select Payment Method </br> ---------</h4>
						
						<?php if(isset($_GET['error'])) { echo '<div class="alert alert-danger">'.$_GET['error'].'</div>';} ?>
						<?php if(isset($_GET['sucess'])) { echo '<div class="alert alert-success">'.$_GET['sucess'].'</div>';} ?>
						
						<section>
						<div>
						  <input type="radio" id="control_01" name="payType" value="Upfront" >
						  <label for="control_01" class="radio-hover" id="control_01">
						    <h5>Upfront</h5>
						  </label>
						</div>
						<div>
						  <input type="radio" id="control_02" name="payType" value="Monthly">
						  <label for="control_02" class="radio-hover">
						    <h5>Monthly Installment</h5>
						  </label>
						</div>
						<div>
						  <input type="radio" id="control_03" name="payType" value="Stagewise">
						  <label for="control_03" class="radio-hover">
						    <h5>Stagewise Installment</h5>
						  </label>
						</div>
						
						</section>

					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 col-sm-12 form-group">
					
						<div id="control-upfront" class="radio-control" style="display:none">
							<h4 class="h4-color" style="text-align: center;">Upfront</h4>
							<div class="col-xs-8 col-sm-8" style="margin: 20px auto;">
								
							
								<table class="table">
								  <tbody>
								    <tr>
								      <td><b>Retainer Amount</b><br /><input type="text" class="form-control" id="upfrontAmt" name="upfrontAmt" value="<?php echo $fee1['upfront'];?>" ></td>
									  <td><b>Professional Amount</b><br /><input type="text" class="form-control" id="profAmt" name="profAmt" value="<?php echo $fee1['prof_fee'];?>" ></td>
								      <td><b>Payment Date</b><br /><input type="text" class="form-control" id="upfrontDate" name="upfrontDate" ></td>
								    </tr>
								  </tbody>
								</table>
							</div>
							
						</div>

						<div id="control-monthly" class="radio-control" style="display:none">
							<h6 class="h4-color" style="text-align: center;">CAN-EES - PA (Monthly Installemnt)</h6>
							<div class="col-sm-9" style="margin: 20px auto;">
								<table class="table">
								  <tbody>
									 <tr>
								      <td><b>1<sup>st</sup> Month Retainer Amt</b><br /><input type="text" class="form-control" id="firstMonthAmt" name="firstMonthAmt" value="<?php echo $fee1['firstMonth'];?>" ></td>
								      <td><b>Payment Date</b><br /><input type="text" class="form-control" id="firstMonthDate" name="firstMonthDate" ></td>
									  <td>&nbsp;</td>
								    </tr>
									 <tr>
								      <td><b>2<sup>nd</sup> Month Retainer Amt</b><br /><input type="text" class="form-control" id="secondMonthAmt" name="secondMonthAmt" value="<?php echo $fee1['secondMonth'];?>" ></td>
								      <td><b>Payment Date</b><br /><input type="text" class="form-control" id="secondMonthDate" name="secondMonthDate" ></td>
									 <td>&nbsp;</td>
								    </tr>
									 <tr>
								      <td><b>3<sup>rd</sup> Month Retainer Amt</b><br /><input type="text" class="form-control" id="thirdMonthAmt" name="thirdMonthAmt" value="<?php echo $fee1['thirdMonth'];?>" ></td>
								      <td><b>Payment Date</b><br /><input type="text" class="form-control" id="thirdMonthDate" name="thirdMonthDate" ></td>
 <td><b>3<sup>rd</sup> Month Professional Amt</b><br /><input type="text" class="form-control" id="profMonthAmt" name="profMonthAmt" value="<?php echo $fee1['prof_fee_month'];?>" ></td>
								    </tr>							   
								   
								  </tbody>
								</table>
							</div>
							
						</div>

						<div id="control-stage" class="radio-control"  style="display:none">
							<h6 class="h4-color" style="text-align: center;">CAN-EES - PA (Monthly Installemnt)</h6>
							<div class="col-xs-8 col-sm-8" style="margin: 20px auto;">
								<table class="table">
								<tbody>
									 <tr>
								      <td><b>1<sup>st</sup> Month Retainer Amt</b><br /><input type="text" class="form-control" id="firstStageAmt" name="firstStageAmt" value="<?php echo $fee1['firstStage'];?>" ></td>
								      <td><b>Payment Date</b><br /><input type="text" class="form-control" id="firstStageDate" name="firstStageDate" ></td>
									  <td>&nbsp;</td>
								    </tr>
									 <tr>
								      <td><b>2<sup>nd</sup> Stage Retainer Amt</b><br /><input type="text" class="form-control" id="secondStageAmt" name="secondStageAmt" value="<?php echo $fee1['secondStage'];?>" ></td>
								      <td><b>Payment Date</b><br /><input type="text" class="form-control" id="secondStageDate" name="secondStageDate" ></td>
									 <td>&nbsp;</td>
								    </tr>
									 <tr>
								      <td><b>3<sup>rd</sup> Stage Retainer Amt</b><br /><input type="text" class="form-control" id="thirdStageAmt" name="thirdStageAmt" value="<?php echo $fee1['thirdStage'];?>" ></td>
								      <td><b>Payment Date</b><br /><input type="text" class="form-control" id="thirdStageDate" name="thirdStageDate" ></td>
 <td><b>3<sup>rd</sup> Stage Prof. Amt.</b><br /><input type="text" class="form-control" id="profStageAmt" name="profStageAmt" value="<?php echo $fee1['prof_fee_stage'];?>" ></td>
								    </tr>							   
								   
								  </tbody>
								
								  
								</table>
							</div>
							
						</div>

						
					</div>
				</div>

				<div class="row" id="payment-submit" style="text-align: center; <?php if($hg1['payType']=="") { echo 'display:none';} else {  echo 'display:inline';}?>">	
					<div class="col-sm-12 form-group">
					<input type="submit" name="submit" value="SUBMIT" class="btn btn-info" ></div> 	
				</div>		
			
			</form>
			
			
			
			</div>
		
<?php 	include_once("footer.php");	?>
<script>
$(function(){
$('#upfrontDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
$('#firstMonthDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
$('#secondMonthDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
$('#thirdMonthDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
$('#firstStageDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
$('#secondStageDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
$('#thirdStageDate').datepicker({    format: 'dd-mm-yyyy',	autoclose: true}); 
}); 



$(document).ready(function()
  {


	$('input[type="radio"]').click(function(){
		//alert($(this).attr("value"));
		if ($(this).attr("value") == "Upfront") {
			$("#upfrontDate").prop('required',true); 
			$("#firstMonthDate").prop('required',false); $("#secondMonthDate").prop('required',false); $("#thirdMonthDate").prop('required',false);
			$("#firstStageDate").prop('required',false); $("#secondStageDate").prop('required',false); $("#thirdStageDate").prop('required',false);
			$('#payment-submit').show();
	       $('#control-upfront').show();
	       $('#control-monthly').hide();
	       $('#control-stage').hide();
	    }
	    if ($(this).attr("value") == "Monthly") {
	    	$("#upfrontDate").prop('required',false);
			$("#firstMonthDate").prop('required',true); $("#secondMonthDate").prop('required',true); $("#thirdMonthDate").prop('required',true);
			$("#firstStageDate").prop('required',false); $("#secondStageDate").prop('required',false); $("#thirdStageDate").prop('required',false);
	    	$('#payment-submit').show();
	       $('#control-monthly').show();
	       $('#control-upfront').hide();
	       $('#control-stage').hide();
	    }
	    if ($(this).attr("value") == "Stagewise") {
	    	$("#upfrontDate").prop('required',false);
			$("#firstMonthDate").prop('required',false); $("#secondMonthDate").prop('required',false); $("#thirdMonthDate").prop('required',false);
			$("#firstStageDate").prop('required',true); $("#secondStageDate").prop('required',true); $("#thirdStageDate").prop('required',true);
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
	width: 100%; padding-bottom: 30px; padding-top:30px
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