<?php
include_once("../include/config.php");

if($_POST['action']=='add')
{
	$data = array(
    			"name" => $_POST['name']
				);
	$res=$obj->insert('dm_source',$data);
if($res)
{
$data = array("status" => "success");
}
else
{
$data = array("status" => "failed", "html" => '');
}
echo json_encode($data);
}


if($_POST['action']=='edit')
{
	$data = array(
    			"name" => $_POST['name']
				);
	$res=$obj->update('dm_source',$data,'id='.$_POST['id']);
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
$obj->delete("dm_source","id=".$_POST['del_id']); 
}
?>