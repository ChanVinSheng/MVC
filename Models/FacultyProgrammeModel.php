<?php
class FacultyProgrammeModel extends Model {

    function __construct() {
         parent::__construct();
    }

    function insert($programmecode,$description,$duration,$levelofstudy,$facultyid) {
        $data = array(
            '$programmecode' => $programmecode,
            '$description' => $description,
            '$duration' => $duration,
            '$levelofstudy' => $levelofstudy,
            '$facultyid' => $facultyid
        );
        $this->db->insert('programme', $data);
    }
    
    function retrieveAllProgramme() {
        $rows = $this->db->select("* FROM programme");

        return $rows;
    }

}
