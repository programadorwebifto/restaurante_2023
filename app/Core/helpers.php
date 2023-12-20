<?php

use Core\Action;
use Core\Component;

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


if(!function_exists('value')){
    function value(&$var,$default = ''){
        return isset($var) ? $var : $default;
    }
}

if(!function_exists('component')){
    function component($component,array $data = []){
        if(is_string($component) && class_exists($component)){
            $component = new $component();
            $component->setData($data);
        }else if(!$component instanceof Component){
            $component = new Component($component, $data);
        }
    }
}

if(!function_exists('assets')){
    function assets($file_path){
        return APPLICATION_URL . "/assets/$file_path";
    }
}

