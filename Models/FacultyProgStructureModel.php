<?php
class FacultyProgStructureModel extends Model {

    function __construct() {
         parent::__construct();
    }

    function insert($programmeid, $courseid) {
        $data = array(
            'programmeid' => $programmeid,
            'courseid' => $courseid
        );
        $this->db->insert('programmestructure', $data);
    }
    
    function retrieveAllProgrammeStructure() {
        $rows = $this->db->select("* FROM programmestructure");

        return $rows;
    }

}
