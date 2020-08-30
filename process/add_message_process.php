<?php
include_once("../include/config.php");
	$data1 = array(
    			"sender" => $_POST['sender'],
    			"reciever" => $_POST['reciever'],
    			"message" =>str_replace("'", "&apos;", htmlentities($_POST['message'])) 
				);
				// print_r($data1);
	$res=$obj->insert('dm_messages',$data1);
	// include_once('../sockets/emit_message.php');

echo $res;
?>