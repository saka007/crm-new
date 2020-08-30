<?php 	include_once("header.php");

if($_POST){
    // echo "done";die;
    $data=array(
        'date' => date('Y-m-d'),
        'ag_no' => $_POST['agno'],
        'old_new' => $_POST['old_new'],
        'noc' => $_POST['noc'],
        'counselorid' => $_SESSION['ID'],
        'terence' =>0
    );
    $obj->insert('gary_prospectss',$data);

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
            'lead'  =>  $_POST['agno'],
            'date'  =>  date('Y-m-d'),
            'remark'  =>  $_POST['remark']
          );
        $obj->insert('dm_lead_remark_g',$data4);
  }
  header('Location: add_prospect.php?post=yes');
}
if ($_GET['post']=="yes"){
    // echo "Prospect added succesfully";
    echo "<script type='text/javascript'>Swal.fire(
      'Prospect Added!',
      'Succesfully'
    )</script>";
}   

?>

<div class="col-sm-10">

<form action="" method="post" id="leadForm" enctype="multipart/form-data">
<div class="row"><div class="col-sm-6"><h4 class="mb-3" style="color:#2cb674;">ADD Work Permit Prospect</h4></div></div>

<div class="row">
<div class="col-sm-4 form-group"><label >Agreement No./Lead ID</label><input type="text" class="form-control" id="agno" name="agno" required></div>
<div class="col-sm-4 form-group"><label >Old/New Agreement</label>
<select class="form-control assign" required name="old_new">
<option value="">Select</option>
<option value="lead">Lead</option>
<option value="old">Old</option>
<option value="new">New</option>
</select>
</div>
<div class="col-sm-4 form-group"><label>NOC Code</label><input type="text" class="form-control" id="noc" name="noc" required></div>
</div>


<div class="row">
<div class="col-sm-4 form-group">
<input type="file" name="docs" class="form-group">
</div>
</div>

<div class="row" style="overflow:hidden">
<div class="col-sm-8 form-group">
</div>
	   <div class="col-sm-8 form-group"><label>Remark</label><textarea type="text" class="form-control" id="remark" name="remark"></textarea></div>
	   </div>


<div class="col-sm-12 form-group">
<input type="submit" name="submit" value="SUBMIT" class="btn btn-info" id="submit-btn-info">	
</div>
</div>

<?php include_once("footer.php"); ?>