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
class StaffModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function insert($username, $password, $email, $ic, $role) {
        $data = array(
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'ic' => $ic,
            'role' => $role
        );
        $this->db->insert('user', $data);
    }

    function retrieveAllStaff() {
        $rows = $this->db->select("* FROM user");

        return $rows;

    }

}
