<?php

require_once "AdapterDP/FAidInterface.php";
require_once "Models/DpFAidModel.php";

class FAidAdapter implements FAidInterface {

    private $model;

    public function __construct(DpFAidModel $model) {
        $this->model = $model;
    }

    public function add($financialaidname, $description, $picture) {
        $this->model->insert($financialaidname, $description, $picture);
    }

    public function getAll() {
        return $this->model->retrieveAll();
    }

    public function getWithID($check, $input) {
        return $this->model->retrievedByID($check, $input);
    }

    public function update($id, $value, $column) {
        $this->model->updateOne($id, $value, $column);
    }

    public function updateAll($financialaidid, $financialaidname, $description, $picture) {
        $this->model->updateAll($financialaidid, $financialaidname, $description, $picture);
    }

}
