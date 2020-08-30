<?php

include_once("include/config.php");

$data = array(
    'escalation'=>$_REQUEST['esc'],
);

// print_r($data);
$obj->update('dm_lead',$data,'id='.$_REQUEST['lead']);

$data2= array(
    'emp' =>$_REQUEST['cousilor'],
    'lead'=>$_REQUEST['lead'],
    'date'=>date('Y-m-d'),
);

// print_r($data2);
$obj->insert('escalation_logs',$data2);
echo json_encode($data2);

?>