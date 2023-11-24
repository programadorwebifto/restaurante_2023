<?php


defined('APPLICATION_PATH')         || define('APPLICATION_PATH', realpath(__DIR__ . '/../..'));
defined('APPLICATION_ENV')          || define('APPLICATION_ENV', 'development');//testing|development|production
defined('APPLICATION_URL')          || define('APPLICATION_URL', 'http://restaurante.localhost');
defined('ADMIN_LTE')                || define('ADMIN_LTE',APPLICATION_URL.'/adminlte');
defined('APP_PATH')                 || define('APP_PATH',APPLICATION_PATH.'/app');
defined('VIEWS_PATH')               || define('VIEWS_PATH',APP_PATH.'/Views');
defined('TEMPLATES_PATH')           || define('TEMPLATES_PATH',APP_PATH.'/Templates');
defined('TEMPLATE_DEFAULT')         || define('TEMPLATE_DEFAULT','main');
defined('COMPOSER_PATH')            || define('COMPOSER_PATH',APPLICATION_PATH."/vendor");
defined('CONFIGS_PATH')             || define('CONFIGS_PATH',APP_PATH."/Configs");



