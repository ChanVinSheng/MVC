<?php
/*Author: Low Wei Yin (18WMR08375) RSD3G2*/

class FacultyProgrammeModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function insert($programmecode, $description, $duration, $levelofstudyid, $facultyid, $fee, $yearlyfee, $category) {
        $data = array(
            'programmecode' => $programmecode,
            'description' => $description,
            'duration' => $duration,
            'levelofstudyid' => $levelofstudyid,
            'facultyid' => $facultyid,
            'fee' => $fee,
            'yearlyfee' => $yearlyfee,
            'category' => $category
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
    
    function retrievedByCode($code) {
        $rows = $this->db->select("* FROM programme WHERE programmecode = :programmecode ", [':programmecode' => $code]);
        return $rows;
    }

    function updateOne($id, $value, $column) {
        $data = array(
            $column => $value
        );
        $where = array('programmeid' => $id);
        $this->db->update('programme', $data, $where);
    }

    function updateAll($programmeid, $programmecode, $description, $duration, $levelofstudyid, $facultyid, $fee, $yearlyfee, $category ) {
        $data = array(
            'programmecode' => $programmecode,
            'description' => $description,
            'duration' => $duration,
            'levelofstudyid' => $levelofstudyid,
            'facultyid' => $facultyid,
            'fee' => $fee,
            'yearlyfee' => $yearlyfee,
            'category' => $category
        );
        $where = array('programmeid' => $programmeid);
        $this->db->update('programme', $data, $where);
    }

}
