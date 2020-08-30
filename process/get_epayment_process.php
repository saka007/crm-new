<?php
 ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
include_once("../include/config.php");
$row="";
if($_POST['id']){
 $rows=$obj->display('dm_3party_payment_old','id='.$_POST['id']);
$row=$rows->fetch_array();
}


    echo  json_encode($row);
?>