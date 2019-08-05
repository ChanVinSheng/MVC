<?php

require_once "SimpleRest.php";

class api extends SimpleRest {

    public function getAction($row) {

        if (empty($row)) {
            $statusCode = 404;
                $row = array('error' => 'No data found!' , 'status' => $statusCode);
        } else {
            $statusCode = 200;
        }
        
        $this->setHttpHeaders($statusCode);
        $jsonResponse = json_encode($row);
        return $jsonResponse;
    }

}
