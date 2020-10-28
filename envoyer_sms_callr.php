<?php

    // require __DIR__ . '/vendor/autoload.php';


    require 'src/CALLR/API/Client.php';
    require 'src/CALLR/API/Request.php';
    require 'src/CALLR/API/Response.php';
    require 'src/CALLR/API/Exception/LocalException.php';
    require 'src/CALLR/API/Exception/RemoteException.php';
    require 'src/CALLR/API/Authentication/AuthenticationInterface.php';
    require 'src/CALLR/API/Authentication/LoginPasswordAuth.php';

     $thecallrLogin    = 'nosrezo';
	 $thecallrPassword = 'Up5neaT6cU';
	 
	 $thecallrLogin    = 'activcom_1';
	 $thecallrPassword = 'Activcom2018&';

	 $num_tel= "+14047245450";
	 $date_sms = date('Y-m-d H:i:s');
	 $text_a_envoyer = "In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.".$date_sms;

    // get api client object 
    $api = new \CALLR\API\Client;

    // set authentication credentials
    $api->setAuth(new CALLR\API\Authentication\LoginPasswordAuth($thecallrLogin, $thecallrPassword));


     try {	
	         // Sender
			 $sender = "NosRezo";
	         // Recipient phone number (E.164 format)
	         $to = $num_tel;
	         // SMS text
	         $text = $text_a_envoyer;
	         // Options
	         $options = new stdClass();
	         $options->flash_message = FALSE;
	
	         // "sms.send" method execution
	         $result = $api->call('sms.send', [$sender, $to, $text, null]);
	
	         // The method returns the SMS ID
	         // echo 'SMS ID : ' . $result . '<br />';
	
	} catch (Exception $error) 
	{
		die($error->getMessage());
	}
	
	// if (!empty($statut)){
	// // echo "MESSAGE : ". $message  ." SENT FROM : ".$phone_number. " ";
	// echo "Le message à été bien envoyé";
	// }else{
	// 	echo "le message n'a pas pu être envoyé";
	// }


?>