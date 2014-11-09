<?php
require __DIR__.'/../stomp-php/autoload.php';
use FuseSource\Stomp\Stomp;

$server = "localhost";
$port = "61613";
$login = "guest";
$passcode = "guest";
$destination = "/queue/test";
/* Try other types of destination to see how differently will the client act
refer to http://www.rabbitmq.com/stomp.html section "Destinations"*/

$client = new Stomp("tcp://".$server.":".$port) or exit("Error: Wrong URI");
$client->connect($login, $passcode) or exit("Error: Wrong credential");

echo "Quantity of test messages: ";
$msgNum = rtrim(fgets(STDIN), PHP_EOL);
for ($i = 1; $i <= $msgNum; $i++) {
	$client->send($destination, "test msg ".$i) or exit("Error: Failed to send message");
}

$client->disconnect();
