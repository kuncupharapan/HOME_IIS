<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of engineeringmanagement_projects
 *
 * @author JOHNY
 */
class Engineeringmanagement_projects extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $_SESSION['user'] = null;
    }

    public function all_projects() {
        $dataheader['scss'] = "personal_page";
        $dataheader['main'] = "main";
        $dataheader['activemenu'] = "app";
        $data = "";
        $this->load->view("templates/mainheader", $dataheader);

        $this->load->view("pages/personal_page");
        $this->load->view("templates/mainfooter");
    }

    public function project_info($project = null) {
        if (is_null($project)) {
            show_error("Maaf, Halaman yang anda inginkan tidak tersedia", 1, $heading = 'Terjadi Galat');
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
            $this->load->view("pages/engineeringmanagement_project_info", $databody);
            $this->load->view("templates/engineeringmanagement_mainfooter", $datafooter);
        }
    }

    public function project_org_chart($project = null) {
        if (is_null($project)) {
            show_error("Maaf, Halaman yang anda inginkan tidak tersedia", 1, $heading = 'An Error Was Encountered');
            echo("halaman yang anda inginkan tidak tersedia");
        } else {
            $dataheader["scss"] = "engineeringmanagement_projects";
            $dataheader['main'] = "engineeringmanagement_main";
            $dataheader["activemenu"] = "app";
            $dataheader["treantmaster"]= "1";
            $databody["project"] = array("name" => "Rancang Bangun Kapal Selam Mini", "abbr" => "KSM");
            $datafooter["mediaboxhover"] = 0;
            $this->load->view("templates/engineeringmanagement_mainheader", $dataheader);
            $this->load->view("pages/engineeringmanagement_project_org_chart", $databody);
            $this->load->view("templates/engineeringmanagement_mainfooter", $datafooter);
        }
    }

}
