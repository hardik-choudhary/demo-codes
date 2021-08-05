<?php
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;
// use Minishlink\WebPush\VAPID;

require "includes/database.php";
require 'web-push/vendor/autoload.php';

// var_dump(VAPID::createVapidKeys());
// die;

$publicKey = "BDHpi7gABWvOmNiyzuhET2-C6HBasei0BAzcxpQGbbpr2rqH7q758MqkX6Jq9nBwEELC27pe-j7sOPTkz4gAKaI";
$privateKey = "HB0FaP2rbzQFHq9NT2cM80rvfVXfpY_4HsQ54wThC-k";

$message = json_encode([
    'title' => 'Push Message!',
    'body' => 'Yay it works.',
    'icon' => 'https://local.tt/videos/push-notification/images/icon.png',
    'badge' => 'https://local.tt/videos/push-notificationimages/badge.png',
    'extraData' => 'https://thintake.in?ref=push-message'
]);


$time = time();
$query = $con->query("SELECT * FROM `push_subscribers` WHERE `expirationTime` = 0 OR `expirationTime` > '{$time}'");
if($query->num_rows > 0){
    $auth = [
        'VAPID' => [
            'subject' => 'https://thintake.in', // can be a mailto: or your website address
            'publicKey' => $publicKey, // (recommended) uncompressed public key P-256 encoded in Base64-URL
            'privateKey' => $privateKey, // (recommended) in fact the secret multiplier of the private key encoded in Base64-URL
        ],
    ];
    $webPush = new WebPush($auth);

    while ($subscriber = $query->fetch_assoc()) {
        $subscription = Subscription::create([
                "endpoint" => $subscriber['endpoint'],
                "keys" => [
                    'p256dh' => $subscriber['p256dh'],
                    'auth' => $subscriber['authKey']
                ]
            ]);
        $webPush->queueNotification($subscription, $message);
    }

    foreach ($webPush->flush() as $report) {
        $endpoint = $report->getRequest()->getUri()->__toString();
    
        if ($report->isSuccess()) {
            echo "Message sent successfully for {$endpoint}.<br>";
        } else {
            echo "Message failed to sent for {$endpoint}: {$report->getReason()}.<br>";
        }
    }
}
else{
    echo "No Subscribers";
}