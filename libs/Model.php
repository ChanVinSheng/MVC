<?php


class Model  {
    function __construct() {
        $this->db = database::get();
    }

}
