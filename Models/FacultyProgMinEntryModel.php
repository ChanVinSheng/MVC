<?php
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

}
