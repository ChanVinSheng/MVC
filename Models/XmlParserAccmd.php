<?php
/*Author: Low Ee Hui (18WMR08374) RSD3G2*/
class XmlParserAccmd {

    private $xml;

    public function __construct(string $document) {
        $this->xml = simplexml_load_file($document);
    }

    public function xmlParser():string {
        $display = '<table class="table">';
        $display .= '<thead>';
        $display .= '<tr bgcolor="#E6E6FA">';
        $display .= "<th>Branch</th>";
        $display .= "<th>Type</th>";
        $display .= "<th>Fee</th>";
        $display .= "<th>Description</th>";
        $display .= "<th>Picture</th>";
        $display .= "<th>Location</th>";
        $display .= "<th>Status</th>";
        $display .= "</tr>";
        $display .= '</thead>';
        foreach ($this->xml->accomodation as $recordElements) {
            $display .= "<tr>";
            $display .= "<td>" . $recordElements->branch . "</td>";
            $display .= "<td>" . $recordElements->type . "</td>";
            $display .= "<td>" . $recordElements->fee . "</td>";
            $display .= "<td>" . $recordElements->description . "</td>";
            $display .= "<td>" . $recordElements->picture . "</td>";
            $display .= "<td>" . $recordElements->location . "</td>";
            $display .= "<td>" . $recordElements->status . "</td>";
            $display .= "</tr>";
        }

        $display .= "</table>";
        return $display;
    }
}
