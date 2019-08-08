<?php
/*Author: Low Ee Hui (18WMR08374) RSD3G2*/

require_once 'Models/DynamicXML.php';
require_once 'Models/XmlParserFaculties.php';
require_once 'Models/XmlParserAccmd.php';
require_once 'Models/XmlParserFAid.php';
require_once 'Models/XmlParserFAidInfo.php';
require_once 'Models/XmlParserLoS.php';

class DpHomeCtrl extends Controller {

    function __construct() {
        parent::__construct();
        session_start();
        if (!isset($_SESSION['role'])) {
            echo "<script>alert(\"Access Denied.\"); window.location.href=\"login\";</script>";
        }
    }

    function index() {
        $FacultiesXML = new DynamicXML("faculties");
        $FacultiesXML->dbtoxml("faculties", "faculties.xml");
        $XmlParserFaculties = new XmlParserFaculties("Xml/faculties.xml");
        $proc = new XsltProcessor;
        $proc->importStylesheet(DOMDocument::load("Xls/faculties.xsl")); //load XSL script
        $proc->transformToXML(DOMDocument::load("Xml/faculties.xml"));
        $this->view->xml = $proc->transformToXML(DOMDocument::load("Xml/faculties.xml"));


        $AccmdXML = new DynamicXML("accomodation");
        $AccmdXML->dbtoxml("accomodation", "accomodation.xml");
        $XmlParserAccmd = new XmlParserAccmd("Xml/accomodation.xml");

        $FAidInfoXML = new DynamicXML("aidinformation");
        $FAidInfoXML->dbtoxml("aidinformation", "aidinformation.xml");
        $XmlParserFAidInfo = new XmlParserFAidInfo("Xml/aidinformation.xml");

        $FAidXML = new DynamicXML("financialaid");
        $FAidXML->dbtoxml("financialaid", "financialaid.xml");
        $XmlParserFAid = new XmlParserFAid("Xml/financialaid.xml");

        $LoSXML = new DynamicXML("levelofstudy");
        $LoSXML->dbtoxml("levelofstudy", "levelofstudy.xml");
        $XmlParserLoS = new XmlParserLoS("Xml/levelofstudy.xml");


        $this->view->facultiesXml = $XmlParserFaculties->xmlParser();
        $this->view->AccmdXml = $XmlParserAccmd->xmlParser();
        $this->view->LoSXml = $XmlParserLoS->xmlParser();
        $this->view->FAidXml = $XmlParserFAid->xmlParser();
        $this->view->FAidInfoXml = $XmlParserFAidInfo->xmlParser();
        $this->view->render('DpHomeView');
    }

}
