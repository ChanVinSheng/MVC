<?php
/*Author: Low Ee Hui (18WMR08374) RSD3G2*/
interface LoSInterface {
    public function add($type);
    public function getAll();
    public function getWithID($check, $input);
    public function update($id, $value, $column);
}
