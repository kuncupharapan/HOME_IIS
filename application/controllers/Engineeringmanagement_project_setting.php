<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of engineeringmanagement_project_setting
 *
 * @author JOHNY
 */
class Engineeringmanagement_project_setting extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $_SESSION['user'] = 1;
    }

    public function index() {
        if (is_null($_SESSION['user'])) {
            //$this->login();
            $this->err_message(1);
        } else {
            $this->load->model("engman_projectsetting_projectlist");
            if ($this->engman_projectsetting_projectlist->get_projects($_SESSION['user'])) {
                $dataheader["scss"] = "engineeringmanagement_projects";
                $dataheader['main'] = "engineeringmanagement_main";
                $dataheader["activemenu"] = "app";
                $databody["projectlist"] = $this->engman_projectsetting_projectlist->projects;
                $datafooter["mediaboxhover"] = 0;
                $datafooter["leftmenu"] = "setting";
                $datafooter["projectheader"] = "setting";
                $this->load->view("templates/engineeringmanagement_mainheader", $dataheader);
                $this->load->view("pages/engineeringmanagement_project_setting_menu", $databody);
                $this->load->view("templates/engineeringmanagement_mainfooter", $datafooter);
            } else {
                $this->err_message(3);
            }
        }
    }

    public function project($project_id = NULL, $info_group = NULL, $action = NULL, $ajax = NULL, $subprojectid = NULL) {
        if (is_null($_SESSION['user'])) {
            //$this->login();
            $this->err_message(1);
        }
        if (is_null($project_id)) {
            $this->err_message(2);
        }

        $dataheader["scss"] = "engineeringmanagement_projects";
        $dataheader['main'] = "engineeringmanagement_main";
        $dataheader["activemenu"] = "app";
        $project_attr = array("name" => "Rancang Bangun Kapal Selam Mini", "abbr" => "KSM");
        $databody["project"] = $project_attr;
        $datafooter["mediaboxhover"] = 0;
        $datafooter["leftmenu"] = "setting";
        $datafooter["projectheader"] = "setting";

        if (!is_null($info_group)) {
            if ($info_group == 1) { //Project Info Setting
                $dataheader["autocomplete"] = 1;
                $datafooter["autocomplete"] = 1;
                $this->load->view("templates/engineeringmanagement_mainheader", $dataheader);
                $this->load->view("pages/engineeringmanagement_project_setting_pinfo", $databody);
                $this->load->view("templates/engineeringmanagement_mainfooter", $datafooter);
            } else if ($info_group == 2) { //Budget Plan
                $this->load->view("templates/engineeringmanagement_mainheader", $dataheader);
                $this->load->view("pages/engineeringmanagement_project_setting_pfinancing", $databody);
                $this->load->view("templates/engineeringmanagement_mainfooter", $datafooter);
            } else if ($info_group == 3) {//Management Kegiatan
                if (!is_null($action)) {
                    if ($action == 1) { //add kegiatan
                    } else if ($action == 2) { //view kegiatan
                        if (is_null($ajax) || $ajax == 0) {
                            $this->err_message(2);
                        } else if ($ajax == 1) {
                            $ajaxcontent["project_attr"] = array("name" => "RB. Kapal Selam Mini");
                            $this->load->view("pages/engineeringmanagement_project_setting_kegiatan_view", $ajaxcontent);
                        } else {
                            $this->err_message(2);
                        }
                    } else if ($action == 3) { //edit kegiatan
                        if (is_null($ajax) || $ajax == 0) {
                            $this->err_message(2);
                        } else if ($ajax == 1) {
                            $postid = $this->input->post('subprojid');
                            if (is_null($postid)) {
                                $subproject_query = array(
                                    'subprojid' => $subprojectid,
                                    'projectname' => 'RB. Kapal Selam Mini',
                                    'projectabbr' => 'KSM',
                                    'projecttype' => '6',
                                    'projectdesc' => 'Kegiatan ini meliputi pembuatan prototipe kapal selam mini yang dapat digunakan sebagai kendaraan bawah laut dengan kemampuan menyelam pada laut dangkal dan mampu menampung 4 awak',
                                    'projectsponsor' => '1',
                                    'projectsponsorinfo' => 'Tipe kapal selam ini merupakan permintaan dari TNI AL Armada Barat'
                                );
                                $this->output
                                        ->set_content_type('application/json')
                                        ->set_output(json_encode($subproject_query))
                                        ->_display();
                                exit();
                            } else {
                                $this->output
                                        ->set_content_type('application/json')
                                        ->set_output(json_encode(array('responsemessage' => 'Selamat, Data Sudah Berhasil Diperbarui ...')))
                                        ->_display();
                                exit();
                            }
                        } else {
                            $this->err_message(2);
                        }
                    } else if ($action == 4) { //delete kegiatan
                        $this->output
                                ->set_content_type('application/json')
                                ->set_output(json_encode(array('responsemessage' => 'Selamat, Data Sudah Berhasil Dihapus ...')))
                                ->_display();
                        exit();
                    } else if ($action == 51) { //More -- Tingkatan teknologi
                        if (is_null($ajax) || $ajax == 0) {
                            $this->err_message(2);
                        } else if ($ajax == 1) {
                            $postid = $this->input->post('subprojid');
                            if (is_null($postid)) {
                                $subproject_query = array('projattr' => array('projectabbr' => 'KSM'), 'subprojattr' => array(
                                        0 => array('subpeojectid' => $subprojectid, 'techmetricid' => 0, 'techmetricdesc' => 'TRL', 'techmetricval' => 1),
                                        1 => array('subpeojectid' => $subprojectid, 'techmetricid' => 1, 'techmetricdesc' => 'State of The Art Technology', 'techmetricval' => 'State-of-the-art (SoTA) is a step to demonstrate the novelty of your research results. The importance of being the first to demonstrate research results is a cornerstone of the research business.')));
                                $this->output
                                        ->set_content_type('application/json')
                                        ->set_output(json_encode($subproject_query))
                                        ->_display();
                                exit();
                            } else {
                                $this->output
                                        ->set_content_type('application/json')
                                        ->set_output(json_encode(array('responsemessage' => 'Selamat, Data Sudah Berhasil Diperbarui ...')))
                                        ->_display();
                                exit();
                            }
                        } else {
                            $this->err_message(2);
                        }
                    } else if ($action == 52) {
                        if (is_null($ajax) || $ajax == 0) {
                            $this->err_message(2);
                        } else if ($ajax == 1) {
                            $postid = $this->input->post('subprojid');
                            if (is_null($postid)) {
                                $deliverables_query = array(
                                    0 => array('deliverableid' => 0, 'delivarablename' => 'prototipe', 'deliverabletype' => 0, 'deliverableqty' => 1, 'deliverdate' => '12-12-2019', 'recipients' => array('Laksamana Abdul Ghofur, M.Si.')),
                                    0 => array('deliverableid' => 1, 'delivarablename' => 'Laporan Monev Tahap I', 'deliverabletype' => 1, 'deliverableqty' => 2, 'deliverdate' => '12-03-2019', 'recipients' => array('Laksamana Abdul Ghofur, M.Si.', 'Dr. Hasan Suratman'))
                                );
                                $this->output
                                        ->set_content_type('application/json')
                                        ->set_output(json_encode($deliverables_query))
                                        ->_display();
                                exit();
                            } else {
                                if ($moreaction == 0) {//add list
                                } else if ($moreaction == 1) {//edit list
                                } else if ($moreaction == 2) {//delete list
                                }
                                $this->output
                                        ->set_content_type('application/json')
                                        ->set_output(json_encode(array('responsemessage' => 'Selamat, Data Sudah Berhasil Diperbarui ...')))
                                        ->_display();
                                exit();
                            }
                        } else {
                            $this->err_message(2);
                        }
                    } else {
                        $this->err_message(2);
                    }
                } else {
                    /*                     * Query from DB Please* */
                    $prodoptionresult = array(0 => "Advokasi", 1 => "Alih Teknologi", 2 => "Rekomendasi", 3 => "Pengujian", 4 => "Konsultasi", 5 => "Jasa Operasional", 6 => "Survey", 7 => "Pilot Project", 8 => "Pilot Plan", 9 => "Purwarupa");
                    /*                     * Query from DB Please* */
                    $projsponsorresult = array(0 => "TNI AL", 1 => "TNI AD", 2 => "TNI AU", 3 => "KKIP", 4 => "Kementrian Pertahanan", 5 => "Badan Nasional Penanggulangan Bencana", 6 => "Badan SAR Nasional", 7 => "Internal (PTIPK)");
                    $datafooter["productoption"] = $prodoptionresult;
                    $datafooter["projectsponsor"] = $projsponsorresult;
                    $datafooter["popover"] = 1;
                    $datafooter["modal"] = 1;
                    $datafooter["project"] = $project_attr;
                    $datafooter["subprojectform"] = 1;
                    $this->load->view("templates/engineeringmanagement_mainheader", $dataheader);
                    $this->load->view("pages/engineeringmanagement_project_setting_psubproject", $databody);
                    $this->load->view("templates/engineeringmanagement_mainfooter", $datafooter);
                }
            } else if ($info_group == 4) { //produk kegiatan/deliverables
                if (!is_null($action)) {
                    
                } else {
                    $this->load->model("engman_projectsetting_projectlist");
                    $datafooter["popover"] = 1;
                    $this->load->view("templates/engineeringmanagement_mainheader", $dataheader);
                    $this->load->view("pages/engineeringmanagement_project_setting_deliverables", $databody);
                    $this->load->view("templates/engineeringmanagement_mainfooter", $datafooter);
                }
            }
        } else {
            $this->load->view("templates/engineeringmanagement_mainheader", $dataheader);
            $this->load->view("pages/engineeringmanagement_project_setting_project", $databody);
            $this->load->view("templates/engineeringmanagement_mainfooter", $datafooter);
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
