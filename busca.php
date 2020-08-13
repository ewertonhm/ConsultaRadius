<?php
require_once 'config.php';

$vars = [];

if(isset($_GET['pppoe']) AND $_GET['pppoe'] != null){
    $vars['pppoe'] = $_GET['pppoe'];

    $clientes = ClienteQuery::create()->findByPppoe($_GET['pppoe']);
    $counter = 0;
    foreach ($clientes as $cliente){
        $vars['clientes'][$counter]['nome'] = $cliente->getNome();
        $vars['clientes'][$counter]['pppoe'] = $cliente->getPppoe();
        $vars['clientes'][$counter]['id'] = $cliente->getId();
        $counter++;
    }
}

$template = $twig->load('busca.twig');

echo $template->render($vars);
