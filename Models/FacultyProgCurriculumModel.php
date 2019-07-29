<?php
class FacultyProgCurriculumModel extends Model {

    function __construct() {
         parent::__construct();
    }

    function insert($programmeid, $curriculumid) {
        $data = array(
            'programmeid' => $programmeid,
            'curriculumid' => $curriculumid
        );
        $this->db->insert('programmecurriculum', $data);
    }
    
    function retrieveAllProgrammeCurriculum() {
        $rows = $this->db->select("* FROM programmecurriculum");

        return $rows;
    }

}
