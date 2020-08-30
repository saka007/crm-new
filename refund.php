<?php include_once("header.php");
// $ld=$obj->display('dm_lead','id='.$_GET['lead']);
// $ld1=$ld->fetch_array();
if($_POST)
{
    // echo $_SESSION['ADMIN_USER'];die;
    $ag = $obj->display('dm_lead_contract','leadId='.$_GET['lead']);
    $ag1 = $ag->fetch_array();
    $data = array(
        'leadid' => $_GET['lead'],
        'ag_no' => $ag1['id'],
        'dipti' =>1,
        'reason' => $_POST['reason']
    );
    $obj->insert('refund',$data);
    header("location:refund_mail.php?lead=".$_GET['lead']);
}
?>
<div class="col-sm-10">
<div class="row"><div class="col-sm-12"><h4 class="mb-3" style="color:#2cb674;">Request for Refund</h4></div></div>
<form action="" method="post">
<div class="col-sm-8 form-group"><label>Reason for Refund</label><textarea type="text" class="form-control" id="remark" name="reason"></textarea></div>
<div class="col-sm-2 form-group"><label>&nbsp;</label><br /><input type="submit" class="btn btn-info" name="submit" value="Submit" ></div>
</form>
</div>

<?php include_once("footer.php"); ?>
<!-- <script>
$("#submit").click(function(){
window.location('refund.php?lead=<?php echo $_GET['lead']; ?>'); 
});
</script> -->