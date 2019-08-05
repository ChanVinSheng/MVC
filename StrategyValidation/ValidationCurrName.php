<?php

class ValidationCurrName extends Model implements Strategy {

    public function doValidation($input) {
        $message = "";

        if (empty($input)) {
            $message = "Professional Curriculum name is required! \\n";
        } else {
            $rows = $this->db->select("curriculumname FROM professionalcurriculum WHERE curriculumname = :curriculumname", [':curriculumname' => $input]);
            foreach ($rows as $row) {
                $Exist = $row->curriculumname;
            }
            if (!empty($Exist)) {
                $message .= "Professional Curriculum name already exist! \\n";
            } 
        }
        return $message;
    }

}
