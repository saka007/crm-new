<?php
// include_once("include/authenticate.php");
include_once("include/config.php");

$rf = $obj->display('refund','leadid='.$_GET['lead']);
$rf1 = $rf->fetch_array();

print_r($rf1);die;
require 'PHPMailerAutoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Set the hostname of the mail server
$mail->Host = 'mail.mydmconsultant.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "test@mydmconsultant.com";

//Password to use for SMTP authentication
$mail->Password = "test@123";

//Set who the message is to be sent from
$mail->setFrom('test@mydmconsultant.com', 'First Last');

//Set an alternative reply-to address
// $mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress('ITsupport@dm-consultant.com', 'John Doe');

$mail->isHTML(true);
$body="Client with Agreement no:".$rf1['ag_no']." has requested a refund.<br/>This is Auto Generated Email.Below is the reason for refund<p>".$rf1['reason']."</p>";
//  echo $body;die;
$mail->Body    = $body;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>