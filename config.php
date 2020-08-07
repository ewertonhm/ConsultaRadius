<?php
// setup the autoloading
require_once 'vendor/autoload.php';

//setup whoops
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

//setup Twig
$loader = new \Twig\Loader\FilesystemLoader('App/TwigTemplates');
$twig = new \Twig\Environment($loader, [
    //'cache' => 'App/TwigTemplates/compilation_cache', //descomentar após o desenvolvimento
    'debug' => true, //comentar após o desenvolvimento
]);
// comentar após o desenvolvimento
$twig->addExtension(new \Twig\Extension\DebugExtension());