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

<div class="col-sm-12">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<!-- <h4 class="mb-3" style="color:#2cb674;"></h4> -->
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
            <div  class="cls_003" align="center"><span class="cls_003">Student Visa Observation sheet</span></div>
            <div align="center"><span style="font-family:Calibri Boldserif;font-size: 12.5px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none">Counsellor’s observation / Discussion with the client</span></div>
            <div align="center"><span class="cls_003">AG--</span></div>
            <div  class="cls_002" style="padding-top:20px"><span class="cls_002">1). The applicant should provide CV, IELTS, Passport Copy, Education documents for the most recent study immediately with the college, location and course with budget preferences.</span></div>
            <div  class="cls_002"><span class="cls_002">2). The applicant must provide employment proof, if working.</span></div>
            <div  class="cls_002"><span class="cls_002">3). The applicant must have valid IELTS (Academics), TOEFL, GRE, GMAT, PTE (Requirement depends on the institute)</span></div>
            <div  class="cls_002"><span class="cls_002">4) The applicant must declare about the previous refusals and relatives in respective country.</div></span>
            <div  class="cls_002"><span class="cls_002">5). The VFS will charge separately for processing applications apart from the visa application fee.</span></div>
            <div  class="cls_002"><span class="cls_002">6). The processing time of application with respective authorities begins from the day of application submission to the visa office not from the starting day with DM Consultants.</span></div>
            <div  class="cls_002"><span class="cls_002">7). The visa stamping is not guaranteed as it is completely the decision of the visa officer.</span><div>
            <div  class="cls_002"><span class="cls_002">8). The applicant will have to wait for the decision until the processing is completed by the respective visa office.</span></div>
            <br/>
            <div><span style="font-family:Calibri Boldserif;font-size: 12.5px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none">Note: The client voluntarily withdraws the immigration case at any stage, no refunds will be given.</span></div>
            <pagebreak/>

            <div  class="cls_003" align="center"><span class="cls_003">Information Sheet for Visit Visa</span></div>
            <div  class="cls_002"><span class="cls_002">1). Citizenship of Client ?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">2). What is their Current Visa Status??</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">3). Which Course (Ex: Diploma, Advance Diploma, Graduate Certificate, PG Cert or Master Degree) are they Interested in?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">4). Most Recent qualification they have & When have they passed out?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">5). Country, they wish to go for study purpose?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">6). Course duration (Months/ Years) they are looking for?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">7). Course Intake (MM/YY) they are Looking for?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">8). When does client wish to travel to destination?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">9). Proof of funds available with Student on their name?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">10). If taking Financial Help, who is going to sponsor and how much amount? Please specify.</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">11). Are they travelling with their Spouse or Kids? Please specify.</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">12). Are they presently working/ Employed?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">13). What are their plans after completion of this course?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">14). IELTS (IELTS ACADEMIC) written or not?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">15). Do they have any Land, Property or Fixed Assets (FDs, Investment, Business, Property) in Current Country of Residence or in-Home country?</span></div>
            <br/>
            <br/>
            <div  class="cls_002"><span class="cls_002">16). Do they have any Medical or Criminal/Police records in past?</span></div>
            <pagebreak/>
            <table width="100%" style="margin-top: 60px">
            <tr><td>Client Name:&nbsp;<?php echo $lead1['fname'].$lead1['mname'].$lead1['lname'];?></td><td style="text-align:right">Counsellor:<?php echo $coun1['name'];?></td></tr>
            </table>
            <br/>
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
