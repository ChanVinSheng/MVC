<?php

class ValidationCourseInfo extends Model implements Strategy {

    public function doValidation($input) {
        $message = "";

        if (empty($input)) {
            $message = "Course Information is required! \\n";
        }

        return $message;
    }

}
