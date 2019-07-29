<?php
class FacultyAddProgrammeModel extends Model {

    function __construct() {
         parent::__construct();
    }

    function insert($programmecode,$description,$duration,$fees,$levelofstudy,$facultyid) {
        $data = array(
            '$programmecode' => $programmecode,
            '$description' => $description,
            '$duration' => $duration,
            '$fees' => $fees,
            '$levelofstudy' => $levelofstudy,
            '$facultyid' => $facultyid
        );
        $this->db->insert('programme', $data);
    }

}
