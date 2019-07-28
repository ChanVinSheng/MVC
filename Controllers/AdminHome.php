<?php

require_once 'Models/XmlGenerate.php';
require_once 'Models/userSAXParser.php';

class AdminHome extends Controller {

    function __construct() {
        parent::__construct();
        session_start();
        if (!isset($_SESSION['role'])) {
            echo "<script>alert(\"Access Denie.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {

        $xml = new XmlGenerate("user");
        if (isset($_POST["Admin"])) {

            $xml->databaseToXmlWithSlt("user", "user.xml", "userAdmin");
            $proc = new XsltProcessor;
            $proc->importStylesheet(DOMDocument::load("Xls/userAdmin.xsl")); //load XSL script
            $proc->transformToXML(DOMDocument::load("Xml/user.xml"));
            $this->view->xml = $proc->transformToXML(DOMDocument::load("Xml/user.xml"));
        } else {
            $xml->databaseToXml("user", "user.xml");
            $sax = new userSAXParser("user");
            $userdata = $sax->getData();

            $output = "<h3>All Staff</h3>";
            $output .= "<hr />";
            $output .= '<table border="1">';
            $output .= '<tr bgcolor="#9acd32">';
            $output .= "<th>User ID</th>";
            $output .= "<th>User Name</th>";
            $output .= "<th>Password</th>";
            $output .= "<th>Email</th>";
            $output .= "<th>Role</th>";
            $output .= "</tr>";
            foreach ($userdata as $user) {
                $output .= "<tr>";
                $output .= "<td>" . $user['USERID'] . "</td>";
                $output .= "<td>" . $user['USERNAME'] . "</td>";
                $output .= "<td>" . $user['PASSWORD'] . "</td>";
                $output .= "<td>" . $user['EMAIL'] . "</td>";
                $output .= "<td>" . $user['ROLE'] . "</td>";
                $output .= "</tr>";
            }
            $output .= "</table>";
            $this->view->xml = $output;
        }


        $this->view->render('AdminHome');
    }

}
