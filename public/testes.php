<?php

require_once('../app/application.php');
use Controllers\Home;
use Core\Router;


$router = Router::getRouterByController(\Controllers\Produtos::class,'produto','GET',[5,'água Mineral']);
if($router){
    pre(APPLICATION_URL.'/'.$router->getUrl());
}
pre($router);