<?php
include_once("../include/config.php");
$result=array();

$m1 = $obj->display3("select count(id) mcount  from dm_messages where  reciever='".$_POST['sender']."' and is_read=0");
 if ($m1->num_rows > 0) {
 	 $m = $m1->fetch_array();
 	 $mcount=$m["mcount"];
}
$m2 = $obj->display3("select message  from dm_messages where  reciever='".$_POST['sender']."' and is_read=0 order by `date-time` desc limit 1");
 if ($m2->num_rows > 0) {
 	 $m22 = $m2->fetch_array();
 	 $message=$m22["message"];
}
$obj=new \stdClass;
$obj->mcount=$mcount;
$obj->message=$message;
echo json_encode($obj);
?>