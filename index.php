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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Twilio SMS API Integration</title>
  </head>
  <body>
  <?php
            include("functions.php");
            include("config.php");
            $messages = all_sms_sent_to_twilio_number();
    ?>
    <div class="fluid-container">
        <div class="row">
            <h1 class="text-center" style="margin-top: revert;margin-left: 500px;">Mailbox: <?php echo $twilio_number; ?></h1>
        </div>
    </div>
    <div class="jumbotron container" style="background-color: #def5f9;padding: 2rem 4rem;margin-left: 87px;width: 86.4%;margin-top: 30px;margin-bottom: inherit;">
        <h5 class="text-center">Rafraichir pour récupérer les nouveaux messages.</h5>
        <div class="row" style="margin-top:50px;">
            <div class="col-3">
                <p>Le total des sms : <span style="font-weight:bold"><?php echo count($messages); ?></span></p>
            </div>
            <div class="col-7">
            </div>
            <div class="col" style="margin-left: 22px;">
                <button class="btn btn-secondary" onclick="window.location.reload(true);"> <i class="fa fa-refresh fa-spin"></i> Actualiser</button>
            </div>
        </div>
    </div>

    <div class="container table-responsive py-5"> 
        <table id="example" class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">No. Téléphone</th>
            <th scope="col">Message SMS</th>
            <th scope="col">Livré</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

<?
            
            if ($messages == null){
                echo "<tr><td colspan='5'>Pas de messages trouvés.</td></tr>";
            }else{
                foreach ($messages as $record) {
                    echo "<tr>";
                        echo "<th scope='row'>". substr($record->sid, -10). "</td>";
                        echo "<td>$record->from</td>";
                        echo "<td>";
                            echo  shorten_message_body($record->body);
                        echo "</td>";
                        echo "<td style='width:70px'>"; 
                            echo interval_two_dates_format($record->dateUpdated);
                        echo "</td>";
                        echo "<td><form action='sms.php' method='post'>";
                                echo "<input type='hidden' name='id' value='$record->sid' />";
                                echo "<input type='submit' name='view' value='Voir' type='button' class='btn btn-info' >";
                        echo "</form></td>";
                    echo "</tr>";
                }
            }
        ?>
        </tbody>
        </table>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" ></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
  </body>
</html>



