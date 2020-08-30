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
	
	

<!--===============================================================================================-->
    <script src="vendor/bootstrap/js/bootstrap.js"></script>
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

	<script src="js/main.js"></script>
	
    <script src="vendor/bootstrap/js/bootstrap-datepicker.js">
	
	</script>
	<?php include_once('sockets/reciever.php'); ?>
<script>
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
});
</script>
</body>
</html>