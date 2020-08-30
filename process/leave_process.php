<?php
include_once("../include/config.php");

if($_POST['action']=='add')
{
	$data = array(
    			"name" => $_POST['name']
				);
	$res=$obj->insert('dm_leave_type',$data);
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
	$res=$obj->update('dm_leave_type',$data,'id='.$_POST['id']);
if($res)
{
$data = array("status" => "success", "id" => $_POST['id']);
}
else
{
$data = array("status" => "failed", "html" => '');
}
echo jfilede($data);
}


if($_POST['action']=='delete')
{
$obj->delete("dm_leave_type","id=".$_POST['del_id']); 
}


if($_POST['action']=='add2')
{
    if($_FILES['file']!=""){
        $filename = $_FILES['file']['name'];
         move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/hr_docs/' . $filename);
    }
    else{
        $filename='';
    }
    
	$data = array(
    			"fromDate" => date('Y-m-d',strtotime($_POST['fromDate'])),
    			"toDate" => date('Y-m-d',strtotime($_POST['toDate'])),
    			"type" => $_POST['type'],
    			"approvBy" => $_POST['approvBy'],
    			"remark" => $_POST['remark'],
    			"custId" => $_SESSION['ID'],
    			"applyDate" => date('Y-m-d'),
                "file" => $filename
				);
	$res=$obj->insert('dm_leave_history',$data);
if($res)
{
$data = array("status" => "success");
}
else
{
$data = array("status" => "failed");
}
echo json_encode($data);
}

if($_POST['action']=='edit2')
{
    if($_FILES['file']!=""){
        if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else{
        $filename = $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/hr_docs/' . $filename);
    }
    }
    else{
        $filename='';
    }
	$data = array(
    			"fromDate" => date('Y-m-d',strtotime($_POST['fromDate'])),
    			"toDate" => date('Y-m-d',strtotime($_POST['toDate'])),
    			"type" => $_POST['type'],
    			"approvBy" => $_POST['approvBy'],
    			"remark" => $_POST['remark'],
                "file" => $filename
				);
	$res=$obj->update('dm_leave_history',$data,'id='.$_POST['id']);
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


if($_POST['action']=='delete')
{
$obj->delete("dm_leave_history","id=".$_POST['del_id']); 
}
?>