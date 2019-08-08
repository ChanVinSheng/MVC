<?php
/*Author: Low Ee Hui (18WMR08374) RSD3G2*/
interface FAidInterface {

    public function add($financialaidname, $description, $picture);

    public function getAll();

    public function getWithID($check, $input);

    public function update($id, $value, $column);

    public function updateAll($financialaidid, $financialaidname, $description, $picture);
}
