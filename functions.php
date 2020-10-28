<?php

$configs = include('config.php');


// SEND SMS TO AN EXACT PHONE NUMBER
function send_sms_to_phone_number($phone_number, $sms_text){
    global $configs;

    $message    = $configs["twilio"]->messages->create(
        $phone_number,
        array(
            'from' => $configs["twilio_number"],
            'body' => $sms_text
        )
    );
    return $message->sid;
}

// FETCH $TOTAL MESSAGES SENT TO TWILIO NUMBER
function all_sms_sent_to_twilio_number($total = 20){
    global $configs;
    $messages = $configs["twilio"]->messages
                    ->read([
                        "to" => $configs["twilio_number"]
                    ], $total);

    return $messages;
}


// FETCH (EXACT)SID MESSAGE SENT TO TWILIO NUMBER
function fetch_exact_sms_id($id){
    global $configs;

    $message = $configs["twilio"]->messages($id)->fetch();

    return $message;
}


// DELETE (EXACT)SID MESSAGE (BOOL)
function delete_exact_sms_id($sid){
    global $configs;

    $statut    =  $configs["twilio"]->messages($id)
                        ->delete();

    return $statut;
}

// SHORTEN STRING TO BE APPEARED CORRECT ON TABLE
function shorten_message_body($body_message){
    $short_msg = strlen($body_message) > 50 ? substr($body_message,0,85)."..." : $body_message;
    return $short_msg;
}

// RETURN TWO DATES INTERVAL FORMAT STRING 
function interval_two_dates_format($date_sms){
    $date_sms     = date_format($date_sms, 'Y-m-d H:i:s');
    $moroccan_time = strtotime("-1 hour", time());
    $current_date = date('Y-m-d H:i:s', $moroccan_time);

    $date1 = new DateTime($date_sms);
    $date2 = new DateTime($current_date);

    $interval = $date1->diff($date2);

    $days   =   $interval->format('%d');
    $hours   =   $interval->format('%h');
    $minutes   =   $interval->format('%m');
    $seconds =   $interval->format('%s');

    $full_date = "";
    ($days > 0 ) ? $full_date.= $days."j " : null;
    ($hours > 0 ) ? $full_date.= $hours."h " : null;
    ($minutes > 0 ) ? $full_date.= $minutes."m " : null;
    ($seconds > 0 ) ? $full_date.= $seconds."s" : null;

    return $full_date;

}

// SEND SMS MESSAGE USING CALLR API
function send_sms_callr($phone_number, $message){
    global $configs;

    try {	
        // Sender
        $sender = "NosRezo";
        // Recipient phone number (E.164 format)
        $to = $phone_number;
        // SMS text
        $text = $message;
        // Options
        $options = new stdClass();
        $options->flash_message = FALSE;

        // "sms.send" method execution
        $result = $configs["client"]->call('sms.send', [$sender, $to, $text, null]);

        return $result;
        // The method returns the SMS ID
        // echo 'SMS ID : ' . $result . '<br />';

     } catch (Exception $error) 
    {
      // die($error->getMessage());
    }
}
?>