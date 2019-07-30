<?php
class FacultyProgrammeModel extends Model {

    function __construct() {
         parent::__construct();
    }

    function insert($programmecode,$description,$duration,$levelofstudy,$facultyid) {
        $data = array(
            'programmecode' => $programmecode,
            'description' => $description,
            'duration' => $duration,
            'levelofstudy' => $levelofstudy,
            'facultyid' => $facultyid
        );
        $this->db->insert('programme', $data);
    }
    
    function retrieveAllProgramme() {
        $rows = $this->db->select("* FROM programme");

        return $rows;
    }
    
    function retrievedByID($id) {
        $rows = $this->db->select("* FROM programme WHERE programmeid = :programmeid ", [':programmeid' => $id]);
        return $rows;
    }

    function updateOne($id, $value, $column) {
        $data = array(
            $column => $value
        );
        $where = array('programmeid' => $id);
        $this->db->update('programme', $data, $where);
    }

    function updateAll($programmeid, $programmecode, $description, $duration, $levelofstudy, $facultyid) {
        $data = array(
            'programmecode' => $programmecode,
            'description' => $description,
            'duration' => $duration,
            'levelofstudy' => $levelofstudy,
            'facultyid' => $facultyid
        );
        $where = array('programmeid' => $programmeid);
        $this->db->update('programme', $data, $where);
    }

}
