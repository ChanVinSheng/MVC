<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Staff
 *
 * @author Vin
 */
class StaffActivityModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function retrieveAllActivity() {
        $rows = $this->db->select("* FROM userlog");

        return $rows;
    }

    function retrieveAllActivitybyAction($action) {
        $rows = $this->db->select("* FROM userlog where action =:action ", [':action' => $action]);
        return $rows;
    }

}
