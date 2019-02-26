<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of engineeringmanagement_project_assignment
 *
 * @author JOHNY
 */
class Engineeringmanagement_project_assignment extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $_SESSION['user'] = null;
    }

    public function browse($position = NULL) {
        if ($position == NULL) {
            show_error("Maaf, Halaman yang anda inginkan tidak tersedia", 1, $heading = 'An Error Was Encountered');
            echo("halaman yang anda inginkan tidak tersedia");
        } else {
            $dataheader["scss"] = "engineeringmanagement_projects";
            $dataheader['main'] = "engineeringmanagement_main";
            $dataheader["activemenu"] = "app";
            $databody["project"] = array("name" => "Rancang Bangun Kapal Selam Mini", "abbr" => "KSM");
            $datafooter["mediaboxhover"] = 0;
            $datafooter["leftmenu"] = "project";
            $datafooter["projectheader"] = "schedule";
            $this->load->view("templates/engineeringmanagement_mainheader", $dataheader);
            $this->load->view("pages/engineeringmanagement_project_assignment_browse", $databody);
            $this->load->view("templates/engineeringmanagement_mainfooter", $datafooter);
        }        
    }

    public function add($position = NULL) {
        if ($position == NULL) {
            show_error("Maaf, Halaman yang anda inginkan tidak tersedia", 1, $heading = 'An Error Was Encountered');
            echo("halaman yang anda inginkan tidak tersedia");
        } else {
            $dataheader["scss"] = "engineeringmanagement_projects";
            $dataheader['main'] = "engineeringmanagement_main";
            $dataheader["activemenu"] = "app";
            $dataheader["wordeditor"] = 1;
            $dataheader["datepicker"] = 1;
            $databody["project"] = array("name" => "Rancang Bangun Kapal Selam Mini", "abbr" => "KSM");
            $datafooter["mediaboxhover"] = 0;
            $datafooter["leftmenu"] = "project";
            $datafooter["projectheader"] = "schedule";
            $datafooter["wordeditor"] = 1;
            $datafooter["datepicker"] = 1;
            $this->load->view("templates/engineeringmanagement_mainheader", $dataheader);
            $this->load->view("pages/engineeringmanagement_project_assignment_add", $databody);
            $this->load->view("templates/engineeringmanagement_mainfooter", $datafooter);
        }
    }

    public function edit_assignment($position = NULL) {
        if ($position == NULL) {
            show_error("Maaf, Halaman yang anda inginkan tidak tersedia", 1, $heading = 'An Error Was Encountered');
            echo("halaman yang anda inginkan tidak tersedia");
        } else {
            $dataheader["scss"] = "engineeringmanagement_projects";
            $dataheader['main'] = "engineeringmanagement_main";
            $dataheader["activemenu"] = "app";
            $databody["project"] = array("name" => "Rancang Bangun Kapal Selam Mini", "abbr" => "KSM");
            $datafooter["mediaboxhover"] = 0;
            $this->load->view("templates/engineeringmanagement_mainheader", $dataheader);
            $this->load->view("pages/engineeringmanagement_project_info", $databody);
            $this->load->view("templates/engineeringmanagement_mainfooter", $datafooter);
        }        
    }

    public function delete_assignment($position = NULL) {
        if ($position == NULL) {
            show_error("Maaf, Halaman yang anda inginkan tidak tersedia", 1, $heading = 'An Error Was Encountered');
            echo("halaman yang anda inginkan tidak tersedia");
        } else {
            $dataheader["scss"] = "engineeringmanagement_projects";
            $dataheader['main'] = "engineeringmanagement_main";
            $dataheader["activemenu"] = "app";
            $databody["project"] = array("name" => "Rancang Bangun Kapal Selam Mini", "abbr" => "KSM");
            $datafooter["mediaboxhover"] = 0;
            $this->load->view("templates/engineeringmanagement_mainheader", $dataheader);
            $this->load->view("pages/engineeringmanagement_project_info", $databody);
            $this->load->view("templates/engineeringmanagement_mainfooter", $datafooter);
        }        
    }

}
