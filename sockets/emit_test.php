<?php
include ("vendor/autoload.php");

use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2X;

$client = new Client(new Version2X('//127.0.0.1:1337'));

// start

include_once("../include/config.php");
$result=array();

$m1 = $obj->display3("select count(id) mcount  from dm_messages where  reciever='".$_GET['reciever']."' and is_read=0");
 if ($m1->num_rows > 0) {
 	 $m = $m1->fetch_array();
 	 $mcount=$m["mcount"];
}
$m2 = $obj->display3("select message  from dm_messages where  reciever='".$_GET['reciever']."' and is_read=0 order by `date-time` desc limit 1");
 if ($m2->num_rows > 0) {
 	 $m22 = $m2->fetch_array();
 	 $message=$m22["message"];
}
$page="";
$name="";
if (strpos($_GET['sender'], 'L') !== false) {
	$l3 = $obj->display3("select * from dm_lead where id=".str_replace("L", "", $_GET['sender']));
	 if ($l3->num_rows > 0) {
	 	 $led1 = $l3->fetch_array();
	 	 $name=$led1['fname']." ".$led1['lname'];
	 	 if($led1['type']=='Visit') {  $page='visit_visa_ops.php?lead='.$led1['id'].'#tab20';}
		if($led1['type']=='Student') { $page='student_visa_ops.php?lead='.$led1['id'].'#tab20';}

		if($led1['type']=="Skill")
		{
		if($led1['country_interest']==1) { $page='ops_skill_australia.php?lead='.$led1['id'].'#tab20';}
		if($led1['country_interest']==2) { $page='ops_skill_canada.php?lead='.$led1['id'].'#tab20';}
		}

		if($led1['type']=="Business")
		{
		if($led1['country_interest']==2) { $page='ops_business_canada.php?lead='.$led1['id'].'#tab20';}
		if($led1['country_interest']==3) { $page='ops_business_uk.php?lead='.$led1['id'].'#tab20';}
		if($led1['country_interest']==4) { $page='ops_business_usa.php?lead='.$led1['id'].'#tab20';}
		if($led1['country_interest']==5) { $page='ops_business_poland.php?lead='.$led1['id'].'#tab20';}
		}

	}
}
// $obj=new \stdClass;
// $obj->mcount=$mcount;
// $obj->message=$message;
// echo json_encode($obj);


//end

$client->initialize();
// send message to connected clients
$client->emit('broadcast', ['message' => $message, 'count' => $mcount, 'sender' => $_GET['sender'],'reciever' => $_GET['reciever'],'page' => $page, 'name'=>$name]);
$client->close();
?>