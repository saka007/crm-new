<?php
// echo "done";die;

// include_once('vendor\phpmailer\phpmailer\src\phpmailer.php')
// Load Composer's autoloader
// require 'vendor\autoload.php';
// $em1['email']= 'hero';
// $em1['name']='zero';
// $ag1['id']=1;
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
$mail->setFrom('test@mydmconsultant.com', 'Auto Generated Email');

//Set an alternative reply-to address
// $mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress($em1['cemail'], 'Documents Uploaded');

$mail->addCC('crm@dm-consultant.com');

$mail->isHTML(true);

$mail->Body    = 'Dear '.$em1['name'].'<p>This Client with Agreement No. '.$ag1["id"].' has uploaded documents please check and review.';
// print_r($mail->Body);die;
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>