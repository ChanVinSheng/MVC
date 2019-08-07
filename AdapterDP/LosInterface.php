<?php

interface LoSInterface {
    public function add($type);
    public function getAll();
    public function getWithID($check, $input);
    public function update($id, $value, $column);
}
