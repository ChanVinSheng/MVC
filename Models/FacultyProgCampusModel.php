<?php
class FacultyProgCampusModel extends Model {

    function __construct() {
         parent::__construct();
    }

    function insert($programmeid, $campusid) {
        $data = array(
            'programmeid' => $programmeid,
            'campusid' => $campusid
        );
        $this->db->insert('programmecampus', $data);
    }
    
    function retrieveAllProgrammeCampus() {
        $rows = $this->db->select("* FROM programmecampus");

        return $rows;
    }

}
