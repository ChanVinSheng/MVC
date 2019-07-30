<?php
class FacultyCampusModel extends Model {

    function __construct() {
         parent::__construct();
    }

    function insert($campusname) {
        $data = array(
            'campusname' => $campusname
        );
        $this->db->insert('campus', $data);
    }
    
    function retrieveAllCampus() {
        $rows = $this->db->select("* FROM campus");

        return $rows;
    }
    
    function retrievedByID($id) {
        $rows = $this->db->select("* FROM campus WHERE campusid = :campusid ", [':campusid' => $id]);
        return $rows;
    }
    
    function updateOne($id, $value, $column) {
         $data = array(
            $column => $value
        );
        $where = array('campusid' => $id);
        $this->db->update('campus', $data, $where);
    }

}
