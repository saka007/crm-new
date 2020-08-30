<?php
include ("vendor/autoload.php");

use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2X;

$client = new Client(new Version2X('//127.0.0.1:1337'));

$client->initialize();
// send message to connected clients
$client->emit('broadcast', ['reload' => "done"]);
$client->close();
?>