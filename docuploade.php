<?php
include_once("head.php");

$up=$op=$obj->display('dm_client_edu',"leadid=".$_SESSION['ID']);
$up1=$up->fetch_array();
$mf=$obj->display('mis_client_files','category=\'ce\' and leadId='.$_SESSION['ID']);

// print_r($op1);
if($_POST['submit'])
{
  // include_once('docmail.php');
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
            $data=array('file_name'=>$filename,'category'=>"ce",'approval'=>'','upload_date'=>date('Y-m-d'),'dipti'=>"0",'leadid'=>$_SESSION['ID']);
            //var_dump($data);
            $obj->insert('mis_client_files',$data);
            }
   
    }
  }
}


  header('Location: docuploade.php');  

  }
  if(isset($_GET['col']))
{

unlink('uploads/clientdocs/'.$up1[$_GET['col']]);

// $data=array($_GET['col'] => "NULL");

$obj->display3('UPDATE dm_client_edu SET '.$_GET['col'].'= NULL where leadid='.$_SESSION['ID']);

  header("location:docuploade.php");

}

if(isset($_GET['misc'])){
  $obj->display3('Delete from  mis_client_files where id='.$_GET['misc'].' and approval!=1');
  header("location:docuploade.php");
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
                  <?php if($up1['con_mark_sheet_m']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['con_mark_sheet_m']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Consolidated Mark sheet (Masters)-<?php echo $up1['con_mark_sheet_m']; ?></span>
                  </a>
                  <a href="docuploade.php?col=con_mark_sheet_m" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>
                  <?php if($up1['con_mark_sheet_m']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload1">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">Consolidated Mark sheet (Masters)</span>
                  </a>
                  <input type="file" class="inputfile" id="upload1" name="con_mark_sheet_m">
                <?php } ?>
                <?php if($up1['ind_mark_sheet_m']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['ind_mark_sheet_m']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Individual Mark Sheet (Masters)-<?php echo $up1['ind_mark_sheet_m']; ?></span>
                  </a>
                  <a href="docuploade.php?col=ind_mark_sheet_m" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>

                  <?php if($up1['ind_mark_sheet_m']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload3">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">Individual Mark Sheet (Masters)</span>
                  </a>
                  <input type="file" class="inputfile" id="upload3" name="ind_mark_sheet_m">
                  <?php } ?>
                    <?php if($up1['conv_cert_m']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['conv_cert_m']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Degree Award/Convocation Certificate(Masters)-<?php echo $up1['conv_cert_m']; ?></span>
                  </a>
                  <a href="docuploade.php?col=conv_cert_m" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>

                <?php if($up1['conv_cert_m']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload7">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">Degree Award/Convocation Certificate(Masters)</span>
                  </a>
                  <input type="file" class="inputfile" id="upload7" name="conv_cert_m">
                <?php } ?>


                <?php if($up1['con_mark_sheet_b']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['con_mark_sheet_b']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Consolidated Mark sheet (Bachelors)-<?php echo $up1['con_mark_sheet_b']; ?></span>
                  </a>
                  <a href="docuploade.php?col=con_mark_sheet_b" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>
                  <?php if($up1['con_mark_sheet_b']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload2">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">Consolidated Mark sheet (Bachelors)</span>
                  </a>
                  <input type="file" class="inputfile" id="upload2" name="con_mark_sheet_b">
                <?php } ?>
                 <?php if($up1['ind_mark_sheet_b']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['ind_mark_sheet_b']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Individual Mark Sheet (Bachelors)-<?php echo $up1['ind_mark_sheet_b']; ?></span>
                  </a>
                  <a href="docuploade.php?col=ind_mark_sheet_b" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>

                <?php if($up1['ind_mark_sheet_b']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload11">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">Individual Mark Sheet (Bachelors)</span>
                  </a>
                  <input type="file" class="inputfile" id="upload11" name="ind_mark_sheet_b">
                <?php } ?>
                <?php if($up1['conv_cert_b']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['conv_cert_b']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Convocation Certificate(Bachelors)-<?php echo $up1['conv_cert_b']; ?></span>
                  </a>
                  <a href="docuploade.php?col=conv_cert_b" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>

                <?php if($up1['conv_cert_b']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload10">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">Convocation Certificate(Bachelors)</span>
                  </a>
                  <input type="file" class="inputfile" id="upload10" name="conv_cert_b">
                <?php } ?>
                <?php if($up1['eca_m']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['eca_m']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">ECA Report(Masters)-<?php echo $up1['eca_m']; ?></span>
                  </a>
                  <a href="docuploade.php?col=eca_m" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>

                <?php if($up1['eca_m']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload9">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">ECA Report(Masters)</span>
                  </a>
                  <input type="file" class="inputfile" id="upload9" name="eca_m">
                <?php } ?>

                


                  <?php if($up1['revised_eca_m']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['revised_eca_m']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Revised ECA Report(Masters)-<?php echo $up1['revised_eca_m']; ?></span>
                  </a>
                  <a href="docuploade.php?col=revised_eca_m" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>

                  <?php if($up1['revised_eca_m']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload4">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">Revised ECA Report(Masters)</span>
                  </a>
                  <input type="file" class="inputfile" id="upload4" name="revised_eca_m">
                  <?php } ?>

                  <?php if($up1['revised_wes_eca_m']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['revised_wes_eca_m']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Revised WES ECA Report(Masters)-<?php echo $up1['revised_wes_eca_m']; ?></span>
                  </a>
                  <a href="docuploade.php?col=revised_wes_eca_m" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>

                <?php if($up1['revised_wes_eca_m']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload6">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">Revised WES ECA Report(Masters)</span>
                  </a>
                  <input type="file" class="inputfile" id="upload6" name="revised_wes_eca_m">
                <?php } ?>

                <?php if($up1['eca_b']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['eca_b']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">ECA Report (Bachelors)-<?php echo $up1['eca_b']; ?></span>
                  </a>
                  <a href="docuploade.php?col=eca_b" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>

                <?php if($up1['eca_b']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload13">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">ECA Report (Bachelors)</span>
                  </a>
                  <input type="file" class="inputfile" id="upload13" name="eca_b">
                <?php } ?>

                  <?php if($up1['revised_eca_b']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['revised_eca_b']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Revised ECA Report(Bachelors)-<?php echo $up1['revised_eca_b']; ?></span>
                  </a>
                  <a href="docuploade.php?col=revised_eca_b" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>

                  <?php if($up1['revised_eca_b']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload5">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">Revised ECA Report(Bachelors)</span>
                  </a>
                  <input type="file" class="inputfile" id="upload5" name="revised_eca_b">
                <?php } ?>

                
              
                <?php if($up1['revised_wes_eca_b']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['revised_wes_eca_b']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Revised WES ECA Report(Bachelors)-<?php echo $up1['revised_wes_eca_b']; ?></span>
                  </a>
                  <a href="docuploade.php?col=revised_wes_eca_b" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>

                <?php if($up1['revised_wes_eca_b']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload8">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">Revised WES ECA Report(Bachelors)</span>
                  </a>
                  <input type="file" class="inputfile" id="upload8" name="revised_wes_eca_b">
                <?php } ?>            

                <?php if($up1['intermediate']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['intermediate']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Intermediate-<?php echo $up1['intermediate']; ?></span>
                  </a>
                  <a href="docuploade.php?col=intermediate" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>


                <?php if($up1['intermediate']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload14">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">Intermediate</span>
                  </a>
                  <input type="file" class="inputfile" id="upload14" name="intermediate">
                <?php } ?>

                <?php if($up1['ssc']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['ssc']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">SSC-<?php echo $up1['ssc']; ?></span>
                  </a>
                  <a href="docuploade.php?col=ssc" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>


                <?php if($up1['ssc']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload14">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">SSC</span>
                  </a>
                  <input type="file" class="inputfile" id="upload14" name="ssc">
                <?php } ?>


                <?php if($up1['bach_seal_trans_unv']!="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="uploads/clientdocs/<?php echo $up1['bach_seal_trans_unv']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Seal Transcript From University (Bachelors)-<?php echo $up1['bach_seal_trans_unv']; ?></span>
                  </a>
                  <a href="docuploade.php?col=bach_seal_trans_unv" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                  <?php } ?>

                <?php if($up1['bach_seal_trans_unv']=="")
                  { ?>
                  <div class="my-2"></div>
                  <a href="#" class="btn btn-secondary btn-icon-split" id="openupload12">
                    <span class="icon text-white-50">
                    </span>
                    <span class="text">Seal Transcript From University (Bachelors)</span>
                  </a>
                  <input type="file" class="inputfile" id="upload12" name="bach_seal_trans_unv">
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
                  <a href="docuploade.php?misc=<?php echo $mf1['id']; ?>" class="btn btn-danger btn-icon-split">
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

    $("input:file").change(function (){
      id=$(this).attr("id").slice($(this).attr("id").lastIndexOf("upload") + 6);
      $('#openupload'+id).removeClass("btn-secondary").removeClass("btn-success").addClass("btn-warning");
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
  </script>

