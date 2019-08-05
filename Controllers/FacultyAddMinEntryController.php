<?php

require 'Models/FacultyMinEntryModel.php';

require_once 'DecoratorMinEntry/ConcreteFoundation.php';
require_once 'DecoratorMinEntry/ConcreteDiploma.php';
require_once 'DecoratorMinEntry/ConcreteDegree.php';
require_once 'DecoratorMinEntry/ConcreteMaster.php';

require_once 'DecoratorMinEntry/SPM.php';
require_once 'DecoratorMinEntry/STPM.php';
require_once 'DecoratorMinEntry/ALevel.php';
require_once 'DecoratorMinEntry/OLevel.php';
require_once 'DecoratorMinEntry/Degree.php';
require_once 'DecoratorMinEntry/UEC.php';

require_once 'DecoratorMinEntry/GradeOne.php';
require_once 'DecoratorMinEntry/GradeTwo.php';
require_once 'DecoratorMinEntry/GradeThree.php';
require_once 'DecoratorMinEntry/GradeA.php';
require_once 'DecoratorMinEntry/GradeB.php';
require_once 'DecoratorMinEntry/CGPA25.php';
require_once 'DecoratorMinEntry/CGPA30.php';

require_once 'DecoratorMinEntry/Credit.php';
require_once 'DecoratorMinEntry/Grade.php';
require_once 'DecoratorMinEntry/in.php';

require_once 'DecoratorMinEntry/RelevantSubject.php';
require_once 'DecoratorMinEntry/English.php';
require_once 'DecoratorMinEntry/Malay.php';
require_once 'DecoratorMinEntry/Maths.php';

require_once 'StrategyValidation/Validator.php';
require_once 'StrategyValidation/ValidationMinEntry.php';

class FacultyAddMinEntryController extends Controller {

    private $model;

    function __construct() {
        $this->model = new FacultyMinEntryModel();
        parent::__construct();
        session_start();
        if (!isset($_SESSION['role'])) {
            echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {

        $this->view->render('FacultyAddMinEntryView');
    }

    function insert() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $level = $_POST['level'];
            $topic = $_POST['topic'];
            $requirement = $_POST['requirement'];
            $subject = $_POST['subject'];
            $category = $_POST['category'];
            
            if ($level == "Foundation") {
                $lvlChoice = new ConcreteFoundation();
            } elseif ($level == "Diploma") {
                $lvlChoice = new ConcreteDiploma();
            } elseif ($level == "Degree") {
                $lvlChoice = new ConcreteDegree();
            } elseif ($level == "Master") {
                $lvlChoice = new ConcreteMaster();
            }

            if ($topic == "SPM") {
                $decorator1 = new SPM($lvlChoice);
            } elseif ($topic == "O Level") {
                $decorator1 = new OLevel($lvlChoice);
            } elseif ($topic == "UEC") {
                $decorator1 = new UEC($lvlChoice);
            } elseif ($topic == "STPM") {
                $decorator1 = new STPM($lvlChoice);
            } elseif ($topic == "A Level") {
                $decorator1 = new ALevel($lvlChoice);
            } elseif ($topic == "Bachelor's Degree") {
                $decorator1 = new Degree($lvlChoice);
            }

            if ($requirement == "1") {
                $decorator1 = new GradeOne($decorator1);
            } elseif ($requirement == "2") {
                $decorator1 = new GradeTwo($decorator1);
            } elseif ($requirement == "3") {
                $decorator1 = new GradeThree($decorator1);
            } elseif ($requirement == "Grade A") {
                $decorator1 = new GradeA($decorator1);
            } elseif ($requirement == "Grade B") {
                $decorator1 = new GradeB($decorator1);
            } elseif ($requirement == "CGPA 2.5") {
                $decorator1 = new CGPA25($decorator1);
            } elseif ($requirement == "CGPA 3.0") {
                $decorator1 = new CGPA30($decorator1);
            }

            if ($category == "Credit in") {
                $decorator1 = new Credit($decorator1);
            } elseif ($category == "Grade in") {
                $decorator1 = new Grade($decorator1);
            } elseif ($category == "in") {
                $decorator1 = new in($decorator1);
            }

            if ($subject == "Relevant Subjects") {
                $decorator1 = new RelevantSubject($decorator1);
            } elseif ($subject == "English") {
                $decorator1 = new English($decorator1);
            } elseif ($subject == "Malay") {
                $decorator1 = new Malay($decorator1);
            } elseif ($subject == "Mathematics") {
                $decorator1 = new Maths($decorator1);
            }
            
            $errorMessage = "";
            $contextMinEntry = new Validator(new ValidationMinEntry());
            $errorMessage = $contextMinEntry->executeValidatorStrategy($decorator1->getContent());

            if (empty($errorMessage)) {
                $this->model->insert($decorator1->getContent());
            }else{
                echo "<script>alert(\"$errorMessage\"); window.location.href=\"http://localhost/MVC/FacultyAddMinEntryController\";</script>";
            }
            
             echo "<script>alert(\"Successful Add.\"); window.location.href=\"http://localhost/MVC/FacultyAddMinEntryController\";</script>";
        }
    }

}
