<?php
/*Author: Low Ee Hui (18WMR08374) RSD3G2*/
class XmlParserFAid {

    private $xml;

    public function __construct(string $document) {
        $this->xml = simplexml_load_file($document);
    }

    public function xmlParser():string {
        $display = '<table class="table">';
        $display .= '<thead>';
        $display .= '<tr bgcolor="#E6E6FA">';
        $display .= "<th>Financial Aid Name</th>";
        $display .= "<th>Description</th>";
        $display .= "<th>Picture</th>";
        $display .= "<th>Status</th>";
        $display .= "</tr>";
        $display .= '</thead>';
        foreach ($this->xml->financialaid as $recordElements) {
            $display .= "<tr>";
            $display .= "<td>" . $recordElements->financialaidname . "</td>";
            $display .= "<td>" . $recordElements->description . "</td>";
            $display .= "<td>" . $recordElements->picture . "</td>";
            $display .= "<td>" . $recordElements->status . "</td>";
            $display .= "</tr>";
        }

        $display .= "</table>";
        return $display;
    }
}
