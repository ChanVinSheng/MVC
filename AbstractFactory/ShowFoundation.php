<?php

require_once 'AbstractFactory/Show.php';

class ShowFoundation implements Show {

    public function getName() {
        $show = 1;
        return $show;
    }

}
