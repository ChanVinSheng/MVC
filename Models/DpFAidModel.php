<?php

class DpFAidModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function insert($financialaidname, $description, $picture) {
        $data = array(
            'financialaidname' => $financialaidname,
            'description' => $description,
            'picture' => $picture
        );
        $this->db->insert('financialaid', $data);
    }

    function retrieveAll() {
        $rows = $this->db->select("* FROM financialaid");

        return $rows;
    }

    function retrievedByID($check, $input) {
        $rows = $this->db->select("* FROM financialaid WHERE " . $check . " = :" . $check . " ", [":" . $check . "" => $input]);
        return $rows;
    }

    function updateOne($id, $value, $column) {
        $data = array(
            $column => $value
        );
        $where = array('financialaidid' => $id);
        $this->db->update('financialaid', $data, $where);
    }

    function updateAll($financialaidid, $financialaidname, $description, $picture) {
        $data = array(
            'financialaidname' => $financialaidname,
            'description' => $description,
            'picture' => $picture
        );
        $where = array('financialaidid' => $financialaidid);
        $this->db->update('financialaid', $data, $where);
    }

}
