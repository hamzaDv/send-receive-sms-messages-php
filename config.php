<?php

require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;


// TWILIO
// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'AC83ece2a907754b9a563fa5d58b6abbf5';
$auth_token = '73a2453c3522bf7b058ecec8991ba8ef';
$twilio_number = "+14047245450";

$twilio = new Client($account_sid, $auth_token);

// CALLR
$thecallrLogin    = 'nosrezo';
$thecallrPassword = 'Up5neaT6cU';

$thecallrLogin    = 'activcom_1';
$thecallrPassword = 'Activcom2018&';

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