<?php
/*Author: Low Wei Yin (18WMR08375) RSD3G2*/

class FacultyMinEntryModel extends Model {

    function __construct() {
         parent::__construct();
    }

    function insert($minentryname) {
        $data = array(
            'minentryname' => $minentryname
        );
        $this->db->insert('minentry', $data);
    }
    
    function retrieveAllMinEntry() {
        $rows = $this->db->select("* FROM minentry");

        return $rows;

    }
    
    function retrievedByID($id) {
        $rows = $this->db->select("* FROM minentry WHERE minentryid = :minentryid ", [':minentryid' => $id]);
        return $rows;
    }
    
    function updateOne($id, $value, $column) {
         $data = array(
            $column => $value
        );
        $where = array('minentryid' => $id);
        $this->db->update('minentry', $data, $where);
    }

}
