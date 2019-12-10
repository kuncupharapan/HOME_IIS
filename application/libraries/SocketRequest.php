<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SocketRequest
 *
 * @author JOHNY
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class SocketRequest {

    //put your code here
    private $ip;
    private $port;
    public $status;

    public function __construct($param) {
        $this->ip = $param["ip"];
        $this->port = $param["port"];
    }

    public function connect($in) {
        error_reporting(E_ALL);
        set_time_limit(0);
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($socket < 0) {
            $this->status = FALSE;
            //echo "socket_create() failed. reason: " . socket_strerror($socket) . "\n";
        } else {
            $this->status = TRUE;
            //echo "OK.\n";
        }

        try {
            $result = socket_connect($socket, $this->ip, $this->port);
            if ($result < 0) {
                $this->status = FALSE;
                //echo "socket_connect() failed.\nReason: ($result) " . socket_strerror($result) . "\n";
            } else {
                $this->status = TRUE;
                //echo "Connect OK\n";
            }
        } catch (Exception $exc) {
            $this->status = FALSE;
        }



        $out = '';

        if (!socket_write($socket, $in, strlen($in))) {
            //echo "socket_write() failed. reason: " . socket_strerror($socket) . "\n";
            $this->status = FALSE;
        } else {
            $this->status = TRUE;
            //echo "Send Message to Server Successfully!\n";
            //echo "Send Information:<font color='red'>$in</font> <br>";
        }

        while ($out = socket_read($socket, 8192)) {
            //echo "Receive Server Return Message Successfully!\n";
            echo "Received Message:", $out;
        }

        return $out;
        //echo "Turn Off Socket...\n";
        socket_close($socket);
        //echo "Turn Off OK\n";
    }

}
