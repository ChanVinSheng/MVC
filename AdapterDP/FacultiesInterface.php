<?php

interface FacultiesInterface {

    public function add($facultyname, $facultydescription, $feeMin, $feeMax);

    public function getAll();

    public function getWithID($check, $input);

    public function update($id, $value, $column);

    public function updateAll($facultyid, $facultyname, $facultydescription, $feeMin, $feeMax);
}
