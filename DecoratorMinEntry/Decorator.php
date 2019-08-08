<?php
/*Author: Low Wei Yin (18WMR08375) RSD3G2*/

require_once 'IMinEntry.php';

class Decorator implements IMinEntry {

    protected $minEntry;

    public function __construct(IMinEntry $minEntry) {
        $this->minEntry = $minEntry;
    }

    public function getContent(): string {
        return $this->minEntry->getContent();
    }

}
