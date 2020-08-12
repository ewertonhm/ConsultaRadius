<?php
require_once 'config.php';

$vars= [
    'nome'=>'Ewerton H Marschalk',
    'ip'=>'186.227.140.112',
    'concentrador'=>'Mikrotik 5',
    'pppoeuser'=>'eh.marschalk',
    'pppoepass'=>'E10971',
    'stcontrato'=>'normal',
    'servico'=>'Composto 240mb - União e região',
    'velocidade'=>'260Mbps / 260Mbps'
];

$vars['logs'][0]['data'] = '2020-08-06 20:36:18';
$vars['logs'][0]['log'] = 'Existing IP: 186.227.140.112 (did Mikrotik2 cli E4:18:6B:F7:09:E8 port 15729138 user eh.marschalk)';
$vars['logs'][1]['data'] = '2020-08-06 20:36:18';
$vars['logs'][1]['log'] = 'Existing IP: 186.227.140.112 (did Mikrotik2 cli E4:18:6B:F7:09:E8 port 15729138 user eh.marschalk)';


$vars['auths'][0]['concentrador'] = 'Mikrotik_5';
$vars['auths'][0]['inicio'] = '05/08/2020 00:44:07';
$vars['auths'][0]['termino'] = '';
$vars['auths'][0]['duracao'] = '00:30h';
$vars['auths'][0]['trafego'] = '14.3GB';
$vars['auths'][0]['motivo'] = '';
$vars['auths'][0]['ipconection'] = '100.64.164.53';
$vars['auths'][0]['ipconcentrador'] = '100.64.164.53';
$vars['auths'][0]['ipv6'] = '';
$vars['auths'][0]['mac'] = '68:FF:7B:83:93:EE';

$vars['auths'][1]['concentrador'] = 'Mikrotik_5';
$vars['auths'][1]['inicio'] = '05/08/2020 00:44:07';
$vars['auths'][1]['termino'] = '05/08/2020 01:13:21';
$vars['auths'][1]['duracao'] = '00:30h';
$vars['auths'][1]['trafego'] = '14.3GB';
$vars['auths'][1]['motivo'] = 'Lost Carrier';
$vars['auths'][1]['ipconection'] = '100.64.164.53';
$vars['auths'][1]['ipconcentrador'] = '100.64.164.53';
$vars['auths'][1]['ipv6'] = '';
$vars['auths'][1]['mac'] = '68:FF:7B:83:93:EE';






$template = $twig->load('data-send.twig');

echo $template->render($vars);

dump($_POST);