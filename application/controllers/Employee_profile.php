<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Employee_profile extends CI_Controller {

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
        $dataheader['scss'] = "employee_profile";
        $dataheader['main'] = "main";
        $dataheader["activemenu"] = "pp";
        $data = "";
        $this->load->view("templates/mainheader", $dataheader);
        $this->load->view("pages/employee_profile");
        $this->load->view("templates/mainfooter");
    }

}
