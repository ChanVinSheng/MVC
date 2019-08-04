<?php

require_once 'Models/FacultyCreateXMLfile.php';
require_once 'Models/XmlGenerate.php';
require_once 'Models/programmeSAXParser.php';
require_once 'Models/courseSAXParser.php';
require_once 'Models/minEntrySAXParser.php';
require_once 'Models/curriculumSAXParser.php';
require_once 'Models/campusSAXParser.php';

require 'Models/DpFacultiesModel.php';
require 'Models/DpLoSModel.php';

class FacultyHomeController extends Controller {

    function __construct() {
        parent::__construct();
        session_start();
        if (!isset($_SESSION['role'])) {
            echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {
        $programmeXml = new FacultyCreateXMLfile("");
        $saxp = new programmeSAXParser("programme");
        $programmedata = $saxp->getData();
        
        $this->modelDpFaculty = new DpFacultiesModel();
        $rowFaculties = $this->modelDpFaculty->retrieveAll();
        $this->modelDpLoS = new DpLoSModel();
        $rowLvlOfStudy = $this->modelDpLoS->retrieveAll();
        
        $courseXml = new XmlGenerate("courses");
        $courseXml->databaseToXml("courses", "courses.xml");
        $sax = new courseSAXParser("courses");
        $coursedata = $sax->getData();
        
        $minEntryXml = new XmlGenerate("minentry");
        $minEntryXml->databaseToXml("minEntry", "minEntry.xml");
        $sax = new minEntrySAXParser("minentry");
        $minentrydata = $sax->getData();
        
        $curriculumXml = new XmlGenerate("professionalcurriculum");
        $curriculumXml->databaseToXml("professionalcurriculum", "professionalcurriculum.xml");
        $sax = new curriculumSAXParser("professionalcurriculum");
        $curriculumdata = $sax->getData();
        
        $campusXml = new XmlGenerate("campus");
        $campusXml->databaseToXml("campus", "campus.xml");
        $sax = new campusSAXParser("campus");
        $campusdata = $sax->getData();
        
        $output = '<table class="table">';
        $output .= '<thead>';
        $output .= '<tr bgcolor="#E6E6FA">';
        $output .= "<th>Programme Code</th>";
        $output .= "<th>Description</th>";
        $output .= "<th>Duration of Study</th>";
        $output .= "<th>Level of Study</th>";
        $output .= "<th>Faculty</th>";
        $output .= "<th>Estimated Total Fees(RM)</th>";
        $output .= "<th>Fees Per Year(RM)</th>";
        $output .= "<th>Status</th>";
        $output .= "</tr>";
        $output .= '</thead>';
        foreach ($programmedata as $programmes) {
            $output .= "<tr>";
            $output .= "<td>" . $programmes['PROGRAMMECODE'] . "</td>";
            $output .= "<td>" . $programmes['DESCRIPTION'] . "</td>";
            $output .= "<td>" . $programmes['DURATION'] . "</td>";
            foreach($rowLvlOfStudy as $lvlOfStudy){
                if(strtoupper($lvlOfStudy->levelofstudyid) == strtoupper($programmes['LEVELOFSTUDYID']))
                   $output .= "<td>" . $lvlOfStudy->type . "</td>"; 
            }
            foreach($rowFaculties as $faculties){
                if(strtoupper($faculties->facultyid) == strtoupper($programmes['FACULTYID']))
                   $output .= "<td>" . $faculties->facultyname . "</td>"; 
            }
            $output .= "<td>" . $programmes['FEE'] . "</td>";
            $output .= "<td>" . $programmes['YEARLYFEE'] . "</td>";
            $output .= "<td>" . $programmes['STATUS'] . "</td>";
            $output .= "</tr>";
        }
        
        $output2 = '<thead>';
        $output2 .= '<tr bgcolor="#E6E6FA">';
        $output2 .= "<th>Course Code</th>";
        $output2 .= "<th>Course Name</th>";
        $output2 .= "<th>Course Information</th>";
        $output2 .= "<th>Credit Hour(s)</th>";
        $output2 .= "<th>Status</th>";
        $output2 .= "</tr>";
        $output2 .= '</thead>';
        foreach ($coursedata as $courses) {
            $output2 .= "<tr>";
            $output2 .= "<td>" . $courses['COURSECODE'] . "</td>";
            $output2 .= "<td>" . $courses['COURSENAME'] . "</td>";
            $output2 .= "<td>" . $courses['COURSEINFO'] . "</td>";
            $output2 .= "<td>" . $courses['CREDITHOUR'] . "</td>";
            $output2 .= "<td>" . $courses['STATUS'] . "</td>";
            $output2 .= "</tr>";
        }
        
        $output3 = '<thead>';
        $output3 .= '<tr bgcolor="#E6E6FA">';
        $output3 .= "<th>Minimum Entry Name</th>";
        $output3 .= "<th>Status</th>";
        $output3 .= "</tr>";
        $output3 .= '</thead>';
        foreach ($minentrydata as $minentries) {
            $output3 .= "<tr>";
            $output3 .= "<td>" . $minentries['MINENTRYNAME'] . "</td>";
            $output3 .= "<td>" . $minentries['STATUS'] . "</td>";
            $output3 .= "</tr>";
        }
        
        $output4 = '<thead>';
        $output4 .= '<tr bgcolor="#E6E6FA">';
        $output4 .= "<th>Curriculum Name</th>";
        $output4 .= "<th>Description</th>";
        $output4 .= "<th>Status</th>";
        $output4 .= "</tr>";
        $output4 .= '</thead>';
        foreach ($curriculumdata as $curriculums) {
            $output4 .= "<tr>";
            $output4 .= "<td>" . $curriculums['CURRICULUMNAME'] . "</td>";
            $output4 .= "<td>" . $curriculums['CURRICULUMDESC'] . "</td>";
            $output4 .= "<td>" . $curriculums['STATUS'] . "</td>";
            $output4 .= "</tr>";
        }
        
        $output5 = '<thead>';
        $output5 .= '<tr bgcolor="#E6E6FA">';
        $output5 .= "<th>Campus Name</th>";
        $output5 .= "<th>Status</th>";
        $output5 .= "</tr>";
        $output5 .= '</thead>';
        foreach ($campusdata as $campus) {
            $output5 .= "<tr>";
            $output5 .= "<td>" . $campus['CAMPUSNAME'] . "</td>";
            $output5 .= "<td>" . $campus['STATUS'] . "</td>";
            $output5 .= "</tr>";
        }

        $output5 .= "</table>";
        $this->view->programmeXml = $output;
        $this->view->courseXml = $output2;
        $this->view->minEntryXml = $output3;
        $this->view->curriculumXml = $output4;
        $this->view->campusXml = $output5;
        
        $this->view->render('FacultyHomeView');
    }

}
