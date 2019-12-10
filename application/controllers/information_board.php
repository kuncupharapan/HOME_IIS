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
class Information_board extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function index($tab = NULL, $attr = NULL, $param = NULL) {
        if (is_null($tab) || $tab == 0) {
            $this->agenda($attr);
        } else if ($tab == 1) {
            $this->agenda_detail($attr, $param);
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



        if ($ajax) {
            $this->infoboard_agenda->get_agenda($date);
            $dataagenda = array('agenda' => $this->infoboard_agenda->agenda, 'date' => $date);
            $this->load->view("pages/agenda_body_ajax", $dataagenda);
        } else {
            $day1 = strtotime($date);
            $day2 = strtotime($date . "+1 days");
            $day3 = strtotime($date . "+2 days");
            $day4 = strtotime($date . "+3 days");
            $day5 = strtotime($date . "+4 days");
            $day6 = strtotime($date . "+5 days");
            $day7 = strtotime($date . "+6 days");
            $days = array(array(date('w', $day1), date('d-m-Y', $day1)), array(date('w', $day2), date('d-m-Y', $day2)), array(date('w', $day3), date('d-m-Y', $day3)), array(date('w', $day4), date('d-m-Y', $day4)), array(date('w', $day5), date('d-m-Y', $day5)), array(date('w', $day6), date('d-m-Y', $day6)), array(date('w', $day7), date('d-m-Y', $day7)));
            $this->infoboard_agenda->get_agenda($date, 7);
            $dataagenda = array('agenda' => $this->infoboard_agenda->agenda, 'days' => $days, 'badges' => $this->infoboard_agenda->countagenda, 'date' => $date);
            $dataheader = array('infoboard' => 'infoboard');
            $this->infoboard_agenda->get_news_ticker();
            $datafooter = array('newsticker' => $this->infoboard_agenda->newsticker);
            $this->load->view("templates/informationboard_header", $dataheader);
            $this->load->view("pages/agenda_body", $dataagenda);
            $this->load->view("templates/informationboard_footer", $datafooter);
        }
    }

    private function agenda_detail($mode, $id = NULL) {
        $this->load->model("infoboard_agenda");
        if ($id == null) {
            $id = $mode;
            $this->infoboard_agenda->get_agenda_detail($id);
            $dataagenda = array('agenda' => $this->infoboard_agenda->agenda, 'pic' => $this->infoboard_agenda->pic);
            $this->load->view("pages/agenda_detail", $dataagenda);
        } else {
            if ($mode == 1) {
                 $dataheader = array('infoboard' => 'infoboard');
                $this->infoboard_agenda->get_agenda_detail($id);
                $dataagenda = array('agenda' => $this->infoboard_agenda->agenda, 'pic' => $this->infoboard_agenda->pic);
                $this->load->view("templates/mobview_header", $dataheader);
                $this->load->view("pages/agenda_detail_mobview", $dataagenda);
                $this->load->view("templates/infoboard_footer_mobview");
            }
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
