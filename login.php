<?php
session_start();
if($_SESSION['logado'] == true){
    header("location: index.php");
}
require_once 'config.php';

$vars = [];



if(isset($_POST['uname']) AND isset($_POST['psw'])){
    if(!empty($_POST['uname']) AND $_POST['uname'] != NULL){
        $user = UsuarioQuery::create()->findOneByLogin($_POST['uname']);
        if ($user->getSenha() == md5($_POST['psw'])){
            $_SESSION['logado'] = true;
            header("location: login.php");
            die();
        } else {
            $vars['error'] = 1;
        }
    }
}


$template = $twig->load('login.twig');

echo $template->render($vars);
