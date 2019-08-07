<?php

class DpFacultiesModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function insert($facultyname, $facultydescription, $feeMin, $feeMax) {
        $data = array(
            'facultyname' => $facultyname,
            'facultydescription' => $facultydescription,
            'feeMin' => $feeMin,
            'feeMax' => $feeMax
        );
        $this->db->insert('faculties', $data);
    }

    function retrieveAll() {
        $rows = $this->db->select("* FROM faculties");

        return $rows;
    }

    function retrievedByID($check, $input) {
        $rows = $this->db->select("* FROM faculties WHERE " . $check . " = :" . $check . " ", [":" . $check . "" => $input]);
        return $rows;
    }

    function updateOne($id, $value, $column) {
        $data = array(
            $column => $value
        );
        $where = array('facultyid' => $id);
        $this->db->update('faculties', $data, $where);
    }

    function updateAll($facultyid, $facultyname, $facultydescription, $feeMin, $feeMax) {
        $data = array(
            'facultyname' => $facultyname,
            'facultydescription' => $facultydescription,
            'feeMin' => $feeMin,
            'feeMax' => $feeMax
        );
        $where = array('facultyid' => $facultyid);
        $this->db->update('faculties', $data, $where);
    }

}
