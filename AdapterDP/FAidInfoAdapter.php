<?php

require_once "AdapterDP/FAidInfoInterface.php";
require_once "Models/DpFAidInfoModel.php";

class FAidInfoAdapter implements FAidInfoInterface {

    private $model;

    public function __construct(DpFAidInfoModel $model) {
        $this->model = $model;
    }

    public function add($aidinfoname , $aidinfodesc , $aidinfocgpa, $aidinfofee, $financialaidid) {
        $this->model->insert($aidinfoname , $aidinfodesc , $aidinfocgpa, $aidinfofee, $financialaidid);
    }

    public function getAll() {
        return $this->model->retrieveAll();
    }

    public function getWithID($id) {
        return $this->model->retrievedByID($id);
    }

    public function update($id, $value, $column) {
        $this->model->updateOne($id, $value, $column);
    }

    public function updateAll($aidinfoid, $aidinfoname , $aidinfodesc , $aidinfocgpa, $aidinfofee, $financialaidid) {
        $this->model->updateAll($aidinfoid, $aidinfoname , $aidinfodesc , $aidinfocgpa, $aidinfofee, $financialaidid);
    }

}
