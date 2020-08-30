  </div>
            <!-- /.row -->
		<div class="row ">

		<div class="col-5 mt-5">
		<div class="row">
			<div class="col-sm-9">
				<div class="dash-navi" style="background:#fff; color:#2cb674">
				<div class="row">
			<!--		<div class="col-3 pr-0"><div class="pro-img"><img src="images/img.jpg" style="border:2px solid #2cb674"></div></div>
					<div class="col-9"><div class="pro-name">
						<h3>Terence Correia</h3>
						<h4>Regional Manager</h4>
						<a href="#" style="color:#2cb674">Change Password</a>
					</div>
					</div>  -->
					</div>
				</div>
			</div>
		</div>
		</div>
				<div class="col-7">
				
		</div>
		</div>


	</div>
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
	<div id="mnort" style="display: none"><div>You have a new message!</div></div>

<!--===============================================================================================-->

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- <script src="vendor/bootstrap/js/bootstrap.js"></script> -->

<!--===============================================================================================-->
    <script src="vendor/datatables/js/jquery.dataTables.js"></script>
    <script src="vendor/datatables/js/dataTables.bootstrap4.js"></script>
	
 <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js "></script>
<!--===============================================================================================-->

<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->



	<script src="js/main.js"></script>
    <script src="vendor/bootstrap/js/bootstrap-datepicker.js"></script>
	<?php include_once('sockets/ureciever.php'); ?>
<script>
	   		var message_count=0;

$(document).ready(function() {
	$('#dataTables-Table').DataTable({
		responsive: true
	})

	$('body').on('change','#region',function(){ 
 		var id = $(this).val();
		if(id!="")
		{ 
					$.ajax({
						url: "process/branch_process.php",
						type: "POST",
						dataType: 'json',
						data:'&id='+id+'&action=change',
						success:function(result){
							$('#branch').html(result.html);
							$('#counsilor').html(result.html2);
						}
					});
		}
	});
	ncount=<?php echo $mcount; ?>;
	$("#mmcount").text("("+ncount+")");
});

</script>
<script>
$("#mnort").mouseleave(function () {
    $("#mnort").css("display","none");
    $("#mnort").find("label").remove();
 });

 $('.messg').on('click',function(){
    $('.modal-body').load('messages_list.php?msg=<?php echo $_SESSION['ID'];?>',function(){
        $('#myModal').modal({show:true});
    });
});

</script>
</body>
</html>