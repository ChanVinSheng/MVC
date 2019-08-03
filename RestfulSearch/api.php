<?php

require_once "SimpleRest.php";

class api extends SimpleRest {

    function __construct() {
        
    }


    public function getAction($row) {

        if (empty($row)) {
            $status = 404;
            $row = array('error' => 'No mobiles found!');
        } else {
            $status = 200;
        }
        
        $this->setHttpHeaders($status);

        $response['data'] = $row;
        $jsonResponse = json_encode($response);
        return $jsonResponse;
    }

}
