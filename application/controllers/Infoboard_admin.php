<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Infoboard_admin
 *
 * @author JOHNY
 */
class Infoboard_admin extends CI_Controller {

    //put your code here
    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function index($tab = null, $attr = null, $param = null) {
        if (is_null($tab) || $tab == 0) {
            $this->agenda($attr);
        } else if ($tab == 1) {
            $this->agenda_detail($attr);
        } else if ($tab == 3) {
            $this->agenda_add($attr, $param);
        } else if ($tab == 4) {
            $this->agenda_add_person($attr);
        } else if ($tab == 5) {
            $this->insert_agenda_pic();
        } else if ($tab == 6) {
            $this->remove_agenda_pic();
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
        $this->infoboard_agenda->get_agenda_categories();
        $dataheader = array('infoboard' => 'infoboard');
        $dataagenda = array('agenda' => $this->infoboard_agenda->agenda);
        $datafooter = array('categories' => $this->infoboard_agenda->agendacategories);
        if ($ajax) {
            $this->load->view("pages/agenda_admin_body_ajax", $dataagenda);
        } else {
            $this->load->view("templates/informationboard_header", $dataheader);
            $this->load->view("pages/agenda_admin_body", $dataagenda);
            $this->load->view("templates/infoboard_admin_footer", $datafooter);
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

    private function agenda_add($date = null) {
        if ($this->input->post('addAgenda', TRUE) == '1') {
            $this->load->model("infoboard_agenda");
            if ($this->infoboard_agenda->insert_agenda()) {
                $response = "Selamat, Data berhasil disimpan";
            } else {
                $response = "Gagal Menyimpan Data, Silahkan Cek Kembali Isian Anda";
            }
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('responsemessage' => $response)))
                    ->_display();
            exit();
        } else {
            $this->err_message(2);
        }
    }

    private function insert_agenda_pic() {
        if ($this->input->post('addPIC', TRUE) == '1') {

            $this->load->model("infoboard_agenda");
            if ($this->infoboard_agenda->insert_agenda_pic()) {
                $response = "Selamat, Data berhasil disimpan";
                $responsecode = 1;
            } else {
                $response = "Gagal Menyimpan Data, Silahkan Cek Kembali Isian Anda";
                $responsecode = 0;
            }

            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('responsemessage' => $response, 'responsecode' => $responsecode)))
                    ->_display();
            exit();
        } else {
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('responsemessage' => 'terjadi kesalahan pada server, silahkan hubungi admin', 'responsecode' => 2)))
                    ->_display();
            exit();
        }
    }

    private function agenda_add_person($agendaid=NULL) {
        if ($agendaid !=NULL) {
            $this->load->model("infoboard_agenda");
            $employees = $this->infoboard_agenda->get_employees();
            $pic = $this->infoboard_agenda->get_agenda_pic($agendaid);
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('employees' => $employees, 'pic' => $pic)))
                    ->_display();
            exit();
        }
    }
    
    private function remove_agenda_pic(){
        if ($this->input->post('removePIC', TRUE) == '1') {

            $this->load->model("infoboard_agenda");
            if ($this->infoboard_agenda->remove_agenda_pic()) {
                $response = "Selamat, Data berhasil dihapus";
                $responsecode = 1;
            } else {
                $response = "Gagal Menghapus Data, Silahkan Cek Kembali Data Anda";
                $responsecode = 0;
            }

            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('responsemessage' => $response, 'responsecode' => $responsecode)))
                    ->_display();
            exit();
        } else {
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('responsemessage' => 'terjadi kesalahan pada server, silahkan hubungi admin', 'responsecode' => 2)))
                    ->_display();
            exit();
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
