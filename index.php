<?php
require_once 'config.php';

$vars= [
    'ip'=>'186.227.140.112',
    'pppoeuser'=>'eh.marschalk',
    'pppoepass'=>'E10971',
    'stcontrato'=>'normal',
    'servico'=>'Composto 240mb - União e região',
    'velocidade'=>'260Mbps / 260Mbps'
];

if(isset($_GET['autenticacao']) AND $_GET['autenticacao'] == 1){
    $vars['autenticacao'] = 'true';
}
if(isset($_GET['log']) AND $_GET['log'] == 1){
    $vars['log'] = 'true';
}

$template = $twig->load('radius-data.twig');

echo $template->render($vars);
dump($vars);