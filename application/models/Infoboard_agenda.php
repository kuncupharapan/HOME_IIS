<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of infoboard_agenda
 *
 * @author JOHNY
 */
class Infoboard_agenda extends CI_Model {

    //put your code here
    public $agenda;
    public $pic;
    public $newsticker;
    public $agendacaetgories;
    public $responsecode;
    public $responsemessage;

    public function get_agenda($date = null) {
        if ($query = $this->db->query("SELECT * FROM displayorgagenda WHERE DATE(startdate) <= STR_TO_DATE('" . $date . "','%d-%m-%Y') AND DATE(enddate) >= STR_TO_DATE('" . $date . "','%d-%m-%Y') ORDER BY starttime ASC")) {
            $row = $query->result_array();
            if (isset($row)) {
                $this->agenda = $row;
            } else {
                $this->agenda = null;
            }
        }
    }

    public function get_agenda_detail($id = null) {
        if ($query = $this->db->query("SELECT agenda.id as agendaid, agenda.title as title ,category.id as categoryid, category.title as category, agenda.desc as agendadesc, agendapriority, startdate, starttime, enddate, endtime, location, createdby, createdtimestamp, updatedby, updatedtimestamp FROM displayorgagenda agenda LEFT JOIN displayagendacategories category ON agenda.agendacategory = category.id WHERE agenda.id = " . $this->db->escape_str($id))) {
            $row = $query->row();
            if (isset($row)) {
                $this->agenda = $row;
            } else {
                $this->agenda = null;
            }
        }
        if ($query = $this->db->query("SELECT persons.name as name, employees.employeenationalid as employeeid, agenda.notes as notes FROM displayorgagendapic agenda LEFT JOIN employees ON agenda.employee = employees.id LEFT JOIN persons ON persons.personid = employees.personid WHERE agenda.agenda = \"" . $this->db->escape_str($id) . "\" ORDER BY persons.name ASC")) {
            $row = $query->result_array();
            if (isset($row)) {
                $this->pic = $row;
            } else {
                $this->pic = null;
            }
        }
    }

    public function get_news_ticker() {
        if ($query = $this->db->query("SELECT * FROM displaynewsticker ORDER BY createdtimestamp ASC LIMIT 10")) {
            $row = $query->result_array();
            if (isset($row)) {
                $this->newsticker = $row;
            } else {
                $this->newsticker = null;
            }
        }
    }

    public function get_agenda_categories() {
        if ($query = $this->db->query("SELECT * FROM displayagendacategories ORDER BY id ASC")) {
            $row = $query->result_array();
            if (isset($row)) {
                $this->agendacategories = $row;
            } else {
                $this->agendacategories = null;
            }
        }
    }

    public function insert_agenda() {
        $result = false;
        $startts = strtotime($this->db->escape_str($this->input->post('dateStart', TRUE)) . ' ' . $this->db->escape_str($this->input->post('timeStart', TRUE)));
        $endts = strtotime($this->db->escape_str($this->input->post('dateEnd', TRUE)) . ' ' . $this->db->escape_str($this->input->post('timeEnd', TRUE)));

        $data = array('title' => $this->db->escape_str($this->input->post('agendaTitle', TRUE)), 'agendacategory' => $this->db->escape_str($this->input->post('agendaCategory', TRUE)), 'agendapriority' => $this->db->escape_str($this->input->post('agendaPriority', TRUE)), 'startdate' => date('Y-m-d', $startts), 'starttime' => date('h:i:s', $startts), 'enddate' => date('Y-m-d', $endts), 'endtime' => date('h:i:s', $endts), 'desc' => $this->db->escape_str($this->input->post('agendaDesc', TRUE)), 'location' => $this->db->escape_str($this->input->post('location', TRUE)), 'createdby' => 0, 'createdtimestamp' => date('Y-m-d H:i:s'));
        if ($this->db->insert('displayorgagenda', $data)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public function get_employees() {
        if ($query = $this->db->query("SELECT emp.id as id, per.name as name FROM employees emp LEFT JOIN persons per ON emp.personid = per.personid  WHERE emp.status != 0 ORDER BY per.name ASC")) {
            return $query->result_array();
        } else {
            return NULL;
        }
    }

    public function get_agenda_pic($agendaId = NULL) {
        if ($agendaId != NULL) {
            if ($query = $this->db->query("SELECT emp.id as id, per.name as name FROM displayorgagendapic pic LEFT JOIN employees emp ON pic.employee = emp.id LEFT JOIN persons per ON emp.personid = per.personid  WHERE pic.agenda = " . $agendaId . " ORDER BY per.name ASC")) {
                return $query->result_array();
            } else {
                return NULL;
            }
        } else {
            return NULL;
        }
    }

    public function insert_agenda_pic() {
        $agenda = $this->db->escape_str($this->input->post('agenda', TRUE));
        $pic = $this->db->escape_str($this->input->post('pic', TRUE));

        $data = array("agenda" => $agenda, "employee" => $pic);
        if ($this->db->insert('displayorgagendapic', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function remove_agenda_pic() {
        $agenda = $this->db->escape_str($this->input->post('agenda', TRUE));
        $pic = $this->db->escape_str($this->input->post('pic', TRUE));

        if ($this->db->query("DELETE FROM displayorgagendapic WHERE employee=".$pic." AND agenda =".$agenda)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
