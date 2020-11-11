<?php
include_once("head.php");
/** Include PHPExcel */
require_once './vendor/Classes/PHPExcel.php';
require_once './vendor/Classes/PHPExcel/IOFactory.php';

$duplicateRecord = [];
$skipRecord = [];
if (isset($_POST["import"]) && isset($_SESSION['import']) && $_POST["import"] == $_SESSION["import"]) {
    $_SESSION["import"] = '';
    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = 'uploads/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $objPHPExcel = PHPExcel_IOFactory::load($targetPath);
        foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
            $highestRow = $worksheet->getHighestRow();
            for ($row = 2; $row <= $highestRow; $row++) {
                $fname = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                $mname = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                $lname = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                $email = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                $mobile = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                $nationality = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                $address = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                $dob = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                $gender = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                $country_interest = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                $service_interest = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                $relative = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                $market_source = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                $mstatus = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                $fnames = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                $emails = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                $phones = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                $mobiles = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
                $sedu = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
                $kids = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
                $sexp = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
                $lead_category = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
                $enquiry = $worksheet->getCellByColumnAndRow(22, $row)->getValue();
                if (empty($email) || empty($mobile)) {
                    array_push($skipRecord, $row);
                    $skip_error = "skip-error";
                    $message_skip = "Record Skip";
                    continue;
                }

                $ext = $obj->display('dm_lead', 'email="' . $email . '" or mobile="' . $mobile . '"');


                if ($ext->num_rows == 0) {

                    if ($dob != "") {
                        $dob = date('Y-m-d', strtotime($dob));
                    }

                    $data = array(
                        'fname'  =>  $fname,
                        'mname'  =>  $mname,
                        'lname'  =>  $lname,
                        'email'  =>  $email,
                        'phone'  =>  $alternate_num,
                        'mobile'  =>  $mobile,
                        'nationality'  =>  $nationality,
                        'address'  =>  $address,
                        'dob'  =>  $dob,
                        'gender'  =>  $gender,
                        'country_interest'  =>  $country_interest,
                        'service_interest'  =>  $service_interest,
                        'relative' => $relative,
                        'market_source'  =>  $market_source,
                        'mstatus' => $mstatus,
                        //spouse data
                        'fnames' => $fnames,
                        'emails' => $emails,
                        'phones' => $phones,
                        'mobiles' => $mobiles,
                        'sedu' => $sedu,
                        'kids' => $kids,
                        'sexp' => $sexp,
                        //end
                        'lead_category' => $lead_category,
                        'enquiry'  =>  $enquiry,
                        'assignTo'  =>  $_SESSION["ID"],
                        'Counsilor'  =>  $_SESSION["ID"],
                        // 'appointment'  =>  $appointment, no entry on add new page
                        'regdate'  =>  date('Y-m-d'),
                        'last_updated' => date('d-m-Y h-i-sa'),
                        // 'followup'  =>  date('Y-m-d', strtotime($_POST['followup'])), no entry on add new page
                        // 'convet'  =>  $_POST['convet'], no entry on add new page
                        // 'type'  =>  $_POST['type'],no entry on add new page
                        'branch'  =>  $_SESSION["BRANCH"],
                        'region'  =>  $_SESSION["REGION"]
                    );
                    $odr = $obj->insert('dm_lead', $data);

                    if (!empty($odr)) {
                        $type = "success";
                        $message = "Excel Data Imported into the Database";
                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                    }
                } else {
                    $dup = $ext->fetch_array();
                    $dup1 = array($row => $dup['id']);
                    array_push($duplicateRecord, $dup1);
                    $duplicate_error = "duplicate-error";
                    $message_dup = "Duplicate error";
                }
            }
        }
    } else {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
    }
} else {
    $_SESSION["import"] = md5(rand(0, 10000000));
}
?>

<style>
    #response {
        padding: 5px;
        margin-top: 0px;
        border-radius: 2px;
        display: none;
    }

    .success {
        background: #c7efd9;
        border: #bbe2cd 1px solid;
    }

    .duplicate-error,
    .skip-error,
    .error {
        background: #fbcfcf;
        border: #f3c6c7 1px solid;
    }

    div#response.display-block {
        display: block;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Import Lead as Excel</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Import Lead as Excel</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div id="response" class="<?php if (!empty($type)) {
                                                    echo $type . " display-block";
                                                } ?>"><?php if (!empty($type)) {
                                                            echo $message;
                                                        } ?></div>
                    <div id="response" class="<?php if (!empty($duplicate_error)) {
                                                    echo $duplicate_error . " display-block";
                                                } ?>"><?php if (!empty($duplicate_error)) {
                                                            echo "Total Duplicate Entry Count " . count($duplicateRecord);
                                                            echo "<br>Duplicate Entry Record Number  ";
                                                            foreach ($duplicateRecord as $values) {
                                                                foreach ($values as $key => $value) {
                                                                    echo "<a href='./lead_view.php?lead=" . $value . "'>" . $key . "</a>" . "&nbsp;&nbsp;";
                                                                }
                                                            }
                                                        } ?></div>
                    <div id="response" class="<?php if (!empty($skip_error)) {
                                                    echo $skip_error . " display-block";
                                                } ?>"><?php if (!empty($skip_error)) {
                                                            echo "Total Skipped Count " . count($skipRecord);
                                                            echo "<br>Skipped Entry Record Number  ";
                                                            foreach ($skipRecord as $key => $value) {
                                                                echo $value . "&nbsp;&nbsp;";
                                                            }
                                                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <form action="" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                                    <div class="col-sm-12">
                                        <input type="file" name="file" id="file" accept=".xls,.xlsx">
                                        <button type="submit" id="submit" name="import" class="btn btn-info" value="<?php echo htmlspecialchars($_SESSION["import"]); ?>">Import as Excel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include_once("foot.php"); 
?>