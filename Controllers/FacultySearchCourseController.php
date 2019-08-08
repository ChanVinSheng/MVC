<?php
/*Author: Low Wei Yin (18WMR08375) RSD3G2*/

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
            if ($_SESSION['role'] != "Faculty")
                echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
        else {
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

                $this->view->coursedata = $coursedata;
                $this->view->sortBy = "All";
            } elseif ($category == "BACS") {
                $proc = new XsltProcessor;
                $proc->importStylesheet(DOMDocument::load("Xls/BACSsort.xsl")); //load XSL script
                $proc->transformToXML(DOMDocument::load("Xml/courses.xml"));
                $this->view->xml = $proc->transformToXML(DOMDocument::load("Xml/courses.xml"));
                $this->view->sortBy = "Others";
            } elseif ($category == "BAIT") {
                $proc = new XsltProcessor;
                $proc->importStylesheet(DOMDocument::load("Xls/BAITsort.xsl")); //load XSL script
                $proc->transformToXML(DOMDocument::load("Xml/courses.xml"));
                $this->view->xml = $proc->transformToXML(DOMDocument::load("Xml/courses.xml"));
                $this->view->sortBy = "Others";
            } elseif ($category == "MPU") {
                $proc = new XsltProcessor;
                $proc->importStylesheet(DOMDocument::load("Xls/MPUsort.xsl")); //load XSL script
                $proc->transformToXML(DOMDocument::load("Xml/courses.xml"));
                $this->view->xml = $proc->transformToXML(DOMDocument::load("Xml/courses.xml"));
                $this->view->sortBy = "Others";
            }
        } else {
            $courseXml = new XmlGenerate("courses");
            $courseXml->databaseToXml("courses", "courses.xml");
            $sax = new courseSAXParser("courses");
            $coursedata = $sax->getData();

            $this->view->coursedata = $coursedata;
            $this->view->sortBy = "All";
        }
        $this->view->render('FacultySearchCourseView');
    }

}
