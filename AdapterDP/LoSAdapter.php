<?php

require_once "AdapterDP/LoSInterface.php";
require_once "Models/DpLosModel.php";

class LoSAdapter implements LoSInterface {

    private $model;

    public function __construct(DpLoSModel $model) {
        $this->model = $model;
    }

    public function add($type) {
        $this->model->insert($type);
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

}
