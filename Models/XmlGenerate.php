<?php

class XmlGenerate {

    private $host;
    private $name;
    private $user;
    private $pass;
    private $dbhandle;
    private $selected;
    private $sql;
    private $result;

    function __construct($table) {
        $this->host = 'localhost';
        $this->name = 'ipassignment';
        $this->user = "root";
        $this->pass = "";
        $this->dbhandle = mysqli_connect($this->host, $this->user, $this->pass) or die("Unable to connect to MySQL");
        $this->selected = mysqli_select_db($this->dbhandle, $this->name) or die("Unable to select database");
        $this->sql = "select * FROM " . $table;
        $this->result = mysqli_query($this->dbhandle, $this->sql) or die(mysqli_error($this->dbhandle));
    }

    function databaseToXml($table, $filename) {

        $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $root_element = $table . "s";
        $xml .= "<$root_element>";

        if (mysqli_num_rows($this->result) > 0) {
            while ($result_array = mysqli_fetch_assoc($this->result)) {
                $xml .= "<" . $table . ">";


                foreach ($result_array as $key => $value) {
                    $xml .= "<$key>";
                    $xml .= "$value";
                    $xml .= "</$key>";
                }

                $xml .= "</" . $table . ">";
            }
            $xml .= "</$root_element>";
        }
        $dom = new DOMDocument;
        $dom->formatOutput = true;
        $dom->preserveWhiteSpace = false;
        $dom->loadXML($xml);

        $dom->save("Xml/$filename");
    }
    
    function databaseToXmlWithSlt($table, $filename , $Xslfilename) {

        $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $xml .= "<?xml-stylesheet type=\"text/xsl\" href=\"$Xslfilename.xsl\"?>";
        
        $root_element = $table . "s";
        $xml .= "<$root_element>";

        if (mysqli_num_rows($this->result) > 0) {
            while ($result_array = mysqli_fetch_assoc($this->result)) {
                $xml .= "<" . $table . ">";


                foreach ($result_array as $key => $value) {
                    $xml .= "<$key>";
                    $xml .= "$value";
                    $xml .= "</$key>";
                }

                $xml .= "</" . $table . ">";
            }
            $xml .= "</$root_element>";
        }
        $dom = new DOMDocument;
        $dom->formatOutput = true;
        $dom->preserveWhiteSpace = false;
        $dom->loadXML($xml);

        $dom->save("Xml/$filename");
    }

}
