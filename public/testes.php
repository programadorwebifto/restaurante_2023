<?php

use Models\Config;
use Models\Produto;

require_once('../app/application.php');

$config = new Config();
$config->nane = 'ENDERECO';
$config->value = 'Rua 13, Nº 515';
$config->insert(['alteracao_data' => date('Y-m-d H:i:s')]);


// pre($config->insert());
// pre($model->insert(['name'=>'HELP_CENTER','value'=>'63988898989']));
pre($config->all());