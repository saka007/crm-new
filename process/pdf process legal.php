<?php
include_once("../include/config.php");

try {
  $filename = $_POST['agl'];
  require_once("../mpdf/autoload.php");
  $stylesheet = file_get_contents('../css/agreement style.css');



  $mpdf2 = new \Mpdf\Mpdf([
    'mode'=>'c',
    'margin_top' => 35,
    'margin_bottom' => 17,
    'margin_header' => 10,
    'margin_footer' => 10,
    'defaultfooterfontstyle' => 'B',
    'defaultfooterline' => 0,
    'defaultheaderline' => 0,
     'format' => 'A4'
  ]);

$mpdf2->setAutoTopMargin = 'stretch';
$mpdf2->setAutoBottomMargin = 'stretch';

$mpdf2->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf2->WriteHTML($_POST['legal_text'],\Mpdf\HTMLParserMode::HTML_BODY);

  $mpdf2->SetTitle('Legal Agreement');

 
  // $mpdf2->Output($filename." 2", 'I');

  $mpdf2->Output('../uploads/Gary/AGL-'.$filename.'.pdf', 'F');

  $data=array(
    'contract' => 'AGL-'.$filename.'.pdf'
  );
 
  $obj->update('dm_gary_contract',$data,'leadid='.$_POST['lead']);

  // include_once("../mail.php");

} catch(\Mpdf\MpdfException $e) {
  echo "Error: ".$e->getMessage();
}

?>