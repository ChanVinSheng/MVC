<?php
/*Author: Low Wei Yin (18WMR08375) RSD3G2*/

require_once 'IMinEntry.php';

class ConcreteMaster implements IMinEntry{

    public function getContent(): string {
        return "Master - ";
    }

}
