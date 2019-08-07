<?php

require_once "SimpleRest.php";

class api extends SimpleRest {

    public function getCourse($row) {

        if (empty($row)) {
            $status = 404;
                $row = array('error' => 'No such category' , "status" => $status);
        } else {
            $status = 200;
        }
        
        $this->setHttpHeaders($status);
        $jsonResponse = json_encode($row);
        return $jsonResponse;
    }

}
