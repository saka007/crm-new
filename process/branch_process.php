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

$html2='<option value="">Select</option>';
$emp=$obj->display("dm_employee","status=1 and region=".$_POST['id']." and (role=4 || role=10 || role=31 || role=3 || role=2 || role=7 || role=20 || role=8 || role=14 || role=24 || role=26 || role=27 || role=5 || role=11 || role=13 || role=15 || role=18 || role=23 || role=25 || role=28 || role=29) order by name ASC"); 	
while($emp2=$emp->fetch_array())
{ 
$html2.='<option value="'.$emp2['id'].'">'.$emp2['name'].'</option>';
}


$data = array("status" => "success", "html" => $html, "html2" => $html2);
echo json_encode($data);

}
?>