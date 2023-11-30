<?php


/**
 * reponsável pela inicialização do Sistema
 */



date_default_timezone_set("America/Araguaina");
require_once('Configs/framework.php');
require_once(COMPOSER_PATH . '/autoload.php');
\Core\Configs::createConfigsDB();
require_once('Configs/app.php');
require_once('Core/helpers.php');
require_once('Configs/routers.php');
