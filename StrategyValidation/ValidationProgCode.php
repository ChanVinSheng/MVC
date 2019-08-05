<?php

class ValidationProgCode extends Model implements Strategy {

    public function doValidation($input) {
        $message = "";

        if (empty($input)) {
            $message = "Programme Code is required! \\n";
        } else {
            $rows = $this->db->select("programmecode FROM programme WHERE programmecode = :programmecode", [':programmecode' => $input]);
            foreach ($rows as $row) {
                $Exist = $row->programmecode;
            }
            if (!empty($Exist)) {
                $message .= "Programme code already exist! \\n";
            } else {
                $regex = "/^([[F|D|R|M]{1})([(a-zA-Z)]{2})$/";
                if (!preg_match($regex, $input)) {
                    $message .= "Programme code is Invalid Format! \\n";
                } 
            }
        }
        return $message;
    }

}
