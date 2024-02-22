<?php

use Components\Select;
use Core\Action;
use Core\Component;
use Core\Model;

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
    /**
     * Summary of component
     * @param mixed $component
     * @param array $data
     * @return Component|object|Select
     */
    function component($component,array $data = []){
        if(is_string($component) && class_exists($component)){
            $component = new $component();
            $component->setData($data);
        }else if(!$component instanceof Component){
            $component = new Component($component, $data);
        }
        return $component;
    }
}

if(!function_exists('assets')){
    function assets($file_path){
        return APPLICATION_URL . "/assets/$file_path";
    }
}



if(!function_exists('model')){
    /**
     * Summary of model
     * @param mixed $class
     * @param mixed $id
     * @return model
     */
    function model($class, $id=null){
        if(!class_exists($class)){
            $class = "\\Models\\$class";
        }
        $model = new $class($id);
        return $model;
    }
}