<?php
include_once("head.php");

$up=$op=$obj->display('dm_client_personal',"leadid=".$_SESSION['ID']);
$up1=$up->fetch_array();
$mf=$obj->display('mis_client_files',' category=\'cp\' and leadId='.$_SESSION['ID']);


// print_r($op1);
if($_POST['submit'])
{
  // include_once('docmail.php');
  // echo $_POST['up'];die;
  if($_POST['up']=="")
  {
    // echo "here";die;
    $data=array('leadid'=>$_SESSION['ID']);
    $obj->insert('dm_client_personal',$data);
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
        move_uploaded_file($_FILES['copr']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }
    $data=array('copr'=>$filename);
    $obj->update('dm_client_personal',$data,'leadid='.$_SESSION['ID']);
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
        move_uploaded_file($_FILES['vphoto']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }

    $data=array('vphoto'=>$filename);
    $obj->update('dm_client_personal',$data,'leadid='.$_SESSION['ID']);
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
        move_uploaded_file($_FILES['fvisadocfb']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }
    $data=array('final_visa_docfb'=>$filename);
    $obj->update('dm_client_personal',$data,'leadid='.$_SESSION['ID']);
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
        move_uploaded_file($_FILES['fvisadocfull']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }
    $data=array('final_visa_docfull'=>$filename);
    $obj->update('dm_client_personal',$data,'leadid='.$_SESSION['ID']);
  }

  if ($_FILES['mcertre']['name']!="")
  {

    if ( 0 < $_FILES['mcertre']['error'] ) 
  {
        echo 'Error: ' . $_FILES['mcertre']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['mcertre']['name'];
        move_uploaded_file($_FILES['mcertre']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }
    $data=array('mcert_re'=>$filename);
    $obj->update('dm_client_personal',$data,'leadid='.$_SESSION['ID']);
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
        move_uploaded_file($_FILES['bcert']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }
    $data=array('bcert'=>$filename);
    $obj->update('dm_client_personal',$data,'leadid='.$_SESSION['ID']);
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
        move_uploaded_file($_FILES['niddoc']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }
    $data=array('niddoc'=>$filename);
    $obj->update('dm_client_personal',$data,'leadid='.$_SESSION['ID']);
  }

    if ($_FILES['mcert']['name']!="")
  {

    if ( 0 < $_FILES['mcert']['error'] ) 
  {
        echo 'Error: ' . $_FILES['mcert']['error'] . '<br>';
    }
    else 
  {
    $filename=time().'_'.$_FILES['mcert']['name'];
        move_uploaded_file($_FILES['mcert']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }
    $data=array('marraige'=>$filename);
    $obj->update('dm_client_personal',$data,'leadid='.$_SESSION['ID']);
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
        move_uploaded_file($_FILES['ielts']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }
    $data=array('ielts'=>$filename);
    $obj->update('dm_client_personal',$data,'leadid='.$_SESSION['ID']);
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
        move_uploaded_file($_FILES['passport']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }
    $data=array('passport'=>$filename);
    $obj->update('dm_client_personal',$data,'leadid='.$_SESSION['ID']);
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
        move_uploaded_file($_FILES['passportn']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }
    $data=array('passport_new'=>$filename);
    $obj->update('dm_client_personal',$data,'leadid='.$_SESSION['ID']);
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
        move_uploaded_file($_FILES['pcc']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }
    $data=array('pcc'=>$filename);
    $obj->update('dm_client_personal',$data,'leadid='.$_SESSION['ID']);
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
        move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }
    $data=array('photo'=>$filename);
    $obj->update('dm_client_personal',$data,'leadid='.$_SESSION['ID']);
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
        move_uploaded_file($_FILES['resume']['tmp_name'], 'uploads/clientdocs/' . $filename);
    }
    $data=array('resume'=>$filename);
    $obj->update('dm_client_personal',$data,'leadid='.$_SESSION['ID']);
  }


  if(isset($_POST['misc_count'])){
  for($i=1;$i<=$_POST['misc_count'];$i++) {
    //echo $_POST['misc_name'.$i];
    if(isset($_FILES['upload-misc'.$i]) && isset($_POST['misc_name'.$i])){
         if ( 0 < $_FILES['upload-misc'.$i]['error'] ) 
          {
              echo 'Error: ' . $_FILES['upload-misc'.$i]['error'] . '<br>';
          }
          else 
          {
            $temp = explode(".", $_FILES['upload-misc'.$i]["name"]);
            $filename=time().'_'.$_POST['misc_name'.$i].'.'.end($temp);
            move_uploaded_file($_FILES['upload-misc'.$i]['tmp_name'], 'uploads/clientdocs/' . $filename);
            $data=array('file_name'=>$filename,'category'=>"cp",'approval'=>'','upload_date'=>date('Y-m-d'),'dipti'=>"0",'leadid'=>$_SESSION['ID']);
            //var_dump($data);
            $obj->insert('mis_client_files',$data);
            }
   
    }
  }
}

  header('Location: docuploadp.php');  

  }
  if(isset($_GET['col']))
{

unlink('uploads/clientdocs/'.$up1[$_GET['col']]);

// $data=array($_GET['col'] => "NULL");

$obj->display3('UPDATE dm_client_personal SET '.$_GET['col'].'= NULL where leadid='.$_SESSION['ID']);

  header("location:docuploadp.php");

}
if(isset($_GET['misc'])){
  $obj->display3('Delete from  mis_client_files where id='.$_GET['misc'].' and approval!=1');
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
          <h1 class="h3 mb-4 text-gray-800">Documents to be Uploaded</h1>

          <div class="row">

            <div class="col-lg-10">

              <!-- document list -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Document List</h6>
                </div>
                <div class="card-body">
                  <p>
                    Below are the list of documents pending to be uploaded.
                  </p>
                  <p>
                    <sup>**</sup>Just click on the name of documents to attach it and click submit to submit the documents.<sup>**</sup>
                  </p>
                  <!-- (Default) -->
                  <form action="" method="post" enctype="multipart/form-data" class="opeForm" >
                  <input type="hidden" name="up" value="<?php echo $up1['id'];?>" />
                  <?php if($up1['copr']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['copr']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">COPR-<?php echo $up1['copr']; ?></span>
                  </a>
                  <a onclick="confirmation(event)" href="docuploadp.php?col=copr" class="btn btn-danger btn-icon-split">
                    <!-- href="docuploadp.php?col=copr" -->
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>
                  <?php if($up1['copr']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload1">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">COPR</span>
                  </a>
                  <input type="file" class="inputfile" id="upload1" name="copr">
                <?php } ?>

                <?php if($up1['vphoto']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['vphoto']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Visa Photo-<?php echo $up1['vphoto']; ?></span>
                  </a>
                  <a href="docuploadp.php?col=vphoto" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>
                  <?php if($up1['vphoto']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload2">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">Visa Photo</span>
                  </a>
                  <input type="file" class="inputfile" id="upload2" name="vphoto">
                <?php } ?>

                <?php if($up1['final_visa_docfb']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['final_visa_docfb']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Final Visa Document FB-<?php echo $up1['final_visa_docfb']; ?></span>
                  </a>
                  <a href="docuploadp.php?col=final_visa_docfb" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>

                  <?php if($up1['final_visa_docfb']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload3">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">Final Visa Document FB</span>
                  </a>
                  <input type="file" class="inputfile" id="upload3" name="fvisadocfb">
                  <?php } ?>

                  <?php if($up1['final_visa_docfull']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['final_visa_docfull']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Final Visa Document FULL-<?php echo $up1['final_visa_docfull']; ?></span>
                  </a>
                  <a href="docuploadp.php?col=final_visa_docfull" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>

                  <?php if($up1['final_visa_docfull']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload4">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">Final Visa Document Full</span>
                  </a>
                  <input type="file" class="inputfile" id="upload4" name="fvisadocfull">
                  <?php } ?>

                  <?php if($up1['mcert_re']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['mcert_re']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Marraige Certificate Re-scanned-<?php echo $up1['mcert_re']; ?></span>
                  </a>
                  <a href="docuploadp.php?col=mcert_re" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>

                  <?php if($up1['mcert_re']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload5">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">Marraige Certificate Re-scanned</span>
                  </a>
                  <input type="file" class="inputfile" id="upload5" name="mcertre">
                <?php } ?>

                <?php if($up1['bcert']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['bcert']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Birth Certificate-<?php echo $up1['bcert']; ?></span>
                  </a>
                  <a href="docuploadp.php?col=bcert" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>

                <?php if($up1['bcert']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload6">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">Birth Certificate</span>
                  </a>
                  <input type="file" class="inputfile" id="upload6" name="bcert">
                <?php } ?>

                <?php if($up1['niddoc']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['niddoc']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">National ID Document-<?php echo $up1['niddoc']; ?></span>
                  </a>
                  <a href="docuploadp.php?col=niddoc" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>

                <?php if($up1['niddoc']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload7">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">National ID Document</span>
                  </a>
                  <input type="file" class="inputfile" id="upload7" name="niddoc">
                <?php } ?>

                <?php if($up1['marraige']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['marraige']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Marraige Certificate-<?php echo $up1['marraige']; ?></span>
                  </a>
                  <a href="docuploadp.php?col=marraige" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>

                <?php if($up1['marraige']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload8">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">Marraige Certificate</span>
                  </a>
                  <input type="file" class="inputfile" id="upload8" name="mcert">
                <?php } ?>

                <?php if($up1['ielts']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['ielts']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">IELTS SCORE CARD-<?php echo $up1['ielts']; ?></span>
                  </a>
                  <a href="docuploadp.php?col=ielts" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>

                <?php if($up1['ielts']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload9">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">IELTS SCORE CARD</span>
                  </a>
                  <input type="file" class="inputfile" id="upload9" name="ielts">
                <?php } ?>

                <?php if($up1['passport']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['passport']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Passport-<?php echo $up1['passport']; ?></span>
                  </a>
                  <a href="docuploadp.php?col=passport" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>

                <?php if($up1['passport']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload10">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">Passport</span>
                  </a>
                  <input type="file" class="inputfile" id="upload10" name="passport">
                <?php } ?>

                <?php if($up1['passport_new']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['passport_new']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Passport New-<?php echo $up1['passport_new']; ?></span>
                  </a>
                  <a href="docuploadp.php?col=passport_new" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>

                <?php if($up1['passport_new']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload11">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">Passport New</span>
                  </a>
                  <input type="file" class="inputfile" id="upload11" name="passportn">
                <?php } ?>

                <?php if($up1['pcc']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['pcc']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">PCC from Passport Office (India)-<?php echo $up1['pcc']; ?></span>
                  </a>
                  <a href="docuploadp.php?col=pcc" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>

                <?php if($up1['pcc']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload12">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">PCC from Passport Office (India)</span>
                  </a>
                  <input type="file" class="inputfile" id="upload12" name="pcc">
                <?php } ?>

                <?php if($up1['photo']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['photo']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Photo PA-<?php echo $up1['photo']; ?></span>
                  </a>
                  <a href="docuploadp.php?col=photo" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>

                <?php if($up1['photo']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload13">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">Photo PA</span>
                  </a>
                  <input type="file" class="inputfile" id="upload13" name="photo">
                <?php } ?>

                <?php if($up1['resume']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['resume']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Resume-<?php echo $up1['resume']; ?></span>
                  </a>
                  <a href="docuploadp.php?col=resume" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>


                <?php if($up1['resume']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload14">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">Resume</span>
                  </a>
                  <input type="file" class="inputfile" id="upload14" name="resume">
                <?php } ?>



                 <?php if ($mf->num_rows > 0) {
                      while($mf1 = $mf->fetch_assoc()) {?>
                   <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $mf1['file_name']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text"><?php echo $mf1['file_name']; ?></span>
                  </a>
                  <?php if ($mf1['approval']!="1") { ?>
                  <a href="docuploadp.php?misc=<?php echo $mf1['id']; ?>" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                <?php }
              } 
            }?>
            <!--add misc-->
                  <div class="my-2" id="misc-div"></div>
                  <div class="input-group mb-3" style="width:300px">
                    <input type="text" class="form-control" placeholder="File Name" id="misc_name" name="misc_name" aria-label="File Name" aria-describedby="basic-addon2" style="height:42px">
                    <div class="input-group-append">
                      <a href="javascript:void(0);" class="btn btn-secondary"  id="openupload-misc"><i class="fa fa-plus" style="font-size:24px"></i></a>
                  
                    </div>
                  </div><input type="file" class="inputfile" id="upload-misc" name="upload-misc">
                                    <input type="hidden"  id="misc_count" name="misc_count">

                  <div class="my-2"></div>
                  <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="SUBMIT">

                </form>

                </div>
              </div>

              <!-- Brand Buttons -->
              <!-- <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Brand Buttons</h6>
                </div>
                <div class="card-body">
                  <p>Google and Facebook buttons are available featuring each company's respective brand color. They are used on the user login and registration pages.</p>
                  <p>You can create more custom buttons by adding a new color variable in the <code>_variables.scss</code> file and then using the Bootstrap button variant mixin to create a new style, as demonstrated in the <code>_buttons.scss</code> file.</p>
                  <a href="#" class="btn btn-google btn-block"><i class="fab fa-google fa-fw"></i> .btn-google</a>
                  <a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f fa-fw"></i> .btn-facebook</a>

                </div>
              </div> -->

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
    // const Swal = require('sweetalert2');
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

    $('[id^="openupload-misc"]').click(function(){ 
        id=$(this).attr("id").slice($(this).attr("id").lastIndexOf("openupload-misc") + 15);
        if(id==""){
          $('#upload-misc').trigger('click');  
        }
        else{
      $('#upload-misc'+id).trigger('click'); 
          }
    });
    var misc_count=1
    $("#upload-misc").change(function (){
      $(' <div class="my-2"></div><a href="javascript:void(0)" class="btn btn-warning btn-icon-split" id="openupload-misc'+misc_count+'" onclick="$(\'#upload-misc'+misc_count+'\').trigger(\'click\'); "><span class="icon text-white-50"></span><span class="text">'+$('#misc_name').val()+'</span></a><input type="file" class="inputfile" id="upload-misc'+misc_count+'" name="upload-misc'+misc_count+'"><input type="hidden" id="misc_name'+misc_count+'" name="misc_name'+misc_count+'" value="'+$('#misc_name').val()+'">').insertBefore("#misc-div");
      $('#openupload'+misc_count).removeClass("btn-warning").addClass("btn-secondary");
      var file1 = document.querySelector('#upload-misc');
      var file2 = document.querySelector('#upload-misc'+misc_count);
      file2.files = file1.files;
      $('#misc_name').val('');
      $('#misc_count').val(misc_count);
      misc_count++;
     });
    $("input:file").change(function (){
      id=$(this).attr("id").slice($(this).attr("id").lastIndexOf("upload") + 6);
      $('#openupload'+id).removeClass("btn-secondary").removeClass("btn-success").addClass("btn-warning");
     });

     function confirmation(ev) {
      ev.preventDefault();
      url = ev.currentTarget.getAttribute('href');
      Swal.fire({
      title: 'Are You sure You want to delete',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel!',
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger',
      buttonsStyling: false
    }).then(function (result) {
      if(result.value){
      Swal.fire('Deleted','Your file has been deleted');
      window.location.href= url;
    }
    else{
      Swal.fire('Cancelled');
    }
    });
}
  </script>

