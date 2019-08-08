<?php
/*Author: Low Wei Yin (18WMR08375) RSD3G2*/

class ValidationDesc extends Model implements Strategy {

    public function doValidation($input) {
        $message = "";

        if (empty($input)) {
            $message = "Description is required! \\n";
        }

        return $message;
    }

}
