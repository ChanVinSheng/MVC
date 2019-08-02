<?php

require 'Models/FacultyMinEntryModel.php';

require_once 'DecoratorMinEntry/ConcreteSPM.php';
require_once 'DecoratorMinEntry/ConcreteSTPM.php';
require_once 'DecoratorMinEntry/ConcreteALEVEL.php';

require_once 'DecoratorMinEntry/GradeOne.php';
require_once 'DecoratorMinEntry/GradeTwo.php';
require_once 'DecoratorMinEntry/GradeThree.php';

require_once 'DecoratorMinEntry/Credit.php';
require_once 'DecoratorMinEntry/Grade.php';

require_once 'DecoratorMinEntry/RelevantSubject.php';
require_once 'DecoratorMinEntry/English.php';
require_once 'DecoratorMinEntry/Malay.php';

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
            $topic = $_POST['topic'];
            $requirement = $_POST['requirement'];
            $subject = $_POST['subject'];
            $category = $_POST['category'];


            if ($topic == "SPM") {
                $topicChoice = new ConcreteSPM();
            } elseif ($topic == "STPM") {
                $topicChoice = new ConcreteSTPM();
            } elseif ($topic == "A LEVEL") {
                $topicChoice = new ConcreteALEVEL();
            }

            if ($requirement == "1") {
                $decorator1 = new GradeOne($topicChoice);
            } elseif ($requirement == "2") {
                $decorator1 = new GradeTwo($topicChoice);
            } elseif ($requirement == "3") {
                $decorator1 = new GradeThree($topicChoice);
            }

            if ($category == "Credit") {
                $decorator1 = new Credit($decorator1);
            } elseif ($category == "Grade") {
                $decorator1 = new Grade($decorator1);
            }

            if ($subject == "Relevant Subject") {
                $decorator1 = new RelevantSubject($decorator1);
            } elseif ($subject == "English") {
                $decorator1 = new English($decorator1);
            } elseif ($subject == "Malay") {
                $decorator1 = new Malay($decorator1);
            }

            $this->model->insert($decorator1->getContent());
            
             echo "<script>alert(\"Successful Add.\"); window.location.href=\"http://localhost/MVC/FacultyAddMinEntryController\";</script>";
        }
    }

}
