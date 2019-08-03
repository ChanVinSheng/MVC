<?php

class DpLoSModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function insert($type) {
        $data = array(
            'type' => $type
        );
        $this->db->insert('levelofstudy', $data);
    }

    function retrieveAll() {
        $rows = $this->db->select("* FROM levelofstudy");

        return $rows;
    }

    function retrievedByID($id) {
        $rows = $this->db->select("* FROM levelofstudy WHERE levelofstudyid = :levelofstudyid ", [':levelofstudyid' => $id]);
        return $rows;
    }

    function updateOne($id, $value, $column) {
        $data = array(
            $column => $value
        );
        $where = array('levelofstudyid' => $id);
        $this->db->update('levelofstudy', $data, $where);
    }

}
