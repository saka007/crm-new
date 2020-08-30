<?php
include_once("head.php");

?>
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Payment</h1>

          <div class="row">

            <div class="col-lg-12">
            
              <!-- document list -->
              <div class="card shadow mb-4">
              <div class="col-sm-10">
              </br>
              <form action="" method="post" name="paymentForm " enctype="multipart/form-data">
			<input type="hidden" name="lead" value="<?php echo $_GET['lead'];?>" />
		<input type="hidden" id="address" name="address" value="<?php echo $lead1['address'];?>" />
		
				
				<div class="row">
					<div class="col-sm-12 form-group" style="text-align: center;">
						<h4 class="h4-color">CLIENT PAYMENT</h4>
					</div>
					
				</div>
 
				

				<div class="col-sm-12">
							<table class="table">
							<tr>
								<td>Fee Category</td>
								<td><select name="payCategory" class="form-control">
								<option value="Retainer">Full</option>
								<option value="Professional">Part</option>
                                <option value="Professional">Stage-wise</option>
								</select></td>
								
								<td>Payment Mode</td>
								<td><select class="form-control" id="payMethod" name="payMethod" >
								<option value="Cash">Cash</option>
								<option value="Cheque">Cheque</option>
								<option value="DD">DD</option>
								<option value="Net Banking">Net Banking</option>
								<option value="Debit / Credit Card">Debit / Credit Card </option>
								<option value="Website">Website</option>
								</select></td>
							</tr>	
							<tr>
							<td colspan="4" style="padding:0; border:none">
							<table><tr>
								<td>Payment Total</td>
								<td><input type="text" class="form-control" id="payTotal" name="payTotal" value="<?php echo $lead1['payTotal'];?>" readonly=""  ></td>

								<td>Discount</td>
								<td><input type="text" class="form-control" id="payTotal" name="payTotal" value="<?php echo $lead1['discount'];?>" readonly="" ></td>
							
								<td>Payment Balance</td>
								<td><input type="text" class="form-control" id="payBalance" name="payBalance" value="<?php echo $lead1['payBalance'];?>" readonly=""  ></td>
							</tr>
							</table>
							</td>	
							</tr>
							<!-- <tr><td>Select VAT for which country</td>
							<td>
								<select class="form-control" id="Vatvalue" name="Vatvalue" disabled="">
								<option value="0" <?php if ($r =="7"){echo " selected";}?>>QATAR</option>
								<option value="5" <?php if ($r !="6" && $r != "7"){echo " selected";}?>>UAE</option>
								<option value="18" <?php if ($r =="6"){echo " selected";}?>>INDIA</option>
								<option value="0" <?php if ($r =="8"){echo " selected";}?>>OMAN</option>
							</select>
							</td></tr> -->
							
							<tr>
								<td>Pay Amount</td>
								<td><input type="text" class="form-control" id="payAmt" name="payAmt" min="0" max="<?=$lead1['payBalance'];?>" required></td>
							
								<td>VAT</td>
								<td><input type="text" class="form-control" id="taxAmt" name="taxAmt"  readonly="" required></td>
							</tr>	
							<tr>
								<td>Total Pay Amount</td>
								<td><input type="text" class="form-control" id="totPayAmt" name="totPayAmt"  readonly="" required></td>
								<td>Balance Amount</td>
								<td><input type="text" class="form-control" id="totBalance" name="totBalance"  readonly="" required></td>
							</tr>	
							</table>
							<table id="nextTr" class="table">
							<tr>
								<td>Next Pay Amount</td>
								<td><input type="text" class="form-control" id="nextPayAmt" name="nextPayAmt" min="0" max="" ></td>
							
								<td>Next Pay Date</td>
								<td><input type="text" class="form-control" id="nextPayDate" name="nextPayDate" ></td>
							</tr>	
							<tr>
								<td>Remark</td>
								<td colspan="3"><textarea type="text" class="form-control" id="demdRemark" name="demdRemark" ></textarea></td>

							</tr>
							</table>
							</div>

					<div class="col-sm-12 form-group">
					<input type="submit" name="submit" value="SUBMIT" class="btn btn-info" >
					</div> 	
			</form>

              </div>
                </div>
                </div>
              </div>

            </div>

          </div>


      <!-- End of Main Content -->
      <?php include_once('foot.php'); ?>