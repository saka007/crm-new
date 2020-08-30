<?php 
include_once("include/config.php");
$data= array($_REQUEST["column_name"] =>$_REQUEST['value'] );
// print_r($data);echo $_REQUEST['id'];die;
$obj->update('dm_pnp',$data,'id='.$_REQUEST['id']);
?>