<?php
require __DIR__."/../stomp-php/autoload.php";
use FuseSource\Stomp\Stomp;

$server = "localhost";
$port = "61613";
$login = "guest";
$passcode = "guest";
$destination = "/queue/test";

$client = new Stomp("tcp://".$server.":".$port) or exit("Error: Wrong URI");
$client->connect($login, $passcode) or exit("Error: Wrong credential");

$client->subscribe($destination, array("ack" => "client")) or exit("Error: Failed to subscribe destination");

while(true) {
	if ($message = $client->readFrame()) {
		echo $message->body.PHP_EOL;
		$client->ack($message) or exit("Error: Failed to ACK the message");
	}	
}

$client->unsubscribe($destination) or exit("Error: Failed to unsubscribe destination");
$client->disconnect();
