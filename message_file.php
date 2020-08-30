<?php
include_once("../include/config.php");
$target_dir = "../uploads/attachments/";
$message_id=$_POST['message_id'];
foreach($_FILES['file']['tmp_name'] as $key => $value) {
if ( 0 < $_FILES['file']['error'][$key]) 
    {
        echo 'Error: ' . $_FILES['file']['error'][$key] . '<br>';
    }
    else 
    {
        $tempFile = $_FILES['file']['tmp_name'][$key];
        $targetFile =  time().'_'. $_FILES['file']['name'][$key];
        move_uploaded_file($tempFile,$target_dir .$targetFile);
        // echo "insert into dm_message_attachment(message_id,file_name) values ( ".$message_id.",'". $targetFile."') ";
        $obj->display3("insert into dm_message_attachment(message_id,file_name) values ( ".$message_id.",'". $targetFile."') ");
    }
}

?>