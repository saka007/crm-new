<!DOCTYPE html>

<html lang="en">

<head>

	<title>Reciever</title>

	<meta charset="UTF-8">
	<!-- <script src="https://cdnjs.cloudfare.com/ajax/libs/socket.io/1.7.3/socket.io.min.js"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.4/socket.io.min.js"></script>


	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<script>
var socket = io.connect('//127.0.0.1:1337');

socket.on('connect', function () {
    console.log('connected');

    // socket.on('broadcast', function (data) {
    //     console.log(data);
        //socket.emit("broadcast", data);
        // alert(data.text);
    // });

    socket.on('broadcast', function(data){
      // $(".row mesgs").load();
      $("#reloader").load(window.location.href + " #msg_history",function (a) {
         $('#msg_history').scrollTop($('#msg_history').prop("scrollHeight"));
      });
  // $('#msg_history').scrollTop($('#msg_history').prop("scrollHeight"));
  // document.getElementById('reloader').addEventListener('load',function(){
  //   $('#msg_history').scrollTop($('#msg_history').prop("scrollHeight"));
  // });
  

        console.log(data);
    //   result=JSON.parse(result);
        ncount=data['count'];
        last_message=data['message'];
      if(last_message!=null && ncount!=null){
        $("#mnort").attr("data-message",last_message);

        if(ncount>message_count){ 
          $("#mmcount").text("("+ncount+")");
          $("#malert").find(".alert").text("You have "+ncount+" new "+(ncount>1?"messages":"message")+"!!");
          $("#malert").css("display","");
          $("#mnort").find("div").text("You have "+ncount+" new "+(ncount>1?"messages":"message")+"!!");
          $("#mnort").css("display","");
    }
    message_count=ncount;
  }
  });

    socket.on('disconnect', function () {
        console.log('disconnected');
    });
});
</script>
</body>
</html>	