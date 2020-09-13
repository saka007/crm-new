<?php
include_once("include/config.php");
$lead=$obj->display('appointments');
while($lead1=$lead->fetch_array()) {
    $og_date = $lead1["date"];
    // $date = DateTime::createFromFormat('Y-m-d', $og_date);
    // $con_date = $date->format('Y-m-d H:i:s');

    $file_data_array[] = array(
        "title" => $lead1["leadid"],
        "start" => $og_date,
        "end"   => $og_date,
        "backgroundColor" => "green", 
        "borderColor"    =>  "#00c0ef",
        "eventTextColor"    =>  "#FFFFFF"
    ); 
}
echo json_encode($file_data_array);
?>