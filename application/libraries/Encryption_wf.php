<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EncryptionConfig
 *
 * @author JOHNY
 */
class Encryption_wf {

    //put your code here
    protected $CI;

    public function __construct() {
        // Assign the CodeIgniter super-object
        $this->CI = & get_instance();
        $this->CI->load->library('encryption');
        //$this->CI->load->database();
    }

    public function generate_key($user, $module) {
        $config = $this->get_config($module);
        $key = $this->CI->encryption->create_key($config->keylength);
        $data = array('user' => $user, 'module' => $module, 'length' => $config->keylength, 'key' => $key, 'status' => 1, 'createdby' => 0, 'createdtimestamp' => date('Y-m-d h:i:s', strtotime('now')));
        if ($this->CI->db->insert('endecdigits', $data)) {
            return $key;
        } else {
            return NULL;
        }
    }

    public function encrypt($module, $user, $text, $key = NULL) {
        $ciphertext = '';
        $config = $this->get_config($module);
        if ($key != NULL) {
            $this->CI->encryption->initialize(
                    array(
                        'cipher' => $config->cipher,
                        'mode' => $config->mode,
                        'key' => $key
                    )
            );
            $ciphertext = $this->CI->encryption->encrypt($text);
        } else {
            if ($query = $this->CI->db->query('SELECT * FROM endecdigits WHERE user = ' . $user . ' AND module = "' . $module . '" AND length = ' . $config->keylength)) {
                $row = $query->row();
                if (isset($row)) {
                    $key = $row->key;
                } else {
                    $key = $this->generate_key($config->keylength, $user, $module);
                }
            }
        }

        return $ciphertext;
    }

    public function get_key($user, $module, $length) {
        if ($query = $this->CI->db->query('SELECT * FROM endecdigits WHERE user = ' . $user . ' AND module = "' . $module . '" AND length = ' . $length . ' AND status = 1')) {
            $row = $query->row();
            if (isset($row)) {
                return $row;
            } else {
                return NULL;
            }
        }
    }

    public function get_config($module) {
        if ($query = $this->CI->db->query('SELECT * FROM endecmoduleconfig WHERE id = "' . $module . '"')) {
            $row = $query->row();
            if (isset($row)) {
                return $row;
            } else {
                return NULL;
            }
        } else {
            show_error("Kesalahan pada konfigurasi aplikasi endec", 1, $heading = 'An Error Was Encountered');
        }
    }

}
