<?php

require_once 'Models/studentModel.php';

class programmeDetailController {
    
    function __construct() {
        $this->model = new studentModel();
        $programmeary = $this->model-> programmeDetail();
        if(count($programmeary)){
            $this->programmedetailXML($programmeary);
        }
        $minentryary = $this->model->minentryDetail();
        if(count($minentryary)){
            $this->minentryXML($minentryary);
        }
        $typeary = $this->model-> typeDetail();
        if(count($typeary)){
            $this->typeXML($typeary);
        }
        $courseary = $this->model-> courseDetail();
        if(count($courseary)){
            $this->courseXML($courseary);
        }
        $feeary = $this->model-> feeDetail();
        if(count($feeary)){
            $this->feeXML($feeary);
        }
        $curriculumary = $this->model-> curriculumDetail();
        if(count($curriculumary)){
            $this->curriculumXML($curriculumary);
        }
        $campusary = $this->model-> campusDetail();
        if(count($campusary)){
            $this->campusXML($campusary);
        }
    }
    
    function programmedetailXML($array){
        $filePath = 'programmeDetail.xml';
        
        $dom = new DOMDocument('1.0','utf-8');
        $dom->formatOutput = true;
        $dom->preserveWhiteSpace = false;
        $root = $dom->createElement('programmeDetails');
        foreach ($array as $programmedetails) {
            $programmecode = $programmedetails->programmecode;
            $description = $programmedetails->description;
            $duration = $programmedetails->duration;
            $programmedetail = $dom->createElement('programmeDetail');
            $progcode = $dom->createElement('programmecode', $programmecode);
            $programmedetail->appendChild($progcode);
            $desc = $dom->createElement('description', $description);
            $programmedetail->appendChild($desc);
            $dur = $dom->createElement('duration', $duration);
            $programmedetail->appendChild($dur);
            $root->appendChild($programmedetail);
        }
        $dom->appendChild($root);
        $dom->save("Xml/$filePath");
    }
    
    function minentryXML($array){
        $filePath = 'minentryDetail.xml';
        
        $dom = new DOMDocument('1.0','utf-8');
         $dom->formatOutput = true;
        $dom->preserveWhiteSpace = false;
        $root = $dom->createElement('minentryDetails');
        foreach ($array as $minentrydetails) {

            $programmecode = $minentrydetails->programmecode;
            $description = $minentrydetails->description;
            $minentryname = $minentrydetails->minentryname;
            $minentrydetail = $dom->createElement('minentryDetail');
            $progcode = $dom->createElement('programmecode', $programmecode);
            $minentrydetail->appendChild($progcode);
            $desc = $dom->createElement('description', $description);
            $minentrydetail->appendChild($desc);
            $minentry = $dom->createElement('minentryname', $minentryname);
            $minentrydetail->appendChild($minentry);
            $root->appendChild($minentrydetail);
        }
        $dom->appendChild($root);
        $dom->save("Xml/$filePath");
    }
    
    function typeXML($array){
        $filePath = 'typeDetail.xml';
        
        $dom = new DOMDocument('1.0','utf-8');
         $dom->formatOutput = true;
        $dom->preserveWhiteSpace = false;
        $root = $dom->createElement('typeDetails');
        foreach ($array as $typedetails) {

            $programmecode = $typedetails->programmecode;
            $description = $typedetails->description;
            $type = $typedetails->type;
            $typedetail = $dom->createElement('typeDetail');
            $progcode = $dom->createElement('programmecode', $programmecode);
            $typedetail->appendChild($progcode);
            $desc = $dom->createElement('description', $description);
            $typedetail->appendChild($desc);
            $typ = $dom->createElement('type', $type);
            $typedetail->appendChild($typ);
            $root->appendChild($typedetail);
        }
        $dom->appendChild($root);
        $dom->save("Xml/$filePath");
    }
    
    function courseXML($array){
        $filePath = 'courseDetail.xml';
        
        $dom = new DOMDocument('1.0','utf-8');
         $dom->formatOutput = true;
        $dom->preserveWhiteSpace = false;
        $root = $dom->createElement('courseDetails');
        foreach ($array as $coursedetails) {

            $programmecode = $coursedetails->programmecode;
            $description = $coursedetails->description;
            $coursename = $coursedetails->coursename;
            $coursedetail = $dom->createElement('courseDetail');
            $progcode = $dom->createElement('programmecode', $programmecode);
            $coursedetail->appendChild($progcode);
            $desc = $dom->createElement('description', $description);
            $coursedetail->appendChild($desc);
            $course = $dom->createElement('coursename', $coursename);
            $coursedetail->appendChild($course);
            $root->appendChild($coursedetail);
        }
        $dom->appendChild($root);
        $dom->save("Xml/$filePath");
    }
    
    function feeXML($array){
        $filePath = 'feeDetail.xml';
        
        $dom = new DOMDocument('1.0','utf-8');
         $dom->formatOutput = true;
        $dom->preserveWhiteSpace = false;
        $root = $dom->createElement('feeDetails');
        foreach ($array as $feedetails) {

            $programmecode = $feedetails->programmecode;
            $description = $feedetails->description;
            $feemin = $feedetails->feeMin;
            $feemax = $feedetails->feeMax;
            $feedetail = $dom->createElement('feeDetail');
            $progcode = $dom->createElement('programmecode', $programmecode);
            $feedetail->appendChild($progcode);
            $desc = $dom->createElement('description', $description);
            $feedetail->appendChild($desc);
            $minfee = $dom->createElement('feeMin', $feemin);
            $feedetail->appendChild($minfee);
            $maxfee = $dom->createElement('feeMax', $feemax);
            $feedetail->appendChild($maxfee);
            $root->appendChild($feedetail);
        }
        $dom->appendChild($root);
        $dom->save("Xml/$filePath");
    }
    
    function curriculumXML($array){
        $filePath = 'curriculumDetail.xml';
        
        $dom = new DOMDocument('1.0','utf-8');
         $dom->formatOutput = true;
        $dom->preserveWhiteSpace = false;
        $root = $dom->createElement('curriculumDetails');
        foreach ($array as $curriculumdetails) {

            $programmecode = $curriculumdetails->programmecode;
            $description = $curriculumdetails->description;
            $curriculumname = $curriculumdetails->curriculumname;
            $curriculumdesc = $curriculumdetails->curriculumdesc;
            $curriculumdetail = $dom->createElement('curriculumDetail');
            $progcode = $dom->createElement('programmecode', $programmecode);
            $curriculumdetail->appendChild($progcode);
            $desc = $dom->createElement('description', $description);
            $curriculumdetail->appendChild($desc);
            $namecurriculum = $dom->createElement('curriculumname', $curriculumname);
            $curriculumdetail->appendChild($namecurriculum);
            $desccurriculum = $dom->createElement('curriculumdesc', $curriculumdesc);
            $curriculumdetail->appendChild($desccurriculum);
            $root->appendChild($curriculumdetail);
        }
        $dom->appendChild($root);
        $dom->save("Xml/$filePath");
    }
    
    function campusXML($array){
        $filePath = 'campusDetail.xml';
        
        $dom = new DOMDocument('1.0','utf-8');
         $dom->formatOutput = true;
        $dom->preserveWhiteSpace = false;
        $root = $dom->createElement('campusDetails');
        foreach ($array as $campusdetails) {

            $programmecode = $campusdetails->programmecode;
            $description = $campusdetails->description;
            $campusname = $campusdetails->campusname;
            $campusdetail = $dom->createElement('campusDetail');
            $progcode = $dom->createElement('programmecode', $programmecode);
            $campusdetail->appendChild($progcode);
            $desc = $dom->createElement('description', $description);
            $campusdetail->appendChild($desc);
            $namecampus = $dom->createElement('campusname', $campusname);
            $campusdetail->appendChild($namecampus);
            $root->appendChild($campusdetail);
        }
        $dom->appendChild($root);
        $dom->save("Xml/$filePath");
    }
}

