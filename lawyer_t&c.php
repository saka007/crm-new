<?php include_once("include/config.php");	
  require_once("mpdf/autoload.php");
$b_name="";
$b_address="";
$b_email="";
$b_mobile="";
$b_website="";
$r_name="";
if(isset($_GET['lead'])){
	$lead=$obj->display3('select l.*,f.*,b.name b_name,b.address b_address,b.email b_email,
		b.mobile b_mobile,b.website b_website,r.name r_name,
		a.bank_name,a.bank_address,a.bank_beneficiary,a.account_no,a.iban,cp.name country,dc.id agreementNo
		from dm_lead l left join dm_fee f on f.service=l.service_interest 
		and f.country=l.country_interest left join dm_branch b on b.id=l.branch 
		left join dm_region r on r.id=l.region left join dm_accounts a on b.id=a.branch_id join dm_country_proces cp on cp.id=l.country_interest left join dm_lead_contract dc on dc.leadid=l.id where l.id='.$_GET['lead']);

  $lead1=$lead->fetch_array();
  $prog=$obj->display('dm_service','id='.$lead1['service_interest']);
  $prog1=$prog->fetch_assoc();
  $type=1;
 if(strpos($prog1['name'],'Visit')!==false){
    $type=2;
  }
  else if(strpos($prog1['name'],'Student')!==false){
    $type=3;
  }
 else if(strpos($prog1['name'],'Post Skill Assessment')!==false){
    $type=4;
  }
  else if(strpos($prog1['name'],'Skill Assessment')!==false){
    $type=5;
  }
  else if(strpos($prog1['name'],'Post ECA- Single')!==false || strpos($prog1['name'],'Post ECA - PA & Spouse')!==false){
    $type=7;
  }
  else if(strpos($prog1['name'],'ECA - Single')!==false || strpos($prog1['name'],'ECA - PA & Spouse')!==false){
    $type=6;
  }
  else if(strpos($prog1['name'],'PNP')!==false ){
    $type=8;
  }
  else if(strpos($prog1['name'],'Dependent Visa')!==false ){
    $type=9;
  }
	$country=ucwords(strtolower($lead1['country']));
	$b_name=ucwords(strtolower($lead1['b_name']));
	$b_av=($lead1['branch']=="4"?"DIS":"DM");
$b_address=$lead1['b_address'];
$b_email=$lead1['b_email'];
$b_mobile=$lead1['b_mobile'];
$b_website=$lead1['b_website'];
$r_name=$lead1['r_name'];
switch ($lead1['region']) {
  case 3:
    $b_country="UAE";
    $b_av="DIS";
    $vat="VAT";
    $curr="(AED)";
    $cq=100;
    $lfee="$ 1600";
    $ecaf="3000 AED";
    $amt="500 AED";
    $rel=1500;
    $b_city=ucwords(strtolower($lead1['r_name']));
    break;
  case 4:
    $b_country="UAE";
    $curr="(AED)";
    $b_av="DMC";
    $cq=100;
    $vat="VAT";
    $lfee="$ 1600";
    $ecaf="3000 AED";
    $rel=1500;
    $amt="500 AED";
    $b_city=ucwords(strtolower($lead1['r_name']));
    break;
    case 5:
    $b_country="UAE";
    $curr="(AED)";
    $b_av="DMC";
    $cq=100;
    $vat="VAT";
    $lfee="$ 1600";
    $ecaf="3000 AED";
    $rel=1500;
    $amt="500 AED";
    $b_city=ucwords(strtolower($lead1['r_name']));
    break;
    case 6:
    $b_country="India";
    $curr="(INR)";
    $b_av="DMC";
    $ecaf="10000 INR";
    $cq=1000;
    $vat="GST";
    $amt="5000 INR";
    $rel=15000;
    $lfee="$ 704";
    $b_city=ucwords(strtolower($lead1['r_name']));
    break;
    case 7:
    $b_country=ucwords(strtolower($lead1['r_name']));
    $curr="(QAR)";
    $b_av="DMC";
    $b_city="Doha";
    $ecaf="3000 QAR";
    $amt="500 QAR";
    $cq=100;
    $rel=1500;
    $lfee="$ 1600";
    break;
    case 8:
    $b_country=ucwords(strtolower($lead1['r_name']));
    $curr="(OMR)";
    $b_av="DMC";
    $b_city="Muscat";
    $amt="50 OMR";
    $ecaf="350 OMR";
    $cq=10;
    $rel=150;
    $lfee="$ 1600";
    break;
    case 9:
    $b_country=ucwords(strtolower($lead1['r_name']));
    $curr="(KWD)";
    $b_av="DMMC";
    $b_city="Kuwait City";
    $lfee="$ 1600";
    $ecaf="350 KWD";
    $cq=10;
    $rel=150;
    $amt="50 KWD";
    break;
    case 10:
    $b_country="India";
    $curr="(INR)";
    $b_av="DMC";
    $vat="GST";
    $ecaf="10000 INR";
    $cq=1000;
    $lfee="$ 704";
    $rel=15000;
    $amt="5000 INR";
    $b_city=ucwords(strtolower($lead1['r_name']));
    break;
  default:
    $b_country="UAE";
    $b_city=ucwords(strtolower($lead1['r_name']));
    break;
}
}
$header_text="<div style='width:100%;' align='center'><img src='images/logo.png' width='127'></div>";
$footer_text="<br/>Signature: ___________________<br/><br/><div align='center'>".$b_name." | ".trim(preg_replace('/\s\s+/', ' ', $b_address))." | ".$b_mobile." | ".$b_email."</div>";
$page_height=980;

?>
 
<style type="text/css">
	span.cls_003{font-family:"Calibri Bold",serif;font-size: 12.5px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_003{font-family:"Calibri Bold",serif;font-size: 12.5px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none;padding: 10px 0px;}
span.cls_014{font-family:"Calibri Bold",serif;font-size: 12.5px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: underline}
div.cls_014{font-family:"Calibri Bold",serif;font-size: 12.5px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none;padding: 10px 0px;}
span.cls_002{font-family:"Calibri",serif;font-size: 12.5px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_002{font-family:"Calibri",serif;font-size: 12.5px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}

.fees-table {
  border-collapse: collapse;
  width: 100%;
      font-family: "Calibri Bold",serif;
    font-size:  12.5px;
}

.fees-table th, td {
  text-align: left;
  padding: 3px;
}

.fees-table tr:nth-child(even){background-color: #f2f2f2;}


.fees-table tr th {
  background-color: #4CAF50;
  color: white;
}

.front-page-table{
  border-collapse: collapse;
  width: 60%;
  font-family: "Calibri Bold",serif;
  font-size:  12.5px;
  font-weight:bold;
  margin-top: 25px;
}

.page{
	padding: 25px 
}
ol{    font-family: "Calibri",serif;
    font-size: 12.5px;
    color: rgb(0,0,0);
    font-weight: normal;
    font-style: normal;
    text-decoration: none;
    padding-left: 50px;
}
ol>li{
	list-style-type:   lower-alpha;
}
ol>li ul>li,.cls_002 ul>li{
	list-style-type:   disc;
}
.cls_002 ul{
  padding-left: 38px;
}
ol li ol li{
	list-style-type:   lower-roman;
}
* {transition: none !important}

</style>

<div class="col-sm-10">
<div class="container">
<div class="row">
			<div class="col-sm-6">
				<h4 class="mb-3" style="color:#2cb674;">Lawyer Agreements</h4>
			</div>
      <div class="col-sm-<?php echo ($lead1["country_interest"]==2?'2':'6')?>" align="right">
		<form action="process/pdf process.php" target="_blank" id="text_form" method="POST">
      <input type="hidden" name="html_text">
      <input type="hidden" name="legal_text">
      <input type="hidden" name="b_name" value="<?php echo $b_name?>">
      <input type="hidden" name="b_address" value="<?php echo  htmlentities($b_address);?>">
      <input type="hidden" name="b_mobile" value="<?php echo $b_mobile?>">
      <input type="hidden" name="b_email" value="<?php echo $b_email?>">
      <!-- <button type="submit" class="btn btn-info">Print Agreement</button> -->
    </form>
  </div>
  <?php if($lead1["country_interest"]==2){?>
  <div class="col-sm-2" >
    <form action="process/pdf process legal.php" target="_blank" id="legal_form" method="POST">
      <input type="hidden" name="legal_text">
      <!-- <button type="submit" class="btn btn-info">Legal Agreement</button> -->
    </form>
  </div>
  
  <div class="col-sm-2" >
      <!-- <a href="uploads/documents/Representative Form.pdf" class="btn btn-info">User Rep Form</a> -->
<?php }?>
			</div>
		</div>

<div id="legal-agg">

	<div  class="cls_003" align="center"><span class="cls_003">AGENT REPRESENTATIVE RETAINER AGREEMENT</span></div>
    <div class="cls_002" style="padding-top:10px"><b><i>RCIC Membership Number: R-415351<span style="padding-left:120px">Client File Number:</b></i></span></div>
    <div class="cls_002" style="padding-top:10px"><span class="cls_002">This Retainer Agreement is made this 	day of <?php echo date("d/m/y") ?> between Regulated Canadian Immigration Consultant (RCIC) Gurpreet Matta (the “RCIC”), located at 6570 Cabeldu Crescent Delta BC V4E 1R4 and Client <?php echo ucwords(strtolower($lead1['fname']." ".($lead1['mname']!=""?" ".$lead1['mname']:"").$lead1['lname'] ));?> (the “Client”), located at <?php echo $lead1['address'];?>.</span></div>
    <div class="cls_002" style="padding-top:10px"><span class="cls_002">WHEREAS the RCIC and the Client wish to enter into a written agreement which contains the agreed upon terms and conditions upon which the RCIC will provide his/her services to the Client through <?php echo $b_name;?>.</span></div>
    <div class="cls_002" style="padding-top:10px"><span class="cls_002">AND WHEREAS the RCIC is a member of Immigration Consultants of Canada Regulatory Council (the “Council”), the regulator in Canada for immigration consultants;</span></div>
    <div class="cls_002" style="padding-top:10px"><span class="cls_002">IN CONSIDERATION of the mutual covenants contained in this Agreement, the parties agree as follows:</span></div>
    <div class="cls_003"><span class="cls_003">1.&nbsp;&nbsp;&nbsp;Definitions</span></div>
    <div class="cls_002" style="padding-top:10px"><span class="cls_002">The terms “Client”, “Council” and “Disbursement” shall have the meaning given to such terms in the <u>Retainer Agreement Regulation</u> and <u>By-law</u> of the Council.</span></div>
    <div class="cls_003"><span class="cls_003">2.&nbsp;&nbsp;&nbsp;RCIC Responsibilities and Commitments</span></div>
    <div class="cls_002" style="padding-top:10px"><span class="cls_002">The Client asked the RCIC, and the RCIC has agreed, to act for the Client in the matter of Immigration Application of the Client under Express Entry Federal Skilled Worker Stream and PNP if applicable and if RCIC is authorized agent to represent the case for the respective PNP.</span></div>
    <div class="cls_002" style="padding-top:10px"><span class="cls_002">In consideration of the fees paid and the matter stated above, the RCIC agrees to do the following:</span></div>
    <div class="cls_002" style="padding-top:10px"><span class="cls_002"><ol><li style="padding-top:5px">Créate an-Express Entry Profile and register with Job Bank.</span></li>
    <li style="padding-top:5px">Help Client to gather all necessary documents for Submission.</li>
    <li style="padding-top:5px">Guide client to evaluate his/her Educational Degree/ Diploma.</li>
    <li style="padding-top:5px">Check and verify all documents and information before submitting/uploading online.</li>
    <li style="padding-top:5px">See the client through the immigration process.</li>
    </ol></span></div>
    <div class="cls_003"><span class="cls_003">3.&nbsp;&nbsp;&nbsp;Client Responsibilities and Commitments</span></div>
    <div class="cls_002"><span class="cls_002">3.1&nbsp;&nbsp;&nbsp;The Client must provide, upon request from the RCIC:</span></div>
    <div class="cls_002" style="padding:5px 0px"><span class="cls_002"><ul><li>All necessary documentation</li>
    <li>All documentation in English or French, or with an English or French translation</li>
    </ol></span></div>
    <div class="cls_002"><span class="cls_002">3.2&nbsp;&nbsp;&nbsp;The Client understands that he/she must be accurate and honest in the information he/she provides and that any inaccuracies may void this Agreement, or seriously affect the outcome of the application or the retention of any status he/she may obtain. The RCIC’s obligations under the Retainer Agreement are null and void if the Client knowingly provides any inaccurate, misleading or false material information.  The Client’s financial obligations remain.</span></div>
    <div class="cls_002"><span class="cls_002">3.3&nbsp;&nbsp;&nbsp;In the event Immigration, Refugees and Citizenship Canada (IRCC) or Employment and Social Development Canada (ESDC) should contact the Client directly, the Client is instructed to notify the RCIC immediately.</span></div>
    <div class="cls_002"><span class="cls_002">3.4&nbsp;&nbsp;&nbsp;The Client is to immediately advise the RCIC of any change in the marital, family, or civil status or change of physical address or contact information for any person included in the application.</span></div>
    <div class="cls_002"><span class="cls_002">3.5&nbsp;&nbsp;&nbsp;In the event of a Joint Retainer Agreement, the Clients agree that the RCIC may share information among all clients, as required. Furthermore, if a conflict develops that cannot be resolved, the RCIC cannot continue to act for both or all of the Clients and may have to withdraw completely.</span></div>
    <div class="cls_003"><span class="cls_003">4.&nbsp;&nbsp;&nbsp;Payment Terms and Conditions</span></div>
    <div class="cls_003"><span class="cls_003">Upfront:</span></div>
    <div class="cls_003"><span class="cls_003">Retainer Fees:&nbsp;&nbsp;&nbsp;&nbsp;<?=$lfee;?> </span></div>
    <div class="cls_003"><span class="cls_003">Disbursements:&nbsp;&nbsp;&nbsp;&nbsp;As actuals,</span></div>
    <div class="cls_002" style="padding-top:10px"><span class="cls_002">** To be paid Upfront on signing the agreement.</span></div>
    <div class="cls_002" style="padding-top:10px"><span class="cls_002">** All the government fees to be paid by the client directly.</span></div>
    <div class="cls_003"><span class="cls_003">5.&nbsp;&nbsp;&nbsp;Refund Policy</span></div>
    <div class="cls_002" style="padding-top:10px"><span class="cls_002">The Client acknowledges that the granting of a visa or status and the time required for processing this application is at the sole discretion of the government and not the RCIC.  Furthermore, the Client acknowledges that fees are not refundable in the event of an Application Refusal/Voluntary Withdraw/Acts of God.</span></div>
    <div class="cls_002" style="padding-top:10px"><span class="cls_002">In the event the Client is unable to contact the RCIC and has reason to believe the RCIC may be dead, incapacitated or otherwise unable to fulfill his/her duties, the Client should contact ICCRC.</span></div>
    <div class="cls_003"><span class="cls_003">6.&nbsp;&nbsp;&nbsp;Dispute Resolution Related to the Code of Professional Ethics</span></div>
    <div class="cls_002" style="padding-top:10px"><span class="cls_002">In the event of a dispute related to the Code of Professional Ethics, the Client and RCIC are to make every effort to resolve the matter between the two parties.  In the event a resolution cannot be reached, the Client is to present the complaint in writing to the RCIC and allow the RCIC 30 days to respond to the Client.</span></div>
    <div class="cls_002" style="padding-top:10px"><span class="cls_002"><b>ICCRC Contact Information:</b></span></div>
    <div class="cls_002" style="padding-top:5px"><span class="cls_002">Immigration Consultants of Canada Regulatory Council (ICCRC)</span></div>
    <div class="cls_002" style="padding-top:5px"><span class="cls_002">5500 North Service Rd., Suite 1002</span></div>
    <div class="cls_002" style="padding-top:5px"><span class="cls_002">Burlington, ON, L7L 6W6</span></div>
    <div class="cls_002" style="padding-top:5px"><span class="cls_002">Toll free: 1-877-836-7543</span></div>
    <div class="cls_003"><span class="cls_003">7.&nbsp;&nbsp;&nbsp;Confidentiality</span></div>
    <div class="cls_002" style="padding-top:10px"><span class="cls_002">All information and documentation reviewed by the RCIC, required by IRCC and all other governing bodies, and used for the preparation of the application will not be divulged to any third party, other than agents and employees, without prior consent, except as demanded by law.<i>The RCIC, and all agents and employees of the RCIC, are also bound by the confidentiality requirements of Article 8 of the <u>Code of Professional Ethics.</u></i></span></div>
    <div class="cls_002" style="padding-top:10px"><span class="cls_002">The Client agrees to the use of electronic communication and storage of confidential information.  The RCIC will use his/her best efforts to maintain a high degree of security for electronic communication and information storage.</span></div>
    <div class="cls_003"><span class="cls_003">8.&nbsp;&nbsp;&nbsp;Force Majeure</span></div>
    <div class="cls_002" style="padding-top:10px"><span class="cls_002">The RCIC’s failure to perform any term of this Retainer Agreement, as a result of conditions beyond his/her control such as, but not limited to, governmental restrictions or subsequent legislation, war, strikes, or acts of God, shall not be deemed a breach of this Agreement.</span></div>
    <div class="cls_003"><span class="cls_003">9.&nbsp;&nbsp;&nbsp;Change Policy</span></div>
    <div class="cls_002" style="padding-top:10px"><span class="cls_002">The Client acknowledges that if the RCIC is asked to act on the Client’s behalf on matters other than those outlined above in this Agreement, or because of a material change in the Client’s circumstances, or because of material facts not disclosed at the outset of the application, or because of a change in government legislation regarding the processing of immigration or citizenship-related applications, the Agreement can be modified accordingly.</span></div>
    <div class="cls_003"><span class="cls_003">10.&nbsp;&nbsp;&nbsp;Termination</span></div>
    <div class="cls_002"><span class="cls_002">10.1&nbsp;&nbsp;&nbsp;This Agreement is considered terminated upon completion of tasks identified under section 2 of this agreement.</span></div>
    <div class="cls_002"><span class="cls_002">10.2&nbsp;&nbsp;&nbsp;This Agreement is considered terminated if material changes occur to the Client’s application or eligibility, which make it impossible to proceed with services detailed in section 2 of this Agreement.</span></div>

    <div sclass="cls_003"><span class="cls_003">11.&nbsp;&nbsp;&nbsp;Discharge or Withdrawal of Representation</span></div>
    <div class="cls_002"><span class="cls_002">11.1&nbsp;&nbsp;&nbsp;The Client may discharge representation and terminate this Agreement, upon writing without any refund.</span></div>
    <div class="cls_002"><span class="cls_002">11.2&nbsp;&nbsp;&nbsp;Pursuant to Article 11 of the <u>Code of Professional Ethics</u>, the RCIC may withdraw representation and terminate this Agreement, upon writing, provided withdrawal does not cause prejudice to the Client, if client contacts the CIC or any Immigration Body without consulting the RCIC.</span></div>

    <div class="cls_003"><span class="cls_003">12.&nbsp;&nbsp;&nbsp;Governing Law</span></div>
    <div class="cls_002" style="padding-top:10px"><span class="cls_002">This Agreement shall be governed by the laws in effect in the Province/Territory of British Columbia, and the federal laws of Canada applicable therein and except for disputes pursuant to Section 8 hereof, any dispute with respect to the terms of this Agreement shall be decided by a court of competent jurisdiction within the Province/Territory of British Columbia.</span></div>

    <div class="cls_003"><span class="cls_003">13.&nbsp;&nbsp;&nbsp;Miscellaneous</span></div>
    <div class="cls_002"><span class="cls_002">13.1&nbsp;&nbsp;&nbsp;The Client expressly authorizes the RCIC to act on his/her behalf to the extent of the specific functions which the RCIC was retained to perform, as per Section 2 hereof.</span></div>
    <div class="cls_002"><span class="cls_002">13.2&nbsp;&nbsp;&nbsp;This Agreement constitutes the entire agreement between the parties with respect to the subject matter hereof and supersedes all prior agreements, understandings, warranties, representations, negotiations and discussions, whether oral or written, of the parties except as specifically set forth herein.</span></div>
    <div class="cls_002"><span class="cls_002">13.3&nbsp;&nbsp;&nbsp;This Agreement shall be binding upon the parties hereto and their respective heirs, administrators, successors and permitted assigns.</span></div>
    <div class="cls_002"><span class="cls_002">13.4&nbsp;&nbsp;&nbsp;This Agreement may only be altered or amended when such changes are made in writing and executed by the parties hereto.</span></div>
    <div class="cls_002"><span class="cls_002">13.5&nbsp;&nbsp;&nbsp;The provisions of this Agreement shall be deemed severable.  If any provision of this Agreement shall be held unenforceable by any court of competent jurisdiction, such provision shall be severed from this Agreement, and the remaining provisions shall remain in full force and effect.</span></div>
    <div class="cls_002"><span class="cls_002">13.6&nbsp;&nbsp;&nbsp;The headings utilized in this Agreement are for convenience only and are not to be construed in any way as additions to or limitations of the covenants and agreements contained in this Agreement.</span></div>
    <div class="cls_002"><span class="cls_002">13.7&nbsp;&nbsp;&nbsp;Each of the parties hereto shall do and execute or cause to be done or executed all such further and other things, acts, deeds, documents and assurances as may be necessary or reasonably required to carry out the intent and purpose of this Agreement fully and effectively.</span></div>
    <div class="cls_002"><span class="cls_002">13.8&nbsp;&nbsp;&nbsp;The Client acknowledges that he/she has had sufficient time to review this Agreement and has been given an opportunity to obtain independent legal advice and translation prior to the execution and delivery of this Agreement.</span></div>
    <div class="cls_002" style="padding-top:5px">In the event the Client did not seek independent legal advice prior to signing this Agreement, he/she did so voluntarily without any undue pressure and agrees that the failure to obtain independent legal advice shall not be used as a defence to the enforcement of obligations created by this Agreement.</div>
    <div class="cls_002"><span class="cls_002">13.9&nbsp;&nbsp;&nbsp;Furthermore, the Client acknowledges that he/she has received a copy of this Agreement and agrees to be bound by its terms.</span></div>
    <div class="cls_002"><span class="cls_002">13.10&nbsp;&nbsp;&nbsp;The Client acknowledges that he/she has requested that the Agreement be written in the English language; [To be included in the English version of the Retainer Agreement drawn up by RCICs working in Quebec].</span></div>

    <div class="cls_003"><span class="cls_003">14.&nbsp;&nbsp;&nbsp;Contact Information</span></div>

<table class="front-page-table">
    <tr>
    <td>Client Name:</td>
    <td><?php echo ucwords(strtolower($lead1['fname']." ".($lead1['mname']!=""?" ".$lead1['mname']:"").$lead1['lname'] ));?></td>
  </tr>
    <tr>
    <td>Given Name: <?php echo ucwords(strtolower($lead1['fname']));?></td>
    <td>Family Name: <?php echo ucwords(strtolower($lead1['lname']));?></td>
  </tr>
  <tr>
    <td>Address:</td>
    <td><?php echo $lead1['address'];?></td>
  </tr><tr>
    <td>Telephone Number: <?php echo ($lead1['phone']==""?"None":$lead1['phone']);?></td>
 <td>Cellphone Number: <?php echo ($lead1['mobile']==""?"None":$lead1['mobile']);?></td>
  </tr><tr>
    <td>Fax Number:</td>
    <td></td>
  </tr><tr>
    <td>Email:</td>
    <td><?php echo $lead1['email'];?></td>
  </tr>
  <tr></tr>
  <tr>
    <td colspan="2">RCIC</td>
  </tr>
  <tr>
    <td colspan="2">Gurpreet Matta</td>
  </tr>
  <tr>
    <td colspan="2">6570 Cabeldu Crescent</td>
  </tr>
  <tr>
    <td colspan="2">British Columbia (BC)</td>
  </tr>
  <tr>
    <td colspan="2">Canada</td>
  </tr>
  <tr>
    <td colspan="2">Phone: 001-6047218941</td>
  </tr>
  <tr>
    <td colspan="2">Fax: 001-7784343150</td>
  </tr>
    <tr>
    <td colspan="2">Email: garrymatta@gmail.com</td>
  </tr>
</table>

    <div  style="padding-top:30px">IN WITNESS THEREOF this Agreement has been duly executed by the parties hereto on the date first above written.</div>
    <!-- <table width="100%" style="margin-top: 60px">
      <tr><td>-------------------------</td>
        <td style="text-align:right">-------------------------</td></tr>
        <tr >
          <td>Signature of Client</td>
          <td style="text-align:right">Signature of RCIC</td>
        </tr>
        <tr >
          <td><?php echo ucwords(strtolower($lead1['fname']." ".($lead1['mname']!=""?" ".$lead1['mname']:"").$lead1['lname'] ));?></td>
          <td style="text-align:right"></td>
        </tr>
    </table> -->
    <br>
    <div class="cls_002"><span class="cls_002"><b><?php echo ucwords(strtolower($lead1['fname']." ".($lead1['mname']!=""?" ".$lead1['mname']:"").$lead1['lname'] ));?></b></span></div>
    <div class="cls_002" style="padding:20px 0px 0px 0px"><span class="cls_002">***Note:I hereby acknowledge that I have read and understood the contractual terms and conditions mentioned in this agreement and also agree that the agreement is legally binding.</span></div>
    <div class="cls_002" style="padding:20px 0px 0px 0px"><span class="cls_002">Your i/p: <?php echo $_SERVER['REMOTE_ADDR']; ?> is captured.</span></div>

    
    </div>

    </div>
	</div>