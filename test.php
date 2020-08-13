<?php
require_once 'config.php';

$auth = AutenticacaoQuery::create()->findOneById(1);

echo $auth->getDuracaoDaConexao();