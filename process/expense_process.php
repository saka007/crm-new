<?php
include_once("../include/config.php");

if($_POST['action']=='add')
{

	$data = array(
    			"particular" => $_POST['particular'],
    			"date" => date('Y-m-d',strtotime($_POST['dob'])),
    			"amount" => $_POST['amount'],
    			"vat" => $_POST['vat'],
    			"remark" => $_POST['remark'],
    			"addBy" => $_SESSION['ID'],
    			"region" => $_SESSION['REGION'],
    			"branch" => $_SESSION['BRANCH']
				);

	$res=$obj->insert('dm_expense',$data);

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
    			"particular" => $_POST['particular'],
    			"date" => date('Y-m-d',strtotime($_POST['dob'])),
    			"amount" => $_POST['amount'],
    			"vat" => $_POST['vat'],
    			"remark" => $_POST['remark']
				);

	$res=$obj->update('dm_expense',$data,'id='.$_POST['id']);

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

$obj->delete("dm_expense","id=".$_POST['del_id']); 

}

?>