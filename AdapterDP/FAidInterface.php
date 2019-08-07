<?php

interface FAidInterface {

    public function add($financialaidname, $description, $picture);

    public function getAll();

    public function getWithID($check, $input);

    public function update($id, $value, $column);

    public function updateAll($financialaidid, $financialaidname, $description, $picture);
}
