<?php 
include_once("include/config.php");
$data= array($_REQUEST["column_name"] =>$_REQUEST['value'] );
// print_r($data);echo $_REQUEST['id'];die;
$obj->update('old_data_1',$data,'Agno='.$_REQUEST['id']);
?>