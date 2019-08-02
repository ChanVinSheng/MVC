<?php

class ValidationInput extends Model implements Strategy {

    public function doValidation($input) {

        $message = "";

        if (empty($input)) {
            $message = "username is required \\n";
        } else {
            $whitelistCharacter = "/[^A-Za-z0-9.#\-@_]/";
            if (preg_match($whitelistCharacter, $input)) {
                $message = "invalid username character \\n";
            }
        }
        return $message;
    }

    public function checkExist($input) {
        
    }

}
