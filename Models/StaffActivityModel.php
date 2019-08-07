<?php
class StaffActivityModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function retrieveAllActivity() {
        $rows = $this->db->select("* FROM userlog ORDER BY date DESC");

        return $rows;
    }

    function retrieveAllActivitybyAction($action) {
        $rows = $this->db->select("* FROM userlog where action =:action ORDER BY date DESC", [':action' => $action]);
        return $rows;
    }
    
    function insert($uesrid, $username ,$action) {
        $data = array(
            'userid' => $uesrid,
            'username' => $username,
            'action' => $action
        );
        $this->db->insert('userlog', $data);
    }
}
