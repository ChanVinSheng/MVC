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
    
    function updateOne($id, $value, $column) {
        $data = array(
            $column => $value
        );
        $where = array('programmeid' => $id);
        $this->db->update('programmestructure', $data, $where);
    }
    
    function delete($id) {
        $where = array('programmeid' => $id);
        $this->db->delete('programmestructure', $where);
    }

}
