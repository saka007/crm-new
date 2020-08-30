<?php
include_once("head.php");

$up=$op=$obj->display('dm_client_edu',"leadid=".$_SESSION['ID']);
$up1=$up->fetch_array();
$mf=$obj->display('mis_client_files','category=\'ce\' and leadId='.$_SESSION['ID']);

if($_POST['submit'])
{
  // echo $_POST['up'];die;
  if($_POST['up']=="")
  {
    // echo "here";die;
    $data=array('leadid'=>$_SESSION['ID']);
    $obj->insert('dm_client_edu',$data);
  }
  if ($_FILES['con_mark_sheet_m']['name']!="")
  {

if ( 0 < $_FILES['con_mark_sheet_m']['error'] ) 
  {
        echo 'Error: ' . $_FILES['con_mark_sheet_m']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['con_mark_sheet_m']['name'];
        move_uploaded_file($_FILES['con_mark_sheet_m']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }
    $data=array('con_mark_sheet_m'=>$filename);
    $obj->update('dm_client_edu',$data,'leadid='.$_SESSION['ID']);
  }
  if ($_FILES['con_mark_sheet_b']['name']!="")
  {

    if ( 0 < $_FILES['con_mark_sheet_b']['error'] ) 
  {
        echo 'Error: ' . $_FILES['con_mark_sheet_b']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['con_mark_sheet_b']['name'];
        move_uploaded_file($_FILES['con_mark_sheet_b']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }

    $data=array('con_mark_sheet_b'=>$filename);
    $obj->update('dm_client_edu',$data,'leadid='.$_SESSION['ID']);
  }
  if ($_FILES['ind_mark_sheet_m']['name']!="")
  {

    if ( 0 < $_FILES['ind_mark_sheet_m']['error'] ) 
  {
        echo 'Error: ' . $_FILES['ind_mark_sheet_m']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['ind_mark_sheet_m']['name'];
        move_uploaded_file($_FILES['ind_mark_sheet_m']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }
    $data=array('ind_mark_sheet_m'=>$filename);
    $obj->update('dm_client_edu',$data,'leadid='.$_SESSION['ID']);
  }
  if ($_FILES['revised_eca_m']['name']!="")
  {

    if ( 0 < $_FILES['revised_eca_m']['error'] ) 
  {
        echo 'Error: ' . $_FILES['revised_eca_m']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['revised_eca_m']['name'];
        move_uploaded_file($_FILES['revised_eca_m']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }
    $data=array('revised_eca_m'=>$filename);
    $obj->update('revised_eca_m',$data,'leadid='.$_SESSION['ID']);
  }

  if ($_FILES['revised_eca_b']['name']!="")
  {

    if ( 0 < $_FILES['revised_eca_b']['error'] ) 
  {
        echo 'Error: ' . $_FILES['revised_eca_b']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['revised_eca_b']['name'];
        move_uploaded_file($_FILES['revised_eca_b']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }
    $data=array('revised_eca_b'=>$filename);
    $obj->update('dm_client_edu',$data,'leadid='.$_SESSION['ID']);
  }

    if ($_FILES['revised_wes_eca_m']['name']!="")
  {

    if ( 0 < $_FILES['revised_wes_eca_m']['error'] ) 
  {
        echo 'Error: ' . $_FILES['revised_wes_eca_m']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['revised_wes_eca_m']['name'];
        move_uploaded_file($_FILES['revised_wes_eca_m']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }
    $data=array('revised_wes_eca_m'=>$filename);
    $obj->update('dm_client_edu',$data,'leadid='.$_SESSION['ID']);
  }

    if ($_FILES['conv_cert_m']['name']!="")
  {

    if ( 0 < $_FILES['conv_cert_m']['error'] ) 
  {
        echo 'Error: ' . $_FILES['conv_cert_m']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['conv_cert_m']['name'];
        move_uploaded_file($_FILES['conv_cert_m']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }
    $data=array('conv_cert_m'=>$filename);
    $obj->update('dm_client_edu',$data,'leadid='.$_SESSION['ID']);
  }

    if ($_FILES['revised_wes_eca_b']['name']!="")
  {

    if ( 0 < $_FILES['revised_wes_eca_b']['error'] ) 
  {
        echo 'Error: ' . $_FILES['revised_wes_eca_b']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['revised_wes_eca_b']['name'];
        move_uploaded_file($_FILES['revised_wes_eca_b']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }
    $data=array('revised_wes_eca_b'=>$filename);
    $obj->update('dm_client_edu',$data,'leadid='.$_SESSION['ID']);
  }

    if ($_FILES['eca_m']['name']!="")
  {

    if ( 0 < $_FILES['eca_m']['error'] ) 
  {
        echo 'Error: ' . $_FILES['eca_m']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['eca_m']['name'];
        move_uploaded_file($_FILES['eca_m']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }
    $data=array('eca_m'=>$filename);
    $obj->update('dm_client_edu',$data,'leadid='.$_SESSION['ID']);
  }

    if ($_FILES['conv_cert_b']['name']!="")
  {

    if ( 0 < $_FILES['conv_cert_b']['error'] ) 
  {
        echo 'Error: ' . $_FILES['conv_cert_b']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['conv_cert_b']['name'];
        move_uploaded_file($_FILES['conv_cert_b']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }
    $data=array('conv_cert_b'=>$filename);
    $obj->update('dm_client_edu',$data,'leadid='.$_SESSION['ID']);
  }

    if ($_FILES['ind_mark_sheet_b']['name']!="")
  {

    if ( 0 < $_FILES['ind_mark_sheet_b']['error'] ) 
  {
        echo 'Error: ' . $_FILES['ind_mark_sheet_b']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['ind_mark_sheet_b']['name'];
        move_uploaded_file($_FILES['ind_mark_sheet_b']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }
    $data=array('ind_mark_sheet_b'=>$filename);
    $obj->update('dm_client_edu',$data,'leadid='.$_SESSION['ID']);
  }

    if ($_FILES['bach_seal_trans_unv']['name']!="")
  {

    if ( 0 < $_FILES['bach_seal_trans_unv']['error'] ) 
  {
        echo 'Error: ' . $_FILES['bach_seal_trans_unv']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['bach_seal_trans_unv']['name'];
        move_uploaded_file($_FILES['bach_seal_trans_unv']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }
    $data=array('bach_seal_trans_unv'=>$filename);
    $obj->update('dm_client_edu',$data,'leadid='.$_SESSION['ID']);
  }

    if ($_FILES['eca_b']['name']!="")
  {

    if ( 0 < $_FILES['eca_b']['error'] ) 
  {
        echo 'Error: ' . $_FILES['eca_b']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['eca_b']['name'];
        move_uploaded_file($_FILES['eca_b']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }
    $data=array('eca_b'=>$filename);
    $obj->update('dm_client_edu',$data,'leadid='.$_SESSION['ID']);
  }

    if ($_FILES['intermediate']['name']!="")
  {

    if ( 0 < $_FILES['intermediate']['error'] ) 
  {
        echo 'Error: ' . $_FILES['intermediate']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['intermediate']['name'];
        move_uploaded_file($_FILES['intermediate']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }
    $data=array('intermediate'=>$filename);
    $obj->update('dm_client_edu',$data,'leadid='.$_SESSION['ID']);
  }

  if ($_FILES['ssc']['name']!="")
  {

    if ( 0 < $_FILES['ssc']['error'] ) 
  {
        echo 'Error: ' . $_FILES['ssc']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['ssc']['name'];
        move_uploaded_file($_FILES['ssc']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }
    $data=array('ssc'=>$filename);
    $obj->update('dm_client_edu',$data,'leadid='.$_SESSION['ID']);
  }


  header('Location: docuploadp.php');  

  }
  if(isset($_GET['col']))
{

unlink('uploads/clientdocs/'.$up1[$_GET['col']]);

// $data=array($_GET['col'] => "NULL");

$obj->display3('UPDATE dm_client_edu SET '.$_GET['col'].'= NULL where leadid='.$_SESSION['ID']);

  header("location:docuploadp.php");

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
                  <?php if($up1['con_mark_sheet_m_a']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['con_mark_sheet_m']; ?>" class="btn btn-<?php if($up1['con_mark_sheet_m_a']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($up1['con_mark_sheet_m_a']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text">Consolidated Mark sheet (Masters)-<?php echo $up1['con_mark_sheet_m']; ?></span>
                  </a>
                  <?php } ?>
                  <?php if($up1['ind_mark_sheet_m_a']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['ind_mark_sheet_m']; ?>" class="btn btn-<?php if($up1['ind_mark_sheet_m_a']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($up1['ind_mark_sheet_m_a']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text">Individual Mark Sheet (Masters)-<?php echo $up1['ind_mark_sheet_m']; ?></span>
                  </a>
                  <?php } ?>
                   <?php if($up1['conv_cert_m_a']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['conv_cert_m']; ?>" class="btn btn-<?php if($up1['conv_cert_m_a']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($up1['conv_cert_m_a']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text">Convocation Certificate(Masters)-<?php echo $up1['conv_cert_m']; ?></span>
                  </a>
                  <?php } ?>

                <?php if($up1['con_mark_sheet_b_a']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['con_mark_sheet_b']; ?>" class="btn btn-<?php if($up1['con_mark_sheet_b_a']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($up1['con_mark_sheet_b_a']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text">Consolidated Mark sheet (Bachelors)-<?php echo $up1['con_mark_sheet_b']; ?></span>
                  </a>
                  <?php } ?>

                  <?php if($up1['ind_mark_sheet_b_a']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['ind_mark_sheet_b']; ?>" class="btn btn-<?php if($up1['ind_mark_sheet_b_a']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($up1['ind_mark_sheet_b_a']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text">Individual Mark Sheet (Bachelors)-<?php echo $up1['ind_mark_sheet_b']; ?></span>
                  </a>
                  <?php } ?>
                
                  <?php if($up1['conv_cert_b_a']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['conv_cert_b']; ?>" class="btn btn-<?php if($up1['conv_cert_b_a']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($up1['conv_cert_b_a']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text">Convocation Certificate(Bachelors)-<?php echo $up1['conv_cert_b']; ?></span>
                  </a>
                  <?php } ?>

                  <?php if($up1['eca_m_a']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['eca_m']; ?>" class="btn btn-<?php if($up1['eca_m_a']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($up1['eca_m_a']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text">ECA Report(Masters)-<?php echo $up1['eca_m']; ?></span>
                  </a>
                  <?php } ?>

                  <?php if($up1['revised_eca_m_a']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['revised_eca_m']; ?>" class="btn btn-<?php if($up1['revised_eca_m_a']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($up1['revised_eca_m_a']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text">Revised ECA Report(Masters)-<?php echo $up1['revised_eca_m']; ?></span>
                  </a>
                  <?php } ?>

                  <?php if($up1['revised_wes_eca_m_a']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['revised_wes_eca_m']; ?>" class="btn btn-<?php if($up1['revised_wes_eca_m_a']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($up1['revised_wes_eca_m_a']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text">Revised WES ECA Report(Masters)-<?php echo $up1['revised_wes_eca_m']; ?></span>
                  </a>
                  <?php } ?>

                   <?php if($up1['eca_b_a']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['eca_b']; ?>" class="btn btn-<?php if($up1['eca_b_a']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($up1['eca_b_a']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text">ECA Report (Bachelors)-<?php echo $up1['eca_b']; ?></span>
                  </a>
                  <?php } ?>

                  <?php if($up1['revised_eca_b_a']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['revised_eca_b']; ?>" class="btn btn-<?php if($up1['revised_eca_b_a']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($up1['revised_eca_b_a']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text">Revised ECA Report(Bachelors)-<?php echo $up1['revised_eca_b']; ?></span>
                  </a>
                  <?php } ?>
                <?php if($up1['revised_wes_eca_b_a']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['revised_wes_eca_b']; ?>" class="btn btn-<?php if($up1['revised_wes_eca_b_a']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($up1['revised_wes_eca_b_a']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text">Revised WES ECA Report(Bachelors)-<?php echo $up1['revised_wes_eca_b']; ?></span>
                  </a>
                  <?php } ?>

                <?php if($up1['intermediate_a']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['intermediate']; ?>" class="btn btn-<?php if($up1['intermediate_a']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($up1['intermediate_a']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text">Intermediate-<?php echo $up1['intermediate']; ?></span>
                  </a>
                  <?php } ?>

                  <?php if($up1['ssc_a']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['ssc']; ?>" class="btn btn-<?php if($up1['ssc_a']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($up1['ssc_a']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text">SSC-<?php echo $up1['ssc']; ?></span>
                  </a>
                  <?php } ?>

                  <?php if($up1['bach_seal_trans_unv_a']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['bach_seal_trans_unv']; ?>" class="btn btn-<?php if($up1['bach_seal_trans_unv_a']=="0"){ 
                    echo "danger";} else { echo "primary";}?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php if($up1['bach_seal_trans_unv_a']=="0"){ 
                    echo "exclamation-triangle";} else { echo "check";}?>"></i>
                    </span>
                    <span class="text">Seal Transcript From University (Bachelors)-<?php echo $up1['bach_seal_trans_unv']; ?></span>
                  </a>
                  <?php } ?>
                   <?php if ($mf->num_rows > 0) {
                      while($mf1 = $mf->fetch_assoc()) {
                        if($mf1['approval']!=""){?>
                          <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $mf1['file_name']; ?>" class="btn btn-<?php if($mf1['approval']=="0"){ 
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


