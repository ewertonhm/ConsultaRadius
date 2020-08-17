<?php
require_once 'config.php';

$s = new Socket();

if($s->tcpTest('186.227.140.112','80')){
    echo "deu good";
} else {
    echo 'deu bad';
}

