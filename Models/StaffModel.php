<?php
/*Author: Chan Vin Sheng (18WMR08274) RSD3G2*/

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

    function delete($data) {
        $where = array('userid' => $data);
        $this->db->delete('user', $where);
    }

    function retrieveSpecficStaffbyId($userid) {
        $rows = $this->db->select("* FROM user WHERE userid = :userid ", [':userid' => $userid]);
        return $rows;
    }

    function update($userid , $username, $ic, $role) {
         $data = array(
            'username' => $username,
            'ic' => $ic,
            'role' => $role
        );
        $where = array('userid' => $userid);
        $this->db->update('user', $data, $where);
    }

}
