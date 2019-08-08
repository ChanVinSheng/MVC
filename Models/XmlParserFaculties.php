<?php
/*Author: Low Ee Hui (18WMR08374) RSD3G2*/
class XmlParserFaculties {

    private $xml;

    public function __construct(string $document) {
        $this->xml = simplexml_load_file($document);
    }

    public function xmlParser():string {
        $display = '<table class="table">';
        $display .= '<thead>';
        $display .= '<tr bgcolor="#E6E6FA">';
        $display .= "<th>Faculty Name</th>";
        $display .= "<th>Description</th>";
        $display .= "<th>FeeMin</th>";
        $display .= "<th>FeeMax</th>";
        $display .= "<th>Status</th>";
        $display .= "</tr>";
        $display .= '</thead>';
        foreach ($this->xml->faculties as $recordElements) {
            $display .= "<tr>";
            $display .= "<td>" . $recordElements->facultyname . "</td>";
            $display .= "<td>" . $recordElements->facultydescription . "</td>";
            $display .= "<td>" . $recordElements->feeMin . "</td>";
            $display .= "<td>" . $recordElements->feeMax . "</td>";
            $display .= "<td>" . $recordElements->status . "</td>";
            $display .= "</tr>";
        }

        $display .= "</table>";
        return $display;
    }
}
