<?php

require_once 'FacultyProgrammeModel.php';

class FacultyCreateXMLfile {

    function __construct() {
        $this->model = new FacultyProgrammeModel();
        $programmesArray = $this->model->retrieveAllProgramme();
        if (count($programmesArray)) {
            $this->createXMLfile($programmesArray);
        }
    }

    function createXMLfile($programmesArray) {
        $filePath = 'programme.xml';

        $dom = new DOMDocument('1.0', 'utf-8');
        $dom->formatOutput = true;
        $dom->preserveWhiteSpace = false;
        $root = $dom->createElement('programmes');
        foreach ($programmesArray as $programmes) {

            $programmeid = $programmes->programmeid;
            $programmecode = $programmes->programmecode;
            $description = $programmes->description;
            $duration = $programmes->duration;
            $levelofstudyid = $programmes->levelofstudyid;
            $facultyid = $programmes->facultyid;
            $status = $programmes->status;
            $programme = $dom->createElement('programme');
            $programme->setAttribute('programmeid', $programmeid);
            $code = $dom->createElement('programmecode', $programmecode);
            $programme->appendChild($code);
            $desc = $dom->createElement('description', $description);
            $programme->appendChild($desc);
            $dur = $dom->createElement('duration', $duration);
            $programme->appendChild($dur);
            $lvlOfStudID = $dom->createElement('levelofstudyid', $levelofstudyid);
            $programme->appendChild($lvlOfStudID);
            $facID = $dom->createElement('facultyid', $facultyid);
            $programme->appendChild($facID);
            $stat = $dom->createElement('status', $status);
            $programme->appendChild($stat);
            $root->appendChild($programme);
        }
        $dom->appendChild($root);
        $dom->save("Xml/$filePath");
    }

}
