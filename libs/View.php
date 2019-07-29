<?php

class View {

    function __construct() {
        
    }

    public function render($name, $noInclude = false) {

        if ($noInclude == true) {
            require 'Views/' . $name . '.php';
        } else {
            require 'Views/header.php';
            require 'Views/' . $name . '.php';
            require 'Views/footer.php';
        }
    }

    function assign($key, $val) {
        $this->data[$key] = $val;
    }

}
