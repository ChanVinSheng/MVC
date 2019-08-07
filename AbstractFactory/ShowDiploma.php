<?php

require_once 'AbstractFactory/Show.php';

class ShowDiploma implements Show {

    public function getName() {
        $show = 2;
        return $show;
    }

}
