<?php
/*Author: Low Ee Hui (18WMR08374) RSD3G2*/
interface FAidInfoInterface {

    public function add($aidinfoname , $aidinfodesc , $aidinfocgpa, $aidinfofee, $financialaidid);

    public function getAll();

    public function getWithID($id);

    public function update($id, $value, $column);

    public function updateAll($aidinfoid, $aidinfoname , $aidinfodesc , $aidinfocgpa, $aidinfofee, $financialaidid);
}
