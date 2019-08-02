<?php

require_once 'Models/FacultyCreateXMLfile.php';

class FacultyViewProgrammeController extends Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $test = new FacultyCreateXMLfile();
    }

}
