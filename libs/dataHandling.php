<?php

class dataHandling {

    static function HtmlTrimStrips($input) {
        $input = htmlspecialchars($input);
        $input = trim($input);
        $input = stripslashes($input);
        return $input;
    }

    static function HtmlTrim($input) {
        $input = htmlspecialchars($input);
        $input = trim($input);
        return $input;
    }

    static function HtmlStrips($input) {
        $input = htmlspecialchars($input);
        $input = stripslashes($input);
        return $input;
    }

    static function TrimStrips($input) {
        $input = trim($input);
        $input = stripslashes($input);
        return $input;
    }

    static function Html($input) {
        $input = htmlspecialchars($input);
        return $input;
    }

    static function Strips($input) {
        $input = stripslashes($input);
        return $input;
    }

    static function Trim($input) {
        $input = trim($input);
        return $input;
    }

}
