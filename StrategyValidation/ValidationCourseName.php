<?php
/*Author: Low Wei Yin (18WMR08375) RSD3G2*/

class ValidationCourseName extends Model implements Strategy {

    public function doValidation($input) {
        $message = "";

        if (empty($input)) {
            $message = "Course name is required! \\n";
        } else {
            $rows = $this->db->select("coursename FROM courses WHERE coursename = :coursename", [':coursename' => $input]);
            foreach ($rows as $row) {
                $Exist = $row->coursename;
            }
            if (!empty($Exist)) {
                $message .= "Course name already exist! \\n";
            } 
        }
        return $message;
    }

}
