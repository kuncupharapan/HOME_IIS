<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of telegramBotClient
 *
 * @author JOHNY
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class TelegramBotClient {

    //put your code here

    public function __construct() {
        
    }

    public function send_notification($id, $text) {
        $botkey = '971650412:AAGyCy5fWwYrovo2dDksbyz67159rQEcodU';
        $receipent = $id;
        $ch = curl_init();
        $url = "https://api.telegram.org/bot" . $botkey . "/sendMessage?chat_id=" . $receipent . "&text=" . urlencode($text);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // set url
        //curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        //return the transfer as a string
        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        if (curl_errno($ch)) {
            print "Error: " . curl_error($ch);
        } else {
            // Show me the result
            var_dump($output);
            curl_close($ch);
        }
    }

}
