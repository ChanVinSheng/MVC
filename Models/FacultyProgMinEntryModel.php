<?php
/*Author: Low Wei Yin (18WMR08375) RSD3G2*/

class FacultyProgMinEntryModel extends Model {

    function __construct() {
         parent::__construct();
    }

    function insert($programmeid, $minentryid) {
        $data = array(
            'programmeid' => $programmeid,
            'minentryid' => $minentryid
        );
        $this->db->insert('programmeminentry', $data);
    }
    
    function retrieveAllProgrammeMinEntry() {
        $rows = $this->db->select("* FROM programmeminentry");

        return $rows;
    }
    
    function updateOne($id, $value, $column) {
        $data = array(
            $column => $value
        );
        $where = array('programmeid' => $id);
        $this->db->update('programmeminentry', $data, $where);
    }
    
    function delete($id) {
        $where = array('programmeid' => $id);
        $this->db->delete('programmeminentry', $where);
    }

}
