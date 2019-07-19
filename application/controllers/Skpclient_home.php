<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Skpclient_home
 *
 * @author JOHNY
 */
class Skpclient_home extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $_SESSION['user'] = 1;
    }

    public function index() {
        if (is_null($_SESSION['user'])) {
            //$this->login();
            $this->home();
        } else {
            $this->home();
        }
    }

    public function project_milestones($projectid = null) {
        if (is_null($_SESSION['user'])) {
            $this->err_message(1);
        } else {
            if (is_null($projectid)) {
                $this->err_message(2);
            } else {
                $this->load->model("skpclient");
                if ($this->skpclient->get_project_milestone($_SESSION['user'], $projectid)) {
                    $dataheader["scss"] = "skpclient_home";
                    $dataheader['main'] = "skpclient_main";
                    $dataheader["activemenu"] = "app";
                    $databody['project'] = array('name' => 'kapal selam mini');
                    $datafooter['mediaboxhover'] = 1;
                    if (count($this->skpclient->milestones) > 0) {
                        $databody['milestones'] = $this->skpclient->milestones;
                        $this->load->view("templates/skpclient_mainheader", $dataheader);
                        $this->load->view("pages/skpclient_milestones", $databody);
                        $this->load->view("templates/skpclient_mainfooter", $datafooter);
                    } else {
                        echo 'Belum ada milestone';
                    }
                } else {
                    $this->err_message(3);
                }
            }
        }
    }

    public function home() {
        if (is_null($_SESSION['user'])) {
            $this->err_message(1);
        } else {
            $this->load->model("skpclient");
            $dataheader["scss"] = "skpclient_home";
            $dataheader['main'] = "skpclient_main";
            $dataheader["activemenu"] = "app";
            $datafooter['mediaboxhover'] = 1;
            if ($this->skpclient->get_projects($_SESSION['user'])) {
                $this->load->view("templates/skpclient_mainheader", $dataheader);
                $this->load->view("pages/skpclient_home");
                $this->load->view("templates/skpclient_mainfooter", $datafooter);
            } else {
                $this->err_message(3);
            }
        }
    }

    public function team_list($projectid = null) {
        if (is_null($_SESSION['user'])) {
            $this->err_message(1);
        } else {
            if (is_null($projectid)) {
                $this->err_message(2);
            } else {
                $this->load->model("skpclient");
                if ($this->skpclient->get_active_project_org($_SESSION['user'], $projectid)) {
                    
                    if(count($this->skpclient->proorgs)>0){
                        $databody['activeproject'] = $this->skpclient->proorgs;
                        if($this->skpclient->get_project_team($_SESSION['user'], $this->skpclient->proorgs[0]['engprojectorganizationid'])){
                            if(count($this->skpclient->proteam)>0){
                                $databody['employment'] = $this->skpclient->proteam;
                            } else {
                                $databody['errmesg'] = "Belum ada struktur organisasi dalam project ini";
                            }
                        } 
                    } else {
                        $databody['errmesg'] = "Belum ada organisasi pada project ini";
                    }
                    $dataheader["scss"] = "skpclient_home";
                    $dataheader['main'] = "skpclient_main";
                    $dataheader["activemenu"] = "app";
                    $databody['project'] = array('name' => 'kapal selam mini');
                    $datafooter['mediaboxhover'] = 1;
                    
                    //$databody['team'] = $this->skpclient->team;
                    $this->load->view("templates/skpclient_mainheader", $dataheader);
                    $this->load->view("pages/skpclient_team", $databody);
                    $this->load->view("templates/skpclient_mainfooter", $datafooter);
                } else {
                    $this->err_message(3);
                }
            }
        }
    }

    public function err_message($errCode = null) {
        if ($errCode == 1) {
            show_error("Sesi anda telah habis, Silahkan melakukan login terlebih dahulu", 1, $heading = 'Terjadi Galat');
        } else if ($errCode == 2) {
            show_error("Halaman tidak tersedia, URL yang anda gunakan tidak valid", 1, $heading = 'Terjadi Galat');
        } else if ($errCode == 3) {
            show_error("Permintaan anda tidak dapat diproses, silahkan hubungi administrator", 1, $heading = 'Terjadi Galat');
        }
    }

}
