<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-formhelpers/2.3.0/css/bootstrap-formhelpers.min.css" />
    <title>Twilio SMS API Integration</title>
  </head>
  <body>
    <div class="fluid-container">
        <div class="row">
            <h1 class="text-center" style="margin-top: revert;margin-left: 500px;">Mailbox: Send SMS</h1>
        </div>
    </div>
    <div class="container table-responsive py-5"> 
    <form method="post">
        <label>Pays</label>
        <select id="countries_phone1" class="form-control bfh-countries" data-country="US"></select>
        <br><br>
        <label>No. Télephone</label>
        <input type="text" name="phone_number" class="form-control bfh-phone" data-country="countries_phone1" placeholder="+212657280711">
        <br><br>
        <div class="form-group">
            <label for="message">Message SMS</label>
            <textarea class="form-control" name="message" id="message" rows="3"></textarea>
        </div>
        <input name="send" type="submit" value="Send" type='button' class='btn btn-info' >

    </form>




<?php

include_once("config.php");
include_once("functions.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Something posted

    if (isset($_POST['send'])) {
        // btnSend
        
        $phone_number = $_POST["phone_number"];
        $message = $_POST["message"];

        $phone_number = str_replace(array(' ',')','(','-'), '', $phone_number);


        $statut =   send_sms_callr($phone_number, $message, "" );

        if (!empty($statut)){
            // echo "MESSAGE : ". $message  ." SENT FROM : ".$phone_number. " ";
            echo "Le message à été bien envoyé";
        }else{
            echo "le message n'a pas pu être envoyé";
        }
    } else {
        // Assume btnSubmit
    }
}

?>


</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-formhelpers/2.3.0/js/bootstrap-formhelpers.min.js" integrity="sha512-m4xvGpNhCfricSMGJF5c99JBI8UqWdIlSmybVLRPo+LSiB9FHYH73aHzYZ8EdlzKA+s5qyv0yefvkqjU2ErLMg==" crossorigin="anonymous"></script>
  </body>
</html>
