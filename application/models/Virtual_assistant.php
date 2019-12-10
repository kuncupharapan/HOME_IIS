<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of virtual_assistant
 *
 * @author JOHNY
 */
class Virtual_assistant extends CI_Model {

//put your code here
    public $employeename;
    public $registered = FALSE;
    public $recipientid = NULL;
    public $appuser;

    public function registration($id, $channel, $accountid, $username, $token) {
        $this->load->library('encryption_wf');
        if ($query = $this->db->query("SELECT name, per.personid AS person FROM employees emp LEFT JOIN persons per ON per.personid = emp.personid WHERE emp.employeeinternalid = " . $id)) {
            $row = $query->row();
            if (isset($row)) {
                $this->employeename = $row->name;
                if ($query2 = $this->db->query("SELECT id FROM empchannelparams WHERE accountid = " . $accountid . " AND " . " channeltype = " . $channel)) {
                    $reg = $query2->row();
                    if (isset($reg->id)) {
                        $this->registered = TRUE;
                    } else {
                        $this->registered = FALSE;
                        $tokendata = array('person' => $row->person, 'status' => 1);
                        $user = $this->check_appuser($row->person);
                        if ($user != NULL) {
                            $tokendata['updatedby'] = 0;
                            $tokendata['updatedtimestamp'] = date('Y-m-d h:i:s', strtotime('now'));
                            if (!isset($user->token)) {
                                $key = $this->encryption_wf->generate_key($user, 'TOKEN');
                                $tokendata['token'] = $this->encryption_wf->encrypt('TOKEN', $user, $token, $key);
                            }
                            $this->db->where('id', $user);
                            $this->db->update('appuser', $tokendata);
                        } else {
                            $this->db->insert('appuser', array('person' => $row->person, 'createdby' => 0, 'createdtimestamp' => date('Y-m-d h:i:s', strtotime('now'))));
                            $user = $this->check_appuser($row->person);
                            $tokendata['updatedby'] = 0;
                            $key = $this->encryption_wf->generate_key($user, 'TOKEN');
                            $tokendata['token'] = $this->encryption_wf->encrypt('TOKEN', $user, $token, $key);
                            $tokendata['updatedtimestamp'] = date('Y-m-d h:i:s', strtotime('now'));
                            $this->db->where('id', $user);
                            $this->db->update('appuser', $tokendata);
                        }
                        $data = array('user' => $user, 'channeltype' => $channel, 'accountid' => $accountid, 'username' => $username, 'status' => 1, 'createdby' => 0);
                        $this->db->insert('empchannelparams', $data);
                    }
                }
            } else {
                $this->employeename = null;
            }
        }
    }

    private function check_appuser($person) {
        if ($query = $this->db->query("SELECT id, token FROM appuser WHERE person = " . $person)) {
            $user = $query->row();
            if (isset($user->id)) {
                return $user->id;
            } else {
                return NULL;
            }
        }
    }

    public function reg_check($accountid, $channel) {
        if ($query = $this->db->query("SELECT empchannelparams.id AS id, appuser.person AS person, appuser.id AS appuserid, persons.name AS name FROM empchannelparams LEFT JOIN appuser ON empchannelparams.user = appuser.id LEFT JOIN persons ON persons.personid = appuser.person WHERE accountid = " . $accountid . " AND " . " channeltype = " . $channel)) {
            $row = $query->row();
            if (isset($row->id)) {
                $this->appuser = $row;
                $this->registered = TRUE;
            } else {
                $this->registered = FALSE;
            }
        }
    }

    public function set_main_account($accountid, $accounttype, $username, $password, $channel) {
        $this->reg_check($accountid, $channel);
        if ($this->registered) {
            $this->load->library('encryption_wf');
            $config = $this->encryption_wf->get_config('UNAME');
            $userkey = $this->encryption_wf->get_key($this->appuser->appuserid, 'UNAME', $config->keylength);
            $key = $userkey->key;
            if ($key == NULL) {
                $key = $this->encryption_wf->generate_key($this->appuser->appuserid, 'UNAME');
            }
            $appuserdata['username'] = $username;
            $appuserdata['password'] = $this->encryption_wf->encrypt('TOKEN', $this->appuser->appuserid, $password, $key);
            $appuserdata['updatedtimestamp'] = date('Y-m-d h:i:s', strtotime('now'));
            $appuserdata['updatedby'] = 0;
            $this->db->where('id', $this->appuser->appuserid);
            $this->db->update('appuser', $appuserdata);
            return 1;
        } else {
            return 0;
        }
    }

    public function get_userappid($personid) {
        if ($query = $this->db->query("SELECT * FROM appuser WHERE person = " . $personid . " AND status = 1")) {
            $row = $query->result_array();
            if (count($row) > 0) {
                $this->recipientid = $row;
            } else {
                $this->recipientid = NULL;
            }
        }
    }

    public function get_recipient_id($personid, $channel) {
        $userapp = $this->check_appuser($personid);
        if ($userapp != "") {
            if ($query = $this->db->query("SELECT accountid FROM empchannelparams WHERE user = " . $userapp . " AND channeltype = " . $channel . " AND status = 1")) {
                $row = $query->result_array();
                if (count($row) > 0) {
                    $this->recipientid = $row;
                } else {
                    $this->recipientid = NULL;
                }
            }
        } else {
            $this->recipientid = NULL;
        }
    }

    public function get_greeting_time() {
        $time = date("H", strtotime("now"));
        if ($time >= "00" && $time <= "9") {
            return "Selamat pagi";
        } elseif ($time >= "10" && $time <= "15") {
            return "Selamat siang";
        } elseif ($time >= "16" && $time <= "18") {
            return "Selamat sore";
        } else {
            return "Selamat malam";
        }
    }

    public function get_footnote() {
        return chr(10) . "Sekian informasi dari saya, Terimakasih." . chr(10) . chr(10) . "Best Regards," . chr(10) . "Citra Anjani (Hankam Infocon)";
    }

    public function translate_day($id) {
        $days = array("Ahad", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
        return $days[$id];
    }

    public function get_credentials($channel, $level) {
        if ($query = $this->db->query("SELECT accountid, token FROM appchannelconfig WHERE channeltype = " . $channel . " AND level = " . $level . " AND status = 1")) {
            $row = $query->row();
            if (isset($row->accountid)) {
                return $row;
            } else {
                return NULL;
            }
        }
    }

    public function send($channeltype, $level, $recipient, $text) {
        if ($channeltype == 1) {
            /*
              $bot1 = "971650412:AAGyCy5fWwYrovo2dDksbyz67159rQEcodU"; //development
              $bot2 = "932695315:AAHtYaXXOslk6O_ITSnAoxAGELCXSlt44R8"; //production
             */
            $account = $this->get_credentials($channeltype, $level);
            if ($account != NULL) {
                $sendto = "https://api.telegram.org/bot" . $account->accountid . ":" . $account->token . "/sendMessage?chat_id=" . $recipient . "&text=" . urlencode($text) . "&parse_mode=html";
                file_get_contents($sendto);
            }
        }
    }

}
