<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
include_once("../include/config.php");
 /*if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);
    }
    */
    $agreeno="";
    if(isset($_POST['agreeno'])){
        $agreeno=$_POST['agreeno'];
    }
    $coloum="";
    if(isset($_POST['type'])){
        $type=$_POST['type'];
        if($type=="obs"){
            $coloum="obs_sheet";
        }else{
            $coloum="agreement_sheet";
        }
    }

    
if ( 0 < $_FILES['file']['error'] ) 
    {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else 
    {
        $filename2=time().'_'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/olddata/' . $filename2);
    }

            $dataSheet = array(
                    'contract'   =>  $filename2
                    );
            $obj->display3("insert into dm_lead_observation_old(agreeNo,$coloum) values ( '$agreeno','$filename2') on duplicate key update $coloum='$filename2'");
            echo 1;

?>