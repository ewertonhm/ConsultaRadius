<?php
// inicia a sessão e verifica se está logado, se não estiver redireciona para login
session_start();
if(!isset($_SESSION['logado']) OR $_SESSION['logado'] != true){
    header("location: login.php");
    die();
}
require_once 'config.php';

// verifica se recebeu os dados do cliente, caso não, redireciona para a busca
if(!isset($_GET) OR $_GET == null OR empty($_GET) OR count($_GET)<=0){
    header('Location: busca.php');
    die();
}


// encontra o cliente pelo id recebido por get
$dados = ClienteQuery::create()->findOneById($_GET['id']);

// pega os dados do banco e coloca na variavel "vars" para ser exibido no front end depois
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
    'vlan'=>$dados->getVlan(),
    'mac'=>$dados->getMac()
];


// define o maximo de linhas que vai buscar para o log, se receber um valor maximo via get, esse é definido, senão usa 30 como padrão
if(isset($_GET['logmax']) AND $_GET['logmax'] != NULL){
    $logmax = (int)$_GET['logmax'];
} else {
    $logmax = 30;
}

// define a variável orderBy, usada para definir o filtro e o icone na lista
if(isset($_GET['orderByInicio']) AND $_GET['orderByInicio'] == 'decrescente'){
    $vars['orderby']['inicio'] = 'decrescente';
} else if (isset($_GET['orderByInicio']) AND $_GET['orderByInicio'] == 'crescente'){
    $vars['orderby']['inicio'] = 'crescente';
}

// busca os logs no banco apartir do id do cliente
$logs = LogQuery::create()->findByClienteId($dados->getId());

// adiciona uma linha de cada log apartir do que veio do banco, com o maximo de linhas definido pela variavel logmax
for($c=0;$c<count($logs);$c++){
    if($c >= $logmax){
        break;
    }
    $vars['logs'][$c]['data'] = $logs[$c]->getData();
    $vars['logs'][$c]['log'] = $logs[$c]->getLog();
}

// busca as autenticações no banco apartir do id do cliente, ordena conrome o valor da variável orderby, descrecente ou crescente
if(isset($vars['orderby']['inicio']) AND $vars['orderby']['inicio'] == 'decrescente'){
    $auths = AutenticacaoQuery::create()->orderById('asc')->findByClienteId($dados->getId());
} elseif (isset($vars['orderby']['inicio']) AND $vars['orderby']['inicio'] == 'crescente'){
    $auths = AutenticacaoQuery::create()->orderById('desc')->findByClienteId($dados->getId());
} else {
    $auths = AutenticacaoQuery::create()->findByClienteId($dados->getId());
}

// adiciona uma linha de cada log apartir do que veio do banco
// TODO: maximo de linhas
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


// variáveis que serão usadas para os dados da ONU do cliente que serão futuramente retirados do OLT
// TODO: Alterar esses dados, apartir da leitura realizada pela OLT
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

// veriáveis para os botões
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

    // teste de portas do roteador
    // TODO: fazer por curl ou uma maneira que verifique mais rápido
    $socket = new Socket();
    if($socket->tcpTest($vars['ip'],8096)){
        $vars['roteador']['port8096'] = true;
        $vars['roteador']['port8096title'] = $socket->get_title("http://".$vars['ip'].":8096");
    } else {
        $vars['roteador']['port8096'] = false;
    }
    if($socket->tcpTest($vars['ip'],80)){
        $vars['roteador']['port80'] = true;
        $vars['roteador']['port80title'] = $socket->get_title("http://".$vars['ip'].":80");
    } else {
        $vars['roteador']['port80'] = false;
    }
    if($socket->tcpTest($vars['ip'],443)){
        $vars['roteador']['port443'] = true;
        $vars['roteador']['port443title'] = $socket->get_title("https://".$vars['ip'].":443");
    } else {
        $vars['roteador']['port443'] = false;
    }
    if($socket->tcpTest($vars['ip'],8080)){
        $vars['roteador']['port8080'] = true;
        $vars['roteador']['port8080title'] = $socket->get_title("http://".$vars['ip'].":8080");
    } else {
        $vars['roteador']['port8080'] = false;
    }

}

// busca o template
$template = $twig->load('radius-data.twig');

// gera o template usando as vareaveis do $vars e da um echo no html gerado
echo $template->render($vars);
