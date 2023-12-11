<?php

namespace Core;

class Request{
    private static $instance;

    private function __construct(){
        Session::getInstance();
    }

    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new Request;
        }
        return self::$instance;
    }

    public function getUrl(){
        $url = $this->url;
        return (isset($url)) ? $url : '/';
    }

    public function __get($name){
        return (array_key_exists($name, $_REQUEST)) ? $_REQUEST[$name] : null;
    }

    public function __isset($name){
        return (array_key_exists($name, $_REQUEST));
    }

    public function all(){
        return $_REQUEST;
    }

    public function getMethod(){
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getAction(){
        return Action::createActionByUrl($this->getUrl(), $this->getMethod());
    }

}