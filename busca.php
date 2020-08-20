<?php
session_start();
if(!isset($_SESSION['logado']) OR $_SESSION['logado'] != true){
    header("location: login.php");
    die();
}

require_once 'config.php';

$vars = [];

if(isset($_GET['pppoe']) AND $_GET['pppoe'] != null){
    $vars['pppoe'] = $_GET['pppoe'];

    $clientes = ClienteQuery::create()->where("pppoe like '%".$_GET['pppoe']."%'OR nome like '%".$_GET['pppoe']."%' OR documento like '%".$_GET['pppoe']."%'");
    $counter = 0;
    foreach ($clientes as $cliente){
        $vars['clientes'][$counter]['nome'] = $cliente->getNome();
        $vars['clientes'][$counter]['pppoe'] = $cliente->getPppoe();
        $vars['clientes'][$counter]['id'] = $cliente->getId();
        $vars['clientes'][$counter]['documento'] = $cliente->getDocumento();
        $vars['clientes'][$counter]['cidade'] = $cliente->getCidade();
        $vars['clientes'][$counter]['endereco'] = $cliente->getEndereco();
        $counter++;
    }
}

$template = $twig->load('busca.twig');

echo $template->render($vars);
