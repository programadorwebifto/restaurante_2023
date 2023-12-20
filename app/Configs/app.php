<?php

defined ('APPLICATION_ENV')          || define('APPLICATION_ENV', 'development');//testing|development|production
defined('APPLICATION_URL')           || define('APPLICATION_URL', 'http://localhost/');
defined('ADMIN_LTE')                 || define('ADMIN_LTE',APPLICATION_URL.'/adminlte');
defined('TEMPLATE_DEFAULT')          || define('TEMPLATE_DEFAULT','main');
defined('APPLICATION_NAME')          || define('APPLICATION_NAME','sistema');
defined('APPLICATION_LANGUAGE')      || define('APPLICAITON_LANGUAGE','pt-br');
defined('APPLICATION_VERSION')       || define('APPLICATION_VERSION','1.0.0');
defined('PAGE_404')                  || define('PAGE_404',[\Controllers\ErrorController::class,'page404']);
defined('SESSION_NAME')              || define('SESSION_NAME','Restaurante_IF');
defined('N_MESAS')                   || define('N_MESAS',1);