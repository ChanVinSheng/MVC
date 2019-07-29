<?php
class FacultyCurriculumModel extends Model {

    function __construct() {
         parent::__construct();
    }

    function insert($curriculumname,$curriculumdesc) {
        $data = array(
            'curriculumname' => $curriculumname,
            'curriculumdesc' => $curriculumdesc
        );
        $this->db->insert('professionalcurriculum', $data);
    }
    
    function retrieveAllCurriculum() {
        $rows = $this->db->select("* FROM professionalcurriculum");

        return $rows;

    }

}
