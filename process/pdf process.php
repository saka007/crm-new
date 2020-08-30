<?php
include_once("../include/config.php");
try {
  $filename = $_POST['agc'];
  require_once("../mpdf/autoload.php");
  $mpdf = new \Mpdf\Mpdf([
    'mode'=>'c',
    'margin_top' => 25,
    'margin_bottom' => 25,
    'margin_header' => 10,
    'margin_footer' => 5,
    'defaultfooterfontstyle' => 'B',
    'defaultfooterline' => 0,
    'defaultheaderline' => 0,
     'format' => 'A4'
  ]);

  $stylesheet = file_get_contents('../css/agreement style.css');
/*  $mpdf->showImageErrors = true;
  $mpdf->mirrorMargins = 1;

 $cabecalho = '<div>header</div>'; 

$footer = "<strong>hello</strong>";
$mpdf->SetHTMLHeader($cabecalho);
$mpdf->SetHTMLFooter($footer); 
$mpdf->setFooter('{PAGENO} / {nb}');
*/
$mpdf->setAutoTopMargin = 'stretch';
$mpdf->setAutoBottomMargin = 'stretch';
$mpdf->SetHeader("<div style='width:100%;' align='center'><img src='../images/logo.png' width='127' style='padding-bottom:10px'></div>");
$mpdf->SetFooter("<div >
                    <div style='display:inline;float:left;width:30%;'>Signature: ___________________ </div>
                    <div style='display:inline;float:right;width:60%;' align='right'>Page {PAGENO} out of {nbpg} pages</div>
                    </div>
                    <div style='clear:both;padding-top:25px' align='center' >"
                    .$_POST['b_name']."  ".trim(preg_replace('/\s\s+/', ' ', $_POST['b_address']))."<br/>  ".$_POST['b_mobile']."  ".$_POST['b_email']."</div>
                ");
$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($_POST['html_text'],\Mpdf\HTMLParserMode::HTML_BODY);

  $mpdf->SetTitle('Lead Agreement');

 
  // $mpdf->Output($filename, 'I');

  $mpdf->Output('../uploads/file/AG-'.$filename.'.pdf', 'F');

  $data=array(
    'contract' => 'AG-'.$filename.'.pdf'
  );
 
  $obj->update('dm_lead_contract',$data,'id='.$_POST['agc']);

  $ld = $obj->display('dm_lead_contract','id='.$_POST['agc']);
  $ld1 = $ld->fetch_array();

  $gr = $obj->display('dm_gary_contract','leadid='.$ld1['leadId']);
  if($gr->num_rows==0){
    $data2 = array(
      'leadid' => $ld1['leadId'],
      'contract'=>'',
      'contract_signed'=>''
    );
    $obj->insert('dm_gary_contract', $data2);
  }



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

 
  $mpdf2->Output($filename." 2", 'I');

 
} catch(\Mpdf\MpdfException $e) {
  echo "Error: ".$e->getMessage();
}

?>