<?php
require_once 'config.php';

if(!isset($_GET['autenticacao']) AND !isset($_GET['log'])){
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    session_start();

    if(!isset($_POST) OR $_POST == null OR empty($_POST) OR count($_POST)<=0){
        header('Location: datasend.php');
        die();
    }

    $_SESSION['nome'] = $_POST['nome'];
    $_SESSION['ip'] = $_POST['ip'];
    $_SESSION['concentrador'] = $_POST['concentrador'];
    $_SESSION['pppoeuser'] = $_POST['pppoeuser'];
    $_SESSION['pppoepass'] = $_POST['pppoepass'];
    $_SESSION['stcontrato'] = $_POST['stcontrato'];
    $_SESSION['servico'] = $_POST['servico'];
    $_SESSION['velocidade'] = $_POST['velocidade'];

    for($c=0;$c<count($_POST['log_data']);$c++){
        $_SESSION['log_data'][$c] = $_POST['log_data'][$c];
        $_SESSION['log_log'][$c] = $_POST['log_log'][$c];
    }

    for($c=0;$c<count($_POST['auth_concentrador']);$c++){
        $_SESSION['auth_concentrador'][$c] = $_POST['auth_concentrador'][$c];
        $_SESSION['auth_inicio'][$c] = $_POST['auth_inicio'][$c];
        $_SESSION['auth_termino'][$c]= $_POST['auth_termino'][$c];
        $_SESSION['auth_duracao'][$c] = $_POST['auth_duracao'][$c];
        $_SESSION['auth_trafego'][$c] = $_POST['auth_trafego'][$c];
        $_SESSION['auth_motivo'][$c] = $_POST['auth_motivo'][$c];
        $_SESSION['auth_ipconection'][$c] = $_POST['auth_ipconection'][$c];
        $_SESSION['auth_ipconcentrador'][$c] = $_POST['auth_ipconcentrador'][$c];
        $_SESSION['auth_ipv6'][$c] = $_POST['auth_ipv6'][$c];
        $_SESSION['auth_mac'][$c] = $_POST['auth_mac'][$c];
    }
}
if(!isset($_SESSION)){
    session_start();
}

$vars= [
    'nome'=>$_SESSION['nome'],
    'ip'=>$_SESSION['ip'],
    'concentrador'=>$_SESSION['concentrador'],
    'pppoeuser'=>$_SESSION['pppoeuser'],
    'pppoepass'=>$_SESSION['pppoepass'],
    'stcontrato'=>$_SESSION['stcontrato'],
    'servico'=>$_SESSION['servico'],
    'velocidade'=>$_SESSION['velocidade']
];

for($c=0;$c<count($_SESSION['log_data']);$c++){
    $vars['logs'][$c]['data'] = $_SESSION['log_data'][$c];
    $vars['logs'][$c]['log'] = $_SESSION['log_log'][$c];
}

for($c=0;$c<count($_SESSION['auth_concentrador']);$c++){
    $vars['auths'][$c]['concentrador'] = $_SESSION['auth_concentrador'][$c];
    $vars['auths'][$c]['inicio'] = $_SESSION['auth_inicio'][$c];
    $vars['auths'][$c]['termino'] = $_SESSION['auth_termino'][$c];
    $vars['auths'][$c]['duracao'] = $_SESSION['auth_duracao'][$c];
    $vars['auths'][$c]['trafego'] = $_SESSION['auth_trafego'][$c];
    $vars['auths'][$c]['motivo'] = $_SESSION['auth_motivo'][$c];
    $vars['auths'][$c]['ipconection'] = $_SESSION['auth_ipconection'][$c];
    $vars['auths'][$c]['ipconcentrador'] = $_SESSION['auth_ipconcentrador'][$c];
    $vars['auths'][$c]['ipv6'] = $_SESSION['auth_ipv6'][$c];
    $vars['auths'][$c]['mac'] = $_SESSION['auth_mac'][$c];

}

if(isset($_GET['autenticacao']) AND $_GET['autenticacao'] == 1){
    $vars['autenticacao'] = 'true';
}
if(isset($_GET['log']) AND $_GET['log'] == 1){
    $vars['log'] = 'true';
}



$template = $twig->load('radius-data.twig');

echo $template->render($vars);
