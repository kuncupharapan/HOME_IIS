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

    public function index($tab = null, $attr = null) {
        if (is_null($tab) || $tab == 0) {
            $this->agenda($attr);
        } else if ($tab == 1) {
            $this->agenda_detail($attr);
        } else if ($tab == 2) {
            $this->announcement();
        } else if ($tab == 3) {
            $this->news();
        }
    }

    private function agenda($date = null) {
        $ajax = false;
        if ($date == null) {
            $date = date("d-m-Y");
            //echo $date;
        } else {
            $ajax = true;
        }
        $this->load->model("infoboard_agenda");
        $this->infoboard_agenda->get_agenda($date);
        $this->infoboard_agenda->get_news_ticker();
        $dataheader = array('infoboard' => 'infoboard');
        $dataagenda = array('agenda' => $this->infoboard_agenda->agenda);
        $datafooter = array('newsticker' => $this->infoboard_agenda->newsticker);
        if ($ajax) {
            $this->load->view("pages/agenda_body_ajax", $dataagenda);
        } else {
            $this->load->view("templates/informationboard_header", $dataheader);
            $this->load->view("pages/agenda_body", $dataagenda);
            $this->load->view("templates/informationboard_footer", $datafooter);
        }
    }

    private function agenda_detail($id = null) {
        if ($id != null) {
            $this->load->model("infoboard_agenda");
            $this->infoboard_agenda->get_agenda_detail($id);
            $dataagenda = array('agenda' => $this->infoboard_agenda->agenda, 'pic' => $this->infoboard_agenda->pic);
            $this->load->view("pages/agenda_detail", $dataagenda);
        } else {
            $this->err_message(2);
        }
    }
    

    public function err_message($errCode = null) {
        if ($errCode == 1) {
            show_error("Sesi anda telah habis, Silahkan melakukan login terlebih dahulu", 1, $heading = 'An Error Was Encountered');
        } else if ($errCode == 2) {
            show_error("Halaman tidak tersedia, URL yang anda gunakan tidak valid", 1, $heading = 'An Error Was Encountered');
        } else if ($errCode == 3) {
            show_error("Permintaan anda tidak dapat diproses, silahkan hubungi administrator", 1, $heading = 'An Error Was Encountered');
        }
    }

}
