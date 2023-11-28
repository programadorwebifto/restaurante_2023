<?php

use Models\Config;
use Models\Produto;

require_once('../app/application.php');

$config = new Config();
$config->save(['name'=>'Devsenvolvedor Principal','value'=>'Joaquim Scavone']);

all($config->where('value','like','Joaquim%'));

function all($model){
    $configs = $model->all();
    array_walk($configs, function ($config) {
    echo $config->id." | ".$config->name . " | ".$config->value."<hr>";
    });
}

//SELECT * FROM CLIENTE WHERE ID = :ID