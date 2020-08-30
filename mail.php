<?php

include_once("include/config.php");

$ct=$obj->display('dm_lead_contract','id=20600');
$ct1=$ct->fetch_array();
$path='uploads/file/'.$ct1['contract'];

// include_once('vendor\phpmailer\phpmailer\src\phpmailer.php')
// Load Composer's autoloader
// require 'vendor\autoload.php';
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
$mail->Password = "O-a#e5KQmu6@";

//Set who the message is to be sent from
$mail->setFrom('test@mydmconsultant.com', 'First Last');

//Set an alternative reply-to address
// $mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress('ITsupport@dm-consultant.com', 'John Doe');

$mail->isHTML(true);

$mail->Body    = 'This is the HTML message body <b>New mail!</b>';

$mail->addAttachment($path);

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>