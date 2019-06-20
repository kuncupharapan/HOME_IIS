<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Engman_projectsetting_subprojectlist
 *
 * @author JOHNY
 */
class Engman_projectsetting_subprojectlist extends CI_Model {
    //put your code here
    public $deliverables_data = null;
    
    public function getdeliverables($user, $project, $subproject=NULL){
        
        if(is_null($subproject)){
            $this->deliverables_data = array(0=>array("engineeringareaid"=>0, "engineeringareas.title"=>"RB. Kapal Selam Mini", "engprojectproductid"=>0, "engprojectproducts.title"=>"KSM P-1", "engprojectdeliverableid"=>0,"engprojectdeliverable.name"=>"Purwarupa Kaselmin"));
        } else {
            
        }
    }
}
