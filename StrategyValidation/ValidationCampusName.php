<?php

class ValidationCampusName extends Model implements Strategy {

    public function doValidation($input) {
        $message = "";

        if (empty($input)) {
            $message = "Campus name is required! \\n";
        } else {
            $rows = $this->db->select("campusname FROM campus WHERE campusname = :campusname", [':campusname' => $input]);
            foreach ($rows as $row) {
                $Exist = $row->campusname;
            }
            if (!empty($Exist)) {
                $message .= "Campus name already exist! \\n";
            } 
        }
        return $message;
    }

}
