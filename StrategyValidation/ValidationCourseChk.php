<?php
/*Author: Low Wei Yin (18WMR08375) RSD3G2*/

class ValidationCourseChk extends Model implements Strategy {

    public function doValidation($input) {
        $message = "";
        
        if ($input == false) {
            $message = "Programme course must checked at least one. \\n";
        } 
        return $message;
    }
}
