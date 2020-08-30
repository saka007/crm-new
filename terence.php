<?php

include_once('include/config.php');

$data = array(
    'assignTo'=>10,
    'Counsilor'=>10,
    'notf'=>0
);

$obj->update('dm_lead',$data,'id='.$_GET['lead']);

$data2= array(
    'Counsilor' =>$_GET['counsilor'],
    'lead'=>$_GET['lead'],
    'date'=>date('Y-m-d'),
);

$obj->insert('student_leads_logs',$data2);

?>