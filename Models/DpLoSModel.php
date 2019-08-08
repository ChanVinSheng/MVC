<?php
/*Author: Low Ee Hui (18WMR08374) RSD3G2*/

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

    function retrievedByID($check, $input) {
        $rows = $this->db->select("* FROM levelofstudy WHERE " . $check . " = :" . $check . " ", [":" . $check . "" => $input]);
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
