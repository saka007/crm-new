 <!-- Footer -->
 <style type="text/css">
   #mnort{
    position: fixed;
    padding: 30px 40px;
    height: 87px;
    z-index: 100;
    bottom: 11px;
    right: 7px;
    color: white;
    font-weight: bolder;
    background: rgba(181, 183, 189, 0.9);
    border: 2px solid #afabab;
    border-radius: 3px;
    cursor: pointer;
    box-shadow: 1px 2px #dedddd;

}
#mnort label{
  white-space: nowrap;
    text-overflow: ellipsis;
    display: block;
    overflow: hidden;
}
 </style>
      <footer class="sticky-footer bg-white ">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>DM Consultant Copyright 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logoutc.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
<div id="mnort" style="display: none" onclick="location.href='cmessenger.php'"><div>You have a new essage!</div></div>
  <!-- Bootstrap core JavaScript-->
  
  <script src="theme/vendor/jquery/jquery.min.js"></script>
  <script src="theme/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="theme/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="theme/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <!-- <script src="theme/vendor/chart.js/Chart.min.js"></script> -->

  <!-- Page level custom scripts -->
  <!-- <script src="theme/js/demo/chart-area-demo.js"></script>
  <script src="theme/js/demo/chart-pie-demo.js"></script> -->
  <?php include_once('sockets/reciever.php'); ?>
<script type="text/javascript">
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip({html:true});
});
  <?php if(basename(__FILE__) != 'cmessenger.php') {?>
    var message_count=0;
$(document).ready(function(){
  getNewMessageCount(1);
});

// setInterval(function(){
//  getNewMessageCount();
// }, 5000);

function getNewMessageCount() {
  var data={}
  data.sender='<?php echo "L".$_SESSION['ID'];?>'
   $.ajax({
    type: "POST",
    url: 'process/new_message_process.php',
    data: data,
    async:true,
    success: function(result){
      
      result=JSON.parse(result);
      ncount=result.mcount;
      last_message=result.message;
      if(last_message!=null && ncount!=null){
        $("#mnort").attr("data-message",last_message);
        if(ncount>message_count){
          $("#mmcount").text("("+ncount+")");
          $("#malert").find(".alert").text("You have "+ncount+" new "+(ncount>1?"messages":"message")+"!!");
          $("#malert").css("display","");
        // if(init==0){
        //   $("#mnort").find("div").text("You have "+ncount+" new "+(ncount>1?"messages":"message")+"!!");
        //   $("#mnort").css("display","");
        // }

    }
    message_count=ncount;
  }
  },error: function (x) {
      console.log(x);
    }});
}
 $("#mnort").mouseleave(function () {
    $("#mnort").css("display","none");
    $("#mnort").find("label").remove();
 });
$("#mnort").hover(function () {
    $("#mnort").append("<label>"+$("#mnort").attr("data-message")+"</label>");

 });

<?php } ?>
</script>
</body>

</html>