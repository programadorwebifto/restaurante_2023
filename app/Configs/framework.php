<?php


defined('APPLICATION_PATH')         || define('APPLICATION_PATH', realpath(__DIR__ . '/../..'));
defined('APP_PATH')                 || define('APP_PATH', APPLICATION_PATH.'/app');
defined('VIEWS_PATH')               || define('VIEWS_PATH', APP_PATH.'/Views');
defined('COMPONENTS_PATH')          || define('COMPONENTS_PATH', VIEWS_PATH.'/components');
defined('TEMPLATES_PATH')           || define('TEMPLATES_PATH', APP_PATH.'/Templates');
defined('COMPOSER_PATH')            || define('COMPOSER_PATH', APPLICATION_PATH."/vendor");
defined('CONFIGS_PATH')             || define('CONFIGS_PATH',APP_PATH."/Configs");
defined("CONFIGS_DB" )              || define("CONFIGS_DB", 'config');



