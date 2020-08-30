<?php
include_once("../include/config.php");

if($_POST['action']=='add')
{
	$data = array(
    			"task" => $_POST['task'],
    			"dob" => date('Y-m-d',strtotime($_POST['dob'])),
    			"asignTo" => $_POST['asignTo'],
    			"asignBy" => $_SESSION['ID']
				);

	$res=$obj->insert('dm_task',$data);

if($res)
{
$data = array("status" => "success");
}
else
{
$data = array("status" => "failed", "msg" => '');
}
echo json_encode($data);
}


if($_POST['action']=='edit')
{

$data = array(
    			"task" => $_POST['task'],
    			"dob" => date('Y-m-d',strtotime($_POST['dob'])),
    			"asignTo" => $_POST['asignTo']
				);

	$res=$obj->update('dm_task',$data,'id='.$_POST['id']);

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

$obj->delete("dm_task","id=".$_POST['del_id']); 

}

?>