<?php
session_start();
/*if(!isset($_SESSION['logado']) OR $_SESSION['logado'] != true){
    header("location: login.php");
    die();
}*/
require_once 'config.php';

if(!isset($_GET) OR $_GET == null OR empty($_GET) OR count($_GET)<=0){
    header('Location: busca.php');
    die();
}

$dados = ClienteQuery::create()->findOneById($_GET['id']);


$vars= [
    'nome'=>$dados->getNome(),
    'ip'=>$dados->getIp(),
    'concentrador'=>$dados->getConcentrador(),
    'pppoeuser'=>$dados->getPppoe(),
    'pppoepass'=>$dados->getSenha(),
    'stcontrato'=>$dados->getStcontrato(),
    'servico'=>$dados->getServico(),
    'velocidade'=>$dados->getVelocidade(),
    'id'=>$dados->getId(),
    'vlan'=>$dados->getVlan()
];

$logs = LogQuery::create()->findByClienteId($dados->getId());

for($c=0;$c<count($logs);$c++){
    $vars['logs'][$c]['data'] = $logs[$c]->getData();
    $vars['logs'][$c]['log'] = $logs[$c]->getLog();
}

$auths = AutenticacaoQuery::create()->findByClienteId($dados->getId());

for($c=0;$c<count($auths);$c++){
    $vars['auths'][$c]['concentrador'] = $auths[$c]->getConcentrador();
    $vars['auths'][$c]['inicio'] = $auths[$c]->getInicio();
    $vars['auths'][$c]['termino'] = $auths[$c]->getTermino();
    $vars['auths'][$c]['duracao'] = $auths[$c]->getDuracaoDaConexao().'h';
    $vars['auths'][$c]['trafego'] = $auths[$c]->getTrafegoTotal().'GB';
    $vars['auths'][$c]['motivo'] = $auths[$c]->getMovitodesconexao();
    $vars['auths'][$c]['ipconection'] = $auths[$c]->getIpconexao();
    $vars['auths'][$c]['ipconcentrador'] = $auths[$c]->getIpconcentrador();
    $vars['auths'][$c]['ipv6'] = $auths[$c]->getIpv6();
    $vars['auths'][$c]['mac'] = $auths[$c]->getMac();

}

$vars['onu']['mac'] = 'FHTT05442F08';
$vars['onu']['olt'] = 'OLT-UNIAO';
$vars['onu']['slot'] = '17/1';
$vars['onu']['sinal'] = '-19.07';
$vars['onu']['laston'] = '17/08/2020 15:43:28';
$vars['onu']['lastoff'] = '17/08/2020 15:40:19';
$vars['onu']['mode'] = 'Bridge';

$vars['onu']['ports'][0]['number'] = '1';
$vars['onu']['ports'][0]['status'] = 'Ativa';
$vars['onu']['ports'][0]['speed'] = '1000';
$vars['onu']['ports'][0]['vlan'] = '531';

$vars['onu']['ports'][1]['number'] = '2';
$vars['onu']['ports'][1]['status'] = 'Inativa';
$vars['onu']['ports'][1]['speed'] = '0';
$vars['onu']['ports'][1]['vlan'] = '531';

$vars['onu']['ports'][2]['number'] = '3';
$vars['onu']['ports'][2]['status'] = 'Inativa';
$vars['onu']['ports'][2]['speed'] = '0';
$vars['onu']['ports'][2]['vlan'] = '531';

$vars['onu']['ports'][3]['number'] = '4';
$vars['onu']['ports'][3]['status'] = 'Inativa';
$vars['onu']['ports'][3]['speed'] = '0';
$vars['onu']['ports'][3]['vlan'] = '531';


if(isset($_GET['autenticacao']) AND $_GET['autenticacao'] == 1){
    $vars['autenticacao'] = 'true';
}
if(isset($_GET['log']) AND $_GET['log'] == 1){
    $vars['log'] = 'true';
}
if(isset($_GET['editar']) AND $_GET['editar'] == 1){
    $vars['editar'] = 'true';
}
if(isset($_GET['onu']) AND $_GET['onu'] == 1){
    $vars['onudata'] = 'true';
}
if(isset($_GET['roteador']) AND $_GET['roteador'] == 1){
    $vars['roteadordata'] = 'true';

    $socket = new Socket();
    if($socket->tcpTest($vars['ip'],8096)){
        $vars['roteador']['port8096'] = true;
    } else {
        $vars['roteador']['port8096'] = false;
    }
    if($socket->tcpTest($vars['ip'],80)){
        $vars['roteador']['port80'] = true;
    } else {
        $vars['roteador']['port80'] = false;
    }
    if($socket->tcpTest($vars['ip'],443)){
        $vars['roteador']['port443'] = true;
    } else {
        $vars['roteador']['port443'] = false;
    }
    if($socket->tcpTest($vars['ip'],8080)){
        $vars['roteador']['port8080'] = true;
    } else {
        $vars['roteador']['port8080'] = false;
    }


}





$template = $twig->load('radius-data.twig');

echo $template->render($vars);
