<?php

class DynamicXML {

    private $con, $db, $result;

    function __construct($table) {
        $this->con = mysqli_connect('localhost', "root", "") or die("Connection Failed");
        $this->db = mysqli_select_db($this->con, "ipassignment") or die("Connection Failed");
        $this->result = mysqli_query($this->con, "select * from " . $table) or die("Connection Failed");
    }

    function dbtoxml($table, $filename) {
        $xml = new DOMDocument("1.0", "UTF-8");
        $xml->formatOutput = true;
        $root = $xml->createElement($table . "s");
        $xml->appendChild($root);
        while ($row = mysqli_fetch_assoc($this->result)) {
            $child = $xml->createElement($table);
            $root->appendChild($child);
            foreach ($row as $key => $value) {
                $subchild = $xml->createElement($key, $value);
                $child->appendChild($subchild);
            }
        }
        $xml->save("Xml/$filename");
    }

}
?>

