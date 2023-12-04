<?php

require_once('../app/application.php');
use Core\Action;


// $controller = new Home();
// $controller->index();

$url = '/';
if(isset($_GET['url'])){
    $url = $_GET['url'];
}

Action::createActionByUrl($url)->run();





