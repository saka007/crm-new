<?php
 ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
include_once("../include/config.php");
$result=$obj->display3("update  old_data_2 set status='".$_POST['status']."' where temp_id=".$_POST['id']);
    echo  $result;
?>