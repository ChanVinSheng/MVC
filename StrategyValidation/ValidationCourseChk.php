<?php

class ValidationCourseChk extends Model implements Strategy {

    public function doValidation($input) {
        $message = "";
        
        if ($input == false) {
            $message = "Programme course must checked at least one. \\n";
        } 
        return $message;
    }
}
