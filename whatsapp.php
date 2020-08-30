<?php

require __DIR__ . "/vendor/autoload.php";

use Twilio\Rest\Client;

// $dotenv = Dotenv\Dotenv::create(__DIR__);
// $dotenv->load();

$twilioSid    = 'ACdcbac16c40092eef57826cd93e2ef533';
$twilioToken  = '98d9e10d52ce35bacbe701cb386a87b7';

$twilio = new Client($twilioSid, $twilioToken);

$message = $twilio->messages
                 ->create(
                     "whatsapp:+971589293060",
                     array(
                              "body" => $_POST['message'],
                              "from" => "whatsapp:+14155238886"
                          )
                 );