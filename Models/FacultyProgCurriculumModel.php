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
    
    function updateOne($id, $value, $column) {
        $data = array(
            $column => $value
        );
        $where = array('programmeid' => $id);
        $this->db->update('programmecurriculum', $data, $where);
    }
    
    function delete($id) {
        $where = array('programmeid' => $id);
        $this->db->delete('programmecurriculum', $where);
    }

}
