<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of information_board
 *
 * @author JOHNY
 */
class information_board extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function index($tab = null) {
        if (is_null($tab)) {
            $this->agenda();
        } else if ($tab == 1) {
            $this->announcement();
        } else if ($tab == 2) {
            $this->news();
        }
    }

    private function agenda($date = null) {
        $dataheader = array('infoboard'=>'infoboard');
        $dataagenda = array();
        $datafooter = array();
        $this->load->view("templates/informationboard_header", $dataheader);
        $this->load->view("pages/agenda_body", $dataagenda);
        $this->load->view("templates/informationboard_footer", $datafooter);
        
    }

}
