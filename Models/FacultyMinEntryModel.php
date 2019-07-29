<?php
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

}
