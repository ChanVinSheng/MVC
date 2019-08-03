<?php

require_once 'IMinEntry.php';

class ConcreteSPM implements IMinEntry{

    public function getContent(): string {
        return "SPM ";
    }

}
