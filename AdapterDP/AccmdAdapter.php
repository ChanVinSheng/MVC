<?php

require_once "AdapterDP/AccmdInterface.php";
require_once "Models/DpAccmdModel.php";

class AccmdAdapter implements AccmdInterface {

    private $model;

    public function __construct(DpAccmdModel $model) {
        $this->model = $model;
    }

    public function add($branch, $type, $fee, $description, $picture, $location) {
        $this->model->insert($branch, $type, $fee, $description, $picture, $location);
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

    public function updateAll($accomodationid, $branch, $type, $fee, $description, $picture, $location) {
        $this->model->updateAll($accomodationid, $branch, $type, $fee, $description, $picture, $location);
    }

}
