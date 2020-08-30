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
  $coun=$obj->display('dm_employee','id='.$lead1['Counsilor']);
  $coun1=$coun->fetch_array();
  $prog=$obj->display('dm_service','id='.$lead1['service_interest']);
  $prog1=$prog->fetch_assoc();
  $country=ucwords(strtolower($lead1['country']));
  $b_name=ucwords(strtolower($lead1['b_name']));
  $b_av=($lead1['branch']=="4"?"DIS":"DM");
$b_address=$lead1['b_address'];
$b_email=$lead1['b_email'];
$b_mobile=$lead1['b_mobile'];
$b_website=$lead1['b_website'];
$r_name=$lead1['r_name'];
}
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
  border: 1px solid black;
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
				<h4 class="mb-3" style="color:#2cb674;">Observation Sheet</h4>
			</div>
            <div class="col-sm-6" align="right">
            <form action="process/pdf process.php" target="_blank" id="text_form" method="POST">
            <input type="hidden" name="html_text">
            <input type="hidden" name="b_name" value="<?php echo $b_name?>">
            <input type="hidden" name="b_address" value="<?php echo  htmlentities($b_address);?>">
            <input type="hidden" name="b_mobile" value="<?php echo $b_mobile?>">
            <input type="hidden" name="b_email" value="<?php echo $b_email?>">
            <button type="submit" class="btn btn-info">Print</button>
            </form>
            </div>
        </div>

            <div class="row">
            <div class="col-sm-8" id="" style="margin-left: 16%;border: 3px solid black;padding-left: 60px;padding-right: 60px;text-align: justify;">
            <div id="agreement-content">
            <div  class="cls_003" align="center"><span class="cls_003">Visit / Tourist Visa Observation sheet</span></div>
            <div align="center"><span style="font-family:Calibri Boldserif;font-size: 12.5px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none">Counsellor’s observation / Discussion with the client</span></div>
            <div align="center"><span class="cls_003">AG--</span></div>
            <div  class="cls_002" style="padding-top:20px"><span class="cls_002">1). The applicant should have minimum 30K-35K AED (one person) balance in their bank accounts.</span></div>
            <div  class="cls_002"><span class="cls_002"> 2). For European, Schengen and UK Visit Visa – We need to attach Valid and Confirmed Bookings to be paid for separately by the client. This amount is not included in our package.</span></div>
            <div  class="cls_002"><span class="cls_002">3). For European and Schengen Visit Visa – Travel Insurance is mandatory, and it is not included in our package. Therefore, the applicant needs to pay separately depending on the number of days and choice of packages in the insurance (Gold / Silver / Platinum)</span></div>
            <div  class="cls_002"><span class="cls_002">4). The applicant must declare about the previous refusals and relatives in the respective country.</div></span>
            <div  class="cls_002"><span class="cls_002">5). The VFS will charge separately for processing applications apart from the visa application fee.</span></div>
            <div  class="cls_002"><span class="cls_002">6). The processing time of application with respective authorities begins from the day of application submission to the visa office and not from the starting day with DM Consultants.</span></div>
            <div  class="cls_002"><span class="cls_002">7). The applicant needs to present an invitation letter from their relatives / friends residing in the country of visa application. (If Applicable)</span><div>
            <div  class="cls_002"><span class="cls_002">8). The visa stamping is not guaranteed as it is completely the decision of the visa officer.</span></div>
            <div  class="cls_002"><span class="cls_002">9). The applicant will have to wait for the decision until the processing is completed by the respective visa office.</span></div>
            <br/>
            <div><span style="font-family:Calibri Boldserif;font-size: 12.5px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none">Note: The client voluntarily withdraws the immigration case at any stage, no refunds will be given.</span></div>
            <pagebreak/>

            <div  class="cls_003" align="center"><span class="cls_003">Information Sheet for Visit Visa</span></div>
            <div  class="cls_002"><span class="cls_002">1). Citizenship of Client ?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">2). Country of current residence?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">3). Visa Status of current residential country & since when?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">4). Where does he/she wants to travel?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">5). With how many travelers, are they traveling?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">6). Number of days, wish to travel/visit for?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">7). Purpose of travel/visit?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">8). Tentative date of travel (with return dates)?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">9).	Do they have any sponsor like friend and family there?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">10). If above answer is yes, can they get a letter of invite from friends or family?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">11). How much the Funds, client can show as their personal savings?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">12). How they are going to manage/arrange Funds and how much funds?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">13). Are they currently employed, where and since when?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">14). What’s their qualification (degree/diploma level)?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">15). Is there an immigration history / rejection / refusal/ deport / client faced in past?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">16). Passport should be valid for at least next 6-8 months from the date of application submission.</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">17). Current Visa should be valid for at least next 6-8 months from the date of application submission.</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">18). Do they have any Fixed Asset (Land, Property, Business etc.) in current country of residence or back in-Home country?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">19). Do they have an intention to come back? Mention briefly.</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">20). Do they have any Medical obligation and Criminal history?</span></div>
            <br/>
            <table width="100%" style="margin-top: 60px">
            <tr><td>Client Name:&nbsp;<?php echo $lead1['fname'].$lead1['mname'].$lead1['lname'];?></td><td style="text-align:right">Counsellor:<?php echo $coun1['name'];?></td></tr>
            </table>            <br/>
            <table class="fees-table">
            <tr><td>Client Signature</td><td></td></tr>
            <tr><td>DM Consultants</td><td></td></tr>
            <tr><td>Date</td><td><?php echo date('d-m-Y');?></td></tr>
            </table>
            <?php if($lead1['region']==6 || $lead1['region']==10) { ?>
            <br/>
            <br/>
            <div><span style="font-family:Calibri Boldserif;font-size: 12.5px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none">Would you like to participate in our Referral Reward Programme? Earn <?php echo (($lead1['region']==3 || $lead1['region']==4 || $lead1['region']==5)?"AED 100.00":"");?> <?php echo ($lead1['region']==7?"QAR 100.00":"");?><?php echo ($lead1['region']==8?"OMR 10.00":"");?><?php echo ($lead1['region']==9?"KWD 10.00":"");?> on each referral as a bonus.</span></div>
            <div><span style="font-family:Calibri Boldserif;font-size: 12.5px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none">*Please ask your Immigration Counsellor to understand the terms and conditions.</span></div>
            <?php } ?>

            </div>
            </div>
            </div>




            
    </div>
</div>

<script>
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
});
</script>
