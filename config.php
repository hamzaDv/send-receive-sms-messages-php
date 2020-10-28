<?php

require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;


// TWILIO
// Your Account SID and Auth Token from twilio.com/console
$account_sid = '';
$auth_token = '';
$twilio_number = "+1********";

$twilio = new Client($account_sid, $auth_token);

// CALLR
$thecallrLogin    = '';
$thecallrPassword = '';

$thecallrLogin    = '';
$thecallrPassword = '';

// get api client object 
$api = new \CALLR\API\Client;


// set authentication credentials
$api->setAuth(new CALLR\API\Authentication\LoginPasswordAuth($thecallrLogin, $thecallrPassword));


return array(
    'account_sid' => $account_sid,
    'auth_token' => $auth_token,
    'twilio_number' => $twilio_number,
    'twilio' => $twilio,
    'thecallrLogin' => $thecallrLogin,
    'thecallrPassword' => $thecallrPassword,
    'client'    => $api
);


?>
