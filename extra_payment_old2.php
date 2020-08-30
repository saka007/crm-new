<?php 
include_once("header.php");	
$rows=$obj->display('old_data_2','agreeNo="'.$_GET['agreement'].'"');
$row=$rows->fetch_array();


if(isset($_GET['delete'])==1&&isset($_GET['receipt'])!="" && isset($_GET['agreement'])!="")
{

	$obj->delete('dm_3party_payment_old','id='.$_GET['receipt']);

header("location:extra_payment_old.php?agreement=".$_GET['agreement']);

}

?>

<style>
.height {
    min-height: 150px;
}
.icon {
    font-size: 47px;
    color: #5CB85C;
}
.iconbig {
    font-size: 77px;
    color: #5CB85C;
}
.table > tbody > tr > .emptyrow {
    border-top: none;
}
.table > thead > tr > .emptyrow {
    border-bottom: none;
}
.table > tbody > tr > .highrow {
   border-top: 3px solid;
}
</style>
		<div class="col-sm-10" >
			
				
					<div class="col-sm-12 form-group" >
						<h4 class="mb-3" style="color:#2cb674;"> THIRD PARTY PAYMENT</h4>
					</div>
			<div class="row" style="justify-content: center;">
				<div class="col-sm-9" >
					<input type="hidden" id="agreeNo" value="<?php echo $_GET['agreement'];?>" />
					<div class="form-row">
						<div class="col-sm-4 form-group">
							Particular
							<select class="form-control" id="particular" name="particular" >
								<option value="Re-Launching Application">Re-Launching Application</option>
								<option value="Government Fees">Government Fees</option>
								</select>
						</div>
						<div class="col-sm-4 form-group">
							Amount
							<input type="text" required class="form-control" id="amount" name="amount" >
						</div>
						<div class="col-sm-4 form-group">
							Payment Mode
							<select class="form-control" id="payMethod" name="payMethod" >
								<option value="Cash">Cash</option>
								<option value="Debit/Credit Card">Debit/Credit Card</option>
								<option value="Cheque">Cheque</option>
								<option value="DD">DD</option>
								<option value="Net Banking">Net Banking</option>
								<option value="Website">Website</option>
								</select>
						</div>
					</div>
					<div class="form-group" align="right">
							<button  class="btn btn-info" onclick="submitExtraPayment()">Submit</button>
						
					</div> 
				</div>	
			</div>
			
<hr />
<h4 class="mb-3" style="color:#2cb674;">Agreement No <?php echo $_GET['agreement'];?><br/> RECEIPT OF THIRD PARTY PAYMENT </h4>
<table class="table table-striped table-bordered" id="extra-payment-table" style="width:100%">
			  <thead>

			    <tr>
			      <th>No</th>
			      <th>Receipt No.</th>
			      <th>Date</th>
			      <th>Particular</th>
			      <th>Amount</th>
			      <th>Action</th>
			    </tr>

			  </thead>
			  <tbody>
			  <?php 
			  $i = 1;
			  $rece=$obj->display('dm_3party_payment_old','agreeNo="'.$_GET['agreement'].'"');
			  while($rece1=$rece->fetch_array())
			  {
			  ?>
			  <tr>
		    	<td><?php echo $i; ?></td>
				<td><?php echo $rece1['id'];?></td>
				<td><?php echo date('d-m-Y',strtotime($rece1['date']));?></td>
				<td><?php echo $rece1['particular'];?></td>
				<td><?php echo $rece1['amount'];?></td>
				<td>
	 				<a href="extra_payment_old.php?delete=1&&agreement=<?=$_GET['agreement'];?>&receipt=<?=$rece1['id']?>" class="btnDeleteAction"><i class="fa fa-trash" title="CANCEL BILL"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 				<a href="#" onclick="openPrintModel('<?=$rece1['id']?>') " class="btnDeleteAction"><i class="fa fa-print" title="PRINT"></i></a> 
				
				</td>
				</tr>
			 <?php $i++;} ?>
			 
			  </tbody>

			</table>			
			
			</div>
<?php 	include_once("footer.php");	?>
<div id="print-model" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      	<h6 class="modal-title">Invoice</h6>
        <button type="button" class="close" data-dismiss="modal">&times;</button> 
      </div>
      <div class="modal-body">
      	<div class="col-sm-6 text-sm-left"><a href="#" onclick="javascript:printPage(print);" class="btn btn-info">Print Receipt</a></div>
        <div class="line" id="line"  >
        	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" type="text/css" media="Print" />
			<link rel="stylesheet" href="css/main.css" type="text/css" />
        	<style>
				
			.height {
			    min-height: 150px;
			}
			.icon {
			    font-size: 47px;
			    color: #5CB85C;
			}
			.iconbig {
			    font-size: 77px;
			    color: #5CB85C;
			}
			.table > tbody > tr > .emptyrow {
			    border-top: none;
			}
			.table > thead > tr > .emptyrow {
			    border-bottom: none;
			}
			.table > tbody > tr > .highrow {
			   border-top: 3px solid;
			}
			</style>
			<div class="row">
			    <div class="col-12">
					<div class="text-center text-sm-center" style="text-align:center">
		                <img src="images/logo.png" alt="IMG" style="height:75px;">
			        </div>
					<div class="text-right text-sm-right">
			            <h5><label>Date : </label> <span id="invoice-date"></span></h5>
			            <h5><label>Receipt No : </label> #_<span id="invoice-id"></span></h5>
			            <h5><label>Tax Invoice : </label> TRN: 100434250500003</h5>
					</div>
			            <hr>
			        <div class="row" style="margin-bottom: 15px;">
		                <div class="col-12 col-md-12 col-lg-12 float-left">
		                    <div class="card  height">
		                        <div class="card-header">From </div>
		                        <div class="card-block" style="margin: 0 10px;">
		                            <strong><?php echo $row['client_name']; ?></strong>
	                        	</div>
		                    </div>
							<p>Fee once paid is non-refundable.<br />The amount is paid for the payment due against service retain.<br />All payment is subject to realization.</p>
		                </div>
			        </div>
			    </div>
			</div>
				
			    <div class="row">
			        <div class="col-md-12">


			            <div class="card " style="margin-top:20px;">
			                <div class="card-header">
			                    <h5 class="text-center"><strong>Payment Details</strong></h5>
			                </div>
			                <div class="card-block">
			                    <div class="table-responsive">
			                        <table class="table table-sm" style="width:100%;">
			                            <thead>
		                                <tr>
		                                    <td colspan="2"><strong>Particular</strong></td>
		                                    <td><strong>Tax</strong></td>
			                                <td style="text-align:center"><strong>Amount</strong></td>
			                            </tr>
			                            </thead>
			                            <tbody>
											<tr>
											<td colspan="2"><span id="invoice-particular"></span></td>
											<td><span id="invoice-tax"> </td>
											<td style="text-align:right"><span id="invoice-amount"></span></td>
											</tr>
											<tr>
											<td class="highrow">Mode of Payment</td>
											<td class="highrow"><strong><span id="invoice-method"></span><strong></td>
											<td class="highrow">Total Amount Payable</td>
											<td class="highrow" style="text-align:right"><span id="invoice-total"></span></td>
											</tr>
			                            </tbody>
			                        </table>
			                    </div>
			                </div>
			            </div>
				
						
			        </div>
			    </div>
			</div>
      </div>
    </div>

  </div>
</div>
<script>

t=$('#extra-payment-table').DataTable({
		responsive: true
	})
var current_id=0;
var currentTime = new Date()
var month = currentTime.getMonth() + 1
var day = currentTime.getDate()
var year = currentTime.getFullYear()
var today=month + "/" + day + "/" + year;
function submitExtraPayment() {
var data={};
	data.agreeNo=$("#agreeNo").val();
	data.particular=$("#particular").val();
	data.amount=$("#amount").val();
	data.payMethod=$("#payMethod").val();
$.ajax({
		url: "process/extra_payment_process.php",
		type: "POST",
		data:data,
		success:function(id){
			console.log(id);
			current_id=id;
 t.row.add( [
            '*',
            id,
            today,
            data.particular,
            data.amount,
            '<a href="extra_payment_old.php?delete=1&&agreement='+data.agreeNo+'&receipt='+id+'" class="btnDeleteAction"><i class="fa fa-trash" title="CANCEL BILL"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"  onclick="openPrintModel('+id+')" class="btnDeleteAction"><i class="fa fa-print" title="PRINT"></i></a>' 
        ] ).draw( false );
 			openPrintModel(id);
		},error: function (jqXHR, exception) {
        
        var msg = 'Uncaught Error.\n' + jqXHR.responseText;
        
        console.log(msg);
    }
	});

}
function openPrintModel(id) {
	if(id==current_id){
		amount=parseFloat($("#amount").val());
		tax=0;
		if($("#particular").val()=="Re-Launching Application"){
			tax=amount*0.05
		}
		total=parseFloat(amount)+parseFloat(tax);
		$("#invoice-date").text(today);
		$("#invoice-id").text(id);
		$("#invoice-particular").text($("#particular").val());
		$("#invoice-amount").text(amount);
		$("#invoice-tax").text(tax);
		$("#invoice-method").text($("#payMethod").val());
		$("#invoice-total").text(total);
	}
	else{
		var data={};
		data.id=id;
		$.ajax({
		url: "process/get_epayment_process.php",
		type: "POST",
		data:data,
		success:function(result){
			console.log(result);
			result=JSON.parse(result);
			amount=parseFloat(result.amount);
			tax=0;
			if(result.particular=="Re-Launching Application"){
				tax=amount*0.05;
			}
			total=parseFloat(amount)+parseFloat(tax);
			$("#invoice-date").text(result.date);
			$("#invoice-id").text(id);
			$("#invoice-particular").text(result.particular);
			$("#invoice-amount").text(amount.toFixed(2));
			$("#invoice-tax").text(tax);
			$("#invoice-method").text(result.payMethod);
			$("#invoice-total").text(total);
		}});
	}
	$("#print-model").modal("show");
}
function printPage(id) {
    var html="<html>";
	html+= document.getElementById('line').innerHTML;
    html+="</html>";
    var printWin = window.open('','','left=0,top=0,toolbar=0,scrollbars=0,status =0');
    printWin.document.write(html);
    printWin.document.close();
    printWin.focus();
    printWin.print();
    printWin.close();
}
</script>



