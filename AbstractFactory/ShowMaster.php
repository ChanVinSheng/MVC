<?php

require_once 'AbstractFactory/Show.php';

class ShowMaster implements Show {

    public function getName() {
        $show = 4;
        return $show;
    }

}
