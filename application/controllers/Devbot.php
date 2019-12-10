<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BotClient
 *
 * @author JOHNY
 */
class Devbot extends CI_Controller {

    //put your code here
    private $server;
    private $username;
    private $firstname;
    private $lastname;
    private $userid;
    private $text;
    private $channel = 1;
    private $socketparam;
    private $updateid;
    private $messageid;
    private $mesgenttype;
    private $mesgentlen;
    private $botclient;
    private $clientmessage = array();

    public function __construct() {
        parent::__construct();
        $this->socketparam = array("ip" => "127.0.0.1", "port" => 10000);
        $this->server = $this->config->item('server_envy');
    }

    public function index() {

        $content = file_get_contents("php://input");
        $message = json_decode($content, true);
        $this->clientmessage["userid"] = $message["message"]["from"]["id"];
        $this->clientmessage["username"] = $message["message"]["from"]["username"];
        $this->clientmessage["text"] = $message["message"]["text"];
        $this->clientmessage["firstname"] = $message["message"]["from"]["first_name"];
        $this->clientmessage["lastname"] = $message["message"]["from"]["last_name"];
        $this->clientmessage["updateid"] = $message["update_id"];
        $this->clientmessage["messageid"] = $message["message"]["message_id"];
        $this->clientmessage["mesgenttype"] = isset($message["message"]["entities"][0]["type"]) ? $message["message"]["entities"][0]["type"] : "bot_command";
        $this->clientmessage["mesgentlen"] = isset($message["message"]["entities"][0]["length"]) ? $message["message"]["entities"][0]["length"] : " ";
        $this->clientmessage["botclient"] = isset($message["message"]["from"]["is_bot"]) ? $message["message"]["from"]["is_bot"] : true;
        $this->clientmessage["date"] = $message["message"]["date"];

        if (is_null($this->clientmessage["lastname"])) {
            $this->clientmessage["lastname"] = " ";
        } elseif (is_null($this->clientmessage["username"])) {
            $this->clientmessage["username"] = " ";
        }


        //$text = '/hi';
        //$account = '888888';
        $responsecode = 1;
        $reply = null;
        if (substr($this->clientmessage["text"], 0, 1) == "/") {
            $param = explode(' ', $this->clientmessage["text"]);
            $cmd = strtolower($param[0]);
            $paramlength = count($param);
            if ($cmd == '/daftar') {
                if ($paramlength != 3) {
                    $responsecode = 0;
                } else {
                    if (strlen($param[1]) != 9 || strlen($param[2]) != 6) {
                        $responsecode = 0;
                    }
                }
                if ($responsecode == 1) {
                    $reply = $this->registration($param[1], $param[2]);
                } else {
                    $reply = "Ooop... Terjadi kesalahan pada perintah anda. Silahkan periksa dan coba lagi. Jika anda kurang yakin silahkan hubungi administrator";
                }
            } elseif ($cmd == '/hi') {
                $reply = $this->service_list();
            } elseif ($cmd == '/status') {
                $reply = 'Maaf layanan ini akan segera hadir untuk anda.';
            } elseif ($cmd == '/echo') {
                $reply = "Pesan anda kami terima.";
            } elseif ($cmd == '/setakun') {
                //$this->check_param(array(0 => array(), 1=>array() ));
                if ($paramlength == 4) {
                    $reply = $this->set_account($param[1], $param[2], $param[3]);
                } else {
                    $reply = "Ooop... Terjadi kesalahan pada perintah anda. Silahkan periksa dan coba lagi. Jika anda kurang yakin silahkan hubungi administrator";
                }
            } elseif ($cmd == '/start') {
                $reply = $this->start();
            } elseif ($cmd == '/infoku') {
                $reply = $this->myinfo();
            } elseif ($cmd == '/sinkron') {
                if ($paramlength == 2) {
                    $reply = $this->sync($param[1]);
                } elseif ($paramlength == 3) {
                    $reply = $this->sync($param[1], $param[2]);
                } else {
                    $reply = "Ooop... Terjadi kesalahan pada perintah anda. Silahkan periksa dan coba lagi. Jika anda kurang yakin silahkan hubungi administrator";
                }
            } elseif ($cmd == '/debug') {
                $reply = $content;
            }
        } else {
            if ($this->clientmessage["text"] == 'debug') {
                $reply = "";
                foreach ($this->clientmessage as $key => $val) {
                    $reply .= $key . ": " . $val . chr(10);
                }
            } else {
                $this->load->model("virtual_assistant");
                $reply = $this->virtual_assistant->get_greeting_time() . " " . $this->clientmessage["firstname"] . ", " . chr(10);
                $reply .= "Senang sekali berjumpa kembali dengan anda, untuk layanan lebih lanjut silahkan ketik /hi." . chr(10);
                $reply .= "Citra selalu siap membantu anda.";
            }
        }

        if (!is_null($reply) || strlen($reply) > 5) {
            echo urlencode($reply);
            $this->send($reply);
        }
    }

    private function send($text) {
        $this->load->model("virtual_assistant");
        $this->virtual_assistant->send($this->channel, $this->server, $this->clientmessage["userid"], $text);
    }

    private function sync($server, $module = null) {
        $this->load->model("virtual_assistant");
        $this->virtual_assistant->reg_check($this->clientmessage["userid"], $this->channel);
        $response = null;
        if ($this->virtual_assistant->registered) {
            $this->load->library("SocketRequest", $this->socketparam);
            $this->socketrequest->connect("synchronize|" . $this->channel . "|" . $this->server . "|" . $this->virtual_assistant->appuser->appuserid . "|" . $server . "|" . $module . "|" . $this->clientmessage["firstname"] . "|" . $this->clientmessage["lastname"] . "|" . $this->virtual_assistant->appuser->name . "\r\n");
        } else {
            $response = $this->firstname + ", anda belum terdaftar dalam sistem kami." . chr(10);
            $response .= "Untuk mendapatkan layanan kami silahkan anda melakukan registrasi terlebih dahulu. Silahkan melakukan pendaftaran dengan cara kirim pesan /daftar_[nip]_[pin]." . chr(10);
            $response .= "Citra menanti anda di Hankam Infocon";
        }
        return $response;
    }

    private function set_account($acctype, $username, $password) {
        $this->load->model("virtual_assistant");
        $this->virtual_assistant->reg_check($this->clientmessage["userid"], $this->channel);
        $response = null;
        if ($this->virtual_assistant->registered) {
            $this->load->library("SocketRequest", $this->socketparam);
            $this->socketrequest->connect("setaccount|" . $this->channel . "|" . $this->server . "|" . $this->virtual_assistant->appuser->appuserid . "|" . $acctype . "|" . $username . "|" . $password . "|" . $this->clientmessage["firstname"] . "|" . $this->clientmessage["lastname"] . "|" . $this->virtual_assistant->appuser->name . "\r\n");
            if (!$this->socketrequest->status) {
                $response = "Mohon maaf saat ini kami tidak dapat melayani permintaan anda dikarenakan sedang terjadi kendala pada server kami.";
            }
        } else {
            $response = $this->clientmessage["firstname"] + ", anda belum terdaftar dalam sistem kami." . chr(10);
            $response .= "Untuk mendapatkan layanan kami silahkan anda melakukan registrasi terlebih dahulu. Silahkan melakukan pendaftaran dengan cara kirim pesan <strong> /daftar_[nip]_[pin] </strong>." . chr(10);
            $response .= "Citra menanti anda di Hankam Infocon";
        }
        return $response;
    }

    private function start() {
        $this->load->library("SocketRequest", $this->socketparam);
        $this->socketrequest->connect("start|" . $this->channel . "|" . $this->server . "|" . $this->clientmessage["userid"] . "|" . $this->clientmessage["firstname"] . "|" . $this->clientmessage["lastname"] . "\r\n");
        if (!$this->socketrequest->status) {
            $response = "Mohon maaf saat ini kami tidak dapat melayani permintaan anda dikarenakan sedang terjadi kendala pada server kami.";
        }
        return $response;
    }

    private function registration($employeeid, $token) {
        $this->load->library("SocketRequest", $this->socketparam);
        $this->socketrequest->connect("register|" . $this->channel . "|" . $this->server . "|" . $this->clientmessage["userid"] . "|" . $token . "|" . $employeeid . "|" . $this->clientmessage["username"] . "|" . $this->clientmessage["firstname"] . "|" . $this->clientmessage["lastname"] . "\r\n");
        $response = "";
        if (!$this->socketrequest->status) {
            $response = "Mohon maaf saat ini kami tidak dapat melayani permintaan anda dikarenakan sedang terjadi kendala pada server kami.";
        }
        return $response;
    }

    private function service_list() {
        $this->load->model("virtual_assistant");
        $this->virtual_assistant->reg_check($this->clientmessage["userid"], $this->channel);
        if ($this->virtual_assistant->registered) {
            $response = "Terima kasih telah menghubungi Citra. Untuk mengetahui layanan kami berikut daftar perintah yang tersedia:" . chr(10) . chr(10);
            $response .= "1. <strong>/daftar [nip_lama]</strong> : untuk melakukan registrasi pada sistem infocon." . chr(10) . chr(10);
            $response .= "2. <strong>/hi</strong> : untuk mengetahui layanan yang tersedia pada sistem infocon." . chr(10) . chr(10);
            $response .= "3. <strong>/agenda</strong> : untuk mengetahui agenda kegiatan, jika tanpa atribut maka akan menampilkan seluruh kegiatan PTIPK pada hari tersebut." . chr(10);
            $response .= "Atribut: " . chr(10);
            $response .= "<code>-p</code> : Menampilkan agenda pribadi." . chr(10);
            $response .= "<code>-t [ddmmyy]</code> : Menampilkan agenda pada tanggal yang dimaksud." . chr(10) . chr(10);
            $response .= "4. <strong>/ijin [req|inq]</strong> : Untuk layanan perijinan tidak masuk kerja." . chr(10);
            $response .= "Option: " . chr(10);
            $response .= "<code>req</code> :  pengajuan ijin." . chr(10);
            $response .= "<code>inq</code> :  Menampilkan daftar ijin." . chr(10);
            $response .= "Atribut: " . chr(10);
            $response .= "<code>-t [ddmmyy]</code> : Menambahkan parameter tanggal. [req|inq]" . chr(10);
            $response .= "<code>-k [ddmmyy]</code> : Menambahkan parameter keterangan. [req]" . chr(10) . chr(10);
            $response .= "5. <strong>/setakun [tipe_akun] [username] [password]</strong> : Untuk menambah setting koneksi ke akun eksternal." . chr(10);
        } else {
            $response = "Maaf anda belum terdaftar. Agar Citra dapat melayani anda silahkan terlebih dahulu melakukan pendaftaran dengan mengirimkan pesan <strong> /daftar {nip_lama} {pin}</strong>" . chr(10);
            $response .= "Citra menunggu pendaftaran anda. Salam ...";
        }
        return $response;
    }

    private function myinfo() {
        $this->load->model("virtual_assistant");
        $this->virtual_assistant->reg_check($this->clientmessage["userid"], $this->channel);
        $response = null;
        if ($this->virtual_assistant->registered) {
            $this->load->library("SocketRequest", $this->socketparam);
            $this->socketrequest->connect("personalinfo|" . $this->channel . "|" . $this->server . "|" . $this->clientmessage["userid"] . "|" . $this->virtual_assistant->appuser->appuserid . "|" . $this->virtual_assistant->appuser->person . "|" . $this->virtual_assistant->appuser->name . "|" . $this->clientmessage["firstname"] . "|" . $this->clientmessage["lastname"] . "\r\n");
            if (!$this->socketrequest->status) {
                $response = "Mohon maaf saat ini kami tidak dapat melayani permintaan anda dikarenakan sedang terjadi kendala pada server kami.";
            }
        } else {
            $response = $this->clientmessage["firstname"] + ", anda belum terdaftar dalam sistem kami." . chr(10);
            $response .= "Untuk mendapatkan layanan kami silahkan anda melakukan registrasi terlebih dahulu. Silahkan melakukan pendaftaran dengan cara kirim pesan <strong> /daftar_[nip]_[token]</strong>." . chr(10);
            $response .= "Citra menanti anda di Hankam Infocon";
        }
        return $response;
    }

}
