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

}
