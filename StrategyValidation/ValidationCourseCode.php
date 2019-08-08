<?php
/*Author: Low Wei Yin (18WMR08375) RSD3G2*/

class ValidationCourseCode extends Model implements Strategy {

    public function doValidation($input) {
        $message = "";

        if (empty($input)) {
            $message = "Course code is required! \\n";
        } else {
            $rows = $this->db->select("coursecode FROM courses WHERE coursecode = :coursecode", [':coursecode' => $input]);
            foreach ($rows as $row) {
                $Exist = $row->coursecode;
            }
            if (!empty($Exist)) {
                $message .= "Course code already exist! \\n";
            } else {
                $regex = "/^((([(a-zA-Z)]{3})([-]{1}))|([a-zA-Z]{4}))([0-9]{4})$/";
                if (!preg_match($regex, $input)) {
                    $message .= "Course code is Invalid Format! \\n";
                } 
            }
        }
        return $message;
    }

}
