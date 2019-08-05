<?php

class ValidationDesc extends Model implements Strategy {

    public function doValidation($input) {
        $message = "";

        if (empty($input)) {
            $message = "Description is required! \\n";
        }

        return $message;
    }

}
