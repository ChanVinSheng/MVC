<?php
/*Author: Low Ee Hui (18WMR08374) RSD3G2*/

require 'AdapterDP/FAidAdapter.php';

class DpAddFAidCtrl extends Controller {

    private $model;

    function __construct() {
        $this->model = new FAidAdapter(new DpFAidModel());
        parent::__construct();
        session_start();
        if (!isset($_SESSION['role'])) {
            echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $rows = $this->model->getWithID("financialaidname" ,$financialaidname = $_POST["financialaidname"]);
            foreach ($rows as $row) {
                $Exist = $row->financialaidname;
            }
            if (!empty($Exist)) {
                echo "<script>alert(\"Existing Name\"); window.location.href=\"DpAddFAidCtrl\";</script>";
            } else {
                $financialaidname = $_POST["financialaidname"];
                $description = $_POST["description"];

                $picture = $_FILES["picture"]["name"];
                $allowed = array('gif', 'png', 'jpg', 'jpeg');
                $ext = pathinfo($picture, PATHINFO_EXTENSION);
                if (!in_array($ext, $allowed)) {
                    echo "<script>alert(\"Invalid File Format\"); window.location.href=\"DpAddFAidCtrl\";</script>";
                } else {
                    $this->model->add($financialaidname, $description, $picture);
                    move_uploaded_file($_FILES["picture"]["tmp_name"], "picture/$picture");

                    echo "<script>alert(\"Successfully Added\"); window.location.href=\"DpAddFAidCtrl\";</script>";
                }
            }
        } else
            $this->view->render('DpAddFAidView');
    }

}
