<?php

require_once 'Models/FacultyCreateXMLfile.php';
require_once 'Models/programmeSAXParser.php';
require_once 'Models/FacultyProgrammeModel.php';
require_once 'Models/FacultyCampusModel.php';
require_once 'Models/FacultyCourseModel.php';
require_once 'Models/FacultyCurriculumModel.php';
require_once 'Models/FacultyMinEntryModel.php';
require_once 'Models/DpFacultiesModel.php';
require_once 'Models/DpLoSModel.php';

require_once 'Models/FacultyProgCampusModel.php';
require_once 'Models/FacultyProgCurriculumModel.php';
require_once 'Models/FacultyProgMinEntryModel.php';
require_once 'Models/FacultyProgStructureModel.php';

class FacultyViewProgrammeController extends Controller {

    function __construct() {
        $this->modelProg = new FacultyProgrammeModel();
        $this->modelCampus = new FacultyCampusModel();
        $this->modelCourse = new FacultyCourseModel();
        $this->modelCurr = new FacultyCurriculumModel();
        $this->modelMinEntry = new FacultyMinEntryModel();
        $this->modelDpFaculty = new DpFacultiesModel();
        $this->modelProgCampus = new FacultyProgCampusModel();
        $this->modelProgCurr = new FacultyProgCurriculumModel();
        $this->modelProgMinEntry = new FacultyProgMinEntryModel();
        $this->modelStruct = new FacultyProgStructureModel();
        $this->modelDpFaculty = new DpFacultiesModel();
        $this->modelDpLoS = new DpLoSModel();
        
        parent::__construct();
        session_start();
        if (!isset($_SESSION['role'])) {
            echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {
        $programmeXml = new FacultyCreateXMLfile("programme");
        $saxp = new programmeSAXParser("programme");
        $programmedata = $saxp->getData();
        
        $rowFaculties = $this->modelDpFaculty->retrieveAll();
        $rowLvlOfStudy = $this->modelDpLoS->retrieveAll();

        $output = "<table class='table'>";
        $output .= "<thead>";
        $output .= "<tr bgcolor='#E6E6FA'>";
        $output .= "<th>Programme Code</th>";
        $output .= "<th>Description</th>";
        $output .= "<th>Duration of Study</th>";
        $output .= "<th>Level of Study</th>";
        $output .= "<th>Faculty</th>";
        $output .= "<th>Estimated Total Fees(RM)</th>";
        $output .= "<th>Fees Per Year(RM)</th>";
        $output .= "<th>Status</th>";
        $output .= "<th>Action</th>";
        $output .= "</tr>";
        $output .= '</thead>';
        $output .= "<tbody>";
        foreach ($programmedata as $programmes) {
            $output .= "<tr>";
            $output .= "<td>" . $programmes['PROGRAMMECODE'] . "</td>";
            $output .= "<td>" . $programmes['DESCRIPTION'] . "</td>";
            $output .= "<td>" . $programmes['DURATION'] . "</td>";
            foreach ($rowLvlOfStudy as $lvlOfStudy) {
                if (strtoupper($lvlOfStudy->levelofstudyid) == strtoupper($programmes['LEVELOFSTUDYID']))
                    $output .= "<td>" . $lvlOfStudy->type . "</td>";
            }
            foreach ($rowFaculties as $faculties) {
                if (strtoupper($faculties->facultyid) == strtoupper($programmes['FACULTYID']))
                    $output .= "<td>" . $faculties->facultyname . "</td>";
            }
            $output .= "<td>" . $programmes['FEE'] . "</td>";
            $output .= "<td>" . $programmes['YEARLYFEE'] . "</td>";
            $output .= "<td>" . $programmes['STATUS'] . "</td>";
            $output .= "<form action='FacultyViewProgrammeController/modify' method='post' >";
            $output .= "<td><button class='btn btn-info' type='submit' value='" . $programmes['PROGRAMMECODE'] . "' name='edit'>Edit</button></td>";
            $output .= "</form>";
            $output .= "</tr>";
            $output .= "<tbody>";
        }

        $output .= "</table>";
        $this->view->programmeXml = $output;
        $this->view->render('FacultyViewProgrammeView');
    }

    function modify() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["edit"])) {
                $programmecode = $_POST["edit"];
                
                $row = $this->modelProg->retrievedByCode($programmecode);
                $rowCampus = $this->modelCampus->retrieveAllCampus();
                $rowCourse = $this->modelCourse->retrieveAllCourse();
                $rowCurriculum = $this->modelCurr->retrieveAllCurriculum();
                $rowMinEntry = $this->modelMinEntry->retrieveAllMinEntry();
                $rowFaculties = $this->modelDpFaculty->retrieveAll();
                $rowPCampus = $this->modelProgCampus->retrieveAllProgrammeCampus();
                $rowPCurr = $this->modelProgCurr->retrieveAllProgrammeCurriculum();
                $rowPMinEntry = $this->modelProgMinEntry->retrieveAllProgrammeMinEntry();
                $rowPStruc = $this->modelStruct->retrieveAllProgrammeStructure();

                $this->view->row = $row;
                $this->view->rowCampus = $rowCampus;
                $this->view->rowCourse = $rowCourse;
                $this->view->rowCurriculum = $rowCurriculum;
                $this->view->rowMinEntry = $rowMinEntry;
                $this->view->rowFc = $rowFaculties;
                $this->view->rowPCampus = $rowPCampus;
                $this->view->rowPCurr = $rowPCurr;
                $this->view->rowPMinEntry = $rowPMinEntry;
                $this->view->rowPStruc = $rowPStruc;
                $this->view->render('FacultyModifyProgrammeView');
            } else {
                echo "<script>alert(\"Error returning\"); window.location.href=\"http://localhost/MVC/FacultyViewProgrammeController\";</script>";
            }
        }
    }

    function edit() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["done"])) {
                $programmeid = $_POST["done"];
                $programmecode = $_POST["programmecode"];
                $description = $_POST["description"];
                $duration = $_POST["duration"];
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
                $fee = 0;
                $yearly = 0;
                $this->modelProg->updateAll($programmeid, $programmecode, $description, $duration, $levelofstudyid, $facultyid, $fee, $yearly);
                
                $this->modelProgCampus->delete($programmeid);
                $this->modelProgCurr->delete($programmeid);
                $this->modelProgMinEntry->delete($programmeid);
                $this->modelStruct->delete($programmeid);

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

                echo "<script>alert(\"Successfully Modify\"); window.location.href=\"http://localhost/MVC/FacultyViewProgrammeController\";</script>";
            } elseif (isset($_POST["cancel"])) {
                echo "<script>window.location.href=\"http://localhost/MVC/FacultyViewProgrammeController\";</script>";
            } elseif (isset($_POST["activate"])) {
                $programmeid = $_POST["activate"];
                $status = "active";
                $column = "status";
                $this->modelProg->updateOne($programmeid, $status, $column);
                echo "<script>alert(\"Successfully Activate\"); window.location.href=\"http://localhost/MVC/FacultyViewProgrammeController\";</script>";
            } elseif (isset($_POST["deactivate"])) {
                $programmeid = $_POST["deactivate"];
                $status = "inactive";
                $column = "status";
                $this->modelProg->updateOne($programmeid, $status, $column);
                echo "<script>alert(\"Successfully Deactivate\"); window.location.href=\"http://localhost/MVC/FacultyViewProgrammeController\";</script>";
            } else {
                echo "<script>alert(\"Unsuccessfully Modify\"); window.location.href=\"http://localhost/MVC/FacultyViewProgrammeController\";</script>";
            }
        } else {
            echo "<script>alert(\"Error returning\"); window.location.href=\"http://localhost/MVC/FacultyViewProgrammeController\";</script>";
        }
    }

}
