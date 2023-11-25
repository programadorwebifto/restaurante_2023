<?php

use Models\Config;
use Models\Produto;

require_once('../app/application.php');

$model = new Produto();
pre($model->all());