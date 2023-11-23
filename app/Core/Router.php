<?php

namespace Core;

/**
 * Gerencia todas as rotas do meu sistema.
 */
class Router
{
    /**
     * armazena todas as requisições get do sistema.
     * @var array
     */
    private static $get = array();
    private static $post = array();
    private $url;
    private $controller;
    private $action;
    private $method;

    private function __construct($url, $controller, $action, $method)
    {
        $this->url = (substr($url, 0, 1) == '/') ?substr_replace($url, '', 0, 1):$url;
        $this->controller = $controller;
        $this->action = $action;
        $this->method = $method;
        if ($method == "GET") {
            self::$get[$url] = $this;
        } else {
            self::$post[$url] = $this;
        }

    }

    public static function get($url, $controller, $action = 'index')
    {
        return new Router($url, $controller, $action, 'GET');
    }
    public static function post($url, $controller, $action = 'index')
    {
        return new Router($url, $controller, $action, 'POST');
    }


    public static function getRouterByUrl($url, $method="GET"){
        $url = (substr($url, 0, 1) == '/') ? substr_replace($url, '', 0, 1):$url;
        $routers = ($method == "GET") ? self::$get : self::$post;
        foreach($routers as $router){
            if($router->url == $url){
                return $router;
            }
        }
        return false;
    }


    public function getController(){
        return $this->controller;
    }

    public function getAction(){
        return $this->action;
    }
}

