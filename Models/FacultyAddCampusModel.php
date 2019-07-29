<?php
class FacultyAddCampusModel extends Model {

    function __construct() {
         parent::__construct();
    }

    function insert($campusname) {
        $data = array(
            'campusname' => $campusname
        );
        $this->db->insert('campus', $data);
    }

}
