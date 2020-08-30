<?php
include_once("../include/config.php");


	$data = array(

    			"status" => $_POST['asign']

				);

	$obj->update('dm_lead',$data,'id='.$_POST['lead']);


$data = array("status" => "success");



echo json_encode($data);


?>