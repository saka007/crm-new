<?php

include_once("../include/config.php");



if($_POST['action']=='add')

{

$rt=$obj->display('dm_contract_file','country="'.$_POST['country'].'" and service="'.$_POST['program'].'"');

if($rt->num_rows==0)

{

 if ( 0 < $_FILES['avatar']['error'] ) {

        echo 'Error: ' . $_FILES['avatar']['error'] . '<br>';

    }

    else {

		$file=time().'_'.$_FILES['avatar']['name'];

        move_uploaded_file($_FILES['avatar']['tmp_name'], '../uploads/documents/' . $file);

    }



	$data = array(

    			"country" => $_POST['country'],

    			"service" => $_POST['program'],

    			"file" => $file

				);

	$res=$obj->insert('dm_contract_file',$data);

if($res)

{

$data = array("status" => "success");

}

else

{

$data = array("status" => "failed");

}

}

else

{

$data = array("status" => "failed");

}

echo json_encode($data);

}









if($_POST['action']=='delete')

{

$obj->delete("dm_contract_file","id=".$_POST['del_id']); 

}

?>