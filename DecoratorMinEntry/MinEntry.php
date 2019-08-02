<?php
require_once 'IMinEntry.php';

class MinEntry implements IMinEntry {

    public function getContent() {
        return "ConcreteComponent";
    }

}
