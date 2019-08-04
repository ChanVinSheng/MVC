<?php

require_once 'FacultyProgrammeModel.php';
require_once 'FacultyCourseModel.php';

class FacultyCreateXMLfile {

    function __construct($category) {
        $this->model = new FacultyProgrammeModel();
        $programmesArray = $this->model->retrieveAllProgramme();
        $this->model2 = new FacultyCourseModel();
        $coursesArray = $this->model2->retrieveAllCourse();
        
        if($category != "" && count($coursesArray)){
            $this->createXMLfileWithXSLT($coursesArray, $category);
        }
        elseif(count($programmesArray)) {
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
    
    function createXMLfileWithXSLT($coursesArray, $Xslfilename) {
        $filePath = 'courses.xml';

        $dom = new DOMDocument('1.0', 'utf-8');
        $dom->formatOutput = true;
        $dom->preserveWhiteSpace = false;
        $xslt = $dom->createProcessingInstruction('xml-stylesheet', "  type=\"text/xsl\" href=\"$Xslfilename.xsl\"   ");
        $dom->appendChild($xslt);
        $root = $dom->createElement('coursess');
        foreach ($coursesArray as $courses) {

            $courseid = $courses->courseid;
            $coursecode = $courses->coursecode;
            $coursename = $courses->coursename;
            $courseinfo = $courses->courseinfo;
            $credithour = $courses->credithour;
            $status = $courses->status;
            $course = $dom->createElement('courses');
            $course->setAttribute('courseid', $courseid);
            $code = $dom->createElement('coursecode', $coursecode);
            $course->appendChild($code);
            $name = $dom->createElement('coursename', $coursename);
            $course->appendChild($name);
            $info = $dom->createElement('courseinfo', $courseinfo);
            $course->appendChild($info);
            $credithr = $dom->createElement('credithour', $credithour);
            $course->appendChild($credithr);
            $state = $dom->createElement('status', $status);
            $course->appendChild($state);
            $root->appendChild($course);
        }
        $dom->appendChild($root);
        $dom->save("Xml/$filePath");
    }

}
