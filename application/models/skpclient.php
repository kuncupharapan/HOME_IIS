<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of skpclient
 *
 * @author JOHNY
 */
class skpclient extends CI_Model {

    //put your code here
    public $projects = null;
    public $milestones = null;
    public $status = false;
    public $proorgs = null;
    public $proteam = null;
    private $globalsetting = null;

    public function get_projects($userid) {
        $status = false;
        if (isset($userid)) {
            $this->globalsetting();
            $fiscalmonthstart = substr($this->globalsetting->fiscaldateend, -2);
            $fiscaldaystart = substr($this->globalsetting->fiscaldateend, 0, 2);
            $fiscalstartdate = date("Y") . "-" . $fiscalmonthstart . "-" . $fiscaldaystart;
            //$fiscalstarttime = mktime(0,0,0,substr(2,2),substr(0,2),date("Y"));
            if ($query = $this->db->query("SELECT engineeringprojectid, title FROM engineeringprojects WHERE engprojectstatusid = 1 AND enddate <= \"" . $fiscalstartdate . "\"")) {
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

    public function get_project_milestone($userid, $projectid) {
        $status = false;
        if (isset($userid)) {
            if ($query = $this->db->query("SELECT * FROM projectmilestones a LEFT JOIN engprojectdeliverables b ON a.engprojectdeliverable = b. engprojectdeliverableid  WHERE engineeringproject = \"" . $projectid . "\"")) {
                $this->milestones = $query->result_array();
                $status = true;
            } else {
                $status = false;
            }
        } else {
            $status = false;
        }
        return $status;
    }

    public function get_active_project_org($userid, $projectid) {
        $status = false;
        if (isset($userid)) {
            if ($query = $this->db->query("SELECT * FROM engprojectorganizations a LEFT JOIN projectorgtypes b ON a.projectorgtypeid = b.projectorgtypeid WHERE engineeringprojectid = \"" . $projectid . "\"")) {
                $this->proorgs = $query->result_array();
                $status = true;
            } else {
                $status = false;
            }
        } else {
            $status = false;
        }
        return $status;
    }

    public function get_project_team($userid, $projectorgid) {
        $status = false;
        if (isset($userid)) {
            if ($query = $this->db->query("SELECT a.name AS position, a.code AS poscode, c.name AS person, d.name AS poslevel FROM projectorgstructures a LEFT JOIN projectorgstructureclasses d ON a.projectorgstructureclassid = d.projectorgstructureclassid LEFT JOIN projectofficialrecords b ON a.projectorgstructureid = b.projectorgstructure LEFT JOIN persons c ON b.person = c.personid WHERE engprojectorganizationid = \"" . $projectorgid . "\" AND b.status = 1 ORDER BY level ASC, poscode ASC")) {
                $this->proteam = $query->result_array();
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
                show_error("Konfigurasi aplikasi tidak benar, seilahkan hubungi administrator", 1, $heading = 'Terjadi Galat');
            }
        }
    }

}
