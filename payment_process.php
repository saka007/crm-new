<?php
 ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
include_once("../include/config.php");
$result=$obj->display3("INSERT INTO `dm_old_payment` (`agreeNo`, `payCategory`, `payMethod`, `payTotal`, `discount`, `taxAmt`, `payBalance`, `payAmt`, `totPayAmt`, `totBalance`, `nextPayAmt`, `nextPayDate`, `demdRemark`) VALUES ( ".$_POST['agreeNo'].", '".$_POST['payCategory']."', '".$_POST['payMethod']."', ".$_POST['payTotal'].", ".$_POST['discount'].", ".$_POST['taxAmt'].", ".$_POST['payBalance'].", ".$_POST['payAmt'].", ".$_POST['totPayAmt'].", ".$_POST['totBalance'].", ".$_POST['nextPayAmt'].", '".$_POST['nextPayDate']."', '".$_POST['demdRemark']."') on duplicate key update  
    payCategory='".$_POST['payCategory']."',
    payMethod='".$_POST['payMethod']."',
    payTotal=".$_POST['payTotal'].",
    discount=".$_POST['discount'].",
    taxAmt=".$_POST['taxAmt'].",
    payBalance=".$_POST['payBalance'].",
    payAmt=".$_POST['payAmt'].",
    totPayAmt=".$_POST['totPayAmt'].",
    totBalance=".$_POST['totBalance'].",
    nextPayAmt=".$_POST['nextPayAmt'].",
    nextPayDate='".$_POST['nextPayDate']."',
    demdRemark='".$_POST['demdRemark']."'");

    echo  $result;
?>