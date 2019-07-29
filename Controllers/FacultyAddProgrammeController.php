<?php

require 'Models/FacultyProgrammeModel.php';
require 'Models/FacultyCampusModel.php';
require 'Models/FacultyCourseModel.php';
require 'Models/FacultyCurriculumModel.php';
require 'Models/FacultyMinEntryModel.php';

require 'Models/FacultyProgCampusModel.php';
require 'Models/FacultyProgCurriculumModel.php';
require 'Models/FacultyProgMinEntryModel.php';
require 'Models/FacultyProgStructureModel.php';

class FacultyAddProgrammeController extends Controller {

    private $model;

    function __construct() {
        $this->modelProg = new FacultyProgrammeModel();
        $this->modelCampus = new FacultyCampusModel();
        $this->modelCourse = new FacultyCourseModel();
        $this->modelCurr = new FacultyCurriculumModel();
        $this->modelMinEntry = new FacultyMinEntryModel();
        
        $this->modelProgCampus = new FacultyProgCampusModel();
        $this->modelProgCurr = new FacultyProgCurriculumModel();
        $this->modelProgMinEntry = new FacultyProgMinEntryModel();
        $this->modelStruct = new FacultyProgStructureModel();
        parent::__construct();
        session_start();
        if (!isset($_SESSION['role'])) {
            echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {
        $rowCampus = $this->modelCampus->retrieveAllCampus();
        $rowCourse = $this->modelCourse->retrieveAllCourse();
        $rowCurriculum = $this->modelCurr->retrieveAllCurriculum();
        $rowMinEntry = $this->modelMinEntry->retrieveAllMinEntry();
        //$rowFaculties = $this->model->retrieveAllFaculties();
        
        $this->view->rowCampus = $rowCampus;
        $this->view->rowCourse = $rowCourse;
        $this->view->rowCurriculum = $rowCurriculum;
        $this->view->rowMinEntry = $rowMinEntry;
        //$this->view->rowFaculties = $rowFaculties;
        
        $this->view->render('FacultyAddProgrammeView');
    }

    function insertDatabase() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $programmecode = $_POST["programmecode"];
            $description = $_POST["description"];
            $duration = $_POST["duration"];
            $levelofstudy = $_POST["levelofstudy"];
            $facultyid = $_POST["facultyid"];
            
            $programmeid = $_POST["programmeid"];
            $campusid = $_POST["campusid"];
            $curriculumid = $_POST["curriculumid"];
            $minentryid = $_POST["minentryid"];
            $courseid = $_POST["courseid"];

            $this->modelProg->insert($programmecode, $description, $duration, $levelofstudy, $facultyid);
            $this->modelProgCampus->insert($programmeid, $campusid);
            $this->modelProgCurr->insert($programmeid, $curriculumid);
            $this->modelProgMinEntry->insert($programmeid, $minentryid);
            $this->modelStruct->insert($programmeid, $courseid);
            echo "<script>alert(\"Successfully Added\"); window.location.href=\"FacultyAddProgrammeController\";</script>";
        }
        else{
            echo "<script>alert(\"Unsuccessfully Add!\"); window.location.href=\"FacultyAddProgrammeController\";</script>";
        }
    }

}
