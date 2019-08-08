<?php
/*Author: Low Ee Hui (18WMR08374) RSD3G2*/
interface AccmdInterface {

    public function add($branch, $type, $fee, $description, $picture, $location);

    public function getAll();

    public function getWithID($id);

    public function update($id, $value, $column);

    public function updateAll($accomodationid, $branch, $type, $fee, $description, $picture, $location);
}
