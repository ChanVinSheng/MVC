<?php

class DpAccmdModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function insert($branch, $type, $fee, $description, $picture, $location) {
        $data = array(
            'branch' => $branch,
            'type' => $type,
            'fee' => $fee,
            'description' => $description,
            'picture' => $picture,
            'location' => $location
        );
        $this->db->insert('accomodation', $data);
    }

    function retrieveAll() {
        $rows = $this->db->select("* FROM accomodation");

        return $rows;
    }

    function retrievedByID($id) {
        $rows = $this->db->select("* FROM accomodation WHERE accomodationid = :accomodationid ", [':accomodationid' => $id]);
        return $rows;
    }

    function updateOne($id, $value, $column) {
        $data = array(
            $column => $value
        );
        $where = array('accomodationid' => $id);
        $this->db->update('accomodation', $data, $where);
    }

    function updateAll($accomodationid, $branch, $type, $fee, $description, $picture, $location) {
        $data = array(
            'branch' => $branch,
            'type' => $type,
            'fee' => $fee,
            'description' => $description,
            'picture' => $picture,
            'location' => $location
        );
        $where = array('accomodationid' => $accomodationid);
        $this->db->update('accomodation', $data, $where);
    }

}
