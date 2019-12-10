<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_auth
 *
 * @author JOHNY
 */
class User_auth extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->library('encryption');
    }

    public function index() {
        if (is_null($_SESSION['user'])) {
            //$this->login();
            $this->home();
        } else {
            $this->home();
        }
    }

    public function create_key() {
        $this->load->library('encryption_wf');
        $this->encryption_wf->generate_key('user', 'method', 'length');
    }

    private function login() {
        $data['path'] = APPPATH;
        $this->load->view("pages/login", $data);
    }

    public function encrypt() {
        $this->encryption->initialize(
                array(
                    'cipher' => 'TripleDES',
                    'mode' => 'cfb',
                    'key' => hex2bin('da11d56dd41295')
                )
        );
        $plain_text = '123456';
        echo $ciphertext = $this->encryption->encrypt($plain_text);

// Outputs: This is a plain-text message!
        echo "<br>". $this->encryption->decrypt($ciphertext);
    }

}
