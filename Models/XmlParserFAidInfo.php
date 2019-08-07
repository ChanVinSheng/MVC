<?php

class XmlParserFAidInfo {

    private $xml;

    public function __construct(string $document) {
        $this->xml = simplexml_load_file($document);
    }

    public function xmlParser():string {
        $display = '<table class="table">';
        $display .= '<thead>';
        $display .= '<tr bgcolor="#E6E6FA">';
        $display .= "<th>Organization</th>";
        $display .= "<th>Description</th>";
        $display .= "<th>CGPA</th>";
        $display .= "<th>Fee</th>";
        $display .= "<th>FAid ID</th>";
        $display .= "<th>Status</th>";
        $display .= "</tr>";
        $display .= '</thead>';
        foreach ($this->xml->aidinformation as $recordElements) {
            $display .= "<tr>";
            $display .= "<td>" . $recordElements->aidinfoname . "</td>";
            $display .= "<td>" . $recordElements->aidinfodesc . "</td>";
            $display .= "<td>" . $recordElements->aidinfocgpa . "</td>";
            $display .= "<td>" . $recordElements->aidinfofee . "</td>";
            $display .= "<td>" . $recordElements->financialaidid . "</td>";
            $display .= "<td>" . $recordElements->status . "</td>";
            $display .= "</tr>";
        }

        $display .= "</table>";
        return $display;
    }
}
