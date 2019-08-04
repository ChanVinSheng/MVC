<?php

require_once 'EstimatedFee.php';
require_once 'lib/nusoap.php';

function calcTotalAmount($credithr, $duration) {
    $fee = new EstimatedFee($credithr, $duration);
    return $fee->getTotalAmount();
}

function calcYearlyAmount($credithr, $duration) {
    $fee = new EstimatedFee($credithr, $duration);
    return $fee->getYearlyAmount();
}

$server = new nusoap_server();

$server->configureWSDL("Estimated Fee", "urn:estimatedFee");

$server->register(
        "calcTotalAmount", 
        array("credithr" => "xsd:integer", "duration" => "xsd:integer"), 
        array("return"=>"xsd:double")
);

$server->register(
        "calcYearlyAmount", 
        array("credithr" => "xsd:integer", "duration" => "xsd:integer"), 
        array("return"=>"xsd:double")
);

$server->service(file_get_contents("php://input"));
