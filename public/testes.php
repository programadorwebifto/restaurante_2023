<?php

use Models\Config;
use Models\Produto;

require_once('../app/application.php');

$config = new Config(9);
echo $config->name . " = " . $config->value;
//SELECT * FROM CLIENTE WHERE ID = :ID