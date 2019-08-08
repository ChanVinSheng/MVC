<?php
/*Author: Low Wei Yin (18WMR08375) RSD3G2*/

require_once 'Decorator.php';

class CGPA25 extends Decorator
{

    public function getContent(): string
    {
        return parent::getContent(). "CGPA 2.5 ";
    }
}
