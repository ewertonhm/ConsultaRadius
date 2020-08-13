<?php
require_once 'config.php';

if(!isset($_POST) OR $_POST == null OR empty($_POST) OR count($_POST)<=0){
    header('Location: datasend.php');
    die();
}

$dados = ClienteQuery::create()->findOneByPppoe($_POST['pppoeuser']);


$vars= [
    'nome'=>$dados->getNome(),
    'ip'=>$dados->getIp(),
    'concentrador'=>$dados->getConcentrador(),
    'pppoeuser'=>$dados->getPppoe(),
    'pppoepass'=>$dados->getSenha(),
    'stcontrato'=>$dados->getStcontrato(),
    'servico'=>$dados->getServico(),
    'velocidade'=>$dados->getVelocidade()
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
    $vars['auths'][$c]['duracao'] = '';
    $vars['auths'][$c]['trafego'] = $auths[$c]->getTrafegodownload() + $auths[c]->getTrafegoupload() + 'GB';
    $vars['auths'][$c]['motivo'] = $auths[$c]->getMovitodesconexao();
    $vars['auths'][$c]['ipconection'] = $auths[$c]->getIpconexao();
    $vars['auths'][$c]['ipconcentrador'] = $auths[$c]->getIpconcentrador();
    $vars['auths'][$c]['ipv6'] = $auths[$c]->getIpv6();
    $vars['auths'][$c]['mac'] = $auths[$c]->getMac();

}

if(isset($_GET['autenticacao']) AND $_GET['autenticacao'] == 1){
    $vars['autenticacao'] = 'true';
}
if(isset($_GET['log']) AND $_GET['log'] == 1){
    $vars['log'] = 'true';
}
if(isset($_GET['editar']) AND $_GET['editar'] == 1){
    $vars['editar'] = 'true';
}




$template = $twig->load('radius-data.twig');

echo $template->render($vars);
