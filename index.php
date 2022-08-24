<?php 
/*
composer init
composer config minimum-stability dev
composer config prefer-stable true
composer require sngrl/php-firebase-cloud-messaging

*/
require 'vendor/autoload.php';
use sngrl\PhpFirebaseCloudMessaging\Client;
use sngrl\PhpFirebaseCloudMessaging\Message;
use sngrl\PhpFirebaseCloudMessaging\Recipient\Device;
use sngrl\PhpFirebaseCloudMessaging\Notification;
 
$server_key = "XXXX";

$client = new Client();
$client->setApiKey($server_key);
$client->injectGuzzleHttpClient(new \GuzzleHttp\Client());

$message = new Message();
$message->setPriority('high');

$message->setNotification(new Notification('some title', 'some body','default'))
		->setData(['key' => 'value']);


$deviceTokens = array("dj_uwFCpRCayAnsLNXGJ5W:APA91bHfd0xGMM2m6GLhbWlfY980n-XPukZsJq-2LDxFlo9qgc5WdRRieb52kHW4t4m6CikvtZNJTZVWMBG5I6TMcUakGCpxYJXxDauC38ezCgQlf4RjZvhrlA5l6xr5jM8h8IgQvOen",
					"cBFWyhk6QYa7nxnUXvAjJx:APA91bEyMgQ40GzUyPBYDPJSpUkoggFGl9P7ww1gd6qGiwlSOit4SbU39AaJppkkD2EVffTCtQDS05kYigwGA61IzKPD2psl_tBnoAwBGlbKFSRDBiMc0HomHe_XxWVkZs1R6NoWL8j0");

foreach ($deviceTokens as $clientToken) {
		
       $message->addRecipient(new Device($clientToken));
}
 
$response = $client -> send($message);
var_dump($response->getStatusCode());
var_dump($response->getBody()->getContents());



?>