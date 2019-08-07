<?php

require_once 'AbstractFactory/Show.php';

class ShowDegree implements Show{

    public function getName() {
        $show = 3;
        return $show;
    }

}
