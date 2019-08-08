<?php
/*Author: Low Wei Yin (18WMR08375) RSD3G2*/

class ValidationCourseInfo extends Model implements Strategy {

    public function doValidation($input) {
        $message = "";

        if (empty($input)) {
            $message = "Course Information is required! \\n";
        }

        return $message;
    }

}
