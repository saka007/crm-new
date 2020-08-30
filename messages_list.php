<?php include_once("include/config.php"); ?>
<div class="col-sm-10">
	<div class="container">
		<div class="row">
<?php
 $msg = $obj->display('dm_messages','reciever like "%'.$_GET['msg'].'%" and is_read=0');
 while($row = $msg->fetch_array()) 
 {
    //  echo $row['sender'];
    //  print_r($row);die;
 ?>
 
 <a class="dropdown-item" href="ops_skill_canada.php?lead=<?php  echo substr($row['sender'],1); ?>" target="_blank">AG No.<?php echo substr($row['sender'],1); ?></a>
<br/>
 <?php } ?>

        </div>
        </div>
        </div>