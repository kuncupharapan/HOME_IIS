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
    private $server;

    public function __construct() {
        parent::__construct();
        $this->server = $this->config->item('server_envy');
    }

    public function index($tab = null, $attr = null, $param = null) {
        if (is_null($tab) || $tab == 0) {
            $this->agenda($attr);
        } else if ($tab == 1) {
            $this->agenda_detail($attr, $param);
        } else if ($tab == 3) {
            $this->agenda_add($attr, $param);
        } else if ($tab == 4) {
            $this->agenda_add_person($attr);
        } else if ($tab == 5) {
            $this->insert_agenda_pic();
        } else if ($tab == 6) {
            $this->remove_agenda_pic();
        } else if ($tab == 7) {
            $this->remove_agenda($attr);
        } else if ($tab == 8) {
            $this->agenda_update($attr);
        } else if ($tab == 9) {
            $this->add_person_notes($attr);
        } elseif ($tab == 10) {
            $this->file_upload($attr, $param);
        }
    }

    private function file_upload($agenda = null, $state = 0) {
        if ($agenda != NULL) {
            if ($state == 0) {
                //$this->load->view();
            } else {
                $id = time();
                $config['upload_path'] = './data/dispositions/';
                $config['allowed_types'] = 'gif|jpg|png|pdf';
                $config['max_size'] = 2048;
                $config['file_name'] = $id;
                //$config['max_width'] = 1024;
                //$config['max_height'] = 768;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('uploadImage')) {
                    $error = array('error' => $this->upload->display_errors());
                    //echo print_r($error);
                    //$this->load->view('upload_form', $error);
                    $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode(array('data' => $error)))
                            ->_display();
                    exit();
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    //echo 'sukses';
                    //$this->load->view('upload_success', $data);
                    $this->load->model('infoboard_agenda');
                    $this->infoboard_agenda->save_file($id, 'agd', $agenda, $this->upload->data());
                    $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode(array('data' => $data)))
                            ->_display();
                    exit();
                }
            }
        }
    }

    private function file_delete($agenda = null, $file) {
        
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
        $dataagenda = array('agenda' => $this->infoboard_agenda->agenda, 'date' => $date);
        $datafooter = array('categories' => $this->infoboard_agenda->agendacategories);
        if ($ajax) {
            $this->load->view("pages/agenda_admin_body_ajax", $dataagenda);
        } else {
            $this->load->view("templates/informationboard_header", $dataheader);
            $this->load->view("pages/agenda_admin_body", $dataagenda);
            $this->load->view("templates/infoboard_admin_footer", $datafooter);
        }
    }

    private function agenda_detail($id = null, $json = null) {
        if ($id != null) {
            $this->load->model("infoboard_agenda");
            $this->infoboard_agenda->get_agenda_detail($id);
            $dataagenda = array('agenda' => $this->infoboard_agenda->agenda, 'pic' => $this->infoboard_agenda->pic);
            if ($json == null) {
                $this->load->view("pages/agenda_detail", $dataagenda);
            } else {
                $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode(array('agenda' => $dataagenda)))
                        ->_display();
                exit();
            }
        } else {
            $this->err_message(2);
        }
    }

    private function agenda_add($date = null) {
        if ($this->input->post('addAgenda', TRUE) == '1') {
            $this->load->model("infoboard_agenda");
            if ($this->infoboard_agenda->insert_agenda()) {
                $this->load->model("virtual_assistant");

                $sendto = $this->infoboard_agenda->get_director($this->config->item('institutioncode'));
                $this->virtual_assistant->get_recipient_id($sendto->person, 1);

                if ($this->virtual_assistant->recipientid != NULL) {
                    $startdate = strtotime($this->input->post('timeStart', TRUE));
                    $enddate = strtotime($this->input->post('timeEnd', TRUE));
                    $text = $this->virtual_assistant->get_greeting_time() . " <strong>" . $sendto->name . "</strong>, " . chr(10);
                    $text .= "Ada agenda baru yang baru saja dimasukkan dalam kalender kegiatan <strong>" . $sendto->institution . "</strong>. Dengan keterangan sebagai berikut: " . chr(10) . chr(10);
                    $text .= "<b>Nama Kegiatan</b> : " . chr(10) . $this->input->post('agendaTitle', TRUE) . chr(10);
                    $text .= "<b>Mulai</b> : " . chr(10) . $this->virtual_assistant->translate_day(date("w", $startdate)) . ", " . date("d-m-Y", $startdate) . " " . $this->input->post('timeStart', TRUE) . chr(10);
                    $text .= "<b>Selesai</b> : " . chr(10) . $this->virtual_assistant->translate_day(date("w", $enddate)) . ", " . date("d-m-Y", $enddate) . " " . $this->input->post('timeEnd', TRUE) . chr(10);
                    $text .= "<b>Lokasi</b> : " . chr(10) . $this->input->post('location', TRUE) . chr(10);
                    $text .= "<b>Deskripsi Kegiatan</b> : " . chr(10) . $this->input->post('agendaDesc', TRUE) . chr(10) . chr(10);

                    $text .= "Untuk melakukan pengaturan kegiatan dapat mengunjunjungi <a href=\"" . site_url("infoboard_admin") . "\"> TAUTAN INI </a>." . chr(10);
                    $text .= $this->virtual_assistant->get_footnote();
                    foreach ($this->virtual_assistant->recipientid as $value) {
                        $id = $value['accountid'];
                        $this->virtual_assistant->send(1, $this->server, $value['accountid'], $text);
                    }
                }

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

    private function agenda_update($agenda) {
        $this->load->model("infoboard_agenda");
        if ($this->input->post('updateAgenda', TRUE) == '1') {
            if ($this->infoboard_agenda->update_agenda($agenda)) {
                $response = "Selamat, Data berhasil diperbarui";
            } else {
                $response = "Gagal Menyimpan Data, Silahkan Cek Kembali Isian Anda";
            }
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('responsemessage' => $response)))
                    ->_display();
            exit();
        } else {
            $this->infoboard_agenda->get_agenda_detail($agenda);
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('agenda' => $this->infoboard_agenda->agenda)))
                    ->_display();
            exit();
        }
    }

    private function insert_agenda_pic() {
        if ($this->input->post('addPIC', TRUE) == '1') {
            $this->load->model("infoboard_agenda");
            if ($this->infoboard_agenda->insert_agenda_pic()) {

                $this->load->model("virtual_assistant");
                $this->virtual_assistant->get_recipient_id($this->infoboard_agenda->pic->personid, 1);

                if ($this->virtual_assistant->recipientid != NULL) {
                    $startdate = strtotime($this->infoboard_agenda->agenda->startdate);
                    $enddate = strtotime($this->infoboard_agenda->agenda->enddate);
                    $text = $this->virtual_assistant->get_greeting_time() . " <strong>" . $this->infoboard_agenda->pic->name . "</strong>, " . chr(10);
                    if ($this->infoboard_agenda->agenda->categoryid == 1) {
                        $text .= "Anda mendapatkan undangan rapat sebagai berikut:" . chr(10) . chr(10);
                        $text .= "<b>Topik Rapat</b>: " . $this->infoboard_agenda->agenda->title . chr(10);
                        $text .= "<b>Hari/Tanggal</b>: " . $this->virtual_assistant->translate_day(date("w", $startdate)) . ", " . date("d-m-Y", $startdate) . chr(10);
                        $text .= "<b>Waktu</b>: " . substr($this->infoboard_agenda->agenda->starttime, 0, 5) . " wib - " . substr($this->infoboard_agenda->agenda->endtime, 0, 5) . ' wib' . chr(10);
                        $text .= "<b>Lokasi</b>: " . $this->infoboard_agenda->agenda->location . chr(10);
                        $text .= "<b>Agenda</b>: " . $this->infoboard_agenda->agenda->agendadesc . chr(10) . chr(10);
                    } else {
                        $text .= "Anda mendapatkan penugasan baru sebagai berikut:" . chr(10) . chr(10);
                        $text .= "<b>Nama Kegiatan</b> : " . $this->infoboard_agenda->agenda->title . chr(10);
                        $text .= "<b>Mulai</b>: " . $this->virtual_assistant->translate_day(date("w", $startdate)) . ", " . date("d-m-Y", $startdate) . " " . substr($this->infoboard_agenda->agenda->starttime, 0, 5) . chr(10);
                        $text .= "<b>Selesai</b>: " . $this->virtual_assistant->translate_day(date("w", $enddate)) . ", " . date("d-m-Y", $enddate) . " " . substr($this->infoboard_agenda->agenda->endtime, 0, 5) . chr(10);
                        $text .= "<b>Lokasi</b>: " . $this->infoboard_agenda->agenda->location . chr(10);
                        $text .= "<b>Deskripsi Kegiatan</b>: " . $this->infoboard_agenda->agenda->agendadesc . chr(10) . chr(10);
                    }

                    $text .= "Untuk informasi lebih lanjut dapat mengunjungi <a href=\"" . site_url("information_board/index/1/1/") . $this->infoboard_agenda->agenda->agendaid . "\"> TAUTAN INI </a>." . chr(10);
                    $text .= $this->virtual_assistant->get_footnote();
                    foreach ($this->virtual_assistant->recipientid as $value) {
                        $id = $value['accountid'];
                        $this->virtual_assistant->send(1, $this->server, $value['accountid'], $text);
                    }
                }
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

    private function add_person_notes($id) {
        $this->load->model("infoboard_agenda");
        if ($this->input->post('addNotes', TRUE) == '1') {
            if ($this->infoboard_agenda->insert_pic_notes()) {
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
            $pic = $this->infoboard_agenda->get_agenda_pic($id);
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('pic' => $pic)))
                    ->_display();
            exit();
        }
    }

    private function agenda_add_person($agendaid = NULL) {
        if ($agendaid != NULL) {
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

    private function remove_agenda_pic() {
        if ($this->input->post('removePIC', TRUE) == '1') {

            $this->load->model("infoboard_agenda");
            if ($this->infoboard_agenda->remove_agenda_pic()) {
                $this->load->model("virtual_assistant");
                $this->virtual_assistant->get_recipient_id($this->infoboard_agenda->pic->personid, 1);
                if ($this->virtual_assistant->recipientid != NULL) {
                    $startdate = strtotime($this->infoboard_agenda->agenda->startdate);
                    $enddate = strtotime($this->infoboard_agenda->agenda->enddate);
                    $text = $this->virtual_assistant->get_greeting_time() . " <strong>" . $this->infoboard_agenda->pic->name . "</strong>, " . chr(10);
                    $text .= "Mohon Maaf, telah terjadi kesalahan pada penugasan anda sebagai berikut:" . chr(10) . chr(10);
                    $text .= "<b>Nama Kegiatan</b> : " . $this->infoboard_agenda->agenda->title . chr(10);
                    $text .= "<b>Mulai</b> : " . $this->virtual_assistant->translate_day(date("w", $startdate)) . ", " . date("d-m-Y", $startdate) . " " . substr($this->infoboard_agenda->agenda->starttime, 0, 5) . chr(10);
                    $text .= "<b>Selesai</b> : " . $this->virtual_assistant->translate_day(date("w", $enddate)) . ", " . date("d-m-Y", $enddate) . " " . substr($this->infoboard_agenda->agenda->endtime, 0, 5) . chr(10);
                    $text .= "<b>Lokasi</b> : " . $this->infoboard_agenda->agenda->location . chr(10);
                    $text .= "<b>Deskripsi Kegiatan</b> : " . $this->infoboard_agenda->agenda->agendadesc . chr(10) . chr(10);

                    $text .= "Penugasan tersebut telah dibatalkan dan kami hapuskan dari kalender anda." . chr(10);
                    $text .= $this->virtual_assistant->get_footnote();
                    foreach ($this->virtual_assistant->recipientid as $value) {
                        $id = $value['accountid'];
                        $this->virtual_assistant->send(1, $this->server, $value['accountid'], $text);
                    }
                }
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

    private function remove_agenda($id = NULL) {
        if ($id != NULL) {
            $this->load->model("infoboard_agenda");
            if ($this->infoboard_agenda->remove_agenda($id)) {
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
