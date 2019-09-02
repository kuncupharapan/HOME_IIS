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

    public function get_agenda($date = null) {
        if ($query = $this->db->query("SELECT * FROM displayorgagenda WHERE DATE(startdate) = \"" . $date . "\" ORDER BY starttime ASC")) {
            $row = $query->result_array();
            if (isset($row)) {
                $this->agenda = $row;
            } else {
                $this->agenda = null;
            }
        }
    }

    public function get_agenda_detail($id = null) {
        if ($query = $this->db->query("SELECT agenda.id as agendaid, agenda.title as title ,category.id as categoryid, category.title as category, agenda.desc as agendadesc, agendapriority, startdate, starttime, enddate, endtime, location, createdby, createdtimestamp, updatedby, updatedtimestamp FROM displayorgagenda agenda LEFT JOIN displayagendacategories category ON agenda.agendacategory = category.id WHERE agenda.id = " . $id)) {
            $row = $query->row();
            if (isset($row)) {
                $this->agenda = $row;
            } else {
                $this->agenda = null;
            }
        }
        if ($query = $this->db->query("SELECT persons.name as name, employees.employeenationalid as employeeid, agenda.notes as notes FROM displayorgagendapic agenda LEFT JOIN employees ON agenda.employee = employees.id LEFT JOIN persons ON persons.personid = employees.personid WHERE agenda.agenda = \"" . $id . "\" ORDER BY persons.name ASC")) {
            $row = $query->result_array();
            if (isset($row)) {
                $this->pic = $row;
            } else {
                $this->pic = null;
            }
        }
    }

}
