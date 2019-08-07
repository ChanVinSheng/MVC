<?php

require_once 'AbstractFactory/ShowDiplomaFactory.php';
require_once 'AbstractFactory/ShowDegreeFactory.php';
require_once 'AbstractFactory/ShowFoundationFactory.php';
require_once 'AbstractFactory/ShowMasterFactory.php';


abstract class AbstractFactory {

    public static function getFactory($factory) {
        switch ($factory) {
            case "foundation":
                return new ShowFoundationFactory();
            case "diploma":
                return new ShowDiplomaFactory();
            case "degree":
                return new ShowDegreeFactory();
            case "master":
                return new ShowMasterFactory();
        }
        throw new Exception('Bad config');
    }

    abstract public function getShow();
}