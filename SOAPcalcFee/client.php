<?php
require 'lib/nusoap.php';

$client = new nusoap_client("http://localhost/P5/service.php?wsdl");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Practical 5 - LOAN Web Service Client Side Demo</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <h2>Practical 5 - LOAN Web Service Client Side Demo</h2>
            <form class="form-inline" action="" method="POST">
                <div class="form-group">
                    <label for="amt">Loan Amount: RM</label>
                    <input type="text" name="amt" class="form-control"  placeholder="Enter Loan Amount" required/>
                    <br/>
                    <label for="amt">Annual interest rate: </label>
                    <input type="text" name="rate" class="form-control"  placeholder="Enter Rate Amount" required/>
                    <br/>
                    <label for="amt">Loan duration: </label>
                    <input type="text" name="duration" class="form-control"  placeholder="Enter Duration" required/>
                </div>
                <br/>
                <button type="submit" name="submit" class="btn btn-default">Submit</button>
            </form>
            <p>&nbsp;</p>
            <h3>
                <?php
                if (isset($_POST['submit'])) {
                    $amt = $_POST['amt'];
                    $rate = $_POST['rate'];
                    $duration = $_POST['duration'];
                    $output1 = $client->call('calcMonthlyPayment', array("amt" => $amt, "rate"=>$rate, "duration"=>$duration));
                    $output2 = $client->call('calcTotalPayment', array("amt" => $amt, "rate"=>$rate, "duration"=>$duration));
                    
                    if (empty($output1))
                        echo "INVALID INPUT";
                    else
                        echo "<h3>Monthly Payment: RM " . number_format($output1, 2) . "</h3>";
                    
                    if (empty($output2))
                        echo "INVALID INPUT2";
                    else
                        echo "<h3>Total Payment: RM " . number_format($output2, 2) . "</h3>";
                }
                ?>
            </h3>
        </div>
    </body>
</html>


