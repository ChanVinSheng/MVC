<?php
/*Author: Low Ee Hui (18WMR08374) RSD3G2*/
interface FacultiesInterface {

    public function add($facultyname, $facultydescription, $feeMin, $feeMax);

    public function getAll();

    public function getWithID($check, $input);

    public function update($id, $value, $column);

    public function updateAll($facultyid, $facultyname, $facultydescription, $feeMin, $feeMax);
}
