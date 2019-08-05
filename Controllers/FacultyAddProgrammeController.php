<?php

require 'Models/FacultyProgrammeModel.php';
require 'Models/FacultyCampusModel.php';
require 'Models/FacultyCourseModel.php';
require 'Models/FacultyCurriculumModel.php';
require 'Models/FacultyMinEntryModel.php';
require 'Models/DpFacultiesModel.php';
require 'Models/DpLoSModel.php';

require 'Models/FacultyProgCampusModel.php';
require 'Models/FacultyProgCurriculumModel.php';
require 'Models/FacultyProgMinEntryModel.php';
require 'Models/FacultyProgStructureModel.php';

require 'SOAPcalcFee/lib/nusoap.php';

require_once 'StrategyValidation/Validator.php';
require_once 'StrategyValidation/ValidationProgCode.php';
require_once 'StrategyValidation/ValidationDesc.php';
require_once 'StrategyValidation/ValidationCourseChk.php';
require_once 'StrategyValidation/ValidationCampusChk.php';
require_once 'StrategyValidation/ValidationMinEntryChk.php';

class FacultyAddProgrammeController extends Controller {

    private $model;

    function __construct() {
        $this->modelProg = new FacultyProgrammeModel();
        $this->modelCampus = new FacultyCampusModel();
        $this->modelCourse = new FacultyCourseModel();
        $this->modelCurr = new FacultyCurriculumModel();
        $this->modelMinEntry = new FacultyMinEntryModel();
        $this->modelDpFaculty = new DpFacultiesModel();
        $this->modelDpLoS = new DpLoSModel();

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
        $rowFaculties = $this->modelDpFaculty->retrieveAll();

        $this->view->rowCampus = $rowCampus;
        $this->view->rowCourse = $rowCourse;
        $this->view->rowCurriculum = $rowCurriculum;
        $this->view->rowMinEntry = $rowMinEntry;
        $this->view->rowFaculties = $rowFaculties;

        $this->view->render('FacultyAddProgrammeView');
    }

    function insertDatabase() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $programmecode = strtoupper($_POST["programmecode"]);
            $description = $_POST["description"];
            $duration = $_POST["duration"];
            $courseIsset = isset($_POST['CourseChk']);
            $campusIsset = isset($_POST['CampusChk']);
            $minEntryIsset = isset($_POST['MinEntryChk']);
            $values = $request->$_POST['CourseChk'];

            $errorMessage = "";
            $contextProgCode = new Validator(new ValidationProgCode());
            $errorMessage = $contextProgCode->executeValidatorStrategy($programmecode);

            $contextDesc = new Validator(new ValidationDesc());
            $errorMessage .= $contextDesc->executeValidatorStrategy($description);

            $contextIsset1 = new Validator(new ValidationCourseChk());
            $errorMessage .= $contextIsset1->executeValidatorStrategy($values);
            
            $contextIsset1 = new Validator(new ValidationCourseChk());
            $errorMessage .= $contextIsset1->executeValidatorStrategy($courseIsset);

            $contextIsset2 = new Validator(new ValidationCampusChk());
            $errorMessage .= $contextIsset2->executeValidatorStrategy($campusIsset);

            $contextIsset3 = new Validator(new ValidationMinEntryChk());
            $errorMessage .= $contextIsset3->executeValidatorStrategy($minEntryIsset);

            if (empty($errorMessage)) {
                if ($password == $comfirmedpassword) {
                    $firstCode = $programmecode[0];
                    $levelofstudyid = "";
                    $rowLvlOfStudy = $this->modelDpLoS->retrieveAll();
                    switch ($firstCode) {
                        case "F":
                            foreach ($rowLvlOfStudy as $lvlOfStudy) {
                                if (strtoupper($lvlOfStudy->type) == strtoupper("Foundation")) {
                                    $levelofstudyid = $lvlOfStudy->levelofstudyid;
                                }
                            }
                            break;
                        case "D":
                            foreach ($rowLvlOfStudy as $lvlOfStudy) {
                                if (strtoupper($lvlOfStudy->type) == strtoupper("Diploma")) {
                                    $levelofstudyid = $lvlOfStudy->levelofstudyid;
                                }
                            }
                            break;
                        case "R":
                            foreach ($rowLvlOfStudy as $lvlOfStudy) {
                                if (strtoupper($lvlOfStudy->type) == strtoupper("Degree")) {
                                    $levelofstudyid = $lvlOfStudy->levelofstudyid;
                                }
                            }
                            break;
                        case "M":
                            foreach ($rowLvlOfStudy as $lvlOfStudy) {
                                if (strtoupper($lvlOfStudy->type) == strtoupper("Master")) {
                                    $levelofstudyid = $lvlOfStudy->levelofstudyid;
                                }
                            }
                            break;
                    }
                    $facultyid = $_POST["faculty"];

                    $credithr = 0;
                    if (isset($_POST['CourseChk'])) {
                        foreach ($_POST['CourseChk'] as $courseid) {
                            $rows = $this->modelCourse->retrievedByID($courseid);
                            foreach ($rows as $row) {
                                $value = $row->credithour;
                            }
                            $credithr = (int) $credithr + (int) $value;
                        }
                    }

                    $client = new nusoap_client("http://localhost/MVC/SOAPcalcFee/service.php?wsdl");
                    $fee = $client->call('calcTotalAmount', array("credithr" => $credithr, "duration" => $duration));
                    $yearly = $client->call('calcYearlyAmount', array("credithr" => $credithr, "duration" => $duration));

                    $this->modelProg->insert($programmecode, $description, $duration, $levelofstudyid, $facultyid, $fee, $yearly);
                    $rowProgramme = $this->modelProg->retrieveAllProgramme();
                    $programmeid = count($rowProgramme);

                    if (isset($_POST['CourseChk'])) {
                        foreach ($_POST['CourseChk'] as $courses) {
                            $courseid = $courses;
                            $this->modelStruct->insert($programmeid, $courseid);
                        }
                    }

                    if (isset($_POST['CampusChk'])) {
                        foreach ($_POST['CampusChk'] as $campuses) {
                            $campusid = $campuses;
                            $this->modelProgCampus->insert($programmeid, $campusid);
                        }
                    }

                    if (isset($_POST['MinEntryChk'])) {
                        foreach ($_POST['MinEntryChk'] as $minEntries) {
                            $minentryid = $minEntries;
                            $this->modelProgMinEntry->insert($programmeid, $minentryid);
                        }
                    }

                    if (isset($_POST['CurriculumChk'])) {
                        foreach ($_POST['CurriculumChk'] as $curriculum) {
                            $curriculumid = $curriculum;
                            $this->modelProgCurr->insert($programmeid, $curriculumid);
                        }
                    }

                    echo "<script>alert(\"Successfully Added\"); window.location.href=\"http://localhost/MVC/FacultyAddProgrammeController\";</script>";
                } else {
                    echo "<script>alert(\"Unsuccessfully Add!\"); window.location.href=\"http://localhost/MVC/FacultyAddProgrammeController\";</script>";
                }
            } else {
                echo "<script>alert(\"$errorMessage\"); window.location.href=\"http://localhost/MVC/FacultyAddProgrammeController\";</script>";
            }
        }
    }

}
