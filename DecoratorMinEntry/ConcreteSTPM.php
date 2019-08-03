<?php

require_once 'IMinEntry.php';

class ConcreteSTPM implements IMinEntry{

    public function getContent(): string {
        return "STPM ";
    }

}
