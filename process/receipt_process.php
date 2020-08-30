<?php
include_once("../include/config.php");


if($_POST['action']=='delete')
{

$hist=$obj->display('dm_pay_history','id='.$_POST['receipt']);
$hist1=$hist->fetch_array();

$lead=$obj->display('dm_lead','id='.$_POST['lead']);
$lead1=$lead->fetch_array();

$paidYet=$lead1['paidYet']-$hist1['amount'];
$payBalance=$lead1['payBalance']+$hist1['amount'];

	$data = array(
    			"paidYet" => $paidYet,
    			"payBalance" => $payBalance
				);
	$obj->update('dm_lead',$data,'id='.$_POST['lead']);

	$data1 = array(
    			"status" => 0,
    			"remark" => $_POST['remark'],
				"canDate" => date('Y-m-d')
				);
	$res=$obj->update('dm_pay_history',$data1,'id='.$_POST['receipt']);

if($res)
{
$data = array("status" => "success", "id" => $_POST['id']);
}
else
{
$data = array("status" => "failed", "html" => '');
}
echo json_encode($data);
}
?>