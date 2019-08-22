<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Personal_page extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $_SESSION['user'] = null;
    }

    public function index($page = null) {
        if (is_null($page)) {
            $this->landing();
        }
    }

    private function landing() {
        $dataheader['scss'] = "personal_page";
        $dataheader['main'] = "main";
        $dataheader['activemenu'] = "pp";
        $data = "";
        $this->load->view("templates/mainheader", $dataheader);
        $this->load->view("pages/personal_page");
        $this->load->view("templates/mainfooter");
    }

}
