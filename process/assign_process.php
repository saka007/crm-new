<?php
include_once("../include/config.php");


	$data = array(

    			"assignTo" => $_POST['asign']

				);

	$obj->update('dm_lead',$data,'id='.$_POST['lead']);


$data = array("status" => "success");



echo json_encode($data);


?>