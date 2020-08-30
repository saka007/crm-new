<?php $y=basename($_SERVER['PHP_SELF']);

$not=$obj->display('dm_lead','assignTo='.$_SESSION['ID'].' and notf=0');
?>
<style>
.notf {
	background: #f00;
	color: #fff;
	width: 25px;
	height: 25px;
	border-radius: 15px;
	padding: 1px; 
	float:right;
}

.dropbtn {
  background-color: #28a74594;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}

</style>
<ul class="sidemenu">

<?php if($_SESSION["TYPE"]=="SA") { ?>
			<li><a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Admin management</a>
			<ul id="collapseOne" class="collapse <?php if($y=='region_list.php' || $y=='branch_list.php' || $y=='department_list.php' || $y=='role_list.php' || $y=='employe_list.php' || $y=='service_list.php' || $y=='source_list.php' || $y=='country_list.php' || $y=='fee_list.php' || $y=='observation_file_list.php' || $y=='contract_file_list.php' || $y=='fee_list.php') { echo 'show';}?>" >
     		<li><a href="region_list.php"  style="border:#ff0">Region Management</a></li>
     		<li><a href="branch_list.php"  style="border:#ff0">Branch Management</a></li>
     		<li><a href="department_list.php"  style="border:#ff0">Department Management</a></li>
     		<li><a href="role_list.php"  style="border:#ff0">Role Management</a></li>
     		<li><a href="service_list.php"  style="border:#ff0">Program Management</a></li>
     		<li><a href="source_list.php"  style="border:#ff0">Source Management</a></li>
      		<li><a href="employe_list.php"  style="border:#ff0">Employee Management</a></li>
     		<li><a href="country_list.php"  style="border:#ff0">Country Management</a></li>
     		<li><a href="enquiry_list.php"  style="border:#ff0">Enquiry Management</a></li>
     		<li><a href="fee_list.php"  style="border:#ff0">Fee Management</a></li>
     		<li><a href="observation_file_list.php"  style="border:#ff0">Upload Observation Sheet</a></li>
     		<li><a href="contract_file_list.php"  style="border:#ff0">Upload Agreement </a></li>
     		<li><a href="leave_type_list.php"  style="border:#ff0">Leave Type Management </a></li>
			</ul>
			</li>
<?php } ?>		

<li><a href="#" data-toggle="collapse" data-target="#collapse12" aria-expanded="true" aria-controls="collapse12">Messenger</a>
				<ul id="collapse12">
				<li><div class="dropdown"><button class="messg" style="border:#ff0">Messages <span id="mmcount"></span> 
				<!-- <div class="dropdown-content" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<a class="dropdown-item" href="#">Something else here</a> -->
				<!-- </div> -->
				</div>
				</button></li>
				</ul>
				</li>
	
<?php if($_SESSION["TYPE"]!="OB" && $_SESSION["TYPE"]!="LLB" && $_SESSION["TYPE"]!="AC" && $_SESSION["TYPE"]!="FO" && $_SESSION["TYPE"]!="HR") { ?>
			<li>
			<a href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Lead management</a>
			<ul id="collapseTwo" class="collapse <?php if($y=='lead_management.php' || $y=='lead_view_management.php' || $y=='lead_search_management.php' || $y=='lead_appointment.php' || $y=='lead_search_appointment.php' || $y=='lead_assesment_form.php' || $y=='lead_edit.php' || $y=='lead_assesment_edit.php' || $y=='lead_assesment_view.php' || $y=='lead_view.php' || $y=='lead_observation_sheet.php' || $y=='lead_payment_options.php' || $y=='lead_agree_upload_list.php' || $y=='lead_payment.php' || $y=='lead_payment_invoice.php' || $y=='lead_appointment_edit.php' || $y=='lead_followup.php' || $y=='lead_followup_edit.php') { echo 'show';}?>" >

     		<li><a href="lead_management.php"  style="border:#ff0">Add Lead</a></li>
			<li><a href="lead_search_management.php"  style="border:#ff0">View Lead <?php if($not->num_rows > 0) {?><span class="notf"><?=$not->num_rows?></span><?php } ?></a></li>
			<li><a href="search_lead.php"  style="border:#ff0">Search Lead</a></li>

<?php if($_SESSION['TYPE']!="GT") {?>
     		<li><a href="lead_appointment_new.php"  style="border:#ff0">Appointments</a></li>
     		<li><a href="lead_followup.php"  style="border:#ff0">Follow Up</a></li>
     		<!-- <li><a href="lead_agree_upload_list.php"  style="border:#ff0">Upload Agreement</a></li> -->
			 <li><a href="lead_agree_upload_list_new.php"  style="border:#ff0">Upload Agreement New</a></li>
               <?php if($_SESSION['TYPE']=="RT" || $_SESSION['TYPE']=="SA") {?>
               <li><a href="gary_contract_list.php"  style="border:#ff0">Upload Agreement (gary)</a></li>
          <?php } ?>
     		<li><a href="lead_search_appointment.php"  style="border:#ff0">Search Appointments</a></li>
<?php } ?>			
			</ul>
			</li>
			
<?php }  if($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="AC" || $_SESSION['TYPE']=="DGM" || $_SESSION['TYPE']=="FMP" || $_SESSION['TYPE']=="FO") {?> 			<li>
			<a href="#" data-toggle="collapse" data-target="#collapse12" aria-expanded="true" aria-controls="collapseFour">Finance management</a>
			<ul id="collapse12" class="collapse <?php if($y=='report_balancepay.php' || $y=='report_discount.php' || $y=='report_sales.php' || $y=='report_cancel_receipt.php' || $y=='expense_list.php') { echo 'show';}?>" >
     		<li><a href="report_sales.php"  style="border:#ff0">Total Sales</a></li>
     		<li><a href="report_balancepay.php"  style="border:#ff0">Balance Payment</a></li>
     		<li><a href="report_discount.php"  style="border:#ff0">Monthly Discount</a></li>
     		<li><a href="report_cancel_receipt.php"  style="border:#ff0">Canceled Receipt</a></li>
<?php if($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="FO" || $_SESSION['TYPE']=="AC" ) {?>
     		<li><a href="expense_list.php"  style="border:#ff0">Expense Details </a></li>
<?php } ?>			
			</ul>
			</li>
<?php } if($_SESSION['TYPE']!="GT"  && $_SESSION['TYPE']!="FO" && $_SESSION["TYPE"]!="OB" && $_SESSION["TYPE"]!="LLB") {?>
			<li>
			<a href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">Operation management</a>
			<ul id="collapseFour" class="collapse <?php if($y=='operation_management.php' || $y=='client_assigned.php' || $y=='lead_receipts.php' || $y=='ops_skill_australia.php' || $y=='ops_skill_canada.php') { echo 'show';}?>" >
			<li><a href="add_prospect.php"  style="border:#ff0">Add Prospects</a></li>
			 <li><a href="operation_management.php"  style="border:#ff0">View Clients</a></li>
			 <li><a href="view_clients.php"  style="border:#ff0">View all Clients</a></li>
			 <li><a href="view_old_clients.php"  style="border:#ff0">View Old Clients</a></li>
			 <li><a href="lead_agree_upload_list_old.php"  style="border:#ff0">Upload for Old Clients</a></li>
<?php if($_SESSION['TYPE']=="AOM" || $_SESSION['TYPE']=="CPM" || $_SESSION['TYPE']=="CPO" || $_SESSION['TYPE']=="MBI" || $_SESSION['TYPE']=="OC" || $_SESSION['TYPE']=="OM" || $_SESSION['TYPE']=="PDC" || $_SESSION['TYPE']=="SCPO" || $_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RMO") {?>
     		<li><a href="client_assigned.php"  style="border:#ff0">Assigned Clients</a></li>
          <?php  if($_SESSION['TYPE']=="SA"  || $_SESSION['TYPE']=="RMO" || $_SESSION["ID"]=="70") {?>
     		<li><a href="old_data_1.php"  style="border:#ff0">Old Data 1</a></li>
          <?php } ?>
               <?php if($_SESSION['TYPE']=="RMO" || $_SESSION['TYPE']=="SA"){?> 
               <li><a href="report_files.php"  style="border:#ff0">Report files</a></li>
			   <li><a href="operation_report.php"  style="border:#ff0">Operation Report</a></li>
			   <li><a href="aus_ops_report.php"  style="border:#ff0">Oz ops Report</a></li>
<?php }} ?>			
			</ul>
			</li>
<?php }  if($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="DGM" || $_SESSION['TYPE']=="FMP" || $_SESSION['TYPE']=="HR") {?>
			<li>
			<a href="#" data-toggle="collapse" data-target="#collapse8" aria-expanded="true" aria-controls="collapse8">Hr management</a>
				<ul id="collapse8" class="collapse <?php if($y=='employe_list.php') { echo 'show';}?>" >
					<li><a href="employe_list.php"  style="border:#ff0">Employee Management</a></li>
					<li><a href="employe_leave_list.php"  style="border:#ff0">Employee Leaves</a></li>
				</ul>
			</li>
			
<?php } if($_SESSION['TYPE']!="GT" && $_SESSION["TYPE"]!="OB" && $_SESSION["TYPE"]!="LLB") {?>
			<li><a href="#" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">Assigned Task</a>
			<ul id="collapseSix" class="collapse <?php if($y=='task_list.php') { echo 'show';}?>" >
     		<li><a href="task_list.php"  style="border:#ff0">New Task</a></li>
			</ul>
			</li>
<?php } 
if($_SESSION['TYPE']!="GT" && $_SESSION["TYPE"]!="LLB") {?>
			<li><a href="#" data-toggle="collapse" data-target="#collapse9" aria-expanded="true" aria-controls="collapse9">Leave History</a>
			<ul id="collapse9" class="collapse <?php if($y=='task_list.php') { echo 'show';}?>" >
     		<li><a href="leave_list.php"  style="border:#ff0">Leave Details</a></li>
			</ul>
			</li>
<?php } 

if($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RMSM" || $_SESSION['TYPE']=="DGM" || $_SESSION['TYPE']=="FMP" || $_SESSION['TYPE']=="BM" || $_SESSION['TYPE']=="ABM" || $_SESSION['TYPE']=="RMO" || $_SESSION['TYPE']=="RMU" || $_SESSION['TYPE']=="RT") {?>
			<li><a href="#" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">Reports</a>
			<ul id="collapseSeven" class="collapse <?php if($y=='report_appointment.php' || $y=='report_followup.php' || $y=='report_balancepay.php' || $y=='report_lead.php' || $y=='report_client.php' || $y=='report_sales.php' || $y=='report_eca_pending.php' || $y=='report_ees_pending.php' || $y=='report_ita_pending.php' || $y=='report_pnp_pending.php' || $y=='report_client_status.php') { echo 'show';}?>">

<?php if($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RMSM"  || $_SESSION['TYPE']=="DGM" || $_SESSION['TYPE']=="FMP" || $_SESSION['TYPE']=="BM" || $_SESSION['TYPE']=="ABM" || $_SESSION['TYPE']=="RMO" || $_SESSION['TYPE']=="RMU") {?>
     		<li><a href="report_appointment.php"  style="border:#ff0">Appointments</a></li>
			 <li><a href="report_moksh.php"  style="border:#ff0">Moksh</a></li>
     		<li><a href="report_followup.php"  style="border:#ff0">Follow Up</a></li>
               <?php if($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RMSM"  || $_SESSION['TYPE']=="DGM" || $_SESSION['TYPE']=="FMP" || $_SESSION['TYPE']=="BM" || $_SESSION['TYPE']=="RMO" || $_SESSION['TYPE']=="RMU") {?>
     		<li><a href="report_sales.php"  style="border:#ff0">Total Sales</a></li>
     		<li><a href="report_balancepay.php"  style="border:#ff0">Balance Payment</a></li>
     		<li><a href="report_discount.php"  style="border:#ff0">Monthly Discount</a></li>
     		<li><a href="report_client_status.php"  style="border:#ff0">Client Status</a></li>
          <?php }?>
<?php } if($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RMSM"  || $_SESSION['TYPE']=="DGM" || $_SESSION['TYPE']=="FMP" || $_SESSION['TYPE']=="RT" || $_SESSION['TYPE']=="ABM" || $_SESSION['TYPE']=="BM") {
	?>
     		<li><a href="report_expense.php"  style="border:#ff0">Expense</a></li>
			 <?php if($_SESSION['ID']!=41 && $_SESSION['ID']!=14 && $_SESSION['ID']!=30 && $_SESSION['ID']!=67 && $_SESSION['ID']!=85 && $_SESSION['ID']!=92) { ?>
			 <li><a href="report_lead.php"  style="border:#ff0">Total Lead</a></li>
			 <?php } ?>
               <li><a href="report_contracts.php"  style="border:#ff0">Contracts</a></li>
			   <li><a href="appointment_report.php"  style="border:#ff0">Appointments New</a></li>
               <li><a href="daily_lead.php"  style="border:#ff0">Daily Lead</a></li>
			   <li><a href="Cold_calling_report.php"  style="border:#ff0">Cold calling Report</a></li>
				 <?php } if($_SESSION['TYPE']=="SA") {?>
     		<li><a href="report_client.php"  style="border:#ff0">Total Client</a></li>
     		<li><a href="report_eca_pending.php"  style="border:#ff0">Total ECA Pending</a></li>
     		<li><a href="report_ees_pending.php"  style="border:#ff0">Total EES Pending</a></li>
     		<li><a href="report_ita_pending.php"  style="border:#ff0">Total ITA Pending</a></li>
     		<li><a href="report_pnp_pending.php"  style="border:#ff0">Total PNP Pending</a></li>
<?php }?>			
			
			</ul>			
			</li>
<?php } 
if($_SESSION["TYPE"]=="SA") {?>
			<li><a href="#" data-toggle="collapse" data-target="#collapse10" aria-expanded="true" aria-controls="collapse10">Old Data</a>
			<ul id="collapse10" class="collapse <?php if($y=='upload_old_data.php') { echo 'show';}?>" >
     		<li><a href="upload_old_data.php"  style="border:#ff0">Upload Data</a></li>
     		<li><a href="old_crm_canada.php"  style="border:#ff0">Old CRM Canada</a></li>
     		<li><a href="old_crm_australia.php"  style="border:#ff0">Old CRM Australia</a></li>
     		<li><a href="old_crm_poland.php"  style="border:#ff0">Old CRM Poland</a></li>
     		<li><a href="old_crm_others.php"  style="border:#ff0">Old CRM Others</a></li>
			</ul>
			</li>
<?php }


/*if($_SESSION['TYPE']!="RT" && $_SESSION['TYPE']!="OB" && $_SESSION['TYPE']!="TC" && $_SESSION['TYPE']!="GT") {?>
			<li><a href="#" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">Reports</a>
			<ul id="collapseSeven" class="collapse <?php if($y=='report_appointment.php' || $y=='report_followup.php' || $y=='report_balancepay.php' || $y=='report_lead.php' || $y=='report_client.php' || $y=='report_sales.php' || $y=='report_eca_pending.php' || $y=='report_ees_pending.php' || $y=='report_ita_pending.php' || $y=='report_pnp_pending.php' || $y=='report_client_status.php') { echo 'show';}?>" >

<?php if($_SESSION['TYPE']=="IC" || $_SESSION['TYPE']=="SIC"  || $_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RM"  || $_SESSION['TYPE']=="BM" || $_SESSION['TYPE']=="DGM") {?>
     		<li><a href="report_appointment.php"  style="border:#ff0">Appointments</a></li>
     		<li><a href="report_followup.php"  style="border:#ff0">Follow Up</a></li>
     		<li><a href="report_balancepay.php"  style="border:#ff0">Balance Payment</a></li>
     		<li><a href="report_lead.php"  style="border:#ff0">Total Lead</a></li>
<?php } if($_SESSION['TYPE']=="IC" || $_SESSION['TYPE']=="SIC" || $_SESSION['TYPE']=="CPO" || $_SESSION['TYPE']=="SCPO" || $_SESSION['TYPE']=="OM" || $_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RM" ||$_SESSION['TYPE']=="BM" || $_SESSION['TYPE']=="RMSM" || $_SESSION['TYPE']=="DGM") {?>
     		<li><a href="report_client.php"  style="border:#ff0">Total Client</a></li>
<?php } if($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RM" || $_SESSION['TYPE']=="BM" || $_SESSION['TYPE']=="DGM") {?>
     		<li><a href="report_sales.php"  style="border:#ff0">Total Sales</a></li>
<?php } if($_SESSION['TYPE']=="CPO" || $_SESSION['TYPE']=="SCPO" || $_SESSION['TYPE']=="OM" ||  $_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RM" || $_SESSION['TYPE']=="BM" || $_SESSION['TYPE']=="DGM") {?>
     		<li><a href="report_eca_pending.php"  style="border:#ff0">Total ECA Pending</a></li>
     		<li><a href="report_ees_pending.php"  style="border:#ff0">Total EES Pending</a></li>
<?php }  if($_SESSION['TYPE']=="OM" || $_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RM" || $_SESSION['TYPE']=="BM" || $_SESSION['TYPE']=="DGM") {?>
     		<li><a href="report_ita_pending.php"  style="border:#ff0">Total ITA Pending</a></li>
     		<li><a href="report_pnp_pending.php"  style="border:#ff0">Total PNP Pending</a></li>
     		<li><a href="report_client_status.php"  style="border:#ff0">Client Status</a></li>
<?php } if($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="RM" || $_SESSION['TYPE']=="BM" || $_SESSION['TYPE']=="DGM") {?>
     		<li><a href="report_discount.php"  style="border:#ff0">Monthly Discount</a></li>
<?php } ?>
			</ul>			
			</li>
<?php } ?>*/			
?>
<!-- Lawyer Menu -->
<?php if($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="LLB"){ ?>
<li><a href="#" data-toggle="collapse" data-target="#collapse11" aria-expanded="true" aria-controls="collapse11">Contract Management</a>
               <ul id="collapse11" class="collapse <?php if($y=='lawyer_contract_list.php') { echo 'show';}?>" >
               <li><a href="view_prospects.php"  style="border:#ff0">View Prospects</a></li>
			   <li><a href="lawyer_contract_list.php"  style="border:#ff0">Contracts</a></li>
               <li><a href="report_contractsg.php"  style="border:#ff0">Report</a></li>
               </ul>
               </li>
			   <?php } ?>
<!-- END -->

<!-- IELTS Menu -->
<?php if($_SESSION['TYPE']=="SA" || $_SESSION['TYPE']=="ILS"){ ?>
<li><a href="#" data-toggle="collapse" data-target="#collapse13" aria-expanded="true" aria-controls="collapse11">IELTS</a>
               <ul id="collapse13" class="collapse <?php if($y=='schedule.php') { echo 'show';}?>" >
               <li><a href="schedule.php"  style="border:#ff0">Schedule Session</a></li>
			   <li><a href="add_sess.php"  style="border:#ff0">Add Session data</a></li>
			   <li><a href="ielts_report.php"  style="border:#ff0">Reports</a></li>
               </ul>
               </li>
			   <?php } ?>
<!-- END -->

</ul>





<!-- Messages Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog modal-sm">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Message's</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">

</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

<!-- end of Modal -->