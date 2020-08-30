<?php
include_once("../include/config.php");

if($_POST['action']=='add')
{
	$data = array(
    			"name" => $_POST['name'],
    			"region" => $_POST['region'],
    			"address" => $_POST['address'],
    			"email" => $_POST['email'],
    			"mobile" => $_POST['mobile']
				);
	$res=$obj->insert('dm_branch',$data);
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
    			"name" => $_POST['name'],
    			"region" => $_POST['region'],
    			"address" => $_POST['address'],
    			"email" => $_POST['email'],
    			"mobile" => $_POST['mobile']
				);
	$res=$obj->update('dm_branch',$data,'id='.$_POST['id']);
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
$obj->delete("dm_branch","id=".$_POST['del_id']); 
}

if($_POST['action']=='change')
{
$html='<option value="">Select</option>';

$re=$obj->display("dm_branch","status=1 and region=".$_POST['id']." order by name ASC"); 	
while($re2=$re->fetch_array())
{ 
$html.='<option value="'.$re2['id'].'">'.$re2['name'].'</option>';
}

$data = array("status" => "success", "html" => $html);

}
?>