<?php
include_once("../include/config.php");
$today = date('Y-m-d');
if ($_POST['log_in_time'] == 'true') {
    $log_in_time = date('Y-m-d H:i:s');
} else {
    $log_in_time = '';
}

if ($_POST['log_out_time'] == 'true') {
    $log_out_time = date('Y-m-d H:i:s');
} else {
    $log_out_time = '';
}

$data = array(
    'emp_id' => $_SESSION['ID'],
    'log_in_time' => $log_in_time,
    'log_out_time' => $log_out_time,
    'created_at' => $today,
);


if ($log_out_time) {
    $res = $obj->update('employee_activity', array('log_out_time' => $log_out_time), 'emp_id=' . $_SESSION['ID'] . " and log_in_time like '%$today%'");
} else {
    $res = $obj->insert('employee_activity', $data);
}


if ($res) {
    $data = array("status" => "success" , );
} else {
    $data = array("status" => "failed");
}
echo json_encode($data);
