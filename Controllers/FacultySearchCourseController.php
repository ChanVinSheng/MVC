<?php

require 'Models/FacultyCourseModel.php';
require 'Models/FacultyCreateXMLfile.php';
require_once 'Models/XmlGenerate.php';
require_once 'Models/courseSAXParser.php';

class FacultySearchCourseController extends Controller {

    private $model;

    function __construct() {
        $this->model = new FacultyCourseModel();
        parent::__construct();
        session_start();
        if (isset($_SESSION['role'])) {
            if($_SESSION['role'] != "Faculty")
                echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
        else{
            echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {
        //$row = $this->model->retrieveAllCourse();
        if (isset($_POST["submit"])) {
            $category = $_POST['courseCodeCat'];
            $xml = new FacultyCreateXMLfile($category);

            if ($category == "All") {
                $courseXml = new XmlGenerate("courses");
                $courseXml->databaseToXml("courses", "courses.xml");
                $sax = new courseSAXParser("courses");
                $coursedata = $sax->getData();

                $output2 = "<h3 style='font-weight: bold;'>All Courses</h3>";
                $output2 .= "<hr />";
                $output2 .= '<table class="table">';
                $output2 .= '<thead>';
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

                $output2 .= "</table>";
                $this->view->xml = $output2;
            } elseif ($category == "BACS") {
                $proc = new XsltProcessor;
                $proc->importStylesheet(DOMDocument::load("Xls/BACSsort.xsl")); //load XSL script
                $proc->transformToXML(DOMDocument::load("Xml/courses.xml"));
                $this->view->xml = $proc->transformToXML(DOMDocument::load("Xml/courses.xml"));
            } elseif ($category == "BAIT") {
                $proc = new XsltProcessor;
                $proc->importStylesheet(DOMDocument::load("Xls/BAITsort.xsl")); //load XSL script
                $proc->transformToXML(DOMDocument::load("Xml/courses.xml"));
                $this->view->xml = $proc->transformToXML(DOMDocument::load("Xml/courses.xml"));
            } elseif ($category == "MPU") {
                $proc = new XsltProcessor;
                $proc->importStylesheet(DOMDocument::load("Xls/MPUsort.xsl")); //load XSL script
                $proc->transformToXML(DOMDocument::load("Xml/courses.xml"));
                $this->view->xml = $proc->transformToXML(DOMDocument::load("Xml/courses.xml"));
            }
        } else {
            $courseXml = new XmlGenerate("courses");
            $courseXml->databaseToXml("courses", "courses.xml");
            $sax = new courseSAXParser("courses");
            $coursedata = $sax->getData();

            $output2 = "<h3>All Courses</h3>";
            $output2 .= "<hr />";
            $output2 .= '<table class="table">';
            $output2 .= '<thead>';
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

            $output2 .= "</table>";
            $this->view->xml = $output2;
        }
        $this->view->render('FacultySearchCourseView');
    }

}
