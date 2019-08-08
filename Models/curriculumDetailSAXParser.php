<?php
/*Author: Leek Hon Lun (18WMR08344) RSD3G2*/
//Reading XML using the SAX(Simple API for XML) parser 


class curriculumDetailSAXParser {

    private $programmes = array();
    private $filename;
    private $elements = null;

    public function __construct($filename) {
        $this->filename = $filename;
        $this->parseUser();
    }

// Called to this function when tags are opened 
    public function startElements($parser, $name, $attrs) {

        if (!empty($name)) {
            if ($name == 'CURRICULUMDETAIL') {
                $this->programmes [] = array();
            }
            $this->elements = $name;
        }
    }

    public function endElements($parser, $name) {


        if (!empty($name)) {
            $this->elements = null;
        }
    }

// Called on the text between the start and end of the tags
    public function characterData($parser, $data) {
        if (!empty($data)) {
            if ($this->elements == 'PROGRAMMECODE' || $this->elements == 'DESCRIPTION' || $this->elements == 'CURRICULUMNAME' || $this->elements == 'CURRICULUMDESC') {
                $this->programmes[count($this->programmes) - 1][$this->elements] = trim($data);
            }
        }
    }

    public function parseUser() {
        $parser = xml_parser_create();

        xml_set_element_handler($parser, array($this, "startElements"), array($this, "endElements"));
        xml_set_character_data_handler($parser, array($this, "characterData"));

        if (!($handle = fopen("Xml/$this->filename.xml", "r"))) {
            die("could not open XML input");
        }

        while ($data = fread($handle, 4096)) {
            xml_parse($parser, $data);
        }

        xml_parser_free($parser); // deletes the parser
    }

    public Function getData() {
        return $this->programmes;
    }

}

?>
