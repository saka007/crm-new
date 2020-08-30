<?php include_once('head.php');
// $iel_exp= $obj->display3("SELECT (month(CURRENT_DATE)-month(agreeDate)) as months FROM `dm_lead` WHERE  id=".$_SESSION['ID']);
// $ie_exp1=$iel_exp->fetch_array();
// echo $ie_exp1['months'];
$stdate=date_create($cl1['agreeDate']);
// var_dump($stdate);

$diff= date_diff(date_create(date('Y-m-d')),$stdate);
// var_dump($diff);
$days= $diff->format("%a");
// echo $days;

 ?>
 <style type="text/css">
   .bdr-ripple-ani-btn {
  display: block;
  box-sizing: border-box;
  animation: at-ripple 0.6s linear infinite;
  overflow: hidden;
}

@-webkit-keyframes at-ripple {
  0% {
    box-shadow: 0 4px 10px rgba(102, 102, 102, 0.1), 0 0 0 0 rgba(102, 102, 102, 0.1), 0 0 0 5px rgba(102, 102, 102, 0.1), 0 0 0 10px rgba(102, 102, 102, 0.1);
  }
  100% {
    box-shadow: 0 4px 10px rgba(102, 102, 102, 0.1), 0 0 0 5px rgba(102, 102, 102, 0.1), 0 0 0 10px rgba(102, 102, 102, 0.1), 0 0 0 20px rgba(102, 102, 102, 0);
  }
}
@keyframes at-ripple {
  0% {
    box-shadow: 0 4px 10px rgba(102, 102, 102, 0.1), 0 0 0 0 rgba(102, 102, 102, 0.1), 0 0 0 5px rgba(102, 102, 102, 0.1), 0 0 0 10px rgba(102, 102, 102, 0.1);
  }
  100% {
    box-shadow: 0 4px 10px rgba(102, 102, 102, 0.1), 0 0 0 5px rgba(102, 102, 102, 0.1), 0 0 0 10px rgba(102, 102, 102, 0.1), 0 0 0 20px rgba(102, 102, 102, 0);
  }
}


.glow-shadow {
    background:#fff;
    width:100px;
    height:100px;
    left:50px;
    margin-left:50px;
    margin-top:15%;
    border-radius:50%;
    -webkit-animation: throb 1.5s infinite ease-in-out;
    animation: glow 1.5s infinite ease-in-out;
}
@-webkit-keyframes glow {
    0% {
        -webkit-box-shadow: 0 0 50px 50px rgba(50, 160, 50, 0.9);
    }
    50% {
        -webkit-box-shadow: 0 0 50px 0px rgba(50, 160, 50, .2);
    }
    100% {
        -webkit-box-shadow: 0 0 50px 50px rgba(50, 160, 50, 0.9);
    }
}
@keyframes glow {
    0% {
        box-shadow: 0 0 50px rgba(50, 160, 50, 0.9);
    }
    50% {
        box-shadow: 0 0 50px rgba(50, 160, 50, .2);
    }
    100% {
        box-shadow: 0 0 50px rgba(50, 160, 50, 0.9);
    }
}
.map-div{
padding-top: 14%;
    text-align: center;
    border: 1px solid;
    border-radius: 100%;
    height: 100px;
    color: white;
    width: 115px;
    height: 115px;
    float: left;
    background-color: #b3afaf;
    border-color: #b3afaf;
  }
.map-div i{
  font-size: 32px;
  display:block;
}

.map-div .text{
  padding-top: 5px;
}
.map-icon{
  margin-top: 23%;
    padding-left: 87%;}
.chart-area{
border-bottom: 2px solid #b1acac;
    padding: 0px 3% 2% 3%;}
     </style>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Roadmap</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>
          
          <div class="row">
            <div class="col-md-2 ">
              <div class="map-div  <?php if ($op1['ecaReceDate']==""){} else if ($op1['ecaStatus']=="Completed") {echo "success";} else if ($op1['ecaReceDate']!=""){ echo "ripple";} ?>  " >
          
                      <i class="fas fa-file-medical"></i>
          
                    <div class="text">ECA</div>
              </div>
              <div class="map-icon">
                  <i class="fas fa-angle-double-right"></i><i class="fas fa-angle-double-right"></i>
                </div>
            </div>
            <?php if ($days <= 180) { ?>
            <div class="col-md-2 "> 
              <div class="map-div <?php if ($op1['ecaStatus']=="Completed") { echo "ripple";} if ($op1['testStatus']==""){ } else if ($op1['testStatus']=="Completed") {echo "success";}?> " >
          
                      <i class="fas fa-book-reader"></i>
          
                    <div class="text">IELTS</div>
              </div>
              <div class="map-icon">
                  <i class="fas fa-angle-double-right"></i><i class="fas fa-angle-double-right"></i>
                </div>    
            </div>
            <?php } ?>
            <div class="col-md-2 ">
              <div class="map-div  <?php if ($op1['testStatus']=="Completed") {echo "ripple";} if ($op1['eeProfLauDate']==""){ } else if ($op1['eeProfLauDate']=="Completed") {echo "success";} ?> " >
                  <i class="fas fa-layer-group"></i>
                     <div class="text" >Express<br/> Entry</div>
              </div>
              <div class="map-icon">
                  <i class="fas fa-angle-double-right"></i><i class="fas fa-angle-double-right"></i>
                </div> 
             </div>
            <div class="col-md-2 ">
                   <div class="map-div  <?php if ($pn1['status']==""){ echo "";} else if ($pn1['status']=="APPROVED") {echo "success";} else if ($pn1['status']!=""){ echo "ripple";} ?> " >
                  <i class="fas fa-map-signs"></i>
                     <div class="text">PNP</div>
              </div>
              <div class="map-icon">
                  <i class="fas fa-angle-double-right"></i><i class="fas fa-angle-double-right"></i>
                </div> 
            </div>
            <div class="col-md-2 ">
               <div class="map-div <?php if ($op1['itaSts']==""){ echo "";} else if ($op1['itaSts']=="APPROVED") {echo "success";} else if ($op1['itaSts']!=""){ echo "ripple";} ?>" >
                  <i class="fas fa-plane-departure"></i>
                     <div class="text">ITA</div>
              </div>
              <div class="map-icon">
                  <i class="fas fa-plane"></i><i class="fas fa-plane"></i>
                </div> 
            </div>
            <div class="col-md-2 ">
              

                  <div class="map-div <?php if ($op1['itaSts']==""){ echo "";} else if ($op1['itaSts']=="APPROVED") {echo "ripple";} ?>" >
                  <i class="fas fa-plane-arrival"></i>
                     <div class="text" style="font-size: 14px">Post<br/> Landing</div>
              </div>
              <div class="map-icon">
                  
                </div> 
                </div>


</div>
          <!-- Content Row -->
          <br><br>
          <?php $date = new DateTime($cl1['dueDate']);
                $now = new DateTime(); 
                if($cl1["payBalance"]>0 && $now>=$date){
                switch ($cl1["region"]) {
                   case 3:
                      $curr="(AED)";
                      break;
                    case 4:
                      $curr="AED";
                      break;
                      case 5:
                      $curr="AED";
                      break;
                      case 6:
                      $curr="INR";
                      break;
                      case 7:
                      $curr="QAR";
                      break;
                      case 8:
                      $curr="OMR";
                      break;
                      case 9:
                      $curr="KWD";
                      break;
                      case 10:
                      $curr="INR";
                      break;
                    default:
                      $curr="AED";
                      break;
                 } ?>
            <div class="row">
              <div class="col-xl-12 col-lg-12">
            <div class="alert alert-danger" role="alert">
              Your payment of <?php echo$cl1["payBalance"]." ". $curr;?> is due!!
            </div>
          </div>
            </div>
          <?php }?>
          <div class="row" style="display: none;" id="malert">
              <div class="col-xl-12 col-lg-12">
            <div class="alert alert-info" role="alert">
              
            </div>
          </div>
            </div>
           
          <!-- Content Row -->
            <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Updates</h6>
                 
                </div>
         <?php $st = $obj->display('client_status','leadid='.$_SESSION['ID'].' order by id desc');
          while($st1 = $st->fetch_array())
          {
            print_r($str1) ?>
          <div class="row">

            <!-- Area Chart -->
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <!-- <canvas id="myAreaChart"></canvas> -->
                    <h6 align="right" class="text-primary" title="<?php echo $st1['date']; ?>"><?php echo time_elapsed_string($st1['date'],1) ; ?></h6>
                    <label><?php echo $st1['status']; ?></label>
                    <br><br>
                    <div>
                    <img src="<?php echo "uploads/status/".$st1['file']; ?>">
                  </div>
                  </div>
                </div>
          </div>
         <?php } ?>
      </div>
      <!-- End of Main Content -->
</div>
</div>
</div>
     <?php
     include_once('foot.php');
     ?>
     <script type="text/javascript">
       $(".ripple").last().addClass("bdr-ripple-ani-btn");
       $(".map-div").each(function (i) {
         $(this).css({'background-color': '#3f9c3f', 'border-color':'#3f9c3f'});
         if($(this).hasClass("bdr-ripple-ani-btn")){ 
          $(this).css({'background-color': '#257598', 'border-color':'#257598'});
          return false;
         }
       })
     </script>