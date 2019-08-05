<?php

require 'Models/StaffActivityModel.php';
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
        if (isset($_SESSION['role'])) {
            if($_SESSION['role'] != "Faculty")
                echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
        else{
            echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {
        $rowFaculties = $this->modelDpFaculty->retrieveAll();

        $this->view->rowFaculties = $rowFaculties;

        $this->view->render('FacultyAddProgrammeView');
    }

    function nextAdd() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $programmecode = strtoupper($_POST["programmecode"]);
            $description = $_POST["description"];
            $duration = $_POST["duration"];
            $facultyid = $_POST["faculty"];

            $errorMessage = "";
            $contextProgCode = new Validator(new ValidationProgCode());
            $errorMessage = $contextProgCode->executeValidatorStrategy($programmecode);

            $contextDesc = new Validator(new ValidationDesc());
            $errorMessage .= $contextDesc->executeValidatorStrategy($description);

            if (empty($errorMessage)) {
                $firstCode = $programmecode[0];
                $levelofstudyid = "";
                $words = "";
                $rowLvlOfStudy = $this->modelDpLoS->retrieveAll();
                switch ($firstCode) {
                    case "F":
                        foreach ($rowLvlOfStudy as $lvlOfStudy) {
                            if (strtoupper($lvlOfStudy->type) == strtoupper("Foundation")) {
                                $levelofstudyid = $lvlOfStudy->levelofstudyid;
                                $words = "Fo";
                            }
                        }
                        break;
                    case "D":
                        foreach ($rowLvlOfStudy as $lvlOfStudy) {
                            if (strtoupper($lvlOfStudy->type) == strtoupper("Diploma")) {
                                $levelofstudyid = $lvlOfStudy->levelofstudyid;
                                $words = "Di";
                            }
                        }
                        break;
                    case "R":
                        foreach ($rowLvlOfStudy as $lvlOfStudy) {
                            if (strtoupper($lvlOfStudy->type) == strtoupper("Degree")) {
                                $levelofstudyid = $lvlOfStudy->levelofstudyid;
                                $words = "De";
                            }
                        }
                        break;
                    case "M":
                        foreach ($rowLvlOfStudy as $lvlOfStudy) {
                            if (strtoupper($lvlOfStudy->type) == strtoupper("Master")) {
                                $levelofstudyid = $lvlOfStudy->levelofstudyid;
                                $words = "Ma";
                            }
                        }
                        break;
                }

                $this->view->tempProgCode = $programmecode;
                $this->view->tempProgDesc = $description;
                $this->view->tempProgDur = $duration;
                $this->view->tempProgLoS = $levelofstudyid;
                $this->view->tempProgWords = $words;
                $this->view->tempProgFac = $facultyid;
                $_SESSION['progCode'] = $programmecode;
                $_SESSION['progDesc'] = $description;
                $_SESSION['progDur'] = $duration;
                $_SESSION['progLoS'] = $levelofstudyid;
                $_SESSION['progWords'] = $words;
                $_SESSION['progFac'] = $facultyid;

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

                $this->view->render('FacultyAddProgrammeView2');
            } else {
                echo "<script>alert(\"$errorMessage\"); window.location.href=\"http://localhost/MVC/FacultyAddProgrammeController\";</script>";
            }
        } elseif (isset($_SESSION['progCode']) && isset($_SESSION['progDesc']) && isset($_SESSION['progDur']) && isset($_SESSION['progLoS']) && isset($_SESSION['progWords']) && isset($_SESSION['progFac'])) {
            $this->view->tempProgCode = $_SESSION['progCode'];
            $this->view->tempProgDesc = $_SESSION['progDesc'];
            $this->view->tempProgDur = $_SESSION['progDur'];
            $this->view->tempProgLoS = $_SESSION['progLoS'];
            $this->view->tempProgWords = $_SESSION['progWords'];
            $this->view->tempProgFac = $_SESSION['progFac'];

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

            $this->view->render('FacultyAddProgrammeView2');
        }
    }

    function insertDatabase() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $programmecode = strtoupper($_POST["programmecode"]);
            $description = $_POST["description"];
            $duration = $_POST["duration"];
            $courseIsset = isset($_POST['CourseChk']);
            $campusIsset = isset($_POST['CampusChk']);
            $minEntryIsset = isset($_POST['MinEntryChk']);

            $errorMessage = "";
            $contextProgCode = new Validator(new ValidationProgCode());
            $errorMessage = $contextProgCode->executeValidatorStrategy($programmecode);

            $contextDesc = new Validator(new ValidationDesc());
            $errorMessage .= $contextDesc->executeValidatorStrategy($description);

            $contextIsset1 = new Validator(new ValidationCourseChk());
            $errorMessage .= $contextIsset1->executeValidatorStrategy($courseIsset);

            $contextIsset2 = new Validator(new ValidationCampusChk());
            $errorMessage .= $contextIsset2->executeValidatorStrategy($campusIsset);

            $contextIsset3 = new Validator(new ValidationMinEntryChk());
            $errorMessage .= $contextIsset3->executeValidatorStrategy($minEntryIsset);

            if (empty($errorMessage)) {
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
                
                $programmecode = dataHandling::HtmlTrimStrips($programmecode);
                $description = dataHandling::HtmlStrips($description);
                $duration = dataHandling::HtmlTrimStrips($duration);
                $levelofstudyid = dataHandling::HtmlTrimStrips($levelofstudyid);
                $facultyid = dataHandling::HtmlTrimStrips($facultyid);
                $fee = dataHandling::HtmlTrimStrips($fee);
                $yearly = dataHandling::HtmlTrimStrips($yearly);

                $this->modelProg->insert($programmecode, $description, $duration, $levelofstudyid, $facultyid, $fee, $yearly);
                $rowProgramme = $this->modelProg->retrieveAllProgramme();
                $programmeid = count($rowProgramme);

                if (isset($_POST['CourseChk'])) {
                    foreach ($_POST['CourseChk'] as $courses) {
                        $courseid = $courses;
                        $courseid = dataHandling::HtmlTrimStrips($courseid);
                        $this->modelStruct->insert($programmeid, $courseid);
                    }
                }

                if (isset($_POST['CampusChk'])) {
                    foreach ($_POST['CampusChk'] as $campuses) {
                        $campusid = $campuses;
                        $campusid = dataHandling::HtmlTrimStrips($campusid);
                        $this->modelProgCampus->insert($programmeid, $campusid);
                    }
                }

                if (isset($_POST['MinEntryChk'])) {
                    foreach ($_POST['MinEntryChk'] as $minEntries) {
                        $minentryid = $minEntries;
                        $minentryid = dataHandling::HtmlTrimStrips($minentryid);
                        $this->modelProgMinEntry->insert($programmeid, $minentryid);
                    }
                }

                if (isset($_POST['CurriculumChk'])) {
                    foreach ($_POST['CurriculumChk'] as $curriculum) {
                        $curriculumid = $curriculum;
                        $curriculumid = dataHandling::HtmlTrimStrips($curriculumid);
                        $this->modelProgCurr->insert($programmeid, $curriculumid);
                    }
                }
                $userlog = new StaffActivityModel();
                $userlog->insert($_SESSION['userid'], $_SESSION['username'], "Add");
                echo "<script>alert(\"Successfully Added\"); window.location.href=\"http://localhost/MVC/FacultyAddProgrammeController\";</script>";
            } else {
                echo "<script>alert(\"$errorMessage\"); window.location.href=\"http://localhost/MVC/FacultyAddProgrammeController/nextAdd\";</script>";
            }
        }
    }

}
