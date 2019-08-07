<?php

require_once 'faid.php';
require_once 'lib/nusoap.php';

function calcTotalSup($percentage, $fee){
    $faid = new faid($percentage, $fee);
    return $faid->gettotalsup();
}

function calcMonthlySup($percentage, $fee){
    $faid = new faid($percentage, $fee);
    return $faid->getmonthlysup();
}

$server = new nusoap_server();

$server->configureWSDL("Faid App", "urn:FaidApp");

$server->register(
        "calcTotalSup", 
        array("percentage" => "xsd:double", "fee" => "xsd:double"), 
        array("return"=>"xsd:double")
);

$server->register(
        "calcMonthlySup", 
        array("percentage" => "xsd:double", "fee" => "xsd:double"), 
        array("return"=>"xsd:double")
);

$server->service(file_get_contents("php://input"));
