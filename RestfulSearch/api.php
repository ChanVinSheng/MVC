<?php

require_once "SimpleRest.php";

class api extends SimpleRest {

    public function getAction($row) {

        if (empty($row)) {
            $status = 404;
                $row = array('error' => 'No data found!');
        } else {
            $status = 200;
        }
        
        $this->setHttpHeaders($status);
        $jsonResponse = json_encode($row);
        return $jsonResponse;
    }

}
