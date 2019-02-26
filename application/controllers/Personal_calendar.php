<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Personal_calendar extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $_SESSION['user'] = null;
    }

    public function index($action = null) {
        if (is_null($action)) {
            $this->view();
        }
    }

    private function view() {
        $dataheader['scss'] = "personal_calendar";
        $dataheader['main'] = "main";
        $dataheader["activemenu"] = "pc";
        $data = "";
        $this->load->view("templates/mainheader", $dataheader);
        $this->load->view("pages/personal_calendar");
        $this->load->view("templates/mainfooter");
    }

}