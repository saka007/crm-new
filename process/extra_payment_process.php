<?php
 ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
include_once("../include/config.php");
$odr=0;
if($_POST['particular'])
{
    if($_POST['particular']=="Re-Launching Application")
    {
        $tax=$_POST['amount']*0.05;
    }
    else{
        $tax=0;
    }
        $data = array(
                    'agreeNo'       =>  $_POST['agreeNo'],
                    'payMethod'        =>  $_POST['payMethod'],
                    'date'    =>  date('Y-m-d'),
                    'amount' => $_POST['amount'],
                    'Tax' => $tax,
                    'particular'       =>  $_POST['particular']
                    );
        $odr = $obj->insert('dm_3party_payment_old',$data);

}


    echo  $odr;
?>