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
        $_SESSION['user'] = null;
    }

    public function index() {
        if (is_null($_SESSION['user'])) {
            //$this->login();
            $this->home();
        } else {
            $this->home();
        }
    }

    public function home() {
        $dataheader["scss"] = "skpclient_home";
        $dataheader['main'] = "skpclient_main";
        $dataheader["activemenu"] = "app";
        $this->load->view("templates/skpclient_mainheader", $dataheader);
        $this->load->view("pages/skpclient_home");
        $this->load->view("templates/skpclient_mainfooter", $datafooter);
    }

}
