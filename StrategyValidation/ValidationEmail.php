<?php

class ValidationEmail extends Model implements Strategy {

    public function doValidation($input) {

        $message = "";

        if (empty($input)) {
            $message = "username is required \\n";
        } else {
            $whitelistCharacter = "/[^A-Za-z0-9.#\-@_]/";
            $whitelistDomains = ['gmail.com', 'yahoo.com', 'hotmail.com'];
            $email = explode('@', $input);

            if (preg_match($whitelistCharacter, $input)) {
                $message = "invalid email character \\n";
            } elseif (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
                $message = "invalid email \\n";
            } elseif (!in_array(end($email), $whitelistDomains)) {
                $message = "invalid domain \\n";
            }
        }
        return $message;
    }

    public function checkExist($input) {

        $message = "";
        
        $rows = $this->db->select("email FROM user WHERE email = :email", [':email' => $input]);
        foreach ($rows as $row) {
            $Exist = $row->email;
        }

        if (!empty($Exist)) {
            $message .= "email already exist \\n";
        } 
        
        return $message;
    }

}
