<?php include_once("include/config.php");
$result=$obj->display('old_data_1');
$num_filter_row=mysqli_num_rows($result);//echo $num_filter_row;die;
$data=array();
// $i=1;
while($row=$result->fetch_assoc())
{
	$sub_array=array();
	// $sub_array[]=$i;
	$sub_array[]=utf8_encode('<div contenteditable class="update" data-id="'.$row["sr_no"].'" data-column="sr_no">' . $row["sr_no"] . '</div>');
	$sub_array[]=utf8_encode('<div contenteditable class="update" data-id="'.$row["sr_no"].'" data-column="Agno">' . $row["Agno"] . '</div>');
	$sub_array[]=utf8_encode('<div contenteditable class="update" data-id="'.$row["sr_no"].'" data-column="SignupDate">' . $row["SignupDate"] . '</div>');
	$sub_array[]=utf8_encode('<div contenteditable class="update" data-id="'.$row["sr_no"].'" data-column="ClientName">' . $row["ClientName"] . '</div>');
	$sub_array[]=utf8_encode('<div contenteditable class="update" data-id="'.$row["sr_no"].'" data-column="Mobile">' . $row["Mobile"] . '</div>');
	$sub_array[]=utf8_encode('<div contenteditable class="update" data-id="'.$row["sr_no"].'" data-column="Email">' . $row["Email"] . '</div>');
	$sub_array[]=utf8_encode('<div contenteditable class="update" data-id="'.$row["sr_no"].'" data-column="Country">' . $row["Country"] . '</div>');
	$sub_array[]=utf8_encode('<div contenteditable class="update" data-id="'.$row["sr_no"].'" data-column="Branch">' . $row["Branch"] . '</div>');
	$sub_array[]=utf8_encode('<div contenteditable class="update" data-id="'.$row["sr_no"].'" data-column="TotalPackage">' . $row["TotalPackage"] . '</div>');
	$sub_array[]=utf8_encode('<div contenteditable class="update" data-id="'.$row["sr_no"].'" data-column="PaidAmount">' . $row["PaidAmount"] . '</div>');
	$sub_array[]=utf8_encode('<div contenteditable class="update" data-id="'.$row["sr_no"].'" data-column="PendingAmount">' . $row["PendingAmount"] . '</div>');
	$sub_array[]=utf8_encode('<div contenteditable class="update" data-id="'.$row["sr_no"].'" data-column="Counselor">' . $row["Counselor"] . '</div>');
	$sub_array[]=utf8_encode('<div contenteditable class="update" data-id="'.$row["sr_no"].'" data-column="CPO1">' . $row["CPO1"] . '</div>');
	$sub_array[]=utf8_encode('<div contenteditable class="update" data-id="'.$row["sr_no"].'" data-column="CPO2">' . $row["CPO2"] . '</div>');
	$sub_array[]=utf8_encode('<div contenteditable class="update" data-id="'.$row["sr_no"].'" data-column="EcaStatus">' . $row["EcaStatus"] . '</div>');
	$sub_array[]=utf8_encode('<div contenteditable class="update" data-id="'.$row["sr_no"].'" data-column="SpouseEca">' . $row["SpouseEca"] . '</div>');
	$sub_array[]=utf8_encode('<div contenteditable class="update" data-id="'.$row["sr_no"].'" data-column="IETSstatus">' . $row["IETSstatus"] . '</div>');
	$sub_array[]=utf8_encode('<div contenteditable class="update" data-id="'.$row["sr_no"].'" data-column="EEstatus">' . $row["EEstatus"] . '</div>');
	$sub_array[]=utf8_encode('<div contenteditable class="update" data-id="'.$row["sr_no"].'" data-column="Noc">' . $row["Noc"] . '</div>');
	$sub_array[]=utf8_encode('<div contenteditable class="update" data-id="'.$row["sr_no"].'" data-column="CRS">' . $row["CRS"] . '</div>');
	$sub_array[]=utf8_encode('<div contenteditable class="update" data-id="'.$row["sr_no"].'" data-column="StatusLastUpdated">' . $row["StatusLastUpdated"] . '</div>');
	$sub_array[]=utf8_encode('<div contenteditable class="update" data-id="'.$row["sr_no"].'" data-column="PnpSubmitted">' . $row["PnpSubmitted"] . '</div>');
	$sub_array[]=utf8_encode('<div contenteditable class="update" data-id="'.$row["sr_no"].'" data-column="Decision">' . $row["Decision"] . '</div>');
	$sub_array[]=utf8_encode('<div contenteditable class="update" data-id="'.$row["sr_no"].'" data-column="Remarks">' . $row["Remarks"] . '</div>');
	$sub_array[]=utf8_encode('<div contenteditable class="update" data-id="'.$row["sr_no"].'" data-column="flag">' . $row["flag"] . '</div>');
	// $i++;
	$data[]=$sub_array;
}

$output=array(
// "draw"=>intval($_POST['draw']),	
"recordsTotal"=>$num_filter_row,
// "recordsFiltered"=>$num_filter_row,
"data"=>$data
);
// print_r($output);die;
// echo json_last_error_msg();
echo json_encode($output, JSON_UNESCAPED_UNICODE);
?>
