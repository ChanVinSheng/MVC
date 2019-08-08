<?php
/*Author: Low Wei Yin (18WMR08375) RSD3G2*/

class ValidationMinEntryChk extends Model implements Strategy {

    public function doValidation($input) {
        $message = "";
        
        if ($input == false) {
            $message = "Minimum Entry must checked at least one. \\n";
        } 
        return $message;
    }
}
