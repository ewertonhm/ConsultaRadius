<?php
require_once 'config.php';

$cliente = new Cliente();


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

$cliente->setNome($vars['nome']);
$cliente->setIp($vars['ip']);
$cliente->setConcentrador($vars['concentrador']);
$cliente->setPppoe($vars['pppoeuser']);
$cliente->setSenha($vars['pppoepass']);
$cliente->setStcontrato($vars['stcontrato']);
$cliente->setServico($vars['servico']);
$cliente->setVelocidade($vars['velocidade']);
$cliente->save();

$vars['logs'][0]['data'] = '2020-08-06 20:36:18';
$vars['logs'][0]['log'] = 'Existing IP: 186.227.140.112 (did Mikrotik2 cli E4:18:6B:F7:09:E8 port 15729138 user eh.marschalk)';
$vars['logs'][1]['data'] = '2020-08-06 20:36:18';
$vars['logs'][1]['log'] = 'Existing IP: 186.227.140.112 (did Mikrotik2 cli E4:18:6B:F7:09:E8 port 15729138 user eh.marschalk)';

foreach ($vars['logs'] as $log){
    dump($log);
    $logdb = new Log();
    $logdb->setData($log['data']);
    $logdb->setLog($log['log']);
    $logdb->setClienteId($cliente->getId());
    $logdb->save();
}

$vars['auths'][0]['concentrador'] = 'Mikrotik_5';
$vars['auths'][0]['inicio'] = '05/08/2020 00:44:07';
$vars['auths'][0]['termino'] = '';
$vars['auths'][0]['duracao'] = '00:30h';
$vars['auths'][0]['trafego'] = 14.3;
$vars['auths'][0]['motivo'] = '';
$vars['auths'][0]['ipconection'] = '100.64.164.53';
$vars['auths'][0]['ipconcentrador'] = '100.64.164.53';
$vars['auths'][0]['ipv6'] = '';
$vars['auths'][0]['mac'] = '68:FF:7B:83:93:EE';

$vars['auths'][1]['concentrador'] = 'Mikrotik_5';
$vars['auths'][1]['inicio'] = '05/08/2020 00:44:07';
$vars['auths'][1]['termino'] = '05/08/2020 01:13:21';
$vars['auths'][1]['duracao'] = '00:30h';
$vars['auths'][1]['trafego'] = 14.3;
$vars['auths'][1]['motivo'] = 'Lost Carrier';
$vars['auths'][1]['ipconection'] = '100.64.164.53';
$vars['auths'][1]['ipconcentrador'] = '100.64.164.53';
$vars['auths'][1]['ipv6'] = '';
$vars['auths'][1]['mac'] = '68:FF:7B:83:93:EE';

foreach ($vars['auths'] as $auth){
    $autenticacao = new Autenticacao();
    $autenticacao->setConcentrador($auth['concentrador']);
    $autenticacao->setInicio($auth['inicio']);
    $autenticacao->setTermino($auth['termino']);
    $autenticacao->setTrafegodownload($auth['trafego']);
    $autenticacao->setTrafegoupload($auth['trafego']/3);
    $autenticacao->setMovitodesconexao($auth['motivo']);
    $autenticacao->setIpconexao($auth['ipconection']);
    $autenticacao->setIpv6($auth['ipv6']);
    $autenticacao->setMac($auth['mac']);
    $autenticacao->save();
}


if(isset($_GET['reload'])){
    $vars['reload'] = $_GET['reload'];
}




$template = $twig->load('data-send.twig');

echo $template->render($vars);

dump($_POST);

