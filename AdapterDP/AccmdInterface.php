<?php

interface AccmdInterface {

    public function add($branch, $type, $fee, $description, $picture, $location);

    public function getAll();

    public function getWithID($id);

    public function update($id, $value, $column);

    public function updateAll($accomodationid, $branch, $type, $fee, $description, $picture, $location);
}
