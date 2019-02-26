<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of engineeringmanagement_home
 *
 * @author JOHNY
 */
class Engineeringmanagement_home extends CI_Controller {
    //put your code here
        public function __construct()
        {
                parent::__construct();
                $_SESSION['user']= null;

        }

        public function index()
        {
            if(is_null($_SESSION['user'])){
                //$this->login();
                $this->home();
            } else {
                $this->home();
            }
                
        }
        
        private function home(){
            $dataheader["scss"] = "engineeringmanagement_home";
            $dataheader['main'] = "engineeringmanagement_main";
            $dataheader["activemenu"] = "app";
            $datafooter["mediaboxhover"] = 1;
            $this->load->view("templates/engineeringmanagement_mainheader", $dataheader);
            $this->load->view("pages/engineeringmanagement_home");
            $this->load->view("templates/engineeringmanagement_mainfooter", $datafooter);
        }
}
