<?php
/*Author: Low Ee Hui (18WMR08374) RSD3G2*/

require 'AdapterDP/LoSAdapter.php';

class DpAddLoSCtrl extends Controller {

    private $model;

    function __construct() {
        $this->model = new LoSAdapter(new DpLoSModel());
        parent::__construct();
        session_start();
        if (!isset($_SESSION['role'])) {
            echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $rows = $this->model->getWithID("type", $type = $_POST["type"]);
            foreach ($rows as $row) {
                $Exist = $row->type;
            }
            if (!empty($Exist)) {
                echo "<script>alert(\"Existing Type\"); window.location.href=\"DpAddLoSCtrl\";</script>";
            } else {
                $type = $_POST["type"];

                $this->model->add($type);
                echo "<script>alert(\"Successfully Added\"); window.location.href=\"DpAddLoSCtrl\";</script>";
            }
        } else
            $this->view->render('DpAddLoSView');
    }

}
