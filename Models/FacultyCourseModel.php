<?php

class FacultyCourseModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function insert($coursecode, $cousename, $courseinfo, $credithour) {
        $data = array(
            'coursecode' => $coursecode,
            'coursename' => $cousename,
            'courseinfo' => $courseinfo,
            'credithour' => $credithour
        );
        $this->db->insert('courses', $data);
    }

    function retrieveAllCourse() {
        $rows = $this->db->select("* FROM courses");

        return $rows;
    }

    function retrievedByID($id) {
        $rows = $this->db->select("* FROM courses WHERE courseid = :courseid ", [':courseid' => $id]);
        return $rows;
    }

    function updateOne($id, $value, $column) {
        $data = array(
            $column => $value
        );
        $where = array('courseid' => $id);
        $this->db->update('courses', $data, $where);
    }

    function updateAll($courseid, $coursecode, $cousename, $courseinfo, $credithour) {
        $data = array(
            'coursecode' => $coursecode,
            'coursename' => $cousename,
            'courseinfo' => $courseinfo,
            'credithour' => $credithour
        );
        $where = array('courseid' => $courseid);
        $this->db->update('courses', $data, $where);
    }

}
