<?php

class Socket
{
    public function tcpTest($host, $port){
        $waitTimeoutInSeconds = 1;

        try {
            $fp = fsockopen($host,$port,$errCode,$errStr,$waitTimeoutInSeconds);
            fclose($fp);
            return true;
        }
        catch(\Exception $ex) { //used back-slash for global namespace
            return false;
        }
    }

    public function get_title($url){
        $str = file_get_contents($url);
        if(strlen($str)>0){
            $str = trim(preg_replace('/\s+/', ' ', $str)); // supports line breaks inside <title>
            preg_match("/\<title\>(.*)\<\/title\>/i",$str,$title); // ignore case
            return $title[1];
        }
    }
}