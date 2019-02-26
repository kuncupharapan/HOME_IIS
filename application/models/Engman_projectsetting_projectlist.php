<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of engman_projectsetting_projectlist
 *
 * @author JOHNY
 */
class Engman_projectsetting_projectlist extends CI_Model {

    public $projects = null;
    public $status = false;
    private $globalsetting = null;

    public function get_projects($userid) {
        if (isset($userid)) {
            $this->globalsetting();
            $fiscalmonthstart = substr($this->globalsetting->fiscaldateend,-2);
            $fiscaldaystart = substr($this->globalsetting->fiscaldateend,0,2);
            $fiscalstartdate = date("Y")."-".$fiscalmonthstart."-".$fiscaldaystart;
            //$fiscalstarttime = mktime(0,0,0,substr(2,2),substr(0,2),date("Y"));
            if ($query = $this->db->query("SELECT engineeringprojectid, title FROM engineeringprojects WHERE engprojectstatusid = 1 AND enddate <= \"".$fiscalstartdate."\"")) {
                $row = $query->result_array();
                if (isset($row)) {
                    $this->projects = $row;
                } else {
                    $this->projects = null;
                }
                $status = true;
            } else {
                $status = false;
            }
        } else {
            $status = false;
        }
        return $status;
    }

    private function globalsetting() {
        if ($query = $this->db->query("SELECT * FROM globalconfigurations")) {
            $row = $query->row();
            if (isset($row)) {
                $this->globalsetting = $row;    
            } else {
                show_error("Konfigurai aplikasi tidak benar, seilahkan hubungi administrator", 1, $heading = 'An Error Was Encountered');
            }
        }
    }

}
