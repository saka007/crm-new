<?php include_once('head.php');
$other_messages=0;
 ?>
<style type="text/css">
 .dz-progress{
  display: none;
 }

</style>
  <link href="css/msg.css" rel="stylesheet">
        <!-- Begin Page Content -->
        <div class="container-fluid">

        
         
          <div class="row">
           <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Messenger</h6>
                 
                </div>
                <!-- Card Body -->
                <div class="card-body">
               <div class="row mesgs" id="reloader">
                  <div class="msg_history" id="msg_history"> 
                                <!-- <canvas id="myAreaChart"></canvas> -->
            <!-- Earnings (Monthly) Card Example -->
           
          <!-- Content Row -->
         <?php $obj->display3("SET SESSION group_concat_max_len = 1000000;");
         $m1 = $obj->display3('select m.*, a.file_name,IFNULL(e.name,"DM Officer") officer, IF(sender="L'.$_SESSION['ID'].'",1,0) mine, GROUP_CONCAT(file_name SEPARATOR "|||") files from dm_messages m left join dm_message_attachment a on m.id=a.message_id join dm_employee e on m.reciever=concat("O",e.id) or m.sender=concat("O",e.id) where  m.sender = "L'.$_SESSION['ID'].'" or m.reciever="L'.$_SESSION['ID'].'" group by m.id order by `date-time`');
         
          if ($m1->num_rows > 0) {
          while($m = $m1->fetch_array())
          { 
            
            $date=date_create($m['date-time']);
            

            if ($m['mine']==1){?>
            
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p><?php echo nl2br($m['message']);?></p>
                <div class="attachments">
                  <?php if(trim($m['files'])!=""){
                    $files=explode("|||", $m['files']);
                  foreach ($files as  $f) {?>
                    <a href="uploads/attachments/<?php echo $f; ?>" class="btn btn-icon-split attachment">
                    <span class="icon text-white-50">
                      <i class="fas fa-file"></i>
                    </span>
                    <span class="text"><?php echo $f; ?></span>
                  </a>
                 <?php }
               }?> 
                </div>
                <span class="time_date" title="<?php echo date_format($date,"d-m-Y H:i");?>"><?php echo time_elapsed_string($m['date-time']);?></span> 
                
              </div>

            </div>
        <?php } else { $other_messages++;  
          $data=array('is_read'=>1);
          $obj->update('dm_messages',$data,'id='.$m['id']);?>
          <div class="incoming_msg">
              <div class="received_msg">
                <span class="time_date" ><?php echo $m['officer'];?></span> 
                  <p><?php echo nl2br($m['message']);?></p>
                  <div class="attachments">
                  <?php if(trim($m['files'])!=""){
                    $files=explode("|||", $m['files']);
                  foreach ($files as  $f) {?>
                    <a href="uploads/attachments/<?php echo $f; ?>" class="btn btn-icon-split attachment">
                    <span class="icon text-white-50">
                      <i class="fas fa-file"></i>
                    </span>
                    <span class="text"><?php echo $f; ?></span>
                  </a>
                 <?php }
               }?> 
                </div>
                  <span class="time_date" title="<?php echo date_format($date,"d-m-Y H:i");?>"><?php echo time_elapsed_string($m['date-time']);?></span> 
              </div>
            </div>      
                 
         <?php } }
         } else{?>

<label>Inbox Empty</label>
         <?php }?>
         </div>
         <button class="btn new_message" style="visibility: hidden;" onclick="$('.new_message').css('visibility','hidden');$('#msg_history').scrollTop($('#msg_history').prop('scrollHeight'));">New Message</button>
       </div>
         <div class="row">
          <div class="form-group col-lg-11" align="left">

         <div class="nest" id="DropZoneClose">

            <textarea class="chat" id="textarea" placeholder="Type a message"></textarea>
              <!-- <form action="process/message_file.php" class="dropzone"> -->
               <div id="fileupload" class="dropzone" >
               </div>
             <!-- </form> -->
         </div>
 
</div>
  <div class="form-group col-lg-1" align="right">
    <button type="button" id="send_chat" class="btn btn-info">Send</button>
  </div>
</div>
      </div>
    </div>
  </div>
</div><!-- End of Main Content -->
</div>

 <?php
     include_once('foot.php');
     ?>
<script type="text/javascript">
  // var stop_refresh=0;
  var total_messages=<?php echo $m1->num_rows; ?>;
  var other_count=<?php echo $other_messages; ?>;
  Dropzone.autoDiscover = false;
$('#msg_history').scrollTop($('#msg_history').prop("scrollHeight"));

var myDropzone = new Dropzone('#fileupload', {
  url: "process/message_file.php",
  uploadMultiple: true,                        
  autoProcessQueue: false,
  message_id:"" ,
  parallelUploads:10,
  timeout: 1800000,
   error: function (file, response) {
     console.log(response);
     }
});
 myDropzone.on('sending', function(file, xhr, formData){
  // console.log(xhr);
            formData.append('message_id', myDropzone.message_id);
        });
 myDropzone.on('complete', function(file, xhr, formData){
  // console.log(xhr);
            myDropzone.removeAllFiles();
        });
$("#send_chat").click(function(){  
// stop_refresh=1
  var data={}
  data.message=$("#textarea").val();
  data.sender='L'+<?php echo $_SESSION['ID'];?>;
  data.reciever='O'+<?php echo $cl1['assignTo'];?>;
$.ajax({
    type: "POST",
    url: 'process/add_message_process.php',
    // url:'sockets/emit_test.php',
    data: data,
    async:true,
    success: function(result){

        myDropzone.message_id = parseInt(result); // set the id
        myDropzone.processQueue();
        // myDropzone.removeAllFiles(true);
        $("textarea").val('');
        // stop_refresh=0;
        $('#msg_history').scrollTop($('#msg_history').prop("scrollHeight"));
        $.ajax({
      type: "GET",
      data:data,
      url: 'sockets/emit_test.php',
      async:true
    });
     },
    error: function(data){
        //Didnt work
        // stop_refresh=0
    }
});   
 
});
var textarea = document.getElementById("textarea");
var limit = 120; //height limit

textarea.oninput = function() {
  textarea.style.height = "";
  textarea.style.height = Math.min(textarea.scrollHeight, limit) + "px";
};
 
// setInterval(function(){
//   if(stop_refresh==0){
//  update_chat_history_data();}
//  }, 5000);
function update_chat_history_data() {
  var data={}
  data.sender='L'+<?php echo $_SESSION['ID'];?>;
    $.ajax({
    type: "POST",
    url: 'process/history_process.php',
    data: data,
    async:true,
    success: function(data){
      // console.log(data);
      var chat_html='';
      other_messages=0;
       if(data!=''){
       data=jQuery.parseJSON(data);
       if(data.length>total_messages){
        $(data).each( function(i,msg) {       
           // console.log(this);
           if(msg.mine==1){
            chat_html=chat_html+'<div class="outgoing_msg"><div class="sent_msg"><p>'+nl2br (msg.message)+'</p>';
            if(msg.attachments.length>0){
              chat_html+='<div class="attachments">';
              $(msg.attachments).each( function(j,f) {  
                  chat_html=chat_html+'<a href="uploads/attachments/'+f+'" class="btn btn-icon-split attachment"><span class="icon text-white-50"> <i class="fas fa-file"></i></span><span class="text">'+f+'</span></a>';
            });
              chat_html=chat_html+'</div>';
            }
             chat_html=chat_html+'<span class="time_date" title="'+msg.datetime+'">'+msg.datetimetext+'</span> </div></div>';
            
          }else{other_messages++;
            chat_html=chat_html+' <div class="incoming_msg"><div class="received_msg"><span class="time_date">'+msg.officer+'</span> <p>'+nl2br (msg.message)+'</p>';

            if(msg.attachments.length>0){
              chat_html+='<div class="attachments">';
              $(msg.attachments).each( function(j,f) {  
                  chat_html=chat_html+'<a href="uploads/attachments/'+f+'" class="btn btn-icon-split attachment"><span class="icon text-white-50"> <i class="fas fa-file"></i></span><span class="text">'+f+'</span></a>';
            });
              chat_html=chat_html+'</div>';
            }
            chat_html+='<span class="time_date" title="'+msg.datetime+'">'+msg.datetimetext+'</span> </div></div> ';
          }
           
       });
           if( $("#msg_history").scrollTop() + $("#msg_history").innerHeight() >= $("#msg_history")[0].scrollHeight) {
         $("#msg_history").html(chat_html);
         $('#msg_history').scrollTop($('#msg_history').prop("scrollHeight"));

       }else{
         $("#msg_history").html(chat_html); 
         if(other_messages>other_count){
          $(".new_message").html("<i class='fas fa-arrow-down'></i>&nbsp;&nbsp;&nbsp;&nbsp;"+(other_messages-other_count>1?other_messages-other_count+" New Messages":"New Message"));
          $(".new_message").css("visibility","visible");

        }
       }
       other_count=other_messages;
       total_messages=data.length;
     }
     }else{
      chat_html="<label>Inbox Empty</label>";
       $("#msg_history").html(chat_html);
     }
    
     
       

        

   },
    error: function(data){
        //Didnt work
    }
}); 
  }  
  function nl2br (str) {
    if (typeof str === 'undefined' || str === null) {
        return '';
    }
   
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + '<br>' + '$2');
}
$('#reloader').ready(function(){
    $('#msg_history').scrollTop($('#msg_history').prop("scrollHeight"));
  });

  document.getElementById('reloader').addEventListener('load',function(){
    $('#msg_history').scrollTop($('#msg_history').prop("scrollHeight"));
  });

</script>
  