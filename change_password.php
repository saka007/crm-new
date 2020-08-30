<?php include_once("header.php");	
if($_POST['oldpassword'])
{
$old=$obj->display('dm_employee','id='.$_SESSION['ID'].' and password="'.$_POST['oldpassword'].'"');
if($old->num_rows > 0)
{
	$data = array(
    			"password" => $_POST['newpassword']
				);
	$obj->update('dm_employee',$data,'id='.$_SESSION['ID']);
}
?>
<script>
alert("Password Changed Successfully");
window.location.href="change_password.php";
</script>
<?php
}

?>


		<div class="col-sm-10">
		<div class="row"><div class="col-sm-6"><h4 class="mb-3" style="color:#2cb674;">Change Password</h4></div></div>
<form name="search" action="" method="post">
<div class="row">
<div class="col-sm-12 form-group">
<label >Current Password</label>
<input type="text" class="form-control" name="oldpassword" >
</div>
<div class="col-sm-12 form-group">
<label>New Password</label>
<input type="text" class="form-control" name="newpassword" >
</div>


			
<div class="col-sm-3 form-group"><label >&nbsp;</label><br /><input type="submit" class="btn btn-info" name="search" value="Update" ></div>
</div>
</form>
<hr />

		</div>
<?php include_once("footer.php"); ?>

<script src="js/formvalidation.js"></script>
<script>
$(document).ready(function() {
    $('#popForm').formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        icon: {
            valid: 'fa fa-ok',
            invalid: 'fa fa-remove',
            validating: 'fa fa-refresh'
        },
        fields: {
            oldpassword: { validators: { notEmpty: { message: 'Current Password required' }}},
            newpassword: { validators: { notEmpty: { message: 'New Password required' }}}
        }
    })
	.on('success.form.fv', function(e) {
		e.preventDefault();
		$('#popForm').formValidation('defaultSubmit');
	});
});
</script>			