<?php
/*Author: Low Ee Hui (18WMR08374) RSD3G2*/
require_once "AdapterDP/FacultiesInterface.php";
require_once "Models/DpFacultiesModel.php";

class FacultiesAdapter implements FacultiesInterface {

    private $model;

    public function __construct(DpFacultiesModel $model) {
        $this->model = $model;
    }

    public function add($facultyname, $facultydescription, $feeMin, $feeMax) {
        $this->model->insert($facultyname, $facultydescription, $feeMin, $feeMax);
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

    public function updateAll($facultyid, $facultyname, $facultydescription, $feeMin, $feeMax) {
        $this->model->updateAll($facultyid, $facultyname, $facultydescription, $feeMin, $feeMax);
    }

}
