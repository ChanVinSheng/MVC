<?php
require 'lib/nusoap.php';

$client = new nusoap_client("http://localhost/MVC/SOAPcalcFee/serviceFaid.php?wsdl");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>FAID Web Service Client Side</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <h2>FAID Web Service Client Side</h2>
            <form class="form-inline" action="" method="POST">
                <div class="form-group">
                    <label for="percentages">Percentages(%):</label>
                    <input type="text" name="percentages" class="form-control"  placeholder="Enter Percentages" required/>
                    <label for="fee">Total Fee(RM):</label>
                    <input type="text" name="fee" class="form-control"  placeholder="Enter Total Fee" required/>
                </div>
                <button type="submit" name="submit" class="btn btn-default">Submit</button>
            </form>
            <p>&nbsp;</p>
            <h3>
                <?php
                if (isset($_POST['submit'])) {
                    $percentages = $_POST['percentages'];
                    $fee = $_POST['fee'];
                    $totalsup = $client->call('calcTotalSup', array("percentages" => $percentages, "fee"=>$fee));
                    $monthlysup = $client->call('calcMonthlySup', array("percentages" => $percentages, "fee"=>$fee));
                    
                    if (empty($totalsup))
                        echo "INVALID INPUT";
                    else
                        echo "<h3>Total Support:RM" . number_format($totalsup, 2) . "</h3>";
                    
                    if (empty($monthlysup))
                        echo "INVALID INPUT2";
                    else
                        echo "<h3>Monthly Support:RM" . number_format($monthlysup, 2) . "</h3>";
                }
                ?>
            </h3>
        </div>
    </body>
</html>


