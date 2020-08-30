<?php include_once("header.php");	
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
  // echo $lead1['type'];
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
  else if(strpos($prog1['name'],'Lawyer')!==false ){
    $type=10;
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
				<h4 class="mb-3" style="color:#2cb674;">Agreements</h4>
			</div>
      <div class="col-sm-<?php echo ($lead1["country_interest"]==2?'2':'6')?>" align="right">
		<form action="process/pdf process.php" target="_blank" id="text_form" method="POST">
      <input type="hidden" name="html_text">
      <input type="hidden" name="legal_text">
      <input type="hidden" name="b_name" value="<?php echo $b_name?>">
      <input type="hidden" name="b_address" value="<?php echo  htmlentities($b_address);?>">
      <input type="hidden" name="b_mobile" value="<?php echo $b_mobile?>">
      <input type="hidden" name="b_email" value="<?php echo $b_email?>">
      <input type="hidden" name="agc" value="<?php echo $lead1["agreementNo"]?>">
      <button type="submit" class="btn btn-info">Save Agreement</button>
    </form>
  </div>
  <?php if($lead1["country_interest"]==2){?>
  <div class="col-sm-2" >
    <form action="process/pdf process legal.php" target="_blank" id="legal_form" method="POST">
      <input type="hidden" name="legal_text">
      <input type="hidden" name="agl" value="<?php echo $lead1["agreementNo"];?>">
      <input type="hidden" name="lead" value="<?php echo $_GET["lead"];?>">
      <button type="submit" class="btn btn-info">Save Legal Agreement</button>
    </form>
  </div>
  
  <div class="col-sm-2" >
      <a href="uploads/documents/Representative Form.pdf" class="btn btn-info">User Rep Form</a>
<?php }?>
			</div>
		</div>
		<div class="row"  >
				<div class="col-sm-8" id="" style="margin-left: 16%;border: 3px solid black;padding-left: 60px;padding-right: 60px;text-align: justify;">
          <div style='width:100%;' align='center'><img src='images/logo.png' width='127' style='padding-bottom:10px'></div>
	<div id="agreement-content">

				<!--<div style="width:100%;" align="center">onclick="javascript:printPage(print);"      <div class="col-sm-6 " align="right"><a href="process/pdf process.php"  class="btn btn-info">Print Agreement</a>

<img src="images/logo.png" width="127"></div> --><!--header-->
<?php if($lead1["region"]==4||$lead1["region"]==5){
  if($type!=2 && $type!=3 && $type!=5 && $type!=6){
  ?>
	 <div  class="cls_003" align="center"><span class="cls_003">CONTRACT OF ENGAGEMENT <br/> Agreement No <?php echo $lead1["agreementNo"];?></span>
<br/>
<table class="front-page-table">
  <tr>
    <td>Service Provider</td>
    <td>Name:</td>
    <td width="30%"><?php echo $b_name;?></td>
  </tr>
  <tr>
    <td></td>
    <td>Address:</td>
    <td><?php echo $b_address;?></td>
  </tr><tr>
    <td></td>
    <td>Phone No:</td>
    <td><?php echo $b_mobile;?></td>
  </tr><tr>
    <td></td>
    <td>Email:</td>
    <td><?php echo $b_email;?></td>
  </tr>
  <tr style="padding-top:20px">
    <td>Client</td>
    <td>Name:</td>
    <td><?php echo ucwords(strtolower($lead1['fname']." ".($lead1['mname']!=""?" ".$lead1['mname']:"").$lead1['lname'] ));?></td>
  </tr>
  <tr>
    <td></td>
    <td>Address:</td>
    <td><?php echo $lead1['address'];?></td>
  </tr><tr>
    <td></td>
    <td>Phone No:</td>
    <td><?php echo $lead1['mobile'];?></td>
  </tr><tr>
    <td></td>
    <td>Email:</td>
    <td><?php echo $lead1['email'];?></td>
  </tr>
  <tr>
    <td>Service Category</td>
    <td colspan="2"><?php if($lead1["country_interest"]==1 && (strpos($prog1['name'],'Single')!==false || strpos($prog1['name'],'Spouse')!==false || strpos($prog1['name'],'Post Skill Assessment')!==false )){ echo "General Skilled Immigration";}
      elseif($lead1["country_interest"]==1 && $type==4){ echo "General Skilled Immigration";}
      elseif($lead1["country_interest"]==1 && $type==5){ echo "Skill Assessment";}
      elseif($lead1["country_interest"]==2 && (strpos($prog1['name'],'Single')!==false || strpos($prog1['name'],'Spouse')!==false || strpos($prog1['name'],'Post ECA- Single')!==false|| strpos($prog1['name'],'Post ECA - PA & Spouse')!==false)){ echo "Federal Canada express entry and Provincial Program";}
      elseif($lead1["country_interest"]==2 && (strpos($prog1['name'],'ECA - Single')!==false || strpos($prog1['name'],'ECA - PA & Spouse')!==false)){ echo "Education Credential Assessment";}
      elseif($lead1["country_interest"]==2 && $type==8){ echo "Provincial Nomination Program";}
      elseif($type==9){ echo $country." Dependent Visa";}
      elseif(strpos($prog1['name'],'Visit')!==false || strpos($prog1['name'],'Student')!==false ){
      echo $country.($type==2?" Visit Visa":" Student Visa");}?></td>
  </tr>
  <tr>
    <td>Program Interested</td>
    <td colspan="2"><?php echo $prog1['name'].($type==8?" (refers to Provincial Nomination Program)":"");?></td>
  </tr>
  <tr>
    <td>Fees & Charges</td>  
  </tr>
</table>
</div>
<div  class="cls_003"><span class="cls_003">Upfront</span></div>
<div class="cls_002"><span class="cls_002">
	<table class="fees-table">
  <tr>
    <th>Fee Category</th>
    <th>Retainer</th>
    <th>Amount <?=$curr;?></th>
  </tr>
  <tr>
    <td>Total Package</td>
    <td>1500</td>
    <td>1500</td>
  </tr>
  
</table>
</span></div>
<div class="cls_002"><span class="cls_002">Note: The total retainer fee paid is non-refundable.</span></div>
<?php if($lead1['region']=="3" || $lead1['region']=="4" || $lead1['region']=="5" || $lead1['region']=="6" ||$lead1['region']=="10"){?>
<div class="cls_002"><span class="cls_002"><?=$vat;?> is applicable on above fees as its not included.</span></div>
<?php } ?>
<div class="cls_002"><span class="cls_002">Please refer to receipt for complete payment details as per package selected.</span></div>

<br/>
<div><span class="cls_014">Important Information for Clients:</span></div>
<div class="cls_002"><span class="cls_002">The terms and conditions of providing services (“<span class="cls_003">Agreement</span>”) are set out below.  Make sure you have read and understood the conditions before entering into the Agreement.  If you wish to seek independent legal advice about this Agreement, you should do so before signing this Agreement.  By signing at the bottom of each page, you are indicating that you have read and understood the terms on that page.</span>
<br/><span class="cls_003">I have read and understood the terms and conditions on the following pages and I agree to be bound by this agreement.</span></div>

<pagebreak />
<div style="padding:20px 0px" align="center" ><span class="cls_014">TERMS AND CONDITIONS OF AGREEMENT FOR SERVICES</span></div>
<div  class="cls_003"><span class="cls_003">1.&nbsp;&nbsp;&nbsp; APPOINTMENT</span></div>
<div class="cls_002"  ><span class="cls_002">The Client hereby appoints <?php echo $b_name;?> (“DMC”) to perform the services described in this Agreement (“Agreement”).
    </span></div>
    <div  class="cls_003"><span class="cls_003">2.&nbsp;&nbsp;&nbsp; SERVICES TO BE PROVIDED</span></div>
    <div class="cls_002" ><span class="cls_002">2.1&nbsp;&nbsp;&nbsp;DMC shall provide the following Services to the Client:</span></div>
    <div class="cls_002"><ol type="a">
     <?php  if ($type==2){ ?>
  <li>Advisory services relating to the Client’s intent to get Visit/Tourist Visa.</li>
  <li>Provide truthful and sincere advice regarding the prospects of success.</li>

  <?php } elseif($type==8){?>
  <li>Advisory services relating to the Client’s intent to migrate to <?php echo $country;?> based on province requirement/eligibility.</li>
  <li>Provide truthful and sincere advice regarding the prospects of success in obtaining permanent residence.</li>
  
  <?php } elseif($type==8){?>
  <li>Advisory services relating to the Client’s intent to migrate to <?php echo $country;?> based on province requirement/eligibility.</li>
  <li>Provide truthful and sincere advice regarding the prospects of success in obtaining permanent residence.</li>
  
  <?php } elseif($type==9){?>
  <li>Advisory services relating to the Client’s intent to get Dependent Spouse Visa.</li>
  <li>Provide truthful and sincere advice regarding the prospects of success.</li>
  
 <?php } else{?>
 
  <li>Advisory services relating to the Client’s intent to migrate to <?php echo $country;?>.</li>
  <li>Provide truthful and sincere advice regarding the prospects of success in obtaining permanent residence.</li>
 <?php } ?>
   <li>Provide advice relating to documentation required to support the application and information required to complete the application.</li> 
    </ol></div>

 <?php if ($type==2 || $type==9){}
      else{ ?>
    <div class="cls_003"><span class="cls_003">3.&nbsp;&nbsp;&nbsp;&nbsp;WHO WILL PERFORM THE SERVICES </span></div>
    <div class="cls_002"><ol type="a"><li>The Client acknowledges and consents that the Services set out in this Agreement will be delegated to the consultants of DMC<?php echo ($type==8?"(if applicable)":"")?>.</li></ol></div>
  <?php }?>
    <div class="cls_003"><span class="cls_003"><?php echo (($type==2 || $type==9)?"3":"4");?>.&nbsp;&nbsp;&nbsp;&nbsp;<?=$b_av;?> COVENANTS THAT IT:</span></div>
    <div class="cls_002"><ol type="a"><li>Is authorized to provide services as per terms of this Agreement.</li>
    <li>Will act in accordance with the law and in the best interests of the Client, and deal with the Client competently, diligently and fairly.</li>
    <li>Will ensure that the Client has access to an interpreter if necessary. (The Client will be required to pay any fees charged by the interpreter.)</li></ol></div>
    <div class="cls_003"><span class="cls_003"><?php echo (($type==2 || $type==9)?"4":"5");?>.&nbsp;&nbsp;&nbsp;&nbsp;CLIENT’S OBLIGATIONS :</span></div>
    <!-- <div class="cls_002" style="padding-top:5px"><span class="cls_002"><?php echo (($type==2 || $type==9)?"4":"5");?>.1&nbsp;&nbsp;&nbsp;Client’s Obligations are set out in <?php echo ($type==2?"1":"2")?>.</span></div> -->
    <div class="cls_002" style="padding-top:5px"><span class="cls_002"><?php echo (($type==2 || $type==9)?"4":"5");?>.1&nbsp;&nbsp;&nbsp;The Client acknowledges and confirms that Services are limited to advising Client about his/her eligibility to apply and support in collation of necessary documents. </span></div><!---atifa changes till here-->
    <div class="cls_003"><span class="cls_003"><?php echo (($type==2 || $type==9)?"5":"6");?>.&nbsp;&nbsp;&nbsp;&nbsp;TERMINATION OF AGREEMENT  :</span></div>
    <div class="cls_002"><ol type="a">

     <?php if ($type==2 || $type==9){ ?>
  <li>This Agreement shall automatically terminate upon expiry of 3 months from the date of signing by the Client.</li>
  <?php } elseif ($type==4){ ?>
  <li>This Agreement shall automatically terminate upon expiry of fifteen months from the date of signing by the Client.</li>
  <?php } else{ ?>
  <li>This Agreement shall automatically terminate upon expiry of <?php echo ($lead1["country_interest"]==1?"eighteen":"fifteen");?> months from the date of signing by the Client.</li>
<?php } ?>
      <li>Either Party may terminate this Agreement:</li>
    <ol type="i"><li>For convenience by giving <?php echo (($type==2 || $type==9)?"2":"7");?> days written notice to the other Party.</li>
    <li>Forthwith due to breach of material terms of this Agreement by the other Party. </li>
    <li>If the Client mis-behaves with any of DMC employee/representative of the Client.</li></ol>
    <li>Upon termination of the Agreement, all liabilities of DMC shall be discharged and DMC shall not be liable to refund any fees to the Client. <ol><li>DMC shall provide the Client with breakup of different services provide until the termination and applicable fees on hourly basis amount to be deducted from the fees already paid.</li>
    <li>Unless otherwise agreed by DMC, upon termination of the Agreement, all liabilities of DMC shall be discharged and DMC shall not be liable to refund any fees to the Client. </li></ol></li>
    
    
    <ol></div>
    <div class="cls_003"><span class="cls_003"><?php echo (($type==2 || $type==9)?"6":"7");?>.&nbsp;&nbsp;&nbsp;&nbsp;RETENTION OF DOCUMENTS </span></div>
    <div class="cls_002"><ol type="a"><li>DMC agrees to keep securely and in a way which will ensure confidentiality all documents provided by, or on behalf of, the Client or paid for by, or on behalf of, the Client until the earlier of: 
      <?php if ($type==2 || $type==9){ ?>
  (i) 1 month after the date of the last action on the file for the Client;
 <?php } elseif($type==4){ ?>
  (i) 15 months after the date of the last action on the file for the Client;
<?php } else{ ?>
  (i) <?php echo ($lead1["country_interest"]==1?"18 months":"15 months");?> after the date of the last action on the file for the Client;
<?php } ?>
       or (ii) when the documents are given to the Client or dealt with in accordance with the Client’s written instructions. </li>
    <li>The Client will ensure they collect their original documents (if any) from DMC within <?php echo ($type==2?"7":"21");?> days of receipt of intimation from the visa authorities of approval or rejection of the Client’s visa application. </li>
    </ol></div>
    <div class="cls_003"><span class="cls_003"><?php echo (($type==2 || $type==9)?"7":"8");?>.&nbsp;&nbsp;&nbsp;&nbsp;CONFIDENTIALITY </span></div>
    <div class="cls_002"><ol type="a"><li>DMC will preserve the confidentiality of the Client.  DMC will not disclose or allow to be disclosed confidential information of the Client or the Client’s business without the Client’s written consent, unless required by law.</li>
      <?php if($type==2 || $type==9){?>
      <li>Client acknowledges and agrees that his/her details will be shared by <?php echo $b_av;?> for the purposes of immigration process with the third parties including without limitation agents for hotel booking / flight reservation / insurance company and similar other institutions/agents and share the Client’s details for marketing, branding for promotional activities.</li>
  <?php } else if($type==8){?>
    <li>Client acknowledges and agrees that his/her details will be shared by <?php echo $b_av;?> for the purposes of PNP nomination process with the third parties including without limitation agents for hotel booking / flight reservation / insurance company and similar other institutions/agents and share the Client’s details for marketing, branding for promotional activities.</li>
    <?php } else{?>
      <li>Client acknowledges and agrees that his/her details will be shared by <?php echo $b_av;?> for the purposes of immigration process with the third parties including without limitation agents for <?php echo ($type==4?"":"ECA,")?> Notary, IELTS and similar other institutions/agents and share the Client’s details for marketing, branding for promotional activities.</li>
 <?php }?>

    </ol></div>
    <div class="cls_003"><span class="cls_003"><?php echo (($type==2 || $type==9)?"8":"9");?>.&nbsp;&nbsp;&nbsp;&nbsp;RESOLUTION OF DISPUTES</span></div>
    <div class="cls_002"><ol type="a"><li>If a dispute arises out of or relating to this Agreement, or the breach, termination, validity, or subject matter thereof, or as to any related claim in restitution or at law, in equity or pursuant to any statute—the parties agree to discuss the dispute with the aim of reaching an agreement that is acceptable to both sides.   The Agreement will be documented in writing, dated and signed by both DMC and the Client.  </li>
    <li>If one party requests an opportunity to discuss the dispute, the parties should attempt to reach an agreement within 21 days of that request (or a longer period if agreed between the parties). </li>
    <li>If the parties cannot reach an agreement within 21 days, the parties agree to refer the dispute exclusively to Dubai International Financial Centre (DIFC) courts in Dubai ,UAE. Parties undertake that they shall refrain from maligning each other on social media. If the Client for any reason mis-behaves with DMC employees/representatives and/or choses to malign DMC on social media without first obtaining a judgment/order in his/her favor from the courts in <?php echo $b_country;?>, DMC shall be entitled to recover suitable damages from the Client which shall be in addition to any other legal recourse DMC may have against the Client.</li>
    <li>This Agreement shall be governed by the laws of <?php echo $b_city." ,".$b_country;?></li>
    </ol></div>
    <div class="cls_003"><span class="cls_003"><?php echo (($type==2 || $type==9)?"9":"10");?>.&nbsp;&nbsp;&nbsp;&nbsp;Miscellaneous</span></div>
    <div class="cls_002" style="padding-top:5px"><span class="cls_002"><?php echo (($type==2 || $type==9)?"9":"10");?>.1&nbsp;&nbsp;&nbsp;<b>Force Majeure.</b> Neither Party will be liable to the other for failure to fulfil its obligations hereunder if such failure is due to causes beyond control, including, without limitation, acts of God, earthquake, fire, flood, embargo, catastrophe, sabotage, utility or transmission failure, governmental prohibitions or regulations, national emergencies, insurrection, riots or wars or viruses which did not result from the acts or omissions of such Party, its employee or agents; strikes, work stoppages or other labor difficulties, unavailability or delays in transportation, default of suppliers ("Force Majeure Event"). The time for any performance required hereunder will be extended by the delay incurred because of such Force Majeure Event. If such Force Majeure Event continues for a period of (ninety) 90 days, then either party may terminate this Agreement</span></div>
    <div class="cls_002" style="padding-top:5px"><span class="cls_002"><?php echo (($type==2 || $type==9)?"9":"10");?>.2&nbsp;&nbsp;&nbsp;<b>Entire Agreement.</b> This Agreement constitutes the entire understanding between the Parties with respect to the subject matter of this Agreement and supersedes all prior agreements, negotiations and discussions between the Parties relating to it.</span></div>
    <div class="cls_002" style="padding-top:5px"><span class="cls_002"><?php echo (($type==2 || $type==9)?"9":"10");?>.3&nbsp;&nbsp;&nbsp;<b>Assignment.</b> Client shall not assign and/or transfer his/her rights and/or obligations under this Agreement without prior written consent of the other Party.</span></div>
    <div class="cls_002" style="padding-top:5px"><span class="cls_002"><?php echo (($type==2 || $type==9)?"9":"10");?>.4&nbsp;&nbsp;&nbsp;<b>Notices.</b> All notices, requests, demands, consents, waivers or other communications required to be given by either Party to the other pursuant to this Agreement shall be in English, in writing on the address mentioned in this Agreement.</span></div>
    <div class="cls_002" style="padding-top:5px"><span class="cls_002"><?php echo (($type==2 || $type==9)?"9":"10");?>.5&nbsp;&nbsp;&nbsp;<b>Counterparts.</b> This Agreement may be executed in two or more counterparts, each of which shall be deemed an original, but all of which together shall constitute one and the same instrument, and in pleading or proving any provision of this Agreement, it shall not be necessary to produce more than one of such counterparts.</span></div>
    <div class="cls_002" style="padding-top:5px"><span class="cls_002"><?php echo (($type==2 || $type==9)?"9":"10");?>.6&nbsp;&nbsp;&nbsp;<b>Language.</b> This Agreement may be executed in different languages. Parties agree that in the event of discrepancy, the English version of this Agreement shall prevail over any other versions of this Agreement. </span></div>
<div style="padding:20px 0px " class="cls_003"><span class="cls_003">
Signed by the  <?php echo $b_name;?>: 
  <table style="width: 100%">
    <tr><td><img src='<?php echo $base_url;?>/images/Sign1.png' width='127'></td><td><img src='<?php echo $base_url;?>/images/Sign2.png' width='127'></td></tr>
    <tr><td>Chetan Kumbhar 
(Founder & Managing Partner) </td><td>Vidisha Kumbhar 
(Founder & Managing Partner)
</td></tr>
  </table>
 Date: <?php echo date("d/m/y") ." <br/>" . $r_name;?></span></div>
 <div class="cls_002"><span class="cls_002"><b><?php echo ucwords(strtolower($lead1['fname']." ".($lead1['mname']!=""?" ".$lead1['mname']:"").$lead1['lname'] ));?></b></span></div>
    <div class="cls_002" style="padding:20px 0px 0px 0px"><span class="cls_002">***Note:I hereby acknowledge that I have read and understood the contractual terms and conditions mentioned in this agreement and also agree that the agreement is legally binding.</span></div>
    <div class="cls_002" style="padding:20px 0px 0px 0px"><span class="cls_002">Your i/p: <?php echo $lead1['i_p'];  ?> is captured.</span></div>

    <pagebreak />

<?php $dbranchs=$obj->display3('SELECT * FROM `dm_branch` where id=4');

$dbranch=$dbranchs->fetch_array();
$b_name=ucwords(strtolower($dbranch['name']));
  $b_av="DIS";
$b_address=$dbranch['address'];
$b_email=$dbranch['email'];
$b_mobile=$dbranch['mobile'];
$b_website=$dbranch['website'];
$b_country="UAE";
$b_city="Dubai";
$dbanks=$obj->display('dm_accounts',' branch_id=4');
$dbank=$dbanks->fetch_array();
 }}?>
<div  class="cls_003" align="center"><span class="cls_003">AGREEMENT FOR SERVICES<br/> Agreement No <?php echo $lead1["agreementNo"];?></span>
<br/>
<table class="front-page-table">
  <tr>
    <td>Service Provider</td>
    <td>Name:</td>
    <td width="30%"><?php echo $b_name;?></td>
  </tr>
  <tr>
    <td></td>
    <td>Address:</td>
    <td><?php echo $b_address;?></td>
  </tr><tr>
    <td></td>
    <td>Phone No:</td>
    <td><?php echo $b_mobile;?></td>
  </tr><tr>
    <td></td>
    <td>Email:</td>
    <td><?php echo $b_email;?></td>
  </tr>
  <tr></tr>
  <tr></tr>
  <tr>
    <td>Client</td>
    <td>Name:</td>
    <td><?php echo ucwords(strtolower($lead1['fname']." ".($lead1['mname']!=""?" ".$lead1['mname']:"").$lead1['lname'] ));?></td>
  </tr>
  <tr>
    <td></td>
    <td>Address:</td>
    <td><?php echo $lead1['address'];?></td>
  </tr><tr>
    <td></td>
    <td>Phone No:</td>
    <td><?php echo $lead1['mobile'];?></td>
  </tr><tr>
    <td></td>
    <td>Email:</td>
    <td><?php echo $lead1['email'];?></td>
  </tr>
  <tr></tr>
  <tr></tr>
  <tr>
    <td>Service Category</td>
    <td colspan="2"><?php if($lead1["country_interest"]==1 && (strpos($prog1['name'],'Single')!==false || strpos($prog1['name'],'Spouse')!==false || strpos($prog1['name'],'Post Skill Assessment')!==false )){ echo "General Skilled Immigration";}
      elseif($lead1["country_interest"]==1 && $type==4){ echo "General Skilled Immigration";}
      elseif($lead1["country_interest"]==1 && $type==5){ echo "Skill Assessment";}
      elseif($lead1["country_interest"]==2 && (strpos($prog1['name'],'Single')!==false || strpos($prog1['name'],'Spouse')!==false || strpos($prog1['name'],'Post ECA- Single')!==false|| strpos($prog1['name'],'Post ECA - PA & Spouse')!==false)){ echo "Federal Canada express entry and Provincial Program";}
      elseif($lead1["country_interest"]==2 && (strpos($prog1['name'],'ECA - Single')!==false || strpos($prog1['name'],'ECA - PA & Spouse')!==false)){ echo "Education Credential Assessment";}
      elseif($lead1["country_interest"]==2 && $type==8){ echo "Provincial Nomination Program";}
      elseif($type==9){ echo $country." Dependent Visa";}
       elseif(strpos($prog1['name'],'Visit')!==false || strpos($prog1['name'],'Student')!==false ){
      echo $country.($type==2?" Visit Visa":" Student Visa");}?>
        
      </td>   
  </tr>
  <tr>
    <td>Program Interested</td>
    <td colspan="2"><?php echo $prog1['name'].($type==8?" (refers to Provincial Nomination Program)":"");?> </td>
  </tr>
  <tr>
  <tr></tr>
  <tr></tr>
  <tr>
    <td>Fees & Charges</td>
    <td colspan="2">Fees and charges are set out in <?php echo (($type==2 || $type==9)?"2":"3");?>.</td>   
  </tr>
</table>
</div>

<br/>
<br/>
<div class="cls_014"><span class="cls_014">Important Information for Clients:</span></div>
<div class="cls_002"><span class="cls_002">The terms and conditions of providing <?php echo ($type==3?"student visa":"immigration");?> services (“<span class="cls_003">Agreement</span>”) are set out below.  Make sure you have read and understood the conditions before entering into the Agreement.  If you wish to seek independent legal advice about this Agreement, you should do so before signing this Agreement.  By signing at the bottom of each page, you are indicating that you have read and understood the terms on that page.</span>
<br/><span class="cls_003">I have read and understood the terms and conditions on the following pages and I agree to be bound by this agreement.</span></div>

<!--<div style="position:absolute;left:72.57px;top:777.66px" class="cls_002" id="footer1"> <div  class="cls_003"><span class="cls_003"><?php echo $footer_text;?></span>-->
	<!--search and replace below for footer-->
	<!--FOOTER-->
<pagebreak />
<!--header-->
<div class="cls_003" align="center"><span class="cls_003">TERMS AND CONDITIONS OF AGREEMENT FOR SERVICES</span></div>
<div  class="cls_003"><span class="cls_003">1.&nbsp;&nbsp;&nbsp; APPOINTMENT</span></div>
<div  class="cls_002"><span class="cls_002">The Client hereby appoints <?php echo $b_name;?> (“</span><span class="cls_003"><?php echo $b_av;?></span><span class="cls_002">”) to perform the services described in this Agreement (“<span class="cls_003">Agreement</span>”).</span></div>
<div  class="cls_003"><span class="cls_003">2.&nbsp;&nbsp;&nbsp;SERVICES TO BE PROVIDED</span></div>
<div  class="cls_002"><span class="cls_002">2.1 &nbsp;&nbsp;&nbsp; <?php echo $b_av;?> shall provide the following Services to the Client:</span></div>
<ol type="a">
<?php if ($type==2 || $type==9){ ?>
    <li>Advisory services relating to the Client’s intent to get <?php echo ($type==2?"Visit/Tourist Visa.":"Dependent Spouse Visa");?></li>
    <li>Provide truthful and sincere advice regarding the prospects of success.</li>
    <li>Analyze current immigration law relating to the visa category or review application. </li>
    <li>Assist in the completion and/or checking of relevant application forms.</li>
    <li>Provide advice and assistance relating to documentation required to support the application.</li>
    <li>Prepare necessary supporting submissions to be filed before the relevant Visa Application Centre/Embassy.</li>
    <li>Submit the application to the relevant assessing authority, department or review body for processing as soon as possible.</li>
    <li>Wherever possible, supply any further documentation or information on receipt of documents from the Client.</li>
    <li>Wherever possible, assist the Client to comply with any  request as per Embassy.</li>
    <li>Keep the Client fully informed of all developments concerning the progress of the application/incase file is submitted by <?php echo $b_av;?>.</li>
    <li>Promptly advise the Client of any communications from the Visa Centre/Embassy.</li>
    <li>During the processing of the application, advise the Client of any changes in the law or other policy requirements affecting the visa application.</li>
 <?php } else if($type==3){ ?>
    <li>Advisory services relating to the Client’s intent to get student visa.</li>
    <li>Provide truthful and sincere advice regarding the prospects of success in obtaining overseas education.</li>
    <li>Analyze current immigration law relating to the student visa category or review application. </li>
    <li>Assist in the completion and/or checking of relevant application forms.</li>
    <li>Provide advice and assistance relating to documentation required to support the application.</li>
    <li>Prepare necessary supporting submissions to be filed before the relevant university/college and Embassy.</li>
    <li>Submit the application to the relevant university/college/embassy/visa office for processing as soon as possible.</li>
    <li>Wherever possible, supply any further documentation or information requested by the university/college on receipt of documents from the Client.</li>
    <li>Wherever possible, assist the Client to comply with any  request made by the university/college and Embassy.</li>
    <li>Keep the Client fully informed of all developments concerning the progress of the application.</li>
    <li>Promptly advise the Client of any communications from the university/college and Embassy.</li>
    <li>During the processing of the application, advise the Client of any changes in the law or other policy requirements affecting the visa application.</li>
    <li>Advise the Client promptly of the outcome of the application.</li>
  <?php } 
 elseif($type==4){?>
    <li>Advisory services relating to the Client’s intent to migrate to <?php echo $country;?><?php echo ($lead1["country_interest"]==1?" as per available visa subclass(189/190/491).":" and his/her choice of visa category.");?></li>
    <li>Provide truthful and sincere advice regarding the prospects of success in obtaining permanent residence.</li>
    <li>Analyze current immigration law relating to the nominated visa category or review application. </li>
    <li>Assist in the completion and/or checking of relevant application forms.</li>
    <li>Provide advice and assistance relating to documentation required to support the application.</li>
    <li>Prepare necessary supporting submissions to be filed before the relevant state/regional authority or department for visa application.</li>
    <li>Submit the application to the relevant authority, department or review body for processing as soon as possible.</li>
    <li>Wherever possible, supply any further documentation or information requested by the assessing authority, department or review body on receipt of documents from the Client.</li>
    <li>Wherever possible, assist the Client to comply with any  request made by the state/regional authority, department or review body.</li>
    <li>Keep the Client fully informed of all developments concerning the progress of the application.</li>
    <li>Promptly advise the Client of any communications recieved.</li>
    <li>During the processing of the application, advise the Client of any changes in the law or other policy requirements affecting the visa application.</li>
    <li>Advise the Client promptly of the outcome of the application.</li>
    <li>Provide post grant migration advice regarding visa conditions and requirements.</li>
    <li>Provide other services set out in Annexure 1.</li>
  <?php }  
  elseif($type==6) {?>
  <li>Advisory services relating to the Client’s intent to migrate to <?php echo $country;?>.</li>
    <li>Provide truthful and sincere advice regarding the prospects of success in obtaining Education Credential Assessment.</li>
    <li>Assist in the completion and/or checking of relevant application forms.</li>
    <li>Provide advice and assistance relating to documentation required to support the application.</li>
    <li>Prepare necessary supporting submissions to be filed before the relevant assessing authority, department or review body for visa application.</li>
    <li>Submit the application to the relevant assessing authority, department or review body for processing as soon as possible.</li>
    <li>Wherever possible, supply any further documentation or information requested by the assessing authority, department or review body on receipt of documents from the Client.</li>
    <li>Wherever possible, assist the Client to comply with any  request made by the assessing authority, department or review body.</li>
    <li>Keep the Client fully informed of all developments concerning the progress of the application.</li>
    <li>Promptly advise the Client of any communications from the department or review body.</li>
    <li>During the processing of the application, advise the Client of any changes in the law or other policy requirements affecting the visa application.</li>
    <li>Advise the Client promptly of the outcome of the application.</li>
    <?php }
else if ($type==8) { ?>
    <li>Advisory services relating to the Client’s intent to migrate to <?php echo $country;?> based on province requirement/eligibility.</li>
    <li>Provide truthful and sincere advice regarding the prospects of success in obtaining permanent residence.</li>
    <li>Analyze current immigration law relating to the PNP category or review application. </li>
    <li>Assist in the completion and/or checking of relevant application forms.</li>
    <li>Provide advice and assistance relating to documentation required to support the application.</li>
    <li>Prepare necessary supporting submissions to be filed before the relevant PNP authority, department or review body for application.</li>
    <li>Submit the application to the relevant PNP authority, department or review body for processing as soon as possible.</li>
    <li>Wherever possible, supply any further documentation or information requested by the assessing authority, department or review body on receipt of documents from the Client.</li>
    <li>Wherever possible, assist the Client to comply with any  request made by the PNP authority, department or review body.</li>
    <li>Keep the Client fully informed of all developments concerning the progress of the application.</li>
    <li>Promptly advise the Client of any communications from the department or review body.</li>
    <li>During the processing of the application, advise the Client of any changes in the law or other policy requirements affecting the PNP application.</li>
    <li>Advise the Client promptly of the outcome of the application.</li>
    <li>Provide other services set out in Annexure 1.</li>
  <?php } 
 else { ?>
    <li>Advisory services relating to the Client’s intent to migrate to <?php echo $country;?><?php echo ($lead1["country_interest"]==1?" as per available visa subclass(189/190/491).":".");?></li>
    <li>Provide truthful and sincere advice regarding the prospects of success in obtaining permanent residence.</li>
    <li>Analyze current immigration law relating to the nominated visa category or review application. </li>
    <li>Assist in the completion and/or checking of relevant application forms.</li>
    <li>Provide advice and assistance relating to documentation required to support the application.</li>
    <li>Prepare necessary supporting submissions to be filed before the relevant assessing authority, department or review body for visa application.</li>
    <li>Submit the application to the relevant assessing authority, department or review body for processing as soon as possible.</li>
    <li>Wherever possible, supply any further documentation or information requested by the assessing authority, department or review body on receipt of documents from the Client.</li>
    <li>Wherever possible, assist the Client to comply with any  request made by the assessing authority, department or review body.</li>
    <li>Keep the Client fully informed of all developments concerning the progress of the application.</li>
    <li>Promptly advise the Client of any communications from the department or review body.</li>
    <li>During the processing of the application, advise the Client of any changes in the law or other policy requirements affecting the visa application.</li>
    <li>Advise the Client promptly of the outcome of the application.</li>
    <li>Provide post grant migration advice regarding visa conditions and requirements.</li>
    <?php if($type!=5){ ?>
    <li>Provide other services set out in Annexure 1.</li>
  <?php }} ?>
</ol>
<!--footer-->
<!--header-->
<div  class="cls_003"><span class="cls_003">3.&nbsp;&nbsp;&nbsp; WHO WILL PERFORM THE SERVICES</span></div>
<ol type="a">
<?php if(($type==2 || $type==9)){}
else if ($type==3){?>
  <li>The Client acknowledges and consents that the Services of student visa assistance set out in this Agreement will be delegated to education team of <?php echo $b_av;?>.</li>
<?php }
else if($type==6){ ?>
  <li>The Client acknowledges and consents that the Services of assistance set out in this Agreement will be delegated to authorized immigration officers of <?php echo $b_av;?>.</li>
<?php } elseif($type==8){ ?>
  <li>The Client acknowledges and consents that the Services of immigration assistance set out in this Agreement will be delegated to authorized immigration officers of <?php echo $b_av;?>(if applicable).</li>
<?php } else{ ?>
	<li>The Client acknowledges and consents that the Services of immigration assistance set out in this Agreement will be delegated to authorized immigration officers of <?php echo $b_av;?>.</li>
<?php }?>
	<li>Administrative services may be provided by other staff.</li>
</ol>
<div  class="cls_003"><span class="cls_003">4.&nbsp;&nbsp;&nbsp; <?=$b_av;?> COVENANTS THAT IT</span></div>
<ol type="a">
	<li>Is authorized to provide services as per terms of this Agreement.</li>
	<li>Has sufficient knowledge of the relevant laws and processes to be able to competently provide the agreed services.</li>
	<li>Will advise the Client in writing, if in <?php echo $b_av;?>’s opinion, the application is vexatious or grossly unfounded.</li>
	<li>Will act in accordance with the law and in the best interests of the Client, and deal with the Client competently, diligently and fairly.</li>
	<li>Will ensure that the Client has access to an interpreter if necessary. (The Client will be required to pay any fees charged by the interpreter.)</li>
</ol>
<div  class="cls_003"><span class="cls_003">5.&nbsp;&nbsp;&nbsp; CLIENT’S OBLIGATIONS</span></div>
<div  class="cls_002"><span class="cls_002">5.1 &nbsp;&nbsp;&nbsp; Client’s Obligations are set out in <?php echo (($type==2 || $type==9)?"1":"2")?>.</span></div>
<div  class="cls_002"><span class="cls_002">5.2 &nbsp;&nbsp;&nbsp; The Client acknowledges and confirms that:</span></div>
<ol type="a">
  <?php if($type==2 || $type==9){?>
    <li>Services are limited to advising about <?php echo ($type==2?"Visit/Tourist Visa":"Dependent Visa");?> law and process for filing visa application. <?php echo $b_av;?> will be unable to predict future changes in the law and/or whether or not the Client’s application will be accepted/rejected.</li>
    <li>The Client will respond promptly to requests by <?php echo $b_av;?> for further information or documents.</li>
    <li>The Client will not hold <?php echo $b_av;?> responsible for delays caused by the Client’s failure to promptly provide correct information or documents.</li>
    <li><?php echo $b_av;?> will be under no obligation to submit the Client’s application to the Visa Centre/Embassy.</li>
  <li>The final decision on an application submitted is beyond <?php echo $b_av;?>’s control͘ Nothing contained herein shall be construed as guaranteed success of any application.</li>
  <li><?php echo $b_av;?> will not be liable for any loss arising from changes to the law affecting the Client’s application, which occurs after filling of the application. The Client bears the risk that changes in law may cause an application to be refused.</li>
  <?php }
  else if($type==3){ ?>
   <li>Services are limited to advising about student visa laws and process for filing visa application. <?php echo $b_av;?> will be unable to predict future changes in the law and/or whether or not the Client’s application will be accepted/rejected.</li><li>The Client will respond promptly to requests by <?php echo $b_av;?> for further information or documents.</li>
  <li>The Client will not hold <?php echo $b_av;?> responsible for delays caused by the Client’s failure to promptly provide correct information or documents.</li>
  <li><?php echo $b_av;?> will be under no obligation to submit the Client’s application to the university/college and Embassy until payment has been made in full of all fees due and payable at that stage.</li>
  <li>The final decision on an application submitted to university/college or Embassy is beyond <?php echo $b_av;?>’s control. Nothing contained herein shall be construed as guaranteed success of any application.</li>
  <li><?php echo $b_av;?> will not be liable for any loss arising from changes to the law affecting the Client’s application, which occurs after filling of the application. The Client bears the risk that changes in student visa law may cause an application to be refused.</li>
    <?php } 
  else if($type==6){ ?>
  <li>Services are limited to advising about Education Credential Assessment. <?php echo $b_av;?> will be unable to predict future changes in the law and/or whether or not the Client’s application will be accepted/rejected.</li>
  <li>The Client will respond promptly to requests by <?php echo $b_av;?> for further information or documents.</li>
  <li>The Client will not hold <?php echo $b_av;?> responsible for delays caused by the Client’s failure to promptly provide correct information or documents.</li>
  <li><?php echo $b_av;?> will be under no obligation to submit the Client’s application to the assessing authority, department or review body until payment has been made in full of all fees due and payable at that stage.</li>
  <li>The final decision on an application submitted to assessing authority, department or review body is beyond <?php echo $b_av;?>’s control. Nothing contained herein shall be construed as guaranteed success of any application.</li>
  <li><?php echo $b_av;?> will not be liable for any loss arising from changes to the law affecting the Client’s application, which occurs after filling of the application. The Client bears the risk that changes in immigration law may cause an application to be refused.</li>
  <?php } else if($type==8){ ?>
      <li>Services are limited to advising about Immigration law and process for filing PNP application. <?php echo $b_av;?> will be unable to predict future changes in the law and/or whether or not the Client’s application will be accepted/rejected.</li><li>The Client will respond promptly to requests by <?php echo $b_av;?> for further information or documents.</li>
      <li>The Client will not hold <?php echo $b_av;?> responsible for delays caused by the Client’s failure to promptly provide correct information or documents.</li>
      <li><?php echo $b_av;?> will be under no obligation to submit the Client’s application to the PNP authority, department or review body until payment has been made in full of all fees due and payable at that stage.</li>
      <li>The final decision on an application submitted to PNP authority, department or review body is beyond <?php echo $b_av;?>’s control. Nothing contained herein shall be construed as guaranteed success of any application.</li>
      <li><?php echo $b_av;?> will not be liable for any loss arising from changes to the law affecting the Client’s application, which occurs after filling of the application. The Client bears the risk that changes in immigration law may cause an application to be refused.</li>
    <?php } else{ ?>
   <li>Services are limited to advising about Immigration law and process for filing visa application. <?php echo $b_av;?> will be unable to predict future changes in the law and/or whether or not the Client’s application will be accepted/rejected.</li><li>The Client will respond promptly to requests by <?php echo $b_av;?> for further information or documents.</li>
  <li>The Client will not hold <?php echo $b_av;?> responsible for delays caused by the Client’s failure to promptly provide correct information or documents.</li>
  <li><?php echo $b_av;?> will be under no obligation to submit the Client’s application to the <?php echo ($type==4?"any":"assessing")?> authority, department or review body until payment has been made in full of all fees due and payable at that stage.</li>
  <li>The final decision on an application submitted to assessing authority, department or review body is beyond <?php echo $b_av;?>’s control. Nothing contained herein shall be construed as guaranteed success of any application.</li>
  <li><?php echo $b_av;?> will not be liable for any loss arising from changes to the law affecting the Client’s application, which occurs after filling of the application. The Client bears the risk that changes in immigration law may cause an application to be refused.</li>
    <?php } ?>
	
	<li><?php echo $b_av;?> is under no obligation to provide any refund should the application be refused for reasons outside the <?php echo $b_av;?>’s control.</li>
	<li>The Client<?php echo ($type==3?"/Sponsor":"")?> will not sell property, leave employment, finalise any business or personal affairs or take similar steps in anticipation of obtaining a <?php echo ($type==8?"Nomination":"visa")?>.</li>
	<li>All information provided to <?php echo $b_av;?> is true and current and that all documents supplied are genuine and authentic.</li>
	<li>The Client will, during the processing of an application, notify <?php echo $b_av;?> of any material changes in the circumstances of the Client or the Client’s immediate family.</li>
	<li>If <?php echo $b_av;?> has advised the Client in writing that in the <?php echo $b_av;?>’s opinion, an application would be vexatious or grossly unfounded; the Client will provide written acknowledgement of the receipt of the advice, if notwithstanding the advice, the Client still intends to file the application. The Client is aware that the provision of false information or documents is likely to lead to an application being refused.</li>
  <?php if($type==2 || $type==9){?>
    <li>The Client is aware that failure to make prompt payments to the concerned Visa Centre/Embassy may lead to an application being refused.</li>
    <li>The Client agrees that <?php echo $b_av;?> is not the sole contact with concerned authorities and the Client will not contact such authorities without consent of <?php echo $b_av;?>. The Client agrees that if the Client breaches the terms of this clause, <?php echo $b_av;?> has the right to terminate the Agreement, or in the alternative <?php echo $b_av;?> has the right to charge additional fees for any additional services required as a result of the breach.</li>
    <?php }else{
      if($type==8){ ?>
        <li>The Client is aware that failure to make prompt payments to the concerned authorities, review body or PNP body may lead to an application being refused.</li>
      <?php } elseif ($type==3){ ?> 
        <li>The Client is aware that failure to make prompt payments to the concerned university/college or Embassy may lead to an application being refused.</li>
      <?php }  else{ ?> 
        <li>The Client is aware that failure to make prompt payments to the concerned authorities, review body or skills assessment body may lead to an application being refused.</li>
      <?php } ?>
     
  <li>The Client agrees that <?php echo $b_av;?> is the sole contact with concerned authorities and the Client will not contact such authorities without consent of <?php echo $b_av;?>. The Client agrees that if the Client breaches the terms of this clause, <?php echo $b_av;?> has the right to terminate the Agreement, or in the alternative <?php echo $b_av;?> has the right to charge additional fees for any additional services required as a result of the breach.</li>
      <?php }?>
	
	<li>If due to any reason the Client is unsatisfied with the Services of <?php echo $b_av;?>, the Client may terminate this Agreement pursuant to clause 6.</li>
</ol>
<!--footer-->
<!--header-->
<div  class="cls_003"><span class="cls_003">6.&nbsp;&nbsp;&nbsp; TERMINATION OF AGREEMENT</span></div>
<ol type="a">
  <?php if ($type==2 || $type==9){ ?>
  <li>This Agreement shall automatically terminate upon expiry of 3 months from the date of signing by the Client.</li>
  <?php } elseif($type==3){ ?>
  <li>This Agreement shall automatically terminate upon expiry of fifteen months from the date of signing by the Client.</li>
<?php } elseif ($type==4){ ?>
  <li>This Agreement shall automatically terminate upon expiry of fifteen months from the date of signing by the Client.</li>
  <?php } else{ ?>
	<li>This Agreement shall automatically terminate upon expiry of <?php echo ($lead1["country_interest"]==1?"eighteen":"fifteen");?> months from the date of signing by the Client.</li>
<?php } ?>

  <li>Either Party may terminate this Agreement:</li>
	<ol type="i">
		<li>For convenience by giving <?php echo (($type==2 || $type==9)?"2":"7");?> days written notice to the other Party.</li>
		<li>Forthwith due to breach of material terms of this Agreement by the other Party.</li>
	<li>If the Client mis-behaves with any of <?php echo $b_av;?> employee/representative of the Client.</li>
	</ol>
	<li>Upon termination of the Agreement, all liabilities of <?php echo $b_av;?> shall be discharged and <?php echo $b_av;?> shall not be liable to refund any fees to the Client.
	<ol type="i">
		<li><?php echo $b_av;?> shall provide the Client with breakup of different services provide until the termination and applicable fees on hourly basis amount to be deducted from the fees already paid.</li>
		<li>Unless otherwise agreed by <?php echo $b_av;?>, upon termination of the Agreement, all liabilities of <?php echo $b_av;?> shall be discharged and <?php echo $b_av;?> shall not be liable to refund any fees to the Client.</li>
	</ol>
	</li>
</ol>
<div  class="cls_003"><span class="cls_003">7.&nbsp;&nbsp;&nbsp; RETENTION OF DOCUMENTS</span></div>
<ol type="a">
  <?php if($type==2 || $type==9){?>
    <li><?php echo $b_av;?> agrees to keep securely and in a way which will ensure confidentiality all documents provided by, or on behalf of, the Client or paid for by, or on behalf of, the Client until the earlier of: (i) 1 month after the date of the last action on the file for the Client; or (ii) when the documents are given to the Client or dealt with in accordance with the Client’s written instructions.</li>
    <li>The Client will ensure they collect their original documents (if any) from <?php echo $b_av;?> within 7 days of receipt of intimation from the visa authorities of approval or rejection of the Client’s visa application.</li>
  <?php } elseif($type==3){?>
    <li><?php echo $b_av;?> agrees to keep securely and in a way which will ensure confidentiality all documents provided by, or on behalf of, the Client or paid for by, or on behalf of, the Client until the earlier of: (i) 15 months after the date of the last action on the file for the Client; or (ii) when the documents are given to the Client or dealt with in accordance with the Client’s written instructions.</li>
    <li>The Client will ensure they collect their original documents (if any) from <?php echo $b_av;?> within 7 days of receipt of intimation from the visa authorities of approval or rejection of the Client’s visa application.</li>
      <?php } elseif($type==4){ ?>
    <li><?php echo $b_av;?> agrees to keep securely and in a way which will ensure confidentiality all documents provided by, or on behalf of, the Client or paid for by, or on behalf of, the Client until the earlier of: (i) 15 months after the date of the last action on the file for the Client; or (ii) when the documents are given to the Client or dealt with in accordance with the Client’s written instructions.</li>
    <li>The Client will ensure they collect their original documents (if any) from <?php echo $b_av;?> within 21 days of receipt of intimation from the visa authorities of approval or rejection of the Client’s visa application.</li>
      <?php } else{?>
    <li><?php echo $b_av;?> agrees to keep securely and in a way which will ensure confidentiality all documents provided by, or on behalf of, the Client or paid for by, or on behalf of, the Client until the earlier of: (i) <?php echo ($lead1["country_interest"]==1?"18 months":"15 months");?> after the date of the last action on the file for the Client; or (ii) when the documents are given to the Client or dealt with in accordance with the Client’s written instructions.</li>
    <li>The Client will ensure they collect their original documents (if any) from <?php echo $b_av;?> within 21 days of receipt of intimation from the visa authorities of approval or rejection of the Client’s visa application.</li>
      <?php }?>

	
</ol>
<div  class="cls_003"><span class="cls_003">8.&nbsp;&nbsp;&nbsp; CONFIDENTIALITY</span></div>
<ol type="a">
	<li><?php echo $b_av;?> will preserve the confidentiality of the Client.  <?php echo $b_av;?> will not disclose or allow to be disclosed confidential information of the Client or the Client’s business without the Client’s written consent, unless required by law.</li>
  <?php if($type==2 || $type==9){?>
      <li>Client acknowledges and agrees that his/her details will be shared by <?php echo $b_av;?> for the purposes of immigration process with the third parties including without limitation agents for hotel booking / flight reservation / insurance company and similar other institutions/agents and share the Client’s details for marketing, branding for promotional activities.</li>
  <?php }elseif($type==3){ ?>
      <li>Client acknowledges and agrees that his/her details will be shared by <?php echo $b_av;?> for the purposes of student visa process with the universities/colleges and embassy including without limitation agents for similar other institutions/agents and share the Client’s details for marketing, branding for promotional activities.</li>
 <?php }else{?>
      <li>Client acknowledges and agrees that his/her details will be shared by <?php echo $b_av;?> for the purposes of <?php echo ($type==8?"PNP nomination":"immigration")?> process with the third parties including without limitation agents for <?php echo ($type==4 || $type==5?"":"ECA,")?> Notary, IELTS and similar other institutions/agents and share the Client’s details for marketing, branding for promotional activities.</li>
 <?php }?>

	
</ol>
<div  class="cls_003"><span class="cls_003">9.&nbsp;&nbsp;&nbsp; RESOLUTION OF DISPUTES</span></div>
<ol type="a">
	<li>If a dispute arises—out of or relating to this Agreement, or the breach, termination, validity, or subject matter thereof, or as to any related claim in restitution or at law, in equity or pursuant to any statute—the parties agree to discuss the dispute with the aim of reaching an agreement that is acceptable to both sides.   The Agreement will be documented in writing, dated and signed by both <?php echo $b_av;?> and the Client.</li>
	<li>If one party requests an opportunity to discuss the dispute, the parties should attempt to reach an agreement within 21 days of that request (or a longer period if agreed between the parties).</li>
 <li>If the parties cannot reach an agreement within 21 days, the parties agree to refer the dispute exclusively to <?php echo($lead1['region']==3||$lead1['region']==4||$lead1['region']==5?"Dubai International Financial Centre (DIFC)":"");?> courts in <?php echo $b_city." ,".$b_country;?>. Parties undertake that they shall refrain from maligning each other on social media. If the Client for any reason mis-behaves with <?php echo $b_av;?> employees/representatives and/or choses to malign <?php echo $b_av;?> on social media without first obtaining a judgment/order in his/her favor from the courts in <?php echo $b_country;?>, <?php echo $b_av;?> shall be entitled to recover suitable damages from the Client which shall be in addition to any other legal recourse <?php echo $b_av;?> may have against the Client.</li>
	<li>This Agreement shall be governed by the laws of <?php echo $b_city." ,".$b_country;?>. </li>

</ol>
<!--footer-->
<!--header-->
<div  class="cls_003"><span class="cls_003">10.&nbsp;&nbsp;&nbsp; Miscellaneous</span></div>
<div  class="cls_002"><span class="cls_002">10.1 &nbsp;&nbsp;&nbsp;</span><span class="cls_003"> Force Majeure.</span><span class="cls_002"> Neither Party will be liable to the other for failure to fulfil its obligations hereunder if such failure is due to causes beyond control, including, without limitation, acts of God, earthquake,  fire,  flood,  embargo,  catastrophe,  sabotage,  utility  or  transmission  failure, governmental prohibitions or regulations, national emergencies, insurrection, riots or wars or viruses which did not result from the acts or omissions of such Party, its employee or agents, strikes, work stoppages or other labor difficulties, unavailability or delays in transportation, default of suppliers ("Force Majeure Event"). The time for any performance required hereunder will be extended by the delay incurred because of such Force Majeure Event. If such Force Majeure Event continues for a period of (ninety) 90 days, then either party may terminate this Agreement.</span></div>
<div  class="cls_002"><span class="cls_002">10.2 &nbsp;&nbsp;&nbsp; </span><span class="cls_003">Entire Agreement.</span><span class="cls_002"> This Agreement constitutes the entire understanding between the Parties with respect to the subject matter of this Agreement and supersedes all prior agreements, negotiations and discussions between the Parties relating to it.</span></div>

<div  class="cls_002"><span class="cls_002">10.3&nbsp;&nbsp;&nbsp;</span><span class="cls_003">Assignment.</span><span class="cls_002"> Client shall not assign and/or transfer his/her rights and/or obligations under this Agreement without prior written consent of the other Party.</span></div>
<div  class="cls_002"><span class="cls_002">10.4&nbsp;&nbsp;&nbsp;</span><span class="cls_003">Notices.</span><span class="cls_002"> All notices, requests, demands, consents, waivers or other communications required to be given by either Party to the other pursuant to this Agreement shall be in English, in writing on the address mentioned in this Agreement.</span></div>

<div  class="cls_002"><span class="cls_002">10.5&nbsp;&nbsp;&nbsp;</span><span class="cls_003">Counterparts.</span><span class="cls_002"> This Agreement may be executed in two or more counterparts, each of which shall be deemed an original, but all of which together shall constitute one and the same instrument, and in pleading or proving any provision of this Agreement, it shall not be necessary to produce >more than one of such counterparts.</span></div>
<div class="cls_002"><span class="cls_002">10.6&nbsp;&nbsp;&nbsp;</span><span class="cls_003">Language.</span><span class="cls_002"> This Agreement may be executed in different languages. Parties agree that in the event of discrepancy, the English version of this Agreement shall prevail over any other versions of this Agreement.</span></div>

<pagebreak />
<!--footer-->
<!--header-->
<!-- visi visa not included this part -->
<?php if($type!=2 && $type!=3 && $type!=4 && $type!=5 && $type!=6 && $type!=9){ ?>
<div class="cls_003" align="center"><span class="cls_003">Annexure 1</span><br/>
<span class="cls_003"><?php echo $b_av;?>’s Obligations</span></div>

<div  class="cls_002"><span class="cls_002">In addition to the Services set out in clause 2, <?php echo $b_av;?> shall provide following services to the Client:</span></div>
<div  class="cls_002"><span class="cls_002">1.&nbsp;&nbsp;&nbsp;</span><span class="cls_003">Post Landing Services<?php echo ($type==8?"(only in Toronto)":""); ?> - </span><span class="cls_002">The <?php echo $b_av;?> shall provide following services through its associate post the Client’s immigration application is accepted:</span></div>
<ol type="a">
	<li>Arrange for Client’s transfers from the International Airport in <?php echo $country;?> if the Client books guest house accommodation through <?php echo $b_av;?>.</li>
	<li>Assist the Client in applying for TFN (Tax file number).</li>
	<li>Assist the Client in the opening a bank account and applying for bank debit and credit cards.</li>
	<li>Assist the Client in applying for applicable Health Insurance Plan in <?php echo $country;?>.</li>
	<li>Provide the Client with relevant information on private health insurance companies in <?php echo $country;?> to purchase temporary health insurance during the waiting in 30 days to get government health insurance.</li>
	<li>Share with Client information on Child and Social Welfare schemes available in <?php echo $country;?>.</li>
	<li>Guide the Client on the process for hiring private accommodation and information on rentals and prices.</li>
	<li>Guide the Client for admission of Clients children in school/college/university.</li>
	<li>Inform the Client on public transportation.</li>
	<li>Information on Income Tax structure.</li>
	<li>Guide the Client on the process for obtaining <?php echo ($lead1["country_interest"]==1?"Australian":"Canadian");?> Driving License.</li>
	<li>Professional Guidance for the intended occupations.</li>
	<li>Inform the Client on relevant education and professional bridging courses to be taken and other related details like costs and duration of the classes.</li>
	<li>Guide the Client for enhancing skill level by joining requisite courses important to search for a job in own profession in <?php echo $country;?>.</li>
	<li>Guide the Client on free access to various job banks through Government and other private placement agencies in <?php echo $country;?>.</li>
	<li>Guide the Client on free job search information and workshops available through Government libraries and employment resource centers in <?php echo $country;?>.</li>
</ol>

<!-- <div  class="cls_002"><span class="cls_002">2.&nbsp;&nbsp;&nbsp;</span><span class="cls_003">IELTS Training - </span><span>We provide IELTS training for the period of 6 months from the date of signing the Agreement.</span> -->

<!--footer-->
<!--header-->
<pagebreak />
<?php } ?>
<div class="cls_003" align="center"><span class="cls_003">Annexure <?php echo ($type==2 || $type==3 || $type==4 || $type==5 || $type==6 || $type==9?"1":"2")?></span><br/>
<span class="cls_003">Obligations of the Client</span></div>
<div  class="cls_002"><span class="cls_002">1.&nbsp;&nbsp;&nbsp;</span><span class="cls_002">To help <?php echo $b_av;?> assist the Client effectively, and to reduce the costs of representation, the Client understands and agrees to the following terms and conditions.</span></div>
<div  class="cls_002"><span class="cls_002">1.1&nbsp;&nbsp;&nbsp;</span><span class="cls_003">Documents</span></div>
<ol type="a">
	<li>The Client shall provide all documents required by the visa processing departments in <?php echo $country;?>.  The Client shall be responsible for ensuring the accuracy of any forms they sign or documents they provide to <?php echo $b_av;?>. The Client will review all forms before providing them to <?php echo $b_av;?>.</li>
	<li>The Client will not sign forms or other papers from government bodies or other organizations until <?php echo $b_av;?> reviews the documents first. This shall not relive the Client from its obligations to provide true and accurate information.</li>
  <?php if($type==2 || $type==3 || $type==9){?>
    <li> All documentation must be in English or as required for Legal Translation.</li>
    <?php }else{?>
    <li> <?php echo ($lead1["country_interest"]==1?"All documentation must be in English.":"All documentation must be in English or French,or with an English or French Legal translation.");?></li>
      <?php }
  if($type==3){ ?>
	   <li>The Client will provide all translation along with a sworn statement from a person fluent in both English and the language of the documents. The translator cannot be Client or one of Client’s relatives. An accredited translator must translate all required document as applicable.</li>
  <?php } else{ ?>
    <li>The Client will provide all translation along with a sworn statement from a person fluent in both English and the language of the documents. The translator cannot be Client or one of Client’s relatives. An accredited translator must translate police certificates.</li>
  <?php } ?>
  </ol>
<?php if($type==2 || $type==9) {}
elseif($type==3){?>
  
  <div  class="cls_002"><span class="cls_002">1.2&nbsp;&nbsp;&nbsp;</span><span class="cls_003">Education Documents Assessment</span></div>
  <ol type="a">
    <li>The Client shall submit complete documents, with <?php echo $b_av;?> within 15 days of the signing of this contract.</li>
    <li>The Client will ensure that his/her educational documents are recognized by the government of the country where the institution is located.</li>
    <li><?php echo $b_av;?> will not be responsible for an incorrect assessment if the Client does not disclose that their documents are from an unrecognized institution.</li>
    <li><?php echo $b_av;?> will not be responsible for any delay in the process or change in procedures by the university/college or emabssy. </li>
    <li><?php echo $b_av;?> shall not be responsible if the Client’s application cannot be presented due to  insufficient documents. 
 </li>
  </ol>
<div  class="cls_002"><span class="cls_002">1.3&nbsp;&nbsp;&nbsp;</span><span class="cls_003">English Documents Proficiency Tests- IELTS/TOEFL/PTE(A)/SAT/GRE/GMAT or any other applicable</span></div>
<ol type="a">
  <li>The Client must attain high proficiency in all four areas of their language exam to qualify. The minimum pass mark is six bands in each module. </li>

  <li>If the Client estimated their level of language proficiency in the initial assessment, they acknowledge that <?php echo $b_av;?> determined their student visa based on that estimate. </li>
  <li><?php echo $b_av;?> shall not be responsible in any manner whatsoever if the student visa application cannot be submitted because the Client scores are below 6 or 6.5 or not sufficient for university/college or Embassy english language proficiency test results.</li>
  <li>To increase the probability of admission, the Client should try to score maximum scores in the exam and in the respective module.</li>
  <li>Submit your IELTS/TOEFL/PTE score card at the earliest of the signing of this Agreement. </li>
</ol>
  <?php }
  else{
      if($lead1["country_interest"]==1){  ?>
	<li><?php echo $b_av;?> will not be responsible for:</li>
	<ol type="i">
		<li>an incorrect assessment if the Client does not disclose that their credentials are from an unrecognized institution or if the Client has credentials that are found to be fraudulent.</li>
		<li>any delay in the process or change in procedures by the authorities in <?php echo $country;?>.</li>
	</ol>
	<li><?php echo $b_av;?> shall not be responsible if the Client’s application cannot be presented due to unverifiable credentials, insufficient credentials, or a lack of points based on the credential assessment.</li>
</ol>
<div  class="cls_002"><span class="cls_002">1.2&nbsp;&nbsp;&nbsp;</span><span class="cls_003">English Proficiency Tests (IELTS)</span></div>
<ol type="a">
	<li>The Client must attain high proficiency in all four areas of their language exam to qualify for <?php echo ($lead1["country_interest"]==1?"Australian":"Canadian");?> immigration Visa. The minimum pass mark is six bands in each module<?php echo ($lead1["country_interest"]==2?" or Canadian Language Benchmark (CLB - 7)":"");?>.</li>
	<li>Even if the Client meets <?php echo ($lead1["country_interest"]==2?"CLB - 7":"passing marks in all 6 bands");?>, they must still earn an overall score high enough to reach <?php echo ($lead1["country_interest"]==2?"67":"65");?> points or above, which is the minimum point requirement to qualify for the <?php echo ($lead1["country_interest"]==1?"Australian":"Canadian");?> immigration Visa.</li>
	<li>If the Client estimated their level of language proficiency in the initial assessment by themselves, they acknowledge that <?php echo $b_av;?> determined their eligibility to apply for <?php echo ($lead1["country_interest"]==1?"Australian":"Canadian");?> Immigration based on that estimate.</li>
	<li><?php echo $b_av;?> shall not be responsible in any manner whatsoever if the Immigration application cannot be submitted because the Client scores are below the scores required by the authorities in <?php echo $country;?> or falls short of the required <?php echo ($lead1["country_interest"]==2?"67":"65");?> points based on language proficiency test results (6 in each module minimum).</li>
<?php if($lead1["country_interest"]==1){?>
  <li>To increase the probability of invitation, the Client should try to score above 65 points <?php echo ($type==4?"or":"and to enhance the chances client should");?> score 79 and above in PTE(A) and 8 and above in IELTS(General/Academic) as applicable.</li>
<?php } else { ?>
  <li>To increase the probability of invitation, the Client should try to score above 67 points and to enhance the chances client should score 8 and above in IELTS(General/Academic) as applicable.</li>
<?php }?>
		
		<li>Submit your IELTS or equivalent test score card within 90-120 days of the signing of this Agreement.</li>
</ol>
<?php } else if($lead1["country_interest"]==2){?>
</ol>
<?php if ($type!=7){ ?>
	<div  class="cls_002"><span class="cls_002">1.2&nbsp;&nbsp;&nbsp;</span><span class="cls_003">Education Credential Assessment (ECA)</span></div>
	<ol type="a">
		<li>The Client shall submit complete documents required for Client’s Educational Credential Assessment (ECA), with <?php echo $b_av;?> within 15 days of the signing of this contract.</li>
		<li>The Client will ensure that his/her educational credentials are recognized by the government of the country where the institution is located.</li>
		<li><?php echo $b_av;?> will not be responsible for an incorrect assessment if the Client does not disclose that their credentials are from an unrecognized institution or if the Client has credentials that are found to be fraudulent.</li>
		<li><?php echo $b_av;?> will not be responsible for any delay in the process or change in procedures by the ECA body. </li>
		<li>As the ECA assessment is done by a third party, the Client's educational experience, and the procedure to determine its equivalency to Canadian standards is treated as an independent process. </li>
		<li><?php echo $b_av;?> shall not be responsible if the Client’s application cannot be presented due to unverifiable credentials, insufficient credentials, or a lack of points based on the credential assessment. 
 </li>
	</ol>
  <?php if($type!=6){ ?>
<div  class="cls_002"><span class="cls_002">1.3&nbsp;&nbsp;&nbsp;</span><span class="cls_003">English/French Proficiency Tests (IELTS, CELPIP, TEF)</span></div>
<ol type="a">
	<li>The Client must attain high proficiency in all four areas of their language exam to qualify for the FSWP. The minimum pass mark is six bands in each module or Canadian Language Benchmark (CLB - 7). </li>
	<li>Even if the Client meets CLB - 7, they must still earn an overall score high enough to reach 67 points, which is the minimum point requirement to qualify for the FSWP.</li>
	<li>If the Client estimated their level of language proficiency in the initial assessment, they acknowledge that <?php echo $b_av;?> determined their Immigration eligibility based on that estimate. </li>
	<li><?php echo $b_av;?> shall not be responsible in any manner whatsoever if the Immigration application cannot be submitted because the Client scores below CLB 7(L-6.R-6, W-6, S-6) or falls short of the required 67 points based on language proficiency test results.</li>
	<li>To increase the probability of invitation, the Client should try to score CLB9 (L-8, R-7, W-7, S-7) bands in the respective module.</li>
	<li>Submit your IELTS/CELPIP/TEF score card within 90 days of the signing of this Agreement. </li>
</ol>
	<?php }}} 
} ?>
<!--footer-->
<!--header-->
<div  class="cls_002"><span class="cls_002"><?php if($type==6){ echo "1.3"; } else if($type==7){ echo "1.2"; } else { if($type==2 || $type==9){ echo "1.2"; } else { echo "1.4"; } }?>&nbsp;&nbsp;&nbsp;</span><span class="cls_003">Disclosure of medical Condition and Criminal/Security History</span></div>
<ol type="a">
	<li>The Client confirms that they and their dependents do not have any severe and communicable medical condition or a criminal record.</li>
  <?php  if($type==2 || $type==9){?>
      <li>The Client and their dependents must pass all medical and criminality/security background checks for the Client to be accepted. 
      </li>
      <li><?php echo $b_av;?> shall not be responsible if the application is rejected based on the results of a medical or criminal/security background check.</li>
    <?php } elseif ($type==3){?>
      <li>The Client and their dependents must pass all medical and criminality/security background checks for the Client to be accepted. 
      </li>
      <li><?php echo $b_av;?> shall not be responsible if the application is rejected based on the results of a medical or criminal/security background check.</li>
    <?php } else{
	if($lead1["country_interest"]==1){?>
    	<li>The  Client  and  their  dependents  must  pass  all  medical  and  criminality/security background checks for the Client’s application to be accepted.</li>
    	<li><?php echo $b_av;?> shall not be responsible if the client’s application is rejected based on the results of a medical or criminal/security background check.</li>
	<?php } else if($lead1["country_interest"]==2){?>
      <li>The Client and their dependents must pass all medical and criminality/security background checks for the Client to be accepted under the FSWP. 
      </li>
      <li><?php echo $b_av;?> shall not be responsible if the FSWP application is rejected based on the results of a medical or criminal/security background check.</li>
    <?php 
  }
}?>
</ol>
<div  class="cls_002"><span class="cls_002"><?php if($type==6){ echo "1.4"; } else if($type==7){ echo "1.3"; } else { if($type==2 || $type==9){ echo "1.3"; } else { echo "1.5"; } }?>&nbsp;&nbsp;&nbsp;</span><span class="cls_003">Misrepresentation</span></div>
<ol type="a">
	<li>The Client agrees not to provide false or inaccurate documents or information. If the Client misrepresents information, the application will be declined.</li>
  <?php if($type==2 || $type==3){?>
    <li>The Client may also be barred from entering <?php echo $country;?>, have a permanent record of fraud with government bodies, have their status as a lifelong resident taken away, be charged with a crime, or be removed from <?php echo $country;?>. The Client's misrepresentation may negatively impact the Client's dependents.</li>
  <?php } else{
    if($type!=9){?>
    <li>The Client may also be barred from entering <?php echo $country;?>, have a permanent record of fraud with government bodies, have their status as a lifelong resident or <?php echo ($lead1["country_interest"]==1?"Australian":"Canadian");?> citizenship taken away, be charged with a crime, or be removed from <?php echo $country;?>. The Client's misrepresentation may negatively impact the Client's dependents.</li>
  <?php }} ?>
	<li>The Client acknowledges that they are solely responsible for any adverse consequences if false or inaccurate documents or information is provided to <?php echo $b_av;?>.</li>
</ol>
<?php if($type!=6){ ?>
<?php if($lead1["country_interest"]==2){?>
<div  class="cls_002"><span class="cls_002"><?php if($type==2 || $type==9){ echo "1.4"; } else if($type==7){ echo "1.4"; } else { echo "1.6"; } ?>&nbsp;&nbsp;&nbsp;</span><span class="cls_003">Attending Interviews</span></div>
<ol type="a">
	<li>
		The Client and their accompanying family members over the age of 18 may be asked to participate in an interview at the Visa Office where the application is being processed.
	</li>
	<li>If the application is filed or transferred to a Visa Office outside the Client’s country of residence, they must attend an interview at that location if one is scheduled.</li>
	<li>The Client will not sign any forms or documents they do not understand during an interview. They have the right to consult with <?php echo $b_av;?> before signing anything unclear.</li>
	<li><?php echo $b_av;?> shall not be held responsible for any contradictory consequences resulting from the Client not attending a scheduled interview.</li>
</ol>
<?php }} ?>
<!--footer-->
<!--header-->
<?php if($type!=6){ ?> 
<div  class="cls_002"><span class="cls_002"><?php if($type==2 || $type==9){ echo "1.5"; } else if($type==7){ echo "1.5"; }  else { echo "1.7"; } ?>&nbsp;&nbsp;&nbsp;</span><span class="cls_003">Settlement Funds</span></div>
<ol type="a">
  <?php if($type==2 || $type==9){?>
    <li>The Client is aware that he/she must have sufficient settlement funds to apply for <?php echo($type==2?"visit":"");?> visa for <?php echo $country;?>.</li>
    <li>The Client cannot source the settlement funds from elsewhere. Proof of funds and its source must be provided with the application and again when the Client arrives at the <?php echo $country;?> border with a  valid visa.</li>
    <li>Lack of adequate funds or proof of source of sufficient funds may lead to a successful Client being refused visa at the border. The Client must provide recent documentation confirming the existence of these funds with them when they enter <?php echo $country;?> after being approved by the Embassy.</li>
    <li>The Client will make their own arrangements for travel and transferring funds to <?php echo $country;?>. <?php echo $b_av;?> does not provide help or provide assistance in this regard.</li>
  <?php } else if($type==3){?>
    <li>The Client is aware that he/she must have sufficient settlement funds to apply for student visa for <?php echo $country;?> (6 months).</li>
    <li>The Client cannot source the settlement funds from elsewhere. Proof of funds and its source must be provided with the application.</li>
    <li>Lack of adequate funds or proof of source of sufficient funds may lead to a successful Client being  refused for grant of student visa.</li>
    <li>The Client will make their own arrangements for travel and transferring funds to <?php echo $country;?>. <?php echo $b_av;?> does not provide help or provide assistance in this regard.</li>
    <?php }else{?>
    <li>The Client is aware that he/she must have sufficient settlement funds to apply for permanent residency in <?php echo $country."(".($lead1["country_interest"]==1?"3 to 4 months":"6 months").")";?>.</li>
    <li>The Client cannot source the settlement funds from elsewhere. Proof of funds and its source must be provided with the application and again when the Client arrives at the <?php echo $country;?> border with a  permanent resident visa.</li>
    <li>Lack of adequate funds or proof of source of sufficient funds may lead to a successful Client being refused permanent residence at the <?php echo ($lead1["country_interest"]==1?"Australian":"Canadian");?> border. The Client must provide recent documentation confirming the existence of these funds with them when they enter <?php echo $country;?> after being approved <?php echo ($lead1["country_interest"]==2?"under the FSWP":"");?>.</li>
    <li>The Client will make their own arrangements for travel and transferring funds to <?php echo $country;?>. <?php echo $b_av;?> does not provide help or provide assistance in this regard.</li>
    <?php }} ?>
	
</ol>
<div  class="cls_002"><span class="cls_002"><?php if($type==6){ echo "1.5"; } else if($type==7){ echo "1.6"; } else {  if($type==2 || $type==9){ echo "1.6"; } else { echo "1.8"; } }?>&nbsp;&nbsp;&nbsp;</span><span class="cls_003">Communication with <?php echo $b_av;?> & Government Bodies</span></div>
<ol type="a">
	<li>The preferred method of contact with <?php echo $b_av;?> is via email, and the Client agrees they will contact <?php echo $b_av;?> by email whenever possible.</li>
	<li>All communication between the Client and <?php echo $b_av;?> will be in English. Should the Client wish to make use of a translator at any stage of the process, the Client assumes full responsibility for any translation quality issues, and <?php echo $b_av;?> will not be responsible for any errors or miscommunications due to translation.</li>
	<li>The Client will immediately notify <?php echo $b_av;?> in writing if a government body or other organization contact them concerning this application. The Client will delay a response, if possible until <?php echo $b_av;?> can provide the Client with further instructions.</li>

</ol>
<div  class="cls_002"><span class="cls_002"><?php if($type==6){ echo "1.6"; } else if($type==7){ echo "1.7"; } else { if($type==2 || $type==9){ echo "1.7"; } else{ echo "1.9"; } }?>&nbsp;&nbsp;&nbsp;</span><span class="cls_003">Acknowledgment </span><span class="cls_002">The Client acknowledges and understand that:</span></div>
<ol type="a">
	<li>If he/she does not clear the dues on the date of the amount falling due then <?=$amt;?> per month on the due amount would be imposed.</li>
	<li>He/she would not issue instructions to his/her banker not to honor the cheque/demand draft that is issued by him/her in favor of <?php echo $b_av;?>.</li>
	<li>Cheque bouncing charges (<?=$curr;?> <?=$cq?>) shall be applicable as per <?php echo $b_av;?> policy.</li>
	<li>Total Fee charged by <?php echo $b_av;?> is towards preparation and filing of his/her application. <?php echo $b_av;?> is therefore entitled to the entire fee once the Client's application is filed. The total cost to be paid by the Client becomes due once he/she retains the services of <?php echo $b_av;?>, irrespective of the stage at which the Client shall pay the same, as the Client may make the payment based on the payment plan selected by him/her. In case the Client's application does not get processed for any reason, <?php echo $b_av;?> will not refund any of the total fees for the services provided and shall be entitled to full payment for the Services.</li>
  <?php if($type==2 || $type==9){?>
    <li>Visa processing fees (VPF) or any other charges levied by other designated organizations/Immigration Authorities/Embassy/Visa Centre in accordance with the current policy shall be payable by the Client in addition to the fee paid by the Client to <?php echo $b_av;?> for Services. Since the Visa Processing Fee is paid to the concerned Authorities, the Client shall not seek a refund of the said fee from <?php echo $b_av;?>. The Client shall solely be responsible for any adverse effect on the application due to delay/non-payment/insufficient payment to the Visa Processing Fee, or any other fees levied by the concerned Authorities, from time to time, would be borne by the Client. Further, the above Fees and the processing fee is non-refundable as per the current Laws.</li>
  <?php } elseif($type==3){?>
<li>University/college application fee and Visa processing fees (VPF) or any other charges levied by other designated organizations/Immigration Authorities/Embassy authorities in accordance with the current policy shall be payable by the Client in addition to the fee paid by the Client to <?php echo $b_av;?> for Services. Since the Visa Processing Fee is paid to the concerned Authorities, the Client shall not seek a refund of the said fee from <?php echo $b_av;?>. The Client shall solely be responsible for any adverse effect on the application due to delay/non-payment/insufficient payment of the Visa Processing Fee, or any other fees levied by the concerned Authorities, from time to time, would be borne by the Client. Further, the above said fees and the processing fee is non-refundable as per the current Laws.</li>
  <?php } else{?>
<li><?php echo ($lead1["country_interest"]==1?"Skill Assessment and ":"Educational Credential Assessment (ECA Fee) and ");?>Visa processing fees (VPF) or any other charges levied by other designated organizations/Immigration Authorities/Provincial authorities in accordance with the current policy of <?php echo ($lead1["country_interest"]==1?"Skill Assessment":"ECA")." of organization and immigration regulations of ".$country;?> shall be payable by the Client in addition to the fee paid by the Client to <?php echo $b_av;?> for Services. Since the Visa Processing Fee and <?php echo ($lead1["country_interest"]==1?"Skill Assessment":"ECA");?> is paid to the concerned Authorities, the Client shall not seek a refund of the said fee from <?php echo $b_av;?>. The Client shall solely be responsible for any adverse effect on the application due to delay/non-payment/insufficient payment of<?php echo ($lead1["country_interest"]==2?"Educational Credential":"Skill");?> Assessment Fee and the Visa Processing Fee, or any other fees levied by the concerned Authorities, from time to time, would be borne by the Client. Further, the above said <?php echo ($lead1["country_interest"]==1?"Skill Assessment Fee":"ECA Fee");?> and the processing fee is non-refundable as per the current Laws.</li>
  <?php } ?> 
	
</ol>
<!--footer-->
<!--header-->
<div  class="cls_002"><span class="cls_002"><?php if($type==6){ echo "1.7"; } else if($type==7){ echo "1.8"; } else { if($type==2 || $type==9){ echo "1.8"; } else { echo "1.10"; } }?>&nbsp;&nbsp;&nbsp;</span><span class="cls_003">Exclusions</span></div>
<ol type="a">
	<li><?php echo $b_av;?> shall not directly or indirectly assist the Client in the following:
		<ol type="i">
			<li>In applying for / obtaining passport (of any type).</li>
      <?php  if($type==3) {?>
      <li>In procuring Educational/Experience Certificates/Letter of recommendation.</li>
      <?php } elseif($type==6){ ?>
			<li>In procuring Educational Certificates.</li>
      <?php } else if($type==7) { ?>
      <li>In procuring Educational (as its is already done)/Experience Certificates.</li>
      <?php } else {?>
      <li>In procuring <?php echo ($type==9?"Documents of Spouse":"Educational/Experience Certificates");?>.</li>
      <?php } 
      if($type==2 || $type==9){?>
        <li>Other documents and evidence required for the Visa Application.</li>
        <?php } else if($type==3){?> <li>Other documents and evidence required for the Student Visa Application.</li>
          <?php } else{?> <li>Other documents and evidence required for the Immigration Application.</li>
          <?php }?>
			
		</ol></li>  
    <li><?php echo $b_av;?> shall not be responsible for any loss of records in transit.</li>

<?php if($type==2 || $type==9){?>
  <li>All the documents submitted by the Client for onward submission to the designated Visa Office are believed to be genuine and would be forwarded to concerned Authorities in Good faith and believing it to be real and authentic.</li>
  <li><?php echo $b_av;?> shall not be held responsible for wrong outcome in situations where the Client fails to disclose any information.</li>
  <li><?php echo $b_av;?>   or   any  of   its   agents   do   not   give   the   Client   any   guarantee  of   obtaining Visa of <?php echo $country;?>, other than providing the Client with the advice and helping him/her in best possible way.</li>
  <?php } else if($type==3){?>
    <li>All the documents submitted by the Client for onward submission to the designated University/College /Embassy and Visa Office are believed to be genuine and would be forwarded to concerned Authorities in Good faith and believing it to be real and authentic.</li>
  <li><?php echo $b_av;?> shall not be held responsible for wrong assessment in situations where the Client fails to disclose that his/her education is from a non-recognized institution.</li>
  <li><?php echo $b_av;?>   or   any  of   its   agents   do   not   give   the   Client   any   guarantee  of   obtaining Student Visa of <?php echo $country;?>, other than providing the Client with the advice and helping him/her in best possible way.</li>
  <?php } else{?>
<li>All the documents submitted by the Client for onward submission to the designated <?php echo ($lead1["country_interest"]==1?"Skill Assessment":"Educational Credential Assessment");?> organization and Visa Office are believed to be genuine and would be forwarded to concerned Authorities in Good faith and believing it to be real and authentic.</li>
  <li><?php echo $b_av;?> shall not be held responsible for wrong assessment in situations where the Client fails to disclose that his/her education is from a non-recognized institution.</li>
  <?php if($type!=6){ ?>
  <li><?php echo $b_av;?>   or   any  of   its   agents   do   not   give   the   Client   any   guarantee  of   obtaining Nomination/immigrant Visa of <?php echo $country;?>, other than providing the Client with the advice and representing him/her in best possible way.</li>
  <?php } }?>
	<?php if($type!=6){ ?>
	<li>The terms of this Agreement shall apply equally to all members of the Client’s family who are included in the visa application.</li>
	<?php } ?>
  <li>If <?php echo $b_av;?> is asked to act on the Client’s behalf on matters other than those outlined in this agreement, or because of a material change in the Client’s circumstances, or because of material facts not disclosed at the outset of the application, the Client will have to pay a separate fee as appropriate to  the nature of the application.</li>
 <?php if($type==2 || $type==9){?>
 <li><?php echo $b_av;?> is not associated to any Embassy authorities that provides consultation and guidance information in relation to the application.</li> 
 <?php } elseif($type==3) { ?>
  <li><?php echo $b_av;?> is associated with registered university/college that provides consultation and guidance information in relation to the student visa policies in <?php echo $country;?>. However, <?php echo $b_av;?> reserves the right to update or change the contract with any of these lawyers. In place of such circumstance, such will be done with the interest of our Client as a priority.</li>
<?php } else { ?>
	<li><?php echo $b_av;?> is associated with lawyers who are registered with the <?php echo ($lead1["country_interest"]==1? "MARA":"IRCC");?> that provides consultation and guidance information in relation to the immigration policies in <?php echo $country;?>. However, <?php echo $b_av;?> reserves the right to update or change the contract with any of these lawyers. In place of such circumstance, such will be done with the interest of our Client as a priority.</li>
<?php } ?>
	<li><?php echo $b_av;?> is not responsible for the loss of documents in transit as this is the responsibility of the courier company. <?php echo $b_av;?> recommends that all correspondence be sent by registered mail or with a reputable international courier and the Client should notify <?php echo $b_av;?> before dispatching any documentation.</li>
	<li>In case of refiling, the Client shall pay additional Fees as per policy of <?php echo $b_av;?>.</li>

</ol>
<pagebreak />
<!--footer-->
<!--header-->
<div class="cls_003" align="center"><span class="cls_003">Annexure <?php echo ($type==2 || $type==3 || $type==4 || $type==5 || $type==6 || $type==9?"2":"3")?></span><br/>
<span class="cls_003">SCHEDULE OF FEES & PAYMENT</span></div>
<div  class="cls_002"><span class="cls_002">1.&nbsp;&nbsp;&nbsp;</span><span class="cls_003">Fees- </span><span class="cls_002">The Client will have below mentioned payment plan option for all the services mentioned in this fee agreement.</span></div>

<div  class="cls_003"><span class="cls_003">Upfront</span></div>
<div class="cls_002"><span class="cls_002">
	<table class="fees-table">
  <tr>
    <th>Fee Category</th>
    <th>Retainer</th>
    <th>Professional</th>
    <th>Amount <?=$curr;?></th>
  </tr>
  <tr>
    <td>Total Package</td>
    <td><?php echo ($type!=2 && $type!=9 && $type!=3 && $type!=5 && $type!=6 && ($lead1["region"]==4 || $lead1["region"]==5)?(int)$lead1['upfront']-(int)$lead1['prof_fee']-1500:(int)$lead1['upfront']-(int)$lead1['prof_fee']);?></td>
    <td><?php echo $lead1['prof_fee'];?></td>
    <td><?php echo ($type!=2 && $type!=9 && $type!=3 && $type!=5 && $type!=6 && ($lead1["region"]==4||$lead1["region"]==5)?(int)$lead1['upfront']-1500:(int)$lead1['upfront']);?></td>
  </tr>
  
</table>
</span></div>
<?php if($lead1['firstMonth']!=0){?>
<div  class="cls_003"><span class="cls_003">Monthly</span></div>
<div  class="cls_002"><span class="cls_002">
	<table class="fees-table">
  <tr>
    <th>Fee Category</th>
    <th>Retainer</th>
    <th>Retainer</th>
    <th>Retainer</th>
    <th>Professional</th>
    <th>Amount <?=$curr;?></th>
  </tr>
  <tr>
    <td>Total Package</td>
    <td><?php echo $lead1['firstMonth'];?></td>
    <td><?php echo ($type!=2 && $type!=9 && $type!=3 && $type!=5 && $type!=6 && ($lead1["region"]==4||$lead1["region"]==5)?(int)$lead1['secondMonth']-1500:(int)$lead1['secondMonth']);?></td>
    <td><?php echo ((int)$lead1['thirdMonth']);?></td>
    <td><?php echo $lead1['prof_fee_month'];?></td>
    <td><?php echo ($type!=2 && $type!=9 && $type!=3 && $type!=5 && $type!=6 && ($lead1["region"]==4||$lead1["region"]==5)?(int)$lead1['firstMonth']+(int)$lead1['secondMonth']+(int)$lead1['thirdMonth']+(int)$lead1['prof_fee_month']-1500:(int)$lead1['firstMonth']+(int)$lead1['secondMonth']+(int)$lead1['thirdMonth']+(int)$lead1['prof_fee_month']);?></td>
  </tr>
  
</table>
</span></div>
<?php }
if($lead1['firstStage']!=0){?>
<div  class="cls_003"><span class="cls_003">Stage Wise</span></div>
<div  class="cls_002"><span class="cls_002">
	<table class="fees-table">
  <tr>
    <th>Fee Category</th>
    <th>Retainer</th>
    <th>Retainer</th>
    <th>Retainer</th>
    <th>Professional Fee</th>
    <th>Amount <?=$curr;?></th>
  </tr>
  <tr>
    <td>Total Package</td>
    <td><?php echo ($type!=2 && $type!=9 && $type!=3 && $type!=5 && $type!=6 && ($lead1["region"]==4||$lead1["region"]==5)?(int)$lead1['firstStage']-1500:$lead1['firstStage']);?></td>
    <td><?php echo $lead1['secondStage'];?></td>
    <td><?php echo $lead1['thirdStage'];?></td>
    <td><?php echo $lead1['prof_fee_stage'];?></td>
    <td><?php echo ($type!=2 && $type!=9 && $type!=3 && $type!=5 && $type!=6 && ($lead1["region"]==4||$lead1["region"]==5)?(int)$lead1['firstStage']+(int)$lead1['secondStage']+(int)$lead1['thirdStage']+(int)$lead1['prof_fee_stage']-1500:(int)$lead1['firstStage']+(int)$lead1['secondStage']+(int)$lead1['thirdStage']+(int)$lead1['prof_fee_stage']);?></td>
  </tr>
  
</table>
</span></div>
<?php } ?>
<div class="cls_002"><span class="cls_002">Note: The total retainer fee paid is non-refundable.</span></div>
<?php if($lead1['region']=="3" || $lead1['region']=="4" || $lead1['region']=="5" || $lead1['region']=="6" ||$lead1['region']=="10"){?>
<div class="cls_002"><span class="cls_002"><?=$vat;?> is applicable on above fees as its not included.</span></div>
<?php } ?>
<div class="cls_002"><span class="cls_002">Please refer to receipt for complete payment details as per package selected.</span></div>
<br/>
<div  class="cls_002"><span class="cls_002">2.&nbsp;&nbsp;&nbsp;</span><span class="cls_003">Additional Professional Fees</span></div>
<ol type="a">
	<li>The Client acknowledges that additional charges may apply if <?php echo $b_av;?> is asked to act on the Client’s behalf on any of but not limited to the following:
		<ul style="list-style-type:circle;">
			<li>All issue other than those that are outlined above in this Agreement.</li>
			<li>Due to a material change in the Client's circumstances.</li>
			<li>Because of material facts not disclosed at the outset of the application.</li>
			<li>Due to a change in government legislation, policy or procedures.</li>
		</ul>
	</li>
	<li>In these unlikely situations, and others <?php echo $b_av;?> will inform the Client, and a signed amendment to this Agreement will be required.</li>
</ol>
<?php if($type==2 || $type==9){} else if($type==6){}
else if($type==3){?>
  <div  class="cls_002"><span class="cls_002">The following are additional government fees which are subject to change from time to time and needed concerning this application.</span></div>

    <ol type="i">
      <li>Student Visa Processing Fee</li>
      <li>Medical Fee</li>
      <li>Health Insurance Fee</li>
      <li>University/College Application Fee</li>
      <li>Accommodation Fee</li>
    </ol>
    </li>
<?php } else{ ?>
<div  class="cls_002"><span class="cls_002">3.&nbsp;&nbsp;&nbsp;</span><span class="cls_003">Additional Expenses</span></div>

<!--footer-->
<!--header-->
<?php if($lead1["country_interest"]==1){?>
<div  class="cls_002"><span class="cls_002">The following are additional government fees which are subject to change from time to time and needed concerning this application.</span></div>
		<ol type="i">
			<li>DHA processing fees:
				<ul style="list-style-type:circle;">
					<li>AUD 4045 for Principal Applicant</li>
					<li>AUD 2020 for Spouse</li>
					<li>AUD 1015 for each dependent child</li>
				</ul>
			</li>
      <?php if($type==4){?>
          <li>Fees  for  STN  or  Regional  sponsorship (Profession dependent)</li>
      <?php } else{ ?>
          <li>Skill  Assessment  body  fee  and  STN  or  Regional  sponsorship (Profession dependent)</li>
      <?php }?>
			
			<li>Language Tests: AUD400 per person (estimate)</li>
			<li>Medical examinations: AUD200 per person (estimate)</li>
		</ol>
		</li>

<?php } else if($lead1["country_interest"]==2){
  if ($type==8){?>
	<div  class="cls_002"><span class="cls_002">The following are additional government fees which are subject to change from time to time and needed concerning this application.</span></div>

		<ol type="i">
			<li>PNP processing fees:
				<ul style="list-style-type:circle;">
					<li>Ranges from CAD200 - CAD1500</li>
				</ul>
			</li>
			<li>Medical examinations: CAD300 per person (estimate) </li>
		</ol>
		</li>
	<?php } else {?>
    <div  class="cls_002"><span class="cls_002">The following are additional government fees which are subject to change from time to time and needed concerning this application.</span></div>

    <ol type="i">
      <li>IRCC processing fees:
        <ul style="list-style-type:circle;">
          <li>CAD825 per Principal Applicant and Spouse</li>
          <li>CAD825 per dependent Child aged 22 and over </li>
          <li> CAD825 per dependent child under 22 who is married or who is Common Law d. CAD225 per child under 18 years old;</li>
        </ul>
      </li>
      <li>IRCC permanent residence fees (if accepted): 
        <ul style="list-style-type:circle;">
          <li>CAD500 per Principal Applicant and Spouse</li> 
          <li>All other dependents are Free</li> 
        </ul>
      </li>
      <li>CAD400 per person (estimate) </li>
      <li>Medical examinations: CAD300 per person (estimate) </li>
    </ol>
    </li>
<?php }
} } ?>
	<div  class="cls_002"><span class="cls_002"><?php if($type==2||$type==3||$type==6||$type==9){ echo "3."; } else { echo "4."; } ?>&nbsp;&nbsp;&nbsp;</span><span class="cls_003">Payment Methods</span></div>
<ol type="a">
	<li>Clients can make Payments by Cheque, Credit Card, Bank Transfer, Cash, or through online payments.</li>
	<li>Clients shall make all Bank transfers in <?=$curr;?> currency to the following account:</li>
  <pagebreak /><!-- for showing a joined table-->
<div  class="cls_002"><span class="cls_002">
	<table >
  <tr>
    <td style="color: #4CAF50;background-color: white;padding: 1px 4px;border: 1px solid black;">Bank Name</td>
    <td style="color: #4CAF50;background-color: white;padding: 1px 4px;border: 1px solid black;"><?php echo (isset($dbank)?$dbank['bank_name']:$lead1['bank_name']);?></td>
  </tr>
<tr>
    <td style="color: #4CAF50;background-color: white;padding: 1px 4px;border: 1px solid black;">Beneficiary’s name</td>
    <td style="color: #4CAF50;background-color: white;padding: 1px 4px;border: 1px solid black;"><?php echo (isset($dbank)?$dbank['bank_beneficiary']:$lead1['bank_beneficiary']);?></td>
  </tr>
  <tr>
    <td style="color: #4CAF50;background-color: white;padding: 1px 4px;border: 1px solid black;">Account #</td>
    <td style="color: #4CAF50;background-color: white;padding: 1px 4px;border: 1px solid black;"><?php echo (isset($dbank)?$dbank['account_no']:$lead1['account_no']);?></td>
  </tr>
  <tr>
    <td style="color: #4CAF50;background-color: white;padding: 1px 4px;border: 1px solid black;">Bank address</td>
    <td style="color: #4CAF50;background-color: white;padding: 1px 4px;border: 1px solid black;"><?php echo (isset($dbank)?$dbank['bank_address']:$lead1['bank_address']);?></td>
  </tr>
<tr>
    <td style="color: #4CAF50;background-color: white;padding: 1px 4px;border: 1px solid black;">IBAN/Swift/IFSC #</td>
    <td style="color: #4CAF50;background-color: white;padding: 1px 4px;border: 1px solid black;"><?php echo (isset($dbank)?$dbank['iban']:$lead1['iban']);?></td>
  </tr>  
</table>
</span></div>
</ol>
	<div  class="cls_002"><span class="cls_002"><?php if($type==2||$type==3||$type==6||$type==9){ echo "4."; } else { echo "5."; } ?>&nbsp;&nbsp;&nbsp;</span><span class="cls_003">Terms of Payment</span></div>
<ol type="a">
	<li>All payments are due upon receipt of an invoice.</li>
	<li>Not paying an invoice within the stipulated time of receipt and without the prior consent of <?php echo $b_av;?>, will suspend/ put this Agreement on hold, and no further services will occur until the full payment is received.</li>
	<li>Not paying the invoice within thirty (30) calendar days of receipt will automatically terminate this Agreement.</li>
	<li>The Client understands that <?php echo $b_av;?> fees are not for the issuance of a visa or other approval from a government body. Professional prices reflect services rendered to the Client's application by both the parties and its associates.</li>
	<li>If the Client does not clear the outstanding dues to <?php echo $b_av;?>, it shall be perceived as a breach of the Agreement and <?php echo $b_av;?> shall have the right to stop providing Services to the Client without prior notice. If for any reason whatsoever, the Client becomes disinterested in pursuing his/her application for permanent residence or withdraws his/her application, then in such case <?php echo $b_av;?> shall be entitled to full payment of the fee set out in Schedule 1 of <?php echo ($type==2?"2":"3");?>.</li>
	<li>The client further acknowledges & understands that if he/she do not clear the dues on the date of the amount falling due then <?=$amt;?> per month on the due amount would be imposed</li>

</ol>
<!--footer-->
<!--header-->
	<div  class="cls_002"><span class="cls_002"><?php if($type==2||$type==3||$type==6||$type==9){ echo "5."; } else { echo "6."; } ?>&nbsp;&nbsp;&nbsp;</span><span class="cls_003">REFUND POLICY</span><br/><span class="cls_003"><?php echo $b_av;?> is not liable to refund the amount paid on below grounds-</span></div>
<ol type="a">
  <?php if($type==2||$type==9){?>
      <li>The Client acknowledges that the granting of visa is at the sole discretion of the Embassy/Immigration Offices and not <?php echo $b_av;?>.</li>
  <?php } elseif($type==3){?>
    <li>The Client acknowledges that the granting of student visa is at the sole discretion of <?php echo "the Embassy and not ".$b_av;?>.</li>
  <?php }
  else if ($type==6) { } 
    else if ($type==8) {?>
      <li>The Client acknowledges that the granting of PNP is at the sole discretion of respective PNP authority <?php echo $b_av;?>.</li>
<?php } 
  else{?>
      <li>The Client acknowledges that the granting of immigration status is at the sole discretion of <?php echo ($lead1["country_interest"]==1?"Department of Home Affairs":"IRCC")." and not ".$b_av;?>.</li>
    <?php }?>

	<li>Should unexpected, subsequent, or retroactive changes to immigration laws occur from the date of this Agreement, <?php echo $b_av;?> will not refund fees that have already been paid and earned, as the Services were performed in good faith.</li>
  <?php if($type==3){?><li>If in case of any ambiguity happens between the current resident country where the Client resides and the state that the Client is applying for the student visa.</li>
    <?php }else if($type==8){?><li>If in case of any ambiguity happens between the current resident country where the Client resides and the state that the Client is applying for PNP nomination.</li>
      <?php }else{?><li>If in case of any ambiguity happens between the current resident country where the Client resides and the state that the Client is applying for immigration.</li>
      <?php }?>
	
	<li><?php echo $b_av;?> will not refund any fees for the services provided if the Client withdraws the application before processing is complete.</li>
  <?php if($type==2||$type==9){?>
      <li>The Client provides different information other than that which was mentioned on any of the Parties assessment form, and the new report makes the Client ineligible for the application after work has commenced.</li>
      <li>The application is not accepted or closes, and the maximum capacity for the application has been reached.</li>
      <li>The Client does not obtain the required documents within the stipulated time as determined by <?php echo $b_av;?> or the visa office.</li>
      <li>The Client fails to complete the visa application process by missing an interview or neglecting to undergo a medical examination.</li>
      <li>The Client is rejected based on a medical condition, criminal record, or national security concern, or for any other unforeseen or undisclosed reasons.</li>
      <li>The Client communicates directly with government bodies and other organizations without <?php echo $b_av;?>'s written consent, and the application is negatively affected as a result; and the Client breaches any of the terms of this Agreement by providing false information, fraudulent documents or commits any other type of fraud or misrepresentation.</li>
      <li>Once the Client file has been created; the initial consultation is complete; and the Client receives the required document checklist, the Client agrees that the initial payment is non-refundable as a considerable amount of work has already been put into the Client file.</li>
      <li>Once the application is prepared/submitted to the visa office for processing, no refunds will be allowed as this is contrary to the applicable laws that forbid contingency billing.</li>
      <?php if($type!=9){ ?>
      <li><?php echo $b_av;?> shall review the application for the second time in case if the application fails to recieves visa at the first attempt with <?=$curr;?>
      <?=$rel?> as extra charges for re-enrollment.</li>
      <?php } ?>
      <li>Once the Client signs the contract and then he/she does not wish to proceed further for any reason whatsoever.</li>
      <li>The Client voluntarily withdraws the application at any stage</li>
    <?php } elseif($type==3){ ?>
      <li>The Client provides different information other than that which was mentioned on any of the Parties assessment form, and the new report makes the Client ineligible for the application after work has commenced.</li>
      <li>The student program closes, and the maximum capacity for the application has been reached.</li>
      <li>The Client does not obtain the required documents within the stipulated time as determined by <?php echo $b_av;?> or the assessing body.</li>
        <li>The Client fails to complete the process by missing an interview or neglecting to undergo a medical examination.</li>
      <li>The Client is rejected based on a medical condition, criminal record, or national security concern, or for any other unforeseen or undisclosed reasons.</li>
        <li>The Client communicates directly with government bodies and other organizations without <?php echo $b_av;?>'s written consent, and the application is negatively affected as a result; and the Client breaches any of the terms of this Agreement by providing false information, fraudulent documents or commits any other type of fraud or misrepresentation.</li>
      <li>Once the Client file has been created; the initial consultation is complete; and the Client receives the required document checklist, the Client agrees that the initial payment is non-refundable as a considerable amount of work has already been put into the Client file.</li>
        <li>Once the application is submitted to the Embassy for processing, no refunds will be allowed as this is contrary to the applicable laws that forbid contingency billing.</li>
        <li><?php echo $b_av;?> shall review the application for the second time in case if the application fails to receive a visa at the first attempt with <?=$curr;?>
      <?=$rel?> as extra charges for re-enrollment.</li>      
      <li>Once the Client signs the contract and then he/she does not wish to proceed further for any reason whatsoever.</li>
        <li>The Client voluntarily withdraws the application at any stage</li>
      <?php } 
    else if($type==6){?>
              <li>The Client provides different information other than that which was mentioned on any of the Parties assessment form, and the new report makes the Client ineligible after work has commenced.</li>
          <li>The Client does not obtain the required documents within the stipulated time as determined by <?php echo $b_av;?> or the assessing body.</li>
          <li>The Client fails to complete the ECA process by missing the deadline as prescribed by ECA Authority.</li>
          <li>The Client is rejected based on any other unforeseen or undisclosed reasons.</li>
            <li>The Client communicates directly with ECA bodies and other organizations without <?php echo $b_av;?>'s written consent, and the application is negatively affected as a result; and the Client breaches any of the terms of this Agreement by providing false information, fraudulent documents or commits any other type of fraud or misrepresentation.</li>
          <li>Once the Client file has been created; the initial consultation is complete; and the Client receives the required document checklist, the Client agrees that the initial payment is non-refundable as a considerable amount of work has already been put into the Client file.</li>
            <li>Once the application is submitted to the ECA Authority for processing, no refunds will be allowed as this is contrary to the applicable laws that forbid contingency billing.</li>
    <li><?php echo $b_av;?> shall review the application for the second time to other ECA bodies in case if the application fails to receive a Positive outcome at the first attempt with <?=$curr;?>
      <?=$rel?> as extra charges for re-enrollment.</li>  
            <li>Once the Client signs the contract and then he/she does not wish to proceed further for any reason whatsoever.</li>
              <li>The Client voluntarily withdraws the application at any stage</li>

  <?php  }
  elseif($type==8){ ?>
      <li>The Client provides different information other than that which was mentioned on any of the Parties assessment form, and the new report makes the Client ineligible after work has commenced.</li>
      <li>The PNP program closes, and the maximum capacity for the application has been reached.</li>
      <li>The Client does not obtain the required documents within the stipulated time as determined by <?php echo $b_av;?> or the PNP body.</li>
        <li>The Client fails to complete the process by missing an interview (if required) or neglecting to undergo a medical examination.</li>
      <li>The Client is rejected based on a medical condition, criminal record, or national security concern, or for any other unforeseen or undisclosed reasons.</li>
        <li>The Client communicates directly with PNP government bodies and other organizations without <?php echo $b_av;?>'s written consent, and the application is negatively affected as a result; and the Client breaches any of the terms of this Agreement by providing false information, fraudulent documents or commits any other type of fraud or misrepresentation.</li>
      <li>Once the Client file has been created; the initial consultation is complete; and the Client receives the required document checklist, the Client agrees that the initial payment is non-refundable as a considerable amount of work has already been put into the Client file.</li>
        <li>Once the application is submitted to the <?php echo ($lead1["country_interest"]==1?"Australian":"Canadian");?> government for processing, no refunds will be allowed as this is contrary to the applicable laws that forbid contingency billing.</li>
        <li><?php echo $b_av;?> shall review the application for the second time in case if the application fails to receive an ITA at the first attempt with <?=$curr;?>
      <?=$rel?> as extra charges for re-enrollment.</li>      
      <li>Once the Client signs the contract and then he/she does not wish to proceed further for any reason whatsoever.</li>
        <li>The Client voluntarily withdraws the application at any stage</li>
      <?php } 
    else{ ?>
      <li>The Client provides different information other than that which was mentioned on any of the Parties assessment form, and the new report makes the Client ineligible for the immigration after work has commenced.</li>
      <li>The immigration program closes, and the maximum capacity for the application has been reached.</li>
      <li>The Client does not obtain the required documents within the stipulated time as determined by <?php echo $b_av;?> or the assessing body.</li>
        <li>The Client fails to complete the immigration process by missing an interview or neglecting to undergo a medical examination.</li>
      <li>The Client is rejected based on a medical condition, criminal record, or national security concern, or for any other unforeseen or undisclosed reasons.</li>
        <li>The Client communicates directly with government bodies and other organizations without <?php echo $b_av;?>'s written consent, and the application is negatively affected as a result; and the Client breaches any of the terms of this Agreement by providing false information, fraudulent documents or commits any other type of fraud or misrepresentation.</li>
      <li>Once the Client file has been created; the initial consultation is complete; and the Client receives the required document checklist, the Client agrees that the initial payment is non-refundable as a considerable amount of work has already been put into the Client file.</li>
        <li>Once the application is submitted to the <?php echo ($lead1["country_interest"]==1?"Australian":"Canadian");?> government for processing, no refunds will be allowed as this is contrary to the applicable laws that forbid contingency billing.</li>
        <li><?php echo $b_av;?> shall review the application for the second time in case if the application fails to receive an ITA at the first attempt with <?=$curr;?>
      <?=$rel?> as extra charges for re-enrollment.</li>      
      <li>Once the Client signs the contract and then he/she does not wish to proceed further for any reason whatsoever.</li>
        <li>The Client voluntarily withdraws the immigration application at any stage</li>
      <?php } ?>
	
  <?php if ($type!=2 && $type!=3&&type!=9){?>
	<li>Refunds are applicable where the Client has paid the full shelf rate/package amount. If the Client makes a partial payment in such instance Refund will not be applicable.</li>
<?php } ?>
	<li>If a file is dormant for <?php echo ($type==2||$type==9?"30":"90")?> days and above and action is pending from the Client's end, and no communication is received from the Client, the application will be temporarily closed with an email communication. Refunds will not be applicable in such cases.</li>
 <?php if($type!=2&&$type!=3&&$type!=6&&$type!=8&&$type!=9){
  if($lead1['country_interest']==2){ ?>
  <li>In case the Educational credential assessment is negative and client do not wish to continue the case than company will deduct <?=$ecaf;?> and refund the rest of the amount paid excluding VAT (subject to ECA related documents received within 30 days of signing up the contract).</li>
 <?php } if($lead1['country_interest']==1){ ?>
  <li>In case the client gets a negative skill assessment, and client do not wish to continue the case than company undertakes to refund the complete professional fees as per the fee agreement (subject to skill assessment completed in six months from the date of signing the contract). Any discount given will be adjusted from the professional fees.</li>
  <li>In case of negative skill assesment AED 3600 is refundable amount. (Any discount given will be deducted from this amount)</li>
 
 <?php }
 } ?>
</ol>
	<div  class="cls_002"><span class="cls_002"><?php if($type==2||$type==3||$type==6||$type==9){ echo "6."; } else { echo "7."; } ?>&nbsp;&nbsp;&nbsp;</span><span class="cls_003">Fees Paid to Government Agencies or Other Organizations</span></div>
<span class="cls_002">
<ul style="list-style-type:circle;">
	<li>
		 <?php echo $b_av;?> is not responsible for obtaining refunds of money the Client pays directly to other entities, and the Client understands that they will be subject to the refund policies of the government or organization that is involved.
	</li>
	<li>As fees to other organizations are paid for directly by the Client, <?php echo $b_av;?> not obligated to reimburse this money to the Client for any reason.</li>
	<li>If <?php echo $b_av;?> pays government fees on a Client’s behalf, the Client must contact the government body for a refund. <?php echo $b_av;?> will not reimburse the Client for this amount.</li>
	<li>If a refund option exists, <?php echo $b_av;?> will give the Client instructions on how to recover pre-paid government fees.</li>
</ul>
</span>
<div style="padding:20px 0px " class="cls_003"><span class="cls_003">
Signed by the  <?php echo $b_name;?>: 
  <table style="width: 100%">
    <tr><td><img src='<?php echo $base_url;?>/images/Sign1.png' width='127'></td><td><img src='<?php echo $base_url;?>/images/Sign2.png' width='127'></td></tr>
    <tr><td>Chetan Kumbhar 
(Founder & Managing Partner) </td><td>Vidisha Kumbhar 
(Founder & Managing Partner)
</td></tr>
  </table>
 Date: <?php echo date("d/m/y") ." <br/>" . $r_name;?></span></div>

 <div class="cls_002"><span class="cls_002"><b><?php echo ucwords(strtolower($lead1['fname']." ".($lead1['mname']!=""?" ".$lead1['mname']:"").$lead1['lname'] ));?></b></span></div>
    <div class="cls_002" style="padding:20px 0px 0px 0px"><span class="cls_002">***Note:I hereby acknowledge that I have read and understood the contractual terms and conditions mentioned in this agreement and also agree that the agreement is legally binding.</span></div>
    <div class="cls_002" style="padding:20px 0px 0px 0px"><span class="cls_002">Your i/p: <?php echo $lead1['i_p'];  ?> is captured.</span></div>

</div>

<div class="cls_002"><span class="cls_002"><b><?php echo ucwords(strtolower($lead1['fname']." ".($lead1['mname']!=""?" ".$lead1['mname']:"").$lead1['lname'] ));?></b></span></div>
    <div class="cls_002" style="padding:20px 0px 0px 0px"><span class="cls_002">***Note:I hereby acknowledge that I have read and understood the contractual terms and conditions mentioned in this agreement and also agree that the agreement is legally binding.</span></div>
    <div class="cls_002" style="padding:20px 0px 0px 0px"><span class="cls_002">Your i/p: <?php echo $lead1['i_p'];  ?> is captured.</span></div>
<div style="padding:20px 0px 0px 0px " class="cls_003">
    <div style='display:inline;float:left;width:30%;'>Signature: ___________________ </div>
      <div style='display:inline;float:right;width:60%;' align='right'></div>
                  </div>
                  <div style='clear:both;padding-top:25px' align='center' class="cls_003">
                    <?php echo $b_name."  ".trim(preg_replace('/\s\s+/', ' ', $b_address))."<br/>  ".$b_mobile."  ".$b_email;?>
                  </div>
<pagebreak />
<div id="legal-agg">
<?php if($lead1["country_interest"]==2){?>
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

    <div class="cls_003"><span class="cls_003">14.&nbsp;&nbsp;&nbsp;Contact Information</span>

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
    <table width="100%" style="margin-top: 60px">
      <tr><td>-------------------------</td>
        <td style="text-align:right">-------------------------</td></tr>
        <tr >
          <td>Signature of Client</td>
          <td style="text-align:right">Signature of RCIC</td>
        </tr>
    </table>

    <div class="cls_002"><span class="cls_002"><b><?php echo ucwords(strtolower($lead1['fname']." ".($lead1['mname']!=""?" ".$lead1['mname']:"").$lead1['lname'] ));?></b></span></div>
    <div class="cls_002" style="padding:20px 0px 0px 0px"><span class="cls_002">***Note:I hereby acknowledge that I have read and understood the contractual terms and conditions mentioned in this agreement and also agree that the agreement is legally binding.</span></div>
    <div class="cls_002" style="padding:20px 0px 0px 0px"><span class="cls_002">Your i/p: <?php echo $lead1['i_p'];  ?> is captured.</span></div>


    </div>
    </div>

<?php }?>
		</div>
	</div>
	</div>
<script>
 	/*var html="<html>";
    html+='<head><link rel="stylesheet" href="css/agreement style.css" type="text/css"/></head>';
    //padding-left: 60px;padding-right: 60px;">
    html+= document.getElementById('agreement-content').innerHTML;
    html+="</html>";
    var printWin = window.open('','','left=0,top=0,toolbar=0,scrollbars=0,status =0');
    //printWin.document.write('<link rel="stylesheet" href="css/agreement style.css" type="text/css"/>');
    printWin.document.write(html);
    printWin.document.close();
    printWin.focus();
    printWin.print();
    printWin.close();

   $('#agreement-content').printThis({
    //footer: "<?php echo $footer_text;?>",
    //header:"<?php echo $header_text;?>",
    importCSS: false,
    loadCSS: "<?php echo $base_url;?>/css/agreement style.css"
});*/
data={};
data.html_text=document.getElementById('agreement-content').innerHTML;
$.ajax({
    url: "<?php echo $base_url;?>/process/pdf process.php",
    type: "POST",
    data: data,
  success:function(result){
      /*tr.fadeOut(1000, function(){
        $(this).remove();
      });
      if(result=="200"||result=="200200"){
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#success-alert").slideUp(500);
        });
      }
      
      $(".last-td-"+user_id).find(".loader").css("display","none");
      $(".last-td-"+user_id).find("button").css("display","");*/
      console.log(result);

    },
  error: function(XMLHttpRequest, textStatus, errorThrown) { 
        console.log("Status: " + textStatus); 
        console.log("Error: " + errorThrown); 
    } 
  });
 
$('#text_form').submit(function() {
  $("[name='html_text']").val($("#agreement-content").html());
  $.ajax({
		url:'mailag.php?lead=<?php echo $_GET['lead'];?>',
		method:'GET',
		sucess:function(data)
		{
			// $('#alert_message').html('<div class=alert alert-success">'+data+'</div>')
			// $('#myTable').DataTable().destroy();
			// fetch_data();
		}
	})
});
$('#legal_form').submit(function() {
   $("[name='legal_text']").val($("#legal-agg").html());
   $.ajax({
		url:'mailag.php?lead=<?php echo $_GET['lead'];?>',
		method:'GET',
		sucess:function(data)
		{
			// $('#alert_message').html('<div class=alert alert-success">'+data+'</div>')
			// $('#myTable').DataTable().destroy();
			// fetch_data();
		}
	})
});
</script>

    		
		
<?php include_once("footer.php"); ?>


