<?php
include_once("../include/config.php");

if($_POST['action']=='add')
{
$reg=$obj->display('dm_branch','id='.$_POST['branch']); $reg1=$reg->fetch_array();
$photo="";
if($_FILES['photo']['name']!="")
{
$photo=time().$_FILES['photo']['name'];
move_uploaded_file( $_FILES["photo"]["tmp_name"], "../uploads/employee/" . $photo);
}
	$data = array(

    			"name" => $_POST['name'],
    			"email" => $_POST['email'],
    			"mobile" => $_POST['mobile'],
    			"address" => $_POST['address'],
    			"photo" => $photo,
    			"dob" => date('Y-m-d',strtotime($_POST['dob'])),
    			"doj" => date('Y-m-d',strtotime($_POST['doj'])),
    			"role" => $_POST['role'],
    			"nationality" => $_POST['nationality'],
    			"branch" => $_POST['branch'],
    			"region" => $reg1['region'],
    			"username" => $_POST['username'],
    			"password" => $_POST['password'],
    			"ppNo" => $_POST['ppNo'],
    			"visaExp" => date('Y-m-d',strtotime($_POST['visaExp'])),
    			"department" => $_POST['department'],
    			"EID" => $_POST['EID']
				);

	$res=$obj->insert('dm_employee',$data);

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

	if($_POST['password']!="")
	{
		$data = array(
					"password" => $_POST['password']
					);
		$res=$obj->update('dm_employee',$data,'id='.$_POST['id']);
	}

	$reg=$obj->display('dm_branch','id='.$_POST['branch']); $reg1=$reg->fetch_array();

	if($_FILES['photo']['name']!="")
	{
	$photo=time().$_FILES['photo']['name'];
	move_uploaded_file( $_FILES["photo"]["tmp_name"], "../uploads/employee/" . $photo);
		$data5 = array(
					"photo" => $photo
					);
		$obj->update('dm_employee',$data5,'id='.$_POST['id']);
	}

	$data = array(

    			"name" => $_POST['name'],
    			"email" => $_POST['email'],
    			"mobile" => $_POST['mobile'],
    			"address" => $_POST['address'],
    			"dob" => date('Y-m-d',strtotime($_POST['dob'])),
    			"doj" => date('Y-m-d',strtotime($_POST['doj'])),
    			"role" => $_POST['role'],
    			"nationality" => $_POST['nationality'],
    			"branch" => $_POST['branch'],
    			"region" => $reg1['region'],
    			"ppNo" => $_POST['ppNo'],
    			"visaExp" => date('Y-m-d',strtotime($_POST['visaExp'])),
    			"department" => $_POST['department'],
    			"EID" => $_POST['EID']
				);

	$res=$obj->update('dm_employee',$data,'id='.$_POST['id']);

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

$obj->delete("dm_employee","id=".$_POST['del_id']); 

}

?>