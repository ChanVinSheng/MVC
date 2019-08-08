<?php
/*Author: Low Wei Yin (18WMR08375) RSD3G2*/

class FacultyCurriculumModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function insert($curriculumname, $curriculumdesc) {
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

    function retrievedByID($id) {
        $rows = $this->db->select("* FROM professionalcurriculum WHERE curriculumid = :curriculumid ", [':curriculumid' => $id]);
        return $rows;
    }

    function updateOne($id, $value, $column) {
        $data = array(
            $column => $value
        );
        $where = array('curriculumid' => $id);
        $this->db->update('professionalcurriculum', $data, $where);
    }

    function updateAll($curriculumid, $curriculumname, $curriculumdesc) {
        $data = array(
            'curriculumname' => $curriculumname,
            'curriculumdesc' => $curriculumdesc
        );
        $where = array('curriculumid' => $curriculumid);
        $this->db->update('professionalcurriculum', $data, $where);
    }

}
