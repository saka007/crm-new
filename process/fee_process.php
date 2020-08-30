<?php
include_once("../include/config.php");

if($_POST['action']=='add')
{
$rows=$obj->display('dm_fee','service='.$_POST['service'].' and country='.$_POST['country']);
if($rows->num_rows==0)
{
	$data1 = array(
    			"service" => $_POST['service'],
    			"country" => $_POST['country'],
    			"upfront" => $_POST['upfront'],
    			"firstMonth" => $_POST['firstMonth'],
    			"secondMonth" => $_POST['secondMonth'],
    			"thirdMonth" => $_POST['thirdMonth'],
    			"firstStage" => $_POST['firstStage'],
    			"secondStage" => $_POST['secondStage'],
    			"thirdStage" => $_POST['thirdStage'],
    			"prof_fee" => $_POST['prof_fee'],
    			"prof_fee_month" => $_POST['prof_fee_month'],
    			"prof_fee_stage" => $_POST['prof_fee_stage']
				);
	$res=$obj->insert('dm_fee',$data1);

$data = array("status" => "success", "html" => '');
}
else
{
$data = array("status" => "failed", "msg" => 'Data exists already');
}
echo json_encode($data);
}


if($_POST['action']=='edit')
{
if($_POST['service']==$_POST['oservice'] && $_POST['country']==$_POST['ocountry'])
{
	$data1 = array(
    			"upfront" => $_POST['upfront'],
    			"firstMonth" => $_POST['firstMonth'],
    			"secondMonth" => $_POST['secondMonth'],
    			"thirdMonth" => $_POST['thirdMonth'],
    			"firstStage" => $_POST['firstStage'],
    			"secondStage" => $_POST['secondStage'],
    			"thirdStage" => $_POST['thirdStage'],
    			"prof_fee" => $_POST['prof_fee'],
    			"prof_fee_month" => $_POST['prof_fee_month'],
    			"prof_fee_stage" => $_POST['prof_fee_stage']
				);
	$res=$obj->update('dm_fee',$data1,'id='.$_POST['id']);
}	
else
{
$rows=$obj->display('dm_fee','service='.$_POST['service'].' and country='.$_POST['country']);
if($rows->num_rows==0)
{
	$data1 = array(
    			"service" => $_POST['service'],
    			"country" => $_POST['country'],
    			"upfront" => $_POST['upfront'],
    			"firstMonth" => $_POST['firstMonth'],
    			"secondMonth" => $_POST['secondMonth'],
    			"thirdMonth" => $_POST['thirdMonth'],
    			"firstStage" => $_POST['firstStage'],
    			"secondStage" => $_POST['secondStage'],
    			"thirdStage" => $_POST['thirdStage']
				);
	$res=$obj->update('dm_fee',$data1,'id='.$_POST['id']);
}
else
{
$data = array("status" => "failed", "html" => '');
}
}
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

if($_POST['action']=='delete')
{
$obj->delete("dm_fee","id=".$_POST['del_id']); 
}
?>