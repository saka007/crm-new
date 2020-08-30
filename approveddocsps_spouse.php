<?php
include_once("head.php");

$up=$op=$obj->display('dm_spouse_personal',"leadid=".$_SESSION['ID']);
$up1=$up->fetch_array();
$mf=$obj->display('mis_client_files','category=\'sp\' and leadId='.$_SESSION['ID']);

if($_POST['submit'])
{
  // echo $_POST['up'];die;
  if($_POST['up']=="")
  {
    // echo "here";die;
    $data=array('leadid'=>$_SESSION['ID']);
    $obj->insert('dm_spouse_personal',$data);
  }
  if ($_FILES['copr']['name']!="")
  {

if ( 0 < $_FILES['copr']['error'] ) 
  {
        echo 'Error: ' . $_FILES['copr']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['copr']['name'];
        move_uploaded_file($_FILES['copr']['tmp_name'], 'uploads/spousedocs/' . $filename);
    }
    $data=array('copr'=>$filename);
    $obj->update('dm_spouse_personal',$data,'leadid='.$_SESSION['ID']);
  }
  if ($_FILES['vphoto']['name']!="")
  {

    if ( 0 < $_FILES['vphoto']['error'] ) 
  {
        echo 'Error: ' . $_FILES['vphoto']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['vphoto']['name'];
        move_uploaded_file($_FILES['vphoto']['tmp_name'], 'uploads/spousedocs/' . $filename);
    }

    $data=array('vphoto'=>$filename);
    $obj->update('dm_spouse_personal',$data,'leadid='.$_SESSION['ID']);
  }
  if ($_FILES['fvisadocfb']['name']!="")
  {

    if ( 0 < $_FILES['fvisadocfb']['error'] ) 
  {
        echo 'Error: ' . $_FILES['fvisadocfb']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['fvisadocfb']['name'];
        move_uploaded_file($_FILES['fvisadocfb']['tmp_name'], 'uploads/spousedocs/' . $filename);
    }
    $data=array('final_visa_docfb'=>$filename);
    $obj->update('dm_spouse_personal',$data,'leadid='.$_SESSION['ID']);
  }
  if ($_FILES['fvisadocfull']['name']!="")
  {

    if ( 0 < $_FILES['fvisadocfull']['error'] ) 
  {
        echo 'Error: ' . $_FILES['fvisadocfull']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['fvisadocfull']['name'];
        move_uploaded_file($_FILES['fvisadocfull']['tmp_name'], 'uploads/spousedocs/' . $filename);
    }
    $data=array('final_visa_docfull'=>$filename);
    $obj->update('dm_spouse_personal',$data,'leadid='.$_SESSION['ID']);
  }

    if ($_FILES['bcert']['name']!="")
  {

    if ( 0 < $_FILES['bcert']['error'] ) 
  {
        echo 'Error: ' . $_FILES['bcert']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['bcert']['name'];
        move_uploaded_file($_FILES['bcert']['tmp_name'], 'uploads/spousedocs/' . $filename);
    }
    $data=array('bcert'=>$filename);
    $obj->update('dm_spouse_personal',$data,'leadid='.$_SESSION['ID']);
  }

    if ($_FILES['niddoc']['name']!="")
  {

    if ( 0 < $_FILES['niddoc']['error'] ) 
  {
        echo 'Error: ' . $_FILES['niddoc']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['niddoc']['name'];
        move_uploaded_file($_FILES['niddoc']['tmp_name'], 'uploads/spousedocs/' . $filename);
    }
    $data=array('niddoc'=>$filename);
    $obj->update('dm_spouse_personal',$data,'leadid='.$_SESSION['ID']);
  }


    if ($_FILES['ielts']['name']!="")
  {

    if ( 0 < $_FILES['ielts']['error'] ) 
  {
        echo 'Error: ' . $_FILES['ielts']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['ielts']['name'];
        move_uploaded_file($_FILES['ielts']['tmp_name'], 'uploads/spousedocs/' . $filename);
    }
    $data=array('ielts'=>$filename);
    $obj->update('dm_spouse_personal',$data,'leadid='.$_SESSION['ID']);
  }

    if ($_FILES['passport']['name']!="")
  {

    if ( 0 < $_FILES['passport']['error'] ) 
  {
        echo 'Error: ' . $_FILES['passport']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['passport']['name'];
        move_uploaded_file($_FILES['passport']['tmp_name'], 'uploads/spousedocs/' . $filename);
    }
    $data=array('passport'=>$filename);
    $obj->update('dm_spouse_personal',$data,'leadid='.$_SESSION['ID']);
  }

    if ($_FILES['passportn']['name']!="")
  {

    if ( 0 < $_FILES['passportn']['error'] ) 
  {
        echo 'Error: ' . $_FILES['passportn']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['passportn']['name'];
        move_uploaded_file($_FILES['passportn']['tmp_name'], 'uploads/spousedocs/' . $filename);
    }
    $data=array('passport_new'=>$filename);
    $obj->update('dm_spouse_personal',$data,'leadid='.$_SESSION['ID']);
  }

    if ($_FILES['pcc']['name']!="")
  {

    if ( 0 < $_FILES['pcc']['error'] ) 
  {
        echo 'Error: ' . $_FILES['pcc']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['pcc']['name'];
        move_uploaded_file($_FILES['pcc']['tmp_name'], 'uploads/spousedocs/' . $filename);
    }
    $data=array('pcc'=>$filename);
    $obj->update('dm_spouse_personal',$data,'leadid='.$_SESSION['ID']);
  }

    if ($_FILES['photo']['name']!="")
  {

    if ( 0 < $_FILES['photo']['error'] ) 
  {
        echo 'Error: ' . $_FILES['photo']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/spousedocs/' . $filename);
    }
    $data=array('photo'=>$filename);
    $obj->update('dm_spouse_personal',$data,'leadid='.$_SESSION['ID']);
  }

    if ($_FILES['resume']['name']!="")
  {

    if ( 0 < $_FILES['resume']['error'] ) 
  {
        echo 'Error: ' . $_FILES['resume']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['resume']['name'];
        move_uploaded_file($_FILES['resume']['tmp_name'], 'uploads/spousedocs/' . $filename);
    }
    $data=array('resume'=>$filename);
    $obj->update('dm_spouse_personal',$data,'leadid='.$_SESSION['ID']);
  }


  header('Location: docuploadp_spouse.php');  

  }
  if(isset($_GET['col']))
{

unlink('uploads/spousedocs/'.$up1[$_GET['col']]);

// $data=array($_GET['col'] => "NULL");

$obj->display3('UPDATE dm_spouse_personal SET '.$_GET['col'].'= NULL where leadid='.$_SESSION['ID']);

  header("location:docuploadp_spouse.php");

}



?>    
  <style type="text/css">
    .inputfile {
  width: 0.1px;
  height: 0.1px;
  opacity: 0;
  overflow: hidden;
  position: absolute;
  z-index: -1;
}
  </style>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Documents Reviewed</h1>

          <div class="row">

            <div class="col-lg-10">

              <!-- document list -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Document List</h6>
                </div>
                <div class="card-body">
                  <p>
                    Below are the list of documents Reviewed.
                  </p>
                  <p>
                    <sup>**</sup>Documents in red are rejected and in Blue are approved<sup>**</sup>
                  </p>
                  <!-- (Default) -->
                  <form action="" method="post" enctype="multipart/form-data" class="opeForm" >
                  <input type="hidden" name="up" value="<?php echo $up1['id'];?>" />
                  <?php if($up1['copr_a']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/spousedocs/<?php echo $up1['copr']; ?>" class="btn btn-<?php if($up1['copr_a']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($up1['copr_a']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text">COPR-<?php echo $up1['copr']; ?></span>
                  </a>
                  <?php } ?>

                <?php if($up1['vphoto_a']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/spousedocs/<?php echo $up1['vphoto']; ?>" class="btn btn-<?php if($up1['vphoto_a']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($up1['vphoto_a']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text">Visa Photo-<?php echo $up1['vphoto']; ?></span>
                  </a>
                  <?php } ?>

                <?php if($up1['final_visa_docfb_a']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/spousedocs/<?php echo $up1['final_visa_docfb']; ?>" class="btn btn-<?php if($up1['final_visa_docfb_a']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($up1['final_visa_docfb_a']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text">Final Visa Document FB-<?php echo $up1['final_visa_docfb']; ?></span>
                  </a>
                  <?php } ?>

                  <?php if($up1['final_visa_docfull_a']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/spousedocs/<?php echo $up1['final_visa_docfull']; ?>" class="btn btn-<?php if($up1['final_visa_docfull_a']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($up1['final_visa_docfull_a']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text">Final Visa Document Full-<?php echo $up1['final_visa_docfull']; ?></span>
                  </a>
                  <?php } ?>

                <?php if($up1['bcert_a']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/spousedocs/<?php echo $up1['bcert']; ?>" class="btn btn-<?php if($up1['bcert_a']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($up1['mcert_re_a']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text">Birth Certificate-<?php echo $up1['bcert']; ?></span>
                  </a>
                  <?php } ?>

                <?php if($up1['niddoc_a']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/spousedocs/<?php echo $up1['niddoc']; ?>" class="btn btn-<?php if($up1['niddoc_a']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($up1['niddoc_a']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text">National ID Document-<?php echo $up1['niddoc']; ?></span>
                  </a>
                  <?php } ?>

                <?php if($up1['ielts_a']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/spousedocs/<?php echo $up1['ielts']; ?>" class="btn btn-<?php if($up1['ielts_a']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($up1['ielts_a']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text">IELTS Score Cards-<?php echo $up1['ielts']; ?></span>
                  </a>
                  <?php } ?>

                <?php if($up1['passport_a']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/spousedocs/<?php echo $up1['passport']; ?>" class="btn btn-<?php if($up1['passport_a']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($up1['passport_a']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text">Passport-<?php echo $up1['passport']; ?></span>
                  </a>
                  <a href="docuploadp_spouse.php?col=passport" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>

                <?php if($up1['passport_new_a']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/spousedocs/<?php echo $up1['passport_new']; ?>" class="btn btn-<?php if($up1['passport_new_a']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($up1['passport_new_a']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text">Passport New-<?php echo $up1['passport_new']; ?></span>
                  </a>
                  <a href="docuploadp_spouse.php?col=passport_new" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>

                <?php if($up1['pcc_a']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/spousedocs/<?php echo $up1['pcc']; ?>" class="btn btn-<?php if($up1['pcc_a']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($up1['pcc_a']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text">PCC-<?php echo $up1['pcc']; ?></span>
                  </a>
                  <?php } ?>

                <?php if($up1['photo_a']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/spousedocs/<?php echo $up1['photo']; ?>" class="btn btn-<?php if($up1['photo_a']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($up1['photo_a']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text">Photo (PA)-<?php echo $up1['photo']; ?></span>
                  </a>
                  <?php } ?>

                <?php if($up1['resume_a']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/spousedocs/<?php echo $up1['resume']; ?>" class="btn btn-<?php if($up1['resume_a']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($up1['resume_a']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text">Resume-<?php echo $up1['resume']; ?></span>
                  </a>
                  <?php } ?>
                   <?php if ($mf->num_rows > 0) {
                      while($mf1 = $mf->fetch_assoc()) {
                        if($mf1['approval']!=""){?>
                          <div class="my-2"></div>
                  <a href="uploads/spousedocs/<?php echo $mf1['file_name']; ?>" class="btn btn-<?php if($mf1['approval']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($mf1['approval']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text"><?php echo $mf1['file_name']; ?></span>
                  </a>
                <?php }
              } 
            }?>
                  <!-- <div class="my-2"></div>
                  <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="submit"> -->

                </form>

                </div>
              </div>

            </div>

              </div>

            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php include_once('foot.php'); ?>
      
  <script>
    $('#openupload1').click(function(){ $('#upload1').trigger('click'); });
    $('#openupload2').click(function(){ $('#upload2').trigger('click'); });
    $('#openupload3').click(function(){ $('#upload3').trigger('click'); });
    $('#openupload4').click(function(){ $('#upload4').trigger('click'); });
    $('#openupload5').click(function(){ $('#upload5').trigger('click'); });
    $('#openupload6').click(function(){ $('#upload6').trigger('click'); });
    $('#openupload7').click(function(){ $('#upload7').trigger('click'); });
    $('#openupload8').click(function(){ $('#upload8').trigger('click'); });
    $('#openupload9').click(function(){ $('#upload9').trigger('click'); });
    $('#openupload10').click(function(){ $('#upload10').trigger('click'); });
    $('#openupload11').click(function(){ $('#upload11').trigger('click'); });
    $('#openupload12').click(function(){ $('#upload12').trigger('click'); });
    $('#openupload13').click(function(){ $('#upload13').trigger('click'); });
    $('#openupload14').click(function(){ $('#upload14').trigger('click'); });
  </script>


