<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of main_page
 *
 * @author JOHNY
 */
class Main_page extends CI_Controller {
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
        
        private function login(){
            $data['path'] = APPPATH;
            $this->load->view("pages/login", $data);
        }
        
        private function home(){
            $dataheader["scss"] = "home";
            $dataheader['main'] = "main";
            $dataheader["activemenu"] = "home";
            $this->load->view("templates/mainheader", $dataheader);
            $this->load->view("pages/home");
            $this->load->view("templates/mainfooter");
        }
}
