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
            <div  class="cls_003" align="center"><span class="cls_003">Australia</span></div>
            <div align="center"><span class="cls_003">AG--</span></div>
            <div  class="cls_002" style="padding-top:20px"><span class="cls_002">1). 1.	This application is for Single / Family (PA & Spouse - Both) / Dual (Canada & Australia) / Skill Assessment and Mr./ Mrs.<?php echo ucwords(strtolower($lead1['fname']." ".($lead1['mname']!=""?" ".$lead1['mname']:"").$lead1['lname'] ));?> is the main applicant.</span></div>
            <div  class="cls_002"><span class="cls_002"> 2). As discussed, for Skill Assessment body will be decided after submitting the education documents & CV.</span></div>
            <div  class="cls_002"><span class="cls_002">3). The minimum IELTS score to be eligible for this program is discussed in the meeting.</span></div>
            <div  class="cls_002"><span class="cls_002">4). Client have to target 20 points (IELTS/PTE) to increase the probability of the application.</div></span>
            <br/>
            <br/>
            <table class="fees-table">
            <tr><td style="border: 1px solid black;">IELTS</td><td style="border: 1px solid black;">Listening</td><td style="border: 1px solid black;">Reading</td><td style="border: 1px solid black;">Writing</td><td style="border: 1px solid black;">Speaking</td></tr>
            <tr><td style="border: 1px solid black;">10 Points</td><td style="border: 1px solid black;">7</td><td style="border: 1px solid black;">7</td><td style="border: 1px solid black;">7</td><td style="border: 1px solid black;">7</td></tr>
            <tr><td style="border: 1px solid black;">20 Points</td><td style="border: 1px solid black;">8</td><td style="border: 1px solid black;">8</td><td style="border: 1px solid black;">8</td><td style="border: 1px solid black;">8</td></tr>
            <tr><td style="border: 1px solid black;">PTE</td><td style="border: 1px solid black;">Listening</td><td style="border: 1px solid black;">Reading</td><td style="border: 1px solid black;">Writing</td><td style="border: 1px solid black;">Speaking</td></tr>
            <tr><td style="border: 1px solid black;">10 Points</td><td style="border: 1px solid black;">65</td><td style="border: 1px solid black;">65</td><td style="border: 1px solid black;">65</td><td style="border: 1px solid black;">65</td></tr>
            <tr><td style="border: 1px solid black;">20 Points</td><td style="border: 1px solid black;">79</td><td style="border: 1px solid black;">79</td><td style="border: 1px solid black;">79</td><td style="border: 1px solid black;">79</td></tr>
            </table>
            <br/>
            <br/>
            <div><span style="font-family:Calibri Boldserif;font-size: 12.5px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none">Points Breakup:</span></div>
            <br/>
            <table class="fees-table">
            <tr><td style="border: 1px solid black;">Applicants</td><td style="border: 1px solid black;">1</td><td style="border: 1px solid black;">2</td></tr>
            <tr><td style="border: 1px solid black;">Age</td><td style="border: 1px solid black;"></td><td style="border: 1px solid black;"></td><tr>
            <tr><td style="border: 1px solid black;">Education</td><td style="border: 1px solid black;"></td><td style="border: 1px solid black;"></td></tr>
            <tr><td style="border: 1px solid black;">Work Experience</td><td style="border: 1px solid black;"></td><td style="border: 1px solid black;"></td></tr>
            <tr><td style="border: 1px solid black;">IELTS/PTE</td><td style="border: 1px solid black;"></td><td style="border: 1px solid black;"></td></tr>
            <tr><td style="border: 1px solid black;">Spouse -IELTS</td><td style="border: 1px solid black;"></td><td style="border: 1px solid black;"></td></tr>
            <tr><td style="border: 1px solid black;">Spouse -Skill Assessment</td><td style="border: 1px solid black;"></td><td style="border: 1px solid black;"></td></tr>
            <tr><td style="border: 1px solid black;">Single Applicant(Unmarried Profile)</td><td style="border: 1px solid black;"></td><td style="border: 1px solid black;"></td></tr>
            <tr><td style="border: 1px solid black;">State Nomination (190)</td><td style="border: 1px solid black;"></td><td style="border: 1px solid black;"></td></tr>
            <tr><td style="border: 1px solid black;">Regional Nomination (491)</td><td style="border: 1px solid black;"></td><td style="border: 1px solid black;"></td></tr>
            <tr><td style="border: 1px solid black;">Total</td><td style="border: 1px solid black;"></td><td style="border: 1px solid black;"></td></tr>
            </table>
           <pagebreak/>
           <div><span style="font-family:Calibri Boldserif;font-size: 12.5px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none">Discussion Points`:</span></div>
           <br/>
           <br/>
           <br/>
           <br/>
           <br/>
           <br/>
           <br/>
           <br/>
           <br/>
           <br/>
           <br/>
           <br/>
           <br/>
           <br/>
           <br/>
           <br/>
           <br/>
           <br/>
           <br/>
           <br/>
           <br/>
           <table class="fees-table">
            <tr><td>Client Signature</td><td></td></tr>
            <tr><td>DM Consultants</td><td></td></tr>
            <tr><td>Date</td><td><?php echo date('d-m-Y');?></td></tr>
            </table>
            <br/>
            <br/>
            <div><span style="font-family:Calibri Boldserif;font-size: 12.5px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none">Would you like to participate in our Referral Reward Programme? Earn <?php echo (($lead1['region']==6 || $lead1['region']==10)?"INR 2000":"CAD 100.00");?> on each referral as a bonus.</span></div>
            <div><span style="font-family:Calibri Boldserif;font-size: 12.5px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none">*Please ask your Immigration Counsellor to understand the terms and conditions.</span></div>


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
