<?php
class FacultyAddMinEntryModel extends Model {

    function __construct() {
         parent::__construct();
    }

    function insert($minentryname) {
        $data = array(
            'minentryname' => $minentryname
        );
        $this->db->insert('minentry', $data);
    }

}
