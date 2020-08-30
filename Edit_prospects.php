<?php 	include_once("header.php");
$gd=$obj->display('gary_prospectss','ag_no='.$_GET['id']);
$gd1=$gd->fetch_array();
if($gd1['old_new']=="new"){
    $ctr=$obj->display("dm_lead_contract","id=".$gd1["ag_no"]); 	$ctr1=$ctr->fetch_array();
    $ld=$obj->display("dm_lead","id=".$ctr1["leadId"]);  $ld1=$ld->fetch_array();
    $name=$ld1['fname'] . " " . $ld1["lname"];
}
else if ($gd1['old_new']=="old"){
    $ctr=$obj->display("old_data_2","agreeNo=".$gd1["ag_no"]); 	$ctr1=$ctr->fetch_array();
    $name=$ctr1['client_name'];
}
else if($gd1['old_new']=="lead"){
    $ld=$obj->display("dm_lead","id=".$gd1["ag_no"]);  $ld1=$ld->fetch_array();
    $name=$ld1['fname'] . " " . $ld1["lname"];
    // print_r($ld1);
}

if($_POST){
    // echo "done";die;
    $data=array(
        'date_edit' => date('Y-m-d'),
        // 'ag_no' => $_POST['agno'],
        // 'old_new' => $_POST['old_new'],
        'noc' => $_POST['noc'],
        'terence' => $_POST['appru']
    );
    $obj->update('gary_prospectss',$data,'ag_no='.$_GET['id']);

    if ($_FILES['docs']['name']!="")
  {

if ( 0 < $_FILES['docs']['error'] ) 
  {
        echo 'Error: ' . $_FILES['docs']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['docs']['name'];
        move_uploaded_file($_FILES['docs']['tmp_name'], 'uploads/Gary_CV/' . $filename);
    }
    $data=array(
        'ag_no' => $_POST['agno'],
        'docs'=>$filename
    );
    $obj->insert('gary_work_docs',$data);
  }
  if($_POST['remark']!="")
  {
      $data4 = array(
                  'lead'  =>  $_GET['id'],
                  'date'  =>  date('Y-m-d'),
                  'remark'  =>  $_POST['remark']
                  );
              $obj->insert('dm_lead_remark_g',$data4);
  }
  header('Location: edit_prospects.php?id='.$_GET['id'].'&post=yes');
}

if ($_GET['post']=="yes"){
    // echo "Prospect added succesfully";
    echo "<script type='text/javascript'>Swal.fire(
      'Prospect Updated!',
      'Succesfully'
    )</script>";
}
if(isset($_GET['docId']))//for delete 
{
$d=$obj->display('gary_work_docs',' id='.$_GET['docId']);
$d1=$d->fetch_array();

unlink('uploads/gary_cv/'.$d1['file']);

	$obj->delete('gary_work_docs','id='.$_GET['docId']);

	header("location:edit_prospects.php?id=".$d1['ag_no']);

}


?>

<div class="col-sm-10">

<form action="" method="post" id="leadForm" enctype="multipart/form-data">
<div class="row"><div class="col-sm-6"><h4 class="mb-3" style="color:#2cb674;">Edit Work Permit Prospect</h4></div></div>
<br>

<div class="row"><div class="col-sm-6"><label >Client Name:<?=$name;?></label></div></div>

<div class="row">
<div class="col-sm-4 form-group"><label >Agreement No./Lead ID</label><input type="text" class="form-control" id="agno" name="agno" value="<?=$gd1['ag_no']?>" required></div>
<div class="col-sm-4 form-group"><label >Old/New Agreement</label>
<select class="form-control assign" required name="old_new">
<option value="">Select</option>
<option value="lead" <?php if($gd1['old_new']=="lead") { echo 'selected="selected"';}?>>Lead</option>
<option value="old" <?php if($gd1['old_new']=="old") { echo 'selected="selected"';}?>>Old</option>
<option value="new" <?php if($gd1['old_new']=="new") { echo 'selected="selected"';}?>>New</option>
</select>
</div>
<div class="col-sm-4 form-group"><label>NOC Code</label><input type="text" class="form-control" id="noc" name="noc" value="<?=$gd1['noc']?>" required></div>
</div>

<div class="row">
<div class="col-sm-4 form-group"><label >Approval</label>
<select class="form-control assign" required name="appru">
<option value="">Select</option>
<option value="1" <?php if($gd1['terence']==1) { echo 'selected="selected"';}?>>Yes</option>
<option value="0" <?php if($gd1['terence']==0) { echo 'selected="selected"';}?>>No</option>
</select>
</div>

</div>

<?php
    $docs=$obj->display("gary_work_docs","ag_no=".$gd1["ag_no"]);
   while($doc1=$docs->fetch_array())
   {
   ?>
  <div class="row" style="overflow:hidden">
 	<div class="col-sm-6"><a href="uploads/Gary_cv/<?=$doc1['docs'];?>" target="_blank"><?php echo $doc1['docs'];?></a></div>
	<div class="col-sm-3"><a href="edit_prospects.php?docId=<?php echo $doc1['id'];?>&id=<?=$gd1['id'];?>">Delete</a></div>
  </div>
  <?php }?>
<br>
<div class="row">
<div class="col-sm-4 form-group">
<input type="file" name="docs" class="form-group">
</div>
</div>

<div class="row" style="overflow:hidden">
<div class="col-sm-8 form-group">
<?php 
				$rem=$obj->display('dm_lead_remark_g','lead='.$_GET["id"]);
				if($rem->num_rows>0){
				while($rem1=$rem->fetch_array()) 
				{
						echo "<p>".$rem1['remark'].'-'.date('d/m/Y',strtotime($rem1['date'])).'<p>';
				}
			}
?>
</div>
	   <div class="col-sm-8 form-group"><label>Remark</label><textarea type="text" class="form-control" id="remark" name="remark"></textarea></div>
	   </div>


<div class="col-sm-12 form-group">
<input type="submit" name="submit" value="SUBMIT" class="btn btn-info" id="submit-btn-info">	
</div>
</div>

<?php include_once("footer.php"); ?>