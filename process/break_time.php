<?php
include_once("../include/config.php");
$today = date('Y-m-d');
$data = array(
    'emp_id' => $_SESSION['ID'],
    'break_in_time' => $_POST['break_in_time'],
    'break_out_time' => $_POST['break_out_time'],
);

if ($_POST['break_out_time']) {
    $res = $obj->update('employee_activity', array('break_out_time' => $_POST['break_out_time']), 'emp_id=' . $_SESSION['ID'] . " and log_in_time like '%$today%'");
} else {
    $res = $obj->update('employee_activity', $data, 'emp_id=' . $_SESSION['ID'] . " and log_in_time like '%$today%'");
}


if ($res) {
    $data = array("status" => "success");
} else {
    $data = array("status" => "failed");
}
echo json_encode($data);
