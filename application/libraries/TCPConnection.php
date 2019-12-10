<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TCPConnection
 *
 * @author JOHNY
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class TCPConnection {

    //put your code here
    public function __construct() {
        
    }

    public function tes() {

        error_reporting(E_ALL);
        set_time_limit(0);
        echo "<h2>TCP/IP Connection</h2>\n";

        $port = 10000;
        $ip = "127.0.0.1";

        /*
          +-------------------------------
         *    @socketconectionprocess
          +-------------------------------
         *    @socket_create
         *    @socket_connect
         *    @socket_write
         *    @socket_read
         *    @socket_close
          +--------------------------------
         */

        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($socket < 0) {
            echo "socket_create() failed. reason: " . socket_strerror($socket) . "\n";
        } else {
            echo "OK.\n";
        }

        echo "Try to connect '$ip' Port '$port'...\n";
        $result = socket_connect($socket, $ip, $port);
        if ($result < 0) {
            echo "socket_connect() failed.\nReason: ($result) " . socket_strerror($result) . "\n";
        } else {
            echo "Connect OK\n";
        }

        $in = "register|1|1|966322926|898989|680004616|null\r\n";
        $out = '';

        if (!socket_write($socket, $in, strlen($in))) {
            echo "socket_write() failed. reason: " . socket_strerror($socket) . "\n";
        } else {
            echo "Send Message to Server Successfully!\n";
            echo "Send Information:<font color='red'>$in</font> <br>";
        }

        while ($out = socket_read($socket, 8192)) {
            echo "Receive Server Return Message Successfully!\n";
            echo "Received Message:", $out;
        }


        echo "Turn Off Socket...\n";
        socket_close($socket);
        echo "Turn Off OK\n";
    }

}
