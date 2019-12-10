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
class BotClient extends CI_Controller {

    //put your code here
    private $server;

    public function __construct() {
        parent::__construct();
        $this->server = $this->config->item('server_envy');
    }

    public function index() {

        $content = file_get_contents("php://input");
        $update = json_decode($content, true);
        $account = $update["message"]["chat"]["id"];
        $username = $update["message"]["from"]["username"];
        $text = $update["message"]["text"];
        $firstname = $update["message"]["from"]["first_name"];
        $lastname = $update["message"]["from"]["last_name"];


        //$text = '/hi';
        //$account = '888888';
        $responsecode = 1;
        $reply = "";
        if (substr($text, 0, 1) == "/") {
            $param = explode(" ", $text);
            $cmd = strtolower($param[0]);
            if ($cmd == '/daftar') {
                if (count($param) != 3) {
                    $responsecode = 0;
                } else {
                    if (strlen($param[1]) != 9 || strlen($param[2]) != 6) {
                        $responsecode = 0;
                    }
                }
                if ($responsecode == 1) {
                    $reply = $this->registration($param[1], 1, $account, $username, $param[2]);
                } else {
                    $reply = "Ooop... Terjadi kesalahan pada perintah anda. Silahkan periksa dan coba lagi. Jika anda kurang yakin silahkan hubungi administrator";
                }
            } elseif ($cmd == '/hi') {
                $reply = $this->service_list($account, 1);
            } elseif ($cmd == '/status') {
                $reply = 'Maaf layanan ini akan segera hadir untuk anda.';
            } elseif ($cmd == '/echo') {
                $reply = "Pesan anda kami terima.";
            } elseif ($cmd == '/setakun') {
                //$this->check_param(array(0 => array(), 1=>array() ));
                if(count($param) == 4){
                    $reply = $this->set_account($account, $param[1], $param[2], $param[3]);
                } else {
                    $reply = "Ooop... Terjadi kesalahan pada perintah anda. Silahkan periksa dan coba lagi. Jika anda kurang yakin silahkan hubungi administrator";
                }
            }
        } else {
            $reply = "Selamat datang di kanal informasi infocon, Citra siap membantu anda.";
        }

        //echo urlencode($reply);
        $this->send($account, $reply);
    }

    private function send($recipient, $text) {
        $this->load->model("virtual_assistant");
        $this->virtual_assistant->send(1, $this->server, $recipient, $text);
    }

    private function set_account($account, $acctype, $username, $password) {
        $this->load->model("virtual_assistant");
        $response = "";
        if ($acctype == 'bppt') {
            if($this->virtual_assistant->set_main_account($account, $acctype, $username, $password, 1)) {
                $response = 'Akun berhasil ditambahkan.';
            } else {
                $response = 'Maaf sistem kami mengalami kegagalan ketika menambahkan akun anda, silahkan cek dan coba kembali atau hubungi administrator';
            }
        } else {
            $response = 'Maaf akun yang anda maksud tidak dapat kami kenali, silahkan cek dan coba kembali atau hubungi administrator';
        }
        return $response;
    }

    private function registration($employeeid, $channel, $accountid, $username, $token) {
        $this->load->model("virtual_assistant");
        $this->virtual_assistant->registration($employeeid, $channel, $accountid, $username, $token);
        if ($this->virtual_assistant->employeename != NULL) {
            if ($this->virtual_assistant->registered) {
                $response = $this->virtual_assistant->employeename . ", anda sudah terdaftar pada sistem. Citra siap membantu anda.";
            } else {
                $response = "Selamat datang <strong>" . $this->virtual_assistant->employeename . '</strong>' . chr(10);
                $response .= "Anda sudah berhasil mendaftarkan diri anda di Hankam Infocon." . chr(10);
                $response .= "Perkenalkan nama saya Citra Anjani, asisten pribadi virtual baru anda yang akan selalu siap membantu." . chr(10);
                $response .= "Kenali lebih lanjut Citra, cukup dengan mengirimkan pesan /hi, maka anda akan tahu layanan apa saja yang Citra sediakan untuk anda.";
            }
        } else {
            $response = "Maaf data anda tidak dapat kami kenali." . chr(10) . "Periksa kembali nomor anda atau silahkan hubungi administrator untuk informasi lebih lanjut.";
        }

        return $response;
    }

    private function service_list($accountid, $channel) {
        $this->load->model("virtual_assistant");
        $this->virtual_assistant->reg_check($accountid, $channel);
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
            $response = "Maaf anda belum terdaftar. Agar Citra dapat melayani anda silahkan terlebih dahulu melakukan pendaftaran dengan mengirimkan pesan /daftar {nip_lama} {pin}" . chr(10);
            $response .= "Citra menunggu pendaftaran anda. Salam ...";
        }
        return $response;
    }

}
