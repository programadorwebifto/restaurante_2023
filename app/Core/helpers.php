<?php

use Core\Action;

if(!function_exists('pre')){
    function pre($data){
        echo '<pre>';
        var_dump($data);
        echo '</pre><hr>';
    }
}


if(!function_exists('action')){
    function action($controller,$action='index',$method="GET",$parameters=[]){
        return new Action($controller, $action, $method, $parameters);
    }
}