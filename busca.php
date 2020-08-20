<?php
session_start();
if(!isset($_SESSION['logado']) OR $_SESSION['logado'] != true){
    header("location: login.php");
    die();
}

require_once 'config.php';

$vars = [];

if(isset($_GET['buscar']) AND $_GET['buscar'] != null){
    $vars['buscar'] = $_GET['buscar'];

    $clientes = ClienteQuery::create()->where("pppoe like '%".$_GET['buscar']."%'OR nome like '%".$_GET['buscar']."%' OR documento like '%".$_GET['buscar']."%'");
    $counter = 0;
    foreach ($clientes as $cliente){
        $vars['clientes'][$counter]['nome'] = $cliente->getNome();
        $vars['clientes'][$counter]['pppoe'] = $cliente->getPppoe();
        $vars['clientes'][$counter]['id'] = $cliente->getId();
        $vars['clientes'][$counter]['documento'] = $cliente->getDocumento();
        $vars['clientes'][$counter]['cidade'] = $cliente->getCidade();
        $vars['clientes'][$counter]['endereco'] = $cliente->getEndereco();
        $vars['clientes'][$counter]['servico'] = $cliente->getServico();
        $vars['clientes'][$counter]['stcontrato'] = $cliente->getStcontrato();
        $counter++;
    }
}

$template = $twig->load('busca.twig');

echo $template->render($vars);
