<?php namespace Wheredidgogogo\Avanser;

class Avanser {


    function url_get_contents($url)
    {
        return file_get_contents($url);
    }


    function connect($settings = [])
    {

        // get custom connection

        if (isset($settings['username'])) {
            $username = $settings['username'];
        } else {
            $username = config('avanser.account_id');
        }

        if (isset($settings['key'])) {
            $key = $settings['key'];
        } else {
            $key = config('avanser.account_key');
        }

        if (isset($settings['secret'])) {
            $secret = $settings['secret'];
        } else {
            $secret = config('avanser.account_secret');
        }

        // get the tokenKey
        $url = "https://api.avanser.com/JSON?action=getTokenKey&account_id={$username}&api_key={$key}";

        $json = $this->url_get_contents($url);

        $json = json_decode($json, true);

        // generate the challenge
        $challenge = md5( $secret . $json['tokenKey'] ) ;

        // ask for a token
        $url = "https://api.avanser.com/JSON?action=signIn&account_id={$username}&signature={$challenge}";

        $json = $this->url_get_contents($url);

        $json = json_decode($json, true);

        // return that token*/
        return $json['token'];
    }


    function getCallData($settings = []) {

        /*
         * Parameters: date_from, date_to, last_id, limit, evaluations, features, wav, web, detailed, localtime
         */

        if (isset($settings['date_from'])) {
            $date_from = $settings['date_from'];
        } else {
            $date_from = date('Y-m-d');
        }

        if (isset($settings['date_to'])) {
            $date_to = $settings['date_to'];
        } else {
            $date_to = date('Y-m-d', time() + 86400 );
        }

        if (isset($settings['last_id'])) {
            $last_id = $settings['last_id'];
        } else {
            $last_id = '0';
        }

        if (isset($settings['limit'])) {
            $limit = $settings['limit'];
        } else {
            $limit = 30;
        }

        if (isset($settings['evaluations'])) {
            $evaluations = $settings['evaluations'];
        } else {
            $evaluations = 'no';
        }

        if (isset($settings['features'])) {
            $features = $settings['features'];
        } else {
            $features = 'no';
        }

        if (isset($settings['wav'])) {
            $wav = $settings['wav'];
        } else {
            $wav = 'yes';
        }

        if (isset($settings['web'])) {
            $web = $settings['web'];
        } else {
            $web = 'yes';
        }

        if (isset($settings['detailed'])) {
            $detailed = $settings['detailed'];
        } else {
            $detailed = 'yes';
        }

        if (isset($settings['localtime'])) {
            $localtime = $settings['localtime'];
        } else {
            $localtime = 'yes';
        }

        if (isset($settings['username'])) {
            $username = $settings['username'];
        } else {
            $username = config('avanser.account_id');
        }

        if (isset($settings['key'])) {
            $key = $settings['key'];
        } else {
            $key = config('avanser.account_key');
        }

        if (isset($settings['secret'])) {
            $secret = $settings['secret'];
        } else {
            $secret = config('avanser.account_secret');
        }

        $token = $this->connect(['username'=>$username,'key'=>$key,'secret'=>$secret]);

        $username = urlencode($username);
        $dateFrom = urlencode($date_from);
        $dateTo   = urlencode($date_to);
        $features = urlencode($features);
        $wav = urlencode($wav);
        $web = urlencode($web);
        $detailed = urlencode($detailed);
        $localtime = urlencode($localtime);
        $last_id = urlencode($last_id);
        $limit = urlencode($limit);
        $evaluations = urlencode($evaluations);


        $url = "https://api.avanser.com/JSON?account_id={$username}&token={$token}&last_id={$last_id}&evaluations={$evaluations}&features={$features}&web={$web}&detailed={$detailed}&localtime={$localtime}&action=getCDR&date_from={$dateFrom}&date_to={$dateTo}&limit={$limit}&wav={$wav}"; //&evaluations=yes&web=yes&wav=yes";
        // get the response
        $json = $this->url_get_contents($url);
        // parse it
        $data = json_decode($json, true);

        return $data;

    }



}
