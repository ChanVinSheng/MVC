<?php
/*Author: Low Wei Yin (18WMR08375) RSD3G2*/

class ValidationMinEntry extends Model implements Strategy {

    public function doValidation($input) {
        $message = "";

        $rows = $this->db->select("minentryname FROM minentry WHERE minentryname = :minentryname", [':minentryname' => $input]);
        foreach ($rows as $row) {
            $Exist = $row->minentryname;
        }
        if (!empty($Exist)) {
            $message .= "Minimum entry name already exist! \\n";
        }
        return $message;
    }

}
