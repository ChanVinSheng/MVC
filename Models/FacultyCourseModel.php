<?php
class FacultyCourseModel extends Model {

    function __construct() {
         parent::__construct();
    }

    function insert($coursecode,$cousename,$courseinfo,$credithour) {
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

}
