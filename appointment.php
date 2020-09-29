<?php include_once("head.php");
if(isset($_REQUEST['lead'])){
$data = array(
	'leadid' => $_REQUEST['lead'],
	'date' => date('Y-m-d',strtotime($_REQUEST['date'])),
	'counsilorid' => $_REQUEST['emp'],
	'booked' => 1,
	'type' =>$_REQUEST['type'],
	'time' => $_REQUEST['time'],
	'region' => $_REQUEST['region']
	 );
// print_r($data);die;
// echo date('Y-m-d',strtotime($_REQUEST['date']));die;
$obj->insert('appointments',$data);
header("location:lead_search_management.php");
}

if(isset($_REQUEST['l'])){
	$data = array(
		'done' => 1, 
	);
	$obj->update('appointments',$data,'id='.$_REQUEST['l']);
	header("location: book_meetings.php");
}
if(isset($_REQUEST['ld'])){
	$data = array(
		'not_done' =>1 , 
	);
	$obj->update('appointments',$data,'id='.$_REQUEST['ld']);
	header('location: book_meetings.php');
}
?>
