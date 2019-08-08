<?php
/*Author: Low Ee Hui (18WMR08374) RSD3G2*/
class DpFAidInfoModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function insert($aidinfoname , $aidinfodesc , $aidinfocgpa, $aidinfofee, $financialaidid) {
        $data = array(
            'aidinfoname' => $aidinfoname,
            'aidinfodesc' => $aidinfodesc,
            'aidinfocgpa' => $aidinfocgpa,
            'aidinfofee' => $aidinfofee,
            'financialaidid' => $financialaidid
        );
        $this->db->insert('aidinformation', $data);
    }

    function retrieveAll() {
        $rows = $this->db->select("* FROM aidinformation");

        return $rows;
    }

    function retrievedByID($id) {
        $rows = $this->db->select("* FROM aidinformation WHERE aidinfoid = :aidinfoid ", [':aidinfoid' => $id]);
        return $rows;
    }

    function updateOne($id, $value, $column) {
        $data = array(
            $column => $value
        );
        $where = array('aidinfoid' => $id);
        $this->db->update('aidinformation', $data, $where);
    }

    function updateAll($aidinfoid, $aidinfoname , $aidinfodesc , $aidinfocgpa, $aidinfofee, $financialaidid) {
        $data = array(
            'aidinfoname' => $aidinfoname,
            'aidinfodesc' => $aidinfodesc,
            'aidinfocgpa' => $aidinfocgpa,
            'aidinfofee' => $aidinfofee,
            'financialaidid' => $financialaidid
        );
        $where = array('aidinfoid' => $aidinfoid);
        $this->db->update('aidinformation', $data, $where);
    }

}
