<?php

include_once("include/config.php");

$ld=$obj->display('dm_lead','id='.$_GET['lead']);
if ($ld->num_rows>0){
$lead1=$ld->fetch_array();
}
$r=$lead1['region'];

$ct=$obj->display('dm_lead_contract','leadId='.$_GET['lead']);
if ($ct->num_rows>0){
$ct1=$ct->fetch_array();
}
$path1='uploads/file/'.$ct1['contract'];
$ctl=$obj->display('dm_gary_contract','leadid='.$_GET['lead']);
if ($ctl->num_rows>0){
$ctl2=$ctl->fetch_array();
}
$path2='uploads/Gary/'.$ctl2['contract'];

if($lead1['type']!="Skill")
	{
	    if($lead1['type']=="Visit"){
		$data=array('assignTo' => "115" );
	    $obj->update('dm_lead',$data,'id='.$_GET['lead']);
	    $em=$obj->display('dm_employee','id=115');
        $em1=$em->fetch_array();
        include_once('mail.php');
	    }
	    else if($lead1['type']=="Student"){ 
	        $data=array('assignTo' => "160" );
	    $obj->update('dm_lead',$data,'id='.$_GET['lead']);
	    $em=$obj->display('dm_employee','id=160');
        $em1=$em->fetch_array();
        include_once('mail.php');
	    }
	}
	else{
	if($r=="3" || $r=="4"||$r=="5")
	{
		if($lead1['country_interest']=="1")
		{
			$data=array('assignTo' => "12" );
			$obj->update('dm_lead',$data,'id='.$_GET['lead']);
			$em=$obj->display('dm_employee','id=12');
            $em1=$em->fetch_array();
            include_once('mail.php');
		}
		elseif ($lead1['country_interest']=="2" && $r=="3") {
			$data=array('assignTo' => "93" );
			$obj->update('dm_lead',$data,'id='.$_GET['lead']);
			$em=$obj->display('dm_employee','id=93');
            $em1=$em->fetch_array();
            include_once('mail.php');
		}
		elseif ($lead1['country_interest']=="2" && $r=="4") {
			$data=array('assignTo' => "120" );
			$obj->update('dm_lead',$data,'id='.$_GET['lead']);
			$em=$obj->display('dm_employee','id=120');
            $em1=$em->fetch_array();
            include_once('mail.php');
		}
		elseif ($lead1['country_interest']=="2" && $r=="5") {
			$data=array('assignTo' => "17" );
			$obj->update('dm_lead',$data,'id='.$_GET['lead']);
			$em=$obj->display('dm_employee','id=17');
            $em1=$em->fetch_array();
            include_once('mail.php');
		}
	}
		elseif ($r=="6") {
		$data=array('assignTo' => "162" );
	    $obj->update('dm_lead',$data,'id='.$_GET['lead']);
	    $em=$obj->display('dm_employee','id=162');
            $em1=$em->fetch_array();
            include_once('mail.php');
	}
	elseif ($r=="7") {
		$data=array('assignTo' => "24" );
	    $obj->update('dm_lead',$data,'id='.$_GET['lead']);
	    $em=$obj->display('dm_employee','id=24');
            $em1=$em->fetch_array();
            include_once('mail.php');
	}
	elseif ($r=="8" && $lead1['country_interest']=="1") {
		$data=array('assignTo' => "24" );
	    $obj->update('dm_lead',$data,'id='.$_GET['lead']);
	    $em=$obj->display('dm_employee','id=24');
            $em1=$em->fetch_array();
            include_once('mail.php');
	}
	elseif ($r=="8" && $lead1['country_interest']=="2") {
		$data=array('assignTo' => "80" );
	    $obj->update('dm_lead',$data,'id='.$_GET['lead']);
	    $em=$obj->display('dm_employee','id=80');
            $em1=$em->fetch_array();
            include_once('mail.php');
	}
		elseif ($r=="9" || $r=="10") {
		$data=array('assignTo' => "37" );
	    $obj->update('dm_lead',$data,'id='.$_GET['lead']);
	    $em=$obj->display('dm_employee','id=37');
            $em1=$em->fetch_array();
            include_once('mail.php');
	}
    }

// echo $path;die;

// echo $ctl2['contract'];die;


// include_once('vendor\phpmailer\phpmailer\src\phpmailer.php')
// Load Composer's autoloader
// require 'vendor\autoload.php';
require 'PHPMailerAutoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Set the hostname of the mail server
$mail->Host = 'mail.dm-consultant.com';
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
$mail->Username = "no-reply@dm-consultant.com";

//Password to use for SMTP authentication
// $mail->Password = "O-a#e5KQmu6@";

$mail->Password = "@uvmya;@elQ~";

//Set who the message is to be sent from
$mail->setFrom('no-reply@dm-consultant.com', 'DM Consultants');

//Set an alternative reply-to address
// $mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
// $mail->addAddress($lead1['email']);

$mail->addAddress('itsupport@dm-consultant.com');

$mail->isHTML(true);


// $mail->addAttachment($path);

// $mail->attachall();

$mail->Body    = 'Hi '.$leadd1['fname'].',<br/> Thanks for choosing DM consultants.
<br/>Please find Attachment for your Agreements.
<br/>
<br/>This is System generated Email please dont reply to this email.';

$mail->addAttachment($path1);
$mail->addAttachment($path2);


if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>