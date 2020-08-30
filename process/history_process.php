<?php
include_once("../include/config.php");
$result=array();
$obj->display3("SET SESSION group_concat_max_len = 1000000;");
$m1 = $obj->display3('select m.*, a.file_name,IFNULL(e.name,"DM Officer") officer, IF(sender="'.$_POST['sender'].'",1,0) mine, GROUP_CONCAT(file_name SEPARATOR "|||") files from dm_messages m left join dm_message_attachment a on m.id=a.message_id join dm_employee e on m.reciever=concat("O",e.id) or m.sender=concat("O",e.id) where  m.sender = "'.$_POST['sender'].'" or m.reciever="'.$_POST['sender'].'" group by m.id order by `date-time`');
 if ($m1->num_rows > 0) {
 	while( $m = $m1->fetch_array()){
 		$msg=new \stdClass;
 		$msg->mine=$m['mine'];
 		$msg->message=$m['message'];
 		$date=date_create($m['date-time']);
 		$msg->datetime=date_format($date,"d-m-Y H:i");
 		$msg->datetimetext=time_elapsed_string($m['date-time']);
        $msg->officer=$m['officer']; 
        $msg->attachments=(trim($m['files'])!=""?explode("|||", $m['files']):array()); 
        array_push($result, $msg); 
}
echo json_encode($result);
}
else{
	echo "";
}

?>