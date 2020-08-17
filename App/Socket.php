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
}