<?php


namespace App;


class Socket
{
    public function tcpTest($host, $port){
        $waitTimeoutInSeconds = 1;
        if($fp = fsockopen($host,$port,$errCode,$errStr,$waitTimeoutInSeconds)){
            fclose($fp);
            return true;
        } else {
            fclose($fp);
            return false;
        }
    }
}