<?php

require_once('../app/application.php');
use Controllers\Home;
use Core\Router;

// $controller = new Home();
// $controller->index();

$url = '/';
if(isset($_GET['url'])){
    $url = $_GET['url'];
}

$router = Router::getRouterByUrl($url);

if($router){
    $controller = $router->getController();
    $action = $router->getAction();
    $controller = new $controller();
    $controller->$action();
}else{
    die('Page 404');
}







